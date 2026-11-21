# T4.1.2 · Verificación y limpieza de campos de formularios

| Módulo | Unidad | Tipo | Ficheros |
|---|---|---|---|
| MP0613 · DWES | UD4 · Formularios | Tarea con capturas | `registro.php`, `agente.php` (parten de [T4.1.1](../T4.1.1-Recoger-controles-de-formularios/)) |

---

## Ejercicio 1

- Crea un nuevo proyecto de NetBeans con los dos archivos `registro.php` y `agente.php` hechos en la tarea anterior.
- Modifica el código de `registro.php` añadiendo `(*)` al final de los controles obligatorios: **nombre de usuario, contraseña, email y sexo**.
- Añade al código de `agente.php`:
  - la verificación de los campos obligatorios,
  - la comprobación de que existen los controles,
  - la eliminación de los espacios en blanco al principio y al final de las cadenas de los controles de texto,
  - la eliminación de posibles etiquetas HTML.

  Cuando no se rellenen todos los controles del formulario, se avisará en el navegador de cada uno de ellos, indicando cuáles son obligatorios. Ten en cuenta que los controles de texto se envían siempre, así que no es estrictamente necesario comprobar si existen.

### Capturas a entregar

1. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de visitar `registro.php` con el formulario rellenado.
2. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de hacer *submit* del formulario del punto anterior.
