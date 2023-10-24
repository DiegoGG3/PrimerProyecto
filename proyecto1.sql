CREATE TABLE User (
    ID INT AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    rol VARCHAR(10),
    PRIMARY KEY (ID)
);
ALTER TABLE User
ADD CONSTRAINT chk_rol CHECK (rol IN ('profesor', 'alumno'));

CREATE TABLE Examen (
    ID INT AUTO_INCREMENT,
    fecha_inicio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
CREATE TABLE intento (
	id_intento int auto_increment,
    user_id INT,
    examen_id INT,
    respuestas JSON,
	fecha_intento TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    
    PRIMARY KEY (id_intento),
    FOREIGN KEY (user_id) REFERENCES User (ID),
    FOREIGN KEY (examen_id) REFERENCES Examen (id)
);

create table pregunta (
	ID_pregunta int auto_increment,
	Enunciado varchar(200) not null,
	respuestas JSON not null,
	categoria varchar(20) not null,
	dificultad varchar(20) not null,
	URL varchar(200),
	tipo_recurso varchar(50) ,

	primary key (ID_pregunta),
    FOREIGN KEY (categoria) REFERENCES categoria (Nombre),
    FOREIGN KEY (dificultad) REFERENCES dificultad (Nombre)
);

create table categoria(
	ID_categoria int auto_increment,
    Nombre varchar(100) unique,
    
    primary key (ID_categoria, Nombre)
);

create table dificultad(
	ID_dificultad int auto_increment,
    Nombre varchar(100) unique,
    
    primary key (ID_dificultad, Nombre)
);

commit;
