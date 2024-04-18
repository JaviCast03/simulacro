<?php
include "cafetera.php";
$cafetera = new Cafetera(500, 50);
echo $cafetera;
echo $cafetera->servir(100);
echo $cafetera->llenar();

echo $cafetera->vaciar();
echo $cafetera->agregarCafe(600);
echo $cafetera;