<?php
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administración de Productos</title>
    <link rel="stylesheet" type="text/css" href="public\css\styles.css">
</head>
<body>
    <?php include 'app\views\layaout\header.php'; ?>
    <div class="container">
        <h1>Gestión de Productos</h1>
        <a href="index.php?controller=admin&action=agregar">Agregar Producto</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['id']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['descripcion']; ?></td>
                        <td>$<?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td>
                            <a href="index.php?controller=admin&action=editar&id=<?php echo $producto['id']; ?>">Editar</a>
                            <a href="index.php?controller=admin&action=eliminar&id=<?php echo $producto['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include 'app\views\layaout\footer.php'; ?>
</body>
</html>
