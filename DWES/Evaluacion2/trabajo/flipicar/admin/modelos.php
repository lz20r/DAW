<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assests/css/style.css" rel="stylesheet">
    <link href="../assests/css/modelos.css" rel="stylesheet">
</head>

<?php
include '../include/conexion.php';
include '../include/nav.php';
include '../include/carrusel.php';
$marca = isset($_GET['marca']) ? $_GET['marca'] : null;

if ($marca) {
    $sql = "SELECT * FROM coches WHERE marca = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $marca);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM coches";
    $result = $mysqli->query($sql);
}
?>

<body>
    <div class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-text">
            <?php echo $marca ? "Gestión de " . htmlspecialchars($marca) : "Gestión de Modelos"; ?>
        </div>
    </div>

    <div class="container py-5">
        <div class="d-flex justify-content-between mb-4">
            <!-- Botón Crear -->
            <a href="../include/crude/create.php" class="btn btn-success">Crear Nuevo Modelo</a>
        </div>

        <h2 class="text-center mb-5">Modelos Disponibles</h2>

        <div class="row g-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <!-- Imagen -->
                            <img src="<?php echo htmlspecialchars($row['foto']); ?>" class="card-img-top img-fluid"
                                alt="Foto de <?php echo htmlspecialchars($row['marca'] . ' ' . $row['modelo']); ?>">

                            <!-- Contenido -->
                            <div class="card-content p-3">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['marca']); ?></h5>
                                <h6 class="card-subtitle mb-3"><?php echo htmlspecialchars($row['modelo']); ?></h6>

                                <!-- Botones de acción -->
                                <div class="d-flex justify-content-between">
                                    <a href="../include/crude/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
                                    <a href="../include/crude/delete.php?id=<?php echo $row['id']; ?>"
                                        onclick="return confirm('¿Estás seguro de eliminar este coche?');"
                                        class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">No hay modelos disponibles<?php echo $marca ? " para la marca " . htmlspecialchars($marca) : ""; ?>.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php include '../include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$mysqli->close();
?>