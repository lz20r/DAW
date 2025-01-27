<?php include "includes/database/conexion.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            display: block;
        }

        input,
        textarea {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <form action="procesar.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="mensaje">Mensaje</label>
        <textarea name="mensaje" id="mensaje" cols="30" rows="10" required></textarea>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>