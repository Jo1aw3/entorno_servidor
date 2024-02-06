<?php

include_once 'bista.php';
include_once 'modelo.php';


session_start();
$_SESSION["comprobado"]= FALSE;


$LogBis= new Login_Bista;
$LogBis-> Login();

?>