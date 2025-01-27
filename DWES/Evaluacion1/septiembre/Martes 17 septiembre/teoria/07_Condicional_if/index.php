<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Condicional if</title>
    </head>
    <body>
        <?php
            // En PHP existen una serie de instrucciones que permiten tomar decisiones lógicas cuando programamos: estas instrucciones, comunes a distintos lenguajes de programación, se suelen denominar de forma general "condicionales".
            
            // Para crear una condicional en PHP utilizaremos el "if" y el "else" de la siguiente manera.
            
            // Estructura básica de un if: 
            /*
            if(condicion a comprobar){código que se ejecuta si la condición es verdadera}else{código que se ejecuta si la condición es falsa}
            */
            
            // Creo variables para utilizar de ejemplo.
            $a = 2;
            $b = 4;
            $c = 6;
            $d = 8;
            $e = "8";

            // Muestro las variables al inicio de la página para visualizar más fácilmente la explicación.
            echo "Valor de A: ".$a;
            echo "<br>";
            echo "Valor de B: ".$b;
            echo "<br>";
            echo "Valor de C: ".$c;
            echo "<br>";
            echo "Valor de D: ".$d;
            echo "<br>";
            echo "Valor de E: ".$e;
            echo "<hr>";
        ?>
        
        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <h1>Vamos a comprobar si A es mayor que B</h1>
        <?php
            if ($a > $b){ // Compruebo la condición $a mayor que $b. Si se cumple (es verdadero) se ejecutará la parte del código que está antes del "else".
                echo "<h2>Verdadero</h2>";
            }else{ // Si la condición anterior no se cumple (es falso) Se ejecutará el siguiente código.
                echo "<h2>Falso</h2>";
            }
        ?>
        <hr>
        
        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <h1>Vamos a comprobar si A es menor que B y C es menor que D</h1>
        <?php
            if ($a < $b AND $c < $d){ // Con el operador AND (también expresado como "&&") indicamos que tienen que cumplirse las dos condiciones para considerar la condición como verdadera. Si cualquiera todas las condiciones son verdaderas se ejecutará el siguiente código.
                echo "<h2>Verdadero</h2>";
            }else{ // Si alguna de las condiciones no se cumple se ejecutará el siguiente código.
                echo "<h2>Falso</h2>";
            }
        ?>
        <hr>

        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <h1>Vamos a comprobar si A es menor que B o C es menor que D</h1>
        <?php
            if ($a < $b OR $c > $d){ // Con el operador OR (también expresado como "||") indicamos que tiene que cumplirse al menos una de las condiciones para que devuelva verdadero y se ejecutará el siguiente código.
                echo "<h2>Verdadero</h2>";
            }else{ // Si ninguna de las condiciones se cumple se ejecutará el siguiente código.
                echo "<h2>Falso</h2>";
            }
        ?>
        <hr>

        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <h1>Vamos a comprobar si D (número) es igual que E (texto) a nivel de valor</h1>
        <?php
            if ($d == $e){ // Con el operador == comprobamos que las variables son iguales a nivel de valor. En caso de ser iguales se ejecutará el siguiente código.
                echo "<h2>Verdadero</h2>";
            }else{ // En caso de ser distintas se ejecutará el siguiente código.
                echo "<h2>Falso</h2>";
            }
        ?>
        <hr>

        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <h1>Vamos a comprobar si D (número) es igual que E (texto) a nivel de valor y tipo</h1>
        <?php
            if ($d === $e){ // Con el operador === comprobamos que las variables son iguales a nivel de valor y tipo. En caso de ser iguales se ejecutará el siguiente código.
                echo "<h2>Verdadero</h2>";
            }else{ // En caso de ser distintas se ejecutará el siguiente código.
                echo "<h2>Falso</h2>";
            }
        ?>
        <hr>

        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <h1>Vamos a comprobar si D (número) es distinto que E (texto) a nivel de valor</h1>
        <?php
            if ($d != $e){ // Con el operador != comprobamos que las variables sean distintas a nivel de valor. En caso de ser distintas se ejecutará el siguiente código.
                echo "<h2>Verdadero</h2>";
            }else{ // En caso de NO ser distintas se ejecutará el siguiente código.
                echo "<h2>Falso</h2>";
            }
        ?>
        <hr>

        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <h1>Vamos a comprobar si D (número) es distinto que E (texto) a nivel de valor y tipo</h1>
        <?php
            if ($d !== $e){ // Con el operador !== comprobamos que las variables sean distintas a nivel de valor y tipo. En caso de ser distintas se ejecutará el siguiente código.
                echo "<h2>Verdadero</h2>";
            }else{ // En caso de NO ser distintas se ejecutará el siguiente código.
                echo "<h2>Falso</h2>";
            }
        ?>
        <hr>

        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <h1>If sin else</h1>
        <?php
            if ($a < $b){ // Podemos crear una condicional if sin necesidad de else si no queremos ejecutar ningún código en caso de que la condición sea falsa.
                echo "<h2>A es menor que B</h2>";
            }
        ?>
        <hr>

    </body>
</html>