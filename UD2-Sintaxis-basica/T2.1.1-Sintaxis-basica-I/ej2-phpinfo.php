<?php

/**
 * ========================================================================
 *  T2.1.1 · Ejercicio 2 — phpinfo()
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  completado      ← pendiente | en-progreso | completado
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
    <style>
        .revision { font-family: Arial, sans-serif; max-width: 900px; margin-top: 30px; border-top: 3px solid #2563eb; padding-top: 10px; }
        .revision code { background: #f1f5f9; padding: 1px 5px; border-radius: 4px; }
        .revision pre { background: #0f172a; color: #e2e8f0; padding: 12px 14px; border-radius: 8px; line-height: 1.5; }
        .revision .ok { color: #166534; font-weight: bold; }
        .revision .ko { color: #991b1b; font-weight: bold; }
        .revision .regla { background: #eff6ff; border-left: 4px solid #2563eb; padding: 10px 14px; margin: 15px 0; }
        .revision .aviso { background: #fef3c7; border-left: 4px solid #d97706; padding: 10px 14px; margin: 15px 0; }
    </style>
    <section class="revision">
        <h2>Revisión · qué falla y trucos de examen</h2>
        <p class="ok">✔ phpinfo() se ejecuta y lo abres desde localhost.</p>
        <p class="ko">✖ Está marcado como completado, pero faltan los TODO 2 y 3.</p>
        <p>No has anotado los datos que pide el ejercicio. Búscalos con Ctrl+F en esta misma página y escríbelos en un comentario:</p>
        <ul>
            <li><b>PHP Version</b></li>
            <li><b>Loaded Configuration File</b>: la ruta del php.ini que se está usando de verdad</li>
            <li><b>upload_max_filesize</b> y <b>post_max_size</b>: los vas a necesitar en T4.1.0 (ejercicios 5 y 7, subida de ficheros)</li>
            <li>Si aparece la sección <b>mbstring</b>: la necesitas para las funciones <code>mb_*</code> de T3.2.4</li>
        </ul>
        <div class="aviso"><b>⚠ Detalle:</b> <code>phpinfo()</code> no lleva <code>;</code>. Funciona solo porque es la última
            sentencia antes de <code>?&gt;</code>, que cierra la instrucción por ti. Si añades otra línea debajo, da
            <b>Parse error</b>. Acostúmbrate a poner siempre el <code>;</code>.</div>
        <div class="regla"><b>Truco de examen:</b> si te preguntan por qué no se sube un fichero grande, la respuesta está en
            <code>upload_max_filesize</code> y <code>post_max_size</code> del php.ini. Si el fichero supera <code>post_max_size</code>,
            <code>$_POST</code> y <code>$_FILES</code> llegan vacíos y no sale ningún error.</div>
    </section>
</body>

</html>
