<?php
$estaciones = ["invierno","primavera","verano","otoño"];
foreach ($estaciones as $valor) {
    echo $valor. "<br>";
}
for ($i = 0; $i < count($estaciones); $i++ ) {
    echo $estaciones[$i]. "<br>";
}