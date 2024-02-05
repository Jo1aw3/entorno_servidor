<?php
$dias = [
    "lunes" => 1,
    "martes" => 2,
    "miercoles" => 3,
    "jueves" => 4,
    "viernes" => 5,
    "sabado" => 6,
    "domingo" => 7
];
$total = 0;

foreach ($dias as $dia_semana => $valor) {
    echo $dia_semana," ", $valor, "<br>";
}

$total = array_sum($dias);
echo 'Total : '. $total;
