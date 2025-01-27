<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
        1º) Crea una variable llamada "email" que contenga una dirección de correo electrónico real.
        2º) Muestra la posición en la que se encuentra la arroba.
    -->
    <?php 
        $email = "zhiyaonaiara@gmail.com";  
        $arroba = strpos($email, '@'); 
        echo "La posición de la arroba en el correo es: $arroba";
    ?>
</body>
</html>