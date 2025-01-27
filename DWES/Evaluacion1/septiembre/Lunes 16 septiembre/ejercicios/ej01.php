<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 
        1º) Crea 3 variables, la primera con un nombre, la segunda con un apellido y la tercera con el texto "Hola me llamo".
        2º) Usando concatenación haz que aparezca en un h1 el texto "Hola me llamo (valor de la variable nombre) (valor de la variable apellido)".
    -->
    <?php
    $nombre = 'Naiara Zhiyao';
    $apellido = 'Lezameta Rodrigo';
    $frase = 'Hola me llamo';

    echo "<h1>" . $frase . " " . $nombre . " " . $apellido . "</h1>";
    ?>
</body>

</html>