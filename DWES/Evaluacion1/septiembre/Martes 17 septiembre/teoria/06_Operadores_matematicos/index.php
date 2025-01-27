<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Funciones numéricas PHP</title>
    </head>
    <body>
        <h1>Operadores matemáticos en PHP</h1>
        <?php
            
            //Creo 2 variables para operar con ellas.
            $numero1 = 10;
            $numero2 = 4;

            //Suma
            echo "Suma: ";
            echo $numero1 + $numero2;
            echo "<br>";

            //Resta
            echo "Resta: ";
            echo $numero1 - $numero2;
            echo "<br>";

             //Multiplicación
            echo "Multiplicación: ";
            echo $numero1 * $numero2;
            echo "<br>";

            //División
            echo "División: ";
            echo $numero1 / $numero2;
            echo "<br>";

            //Módulo (el resto de la división)
            echo "Módulo: ";
            echo $numero1 % $numero2;
            echo "<br>";

            //Exponenciación
            echo "Exponenciación: ";
            echo $numero1 ** $numero2;
            echo "<br>";

            //Podemos incrementar en 1 el valor de nuestra variable de la siguiente manera:
            echo "Incremento en 1: ";
            $numero1++;
            echo $numero1;
            echo "<br>";

            //Podemos decrementar en 1 el valor de nuestra variable de la siguiente manera:
            echo "Decremento en 1: ";
            $numero1--;
            echo $numero1;
            echo "<br>";

            //Además podemos guardar el valor de estas operaciones en variables:
            $suma = $numero1 + $numero2;
            echo "Suma de ambas variables: ";
            echo $suma; //Si el valor de las variables $numero1 o $numero2 cambia también afectará a la variable $suma.
            
        ?>
    </body>
</html>