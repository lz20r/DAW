<?php
    // Guardamos en una variable el ID del elemento que nos llega por GET.
    $id = $_GET['id'];

    // Conexión con la base de datos.
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ejercicio";
    $mysqli = new mysqli($server, $username, $password, $dbname);
    if($mysqli->connect_errno){
        echo "Fallo al conectar a MySQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar datos en SQL</title>
    </head>
    <body>
        <?php
            // Realizamos la consulta con DELETE para seleccionar el elemento que vamos a eliminar.
            $sql = "DELETE FROM contactos WHERE id='$id'";
            if (mysqli_query($mysqli, $sql)){
                echo "Registro eliminado correctamente";
                echo "<br>";
                echo "<a href='index.php'>Volver</a>";
            }else{
                echo "Error al eliminar el registro: ".mysqli_error($mysqli);
            }
        ?>
    </body>
</html>