<?php

include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';

    if ($nombre === '' || $correo === '') {
        echo "Faltan datos";
        exit();
    }

    $stmt = $conexion->prepare("INSERT INTO alumnos(nombre,email) VALUES(?,?)");
    $stmt->bind_param("ss", $nombre, $correo);

    $guardado = $stmt->execute();
    $error = $stmt->error;
    $stmt->close();

    if ($guardado) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error en la consulta: ".$error;
    }

} else {
    echo "Error";
}

?>
