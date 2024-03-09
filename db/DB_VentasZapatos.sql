-- Crear la base de datos
create database dbzapatos;
-- Seleccionar la db por defecto
use dbzapatos;

-- Crear la tabla de usuarios
create table usuarios(
	idusuario int primary key auto_increment,
	nombre varchar(60) not null,
    apellido varchar(60) not null,
    idpuesto int not null,
    email varchar(80) not null,
    clave varchar(800) not null,
    idperfil int not null,
    constraint fk_puestos foreign key (idpuesto) references puestos(idpuesto)
    on update cascade on delete cascade,
	constraint fk_perfil foreign key (idperfil) references perfiles(idperfil)
    on update cascade on delete cascade
);

-- Crear la tabla de puestos
create table puestos(
	idpuesto int primary key auto_increment,
    puesto varchar(60) not null,
    descripcion varchar(200) not null
);

-- Crear la tabla de perfiles
create table perfiles(
	idperfil int primary key auto_increment,
    perfil varchar(50) not null,
    descripcion varchar(200) not null
);

-- Crear la tabla Categorias
create table categorias(
	idcategoria int primary key auto_increment,
    nombre varchar(30) not null,
    descripcion varchar(100) not null
);

-- Crear la tabla Marcas
create table marcas(
	idmarca int primary key auto_increment,
    nombre varchar(30) not null,
    descripcion varchar(100) not null
);

-- Crear la tabla Estatus
create table estatus(
	idestatus int primary key auto_increment,
    nombre varchar(30) not null,
    descripcion varchar(100) not null
);

-- Crear la tabla Estilos
create table estilos(
	idestilo int primary key auto_increment,
    nombre varchar(30) not null,
    descripcion varchar(100) not null
);

-- Crear la tabla Envios
create table envios(
	idenvio int primary key auto_increment,
    tipo_envio varchar(30) not null,
    costo decimal(10,2) not null,
    descripcion varchar(100) not null
);

-- Crear la tabla Pagos
create table pagos(
	idpago int primary key auto_increment,
    tipo_pago varchar(30) not null,
    descripcion varchar(100) not null
);

-- Crear la tabla Clientes
create table clientes(
	idcliente int primary key auto_increment,
    nombre varchar(60) not null,
    apellido varchar(60) not null,
    direccion varchar(200) not null,
    ciudad varchar(50) not null,
    telefono varchar(15) not null,
    email varchar(100) not null,
    idusuario int not null,
	constraint fk_usuario foreign key (idusuario) references usuarios(idusuario)
    on update cascade on delete cascade
);

-- Crear la tabla Clientes
create table empleados(
	idempleado int primary key auto_increment,
    nombre varchar(60) not null,
    apellido varchar(60) not null,
    direccion varchar(200) not null,
    ciudad varchar(50) not null,
    telefono varchar(15) not null,
    email varchar(100) not null,
    idusuario int not null,
	constraint fk_usuario foreign key (idusuario) references usuarios(idusuario)
    on update cascade on delete cascade
);

-- Crear la tabla Productos y claves compuestas
create table productos(
	idproductos int auto_increment,
    nombre varchar(60) not null,
    descripcion varchar(200) not null,
    idcategoria int not null,
    precio decimal(10,2) not null,
    color varchar(15) not null,
    size varchar(15) not null,
    idestilo int not null,
    idmarca int not null,
    existencia int,
    idestatus int not null,
    ft_principal longtext,
    ft_alternative1 longtext,
    ft_alternative2 longtext,
    primary key (idproductos),
    constraint fk_categoria foreign key (idcategoria) references categorias(idcategoria)
     on update cascade on delete cascade,
    constraint fk_estilos foreign key (idestilo) references estilos(idestilo)
     on update cascade on delete cascade,
    constraint fk_marca foreign key (idmarca) references marcas(idmarca)
     on update cascade on delete cascade,
    constraint fk_estatus foreign key (idestatus) references estatus(idestatus)
     on update cascade on delete cascade
);

-- Crear la tabla Factura con claves compuestas
create table facturas(
	idfactura int auto_increment,
    idpago int not null,
    idenvio int not null,
    fecha_factura date not null,
    total_factura decimal(10,2) not null,
    idcliente int not null,
    primary key (idfactura),
    constraint fk_pago foreign key (idpago) references pagos(idpago)
     on update cascade on delete cascade,
    constraint fk_envio foreign key (idenvio) references envios(idenvio)
     on update cascade on delete cascade,
    constraint fk_cliente foreign key (idcliente) references clientes(idcliente)
     on update cascade on delete cascade
);

-- Crear tabla Detalles Factura
create table detallesFactura(
	idDetallesFactura int auto_increment,
	idfactura int not null,
	idproducto int not null,
	cantidad int not null,
	precio decimal(10,2) not null,
	descripcion varchar(200) not null,
	sub_total decimal(10,2) not null,
    primary key (idDetallesFactura),
    constraint fk_factura foreign key (idfactura) references facturas(idfactura)
	on update cascade on delete cascade,
    constraint fk_producto foreign key (idproducto) references productos(idproducto)
    on update cascade on delete cascade
);

-- Crear procedimiento para insertar categorias
DELIMITER $$
create procedure InsertarCategoria(
	in nombre varchar(30),
    in descripcion varchar(100)
)
begin
	insert into categorias (nombre, descripcion) values (nombre, descripcion);
end$$
DELIMITER ;

-- Crear procedimiento para insertar estatus
DELIMITER $$
create procedure InsertarEstatus(
	in nombre varchar(30),
    in descripcion varchar(100)
)
begin
	insert into estatus (nombre, descripcion) values (nombre, descripcion);
end$$
DELIMITER ;

-- Crear procedimiento para insertar envios
DELIMITER $$
create procedure InsertarEnvios(
	in nombre varchar(30),
    in costo decimal(10,2),
    in descripcion varchar(100)
)
begin
	insert into envios (tipo_envio, costo, descripcion) values (nombre, costo, descripcion);
end$$
DELIMITER ;

-- Crear procedimiento para insertar marcas
DELIMITER $$
create procedure InsertarMarcas(
	in nombre varchar(30),
    in descripcion varchar(100)
)
begin
	insert into marcas (nombre, descripcion) values (nombre, descripcion);
end$$
DELIMITER ;

-- Crear procedimiento para insertar estilos
DELIMITER $$
create procedure InsertarEstilos(
	in nombre varchar(30),
    in descripcion varchar(100)
)
begin
	insert into estilos (nombre, descripcion) values (nombre, descripcion);
end$$
DELIMITER ;

-- Crear procedimiento para insertar tiposPagos
DELIMITER $$
create procedure InsertarPagos(
	in tipo_pago varchar(30),
    in descripcion varchar(100)
)
begin
	insert into pagos (tipo_pago, descripcion) values (tipo_pago, descripcion);
end$$
DELIMITER ;

-- Crear procedimiento para insertar Clientes
DELIMITER $$
create procedure InsertarClientes(
	in nombre varchar(60),
    in apellido varchar(60),
    in direccion varchar(200),
    in ciudad varchar(50),
    in telefono varchar(15),
    in email varchar(100)
)
begin
	insert into clientes 
    (nombre, apellido, direccion, ciudad, telefono, email) 
    values 
    (nombre, apellido,direccion,ciudad,telefono,email);
end$$
DELIMITER ;


-- Procedimiento para insertar Productos
DELIMITER $$
create procedure InsertarProductos(
	in nombre varchar(60),
    in descripcion varchar(200),
    in idCategoria int,
    in precio decimal(10,2),
    in color varchar(15),
    in size varchar(15),
    in idEstilo int,
    in idMarca int,
    in Existencia int,
    in idEstatus int
)
begin
	insert into productos 
    (nombre, descripcion, idcategoria, precio, color, size, idestilo, idmarca, existencia, idestatus) 
    values
    (nombre,descripcion,idCategoria,precio,color,size,idEstilo,idMarca,Existencia,idEstatus);
end$$
DELIMITER ;

-- Procedimiento para crear perfiles
DELIMITER $$
create procedure InseratPerfiles(
	in perfil varchar(60),
    in descripcion varchar(200)
)
begin
	insert into perfiles 
    (perfil, descripcion) 
    values 
    (perfil, descripcion);
end$$
DELIMITER ;

-- Procedimiento para crear puestos nuevos
DELIMITER $$
create procedure InsertarPuestos(
	in puesto varchar(60),
    in descripcion varchar(200)
)
begin
	insert into puestos 
    (puesto, descripcion) 
    values 
    (puesto,descripcion);
end$$
DELIMITER ;

-- Procedimiento para crear una factura
DELIMITER $$
create procedure CrearFactura(
	in idpago int,
    in idenvio int,
    in idcliente int,
    in fecha_factura date,
    in total_factura decimal(10,2),
    in idproducto int,
    in cantidad int,
    in precio decimal(10,2),
    in descripcion varchar(200),
    in sub_total decimal(10,2)
)
begin
	insert into facturas 
    (idpago, idenvio, idcliente, fecha_factura, total_factura) 
    values 
    (idpago,idenvio,idcliente,fecha_factura,total_factura);
    
    -- Insertar los datos detalles en la tabla detallesfactura
    insert into detallesfactura 
    (idfactura, idproducto, cantidad, precio, descripcion, sub_total) 
    values 
    ((select max(idfactura) from facturas), idproducto,cantidad,precio,descripcion,sub_total);
end$$
DELIMITER ;

-- Crear procedimiento para validar el usuario
DELIMITER $$
create procedure UserValidate(
	in email varchar(80),
    in clave varchar(800)
)
begin
	select idusuario as 'ID', concat(nombre,' ',apellido) as fullname, 
    idperfil as 'Perfil', email from usuarios where email=email and clave=clave;
end$$
DELIMITER ;

-- Crear procedimiento para listar los zapatos
DELIMITER $$
create procedure VerZapatos(
	in filtro int,
    in valor varchar(35)
)
begin
	
    if filtro=1 then
		select * from productos where color = valor;
	elseif filtro=2 then
		select * from productos where size = valor;
	elseif filtro=3 then
		select * from productos where idestilo = valor;
	elseif filtro=4 then
		select * from productos where idmarca = valor;
	elseif filtro=5 then
		select * from productos where precio between 0 and valor;
	else
		select * from productos;
	end if;
   
end$$
DELIMITER ;

-- Crear procedimiento para ver detalles del zapato
DELIMITER $$
create procedure VerZapatosDetallesID(
	in idproductos int
)
begin
	select * from productos where idproductos=idproductos;
end$$
DELIMITER ;


-- Crear vista de categorias
create view ListarCategorias as
select * from categorias;

-- Crear vista de tipoEnvios
create view ListarEnvios as
select * from envios;

-- Crear vista de Estatus
create view ListarEstatus as
select * from estatus;

-- Crear vista de Estilos
create view ListarEstilos as
select * from estilos;

-- Crear vista de marcas
create view ListarMarcas as
select * from estatus;

-- Crear vista de pagos
create view ListarPagos as
select * from pagos;

-- Crear vista de perfiles
create view ListarPerfiles as
select * from perfiles;

-- Crear vista de puestos
create view ListarPuestos as
select * from puestos;