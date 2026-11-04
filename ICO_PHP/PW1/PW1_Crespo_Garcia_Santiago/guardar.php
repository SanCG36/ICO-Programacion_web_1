<?php
// guardar.php recibe los datos del formulario de registro, que se envían con POST
// (los datos van en el cuerpo de la petición y no se ven en la URL).
require "conexion.php";

// Si alguien abre este archivo directamente (sin enviar el formulario), lo regreso al inicio
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

// 3. Cómo se reciben los datos en PHP.
// Recibe los datos que mandó el formulario con POST. Cada clave de $_POST
// es el atributo name del input (por ejemplo name="nombre" llega en $_POST["nombre"])
// trim quita espacios sobrantes y ?? evita errores si falta alguno
$nombre  = trim($_POST["nombre"] ?? "");
$correo  = trim($_POST["correo"] ?? "");
$edad    = trim($_POST["edad"] ?? "");
$carrera = trim($_POST["carrera"] ?? "");

$mensaje = "";
$tipo = "error";

// Validaciones: los campos principales no pueden ir vacíos, el correo debe ser válido y la edad un entero positivo
if ($nombre === "" || $correo === "" || $carrera === "") {
    $mensaje = "Nombre, correo y carrera son obligatorios.";
} elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $mensaje = "El correo no tiene un formato válido.";
} elseif (filter_var($edad, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]) === false) {
    $mensaje = "La edad debe ser un número entero mayor que 0.";
} else {
	// 5. Qué hace la instrucción INSERT. 
	// INSERT agrega un registro nuevo a la tabla alumnos. Entre paréntesis van las columnas
	// y en VALUES los datos que se guardan en cada una. Los ? son marcadores que
	// bind_param reemplaza después con los valores reales.
    $sql = "INSERT INTO alumnos (nombre, correo, edad, carrera) VALUES (?, ?, ?, ?)";
    $consulta = $conexion->prepare($sql);
    // "ssis" = string, string, integer, string (el tipo de cada dato, en orden)
    $consulta->bind_param("ssis", $nombre, $correo, $edad, $carrera);

    if ($consulta->execute()) {
        $tipo = "exito";
        $mensaje = "Alumno registrado con el ID " . $conexion->insert_id . ".";
    } else {
        $mensaje = "No se pudo guardar el alumno.";
    }
    $consulta->close();
}
$conexion->close();
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Escuela - Registro</title>
    <link href="estilos.css" rel="stylesheet" />
  </head>
  <body>
    <main class="contenedor_principal">
      <section class="seccion_resultado">
        <fieldset class="tarjeta">
          <legend class="titulo_tarjeta">Resultado del registro</legend>
          <!-- htmlspecialchars evita que el texto escrito por el usuario se interprete como HTML -->
          <p class="mensaje mensaje_<?= $tipo ?>"><?= htmlspecialchars($mensaje) ?></p>
          <a class="enlace_volver" href="index.html">Volver al formulario</a>
        </fieldset>
      </section>
    </main>
  </body>
</html>
