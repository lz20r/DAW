<?php
$servername = "localhost";
$username = "nia";
$password = "g01nP40h#";
$dbname = "examen23";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}
