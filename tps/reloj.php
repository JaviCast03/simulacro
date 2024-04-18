<?php
class Reloj{
    private $segs;
    private $mins;
    private $hrs;

    public function __construct($hrs, $mins, $segs){
        $this->segs=$segs;
        $this->mins=$mins;
        $this->hrs=$hrs;
    }
    public function getSegs(){
        return $this->segs;
    }
    public function getMins(){
        return $this->mins;
    }
    public function getHora(){
        return $this->hrs;
    }
    public function setSegs($segs){
        $this->segs=$segs;
    }
    public function setHora($hrs){
        $this->hrs=$hrs;
    }
    public function setMins($mins){
        $this->mins=$mins;
    }
    public function __toString()
    {
        return "Hora:" . $this->hrs . ":" . $this->mins . ":" . $this->segs;
    }
    public function puesta_a_cero(){
        $this->setHora(0);
        $this->setMins(0);
        $this->setSegs(0);
    }

    public function incremento(){
        
        $this->segs++;
        if($this->getSegs()>=59){
            $this->setSegs(0);
            $this->mins++;
            
        }
        if($this->getMins()>=59){
            $this->setMins(0);
            $this->hrs++;
            
        }
        if($this->getHora()>=24){
            $this->puesta_a_cero();
        }
    }

}


