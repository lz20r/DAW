<?php
include '../include/conexion.php';

// Inicializar variables
$id = $_GET['id'] ?? null;
$marca = $modelo = $kilometros = $color = $precio = $foto = '';
$successMessage = $errorMessage = '';

// Verificar si el ID está presente y obtener datos actuales
if ($id === null) {
    $errorMessage = "ID de coche no proporcionado";
} else {
    $sql = "SELECT * FROM coches WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        $errorMessage = "Error al preparar la consulta: " . $mysqli->error;
    } else {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $car = $result->fetch_assoc();

        if (!$car) {
            $errorMessage = "Coche no encontrado";
        } else {
            // Asignar valores actuales del coche al formulario
            $marca = $car['marca'];
            $modelo = $car['modelo'];
            $kilometros = $car['kilometros'];
            $color = $car['color'];
            $precio = $car['precio'];
            $foto = $car['foto'];
        }

        $stmt->close();
    }
}

// Actualizar datos si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($errorMessage)) {
    $marca = $_POST['marca'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $kilometros = $_POST['kilometros'] ?? '';
    $color = $_POST['color'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $foto = $_POST['foto'] ?? '';

    if (empty($marca) || empty($modelo) || empty($kilometros) || empty($color) || empty($precio) || empty($foto)) {
        $errorMessage = "Todos los campos son obligatorios.";
    } else {
        $sql = "UPDATE coches SET marca = ?, modelo = ?, kilometros = ?, color = ?, precio = ?, foto = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            $errorMessage = "Error al preparar la consulta: " . $mysqli->error;
        } else {
            $stmt->bind_param("ssssssi", $marca, $modelo, $kilometros, $color, $precio, $foto, $id);

            if ($stmt->execute()) {
                $successMessage = "Coche actualizado correctamente";
                header("Location: ../flota.php");
                exit();
            } else {
                $errorMessage = "Error: " . $stmt->error;
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
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Editar Coche</h2>

        <!-- Mostrar mensajes de éxito o error -->
        <?php if ($successMessage): ?>
        <div class="alert alert-success text-center"><?php echo $successMessage; ?></div>
        <?php elseif ($errorMessage): ?>
        <div class="alert alert-danger text-center"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <?php if (!$errorMessage): ?>
        <!-- Formulario para editar el coche -->
        <form action="edit.php?id=<?php echo $id; ?>" method="POST" class="p-4 border rounded bg-light shadow-sm">
            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca"
                    value="<?php echo htmlspecialchars($marca); ?>" required>
            </div>

            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo"
                    value="<?php echo htmlspecialchars($modelo); ?>" required>
            </div>

            <div class="form-group">
                <label for="kilometros">Kilómetros</label>
                <input type="text" class="form-control" id="kilometros" name="kilometros"
                    value="<?php echo htmlspecialchars($kilometros); ?>" required>
            </div>

            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" class="form-control" id="color" name="color"
                    value="<?php echo htmlspecialchars($color); ?>" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio"
                    value="<?php echo htmlspecialchars($precio); ?>" required>
            </div>

            <div class="form-group">
                <label for="foto">Imagen URL</label>
                <input type="text" class="form-control" id="foto" name="foto"
                    value="<?php echo htmlspecialchars($foto); ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Actualizar Coche</button>
                <a href="../flota.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>