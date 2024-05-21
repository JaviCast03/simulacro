<?php

class MotoImportada extends Moto {
    private $paisOrigen;
    private $impuestoPorImportacion;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa, $paisOrigen, $impuestoPorImportacion){
        parent::__construct( $codigo,  $costo,  $anioFabricacion,  $descripcion,  $porcentajeIncrementoAnual,  $activa);
        $this->impuestoPorImportacion = $impuestoPorImportacion;
        $this->paisOrigen = $paisOrigen;
    }

    public function getImpuestoPorImportacion(){
        return $this->impuestoPorImportacion;
    }

    public function setImpuestoPorImportacion($value){
        $this->impuestoPorImportacion = $value;
    }

    public function getPaisOrigen(){
        return $this->paisOrigen;
    }

    public function setPaisOrigen($value){
        $this->paisOrigen = $value;
    }

    public function __toString(){
        $string = parent::__toString();
        $string .= "País de origen: " . $this->getPaisOrigen() . "\n";
        $string .= "Porcentaje de impuesto por importación: " . $this->getImpuestoPorImportacion() . "\n";
        return $string;
    }

    public function darPrecioVenta(){
        $precioVenta = parent::darPrecioVenta();
        if ($precioVenta != -1){
            $precioVenta += $this->getImpuestoPorImportacion();
        }
        return $precioVenta;
    }
}