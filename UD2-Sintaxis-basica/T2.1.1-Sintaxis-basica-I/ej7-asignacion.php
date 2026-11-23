<?php

/**
 * ========================================================================
 *  T2.1.1 · Ejercicio 7 — Operadores de asignación
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  completado      ← pendiente | en-progreso | completado
 *  @horas   0.5              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Seguir el valor de $a línea a línea.
 *
 *  PISTAS
 *    · $a += 3 equivale a $a = $a + 3.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Olvidar que cada operación parte del valor ACTUAL, no del inicial.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD2-Sintaxis-basica/T2.1.1-Sintaxis-basica-I/ej7-asignacion.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>T2.1.1 · Ej. 7 — Operadores de asignación</title>
</head>

<body>
    <h1>T2.1.1 · Ej. 7 — Operadores de asignación</h1>

    <?php

    /*
── MI PREDICCIÓN (escríbela ANTES de ejecutar) ──────────────────────
a = 5
a = 3
a = 4
── RESULTADO REAL Y POR QUÉ ──────────────────────────────────────────
a = 5
a = 8
a = 16
(La prediccion que hice esta mal porque no caí en que un operador con un = equivale a la operación sobre el valor asignado)
 */

    // ── Código del enunciado ──

    $a = 5;
    $a += 3;
    $a *= 2;

    // TODO 1: Comprueba con echo tras cada línea.
    $a = 5;
    echo " a = 5 equivale a " . $a . "<br>";
    $a += 3;
    echo " a += 3 equivale a " . $a . "<br>";
    $a *= 2;
    echo " a *= 2 equivale a " . $a . "<br>";


    ?>
    <style>
        .revision { font-family: Arial, sans-serif; max-width: 900px; margin-top: 30px; border-top: 3px solid #2563eb; padding-top: 10px; }
        .revision code { background: #f1f5f9; padding: 1px 5px; border-radius: 4px; }
        .revision pre { background: #0f172a; color: #e2e8f0; padding: 12px 14px; border-radius: 8px; line-height: 1.5; }
        .revision .ok { color: #166534; font-weight: bold; }
        .revision .ko { color: #991b1b; font-weight: bold; }
        .revision .regla { background: #eff6ff; border-left: 4px solid #2563eb; padding: 10px 14px; margin: 15px 0; }
        .revision .aviso { background: #fef3c7; border-left: 4px solid #d97706; padding: 10px 14px; margin: 15px 0; }
    </style>
    <section class="revision">
        <h2>Revisión · qué falla y trucos de examen</h2>
        <p class="ok">✔ Resultado bien comprobado y bien explicado.</p>
        <p class="ko">✖ La predicción (5, 3, 4) muestra que leíste <code>+=</code> como «asigna 3».</p>
<pre>$a = 5;    // 5
$a += 3;   // $a = $a + 3  → 8
$a *= 2;   // $a = $a * 2  → 16   (parte del 8, NO del 5 inicial)</pre>
        <div class="aviso"><b>⚠ La trampa que más cae: <code>=+</code> frente a <code>+=</code>.</b>
<pre>$a = 5;
$a =+ 3;   // NO suma: es  $a = (+3)  → 3
$a += 3;   // suma:        $a = $a + 3</pre>
            Tu predicción (<code>a = 3</code>) es justo lo que hace <code>=+</code>. Si en el examen ves <code>=+</code>, es una trampa.</div>
        <div class="regla"><b>Más operadores de asignación que entran:</b> <code>-=</code>, <code>/=</code>, <code>%=</code>,
            <code>**=</code> y, en cadenas, <code>.=</code> (<code>$s .= "hola"</code> equivale a <code>$s = $s . "hola"</code>).
            Ojo también con <code>$a++</code> (devuelve el valor <b>antes</b> de sumar) frente a <code>++$a</code> (después).</div>
    </section>
</body>

</html>
