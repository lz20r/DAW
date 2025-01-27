<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Funciones numéricas PHP</title>
    </head>
    <body>
        <h1>Funciones numéricas en PHP</h1>
        <?php
            //Las siguientes funciones las podemos utilizar siempre que operemos números.
            
            $numeroBien = 2; //Para PHP esto es un número.
            $numeroMal = "2"; //Para PHP esto es un texto y no podrá operar con él.
            
            $numero1 = 2.4;
            $numero2 = -5;
            $numero3 = 10;
            $numero4 = 3;

            //Redondea a la unidad. Si el valor del decimal es 5 o superior redondea hacia arriba si es menor hacia abajo.
            echo "<strong>round: </strong>";
            echo round($numero1);
            echo "<br>";

            //Redondea al número entero superior (independientemente de los decimales).
            echo "<strong>ceil: </strong>";
            echo ceil($numero1);
            echo "<br>";

            //Redondea al número enteror inferior (independientemente de los decimales).
            echo "<strong>floor: </strong>";
            echo floor($numero1);
            echo "<br>";

            //Obtenemos el valor absoluto de un número (eliminamos el "-" en números negativos).
            echo "<strong>abs: </strong>";
            echo abs($numero2);
            echo "<br>";

            /*
            Eleva al exponente. Tiene 2 argumentos:
            1º) Base a emplear.
            2º) Exponente.
            */
            echo "<strong>pow: </strong>";
            echo pow($numero1,$numero3);
            echo "<br>";

            //Raiz cuadrada de un número
            echo "<strong>sqrt: </strong>";
            echo sqrt($numero3);
            echo "<br>";

            /*
            Devuelve el resto o residuo de una división. Tiene 2 argumentos:
            1º) Dividendo.
            2º) Divisor.
            */
            echo "<strong>fmod: </strong>";
            echo fmod($numero3,$numero4);
            echo "<br>";

            //Muestra un número aleatorio entre el primer argumento y el segundo.
            echo "<strong>rand: </strong>";
            echo rand($numero1,$numero3);
            echo "<br>";

            //Muestra el número mayor entre los que pasemos por argumentos (mínimo 2 argumentos).
            echo "<strong>max: </strong>";
            echo max($numero1,$numero2,$numero3,$numero4);
            echo "<br>";

            //Muestra el número menor entre los que pasemos por argumentos (mínimo 2 argumentos).
            echo "<strong>min: </strong>";
            echo min($numero1,$numero2,$numero3,$numero4);
            echo "<br>";

            
        ?>
    </body>
</html>