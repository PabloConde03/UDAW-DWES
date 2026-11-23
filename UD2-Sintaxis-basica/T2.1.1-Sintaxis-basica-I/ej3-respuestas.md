<!-- @estado: completado | @horas: 0.5 -->
<!-- Estados: pendiente | en-progreso | completado. Marca cada casilla [x] al responder. -->

# T2.1.1 · Ejercicio 3 — Cuestiones de sintaxis

> **Objetivo:** Responder las 6 cuestiones con un ejemplo de código mínimo en cada una.
> **⚠ Trampa de examen:** En PHP las variables SÍ distinguen mayúsculas ($a ≠ $A) pero las funciones y palabras clave NO (ECHO funciona).

**Pistas:** Prueba cada respuesta en un .php antes de escribirla.

---

- [X] **1. Instrucción para imprimir**

  _echo_

- [X] **2. Comillas simples vs dobles**

  _Las comillas simples (') tratan el texto de forma literal, mientras que las comillas dobles (") interpretan variables y más secuencias de escape_

- [X] **3. Comentarios de una y varias líneas**

  _//unalinea_
  _/* Varias lineas */_

- [X] **4. Fichero de configuración de PHP**

  _php.ini_

- [X] **5. ¿Distingue mayúsculas en variables?**

  _Si_

- [X] **6. Concatenación**

  _Se.utiliza.así.!_

---

## Revisión · qué falla y trucos de examen

El objetivo pedía **un ejemplo de código mínimo en cada respuesta**, y no hay ninguno. Correcciones:

1. ✔ `echo`, aunque incompleta: también existe `print`. Diferencia: `print` devuelve `1` y admite un solo argumento; `echo` no devuelve nada y admite varios (`echo $a, $b;`).
2. ✔ Bien explicado. Ejemplo: con `$n = 3;`, `"Hay $n"` → `Hay 3`, y `'Hay $n'` → `Hay $n`. Además, `"\n"` es un salto de línea y `'\n'` son dos caracteres literales.
3. ✖ Falta el tercer tipo: `#` también es comentario de una línea. Y `/** ... */` es el formato de documentación (PHPDoc).
4. ✔ `php.ini`. Para saber cuál se usa: `phpinfo()` → *Loaded Configuration File*.
5. ✔ Sí, en las **variables**. Pero las **funciones y palabras clave no**: `ECHO`, `Echo` y `PhpInfo()` funcionan. Esto es pregunta típica.
6. ✖ «Se.utiliza.así.!» no es una respuesta de examen. Es el **operador punto `.`**, y su versión de asignación es `.=`:
   ```php
   $saludo = "Hola" . " " . $nombre;
   $saludo .= "!";   // $saludo = $saludo . "!";
   ```
   Trampa: en JS se concatena con `+`. En PHP, `"5" + "5"` da `10`, no `"55"`.

> **Truco de examen:** si la pregunta dice «cómo se hace», acompaña siempre la respuesta con **una línea de código**. Es lo que diferencia un 0,5 de un 1.
