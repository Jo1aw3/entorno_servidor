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
                COALESCE(u.nombre, '-') AS 'Nombre Usuario',
                COALESCE(r.nombre, '-') AS 'Nombre Ropa',
                COALESCE(p.cantidad, 0) AS 'Cantidad'
                FROM usuarios u
                LEFT JOIN pedidos p ON u.id = p.id_usuario
                LEFT JOIN ropa r ON p.id_ropa = r.id
                ORDER BY p.cantidad DESC";
        $resultado = $this->conexion->query($query);
        $this->cerrar_bd();
        return $resultado;
    }

}