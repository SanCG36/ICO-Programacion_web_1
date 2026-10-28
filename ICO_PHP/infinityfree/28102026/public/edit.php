<?php
require_once __DIR__. "/../config/db.php";
$error = "";
$id = (int)($_GET['id']??0);
if ($id <= 0){
	die("ID invalido");
}

$consulta = "SELECT id,nombre,email FROM alumnos WHERE id=:id";

$stmt = $pdo->prepare($consulta);

$stmt->execute([":id"=>$id]);

$alumno = $stmt->fetch();

if(!$alumno){
	die("Registro no encontrado");
}

// SI se envian cambios por el formulario haremos edicion
if($_SERVER["REQUEST_METHOD"]=== "POST"){
	$nombre = trim($_POST["nombre"]??"");
	$email = trim($_POST["email"]??"");

	if($nombre === "" || $email === ""){
		$error = "Todos los campos son obligatorios";
	}elseif(filter_var($email,FILTER_VALIDATE_EMAIL)){
		$error = "El email no es valido";
	}else{
		try{
			$sql = "UPDATE alumnos SET nombre = :nombre, email = :email
					WHERE id = :id";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([
				":nombre" => $nombre,
				":email" => $email,
				":id" => $id
			]);
		header("Location: index.php");
		}catch(PDOException $e){
			$error ="Error al actualizar". $e->getMessage();
		}
	}
}else{
	// Cargar lso datos del alumno
	$nombre =$alumno['nombre'];
	$email =$alumno["email"];
}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Editar</title>
		<link href="./css/estilos.css" rel="stylesheet">
	</head>
	<body>
	<h1>Editar</h1>
	<a href="index.php">Inicio</a>
	<?php if($error):?>
		<p><?= htmlspecialchars($error);?></p>
	<?php endif;?>
	<fieldset>
		<legend>Editar formuloario</legend>
	<form method="post" class="form_edit">
		<p>ID que modificaste <?php echo $id?></p>
<?php
echo $nombre ."<br>".$email."<br>";
?>
		<label for="nombre">Nombre: 
			<input type="text" name="nombre" value="<?= htmlspecialchars($nombre)?>" required>
		</label>
		<label for="correo">Correo: 
			<input type="text" name="correo" value="<?= htmlspecialchars($email)?>" required>
		</label>
	<button type="submit">Guardar</button>
	</form>
	</fieldset>
	</body>
</html>
