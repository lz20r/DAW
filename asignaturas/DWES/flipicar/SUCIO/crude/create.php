<?php
include '../include/conexion.php';

$marca = $modelo =  $kilometros = $color = $precio = $matricula = $kilometros = $foto = '';
$successMessage = $errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $kilometros = $_POST['kilometros'] ?? '';
    $color = $_POST['color'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $foto = $_POST['foto'] ?? '';

    if (empty($marca) || empty($modelo) || empty($kilometros) || empty($color) || empty($precio) || empty($foto)) {
        $errorMessage = "All fields are required!";
    } else {
        $sql = "INSERT INTO coches (marca, modelo, kilometros, color, precio, foto) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            $errorMessage = "Error preparing the query: " . $mysqli->error;
        } else {
            $stmt->bind_param("ssssss", $marca, $modelo, $kilometros, $color, $precio, $foto);

            if ($stmt->execute()) {
                $successMessage = "Nuevo coche añadido correctamente";
                header("Location: ../flota.php");
                exit();
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
    <title>Agregar Coche</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2>Agregar Coche a la Flota</h2>

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

        <form action="create.php" method="POST">
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
                <label for="kilometros">Kilometros</label>
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
                <label for="imagen">Imagen URL</label>
                <input type="text" class="form-control" id="foto" name="foto"
                    value="<?php echo htmlspecialchars($foto); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Coche</button>
            <a href="../flota.php" class="btn btn-secondary">Volver a la Flota</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>