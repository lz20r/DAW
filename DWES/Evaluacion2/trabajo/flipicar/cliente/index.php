<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Alquiler de Coches de Lujo - Flipicar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Agregar Font Awesome -->

    <link rel="stylesheet" href="../assests/css/style.css">
</head>

<?php
// Conexión a la base de datos
include "../include/conexion.php";
include "../include/nav.php";
include "../include/carrusel.php";
?>

<body>
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
                <?php
                $sql = "SELECT * FROM marcas ";
                $sql .= "ORDER BY nombre ASC";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) :
                ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mb-4">
                        <div class="brand-item">
                            <img src="<?php echo $row['imagen']; ?>" alt="Marca <?php echo $row['nombre']; ?>" class="img-fluid">
                            <h3><?php echo $row['nombre']; ?></h3>
                            <a href="../cliente/modelos.php?marca=<?php echo $row['nombre']; ?>" class="btn btn-primary btn-lg">Ver Modelos</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php include "../include/footer.php"; ?>
</body>

</html>