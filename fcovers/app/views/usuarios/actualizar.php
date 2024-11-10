<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Perfil</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <style>
        .update-container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        .update-box {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
        }
        .update-box h2 {
            margin-bottom: 20px;
        }
        .update-box form label {
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
        .success-message {
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
            color: #155724;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'app\views\layaout\header.php'; ?>

    <div class="container">
        <h1>Actualizar Perfil</h1>

        <!-- Mostrar mensaje de éxito si existe -->
        <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
            <div class="success-message">
                <p>¡La información de tu perfil se ha actualizado correctamente!</p>
            </div>
        <?php endif; ?>

        <div class="update-container">
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
    </div>

    <?php include 'app\views\layaout\footer.php'; ?>
</body>
</html>
