<?php
/**
 * ========================================================================
 *  T2.1.2 · Ejercicio 3 — Etiqueta <pre>
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Ver cómo <pre> respeta espacios y saltos.
 *
 *  PISTAS
 *    · <pre> muestra el texto tal cual, incluidos \n y \t reales.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Pensar que <pre> convierte '\n' literal (comillas simples) en
 *    salto: solo respeta saltos REALES.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD2-Sintaxis-basica/T2.1.2-Sintaxis-basica-II/ej3-pre.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T2.1.2 · Ej. 3 — Etiqueta <pre></title>
</head>
<body>
<h1>T2.1.2 · Ej. 3 — Etiqueta <pre></h1>

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

echo "<pre>";
echo "<br/>";
echo 'No\n iremos \nsolos';
echo "<br/>";
echo $cadena;
echo "</pre>";

// TODO 1: Define también $cadena del ejercicio 2 (si no, aviso de
//         variable indefinida).

// TODO 2: Predicción y comprobación.

?>
</body>
</html>
