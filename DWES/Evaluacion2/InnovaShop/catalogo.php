<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'includes/conexion.php'; ?>
    <?php include 'includes/nav.php'; ?>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Nuestros Productos</h2>

            <!-- Filtro por categoría -->
            <div class="row justify-content-center mb-4">
                <div class="col-md-6">
                    <label for="categoryFilter" class="form-label">Filtrar por categoría:</label>
                    <select id="categoryFilter" class="form-select" onchange="filterProducts()">
                        <option value="">Todas las categorías</option>
                        <?php
                        $conn = mysqli_connect($host, $user, $password, $dbname);
                        $sql = "SELECT DISTINCT categoria FROM productos";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['categoria'] . '">' . $row['categoria'] . '</option>';
                            }
                        }

                        mysqli_close($conn);
                        ?>
                    </select>
                </div>
            </div>

            <!-- Productos -->
            <div class="row" id="productList">
                <?php
                $conn = mysqli_connect($host, $user, $password, $dbname);
                $sql = "SELECT * FROM productos";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-md-4 mb-4 product-item" data-category="' . $row['categoria'] . '">';
                        echo '<div class="card h-100 shadow">';
                        echo '<img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['nombre'] . '" style="height: 250px; object-fit: cover;">';
                        echo '<div class="card-body d-flex flex-column">';
                        echo '<h5 class="card-title">' . $row['nombre'] . '</h5>';
                        echo '<p class="card-text text-muted">' . $row['descripcion'] . '</p>';
                        echo '<p class="card-text fw-bold">' . $row['precio'] . ' €</p>';
                        echo '<button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#' . $row['id'] . 'Modal">Comprar</button>';
                        echo '</div></div></div>';
                    }
                } else {
                    echo '<p class="text-center">No hay productos disponibles.</p>';
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>
    </section>

    <?php include 'includes/modales.php'; ?>
    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function filterProducts() {
            const filter = document.getElementById('categoryFilter').value.toLowerCase();
            const products = document.querySelectorAll('.product-item');

            products.forEach(product => {
                const category = product.getAttribute('data-category').toLowerCase();
                if (filter === "" || category === filter) {
                    product.style.display = "block";
                } else {
                    product.style.display = "none";
                }
            });
        }
    </script>
</body>

</html>