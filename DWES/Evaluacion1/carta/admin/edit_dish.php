<?php
include '../includes/header.php';
include '../includes/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM dishes WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $row['image'];  // Mantener la misma imagen por defecto

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);
    }

    // Actualizar el plato en la base de datos
    $stmt = $conn->prepare("UPDATE dishes SET title = ?, description = ?, price = ?, image = ? WHERE id = ?");
    $stmt->bind_param("ssdsi", $title, $description, $price, $image, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>

<h1>Editar Plato</h1>
<form method="POST" action="edit_dish.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description"
            required><?php echo $row['description']; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price"
            value="<?php echo $row['price']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="image" name="image">
        <img src="../images/<?php echo $row['image']; ?>" width="100" alt="Imagen actual">
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>

<?php include '../includes/footer.php'; ?>