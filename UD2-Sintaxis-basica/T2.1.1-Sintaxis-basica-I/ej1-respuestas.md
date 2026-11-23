<!-- @estado: completado | @horas: 0.5 -->
<!-- Estados: pendiente | en-progreso | completado. Marca cada casilla [x] al responder. -->

# T2.1.1 · Ejercicio 1 — Qué es PHP · PHP vs JS · carpeta XAMPP

> **Objetivo:** Responder con tus palabras las 3 cuestiones teóricas.
> **⚠ Trampa de examen:** Decir que PHP 'se ve' en el navegador. El cliente solo recibe el HTML generado: Ctrl+U nunca muestra código PHP.

**Pistas:** Piensa en el ciclo petición → Apache → intérprete PHP → HTML → navegador. · Ruta típica en Windows: C:\xampp\...

---

- [X] **1. ¿Qué es PHP?**

  _Un lenguaje de programación de código abierto diseñado principalmente para el desarrollo web del lado del servidor_

- [X] **2. Diferencias más notables entre JavaScript y PHP**

  _Las diferencias más notables entre JavaScript y PHP radican en dónde se ejecutan, cómo gestionan las peticiones y cuál es su enfoque principal en el desarrollo web_

- [X] **3. Carpeta de proyectos web de XAMPP**

  _La carpeta de proyectos web de XAMPP es htdocs…_

---

## Revisión · qué falla y trucos de examen

- ✔ **1. ¿Qué es PHP?** Correcta, pero le falta la idea clave: **se ejecuta en el servidor y lo que llega al navegador es el HTML que genera**.
- ✖ **2. PHP vs JS:** has reformulado la pregunta sin dar ninguna diferencia. En el examen esto sería un 0. Hay que nombrarlas:

  | | PHP | JavaScript |
  |---|---|---|
  | Dónde se ejecuta | Servidor (Apache + intérprete PHP) | Navegador del cliente (también en servidor con Node) |
  | ¿Se ve el código? | No, solo llega el HTML resultante | Sí (Ctrl+U o F12) |
  | Acceso a BD y ficheros del servidor | Sí | No, desde el navegador |
  | Interacción sin recargar | No, cada acción es una petición nueva | Sí (DOM, eventos, fetch) |
  | Variables | Con `$`, sin declarar | `let` / `const` |

- ✔ **3. Carpeta:** `htdocs`. Pon la ruta completa: `C:\xampp\htdocs`, y la URL a la que corresponde: `http://localhost/`.

> **Truco de examen:** en las preguntas teóricas, responde con **2 o 3 hechos concretos**, no con una definición general. «Se diferencian en dónde se ejecutan» no puntúa; «PHP en el servidor y JS en el navegador» sí.
