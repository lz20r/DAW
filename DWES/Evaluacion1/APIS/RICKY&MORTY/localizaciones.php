<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick And Morty API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">API de Rick and Morty</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-bg-success mx-2" href="index.php">Personajes</a>
                    <a class="nav-link text-bg-success mx-2" href="localizaciones.php">Localizaciones</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="container">
            <div class="col-12 text-center my-3 bg-success-subtle">
                <h1>Todas las localizaciones</h1>
            </div>
            <div class="container">
                <div class="row my-5">
                    <?php
                    $url = "https://rickandmortyapi.com/api/location";
                    $json = file_get_contents($url);
                    $localizaciones = json_decode($json, true);

                    foreach ($localizaciones["results"] as $localizacion) {
                        $nombre = $localizacion["name"];
                        $tipo = $localizacion["type"];
                        $dimension = $localizacion["dimension"];
                        echo "<div class='col-12 col-md-6 col-lg-3 border p-2 text-center'>
                        <h6>Nombre de la localizacion: $nombre</h6>
                        <h6>Tipo: $tipo</h6>
                        <h6>Dimension: $dimension</h6>
                    </div>";
                    }
                    $totalPages = $localizaciones["info"]["pages"];
                    ?>
                </div>
                <div class="pagination justify-content-center">
                    <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $prev = $page - 1;
                    $next = $page + 1;

                    echo "<li class='page-item'><a class='page-link' href='localizaciones.php?page=$prev'>Anterior</a></li>";

                    echo "<li class='page-item'><a class='page-link' href='localizaciones.php?page=$next'>Siguiente</a></li>";

                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>