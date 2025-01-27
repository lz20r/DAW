<?php
/* session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
} */
include 'conexion.php';
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = $id";
$resultado = $mysqli->query($sql);
$usuario = $resultado->fetch_assoc();

echo $usuario['id'];
echo $usuario['nombre'];
echo $usuario['apellidos'];
echo $usuario['email'];
echo $usuario['telefono'];
echo $usuario['password'];
