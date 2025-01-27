<?php
// Configuración de conexión
$host = "localhost";       // Dirección del servidor
$user = "root";            // Usuario de la base de datos
$password = "";            // Contraseña del usuario
$dbname = "shop"; // Nombre de la base de datos

// Crear conexión
$mysqli = new mysqli($host, $user, $password, $dbname);

// Verificar si hay errores
if ($mysqli->connect_error) {
    die("Error en la conexión: " . $mysqli->connect_error);
} 
?>
