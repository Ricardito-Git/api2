<?php
require_once 'config.php';

// Obtener datos JSON
$input = json_decode(file_get_contents('php://input'), true);

if (!$input || empty($input['email']) || empty($input['password'])) {
    echo json_encode([
        "success" => false,
        "message" => "Email y contraseña requeridos"
    ]);
    exit();
}

$email = $conexion->real_escape_string($input['email']);
$password = $input['password'];

// Buscar usuario por email
$sql = "SELECT id, nombre, email, password, telefono, direccion, tipo 
        FROM usuarios 
        WHERE email = ? AND activo = 1";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode([
        "success" => false,
        "message" => "Usuario no encontrado"
    ]);
    exit();
}

$usuario = $result->fetch_assoc();

// Verificar contraseña
if (password_verify($password, $usuario['password'])) {
    // Login exitoso
    echo json_encode([
        "success" => true,
        "message" => "Login exitoso",
        "user" => [
            "id" => $usuario['id'],
            "nombre" => $usuario['nombre'],
            "email" => $usuario['email'],
            "telefono" => $usuario['telefono'],
            "direccion" => $usuario['direccion'],
            "tipo" => $usuario['tipo']
        ]
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Contraseña incorrecta"
    ]);
}

$conexion->close();
?>