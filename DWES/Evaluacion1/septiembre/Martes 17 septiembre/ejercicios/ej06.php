<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--
        $mayor_edad = 18;
        $edad_juan = 20;
        $edad_ana = 17;
        $edad_luis = 18;

        Comprueba utilizando 3 if distintos si Juan, Ana y Luis son mayores de edad.
        En caso de ser mayores de edad muestra el mensaje "Es mayor de edad" en caso de ser menor muestra el mensaje "Es menor de edad".
    -->

    <?php
    $mayor_edad = 18;
    $juan = 'Juan';
    $edad_juan = 20;
    $ana = 'Ana';
    $edad_ana = 17;
    $luis = 'Luis';
    $edad_luis = 18;

    if ($edad_juan > $mayor_edad) {
        echo "<p>- ". $juan . " con " . $edad_juan. " años, es mayor de edad</p>";
    } else {
        echo "<p>- ". $juan . " con " . $edad_juan. " años, no es mayor de edad</p>";
    }

    if ($edad_ana > $mayor_edad) {
        echo "<p>- ". $ana . " con " . $edad_ana. " años, es mayor de edad</p>";
    } else {
        echo "<p>- ". $ana . " con " . $edad_ana. " años, no es mayor de edad</p>";
    }

    if ($edad_luis >= $mayor_edad) {
        echo "<p>- ". $luis . " con " . $edad_luis. " años, es mayor de edad</p>";
    } else {
        echo "<p>- ". $luis . " con " . $edad_luis. " años, no es mayor de edad</p>";
    }
    ?>
</body>

</html>