<?php
// nuevo_usuario2.php
include "../include/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    if (!empty($nombre) && !empty($password) && !empty($email) && !empty($telefono)) {
        $encriptada = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO clientes(nombre, password, email, telefono) VALUES (?, ?, ?, ?)";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssss", $nombre, $encriptada, $email, $telefono);

            if ($stmt->execute()) { 
                header("Location: login.php"); 
            } else {
                echo "<div class='alert alert-danger'>Error al guardar el usuario. Intente nuevamente.</div>";
            }

            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Error en la preparación de la consulta. Intente nuevamente.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Todos los campos son obligatorios.</div>";
    }
}
