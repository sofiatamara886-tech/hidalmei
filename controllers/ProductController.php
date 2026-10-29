<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../config/config.php';

class ProductController {

    public function store() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $precio = $_POST['precio'] ?? 0;
            $categoria_id = $_POST['categoria_id'] ?? 1;
            $pais_id = $_POST['pais_id'] ?? 1;

            // Manejo de la imagen
            $imagenNombre = '';
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                $imagenNombre = uniqid('prod_') . '.' . $extension;
                $rutaCarpeta = __DIR__ . '/../assets/img/';
                
                // Crear la carpeta si no existe
                if (!is_dir($rutaCarpeta)) {
                    mkdir($rutaCarpeta, 0777, true);
                }
                
                move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCarpeta . $imagenNombre);
            }

            $productModel = new Product();
            // Asegúrate de guardar también el nombre de la imagen en la base de datos
            $productModel->createWithImage($nombre, $descripcion, $precio, $categoria_id, $pais_id, $imagenNombre);

            header('Location: ' . BASE_URL . 'views/admin/dashboard.php');
            exit;
        } catch (Exception $e) {
            echo "Error crítico: " . $e->getMessage();
            exit;
        }
    }
}

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productModel = new Product();
            $productModel->delete($id);
        }
        header('Location: ' . BASE_URL . 'views/admin/dashboard.php');
        exit;
    }
    public function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $id = $_POST['id'] ?? null;
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $precio = $_POST['precio'] ?? 0;
            $categoria_id = $_POST['categoria_id'] ?? 1;
            $pais_id = $_POST['pais_id'] ?? 1;
            $imagenNombre = $_POST['imagen_actual'] ?? '';

            // Si se subió una nueva imagen
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                $imagenNombre = uniqid('prod_') . '.' . $extension;
                $rutaCarpeta = __DIR__ . '/../assets/img/';
                
                if (!is_dir($rutaCarpeta)) {
                    mkdir($rutaCarpeta, 0777, true);
                }
                
                move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCarpeta . $imagenNombre);
            }

            $productModel = new Product();
            // Asegúrate de actualizar también la imagen en tu modelo si es necesario
            $productModel->updateWithImage($id, $nombre, $descripcion, $precio, $categoria_id, $pais_id, $imagenNombre);

            header('Location: ' . BASE_URL . 'views/admin/dashboard.php');
            exit;
        } catch (Exception $e) {
            echo "Error crítico: " . $e->getMessage();
            exit;
        }
    }
}
}

// Enrutador del controlador
$controller = new ProductController();
$action = $_GET['action'] ?? $_POST['action'] ?? '';

if ($action === 'delete') {
    $controller->delete();
} elseif ($action === 'create') {
    $controller->store();
}
if ($action === 'delete') {
    $controller->delete();
} elseif ($action === 'create') {
    $controller->store();
} elseif ($action === 'update') {
    $controller->update();
}