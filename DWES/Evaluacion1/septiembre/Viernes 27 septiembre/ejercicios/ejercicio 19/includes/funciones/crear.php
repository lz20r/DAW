<?php
include "includes/database/conexion.php";


// crear un registro en la base de datos
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];


$sql = "INSERT INTO formulario (nombre, apellidos, direccion, telefono, email)

VALUES ('$nombre', '$apellidos', '$direccion', '$telefono', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: ../index.php');
