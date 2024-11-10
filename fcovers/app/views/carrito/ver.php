<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
</head>
<body>
    <?php include 'app\views\layaout\header.php'; ?>
    <div class="container">
        <h1>Carrito de Compras</h1>
        <?php if (empty($productos)): ?>
            <p>Tu carrito está vacío.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto_id => $detalle): ?>
                        <tr>
                            <td><?php echo $detalle['producto']['nombre']; ?></td>
                            <td><?php echo $detalle['cantidad']; ?></td>
                            <td>$<?php echo $detalle['producto']['precio']; ?></td>
                            <td>$<?php echo $detalle['producto']['precio'] * $detalle['cantidad']; ?></td>
                            <td>
                                <a href="index.php?controller=carrito&action=eliminar&id=<?php echo $producto_id; ?>">Eliminar</a>
                                <form action="index.php?controller=carrito&action=actualizar&id=<?php echo $producto_id; ?>" method="POST">
                                    <input type="number" name="cantidad" value="<?php echo $detalle['cantidad']; ?>">
                                    <input type="submit" value="Actualizar">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="index.php?controller=carrito&action=vaciar" class="btn btn-danger">Vaciar Carrito</a>
            <a href="index.php?controller=pedido&action=realizar" class="btn btn-success">Proceder al Pago</a>
        <?php endif; ?>
    </div>
    <?php include 'app\views\layaout\footer.php'; ?>
</body>
</html>
