   -- Crea la base de datos donde se guardarán los alumnos
   CREATE DATABASE escuela;
   -- Selecciona la base de datos para trabajar dentro de ella
   USE escuela;
   -- Tabla alumnos: id es la llave primaria y se incrementa solo con cada registro nuevo
   CREATE TABLE alumnos (
   	id INT AUTO_INCREMENT PRIMARY KEY,
   	nombre VARCHAR(100) NOT NULL,   -- obligatorio
   	correo VARCHAR(120) NOT NULL,   -- obligatorio
   	edad INT,
   	carrera VARCHAR(100)
   );
