<?php
require_once __DIR__ . '/functions.php';

/**
 * Exige que el usuario haya iniciado sesión
 */
function requireAuth(): void {
    if (!isAuthenticated()) {
        $_SESSION['flash_message'] = "Debes iniciar sesión para acceder a esta sección.";
        $_SESSION['flash_type'] = "error";
        redirect('views/auth/login.php');
    }
}

/**
 * Exige un rol específico (Ejemplo: 1 = Admin, 3 = Proveedor)
 */
function requireRole(int $requiredRole): void {
    requireAuth();
    if (getUserRole() !== $requiredRole) {
        $_SESSION['flash_message'] = "No tienes permisos para acceder a este recurso.";
        $_SESSION['flash_type'] = "error";
        redirect('views/catalog/index.php');
    }
}