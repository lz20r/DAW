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

    <!-- Cargar reCAPTCHA v3 -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

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
                <form method="POST" action="login2.php" id="login-form">
                    <img class="my-5 img-fluid" src="../assests/img/favicon.ico" style="width:200px;">
                    <h1 class="h3 mb-3 fw-normal">Login</h1>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control mt-3" id="Password" placeholder="Contraseña" name="password" required>
                    </div>
                     <!-- Mensaje a mostrar en caso de no superar el Captcha-->
                     <div style="color:red; display:none;" id="aviso_captcha">Por favor, verifique el captcha</div>
                        <!-- div con la clave pública del sitio -->
                        <div class="g-recaptcha my-3 " data-sitekey="6LefYp8qAAAAAI4qVfOZQpReniC6k4xmcdSNaoeD"></div>
                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Entrar</button>
                </form>
                <p class="mt-3">¿No tienes una cuenta? <a href="register.php">Crea una cuenta aquí</a>.</p>
            </div>
        </div>
    </div>
    <!-- VALIDACIÓN RECAPTCHA -->
        <script type="text/javascript">
            function validacionRecaptcha(){
                let response = grecaptcha.getResponse();
                if(response.length == 0){
                    document.getElementById('aviso_captcha').style.display = "block";
                    return false;
                } 
            }
        </script>
        <!-- FIN VALIDACIÓN RECAPTCHA-->
       
<?php include "../include/footer.php"; ?>
 
</body> 
</html>