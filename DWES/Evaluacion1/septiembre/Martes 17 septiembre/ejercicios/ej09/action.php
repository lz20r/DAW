<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $usuario = htmlspecialchars($_POST['usuario']);
    $password = htmlspecialchars($_POST['password']);

    $usuarios_validos = [
        "alumno" => "megustalaprogramacion",
        "profesor" => "megustadarclase"
    ];

    if (array_key_exists($usuario, $usuarios_validos) && $usuarios_validos[$usuario] === $password) {
        echo "<h1>Bienvenido $usuario</h1>";
    } else {
        echo "<h1>Acceso denegado</h1>";
        echo "<a href='javascript:history.back()'>Volver atrás</a>";
    }
}
?>