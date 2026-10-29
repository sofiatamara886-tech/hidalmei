<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!defined('BASE_PATH')) {
    require_once __DIR__ . '/../config/config.php';
}

require_once BASE_PATH . '/models/Order.php';
require_once BASE_PATH . '/models/Product.php';

class CartController {
    
    public function add() {
        $id = $_POST['product_id'] ?? null;
        $cantidad = intval($_POST['cantidad'] ?? 1);

        if ($id) {
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }

            if (isset($_SESSION['carrito'][$id])) {
                $_SESSION['carrito'][$id] += $cantidad;
            } else {
                $_SESSION['carrito'][$id] = $cantidad;
            }
        }

        header('Location: ' . BASE_URL . 'views/catalog/index.php');
        exit;
    }

    public function increase() {
        $id = $_GET['id'] ?? null;
        if ($id && isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]++;
        }
        header('Location: ' . BASE_URL . 'views/orders/history.php');
        exit;
    }

    public function decrease() {
        $id = $_GET['id'] ?? null;
        if ($id && isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]--;
            if ($_SESSION['carrito'][$id] <= 0) {
                unset($_SESSION['carrito'][$id]);
            }
        }
        header('Location: ' . BASE_URL . 'views/orders/history.php');
        exit;
    }

    public function remove() {
        $id = $_GET['id'] ?? null;
        if ($id && isset($_SESSION['carrito'][$id])) {
            unset($_SESSION['carrito'][$id]);
        }
        header('Location: ' . BASE_URL . 'views/orders/history.php');
        exit;
    }

    public function checkout() {
        $carrito = $_SESSION['carrito'] ?? [];
        if (empty($carrito)) {
            header('Location: ' . BASE_URL . 'views/catalog/index.php');
            exit;
        }

        $usuario_id = $_SESSION['user_id'] ?? $_SESSION['usuario_id'] ?? null;

        if (!$usuario_id) {
            header('Location: ' . BASE_URL . 'views/auth/login.php');
            exit;
        }

        $metodo_pago = $_POST['metodo_pago'] ?? 'Simulado';
        $direccion = $_POST['direccion'] ?? 'Sin dirección';

        $productModel = new Product();
        $total = 0;
        foreach ($carrito as $id => $cantidad) {
            $prod = $productModel->getById($id);
            if ($prod) {
                $total += $prod['precio'] * $cantidad;
            }
        }

        $orderModel = new Order();
        $guardado = $orderModel->create($usuario_id, $total, $metodo_pago, $direccion, $carrito);

        if ($guardado) {
            unset($_SESSION['carrito']);
            header('Location: ' . BASE_URL . 'views/orders/success.php');
            exit;
        }
    }
}

$action = $_GET['action'] ?? '';
$controller = new CartController();

if ($action === 'add') {
    $controller->add();
} elseif ($action === 'increase') {
    $controller->increase();
} elseif ($action === 'decrease') {
    $controller->decrease();
} elseif ($action === 'remove') {
    $controller->remove();
} elseif ($action === 'checkout') {
    $controller->checkout();
}

$action = $_GET['action'] ?? '';
$controller = new CartController();

if ($action === 'add') {
    $controller->add();
} elseif ($action === 'increase') {
    $controller->increase();
} elseif ($action === 'decrease') {
    $controller->decrease();
} elseif ($action === 'remove') {
    $controller->remove();
} elseif ($action === 'checkout') {
    $controller->checkout();
}