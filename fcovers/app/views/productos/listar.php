<!DOCTYPE html>
<html>
<head>
    <title>Listado de Productos</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
</head>
<body>
    <?php include 'app/views/layaout/header.php'; ?>
    <div class="container">
        <h1>Productos</h1>
        <div class="row">
            <?php foreach ($productos as $producto): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                            <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                            <p class="card-text">$<?php echo $producto['precio']; ?></p>
                            <a href="index.php?controller=producto&action=detalle&id=<?php echo $producto['id']; ?>" class="btn btn-primary">Ver detalle</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'app/views/layaout/footer.php'; ?>
</body>
</html>
