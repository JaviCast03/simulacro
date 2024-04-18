<?php
class Viaje {
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajeros = []; // Colección de objetos Pasajero
    private $responsable;

    public function __construct($codigo, $destino, $maxPasajeros, $responsable) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->maxPasajeros = $maxPasajeros;
        $this->responsable = $responsable;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getMaxPasajeros(){
        return $this->maxPasajeros;
    }
    public function getPasajeros(){
        return $this->pasajeros;
    }
    public function getResponsable(){
        return $this->responsable;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function setDestino($destino){
        $this->destino = $destino;
    }

    public function setCantPasajeros($maxPasajeros){
        $this->maxPasajeros = $maxPasajeros;
    }

    public function setPasajeros($responsable){
        $this->responsable = $responsable;
    }

    public function existePasajero($pasajero) {
        foreach ($this->pasajeros as $p) {
            if ($p->getDocumento() == $pasajero->getDocumento()) {
                return true;
            }
        }
        return false;
    }
    public function agregarPasajero($pasajero) {
        if (!$this->existePasajero($pasajero)) {
            $this->pasajeros[] = $pasajero;
            
            return true;
        }
        return false; // El pasajero ya existe en el viaje
    }

    public function modificarPasajero($documento, $nuevoNombre, $nuevoApellido, $nuevoTelefono) {
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getDocumento() == $documento) {
                $pasajero->setNombre($nuevoNombre);
                $pasajero->setApellido($nuevoApellido);
                $pasajero->setTelefono($nuevoTelefono);
                return true;
            }
        }
        return false; // El pasajero no se encontró en el viaje
    
    }
    
    public function obtenerInformacionPasajeros() {
        $infoPasajeros = "Información de los pasajeros:\n";
        foreach ($this->pasajeros as $pasajero) {
            $infoPasajeros .= "Nombre: " . $pasajero->getNombre() . ", Apellido: " . $pasajero->getApellido() . ", DNI: " . $pasajero->getDocumento() . ", Teléfono: " . $pasajero->getTelefono() . "\n";
        }
        return $infoPasajeros;
    }
    
    
}