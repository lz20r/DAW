<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Variables en PHP</title>
    </head>
    <body>
        <!-- Una variable es un espacio de la memoria en el que vamos a guardar un valor susceptible de variar -->
        <?php
            // En PHP crearemos variables con el simbolo $ y a continuación el nombre de la variable.
            // Una variable no puede empezar por un número ni contener espacios, acentos, ni caracteres especiales como la ñ.
            // Las variables son sensibles a mayúsculas y minúsculas.
            $numero = 5;
            $Numero = 7;
            echo $numero; //En este caso solo mostramos el valor de la variable por lo que no abrimos comillas en el echo ya que no vamos a pintar HTML.
            echo "<br>"; // Aquí pintamos un <br> en HTML por lo que debemos entrecomillar dicha etiqueta.
            echo $Numero;
            echo "<br>";
        
            // Cuando creamos variables con nombres largos se suele utilizar CamelCase (notación camello) para mejorar la legibilidad de las mismas.
            $variableLargaPeroFacilDeLeer = 10;

            // Cuando creamos una variable de tipo texto su valor debe ir entre comillas.
            $nombre = "CDM";
            echo $nombre;
            echo "<br>";

            // Podemos reescribir una variable del mismo modo que la creamos.
            $nombre = "FP";
            echo $nombre;
        ?>
        
    </body>
</html>