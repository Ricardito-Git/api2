<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$response = ["success" => false, "message" => ""];

// SIMULACIÓN - Primero probamos sin BD
$response = [
    "success" => true,
    "message" => "✅ Endpoint de registro funcionando",
    "data_received" => [
        "nombre" => $_POST['nombre'] ?? 'No recibido',
        "email" => $_POST['email'] ?? 'No recibido',
        "password" => isset($_POST['password']) ? '***' : 'No recibido'
    ],
    "server" => "dragonbite.free.nf",
    "mode" => "prueba_sin_BD"
];

echo json_encode($response);
?>