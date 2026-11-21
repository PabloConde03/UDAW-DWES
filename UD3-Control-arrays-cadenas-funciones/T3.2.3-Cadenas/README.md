# T3.2.3 · Cadenas

| Módulo | Unidad | Tipo | Temas |
|---|---|---|---|
| MP0613 · DWES | UD3 · Cadenas | Ejercicios | Búsqueda y extracción de subcadenas, `ctype_alnum`, conversión de mayúsculas y minúsculas, contar ocurrencias |

---

## Ejercicio 1

Crea un script que, dada una dirección de correo electrónico, imprima solo el nombre de usuario. Por ejemplo, para `evanaveira.clases@gmail.com` mostrará `evanaveira.clases`.

## Ejercicio 2

Escribe un script que, dada una cadena de caracteres que representa el campo *login* de un usuario, imprima uno de estos mensajes:

- *«Nombre de usuario válido. El login será _________»* (mostrando el login en minúsculas).
- *«El nombre de usuario sólo puede contener números y letras sin espacios en blanco»*.

> **Pista:** usa la función `ctype_alnum(string $text): bool`.

## Ejercicio 3

Realiza un script que cuente e imprima el número de ocurrencias de un carácter o *substring* en una cadena de caracteres, sin distinguir entre mayúsculas y minúsculas.

**Ejemplo:**

```php
$cadena = "Esto es una prueba.";
$caracter = "a";
```

Devolvería: *El carácter a aparece 2 veces.*
