<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <h1 class="my-4">Selecciona tu personaje de Marvel favorito (50 primeros)</h1>
                <form action="datos.php" method="post">
                    <div class="form-group">
                        <label for="personajes">Personajes</label>
                        <select class="form-control" name="personajes">
                            <?php
                            $public_key = "23562f9128939335616e500b123d3704";
                            $private_key = "5af2968a2bd887587ac89319db2b769a9af56511";
                            $ts = time();
                            $hash = md5($ts . $private_key . $public_key);

                            $url = "https://gateway.marvel.com/v1/public/characters?limit=50&ts=$ts&apikey=$public_key&hash=$hash";

                            $personajes = json_decode(file_get_contents($url), true);


                            foreach ($personajes["data"]["results"] as $personaje) {
                                echo "<option value='" . $personaje["id"] . "'>" . $personaje["name"] . "</option>";
                            } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


</body>

</html>