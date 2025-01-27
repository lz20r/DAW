<?php
class Usuario
{
    private $nombre;
    private $email;
    private $password;

    public function __construct($nombre, $email, $password)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Encripta la contraseña
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }  
} 
?>