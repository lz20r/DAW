<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enviar email sin autenticación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-4 mt-4 text-center">Enviar email sin autenticación</h1>
                <form method="POST" action="enviar.php">
                    <div class="mb-3">
                        <label for="nombre_remitente" class="form-label">Nombre del remitente</label>
                        <input type="text" class="form-control" id="nombre_remitente" name="nombre_remitente" required>
                    </div>
                    <div class="mb-3">
                        <label for="remitente" class="form-label">Email del remitente</label>
                        <input type="email" class="form-control" id="remitente" name="remitente" required>
                    </div>
                    <div class="mb-3">
                        <label for="destinatario" class="form-label">Email del destinatario</label>
                        <input type="email" class="form-control" id="destinatario" name="destinatario" required>
                    </div>
                    <div class="mb-3">
                        <label for="asunto" class="form-label">Asunto</label>
                        <input type="text" class="form-control" id="asunto" name="asunto" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_envio" class="form-label">Fecha de envío</label>
                        <input type="date" class="form-control" id="fecha_envio" name="fecha_envio" required>
                    </div>
                    <div class="mb-3">
                        <label for="hora_envio" class="form-label">Hora de envío</label>
                        <input type="time" class="form-control" id="hora_envio" name="hora_envio" required>
                    </div>
                    <div class="mb-3">
                        <label for="pagina_web" class="form-label">Página web</label>
                        <input type="url" class="form-control" id="pagina_web" name="pagina_web" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar correo</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>