<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--
        Crear un formulario solicitando al usuario:
        Usuario (input de tipo texto).
        Contraseña (input de tipo password).

        En la página del action comprobar si el usuario y la contraseña son correctos respecto a los siguientes:

        Usuario 1: alumno
        Contraseña: megustalaprogramacion

        Usuario 2: profesor
        Contraseña: megustadarclase

        En caso de que la autenticación sea correcta mostrar el mensaje "Bienvenido (nombre usuario)" en caso de incorrecta mostrar el mensaje "Acceso denegado" y un enlace para volver atrás.
    -->

    <h1>Inicio de Sesión</h1>
    <form action="../ej09/action.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Iniciar Sesión">
    </form> 
</body>

</html> 