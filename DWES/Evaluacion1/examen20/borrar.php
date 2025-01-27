<?php
include 'includes/conexion.php';
session_start();
if (isset($_SESSION['usuario'])) {
    header('Location: login.php');
}
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirigir con un mensaje de éxito
        header("Location: index.php?mensaje=success");
    } else {
        // Redirigir con un mensaje de error
        header("Location: index.php?mensaje=error");
    }
    $stmt->close();
} else {
    // Redirigir si no se recibe un ID
    header("Location: index.php?mensaje=invalid");
}
$mysqli->close();
