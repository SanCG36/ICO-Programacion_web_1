<?php
	require_once __DIR__."/../config/db.php";
	$consulta="SELECT * FROM alumnos ORDER BY id DESC";
	// Ejecucuion
	$stml = $pdo->query($consulta);
	$alumnos=$stml->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Inicio</title>
		<link href="./css/estilos.css" rel="stylesheet">
	</head>
	<body>
		<h1>CRUD con PDO (Alumnos)</h1>	
		<h2>Listado</h2>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Creado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($alumnos) === 0):?>
					<tr><td>No tenemos registros</td></tr>
				<?php else: ?>
					<?php foreach($alumnos as $a):?>
					<tr>
						<td><?= htmlspecialchars($a['id'])?></td>
						<td><?= htmlspecialchars($a['nombre'])?></td>
						<td><?= htmlspecialchars($a['email'])?></td>
						<td><?= htmlspecialchars($a['created_at'])?></td>
						<td>
							<a href="edit.php?id=<?= htmlspecialchars($a['id'])?>">Editar</a>
							<a href="delete.php?id=<?= htmlspecialchars($a['id'])?>" onclick=" return confirm('¿Quieres eliminar el registro?')">Eliminar</a>
						</td>
					</tr>
				<?php endforeach;?>
				<?php endif; ?>
			</tbody>
		</table>
	</body>
</html>
