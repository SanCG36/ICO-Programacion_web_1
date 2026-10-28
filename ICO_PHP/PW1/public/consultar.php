<?php

$id = (int) $_GET['id'];

$conexion = mysqli_connect("db","root","12345678","escuela");

$sql = "SELECT * FROM alumnos WHERE id = $id";

$resultado = mysqli_query($conexion,$sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Convertir el resultado en un array asociativo
    $alumno = mysqli_fetch_assoc($resultado);
    
    // Imprimir los datos que necesites de tu tabla 'alumnos'
    echo "ID: " . $alumno['id'] . "<br>";
    echo "Nombre: " . $alumno['nombre']; // Cambia 'nombre' por la columna real de tu tabla
} else {
    echo "No se encontró ningún alumno con el ID: $id";
}
