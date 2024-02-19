<?php
// en index llamamos a una funcion global para guardar la sesion
session_start();

// en index incluimos los archivos que necesitamos para instanciar objetos de su respectiva clase
include_once 'View/Vista.php';
include_once 'Model/UsuarioModel.php';

// como no hemos iniciado sesion, lo pondremos en FALSE
$_SESSION["validarUsuario"] = FALSE;

// en index.php definimos una variable para instanciar un objeto de la clase Vista.
$visualizar = new Vista;
// llamo a la función de la clase Vista por el objeto que acabo de instanciar
$visualizar->Login();
// se visualizara en pantalla el contenido de la funcion: este es un formulario para iniciar sesion
// dentro del controlador
