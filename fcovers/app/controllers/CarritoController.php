<?php
require_once 'config\database.php';
require_once 'app/models/Carrito.php';

class CarritoController {
    private $carrito;

    public function __construct(){
        $this->carrito = new Carrito();
    }

    public function agregar() {
        $producto_id = $_POST['id'];
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 1;
        $this->carrito->agregarProducto($producto_id, $cantidad);
        header('Location: index.php?controller=carrito&action=ver');
    }

    public function eliminar() {
        $producto_id = $_GET['id'];
        $this->carrito->eliminarProducto($producto_id);
        header('Location: index.php?controller=carrito&action=ver');
    }

    public function actualizar() {
        $producto_id = $_GET['id'];
        $cantidad = $_POST['cantidad'];
        $this->carrito->actualizarCantidad($producto_id, $cantidad);
        header('Location: index.php?controller=carrito&action=ver');
    }

    public function ver() {
        $productos = $this->carrito->obtenerProductos();
        require 'app/views/carrito/ver.php';
    }

    public function vaciar() {
        $this->carrito->vaciarCarrito();
        header('Location: index.php?controller=carrito&action=ver');
    }
}
?>
