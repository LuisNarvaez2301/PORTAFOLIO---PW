<?php
require_once 'config\database.php';
require_once 'app/models/Producto.php';

class AdminController {
    private $producto;

    public function __construct(){
        $this->producto = new Producto();
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'stock' => $_POST['stock'],
                'imagen' => $_POST['imagen']
            ];
            $this->producto->crear($data);
            header('Location: index.php?controller=admin&action=gestionar');
        } else {
            require 'app/views/admin/agregar.php';
        }
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'stock' => $_POST['stock'],
                'imagen' => $_POST['imagen']
            ];
            $this->producto->actualizar($id, $data);
            header('Location: index.php?controller=admin&action=gestionar');
        } else {
            $producto = $this->producto->leer($id);
            require 'app/views/admin/editar.php';
        }
        return $producto;
    }

    public function eliminar() {
        $id = $_GET['id'];
        $this->producto->borrar($id);
        header('Location: index.php?controller=admin&action=gestionar');
    }

    public function gestionar() {
        $productos = $this->producto->listar();
        require 'app/views/admin/gestionar.php';
    }
}
?>
