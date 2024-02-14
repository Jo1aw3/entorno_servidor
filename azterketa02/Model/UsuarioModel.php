<?php

require_once 'ConectarBase.php';

class UsuarioModel {

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

    public function validar_usuario($user, $pass) {
        $this->conexion_bd();

        $query = "SELECT * FROM usuarios WHERE nombre = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $user);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $passHash = $row['contrasenya'];
            if (password_verify($pass, $passHash)) {
               $datosUsuario["id"] = $row['id'];
               $datosUsuario["user"] = $row['nombre'];
               $datosUsuario["admin"] = $row['admin'];

               $stmt->close();
               $this->cerrar_bd();
               return $datosUsuario;
            }
        }
        $stmt->close();
        $this->cerrar_bd();
        return FALSE;
    }

    public function incluir_usuario($id, $nombre, $contra, $admin) {

        $contraHash = password_hash($contra, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios VALUES (?, ?, ?, ?);";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("issi", $id, $nombre, $contraHash, $admin);
        
        $stmt->execute();
        if (!$stmt->affected_rows > 0) {
            echo "Error al insertar el Usuario";
        } $stmt->close();

    }

    public function cambiar_contra($password) {

        $contraHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE usuarios SET contrasenya = ? WHERE nombre = ?;";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $contraHash, $_SESSION['user']);
        $stmt->execute();
        $stmt->close();
    }

}