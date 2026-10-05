<?php
include('db.php');
$sql="SELECT * FROM usuarios";

$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listar</title>
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<h1>Listar</h1>
		<table border="1">
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Telefono</th>
				<th>Acciones</th>
			</tr>
<tr>
<?php
while($row=$resultado->fetch_assoc()){?>
	<td><?php echo $row['id'];?></td>
	<td><?php echo $row['nombre'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['telefono'];?></td>
	<td>
    <a href="">Editar</a>
    <a href="">Eliminar</a>
	</td>
</tr>
<?php } ?>
		</table>
	</body>
</html>
