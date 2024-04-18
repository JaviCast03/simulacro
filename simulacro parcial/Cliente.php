<?php 
/*0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
    documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
    1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
    2. Los métodos de acceso de cada uno de los atributos de la clase.
    3. Redefinir el método _toString para que retorne la información de los atributos de la clase.

*/
class Cliente{
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $dni;
    private $tipo;
    public function __construct($nombre, $apellido,$dadoDeBaja,$tipo, $dni){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->dadoDeBaja=$dadoDeBaja;
        $this->dni=$dni;
        $this->tipo=$tipo;
    }
    //getters
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDadoDeBaja(){
        return $this->dadoDeBaja;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getDni(){
        return $this->dni;
    }
    //setters
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }public function setDadoDeBaja($dadoDeBaja){
        $this->dadoDeBaja=$dadoDeBaja;
    }
    public function setTipo($tipo){
        $this->tipo=$tipo;
    }
    public function setDni($dni){
        $this->dni=$dni;
    }
    public function baja(){
        $b=$this->getDadoDeBaja();
        IF($b==true){
            $resp="No.";
        }
        else{
            $resp= "Si.";
        }
        return $resp;
    }
    public function __toString()
    {
        return "Nombre: ". $this->getNombre(). ", ". $this->getApellido()."\n".
        "Esta dado de baja: ". $this->baja(). "\n". "Tipo: ".$this->getTipo()."\n"."Dni: ". $this->getDni();
    }
}