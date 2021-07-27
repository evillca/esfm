CREATE DATABASE penelope_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE penelope_db;
CREATE TABLE idiomas(
	id_idioma int(11) AUTO_INCREMENT,
	nombre_idioma varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
	ilc varchar(50)  null,
	nacion varchar(50) null,
	estado_i int(1) default 1,
	CONSTRAINT pk_idioma PRIMARY KEY(id_idioma)
)ENGINE=INNODB;

INSERT INTO idiomas (nombre_idioma) VALUES ('AFROBOLIVIANO');
INSERT INTO idiomas (nombre_idioma) VALUES ('ARAONA');
INSERT INTO idiomas (nombre_idioma) VALUES ('AYMARA');
INSERT INTO idiomas (nombre_idioma) VALUES ('ZAMUCO');
INSERT INTO idiomas (nombre_idioma) VALUES ('BAURE');
INSERT INTO idiomas (nombre_idioma) VALUES ('CANICHANA');
INSERT INTO idiomas (nombre_idioma) VALUES ('CAYUBABA');
INSERT INTO idiomas (nombre_idioma) VALUES ('CHACOBO');
INSERT INTO idiomas (nombre_idioma) VALUES ('BESƗRO');
INSERT INTO idiomas (nombre_idioma) VALUES ('ESE EJJA');
INSERT INTO idiomas (nombre_idioma) VALUES ('GUARANI');
INSERT INTO idiomas (nombre_idioma) VALUES ('GWARAYU');
INSERT INTO idiomas (nombre_idioma) VALUES ('ITONAMA');
INSERT INTO idiomas (nombre_idioma) VALUES ('JOAQUINIANO');
INSERT INTO idiomas (nombre_idioma) VALUES ('KAVINEÑO');
INSERT INTO idiomas (nombre_idioma) VALUES ('MACHAJUYAI-KALLAWAYA');
INSERT INTO idiomas (nombre_idioma) VALUES ('LECO');
INSERT INTO idiomas (nombre_idioma) VALUES ('MACHINERI');
INSERT INTO idiomas (nombre_idioma) VALUES ('MAROPA');
INSERT INTO idiomas (nombre_idioma) VALUES ('MOJEÑO IGNACIANO');
INSERT INTO idiomas (nombre_idioma) VALUES ('MOJEÑO TRINITARIO');
INSERT INTO idiomas (nombre_idioma) VALUES ('MORE');
INSERT INTO idiomas (nombre_idioma) VALUES ('MOSETEN');
INSERT INTO idiomas (nombre_idioma) VALUES ('MOVIMA');
INSERT INTO idiomas (nombre_idioma) VALUES ('PACAHUARA');
INSERT INTO idiomas (nombre_idioma) VALUES ('QUECHUA');
INSERT INTO idiomas (nombre_idioma) VALUES ('SIRIONO');
INSERT INTO idiomas (nombre_idioma) VALUES ('TACANA');
INSERT INTO idiomas (nombre_idioma) VALUES ('TAPIETE');
INSERT INTO idiomas (nombre_idioma) VALUES ('TSIMANE');
INSERT INTO idiomas (nombre_idioma) VALUES ('URU-CHIPAYA');
INSERT INTO idiomas (nombre_idioma) VALUES ('WEENHAYEK');
INSERT INTO idiomas (nombre_idioma) VALUES ('YUKI');
INSERT INTO idiomas (nombre_idioma) VALUES ('YURAKARE');
INSERT INTO idiomas (nombre_idioma) VALUES ('GUARASU WE');
INSERT INTO idiomas (nombre_idioma) VALUES ('YAMINAWA');

CREATE TABLE departamentos(
	id_departamento int(11) AUTO_INCREMENT,
	nombre_departamento varchar(30),
	estado_departamento int(1) default true,
	CONSTRAINT pk_departamento PRIMARY KEY(id_departamento)
)ENGINE=INNODB;

INSERT INTO departamentos (nombre_departamento)VALUES('Chuquisaca');
INSERT INTO departamentos (nombre_departamento)VALUES('La Paz');
INSERT INTO departamentos (nombre_departamento)VALUES('Cochabamba');
INSERT INTO departamentos (nombre_departamento)VALUES('Oruro');
INSERT INTO departamentos (nombre_departamento)VALUES('Potosí');
INSERT INTO departamentos (nombre_departamento)VALUES('Tarija');
INSERT INTO departamentos (nombre_departamento)VALUES('Santa Cruz');
INSERT INTO departamentos (nombre_departamento)VALUES('Beni');
INSERT INTO departamentos (nombre_departamento)VALUES('Pando');


CREATE TABLE ciudadanonacional(
	id_ciudadano int(11) AUTO_INCREMENT,
	nombre1 varchar(30),
	nombre2 varchar(30) null,
	appaterno varchar(30) null,
	apmaterno varchar(30),
	nrodocumento int(11),
	expedido_en int(11),
	fecha_nacimiento date,
	genero ENUM('M','F'),
	telefono varchar(12) null,
	CONSTRAINT pk_ciudadanonacional PRIMARY KEY (id_ciudadano),
	CONSTRAINT fk_ciudadano_dep FOREIGN KEY(expedido_en) REFERENCES departamentos(id_departamento),
	CONSTRAINT uq_nrodocumento UNIQUE(nrodocumento)
);
INSERT INTO ciudadanonacional VALUES(null,'Efrain','Ademar','Villca', 'Quispe','5132203',5,'1983-11-01',1,'67372862');
INSERT INTO ciudadanonacional VALUES(null,'Armando',null,'Quispe', 'Mamani','6614236',5,'1984-11-26',1,'67617173');

CREATE TABLE esfm(
	id_esfm int(11) AUTO_INCREMENT,
	nombre_esfm varchar(50),
	id_departamento int(11),
	estado_esfm int(1) default 1,
	CONSTRAINT pk_esfm PRIMARY KEY(id_esfm),
	CONSTRAINT fk_esfm_dep FOREIGN KEY(id_departamento) REFERENCES departamentos(id_departamento)
)ENGINE=INNODB;

INSERT INTO esfm (nombre_esfm,id_departamento) VALUES('ESFM Mariscal Sucre',1);
INSERT INTO esfm (nombre_esfm,id_departamento) VALUES('Simon Bolivar de Cororo',1);

CREATE TABLE modalidades(
	id_modalidad int(11) AUTO_INCREMENT,
	nombre_modalidad varchar(30),
	descripcion_modalidad varchar(50),
	estado_modalidad int(1) default 1,
	CONSTRAINT pk_modalidad PRIMARY KEY(id_modalidad)
)ENGINE=INNODB;

INSERT INTO modalidades (nombre_modalidad,descripcion_modalidad) VALUES('B1','Descripcion B1');
INSERT INTO modalidades (nombre_modalidad,descripcion_modalidad) VALUES('B4','Descripcion B4');

CREATE TABLE niveles(
	id_nivel int(11) AUTO_INCREMENT,
	nombre_nivel varchar(30),
	estado_nivel int(1) default 1,
	CONSTRAINT pk_nivel PRIMARY KEY(id_nivel)
)ENGINE=INNODB;

INSERT INTO niveles (nombre_nivel) VALUES('BASICO');
INSERT INTO niveles (nombre_nivel) VALUES('INTERMEDIO');
INSERT INTO niveles (nombre_nivel) VALUES('AVANZADO');

CREATE TABLE usuarios(
	id_usuario int(11) AUTO_INCREMENT,
	nombre_u varchar(30),
	appaterno_u varchar(30) null,
	apmaterno_u varchar(30),
	usuario varchar(30),
	email varchar(50),
	pass varchar(255),
	id_departamento int(11) null,
	id_ilc int(11) null,
	estado_u int(1) default 1,
	CONSTRAINT pk_usuario PRIMARY KEY(id_usuario),
	CONSTRAINT fk_usuario_dep FOREIGN KEY(id_departamento) REFERENCES departamentos(id_departamento),
	CONSTRAINT fk_usuario_idiomas FOREIGN KEY(id_ilc) REFERENCES idiomas(id_idioma)
)ENGINE=INNODB;
INSERT INTO usuarios (nombre_u,appaterno_u,apmaterno_u,usuario,email,pass,id_departamento,id_ilc,estado_u)
VALUES('Efrain','Villca','Quispe','evillca','icon.ademar@gmail.com','$2y$04$Qocqg4Q6zdPg0a/gvtYHlefwaxFm1n1GBqEbpUn9Bu8Vy.Ju5QaeG',1,null,true);

CREATE TABLE solicitudes (
	id_solicitud int(11) AUTO_INCREMENT,
	cod_certificado varchar(50) null,
	id_ciudadano int(11),
	esfm_postula int(11) null,
	idioma int(11) NOT null,
	modalidad int(11) NOT null,
	estado_evaluacion int(11) default 0,
	oral int(11) default 0,
	escrito int(11) default 0,
	user_update int(11) null,
	date_update datetime null,
	estado_p int(1) default 1,
	CONSTRAINT pk_solicitud PRIMARY KEY(id_solicitud),
	CONSTRAINT fk_solicitud_ciudadano FOREIGN KEY (id_ciudadano) REFERENCES ciudadanonacional(id_ciudadano),
	CONSTRAINT fk_solicitud_esfm FOREIGN KEY (esfm_postula) REFERENCES esfm (id_esfm),
	CONSTRAINT fk_solicitud_idioma FOREIGN KEY (idioma) REFERENCES idiomas (id_idioma),
	CONSTRAINT fk_solicitud_modalidad FOREIGN KEY (modalidad) REFERENCES modalidades (id_modalidad)
)ENGINE=InnoDB;
ALTER TABLE solicitudes ADD CONSTRAINT fk_solicitud_user FOREIGN KEY (user_update) REFERENCES usuarios(id_usuario);

INSERT INTO solicitudes VALUES(null,null,1,2,26,1,0,0,0,1,null,1);
