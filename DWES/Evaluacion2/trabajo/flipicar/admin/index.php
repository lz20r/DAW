<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Alquiler de Coches de Lujo - Flipicar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Agregar Font Awesome -->
    <link rel="stylesheet" href="../assests/css/style.css">
    <!-- Cargar reCAPTCHA v3 -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<?php
// Conexión a la base de datos
include "../include/conexion.php";
include "../include/nav.php";
include "../include/carrusel.php";
$nombre = $imagen = '';

$sql = "SELECT * FROM marcas ";
$sql .= "ORDER BY nombre ASC";
$result = $mysqli->query($sql);
?>

<body>
    <section id="ofrecemos" class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="row text-center">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mb-4">
                            <div class="brand-item">
                                <img src="<?php echo $row['imagen']; ?>" alt="Marca <?php echo $row['nombre']; ?>" class="img-fluid">
                                <h3><?php echo $row['nombre']; ?></h3>
                                <a href="../include/crude2/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-editar btn-lg">Editar</a>
                                <a href="../include/crude2/eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-eliminar btn-lg">Eliminar</a>
                                <button onclick="mostrarVentana(<?php echo $row['id']; ?>, '<?php echo $row['nombre']; ?>')" class="btn btn-editar btn-lg">Editar</button>
                                <a href="#" onclick="mostrarVentanaEliminar(<?php echo $row['id']; ?>, '<?php echo $row['nombre']; ?>')" class="btn btn-eliminar btn-lg">Eliminar</a>
                            </div>
                        </div>
                    <?php endwhile; ?>

                    <!-- Fondo oscuro para las ventanas emergentes -->
                    <div id="fondoOscuro" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999;"></div>

                    <!-- Ventana de edición -->
                    <div id="editarVentana" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 400px; background-color: rgba(0, 0, 0, 0.8); color: white; padding: 20px; border-radius: 10px; z-index: 1000; box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);">
                        <h2 class="text-center">Editar Marca</h2>
                        <form action="procesar_editar.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nombreMarca" style="color: white;">Nuevo Nombre de la Marca:</label>
                                <input type="text" class="form-control" id="nombreMarca" name="nombreMarca" required>
                            </div>
                            <div class="form-group">
                                <label for="imagenMarca" style="color: white;">Nueva Imagen de la Marca:</label>
                                <input type="file" class="form-control-file" id="imagenMarca" name="imagenMarca" accept="image/*" required>
                            </div>
                            <input type="hidden" id="idMarca" name="idMarca">
                            <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
                            <button type="button" class="btn btn-secondary btn-block" onclick="cerrarVentana()">Cancelar</button>
                        </form>
                    </div>

                    <!-- Ventana de confirmación de eliminación -->
                    <div id="eliminarVentana" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 400px; background-color: rgba(0, 0, 0, 0.8); color: white; padding: 20px; border-radius: 10px; z-index: 1000; box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);">
                        <h2 class="text-center">Confirmar Eliminación</h2>
                        <p class="text-center">¿Estás seguro de que deseas eliminar la marca "<span id="nombreMarcaEliminar"></span>"?</p>
                        <form action="eliminar.php" method="GET">
                            <input type="hidden" id="idMarcaEliminar" name="id">
                            <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
                            <button type="button" class="btn btn-secondary btn-block" onclick="cerrarVentanaEliminar()">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include "../include/footer.php"; ?>

    <script>
        // Función para mostrar la ventana de edición
        function mostrarVentana(idMarca, nombreMarca) {
            document.getElementById('idMarca').value = idMarca; // Asigna el ID de la marca
            document.getElementById('nombreMarca').value = nombreMarca; // Asigna el nombre actual de la marca (opcional)
            document.getElementById('editarVentana').style.display = 'block';
            document.getElementById('fondoOscuro').style.display = 'block';
        }

        // Función para cerrar la ventana de edición
        function cerrarVentana() {
            document.getElementById('editarVentana').style.display = 'none';
            document.getElementById('fondoOscuro').style.display = 'none';
        }

        function mostrarVentanaEliminar(idMarca, nombreMarca) {
            document.getElementById('idMarcaEliminar').value = idMarca; // Asigna el ID de la marca
            document.getElementById('nombreMarcaEliminar').textContent = nombreMarca; // Muestra el nombre de la marca
            document.getElementById('eliminarVentana').style.display = 'block';
            document.getElementById('fondoOscuro').style.display = 'block';
        }

        // Función para cerrar la ventana de confirmación de eliminación
        function cerrarVentanaEliminar() {
            document.getElementById('eliminarVentana').style.display = 'none';
            document.getElementById('fondoOscuro').style.display = 'none';
        }
    </script>

</body>

</html>