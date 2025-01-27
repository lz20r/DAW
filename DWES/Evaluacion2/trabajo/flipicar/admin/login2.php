<?php
if (isset($_POST["g-recaptcha-response"])) {
    // Clave secreta de ReCaptcha
    $secret = "6LefYp8qAAAAAEiSE1BPZUcZ80kw3C9ceQbsNi-Y";
    // Guardamos la respuesta que nos envía Recaptcha por POST
    $response = $_POST['g-recaptcha-response'];
    // Guardamos la IP del usuario
    $ip = $_SERVER['REMOTE_ADDR'];
    // Url de verificación de ReCaptcha
    $url = "https://www.google.com/recaptcha/api/siteverify";
    // Le pasamos a Recaptcha todos los parámetros necesarios para que nos diga si el usuario es legítimo o no (es un JSON)
    $finalResponse = file_get_contents($url . "?secret=" . $secret . "&response=" . $response . "&remoteip=" . $ip);
    // Decodificamos el JSON
    $jsonResponse = json_decode($finalResponse);
    // Comprobamos si el JSON devuelve success. En caso de success podemos continuar con el login, en caso contrario se trata de un bot y no hacemos el login
    if ($jsonResponse->success) {
        session_start();
        include "../include/conexion.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT id, email, password FROM clientes WHERE email = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $fila = $result->fetch_assoc();

                if (password_verify($password, $fila['password'])) {

                    $_SESSION['id'] = $fila['id'];
                    $_SESSION['email'] = $fila['email'];

                    // Comprobamos si el usuario es el admin
                    if ($fila['email'] == "adminFlipicar@gmail.com") {
                        // Redirigir a un índice diferente para el admin
                        header("Location: ../admin/index.php");
                    } else {
                        // Redirigir al índice estándar
                        header("Location: ../cliente/index.php");
                    }
                } else {
                    $error_message = "Contraseña incorrecta.";
                }
            } else {
                $error_message = "Usuario no encontrado.";
            }
            $stmt->close();
        }
        if (isset($error_message)) {
            echo "<div class='alert alert-danger'>$error_message</div>";
        }
    }
}
?>

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
        function validacionRecaptcha() {
            let response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('aviso_captcha').style.display = "block";
                return false;
            }
        }
    </script>
    <?php include "../include/footer.php"; ?>

</body>

</html>