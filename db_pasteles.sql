-- db_pasteles
-- create database db_pasteles;
-- drop database db_pasteles;

-- tablas db_pasteles 

-- tabla de pastel
--drop table db_pasteles.pastel;
create table db_pasteles.pastel(
	id_pastel int auto_increment primary key,
    nombre varchar(50) not null,
    descripcion varchar(60) not null,
    preparado_por varchar(50) not null,
    fecha_creacion date not null,
	fecha_vencimiento date not null
);
insert into db_pasteles.pastel(nombre, descripcion, preparado_por, fecha_creacion, fecha_vencimiento) values ('pastel de fresa','bizcocho con crema y fresas','Jose Garcia', '2024-04-03', '2024-04-10');
insert into db_pasteles.pastel(nombre, descripcion, preparado_por, fecha_creacion, fecha_vencimiento) values ('pastel selva negra','bizcocho de chocolate con crema','Alicia Lopez', '2024-04-03', '2024-04-15');
insert into db_pasteles.pastel(nombre, descripcion, preparado_por, fecha_creacion, fecha_vencimiento) values ('pastel fresa con melocoton','bizcocho con crema y almibar de frutas','Jose Garcia', '2024-04-04', '2024-04-13');


-- tabla de ingrediente
-- drop table db_pasteles.ingrediente;
create table db_pasteles.ingrediente(
	id_ingrediente int auto_increment primary key,
    nombre varchar(50) not null,
    descripcion varchar(50) not null,
    fecha_ingreso date not null,
	fecha_vencimiento date not null
);
insert into db_pasteles.ingrediente(nombre, descripcion, fecha_ingreso, fecha_vencimiento) values ('fresas','fresas frescas','2024-04-03','2024-04-15');
insert into db_pasteles.ingrediente(nombre, descripcion, fecha_ingreso, fecha_vencimiento) values ('Chocolate','chocolate negro','2024-04-03','2024-12-15');
insert into db_pasteles.ingrediente(nombre, descripcion, fecha_ingreso, fecha_vencimiento) values ('melocotones','melocotones en almibar','2024-04-03', '2024-10-15');


-- tabla pastel_ingredientes
-- drop table db_pasteles.pastel_ingredientes;
create table db_pasteles.pastel_ingredientes(
	id_paste_ingrediente int auto_increment primary key,
    id_pastel int not null,
    id_ingrediente int not null,
    FOREIGN KEY (id_pastel) REFERENCES pastel(id_pastel),
    FOREIGN KEY (id_ingrediente) REFERENCES ingrediente(id_ingrediente)
);

-- select * from db_pasteles.pastel;
-- select * from db_pasteles.ingrediente;