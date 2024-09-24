<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNI</title>
</head>

<body>
    <!--
    Crea un formulario que solicite al usuario su DNI como el de la imagen

    Imagen formulario

    Al pulsar en "Comprobar" valida si el DNI es correcto o no teniendo en cuenta lo siguiente:

    1º) El DNI debe tener 10 caracteres. En caso contrario mostrar un mensaje de "Formato incorrecto".

    2º) Debe funcionar con la letra en minúscula o mayúscula.

    3º) Para calcular la letra del DNI debemos obtener el resto de dividir el número del DNI entre 23 y esto nos indicará la posición en el siguiente orden:

    0-T
    1-R
    2-W
    3-A
    4-G
    5-M
    6-Y
    7-F
    8-P
    9-D
    10-X
    11-B
    12-N
    13-J
    14-Z
    15-S
    16-Q
    17-V
    18-H
    19-L
    20-C
    21-K
    22-E
    -->

    <form action="ej13.php" method="post">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" required>
        <input type="submit" value="Comprobar">
    </form>

    <?php
    $dniNumeros = array(
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
        '10', '11', '12', '13', '14', '15', '16', '17', '18', '19',
        '20', '21', '22'
    );

    $dniLetras = array(
        'T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D',
        'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L',
        'C', 'K', 'E'
    );
    ?>

</body>

</html>