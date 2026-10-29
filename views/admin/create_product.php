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

require_once BASE_PATH . '/includes/header.php';
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold text-center">Agregar Nuevo Producto</h2>

                    <!-- Formulario con enctype para permitir la subida de imágenes -->
                    <form action="<?= BASE_URL ?>controllers/ProductController.php?action=create" method="POST" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="precio" class="form-label">Precio (COP)</label>
                            <input type="number" step="1" min="0" class="form-control" id="precio" name="precio" placeholder="Ej: 45000" required>
                        </div>
                        
                            <div class="col-md-6 mb-3">
                                <label for="stock" class="form-label">Stock / Cantidad</label>
                                <input type="number" class="form-control" id="stock" name="stock" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="imagen" class="form-label">Imagen del Producto</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?= BASE_URL ?>views/admin/dashboard.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar Producto</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>