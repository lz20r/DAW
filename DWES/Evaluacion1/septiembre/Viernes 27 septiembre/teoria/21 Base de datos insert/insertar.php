<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insertar datos en SQL</title>
    </head>
    <body>
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
            
            // Guardamos los datos del formulario en variables.
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $telefono = $_POST["telefono"];

            // Consulta a la base de datos.
            $sql = "INSERT INTO contactos (nombre, apellidos, telefono) VALUES ('$nombre','$apellidos','$telefono')";
            
            // Comprobamos si el registro se ha guardado correctamente y en caso de error lo mostramos.
            if(mysqli_query($mysqli, $sql)){
                echo "Registro guardado correctamente";
                echo "<br>";
                echo "<a href='index.php'>Volver atrás</a>";
            }else{
                echo "Error: ".$sql."<br>".mysqli_error($mysqli);
            }
        ?>
    </body>
</html>