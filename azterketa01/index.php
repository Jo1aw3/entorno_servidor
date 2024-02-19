<?php

include_once 'Vista/bista.php';
include_once 'Modelo/modelo.php';

session_start();

$_SESSION["sesion"] = FALSE;

$visualizar = new Login_Bista;
$visualizar->Login();