<?php
require_once 'config\database.php';

class Producto extends Database {
    private $table_name = "productos";
    protected $conn;

    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $imagen;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    public function crear($data) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, descripcion, precio, stock, imagen) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$data['nombre'], $data['descripcion'], $data['precio'], $data['stock'], $data['imagen']]);
        return $stmt;
    }

    public function leer($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $data) {
        $query = "UPDATE " . $this->table_name . " SET nombre = ?, descripcion = ?, precio = ?, stock = ?, imagen = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$data['nombre'], $data['descripcion'], $data['precio'], $data['stock'], $data['imagen'], $id]);
        return $stmt;
    }

    public function borrar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }

    public function listar() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listarDestacados() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE destacado = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
