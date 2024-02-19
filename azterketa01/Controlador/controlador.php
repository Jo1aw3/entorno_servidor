<?php

session_start();

include_once '../Vista/bista.php';
include_once '../Modelo/modelo.php';

$vis = new Login_Bista;
$mod = new Modelo;

if (isset($_POST['b_sartu_entrar'])) {

}

if (isset($_POST['b_aldatu_cambiar'])) {
    $vis->ikusiPasahitzaAldatzeko_verCambioContras();
}

if (isset($_POST['b_berria_nuevo'])) {
    $vis->Alta_AukeraEman_Opcion();
}
