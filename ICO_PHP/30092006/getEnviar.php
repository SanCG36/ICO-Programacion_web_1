<?php

include("db.php");

if($_SERVER['REQUEST_METHOD'] === 'GET'){
	$nombre = $_GET['nombre'];
	$correo = $_GET['correo'];
	$telefono = $_GET['telefono'];

	$sql = "INSERT INTO usuarios (nombre,email,telefono) VALUES('$nombre','$correo','$telefono')";
	
	if($conn->query($sql) === TRUE){
		header('Location: create.php');
		exit();
	}
}else{
	echo "Error";
}
