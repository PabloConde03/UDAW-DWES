<?php
/**
 * Dashboard de progreso · UDAW-DWES (rama Pablo)
 * ---------------------------------------------------------------------------
 * Abre: http://localhost/UDAW-DWES/dashboard.php
 *
 * - Lee el estado de cada ejercicio de su cabecera (@estado / @horas).
 * - Permite cambiar el estado y sumar horas: reescribe esa cabecera.
 * - Cada vez que se carga, regenera PROGRESO.md y el bloque del README.
 * - Las acciones de escritura solo se aceptan desde localhost.
 */

declare(strict_types=1);
require __DIR__ . '/tools/progreso-lib.php';

$esLocal = in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1'], true);

// ── Acciones (POST → Redirect → GET) ───────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ok = false;
    $ruta = rutaPermitida((string) ($_POST['ruta'] ?? ''));
    if ($esLocal && $ruta !== null) {
        $accion = $_POST['accion'] ?? '';
        if ($accion === 'estado') {
            $ok = escribirEstado($ruta, (string) ($_POST['valor'] ?? ''));
        } elseif ($accion === 'horas') {
            $delta = filter_var($_POST['valor'] ?? '', FILTER_VALIDATE_FLOAT);
            $ok = $delta !== false && abs($delta) <= 12 && sumarHoras($ruta, (float) $delta);
        }
    }
    if ($ok) {
        regenerarMarkdown();
    }
    header('Content-Type: application/json');
    echo json_encode(['ok' => $ok]);
    exit;
}

try {
    regenerarMarkdown();
} catch (Throwable $e) {
    // Si no hay permisos de escritura, el dashboard sigue funcionando en modo lectura.
}

$p = calcularProgreso();
$p['local'] = $esLocal;
$p['raiz'] = str_replace('\\', '/', raizRepo());
$json = json_encode($p, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DWES Lab · Progreso</title>
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 32 32%27%3E%3Crect width=%2732%27 height=%2732%27 rx=%277%27 fill=%27%232563EB%27/%3E%3Ctext x=%2716%27 y=%2721%27 font-size=%2711%27 font-family=%27Arial%27 font-weight=%27700%27 fill=%27white%27 text-anchor=%27middle%27%3EPHP%3C/text%3E%3C/svg%3E">
<style>
:root{
  --navy:#111C44; --navy-2:#1B2759; --primary:#2563EB; --bg:#F4F7FE; --card:#FFFFFF; --line:#E2E8F0;
  --ink:#0F172A; --ink-2:#475569; --ink-3:#94A3B8; --shadow:0 4px 12px rgba(15,23,42,.04);
  --ok-bg:#DCFCE7; --ok:#166534; --wip-bg:#FEF3C7; --wip:#92400E; --late-bg:#FEE2E2; --late:#991B1B; --todo-bg:#F1F5F9; --todo:#475569;
  --c-ok:#16A34A; --c-wip:#F59E0B; --c-todo:#E2E8F0;
}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:Inter,"Segoe UI",system-ui,-apple-system,sans-serif;background:var(--bg);color:var(--ink);font-size:14px;line-height:1.45}
a{color:inherit;text-decoration:none}
button,select,input{font:inherit}

/* ── Layout ─────────────────────────────── */
.app{display:grid;grid-template-columns:240px 1fr;min-height:100vh}
.sidebar{background:var(--navy);color:#C7D2FE;padding:22px 14px;position:sticky;top:0;height:100vh;display:flex;flex-direction:column;gap:4px}
.brand{display:flex;align-items:center;gap:10px;padding:0 10px 22px;color:#fff}
.brand-logo{width:34px;height:34px;border-radius:9px;background:var(--primary);display:grid;place-items:center;font-weight:800;font-size:13px;letter-spacing:-.5px}
.brand b{display:block;font-size:15px}.brand small{color:#8E9BD0;font-size:11.5px}
.nav-label{font-size:10.5px;text-transform:uppercase;letter-spacing:.08em;color:#6F7CB4;padding:14px 12px 6px}
.nav a{display:flex;align-items:center;gap:10px;padding:9px 12px;border-radius:8px;color:#C7D2FE;font-weight:500;cursor:pointer}
.nav a:hover{background:var(--navy-2);color:#fff}
.nav a.active{background:var(--primary);color:#fff}
.nav svg{width:17px;height:17px;flex:none}
.side-foot{margin-top:auto;padding:12px;border-radius:10px;background:var(--navy-2);font-size:12px;color:#AEB9E8}
.side-foot b{color:#fff}
.main{min-width:0;display:flex;flex-direction:column}
.topbar{display:flex;align-items:center;gap:12px;padding:14px 28px;background:#fff;border-bottom:1px solid var(--line);position:sticky;top:0;z-index:5;flex-wrap:wrap}
.search{flex:1;min-width:220px;max-width:380px;position:relative}
.search input{width:100%;padding:9px 12px 9px 36px;border:1px solid var(--line);border-radius:9px;background:var(--bg);outline:none}
.search input:focus{border-color:var(--primary);background:#fff}
.search svg{position:absolute;left:11px;top:50%;transform:translateY(-50%);width:16px;color:var(--ink-3)}
.chips{display:flex;gap:6px;flex-wrap:wrap}
.chip{padding:6px 11px;border-radius:999px;border:1px solid var(--line);background:#fff;color:var(--ink-2);font-size:12.5px;font-weight:500;cursor:pointer}
.chip.on{background:var(--ink);color:#fff;border-color:var(--ink)}
.topbar select{padding:7px 10px;border:1px solid var(--line);border-radius:9px;background:#fff;color:var(--ink-2)}
.top-actions{margin-left:auto;display:flex;gap:8px}
.btn{display:inline-flex;align-items:center;gap:7px;padding:8px 14px;border-radius:9px;font-weight:600;font-size:13px;cursor:pointer;border:1px solid transparent;white-space:nowrap}
.btn-primary{background:var(--primary);color:#fff}.btn-primary:hover{background:#1D4ED8}
.btn-ghost{background:#fff;border-color:var(--line);color:var(--ink)}.btn-ghost:hover{border-color:#CBD5E1}
.btn-sm{padding:4px 9px;font-size:12px;border-radius:7px}
.content{padding:24px 28px 40px}
.view{display:none}.view.on{display:block}
.page-head{display:flex;align-items:flex-end;justify-content:space-between;gap:16px;margin-bottom:18px}
.page-head h1{font-size:22px;letter-spacing:-.02em}
.page-head p{color:var(--ink-2);font-size:13px}

/* ── Cards ─────────────────────────────── */
.card{background:var(--card);border:1px solid var(--line);border-radius:12px;box-shadow:var(--shadow);padding:18px}
.card h3{font-size:14px;margin-bottom:12px;display:flex;align-items:center;justify-content:space-between}
.card h3 small{font-weight:500;color:var(--ink-3);font-size:12px}
.kpis{display:grid;grid-template-columns:repeat(5,1fr);gap:14px;margin-bottom:16px}
.kpi{display:flex;gap:12px;align-items:center}
.kpi-ico{width:42px;height:42px;border-radius:10px;display:grid;place-items:center;flex:none}
.kpi-ico svg{width:20px;height:20px}
.kpi b{font-size:22px;display:block;line-height:1.1;letter-spacing:-.02em}
.kpi span{font-size:12px;color:var(--ink-2);white-space:nowrap}
.grid-3{display:grid;grid-template-columns:1.05fr 1.35fr 1fr;gap:14px;margin-bottom:16px}
.grid-2{display:grid;grid-template-columns:1.6fr 1fr;gap:14px}

/* ── Donut & barras ─────────────────────── */
.donut-wrap{display:flex;align-items:center;gap:18px}
.donut{width:150px;height:150px;flex:none}
.donut text{font-family:inherit}
.legend{display:grid;gap:8px;font-size:12.5px;color:var(--ink-2)}
.legend i{display:inline-block;width:10px;height:10px;border-radius:3px;margin-right:7px;vertical-align:-1px}
.bar-row{margin-bottom:14px}
.bar-row:last-child{margin-bottom:0}
.bar-top{display:flex;justify-content:space-between;font-size:12.5px;margin-bottom:5px}
.bar-top b{font-weight:600}.bar-top span{color:var(--ink-2)}
.bar{height:9px;border-radius:99px;background:var(--c-todo);overflow:hidden;display:flex}
.bar i{display:block;height:100%}
.mini{height:5px;width:70px;border-radius:99px;background:var(--c-todo);overflow:hidden;display:inline-block;vertical-align:middle}
.mini i{display:block;height:100%;background:var(--primary)}

/* ── Pills ─────────────────────────────── */
.pill{display:inline-flex;align-items:center;gap:5px;padding:2px 9px;border-radius:999px;font-size:11.5px;font-weight:600;white-space:nowrap}
.st-completado{background:var(--ok-bg);color:var(--ok)}
.st-en-progreso{background:var(--wip-bg);color:var(--wip)}
.st-vencido{background:var(--late-bg);color:var(--late)}
.st-pendiente{background:var(--todo-bg);color:var(--todo)}
.p2{background:#E0F2FE;color:#0369A1}
.tag{background:#F3E8FF;color:#6B21A8}

/* ── Calendario ─────────────────────────── */
.cal-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px}
.cal-head b{font-size:13.5px}
.cal-nav{display:flex;gap:4px}
.cal-nav button{border:1px solid var(--line);background:#fff;border-radius:7px;width:26px;height:26px;cursor:pointer;color:var(--ink-2)}
.cal{display:grid;grid-template-columns:repeat(7,1fr);gap:3px;text-align:center;font-size:12px}
.cal .dow{color:var(--ink-3);font-weight:600;font-size:10.5px;padding:4px 0}
.cal .d{padding:6px 0;border-radius:7px;color:var(--ink-2)}
.cal .d.out{color:#CBD5E1}
.cal .d.today{outline:1.5px solid var(--primary);color:var(--primary);font-weight:700}
.cal .d.due{background:var(--primary);color:#fff;font-weight:700}
.cal.big .d{padding:14px 0;font-size:13px}

/* ── Listas / tabla ─────────────────────── */
.queue li{list-style:none;display:flex;align-items:center;gap:12px;padding:10px 0;border-top:1px solid var(--line)}
.queue li:first-child{border-top:0}
.q-n{width:24px;height:24px;border-radius:7px;background:var(--bg);display:grid;place-items:center;font-size:11.5px;font-weight:700;color:var(--ink-2);flex:none}
.q-main{flex:1;min-width:0}
.q-main b{display:block;font-size:13px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.q-main span{font-size:12px;color:var(--ink-2)}
.empty{color:var(--ink-3);font-size:13px;padding:10px 0}
table{width:100%;border-collapse:collapse}
th{font-size:11px;text-transform:uppercase;letter-spacing:.05em;color:var(--ink-3);text-align:left;padding:10px 12px;border-bottom:1px solid var(--line);background:#FAFBFF}
td{padding:9px 12px;border-bottom:1px solid var(--line);vertical-align:middle}
tr.group td{background:#F8FAFF;font-weight:700;font-size:13px;color:var(--ink)}
tr.group td small{font-weight:500;color:var(--ink-2);margin-left:8px}
tr.hide{display:none}
.tbl-wrap{padding:0;overflow:auto}
.acts{display:flex;gap:6px;align-items:center;justify-content:flex-end}
.acts select{padding:4px 6px;border:1px solid var(--line);border-radius:7px;font-size:12px;background:#fff}
.ico-btn{width:28px;height:28px;border-radius:7px;border:1px solid var(--line);background:#fff;display:inline-grid;place-items:center;cursor:pointer;color:var(--ink-2)}
.ico-btn:hover{color:var(--primary);border-color:#BFDBFE}
.ico-btn svg{width:14px;height:14px}
.muted{color:var(--ink-3)}
.ud-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.ud-task{display:flex;align-items:center;gap:10px;padding:9px 0;border-top:1px solid var(--line);font-size:13px}
.ud-task:first-of-type{border-top:0}
.ud-task .t{flex:1;min-width:0}
.ud-task .t b{font-weight:600}
.ud-task .t small{display:block;color:var(--ink-2);font-size:11.5px}
.deadline{display:flex;gap:12px;align-items:center;padding:12px 0;border-top:1px solid var(--line)}
.deadline:first-child{border-top:0}
.dl-date{width:48px;text-align:center;border-radius:10px;background:#EFF6FF;color:var(--primary);padding:6px 0;flex:none}
.dl-date b{display:block;font-size:18px;line-height:1}.dl-date small{font-size:10.5px;text-transform:uppercase;font-weight:700}
.toast{position:fixed;bottom:20px;right:20px;background:var(--ink);color:#fff;padding:10px 16px;border-radius:10px;font-size:13px;opacity:0;transform:translateY(8px);transition:.2s;pointer-events:none;z-index:50}
.toast.on{opacity:1;transform:none}
.readonly{background:#FEF3C7;color:#92400E;padding:8px 28px;font-size:12.5px;border-bottom:1px solid #FDE68A}

/* ── Vista Planner A4 ───────────────────── */
.a4-toolbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
.a4{background:#fff;width:210mm;min-height:297mm;margin:0 auto;padding:18mm 16mm;box-shadow:0 10px 40px rgba(15,23,42,.08);color:#1E293B;font-family:Georgia,"Times New Roman",serif}
.a4 h1{font-family:"Playfair Display",Georgia,serif;font-size:30px;font-weight:700;letter-spacing:-.01em;border-bottom:2px solid #1E293B;padding-bottom:8px;display:flex;justify-content:space-between;align-items:baseline}
.a4 h1 small{font-size:13px;font-weight:400;font-style:italic;color:#475569}
.a4 h2{font-family:"Playfair Display",Georgia,serif;font-size:15px;text-transform:uppercase;letter-spacing:.12em;margin:20px 0 8px;color:#334155}
.a4-meta{display:flex;gap:24px;font-size:12.5px;color:#475569;margin-top:8px}
.a4-cols{display:grid;grid-template-columns:1.3fr 1fr;gap:18px}
.a4 table{font-size:12px;border:1px solid #CBD5E1}
.a4 th,.a4 td{border:1px solid #CBD5E1;padding:6px 8px;font-family:Georgia,serif;text-transform:none;letter-spacing:0;color:#1E293B;background:#fff}
.a4 th{font-size:11px;font-weight:700;background:#F8FAFC}
.a4 .box{font-size:15px;width:24px;text-align:center}
.obj-line{display:flex;gap:10px;align-items:center;border-bottom:1px solid #CBD5E1;padding:7px 0;font-size:13.5px}
.obj-line input{border:0;outline:0;flex:1;font-family:Georgia,serif;font-size:13.5px;background:transparent;color:#1E293B}
.notes{border:1px solid #CBD5E1;min-height:58mm;background-image:repeating-linear-gradient(transparent,transparent 27px,#E2E8F0 27px,#E2E8F0 28px);padding:4px 8px}
.notes textarea{width:100%;min-height:56mm;border:0;outline:0;resize:none;background:transparent;font-family:Georgia,serif;font-size:13px;line-height:28px;color:#1E293B}
.a4-stat{border:1px solid #CBD5E1;padding:10px;font-size:12.5px}
.a4-stat b{font-size:22px;font-family:"Playfair Display",Georgia,serif;display:block}

@media (max-width:1200px){.kpis{grid-template-columns:repeat(3,1fr)}.grid-3{grid-template-columns:1fr 1fr}.ud-grid{grid-template-columns:1fr}}
@media (max-width:860px){.app{grid-template-columns:1fr}.sidebar{display:none}.grid-2,.grid-3{grid-template-columns:1fr}}

@media print{
  @page{size:A4;margin:0}
  body{background:#fff}
  .sidebar,.topbar,.readonly,.a4-toolbar,.view:not(#v-a4),.toast{display:none!important}
  .app{display:block}.content{padding:0}
  #v-a4{display:block!important}
  .a4{box-shadow:none;margin:0;width:auto;min-height:auto}
  .obj-line input::placeholder,.notes textarea::placeholder{color:transparent}
}
</style>
</head>
<body>
<div class="app">
  <aside class="sidebar">
    <div class="brand"><div class="brand-logo">PHP</div><div><b>DWES Lab</b><small>UDAW · MP0613</small></div></div>
    <nav class="nav" id="nav">
      <div class="nav-label">Vistas</div>
      <a data-view="dash" class="active"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/><rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/></svg>Dashboard general</a>
      <a data-view="plan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 6h11M9 12h11M9 18h11"/><path d="m3 6 1.5 1.5L7 5M3 12l1.5 1.5L7 11M3 18l1.5 1.5L7 17"/></svg>Planificador de tareas</a>
      <a data-view="ud"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5V5a2 2 0 0 1 2-2h13v16H6a2 2 0 0 0-2 2Z"/><path d="M8 7h7M8 11h5"/></svg>Por unidad (UD2–UD4)</a>
      <a data-view="cal"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M3 9h18M8 2v4M16 2v4"/></svg>Calendario / entregas</a>
      <a data-view="a4"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9V3h12v6M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="7"/></svg>Vista Planner A4</a>
    </nav>
    <div class="side-foot"><b>Prioridad P2 · Importante</b><br>DWES va detrás de LM y SI. La cola sube a primer plano lo que vence en 7 días o menos.</div>
  </aside>

  <main class="main">
    <header class="topbar">
      <label class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg><input id="q" type="search" placeholder="Buscar tarea, ejercicio o tema…"></label>
      <div class="chips" id="chips">
        <button class="chip on" data-f="">Todos</button>
        <button class="chip" data-f="pendiente">Pendiente</button>
        <button class="chip" data-f="en-progreso">En progreso</button>
        <button class="chip" data-f="completado">Completado</button>
      </div>
      <select id="fud"><option value="">Todas las UD</option><option>UD2</option><option>UD3</option><option>UD4</option></select>
      <div class="top-actions">
        <button class="btn btn-ghost" id="csv">Exportar CSV</button>
        <a class="btn btn-primary" id="next">▶ Continuar</a>
      </div>
    </header>
    <div id="ro"></div>

    <div class="content">
      <!-- DASHBOARD -->
      <section class="view on" id="v-dash">
        <div class="page-head"><div><h1>Dashboard general</h1><p id="hoy"></p></div><span class="pill p2">P2 · Importante</span></div>
        <div class="kpis" id="kpis"></div>
        <div class="grid-3">
          <div class="card"><h3>Dominio global <small>ejercicios completados</small></h3><div class="donut-wrap" id="donut"></div></div>
          <div class="card"><h3>Avance por unidad <small>% completado · horas</small></h3><div id="bars"></div></div>
          <div class="card"><div class="cal-head"><b id="mini-mes"></b><span class="pill st-pendiente">entregas</span></div><div class="cal" id="mini-cal"></div></div>
        </div>
        <div class="grid-2">
          <div class="card"><h3>Cola de trabajo <small>lo urgente primero, luego en orden de curso</small></h3><ul class="queue" id="queue"></ul></div>
          <div class="card"><h3>Próximas entregas</h3><div id="dls"></div></div>
        </div>
      </section>

      <!-- PLANIFICADOR -->
      <section class="view" id="v-plan">
        <div class="page-head"><div><h1>Planificador de tareas</h1><p>Cambia el estado o suma horas: se escribe en la cabecera del fichero y se regenera PROGRESO.md.</p></div></div>
        <div class="card tbl-wrap">
          <table><thead><tr><th>Ejercicio</th><th>Estado</th><th>Pasos</th><th>Horas</th><th style="text-align:right">Acciones</th></tr></thead><tbody id="tbody"></tbody></table>
        </div>
      </section>

      <!-- POR UNIDAD -->
      <section class="view" id="v-ud">
        <div class="page-head"><div><h1>Por unidad</h1><p>Avance de cada tarea dentro de su unidad didáctica.</p></div></div>
        <div class="ud-grid" id="udgrid"></div>
      </section>

      <!-- CALENDARIO -->
      <section class="view" id="v-cal">
        <div class="page-head"><div><h1>Calendario / entregas</h1><p>Las fechas límite salen de <code>tools/tareas.json</code> (campo <code>fecha</code>). Añade las que conozcas.</p></div></div>
        <div class="grid-2">
          <div class="card"><div class="cal-head"><b id="big-mes"></b><div class="cal-nav"><button id="prev">‹</button><button id="today">•</button><button id="nextm">›</button></div></div><div class="cal big" id="big-cal"></div></div>
          <div class="card"><h3>Entregas</h3><div id="dls2"></div></div>
        </div>
      </section>

      <!-- A4 -->
      <section class="view" id="v-a4">
        <div class="a4-toolbar"><p class="muted">Escribe los objetivos reales de hoy; se guardan en este navegador. Al imprimir se ocultan la barra lateral y los botones.</p><button class="btn btn-primary" onclick="window.print()">🖨 Imprimir / PDF</button></div>
        <div class="a4" id="a4"></div>
      </section>
    </div>
  </main>
</div>
<div class="toast" id="toast"></div>

<script>
const D = <?= $json ?>;
const $ = s => document.querySelector(s), $$ = s => [...document.querySelectorAll(s)];
const ESTADO_TXT = {'completado':'Completado','en-progreso':'En progreso','pendiente':'Pendiente','vencido':'Vencido'};
const fmtH = h => (Math.round(h*10)/10).toString().replace('.',',');
const fecha = s => new Date(s+'T00:00:00');
const HOY = fecha(D.hoy);
const esc = s => String(s).replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
const pill = (st, auto) => `<span class="pill st-${st}" ${auto?'title="Detectado automáticamente: el fichero ya no es la plantilla"':''}>${ESTADO_TXT[st]}${auto?' ·auto':''}</span>`;
const ICO = {
  open:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 3h7v7M10 14 21 3M21 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5"/></svg>',
  code:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m16 18 6-6-6-6M8 6l-6 6 6 6"/></svg>',
  doc:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h5"/></svg>'
};
const todos = D.tareas.flatMap(t => t.ejercicios.map(e => ({...e, t})));
const vscode = ruta => 'vscode://file/' + encodeURI(D.raiz + '/' + ruta);
const ghReadme = t => t.carpeta + '/README.md';

/* ── Navegación ─────────────────────────── */
function show(v){
  $$('.view').forEach(x => x.classList.toggle('on', x.id === 'v-'+v));
  $$('#nav a').forEach(a => a.classList.toggle('active', a.dataset.view === v));
  history.replaceState(null, '', '#'+v);
}
$$('#nav a').forEach(a => a.onclick = () => show(a.dataset.view));
if (location.hash && $('#v-'+location.hash.slice(1))) show(location.hash.slice(1));

if (!D.local) $('#ro').innerHTML = '<div class="readonly">Modo lectura: los cambios solo se pueden hacer desde localhost.</div>';
$('#hoy').textContent = HOY.toLocaleDateString('es-ES', {weekday:'long', day:'numeric', month:'long', year:'numeric'});

/* ── Botón continuar ────────────────────── */
const sig = D.cola[0];
if (sig) { $('#next').textContent = `▶ Continuar: ${sig.tarea} · Ej. ${sig.n}`; $('#next').href = sig.ruta; }
else { $('#next').textContent = '🎉 Todo completado'; }

/* ── KPIs ───────────────────────────────── */
const T = D.totales;
const kpi = (bg, col, ico, val, txt) => `<div class="card kpi"><div class="kpi-ico" style="background:${bg};color:${col}">${ico}</div><div><b>${val}</b><span>${txt}</span></div></div>`;
$('#kpis').innerHTML =
  kpi('#EFF6FF','#2563EB','<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-9-9v9z"/></svg>', T.pct+' %', 'Dominio global') +
  kpi('#ECFDF5','#16A34A','<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg>', `${T.completado}<small style="font-size:13px;color:#94A3B8">/${T.ejercicios}</small>`, 'Completados') +
  kpi('#FEF3C7','#D97706','<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>', T['en-progreso'], 'En progreso') +
  kpi('#FEF2F2','#DC2626','<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z"/></svg>', T.pendiente, 'Pendientes') +
  kpi('#F3E8FF','#9333EA','<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 22h14M5 2h14M17 22v-4.2a2 2 0 0 0-.6-1.4L12 12l-4.4 4.4a2 2 0 0 0-.6 1.4V22M7 2v4.2a2 2 0 0 0 .6 1.4L12 12l4.4-4.4a2 2 0 0 0 .6-1.4V2"/></svg>', fmtH(T.horas)+' h', 'Horas dedicadas');

/* ── Donut ──────────────────────────────── */
(function(){
  const R = 54, C = 2*Math.PI*R, n = T.ejercicios || 1;
  const seg = [[T.completado,'var(--c-ok)'],[T['en-progreso'],'var(--c-wip)']];
  let off = 0, arcs = '';
  for (const [v, col] of seg) { const len = v/n*C; if (len>0) arcs += `<circle r="${R}" cx="75" cy="75" fill="none" stroke="${col}" stroke-width="16" stroke-dasharray="${len} ${C-len}" stroke-dashoffset="${-off}" transform="rotate(-90 75 75)"/>`; off += len; }
  $('#donut').innerHTML = `<svg class="donut" viewBox="0 0 150 150"><circle r="${R}" cx="75" cy="75" fill="none" stroke="var(--c-todo)" stroke-width="16"/>${arcs}
    <text x="75" y="74" text-anchor="middle" font-size="26" font-weight="800" fill="#0F172A">${T.pct}%</text><text x="75" y="94" text-anchor="middle" font-size="11" fill="#64748B">${T.completado} de ${T.ejercicios}</text></svg>
    <div class="legend"><div><i style="background:var(--c-ok)"></i>Completado · ${T.completado}</div><div><i style="background:var(--c-wip)"></i>En progreso · ${T['en-progreso']}</div><div><i style="background:var(--c-todo)"></i>Pendiente · ${T.pendiente}</div></div>`;
})();

/* ── Barras por UD ──────────────────────── */
$('#bars').innerHTML = D.uds.map(u => {
  const ok = u.completado/u.ejercicios*100, wip = u['en-progreso']/u.ejercicios*100;
  return `<div class="bar-row"><div class="bar-top"><b>${u.ud} · ${esc(u.nombre)}</b><span>${u.pct} % · ${fmtH(u.horas)} h</span></div>
    <div class="bar"><i style="width:${ok}%;background:var(--c-ok)"></i><i style="width:${wip}%;background:var(--c-wip)"></i></div></div>`;
}).join('');

/* ── Calendario ─────────────────────────── */
const DUE = Object.fromEntries(D.entregas.map(e => [e.fecha, e]));
function calendario(el, labelEl, y, m){
  const first = new Date(y, m, 1), start = (first.getDay()+6)%7, days = new Date(y, m+1, 0).getDate();
  const lbl = first.toLocaleDateString('es-ES', {month:'long', year:'numeric'}).replace(' de ', ' ');
  labelEl.textContent = lbl.charAt(0).toUpperCase() + lbl.slice(1);
  let h = ['L','M','X','J','V','S','D'].map(d => `<div class="dow">${d}</div>`).join('');
  const prevDays = new Date(y, m, 0).getDate();
  for (let i = start; i > 0; i--) h += `<div class="d out">${prevDays-i+1}</div>`;
  for (let d = 1; d <= days; d++) {
    const iso = `${y}-${String(m+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
    const due = DUE[iso], isToday = iso === D.hoy;
    h += `<div class="d ${due?'due':''} ${isToday?'today':''}" ${due?`title="${esc(due.id+' · '+due.titulo)}"`:''}>${d}</div>`;
  }
  const tail = (7 - (start+days)%7) % 7;
  for (let d = 1; d <= tail; d++) h += `<div class="d out">${d}</div>`;
  el.innerHTML = h;
}
calendario($('#mini-cal'), $('#mini-mes'), HOY.getFullYear(), HOY.getMonth());
let cy = HOY.getFullYear(), cm = HOY.getMonth();
const big = () => calendario($('#big-cal'), $('#big-mes'), cy, cm);
$('#prev').onclick = () => { cm--; if (cm<0){cm=11;cy--;} big(); };
$('#nextm').onclick = () => { cm++; if (cm>11){cm=0;cy++;} big(); };
$('#today').onclick = () => { cy = HOY.getFullYear(); cm = HOY.getMonth(); big(); };
big();

/* ── Entregas ───────────────────────────── */
function entregasHTML(){
  if (!D.entregas.length) return '<p class="empty">Sin fechas. Añádelas en tools/tareas.json.</p>';
  return D.entregas.map(e => {
    const f = fecha(e.fecha), dias = e.dias;
    const cuando = e.estado === 'completado' ? pill('completado') : dias < 0 ? pill('vencido') : `<span class="pill ${dias<=7?'st-vencido':'st-en-progreso'}">${dias===0?'Hoy':dias===1?'Mañana':'Faltan '+dias+' días'}</span>`;
    return `<div class="deadline"><div class="dl-date"><b>${f.getDate()}</b><small>${f.toLocaleDateString('es-ES',{month:'short'}).replace('.','')}</small></div>
      <div class="q-main"><b>${esc(e.id)} · ${esc(e.titulo)}</b><span>${e.pct} % completado · ${e.entrega?'Entregable':'Práctica'}</span></div>${cuando}</div>`;
  }).join('');
}
$('#dls').innerHTML = entregasHTML(); $('#dls2').innerHTML = entregasHTML();

/* ── Cola ───────────────────────────────── */
$('#queue').innerHTML = D.cola.slice(0, 7).map((c, i) => `<li><span class="q-n">${i+1}</span>
  <div class="q-main"><b>${esc(c.tarea)} · Ej. ${c.n} — ${esc(c.titulo)}</b><span>${esc(c.titulo_tarea)}</span></div>
  ${c.dias!==null && c.dias<=7 ? '<span class="pill st-vencido">Urgente</span>' : ''}${pill(c.estado)}
  <a class="ico-btn" href="${esc(vscode(c.ruta))}" title="Abrir en VS Code">${ICO.code}</a>
  <a class="ico-btn" href="${esc(c.ruta)}" target="_blank" title="Ejecutar en el navegador">${ICO.open}</a></li>`).join('') || '<p class="empty">No queda nada pendiente. 🎉</p>';

/* ── Planificador ───────────────────────── */
function filaEj(e){
  const pct = e.pasos ? Math.round(e.pasos_hechos/e.pasos*100) : 0;
  const opts = ['pendiente','en-progreso','completado'].map(s => `<option value="${s}" ${s===e.estado && !e.auto ? 'selected':''}>${ESTADO_TXT[s]}</option>`).join('');
  const dis = D.local ? '' : 'disabled';
  return `<tr class="ej" data-st="${e.estado}" data-ud="${e.t.ud}" data-q="${esc((e.t.id+' '+e.t.titulo+' '+e.titulo+' '+e.archivo).toLowerCase())}">
    <td><b>Ej. ${e.n}</b> · ${esc(e.titulo)}<br><small class="muted">${esc(e.archivo)}${e.extra.length? ' + '+esc(e.extra.join(', ')):''}</small></td>
    <td>${pill(e.estado, e.auto)}</td>
    <td><span class="mini"><i style="width:${pct}%"></i></span> <small class="muted">${e.pasos_hechos}/${e.pasos}</small></td>
    <td>${fmtH(e.horas)} h</td>
    <td><div class="acts">
      <select ${dis} onchange="accion('${esc(e.ruta)}','estado',this.value)">${e.auto?'<option selected disabled>— estado —</option>':''}${opts}</select>
      <button class="btn btn-ghost btn-sm" ${dis} onclick="accion('${esc(e.ruta)}','horas',0.5)" title="Sumar media hora">+½ h</button>
      <button class="btn btn-ghost btn-sm" ${dis} onclick="accion('${esc(e.ruta)}','horas',-0.5)" title="Restar media hora">−</button>
      <a class="ico-btn" href="${esc(vscode(e.ruta))}" title="Abrir en VS Code">${ICO.code}</a>
      <a class="ico-btn" href="${esc(e.ruta)}" target="_blank" title="Ejecutar">${ICO.open}</a>
      <a class="ico-btn" href="${esc(vscode(ghReadme(e.t)))}" title="Enunciado">${ICO.doc}</a>
    </div></td></tr>`;
}
$('#tbody').innerHTML = D.tareas.map(t => `<tr class="group" data-ud="${t.ud}" data-tarea="${esc(t.id)}"><td colspan="5">${esc(t.id)} · ${esc(t.titulo)}
  <small>${t.ud} · ${t.pct} %${t.fecha?' · vence '+fecha(t.fecha).toLocaleDateString('es-ES'):''}</small> ${t.estado==='vencido'?pill('vencido'):''}</td></tr>` +
  todos.filter(e => e.t === t).map(filaEj).join('')).join('');

/* ── Por unidad ─────────────────────────── */
$('#udgrid').innerHTML = D.uds.map(u => `<div class="card" data-ud="${u.ud}"><h3>${u.ud} · ${esc(u.nombre)} <small>${u.pct} %</small></h3>
  <div class="bar" style="margin-bottom:12px"><i style="width:${u.completado/u.ejercicios*100}%;background:var(--c-ok)"></i><i style="width:${u['en-progreso']/u.ejercicios*100}%;background:var(--c-wip)"></i></div>
  ${D.tareas.filter(t => t.ud === u.ud).map(t => `<div class="ud-task" data-q="${esc((t.id+' '+t.titulo).toLowerCase())}" data-st="${t.estado}"><div class="t"><b>${esc(t.id)}</b> · ${esc(t.titulo)}<small>${t.resumen.completado}/${t.ejercicios.length} ejercicios · ${fmtH(t.resumen.horas)} h</small></div>
  <span class="mini"><i style="width:${t.pct}%"></i></span>${pill(t.estado)}</div>`).join('')}</div>`).join('');

/* ── Filtros y búsqueda ─────────────────── */
let fEstado = '', fUd = '', fQ = '';
function filtrar(){
  $$('#tbody tr.ej').forEach(r => r.classList.toggle('hide', (fEstado && r.dataset.st !== fEstado) || (fUd && r.dataset.ud !== fUd) || (fQ && !r.dataset.q.includes(fQ))));
  $$('#tbody tr.group').forEach(g => {
    let n = g.nextElementSibling, vis = false;
    while (n && n.classList.contains('ej')) { if (!n.classList.contains('hide')) vis = true; n = n.nextElementSibling; }
    g.classList.toggle('hide', !vis);
  });
  $$('#udgrid .card').forEach(c => c.style.display = (fUd && c.dataset.ud !== fUd) ? 'none' : '');
  $$('#udgrid .ud-task').forEach(r => r.style.display = ((fQ && !r.dataset.q.includes(fQ)) || (fEstado && r.dataset.st !== fEstado)) ? 'none' : '');
}
$('#q').oninput = e => { fQ = e.target.value.trim().toLowerCase(); if (fQ && $('#v-dash').classList.contains('on')) show('plan'); filtrar(); };
$$('#chips .chip').forEach(c => c.onclick = () => { $$('#chips .chip').forEach(x => x.classList.remove('on')); c.classList.add('on'); fEstado = c.dataset.f; filtrar(); });
$('#fud').onchange = e => { fUd = e.target.value; filtrar(); };

/* ── Acciones ───────────────────────────── */
function toast(t){ const el = $('#toast'); el.textContent = t; el.classList.add('on'); setTimeout(() => el.classList.remove('on'), 1800); }
async function accion(ruta, tipo, valor){
  const fd = new FormData(); fd.append('ruta', ruta); fd.append('accion', tipo); fd.append('valor', valor);
  try {
    const r = await (await fetch(location.pathname, {method:'POST', body:fd})).json();
    if (r.ok) { sessionStorage.setItem('toast', tipo==='estado' ? 'Estado actualizado' : 'Horas actualizadas'); location.reload(); }
    else toast('No se pudo guardar (¿permisos de escritura?)');
  } catch { toast('Error de conexión con el servidor'); }
}
if (sessionStorage.getItem('toast')) { toast(sessionStorage.getItem('toast')); sessionStorage.removeItem('toast'); }

/* ── Exportar CSV ───────────────────────── */
$('#csv').onclick = () => {
  const rows = [['Unidad','Tarea','Titulo tarea','Ejercicio','Titulo ejercicio','Archivo','Estado','Pasos hechos','Pasos','Horas','Fecha limite']];
  todos.forEach(e => rows.push([e.t.ud, e.t.id, e.t.titulo, e.n, e.titulo, e.ruta, e.estado, e.pasos_hechos, e.pasos, String(e.horas).replace('.',','), e.t.fecha||'']));
  const csv = '﻿' + rows.map(r => r.map(v => `"${String(v).replace(/"/g,'""')}"`).join(';')).join('\r\n');
  const a = document.createElement('a'); a.href = URL.createObjectURL(new Blob([csv], {type:'text/csv;charset=utf-8'}));
  a.download = `progreso-dwes-${D.hoy}.csv`; a.click(); URL.revokeObjectURL(a.href);
};

/* ── Planner A4 ─────────────────────────── */
(function(){
  const k = 'a4-' + D.hoy;
  let guardado = {};
  try { guardado = JSON.parse(localStorage.getItem(k) || '{}'); } catch {}
  const obj = i => `<div class="obj-line"><span class="box">☐</span><input data-k="o${i}" placeholder="Objetivo ${i}…" value="${esc(guardado['o'+i]||'')}"></div>`;
  const cola = D.cola.slice(0, 10);
  $('#a4').innerHTML = `<h1>Planner de estudio · DWES <small>${HOY.toLocaleDateString('es-ES',{weekday:'long', day:'numeric', month:'long', year:'numeric'})}</small></h1>
    <div class="a4-meta"><span>MP0613 · Desarrollo Web en Entorno Servidor</span><span>Prioridad: P2 · Importante</span><span>Avance: ${T.pct} % (${T.completado}/${T.ejercicios})</span></div>
    <div class="a4-cols">
      <div><h2>Objetivos del día</h2>${[1,2,3,4].map(obj).join('')}</div>
      <div><h2>Estado</h2><div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
        <div class="a4-stat"><b>${T.completado}</b>completados</div><div class="a4-stat"><b>${T['en-progreso']}</b>en progreso</div>
        <div class="a4-stat"><b>${fmtH(T.horas)} h</b>dedicadas</div><div class="a4-stat"><b>${D.entregas.filter(e=>e.estado!=='completado'&&e.dias>=0).map(e=>e.dias+' d').join(', ')||'—'}</b>a la próxima entrega</div></div></div>
    </div>
    <h2>Cola de trabajo</h2>
    <table><thead><tr><th class="box"></th><th>Tarea</th><th>Ejercicio</th><th>Estado</th><th style="width:70px">Tiempo</th></tr></thead><tbody>
      ${cola.map(c => `<tr><td class="box">${c.estado==='completado'?'☑':'☐'}</td><td>${esc(c.tarea)}</td><td>Ej. ${c.n} — ${esc(c.titulo)}${c.dias!==null&&c.dias<=7?' <b>(urgente)</b>':''}</td><td>${ESTADO_TXT[c.estado]}</td><td></td></tr>`).join('')}
    </tbody></table>
    <h2>Notas</h2><div class="notes"><textarea data-k="notas" placeholder="Dudas, conceptos a repasar, preguntas para el profesor…">${esc(guardado.notas||'')}</textarea></div>`;
  $$('#a4 [data-k]').forEach(el => el.oninput = () => {
    guardado[el.dataset.k] = el.value;
    try { localStorage.setItem(k, JSON.stringify(guardado)); } catch {}
  });
})();
</script>
</body>
</html>
