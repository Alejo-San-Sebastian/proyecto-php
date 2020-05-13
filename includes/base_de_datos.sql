CREATE DATABASE prueba;
USE prueba;

CREATE TABLE usuarios(
id           int(255) auto_increment not null,
nombre       varchar (100) not null,
apellidos    varchar (100) not null,
email        varchar (255) not null,
password     varchar (255) not null,
rol          varchar(20) not null,
fecha        date not null,
CONSTRAINT pk_usuarios PRIMARY KEY (id),
CONSTRAINT uq_email UNIQUE (email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(NULL, 'Admin', 'Admin', 'admin@admin.com', 'contraseña', 'admin', CURDATE();

CREATE TABLE categorias(
id        int(255) auto_increment not null,
nombre    varchar(100),
CONSTRAINT pk_categorias PRIMARY KEY (id)
)ENGINE=InnoDb;


INSERT INTO categorias VALUES(null, 'Empresas');
INSERT INTO categorias VALUES(null, 'Recorridos');
INSERT INTO categorias VALUES(null, 'FAQ');
INSERT INTO categorias VALUES(null, 'Comentarios');

CREATE TABLE entradas(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
categoria_id    int(255) not null,
titulo          varchar(255) not null,
descripcion     MEDIUMTEXT,
fecha           date not null,
CONSTRAINT pk_entradas PRIMARY KEY (id),
CONSTRAINT fk_entradas_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
CONSTRAINT fk_entradas_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

