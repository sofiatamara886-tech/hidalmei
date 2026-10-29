<?php 
// Carga primero la configuración global
require_once __DIR__ . '/../config/config.php';

// Inclusión por ruta absoluta garantizada
require_once BASE_PATH . '/includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    
    <!-- 1. Añade Bootstrap CSS aquí -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- 2. Tu archivo de estilos personalizado -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
    <header style="background: #fff; border-bottom: 2px solid var(--primary-color, #e84393); padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center;">
        <div class="logo">
            <a href="<?= BASE_URL ?>" style="font-size: 1.8rem; font-weight: bold; color: var(--primary-color, #e84393); text-decoration: none;">HiDalMei</a>
        </div>
        
        <nav style="display: flex; align-items: center; gap: 1.5rem;">
            <a href="<?= BASE_URL ?>views/home.php" style="text-decoration: none; color: #333;">Inicio</a>
            <a href="<?= BASE_URL ?>views/catalog/index.php" style="text-decoration: none; color: #333;">Catálogo</a>
            
          <?php if (isAuthenticated()): ?>
        <span style="font-weight: bold; color: #333;">
            Hola, <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Usuario'); ?>
        </span>

        <!-- Botón exclusivo para el Administrador (Rol 1) -->
        <?php if (isset($_SESSION['usuario_rol']) && (int)$_SESSION['usuario_rol'] === 1): ?>
            <a href="<?= BASE_URL ?>views/admin/dashboard.php" class="btn btn-sm btn-outline-primary" style="font-weight: bold; border-color: #e84393; color: #e84393; text-decoration: none; padding: 0.3rem 0.8rem; border-radius: 4px;">Panel Admin</a>
        <?php endif; ?>

        <a href="<?= BASE_URL ?>views/orders/history.php" style="text-decoration: none; color: #333;">Mis Pedidos</a>
        <a href="<?= BASE_URL ?>controllers/AuthController.php?action=logout" style="text-decoration: none; color: #333;">Cerrar Sesión</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>views/auth/login.php" style="text-decoration: none; color: #333; font-weight: 500;">Iniciar Sesión</a>
            <a href="<?= BASE_URL ?>views/auth/register.php" style="background: #e84393; color: white; padding: 0.5rem 1rem; border-radius: 20px; text-decoration: none;">Registrarse</a>
        <?php endif; ?>
        </nav>
        <li class="nav-item">
    <a class="nav-link" href="<?= BASE_URL ?>views/quienes-somos.php" style="cursor: pointer; color: #333; font-weight: 500;">
        Quiénes Somos
    </a>
</li>

    <!-- Agrega esta opción en tu barra de navegación (Menú) -->

    </header>
    <!-- Ventana Modal de Tratamiento de Datos (Colócala al final de tu archivo header.php, fuera del menú) -->
            <!-- Enlace en la barra de navegación -->
<li class="nav-item">
    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalTratamientoDatos">Tratamiento de datos</a>
</li>
<!-- Modal de Tratamiento de Datos -->
<div class="modal fade" id="modalTratamientoDatos" tabindex="-1" aria-labelledby="modalTratamientoDatosLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark" id="modalTratamientoDatosLabel">Tratamiento de Datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <p class="text-secondary mb-0" style="line-height: 1.6;">
                    El presente proyecto tiene fines exclusivamente <strong>académicos</strong>. Los datos utilizados durante el desarrollo, las pruebas y la <strong>demostración</strong> del sistema son ficticios y fueron creados únicamente con fines de <strong>simulación</strong>. El sistema no recolecta, almacena ni procesa datos personales reales de estudiantes, docentes o terceros.
                </p>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>
            </div>

        </div>
    </div>
</div>
<!-- Carga de Javascript de Bootstrap (Obligatorio para que funcionen las modales) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    <main class="container" style="max-width: 1200px; margin: 2rem auto; padding: 0 1rem;">
        <?php displayAlert(); ?>