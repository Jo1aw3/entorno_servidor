<?php

class Jokalari_Modeloa {

    private $mysqli;

    // Función para realizar la conexión.
    public function conectar() {
        try {
            // Establece la conexión a la base de datos
            $this->mysqli = new mysqli('localhost', 'root', '', 'juegos1');
            
            // Verifica si hay errores en la conexión
            if ($this->mysqli->connect_errno) {
                throw new Exception('Error en conexión: ' . $this->mysqli->connect_error);
            }
        } catch (Exception $e) {
            // Muestra el mensaje de error 
            echo $e->getMessage();
        }
    }

    public function insertarusuario($dni,$user, $pass) {
        // Consulta SQL para insertar un nuevo usuario
        
        // Prepara la consulta
        $sql = $this->mysqli->prepare("INSERT INTO usuarios (dni,nombre, contrasena) VALUES (?,?, ?)");
        
        // Asocia los parámetros a la consulta
        $sql->bind_param("sss", $dni, $user, $pass);
        
        // Ejecuta la consulta
        $sql->execute();
        
        // Verifica si se ha insertado el usuario
        if ($sql->affected_rows == 1) {
            return TRUE; // Usuario insertado
        } else {
            return FALSE; // Usuario no insertado
        }
    }

    // Función para comprobar el login.
    public function balioztatzea($user, $pass) {
        // Consulta SQL para verificar el login
        $sql = "SELECT * FROM usuarios WHERE nombre = ? AND contrasena = ?";
        
        // Prepara la consulta
        $consultaprep = $this->mysqli->prepare($sql);
        
        // Asocia los parámetros a la consulta
        $consultaprep->bind_param("ss", $user, $pass);
        
        // Ejecuta la consulta
        $consultaprep->execute();
        
        // Almacena el resultado de la consulta
        $consultaprep->store_result();

        // Verifica si hay una fila coincidente en la base de datos
        if ($consultaprep->num_rows == 1) {
            return TRUE; // Usuario encontrado
        } else {
            return FALSE; // Usuario no encontrado
        }
    }
}

