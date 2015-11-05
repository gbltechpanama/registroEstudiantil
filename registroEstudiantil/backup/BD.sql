CREATE DATABASE estudiantil;

use estudiantil;

CREATE TABLE estudiantes (
  cedulaEstudiante varchar(254) NOT NULL,
  nombres varchar(254) DEFAULT NULL,
  apellidos varchar(254) DEFAULT NULL,
  direccion text,
  telefono varchar(254) DEFAULT NULL,
  email varchar(254) DEFAULT NULL,
  fechaNacimiento date DEFAULT NULL,
  lugarNacimiento varchar(254) DEFAULT NULL,
  lugarTrabajo varchar(254) DEFAULT NULL,
  cargoTrabajo varchar(254) DEFAULT NULL,
  rutaFoto varchar(254) DEFAULT NULL,
  PRIMARY KEY (cedulaEstudiante)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE acceso (
  password varchar(254) NOT NULL,
  PRIMARY KEY (password)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO acceso (password) value (MD5('prueba'));

insert into estudiantes ( cedulaEstudiante, nombres, apellidos, direccion, 
    telefono, email, fechaNacimiento, lugarNacimiento,lugarTrabajo, 
    cargoTrabajo, rutaFoto ) values ('12345677', 'Maria', 'Perez', 'Barcelona', 
    '02812345679', 'maperez@gmail.com', '2000-10-10', 'Barcelona', 'Muebleria el turco', 
    'Vendedora', '../vista/img/fotos/54285.jpg' );

INSERT INTO estudiantil.estudiantes (`cedulaEstudiante`, nombres, apellidos, 
    direccion, telefono, email, `fechaNacimiento`, `lugarNacimiento`, 
    `lugarTrabajo`, `cargoTrabajo`, `rutaFoto`) VALUES ('32435465', 'Luis', 
    'Perez', 'Caracas', '02121234567', 'lperez@gmail.com', '1994-06-15', 
    'Caracas', 'Muebleria el turco', 'Vendedor', '../vista/img/fotos/19651.jpg');

INSERT INTO estudiantil.estudiantes (`cedulaEstudiante`, nombres, apellidos, 
    direccion, telefono, email, `fechaNacimiento`, `lugarNacimiento`, 
    `lugarTrabajo`, `cargoTrabajo`, `rutaFoto`) VALUES ('12345', 'Jose', 
    'Gutierrez', 'Barcelona, calle 12', '02811234567', 
    'josegutierrez@gmail.com', '1994-07-05', 'Barcelona', 'Taller mecÃ¡nico', 
    'MecÃ¡nico', '../vista/img/fotos/37668.jpg');

INSERT INTO estudiantil.estudiantes (`cedulaEstudiante`, nombres, apellidos, 
    direccion, telefono, email, `fechaNacimiento`, `lugarNacimiento`, 
    `lugarTrabajo`, `cargoTrabajo`, `rutaFoto`) VALUES ('12345670', 'Maria', 
    'Gonzalez', 'CumanÃ¡', '02931234789', 'mgonzalez@gmail.com', '1988-05-11', 
    'Carupano', 'Farmacia MariÃ±o', 'Farmaceuta', '../vista/img/fotos/72543.png');

