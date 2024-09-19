<?php

session_start();

include_once '../View/Vista.php';
include_once '../Model/UsuarioModel.php';
include_once '../Model/RopaModel.php';
include_once '../Model/PedidoModel.php';

$visualizar = new Vista;
$userModel = new UsuarioModel;
$ropaModel = new RopaModel;
$pedidoModel = new PedidoModel;

if (!isset($_COOKIE['user']) && $_SESSION['validarUsuario']) {
    echo "se ha terminado la sesion";
    $_SESSION['validarUsuario'] = FALSE;
    $visualizar->Login();
    exit;
}

// Control para el formulario de Inicio de Sesion
if (isset($_POST['Iniciar'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $datosUsuario = $userModel->validar_usuario($user, $pass);
    setcookie("user", $user, time() + 30, "/");
    $_SESSION["validarUsuario"] = TRUE;
    if ($datosUsuario) {
        $_SESSION['user'] = $datosUsuario['user'];
        $_SESSION['admin'] = $datosUsuario['admin'];
        $_SESSION['id'] = $datosUsuario['id'];
        if ($datosUsuario['admin'] == 1) {
            $visualizar->area_usuario_admin();
        } else {
            $visualizar->area_usuario($ropaModel->obtener_ropa());
        }
    } else {
?>
        <h3 style="color: red;">Intentalo de nuevo.</h3>
<?php
        $visualizar->Login();
    }
}

// Contro para la vista del Usuario
if (isset($_POST['Comprar'])) {
    $idUsuario = $_SESSION['id'];
    $idRopa = $_POST['productos'];
    $cantidad = $_POST['numeros'];
    $resultado = $pedidoModel->insertar_pedido($idUsuario, $idRopa, $cantidad);
    if ($resultado) {
        echo "Se ha insertado el pedido";
        $visualizar->area_usuario($ropaModel->obtener_ropa());
    } else {
        echo "No se ha insertado el pedido";
        $visualizar->area_usuario($ropaModel->obtener_ropa());
    }
}

// Control para la vista de Admin
// Control para Crear Productos
if (isset($_POST['Productos'])) {
    $visualizar->crearProducto();
}

if (isset($_POST['Crear_Producto'])) {
    $id = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $resultado = $ropaModel->insertar_ropa($id, $nombre, $precio);
    if ($resultado) {
        echo "Se ha insertado el producto";
        $visualizar->area_usuario_admin();
    } else {
        echo "No se ha insertado el producto";
        $visualizar->area_usuario_admin();
    }
}

// Control para mostrar Pedidos
if (isset($_POST['Pedidos'])) {
    $visualizar->generarTablaPedidos($pedidoModel->optener_pedido());
}

// Control para darse de Alta
if (isset($_POST['Alta'])) {
    $visualizar->darseDeAlta();
}

if (isset($_POST['Darse_de_alta'])) {
    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['contra']) && isset($_POST['admin'])) {
        $userModel->incluir_usuario($_POST['id'], $_POST['nombre'], $_POST['contra'], $_POST['admin']);
        echo "Se ha dado de alta!";
    } else {
        echo "No has introducido todos los datos";
    }
}

// Control para el cambio de contraseña
if (isset($_POST['Cambiar'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $datosUsuario = $userModel->validar_usuario($user, $pass);
    if ($datosUsuario) {
        $_SESSION['user'] = $datosUsuario['user'];
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