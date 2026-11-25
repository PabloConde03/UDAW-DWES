<?php

/**
 * ========================================================================
 *  T2.1.2 · Ejercicio 3b (EXTRA) — Reto tipo examen: comillas y escapes
 *  Enunciado: este mismo fichero (no está en el README)
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Comprobar si dominas la idea de los ej. 1-3: comillas simples vs
 *    dobles (capa PHP) y colapso de espacios / <pre> (capa navegador).
 *
 *  REGLAS (como en el test del examen)
 *    · 15 minutos, en papel o en el bloque de abajo. SIN ejecutar.
 *    · Para cada reto escribe:
 *        PÁGINA → lo que se ve en el navegador
 *        FUENTE → lo que hay en Ctrl+U (solo si es distinto)
 *    · Cuando acabes, ejecuta y corrige tú mismo. Luego pide «corrige».
 *    · Aprobado: 7/10 (R1-R8 valen 1 punto; R9 vale 2).
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD2-Sintaxis-basica/T2.1.2-Sintaxis-basica-II/ej3b-reto-comillas.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>T2.1.2 · Ej. 3b — Reto comillas y escapes</title>
</head>

<body>
    <h1>T2.1.2 · Ej. 3b — Reto comillas y escapes</h1>

    <?php

    /*
 * ── MIS RESPUESTAS (ANTES de ejecutar) ───────────────────────────────
 *  R1 PÁGINA: Tengo $n\tgatos
 *  R2 PÁGINA: Tengo 3  gatos   FUENTE:
 *  R3 strlen A: a   b n         strlen B: a\tb\n
 *  R4 PÁGINA: Ruta: C: ew  able
 *  R5 PÁGINA: se aplicaría cada propiedad pero no sabría que impreme, la variable porsupuesto que no
 *  R6 PÁGINA: A    B C
 *  R7 PÁGINA: Aparece error de variable vacia           ¿Qué más aparece y el script sigue o se para?
 *  R8 PÁGINA: Uno\nDos
 *  R9 (código corregido):
 *
 * ── CORRECCIÓN TRAS EJECUTAR (aciertos y por qué fallé) ──────────────
 *
 *
 */

    $n = 3;

    // R1
    echo "<hr>R1: ";
    echo 'Tengo $n\tgatos';

    // R2
    echo "<hr>R2: ";
    echo "Tengo $n\tgatos";

    // R3 · ¿Qué devuelve cada strlen?
    echo "<hr>R3: ";
    echo strlen("a\tb\n") . " / " . strlen('a\tb\n');

    // R4 · Ojo: es una ruta de Windows
    echo "<hr>R4: ";
    echo "Ruta: C:\new\table";

    // R5
    echo "<hr>R5: ";
    echo 'It\'s ' . "\"ok\" \$n";

    // R6
    echo "<hr>R6: ";
    echo "<pre>A\tB\nC</pre>";

    // R7 · $nombre no existe
    echo "<hr>R7: ";
    echo "Hola $nombre.";

    // R8
    echo "<hr>R8: ";
    echo "<pre>" . 'Uno\nDos' . "</pre>";

    // R9 · DEPURACIÓN (2 pt)
    //   Se quiere que la página muestre EXACTAMENTE estas dos líneas:
    //       strlen($s) = 5
    //       Fin
    //   Este código no lo consigue. Di los DOS fallos y escribe la versión
    //   correcta (sin usar <pre>).
    echo "<hr>R9: ";
    $s = "hola!";
    echo 'strlen($s) = '  . strlen($s) . "<br>";
    echo "Fin";

    ?>
</body>

</html>
