<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'usuario.php';

            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password']; 
            // Crea una instancia de la clase Usuario
            $usuario = new Usuario($nombre, $email, $password);   
            echo '<p><strong>Bienvenido/a ' . htmlspecialchars($usuario->getNombre()) . '</strong></p>';
            echo '<p>Este es tu mail: ' . htmlspecialchars($usuario->getEmail()) . '</p>';
            echo '<p>Esta es tu contraseña encriptada: ' . htmlspecialchars($usuario->getPassword()) . '</p>';
            echo '<a href="alta.php" class="btn btn-primary mt-3">Registrar otro usuario</a>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger" mt-5>';
            echo '<strong>Error:</strong> No se recibieron datos válidos.';
            echo '</div>';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>