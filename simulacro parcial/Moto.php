<?php
/*
    1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
    incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
    venta y false en caso contrario).
    2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
    clase.
    3. Los métodos de acceso de cada uno de los atributos de la clase.
    4. Redefinir el método toString para que retorne la información de los atributos de la clase.
*/
class Moto{
    private $codigo;
    private $costo;
    private $año;
    private $info;
    private $incAnual;
    private $dispo;
    public function __construct($codigo, $costo,$año,$info,$incAnual,$dispo){
        $this->codigo=$codigo;
        $this->costo=$costo;
        $this->año=$año;
        $this->info=$info;
        $this->incAnual=$incAnual;
        $this->dispo=$dispo;
    }
    //getters
    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getAño(){
        return $this->año;
    }
    public function getInfo(){
        return $this->info;
    }
    public function getIncAnual(){
        return $this->incAnual;
    }
    public function getDispo(){
        return $this->dispo;
    }
    //setters
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
    public function setCosto($costo){
        $this->costo=$costo;
    }
    public function setAño($año){
        $this->año=$año;
    }
    public function setInfo($info){
        $this->info=$info;
    }
    public function setIncAnual($incAnual){
        $this->incAnual=$incAnual;
    }
    public function setDispo($dispo){
        $this->dispo=$dispo;
    }
    public function dispoStr(){
        $disponible=$this->getDispo();
        if($disponible==true){
            $disponible="Esta dispoinble.";
        }
        else{
            $disponible="No esta disponible.";
        }
        return $disponible;
    }
    public function __toString(){
        return "Codigo: ". $this->getCodigo()."\n".
        "Precio de venta: ". $this->darPrecioVenta()."\n". "Año: ". $this->getAño()."\n"."Descripcion: ". $this->getInfo()."\n"
        ."Incremento anual: ". $this->getIncAnual()."\n"."Disponibilidad: ". $this->dispoStr()."\n";
    }
    /*5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
    Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
    la venta, el método realiza el siguiente cálculo:
    $_venta = $_compra + $_compra * (anio * por_inc_anual)
    donde $_compra: es el costo de la moto.
    anio: cantidad de años transcurridos desde que se fabricó la moto.
    por_inc_anual: porcentaje de incremento anual de la moto.
    */
    public function darPrecioVenta(){
        $disponibilidad=$this->getDispo();
        $_compra=$this->getCosto();
        $añoAct=date("Y");
        $añoFabricacion=$this->getAño();
        $por_inc_anual=$this->getIncAnual();
        $por_inc_anual=$por_inc_anual/100;
        if($disponibilidad==true){
            $anioCalc=$añoAct-$añoFabricacion;
            $_venta= $_compra + $_compra * ($anioCalc * $por_inc_anual);
            return $_venta;
        }
        else{
            $_venta= -1;
        }
        return $_venta;
    }
}