<?php
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
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar contraseña

    // Validaciones básicas
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "El email no tiene un formato válido.";
        header("Location: ../frontend/register.php");
        exit();
    }


    // Validar si el email ya está registrado
    if (valorExiste($db, $rol === 'alumno' ? 'alumnos' : 'profesores', 'email', $email)) {
        $_SESSION['error'] = "El email ya está registrado.";
        header("Location: ../frontend/register.php");
        exit();
    }

    // Registro de alumnos
    if ($rol === 'alumno') {
        $dni = trim($_POST['dni']);

        // Validar formato del DNI
        if (!preg_match("/^\d{8}[A-Za-z]$/", $dni)) {
            $_SESSION['error'] = "El DNI no tiene un formato válido.";
            header("Location: ../frontend/register.php");
            exit();
        }

        // Validar si el DNI ya está registrado
        if (valorExiste($db, 'alumnos', 'dni', $dni)) {
            $_SESSION['error'] = "El DNI ya está registrado.";
            header("Location: ../frontend/register.php");
            exit();
        }

        try {
            $alumno = new Alumno($db);
            $registro = $alumno->registrar($nombre, $apellidos, $telefono, $email, $dni, $password);
            if ($registro) {
                $_SESSION['mensaje'] = "Registro exitoso. Por favor, inicie sesión.";
                header("Location: ../frontend/login.php");
                exit();
            } else {
                $_SESSION['error'] = "Error al registrar el alumno. Inténtelo de nuevo.";
                header("Location: ../frontend/register.php");
                exit();
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Error en la base de datos: " . $e->getMessage();
            error_log("Error en el registro: " . $e->getMessage());
            header("Location: ../frontend/register.php");
            exit();
        }
    }

    // Registro de profesores
    if ($rol === 'profesor') {
        $precio_hora = $_POST['precio_hora'];
        $localidad = $_POST['localidad'];

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
        } catch (Exception $e) {
            $_SESSION['error'] = "Error en la base de datos: " . $e->getMessage();
            error_log("Error en el registro: " . $e->getMessage());
            header("Location: ../frontend/register.php");
            exit();
        }
    }
}
