<?php
$nombre = $_GET['nombre'];
$edad = $_GET['edad'];
$carrera = $_GET['carrera'];
$numeroCuenta = $_GET['numeroCuenta'];

function imp ($imprimir){
 echo "<h2>".$imprimir."</h2>";
};

imp($nombre);
imp($edad);
imp($numeroCuenta);
imp($carrera);
