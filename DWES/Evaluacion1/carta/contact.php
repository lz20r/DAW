<?php
include 'includes/header.php';
include 'includes/db.php';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];

    // Validaciones
    if (empty($name)) {
        $errors[] = 'El nombre no puede estar vacío';
    }
    if (empty($phone) || !preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = 'El teléfono es inválido. Debe tener 10 dígitos.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'El email no es válido';
    }
    $today = date('Y-m-d');
    $four_weeks_later = date('Y-m-d', strtotime('+4 weeks'));
    if ($reservation_date < $today) {
        $errors[] = 'La fecha no puede ser anterior al día actual';
    }
    if ($reservation_date > $four_weeks_later) {
        $errors[] = 'Las reservas no están abiertas para más de 4 semanas';
    }
    $allowed_times = ['13:00', '13:30', '14:00', '14:30', '15:00', '20:30', '21:00', '21:30', '22:00', '22:30'];
    if (!in_array($reservation_time, $allowed_times)) {
        $errors[] = 'La hora seleccionada no es válida';
    }

    // Si no hay errores, guardar la reserva
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO reservations (name, phone, email, reservation_date, reservation_time) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $phone, $email, $reservation_date, $reservation_time);
        $stmt->execute();
        $stmt->close();

        // Mensaje de éxito
        $success = "¡Reserva realizada exitosamente!";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2>Reservar Mesa</h2>

        <!-- Mostrar errores si los hay -->
        <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <!-- Mensaje de éxito -->
        <?php if (isset($success)): ?>
        <div class="alert alert-success">
            <?php echo $success; ?>
        </div>
        <?php endif; ?>

        <!-- Formulario de reserva -->
        <form method="POST" action="contact.php" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" required>
                <div class="invalid-feedback">El campo nombre es obligatorio.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="phone" id="phone" required pattern="[0-9]{10}">
                <div class="invalid-feedback">Introduce un número de teléfono válido (10 dígitos).</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <div class="invalid-feedback">Introduce una dirección de email válida.</div>
            </div>
            <div class="mb-3">
                <label for="reservation_date" class="form-label">Fecha de reserva</label>
                <input type="date" class="form-control" name="reservation_date" id="reservation_date" required>
                <div class="invalid-feedback">Selecciona una fecha de reserva válida.</div>
            </div>
            <div class="mb-3">
                <label for="reservation_time" class="form-label">Hora de reserva</label>
                <select class="form-select" name="reservation_time" id="reservation_time" required>
                    <option value="" disabled selected>Selecciona una hora</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="20:30">20:30</option>
                    <option value="21:00">21:00</option>
                    <option value="21:30">21:30</option>
                    <option value="22:00">22:00</option>
                    <option value="22:30">22:30</option>
                </select>
                <div class="invalid-feedback">Selecciona una hora de reserva válida.</div>
            </div>
            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>