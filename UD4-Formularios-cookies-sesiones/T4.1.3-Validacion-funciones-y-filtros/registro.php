<?php
/**
 * ========================================================================
 *  T4.1.3 · Ejercicio 1 — Validación con filtros
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Validar en el servidor contraseña, edad, fecha, email, URL e IP.
 *
 *  PISTAS
 *    · filter_var($edad, FILTER_VALIDATE_INT, ['options' =>
 *      ['min_range' => 0, 'max_range' => 130]])
 *    · checkdate(mes, dia, anio) — ¡ese orden!
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    filter_var devuelve el valor validado o false; con edad '0'
 *    comprueba con === false, no con !.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD4-Formularios-cookies-sesiones/T4.1.3-Validacion-funciones-y-filtros/registro.php
 * ========================================================================
 */

// ── 1. LÓGICA (antes de cualquier salida: cookies, sesión, redirecciones) ──

// TODO 1: Parte de tu T4.1.2.

// TODO 2: Contraseña: mb_strlen ≥ 6.

// TODO 3: Edad: FILTER_VALIDATE_INT con min_range/max_range.

// TODO 4: Fecha dd/mm/aaaa: separa y valida con checkdate().

// TODO 5: Email, URL, IP: filter_var con su filtro.

// TODO 6: Haz las 2 capturas.

// ── 2. VISTA ──
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T4.1.3 · Ej. 1 — Validación con filtros</title>
</head>
<body>

    <!-- Tu HTML aquí -->

</body>
</html>
