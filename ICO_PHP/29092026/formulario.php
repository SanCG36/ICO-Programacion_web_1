<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Formulario</title>
		<link href="./css/style.css" rel="stylesheet">
	</head>
	<body>
		<fieldset>
		<form method="GET" action="envio.php" >
			<label for="nombre">Nombre:</label>
			<input type="text" id="nombre" name="nombre" placeholder="Ingresa nombre" required>
			<label for="edad">Edad:</label>
			<input type="number" id="edad" name="edad" placeholder="Ingresa edad" required>
			<br>
			<button type="submit">Enviar</button>
		</form>	
		</fieldset>
	</body>
</html>
