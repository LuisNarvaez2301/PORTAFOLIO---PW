<?php
require_once 'config\database.php';

class Pedido extends Database {
    private $table_name = "pedidos";
    protected $conn;

    public $id;
    public $usuario_id;
    public $fecha_pedido;
    public $estado;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    public function crear($data) {
        $query = "INSERT INTO " . $this->table_name . " (usuario_id, estado) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$data['usuario_id'], $data['estado']]);
        return $stmt;
    }

    public function leer($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $data) {
        $query = "UPDATE " . $this->table_name . " SET estado = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$data['estado'], $id]);
        return $stmt;
    }

    public function borrar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }

    public function listarPedidosPorUsuario($usuario_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE usuario_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
