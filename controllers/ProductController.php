<?php
require_once __DIR__ . '/../config/config.php';
require_once BASE_PATH . '/includes/functions.php';
require_once BASE_PATH . '/models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = sanitize($_POST['nombre'] ?? '');
            $descripcion = sanitize($_POST['descripcion'] ?? '');
            $precio = $_POST['precio'] ?? 0;
            $categoria = sanitize($_POST['categoria'] ?? '');

            $this->productModel->create($nombre, $descripcion, $precio, $categoria);
            header('Location: ' . BASE_URL . 'views/admin/products.php');
            exit;
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = sanitize($_POST['nombre'] ?? '');
            $descripcion = sanitize($_POST['descripcion'] ?? '');
            $precio = $_POST['precio'] ?? 0;
            $categoria = sanitize($_POST['categoria'] ?? '');

            $this->productModel->update($id, $nombre, $descripcion, $precio, $categoria);
            header('Location: ' . BASE_URL . 'views/admin/products.php');
            exit;
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->productModel->delete($id);
        }
        header('Location: ' . BASE_URL . 'views/admin/products.php');
        exit;
    }
}

// Enrutador del controlador
$controller = new ProductController();
$action = $_GET['action'] ?? $_POST['action'] ?? '';

if ($action === 'create') $controller->store();
elseif ($action === 'update') $controller->update();
elseif ($action === 'delete') $controller->delete();