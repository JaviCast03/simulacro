<?php 
/*13. Desarrollar una clase Cafetera con los atributos capacidadMaxima (la cantidad máxima de café que puede
contener la cafetera) y cantidadActual (la cantidad actual de café que hay en la cafetera). Implementar los
siguientes métodos:
13.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
atributos de la clase.
13.b. Los método de acceso de cada uno de los atributos de la clase.
13.c. llenarCafetera(): la cantidad actual debe ser igual a la capacidad de la cafetera.
13.d. servirTaza($cantidad): simula la acción de servir una taza con la capacidad indicada. Si la
cantidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje
al consumidor para que sepa porque no se le sirvió un taza completa.
13.e. vaciarCafetera(): pone la cantidad de café actual en cero.
13.f. agregarCafe($cantidad): añade a la cafetera la cantidad de café indicada.
13.g. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
13.h. Crear un script Test_Cafetera que cree un objeto Cafetera e invoque a cada uno de los
métodos implementados.
*/
class Cafetera{
    private $cMax;
    private $cantAct;
    
    private $mLitros;
    public function __construct($cMax, $cantAct){
        $this->cantAct=$cantAct;
        $this->cMax=$cMax;
        
    }
    public function getCMax(){
        return $this-> cMax;
    }
    public function getCantAct(){
        return $this-> cantAct;
    }
    public function getMLitros(){
        return $this-> mLitros;
    }
    public function setCMax($cMax){
        $this->cMax = $cMax;
    }
    public function setCantAct($cantAct){
        $this->cantAct = $cantAct;
    }
    
    
    public function llenar(){
        //$restante =$this->cMax-$this->cantAct;
        $this->setCantAct($this->cMax);
    }
    
    public function servir($mLitros){
        /*servirTaza($cantidad): simula la acción de servir una taza con la capacidad indicada. Si la
        cantidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje
        al consumidor para que sepa porque no se le sirvió un taza completa.
        */
        
        if ($this->cantAct < $mLitros) { 
            $taza=$this->cantAct;
            $this->setCantAct(0);
            return "La cantidad actual de la cafetera no alcanza, la taza tiene: " . $taza. " mililitros. \n";
        }
        else{
            $taza = $mLitros;
            $resta = $this->cantAct - $taza;
            $this->setCantAct($resta);
            return "La taza ahora tiene: " . $taza . " mililitros. \n";
        }
    }
    public function vaciar(){
        $this->setCantAct(0);
        return "La cafetera está vacía.\n";
    }
    public function agregarCafe($agregar){
        if($agregar + $this->cantAct<=$this->cMax){
        $suma=$agregar + $this->cantAct;
        $this->setCantAct($suma);
        return "La cafetera ahora tiene: " . $this->cantAct. " mililitros. \n";
        }
        else{
            $this->setCantAct($this->cMax);
            return "La cafetera rebalsó y ahora tiene su cantidad maxima. \n";
        }
    }
    public function __toString(){
        return "Cantidad Max:" . $this->cMax . "\n".
        "Cantidad Act:" . $this->cantAct . "\n";
    }
}
