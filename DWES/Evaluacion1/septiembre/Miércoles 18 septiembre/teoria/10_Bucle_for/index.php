<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bucle for</title>
    </head>
    <body>
        <?php
            // El bucle for nos permite hacer una iteración mientras se cumpla una condición.
            // La primera expresión "$i = 1" es la creación de la variable. Es ejecutada una vez al comienzo del bucle.
            // La segunda expresión "$i <= 10" se evalua en cada iteración, si devuelve true el bucle realiza una iteración en caso contrario para.
            // La tercera expresión "$i++" se ejecuta al final de cada iteración.

            for($i = 1; $i <= 10; $i++){ // En este ejemplo recorreremos el bucle un total de 10 veces.
                echo $i;
                echo "<br>";
            }
        ?>
    </body>
</html>