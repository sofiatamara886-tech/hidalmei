<?php
// 1. Asegurar que la configuración y la cabecera vayan al principio absoluto
if (!defined('BASE_PATH')) {
    require_once __DIR__ . '/../../config/config.php';
}

require_once BASE_PATH . '/includes/header.php';
require_once BASE_PATH . '/models/Product.php';

// Obtener los productos desde la base de datos
$productModel = new Product();
$productos = $productModel->getAll();
?>

<!-- 2. Contenido visual del catálogo -->
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Explora por Categoría</h2>
        <p class="text-muted">Encuentra tus tendencias asiáticas favoritas</p>
    </div>
    
    <!-- Aquí puedes mantener tus secciones de categorías o botones si los tienes -->

    <h2 class="mb-4 fw-bold mt-5">Catálogo de Productos Exclusivos</h2>
    <div class="row">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $prod): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <!-- Mostrar la imagen del producto si existe -->
                        <?php if (!empty($prod['imagen'])): ?>
                            <img src="<?= BASE_URL ?>assets/img/<?= htmlspecialchars($prod['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($prod['nombre']) ?>" style="height: 220px; object-fit: cover;">
                        <?php else: ?>
                            <img src="<?= BASE_URL ?>assets/img/default.png" class="card-img-top" alt="Sin imagen" style="height: 220px; object-fit: cover;">
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold"><?= htmlspecialchars($prod['nombre']) ?></h5>
                            <p class="card-text text-muted small"><?= htmlspecialchars(substr($prod['descripcion'], 0, 80)) ?>...</p>
                            <div class="mt-auto">
                                <span class="h5 text-primary fw-bold">$<?= number_format($prod['precio'], 0, ',', '.') ?> COP</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">No hay productos disponibles en el catálogo todavía.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php 
// 3. El pie de página al final
require_once BASE_PATH . '/includes/footer.php'; 
?>