<?php
	$host="db";
	$user="root";
	$password="12345678";
	$port=3306;
	$db="crud_app";
	$conexion=new mysqli($host,$user,$password,$db,$port);
	if ($conexion->connect_error) {
		echo "sin conexion";
	}else{
		echo "Tenemos conexion";
	}
?>
