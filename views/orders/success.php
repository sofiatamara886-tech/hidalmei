<?php
if (!defined('BASE_PATH')) {
    require_once __DIR__ . '/../../config/config.php';
}
require_once BASE_PATH . '/includes/header.php';
?>

<div class="container my-5 text-center">
    <div class="card shadow-sm border-0 p-5 mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <div class="mb-4 text-success display-1">✔</div>
            <h2 class="fw-bold mb-3">¡Compra Simulada con Éxito!</h2>
            <p class="text-secondary mb-4">Tu pedido ha sido procesado correctamente dentro del entorno de simulación académica del proyecto <strong>HiDalMei</strong>.</p>
            <a href="<?= BASE_URL ?>views/catalog/index.php" class="btn btn-primary">Volver al Catálogo</a>
        </div>
    </div>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>