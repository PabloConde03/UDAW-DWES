<?php
/**
 * ========================================================================
 *  T3.3.2 · Ejercicio 4 — Email corporativo a partir del nombre
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Construir el email con las iniciales, sin tildes.
 *
 *  PISTAS
 *    · explode o preg_split('/\s+/') · mb_substr($p, 0, 1) · strtr con
 *      un mapa de tildes.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Usar $palabra[0] con 'Álvaro': devuelve medio carácter UTF-8 (un
 *    byte suelto).
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD3-Control-arrays-cadenas-funciones/T3.3.2-Funciones-II/ej4-email.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T3.3.2 · Ej. 4 — Email corporativo a partir del nombre</title>
</head>
<body>
<h1>T3.3.2 · Ej. 4 — Email corporativo a partir del nombre</h1>

<?php

// TODO 1: Divide el nombre completo en palabras.

// TODO 2: Coge la primera letra de cada una en minúsculas.

// TODO 3: Quita las tildes.

// TODO 4: Añade @empresa.es.

?>
</body>
</html>
