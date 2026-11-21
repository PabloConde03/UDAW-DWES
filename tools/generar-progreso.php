<?php
/**
 * Regenera PROGRESO.md y el bloque de progreso del README.md.
 * Uso:  php tools/generar-progreso.php
 * Lo ejecutan el hook pre-commit (tools/hooks/pre-commit) y la GitHub Action.
 */
declare(strict_types=1);
require __DIR__ . '/progreso-lib.php';

$cambio = regenerarMarkdown();
$t = calcularProgreso()['totales'];
fwrite(STDOUT, sprintf("Progreso DWES: %d %% (%d/%d) · %s h · %s\n",
    $t['pct'], $t['completado'], $t['ejercicios'], fmtHoras($t['horas']), $cambio ? 'PROGRESO.md actualizado' : 'sin cambios'));
