<?php
include '../conexion.php';

$successMessage = $errorMessage = '';
$id = $_GET['id'] ?? null;

if ($id === null) {
    $errorMessage = "ID de coche no proporcionado.";
} else {
    // Obtener datos del coche para confirmación
    $sql = "SELECT * FROM coches WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $car = $result->fetch_assoc();
        $stmt->close();

        if (!$car) {
            $errorMessage = "Coche no encontrado.";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Confirmar y proceder con la eliminación
            $deleteSql = "DELETE FROM coches WHERE id = ?";
            $deleteStmt = $mysqli->prepare($deleteSql);

            if ($deleteStmt) {
                $deleteStmt->bind_param("i", $id);
                if ($deleteStmt->execute() && $deleteStmt->affected_rows > 0) {
                    $successMessage = "Coche eliminado correctamente.";
                    header("Location: ../../admin/modelos.php");
                    exit();
                } else {
                    $errorMessage = "Error al eliminar el coche.";
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
    <title>Eliminar Coche</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Eliminar Coche</h2>

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
                <p>¿Estás seguro de eliminar el coche <?php echo '<strong>' . $car['marca'] . '</strong>'. ' ' . '<strong>' . $car['modelo'] . '</strong>'; ?>?</p>
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