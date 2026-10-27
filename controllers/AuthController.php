<?php
ob_start(); // <-- Añade esto en la primera línea para capturar el búfer de salida

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
            $_SESSION['usuario_rol'] = (int)($usuario['rol_id'] ?? 2); // <-- Agrégala aquí
           $_SESSION['mensaje'] = "Se inició sesión con éxito";

            // Validar redirección según el rol del usuario
            if ((int)$_SESSION['usuario_rol'] === 1) {
                header('Location: ' . BASE_URL . 'views/admin/dashboard.php');
            } else {
                header('Location: ' . BASE_URL . 'index.php');
            }
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
// Capturar los datos del formulario
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$nombre = $_POST['nombre'] ?? '';

// Expresión regular ajustada para validar seguridad de la contraseña
$patronPassword = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/';

if (!preg_match($patronPassword, $password)) {
    // Redirigir con error si no cumple los requisitos
    $_SESSION['error'] = 'La contraseña debe tener al menos 8 caracteres, incluir una mayúscula, una minúscula y un número.';
    header('Location: ' . BASE_URL . 'views/auth/register.php');
    exit;
}

// Si la contraseña es válida, procedemos a encriptarla y guardarla
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Llamar al modelo para registrar al usuario en la base de datos hidalmei_db
// User::create($nombre, $email, $passwordHash);