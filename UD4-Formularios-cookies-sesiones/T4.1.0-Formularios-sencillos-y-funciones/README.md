# T4.1.0 · Formularios sencillos y funciones

| Módulo | Unidad | Tipo | Temas |
|---|---|---|---|
| MP0613 · DWES | UD4 · Formularios | Ejercicios + reflexión | `$_POST`/`$_GET`, `<select>`, generación aleatoria, `enctype`, subida de ficheros con `$_FILES`, tipos MIME, límites de tamaño |

---

## Ejercicio 1

Comprueba a través de un formulario si un determinado texto es palíndromo.

En la página `index.html` o `index.php` añade un formulario con una caja de texto y un botón **Enviar**. Al pulsar **Enviar**, en una página `procesar.php` se llamará a una función `esPalindromo`. Esta función recibe la cadena que introdujo el usuario y devuelve si es palíndromo o no (puede devolver un booleano o directamente una cadena de caracteres).

Se mostrará un mensaje al usuario indicando si es palíndromo o no.

## Ejercicio 2

Escribe una función que devuelva una dirección IP aleatoria. La función recibirá una letra, que podrá ser A, B o C, para indicar el tipo de dirección. Según el tipo, los bloques de direcciones son:

| Sección de dirección IP reservada | Tipo de red |
|---|---|
| 10.0.0.0 – 10.255.255.255 | Tipo A |
| 172.16.0.0 – 172.31.255.255 | Tipo B |
| 192.168.0.0 – 192.168.255.255 | Tipo C |

Crea un formulario con un menú de selección que permita generar 10 direcciones IP aleatorias de tipo A, B o C. En el formulario se selecciona el tipo de IP, y la página de destino llamará a la función para generar y mostrar las 10 IP al usuario. Si el usuario elige A, las direcciones serán de tipo A.

> Muestra los datos en una **tabla HTML**.

## Ejercicio 3

1. Escribe una función `generarPassNum($min, $max)` que genere una contraseña numérica con un número de caracteres entre `$min` y `$max`. La función debe devolver el valor.
2. Escribe una función `generarPassAlfa($min, $max)` que genere una contraseña solo con caracteres alfabéticos, con una longitud entre `$min` y `$max`. La función debe devolver el valor.
3. Escribe una función `generarPassAlfaNum($min, $max)` que genere una contraseña con caracteres alfanuméricos, con una longitud entre `$min` y `$max`. La función debe devolver el valor.
4. Escribe un formulario para generar una contraseña automáticamente. Permitirá introducir dos números (mínimo y máximo) y tendrá un menú de selección con tres opciones: *Sólo Números*, *Sólo Letras* y *Números y Letras*. El botón de envío se llamará **Generar contraseña** y enviará los datos a otra página `.php`, que es la que procesa el resultado. Según la opción elegida, se mostrará la contraseña generada.

## Ejercicio 4

Usa un formulario de uno de los ejercicios anteriores, o de otro ejemplo, para verificar el comportamiento del atributo `enctype` y sus posibles valores cuando el método de envío es `POST`. Comprueba también qué ocurre cuando el método de envío es `GET` con esos mismos valores de `enctype`.

Tras las pruebas, reflexiona sobre estas cuestiones:

1. ¿Qué valores puede tener el atributo?
2. ¿Cuál es el valor por defecto?
3. ¿Qué valor admite el envío de archivos adjuntos?
4. ¿Qué ocurre si envío un archivo sin usar la configuración correcta de `enctype`?
5. ¿Puedo recoger los datos de `POST` usando `text/plain` en `enctype`?
6. ¿Por qué el valor del atributo no afecta a `GET`?

## Ejercicio 5

Usa en un formulario un control de tipo `file` para enviar un archivo. Comprueba que funciona correctamente.

Tras las pruebas, reflexiona sobre estas cuestiones:

1. ¿Cuál es la carpeta por defecto en la que se almacenan los archivos que llegan al servidor?
2. ¿Ofrece PHP información sobre si un archivo se ha subido correctamente al servidor?
3. ¿En qué variable superglobal encontramos la información de los ficheros subidos?
4. ¿Podemos subir archivos de cualquier tamaño sin limitaciones?
5. ¿Qué parámetros de configuración intervienen en el envío de datos del cliente al servidor?

## Ejercicio 6

Usa en un formulario un control de tipo `file` para enviar un archivo. El archivo recibido solo puede ser una imagen o un PDF. Usa el tipo MIME para comprobar que el archivo subido es de uno de esos tipos.

- Si lo es, mueve los archivos PDF a una carpeta del proyecto llamada `PDF` y las imágenes a una carpeta `IMG`. Informa al usuario de que el fichero se ha subido correctamente, de que tenía el tipo adecuado y de que se ha movido.
- Si no lo es, muestra un mensaje indicando que el tipo de fichero no es correcto.

Al moverlo, el archivo puede conservar el nombre original del usuario o tener otro de tu elección.

- Tipos MIME de imagen: `"image/jpeg"`, `"image/png"`, `"image/bmp"`
- Tipo MIME de PDF: `"application/pdf"`

Más información sobre los tipos MIME: <https://developer.mozilla.org/es/docs/Web/HTTP/MIME_types>

> Haz pruebas con archivos PDF y de imagen **borrándoles la extensión**.

## Ejercicio 7

Usa en un formulario un control de tipo `file` para enviar un archivo. El tamaño máximo del archivo recibido será de 2 MB. Usa el campo `size` para controlar el tamaño: solo se moverá el archivo a la carpeta de destino si cumple ese límite; si no, se informará de que excede el tamaño máximo.

Al moverlo, el archivo puede conservar el nombre original del usuario o tener otro de tu elección.
