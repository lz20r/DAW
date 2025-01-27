<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        html {
            font-family: 'Times New Roman', Times, serif;
        }

        p {
            font-size: 20px;
            font-weight: bold;
        }  
    </style>
</head>

<body>
    <!--
        1º) Crear una matriz con 4 elementos.

        2º) Muestra el segundo elemento de la matriz.

        3º) Añade al final otro elemento y muéstralo.

        4º) Cambiar el valor del primer elemento de la matriz.

        5º) Muestra cuantos elementos contiene el array.

        6º) Recorre el array con un foreach o un for y muestra todos los elementos ordenados alfabéticamente.
    -->

    <?php
    echo "<p> 1º) Crear una matriz con 4 elementos. </p>";
    $array = array("París", "Londres", "Roma", "Madrid"); 
    print_r($array) . "<br>"; 

    echo "<p> 2º) Muestra el segundo elemento de la matriz. </p>";
    echo "El segundo elemento es: " . $array[1] . "<br>";
 
    echo "<p> 3º) Añade al final otro elemento y muéstralo. </p>";
    $array[] = "Berlín";
    echo "El último elemento es: " . $array[4] . "<br>";

    echo "<p> 4º) Cambiar el valor del primer elemento de la matriz. </p>";
    echo "El primer elemento antes de cambiar es: " . $array[0] . "<br>"; 
    $array[0] = "Tokio";
    echo "El primer elemento después de cambiar es: " . $array[0] . "<br>";


    echo "<p> 5º) Muestra cuantos elementos contiene el array. </p>";
    echo "El array contiene " . count($array) . " elementos. <br>";


    echo "<p> 6º) Recorre el array con un foreach o un for y muestra todos los elementos ordenados alfabéticamente. </p>";
    echo "La matriz original es: ";
    for ($i = 0; $i < count($array); $i++) {
        echo $array[$i] . ", ";
    }
    echo "<br>";
    
    echo "La matriz ordenada alfabéticamente es: ";
    sort($array);
    foreach ($array as $elemento) {
        echo $elemento .  ", ";
    } 
    echo "<br>";
    ?>
</body>

</html>