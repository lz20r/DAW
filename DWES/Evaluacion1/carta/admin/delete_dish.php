<?php
include '../includes/db.php';

$id = $_GET['id'];

// Eliminar el plato de la base de datos
$sql = "DELETE FROM dishes WHERE id = $id";
$conn->query($sql);

header("Location: index.php");