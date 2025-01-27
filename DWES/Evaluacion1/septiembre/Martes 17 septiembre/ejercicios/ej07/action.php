<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>action</title>
</head>
<body>
    <?php 
    $nombre = $_POST["nombre"]; 
    $apellidos = $_POST["apellidos"];
    $edad =  $_POST["edad"];
    $mayoredad = 18;
    if($edad <= $mayoredad) {
        echo "<p>" ."Hola " . $nombre . " " . $apellidos .", lo sentimos pero este sitio web es solo para mayores de 18 años" . "<p>";
    } else {
        echo "<p>" ."Hola " . $nombre . " " . $apellidos .", bienvenido a la web de CDM FP." . "<p>" ;
    }
    ?>
</body>
</html>