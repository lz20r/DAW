<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estilo Clásico</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f4f4f9;
        font-family: "Times New Roman", serif;
        color: #333;
    }

    h1,
    h2,
    h3 {
        font-family: Georgia, serif;
    }

    .navbar {
        background-color: #d5d5d8;
        border-bottom: 2px solid #999;
    }

    .navbar-brand {
        font-family: "Times New Roman", serif;
        font-size: 1.8rem;
        font-weight: bold;
    }

    .navbar-nav .nav-link {
        font-size: 1.1rem;
        color: #555;
    }

    .navbar-nav .nav-link:hover {
        color: #000;
    }

    .jumbotron {
        background-color: #e9ecef;
        border-radius: 0;
        padding: 4rem 2rem;
    }

    .card {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
    }

    .card-header {
        background-color: #dcdcdc;
        font-family: Georgia, serif;
    }

    .footer {
        background-color: #d5d5d8;
        padding: 1rem 0;
    }

    .footer p {
        margin: 0;
        color: #333;
        font-size: 0.9rem;
    }

    .list-group-item {
        background-color: #f8f9fa;
        border-color: #ddd;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Estilo Clásico</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Galería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <div class="container">
            <h1 class="display-4">Bienvenido a Nuestra Web</h1>
            <p class="lead">Un sitio con un estilo clásico y elegante, diseñado para transportarte a otra época.</p>
            <a href="#" class="btn btn-outline-secondary">Saber más</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <!-- Main section -->
            <div class="col-md-8">
                <h2>Nuestros Servicios</h2>
                <p>Ofrecemos una amplia gama de servicios tradicionales para aquellos que buscan algo más que lo
                    moderno. Con años de experiencia, traemos lo mejor de los tiempos pasados.</p>

                <!-- Cards for services -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                Servicio 1
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Asesoramiento Personalizado</h5>
                                <p class="card-text">Le brindamos un servicio de asesoramiento único, diseñado para
                                    satisfacer sus necesidades.</p>
                                <a href="#" class="btn btn-outline-secondary">Leer más</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                Servicio 2
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Restauración de Antigüedades</h5>
                                <p class="card-text">Nos especializamos en la restauración de muebles antiguos y objetos
                                    de valor histórico.</p>
                                <a href="#" class="btn btn-outline-secondary">Leer más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <h3>Noticias Recientes</h3>
                <ul class="list-group">
                    <li class="list-group-item">Apertura de nuestra nueva tienda en el centro histórico</li>
                    <li class="list-group-item">Exposición de arte clásico este fin de semana</li>
                    <li class="list-group-item">Nuevo catálogo de antigüedades disponibles</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Estilo Clásico. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>