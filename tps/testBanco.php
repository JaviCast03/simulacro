<?php
include_once "banco.php";
$cuenta= new Cuenta(101,$persona,10000,50);
echo $cuenta;
echo $cuenta->actualizarSaldo();
echo $cuenta->depositar(50);
echo $cuenta->retirar(10000);
echo $cuenta;