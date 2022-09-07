<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'peliculas';

$dbconnect = mysqli_connect($hostname, $username, $password, $db);

if ($dbconnect->connect_error) { 
    die("Error en la conexión a la base de datos."); 
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
session_start();
?>