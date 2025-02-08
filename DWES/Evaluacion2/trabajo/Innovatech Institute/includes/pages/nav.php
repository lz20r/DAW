<?php
session_start(); // Inicia la sesión

$usuario_logueado = isset($_SESSION['email']);

if ($usuario_logueado) {
    $rol = $_SESSION['rol' ] === 'profesor' ? 'profesor' : 'alumno';
    $usuario = $_SESSION['email'];
}
?>

<link rel="stylesheet" href="../../includes/assets/css/login.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../../index.php" style="font-weight: bold;">
            <img src="../../includes/assets/img/campus.png" alt="Logo Innovatech" style="width: 50px;">
            Innovatech Institute
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="border: none;">
            <span class="navbar-toggler-icon" style="border: none;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="../../index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#cursos">Cursos</a></li>
                <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                <?php if ($usuario_logueado): ?>
                    <li class="nav-item"><a class="nav-link" href="../../dashboard/frontend/logout.php">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="../../dashboard/frontend/login.php">Acceder</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<link rel="stylesheet" href="../../includes/assets/css/login.css">