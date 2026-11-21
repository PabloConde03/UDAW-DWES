<?php
/**
 * Librería de progreso · UDAW-DWES
 * ---------------------------------------------------------------------------
 * Lee tools/tareas.json (estructura del curso) y la cabecera de cada fichero
 * de ejercicio (@estado / @horas) para calcular el avance. La usan:
 *   - dashboard.php              (vista web en XAMPP)
 *   - tools/generar-progreso.php (genera PROGRESO.md y el bloque del README)
 *
 * Fuente de verdad del estado = la cabecera de cada ejercicio:
 *     @estado  pendiente | en-progreso | completado
 *     @horas   1.5
 * Si un fichero sigue «pendiente» pero ya no es igual que la plantilla original,
 * se considera «en-progreso» automáticamente.
 */

declare(strict_types=1);

date_default_timezone_set('Europe/Madrid');

const ESTADOS = ['pendiente', 'en-progreso', 'completado'];
const RE_ESTADO = '/(@estado[ \t]*:?[ \t]*)([a-z-]+)/i';
const RE_HORAS  = '/(@horas[ \t]*:?[ \t]*)([0-9]+(?:[.,][0-9]+)?)/i';

function raizRepo(): string
{
    return dirname(__DIR__);
}

function cargarManifiesto(): array
{
    $json = file_get_contents(__DIR__ . '/tareas.json');
    return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
}

/** Huella del contenido ignorando los valores de @estado/@horas y los finales de línea. */
function huella(string $contenido): string
{
    $c = str_replace("\r", '', $contenido);
    $c = preg_replace(RE_ESTADO, '$1', $c);
    $c = preg_replace(RE_HORAS, '$1', $c);
    $c = preg_replace('/[ \t]+$/m', '', $c);
    return sha1(trim($c));
}

/** Cuenta los pasos pendientes: «// TODO» en PHP y «- [ ]» en Markdown. */
function contarPendientes(string $contenido, string $ruta): int
{
    if (str_ends_with($ruta, '.md')) {
        return preg_match_all('/^\s*- \[ \]/m', $contenido);
    }
    return preg_match_all('#//\s*TODO\b#', $contenido);
}

function leerEjercicio(string $rutaAbs): array
{
    if (!is_file($rutaAbs)) {
        return ['existe' => false, 'estado' => 'pendiente', 'horas' => 0.0, 'pendientes' => 0, 'huella' => '', 'modificado' => null];
    }
    $c = (string) file_get_contents($rutaAbs);
    $estado = preg_match(RE_ESTADO, $c, $m) ? strtolower($m[2]) : 'pendiente';
    if (!in_array($estado, ESTADOS, true)) {
        $estado = 'pendiente';
    }
    $horas = preg_match(RE_HORAS, $c, $m) ? (float) str_replace(',', '.', $m[2]) : 0.0;
    return [
        'existe'     => true,
        'estado'     => $estado,
        'horas'      => $horas,
        'pendientes' => contarPendientes($c, $rutaAbs),
        'huella'     => huella($c),
        'modificado' => filemtime($rutaAbs),
    ];
}

/** Devuelve la ruta absoluta si $rel es uno de los ficheros principales del manifiesto; si no, null. */
function rutaPermitida(string $rel): ?string
{
    foreach (cargarManifiesto()['tareas'] as $t) {
        foreach ($t['ejercicios'] as $e) {
            if ($t['carpeta'] . '/' . $e['archivo'] === $rel) {
                return raizRepo() . '/' . $rel;
            }
        }
    }
    return null;
}

function escribirEstado(string $rutaAbs, string $estado): bool
{
    if (!in_array($estado, ESTADOS, true) || !is_writable($rutaAbs)) {
        return false;
    }
    $c = (string) file_get_contents($rutaAbs);
    $nuevo = preg_replace(RE_ESTADO, '${1}' . $estado, $c, 1, $n);
    return $n === 1 && file_put_contents($rutaAbs, $nuevo) !== false;
}

function sumarHoras(string $rutaAbs, float $delta): bool
{
    if (!is_writable($rutaAbs)) {
        return false;
    }
    $c = (string) file_get_contents($rutaAbs);
    if (!preg_match(RE_HORAS, $c, $m)) {
        return false;
    }
    $total = max(0.0, round((float) str_replace(',', '.', $m[2]) + $delta, 2));
    $txt = rtrim(rtrim(number_format($total, 2, '.', ''), '0'), '.');
    $nuevo = preg_replace(RE_HORAS, '${1}' . $txt, $c, 1);
    return file_put_contents($rutaAbs, $nuevo) !== false;
}

/**
 * Calcula todo el progreso. Estructura devuelta:
 *  tareas[] (con ejercicios[] enriquecidos), uds[], totales, cola[], entregas[]
 */
function calcularProgreso(?string $hoy = null): array
{
    $hoy ??= date('Y-m-d');
    $man = cargarManifiesto();
    $raiz = raizRepo();
    $tot = ['ejercicios' => 0, 'completado' => 0, 'en-progreso' => 0, 'pendiente' => 0, 'horas' => 0.0];
    $uds = [];
    $tareas = [];

    foreach ($man['tareas'] as $t) {
        $ud = $t['ud'];
        $uds[$ud] ??= ['ud' => $ud, 'nombre' => $man['unidades'][$ud] ?? $ud, 'ejercicios' => 0, 'completado' => 0, 'en-progreso' => 0, 'horas' => 0.0];
        $tc = ['completado' => 0, 'en-progreso' => 0, 'pendiente' => 0, 'horas' => 0.0];
        $ejs = [];
        foreach ($t['ejercicios'] as $e) {
            $rel = $t['carpeta'] . '/' . $e['archivo'];
            $info = leerEjercicio($raiz . '/' . $rel);
            $estado = $info['estado'];
            $auto = false;
            if ($estado === 'pendiente' && $info['existe'] && $info['huella'] !== ($e['plantilla'] ?? '')) {
                $estado = 'en-progreso';
                $auto = true;
            }
            $total = (int) ($e['pasos'] ?? 0);
            $hechos = $estado === 'completado' ? $total : max(0, $total - $info['pendientes']);
            $ejs[] = array_merge($e, [
                'ruta' => $rel, 'estado' => $estado, 'auto' => $auto, 'horas' => $info['horas'],
                'pasos_hechos' => $hechos, 'existe' => $info['existe'], 'modificado' => $info['modificado'],
            ]);
            $tc[$estado]++;
            $tc['horas'] += $info['horas'];
            $tot[$estado]++;
            $tot['ejercicios']++;
            $tot['horas'] += $info['horas'];
            $uds[$ud]['ejercicios']++;
            $uds[$ud]['horas'] += $info['horas'];
            if ($estado !== 'pendiente') {
                $uds[$ud][$estado]++;
            }
        }
        $n = count($ejs);
        $estadoTarea = $tc['completado'] === $n ? 'completado' : ($tc['completado'] + $tc['en-progreso'] > 0 ? 'en-progreso' : 'pendiente');
        $dias = $t['fecha'] ? (int) round((strtotime($t['fecha']) - strtotime($hoy)) / 86400) : null;
        if ($dias !== null && $dias < 0 && $estadoTarea !== 'completado') {
            $estadoTarea = 'vencido';
        }
        $tareas[] = array_merge($t, [
            'ejercicios' => $ejs, 'resumen' => $tc, 'estado' => $estadoTarea, 'dias' => $dias,
            'pct' => $n ? (int) round($tc['completado'] * 100 / $n) : 0,
        ]);
    }

    // Cola de trabajo: 1º tareas con fecha a ≤ 7 días (o vencidas) sin terminar; 2º orden del curso.
    $urgentes = $resto = [];
    foreach ($tareas as $t) {
        if ($t['estado'] === 'completado') {
            continue;
        }
        foreach ($t['ejercicios'] as $e) {
            if ($e['estado'] === 'completado') {
                continue;
            }
            $item = ['tarea' => $t['id'], 'titulo_tarea' => $t['titulo'], 'n' => $e['n'], 'titulo' => $e['titulo'],
                     'ruta' => $e['ruta'], 'estado' => $e['estado'], 'dias' => $t['dias'], 'fecha' => $t['fecha']];
            if ($t['dias'] !== null && $t['dias'] <= 7) {
                $urgentes[] = $item;
            } else {
                $resto[] = $item;
            }
        }
    }
    // Dentro del orden normal, lo que ya está empezado va antes.
    usort($resto, fn($a, $b) => ($b['estado'] === 'en-progreso') <=> ($a['estado'] === 'en-progreso'));

    $entregas = array_values(array_filter($tareas, fn($t) => $t['fecha'] !== null));
    usort($entregas, fn($a, $b) => strcmp($a['fecha'], $b['fecha']));

    foreach ($uds as &$u) {
        $u['pct'] = $u['ejercicios'] ? (int) round($u['completado'] * 100 / $u['ejercicios']) : 0;
    }
    unset($u);

    $tot['pct'] = $tot['ejercicios'] ? (int) round($tot['completado'] * 100 / $tot['ejercicios']) : 0;

    return [
        'modulo' => $man['modulo'], 'hoy' => $hoy, 'tareas' => $tareas, 'uds' => array_values($uds),
        'totales' => $tot, 'cola' => array_merge($urgentes, $resto), 'entregas' => $entregas,
    ];
}

/** Barra de progreso en texto para Markdown. */
function barraTexto(int $pct, int $ancho = 20): string
{
    $llenos = (int) round($pct * $ancho / 100);
    return str_repeat('█', $llenos) . str_repeat('░', $ancho - $llenos);
}

/**
 * Genera PROGRESO.md y actualiza el bloque de progreso del README.
 * Es determinista (no depende de la fecha de hoy), para no generar commits vacíos.
 * Devuelve true si cambió algún fichero.
 */
function regenerarMarkdown(): bool
{
    $p = calcularProgreso();
    $t = $p['totales'];
    $icono = ['completado' => '✅', 'en-progreso' => '🟡', 'pendiente' => '⬜', 'vencido' => '🔴'];

    $md = "# 📊 Progreso · {$p['modulo']}\n\n";
    $md .= "> Fichero generado automáticamente a partir de la cabecera `@estado` / `@horas` de cada ejercicio. **No lo edites a mano.**\n>\n";
    $md .= "> Se regenera al usar `dashboard.php`, al hacer commit (hook) y en cada push (GitHub Action).\n\n";
    $md .= "| Global | Completados | En progreso | Pendientes | Horas |\n|---|:-:|:-:|:-:|:-:|\n";
    $md .= sprintf("| `%s` **%d %%** | %d / %d | %d | %d | %s h |\n\n",
        barraTexto($t['pct']), $t['pct'], $t['completado'], $t['ejercicios'], $t['en-progreso'], $t['pendiente'], fmtHoras($t['horas']));

    $md .= "## Por unidad\n\n| Unidad | Avance | % | Horas |\n|---|---|:-:|:-:|\n";
    foreach ($p['uds'] as $u) {
        $md .= sprintf("| **%s** · %s | `%s` | %d %% | %s |\n", $u['ud'], $u['nombre'], barraTexto($u['pct'], 15), $u['pct'], fmtHoras($u['horas']));
    }

    if ($p['entregas']) {
        $md .= "\n## Entregas con fecha\n\n| Tarea | Fecha límite | Estado |\n|---|---|---|\n";
        foreach ($p['entregas'] as $e) {
            $estado = $e['estado'] === 'vencido' ? 'pendiente' : $e['estado'];
            $md .= sprintf("| [%s · %s](%s/) | %s | %s %s |\n", $e['id'], $e['titulo'], $e['carpeta'],
                date('d/m/Y', strtotime($e['fecha'])), $icono[$estado], $estado);
        }
    }

    $md .= "\n## Detalle\n";
    $udActual = '';
    foreach ($p['tareas'] as $ta) {
        if ($ta['ud'] !== $udActual) {
            $udActual = $ta['ud'];
            $md .= "\n### {$udActual}\n\n| Tarea | Ejercicio | Estado | Pasos | Horas |\n|---|---|:-:|:-:|:-:|\n";
        }
        foreach ($ta['ejercicios'] as $e) {
            $pasos = $e['pasos'] ? "{$e['pasos_hechos']}/{$e['pasos']}" : '—';
            $md .= sprintf("| %s | [Ej. %d · %s](%s) | %s | %s | %s |\n",
                $e['n'] === 1 ? "**{$ta['id']}**" : '', $e['n'], $e['titulo'], $e['ruta'],
                $icono[$e['estado']] . ($e['auto'] ? '*' : ''), $pasos, fmtHoras($e['horas']));
        }
    }
    $md .= "\n<sub>✅ completado · 🟡 en progreso · ⬜ pendiente · \\* en progreso detectado automáticamente (el fichero ya no es la plantilla original)</sub>\n";

    $raiz = raizRepo();
    $cambio = escribirSiCambia("$raiz/PROGRESO.md", $md);

    // Bloque del README
    $readme = "$raiz/README.md";
    if (is_file($readme)) {
        $r = (string) file_get_contents($readme);
        $bloque = sprintf("<!-- PROGRESO:INICIO -->\n**Progreso:** `%s` **%d %%** · %d/%d ejercicios · %s h · [ver detalle](PROGRESO.md)\n<!-- PROGRESO:FIN -->",
            barraTexto($t['pct']), $t['pct'], $t['completado'], $t['ejercicios'], fmtHoras($t['horas']));
        $nuevo = preg_replace('/<!-- PROGRESO:INICIO -->.*?<!-- PROGRESO:FIN -->/s', $bloque, $r);
        $cambio = escribirSiCambia($readme, (string) $nuevo) || $cambio;
    }
    return $cambio;
}

function escribirSiCambia(string $ruta, string $contenido): bool
{
    $actual = is_file($ruta) ? str_replace("\r", '', (string) file_get_contents($ruta)) : null;
    if ($actual === $contenido) {
        return false;
    }
    return file_put_contents($ruta, $contenido) !== false;
}

function fmtHoras(float $h): string
{
    return rtrim(rtrim(number_format($h, 1, ',', ''), '0'), ',') ?: '0';
}
