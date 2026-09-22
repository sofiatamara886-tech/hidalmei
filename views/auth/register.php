<?php 
require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/includes/functions.php';
require_once BASE_PATH . '/includes/header.php'; 
?>


<div style="max-width: 500px; margin: 2rem auto; padding: 2rem; background: #fff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; color: #333; margin-bottom: 0.5rem;">Crea tu cuenta en HiDalMei</h2>
    <p style="text-align: center; color: #666; font-size: 0.9rem; margin-bottom: 1.5rem;">Conéctate con los mejores proveedores de Corea del Sur, Japón y China.</p>

    <?php if (isset($error)): ?>
        <div style="background: #ff7675; color: white; padding: 0.8rem; border-radius: 4px; margin-bottom: 1rem; text-align: center;">
            <?= sanitize($error) ?>
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>controllers/AuthController.php?action=register" method="POST">
        <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
            <div style="flex: 1;">
                <label style="display: block; font-weight: bold; margin-bottom: 0.3rem;">Nombre *</label>
                <input type="text" name="nombre" required style="width: 100%; padding: 0.6rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            </div>
            <div style="flex: 1;">
                <label style="display: block; font-weight: bold; margin-bottom: 0.3rem;">Apellido *</label>
                <input type="text" name="apellido" required style="width: 100%; padding: 0.6rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            </div>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; font-weight: bold; margin-bottom: 0.3rem;">Correo Electrónico *</label>
            <input type="email" name="email" required style="width: 100%; padding: 0.6rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; font-weight: bold; margin-bottom: 0.3rem;">Contraseña * (Mínimo 6 caracteres)</label>
            <input type="password" name="password" minlength="6" required style="width: 100%; padding: 0.6rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; font-weight: bold; margin-bottom: 0.3rem;">Teléfono de Contacto</label>
            <input type="tel" name="telefono" style="width: 100%; padding: 0.6rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: bold; margin-bottom: 0.3rem;">Dirección de Entrega Principal</label>
            <textarea name="direccion" rows="3" placeholder="Calle, Número, Ciudad, Departamento" style="width: 100%; padding: 0.6rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"></textarea>
        </div>

        <!-- BOTÓN DE GUARDAR / REGISTRARSE -->
        <button type="submit" style="width: 100%; padding: 0.8rem; background: #e84393; color: white; border: none; border-radius: 4px; font-weight: bold; font-size: 1rem; cursor: pointer;">
            Crear Cuenta / Guardar
        </button>
    </form>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>