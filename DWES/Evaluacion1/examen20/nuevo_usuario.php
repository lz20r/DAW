<?php
include 'includes/conexion.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['Usuario']);
    $password = trim($_POST['Password']);
    $nombre = trim($_POST['Nombre']);
    $apellidos = trim($_POST['Apellidos']);
    $email = trim($_POST['Email']);
    $telefono = trim($_POST['Telefono']);

    // Validar que no falten campos requeridos
    if (empty($usuario) || empty($password) || empty($nombre) || empty($apellidos) || empty($email) || empty($telefono)) {
        $error = "Todos los campos son obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El email ingresado no es válido.";
    } else {
        // Encriptar contraseña
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);

        // Preparar consulta SQL
        $stmt = $mysqli->prepare("INSERT INTO usuarios (usuario, password, nombre, apellidos, email, telefono) 
                                  VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $usuario, $password_hashed, $nombre, $apellidos, $email, $telefono);

        if ($stmt->execute()) {
            header('Location: gestor_usuarios.php?mensaje=Usuario creado correctamente');
            exit();
        } else {
            $error = "Error al registrar el usuario: " . $mysqli->error;
        }

        $stmt->close();
    }
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Registro de Usuario</title>
</head>

<body style="background-color: rgba(78,130,219,0.07);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="text-center mt-5 mb-3">Registrar Nuevo Usuario</h3>
                <a href="index.php" class="btn btn-primary">Inicio</a>
                <a href="gestor_usuarios.php" class="btn btn-primary">Gestor usuarios</a>
                <a href="nuevo_usuario.php" class="btn btn-success">Nuevo usuario</a>
                <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
            </div>
            <div class="col-12 col-md-6 offset-md-3 mt-5">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="Usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="Usuario" name="Usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="Password" name="Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="Apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="Telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="Telefono" name="Telefono" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>