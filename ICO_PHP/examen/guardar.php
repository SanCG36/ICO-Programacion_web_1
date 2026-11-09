<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = $_POST['nombre'] ?? '';
    $correo   = $_POST['correo'] ?? '';
    $telefono = $_POST['telefono'] ?? '';

    $sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES ('$nombre', '$correo', '$telefono')";
    
    if ($conexion->query($sql) === TRUE) {
        header('Location: index.html');
        exit();
    } else {
        echo "Error en la consulta: " . $conexion->error;
    }
} else {
    echo "Error";
}
?>
