# T3.2.1 · Arrays (I)

| Módulo | Unidad | Tipo | Temas |
|---|---|---|---|
| MP0613 · DWES | UD3 · Arrays | Razona y comprueba | Índices, claves explícitas e implícitas, `print_r`, `count`, índices inexistentes |

---

## Ejercicio 1

Dada la siguiente sentencia de creación de un array:

```php
$dia = array("domingo", "lunes", "martes", "miercoles", "jueves", "viernes", "sabado");
```

1. ¿Cuál es el resultado de ejecutar esta sentencia?
   ```php
   echo $dia[0];
   ```
2. ¿Cuál es el resultado de ejecutar estas sentencias?
   ```php
   $dia[5] = "viernes";
   print_r($dia);
   ```
3. ¿Cuál es el resultado de ejecutar estas sentencias?
   ```php
   $dia[7] = "viernes";
   print_r($dia);
   ```

## Ejercicio 2

Dada la siguiente sentencia de creación de un array:

```php
$a = array(
    'a',
    3 => 'b',
    1 => 'c',
    'd'
);
```

1. ¿Cuál es el resultado de ejecutar `echo $a[2];`?
2. ¿Cuál es el resultado de ejecutar `echo $a[4];`?

## Ejercicio 3

Dada la siguiente sentencia de creación de un array:

```php
$x = array("A", "B", 1 => "C", "D", 2 => "E");
```

1. ¿Qué mostrará `echo count($x);`?
2. ¿Y este código?
   ```php
   $cualificacions = array(9.8, 6.1, 3.8);
   echo $cualificacions[10];
   ```
