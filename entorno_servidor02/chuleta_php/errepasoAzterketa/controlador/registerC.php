<?php

include_once "../modelo/loginM.php";
$oModelo = new loginM();

if (isset($_POST['b_bidali_register'])) {
    $hashPass = password_hash($_POST['pasahitza'], PASSWORD_DEFAULT);
    $res = $oModelo->register($_POST['erabiltzailea'], $hashPass);
    if ($res) {
        echo $hashPass;
        echo "Erregistratu zara";
    } else {
        echo "Erabiltzailea existitzen da";
    }
}
?>