CREATE DATABASE tienda CHARACTER SET "UTF-8";
CREATE TABLE usuario(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(200) NOT NULL,
contrasena VARCHAR(200) NOT NULL, 
dirreccion VARCHAR(200) NOT NULL,
correo_electronico VARCHAR(300) NOT NULL,
telefono VARCHAR(50) NOT NULL,
rol BIT NOT NULL DEFAULT 0

);
CREATE TABLE producto(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(200) NOT NULL,
descripcion VARCHAR(750) NOT NULL,
foto VARCHAR(300) NOT NULL,
precio FLOAT NOT NULL,
cantidad INTEGER NOT NULL

);

INSERT INTO usuario(nombre,contrasena,dirreccion,correo_electronico,telefono,rol) VALUES
('Enrique','1234','Calle Duquesa nº 24','enrique@gmail.com','123456',0),
('David','1234','Calle San Cristobal nº78','david@gmail.com','123456',0),
('Estefania','1234','Cale San Nicolas nº8','estefaniaPHP@gmail.com','123456',1);

INSERT INTO producto(nombre,descripcion,foto,precio,cantidad) VALUES
('Luigui´s Mansion 3 Nintendo Witch', 'Únete a Luigi, un héroe de lo más cobardica, en una aventura fantasmagórica (y un pelín viscosa, todo hay que decirlo) para salvar a Mario y compañía en Luigis Mansion 3 para Nintendo Switch.','LuiguiMansion3.jpg',59.99,10),
('Grid PS4','GRID captura cada momento de la carrera, desde la adrenalina del momento de salida hasta la euforia de ver la bandera a cuadros. Los accidentes ocurren uno tras otro –adelantamientos cercanos, rasguños en choques constantes y colisiones competitivas–, intensificados por los rivales, colegas de equipo y némesis que intentarán ayudar u obstaculizar tu progreso.','Grid.jpg',69.99,3),
('TV BLUE 43BL700','TV BLUE 43BL700 (43'' - 109 cm - Full HD - Smart TV)','television1.jpg',279.99,2);

