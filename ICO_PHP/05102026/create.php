<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Create</title>
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<fieldset>
				<form action="getEnviar.php" method="GET">

				<label for="nombre">Nombre
				<input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
				</label>

				<label for="email">Email
				<input type="text" id="correo" name="correo" placeholder="Ingresa tu telefono">
				</label>

				<label for="telefono">Telefono
				<input type="text" id="telefono" name="telefono" placeholder="Ingresa tu correo">
				</label>

				<button type="submit"> Enviar datos</button>
				</form>
			</fieldset>	
	</body>
</html>
