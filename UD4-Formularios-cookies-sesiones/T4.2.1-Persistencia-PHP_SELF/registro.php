<?php
/**
 * ========================================================================
 *  T4.2.1 · Ejercicio 1 — Formulario autoprocesado
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Un único fichero que muestra, valida y repinta el formulario con
 *    los valores introducidos.
 *
 *  PISTAS
 *    · Para select/radio/checkbox repinta con selected/checked según lo
 *      recibido.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Escribir el PHP_SELF sin htmlspecialchars → XSS por la URL. Es
 *    pregunta típica de examen.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD4-Formularios-cookies-sesiones/T4.2.1-Persistencia-PHP_SELF/registro.php
 * ========================================================================
 */

// ── 1. LÓGICA (antes de cualquier salida: cookies, sesión, redirecciones) ──

// TODO 1: Estructura: si no hay POST → incForm() vacío; si hay POST y
//         hay errores → incForm() con los valores; si no hay errores →
//         mostrarValores().

// TODO 2: action con htmlspecialchars($_SERVER['PHP_SELF']).

// TODO 3: Rellena value='' con lo recibido (excepto contraseña y
//         currículo).

// TODO 4: Muestra 5 elementos de $_SERVER.

// TODO 5: Haz las capturas.

// ── 2. VISTA ──
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T4.2.1 · Ej. 1 — Formulario autoprocesado</title>
</head>
<body>

    <!-- Tu HTML aquí -->

</body>
</html>
