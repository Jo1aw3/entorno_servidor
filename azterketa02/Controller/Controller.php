<?php

include_once '../View/Vista.php';
include_once '../Model/UsuarioModel.php';

$visualizar = new Vista;
$userModel = new UsuarioModel;

$userModel->conexion_bd();

// Control para el formulario de Alta
if (isset($_POST['Alta'])) {
    $visualizar->darseDeAlta();
}

if (isset($_POST['Darse_de_alta'])) {
    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['contra']) && isset($_POST['admin'])) {
        $userModel->incluir_usuario($_POST['id'], $_POST['nombre'], $_POST['contra'], $_POST['admin']);
        echo "Se ha dado de alta!";
    } else {
        echo "No has introducido todos los datos";
    }
}

// Control para el formulario que Inicia Sesion
if (isset($_POST['Iniciar'])) {

}

// Control para el formulario que cambia el password
if (isset($_POST['Cambiar'])) {
    $visualizar->cambiarContra();
}