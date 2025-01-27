<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "examen20";
$mysqli = new mysqli($server, $username, $password, $dbname);
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
