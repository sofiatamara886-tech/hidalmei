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
<div class="modal fade" id="modalTratamientoDatos" tabindex="-1" aria-labelledby="modalTratamientoDatosLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.15); overflow: hidden;">
            
            <!-- Cabecera con la identidad visual de HiDalMei -->
            <div class="modal-header" style="background-color: #fff; border-bottom: 2px solid #f1f1f1; padding: 1.2rem 1.5rem;">
                <h5 class="modal-title" id="modalTratamientoDatosLabel" style="font-weight: bold; color: #e84393; font-size: 1.25rem;">
                    Aviso de Tratamiento de Datos
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="cerrarModalTratamiento()" aria-label="Close"></button>
            </div>
            
            <!-- Cuerpo del mensaje -->
            <div class="modal-body" style="padding: 2rem; color: #444; line-height: 1.7; font-size: 1rem; text-align: justify;">
                <p style="margin: 0;">
                    El presente proyecto tiene fines exclusivamente academicos. Los datos utilizados durante el desarrollo, las pruebas y la demostracion del sistema son ficticios y fueron creados con fines unicamente de simulacion. El sistema no recolecta , almacena ni procesa datos personales de estudiantes , docentes o terceros.
                </p>
            </div>
            
            <!-- Pie de página con el botón de cierre estilizado -->
            <div class="modal-footer" style="border-top: 1px solid #f1f1f1; background-color: #fafafa; padding: 1rem 1.5rem;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #e84393; color: white; border-radius: 8px; padding: 8px 20px; font-weight: 500; border: none;">
                    Cerrar
                </button>
            
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