<?php
// Asegurar sesión y permisos de administrador
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!defined('BASE_PATH')) {
    require_once __DIR__ . '/../../config/config.php';
}

if (!isset($_SESSION['usuario_rol']) || (int)$_SESSION['usuario_rol'] !== 1) {
    $_SESSION['error'] = "Acceso denegado.";
    header('Location: ' . BASE_URL . 'views/auth/login.php');
    exit;
}

// Incluir el modelo de productos y el header
require_once BASE_PATH . '/models/Product.php';
require_once BASE_PATH . '/includes/header.php';

// Obtener todos los productos de la base de datos
$productModel = new Product();
// Asegúrate de tener un método getAll() en tu modelo Product, o realiza la consulta directamente:
$productos = $productModel->getAll(); // Si no tienes getAll(), usa tu propia variable de consulta
?>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Panel de Administración - Productos</h2>
        <a href="<?= BASE_URL ?>views/admin/create_product.php" class="btn btn-primary">+ Agregar Producto</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($productos)): ?>
                            <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td><?= htmlspecialchars($producto['id']) ?></td>
                                    <td><strong><?= htmlspecialchars($producto['nombre']) ?></strong></td>
                                    <td><?= htmlspecialchars(substr($producto['descripcion'], 0, 50)) ?>...</td>
                                    <td>$<?= number_format($producto['precio'], 0, ',', '.') ?> COP</td>
    <td>
        <a href="<?= BASE_URL ?>views/admin/edit_product.php?id=<?= $producto['id'] ?>" class="btn btn-sm btn-outline-warning">Editar</a>
        <a href="<?= BASE_URL ?>controllers/ProductController.php?action=delete&id=<?= $producto['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás segura de que deseas eliminar este producto?');">Eliminar</a>
    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No hay productos registrados todavía.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Reporte de Compras para el Administrador -->
<div class="container my-5">
    <h3 class="mb-4 fw-bold">📊 Reporte de Compras y Pedidos</h3>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID Pedido</th>
                            <th>Usuario</th>
                            <th>Total Pagado</th>
                            <th>Método de Pago</th>
                            <th>Dirección</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once BASE_PATH . '/models/Order.php';
                        $orderModel = new Order();
                        $pedidos = $orderModel->getAllOrders();
                        ?>
                        <?php if (!empty($pedidos)): ?>
                            <?php foreach ($pedidos as $ped): ?>
                                <tr>
                                    <td>#<?= $ped['id'] ?></td>
                                    <td><?= htmlspecialchars($ped['usuario_nombre'] ?? 'Usuario General') ?></td>
                                    <td class="fw-bold text-success">$<?= number_format($ped['total'], 0, ',', '.') ?> COP</td>
                                    <td><?= htmlspecialchars($ped['metodo_pago']) ?></td>
                                    <td><?= htmlspecialchars($ped['direccion']) ?></td>
                                    <td><?= $ped['fecha'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">No hay compras registradas todavía.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>