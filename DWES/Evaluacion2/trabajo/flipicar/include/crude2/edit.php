<?php
include '../conexion.php';

$id = $_GET['id'] ?? null;
$nombre = $imagen = '';
$successMessage = $errorMessage = '';

if ($id === null) {
    $errorMessage = "ID de la Marca no proporcionado";
} else {
    $sql = "SELECT * FROM marcas WHERE id = ?";
    $smt = $mysqli->prepare($sql);

    if ($smt === false) {
        $errorMessage = "Error al preparar la consulta: " . $mysqli->error;
    } else {
        $smt->bind_param("i", $id);
        $smt->execute();
        $result = $smt->get_result();
        $marcas = $result->fetch_assoc();

        if (!$marcas) {
            $errorMessage = "ID de la Marca no encontrado";
        } else {
            $nombre = $marcas["nombre"];
            $imagen = $marcas["imagen"];
        }

        $smt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($errorMessage)) {
    $nombre = $_POST['marca'] ?? '';
    $imagen = $_POST['imagen'] ?? '';

    if (empty($nombre) || empty($imagen)) {
        $errorMessage = 'Todos los campos son obligatorios.';
    } else {
        $sql = "UPDATE marcas SET nombre = ?, imagen = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) { 
            $errorMessage = 'Error al preparar la consulta: ' . $mysqli->error;
        } else {
            $stmt->bind_param('ssi', $nombre, $imagen, $id); 

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
    <title>Editar Coche</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assests/css/edit.css" rel="stylesheet">
    
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Editar Marca</h2>
        <?php if ($successMessage): ?>
            <div class="alert alert-success text-center">
                <?php echo $successMessage; ?>
            </div>
        <?php elseif ($errorMessage): ?>
            <div class="alert alert-danger text-center">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <?php if (!$errorMessage): ?>
            <form action="edit.php?id=<?php echo $id; ?>" method="POST" class="p-4 border rounded bg-light shadow-sm">
                <div class="form-group">
                    <label for="nombre">Nombre de la Marca</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo htmlspecialchars($nombre); ?>" required>
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen de la Marca</label>
                    <input type="text" id="imagen" name="imagen" class="form-control" value="<?php echo htmlspecialchars($imagen); ?>" required>
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen de la Marca</label>
                    <img src="<?php echo htmlspecialchars($imagen ?? ''); ?>" alt="Imagen de la marca">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="../../admin/index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>