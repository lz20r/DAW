<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API IP WHOIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 my-5">
                <?php
                $ip = $_POST["ip"];
                $peticion = curl_init();
                curl_setopt($peticion, CURLOPT_URL, 'http://ip-api.com/json/' . $ip);
                curl_setopt($peticion, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($peticion);
                curl_close($peticion);
                ?>
                <?php
                $datos = json_decode($respuesta, true);
                ?>
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Datos de la IP</h1>
                        <p class="card-img"><img src="<?php echo $datos["flag"]; ?> " class="card-img-top"
                                alt=" Bandera"> </p>
                        <p class=" card-text">IP: <?php echo $ip; ?></p>
                        <p class="card-text">País: <?php echo $datos["country"]; ?></p>
                        <p class="card-text">Ciudad: <?php echo $datos["city"]; ?></p>
                        <div class='d-grid gap-2'><a href='index.php' class='btn btn-primary'>Volver</a></div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous">
            </script>
</body>

</html>

</html>