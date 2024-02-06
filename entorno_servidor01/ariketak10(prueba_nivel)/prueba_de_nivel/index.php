<?php

include_once 'vista.php';
include_once 'modelo.php';

session_start();
$_SESSION["validar_usuario"] = FALSE;

$pagina = new Vista;
$pagina -> formulario_completo();