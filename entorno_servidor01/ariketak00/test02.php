<?php

$num01 = rand(0,10);
$num02 = rand(0,10);
$num03 = rand(0,10);

$orden = array($num01, $num02, $num03);
sort($orden);

$num01 = $orden[0];
$num02 = $orden[1];
$num03 = $orden[2];

echo "numeros aleatorios ordenados ascendentemente <br>";
echo $num01, "<br>";
echo $num02, "<br>";
echo $num03;

?>