<?php
include 'calculadora.php';

$calc = new Calculadora(10, 0);
echo $calc ."\n";


echo $calc->getn1() . "+" . $calc->getn2() . " = " . $calc->sumar(). "\n";
echo $calc->getn1() . "-" . $calc->getn2() . " = " . $calc->restar(). "\n";
echo $calc->getn1() . "*" . $calc->getn2() . " = " . $calc->mult(). "\n";
echo $calc->getn1() . "/" . $calc->getn2() . " = " . $calc->div(). "\n";
?>