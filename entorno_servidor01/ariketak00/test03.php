<?php

$num01 = rand(0,5);
$num02 = rand(0,5);
$num03 = rand(0,5);

echo "los numeros aleatorios son los siguientes: <br>";
echo "- ", $num01, "<br>";
echo "- ", $num02, "<br>";
echo "- ", $num03, "<br>";

if ($num01 == $num02) {
    echo $num01, " y ", $num02, " son iguales <br>";
}
if ($num01 == $num03) {
    echo $num01, " y ", $num03, " son iguales <br>";
}
if ($num02 == $num03) {
    echo $num02, " y ", $num03, " son iguales <br>";
}

?>