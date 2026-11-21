<?php

/**
 * ========================================================================
 *  T2.1.1 · Ejercicio 2 — phpinfo()
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Ejecutar phpinfo() y saber localizar datos clave de la
 *    configuración.
 *
 *  PISTAS
 *    · Busca con Ctrl+F 'Loaded Configuration File'.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Abrir el .php como file:///... — el navegador no lo interpreta;
 *    tiene que pasar por Apache.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD2-Sintaxis-basica/T2.1.1-Sintaxis-basica-I/ej2-phpinfo.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>T2.1.1 · Ej. 2 — phpinfo()</title>
</head>

<body>
    <h1>T2.1.1 · Ej. 2 — phpinfo()</h1>

    <?php

    // TODO 1: Copia el código del enunciado y ábrelo desde
    //         http://localhost (no con doble clic).
    phpinfo()

    // TODO 2: Localiza: versión de PHP, ruta de php.ini cargado,
    //         upload_max_filesize, post_max_size, extensión mbstring.

    // TODO 3: Anota esos valores en el bloque RESPUESTAS de abajo.

    ?>
</body>

</html>
