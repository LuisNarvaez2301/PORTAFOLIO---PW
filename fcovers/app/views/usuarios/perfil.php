<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <style>
        .profile-container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .profile-box, .update-box {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 45%;
        }
        .profile-box h2, .update-box h2 {
            margin-bottom: 20px;
        }
        .profile-box p, .update-box form label {
            margin: 10px 0;
        }
        .update-box form input[type="text"],
        .update-box form input[type="email"],
        .update-box form input[type="password"],
        .update-box form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .update-box form button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        .order-history {
            margin-top: 20px;
        }
        .order-history h3 {
            margin-bottom: 10px;
        }
        .order-history .order-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .order-history .order-item a {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        .order-history .order-item a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include 'app\views\layaout\header.php'; ?>
    <div class="container">
        <h1>Perfil</h1>
        <div class="profile-container">
            <div class="profile-box">
                <h2>Datos del Usuario</h2>
                <p><strong>Nombre:</strong> <?php echo $_SESSION['usuario']['nombre']; ?></p>
                <p><strong>Email:</strong> <?php echo $_SESSION['usuario']['email']; ?></p>
                <button onclick="location.href='http://localhost/fcovers/index.php?controller=pedido&action=historial'" class="view-history-btn">Historial de pedidos</button>
            </div>
            <div class="update-box">
                <h2>Actualizar Datos</h2>
                <form action="index.php?controller=usuario&action=actualizarPerfil" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['usuario']['nombre']; ?>" required>

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['usuario']['email']; ?>" required>

                    <label for="password">Contraseña (opcional):</label>
                    <input type="password" name="password" id="password" placeholder="Nueva contraseña (si deseas cambiarla)">
                    <button type="submit">Guardar cambios</button>
                </form>
            </div>
        </div>
    <?php include 'app\views\layaout\footer.php'; ?>
</body>
</html>
