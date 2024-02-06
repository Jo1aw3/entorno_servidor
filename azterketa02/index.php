<?php

include_once 'View/Vista.php';
include_once 'Model/UsuarioModel.php';
include_once 'Model/RopaModel.php';
include_once 'Model/PedidoModel.php';

session_start();
$_SESSION["validar_usuario"] = FALSE;

$pagina = new Vista();
$pagina->Login();