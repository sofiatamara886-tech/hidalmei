<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function sanitize(string $data): string {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function redirect(string $path): void {
    header("Location: " . BASE_URL . $path);
    exit;
}

function isAuthenticated(): bool {
    return isset($_SESSION['usuario_id']) || isset($_SESSION['user_id']);
}

function getUserRole(): ?int {
    return $_SESSION['user_role'] ?? null;
}

function displayAlert(): void {
    if (isset($_SESSION['flash_message'])) {
        $type = $_SESSION['flash_type'] ?? 'info';
        echo "<div class='alert alert-{$type}'>" . sanitize($_SESSION['flash_message']) . "</div>";
        unset($_SESSION['flash_message'], $_SESSION['flash_type']);
    }
}