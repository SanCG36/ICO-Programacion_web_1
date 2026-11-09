<?php
$host ="db";
$usuario = "root";
$password = "12345678";
$dbname = "crud_app";

$conexion = new mysqli($host,$usuario,$password,$dbname);

if($conexion-> connect_error){
	die("Error de conexion".$conexion->connect_error);
}
