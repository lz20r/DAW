<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <!--
        Crea un formulario que solicite al usuario los siguientes campos:
        - Nombre (input de tipo texto).
        - Apellidos (input de tipo texto).
        - Edad (select con valores entre 15 y 30).

        En la página del action haz que se muestren los siguientes mensajes en un <h1>.

        1) Si el usuario es menor de edad.
        "Hola (nombre y apellidos), lo sentimos pero este sitio web es solo para mayores de 18 años.

        2) Si el usuario es mayor de edad.
        "Hola (nombre y apellidos), bienvenido a la web de CDM FP.
    -->

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h2>Ejercicio 07</h2>
    <h1>Formulario de Registro</h1>
    <form action="../ej07/action.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="edad">Edad:</label>
        <select id="edad" name="edad" required>
            <option value="">Selecciona tu edad</option> 
            <?php for ($i = 15; $i <= 30; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form> 
</body>
</html>