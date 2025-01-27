<?php
include '../conexion.php';

// Verificar que se recibió un ID a través del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Eliminar el registro de la base de datos
    $sql = "DELETE FROM marcas WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirigir al index.php después de la eliminación
            header("Location: ../../admin/index.php");
        } else {
            echo "Error al eliminar la marca: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $mysqli->error;
    }
} else {
    echo "ID no recibido.";
}

$mysqli->close();
?>
