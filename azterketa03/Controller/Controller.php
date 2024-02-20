<?php

session_start();

include_once '../View/Vista.php';
include_once '../Model/trabajadorasModel.php';
include_once '../Model/editorialesModel.php';
include_once '../Model/librosModel.php';

$visualizar = new Vista;
$userModel = new UsuarioModel;
$editModel = new EditorialesModel;
$libModel = new LibrosModel;

// galletas
if (!isset($_COOKIE['user']) && $_SESSION['validarUsuario']) {
    echo "se ha terminado la sesion";
    $_SESSION['validarUsuario'] = FALSE;
    $visualizar->Login();
    exit;
}

// Control para el formulario de Inicio de Sesion
if (isset($_POST['Entrar'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $datosUsuario = $userModel->validar_usuario($user, $pass);
    setcookie("user", $user, time() + 60, "/");
    $_SESSION["validarUsuario"] = TRUE;
    if ($datosUsuario) {
        $_SESSION['Usuario'] = $datosUsuario['Usuario'];
        $_SESSION['Autor'] = $datosUsuario['Autor'];
        $_SESSION['AutorID'] = $datosUsuario['AutorID'];
        if ($datosUsuario['Autor'] == 1) {
            $visualizar->area_autor();
        } else {
            $visualizar->area_editor();
        }
    } else {
        ?>
        <h3 style="color: red;">Intentalo de nuevo.</h3>
        <?php
        $visualizar->Login();
    }
}

// Control para el cambio de contraseña
if (isset($_POST['Cambiar'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $datosUsuario = $userModel->validar_usuario($user, $pass);
    if ($datosUsuario) {
        $_SESSION['Usuario'] = $datosUsuario['Usuario'];
        $visualizar->cambiarContra();
    } else {
        echo "datos incorrectos";
        $visualizar->Login();
    }
}
if (isset($_POST['Cambiar_pass'])) {
    $resultado = $userModel->cambiar_contra($_POST['contra']);
    if ($resultado) {
        echo "Se ha cambiado la contraseña";
        $visualizar->Login();
    } else {
        echo "No se ha cambiado la contraseña";
        $visualizar->Login();
    }
}

// Control para la vista de editor
// Control para darse de Alta
if (isset($_POST['Alta'])) {
    $visualizar->nuevoUsuario();
}

if (isset($_POST['Dar_de_alta'])) {
    if (isset($_POST['id']) && isset($_POST['usuario']) && isset($_POST['contra']) && isset($_POST['nombre']) && isset($_POST['nacionalidad']) && isset($_POST['autor'])) {
        $userModel->incluir_usuario($_POST['id'], $_POST['usuario'], $_POST['contra'], $_POST['nombre'], $_POST['nacionalidad'], $_POST['autor']);
        echo "Se ha dado de alta!";
    } else {
        echo "No has introducido todos los datos";
    }
}

// ver libros editor
if (isset($_POST['lib_editor_ver'])) {
    $visualizar->CrearTablaLibrosEditor($libModel->ver_libros_editor());
}

// publicar libros
if (isset($_POST['publi_libros'])) {
    $visualizar->Libros($libModel->libros_null());
}

// Contro para la vista del autor
if (isset($_POST['subir'])) {
    $visualizar->SubirLibro();
}

// ver libros
if (isset($_POST['lib_autor_ver'])) {
    $visualizar->CrearTablaLibro($libModel->ver_libros());
}

// subir libro
if (isset($_POST['Subir'])) {
    if (!$_POST['nombre'] == "") {
        if ($libModel->verificar_libro($_POST['nombre'])) {
            echo "Este libro ya existe";
        } else {
            $libModel->insertar_libro($_POST['nombre']);
            echo "Se ha subido el libro"; 
        }
    } else {
        echo "Escribe el Nombre porfa";
    }
}
