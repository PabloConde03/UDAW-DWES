# T4.3.2 · Gestión de usuarios: sesiones

| Módulo | Unidad | Tipo | Ficheros |
|---|---|---|---|
| MP0613 · DWES | UD4 · Cookies y sesiones | Tarea con capturas | `registro.php`, `informacion.php` (parten de [T4.3.1](../T4.3.1-Usuarios-cookies/)) |

---

## Ejercicio 1

Modifica el fichero `registro.php` de la tarea anterior para que guarde la información de registro en el **array de la sesión** una vez que el formulario supere la verificación y la validación.

Estructura el código como en el ejemplo del apartado de sesiones. Además, el fichero `informacion.php` mostrará los valores del registro del usuario leyendo el array de la sesión.

### Pasos

1. Crea un nuevo proyecto de aplicación PHP en NetBeans con los ficheros `registro.php` e `informacion.php` de la tarea anterior.
2. Estructura el código según el ejemplo del apartado de sesiones, de modo que los valores del registro de usuario se guarden en el array de la sesión una vez el formulario supere la verificación y la validación. Igual que hiciste con la función `mostrarValores()`, crea en este caso una función **`crearSesion()`** que cree una sesión **con un nombre personalizado** y guarde en el array de la sesión cada uno de los valores de los controles del formulario.
3. En `informacion.php` se mostrarán los datos del registro del usuario en la sesión actual, leyéndolos del array de la sesión. Contempla el caso en que se intente acceder a elementos que no existen en el array de la sesión: en ese caso no se mostrará información.

### Capturas a entregar

1. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de visitar `informacion.php` **cuando todavía no muestra información**, porque aún no se ha creado la sesión.
2. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de visitar `registro.php` y rellenarlo con información que supere la verificación y la validación.
3. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de visitar `informacion.php` **con la sesión ya creada**, mostrando la información que se introdujo en el formulario.
