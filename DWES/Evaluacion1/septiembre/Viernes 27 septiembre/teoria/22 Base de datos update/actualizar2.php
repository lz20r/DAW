<?php
    // Conexión con la base de datos.
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ejercicio";
    $mysqli = new mysqli($server, $username, $password, $dbname);
    if($mysqli->connect_errno){
        echo "Fallo al conectar a MySQL: (".$mysqli->connect_errno.") ".$mysqli->connect_error;
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar datos en SQL</title>
    </head>
    <body>
        <?php
            // Almacenamos en variables los datos que llegan del formulario.
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];

            // Creamos la consulta de actualización con UPDATE. 
            $sql = "UPDATE contactos SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono' WHERE id='$id'";
			if (mysqli_query($mysqli, $sql)){
				echo "<br><strong>Registro actualizado correctamente</strong>";
                echo "<br>";
                echo "<a href='index.php'>Volver</a>";
			}else{
				echo "Error: ".$sql."<br>".mysqli_error($mysqli);
			}
        ?>
    </body>
</html>