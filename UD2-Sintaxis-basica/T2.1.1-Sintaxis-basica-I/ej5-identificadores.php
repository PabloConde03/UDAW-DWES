<?php

/**
 * ========================================================================
 *  T2.1.1 · Ejercicio 5 — Identificadores válidos
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  completado      ← pendiente | en-progreso | completado
 *  @horas   0.5              ← horas dedicadas (admite 1.5)
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
        <p class="ko">✖ Falta la predicción y no has probado las líneas (TODO 1 y 2).</p>
        <p>Corregir los nombres está bien, pero el ejercicio pide <b>decir cuál falla y por qué</b>. Ponlas aquí abajo, una a una,
            y anota el error: con cada una verás un <code>Parse error</code> distinto.</p>
        <p class="ko">✖ Tu regla tiene un error importante: el <b>guion bajo SÍ está permitido</b>.
            <code>$mi_variable</code> y <code>$_nombre</code> son válidas. Lo que no vale es el guion medio <code>-</code>.</p>
<pre>$rayos-x       → NO: PHP lo lee como $rayos - x (una resta). No se puede asignar a una resta.
$2SiONo2Tan    → NO: después del $ no puede ir un número.
$ElCorderito's → NO: el apóstrofe abre una cadena que nunca se cierra.
$Tanto Monta   → NO: el espacio corta el nombre en dos tokens.</pre>
        <div class="regla"><b>Regla para el examen:</b> <code>$</code> + <b>letra o guion bajo</b> + letras, números o guiones bajos.
            Distingue mayúsculas (<code>$Nombre ≠ $nombre</code>). Las letras con tilde o la ñ también se aceptan
            (<code>$año</code>), aunque mejor no usarlas.<br>
            <b>camelCase es una convención</b>, no una obligación. Tampoco es la única: en PHP también es habitual <code>$snake_case</code>.</div>
    </section>
</body>

</html>
