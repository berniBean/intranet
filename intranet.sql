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
	ruta varchar(45) NOT NULL
);

CREATE TABLE permisos(
	usuario varchar(45),
	ID_categoria int,
	PRIMARY KEY (usuario,ID_categoria),
	FOREIGN KEY (usuario) REFERENCES usuarios(usuario),
	FOREIGN KEY (ID_categoria) REFERENCES categorias(ID_categoria)
);