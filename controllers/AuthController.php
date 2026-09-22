<?php
require_once __DIR__ . '/../config/config.php';
require_once BASE_PATH . '/includes/functions.php';
require_once BASE_PATH . '/models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = sanitize($_POST['nombre'] ?? '');
            $email = sanitize($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($nombre) || empty($email) || empty($password)) {
                $error = "Todos los campos son obligatorios.";
                require_once BASE_PATH . '/views/auth/register.php';
                return;
            }

            if ($this->userModel->findByEmail($email)) {
                $error = "El correo electrónico ya está registrado.";
                require_once BASE_PATH . '/views/auth/register.php';
                return;
            }

            if ($this->userModel->register($nombre, $email, $password)) {
                header('Location: ' . BASE_URL . 'views/auth/login.php?registered=1');
                exit;
            } else {
                $error = "Error al registrar el usuario.";
                require_once BASE_PATH . '/views/auth/register.php';
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = sanitize($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $usuario = $this->userModel->findByEmail($email);

            if ($usuario && password_verify($password, $usuario['password'])) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['mensaje'] = "Se inició sesión con éxito";

                header('Location: ' . BASE_URL . 'index.php');
                exit;
            } else {
                $error = "Correo o contraseña incorrectos.";
                require_once BASE_PATH . '/views/auth/login.php';
            }
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: ' . BASE_URL . 'index.php');
        exit;
    }
}

// Ejecución del controlador (Fuera de la clase)
$auth = new AuthController();
$action = $_GET['action'] ?? $_POST['action'] ?? 'login';

if ($action === 'register') {
    $auth->register();
} elseif ($action === 'logout') {
    $auth->logout();
} else {
    $auth->login();
}