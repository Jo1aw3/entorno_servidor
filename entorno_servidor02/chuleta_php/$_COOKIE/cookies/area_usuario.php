<?php
if(!isset($_COOKIE['username'])) {
    header("Location: index.html");
    exit;
}

// Aquí puedes agregar el contenido de tu área de usuario
echo "¡Bienvenido, " . $_COOKIE['username'] . "!";
?>