<?php
include "config/db.php"; // Incluye el archivo con la conexión a la base de datos
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parking CDM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include "includes/nav.php"; ?>
    <h1 class="text-center mt-5">Vehículos en el parking</h1>
    <div class="container">
        <div class="row text-center mt-5">
            <div class="col-12">
                <table class="table table-responsive table-sm table-striped">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Tiempo (minutos)</th>
                            <th>Precio (€)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $precioPorMinuto = 0.05; // Precio por minuto en euros
                        $totalCoches = 0;
                        $totalMinutos = 0;
                        $totalPrecio = 0.0;

                        try {
                            // Consulta SQL para obtener vehículos aún en el parking
                            $sql = "
                                SELECT 
                                    matricula, 
                                    ROUND((UNIX_TIMESTAMP(NOW()) - entrada) / 60, 0) AS minutos,
                                    ROUND((UNIX_TIMESTAMP(NOW()) - entrada) / 60 * $precioPorMinuto, 2) AS precio
                                FROM registros
                                WHERE esta_en_el_parking = 1
                            ";
                            $stmt = $pdo->query($sql);

                            // Iterar sobre los resultados
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $totalCoches++;
                                $totalMinutos += $row["minutos"];
                                $totalPrecio += $row["precio"];

                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row["matricula"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["minutos"]) . " minutos</td>";
                                echo "<td>" . htmlspecialchars($row["precio"]) . " €</td>";
                                echo "</tr>";
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='3'>Error al obtener los datos: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Total: <?php echo htmlspecialchars($totalCoches); ?> coches</strong></td>
                            <td><strong>Total: <?php echo htmlspecialchars($totalMinutos); ?> minutos</strong></td>
                            <td><strong>Total: <?php echo htmlspecialchars(number_format($totalPrecio, 2)); ?> €</strong></td>
                        </tr>
                    </tfoot>
                </table>

                <a href="historial.php" class="btn btn-primary">Ver histórico de vehículos</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>