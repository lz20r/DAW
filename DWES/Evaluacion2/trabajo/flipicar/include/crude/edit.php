<?php
include '../conexion.php';
// obtener las marcas disponibles
$sqlMarcas = "SELECT id, nombre FROM marcas";
$resultMarcas = $mysqli->query($sqlMarcas);

$marca_id = $modelo = $kilometros = $color = $precio = $foto = $deposito = $kms_incluidos = $costo_km_extra = $gallery = '';
$successMessage = $errorMessage = '';

$id = $_GET['id'] ?? null;
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
            $modelo = $car['modelo'];
            $kilometros = $car['kilometros'];
            $color = $car['color'];
            $precio = $car['precio'];
            $foto = $car['foto'];
            $deposito = $car['deposito'];
            $kms_incluidos = $car['kms_incluidos'];
            $costo_km_extra = $car['costo_km_extra'];
            $gallery = $car['gallery'];
        }

        $stmt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($errorMessage)) {
    $marca_id =  $_POST['marca_id'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $kilometros = $_POST['kilometros'] ?? '';
    $color = $_POST['color'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $foto = $_POST['foto'] ?? '';
    $deposito = $_POST['deposito'] ?? '';
    $kms_incluidos = $_POST['kms_incluidos'] ?? '';
    $costo_km_extra = $_POST['costo_km_extra'] ?? '';
    $gallery = $_POST['gallery'] ?? '';

    if (empty($marca) || empty($modelo) || empty($kilometros) || empty($color) || empty($precio) || empty($foto) || empty($deposito) || empty($kms_incluidos) || empty($costo_km_extra)) {
        $errorMessage = "Todos los campos son obligatorios.";
    } elseif (!is_numeric($kilometros) || !is_numeric($precio) || !is_numeric($deposito) || !is_numeric($kms_incluidos) || !is_numeric($costo_km_extra)) {
        $errorMessage = "Kilómetros, Precio, Depósito, Kms incluidos y Costo por Km extra deben ser números válidos.";
    } elseif (!json_decode($gallery)) {
        $errorMessage = "El formato de la galería debe ser JSON válido.";
    } else {
        $sql = "UPDATE coches SET marca = ?, modelo = ?, kilometros = ?, color = ?, precio = ?, foto = ?, deposito = ?, kms_incluidos = ?, costo_km_extra = ?, gallery = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            $errorMessage = "Error al preparar la consulta: " . $mysqli->error;
        } else {
            $stmt->bind_param("sssssssddsi", $marca, $modelo, $kilometros, $color, $precio, $foto, $deposito, $kms_incluidos, $costo_km_extra, $gallery, $id);
            
            if ($stmt->execute()) {
                $successMessage = "Coche actualizado correctamente.";
                header("Location: ../../admin/modelos.php");
                exit();
            } else {
                $errorMessage = "Error al actualizar el coche: " . $stmt->error;
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
                    <label for="marca_id">Marca</label>
                    <select name="marca_id" id="marca_id" class="form-control">
                        <option value="">Seleccione una marca</option>
                        <?php while ($marca = $resultMarcas->fetch_assoc()) : ?>
                            <option value="<?php echo $marca['id']; ?>" <?php echo $marca['id'] == $marca_id ? 'selected' : ''; ?>><?php echo $marca['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo htmlspecialchars($modelo); ?>" required>
                </div>

                <div class="form-group">
                    <label for="kilometros">Kilómetros</label>
                    <input type="text" class="form-control" id="kilometros" name="kilometros" value="<?php echo htmlspecialchars($kilometros); ?>" required>
                </div>

                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" class="form-control" id="color" name="color" value="<?php echo htmlspecialchars($color); ?>" required>
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" id="precio" name="precio" value="<?php echo htmlspecialchars($precio); ?>" required>
                </div>

                <div class="form-group">
                    <label for="deposito">Depósito</label>
                    <input type="text" class="form-control" id="deposito" name="deposito" value="<?php echo htmlspecialchars($deposito); ?>" required>
                </div>

                <div class="form-group">
                    <label for="kms_incluidos">Kms Incluidos</label>
                    <input type="text" class="form-control" id="kms_incluidos" name="kms_incluidos" value="<?php echo htmlspecialchars($kms_incluidos); ?>" required>
                </div>

                <div class="form-group">
                    <label for="costo_km_extra">Costo por Km Extra</label>
                    <input type="text" class="form-control" id="costo_km_extra" name="costo_km_extra" value="<?php echo htmlspecialchars($costo_km_extra); ?>" required>
                </div>

                <div class="form-group">
                    <label for="foto">Imagen URL</label>
                    <input type="text" class="form-control" id="foto" name="foto" value="<?php echo htmlspecialchars($foto); ?>" required>
                </div>

                <div class="form-group">
                    <label for="gallery">Galería (JSON)</label>
                    <textarea class="form-control" id="gallery" name="gallery" rows="5" required><?php echo htmlspecialchars($gallery); ?></textarea>
                    <small class="form-text text-muted">
                        Ejemplo: [{"alt_text": "Vista lateral", "image_url": "https://gtrentals.es/wp-content/uploads/2024/06/4-IMG_4720-scaled.jpg"}, {"alt_text": "Vista frontal", "image_url": "https://gtrentals.es/wp-content/uploads/2024/06/5-IMG_4745-scaled.jpg"}]
                    </small>
                </div>


                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="../../admin/modelos.php" class="btn btn-secondary">Cancelar</a>
                </div>

            </form>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>