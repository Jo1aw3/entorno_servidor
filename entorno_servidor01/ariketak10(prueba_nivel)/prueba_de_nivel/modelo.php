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
        $sentencia = "SELECT * FROM jokalariak WHERE erabiltzailea = '" . $user . "' and pasahitza = '" . $pass . "'";
        $this -> conexion -> query($sentencia);
        if ($this -> conexion -> affected_rows == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function ordenar_puntuaciones() {
        try {
            $sentencia = "SELECT erabiltzailea, puntuazio_max FROM jokalariak ORDER BY puntuazio_max DESC;";
            $consulta = $this->conexion->query($sentencia);
            foreach($consulta as $resultado) {
                $listaPuntaje[$resultado['erabiltzailea']]=$resultado['puntuazio_max'];
            }
            return $listaPuntaje;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function insertar_puntuacion($user, $puntos) {
        $sentencia = "SELECT puntuazio_max FROM jokalariak WHERE erabiltzailea = '" . $user . "'";
        $consulta = $this -> conexion -> query($sentencia);
        $consultar = $consulta -> fetch_array();
        $puntuacion = $consultar[0];
        $puntuacion = $puntuacion + $puntos;
        $sentencia = "UPDATE jokalariak SET puntuazio_max = ".$puntuacion."  WHERE erabiltzailea = '" . $user . "'";
        $this -> conexion -> query($sentencia);
    }

}