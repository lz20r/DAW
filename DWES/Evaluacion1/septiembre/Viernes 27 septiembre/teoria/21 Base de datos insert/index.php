<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insertar datos en SQL</title>
    </head>
    <body>
        <form action="insertar.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" value="">
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" value="">
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>