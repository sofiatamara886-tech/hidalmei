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
        try {
            // Recoger los datos del formulario de forma segura
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $precio = $_POST['precio'] ?? 0;
            $categoria_id = $_POST['categoria_id'] ?? 1; 
            $pais_id = $_POST['pais_id'] ?? 1;           

            // Instanciar el modelo y ejecutar la creación
            $productModel = new Product();
            $resultado = $productModel->create($nombre, $descripcion, $precio, $categoria_id, $pais_id);

            if ($resultado) {
                // Redirigir al dashboard si se guardó con éxito
                header('Location: ' . BASE_URL . 'views/admin/dashboard.php');
                exit;
            } else {
                echo "No se pudo guardar el producto en la base de datos.";
            }

        } catch (Exception $e) {
            // Mostrar cualquier error inesperado de SQL o PHP
            echo "Error crítico: " . $e->getMessage();
            exit;
        }
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