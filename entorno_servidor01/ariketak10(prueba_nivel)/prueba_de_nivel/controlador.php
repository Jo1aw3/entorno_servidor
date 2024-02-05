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

if (isset($_POST['boton']) && !$_SESSION["validar_usuario"]) {
    if($model->validar_usuario($_POST['userName'], $_POST['userPass'])) {
        $_SESSION["validar_usuario"] = TRUE;
        $_SESSION["Usuario"] = $_POST['userName'];
    } else {
        ?>
        <h3 style="color:red;">Intentalo de nuevo, datos de usuario incorrectos.</h3>
        <?php
        $pagina->formulario_completo();
    }
}

if ($_SESSION["validar_usuario"] && isset($_POST['boton'])) {
    if(isset($_POST['opcion'])) {
        switch ($_POST['opcion']) {
            case 'puntuacion':
                $pagina->formulario_opciones();
                $pagina->mostrar_puntuaciones($model->ordenar_puntuaciones());
                break;
            case 'jugar':
                
                break;
        }
    }
        
}