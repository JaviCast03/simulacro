<?php
include "fecha.php";
$fecha= new Fecha(29, 12, 2000);
echo $fecha ."\n";
$fecha->inc();
echo "Despues del incremento: " . $fecha."\n";
$fecha->inc();
echo "Despues del incremento: " . $fecha."\n";
$fecha->inc();
echo "Despues del incremento: " . $fecha."\n";