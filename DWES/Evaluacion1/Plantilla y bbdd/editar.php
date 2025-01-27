<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<title>Login</title>
</head>

<body style="background-color: rgba(78,130,219,0.07);">
	<?php
	include 'includes/editar.php';
	?>
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h3 class="text-center mt-5 mb-3">Inicio</h3>
				<a href="index.php" class="btn btn-primary">Inicio</a>
				<a href="gestor_usuarios.php" class="btn btn-primary">Gestor usuarios</a>
				<a href="nuevo_usuario.php" class="btn btn-success">Nuevo usuario</a>
				<a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
			</div>
			<div class="col-4"></div>
			<div class="col-4 mt-3">
				<form method="POST" action="editar2.php" class="mt-3">
					<div class="mb-3">
						<input type="hidden" name="id" value=$usuario>
						<input type="text" class="form-control" value="alumno" disabled>
					</div>
					<div class="mb-3">
						<input type="password" class="form-control" name="password"
							placeholder="Introduce la nueva contraseña" required>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="nombre" placeholder="Nombre"
							value="$usuario['nombre']" required disabled>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="apellidos" placeholder="Apellidos"
							value="Medina García" required disabled>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="email" placeholder="Email" value="profe@cdmfp.es"
							required disabled>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="telefono" placeholder="Teléfono" value="654789123"
							required disabled>
					</div>
					<button type="submit" class="w-100 btn btn-lg btn-primary mt-4">Actualizar contraseña</button>
				</form>
			</div>
		</div>
		<div class="col-4"></div>
	</div>
	<div class="row">
		<div class="col text-center mt-4">
			<!-- Aquí va la API -->
		</div>
	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
	</script>
</body>

</html>