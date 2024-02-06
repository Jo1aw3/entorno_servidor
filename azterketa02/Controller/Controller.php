<?php

session_start();

include_once 'View/Vista.php';
include_once 'Model/UsuarioModel.php';
include_once 'Model/RopaModel.php';
include_once 'Model/PedidoModel.php';

$pagina = new Vista();
$modelo_usuario = new UsuarioModel();
$modelo_ropa = new RopaModel();
$modelo_pedido = new PedidoModel();

$modelo_usuario -> conectar_bd();

if (isset($_POST['Iniciar']) && !$_SESSION["validar_usuario"]) {
    if($modelo_usuario->validar_usuario($_POST['username'], $_POST['password'])) {
        $_SESSION["validar_usuario"] = TRUE;
        $_SESSION["nombreUsuario"] = $_POST['username'];
    } else {
        ?>
        <h3 style="color:red;">Intentalo de nuevo, datos de usuario incorrectos.</h3>
        <?php
        $pagina->Login();
    }
} else if (isset($_POST['Alta'])) {

} else if (isset($_POST['Cambiar'])) {
    
}