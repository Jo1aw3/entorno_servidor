<?php

class UsuarioModel {

    private $conexion;

    public function conexion_bd() {

        try {
            $this -> conexion = new mysqli('localhost', 'root', '', 'tienda_ropa');
            if ($this -> conexion -> connect_errno) {
                throw new Exception('error de conexion: ' . $this -> conexion -> connect_error);
            }
        } catch (Exception $e) {
            echo $e -> getMessage();
        }

    }

    public function incluir_usuario($id, $nombre, $contra, $admin) {

        $query = "INSERT INTO usuarios VALUES (?, ?, ?, ?);";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("issi", $id, $nombre, $contra, $admin);
        
        $stmt->execute();
        if (!$stmt->affected_rows > 0) {
            echo "Error al insertar el Usuario";
        } $stmt->close();

    }

}