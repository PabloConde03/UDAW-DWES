<?php
/**
 * ========================================================================
 *  T2.1.2 · Ejercicio 5 — Tipado dinámico en operaciones
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Predecir resultados y tipos al mezclar int, float, bool y string.
 *
 *  PISTAS
 *    · true se convierte en 1 y false en 0 en operaciones aritméticas.
 *    · Un int/int no exacto devuelve float.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    En PHP 8, 100 + 'Hola' lanza TypeError (Unsupported operand types
 *    / non-numeric). En PHP 7 era un Warning y valía 100.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD2-Sintaxis-basica/T2.1.2-Sintaxis-basica-II/ej5-tipado.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T2.1.2 · Ej. 5 — Tipado dinámico en operaciones</title>
</head>
<body>
<h1>T2.1.2 · Ej. 5 — Tipado dinámico en operaciones</h1>

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

print("<br/>División entre enteros: " . (5/2));
$r = $a + $d;
$r = $c + $b;
print("<br/>El valor de r es: " . $r);
$c = true;
$r = $c + $b + 5;
print("<br/>El valor de r es: " . $r);
print("<br/>r es de tipo: " . gettype(($r)));
$r = $a + 10;
print("<br/>r es de tipo: " . gettype(($r)));
$r = $a / 10;
print("<br/>r es de tipo: " . gettype(($r)));
$r = $a / 3;
print("<br/>r es de tipo: " . gettype(($r)));

// TODO 1: Reutiliza las variables del ejercicio 4.

// TODO 2: Predicción línea a línea (valor y tipo).

// TODO 3: Ejecuta. ¿Qué pasa en $a + $d en PHP 8? Anota el error
//         exacto.

?>
</body>
</html>
