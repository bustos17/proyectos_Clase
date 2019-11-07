CREATE DATABASE tienda;
CREATE TABLE usuario(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(200) NOT NULL,
contrasena VARCHAR(200) NOT NULL, 
dirreccion VARCHAR(200) NOT NULL,
correo_electronico VARCHAR(300) NOT NULL,
telefono VARCHAR(50) NOT NULL,
rol BIT NOT NULL DEFAULT 0

);

INSERT INTO usuario(nombre,contrasena,dirreccion,correo_electronico,telefono,rol) VALUES
('Enrique','1234','Calle Duquesa nº 24','enrique@gmail.com','123456',0),
('David','1234','Calle San Cristobal nº78','david@gmail.com','123456',0),
('Estefania','1234','Cale San Nicolas nº8','estefaniaPHP@gmail.com','123456',1);