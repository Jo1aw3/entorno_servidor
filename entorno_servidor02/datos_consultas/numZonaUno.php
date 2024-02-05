<?php

// definimos variables con los datos de phpmyadmin
$user = "root";
$pass = "";
$host = "localhost";

// hacemos conexión con sql
$conexion = mysqli_connect($host, $user, $pass);
if (!$conexion) {
    die ("no se ha conectado correctamente con la base de datos: " . mysqli_error($conexion()));
} else {
    echo "se ha conectado correctamente con la base de datos <br>";
}

// seleccionamos la base de datos con el cual estamos trabajando
// definimos una variable en donde guardaremos el nombre de la base de datos que queremos selecionar
$baseDatos = "viajes";
/*definimos otra variable en donde pasaremos por parametro 
la conexion y el nombre de la base de datos para saber si 
se selecciono correctamente la base de datos con la cual queremos trabajar */
$selBaseDatos = mysqli_select_db($conexion, $baseDatos);
if (!$selBaseDatos) {
    die("no se ha podido seleccionar la base de datos: " . mysqli_error($conexion));
} else {
    echo "la base de datos se selecciono correctamente <br> <hr>";
}

// consultamos los nommbres de los pueblos que se encuentran en la zona 1
$consulta01 = "SELECT nombrePueblo FROM pueblos WHERE zona = 1 ORDER BY nombrePueblo";
// consultamos el numero de pueblos que hay en la zona 1
$consulta02 = "SELECT COUNT(*) AS numero_ciudades FROM pueblos WHERE zona = 1";
// comprobamos la conexion de la primera consulta
$comprobar01 = mysqli_query($conexion, $consulta01);
if (!$comprobar01) {
    // en caso de que no se haga bien la consulta, mostraremos un mensaje de error
    die ("error en la consulta: " . mysqli_error($conexion));
}
// comprobamos la conexion de la segunda consulta
$comprobar02 = mysqli_query($conexion, $consulta02);
if (!$comprobar02) {
    // en caso de que no se haga bien la consulta, mostraremos un mensaje de error
    die ("error en la consulta: " . mysqli_error($conexion));
}

// meteremos dentro de un array los nombres de los pueblos que consultamos anteriormente
$nombrePueblos = array();
while ($fila = mysqli_fetch_assoc($comprobar01)) {
    $nombrePueblos[] = $fila['nombrePueblo'];
}
//obtendremos el resultado de la segunda consulta por medio de un array asociativo
$numeroCiudades = mysqli_fetch_assoc($comprobar02);

// imprimiremos en pantalla las dos consultas 
// imprimiremos la primera consulta recorriendo el array en donde hemos guardado los nombres
foreach ($nombrePueblos as $nombre) {
    echo $nombre . "<br>";
}
// imprimiremos la segunda consulta con el array asociativo
echo "<br>Número de ciudades en la zona 1: " . $numeroCiudades['numero_ciudades'];

// cerraremos la conexión
mysqli_close($conexion);