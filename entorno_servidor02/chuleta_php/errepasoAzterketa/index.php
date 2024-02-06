<?php

include_once("vista/bista.php");
include_once("modelo/loginM.php");

$oModelo = new loginM();
$obista = new bista();

$arr = $oModelo->captcha();

$obista->login($arr['path_img']);

$obista->register();
?>