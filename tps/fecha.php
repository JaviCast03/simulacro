<?php
/*Diseñar e implementar la clase Fecha. La clase deberá disponer de los atributos mínimos y
necesarios para almacenar el día, el mes y el año, además de métodos que devuelvan un String con la
fecha en forma abreviada (16/02/2000) y extendida (16 de febrero de 2000) . Implementar una función
incremento, que reciba como parámetros un entero y una fecha, que retorne una nueva fecha, resultado
de incrementar la fecha recibida por parámetro en el numero de días definido por el parámetro entero.
Nota 1: Son años bisiestos los múltiplos de cuatro que no lo son de cien, salvo que lo sean de
cuatrocientos, en cuyo caso si son bisiestos.
Nota 2: Para la solución de este problema puede ser útil definir un método incrementa_un_dia
*/
class Fecha{
    private $dia;
    private $mes;
    private $año;
    public function __construct($dia, $mes, $año) {
        $this->dia=$dia;
        $this->mes=$mes;
        $this->año=$año;
    }

    public function getAño() {
        return $this->año;
    }
    public function getMes() {
        return $this->mes;
    }
    public function getDia() {
        return $this->dia;
    }

    public function setAño($año) {
        $this->año=$año;
    }
    public function setMes($mes) {
        $this->mes=$mes;
    }
    public function setDia($dia) {
        $this->dia=$dia;
    }
    public function __toString() {
        return $this->getDia(). "/". $this->getMes(). "/". $this->getAño();
    }
    public function inc(){
        $this->dia++;
        if($this->getDia()==30){
            $this->setDia(1);
            $this->mes++;
        }
        if($this->getMes()>=12){
            $this->setMes(1);
            $this->año++;
        }
    }
}