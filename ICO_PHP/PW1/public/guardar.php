<?php

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$edad = $_POST["edad"];
$carrera = $_POST["carrera"];

$conexion = mysqli_connect("db","root","12345678","escuela");

$sql = "INSERT alumnos (nombre,correo,edad,carrera) VALUES ('$nombre','$correo','$edad','$carrera')";

mysqli_query($conexion,$sql);
