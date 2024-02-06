<?php

class UsuarioModel {

    private $conexion;

    public function conectar_bd() {
        try {
            $this -> conexion = new mysqli('localhost', 'root', '', 'tienda_ropa');
            if ($this -> conexion -> connect_errno) {
                throw new Exception('error de conexion: ' . $this -> conexion -> connect_error);
            }
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    public function validar_usuario($user, $pass) {
        $sentencia = "SELECT * FROM tienda_ropa WHERE nombre = '" . $user . "' AND contrasenya = '" . $pass . "'";
        $this -> conexion -> query($sentencia);
        if ($this -> conexion -> affected_rows == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    

}

