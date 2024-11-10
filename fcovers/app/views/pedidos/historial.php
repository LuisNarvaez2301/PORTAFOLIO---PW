<!DOCTYPE html>
<html>
<head>
    <title>Historial de Pedidos</title>
    <link rel="stylesheet" type="text/css" href="public\css\styles.css">
</head>
<body>
    <?php include 'app\views\layaout\header.php'; ?>
    <div class="container">
        <h1>Historial de Pedidos</h1>
        <?php if (empty($pedidos)): ?>
            <p>No tienes pedidos aún.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $pedido): ?>
                        <tr>
                            <td><?php echo $pedido['id']; ?></td>
                            <td><?php echo $pedido['fecha_pedido']; ?></td>
                            <td><?php echo $pedido['estado']; ?></td>
                            <td><a href="index.php?controller=pedido&action=detalle&id=<?php echo $pedido['id']; ?>">Ver Detalles</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <?php include 'app\views\layaout\footer.php'; ?>
</body>
</html>
