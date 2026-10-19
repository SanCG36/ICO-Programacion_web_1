<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    die("Error: No ID provided.");
}

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id); // "i" means integer
$stmt->execute();
$resultado = $stmt->get_result();
$row = $resultado->fetch_assoc();

if (!$row) {
    die("Error: Usuario no encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql_update = "UPDATE usuarios SET nombre = ?, email = ?, telefono = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);

    $stmt_update->bind_param("sssi", $nombre, $email, $telefono, $id);

    if ($stmt_update->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuario</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <fieldset>
        <legend>Editar usuario</legend>
        <form method="post" action="edit.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
            
            <label for="nombre">
                <p>Nombre: </p>
                <input type="text" required id="nombre" name="nombre" placeholder="Ingresa tu nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>">
            </label>
            
            <label for="email">
                <p>Email:</p>
                <input type="email" required id="email" name="email" placeholder="Ingresa tu email" value="<?php echo htmlspecialchars($row['email']); ?>">
            </label>
            
            <label for="telefono">
                <p>Telefono:</p>
                <input type="text" required id="telefono" name="telefono" placeholder="Ingresa tu telefono" value="<?php echo htmlspecialchars($row['telefono']); ?>">
            </label>
            
            <button type="submit">Guardar Cambios</button>
        </form>
    </fieldset>	
</body>
</html>
