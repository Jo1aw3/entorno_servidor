<?php

session_start();

include_once 'View/Vista.php';
include_once 'Model/trabajadorasModel.php';

$_SESSION["validarUsuario"] = FALSE;

$visualizar = new Vista;
$visualizar->Login();