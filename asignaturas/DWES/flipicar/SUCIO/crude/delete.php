<?php
include '../include/conexion.php';

$successMessage = $errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carId = $_POST['id'] ?? '';

    if (empty($carId)) {
        $errorMessage = "Debe proporcionar un ID de coche para eliminar.";
    } else {
        $sql = "DELETE FROM coches WHERE id = ?";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            $errorMessage = "Error preparando la consulta: " . $mysqli->error;
        } else {
            $stmt->bind_param("i", $carId);

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    $successMessage = "Coche eliminado correctamente.";
                    header("Location: ../flota.php");
                    exit();
                } else {
                    $errorMessage = "No se encontró ningún coche con el ID proporcionado.";
                }
            } else {
                $errorMessage = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    $mysqli->close();
}
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
        <h2>Eliminar Coche de la Flota</h2>

        <?php if ($successMessage): ?>
        <div class="alert alert-success">
            <?php echo $successMessage; ?>
        </div>
        <?php endif; ?>
        <?php if ($errorMessage): ?>
        <div class="alert alert-danger">
            <?php echo $errorMessage; ?>
        </div>
        <?php endif; ?>

        <form action="delete.php" method="POST">
            <div class="form-group">
                <label for="id">ID del Coche a Eliminar</label>
                <input type="number" class="form-control" id="id" name="id" required>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar Coche</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>