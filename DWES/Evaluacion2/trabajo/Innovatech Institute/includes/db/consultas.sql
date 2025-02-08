-- Consultas

-- Listar todos los alumnos (DNI, nombre y apellidos)
SELECT dni, nombre, apellidos FROM Alumnos;

-- Listar todos los cursos (nombre, duración, fecha inicio, fecha fin, precio, descripción)
SELECT nombre, duracion, fecha_inicio, fecha_fin, precio, descripcion FROM Cursos;

-- Listar todos los cursos que tiene un profesor
SELECT c.nombre, c.fecha_inicio, c.fecha_fin 
FROM Cursos c
JOIN Profesores p ON c.profesor_id = p.id
WHERE p.id = ?; -- Reemplazar ? por el ID del profesor

-- Listar todos los profesores
SELECT nombre, apellidos, email, telefono, precio_hora, localidad FROM Profesores;

-- Listar relación profesores - cursos
SELECT c.nombre AS curso, p.nombre AS nombre_profesor, p.apellidos, p.email
FROM Cursos c
JOIN Profesores p ON c.profesor_id = p.id;

-- Listar todos los cursos con todos los alumnos inscritos
SELECT c.nombre AS curso, a.dni, a.nombre, a.apellidos
FROM Inscripciones i
JOIN Alumnos a ON i.alumno_id = a.id
JOIN Cursos c ON i.curso_id = c.id
ORDER BY c.nombre;

-- Listar todos los cursos que ya han finalizado
SELECT c.nombre, c.duracion, c.fecha_inicio, c.fecha_fin, c.precio, p.nombre AS nombre_profesor, p.apellidos
FROM Cursos c
JOIN Profesores p ON c.profesor_id = p.id
WHERE c.fecha_fin < CURDATE();

-- Listar todos los cursos que todavía no han iniciado
SELECT c.nombre, c.duracion, c.fecha_inicio, c.fecha_fin, c.precio, p.nombre AS nombre_profesor, p.apellidos
FROM Cursos c
JOIN Profesores p ON c.profesor_id = p.id
WHERE c.fecha_inicio > CURDATE();
