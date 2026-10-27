<?php 
// Solo definimos BASE_PATH si no existe previamente
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__, 2));
}

// Verificamos si BASE_URL no ha sido definida para evitar el aviso
if (!defined('BASE_URL') && file_exists(BASE_PATH . '/config/config.php')) {
    require_once BASE_PATH . '/config/config.php';
}

require_once BASE_PATH . '/includes/header.php'; 
?>

<div style="max-width: 500px; margin: 2rem auto; padding: 2rem; background: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
    <p style="text-align: center; color: #666; font-size: 0.9rem; margin-bottom: 1.5rem;">
        Conéctate con los mejores proveedores de Corea del Sur, Japón y China.
    </p>

    <form action="<?= BASE_URL ?>controllers/AuthController.php?action=register" method="POST">
        
        <!-- Nombre y Apellido -->
        <div style="display: flex; gap: 10px; margin-bottom: 1rem;">
            <div style="flex: 1;">
                <label for="nombre" class="form-label" style="font-weight: bold; color: #333;">Nombre *</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="flex: 1;">
                <label for="apellido" class="form-label" style="font-weight: bold; color: #333;">Apellido *</label>
                <input type="text" id="apellido" name="apellido" class="form-control" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
        </div>

        <!-- Correo Electrónico -->
        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="email" class="form-label" style="font-weight: bold; color: #333;">Correo Electrónico *</label>
            <input type="email" id="email" name="email" class="form-control" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <!-- ÚNICO CAMPO DE CONTRASEÑA (CON RESTRICCIONES STRICTAS) -->
        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="password" class="form-label" style="font-weight: bold; color: #333;">Contraseña *</label>
            <input type="password" 
                   id="password" 
                   name="password" 
                   class="form-control" 
                   required 
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Debe contener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una minúscula y un número"
                   placeholder="Mínimo 8 caracteres (1 mayúscula, 1 minúscula, 1 número)"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            <small style="font-size: 0.8rem; color: #6c757d; display: block; margin-top: 4px;">
                Mínimo 8 caracteres (1 mayúscula, 1 minúscula y 1 número).
            </small>
        </div>

        <!-- Teléfono de Contacto -->
        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="telefono" class="form-label" style="font-weight: bold; color: #333;">Teléfono de Contacto</label>
            <input type="tel" id="telefono" name="telefono" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <!-- Dirección -->
        <div class="mb-3" style="margin-bottom: 1.5rem;">
            <label for="direccion" class="form-label" style="font-weight: bold; color: #333;">Dirección de Entrega Principal</label>
            <textarea id="direccion" name="direccion" class="form-control" rows="2" placeholder="Calle, Número, Ciudad, Departamento" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
        </div>

        <!-- Botón Guardar -->
        <button type="submit" style="width: 100%; padding: 0.8rem; background: #e84393; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">
            Crear Cuenta / Guardar
        </button>

    </form>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>