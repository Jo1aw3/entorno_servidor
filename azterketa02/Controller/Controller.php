<?php

session_start();

include_once '../View/Vista.php';
include_once '../Model/UsuarioModel.php';
include_once '../Model/RopaModel.php';

$visualizar = new Vista;
$userModel = new UsuarioModel;
$ropaModel = new RopaModel;

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
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $datosUsuario = $userModel->validar_usuario($user, $pass);

    $_SESSION["validarUsuario"] = TRUE;
    if ($datosUsuario) {
        $_SESSION['user'] = $datosUsuario['user'];
        $_SESSION['admin'] = $datosUsuario['admin'];
        $_SESSION['id'] = $datosUsuario['id'];
        if ($datosUsuario['admin'] == 1) {
            $visualizar->area_usuario_admin();
        } else {
            $visualizar->area_usuario($ropaModel->obtener_ropa());
        }

    } else {
        ?>
        <h3 style="color: red;">Intentalo de nuevo.</h3>
        <?php
        $visualizar->Login();
    }
}

// Control para el formulario que cambia el password
if (isset($_POST['Cambiar'])) {
    $visualizar->cambiarContra();
}