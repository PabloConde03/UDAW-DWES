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
</body>

</html>
