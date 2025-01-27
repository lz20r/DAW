<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Echo en PHP</title>
    </head>
    <body>
        
        <!-- Etiquetas de apertura y cierre de PHP -->
        <?php
            /* Aquí insertamos código PHP */
        ?> 
        
        <!-- Todas las instrucciones en PHP terminan con punto y coma ; -->
        <!-- Con el comando echo podemos "pintar" HTML dentro del código PHP -->
        
        <?php
        
            echo "<h1>Esto es una cabecera</h1>";
        
            echo "<p>Esto es un párrafo.</p>";
        
            /* Comentario multilinea 
            en PHP */
            
            // Comentario de línea en PHP
        
            echo "<img src='https://via.placeholder.com/150' alt='imagen aleatoria'>"; // Cuando abrimos el echo con comillas dobles tenemos que utilizar comillas simples en el HTML o viceversa.
        
        ?>
    </body>
</html>