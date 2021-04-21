<?php
//Primer parcial IPOO Leandro Fuentes FAI-465 LCC
require_once "Financiera.php";
require_once "Prestamo.php";
require_once "Cuota.php";
require_once "Personas.php";

function main()
{
    //inciso 1 test
    $financiera1 = new Financiera("Money", "Av. Arg 1234");
    //creacion de persona 1 y 2 por separado
    $persona1 = new Personas("Pepe", "Florez","18456798", "Bs As 12", "dir@gmail.com", "299 444567", 4000);
    $persona2 = new Personas("Luis", "Suarez", "18456795", "Bs As 123", "dir@gmail.com", "299 4445", 40000);
    //inciso 2 test
    $prestamo1 = new Prestamo(1, "001","", 50000, 5, 0.1, $persona1);
    $prestamo2 = new Prestamo(2, "002","", 10000, 4, 0.1, $persona2);
    $prestamo3 = new Prestamo(3, "003","", 10000, 2, 0.1, $persona2);
    //inciso 3 test
    $financiera1->incorporarPrestamo($prestamo1);
    $financiera1->incorporarPrestamo($prestamo2);
    $financiera1->incorporarPrestamo($prestamo3);

    //Inciso 4 test
    echo "Inciso 4 test: \n" . $financiera1;
    echo "--------------------------------------";
    //inciso 5 test
    $financiera1->otorgarPrestamoSiCalifica();
    //Inciso 6 test
    echo "Inciso 6 test: \n" . $financiera1;
    echo "--------------------------------------";
    //inciso 7 test
    $objCuota = $financiera1->informarCuotaPagar(2);
    //inciso 8 test
    echo "--------------------------------------";
    echo "8:" . $objCuota;
    echo "--------------------------------------";
    //inciso 9 test
    echo "9: Monto final cuota: {$objCuota->darMontoFinalCuota()}";
    //inciso 10
    $objCuota->setCancelada(true);
    //inciso 11 test
    $objCuota2 = $financiera1->informarCuotaPagar(2);
    //inciso 12 test
    echo "Enunciado 12: " . $objCuota2;
}


main();