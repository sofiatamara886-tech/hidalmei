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
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
    <header style="background: #fff; border-bottom: 2px solid var(--primary-color, #e84393); padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center;">
        <div class="logo">
            <a href="<?= BASE_URL ?>" style="font-size: 1.8rem; font-weight: bold; color: var(--primary-color, #e84393); text-decoration: none;">HiDalMei</a>
        </div>
        
        <nav style="display: flex; align-items: center; gap: 1.5rem;">
            <a href="<?= BASE_URL ?>views/catalog/index.php" style="text-decoration: none; color: #333;">Inicio</a>
            <a href="<?= BASE_URL ?>views/catalog/index.php" style="text-decoration: none; color: #333;">Catálogo</a>
            
          <?php if (isAuthenticated()): ?>
            <span style="font-weight: bold; color: #333;">
                Hola, <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Usuario'); ?>
            </span>
            <a href="<?= BASE_URL ?>views/orders/history.php" style="text-decoration: none; color: #333;">Mis Pedidos</a>
            <a href="<?= BASE_URL ?>controllers/AuthController.php?action=logout" style="text-decoration: none; color: #333; font-weight: bold;">Cerrar Sesión</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>views/auth/login.php" style="text-decoration: none; color: #333; font-weight: 500;">Iniciar Sesión</a>
            <a href="<?= BASE_URL ?>views/auth/register.php" style="background: #e84393; color: white; padding: 0.5rem 1rem; border-radius: 20px; text-decoration: none;">Registrarse</a>
        <?php endif; ?>
        </nav>
    </header>
    <main class="container" style="max-width: 1200px; margin: 2rem auto; padding: 0 1rem;">
        <?php displayAlert(); ?>