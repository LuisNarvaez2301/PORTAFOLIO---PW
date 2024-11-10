<?php
require_once 'config/database.php';
require_once 'app/models/Producto.php';

class ProductoController {
    private $producto;

    public function __construct(){
        $this->producto = new Producto();
    }

    public function listar(){
        $productos = $this->producto->listar();
        require 'app/views/productos/listar.php';
        return $productos;
    }

    public function detalle($id){
        $producto = $this->producto->leer($id);
        require 'app/views/productos/detalle.php';
        return $producto;
    }

    public function listarDestacados(){
        return $this->producto->listarDestacados();
    }

    // Otros métodos para buscar y filtrar productos
}
?>
