# T4.1.1 · Recoger controles de formularios

| Módulo | Unidad | Tipo | Ficheros |
|---|---|---|---|
| MP0613 · DWES | UD4 · Formularios | Tarea con capturas | `registro.php`, `agente.php` |

---

## Ejercicio 1

- Crea un nuevo proyecto de aplicación PHP en NetBeans o Visual Studio Code con dos ficheros: `registro.php` y `agente.php`.
- El fichero `registro.php` contendrá un documento HTML básico con un formulario que incluya estos campos:
  - nombre completo
  - nombre de usuario
  - contraseña
  - edad
  - fecha de nacimiento
  - email
  - URL de la página personal
  - IP del equipo
  - descripción de los *hobbies* (área de texto)
  - recibir información (casilla de verificación)
  - hombre/mujer (dos botones de radio)
  - 5 lenguas extranjeras a elegir (menú)
  - currículo (archivo)
- El fichero `agente.php` recibirá la información del formulario y mostrará en el navegador los valores recibidos. Se supone que el usuario rellena todos los controles: la verificación del formulario queda para la siguiente tarea. Del control de fichero se mostrará el nombre y el tamaño, y el fichero se guardará en una subcarpeta `subidos` o `files` dentro de la carpeta de despliegue del proyecto.

### Capturas a entregar

1. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de visitar `registro.php` con el formulario rellenado.
2. La ventana del navegador mostrando la URL en la barra de direcciones y el resultado de hacer *submit* del formulario del punto anterior.
3. El explorador de archivos de la máquina virtual mostrando dónde está el fichero recibido en el campo currículo.

> **Observaciones:** HTML5 incorpora más tipos de controles de los vistos hasta ahora en clase, y permiten hacer comprobaciones automáticas. **En esta actividad no los usaremos.**
>
> Tipos de `input` nuevos en HTML5: `color`, `date`, `datetime-local`, `email`, `month`, `number`, `range`, `search`, `tel`, `time`, `url`, `week`.
