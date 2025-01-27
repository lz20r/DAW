<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick And Morty API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
        .pagination .page-link {
            color: #198754;
        }

        .pagination .page-link:hover {
            background-color: #198754;
            color: #fff;
        }

        .pagination .active .page-link {
            background-color: #198754;
            border-color: #198754;
            color: #fff;
        }
    </style>
    }
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
        <div class="row my-3">
            <div class="col-12 text-center my-3 bg-success-subtle">
                <h1>Todos los personajes</h1>
            </div>

            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 1;

            $url = "https://rickandmortyapi.com/api/character?page=$page";
            $json = file_get_contents($url);
            $personajes = json_decode($json, true);

            // Mostrar personajes de la página actual
            foreach ($personajes["results"] as $personaje) {
                $id = $personaje["id"];
                $imagen = $personaje["image"];
                $nombre = $personaje["name"];

                echo "<div class='col-12 col-md-6 col-lg-3'>
                        <div class='card my-4'>
                            <h4 class='card-header text-center'>$nombre</h4>
                            <img src='$imagen' class='card-img-top' alt='$nombre'>
                            <div class='card-body text-center'>
                                <a href='personaje.php?id=$id' class='btn btn-success'>Ver personaje</a>
                            </div>
                        </div>
                    </div>";
            }

            $totalPages = $personajes["info"]["pages"];
            ?>
            <div class="col-12 text-center my-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php
                        $pagesPerBlock = 10;

                        $currentBlock = ceil($page / $pagesPerBlock);

                        $start = ($currentBlock - 1) * $pagesPerBlock + 1;
                        $end = min($totalPages, $currentBlock * $pagesPerBlock);
                        if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link btn-outline-success" href="?page=<?php echo $page - 1; ?>">Anterior</a>
                            </li>
                        <?php endif;

                        for ($i = $start; $i <= $end; $i++): ?>
                            <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                <a class="page-link btn-outline-success"
                                    href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor;

                        if ($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link btn-outline-success" href="?page=<?php echo $page + 1; ?>">Siguiente</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>