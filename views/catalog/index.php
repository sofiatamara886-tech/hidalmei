<?php 
// 1. Carga la configuración global y funciones
require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/includes/functions.php';

// 2. Incluye el modelo de productos (NUEVO / NECESARIO)
require_once BASE_PATH . '/models/Product.php';

// 3. Carga la cabecera visual
require_once BASE_PATH . '/includes/header.php'; 

// 4. Instancia del modelo
$productModel = new Product();

$paisId = isset($_GET['pais_id']) && $_GET['pais_id'] !== '' ? (int)$_GET['pais_id'] : null;
$categoriaId = isset($_GET['categoria_id']) && $_GET['categoria_id'] !== '' ? (int)$_GET['categoria_id'] : null;

$productos = $productModel->getFiltered($paisId, $categoriaId);
$paises = $productModel->getPaises();
$categorias = $productModel->getCategorias();
?>

<h1 style="margin-bottom: 1.5rem; text-align: center;">Catálogo Exclusivo Asiático</h1>

<!-- Barra de Filtros -->
<div style="background: #fff; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); margin-bottom: 2rem;">
    <form method="GET" action="<?= BASE_URL ?>views/catalog/index.php" style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: flex-end;">
        
        <div style="flex: 1; min-width: 200px;">
            <label for="pais_id" style="font-weight: bold; display: block; margin-bottom: 0.5rem;">País de Origen:</label>
            <select name="pais_id" id="pais_id" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
                <option value="">Todos los países</option>
                <?php foreach ($paises as $pais): ?>
                    <option value="<?= $pais['id'] ?>" <?= (isset($_GET['pais_id']) && $_GET['pais_id'] == $pais['id']) ? 'selected' : '' ?>>
                        <?= sanitize($pais['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="flex: 1; min-width: 200px;">
            <label for="categoria_id" style="font-weight: bold; display: block; margin-bottom: 0.5rem;">Categoría:</label>
            <select name="categoria_id" id="categoria_id" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
                <option value="">Todas las categorías</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= (isset($_GET['categoria_id']) && $_GET['categoria_id'] == $cat['id']) ? 'selected' : '' ?>>
                        <?= sanitize($cat['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <button type="submit" style="padding: 0.6rem 1.5rem; background: #e84393; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Filtrar</button>
            <a href="<?= BASE_URL ?>views/catalog/index.php" style="margin-left: 0.5rem; text-decoration: none; color: #666; font-size: 0.9rem;">Limpiar</a>
        </div>
    </form>
</div>

<!-- Grilla de Productos -->
<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1.5rem;">
    <?php if (empty($productos)): ?>
        <p style="grid-column: 1 / -1; text-align: center; color: #666; padding: 2rem;">No se encontraron productos en la base de datos.</p>
    <?php else: ?>
        <?php foreach ($productos as $prod): ?>
            <div style="background: #fff; border-radius: 8px; border: 1px solid #eee; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between;">
                <div style="padding: 1rem;">
                    <small style="color: #888; text-transform: uppercase; font-size: 0.75rem;"><?= sanitize($prod['categoria_nombre'] ?? '') ?></small>
                    <h3 style="font-size: 1.1rem; margin: 0.5rem 0;"><?= sanitize($prod['nombre']) ?></h3>
                    <p style="font-size: 1.25rem; font-weight: bold; color: #e84393;">$<?= number_format($prod['precio'], 2) ?></p>
                </div>
                <div style="padding: 1rem; background: #fafafa; border-top: 1px solid #eee;">
                    <a href="<?= BASE_URL ?>views/catalog/detail.php?id=<?= $prod['id'] ?>" style="display: block; text-align: center; padding: 0.5rem; background: #2d3436; color: white; text-decoration: none; border-radius: 4px; font-weight: 500;">Ver Detalle</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>