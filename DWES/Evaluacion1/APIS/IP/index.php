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
            <div class="col-6">
                <h1 class="text-center my-5">Vamos a comprobar una IP</h1>
                <form method="POST" action="datos.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="ip" class="form-label">Dirección IPv4 o IPv6</label>
                        <input type="text" class="form-control" id="ip" name="ip" placeholder="XXX.XXX.XXX.XXX">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Comprobar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</body>

</html>