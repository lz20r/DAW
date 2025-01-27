<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "flipicar";
$mysqli = new mysqli($server, $username, $password, $dbname);
if ($mysqli->connect_errno) {
	echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}