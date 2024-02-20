<?php

require_once 'ConectarBase.php';

class UsuarioModel
{

    private $conexion;

    // Función para conectar con la base de datos.
    public function conexion_bd()
    {

        $conBase = new ConectarBase;
        try {
            $this->conexion = new mysqli($conBase->host, $conBase->userbd, $conBase->passbd, $conBase->namebd);
            if ($this->conexion->connect_errno) {
                throw new Exception('error de conexion: ' . $this->conexion->connect_error);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->conexion->set_charset("utf8");
    }

    // Función para cerrar la base de datos.
    public function cerrar_bd()
    {
        $this->conexion->close();
    }

        /**
         * Una función para validar un usuario en la base de datos.
         *
         * @param datatype $user descripción
         * @throws Some_Exception_Class descripción de la excepción
         * @return Some_Return_Value
         */
    public function validar_usuario($user, $pass)
    {
        $this->conexion_bd();

        $query = "SELECT * FROM personas_trabajadoras WHERE Usuario = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $user);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $passHash = $row['Contraseña'];
            if (password_verify($pass, $passHash)) {
                $datosUsuario["AutorID"] = $row['AutorID'];
                $datosUsuario["Usuario"] = $row['Usuario'];
                $datosUsuario["Autor"] = $row['Autor'];

                $stmt->close();
                $this->cerrar_bd();
                return $datosUsuario;
            }
        }
        $stmt->close();
        $this->cerrar_bd();
        return FALSE;
    }
    
    /**
     * cambia la contraseña del usuario en la base de datos
     *
     * @param string $password la nueva contraseña
     * @throws Exception en caso de error al ejecutar la consulta SQL
     * @return bool indica si la actualización se realizó con éxito
     */
    public function cambiar_contra($password)
    {
        $this->conexion_bd();
        $contraHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE personas_trabajadoras SET Contraseña = ? WHERE Usuario = ?;";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $contraHash, $_SESSION['Usuario']);
        $resul = $stmt->execute();
        $stmt->close();
        $this->cerrar_bd();
        return $resul;
    }

        /**
         * Una función para incluir un nuevo usuario en la base de datos.
         *
         * @param tipo_dato $id descripción
         * @param tipo_dato $usuario descripción
         * @param tipo_dato $nombre descripción
         * @param tipo_dato $nacionalidad descripción
         * @param tipo_dato $autor descripción
         * @throws Clase_De_Excepcion descripción de la excepción
         * @return Valor_De_Retorno
         */
    public function incluir_usuario($id, $usuario, $contra, $nombre, $nacionalidad, $autor)
    {
        $this->conexion_bd();

        $contraHash = password_hash($contra, PASSWORD_DEFAULT);

        $query = "INSERT INTO personas_trabajadoras VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("issssi", $id, $usuario, $contraHash, $nombre, $nacionalidad, $autor);

        $stmt->execute();
        if (!$stmt->affected_rows > 0) {
            echo "Error al insertar la trabajadora";
        }
        $stmt->close();

        $this->cerrar_bd();
    }

}
