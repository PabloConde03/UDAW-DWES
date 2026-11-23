<?php

/**
 * ========================================================================
 *  T2.1.1 · Ejercicio 4 — Nombre y apellido
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  completado      ← pendiente | en-progreso | completado
 *  @horas   0.5              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Declarar dos variables e imprimir una frase con ellas.
 *
 *  PISTAS
 *    · Interpolación: "Hola $nombre" · Con llaves: "{$nombre}s"
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Usar comillas simples con interpolación: 'Su nombre es $nombre'
 *    imprime literalmente $nombre.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD2-Sintaxis-basica/T2.1.1-Sintaxis-basica-I/ej4-nombre-apellido.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>T2.1.1 · Ej. 4 — Nombre y apellido</title>
</head>

<body>
    <h1>T2.1.1 · Ej. 4 — Nombre y apellido</h1>

    <?php

    // TODO 1: Declara $nombre y $apellido.

    $nombre = "Pablo";
    $apellido = "Conde";


    // TODO 2: Imprime la frase de dos formas: concatenando con . y con
    //         interpolación en comillas dobles.

    echo "Hola, soy " . $nombre . " " . $apellido;

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
        <p class="ok">✔ Variables bien declaradas y concatenación correcta.</p>
        <p class="ko">✖ Falta la segunda forma: el TODO 2 pide la frase concatenando <b>y</b> con interpolación.</p>
        <p class="ko">✖ La frase no es la del enunciado. Pide exactamente: <i>«Su nombre es ___ y su apellido ___.»</i>
            En el examen, el texto de salida también puntúa: cópialo tal cual.</p>
        <p>Te falta una línea parecida a esta, con la variable dentro de comillas dobles:</p>
<pre>echo "Su nombre es $nombre y su apellido $apellido.";</pre>
        <div class="regla"><b>Trucos de examen:</b>
            <ul>
                <li>Con <b>comillas simples</b> no hay interpolación: <code>'Su nombre es $nombre'</code> imprime literalmente <code>$nombre</code>.</li>
                <li>Si la variable va pegada a más texto, usa llaves: <code>"{$nombre}ito"</code>. Si escribes <code>"$nombreito"</code>, PHP busca la variable <code>$nombreito</code>.</li>
            </ul></div>
    </section>
</body>

</html>
