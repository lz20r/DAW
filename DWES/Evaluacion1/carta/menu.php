<?php include 'includes/header.php'; ?>

<h1 class="text-center">Nuestro Menú</h1>

<div class="row">
    <?php
    $sql = "SELECT * FROM dishes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<img src="images/' . $row['image'] . '" class="card-img-top" alt="' . $row['title'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['title'] . '</h5>';
            echo '<p class="card-text">' . $row['description'] . '</p>';
            echo '<p class="card-text"><strong>$' . $row['price'] . '</strong></p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "<p>No hay platos disponibles en el menú.</p>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>