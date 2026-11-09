<?php
$host = "localhost";
$usuario = "root";
$password = "my_password";
$base = "escuela";

$conexion = new Mysqli($host,$usuario,$password,$base);

if (!$conexion) {
    die("Error de conexión");
}
?>
