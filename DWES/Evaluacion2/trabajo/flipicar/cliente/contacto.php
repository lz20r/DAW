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
</head>

<?php
// Conexión a la base de datos
include "../include/conexion.php";
include "../include/nav.php";
include "../include/carrusel.php";
?>

<body>
	<div class="container mt-5">
		<br><br><br>
		<p class="text-center">Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos.</p>
		<form>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" placeholder="Tu nombre" required>
			</div>
			<div class="form-group">
				<label for="email">Correo Electrónico</label>
				<input type="email" class="form-control" id="email" placeholder="Tu correo electrónico" required>
			</div>
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="tel" class="form-control" id="telefono" placeholder="Tu teléfono" required>
			</div>
			<div class="form-group">
				<label for="asunto">Asunto</label>
				<input type="text" class="form-control" id="asunto" placeholder="Asunto" required>
			</div>
			<div class="form-group">
				<label for="mensaje">Mensaje</label>
				<textarea class="form-control" id="mensaje" rows="4" placeholder="Tu mensaje" required></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
	</div>

	<!-- Footer -->
	<?php include "../include/footer.php"; ?>
</body>

</html>