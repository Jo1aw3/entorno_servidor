<?php
require_once 'config.php';
require_once 'controladores/LibroController.php';

$libroController = new LibroController();

// Determinar la acción a realizar
$action = isset($_GET['action']) ? $_GET['action'] : 'mostrarHome';

// Realizar la acción correspondiente
if (method_exists($libroController, $action)) {
    $libroController->$action();
} else {
    // Manejar acciones no válidas aquí
    echo 'Acción no válida.';
}
