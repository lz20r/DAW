<?php
include 'includes/database/conexion.php';

$sql = mysqli_query($conn, "SELECT * FROM moviles");
$data = mysqli_fetch_all($sql, MYSQLI_ASSOC);

// bootstrap table with data from the $database
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'>";
echo "<div class='container'>";
echo "<div class=' row'>";
echo "<div class='col-12'>";
echo "<h1 class='text-center'>Moviles en Venta</h1>";
echo "</div>";
echo "</div>";

echo "<table class='table'>";
foreach ($data as $row) {
    echo "<tr>";
    foreach ($row as $cell) {
        // si es id no mostrar
        if ($cell == "id") {
            continue;
        } else {
            echo "<td>" . $cell . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
