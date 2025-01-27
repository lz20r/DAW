<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Datos del usuario
$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center">
            <h1>Bienvenido, <?= $username ?>!</h1>
            <p class="lead">Este es tu panel principal donde puedes administrar tus opciones y acceder a más funcionalidades.</p>
        </div>

        <div class="row mt-4">
            <!-- Tarjetas de opciones -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Configuración de Perfil</h5>
                        <p class="card-text">Edita tu información personal y actualiza tus datos de inicio de sesión.</p>
                        <a href="profile.php" class="btn btn-primary">Ir a Perfil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestión de Datos</h5>
                        <p class="card-text">Accede a tus datos guardados o realiza acciones administrativas.</p>
                        <a href="data.php" class="btn btn-primary">Ver Datos</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Soporte</h5>
                        <p class="card-text">Contacta al equipo de soporte si tienes problemas o preguntas.</p>
                        <a href="support.php" class="btn btn-primary">Obtener Ayuda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center mt-5 py-3">
        <p>&copy; <?= date("Y") ?> Mi Sistema. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>