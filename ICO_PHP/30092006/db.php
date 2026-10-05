<?php

$host= "db";
$user = "root";
$password = "12345678";
$dbName = "crud_app";

$conn = new mysqli($host,$user,$password,$dbName);

if($conn-> connect_error){
	die("Error de conexion".$conn->connect_error);
}
