<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
        1º) Crea 3 variables de tipo número:
        - La primera con valor 10.
        - La segunda con valor 15.
        - La tercera con valor 20.

        2º) Muestra una lista desordenada que diga:
        - El valor de mi primera variable es: (valor de la primera variable).
        - El valor de mi segunda variable es: (valor de la segunda variable).
        - El valor de mi tercera variable es: (valor de la tercera variable).
        - La suma de mis variables es: (valor de la suma).
        - La multiplicación de mis variables es: (valor de la multiplicación).

        3º) Incrementa el valor de la segunda variable en 1 y muéstralo en un párrafo.
    -->

    <?php 
        $primera = 10;
        $segunda = 15;
        $tercera = 20; 
        echo "<ul>";
        echo "<li>El valor de mi primera variable es: $primera</li>";
        echo "<li>El valor de mi segunda variable es: $segunda</li>";
        echo "<li>El valor de mi tercera variable es: $tercera</li>";
        $suma = $primera + $segunda + $tercera;
        $multiplicacion = $primera * $segunda * $tercera;

        echo "<li>La suma de mis variables es: $suma</li>";
        echo "<li>La multiplicación de mis variables es: $multiplicacion</li>";
        echo "</ul>";

        // 3º) Incrementar el valor de la segunda variable en 1 y mostrarlo
        $segunda++;
        echo "<p>El nuevo valor de mi segunda variable es: $segunda</p>";
    ?>
</body>
</html>