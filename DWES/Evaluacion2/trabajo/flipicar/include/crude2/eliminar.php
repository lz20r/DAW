<?php
include '../conexion.php';

$successMessage = $errorMessage = '';


// Obtener el ID de la marca desde la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verificar que el ID sea válido
if ($id > 0) {
    // Obtener los datos de la marca
    $sql = "SELECT nombre FROM marcas WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($nombre);
        $stmt->fetch();
        $stmt->close();
    } else die("Error al preparar la consulta: " . $mysqli->error);
} else {
    $errorMessage = "ID de marca no proporcionado.";
    $id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Confirmar Eliminación</h2>

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
                <p>¿Estás seguro de que deseas eliminar la marca <strong><?php echo $nombre; ?></strong>?</p>
                <form action="eliminar.php?id=<?php echo $id; ?>" method="post" class="text-center">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <a href="../../admin/index.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>