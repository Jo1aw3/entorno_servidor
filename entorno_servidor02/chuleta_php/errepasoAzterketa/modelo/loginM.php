<?php

class loginM {

    private $mysqli;

    public function connect() {
        try {
            $this->mysqli = new mysqli('localhost', 'root', '', 'proiektutxikia');
            if ($this->mysqli->connect_errno) {
                throw new Exception('Konektatzean Akatsa:/ Error en conexión: ' . $this->mysqli->connect_error);
            }
            
            // Prevenir la inyección de SQL
            $this->mysqli->set_charset("utf8mb4");
            $this->mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
            $this->mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
            $this->mysqli->options(MYSQLI_INIT_COMMAND, "SET NAMES 'utf8mb4' COLLATE 'utf8mb4_unicode_ci'");
            $this->mysqli->options(MYSQLI_CLIENT_COMPRESS, 1);
            $this->mysqli->options(MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function login($erab, $pass) {
        $this -> connect();
        $query = "SELECT * FROM erabiltzaileak WHERE erabiltzailea = ?"; // Reemplaza 'nombre_tabla' y 'columna' con los nombres correctos

        // Preparar la consulta
        $stmt = $this->mysqli->prepare($query);
        if (!$stmt) {
            throw new Exception('Error en la preparación de la consulta: ' . $this->mysqli->error);
        }

        // Bind de parámetros y ejecución de la consulta
        $stmt->bind_param("s", $erab); // Reemplaza 's' y '$valor' con los tipos y valores correctos
        $stmt->execute();

        // Obtener resultados
        $result = $stmt->get_result();

        // Comprobar si hay resultados
        if ($result->num_rows != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPass ($user) {
        $this -> connect();
        $query = "SELECT pasahitza FROM erabiltzaileak WHERE erabiltzailea = ?"; // Reemplaza 'nombre_tabla' y 'columna' con los nombres correctos

        // Preparar la consulta
        $stmt = $this->mysqli->prepare($query);
        if (!$stmt) {
            throw new Exception('Error en la preparación de la consulta: ' . $this->mysqli->error);
        }

        // Bind de parámetros y ejecución de la consulta
        $stmt->bind_param("s", $user); // Reemplaza 's' y '$valor' con los tipos y valores correctos
        $stmt->execute();

        // Obtener resultados
        $result = $stmt->get_result();

        // Comprobar si hay resultados
        if ($result->num_rows != 0) {
            $row = $result->fetch_assoc();
            return $row['pasahitza'];
        } else {
            return false;
        }
    }

    public function captcha() {
        $this->connect();
        $query = "SELECT result, path_img FROM captcha ORDER BY RAND() LIMIT 1";

        // Preparar la consulta
        $stmt = $this->mysqli->prepare($query);
        if (!$stmt) {
            throw new Exception('Error en la preparación de la consulta: ' . $this->mysqli->error);
        }

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener resultados
        $result = $stmt->get_result();

        // Comprobar si hay resultados
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $captcha_result = $row['result'];
            $imagePath = $row['path_img'];
            return array('result' => $captcha_result, 'path_img' => $imagePath);
        } else {
            throw new Exception("No se encontró la imagen captcha");
        }
    }

    public function register($erab, $pass) {
        $this -> connect();
        $query = "INSERT INTO erabiltzaileak (erabiltzailea, pasahitza) VALUES (?, ?)"; // Reemplaza 'nombre_tabla' y 'columna' con los nombres correctos

        // Preparar la consulta
        $stmt = $this->mysqli->prepare($query);
        if (!$stmt) {
            throw new Exception('Error en la preparación de la consulta: ' . $this->mysqli->error);
        }

        // Bind de parámetros y ejecución de la consulta
        $stmt->bind_param("ss", $erab, $pass); // Reemplaza 's' y '$valor' con los tipos y valores correctos
        $stmt->execute();

        // Comprobar si hay resultados
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
?>