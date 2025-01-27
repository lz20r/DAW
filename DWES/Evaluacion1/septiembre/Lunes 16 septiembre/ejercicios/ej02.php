<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 
        Ej 1: Crea una variable llamada "mitexto" con el texto "Me gusta mucho ir a pasear al parque los domingos cuando no hay gente"

        1º) Muestra la variable "mitexto" transformada a mayúsculas dentro de un párrafo.
        2º) Muestra la variable "mitexto" cambiando todas las "a" por "e".
        3º) Crea una variable "color" y guarda en ella el color CSS #FF0044
        4º) Muestra la variable "mitexto" en un párrafo cuyo color sea el de la variable "color".

        *Pista para el 4º: El CSS no puede ir en una hoja externa.
    -->
    <?php
    echo "<p>strtoupper</p>";
    $mitexto = 'Me gusta mucho ir a pasear al parque los domingos cuando no hay gente';
    echo strtoupper($mitexto);
    ?>
</body>
</html>