<?php

include_once 'Conectar.php';

class Modelo {  

    private $conexion;

    public function open_bd()
    {
        $con = new Conectar();
        try {
            $this->conexion = new mysqli($con->host, $con->user, $con->pass, $con->name);
            if ($this->conexion->connect_errno) {
                throw new Exception('error de conexion: ' . $this->conexion->connect_error);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function close_bd()
    {
        $this->conexion->close();
    }

    public function validar_usuario($user, $pass) {
        $this->open_bd();
        $sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->bind_param('ss', $user, $pass);
        $sentencia->execute();
        $sentencia->store_result();

        if ($sentencia->num_rows == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
        
        $sentencia->close();
        $this->close_bd();
    }


}