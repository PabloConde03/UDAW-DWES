<div align="center">

# UDAW · DWES

### Desarrollo Web en Entorno Servidor · MP0613

Ejercicios, tareas evaluables y proyectos de PHP del ciclo superior de **Desarrollo de Aplicaciones Web (DAW)** a distancia · Xunta de Galicia · curso 2026-2027

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=flat-square&logo=php&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-Apache-FB7A24?style=flat-square&logo=xampp&logoColor=white)
![Módulo](https://img.shields.io/badge/M%C3%B3dulo-MP0613_DWES-2563EB?style=flat-square)
![Tareas](https://img.shields.io/badge/tareas-18-111C44?style=flat-square)
![Ejercicios](https://img.shields.io/badge/ejercicios-57-111C44?style=flat-square)

</div>

---

## Contenido

- [Sobre el repositorio](#sobre-el-repositorio)
- [Ramas](#ramas)
- [Índice de tareas](#índice-de-tareas)
- [Estructura](#estructura)
- [Puesta en marcha](#puesta-en-marcha)
- [Convenciones](#convenciones)

---

## Sobre el repositorio

Este repositorio recoge los **enunciados del módulo DWES** organizados por unidad didáctica, desde la sintaxis básica de PHP hasta la gestión de estado con cookies y sesiones. Cada tarea tiene su carpeta con un `README.md` que contiene el enunciado completo, pasado a Markdown desde los PDF de la plataforma.

**Recorrido del módulo:**

```
UD2 Sintaxis  ──►  UD3 Control · Arrays · Cadenas · Funciones  ──►  UD4 Formularios ──► Validación ──► Cookies ──► Sesiones
                                                                         │
                                                       registro.php evoluciona tarea a tarea (T4.1.1 → T4.3.2)
```

## Ramas

| Rama | Contenido |
|---|---|
| [`main`](../../tree/main) | Enunciados limpios. Es la referencia: no lleva código de resolución. |
| [`Pablo`](../../tree/Pablo) | Los mismos enunciados más una **plantilla PHP comentada por ejercicio**, un **dashboard de progreso** (`dashboard.php`) y [`PROGRESO.md`](../../blob/Pablo/PROGRESO.md), que se regenera solo en cada `push`. |

## Índice de tareas

### UD2 · Sintaxis básica

| Código | Tarea | Ejercicios | Temas clave |
|---|---|:-:|---|
| T2.1.1 | [Sintaxis básica de PHP (I)](UD2-Sintaxis-basica/T2.1.1-Sintaxis-basica-I/) | 8 | `echo`/`print`, comillas, identificadores, operadores |
| T2.1.2 | [Sintaxis básica de PHP (II)](UD2-Sintaxis-basica/T2.1.2-Sintaxis-basica-II/) | 7 | Escapes, `gettype`, tipado dinámico, *casting*, constantes |

### UD3 · Estructuras de control, arrays, cadenas y funciones

| Código | Tarea | Ejercicios | Temas clave |
|---|---|:-:|---|
| T3.1.1 | [Estructuras de control](UD3-Control-arrays-cadenas-funciones/T3.1.1-Estructuras-de-control/) | 5 | Bucles anidados, `printf`, patrones |
| T3.2.1 | [Arrays (I)](UD3-Control-arrays-cadenas-funciones/T3.2.1-Arrays-I/) | 3 | Claves implícitas y explícitas, `count` |
| T3.2.2 | [Arrays (II)](UD3-Control-arrays-cadenas-funciones/T3.2.2-Arrays-II/) | 5 | Ordenación, aleatorios únicos, matrices |
| T3.2.3 | [Cadenas](UD3-Control-arrays-cadenas-funciones/T3.2.3-Cadenas/) | 3 | Subcadenas, `ctype_alnum`, ocurrencias |
| T3.2.4 | [Cadenas: cuestiones](UD3-Control-arrays-cadenas-funciones/T3.2.4-Cadenas-cuestiones/) | 4 | Multibyte (`mb_*`), `==` frente a `===` |
| T3.3.1 | [Funciones (I)](UD3-Control-arrays-cadenas-funciones/T3.3.1-Funciones-I/) | 3 | Par/impar, primos |
| T3.3.2 | [Funciones (II)](UD3-Control-arrays-cadenas-funciones/T3.3.2-Funciones-II/) | 4 | Palíndromos, cifras, normalización de tildes |

### UD4 · Formularios, cookies y sesiones

| Código | Tarea | Ejercicios | Temas clave |
|---|---|:-:|---|
| T4.1.0 | [Formularios sencillos y funciones](UD4-Formularios-cookies-sesiones/T4.1.0-Formularios-sencillos-y-funciones/) | 7 | `$_POST`, `enctype`, `$_FILES`, MIME |
| T4.1.1 | [Recoger controles de formularios](UD4-Formularios-cookies-sesiones/T4.1.1-Recoger-controles-de-formularios/) | 1 | `registro.php` + `agente.php` |
| T4.1.2 | [Verificación y limpieza](UD4-Formularios-cookies-sesiones/T4.1.2-Verificacion-y-limpieza/) | 1 | `isset`, `trim`, `strip_tags` |
| T4.1.3 | [Validación: funciones y filtros](UD4-Formularios-cookies-sesiones/T4.1.3-Validacion-funciones-y-filtros/) | 1 | `filter_var`, `checkdate` |
| T4.2.1 | [Persistencia con `PHP_SELF`](UD4-Formularios-cookies-sesiones/T4.2.1-Persistencia-PHP_SELF/) | 1 | Formulario autoprocesado, `$_SERVER` |
| T4.2.2 | [Juego del ahorcado](UD4-Formularios-cookies-sesiones/T4.2.2-Ahorcado/) | 1 | Estado sin cookies ni sesiones |
| T4.3.1 | [Gestión de usuarios: cookies](UD4-Formularios-cookies-sesiones/T4.3.1-Usuarios-cookies/) | 1 | `setcookie`, `$_COOKIE` |
| T4.3.2 | [Gestión de usuarios: sesiones](UD4-Formularios-cookies-sesiones/T4.3.2-Usuarios-sesiones/) | 1 | `session_name`, `$_SESSION` |
| T4.3.3 | [Ahorcado con sesiones](UD4-Formularios-cookies-sesiones/T4.3.3-Ahorcado-sesiones/) ⭐ | 1 | Sesión + cookie · **evaluable, vence el 10/12/2026** |

## Estructura

```
UDAW-DWES/
├── README.md
├── assets/                         # Imágenes de los enunciados
├── UD2-Sintaxis-basica/
│   └── T2.1.x-.../README.md        # Enunciado
├── UD3-Control-arrays-cadenas-funciones/
│   └── T3.x.x-.../README.md
└── UD4-Formularios-cookies-sesiones/
    └── T4.x.x-.../README.md
```

En la rama `Pablo`, cada carpeta de tarea contiene además los ficheros de trabajo (`ejN-*.php`, `respuestas.md` o los ficheros que pida el enunciado), y en la raíz se añaden `dashboard.php`, `PROGRESO.md` y `tools/`.

## Puesta en marcha

```bash
# 1. Clona el repositorio dentro de htdocs de XAMPP
cd C:\xampp\htdocs
git clone https://github.com/PabloConde03/UDAW-DWES.git
cd UDAW-DWES
git checkout Pablo

# 2. Arranca Apache desde el panel de XAMPP y abre:
#    http://localhost/UDAW-DWES/dashboard.php
```

Requisitos: **PHP ≥ 8.0** con la extensión `mbstring`, incluida en XAMPP.

## Convenciones

- **Carpetas:** `UDn-Tema/Tn.n.n-Nombre-de-la-tarea/`, sin tildes ni espacios, para que funcionen bien las URL en Apache.
- **Enunciados:** siempre en el `README.md` de su carpeta, para que GitHub los muestre al abrir la carpeta.
- **Commits:** `T3.2.2: ej3 primitiva sin repetidos` (código de tarea + qué se ha hecho).
- **Notas del editor:** cuando el PDF original tiene erratas o contradicciones, se indican con ⚠️ dentro del enunciado, sin cambiar el texto original.

---

<div align="center">
<sub>Material didáctico © Xunta de Galicia · Consellería de Educación. Recopilado con fines de estudio personal.</sub>
</div>
