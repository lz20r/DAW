<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Préstamo</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellidos = htmlspecialchars($_POST['apellidos']);
    $importe = floatval($_POST['importe']);
    $anios = intval($_POST['anios']);
    $interes = floatval($_POST['interes']);

    $cuotas = $anios * 12;

    $importe_total = $importe * (1 + $interes);  
    $importe_cuota = $importe_total / $cuotas;

    echo "<h2>Hola $nombre $apellidos, a continuación le detallamos la información de su préstamo:</h2>";
    echo "<p>Importe solicitado: $" . number_format($importe, 2) . "</p>";
    echo "<p>Nº de cuotas: $cuotas</p>";
    echo "<p>Tipo de interés: " . ($interes * 100) . "%</p>";
    echo "<p>Importe de cada cuota: $" . number_format($importe_cuota, 2) . "</p>";
}
?>
</body>
</html>