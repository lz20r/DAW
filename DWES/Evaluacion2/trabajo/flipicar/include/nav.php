<!-- Navbar -->
<!-- favicon -->
<link rel="icon" type="image/png" href="../assests/img/favicon.ico" />

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="../cliente/index.php">
            <img src="../assests/img/favicon.ico" alt="Logo" class="logo">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../cliente/index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cliente/sobre_nosotros.php">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cliente/servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cliente/index.php#marca">Modelos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cliente/contacto.php">Contacto</a>
                </li>
                <li class="nav-item">
                    <?php 
                    if(isset($_SESSION['usuario'])){
                        echo '<a class="nav-link" href="../cliente/index.php">Cerrar Sesión</a>';
                    }else{
                        echo '<a class="nav-link" href="../admin/login.php">Iniciar Sesión</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>