# T3.3.2 · Funciones (II)

| Módulo | Unidad | Tipo | Temas |
|---|---|---|---|
| MP0613 · DWES | UD3 · Funciones | Ejercicios | Palíndromos (iterativo), acumuladores, aritmética de cifras, cadenas multibyte y tildes |

---

## Ejercicio 1 · Palíndromo

Un palíndromo es una palabra o frase que se lee igual hacia delante que hacia atrás. Implementa una función `esPalindromo` que reciba un *string* y devuelva *«ES Palíndromo»* si se trata de un palíndromo y *«NO ES Palíndromo»* en caso contrario.

Los espacios en blanco y las mayúsculas y minúsculas no se tienen en cuenta, así que convertiremos el *string* a mayúsculas (o minúsculas) y eliminaremos los espacios en blanco.

En esta implementación consideramos que, si la acentuación es distinta, no es palíndromo. Es decir, *«Dábale arroz a la zorra el abad»* **no** es palíndromo.

Ejemplos para probar el programa:

| | | |
|---|---|---|
| Ana | La ruta natural | Somos o no somos |
| Reconocer | Rodador | A ti no bonita |
| Luz azul | Anna | |

> Resuélvelo de forma **iterativa**.

## Ejercicio 2

Crea una función `sumaTodos($numA, $numB)` que devuelva la suma de todos los números enteros positivos comprendidos entre los dos valores que recibe como parámetros.

Por ejemplo, `sumaTodos(4, 8)` devuelve la suma 4 + 5 + 6 + 7 + 8 = **30**.

## Ejercicio 3

Construye una función `cifras` que reciba un número entero e imprima sus cifras al revés. Es decir, si le pasamos 12356, imprimirá 65321. Las cifras se imprimen dentro de la propia función.

> No uses ninguna función que convierta el número a *string* ni que permita hacer un *reverse*.

## Ejercicio 4

Construye una función que reciba una cadena de caracteres con el nombre y apellidos de un usuario y genere una cadena con su cuenta de correo electrónico. La cuenta será la primera letra (en minúscula) de cada palabra del nombre y apellidos, seguida de `@empresa.es`. Se permiten nombres y apellidos compuestos.

**Ejemplo:** Juan Antonio Sánchez Pérez tendrá la cuenta `jasp@empresa.es`.

> **Ojo con las tildes:** no se admiten en las direcciones de correo.
