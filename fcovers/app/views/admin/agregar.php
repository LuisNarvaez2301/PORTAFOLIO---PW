<?php
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <?php include 'app/views/layaout/header.php'; ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mb-4">Agregar Producto</h1>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="index.php?controller=admin&action=agregar" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre del producto:</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="precio">Precio (COP):</label>
                                <input type="number" class="form-control" step="0.01" name="precio" required>
                            </div>

                            <div class="form-group">
                                <label for="stock">Stock:</label>
                                <input type="number" class="form-control" name="stock" required>
                            </div>

                            <div class="form-group">
                                <label for="imagen">URL de la imagen:</label>
                                <input type="text" class="form-control" name="imagen" required>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Agregar Producto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'app/views/layaout/footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
