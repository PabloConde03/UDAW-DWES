# T2.1.1 · Sintaxis básica de PHP (I)

| Módulo | Unidad | Tipo | Temas |
|---|---|---|---|
| MP0613 · DWES | UD2 · Sintaxis básica | Cuestiones + ejercicios | XAMPP, `echo`/`print`, comillas, comentarios, variables, operadores |

---

## Ejercicio 1

1. ¿Qué es PHP?
2. ¿Cuáles son las diferencias más notables entre JavaScript y PHP?
3. ¿Cuál es la carpeta de proyectos web de XAMPP?

## Ejercicio 2

Utiliza en un archivo PHP la función `phpinfo()` y comprueba qué información ofrece.

```php
<html>
<head>
    <title>PHP-Info</title>
</head>
<body>
<?php
    phpinfo();
?>
</body>
</html>
```

## Ejercicio 3

1. ¿Qué instrucción se utiliza para imprimir un mensaje en pantalla con PHP?
2. ¿Existe diferencia entre usar las comillas simples y las comillas dobles?
3. ¿Cómo podemos poner un comentario de una línea y de varias líneas?
4. ¿Cómo se llama el archivo de configuración de PHP?
5. ¿Importan las mayúsculas y minúsculas al identificar una variable?
6. ¿Cómo se realiza la concatenación en PHP?

## Ejercicio 4

Escribe un script que declare una variable llamada `nombre` y una variable llamada `apellido` e imprima el mensaje:

> Su nombre es _____________ y su apellido _____________.

## Ejercicio 5

Indica si los siguientes son identificadores válidos en PHP para variables:

```php
$rayos-x = 0;
$2SiONo2Tan = 0;
$ElCorderito's = 0;
$Tanto Monta = 0;
```

## Ejercicio 6

¿Cuál es el resultado de ejecutar estas expresiones en PHP?

```php
$a = 13 % 3;
$b = 5 / 4;
$c = 5.0 / 4.0;
$d = 100 / 2 * 5;
```

## Ejercicio 7

Indica el resultado:

```php
$a = 5;
$a += 3;
$a *= 2;
```

## Ejercicio 8

Indica el resultado. Sean `W`, `X`, `Y` y `Z` variables con los valores `W = false`, `X = true`, `Y = true`, `Z = false`:

1. `W || Y && X && W || Z`
2. `X && !Y && !X || !W && Y`
3. `!(W || !Y) && X || Z`
4. `X && Y && W || Z || X`
5. `Y || !(Y || Z && W)`
6. `!X && Y && (!Z || !X)`
