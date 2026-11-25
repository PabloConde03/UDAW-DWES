<?php

/**
 * ========================================================================
 *  T2.1.2 · Ejercicio 1 — Secuencias de escape
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  completado      ← pendiente | en-progreso | completado
 *  @horas   0.5              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Entender cuándo se interpretan \n y \r y por qué no se ven en el
 *    navegador.
 *
 *  PISTAS
 *    · El navegador colapsa saltos de línea: el HTML solo salta con
 *      <br>.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Las comillas simples no interpretan \n; las dobles sí, pero el
 *    salto solo aparece en el código fuente, no en la página.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD2-Sintaxis-basica/T2.1.2-Sintaxis-basica-II/ej1-escapes.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>T2.1.2 · Ej. 1 — Secuencias de escape</title>
</head>

<body>
    <h1>T2.1.2 · Ej. 1 — Secuencias de escape</h1>

    <?php

    /*
 * ── MI PREDICCIÓN (escríbela ANTES de ejecutar) ──────────────────────
 * No iremos(marcado) solos
 * No iremos(marcado) solos
 * No iremos(marcado) solos
 * No iremos(marcado) solos
 *
 * ── RESULTADO REAL Y POR QUÉ ──────────────────────────────────────────
 * Las etiquetas se aplican con print sin embargo echo escribe la etiqueta tal cual
 *
 */

    // ── Código del enunciado ──

    print("No\n\r iremos \n\rsolos");
    echo "<br/>";
    print('No\n\r iremos \nsolos');
    echo "<br/>";
    echo "No\n\r iremos \n\rsolos";
    echo "<br/>";
    echo 'No\n iremos \nsolos';

    // TODO 1: Predicción de lo que se ve en el navegador.
    echo "<br>";
    echo "Las propiedades como /n o /r se aplican con print echo tal solo las imprime en pantalla <br>";

    // TODO 2: Ejecuta y mira también el código fuente (Ctrl+U).

    echo "En la consola pasa exactamente lo mismo...";
    ?>

</body>

</html>
