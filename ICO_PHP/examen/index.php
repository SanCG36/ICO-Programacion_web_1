<?php
include("conexion.php");

$sql = "SELECT * FROM usuarios";

$usuarios = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Formulario</title>
		<link href="estilos.css" rel="stylesheet">
		<style>
		</style>
	</head>
	<body>
		<main>
		<section>
		<h2>Crear usuario</h2>
		<fieldset>
			<legend>Ingresa tus datos</legend>
			<form method="post" action="guardar.php">
				<label for="nombre">Nombre:
				<input type="text" name="nombre" placeholder="Ingresa tu nombre">
				</label>
				<label for="correo"">Correo:
				<input type="text" name="correo" placeholder="Ingresa tu correo">
				</label>
				<button type="submit">Enviar</button>
			</form>
		</fieldset>
		</section>
		<section>
			<h2>Usuarios</h2>
		<table border="1">
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Email</th>
			</tr>
<tr>
<?php
while($row=$usuarios->fetch_assoc()){?>
	<td><?php echo $row['id'];?></td>
	<td><?php echo $row['nombre'];?></td>
	<td><?php echo $row['email'];?></td>
	</tr>
<?php } ?>
	</table>
	</section>
	</main>
	</body>
	</html>
