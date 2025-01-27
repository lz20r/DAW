<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 
        1º) Crea 3 variables de tipo numero:
        - La primera con un número entero.
        - La segunda con un número con decimales.
        - La tercera con un número random entre el 1 y el 100.

        2º) Muestra en distintos "echo":
        - El número con decimales redondeado hacia arriba.
        - El número con decimales redondeado hacia abajo.
        - El número random elevado a 3.
        - La raíz cuadrada de la suma de los 3 números.
    -->

    <?php 
        $entero = 4;  
        $decimal = 5.51;  
        $random = rand(1, 100);  
        echo "- El número con decimales redondeado hacia arriba: " . ceil($decimal) . "<br>";
        echo "- El número con decimales redondeado hacia abajo: " . floor($decimal) . "<br>";
        echo "- El número random elevado a 3: " . pow($random, 3) . "<br>";
        $suma = $entero + $decimal + $random;
        echo "- La raíz cuadrada de la suma de los 3 números: " . sqrt($suma) . "<br>";
    ?>
</body>
</html>