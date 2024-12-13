<?php
include '../conexion.php';

$marca = $modelo = $kilometros = $color = $precio = $foto = $deposito = $kms_incluidos = $costo_km_extra = $gallery = '';
$successMessage = $errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $kilometros = $_POST['kilometros'] ?? '';
    $color = $_POST['color'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $foto = $_POST['foto'] ?? '';
    $deposito = $_POST['deposito'] ?? '';
    $kms_incluidos = $_POST['kms_incluidos'] ?? '';
    $costo_km_extra = $_POST['costo_km_extra'] ?? '';
    $gallery = $_POST['gallery'] ?? ''; // Galería ingresada en JSON

    // Validaciones
    if (empty($marca) || empty($modelo) || empty($kilometros) || empty($color) || empty($precio) || empty($foto) || empty($deposito) || empty($kms_incluidos) || empty($costo_km_extra) || empty($gallery)) {
        $errorMessage = "Todos los campos son obligatorios.";
    } elseif (!is_numeric($kilometros) || !is_numeric($precio) || !is_numeric($deposito) || !is_numeric($kms_incluidos) || !is_numeric($costo_km_extra)) {
        $errorMessage = "Kilómetros, Precio, Depósito, Kms incluidos y Costo por Km extra deben ser números válidos.";
    } elseif (!json_decode($gallery)) {
        $errorMessage = "El formato de la galería debe ser JSON válido.";
    } else {
        $sql = "INSERT INTO coches (marca, modelo, kilometros, color, precio, foto, deposito, kms_incluidos, costo_km_extra, gallery) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            $errorMessage = "Error preparando la consulta: " . $mysqli->error;
        } else {
            $stmt->bind_param("ssssssddds", $marca, $modelo, $kilometros, $color, $precio, $foto, $deposito, $kms_incluidos, $costo_km_extra, $gallery);

            if ($stmt->execute()) {
                $successMessage = "Nuevo coche añadido correctamente con galería.";
                header("Location:../../../../admin/modelos.php");
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
                <label for="deposito">Depósito</label>
                <input type="text" class="form-control" id="deposito" name="deposito"
                    value="<?php echo htmlspecialchars($deposito); ?>" required>
            </div>

            <div class="form-group">
                <label for="kms_incluidos">Kms Incluidos</label>
                <input type="text" class="form-control" id="kms_incluidos" name="kms_incluidos"
                    value="<?php echo htmlspecialchars($kms_incluidos); ?>" required>
            </div>

            <div class="form-group">
                <label for="costo_km_extra">Costo por Km Extra</label>
                <input type="text" class="form-control" id="costo_km_extra" name="costo_km_extra"
                    value="<?php echo htmlspecialchars($costo_km_extra); ?>" required>
            </div>

            <div class="form-group">
                <label for="foto">Imagen URL</label>
                <input type="text" class="form-control" id="foto" name="foto"
                    value="<?php echo htmlspecialchars($foto); ?>" required>
            </div>

            <div class="form-group">
                <label for="gallery">Galería (JSON)</label>
                <textarea class="form-control" id="gallery" name="gallery" rows="5" required><?php echo htmlspecialchars($gallery); ?></textarea>
                <small class="form-text text-muted">
                    Ejemplo: [{"image_url": "https://example.com/image1.jpg", "alt_text": "Vista frontal"}, {"image_url": "https://example.com/image2.jpg", "alt_text": "Vista trasera"}]
                </small>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Coche</button>
            <a href="../../admin/modelos.php" class="btn btn-secondary">Volver a la Flota</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>