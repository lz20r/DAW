<?php
include '../conexion.php';

$successMessage = $errorMessage = '';
$id = $_GET['id'] ?? null; // Obtener el ID del modelo a eliminar

if ($id === null) {
    $errorMessage = "ID del modelo no proporcionado.";
} else {
    // Obtener datos del modelo para confirmar
    $sql = "SELECT coches.modelo, marcas.nombre AS marca FROM coches 
            INNER JOIN marcas ON coches.marca_id = marcas.id
            WHERE coches.id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $model = $result->fetch_assoc();
        $stmt->close();

        if (!$model) {
            $errorMessage = "Modelo no encontrado.";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Confirmar y proceder con la eliminación
            $deleteSql = "DELETE FROM coches WHERE id = ?";
            $deleteStmt = $mysqli->prepare($deleteSql);

            if ($deleteStmt) {
                $deleteStmt->bind_param("i", $id);
                if ($deleteStmt->execute() && $deleteStmt->affected_rows > 0) {
                    $successMessage = "Modelo eliminado correctamente.";
                    header("Location: ../../admin/modelos.php"); // Redirige al panel de modelos
                    exit();
                } else {
                    $errorMessage = "Error al eliminar el modelo.";
                }
                $deleteStmt->close();
            } else {
                $errorMessage = "Error al preparar la consulta: " . $mysqli->error;
            }
        }
    } else {
        $errorMessage = "Error al preparar la consulta: " . $mysqli->error;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Modelo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Eliminar Modelo</h2>

        <?php if ($successMessage): ?>
            <div class="alert alert-success text-center">
                <?php echo $successMessage; ?>
            </div>
        <?php elseif ($errorMessage): ?>
            <div class="alert alert-danger text-center">
                <?php echo $errorMessage; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">
                <p>¿Estás seguro de que deseas eliminar el modelo <strong><?php echo htmlspecialchars($model['modelo']); ?></strong> de la marca <strong><?php echo htmlspecialchars($model['marca']); ?></strong>?</p>
                <form method="POST">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <a href="../../admin/modelos.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>