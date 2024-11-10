<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <style>
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }
        .register-box {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .register-box h1 {
            margin-bottom: 20px;
        }
        .register-box input[type="text"],
        .register-box input[type="email"],
        .register-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .register-box input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        .register-box a.login-button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'app\views\layaout\header.php'; ?>
    <div class="register-container">
        <div class="register-box">
            <h1>Registro</h1>
            <form action="index.php?controller=usuario&action=registrar" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required><br>
                <label for="email">Email:</label>
                <input type="email" name="email" required><br>
                <label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña" required><br>
                <input type="submit" value="Registrar">
            </form>
            <a href="index.php?controller=usuario&action=login" class="login-button">Iniciar Sesión</a>
        </div>
    </div>
    <?php include 'app\views\layaout\footer.php'; ?>
</body>
</html>
