DROP DATABASE IF EXISTS intranet;

CREATE DATABASE intranet;
USE intranet;

CREATE TABLE usuarios(
	usuario varchar(45) PRIMARY KEY,
	clave varchar(45) NOT NULL
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
(NULL,'seccion A','Esta es la seccion de videos explicativos','seccionA.php'),
(NULL,'seccion B','Esta es la seccion de material academcio.','seccionB.php');

INSERT usuarios VALUES
('usuarioTest', '654321');