# T4.2.1 · Formularios y persistencia con `PHP_SELF`

| Módulo | Unidad | Tipo | Ficheros |
|---|---|---|---|
| MP0613 · DWES | UD4 · Formularios | Tarea con capturas | `registro.php` (formulario autoprocesado) |

---

## Ejercicio 1

- Crea un nuevo proyecto de NetBeans con un archivo `registro.php`.
- Toma como punto de partida los ficheros `registro.php` y `ejemplo.php` hechos en una actividad anterior.
- Estructura el código como en el ejemplo de `PHP_SELF`.
- Crea una función **`incForm`** que muestre el formulario, ya sea con los campos vacíos o con los valores que introdujo el usuario en el *submit* anterior. Los campos que el usuario deberá rellenar siempre son **la contraseña y el currículo**.
- Crea una función **`mostrarValores`** que muestre los valores recibidos en el formulario. Esta función solo se llamará si el formulario no presenta ningún error de verificación ni de validación.
- Se mostrará también información sobre el entorno del servidor: elige **cinco elementos del array `$_SERVER`**.

### Capturas a entregar

1. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de visitar `registro.php` con valores correctos en los campos, **sin hacer *submit***.
2. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de hacer *submit* del formulario del punto anterior, con lo que muestra la llamada a `mostrarValores`.
3. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de visitar `registro.php` con valores que contengan algún error, **sin hacer *submit***.
4. *(El último punto aparece cortado en el PDF original. Por el patrón de la tarea, probablemente sea la captura del resultado de hacer submit con los valores erróneos. Confírmalo en la plataforma.)*
