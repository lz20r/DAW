<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idMarca = $_POST['idMarca'];
    $nuevoNombre = $mysqli->real_escape_string($_POST['nombreMarca']);
    $imagenNueva = $_FILES['imagenMarca'];

    // Validar si se subió una imagen
    if ($imagenNueva['error'] === UPLOAD_ERR_OK) {
        $directorioSubida = 'img/';

        // Usar el nombre original de la imagen y limpiarlo de caracteres no válidos
        $nombreOriginalImagen = pathinfo($imagenNueva['name'], PATHINFO_FILENAME);
        $nombreImagenLimpio = preg_replace('/[^a-zA-Z0-9_-]/', '_', $nombreOriginalImagen);
        $extensionImagen = pathinfo($imagenNueva['name'], PATHINFO_EXTENSION);
        $nombreImagen = $nombreImagenLimpio . '.' . $extensionImagen;

        $rutaImagenNueva = $directorioSubida . $nombreImagen;

        // Subir la imagen al servidor
        if (move_uploaded_file($imagenNueva['tmp_name'], $rutaImagenNueva)) {
            // Actualizar la base de datos
            $sql = "UPDATE marcas SET nombre = '$nuevoNombre', imagen = '$rutaImagenNueva' WHERE id = $idMarca";
            if ($mysqli->query($sql)) {
                echo "<script>alert('Marca actualizada correctamente'); window.location.href = '../../admin/index.php';</script>";
            } else {
                echo "<script>alert('Error al actualizar en la base de datos: {$mysqli->error}'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Error al mover la imagen al servidor'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No se pudo subir la imagen. Código de error: {$imagenNueva['error']}'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Método no permitido'); window.location.href = 'index.php';</script>";
}
