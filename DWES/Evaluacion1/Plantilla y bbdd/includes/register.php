<?php

session_start();
if (!isset($_SESSION[$usuario])) {
    header('Location: ../nuevo_usuario.php');
}
include 'includes/conexion.php';
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = $id";
$resultado = $mysqli->query($sql);
$usuario = $resultado->fetch_assoc();
