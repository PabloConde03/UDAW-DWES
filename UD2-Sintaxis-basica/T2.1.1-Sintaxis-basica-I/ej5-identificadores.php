<?php

/**
 * ========================================================================
 *  T2.1.1 · Ejercicio 5 — Identificadores válidos
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  completado      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Decidir qué identificadores son válidos y justificar la regla.
 *
 *  PISTAS
 *    · Regla: $ + letra o _ , después letras, dígitos o _.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Pensar que un error de sintaxis afecta solo a su línea: el parser
 *    rechaza el fichero entero (Parse error).
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD2-Sintaxis-basica/T2.1.1-Sintaxis-basica-I/ej5-identificadores.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>T2.1.1 · Ej. 5 — Identificadores válidos</title>
</head>

<body>
    <h1>T2.1.1 · Ej. 5 — Identificadores válidos</h1>

    <?php

    /*
 * ── MI PREDICCIÓN (escríbela ANTES de ejecutar) ──────────────────────
 *
 *
 * ── RESULTADO REAL Y POR QUÉ ──────────────────────────────────────────
 *
 *
 */

    // ── Código del enunciado ──

    // Descomenta de una en una:
    // $rayos-x = 0;
    // $2SiONo2Tan = 0;
    // $ElCorderito's = 0;
    // $Tanto Monta = 0;

    // TODO 1: Escribe tu predicción (válido / no válido + motivo) ANTES de
    //         probar.

    // TODO 2: Prueba cada línea por separado (un error de sintaxis detiene
    //         todo el script).
    // No los escribo directamente porque no funcionan pero los escribo corregidos

    $rayosX = 0;
    $SiONo2Tan = 0;
    $ElCorderito = 0;
    $TantoMonta = 0;



    // TODO 3: Escribe la regla general de nombres de variable en PHP.
    //No pueden llevar guion ni guion bajo, no pueden empezar con numero, llevar a apóstrofe o contener espacios por eso se usa CamellCase en las variables.

    ?>
</body>

</html>
