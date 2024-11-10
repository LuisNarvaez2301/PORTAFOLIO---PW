<?php
require_once 'config/database.php';
require_once 'app/models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct(){
        $this->usuario = new Usuario();
    }

    public function registrar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $contraseña = $_POST['contraseña'];
            $this->usuario->crear(['nombre' => $nombre, 'email' => $email, 'contraseña' => password_hash($contraseña, PASSWORD_BCRYPT)]);
            header('Location: index.php?controller=usuario&action=login');
        } else {
            require 'app/views/usuarios/registro.php';
        }
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $contraseña = $_POST['contraseña'];
            $usuario = $this->usuario->iniciarSesion($email, $contraseña);
            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                if ($email == 'u20201186017@usco.edu.co') {
                    $_SESSION['admin'] = true;
                }
                header('Location: index.php');
            } else {
                $error = "Email o contraseña incorrectos";
                require 'app/views/usuarios/login.php';
            }
        } else {
            require 'app/views/usuarios/login.php';
        }
    }

    public function perfil(){
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?controller=usuario&action=login');
            return;
        }
        require 'app/views/usuarios/perfil.php';
    }

    public function cerrarSesion(){
        session_start();
        session_destroy();
        header('Location: index.php?controller=usuario&action=login');
    }

    public function actualizarPerfil() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?controller=usuario&action=login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idUsuario = $_SESSION['usuario']['id'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $contraseña = $_POST['password'];

            // Datos para actualizar
            $data = ['nombre' => $nombre, 'email' => $email];
            if (!empty($contraseña)) {
                $data['contraseña'] = password_hash($contraseña, PASSWORD_BCRYPT); // Encriptar contraseña
            }

            // Actualización en la base de datos
            $this->usuario->actualizar($idUsuario, $data);

            // Actualizar datos de sesión
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['email'] = $email;

            header('Location: index.php?controller=usuario&action=perfil');
        }
    }
}
?>
