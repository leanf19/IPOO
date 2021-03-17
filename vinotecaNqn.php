<?php

//Leandro Fuentes FAI-465

//Precarga del stock de la vinoteca
$vinoteca = array();

$vinoteca['Malbec'] = array(
    array("cantidad" => 2, "anio" => "1999", "precio" => 240),
    array("cantidad" => 76, "anio" => "2003", "precio" => 150),
    array("cantidad" => 12, "anio" => "2003", "precio" => 150)
);
$vinoteca['Merlot'] = array(
    array("cantidad" => 56, "anio" => "2003", "precio" => 250),
    array("cantidad" => 30, "anio" => "1975", "precio" => 1500),
    array("cantidad" => 12, "anio" => "2003", "precio" => 150)
);

$vinoteca['Cabernet Sauvignon'] = array(
    array("cantidad" => 67, "anio" => "2008", "precio" => 270),
    array("cantidad" => 53, "anio" => "2014", "precio" => 500),
    array("cantidad" => 5, "anio" => "2003", "precio" => 150)
);

print_r(promedioStock($vinoteca));

//recalcula el promedio del stock y devuelve
function promedioStock($array)
{
    $depositoVinos = array();
    foreach ($array as $variedad => $vinoVariedad) {
        $vinoStock = 0;
        $precioTotalPromedio = 0;
        foreach ($vinoVariedad as $vino) {
            $vinoStock = $vinoStock + $vino['cantidad'];
            //calculo del precio total de cada vino por variedad
            $precioTotalPromedio = $precioTotalPromedio + ($vino['precio'] * $vino['cantidad']);
        }
        $depositoVinos[$variedad] = array("cantStock" => $vinoStock, "precioTotalPromedio" => $precioTotalPromedio / $vinoStock);
    }
    return $depositoVinos;


}

