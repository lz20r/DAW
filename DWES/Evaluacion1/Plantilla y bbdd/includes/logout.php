<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

include 'includes/conexion.php';
// logout.php 
session_destroy();
header('Location: ../login.php');
