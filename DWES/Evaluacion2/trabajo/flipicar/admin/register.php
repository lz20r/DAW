<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alquiler de Coches de Lujo - Flipicar</title>
    <!-- Estilos de Bootstrap y otros recursos -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>

<body class="text-center" style="background-color: rgba(78,130,219,0.07);">
    <?php
    // Conexión a la base de datos
    include "../include/conexion.php";
    include "../include/nav.php";
    include "../include/carrusel.php";
    ?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <!-- Formulario -->
                <form method="POST" action="nuevo_usuario2.php">
                    <img class="my-5 img-fluid" src="../assests/img/favicon.ico" style="width:200px;">
                    <h1 class="h3 mb-3 fw-normal">Crea tu cuenta</h1>

                    <!--nombre -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" required>
                    </div>

                    <!--número de teléfono -->
                    <div class="form-group">
                        <input type="tel" class="form-control" id="telefono" placeholder="Número de Teléfono" name="telefono" pattern="[0-9]{9}" required>
                    </div>

                    <!--email -->
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                    </div>

                    <!--contraseña -->
                    <div class="form-group">
                        <input type="password" class="form-control mt-3" id="password" placeholder="Contraseña" name="password" required>
                    </div>


                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Crear cuenta</button>
                </form>

                <p class="mt-3">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

<?php include "../include/footer.php"; ?>

</html>