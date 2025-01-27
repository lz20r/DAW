<?php
include "../includes/conexion.php";
//email
$email=mysqli_real_escape_string($mysqli,$_POST["email"]);
//contraseña
$password=mysqli_real_escape_string($mysqli,$_POST["password"]);
$query="SELECT * FROM users WHERE email='$email'";
$consulta=mysqli_query($mysqli,$query);
$encriptada=password_hash($password,PASSWORD_BCRYPT);
if($result = mysqli_query($mysqli,$query)){ 
    while($fila = mysqli_fetch_array($result)){
        $hash = $fila['password'];  
    }
}








?>