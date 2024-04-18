<?php
include_once "viaje.php";
include_once "responsableV.php";
include_once "pasajero.php";
$pasajero= new Pasajero("b", "z", 4, 5);
$responsable=new ResponsableV(30, 102, "Javier", "Castillo");
$viaje= new Viaje(321, "neuquen", 50, $responsable);
function opcionMenu(){
    $menu="1)Agregar pasajero.\n2)Modificar informacion de un pasajero.\n3)Mostrar informacion del viaje.\n4)Modificar informacion del responsable. \n5)Salir";
    echo $menu."\n";
    $numeroOpcionMenu=trim(fgets(STDIN));

    //valida que la opcion ingresada sea valida
    while($numeroOpcionMenu<1 || $numeroOpcionMenu>5){
        echo "Numero invalido ingrese un numero entre 1-5 \n";
        echo $menu;
        $numeroOpcionMenu=trim(fgets(STDIN));
    }
    return $numeroOpcionMenu;
}

$opcionElegida=true;
do{
    $opcion= opcionMenu();

    switch($opcion){

    case 1: 
        echo "Nombre del pasajero: \n";
        $nombreNuevo=trim(fgets(STDIN));
        echo "Apellido del pasajero: \n";
        $apellidoNuevo=trim(fgets(STDIN));
        echo"DNI: \n";
        $dniNuevo=trim(fgets(STDIN));
        echo "Telefono: \n";
        $telefonoNuevo=trim(fgets(STDIN));
        $pasajeroNuevo= new Pasajero($nombreNuevo, $apellidoNuevo, $dniNuevo, $telefonoNuevo);
        if($viaje->agregarPasajero($pasajeroNuevo)){
            echo "El pasajero se agrego correctamente.\n";
            
        }
        else{
            echo "El pasajero ya existe.\n";
        }
        break;
    case 2:
        echo "Ingrese el DNI del pasajero por modificar: \n";
        $dniModif=trim(fgets(STDIN));
        $pasajeroModif = new Pasajero("", "", $dniModif, "");
        if($viaje->existePasajero($pasajeroModif)){
            
        echo "Ingrese el nombre: \n";
        $nombreM=trim(fgets(STDIN));
        echo "Ingrese el apellido: \n";
        $ApellidoM=trim(fgets(STDIN));
        echo "Ingrese el telefono: \n";
        $telefonoM=trim(fgets(STDIN));
        if($viaje->modificarPasajero($dniModif, $nombreM, $ApellidoM, $telefonoM)){
            echo "El pasajero se ha modificado correctamente. \n";
            
        }
        }
        else{
            echo "El pasajero no se encontro en el viaje. \n";
        }

        break;
    case 3:
        echo"Codigo de viaje:".$viaje->getCodigo()."\n".
        "Destino:".$viaje->getDestino()."\n".
        "Capacidad maxima:".$viaje->getMaxPasajeros()." personas.\n".
        "Responsable:".$responsable->getNombre()." ".$responsable->getApellido()."\n".
        "Num de empleado:".$responsable->getNumEmpleado()."\n".
        "Num de licencia:".$responsable->getNumLicencia()."\n".
        $viaje->obtenerInformacionPasajeros();
        
        break;
    case 4:
        echo "Ingrese el nombre: ";
        $nombreEmpleado=trim(fgets(STDIN));
        $responsable->setNombre($nombreEmpleado);
        echo "\nIngrese el apellido: ";
        $apellidoEmpleado=trim(fgets(STDIN));
        $responsable->setApellido($apellidoEmpleado);
        echo "\nIngrese el num de licencia: ";
        $licencia=trim(fgets(STDIN));
        $responsable->setNumLicencia($licencia);
        echo "\nIngrese el num de empleado: ";
        $numEmpleado=trim(fgets(STDIN));
        $responsable->setNumEmpleado($numEmpleado);
        
        break;
    case 5:
        $opcionElegida=false;
        break;
}

}while($opcionElegida);