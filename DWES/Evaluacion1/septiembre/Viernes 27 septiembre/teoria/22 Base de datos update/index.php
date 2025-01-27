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
    // Realizamos una consulta SELECT para poder mostrar todos los elementos de la tabla.
    $sql = "SELECT * FROM contactos";
    $resultado = mysqli_query($mysqli, $sql);
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
            if(mysqli_num_rows($resultado)){
                while($fila = mysqli_fetch_assoc($resultado)){
                    echo $fila["id"];
                    echo "<br>";
                    echo $fila["nombre"];
                    echo "<br>";
                    echo $fila["apellidos"];
                    echo "<br>";
                    echo $fila["telefono"];
                    echo "<br>";
                    // En la siguiente linea creamos un enlace a la página actualizar.php y le pasamos por GET el id del elemento.
                    echo "<a href='actualizar.php?id=".$fila["id"]."'>Modificar</a>";
                    echo "<br>";
                    echo "<br>";
                }        
            }else{
                echo "Sin resultados";
            }
        ?>
    </body>
</html>