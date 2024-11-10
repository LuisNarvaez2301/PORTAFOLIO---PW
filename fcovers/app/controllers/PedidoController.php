<?php
require_once 'config\database.php';
require_once 'app/models/Pedido.php';

class PedidoController {
    private $pedido;

    public function __construct() {
        $this->pedido = new Pedido();
    }

    public function realizar() {
        session_start();
        $usuario_id = $_SESSION['usuario']['id'];
        $estado = "pendiente";
        $data = ['usuario_id' => $usuario_id, 'estado' => $estado];
        $this->pedido->crear($data);
        header('Location: index.php?controller=pedido&action=historial');
    }

    public function historial() {
        $usuario_id = $_SESSION['usuario']['id'];
        $pedidos = $this->pedido->listarPedidosPorUsuario($usuario_id);
        require 'app/views/pedidos/historial.php';
    }

    public function detalle() {
        $pedido_id = $_GET['id'];
        $pedido = $this->pedido->leer($pedido_id);
        require 'app/views/pedidos/detalle.php';
    }
}
?>
