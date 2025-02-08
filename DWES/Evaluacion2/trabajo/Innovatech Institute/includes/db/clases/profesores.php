<?php
class Profesor
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function registrar($nombre, $apellidos, $telefono, $email, $precio_hora, $localidad, $password){
        $passwordHasheada = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO profesores (nombre, apellidos, telefono, email, precio_hora, localidad, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
        echo "Consulta SQL: $sql\n"; // Depuración
        echo "Valores: $nombre, $apellidos, $telefono, $email, $precio_hora, $localidad, $passwordHasheada\n"; // Depuración

        $stmt = $this->mysqli->prepare($sql);
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->mysqli->error);
        }

        $stmt->bind_param("sssssss", $nombre, $apellidos, $telefono, $email, $precio_hora, $localidad, $passwordHasheada);
        $resultado = $stmt->execute();

        if (!$resultado) {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        } else {
            echo "Profesor registrado correctamente.";
        }

        return $resultado;
    }
}