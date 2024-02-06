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
                $pagina->PreguntasRespuestas($opciones);
                break;
        }
    } else {
        ?>
        <h3 style="color:red;">No has elegido que quieres hacer.</h3>
        <?php
        $pagina->formulario_opciones();
    }
    
}

if ($_SESSION["validar_usuario"] && isset($_POST['boton_enviar'])) {
    $puntos = 0;
    $contador = 0;
    foreach ($respuesta as $pregunta => $respuestas) {
        if ($_POST['pregunta'. $contador++] == $respuesta) {
            echo ($pregunta . "la respuesta de la pregunta" . $pregunta . "es correcta");
            $puntos = $puntos + 3;
        }
    }
    echo $puntos . "los puntos que has obtenido";
    $model->insertar_puntuacion($_POST['userName'], $puntos);
    $pagina->formulario_opciones();
}