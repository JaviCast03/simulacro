<?php
/*1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
    2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
    descripción, porcentaje incremento anual, activo.
    
    5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
    $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
    punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.

    6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
    $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
    punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
    7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
    $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
    punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
    8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
    corresponden con el tipo y número de documento del $objCliente1.
    9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
    corresponden con el tipo y número de documento del $objCliente2
    10. Realizar un echo de la variable Empresa creada en 2.
    */
include_once "Cliente.php";
include_once "Empresa.php";
include_once "Moto.php";
include_once "MotoImportada.php";
include_once "MotoNacional.php";
include_once "Venta.php";
function recorrerArr($arr){
    $cad="";
    foreach($arr as $elemento){
        $cad= $cad." ".$elemento."\n";
    }
    return $cad;
}
$objCliente1= new Cliente("Javier", "Castillo",false,"DNI", 48);
$objCliente2= new Cliente("Ignacio", "Castillo",false,"DNI", 32);
$objMoto11 = new MotoNacional (11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto12 = new MotoNacional (12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto13 = new MotoNacional (13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);
$objMoto14 = new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400);
$empresa = new Empresa("Alta Gama", "Av Argentina 123", [$objCliente1, $objCliente2] , [$objMoto11, $objMoto12, $objMoto13, $objMoto14], []);

echo $empresa->registrarVenta([11,12,13,14], $objCliente2) . "\n";
echo $empresa->registrarVenta([13,14], $objCliente2) . "\n";
echo $empresa->registrarVenta([14, 2], $objCliente2) . "\n";

var_dump($empresa->informarVentasImportadas());
echo $empresa->informarSumaVentasNacionales();
echo $empresa;

