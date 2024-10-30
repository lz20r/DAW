<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<title>API El tiempo</title>
</head>

<body>
    <?php
    $peticion = curl_init();

    curl_setopt($peticion, CURLOPT_URL, 'https://restcountries.com/v3.1/all');
    curl_setopt($peticion, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($peticion);
    curl_close($peticion);
    ?>
    <?php
    $paises = json_decode($respuesta, true);
    echo "<h2>Lista de paises</h2>";
    echo "<ul>";
    foreach ($paises as $pais) {
        echo "<img src='" . $pais["flags"]["png"] . "' class='card-img-top' alt='" . $pais["name"]["common"] . "'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $pais["name"]["common"] . "</h5>";

        echo "</div>";
    }

    ?>
</body>

</html>