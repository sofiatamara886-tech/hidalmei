<?php 
require_once __DIR__ . '/../../includes/header.php'; 
?>

<div class="auth-container" style="max-width: 400px; margin: 2rem auto; padding: 2rem; background: #fff; border-radius: 8px;">
    
    <h2>Iniciar Sesión en HiDalMei</h2>

    <!-- AVISO DE REGISTRO EXITOSO (Vía GET) -->
    <?php if (isset($_GET['registered']) && $_GET['registered'] == 1): ?>
        <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 0.8rem; border-radius: 4px; margin-bottom: 1rem; text-align: center; font-weight: bold;">
            ¡Registro exitoso! Ya puedes iniciar sesión.
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>controllers/AuthController.php" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
        <input type="hidden" name="action" value="login">

        <div>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 0.5rem;">
        </div>

        <button type="submit" style="padding: 0.6rem; background: #d63384; color: white; border: none; border-radius: 4px; cursor: pointer;">Iniciar Sesión</button>
    </form>

</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>