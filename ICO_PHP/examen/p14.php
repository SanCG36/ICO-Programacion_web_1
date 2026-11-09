<?php
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

$conexion = mysqli_connect("localhost", "root", "", "escuela");

$sql = "INSERT INTO alumnos nombre, correo VALUES ('$nombre', '$correo')";

mysqli_query($conexion, $sql);

echo "Alumno guardado";
?>
