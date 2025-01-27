<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API Marvel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    $public_key = "23562f9128939335616e500b123d3704";
    $private_key = "5af2968a2bd887587ac89319db2b769a9af56511";
    $ts = time();
    $hash = md5($ts . $private_key . $public_key);

    $url = "https://gateway.marvel.com/v1/public/characters?limit=50&ts=$ts&apikey=$public_key&hash=$hash";

    $json = file_get_contents($url);
    $datos = json_decode($json, true);
    $personajes = $datos["data"]["results"];
    ?>

    <h1 class="text-center mt-5">Personajes de Marvel</h1>
    <hr>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personajes as $personaje) { ?>
                <tr>
                    <th scope="row"><?= $personaje["id"] ?></th>
                    <td><?= $personaje["name"] ?></td>
                    <td><?= $personaje["description"] ?></td>
                    <td><img src="<?= $personaje["thumbnail"]["path"] ?>.<?= $personaje["thumbnail"]["extension"] ?>"
                            alt="<?= $personaje["name"] ?>" width="100"></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>