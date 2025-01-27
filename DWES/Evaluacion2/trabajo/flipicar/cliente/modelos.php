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
include '../include/carrusel.php';

// Obtener el `marca_id` desde la URL
$marca_id = isset($_GET['marca_id']) ? intval($_GET['marca_id']) : null;

if ($marca_id) {
    // Consulta para filtrar por `marca_id`
    $sql = "SELECT coches.*, marcas.nombre AS marca 
            FROM coches 
            INNER JOIN marcas ON coches.marca_id = marcas.id
            WHERE coches.marca_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $marca_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Consulta para mostrar todos los modelos
    $sql = "SELECT coches.*, marcas.nombre AS marca 
            FROM coches 
            INNER JOIN marcas ON coches.marca_id = marcas.id";
    $result = $mysqli->query($sql);
}
?>

<body>
    <div class="container py-5">
        <h2 class="text-center mb-5">
            <?php echo $marca_id ? "Modelos Disponibles para la Marca Seleccionada" : "Todos los Modelos Disponibles"; ?>
        </h2>
        <div class="row g-4">
            <?php if ($result && $result->num_rows > 0): ?>
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
                <p class="text-center">No hay modelos disponibles<?php echo $marca_id ? " para la marca seleccionada" : ""; ?>.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal para calcular alquiler -->
    <div class="modal fade" id="alquilerModal" tabindex="-1" aria-labelledby="alquilerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alquilerModalLabel">Calcular Alquiler</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del modal -->
                    <p>Formulario para calcular el alquiler del coche seleccionado.</p>
                </div>
            </div>
        </div>
    </div>


    <?php include '../include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php $mysqli->close(); ?>