<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>

<?php include "../includes/conexion.php"; ?>
<?php include "../includes/nav.php"; ?>

<body class="text-center" style="background-color: rgba(78,130,219,0.07);">
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form method="POST" action="login2.php">
                    <img class="my-5 img-fluid" src="../img/logobg.png" style="width:400px;">
                    <h1 class="h3 mb-3 fw-normal">Login</h1>
                    <div>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div>
                        <input type="password" class="form-control mt-3" id="Password" name="password" placeholder="Contraseña">
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Entrar</button>
                </form>

                <div class="text-center mt-3">
                    <a href="register.php">¿No tienes cuenta? Regístrate</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<?php include "../includes/footer.php"; ?>

</html>