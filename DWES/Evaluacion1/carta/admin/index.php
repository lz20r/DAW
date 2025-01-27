<?php include '../includes/header.php'; ?>

<h1 class="text-center">Panel de Administración</h1>
<div class="row text-center">
    <div class="col-md-6">
        <a href="add_dish.php" class="btn btn-primary">Agregar Nuevo Plato/Bebida</a>
    </div>
    <div class="col-md-6">
        <a href="../gallery/add_photo.php" class="btn btn-secondary">Agregar Imagen a la Galería</a>
    </div>
</div>

<h2 class="mt-5">Gestión de Platos</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Título</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM dishes";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>$" . $row['price'] . "</td>";
                echo "<td><img src='../images/" . $row['image'] . "' alt='" . $row['title'] . "' width='100'></td>";
                echo "<td>
                        <a href='edit_dish.php?id=" . $row['id'] . "' class='btn btn-warning'>Editar</a>
                        <a href='delete_dish.php?id=" . $row['id'] . "' class='btn btn-danger'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay platos disponibles.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include '../includes/footer.php'; ?>