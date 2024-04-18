<?php


class Mostrador{
    private $tramite;
    private $colaMax;
    private $personasAct;
    
    
    public function __construct($tramite, $colaMax,$personasAct){
        
    }

    //getters
    public function getTramite(){
        return $this->tramite;
    }
    public function getColaMax(){
        return $this->colaMax;
    }
    public function getPersonasAct(){
        return $this->personasAct;
    }
    
    //setters 
    public function setTramite($tramite){
        $this->tramite[]=$tramite;
    }
    public function setColaMax($colaMax){
        $this->colaMax=$colaMax;
    }
    public function setPersonasAct($personasAct){
        $this->personasAct=$personasAct;
    }
    
    public function __toString()
    {
        
    }

}