<?php

/**
 * ========================================================================
 *  T2.1.1 · Ejercicio 6 — Operadores aritméticos
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  completado      ← pendiente | en-progreso | completado
 *  @horas   0.5              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Predecir valor y tipo de cada expresión.
 *
 *  PISTAS
 *    · var_dump muestra tipo y valor: int(1) / float(1.25).
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    5/4 en PHP NO es división entera (≠ Java): devuelve float 1.25. Y
 *    100/2*5 se evalúa de izquierda a derecha.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD2-Sintaxis-basica/T2.1.1-Sintaxis-basica-I/ej6-aritmetica.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>T2.1.1 · Ej. 6 — Operadores aritméticos</title>
</head>

<body>
    <h1>T2.1.1 · Ej. 6 — Operadores aritméticos</h1>

    <?php

    /*
── MI PREDICCIÓN (escríbela ANTES de ejecutar) ──────────────────────
a = 1
b = 1.25
c = 1.25
d = 250
── RESULTADO REAL Y POR QUÉ ──────────────────────────────────────────
a = int(1)       b = float(1.25)       c = float(1.25)       d = int(250)

1. El operador / NO hace división entera (a diferencia de Java):
    5 / 4 da 1.25 aunque los dos operandos sean int. Por eso $b y $c
    son iguales: escribir 5.0 / 4.0 no cambia nada.

2. / devuelve int solo si los dos operandos son int y la división
    es exacta. En cualquier otro caso devuelve float:
    10 / 2   → int(5)
    100 / 3  → float(33.333...)
    $d: / y * tienen la misma precedencia y se evalúan de izquierda
     a derecha: (100 / 2) = int(50) → 50 * 5 = int(250).

3. El operador % SIEMPRE devuelve int: antes de operar convierte
    los operandos a entero truncando los decimales.
    13.9 % 3 → 13 % 3 → int(1)
    (En PHP 8.1+ da además un aviso Deprecated porque se pierden los
    decimales). Para el resto de dos floats se usa fmod(13.9, 3).
 */

    // ── Código del enunciado ──

    $a = 13 % 3;
    $b = 5 / 4;
    $c = 5.0 / 4.0;
    $d = 100 / 2 * 5;

    echo "Los resultados son: <br>
    a = " . $a . "<br>
    b = " . $b . "<br>
    c = " . $c . "<br>
    d = " . $d . "<br>
    =================== <br>";


    // TODO 1: Predicción de valor Y tipo de $a..$d.

    // a = int
    // b = float
    // c = float
    // d = int

    // TODO 2: Ejecuta mostrando cada uno con var_dump().

    echo "Las variables son de tipo: <br>
    a = ";
    var_dump($a);
    echo "<br>";
    echo "b = ";
    var_dump($b);
    echo "<br>";
    echo "c = ";
    var_dump($c);
    echo "<br>";
    echo "d = ";
    var_dump($d);
    echo " <br> =================== <br>";

    /* TODO 3: Compara y explica las diferencias.
── RESULTADO REAL Y POR QUÉ ──────────────────────────────────────────
a = int(1)       b = float(1.25)       c = float(1.25)       d = int(250)

1. El operador / NO hace división entera (a diferencia de Java):
5 / 4 da 1.25 aunque los dos operandos sean int. Por eso $b y $c
son iguales: escribir 5.0 / 4.0 no cambia nada.

2. / devuelve int solo si los dos operandos son int y la división
es exacta. En cualquier otro caso devuelve float:
10 / 2   → int(5)
100 / 3  → float(33.333...)
$d: / y * tienen la misma precedencia y se evalúan de izquierda
 a derecha: (100 / 2) = int(50) → 50 * 5 = int(250).


3. El operador % SIEMPRE devuelve int: antes de operar convierte
los operandos a entero truncando los decimales.
13.9 % 3 → 13 % 3 → int(1)
(En PHP 8.1+ da además un aviso Deprecated porque se pierden los
decimales). Para el resto de dos floats se usa fmod(13.9, 3).
 */

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
        <p class="ok">✔ Predicción final correcta en valores y tipos, y bien comprobada con var_dump().</p>
        <p class="ko">✖ Solo orden: el texto de «RESULTADO REAL Y POR QUÉ» está pegado dos veces (arriba y en el TODO 3).
            Deja uno, en el bloque de arriba.</p>
        <p>Recuerda que el primer intento tenía <code>c = 1.2</code>, <code>PHP.EOL</code> en lugar de <code>PHP_EOL</code> y
            cadenas sin <code>echo</code>. Esos tres son los errores típicos de examen.</p>
        <div class="regla"><b>Trucos de examen:</b>
            <ul>
                <li><code>/</code> puede devolver int <b>o</b> float. <code>%</code> siempre devuelve int.</li>
                <li>División entera: <code>intdiv(7, 2)</code> da <code>3</code>.</li>
                <li><code>var_dump()</code> imprime directamente y no se puede concatenar en un <code>echo</code>.
                    <code>print_r($x, true)</code> sí devuelve la cadena.</li>
                <li>Una cadena suelta sin <code>echo</code> (<code>"texto" . $a;</code>) es válida y no imprime nada.</li>
            </ul></div>
    </section>
</body>

</html>
