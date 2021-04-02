<?php
//Leandro Fuentes FAI-465
include "Teatro.php";

/******************************************/
/************** PROGRAMA PRINCIPAL *********/
/******************************************/

//Crea una instancia de la clase teatro con un nombre y direccion genericos
$unTeatro = new Teatro("Lido","Corrientes 1885");
$cantFunciones = 0;



do{
    //Se invoca a la funcion seleccionarOpcion
    //Esta funcion despliega un menu y pide al usuario ingresar una opcion
    $opcion = seleccionarOpcion();

    //Se ejecuta el numero de opcion elegido por el usuario
    switch ($opcion) {
        case 1: //Mostrar la informacion del teatro
            echo "\n Teatro: ".$unTeatro->getNombre()." ";
            echo "\n Direccion: ".$unTeatro->getDireccion()."\n ";
            break;

        case 2: //Cambiar nombre del teatro
            echo "\n Ingrese el nuevo nombre del Teatro: ";
            $nom = trim(fgets(STDIN));
            $unTeatro->setNombre($nom);
            break;

        case 3: //Cambiar direccion del teatro
            echo "\n Ingrese la nueva direccion ";
            $dire = trim(fgets(STDIN));
            $unTeatro->setDireccion($dire);
            break;

        case 4: //Ver funciones disponibles
            echo "\n ¡Estas son las funciones disponibles! \n";
            print_r($unTeatro->getFunciones());
            break;

        case 5: //Agregar nueva funcion
            if($cantFunciones < 4)
            {
                echo "\n Ingrese el nombre de la nueva funcion \n";
                $nomFuncion = trim(fgets(STDIN));
                echo "\n Ingrese el precio de la entrada \n";
                $precio = trim(fgets(STDIN));
                $unTeatro->agregarFunciones($cantFunciones, $nomFuncion, $precio);
                $cantFunciones++;
            }
            else
                {
                    //Solo deja agregar hasta 4 funciones, luego solo pueden modificarse
                    echo "\n Se supero el numero maximo de funciones diarias \n";
                }
            break;

        case 6: //Modificar Funcion
            if(count($unTeatro->getFunciones())>0)
            {
                $bucle = true;
                echo "\n Estas son las funciones disponibles, seleccione una a modificar[0-" . count($unTeatro->getFunciones())-1 . "]\n";
                print_r($unTeatro->getFunciones());
                while ($bucle)
                {
                    $nroFuncion = trim(fgets(STDIN));
                    if($nroFuncion <= count($unTeatro->getFunciones())-1)
                        {
                    echo "\n Ingrese el nuevo nombre de la funcion: ";
                    $nomFuncion = trim(fgets(STDIN));
                    echo "\n Ingrese el precio de la entrada: ";
                    $precio = trim(fgets(STDIN));
                    $bucle = $unTeatro->setFunciones($nroFuncion, $nomFuncion, $precio);

                        } else
                        {
                            //Solo deja que el usuario acceda a las funciones preexistentes sin posibilidad de modificar un indice vacio
                            echo "\n Error, ingrese una de las funciones disponibles:[0-" . count($unTeatro->getFunciones())-1 . "] \n";
                        }
                }

            } else
                {
                   echo "\n Aun no hay funciones programadas para modificar \n";
                }
            break;
    }
}while($opcion != 7);

function seleccionarOpcion(){
    do
    {
        echo "--------------------------------------------------------------\n";
        echo "\n ( 1 ) Mostrar la informacion del teatro";
        echo "\n ( 2 ) Cambiar nombre al teatro";
        echo "\n ( 3 ) Cambiar direccion del teatro";
        echo "\n ( 4 ) Ver funciones disponibles";
        echo "\n ( 5 ) Agregar nueva funcion";
        echo "\n ( 6 ) Modificar funcion";
        echo "\n ( 7 ) Salir";
        echo "\n        ";
        $opcion = trim(fgets(STDIN));

        /*>>> Además controlar que la opción elegida es válida. Puede que el usuario se equivoque al elegir una opción <<<*/
        if($opcion < 1 || $opcion > 7)
        {
            echo "\n---------- Indique una opcion valida ----------\n";
        }
    } //Si la opcion es invalida muestra una advertencia y vuelve a mostrar el menu
    while(!($opcion >= 1 && $opcion <= 7));

    echo "--------------------------------------------------------------\n";
    return $opcion;
}
