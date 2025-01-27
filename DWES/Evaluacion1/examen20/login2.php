<?php
include 'includes/conexion.php';
session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

$error = null;

// Verifica que el formulario se haya enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = isset($_POST['Usuario']) ? trim($_POST['Usuario']) : '';
    $password = isset($_POST['Password']) ? trim($_POST['Password']) : '';

    // Consulta para buscar al usuario
    $sql = $mysqli->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $resultado = $sql->get_result();

    if ($resultado->num_rows > 0) {
        $usuario_db = $resultado->fetch_assoc();

        // Verifica la contraseña
        if (password_verify($password, $usuario_db['password'])) {
            session_regenerate_id(true);
            $_SESSION['usuario'] = $usuario_db;
            header('Location: index.php');
            exit();
        }
    }

    $error = "Usuario o contraseña incorrectos.";
}
?>


<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>

<body class="text-center" style="background-color: rgba(78,130,219,0.07);">
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form method="POST" action="">
                    <img class="my-5 img-fluid" src="img/login.png" style="width:400px;">
                    <h1 class="h3 mb-3 fw-normal">Login</h1>

                    <!-- Mostrar mensaje de error si existe -->
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <div>
                        <input type="text" class="form-control" name="Usuario" placeholder="Usuario" required>
                    </div>
                    <div>
                        <input type="password" class="form-control mt-3" name="Password" placeholder="Contraseña"
                            required>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Entrar</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>