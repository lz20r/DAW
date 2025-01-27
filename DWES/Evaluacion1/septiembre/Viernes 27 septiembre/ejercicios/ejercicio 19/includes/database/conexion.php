<?php
$servername = "localhost";
$database = "formulario";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo '<script language="javascript">alert("Conexión establecida");</script>';
mysqli_close($conn);
