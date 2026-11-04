<?php
// consultar.php recibe el id con GET (el id aparece en la URL: consultar.php?id=1).
require "conexion.php";

// 3. Cómo se reciben los datos en PHP.
// Recibe el id con GET desde la URL (consultar.php?id=1) y lo convierte a entero
$id = (int) ($_GET["id"] ?? 0);

$alumno = null;
$mensaje = "";

if ($id <= 0) {
    $mensaje = "Escribe un ID válido (número mayor que 0).";
} else {
	// 6. Qué hace la instrucción SELECT.
    // SELECT: busca en la tabla alumnos el registro y con WHERE filtramos la coincidencia del id
    $consulta = $conexion->prepare("SELECT id, nombre, correo, edad, carrera FROM alumnos WHERE id = ?");
   	// Sustituye el ? de la consulta anterior con el $id y el i indica el tipo de dato
	$consulta->bind_param("i", $id);
    $consulta->execute();
    $resultado = $consulta->get_result();

    // fetch_assoc devuelve la fila como arreglo asociativo (o null si no hay coincidencia)
    $alumno = $resultado->fetch_assoc();
    if (!$alumno) {
        $mensaje = "No se encontró ningún alumno con el ID " . $id . ".";
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
    <title>Escuela - Consulta</title>
    <link href="estilos.css" rel="stylesheet" />
  </head>
  <body>
    <main class="contenedor_principal">
      <section class="seccion_resultado">
        <fieldset class="tarjeta">
          <legend class="titulo_tarjeta">Resultado de la consulta</legend>
          <?php if ($alumno): ?>
			<!-- 7. Cómo se muestran los resultados en el navegador. 
			El resultado de la consulta se guardó en la variable $alumno en forma de arreglo
			asociativo usando como clave el nombre del campo por lo que se muestra
			cada dato del alumno en una tabla; htmlspecialchars protege la salida -->
            <table class="tabla_alumno">
              <tr><th>ID</th><td><?= htmlspecialchars($alumno["id"]) ?></td></tr>
              <tr><th>Nombre</th><td><?= htmlspecialchars($alumno["nombre"]) ?></td></tr>
              <tr><th>Correo</th><td><?= htmlspecialchars($alumno["correo"]) ?></td></tr>
              <tr><th>Edad</th><td><?= htmlspecialchars($alumno["edad"]) ?></td></tr>
              <tr><th>Carrera</th><td><?= htmlspecialchars($alumno["carrera"]) ?></td></tr>
            </table>
          <?php else: ?>
            <p class="mensaje mensaje_error"><?= htmlspecialchars($mensaje) ?></p>
          <?php endif; ?>
          <a class="enlace_volver" href="index.html">Volver al formulario</a>
        </fieldset>
      </section>
    </main>
  </body>
</html>
