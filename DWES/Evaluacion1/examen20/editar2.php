<?php
include 'includes/conexion.php';
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $id = $_SESSION['usuario']['id'];

    // Hashear la contraseña antes de guardarla en la base de datos
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "UPDATE usuarios SET password = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('si', $hashedPassword, $id);

    if ($stmt->execute()) {
        $mensaje = "Contraseña actualizada correctamente.";
    } else {
        $mensaje = "Error al actualizar la contraseña. Inténtalo de nuevo.";
    }

    $stmt->close();
    $mysqli->close();
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Cambiar contraseña</title>
</head>

<body style="background-color: rgba(78,130,219,0.07);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="text-center mt-5 mb-3">Inicio</h3>
                <a href="index.php" class="btn btn-primary">Inicio</a>
                <a href="gestor_usuarios.php" class="btn btn-primary">Gestor usuarios</a>
                <a href="nuevo_usuario.php" class="btn btn-success">Nuevo usuario</a>
                <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <!-- Mostrar el mensaje de verificación si existe -->
                <?php if (!empty($mensaje)) : ?>
                    <div class="alert <?php echo ($mensaje == "Contraseña actualizada correctamente.") ? 'alert-success' : 'alert-danger'; ?> text-center"
                        role="alert">
                        <?php echo $mensaje; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col text-center">
                <a href="gestor_usuarios.php" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>