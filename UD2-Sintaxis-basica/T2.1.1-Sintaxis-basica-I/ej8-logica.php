<?php

/**
 * ========================================================================
 *  T2.1.1 · Ejercicio 8 — Expresiones lógicas
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  completado      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Evaluar 6 expresiones booleanas aplicando la precedencia.
 *
 *  PISTAS
 *    · Pon paréntesis mentalmente alrededor de cada && antes de evaluar
 *      los ||.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Evaluar de izquierda a derecha ignorando que && tiene más
 *    precedencia que ||. Ojo: 'and'/'or' tienen precedencia distinta a
 *    &&/||.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD2-Sintaxis-basica/T2.1.1-Sintaxis-basica-I/ej8-logica.php
 * ========================================================================
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>T2.1.1 · Ej. 8 — Expresiones lógicas</title>
</head>

<body>
    <h1>T2.1.1 · Ej. 8 — Expresiones lógicas</h1>

    <?php

    /*
 * ── MI PREDICCIÓN (escríbela ANTES de ejecutar) ──────────────────────
 *
 *
 * ── RESULTADO REAL Y POR QUÉ ──────────────────────────────────────────
 *
 *
 */

    // TODO 1: Declara $W, $X, $Y, $Z con sus valores.
    $W = false;
    $X = true;
    $Y = true;
    $Z = false;

    // TODO 2: Predice cada resultado aplicando: ! > && > ||.

    echo "PREDICCIÓN: <br>
==================================<br>
1. W || Y && X && W || Z = false <br>
2. X && !Y && !X || !W && Y = true <br>
3. !(W || !Y) && X || Z = false <br>
4. X && Y && W || Z || X = false <br>
5. Y || !(Y || Z && W) = false <br>
6. !X && Y && (!Z || !X) = false <br>
==================================<br>   ";
    // TODO 3: Comprueba con var_dump() cada expresión.
    echo "RESULTADO: <br>
    ==================================<br>";
    echo "1.";
    var_dump($W || $Y && $X && $W || $Z);
    echo "<br> 2.";
    var_dump($X && $Y && !$X || !$W && $Y);
    echo "<br> 3.";
    var_dump(!($W || !$Y) && $X || $Z);
    echo "<br> 4.";
    var_dump($X && $Y && $W || $Z || $X);
    echo "<br> 5.";
    var_dump($Y || !($Y || $Z && $W));
    echo "<br> 6.";
    var_dump(!$X && $Y && (!$Z || !$X));
    ?>

    <!-- ══════════════════════════════════════════════════════════════════
         POR QUÉ HE FALLADO · predicción frente a resultado
         ══════════════════════════════════════════════════════════════════ -->
    <style>
        .analisis { font-family: Arial, sans-serif; max-width: 900px; margin-top: 30px; }
        .analisis table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        .analisis th, .analisis td { border: 1px solid #cbd5e1; padding: 6px 10px; text-align: left; }
        .analisis th { background: #f1f5f9; }
        .analisis code { background: #f1f5f9; padding: 1px 5px; border-radius: 4px; }
        .analisis pre { background: #0f172a; color: #e2e8f0; padding: 12px 14px; border-radius: 8px; line-height: 1.5; }
        .ok { color: #166534; font-weight: bold; }
        .ko { color: #991b1b; font-weight: bold; }
        .regla { background: #eff6ff; border-left: 4px solid #2563eb; padding: 10px 14px; margin: 15px 0; }
        .aviso { background: #fef3c7; border-left: 4px solid #d97706; padding: 10px 14px; margin: 15px 0; }
    </style>

    <section class="analisis">
        <h2>Por qué he fallado: predicción frente a resultado</h2>

        <p>Valores: <code>W = false</code> · <code>X = true</code> · <code>Y = true</code> · <code>Z = false</code></p>

        <div class="regla">
            <b>Regla de precedencia:</b> <code>!</code> &gt; <code>&amp;&amp;</code> &gt; <code>||</code>.
            Primero se agrupan todos los <code>&amp;&amp;</code> en bloques y después se unen esos bloques con <code>||</code>.<br>
            <b>Basta con un true:</b> en una cadena de <code>||</code>, con que <u>un solo bloque</u> sea true, todo es true.
            Un false dentro de un <code>&amp;&amp;</code> solo anula <u>su propio bloque</u>, no la expresión entera.
        </div>

        <table>
            <tr><th>#</th><th>Expresión</th><th>Predicción</th><th>Resultado</th><th></th></tr>
            <tr><td>1</td><td><code>W || Y &amp;&amp; X &amp;&amp; W || Z</code></td><td>false</td><td>false</td><td class="ok">✔</td></tr>
            <tr><td>2</td><td><code>X &amp;&amp; !Y &amp;&amp; !X || !W &amp;&amp; Y</code></td><td>true</td><td>true</td><td class="ok">✔</td></tr>
            <tr><td>3</td><td><code>!(W || !Y) &amp;&amp; X || Z</code></td><td>false</td><td>true</td><td class="ko">✖</td></tr>
            <tr><td>4</td><td><code>X &amp;&amp; Y &amp;&amp; W || Z || X</code></td><td>false</td><td>true</td><td class="ko">✖</td></tr>
            <tr><td>5</td><td><code>Y || !(Y || Z &amp;&amp; W)</code></td><td>false</td><td>true</td><td class="ko">✖</td></tr>
            <tr><td>6</td><td><code>!X &amp;&amp; Y &amp;&amp; (!Z || !X)</code></td><td>false</td><td>false</td><td class="ok">✔</td></tr>
        </table>

        <p><b>3 de 6 correctas.</b> Los tres fallos tienen la misma causa: das por hecho que <b>un false hace false toda la expresión</b>.
            Eso solo vale para <code>&amp;&amp;</code>; con <code>||</code> pasa lo contrario.</p>

        <h3>3 · <code>!(W || !Y) &amp;&amp; X || Z</code> → true</h3>
<pre>Primero el paréntesis, de dentro hacia fuera:
  !Y           = !true          = false
  W || !Y      = false || false = false
  !(...)       = !false         = true      ← la negación le da la vuelta

Bloques:  ( true &amp;&amp; X )  ||  Z
          ( true &amp;&amp; true ) ||  false
              true         ||  false   =  TRUE</pre>
        <p><b>Fallo:</b> viste dos false dentro del paréntesis y diste el resultado por false, sin aplicar el <code>!</code> de fuera,
            que lo convierte en true. Con <code>!( … )</code> hay que resolver el paréntesis <u>completo</u> y negarlo al final.</p>

        <h3>4 · <code>X &amp;&amp; Y &amp;&amp; W || Z || X</code> → true</h3>
<pre>Bloques:  ( X &amp;&amp; Y &amp;&amp; W )  ||  Z  ||  X
          ( true &amp;&amp; true &amp;&amp; false ) || false || true
                 false           || false || TRUE   =  TRUE</pre>
        <p><b>Fallo:</b> el <code>W = false</code> anula solo el primer bloque (<code>X &amp;&amp; Y &amp;&amp; W</code>). Después vienen dos
            <code>||</code>, y el último operando (<code>X</code>) es true, así que la expresión entera es true.
            Leíste de izquierda a derecha y paraste en el primer false.</p>

        <h3>5 · <code>Y || !(Y || Z &amp;&amp; W)</code> → true</h3>
<pre>Bloques:  Y  ||  !( … )
          true || (ya no hace falta mirar)   =  TRUE

(Si lo calculas igualmente: Z &amp;&amp; W = false → Y || false = true → !true = false.
 Queda true || false = true.)</pre>
        <p><b>Fallo:</b> te centraste en el paréntesis, que sí es false, pero la expresión empieza por <code>Y ||</code> y
            <code>Y</code> es true. <b>Evaluación en cortocircuito:</b> si el operando izquierdo de <code>||</code> es true,
            PHP ni siquiera evalúa el derecho. Lo mismo pasa con <code>&amp;&amp;</code> cuando el izquierdo es false
            (por eso la 6 es false nada más ver <code>!X</code>).</p>

        <div class="aviso">
            <b>⚠ Revisa tu código de la expresión 2.</b> En el <code>var_dump</code> escribiste
            <code>$X &amp;&amp; $Y &amp;&amp; !$X</code>, pero el enunciado dice <code>X &amp;&amp; <b>!</b>Y &amp;&amp; !X</code>: falta el
            <code>!</code> delante de <code>$Y</code>. El resultado coincide (true) <u>por casualidad</u>, porque el bloque
            <code>!W &amp;&amp; Y</code> ya es true. Corrígelo para que lo que compruebas sea lo que pide el enunciado.
        </div>

        <h3>Método para el examen</h3>
        <div class="regla">
            <b>✍ Consejo: no lo hagas de memoria, escríbelo en papel.</b> Antes de evaluar nada, apunta en el borrador la
            tabla de valores (<code>W = F · X = V · Y = V · Z = F</code>) y debajo de cada expresión <u>reescríbela sustituyendo
            las letras</u> por V/F. Al tenerlo delante no se mezclan valores ni se pierden los <code>!</code>, y puedes rodear
            con un lápiz cada bloque <code>&amp;&amp;</code> antes de unirlos con <code>||</code>. Es un minuto y evita
            justo los tres fallos de este ejercicio.
        </div>
        <ol>
            <li>Escribe en el papel la tabla de valores y reescribe la expresión con V/F en lugar de letras.</li>
            <li>Sustituye cada letra por su valor y resuelve los <code>!</code> (y los paréntesis).</li>
            <li>Rodea con paréntesis cada grupo de <code>&amp;&amp;</code>.</li>
            <li>Resuelve cada grupo: <b>un solo false lo hace false</b>.</li>
            <li>Une los grupos con <code>||</code>: <b>un solo true lo hace true</b>.</li>
        </ol>
    </section>
</body>

</html>
