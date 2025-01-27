<?php
include '../includes/header.php';
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    // Mover la imagen subida a la carpeta de imágenes
    move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);

    // Insertar el plato en la base de datos
    $stmt = $conn->prepare("INSERT INTO dishes (title, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $title, $description, $price, $image);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>

<h1>Agregar Nuevo Plato</h1>
<form method="POST" action="add_dish.php" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Plato</button>
</form>

<?php include '../includes/footer.php'; ?>