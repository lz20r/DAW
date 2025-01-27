<?php
include '../includes/header.php';
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image = $_FILES['image']['name'];

    // Mover la imagen subida a la carpeta de imágenes
    move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);

    // Insertar la imagen en la base de datos
    $stmt = $conn->prepare("INSERT INTO gallery (image) VALUES (?)");
    $stmt->bind_param("s", $image);
    $stmt->execute();
    $stmt->close();

    header("Location: ../admin/index.php");
}
?>

<h1>Agregar Imagen a la Galería</h1>
<form method="POST" action="add_photo.php" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="image" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Imagen</button>
</form>

<?php include '../includes/footer.php'; ?>