<?php
/*1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
    motos y la colección de ventas realizadas.
    2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
    3. Los métodos de acceso para cada una de las variables instancias de la clase.
    4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
    
*/
include_once "cliente.php";
include_once "moto.php";
class Empresa{
    private $denominacion;
    private $direc;
    private $colClientes;
    private $colMotos;
    private $colVentasRealizadas;
    
    public function __construct($denominacion,$direc,$colClientes,$colMotos,$colVentasRealizadas){
        $this->denominacion=$denominacion;
        $this->direc=$direc;
        $this->colClientes=$colClientes;
        $this->colMotos=$colMotos;
        $this->colVentasRealizadas=$colVentasRealizadas;
    }
    //getters
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direc;
    }
    public function getColClientes(){
        return $this->colClientes;
    }
    public function getColMotos(){
        return $this->colMotos;
    }
    public function getColVentasRealizadas(){
        return $this->colVentasRealizadas;
    }
    //setters
    public function setDenominacion($denominacion){
        $this->denominacion=$denominacion;
    }
    public function setDireccion($direc){
        $this->direc=$direc;
    }
    public function setColClientes($colClientes){
        $this->colClientes=$colClientes;
    }
    public function setColMotos($colMotos){
        $this->colMotos=$colMotos;
    }
    public function setColVentasRealizadas($colVentasRealizadas){
        $this->colVentasRealizadas=$colVentasRealizadas;
    }
    public function mostrarClientes(){
        $coleccion=$this->getColClientes();
        $str="";
        foreach($coleccion as $cliente){
            $str.= $cliente."\n";
        }
        return $str;
    }
    
    public function mostrarMotos(){
        $motos=$this->getColMotos();
        $str="";
        foreach($motos as $moto){
            $str.= $moto ."\n";
        }
        return $str;
    }
    public function mostrarVentas(){
        $ventas=$this->getColVentasRealizadas();
        $str="";
        foreach($ventas as $venta){
            $str.= $venta ."\n";
        }
        return $str;
    }
    public function __toString(){
        return "Denominacion: ".$this->getDenominacion()."\n". "Direccion: \n".$this->getDireccion()."\n"
        . "Coleccion de clientes:\n". $this->mostrarClientes()."\n"."Coleccion de motos: \n".$this->mostrarMotos()
        ."\n"."Ventas realizadas: ".$this->mostrarVentas()."\n";
    }
    /*5.Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
        retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
    */
    public function retornarMoto($codigoMoto){
        $arrayMotos = $this->getColMotos();//inicializacion de array de coleccion de objetos motos
        $numMotos = count($arrayMotos);
        $i = 0;
        $objMoto=null;
        while ($i < $numMotos && $objMoto== null) {//si no cumple estas condiciones objMoto va a ser null
            if ($arrayMotos[$i]->getCodigo() == $codigoMoto) {//el indice de $arrayMotos se va iterando si... 
                //es que no encuentra el mismo codigo de moto que fue dada por parametro
                $objMoto=$arrayMotos[$i];//cuando se itere y encuentre el codigo se cambia el valor null por el objeto segun el indice del array
                //es decir que va a retornar una moto
            }
            $i++;
        }
        return $objMoto;// si retorna null es porque la moto no se encontro
    }
    /*6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
        parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
        se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
        Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
        para registrar una venta en un momento determinado.
        El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
        venta.
        
    */
    public function registrarVenta($colCodigosMoto, $objCliente){
       //no tiene que calcular el precio eso lo hace incorporarMoto()
        
        $importeFinal=0;
        $hoy=date("d/m/y");
        if(!$objCliente->getDadoDeBaja()){

            $motosPorVender=[];//arreglo de las motos validas para vender
            $coleccionMotos=$this->getColMotos();//col de motos
            foreach($colCodigosMoto as $codigoMoto){//se recorre los codigos de las motos
                $unObjMoto=$this->retornarMoto($codigoMoto);//por cada codigo se compara con la col de motos y si lo encuentra la func. va a devolver
                //un objeto moto
                if($unObjMoto!=null){//verif. si la moto se encuentra 
                    $motosPorVender[]=$unObjMoto;//el objeto se guarda en la coleccion 
                    $importeFinal=$importeFinal+$unObjMoto->darPrecioVenta();// se guarda el imp. final y se suma a la moto act.
                }
            }
            if($importeFinal>0){
                $copiaColVentas=$this->getColVentasRealizadas();//si se pudo registrar el precio el objeto moto se guarda en la coleccion motos
                $cantidadVentas=count($copiaColVentas)+1;
                $venta= new Venta($cantidadVentas,$hoy,$objCliente,$motosPorVender,$importeFinal);
                $copiaColVentas[]=$venta;
                $this->setColVentasRealizadas($copiaColVentas);
            }
            
        }
        else{
            $importeFinal= -1;
        }
        return $importeFinal;
    }
        
    
    /*7. Implementar el método retornarVentas y retorna una colección con las ventas realizadas al cliente.XCliente($tipo,$numDoc) que 
    recibe por parámetro el tipo y número de documento de un Cliente
    */
    public function retornarVentasXCliente($tipo, $dni){
        $colHistorialVentas = $this->getColVentasRealizadas();
        $colVentasCliente = [];
        
        foreach($colHistorialVentas as $unaVenta) {
            //$clienteVenta = $unaVenta->getRefCliente()->getTipo()==$tipo;
            if($unaVenta->getRefCliente()->getTipo()==$tipo && $unaVenta->getRefCliente()->getDni()==$dni) {
                // Agregar la venta al arreglo de ventas del cliente
                $colVentasCliente[] = $unaVenta;
                
            }
            
        }
        return $colVentasCliente;
    }
    
}
