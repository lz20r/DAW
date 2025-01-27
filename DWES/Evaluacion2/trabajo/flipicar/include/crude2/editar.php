<?php
include '../conexion.php';

$id = $_GET['id'] ?? null;
$nombre = $imagen = '';
$successMessage = $errorMessage = '';

if ($id === null) {
    $errorMessage = "ID de la Marca no proporcionado";
} else {
    $sql = "SELECT * FROM marcas WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
        $errorMessage = "Error al preparar la consulta: " . $mysqli->error;
    } else {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $marcas = $result->fetch_assoc();

        if (!$marcas) {
            $errorMessage = "ID de la Marca no encontrado";
        } else {
            $nombre = $marcas["nombre"];
            $imagen = base64_encode($marcas["imagen"]); // Codificar la imagen para mostrarla en HTML
        }

        $stmt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($errorMessage)) {
    $nombre = $_POST['nombre'] ?? '';
    $imagenBinaria = null;

    // Verificar si se subió un archivo de imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagenBinaria = file_get_contents($_FILES['imagen']['tmp_name']);
    } else {
        // Si no se sube una nueva imagen, mantener la actual
        $sql = "SELECT imagen FROM marcas WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $marcas = $result->fetch_assoc();
        $imagenBinaria = $marcas["imagen"];
        $stmt->close();
    }

    if (empty($nombre) || empty($imagenBinaria)) {
        $errorMessage = 'Todos los campos son obligatorios.';
    } else {
        $sql = "UPDATE marcas SET nombre = ?, imagen = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            $errorMessage = 'Error al preparar la consulta: ' . $mysqli->error;
        } else {
            // Utilizamos el tipo "b" para datos binarios
            $stmt->bind_param('sbi', $nombre, $imagenBinaria, $id);

            // Enlazar el BLOB de manera manual
            $stmt->send_long_data(1, $imagenBinaria);

            if ($stmt->execute()) {
                $successMessage = "Marca actualizada correctamente";
                header("Location: ../../admin/index.php");
                exit();
            } else {
                $errorMessage = "Error al actualizar la marca: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Marca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Editar Marca</h2>

        <!-- Mensajes de éxito o error -->
        <?php if ($successMessage): ?>
            <div class="alert alert-success text-center">
                <?php echo $successMessage; ?>
            </div>
        <?php elseif ($errorMessage): ?>
            <div class="alert alert-danger text-center">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <?php if (!$errorMessage): ?>
            <form action="edit.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light shadow-sm">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la Marca</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo htmlspecialchars($nombre); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen de la Marca</label>
                    <input type="file" id="imagen" name="imagen" class="form-control">
                </div>

                <!-- Previsualización de la Imagen -->
                <?php if ($imagen): ?>
                    <div class="mb-3">
                        <p>Imagen actual:</p>
                        <img src="data:image/jpeg;base64,<?php echo $imagen; ?>" alt="Imagen de la marca" class="img-fluid rounded shadow-sm" style="max-width: 200px;">
                    </div>
                <?php endif; ?>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="../../admin/index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>