<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Editar Usuario</title>
</head>

<body style="background-color: rgba(78,130,219,0.07);">
    <?php
    $id = $_GET['id'] ?? null;
    if (!$id) {
        header('Location: gestor_usuarios.php');
        exit;
    }

    include 'includes/conexion.php';

    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
    } else {
        header('Location: gestor_usuarios.php');
        exit;
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="text-center mt-5 mb-3">Editar Usuario</h3>
                <a href="index.php" class="btn btn-primary">Inicio</a>
                <a href="gestor_usuarios.php" class="btn btn-primary">Gestor usuarios</a>
                <a href="nuevo_usuario.php" class="btn btn-success">Nuevo usuario</a>
                <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
            </div>
            <div class="col-4"></div>
            <div class="col-4 mt-3">
                <form method="POST" action="editar2.php" class="mt-3">
                    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" value="<?php echo $usuario['usuario']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control" name="password"
                            placeholder="Introduce la nueva contraseña" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" value="<?php echo $usuario['nombre']; ?>"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos"
                            value="<?php echo $usuario['apellidos']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $usuario['email']; ?>"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono"
                            value="<?php echo $usuario['telefono']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Género</label>
                        <input type="text" class="form-control" id="genero" placeholder="Cargando..." disabled>
                    </div>
                    <button type="submit" class="w-100 btn btn-lg btn-primary mt-4">Actualizar contraseña</button>
                </form>
            </div>
            <div class="col-4"></div>
            <div class="row">
                <div class="col text-center mt-4">
                    <a href="gestor_usuarios.php" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>