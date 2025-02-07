<?php
session_start();

if (isset($_SESSION['rol'])) {
    header("Location: ../../dashboard/frontend/{$_SESSION['rol']}.php");
    exit();
} else {
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innovatech Institute - Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../includes/assets/css/login.css">
    <link rel="icon" type="image/png" href="../../includes/assets/img/campus.png">
    <meta name="description" content="Innovatech Institute es una centro de formación online especializado en tecnología y programación.">
</head>

<body>
    <div class="login-container">
        <a href="../../index.php">
            <img class="my-4 img-fluid" src="../../includes/assets/img/campus.png" alt="Logo Innovatech">
        </a>

        <!-- Mostrar mensajes de error o éxito -->
        <?php if (isset($_SESSION['mensaje'])): ?>
            <div class="alert alert-success"><?= $_SESSION['mensaje'];
                                                unset($_SESSION['mensaje']); ?></div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['error'];
                                            unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <form method="POST" action="../backend/register.php">
            <h2>Registro en Innovatech Institute</h2>

            <!-- Selector de Rol -->
            <div class="mb-3 d-flex gap-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="alumno" value="alumno" checked onclick="toggleCampos()">
                    <label class="form-check-label" for="alumno">Alumno</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="profesor" value="profesor" onclick="toggleCampos()">
                    <label class="form-check-label" for="profesor">Profesor</label>
                </div>
            </div>

            <!-- Campos generales -->
            <div class="mb-3 d-flex gap-3">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
            </div>

            <!-- Campo DNI (solo para alumnos) -->
            <div id="dniField" class="mb-3">
                <input type="text" name="dni" class="form-control" placeholder="DNI" id="dniInput">
            </div>

            <div class="mb-3 d-flex gap-3">
                <input type="email" name="email" class="form-control" placeholder="Correo Electrónico" required>
                <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>
            </div>

            <!-- Campos adicionales para profesores -->
            <div id="profesorField" class="mb-3 d-none">
                <div class="d-flex gap-3">
                    <input type="number" name="precio_hora" class="form-control" placeholder="Precio por hora" id="precioHoraInput">
                    <input type="text" name="localidad" class="form-control" placeholder="Localidad" id="localidadInput">
                </div>
            </div>

            <!-- Campo contraseña -->
            <input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required autocomplete="current-password">

            <button type="submit" class="btn btn-custom w-100">Registrarse</button>
        </form>

        <p class="mt-3">
            ¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí ►</a>
        </p>
    </div>

    <script>
        function toggleCampos() {
            const rol = document.querySelector('input[name="rol"]:checked').value;

            // Elementos del formulario
            const dniField = document.getElementById('dniField');
            const dniInput = document.getElementById('dniInput');
            const profesorField = document.getElementById('profesorField');
            const precioHoraInput = document.getElementById('precioHoraInput');
            const localidadInput = document.getElementById('localidadInput');

            if (rol === 'alumno') {
                // Mostrar DNI y hacerlo requerido
                dniField.classList.remove('d-none');
                dniInput.setAttribute('required', true);

                // Ocultar campos de profesor y quitar requeridos
                profesorField.classList.add('d-none');
                precioHoraInput.removeAttribute('required');
                localidadInput.removeAttribute('required');
            } else {
                // Ocultar DNI y quitar requerido
                dniField.classList.add('d-none');
                dniInput.removeAttribute('required');

                // Mostrar campos de profesor y hacerlos requeridos
                profesorField.classList.remove('d-none');
                precioHoraInput.setAttribute('required', true);
                localidadInput.setAttribute('required', true);
            }
        }

        // Inicializar al cargar la página
        window.onload = toggleCampos;
    </script>
</body>

</html>