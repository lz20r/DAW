<?php include "includes/conexion.php"; ?>

<section class="py-5">
    <div class="container"> 
        <div class="row">
            <?php
            // Realizar una consulta para obtener los productos 
            $conn = mysqli_connect($host, $user, $password, $dbname);
            $sql = "SELECT * FROM productos";
            $result = mysqli_query($conn, $sql);

            // Verificar si hay resultados
            if (mysqli_num_rows($result) > 0) {
                // Mostrar los productos
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['nombre'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['nombre'] . '</h5>';
                    echo '<p class="card-text"><strong>€' . $row['precio'] . '</strong></p>';
                    echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#' . $row['id'] . 'Modal">Comprar</button>';
                    echo '</div></div></div>';
                }
            } else {
                echo '<p class="text-center">No hay productos disponibles.</p>';
            }
            ?>
        </div>
    </div>
</section>

<?php include "includes/modales.php"; ?>