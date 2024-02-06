<?php

include_once "../modelo/loginM.php";
$oModelo = new loginM();

$resCaptcha = $oModelo->captcha();        
$resultCaptcha = $resCaptcha['result'];

if (isset($_POST['b_bidali_login'])) {
    if ($resultCaptcha == $_POST['captcha']) {
        
        $resLogin = $oModelo->login($_POST['erabiltzailea'], $_POST['pasahitza']);
        if ($resLogin) {
            $resPass = $oModelo->getPass($_POST['erabiltzailea']);
            if (password_verify($_POST['pasahitza'], $resPass)) {
                echo "contraseñas iguales";
                echo "login Zuzen";
                session_start();
                $_SESSION['erabiltzailea'] = $_POST['erabiltzailea'];
                echo "Inicio de sesión correcto";
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "Usuario no encontrado";
        }
    }
}