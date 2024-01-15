<?php

$meses_num = [
    "enero" => 0,
    "febrero" => 0,
    "marzo" => 0,
    "abril" => 0,
    "mayo" => 0,
    "junio" => 0,
    "julio" => 0,
    "agosto" => 0,
    "septiembre" => 0,
    "octubre" => 0,
    "noviembre" => 0,
    "diciembre" => 0
];

$meses_largos = array("enero","marzo","mayo","julio","septiembre","noviembre");
$meses_cortos = array("abril","junio","agosto","octubre","diciembre");

foreach ($meses_num as $mes => $dia) {
    if (in_array($mes, $meses_largos)) {
        $dia = 31;
    } elseif(in_array($mes, $meses_cortos)) {
        $dia = 30;
    } else {
        $dia = cal_days_in_month(CAL_GREGORIAN, 2,date("Y"));
    }
    
    $meses_num[$mes]=$dia;
}

foreach ($meses_num as $clave => $valor) {
    echo $clave," ", $valor, "<br>";
}

?>