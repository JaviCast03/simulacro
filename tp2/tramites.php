<?php
class Tramites {
    private array $tramites;
    public function __construct($tramites){
        $this->tramites[]=$tramites;
    }
    public function getTramites(){
        return $this->tramites;
    }
    public function setTramite($tramites){
        $this->tramites[]=$tramites;
    }
    public function agregarTramite($tramiteNuevo){
        $this->tramites[]=$tramiteNuevo;
    }
    public function todosLosTramites(){
        $todosLosTramites[]=$this->tramites;
        $i=0;
        
        while($i<count($todosLosTramites)){
            $i++;
            echo $i.") ".$todosLosTramites[$i].", ";
            
        }
        
    }
    
    public function __toString()
    {
       return $this->todosLosTramites();
    }
}