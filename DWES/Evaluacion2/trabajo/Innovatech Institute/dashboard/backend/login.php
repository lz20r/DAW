<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el reCAPTCHA está presente
    if (isset($_POST["g-recaptcha-response"])) {
        $secretKey = "6LefYp8qAAAAAEiSE1BPZUcZ80kw3C9ceQbsNi-Y"; // Clave secreta de reCAPTCHA
        $captchaResponse = $_POST["g-recaptcha-response"];
        $userIP = $_SERVER["REMOTE_ADDR"];

        // Validar con Google reCAPTCHA
        $verifyURL = "https://www.google.com/recaptcha/api/siteverify";
        $response = file_get_contents($verifyURL . "?secret=$secretKey&response=$captchaResponse&remoteip=$userIP");
        $captchaData = json_decode($response);

        if ($captchaData->success) {
            // Conexión a la base de datos
            include '../../includes/db/database.php';
            $database = new Conexion();
            $mysqli = $database->conectar();

            $email = $_POST['email'];
            $password = $_POST['password'];
            $rol = $_POST['rol'];

            $tabla = ($rol === 'profesor') ? 'profesores' : 'alumnos';

            $sql = "SELECT id, email, password FROM $tabla WHERE email = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['rol'] = $rol;

                    // Redirigir según el rol
                    $redirect = ($rol === 'profesor') ? "../frontend/profesor.php" : "../frontend/alumno.php";
                    header("Location: $redirect");
                    exit();
                } else {
                    $_SESSION['error'] = "Contraseña incorrecta.";

                    // Redirigir a la página de inicio de sesión
                    header("Location: ../frontend/login.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "El usuario no está registrado.";

                // Redirigir a la página de registro
                header("Location: ../frontend/register.php");
            }
        } else {
            $_SESSION['error'] = "Error en la validación de reCAPTCHA.";

            // Redirigir a la página de inicio de sesión
            header("Location: ../frontend/login.php");
        }
    } else {
        $_SESSION['error'] = "Por favor, complete el reCAPTCHA.";

        // Redirigir a la página de inicio de sesión
        header("Location: ../frontend/login.php");
    }
}

?>