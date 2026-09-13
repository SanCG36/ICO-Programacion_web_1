<?php
	$host="127.0.0.1";
	$user="root";
	$password="12345678";
	$port="3316";
	$db="crud_app";
	$conexion=new mysqli($host,$user,$password,$db);
	if ($conexion->connect_error) {
		echo "sin conexion";
	}else{
		echo "Tenemos conexion";
	}
?>
