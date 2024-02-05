<?php 
$user = "root";
$pass = "";
$host = "localhost";

$conectar = mysqli_connect($host, $user, $pass);
if (!$conectar) {
    echo "no se ha conectado con la base de datos" . mysqli_connect_error();
} else {
    echo "se ha conectado con la base de datos";
}

echo "hola esto es solamente un testeo a";

mysqli_close($conectar);