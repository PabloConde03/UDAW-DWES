# T2.1.2 · Sintaxis básica de PHP (II)

| Módulo | Unidad | Tipo | Temas |
|---|---|---|---|
| MP0613 · DWES | UD2 · Sintaxis básica | Razona y comprueba | Secuencias de escape, `gettype()`, `strlen()`, tipado dinámico, *casting*, constantes |

> Antes de empezar: repasa el uso de `gettype()` y de `strlen()`.

---

## Ejercicio 1

Razona y comprueba qué imprime el siguiente código en un script PHP.

```php
print("No\n\r iremos \n\rsolos");
echo "<br/>";
print('No\n\r iremos \nsolos');
echo "<br/>";
echo "No\n\r iremos \n\rsolos";
echo "<br/>";
echo 'No\n iremos \nsolos';
```

## Ejercicio 2

Razona y comprueba qué imprime el siguiente código. Verifica cuál es el tamaño de la cadena.

```php
$cadena = "1\t2\t3\t4\n5";
echo $cadena;
echo "<br/>";
```

## Ejercicio 3

Razona y comprueba qué imprime el siguiente código.

```php
echo "<pre>";
echo "<br/>";
echo 'No\n iremos \nsolos';
echo "<br/>";
echo $cadena;
echo "</pre>";
```

## Ejercicio 4

Comprueba con la función `gettype()` el tipo de las siguientes variables:

```php
$a = 100; $b = 10.0; $c = false; $d = "Hola";
```

¿Cuál sería el resultado y el tipo al ejecutar estas expresiones?

```php
$c || $b
$c || $d
```

## Ejercicio 5

Sean las variables `$a` y `$b` definidas antes. Razona y comprueba el resultado de ejecución de este código.

```php
print("<br/>División entre enteros: " . (5/2));
$r = $a + $d;
$r = $c + $b;
print("<br/>El valor de r es: " . $r);
$c = true;
$r = $c + $b + 5;
print("<br/>El valor de r es: " . $r);
print("<br/>r es de tipo: " . gettype(($r)));
$r = $a + 10;
print("<br/>r es de tipo: " . gettype(($r)));
$r = $a / 10;
print("<br/>r es de tipo: " . gettype(($r)));
$r = $a / 3;
print("<br/>r es de tipo: " . gettype(($r)));
```

## Ejercicio 6

Razona y comprueba cuál será el tipo de `$r` y su valor tras los siguientes *casting* (forzado de tipos).

```php
$r = (integer)$d;
$r = (integer)"Pedro";
$r = (integer)4.123;
$r = (boolean)4.123;
```

## Ejercicio 7

1. Define y visualiza una constante `SALUDO` que almacene una cadena de caracteres usando `define`.
2. Define y visualiza una constante `MENSAJE` que almacene una cadena de caracteres usando `const`.

> **Nota:** en el documento original este enunciado aparece duplicado y con texto corrupto. Esta es la versión limpia de lo que se pide.
