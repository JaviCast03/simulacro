<?php
include_once "mostrador.php";
include_once "tramites.php";
include_once "banco.php";

function opcionMenu(){
    $colTramites=array("jubilacion", "pagos de cuota", "patente");
    $tramites1= new Tramites($colTramites);
    
    $menu="Escriba el tramite que desea realizar: ". $tramites1."\n";
    
    echo $menu;
    $strTramite=trim(fgets(STDIN));
    $strTramite=strtolower($strTramite);
    return $strTramite;
}

$opcionElegida=true;
do{
    $tramites= opcionMenu();
    switch($opcion){
    case 1: 
        
       
        break;
    case 2:
        

        break;
    case 3:
        
        
        break;
    case 4:
        
        
        break;
    case 5:
        $opcionElegida=false;
        break;
}

}while($opcionElegida);