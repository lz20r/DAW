<?php
class metodos
{

    public function mostrarDatos($sql)
    {
        $c = new conexion();
        $conexion = $c->conectar();
        $resultado = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }
    public function insertarDatos($datos)
    {
        $c = new conexion();
        $conexion = $c->conectar();

        $sql = "INSERT INTO users (name,email,password) VALUES ('$datos[0]','$datos[1]','$datos[2]')";
        return $resultado = mysqli_query($conexion, $sql);
    }
    public function login($email, $password)
    {
        $c = new conexion();
        $conexion = $c->conectar();
        $stmt = $conexion->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['usuario'] = $user['name'];
                header("Location: ../administrador/admin.php");
                exit();
            } else {
                return "Contraseña incorrecta.";
            }
        } else {
            return "Usuario no encontrado.";
        }
    }
    public function insertarMensajes($datos)
    {
        $c = new conexion();
        $conexion = $c->conectar();

        $sql = "INSERT INTO formulario (remitente,texto) VALUES ('$datos[0]','$datos[1]')";
        return $resultado = mysqli_query($conexion, $sql);
    }
}
