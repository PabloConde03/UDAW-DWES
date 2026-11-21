<?php
/**
 * ========================================================================
 *  T4.1.0 · Ejercicio 6 — Subida con validación MIME
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Aceptar solo imágenes o PDF y moverlos a su carpeta.
 *
 *  PISTAS
 *    · mime_content_type($tmp) o finfo_file — no te fíes de
 *      $_FILES['x']['type'] (lo manda el cliente).
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Validar por extensión o por $_FILES['type']: ambos los controla el
 *    usuario.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD4-Formularios-cookies-sesiones/T4.1.0-Formularios-sencillos-y-funciones/ej6-mime.php
 * ========================================================================
 */

// ── 1. LÓGICA (antes de cualquier salida: cookies, sesión, redirecciones) ──

// TODO 1: Comprueba el error de subida (UPLOAD_ERR_OK).

// TODO 2: Obtén el MIME REAL del fichero.

// TODO 3: Según el tipo, move_uploaded_file a PDF/ o IMG/.

// TODO 4: Prueba renombrando extensiones.

// ── 2. VISTA ──
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T4.1.0 · Ej. 6 — Subida con validación MIME</title>
</head>
<body>

    <!-- Tu HTML aquí -->

</body>
</html>
