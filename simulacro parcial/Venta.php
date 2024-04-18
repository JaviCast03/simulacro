<?php
/*1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
    motos y el precio final.
    2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
    atributo de la clase.
    3. Los métodos de acceso de cada uno de los atributos de la clase.
    4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
*/
include_once "cliente.php";
include_once "moto.php";
class Venta{
    private $numero;
    private $fecha;
    private $refCliente;
    private $refCollMotos;
    private $precioFinal;
    public function __construct($numero,$fecha,$refCliente,$refCollMotos,$precioFinal){
        $this->numero=$numero;
        $this->fecha=$fecha;
        $this->refCliente=$refCliente;
        $this->refCollMotos=$refCollMotos;
        $this->precioFinal=$precioFinal;
    }
    //getters
    public function getNum(){
        return $this->numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getRefCliente(){
        return $this->refCliente;
    }
    public function getRefCollMotos(){
        return $this->refCollMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }
    //setters
    public function setNum($numero){
        $this->numero=$numero;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function setRefCliente($refCliente){
        $this->refCliente=$refCliente;
    }
    public function setRefCollMotos($refCollMotos){
        $this->refCollMotos=$refCollMotos;
    }
    public function setPrecioFinal($precioFinal){
        $this->precioFinal=$precioFinal;
    }
    
    public function mostrarMotos(){
        $todas=$this->getRefCollMotos();
        $i=0;
        foreach($todas as $moto){
            $i++;
            echo $i.") ".$moto;
        }
    }
    public function __toString()//$numero,$fecha,$refCliente,$refCollMotos,$precioFinal
    {
        return "Numero de venta: ". $this->getNum()."\n"."Fecha: ".$this->getFecha()."\n".
        "Cliente: ".$this->getRefCliente()."\n". "Coleccion de motos: ".$this->mostrarMotos()."\n".
        "Precio final: ".$this->getPrecioFinal()."\n";
    }
    /*5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
    incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
    vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
    Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
    */
    public function incorporarMoto($objMoto){
       
        $disp=$objMoto->getDispo();
        if($disp==true){//si esta disponible a la venta se adjunta a la coleccion
            $colMotos=$this->getRefCollMotos();//obteniendo la coleccion de obj motos
            $colMotos=[$objMoto];//guardando el objMoto adentro de la coleccion de motos
            $this->setRefCollMotos($colMotos);//modificando la coleccion motos para actualizarla
            $precioMoto=$objMoto->darPrecioVenta();//retorna el precio de venta segun la moto y sus datos
            $precioFinalCopia=$this->getPrecioFinal();//obtiene el precio final del objeto venta
            $precioFinalCopia=$precioFinalCopia+$precioMoto;//se suma los precios anteriores mas el actual si es que es una misma venta
            $this->setPrecioFinal($precioFinalCopia);//se modifica el precio final por cada moto y queda guardado asi se suma para la prox moto si es que se compra mas de 1
            
            return 1;//retorna 1 si se pudo añadir al array
        }
        else{
            return -1;
        }
    }
}