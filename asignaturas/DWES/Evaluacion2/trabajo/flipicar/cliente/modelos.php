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
// Conexión a la base de datos
include '../include/conexion.php';
include '../include/nav.php';

// Obtener la marca seleccionada de la URL (si existe)
$marca = isset($_GET['marca']) ? $_GET['marca'] : null;

// Construir la consulta SQL según la marca seleccionada
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
        <!-- Hero -->
        <div class="hero-overlay"></div>
        <div class="hero-text">
            <?php echo $marca ? "Alquiler " . htmlspecialchars($marca) : ""; ?>
        </div>
    </div>

    <!-- Models Section -->
    <div class="models-section py-4">
        <div class="container">
            <h2 class="text-center mb-5">
                Modelos Disponibles
            </h2>
            <div class="row g-4">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="col-md-4">
                            <div class="card">
                                <!-- Imagen -->
                                <img src="<?php echo htmlspecialchars($row['foto']); ?>" class="card-img-top img-fluid"
                                    alt="Foto de <?php echo htmlspecialchars($row['marca'] . ' ' . $row['modelo']); ?>">

                                <!-- Contenido en la parte inferior -->
                                <div class="card-content">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['marca']); ?></h5>
                                    <h6 class="card-subtitle"><?php echo htmlspecialchars($row['modelo']); ?></h6>
                                    <!-- Botón para abrir modal -->
                                    <a href="#"
                                        class="btn btn-calculate"
                                        data-bs-toggle="modal"
                                        data-bs-target="#alquilerModal">
                                        Calcular alquiler
                                    </a>
                                    <a href="../include/templates/ficha.php?modelo=<?php echo $row['modelo']; ?>" class="btn btn-view">Ver ficha</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-center">No hay modelos
                        disponibles<?php echo $marca ? " para la marca " . htmlspecialchars($marca) : ""; ?>.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <?php include '../include/templates/modal.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php $mysqli->close(); ?>