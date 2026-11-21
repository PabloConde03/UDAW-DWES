<?php
/**
 * ========================================================================
 *  T4.3.1 · Ejercicio 1 — crearCookies() + informacion.php
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Persistir el registro en cookies y leerlo desde otra página.
 *
 *  PISTAS
 *    · setcookie(nombre, valor, time() + segundos).
 *    · La cookie no aparece en $_COOKIE hasta la SIGUIENTE petición.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    'Headers already sent': setcookie después de un echo o de HTML
 *    (¡incluido un espacio antes de <?php!).
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD4-Formularios-cookies-sesiones/T4.3.1-Usuarios-cookies/registro.php
 * ========================================================================
 */

// ── 1. LÓGICA (antes de cualquier salida: cookies, sesión, redirecciones) ──

// TODO 1: Parte de tu T4.2.1.

// TODO 2: Si el formulario es válido → crearCookies() ANTES de
//         cualquier salida HTML.

// TODO 3: Una cookie por campo (los arrays, con implode).

// TODO 4: informacion.php: si no existen las cookies, no muestres
//         datos.

// TODO 5: Haz las 3 capturas.

// ── 2. VISTA ──
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T4.3.1 · Ej. 1 — crearCookies() + informacion.php</title>
</head>
<body>

    <!-- Tu HTML aquí -->

</body>
</html>
