<?php
class LibroModelo {
    private $conexion;

    public function __construct() {
        require_once 'config.php';
        // Establecer conexión a la base de datos
        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // Manejo de errores de conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function obtenerLibros() {
        $libros = array();

        // Realizar consulta SQL
        $consulta = "SELECT libros.Titulo as titulo, autores.Nombre as autor
                     FROM Libros
                     INNER JOIN Autores ON libros.AutorID = autores.AutorID";
        $resultado = $this->conexion->query($consulta);

        // Manejar resultados de la consulta
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $libros[] = $fila;
            }
        }

        // Cerrar conexión
        $this->conexion->close();

        return $libros;
    }
}
