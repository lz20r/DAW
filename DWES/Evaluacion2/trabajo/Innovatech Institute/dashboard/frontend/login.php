<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innovatech Institute - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../includes/assets/css/login.css">
    <link rel="icon" type="image/png" href="../../includes/assets/img/campus.png">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="login-container">
        <form method="POST" action="../backend/login.php" onsubmit="return validacionRecaptcha()">
            <a href="../../index.php">
                <img class="my-4 img-fluid" src="../../includes/assets/img/campus.png" alt="Logo Innovatech">
            </a>

            <h2 class="h3 mb-4 fw-bold">Acceso al Campus Virtual</h2>

            <div class="mb-3 d-flex gap-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="alumno" value="alumno" checked>
                    <label class="form-check-label" for="alumno">Alumno</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="profesor" value="profesor">
                    <label class="form-check-label" for="profesor">Profesor</label>
                </div>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Correo Electrónico" required autocomplete="current-email">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required autocomplete="current-password">
            </div>

            <div style="color:red; display:none;" id="aviso_captcha">Por favor, verifica el captcha.</div>

            <!-- reCAPTCHA -->
            <div class="g-recaptcha my-3" data-sitekey="6LefYp8qAAAAAI4qVfOZQpReniC6k4xmcdSNaoeD"></div>

            <button class="w-100 btn btn-lg btn-custom" type="submit">Entrar</button>
        </form>

        <p class="mt-3">¿No tienes cuenta? <a href="../../dashboard/frontend/register.php">Registrate ►</a></p>
        <p class="mt-3"><a href="recuperar.php">¿Olvidaste tu contraseña?</a></p>
    </div>

    <script>
        function validacionRecaptcha() {
            let response = grecaptcha.getResponse();
            if (response.length === 0) {
                document.getElementById('aviso_captcha').style.display = "block";
                return false; // Detiene el envío del formulario
            }
            return true;
        }
    </script>
</body>

</html>