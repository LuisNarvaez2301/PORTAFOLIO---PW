<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }
        .login-box {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-box h1 {
            margin-bottom: 20px;
        }
        .login-box input[type="email"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .login-box input[type="submit"],
        .login-box a.register-button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .login-box a.register-button {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <?php include 'app/views/layaout/header.php'; ?>
    <div class="login-container">
        <div class="login-box">
            <h1>Iniciar Sesión</h1>
            <form action="index.php?controller=usuario&action=login" method="POST">
                <label for="email">Email:</label>
                <input type="email" name="email" required><br>
                <label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña" required><br>
                <input type="submit" value="Iniciar Sesión">
            </form>
            <?php if (isset($error)): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <a href="index.php?controller=usuario&action=registrar" class="register-button">Registrarse</a>
        </div>
    </div>
    <?php include 'app/views/layaout/footer.php'; ?>
</body>
</html>
