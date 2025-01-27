<!DOCTYPE html>
<html lang="en">
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
        - Importe solicitado (input de tipo texto).
        - Nº de años (input de tipo radio con 3 opciones "1", "2" y "3").
        - Tipo de interes (Select con 3 opciones "15%", "10%" y "5%".

        En la página del action haz que se muestre el siguiente mensaje:

        Hola (nombre y apellidos) a continuación le detallamos la información de su préstamo:
        Importe solicitado: (valor del importe solicitado).
        Nº de cuotas: (calcular en función del número de años marcados por el usuario).
        Tipo de interés: (valor del tipo de interés marcados por el usuario).
        Importe de cada cuota: (calcular en función del importe, tipo de interés y número de cuotas).

        *Para este ejercicio vamos a calcular el interés como un tipo fijo para el total del importe solicitado.
    -->

    <body>
    <h2>Ejercicio 08</h2>
    <h1>Solicitud de Préstamo</h1>
    <form action="../ej08/action.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="importe">Importe solicitado:</label>
        <input type="text" id="importe" name="importe" required><br><br>

        <label>Nº de años:</label><br>
        <input type="radio" id="1anio" name="anios" value="1" required>
        <label for="1anio">1</label><br>
        <input type="radio" id="2anios" name="anios" value="2" required>
        <label for="2anios">2</label><br>
        <input type="radio" id="3anios" name="anios" value="3" required>
        <label for="3anios">3</label><br><br>

        <label for="interes">Tipo de interés:</label>
        <select id="interes" name="interes" required>
            <option value="0.15">15%</option>
            <option value="0.10">10%</option>
            <option value="0.05">5%</option>
        </select><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</body>
</html>