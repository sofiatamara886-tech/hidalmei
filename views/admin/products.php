<?php
require_once __DIR__ . '/../../includes/header.php';
require_once BASE_PATH . '/models/Product.php';

$productModel = new Product();
$productos = $productModel->getFiltered();
$paises = $productModel->getPaises();
$categorias = $productModel->getCategorias();

// Verificar si se está editando un producto
$productoEditar = null;
if (isset($_GET['edit'])) {
    $productoEditar = $productModel->getById($_GET['edit']);
}
?>

<div style="max-width: 900px; margin: 2rem auto;">
    <h2>Gestión de Productos (CRUD)</h2>

    <!-- FORMULARIO CREAR / EDITAR -->
    <form action="<?= BASE_URL ?>controllers/ProductController.php" method="POST" style="background: rgba(255,255,255,0.45); border: 2px solid var(--rosy); padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
        <input type="hidden" name="action" value="<?= $productoEditar ? 'update' : 'create' ?>">
        <?php if ($productoEditar): ?>
            <input type="hidden" name="id" value="<?= $productoEditar['id'] ?>">
        <?php endif; ?>

        <h3><?= $productoEditar ? 'Editar Producto' : 'Agregar Nuevo Producto' ?></h3>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <input type="text" name="nombre" placeholder="Nombre" value="<?= $productoEditar['nombre'] ?? '' ?>" required style="padding: 0.5rem;">
            <input type="number" step="0.01" name="precio" placeholder="Precio" value="<?= $productoEditar['precio'] ?? '' ?>" required style="padding: 0.5rem;">
            
            <select name="categoria_id" required style="padding: 0.5rem;">
                <option value="">Seleccionar Categoría</option>
                <?php foreach ($categorias as $c): ?>
                    <option value="<?= $c['id'] ?>" <?= ($productoEditar && $productoEditar['categoria_id'] == $c['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="pais_id" required style="padding: 0.5rem;">
                <option value="">Seleccionar País</option>
                <?php foreach ($paises as $p): ?>
                    <option value="<?= $p['id'] ?>" <?= ($productoEditar && $productoEditar['pais_id'] == $p['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($p['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="margin-top: 1rem;">
            <textarea name="descripcion" placeholder="Descripción" style="width: 100%; padding: 0.5rem;"><?= $productoEditar['descripcion'] ?? '' ?></textarea>
        </div>

        <button type="submit" style="margin-top: 1rem; background: var(--kiwi); color: var(--sienna); border: 2px solid var(--sienna); font-weight: bold; padding: 0.6rem 1.2rem; border-radius: 8px; cursor: pointer;">
            <?= $productoEditar ? 'Guardar Cambios' : 'Crear Producto' ?>
        </button>
        <?php if ($productoEditar): ?>
            <a href="<?= BASE_URL ?>views/admin/products.php" style="margin-left: 1rem; text-decoration: none; color: var(--brown);">Cancelar</a>
        <?php endif; ?>
    </form>

    <!-- TABLA DE PRODUCTOS -->
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background: var(--sienna); color: var(--gamboge);">
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>País</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= htmlspecialchars($p['nombre']) ?></td>
                    <td><?= htmlspecialchars($p['categoria_nombre'] ?? 'N/A') ?></td>
                    <td><?= htmlspecialchars($p['pais_nombre'] ?? 'N/A') ?></td>
                    <td>$<?= number_format($p['precio'], 2) ?></td>
                    <td>
                        <a href="?edit=<?= $p['id'] ?>" style="color: var(--vampiric); margin-right: 0.5rem;">Editar</a>
                        <a href="<?= BASE_URL ?>controllers/ProductController.php?action=delete&id=<?= $p['id'] ?>" onclick="return confirm('¿Seguro de eliminar?');" style="color: var(--vampiric);">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>