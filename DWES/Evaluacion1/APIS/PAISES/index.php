<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API Rest Countries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col-12 py-4">
                <h1>Todos los paises del mundo</h1>
            </div>

            <div class="container">
                <div class="row my-5">
                    <?php
                    $url = "https://restcountries.com/v3.1/all";
                    $json = file_get_contents($url);
                    $paises = json_decode($json, true);

                    foreach ($paises as $pais) {
                        $nombre = $pais["name"]["common"];
                        $bandera = $pais["flags"]["png"];
                        $capital = $pais["capital"][0] ?? 'N/A';
                        $tld = $pais["tld"][0] ?? 'N/A';

                        echo "<div class='col-12 col-md-6 col-lg-3 border p-2 text-center'>
                            <h2 class='text-center-pt5'>$nombre</h2>
                            <img src='$bandera' alt='$nombre' class='img-fluid'> 
                            <h6>Capital: $capital</h6>
                            <h6>Región: $tld</h6>
                            <h6>Idiomas oficiales:</h6>
                            <ul class='list-group'>";

                        // Mostrar cada idioma en un elemento <li>
                        if (isset($pais["languages"])) {
                            foreach ($pais["languages"] as $language) {
                                echo "<li class='list-group-item'>$language</li>";
                            }
                        } else {
                            echo "<li class='list-group-item'>No disponible</li>";
                        }

                        echo "</ul></div>";
                    }
                    ?>
                </div>
            </div>

            <div class="col-12- border bg-light py-3">
                <p>
                    Idiomas oficiales: <?php echo count($paises); ?>
                </p>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>