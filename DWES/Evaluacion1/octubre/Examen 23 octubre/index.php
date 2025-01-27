<?php
include 'includes/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $prioridad = $_POST['prioridad'];

    $sql = "INSERT INTO tareas (titulo, descripcion, prioridad) VALUES ('$titulo', '$descripcion', '$prioridad')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error al agregar la tarea";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center my-3">Nueva Tarea</h1>
        <form action="nueva_tarea.php" method="POST">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="prioridad" class="form-label">Prioridad</label>
                <select class="form-control" id="prioridad" name="prioridad" required>
                    <option value="baja">Baja</option>
                    <option value="media">Media</option>
                    <option value="alta">Alta</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Agregar Tarea</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>