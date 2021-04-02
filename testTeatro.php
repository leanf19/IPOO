<?php


class Teatro
{
    private $nombre;
    private $direccion;
    private $funcion;

    public function __construct($nom,$dir, $fun)
    {
        $this->nombre = $nom;
        $this->direccion = $dir;
        $this->funcion =$fun;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getFuncion()
    {
        return $this->funcion;
    }
    public function setNombre($nom)
    {
        $this->nombre = $nom;
    }
    public function setDireccion($dir)
    {
        $this->direccion = $dir;
    }
    public function setFuncion($fun)
    {
        $this->funcion = $fun;
    }
}

/******************************************/
/************** PROGRAMA PRINCIPAL *********/
/******************************************/

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

//Programa principal
do{
    //Se invoca a la funcion seleccionarOpcion
    //Esta funcion despliega un menu y pide al usuario ingresar una opcion
    $opcion = seleccionarOpcion();

    //Se ejecuta el numero de opcion elegido por el usuario
    switch ($opcion) {
        case 1: //Mostrar la informacion del teatro
            // Teatro.toString;
            break;

        case 2: //Cambiar nombre del teatro
            echo "Ingrese el nuevo nombre del Teatro";
            $nom = trim(fgets(STDIN));
            //setNombre($nom);
            break;

        case 3: //Cambiar direccion del teatro
            echo "Ingrese la nueva direccion";
            $dire = trim(fgets(STDIN));
            //setDireccion($dire);
            break;

        case 4: //Ver funciones disponibles
            //print_r($funciones[]);
            break;

        case 5: //Agregar nueva funcion
            echo "Ingrese el nombre de la nueva funcion";
            $nomFuncion = trim(fgets(STDIN));
            echo "Ingrese el precio de la entrada";
            $precio = trim(fgets(STDIN));
            //agregarFuncion($nomFuncion,$precio,$funciones[]);
            break;

        case 6: //Modificar Funcion
           echo "Estas son las funciones disponibles, seleccione una a modificar";
           //print_r($Funciones[])
           $nroFuncion = trim(fgets(STDIN));//+-1
           echo "Ingrese el nuevo nombre de la funcion";
            $nomFuncion = trim(fgets(STDIN));
            echo "Ingrese el precio de la entrada";
            $precio = trim(fgets(STDIN));
           //modificarFuncion($nroFuncion, $nomFuncion, $precio);
            break;
    }
}while($opcion != 7);
