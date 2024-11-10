<?php
require_once 'config/database.php';
require_once 'app/controllers/UsuarioController.php';
require_once 'app/controllers/ProductoController.php';
require_once 'app/controllers/CarritoController.php';
require_once 'app/controllers/PedidoController.php';

// Controlador y acción por defecto
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'inicio';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = "app/controllers/{$controllerName}.php";

$content = '';

// Verifica si el controlador y acción existen
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerObj = new $controllerName();
    if (method_exists($controllerObj, $action)) {
        ob_start();

        // Para la acción "detalle" de productos
        if ($controller === 'producto' && $action === 'detalle') {
            $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            if ($id !== null) {
                $controllerObj->$action($id);
            } else {
                echo "ID de producto no proporcionado.";
            }
        } else {
            if ($action === 'editar' && isset($_GET['id'])) {
                $controllerObj->$action($_GET['id']);
            } else {
                $controllerObj->$action();
            }
        }

        $content = ob_get_clean();
    } else {
        $content = "Método no encontrado.";
    }
} else {
    $content = "Controlador no encontrado.";
}

// Mostrar productos destacados solo si el controlador es 'inicio' y la acción es 'index'
$productosDestacados = '';
if ($controller === 'inicio' && $action === 'index') {
    $productoController = new ProductoController();
    $productos = $productoController->listar();
    $productosAleatorios = array_slice($productos, 0, 4);
    
    ob_start();
    ?>
    <div class="container">
        <h1 class="text-center mt-4">Bienvenido a Mi E-commerce</h1>

        <div class="row mt-4">
            <div class="col-md-8">
                <div id="productSlider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($productos as $index => $producto): ?>
                            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                <img src="<?php echo $producto['imagen']; ?>" class="d-block w-100" alt="Imagen del producto">
                                <div class="carousel-caption d-none d-md-block bg-dark p-2" style="opacity: 0.8;">
                                    <h5><?php echo $producto['nombre']; ?></h5>
                                    <p><?php echo $producto['descripcion']; ?></p>
                                    <p>$<?php echo $producto['precio']; ?></p>
                                    <a href="index.php?controller=producto&action=detalle&id=<?php echo $producto['id']; ?>" class="btn btn-primary">Ver detalle</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#productSlider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#productSlider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sobre Nuestra Tienda</h5>
                        <p class="card-text">
                            Descubre nuestra colección de fundas para portátiles inspiradas en el vibrante mundo del anime. Diseñadas para los verdaderos fanáticos, cada funda combina estilo y protección para que lleves tus personajes y series favoritas a donde vayas.
                        </p>
                        <a href="index.php?controller=producto&action=listar" class="btn btn-secondary">Ver todos los productos</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <h2 class="text-center w-100">Productos Recomendados</h2>
            <?php foreach ($productosAleatorios as $producto): ?>
                <div class="col-md-3 mt-4">
                    <div class="card">
                        <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="Imagen del producto">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                            <p class="card-text">$<?php echo $producto['precio']; ?></p>
                            <a href="index.php?controller=producto&action=detalle&id=<?php echo $producto['id']; ?>" class="btn btn-primary btn-sm">Ver detalle</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    $productosDestacados = ob_get_clean();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Mi E-commerce</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Header -->
    <?php include_once 'app/views/layaout/header.php'; ?>

    <!-- Contenido principal -->
    <?php echo $content; ?>
    
    <!-- Productos destacados -->
    <?php echo $productosDestacados; ?>

    <!-- Footer -->
    <?php include_once 'app/views/layaout/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
