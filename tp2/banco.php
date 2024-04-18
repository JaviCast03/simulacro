<?php
/*
En un banco existen varios mostradores. Cada mostrador puede atender cierto tipo de trámites y tiene una cola
de clientes, que no puede superar un número determinado para cada cola, de cada cola se conoce el número
actual de personas que hay en ella. Cada cliente concurre al banco para realizar un solo trámite. Un trámite
tiene un horario de creación y un horario de resolución. Implemente los siguientes métodos:
a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos
de las clases.
b) Los métodos de acceso de cada uno de los atributos de las clases.
c) Redefinir el método _ _toString() para que retorne la información de los atributos de las clases.
d) mostrador–>atiende($unTramite): devuelve true o false indicando si el tramite se puede atender o no
en el mostrador; note que el tipo de trámite correspondiente a unTramite tiene que coincidir con
alguno de los tipos de trámite que atiende el mostrador.
e) banco–>mostradoresQueAtienden($unTramite): retorna la colección de todos los mostradores que
atienden ese trámite.
f) banco–>mejorMostradorPara($unTramite): retorna el mostrador con la cola más corta con espacio
para al menos una persona más y que atienda ese trámite; si ningun mostrador tiene espacio, retorna
null.
g) banco–>atender($unCliente): cuando llega un cliente al banco se lo ubica en el mostrador que atienda
el trámite que el cliente requiere, que tenga espacio y la menor cantidad de clientes esperando; si no
hay lugar en ningún mostrador debe retornar un mensaje que diga al cliente que “será antendido en
cuanto haya lugar en un mostrador”
*/
class Banco{
        private $objMostrador;
        private $colMostradores;
        private $objTramite;
        
        public function __construct($objMostrador, $objTramite,$colMostradores)
        {
              $this->objMostrador;
              $this->objTramite;  
        }
        public function getObjMostrador(){
                return $this->objMostrador;
        }
        public function getColMostradores(){
                return $this->colMostradores;
        }
        public function getObjTramite(){
              return $this->objTramite;  
        }
        public function setObjMostrador($objMostrador){
                $this->objMostrador=$objMostrador;
        }
        public function setColMostradores($colMostradores){
                $this->colMostradores=$colMostradores;
        }
        public function setObjTramite($objTramite){
                $this->objTramite=$objTramite;
        }
        
        public function __toString(){
                return "Todos los tramites: ";

        }
}