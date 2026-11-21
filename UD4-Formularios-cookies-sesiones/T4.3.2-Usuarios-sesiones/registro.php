<?php
/**
 * ========================================================================
 *  T4.3.2 · Ejercicio 1 — crearSesion() + informacion.php
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Persistir el registro en $_SESSION con un nombre de sesión
 *    personalizado.
 *
 *  PISTAS
 *    · session_name() debe llamarse ANTES de session_start(), en TODAS
 *      las páginas.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Poner session_name solo en registro.php: informacion.php abre otra
 *    sesión (PHPSESSID) y la ve vacía.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD4-Formularios-cookies-sesiones/T4.3.2-Usuarios-sesiones/registro.php
 * ========================================================================
 */

// ── 1. LÓGICA (antes de cualquier salida: cookies, sesión, redirecciones) ──

// TODO 1: Parte de tu T4.3.1.

// TODO 2: crearSesion(): session_name('...') + session_start() +
//         volcar los campos en $_SESSION.

// TODO 3: informacion.php: MISMO session_name antes de session_start.

// TODO 4: Controla las claves que no existen.

// TODO 5: Haz las 3 capturas.

// ── 2. VISTA ──
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T4.3.2 · Ej. 1 — crearSesion() + informacion.php</title>
</head>
<body>

    <!-- Tu HTML aquí -->

</body>
</html>
