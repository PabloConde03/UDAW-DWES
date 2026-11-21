<?php
/**
 * ========================================================================
 *  T4.2.2 · Ejercicio 1 — Ahorcado sin cookies ni sesiones
 *  Enunciado: README.md de esta carpeta
 * ------------------------------------------------------------------------
 *  @estado  pendiente      ← pendiente | en-progreso | completado
 *  @horas   0              ← horas dedicadas (admite 1.5)
 * ------------------------------------------------------------------------
 *  OBJETIVO
 *    Mantener el estado de la partida entre peticiones SIN cookies ni
 *    sesiones.
 *
 *  PISTAS
 *    · Sin sesión, el estado solo puede ir en el formulario: campos
 *      hidden (aquí sí están permitidos).
 *    · Manda el ÍNDICE de la palabra, no la palabra en claro.
 *
 *  ⚠ TRAMPA DE EXAMEN
 *    Restar vida solo si la letra no está — y recuerda: repetir una
 *    letra fallida vuelve a restar.
 *
 *  PROBAR
 *    http://localhost/UDAW-DWES/UD4-Formularios-cookies-sesiones/T4.2.2-Ahorcado/ahorcado.php
 * ========================================================================
 */

// ── 1. LÓGICA (antes de cualquier salida: cookies, sesión, redirecciones) ──

// TODO 1: Funciones: palabraAleatoria(), vidasPorNivel(), destapar(),
//         pintarPista(), haGanado().

// TODO 2: Matriz de 50 palabras inicializada de forma explícita.

// TODO 3: Pantalla de inicio: select de nivel + Jugar/Salir.

// TODO 4: En cada envío viajan el estado (índice de palabra, vidas,
//         letras destapadas) en el propio formulario.

// TODO 5: Toma solo la primera letra introducida.

// TODO 6: Pantallas de victoria y derrota.

// ── 2. VISTA ──
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>T4.2.2 · Ej. 1 — Ahorcado sin cookies ni sesiones</title>
</head>
<body>

    <!-- Tu HTML aquí -->

</body>
</html>
