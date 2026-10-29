<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!defined('BASE_PATH')) {
    require_once __DIR__ . '/../../config/config.php';
}

require_once BASE_PATH . '/models/Product.php';
require_once BASE_PATH . '/includes/header.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: ' . BASE_URL . 'views/admin/dashboard.php');
    exit;
}

$productModel = new Product();
$producto = $productModel->getById($id);
$categorias = $productModel->getCategorias();
$paises = $productModel->getPaises();

if (!$producto) {
    echo "<div class='container my-5 text-center'><h3>Producto no encontrado.</h3></div>";
    require_once BASE_PATH . '/includes/footer.php';
    exit;
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h2 class="mb-4 fw-bold text-center">Editar Producto</h2>

                    <form action="<?= BASE_URL ?>controllers/ProductController.php?action=update" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                        <input type="hidden" name="imagen_actual" value="<?= $producto['imagen'] ?>">

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= htmlspecialchars($producto['descripcion']) ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="precio" class="form-label">Precio (COP)</label>
                                <input type="number" step="1" min="0" class="form-control" id="precio" name="precio" value="<?= $producto['precio'] ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="categoria_id" class="form-label">Categoría</label>
                                <select class="form-select" id="categoria_id" name="categoria_id" required>
                                    <option value="">Seleccione una categoría</option>
                                    <?php foreach ($categorias as $cat): ?>
                                        <option value="<?= $cat['id'] ?>" <?= ($cat['id'] == $producto['categoria_id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($cat['nombre']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="pais_id" class="form-label">País de Origen</label>
                            <select class="form-select" id="pais_id" name="pais_id" required>
                                <option value="">Seleccione un país</option>
                                <?php foreach ($paises as $pais): ?>
                                    <option value="<?= $pais['id'] ?>" <?= ($pais['id'] == $producto['pais_id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($pais['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="imagen" class="form-label">Imagen del Producto (Dejar en blanco para conservar la actual)</label>
                            <?php if (!empty($producto['imagen'])): ?>
                                <div class="mb-2">
                                    <img src="<?= BASE_URL ?>assets/img/<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen actual" width="80" class="rounded">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?= BASE_URL ?>views/admin/dashboard.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>