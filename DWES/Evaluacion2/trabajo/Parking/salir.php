<?php
include "config/db.php"; // Incluye el archivo con la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['matricula'])) {
    $matricula = trim($_POST['matricula']); // Elimina espacios en blanco
    $matricula = strtoupper($matricula);   // Convierte la matrícula a mayúsculas

    if (!empty($matricula)) {
        try {
            // Verificar si el vehículo está en el parking
            $sql = "SELECT entrada FROM registros WHERE matricula = :matricula AND esta_en_el_parking = 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':matricula', $matricula);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $entrada = $row['entrada'];

                // Generar la marca de tiempo actual (UNIX timestamp) para la salida
                $salida = time();

                // Calcular el tiempo total en el parking
                $tiempoEnParking = $salida - $entrada;

                // Actualizar el registro en la tabla
                $updateSql = "UPDATE registros SET salida = :salida, esta_en_el_parking = 0 WHERE matricula = :matricula AND esta_en_el_parking = 1";
                $updateStmt = $pdo->prepare($updateSql);
                $updateStmt->bindParam(':salida', $salida);
                $updateStmt->bindParam(':matricula', $matricula);

                if ($updateStmt->execute()) {
                    $mensaje = "El vehículo con matrícula <strong>$matricula</strong> ha salido del parking. Tiempo total: <strong>" . round($tiempoEnParking / 60) . " minutos</strong>.";
                    $tipoMensaje = "success";
                } else {
                    $mensaje = "Hubo un error al registrar la salida. Por favor, inténtalo de nuevo.";
                    $tipoMensaje = "danger";
                }
            } else {
                $mensaje = "El vehículo con matrícula <strong>$matricula</strong> no está registrado en el parking o ya salió.";
                $tipoMensaje = "warning";
            }
        } catch (PDOException $e) {
            $mensaje = "Error en la base de datos: " . htmlspecialchars($e->getMessage());
            $tipoMensaje = "danger";
        }
    } else {
        $mensaje = "Por favor, introduce una matrícula válida.";
        $tipoMensaje = "warning";
    }
}
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
    <h1 class="text-center mt-5">Salida del parking</h1>
    <div class="container">
        <div class="row text-center mt-5">
            <div class="col-md-6 offset-md-3">
                <?php if (!empty($mensaje)): ?>
                    <div class="alert alert-<?php echo htmlspecialchars($tipoMensaje); ?>" role="alert">
                        <?php echo $mensaje; ?>
                    </div>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <p class="fs-4">Matrícula del vehículo:</p>
                        <input type="text" class="form-control text-center py-3 fs-4" placeholder="1234XXX" name="matricula" maxlength="7" required>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Registrar</button>
                    <a href="index.php" type="button" class="btn btn-primary btn-lg">Volver al inicio</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>