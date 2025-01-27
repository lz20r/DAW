<?php
// Incluir la conexión a la base de datos
include 'includes/db.php';

// Crear la tabla de Reservas
$sql = "CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(255) NOT NULL,
    reservation_date DATE NOT NULL,
    reservation_time TIME NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'reservations' creada exitosamente.<br>";
} else {
    echo "Error creando la tabla 'reservations': " . $conn->error . "<br>";
}

// Crear la tabla de Platos/Bebidas (Menu)
$sql = "CREATE TABLE IF NOT EXISTS dishes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(5,2) NOT NULL,
    image VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'dishes' creada exitosamente.<br>";
} else {
    echo "Error creando la tabla 'dishes': " . $conn->error . "<br>";
}

// Crear la tabla de Galería de Imágenes
$sql = "CREATE TABLE IF NOT EXISTS gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'gallery' creada exitosamente.<br>";
} else {
    echo "Error creando la tabla 'gallery': " . $conn->error . "<br>";
}

// Cerrar la conexión
$conn->close();
