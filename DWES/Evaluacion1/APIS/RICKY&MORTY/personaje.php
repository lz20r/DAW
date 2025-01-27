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
        <div class="row my-3">
            <div class="col-12 text-center my-3 bg-success-subtle">
                <h1>API de Rick and Morty</h1>
            </div>

            <div class="container">
                <div class="row my-5">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $url = "https://rickandmortyapi.com/api/character/$id";
                        $json = file_get_contents($url);
                        $personaje = json_decode($json, true);

                        if ($personaje) {
                            $nombre = $personaje["name"];
                            $imagen = $personaje["image"];
                            $especie = $personaje["species"];
                            $genero = $personaje["gender"];
                            $origen = $personaje["origin"]["name"];
                            $ubicacion = $personaje["location"]["name"];
                            $estado = $personaje["status"];

                            echo "
                    <div class='col-7 col md-9 col-lg-4 mx-auto my-5'>
                        <h2 class='card-header text-center'>$nombre</h2>
                        <br> <br>
                        <img src='$imagen' class='card-img-top' alt='$nombre'>
                        <br><br>
                        <div class='card-body text-center'>
                            <h5><strong>Especie:</strong> $especie<h5>
                            <h5><strong>Género:</strong> $genero<h5>
                            <h5><strong>Origen:</strong> $origen<h5>
                            <h5><strong>Ubicación:</strong> $ubicacion<h5>
                            <h5><strong>Estado:</strong> $estado<h5>
                        </div>
                    </div> 

                    <button class='btn btn-success' onclick='history.go(-1);'>Volver</button>";
                        } else {
                            echo "<p>Personaje no encontrado.</p>";
                        }
                    } else {
                        echo "<p>ID de personaje no especificado.</p>";
                    }

                    ?>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous">
            </script>
</body>

</html>