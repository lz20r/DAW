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
            // Realizamos la consulta para mostrar los datos del registro que vamos a modificar. Para ello en la consulta usamos WHERE, de este modo restringimos el valor a el registro con ese id.
            $sql = "SELECT * FROM contactos WHERE id='$id'";
            $resultado = mysqli_query($mysqli, $sql);
            if (mysqli_num_rows($resultado)){
               while($fila = mysqli_fetch_assoc($resultado)){
        ?>
        <!-- También podríamos crear todo el formulario dentro de un echo a continuación del while -->
        <form method="POST" action="actualizar2.php">
            <!-- Creamos un input oculto con el valor del ID para arrastrarlo a actualizar2.php -->
            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $fila['apellidos']; ?>">
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $fila['telefono']; ?>">
            <input type="submit">
        </form>
        <?php
            // Cerramos las llaves del while y el if que hemos dejado abiertos más arriba.
               }
            }
        ?>
    </body>
</html>