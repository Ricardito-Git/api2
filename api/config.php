<?php
// Configuración para Railway
$host = "centerbeam.proxy.rlwy.net";
$port = "20291";
$user = "root";
$pass = "jAKGboQxVfaicReLdCoXdKgAKQUGjRQw";
$db   = "railway";

// Crear conexión con puerto
$conexion = new mysqli($host, $user, $pass, $db, $port);

// Verificar conexión
if ($conexion->connect_error) {
    die(json_encode([
        "success" => false,
        "message" => "Error de conexión a la base de datos",
        "error" => $conexion->connect_error,
        "host" => $host,
        "port" => $port
    ]));
}

// Configurar charset
$conexion->set_charset("utf8");

// Headers para CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, User-Agent");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

// Manejar preflight OPTIONS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Función para debug (opcional)
function debug_log($message) {
    file_put_contents('debug.log', date('Y-m-d H:i:s') . " - " . $message . PHP_EOL, FILE_APPEND);
}
?>