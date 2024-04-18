<?php
class Calculadora{
    private $n1;
    private $n2;

    public function __construct($n1, $n2) {
        $this->n1 = $n1;
        $this->n2 = $n2;
    }

    public function setn1($n1){
        $this->n1=$n1;
    }
    public function setn2($n2){
        $this->n2=$n2;
    }

    public function getn1(){
        return $this ->n1;
    }
    public function getn2(){
        return $this ->n2;
    }

    public function __toString() {
        return "Numero 1: " . $this->n1 . ", Numero 2: " . $this->n2;
    }

    public function sumar(){
        return $this->n1 + $this->n2;
    }
    public function restar(){
        return $this->n1 - $this->n2;
    }
    public function mult(){
        return $this->n1 * $this->n2;
    }
    public function div(){
        if($this->n2==0){
            return "Error division por 0";
        }
        else{
            return $this->n1 / $this->n2;
        }
    }
}

