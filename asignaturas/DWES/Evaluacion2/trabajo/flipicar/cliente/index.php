<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Alquiler de Coches de Lujo en Toda España - GT Rentals</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Agregar Font Awesome -->

    <link rel="stylesheet" href="../assests/css/style.css">
</head>

<?php
// Conexión a la base de datos
include "../include/conexion.php";
include "../include/nav.php";
?>

<body>
    <!-- Carrusel de videos -->
    <div id="videoCarousel" class="carousel slide background-header" data-ride="carousel">
        <div class="carousel-inner">
            <!-- Video 1 -->
            <div class="carousel-item active">
                <video autoplay muted loop playsinline class="video-background">
                    <source src="img/invideo-ai-1080 Experience Luxury with Flipicar_ Your Ul 2024-11-11.mp4"
                        type="video/mp4">
                    Tu navegador no soporta la reproducción de video.
                </video>
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <h1 class="display-4">Alquila tu deportivo</h1>
                    <p class="lead">Experiencias de conducción de lujo en toda España.</p>
                </div>
            </div>

            <!-- Video 2 -->
            <div class="carousel-item">
                <video autoplay muted loop playsinline class="video-background">
                    <source src="https://gtrentals.es/wp-content/uploads/2023/02/otro-video.mp4" type="video/mp4">
                    Tu navegador no soporta la reproducción de video.
                </video>
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <h1 class="display-4">Vive la velocidad</h1>
                    <p class="lead">Conduce los mejores coches en los mejores lugares.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#videoCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#videoCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <!-- Sección "Ofrecemos" -->
    <section id="ofrecemos" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Nuestras Marcas <strong>Exclusivas</strong></h2>
                    <p>Descubre nuestra excepcional selección de <strong>coches de lujo</strong>. Alquila el
                        vehículo de tus sueños y experimenta el máximo placer de conducción.</p>

                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="brand-item">
                        <img src="img/RR.png" alt="Marca Rolls Royce" class="img-fluid">
                        <h3>Rolls Royce</h3>
                        <a href="modelos.php?marca=Rolls%20Royce" class="btn btn-primary btn-lg">Explorar
                            Modelos</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="brand-item">
                        <img src="img/ferrari.png" alt="Marca Ferrari" class="img-fluid">
                        <h3>Ferrari</h3>
                        <a href="modelos.php?marca=Ferrari" class="btn btn-primary btn-lg">Explorar Modelos</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="brand-item">
                        <img src="img/mercedes.png" alt="Marca Maybach" class="img-fluid">
                        <h3>Maybach</h3>
                        <a href="modelos.php?marca=Maybach" class="btn btn-primary btn-lg">Explorar Modelos</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="brand-item">
                        <img src="img/porsche.png" alt="Marca Porsche" class="img-fluid">
                        <h3>Porsche</h3>
                        <a href="modelos.php?marca=Porsche" class="btn btn-primary btn-lg">Explorar Modelos</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="brand-item">
                        <img src="img/spyker.png" alt="Marca Spyker" class="img-fluid">
                        <h3>Spyker</h3>
                        <a href="modelos.php?marca=Spyker" class="btn btn-primary btn-lg">Explorar Modelos</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="brand-item">
                        <img src="img/Koenigsegg.png" alt="Marca Koenigsegg" class="img-fluid">
                        <h3>Koenigsegg</h3>
                        <a href="modelos.php?marca=Koenigsegg" class="btn btn-primary btn-lg">Explorar Modelos</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="brand-item">
                        <img src="img/Pagani.png" alt="Marca Pagani" class="img-fluid">
                        <h3>Pagani</h3>
                        <a href="modelos.php?marca=Pagani" class="btn btn-primary btn-lg">Explorar Modelos</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="brand-item">
                        <img src="img/Maserati.png" alt="Marca Maserati" class="img-fluid">
                        <h3>Maserati</h3>
                        <a href="modelos.php?marca=Maserati" class="btn btn-primary btn-lg">Explorar Modelos</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="brand-item">
                        <img src="img/Lamborghini.png" alt="Marca Lamborghini" class="img-fluid">
                        <h3>Lamborghini</h3>
                        <a href="modelos.php?marca=Lamborghini" class="btn btn-primary btn-lg">Explorar Modelos</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <footer class="bg-dark text-center text-light py-4" id="contacto">
        <div class="container">
            <p> GT Rentals. Todos los derechos reservados.</p>
            <a href="mailto:info@gtrentals.es">info@gtrentals.es</a>
            <div class="social-icons mt-3">
                <ul>
                    <li><a href="https://www.facebook.com/GTRentals" target="_blank" class="fab fa-facebook"></a>
                    </li>
                    <li><a href="https://twitter.com/GT_Rentals" target="_blank" class="fab fa-twitter"></a></li>
                    <li><a href="https://www.instagram.com/GT_Rentals" target="_blank" class="fab fa-instagram"></a>
                    </li>
                    <li><a href="https://www.linkedin.com/company/gt-rentals" target="_blank"
                            class="fab fa-linkedin"></a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>