<?php

include_once 'View/vista.php';

session_start();
$_SESSION["session"] = FALSE;

$vista = new Vista();
$vista->inicio_sesion();