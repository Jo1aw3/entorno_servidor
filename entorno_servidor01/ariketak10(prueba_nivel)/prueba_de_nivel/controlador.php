<?php

session_start();

include_once 'vista.php';
include_once 'modelo.php';

$pagina = new Vista;
$model = new Modelo;

$model -> conectar_datos();

$opciones=["elemento quimico del oro?" => array("Fr", "Au", "Ur"),
    "azul +  rojo = ?" => array("Verde", "Morado"),
    "cuanto da 4x4?" => array("7", "16", "14", "15")];
$respuesta=["elemento quimico del oro?" => "Au",
    "azul +  rojo = ?" => "Morado",
    "cuanto da 4x4?" => "16"];

if (isset($_POST['boton']) && !$_SESSION[])

