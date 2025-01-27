<?php
session_start();
include "conexion.php";

$user_id = $_SESSION['user_id'];
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


$sql = "SELECT id, nombre, email, telefono, dni, fecha_nacimiento, fecha_obtencion_permiso_conducir, fecha_expiracion_permiso_conducir, foto_anverso_carnet_conducir, foto_reverso_carnet_conducir FROM clientes WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "No se encontró información del usuario.";
    exit();
}

$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $fecha_obtencion_permiso = $_POST['fecha_obtencion_permiso_conducir'];
    $fecha_expiracion_permiso = $_POST['fecha_expiracion_permiso_conducir'];

    $foto_anverso = $user_data['foto_anverso_carnet_conducir']; 
    $foto_reverso = $user_data['foto_reverso_carnet_conducir'];  

    if (isset($_FILES['foto_anverso']) && $_FILES['foto_anverso']['error'] == 0) {

        $foto_anverso = "uploads/" . uniqid("anverso_") . "." . pathinfo($_FILES['foto_anverso']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['foto_anverso']['tmp_name'], $foto_anverso);
    }

    if (isset($_FILES['foto_reverso']) && $_FILES['foto_reverso']['error'] == 0) {

        $foto_reverso = "uploads/" . uniqid("reverso_") . "." . pathinfo($_FILES['foto_reverso']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['foto_reverso']['tmp_name'], $foto_reverso);
    }


    $update_sql = "UPDATE clientes SET dni = ?, fecha_nacimiento = ?, fecha_obtencion_permiso_conducir = ?, fecha_expiracion_permiso_conducir = ?, foto_anverso_carnet_conducir = ?, foto_reverso_carnet_conducir = ? WHERE id = ?";
    $update_stmt = $mysqli->prepare($update_sql);
    $update_stmt->bind_param("sssssii", $dni, $fecha_nacimiento, $fecha_obtencion_permiso, $fecha_expiracion_permiso, $foto_anverso, $foto_reverso, $user_id);

    if ($update_stmt->execute()) {
        $success_message = "Datos actualizados correctamente.";
    } else {
        $error_message = "Error al actualizar los datos.";
    }

    $update_stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Bienvenido, <?php echo htmlspecialchars($user_data['nombre']); ?></h1>

        <div class="card mt-4">
            <div class="card-header">
                Datos de Usuario
            </div>
            <div class="card-body">

                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($user_data['nombre']); ?></p>

                <p><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($user_data['email']); ?></p>

                <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($user_data['telefono']); ?></p>

                <p><strong>DNI:</strong> <?php echo htmlspecialchars($user_data['dni']); ?></p>

                <p><strong>Fecha de Nacimiento:</strong> <?php echo htmlspecialchars($user_data['fecha_nacimiento']); ?></p>

                <p><strong>Fecha de Obtención del Permiso:</strong> <?php echo htmlspecialchars($user_data['fecha_obtencion_permiso_conducir']); ?></p>

                <p><strong>Fecha de Expiración del Permiso:</strong> <?php echo htmlspecialchars($user_data['fecha_expiracion_permiso_conducir']); ?></p>

                <p><strong>Foto Anverso del Carnet:</strong> <img src="<?php echo htmlspecialchars($user_data['foto_anverso_carnet_conducir']); ?>" alt="Foto Anverso" width="100"></p>
                
                <p><strong>Foto Reverso del Carnet:</strong> <img src="<?php echo htmlspecialchars($user_data['foto_reverso_carnet_conducir']); ?>" alt="Foto Reverso" width="100"></p>
            </div>
        </div>

        <div class="mt-4">
            <h3>Actualizar Datos</h3>
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($success_message) ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" name="dni" value="<?php echo htmlspecialchars($user_data['dni']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo htmlspecialchars($user_data['fecha_nacimiento']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_obtencion_permiso_conducir" class="form-label">Fecha de Obtención del Permiso</label>
                    <input type="date" class="form-control" name="fecha_obtencion_permiso_conducir" value="<?php echo htmlspecialchars($user_data['fecha_obtencion_permiso_conducir']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_expiracion_permiso_conducir" class="form-label">Fecha de Expiración del Permiso</label>
                    <input type="date" class="form-control" name="fecha_expiracion_permiso_conducir" value="<?php echo htmlspecialchars($user_data['fecha_expiracion_permiso_conducir']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="foto_anverso" class="form-label">Foto Anverso del Carnet</label>
                    <input type="file" class="form-control" name="foto_anverso">
                </div>
                <div class="mb-3">
                    <label for="foto_reverso" class="form-label">Foto Reverso del Carnet</label>
                    <input type="file" class="form-control" name="foto_reverso">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Datos</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>