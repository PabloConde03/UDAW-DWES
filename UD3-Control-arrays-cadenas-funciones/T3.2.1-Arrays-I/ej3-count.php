<?php
/**
 * ========================================================================
 *  T3.2.1 · Ejercicio 3 — count e índice inexistente
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Ver qué pasa al repetir claves y al acceder a un índice que no
 *    existe.
 *
 *  PISTAS
 *    · Una clave repetida sobrescribe el valor; no añade elemento.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    En PHP 8 el acceso a índice inexistente da Warning 'Undefined
 *    array key' y devuelve null (no detiene el script).
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD3-Control-arrays-cadenas-funciones/T3.2.1-Arrays-I/ej3-count.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T3.2.1 · Ej. 3 — count e índice inexistente</title>
</head>
<body>
<h1>T3.2.1 · Ej. 3 — count e índice inexistente</h1>

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

$x = array("A", "B", 1 => "C", "D", 2 => "E");
echo count($x);
$cualificacions = array(9.8, 6.1, 3.8);
echo $cualificacions[10];

// TODO 1: Predice count($x) dibujando el array.

// TODO 2: Predice el resultado de $cualificacions[10].

// TODO 3: Comprueba y anota el mensaje exacto.

?>
</body>
</html>
