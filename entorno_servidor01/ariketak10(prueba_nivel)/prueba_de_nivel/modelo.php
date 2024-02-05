<?php 

class Modelo {

    private $conexion;

    public function conectar_datos() {
        try {
            $this -> conexion = new mysqli('localhost', 'root', '', 'jokoa');
            if ($this -> conexion -> connect_errno) {
                throw new Exception('error de conexion: ' . $this -> conexion -> connect_error);
            }
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    public function validar_usuario($user, $pass) {
        $consulta = "SELECT * FROM jokalariak WHERE erabiltzailea = '" . $user . "' and pasahitza = '" . $pass . "'";
        $this -> conexion -> query($consulta);
        if ($this -> conexion -> affected_rows == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}