<?php 
include 'reloj.php';

$reloj = new Reloj(23, 59, 58);
echo "Hora inicial: " . $reloj . "\n";

$reloj->incremento();
echo "Después de incrementar: " . $reloj . "\n";

$reloj->incremento();
echo "Después de incrementar nuevamente: " . $reloj . "\n";

