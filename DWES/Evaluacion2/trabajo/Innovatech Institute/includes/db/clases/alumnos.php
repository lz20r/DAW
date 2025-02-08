<?php
class Alumno
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function registrar($nombre, $apellidos, $dni, $telefono, $email, $password){
        // Hashear la contraseña antes de almacenarla
        $passwordHasheada = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->mysqli->prepare("INSERT INTO alumnos (nombre, apellidos, dni, telefono, email, password) VALUES (?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->mysqli->error);
        }

        $stmt->bind_param("ssssss", $nombre, $apellidos, $dni, $telefono, $email, $passwordHasheada);
        $resultado = $stmt->execute(); // Guardamos el resultado

        if (!$resultado) {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        } else {
            echo "Alumno registrado correctamente.";
        }
        $stmt->execute();
        
        return $resultado;
    }
}
