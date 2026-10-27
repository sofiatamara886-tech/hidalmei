<?php
// Activar errores y verificar sesión
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!defined('BASE_PATH')) {
    require_once __DIR__ . '/../../config/config.php';
}

// Validación de seguridad: Solo administradores (Rol 1)
if (!isset($_SESSION['usuario_rol']) || (int)$_SESSION['usuario_rol'] !== 1) {
    $_SESSION['error'] = "Acceso denegado. No tienes permisos de administrador.";
    header('Location: ' . BASE_URL . 'views/auth/login.php');
    exit;
}

require_once BASE_PATH . '/includes/header.php';
?>

<div class="container-fluid my-4">
    <div class="row">
        <!-- Sidebar de Navegación del Admin -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse p-3 border-end shadow-sm rounded mb-4">
            <h4 class="text-primary mb-4 fw-bold">Panel Admin</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="#dashboard" class="nav-link active text-dark fw-bold">📊 Resumen</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#productos" class="nav-link text-secondary">📦 Productos</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#reportes" class="nav-link text-secondary">📈 Reportes</a>
                </li>
                <li class="nav-item mt-4">
                    <a href="<?= BASE_URL ?>controllers/AuthController.php?action=logout" class="btn btn-outline-danger w-100">Cerrar Sesión</a>
                </li>
            </ul>
        </nav>

        <!-- Contenido Principal -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
                <h1 class="h2 text-dark">Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Administrador') ?></h1>
            </div>

            <!-- Sección de Estadísticas (Tarjetas) -->
            <div class="row text-white mb-4" id="dashboard">
                <div class="col-md-4 mb-3">
                    <div class="card bg-primary p-3 shadow-sm border-0 rounded">
                        <h5>Total de Productos</h5>
                        <h3 class="fw-bold">120</h3>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-success p-3 shadow-sm border-0 rounded">
                        <h5>Ventas del Mes</h5>
                        <h3 class="fw-bold">$4,500.00 USD</h3>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-info p-3 shadow-sm border-0 rounded text-dark">
                        <h5>Usuarios Registrados</h5>
                        <h3 class="fw-bold">35</h3>
                    </div>
                </div>
            </div>

            <!-- Sección de CRUD de Productos -->
            <div class="card shadow-sm border-0 mb-5" id="productos">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 text-dark fw-bold">📦 Lista de Productos (CRUD)</h5>
                    <a href="<?= BASE_URL ?>views/admin/create_product.php" class="btn btn-primary btn-sm">+ Agregar Producto</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="<?= BASE_URL ?>assets/img/default.png" alt="Producto" width="40" class="rounded"></td>
                                <td>Figura Coleccionable</td>
                                <td>$25.00</td>
                                <td>15</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning text-white">Editar</a>
                                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sección de Reportes de Ventas -->
            <div class="card shadow-sm border-0 mb-5" id="reportes">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-dark fw-bold">📈 Reportes y Gráficas de Ventas</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Aquí puedes integrar tablas detalladas de transacciones recientes o conectar una librería de gráficas.</p>
                    <div class="alert alert-light border text-center py-4 text-secondary">
                        [ Gráfica de rendimiento de ventas mensual en desarrollo ]
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>