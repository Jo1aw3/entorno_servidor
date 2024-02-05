<?php 

// definir variable de acceso para mysql
$user = "root";
$pass = "";
$host = "localhost";

// conexión a mysql
$conectar = mysqli_connect($host, $user, $pass);
if (!$conectar) {
    die ("no se ha conectado con la base de datos" . mysqli_error($conectar));
} else {
    echo "se ha conectado correctamente con la base de datos <br>";
}

// selección de la base de datos con la cual vamos a trabajar
$baseDatos = "viajes";
$selBaseDatos = mysqli_select_db($conectar, $baseDatos);
if (!$selBaseDatos) {
    die("No se ha podido seleccionar la base de datos: " . mysqli_error($conectar));
} else {
    echo "la base de datos se selecciono correctamente <br> <hr>";
}

// consulta de los nombres de los pueblos
$query = "SELECT nombrePueblo FROM pueblos";
$comprobar = mysqli_query($conectar, $query);

// comprobar si la consulta fue exitosa
if (!$comprobar) {
    die ("error en la consulta: " . mysqli_error($conectar));
}

// almecenar los nombre de los pueblos en un array
$nombresPueblos = array();
while ($fila = mysqli_fetch_assoc($comprobar)) {
    $nombresPueblos[] = $fila['nombrePueblo'];
}

// imprimir los nombres de los pueblos
foreach ($nombresPueblos as $nombre) {
    echo $nombre . "<br>";
}

// Cierre de la conexión
mysqli_close($conectar);