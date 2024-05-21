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
        $colObjMotos=$this->getColMotos();
        $i=0;
        $objMoto=null;
        while($i<count($colObjMotos)&&$objMoto==null){
            if($colObjMotos[$i]->getCodigo()==$codigoMoto&&$colObjMotos[$i]->getDispo()){
                $objMoto=$colObjMotos[$i];

            }
            $i++;
        }
        return $objMoto;
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
        $coleccionMotos=$this->getColMotos();
        $precioFinal=0;
        $colObjsMotos=[];
        if(!$objCliente->getDadoDeBaja()){
            
            foreach($colCodigosMoto as $unCodigoMoto){
                $objMotoBuscada=$this->retornarMoto($unCodigoMoto);
                if($objMotoBuscada!=null&&$objMotoBuscada->getCodigo()==$unCodigoMoto){
                    $colObjsMotos[]=$objMotoBuscada;
                    $cantVentas=count($this->getColVentasRealizadas())+1;
                    $precioFinal = $precioFinal + $objMotoBuscada->darPrecioVenta();
                }

            }
            if($precioFinal>0){
                $ventaMotos= new Venta ($cantVentas,date("Y"),$objCliente,$coleccionMotos,$precioFinal);
                $colVentas[]= $ventaMotos;
                $this->setColVentasRealizadas($colVentas);
            }
        }
        return $precioFinal;
        
        
    }
    
        
    
    /*7. Implementar el método retornarVentas y retorna una colección con las ventas realizadas al cliente.XCliente($tipo,$numDoc) que 
    recibe por parámetro el tipo y número de documento de un Cliente
    */
    public function retornarVentasXCliente($tipo, $dni){//solicita el tipo de dni y dni para encontrar a la persona
        $colTodasLasVentas=$this->getColVentasRealizadas();
        $colVentasCliente=[];
        foreach($colTodasLasVentas as $unaVenta){
            if($tipo == $unaVenta->getRefCliente()->getTipo() && $dni==$unaVenta->getRefCliente()->getDni()){
                $colVentasCliente[]=$unaVenta;
            }
        }
        return $colVentasCliente;
    }
    public function informarSumaVentasNacionales(){
        $colVentas = $this->getColVentasRealizadas();
        $sumaVentasNacionales = 0;
        foreach ($colVentas as $venta){
            $sumaVentalNacional = $venta->retornarTotalVentaNacional();
            $sumaVentasNacionales += $sumaVentalNacional;
        }
        return $sumaVentasNacionales;
    }
    public function informarVentasImportadas(){
        $ventasImportadas = [];
        $colVentas = $this->getColVentasRealizadas();
        foreach ($colVentas as $venta){
            $motosImportadasEnLaVenta = $venta->retornarMotosImportadas();
            if (!empty($motosImportadasEnLaVenta)){
                $ventasImportadas[] = $venta;
            }
        }
        return $ventasImportadas;
    }
}
