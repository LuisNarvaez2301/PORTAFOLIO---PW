<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Producto</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
</head>
<body>
    <?php include 'app/views/layaout/header.php'; ?>
    <div class="container">
        <h1><?php echo $producto['nombre']; ?></h1>
        <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
        <p><?php echo $producto['descripcion']; ?></p>
        <p>Precio: $<?php echo $producto['precio']; ?></p>
        <p>Stock: <?php echo $producto['stock']; ?></p>
        
        <!-- Formulario para agregar al carrito usando POST -->
        <form action="index.php?controller=carrito&action=agregar" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" value="1" min="1" max="<?php echo $producto['stock']; ?>">
            <button type="submit" class="btn btn-success">Agregar al Carrito</button>
        </form>
    </div>
    <?php include 'app/views/layaout/footer.php'; ?>
</body>
</html>
