<?php 
class Cuenta{
    /*
    Crea una clase CuentaBancaria con los siguientes atributos: número de cuenta, el DNI del cliente, el
    saldo actual y el interés anual que se aplica a la cuenta. Define en la clase los siguientes métodos:
    14.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
    atributos de la clase.
    14.b. Los método de acceso de cada uno de los atributos de la clase.
    14.c. actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual
    dividido entre 365 aplicado al saldo actual).
    14.d. depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta.
    14.e. retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo).
    14.f. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
    14.g. Crear un script Test_CuentaBancaria que cree un objeto CuentaBancaria e invoque a cada
    uno de los métodos implementados
    */
    private $nCuenta;
    private $objPersona;
    private $saldoAct;
    private $interesAn;
    public function __construct($nCuenta, Persona $objPersona,$saldoAct,$interesAn)
    {
        $this->nCuenta=$nCuenta;
        $this->objPersona=$objPersona;
        $this->saldoAct=$saldoAct;
        $this->interesAn=$interesAn;
    }
    //Metodos get
    public function getNCuenta(){
        return $this->nCuenta;
    }
    public function getObjPersona(){
        return $this->objPersona;
    }
    public function getSaldoAct(){
        return $this->saldoAct;
    }
    public function getInteresAn(){
        return $this->interesAn;
    }
    //Metodos set
    public function setNCuenta($nCuenta){
        $this->nCuenta=$nCuenta;
    }
    public function setObjPersona($objPersona){
        $this->objPersona=$objPersona;
    }
    public function setSaldoAct($saldoAct){
        $this->saldoAct=$saldoAct;
    }
    public function setInteresAn($interesAn){
        $this->interesAn=$interesAn;
    }
    /*Esta funcion solo actualizará el saldo de la cuenta aplicándole el interés diario (interés anual
    dividido entre 365 aplicado al saldo actual)*/
    public function actualizarSaldo(){
        $interesDiario=$this->interesAn/365;
        $interesDiario=$interesDiario/100*$this->getSaldoAct();
        $this->saldoAct=$this->saldoAct+$interesDiario;
        $this->setSaldoAct($this->saldoAct);
        return $this->getSaldoAct();
    }
    //depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta.
    public function depositar($cant){
        $saldoActual=$this->getSaldoAct();
        $this->setSaldoAct($saldoActual);
        return $this->getSaldoAct();
    }
    //retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo).
    public function retirar($cant){
        
        if($cant<=$this->saldoAct){
            $this->saldoAct-=$cant;
            $this->setSaldoAct($this->saldoAct);
            return "Has retirado: $".$cant.".\n";
    
        }
        else{
            return "No tienes suficiente saldo.\n";
        }
    }
    //Metodo __toString
    public function __toString(){
        return "Persona: ".$this->getObjPersona()."\nTu numero de cuenta es: ".$this->getNCuenta()."\nSaldo actual: ".
        $this->getSaldoAct(). "\nInteres anual del: ".$this->getInteresAn()."%.\n"  ;
    }
}