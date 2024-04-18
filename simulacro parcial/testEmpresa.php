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
include_once "Venta.php";
function recorrerArr($arr){
    $cad="";
    foreach($arr as $elemento){
        $cad= $cad." ".$elemento."\n";
    }
    return $cad;
}
$objCliente1= new Cliente("Javier", "Castillo",false,"DNI", 48);
$objCliente2= new Cliente("Ignacio", "Castillo",true,"DNI", 32);
$obMoto1= new Moto(11, 2230000,2022,"Benelli Imperiale 400",85,true);
$obMoto2= new Moto(12, 584000,2021,"Zanella Zr 150 Ohc",70,true);
$obMoto3= new Moto(13, 999900,2023,"Zanella Patagonian Eagle 250",55,false);
$empresa= new Empresa("Alta gama","Av Argentina 123",[$objCliente1, $objCliente2],[$obMoto1, $obMoto2, $obMoto3],[]);
echo "Importe de la compra del cliente ".$objCliente1->getNombre()." ".$objCliente1->getApellido().": ".$empresa->registrarVenta([11,12,13],$objCliente1)."\n";
$ventasDeUnCliente=$empresa->retornarVentasXCliente("DNI",48);
recorrerArr($ventasDeUnCliente);
echo $empresa;
