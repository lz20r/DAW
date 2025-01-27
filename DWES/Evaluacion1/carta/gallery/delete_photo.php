<?php
include '../includes/db.php';

$id = $_GET['id'];

// Eliminar la imagen de la base de datos
$sql = "DELETE FROM gallery WHERE id = $id";
$conn->query($sql);

header("Location: ../admin/index.php");
