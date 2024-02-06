<?php

// Session Start
session_start();

// Archivos necesarios
include_once 'bista.php';
include_once 'modelo.php';

// Instancias de clases
$LogBis = new Login_Bista;
$jok_model = new Jokalari_Modeloa;
$jok_model->conectar();

// Comprueba si se ha enviado el formulario de inicio de sesión y no se ha autenticado antes
if (isset($_POST['b_sartu_entrar']) && !$_SESSION["comprobado"]) {
    // Verifica las credenciales del usuario
    if ($jok_model->balioztatzea($_POST['erab_usuario'], $_POST['ph'])) {
        // Autenticación exitosa, establece variables de sesión y regenera el ID de sesión
        $_SESSION["comprobado"] = TRUE;
        $_SESSION["Erab"] = $_POST['erab_usuario'];

        // Regenera el ID de sesión despues de iniciar sesion correctamente
        session_regenerate_id();

        echo "<h3 style='color: red;'>Ondo sartutaaaaa.</h3>";
        $LogBis->informacion_server();
        $LogBis->cookies();
        $LogBis->volverAtras();
        // Muestra información del servidor y cookies si se ha enviado el formulario
    } else {
        echo "<h3 style='color: red;'>Saiatu berriro, erabiltzailea edo pasahitza ez dituzu ondo sartu.</h3>";
        $LogBis->Login();
    }
}

if(isset($_POST['a_alta'])){
    echo "<h3 style='color: red;'>Nuevo Alta</h3>";
    $LogBis->Alta();
    $LogBis->volverAtras();
}

if(isset($_POST['a_alta_usuario'])){
    var_dump($_POST);
    $LogBis->Alta();
    $LogBis->volverAtras();
    $jok_model->insertarusuario($_POST['dni_usuario'],$_POST['erab_usuario'],$_POST['ph']);
}

// Muestra información del servidor si se ha enviado el formulario y se ha autenticado
if(isset($_POST['info_server']) && $_SESSION["comprobado"]){
    // Obtiene la información del servidor
    $server_software = $_SERVER['SERVER_SOFTWARE'];
    $server_name = $_SERVER['SERVER_NAME'];
    $server_ip = $_SERVER['SERVER_ADDR'];
    $php_version = phpversion();

    // Muestra la información del servidor
    echo "<p>Servidor de software: $server_software</p>";
    echo "<p>Nombre del servidor: $server_name</p>";
    echo "<p>Dirección IP del servidor: $server_ip</p>";
    echo "<p>Versión de PHP: $php_version</p>";
    $LogBis->volverAtras();
}

// Crea una cookie si se ha enviado el formulario y se ha autenticado
if(isset($_POST['cookies_server']) && $_SESSION["comprobado"]){
    $cookie_name = "user";
    $cookie_value = $_SESSION["Erab"];

    // Establece una cookie con un tiempo de 30 días
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 día

    echo "<p>Cookie creada con nombre: $cookie_name y valor: $cookie_value</p>";
    echo "<p>Para ver la cookie, recargue la página.</p>";

    // Imprime el valor de la cookie directamente después de establecerla
    echo "<p>Valor de la cookie 'user': " . $_COOKIE['user'] . "</p>";
    $LogBis->volverAtras();
}




