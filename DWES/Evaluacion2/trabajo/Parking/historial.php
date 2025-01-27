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
    <h1 class="text-center mt-5">Histórico de Vehículos en el Parking</h1>
    <div class="container">
        <div class="row text-center mt-5">
            <div class="col-12">
                <table class="table table-responsive table-sm table-striped">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Minutos que ha estado en el parking</th>
                            <th>Precio pagado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $precioPorMinuto = 0.05; // Precio por minuto en euros
                        $totalMinutos = 0;
                        $totalPrecio = 0.0;

                        try {
                            // Consulta SQL con cálculo de minutos y precio
                            $sql =
                                "SELECT 
                                matricula, 
                                CASE 
                                    WHEN salida != '' THEN ROUND((salida - entrada) / 60, 0) -- Redondea minutos a 2 decimales
                                    ELSE NULL
                                END AS minutos,
                                CASE 
                                    WHEN salida != '' THEN ROUND((salida - entrada) / 60 * $precioPorMinuto, 2) -- Redondea precio a 2 decimales
                                    ELSE NULL
                                END AS precio
                            FROM registros";
                            $stmt = $pdo->query($sql);

                            // Iterar sobre los resultados 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $minutos = $row["minutos"] !== null ? $row["minutos"] : 0;
                                $precio = $row["precio"] !== null ? $row["precio"] : 0;

                                $totalMinutos += $minutos;
                                $totalPrecio += $precio;

                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row["matricula"]) . "</td>";
                                echo "<td>" . ($row["minutos"] !== null ? htmlspecialchars($row["minutos"] . " minutos") : "en curso") . "</td>";
                                echo "<td>" . ($row["precio"] !== null ? htmlspecialchars($row["precio"]) . " €" : "en curso") . "</td>";
                                echo "</tr>";
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='3'>Error al obtener los datos: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total: <?php echo htmlspecialchars($stmt->rowCount()); ?> vehículos</th>
                            <th><?php echo htmlspecialchars($totalMinutos); ?> minutos</th>
                            <th><?php echo htmlspecialchars(number_format($totalPrecio, 2)); ?> €</th>
                        </tr>
                    </tfoot>
                </table>
                <a href="index.php" type="button" class="btn btn-primary btn-lg">Volver al inicio</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>