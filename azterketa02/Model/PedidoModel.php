<?php

require_once 'ConectarBase.php';

class PedidoModel {

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

    public function insertar_pedido($idNombre, $idRopa, $cantidad) {
        $this->conexion_bd();
        $query = "INSERT INTO pedidos (id_usuario, id_ropa, cantidad) VALUES (?, ?, ?);";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("iii", $idNombre, $idRopa, $cantidad);
        $resultado = $stmt->execute();
        $this->cerrar_bd();
        return $resultado;
    }

    public function optener_pedido() {
        $this->conexion_bd();
        $query = "SELECT
                COALESCE(u.izena, '-') AS 'Erabiltzaile Izena',
                COALESCE(a.izena, '-') AS 'Produktua',
                COALESCE(e.kantitatea, 0) AS 'Kopurua'
                FROM erabiltzaileak u
                LEFT JOIN eskariak e ON u.id = e.id_erabiltzailea
                LEFT JOIN arropa a ON e.id_arropa = a.id
                ORDER BY u.id, e.id";
        $resultado = $this->conexion->query($query);
        $this->cerrar_bd();
        return $resultado;
    }

}