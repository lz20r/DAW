<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Funciones de texto en PHP</title>
    </head>
    <body>
        <h1>Funciones de texto en PHP</h1>
        <?php
            //Las siguientes funciones las podemos utilizar siempre que operemos con un string (cadena de texto).
            
            // Creamos una variable con un texto para utilizar de ejemplo.
            $ejemplo = "esto Es un texto De Ejemplo";

            //Transforma el texto a minúsculas.
            echo "<strong>strtolower: </strong>";
            echo strtolower($ejemplo);
            echo "<br>";

            //Transforma el texto a mayúsculas.
            echo "<strong>strtoupper: </strong>";
            echo strtoupper($ejemplo);
            echo "<br>";

            //Primera letra de cada palabra en mayúscula.
            echo "<strong>ucwords: </strong>";
            echo ucwords($ejemplo); 
            echo "<br>";

            //Primera letra de la cadena de texto en mayúscula. El resto de caracteres los mostrará tal y como estén (mayúsculas o minúsculas).
            echo "<strong>ucfirst: </strong>";
            echo ucfirst($ejemplo); 
            echo "<br>";

            //Elimina los espacios sobrantes del principio y final de la cadena (Se utiliza en bases de datos).
            echo "<strong>trim: </strong>";
            echo trim($ejemplo); 
            echo "<br>";

            /*
            Repite el texto el número de veces que le indiquemos. Esta función tiene dos argumentos separados por una coma:
            1º) El texto que vamos a repetir.
            2º) El número de repeticiones.
            */
            echo "<strong>str_repeat: </strong>";
            echo str_repeat($ejemplo,2); 
            echo "<br>";

            /*
            Remplaza un texto dentro de otro. Esta función tiene 3 argumentos:
            1º) Texto buscado. 
            2º) Texto por el que se quiere reemplazar. 
            3º) Texto donde vamos a buscar. 
            ¡Sensible a mayúsculas y minúsculas!
            */
            echo "<strong>str_replace: </strong>";
            echo str_replace("esto","CASA",$ejemplo); 
            echo "<br>";

            /*
            Extrae parte de un texto. Tiene 3 argumentos:
            1º) Texto del que se va a extraer. 
            2º) Posición desde la que se empieza a extraer (el primer caracter es la posición "0"). 
            3º) Cantidad de caracteres a extraer (si no se pone este argumento extraerá hasta el final de la cadena de texto).
            */
            echo "<strong>substr: </strong>";
            echo substr($ejemplo,2,10);
            echo "<br>";

            //Indica el número de caractéres que tiene una cadena de texto (contando espacios).
            echo "<strong>strlen: </strong>";
            echo strlen($ejemplo);
            echo "<br>";

            /*
            Busca una cadena de texto dentro de otra y devuelve desde el texto buscado en adelante.
            Tiene 3 valores:
            1º) Texto en el que buscamos.
            2º) Texto buscado.
            3º) Con valor true no incluye el texto buscado, con valor false lo incluye (opcional, por defecto false).
            */
            echo "<strong>strstr: </strong>";
            echo strstr($ejemplo,"texto",false);
            echo "<br>";

            /*
            Indica la posición de un caracter. Puede tener 3 argumentos:
            1º) Texto en el que buscamos.
            2º) Texto buscado.
            3º) Posición desde la que empezamos a buscar (opcional).
            ¡Sensible a mayúsculas y minúsculas!
            */
            echo "<strong>strpos: </strong>";
            echo strpos($ejemplo,"De", 0);
            echo "<br>";
        ?>
    </body>
</html>