<?php

$host= "sql307.infinityfree.com";
$user = "if0_43108527";
$password = "bnxgoyTk2J";
$dbName = "if0_43108527_crud_app";

/* $host= "db"; */
/* $user = "root"; */
/* $password = "12345678"; */
/* $dbName = "crud_app"; */
$conn = new mysqli($host,$user,$password,$dbName);

if($conn-> connect_error){
	die("Error de conexion".$conn->connect_error);
}
