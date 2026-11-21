<?php
/**
 * ========================================================================
 *  T4.3.3 · Ejercicio 1 — Ahorcado con sesión + cookie de usuario + vídeo
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Rehacer el ahorcado guardando el estado en el servidor, sin campos
 *    hidden, y añadir una cookie de una semana con nombre y nivel.
 *
 *  PISTAS
 *    · Comparar sin tildes: strtr($s, 'áéíóú', 'aeiou') NO funciona con
 *      UTF-8 → usa un array asociativo con strtr($s, ['á'=>'a', ...]).
 *    · 7 días: time() + 7*24*60*60.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Confirmar con el profesor la línea 'No utilizar Sesiones'
 *    (contradice el título). Y no dejes la palabra visible en el HTML.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD4-Formularios-cookies-sesiones/T4.3.3-Ahorcado-sesiones/index.php
 * ========================================================================
 */

// ── 1. LÓGICA (antes de cualquier salida: cookies, sesión, redirecciones) ──

// TODO 1: Copia tus funciones de T4.2.2 a funciones.php.

// TODO 2: Estado de la partida en $_SESSION (palabra, vidas,
//         destapadas).

// TODO 3: Normaliza las letras: mayúsculas/minúsculas y vocales con
//         tilde (á = a).

// TODO 4: Botón Salir → pantalla de despedida + session_destroy().

// TODO 5: Campo nombre + nivel → setcookie de 7 días; si existe:
//         'Bienvenido de nuevo X' + nivel preseleccionado.

// TODO 6: Graba el vídeo: ganar, perder, segunda visita con cookie y 2
//         fragmentos de código.

// TODO 7: Entrega: .zip + .mp4 antes del 10/12 23:59.

// ── 2. VISTA ──
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T4.3.3 · Ej. 1 — Ahorcado con sesión + cookie de usuario + vídeo</title>
</head>
<body>

    <!-- Tu HTML aquí -->

</body>
</html>
