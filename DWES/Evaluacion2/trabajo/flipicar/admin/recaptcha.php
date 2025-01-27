<?php
$error = ""; // Variable para manejar errores

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Clave secreta de reCAPTCHA
    $secretKey = '6LdmtZ4qAAAAAKcWbxzS9xD0S8Sspo52YkSw-zRK';

    // Verificar si reCAPTCHA está presente
    if (empty($recaptchaResponse)) {
        $error = "Por favor, completa el reCAPTCHA.";
    } else {
        // Petición a la API de Google para validar reCAPTCHA
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            'secret' => $secretKey,
            'response' => $recaptchaResponse
        ];

        $options = [
            'http' => [
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $responseKeys = json_decode($result, true);

        // Validar respuesta de reCAPTCHA
        if (!$responseKeys["success"]) {
            $error = "Error de validación del reCAPTCHA. Inténtalo de nuevo.";
        } else {
            // Simulación de autenticación (reemplaza por tu lógica real)
            if ($email === "adminFlipicar@gmail.com" && $password === "admin2024") {
                // Login exitoso, redirigir al panel de administración
                header("Location: index.php");
                exit();
            } else {
                $error = "Credenciales incorrectas. Inténtalo de nuevo.";
            }
        }
    }
}
 