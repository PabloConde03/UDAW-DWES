# T4.3.1 · Gestión de usuarios: cookies

| Módulo | Unidad | Tipo | Ficheros |
|---|---|---|---|
| MP0613 · DWES | UD4 · Cookies y sesiones | Tarea con capturas | `registro.php` (parte de [T4.2.1](../T4.2.1-Persistencia-PHP_SELF/)), `informacion.php` |

---

## Ejercicio 1

Modifica el fichero `registro.php` de la tarea anterior para que guarde la información de registro en **cookies** una vez que el formulario supere la verificación y la validación. Estructura el código como en el ejemplo del apartado de cookies. Además, añade un fichero nuevo, `informacion.php`, que muestre los valores del registro del usuario leyendo las cookies guardadas.

### Pasos

1. Crea un nuevo proyecto de aplicación PHP en NetBeans con el fichero `registro.php` de la tarea anterior.
2. Estructura el código según el ejemplo del apartado de cookies, de modo que los valores del registro de usuario se guarden en cookies una vez el formulario supere la verificación y la validación. Igual que hiciste con la función `mostrarValores()`, crea en este caso una función **`crearCookies()`** que cree cada una de las cookies a partir de los valores introducidos en los controles del formulario.
3. Crea un fichero nuevo, `informacion.php`, que muestre los datos del registro del usuario en la sesión actual leyéndolos de las cookies guardadas. Contempla el caso en que se intente acceder a las cookies cuando todavía no se han creado: en ese caso no se mostrará información.

### Capturas a entregar

1. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de visitar `informacion.php` **cuando todavía no muestra información**, porque aún no se han creado las cookies.
2. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de visitar `registro.php` y rellenarlo con información que supere la verificación y la validación.
3. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de visitar `informacion.php` **con las cookies ya creadas**, mostrando la información que se introdujo en el formulario.
