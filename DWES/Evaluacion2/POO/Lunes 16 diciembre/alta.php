<?php  
if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO usuarios (nombre, apellido1, apellido2, email, pass, telefono) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$pass', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        echo "El usuario se ha creado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else {
    echo "No se han recibido datos";
}
?>

