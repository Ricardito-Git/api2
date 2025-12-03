<?php
$mysqli = new mysqli(
    "centerbeam.proxy.rlwy.net",   // Host
    "root",                        // Usuario
    "jAKGboQxVfaicReLdCoXdKgAKQUGjRQw", // Contraseña
    "railway",                     // Base de datos
    20291                          // Puerto
);

if ($mysqli->connect_errno) {
    echo "❌ Error de conexión: " . $mysqli->connect_error;
} else {
    echo "✅ Conexión exitosa a Railway!";
}
?>
