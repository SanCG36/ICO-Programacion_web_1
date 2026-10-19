<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Infinity web</title>
		<link href="./css/style.css" rel="stylesheet">
	</head>
	<body>
		<fieldset>
			<legend>Ingresa tu nombre</legend>
			<form method="get" action="enviar.php" class="form_registro">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required placeholder="Joseph Joestar" maxlength="150">
				<label for="edad">Edad</label>
				<input type="number" name="edad" required placeholder="43">
				<label for="carrera">Carrera</label>
				<input type="text" name="carrera" required placeholder="Computacion">
				<label for="numeroCuenta">Numero de cuenta</label>
				<input type="number" name="numeroCuenta" required placeholder="12345678">
				<button type="submit">Enviar</button>
			</form>
		</fieldset>
	</body>
</html>
