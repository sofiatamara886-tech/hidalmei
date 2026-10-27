<?php
// ========================================================
// PROYECTO: HiDalMei - Importaciones Asiáticas
// ARCHIVO: config/config.php
// ========================================================

// 1. Definición de la ruta absoluta del sistema de archivos
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

// 2. Detección dinámica del protocolo y del nombre del proyecto
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';

// Extrae la carpeta raíz dentro de htdocs/www (ejemplo: /hidalmei+/ o /hidalmei/)
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$projectFolder = explode('/', trim($scriptName, '/'))[0] ?? '';
$baseUrlPath = $projectFolder ? '/' . $projectFolder . '/' : '/';

// 3. Constantes de la Aplicación
if (!defined('APP_NAME')) {
    define('APP_NAME', 'HiDalMei - Importaciones Asiáticas');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', $protocol . $host . $baseUrlPath);
}
// En config/config.php
if (!defined('ADMIN_EMAIL')) {
    define('ADMIN_EMAIL', 'admin@hidalmei.com'); // Cambia esto por el correo que prefieras
}
if (isset($_SESSION['usuario_email']) && $_SESSION['usuario_email'] === ADMIN_EMAIL) {
    // Es el administrador supremo
}
// 4. Parámetros de Conexión a la Base de Datos MySQL
define('DB_HOST', 'localhost');
define('DB_NAME', 'hidalmei_db');
define('DB_USER', 'root');
define('DB_PASS', ''); // Si tienes contraseña en XAMPP/WAMP, colócala aquí
define('DB_CHARSET', 'utf8mb4');

// 5. Configuración de Zona Horaria y Errores (Entorno de Desarrollo)
date_default_timezone_set('America/Bogota'); // Ajusta a tu zona horaria local
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);