<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!defined('BASE_PATH')) {
    require_once __DIR__ . '/../../config/config.php';
}

require_once BASE_PATH . '/models/Product.php';
require_once BASE_PATH . '/includes/header.php';

$productModel = new Product();
$carrito = $_SESSION['carrito'] ?? [];
$totalGeneral = 0;
?>

<div class="container my-5">
    <h2 class="mb-4 fw-bold">🛒 Carrito de Compras / Mis Pedidos</h2>

    <?php if (!empty($carrito)): ?>
        <div class="table-responsive shadow-sm border-0 mb-4">
            <table class="table table-hover align-middle bg-white rounded">
                <thead class="table-light">
                    <tr>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrito as $id => $cantidad): 
                        $producto = $productModel->getById($id);
                        if (!$producto) continue;
                        $subtotal = $producto['precio'] * $cantidad;
                        $totalGeneral += $subtotal;
                    ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <?php if (!empty($producto['imagen'])): ?>
                                        <img src="<?= BASE_URL ?>assets/img/<?= htmlspecialchars($producto['imagen']) ?>" width="50" class="rounded me-3" style="height: 50px; object-fit: cover;">
                                    <?php endif; ?>
                                    <strong><?= htmlspecialchars($producto['nombre']) ?></strong>
                                </div>
                            </td>
                            <td>$<?= number_format($producto['precio'], 0, ',', '.') ?> COP</td>
                            <td>
                                <div class="input-group input-group-sm" style="width: 120px;">
                                    <a href="<?= BASE_URL ?>controllers/CartController.php?action=decrease&id=<?= $id ?>" class="btn btn-outline-secondary">-</a>
                                    <span class="form-control text-center bg-light"><?= $cantidad ?></span>
                                    <a href="<?= BASE_URL ?>controllers/CartController.php?action=increase&id=<?= $id ?>" class="btn btn-outline-secondary">+</a>
                                </div>
                            </td>
                            <td class="fw-bold text-primary">$<?= number_format($subtotal, 0, ',', '.') ?> COP</td>
                            <td>
                                <a href="<?= BASE_URL ?>controllers/CartController.php?action=remove&id=<?= $id ?>" class="btn btn-sm btn-outline-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="row justify-content-end">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 p-4 bg-light">
                    <h4 class="fw-bold mb-3">Resumen de la Orden</h4>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Total a Pagar:</span>
                        <strong class="h4 text-primary">$<?= number_format($totalGeneral, 0, ',', '.') ?> COP</strong>
                    </div>
                    <button type="button" class="btn btn-success w-100 py-2 fw-bold" data-bs-toggle="modal" data-bs-target="#modalSimulacionPago">
                        Simular Pago y Finalizar
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal de Simulación de Pago -->
        <div class="modal fade" id="modalSimulacionPago" tabindex="-1" aria-labelledby="modalPagoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title fw-bold" id="modalPagoLabel">Pasarela de Pago Simulada</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= BASE_URL ?>controllers/CartController.php?action=checkout" method="POST">
                        <div class="modal-body py-4">
                            <p class="text-muted mb-3">Estás simulando una transacción segura en pesos colombianos (COP).</p>
                            <div class="mb-3">
                                <label class="form-label">Método de Pago</label>
                                <select name="metodo_pago" class="form-select" required>
                                    <option value="Nequi / DaviPlata">Nequi / DaviPlata</option>
                                    <option value="Tarjeta Débito / Crédito">Tarjeta Débito / Crédito</option>
                                    <option value="PSE">PSE (Pago Seguros en Línea)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dirección de Envío</label>
                                <input type="text" name="direccion" class="form-control" placeholder="Ej: Calle 100 # 15-20, Bogotá" required>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary btn-sm">Confirmar Pago Exitoso</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php else: ?>
        <div class="text-center py-5 bg-white rounded shadow-sm">
            <p class="text-muted fs-5">Tu carrito de compras está vacío.</p>
            <a href="<?= BASE_URL ?>views/catalog/index.php" class="btn btn-primary mt-2">Ir al Catálogo</a>
        </div>
    <?php endif; ?>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>