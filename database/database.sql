CREATE DATABASE IF NOT EXISTS tienda_php;
use tienda_php;
create table if not exists roles
(
    id     int(255) AUTO_INCREMENT NOT NULL,
    nombre varchar(140)            not null,
    CONSTRAINT pk_roles PRIMARY KEY (id)
) ENGINE = InnoDb;

create table if not exists usuarios
(
    id        int(255) AUTO_INCREMENT  NOT NULL,
    id_role   int(255)                 not null,
    nombre    varchar(140)             not null,
    apellidos varchar(255)             not null,
    email     varchar(255) default (1) not null,
    password  varchar(255)             not null,
    imagen    varchar(255),
    CONSTRAINT pk_usuarios PRIMARY KEY (id),
    CONSTRAINT uk_email UNIQUE (email),
    CONSTRAINT fk_id_role FOREIGN KEY (id_role) REFERENCES roles (id)
) ENGINE = InnoDb;

INSERT INTO roles
values (null, 'usuario');
INSERT INTO roles
values (null, 'admin');

INSERT INTO usuarios
values (null, 2, 'Daniel', 'Morales', 'daniel@gmail.com', 'daniel123', null);
INSERT INTO usuarios
values (null, 1, 'Nicol', 'Rodriguez', 'nicole@gmail.com', 'nicole123', null);

CREATE TABLE IF NOT EXISTS categorias
(
    id     int(255) auto_increment not null,
    nombre varchar(255)            not null,
    CONSTRAINT pk_categoria PRIMARY KEY (id)
) ENGINE = InnoDb;

INSERT INTO categorias
values (null, 'Manga corta');
INSERT INTO categorias
values (null, 'Tirantes');
INSERT INTO categorias
values (null, 'Manga Larga');
INSERT INTO categorias
values (null, 'Sudaderas');

CREATE TABLE IF NOT EXISTS productos
(
    id           int(255) AUTO_INCREMENT NOT NULL,
    id_categoria int(255)                not null,
    nombre       varchar(140)            not null,
    descripcion  mediumtext              not null,
    precio       bigint                  not null,
    stock        int(255)                not null,
    oferta       varchar(2)              not null,
    fecha        date                    not null,
    imagen       varchar(255),
    CONSTRAINT pk_producto PRIMARY KEY (id),
    CONSTRAINT fk_producto_categoria FOREIGN KEY (id_categoria) REFERENCES categorias (id)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS pedidos
(
    id           int(255) AUTO_INCREMENT NOT NULL,
    id_usuario   int(255)                not null,
    direccion    varchar(140)            not null,
    ciudad       varchar(140)            not null,
    departamento varchar(140)            not null,
    direccion2   varchar(255)            not null,
    costo_total  bigint                  not null,
    estado       varchar(20)             not null,
    fecha        date                    not null,
    hora         time                    not null,
    CONSTRAINT pk_pedido PRIMARY KEY (id),
    CONSTRAINT fk_usuario_pedido FOREIGN KEY (id_usuario) REFERENCES usuarios (id)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS pedidos_productos
(
    id          int(255) AUTO_INCREMENT NOT NULL,
    id_pedido   int(255)                not null,
    id_producto int(255)                not null,
    unidades    int(255)                not null,
    CONSTRAINT pk_pedidos_productos PRIMARY KEY (id),
    CONSTRAINT fk_pedido_pedidosxproductos FOREIGN KEY (id_pedido) REFERENCES pedidos (id),
    CONSTRAINT fk_producto_pedidosxproductos FOREIGN KEY (id_producto) REFERENCES productos (id)
) ENGINE = InnoDb;