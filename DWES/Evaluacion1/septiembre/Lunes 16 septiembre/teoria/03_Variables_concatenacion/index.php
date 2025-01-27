<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Variables en PHP Concatenación</title>
    </head>
    <body>
        <?php
            $nombre = "Antonio";
            $apellido = "Medina";
            // Podemos concatenar código HTML y PHP dentro de un echo utilizando el punto "." de la siguiente manera:
            echo "<p>Me llamo ".$nombre." y mi apellido es ".$apellido."</p>";
        ?>
        
        <!-- El orden en el que intercalamos PHP y HTML puede ser introduciendo HTML mediante un echo (ejemplo de arriba) o introduciendo PHP en el HTML (ejemplo de abajo) Pero el resultado es el mismo -->
        <p>Me llamo <?php echo $nombre; ?> y mi apellido es <?php echo $apellido; ?></p>
    </body>
</html>