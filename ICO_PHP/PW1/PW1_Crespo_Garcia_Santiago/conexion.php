<?php
// Archivo de conexión: se incluye con require en guardar.php y consultar.php para no repetir los datos de acceso.
/* $host = "mysql_db";          // nombre del servicio de MySQL en docker (en XAMPP sería "localhost") */
$host = "localhost";
$user = "root";
$password = "12345678";
$dbName = "escuela";

//4. Cómo se realiza la conexión con MySQL. 
// Crea la conexión con mysqli usando nuestros parámetros guardados en las variables
$conexion = new mysqli($host, $user, $password, $dbName);

// Si la conexión falla, se detiene el programa y se muestra el error
if ($conexion->connect_error) {
die("Error de conexión: " . $conexion->connect_error);
}

// Se usa utf8mb4 para que los acentos y la ñ se guarden y se lean bien
$conexion->set_charset("utf8mb4");
