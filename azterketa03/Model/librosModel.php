<?php

require_once 'ConectarBase.php';

class LibrosModel
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
         * Función para verificar un libro en la base de datos.
         *
         * @param string $libro El título del libro a verificar
         * @return boolean Devuelve TRUE si el libro existe, de lo contrario FALSE
         */
    public function verificar_libro($libro)
    {
        $this->conexion_bd();

        $query = "SELECT * FROM libros WHERE Titulo = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $libro);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            return TRUE;
        } else {
            return FALSE;
        }

        $stmt->close();
        $this->cerrar_bd();
    }

        /**
         * Una función para insertar un libro en la base de datos.
         *
         * @param datatype $libro descripción
         * @throws Some_Exception_Class descripción de la excepción
         * @return Some_Return_Value
         */
    public function insertar_libro($libro)
    {
        $this->conexion_bd();

        $query = "INSERT INTO libros SET Titulo = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $libro);
        $stmt->execute();

        $stmt->execute();
        if (!$stmt->affected_rows > 0) {
            echo "Error al insertar el libro";
        }
        $stmt->close();

        $this->cerrar_bd();
    }

        /**
         * Obtener la consulta para mostrar la información de los libros del autor de la base de datos 
         *
         * @param tipo_dato $nombre_param descripción
         * @throws Clase_De_Excepcion descripción de la excepción
         * @return Valor_De_Retorno
         */
    public function ver_libros()
    {
        $this->conexion_bd();
        $query = "SELECT `libros`.`Titulo`, `editoriales`.`Nombre`, `libros`.`AñoPublicacion`, `libros`.`ISBN`, `personas_trabajadoras`.`Usuario`
        FROM `libros` 
        LEFT JOIN `editoriales` ON `libros`.`EditorialID` = `editoriales`.`EditorialID` 
        LEFT JOIN `personas_trabajadoras` ON `libros`.`AutorID` = `personas_trabajadoras`.`AutorID`
        WHERE `personas_trabajadoras`.`Usuario` = ? ";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $_SESSION['Usuario']);
        $stmt->execute();

        $result = $stmt->get_result();
        $this->cerrar_bd();
        return $result;
    }

        /**
         * Obtener la consulta para mostrar la información de los libros de la base de datos.
         *
         * @param datatype $paramname descripción
         * @throws Some_Exception_Class descripción de la excepción
         * @return Some_Return_Value
         */
    public function ver_libros_editor()
    {
        $this->conexion_bd();
        $query = "SELECT `libros`.`Titulo`, `editoriales`.`Nombre`, `libros`.`AñoPublicacion`, `libros`.`ISBN`, `personas_trabajadoras`.`Usuario`
        FROM `libros` 
        LEFT JOIN `editoriales` ON `libros`.`EditorialID` = `editoriales`.`EditorialID` 
        LEFT JOIN `personas_trabajadoras` ON `libros`.`AutorID` = `personas_trabajadoras`.`AutorID`";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();
        $this->cerrar_bd();
        return $result;
    }

    
    /**
     * Funcion para obtener libros con ISBN NULL de la base de datos.
     *
     * @return mixed The result of the database query.
     */
    public function libros_null()
    {
        $this->conexion_bd();
        $query = "SELECT `libros`.`Titulo`, `libros`.`ISBN`
        FROM `libros`
        WHERE `libros`.`ISBN` IS NULL;";
        $resultado = $this->conexion->query($query);
        $this->cerrar_bd();
        return $resultado;
    }

    public function publicar_libro() 
    {

    }

}
