<?php

$host="db";
$user="root";
$pass="12345678";
$dbName="crud_app";
$port=3306;
$conn= new mysqli($host,$user,$pass,$dbName,$port);

if($conn->connect_error){
	die('Error en conexion de la DB '.$conn-> connect_error);
}else {
	/* echo "conexion realizada"; */
}
