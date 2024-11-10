<?php
session_start();
require_once 'config\database.php';

class Carrito extends Database {
    private $productos = [];

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    // Implementación de métodos abstractos
    protected function crear($data) {
        // Implementar lógica si es necesario
    }

    protected function leer($id) {
        // Implementar lógica si es necesario
    }

    protected function actualizar($id, $data) {
        // Implementar lógica si es necesario
    }

    protected function borrar($id) {
        // Implementar lógica si es necesario
    }

    public function agregarProducto($producto_id, $cantidad) {
        $query = "SELECT * FROM productos WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$producto_id]);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($producto && $cantidad <= $producto['stock']) {
            if (isset($_SESSION['carrito'][$producto_id])) {
                // Si el producto ya está en el carrito, sumamos la cantidad
                $_SESSION['carrito'][$producto_id]['cantidad'] += $cantidad;
            } else {
                // Agregamos el producto al carrito
                $_SESSION['carrito'][$producto_id] = [
                    'producto' => $producto,
                    'cantidad' => $cantidad
                ];
            }
            return true;
        } else {
            return false;
        }
    }
    

    public function eliminarProducto($producto_id) {
        if (isset($_SESSION['carrito'][$producto_id])) {
            unset($_SESSION['carrito'][$producto_id]);
            return true;
        } else {
            return false;
        }
    }
    

    public function actualizarCantidad($producto_id, $cantidad) {
        if (isset($_SESSION['carrito'][$producto_id])) {
            $_SESSION['carrito'][$producto_id]['cantidad'] = $cantidad;
            return true;
        } else {
            return false;
        }
    }
    

    public function obtenerProductos() {
        return isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
    }
    

    public function vaciarCarrito() {
        $_SESSION['carrito'] = [];
    }
    
}
?>
