<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi E-commerce</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/1hb5o03rK3yqz4bG3Gjk1DpFUMoZJ5d5Ya5UsJ" crossorigin="anonymous">
    <style>
        nav {
            background-color: #333;
            color: white;
            padding: 10px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            display: inline;
            padding: 10px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }
        nav ul li a:hover {
            background-color: #575757;
            border-radius: 5px;
        }
        .icon {
            font-size: 18px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php"><i class="fas fa-home icon"></i>Inicio</a></li>
            <li><a href="index.php?controller=producto&action=listar"><i class="fas fa-box-open icon"></i>Productos</a></li>
            <?php if (isset($_SESSION['usuario'])): ?>
                <li><a href="index.php?controller=carrito&action=ver"><i class="fas fa-shopping-cart icon"></i>Carrito</a></li>
                <li><a href="index.php?controller=usuario&action=perfil"><i class="fas fa-user icon"></i>Perfil</a></li>

                <!-- Opciones para el administrador único -->
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true): ?>
                    <li><a href="index.php?controller=admin&action=agregar"><i class="fas fa-plus icon"></i>Agregar Producto</a></li>
                    <li><a href="index.php?controller=admin&action=gestionar"><i class="fas fa-cogs icon"></i>Gestionar Productos</a></li>
                <?php endif; ?>

                <li><a href="index.php?controller=usuario&action=cerrarSesion"><i class="fas fa-sign-out-alt icon"></i>Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="index.php?controller=usuario&action=login"><i class="fas fa-sign-in-alt icon"></i>Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
