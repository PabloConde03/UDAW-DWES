<?php
/**
 * ========================================================================
 *  T3.2.1 · Ejercicio 2 — Claves explícitas e implícitas
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Predecir qué clave recibe cada elemento.
 *
 *  PISTAS
 *    · Un elemento sin clave recibe (mayor clave entera usada hasta ese
 *      momento) + 1.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Contar posiciones en vez de claves: 'd' NO va a la posición 3.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD3-Control-arrays-cadenas-funciones/T3.2.1-Arrays-I/ej2-claves.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T3.2.1 · Ej. 2 — Claves explícitas e implícitas</title>
</head>
<body>
<h1>T3.2.1 · Ej. 2 — Claves explícitas e implícitas</h1>

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

$a = array(
    'a',
    3 => 'b',
    1 => 'c',
    'd'
);
echo $a[2];
echo $a[4];

// TODO 1: Predice el array completo (clave => valor).

// TODO 2: Responde $a[2] y $a[4].

// TODO 3: Comprueba con print_r.

?>
</body>
</html>
