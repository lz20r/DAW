<?php
include 'include/conexion.php';

$sql = "SELECT * FROM coches";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler de Coches de Alta Gama</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center">Alquiler de Coches de Alta Gama</h1>
        <p class="text-center">Encuentra el coche perfecto para tus necesidades de transporte y estilo.</p>

        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($row['foto']); ?>" class="card-img-top"
                        alt="Foto de <?php echo htmlspecialchars($row['marca'] . ' ' . $row['modelo']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['marca'] . ' ' . $row['modelo']); ?>
                        </h5>
                        <p class="card-text">
                            <strong>Kilómetros:</strong> <?php echo number_format($row['kilometros']); ?> km<br>
                            <strong>Color:</strong> <?php echo htmlspecialchars($row['color']); ?><br>
                            <strong>Precio:</strong> €<?php echo number_format($row['precio'], 2); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
$mysqli->close();
?>