DROP DATABASE IF EXISTS intranet;

CREATE DATABASE intranet;
USE intranet;

CREATE TABLE usuarios(
	usuario varchar(45) PRIMARY KEY,
	clave varchar(45) NOT NULL,
	admin boolean NOT NULL
);

CREATE TABLE datosPersonales(
	usuario varchar(45) PRIMARY KEY,
	nombre varchar(65),
	email varchar(45),
	FOREIGN KEY (usuario) REFERENCES usuarios(usuario) 
);

CREATE TABLE categorias(
	ID_categoria int AUTO_INCREMENT PRIMARY KEY,
	categoria varchar(45) NOT NULL,
	descripcion varchar(255) NOT NULL,
	ruta varchar(45) NOT NULL
);

CREATE TABLE permisos(
	usuario varchar(45),
	ID_categoria int,
	PRIMARY KEY (usuario,ID_categoria),
	FOREIGN KEY (usuario) REFERENCES usuarios(usuario),
	FOREIGN KEY (ID_categoria) REFERENCES categorias(ID_categoria)
);

INSERT categorias VALUES
(NULL,'Multimedia','Esta es la seccion de videos explicativos','multimedia.php'),
(NULL,'Matrial Academico','Esta es la seccion de material academcio para descargar.','material.php'),
(NULL,'Tareas','Esta es la seccion presenta una serie de tarea para los alumnos.','tareas.php'),
(NULL,'Curiosidades','Frases celebres provervios y adivinanzas.','curiosidades.php');

INSERT usuarios VALUES
('usuarioTest', '654321',0),
('BerniPrueba', '654321',0),
('Admin','123456',1);

INSERT permisos VALUES
('usuarioTest',1),('usuarioTest',4),
('BerniPrueba',2),('BerniPrueba',3);