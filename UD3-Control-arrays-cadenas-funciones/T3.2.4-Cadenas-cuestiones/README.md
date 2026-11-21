# T3.2.4 · Cadenas: cuestiones

| Módulo | Unidad | Tipo | Temas |
|---|---|---|---|
| MP0613 · DWES | UD3 · Cadenas | Cuestiones sobre código | Acceso por índice, `substr` frente a `mb_substr`, UTF-8 multibyte, `mb_strpos` y comparación `==` frente a `===` |

Para cada fragmento de código, ejecútalo y responde a las preguntas. Puedes probar también las entradas comentadas.

---

## Código 1

```php
<?php
// $caracter="a"; $cadena="palabra";
// $caracter="b"; $cadena="palabra";
// $caracter="c"; $cadena="A casa de César está en Coirós";
// $caracter=""; $cadena="senespazos";
$caracter = "ó"; $cadena = "camión";

// Inicializamos contador
$contador = 0;
echo "<br>Longitud cadena: " . strlen($cadena);

for ($i = 0; $i < strlen($cadena); $i++) {
    echo "<br/> Mirando caracter: " . $cadena[$i];
    if ($caracter == $cadena[$i]) {
        $contador++;
    }
}

// Visualizamos contador
echo "<br>Ocurrencias de '$caracter' en la cadena '$cadena': $contador.\n";
?>
```

1. ¿Cuál es el resultado de ejecutar el código para la entrada `$caracter = "a"; $cadena = "palabra";`?
2. ¿Cuál es el resultado de ejecutar el código para la entrada `$caracter = "ó"; $cadena = "camión";`?
3. ¿Se podría aplicar este código usando como término de búsqueda más de una letra, por ejemplo `$caracter = "pa"; $cadena = "palabra";`?

## Código 2

```php
<?php
// $caracter="a"; $cadena="palabra";
// $caracter="b"; $cadena="palabra";
// $caracter="c"; $cadena="A casa de César está en Coirós";
// $caracter=""; $cadena="senespazos";
$caracter = "ó"; $cadena = "camión";

// Inicializamos contador
$contador = 0;
echo "<br>Longitud cadena: " . strlen($cadena);

for ($i = 0; $i < strlen($cadena); $i++) {
    echo "<br/> Mirando caracter: " . substr($cadena, $i, 1);
    if ($caracter == substr($cadena, $i, 1)) {
        $contador++;
    }
}

// Visualizamos contador
echo "<br>Ocurrencias de '$caracter' en la cadena '$cadena': $contador.\n";
?>
```

1. Se ha cambiado el enfoque de la resolución para usar funciones que recorren los caracteres. ¿Este código hace exactamente lo mismo que el anterior?
2. ¿Cuál es el resultado de ejecutar el código para la entrada `$caracter = "ó"; $cadena = "camión";`?
3. ¿Se podría aplicar este código usando como término de búsqueda más de una letra, por ejemplo `$caracter = "pa"; $cadena = "palabra";`?

## Código 3

```php
<?php
// $caracter="a"; $cadena="palabra";
// $caracter="b"; $cadena="palabra";
// $caracter="c"; $cadena="A casa de César está en Coirós";
// $caracter=""; $cadena="senespazos";
$caracter = "ó"; $cadena = "camión";

// Inicializamos contador
$contador = 0;
echo "<br>Longitud cadena: " . mb_strlen($cadena);

for ($i = 0; $i < mb_strlen($cadena); $i++) {
    echo "<br/> Mirando caracter: " . mb_substr($cadena, $i, 1);
    if ($caracter == mb_substr($cadena, $i, 1)) {
        $contador++;
    }
}

// Visualizamos contador
echo "<br>Ocurrencias de '$caracter' en la cadena '$cadena': $contador.\n";
?>
```

1. ¿Cuál es el resultado de ejecutar el código para la entrada `$caracter = "ó"; $cadena = "camión";`?
2. ¿Se podría aplicar este código usando como término de búsqueda más de una letra, por ejemplo `$caracter = "pa"; $cadena = "palabra";`?

## Código 4

```php
<?php
$cadena = "En un lugar, en un unlugar";
$textoBuscado = "en";

$ocurrencias = 0;

while (mb_strpos($cadena, $textoBuscado) == false) {
    $ocurrencias++;
    $cadena = mb_substr($cadena, mb_strpos($cadena, $textoBuscado) + mb_strlen($textoBuscado));
    //echo "<br> Sigo buscando en la subcadena: $cadena";
}
echo "<br>Se han encontrado tantas ocurrencias: $ocurrencias";
?>
```

1. ¿Cuál es el resultado de ejecutar el código?
2. ¿Cuál es el resultado de ejecutar el código para la entrada `$textoBuscado = "ó"; $cadena = "camión";`?
3. ¿Cuál es el resultado de ejecutar el código si `$textoBuscado = "En"`?
4. ¿Cuál es la solución al problema anterior?
