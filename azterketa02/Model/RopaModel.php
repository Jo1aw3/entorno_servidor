<?php

class RopaModel {
    
    private $conexion;

    public function conexion_bd() {
        $conBase = new ConectarBase;
        try {
            $this->conexion = new mysqli($conBase->host, $conBase->userbd, $conBase->passbd, $conBase->namebd);
            if ($this -> conexion -> connect_errno) {
                throw new Exception('error de conexion: ' . $this -> conexion -> connect_error);
            }
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
        $this->conexion->set_charset("utf8");
    }

    public function cerrar_bd() {
        $this->conexion->close();
    }

    public function obtener_ropa() {
        $this->conexion_bd();
        $query = "SELECT * FROM ropa";
        $resultado = $this->conexion->query($query);
        $this->cerrar_bd();
        return $resultado;
    }

}