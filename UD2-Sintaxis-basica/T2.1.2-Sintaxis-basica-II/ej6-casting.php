<?php
/**
 * ========================================================================
 *  T2.1.2 · Ejercicio 6 — Casting
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Predecir el valor y el tipo tras cada conversión forzada.
 *
 *  PISTAS
 *    · (int) de un string toma los dígitos iniciales; si no hay, 0.
 *    · (bool) de un número: solo 0 y 0.0 son false.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Creer que (int)4.123 redondea: TRUNCA hacia cero.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD2-Sintaxis-basica/T2.1.2-Sintaxis-basica-II/ej6-casting.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T2.1.2 · Ej. 6 — Casting</title>
</head>
<body>
<h1>T2.1.2 · Ej. 6 — Casting</h1>

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

$d = "Hola";
$r = (integer)$d;
$r = (integer)"Pedro";
$r = (integer)4.123;
$r = (boolean)4.123;

// TODO 1: Predicción de las 4 conversiones.

// TODO 2: Comprueba cada una con var_dump().

?>
</body>
</html>
