<?php
/**
 * ========================================================================
 *  T3.2.1 · Ejercicio 1 — Array de días
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Predecir el acceso y la modificación de un array indexado.
 *
 *  PISTAS
 *    · Asignar a un índice existente SOBRESCRIBE; a uno nuevo lo AÑADE.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Pensar que $dia[7] falla por estar 'fuera de rango': en PHP los
 *    arrays crecen solos.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD3-Control-arrays-cadenas-funciones/T3.2.1-Arrays-I/ej1-dias.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T3.2.1 · Ej. 1 — Array de días</title>
</head>
<body>
<h1>T3.2.1 · Ej. 1 — Array de días</h1>

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

$dia = array("domingo", "lunes", "martes", "miercoles", "jueves", "viernes", "sabado");
echo $dia[0];
$dia[5] = "viernes";
print_r($dia);
$dia[7] = "viernes";
print_r($dia);

// TODO 1: Predicción de cada apartado.

// TODO 2: Ejecuta con print_r dentro de <pre>.

?>
</body>
</html>
