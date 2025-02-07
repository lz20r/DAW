<?php
session_start();

include '../../includes/db/database.php';
include '../../includes/db/clases/alumnos.php';
include '../../includes/db/clases/profesores.php';

$database = new Conexion();
$db = $database->conectar();

function valorExiste($db, $tabla, $campo, $valor)
{
    $stmt = $db->prepare("SELECT id FROM $tabla WHERE $campo = ?");
    $stmt->bind_param("s", $valor);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows > 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rol = $_POST['rol'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validaciones básicas
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "El email no tiene un formato válido.";
        header("Location: ../frontend/register.php");
        exit();
    }

    if (strlen($password) < 8) {
        $_SESSION['error'] = "La contraseña debe tener al menos 8 caracteres.";
        header("Location: ../frontend/register.php");
        exit();
    }

    if ($rol === 'alumno') {
        $dni = trim($_POST['dni']);

        if (!preg_match("/^\d{8}[A-Za-z]$/", $dni)) {
            $_SESSION['error'] = "El DNI no tiene un formato válido.";
            header("Location: ../frontend/register.php");
            exit();
        }
    } else {
        $precio_hora = $_POST['precio_hora'];
        $localidad = $_POST['localidad'];

        if (valorExiste($db, 'profesores', 'email', $email)) {
            $_SESSION['error'] = "El email ya está registrado.";
            header("Location: ../frontend/register.php");
            exit();
        }

        try {
            $profesor = new Profesor($db);
            $registro = $profesor->registrar($nombre, $apellidos, $telefono, $email, $precio_hora, $localidad, $password);
            if ($registro) {
                $_SESSION['mensaje'] = "Registro exitoso. Por favor, inicie sesión.";
                header("Location: ../frontend/login.php");
                exit();
            } else {
                $_SESSION['error'] = "Error al registrar el profesor. Inténtelo de nuevo.";
                header("Location: ../frontend/register.php");
                exit();
            }
        } catch (Exception $e) {  // Catch any exception, not just mysqli_sql_exception
            $_SESSION['error'] = "Error en la base de datos: " . $e->getMessage();
            error_log("Error en el registro: " . $e->getMessage());
            header("Location: ../frontend/register.php");
            exit();
        }
    }
}
