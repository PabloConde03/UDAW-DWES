# T4.1.3 · Validación de formularios: funciones y filtros

| Módulo | Unidad | Tipo | Ficheros |
|---|---|---|---|
| MP0613 · DWES | UD4 · Formularios | Tarea con capturas | `registro.php`, `agente.php` (parten de [T4.1.2](../T4.1.2-Verificacion-y-limpieza/)) |

---

## Ejercicio 1

- Crea un nuevo proyecto de NetBeans con los dos archivos `registro.php` y `agente.php` hechos en una tarea anterior.
- Modifica el código de `registro.php` añadiendo, a la derecha del control contraseña, un aviso de que debe tener como mínimo seis caracteres.
- Añade al código de `agente.php` la validación de los datos introducidos en el formulario. Se avisará en el navegador de los controles que no superen la validación. Se harán estas comprobaciones:
  - El campo **contraseña** deberá tener como mínimo seis caracteres. *
  - El campo **edad** deberá contener un entero entre 0 y 130.
  - El campo **fecha de nacimiento** deberá contener una fecha con el formato `dd/mm/aaaa`.
  - El campo **email** deberá contener una dirección válida.
  - El campo **URL de la página personal** deberá contener una URL válida.
  - El campo **IP del equipo** deberá contener una dirección IP válida.

\* La función `mb_strlen` recibe una cadena y devuelve su longitud.

### Capturas a entregar

1. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de visitar `registro.php` tras rellenar el formulario.
2. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de hacer *submit* del formulario del punto anterior.

> **Nota:** aunque algunas comprobaciones se podrían hacer en el cliente, usaremos las funciones de PHP para hacerlas en el servidor. Por eso, en este ejercicio es preferible **no usar HTML5**, para poder comprobar con facilidad el uso de las funciones y filtros de PHP.
