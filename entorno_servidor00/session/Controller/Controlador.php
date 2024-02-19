<?php

session_start();

include_once '../View/Vista.php';
include_once '../Model/Modelo.php';

$vista = new Vista();
$modelo = new Modelo();

if (isset($_POST['iniciar'])) {
    if ($modelo->validar_usuario($_POST['username'], $_POST['password'])) {
        $_SESSION['session'] = TRUE;
        $vista->vista_usuario();
    } else {
        echo 'Intente Nuevamente';
        $vista->inicio_sesion();
    }
}