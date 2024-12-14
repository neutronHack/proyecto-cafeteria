CREATE DATABASE cafeteria;

USE cafeteria;


CREATE TABLE metodopago (
    id_metodoPago INT PRIMARY KEY,
    TipoMetodo VARCHAR(50),
    DetallesPago VARCHAR(200),
    id_Usuario INT,
    FOREIGN KEY (id_Usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE usuario (
    id_usuario INT PRIMARY KEY,
    id_Rol INT,
    nombre VARCHAR(50),
    PrimerApellido VARCHAR(50),
    SegundoApellido VARCHAR(50),
    CorreoElectronico VARCHAR(50),
    contrasena VARCHAR(100),
    Telefono VARCHAR(20),
    Direccion VARCHAR(200),
    FOREIGN KEY (id_Rol) REFERENCES roles(id_Rol)
);

CREATE TABLE roles (
    id_Rol INT PRIMARY KEY,
    Rol VARCHAR(50)
);

CREATE TABLE producto (
    id_producto INT PRIMARY KEY,
    nombreProducto VARCHAR(100),
    Descripcion VARCHAR(500),
    Precio DECIMAL(10, 2),
    Zona_origen VARCHAR(100),
    StockDisponible INT,
    id_categoria INT,
    fecha_ingreso DATE,
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);

CREATE TABLE categoria (
    id_categoria INT PRIMARY KEY,
    nombre_categoria VARCHAR(100)
);

CREATE TABLE pedido (
    id_pedido INT PRIMARY KEY,
    id_usuario INT,
    id_producto INT,
    Cantidad_Producto INT,
    direccionEnvio VARCHAR(200),
    Total DECIMAL(10, 2),
    Estado_Pedido VARCHAR(50),
    FechaPedido DATE,
    FechaEnviado DATE,
    metodoPago INT,
    FechaLlegada DATE,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
    FOREIGN KEY (metodoPago) REFERENCES metodopago(id_metodoPago)
);

CREATE TABLE factura (
    id_factura INT PRIMARY KEY,
    id_pedido INT,
    numero_factura VARCHAR(50),
    fecha_emision DATE,
    forma_pago VARCHAR(50),
    subtotal DECIMAL(10, 2),
    impuestos DECIMAL(10, 2),
    Total DECIMAL(10, 2),
    FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido)
);


-- Insertar datos en la tabla roles

INSERT INTO cafeteria.roles (id_Rol, Rol) 
VALUES (1, 'Administrador'), (2, 'Cliente');


-- Insertar datos en la tabla usuario

INSERT INTO cafeteria.usuario (id_usuario, id_Rol, nombre, PrimerApellido, SegundoApellido, CorreoElectronico, contrasena, Telefono, Direccion) 
VALUES (1, 1, 'Jimmy', 'Cabalceta', 'Alpizar', 'jimmy@mail.com', 'jimmy123', '12345678', 'Calle 123, Ciudad Colon');

INSERT INTO cafeteria.usuario (id_usuario, id_Rol, nombre, PrimerApellido, SegundoApellido, CorreoElectronico, contrasena, Telefono, Direccion) 
VALUES (2, 2, 'Ulfet', 'Arac', 'Arac', 'ulfet@mail.com', 'ulfet123', '80804040', 'Calle 5, Calle blancos');

INSERT INTO cafeteria.usuario (id_usuario, id_Rol, nombre, PrimerApellido, SegundoApellido, CorreoElectronico, contrasena, Telefono, Direccion) 
VALUES (3, 1, 'Daniela', 'Fallas', 'Porras', 'Daniela@mail.com', 'daniela123', '50506060', 'Calle Santos, Perez Zeledon');

INSERT INTO cafeteria.usuario (id_usuario, id_Rol, nombre, PrimerApellido, SegundoApellido, CorreoElectronico, contrasena, Telefono, Direccion) 
VALUES (4, 2, 'Gabriel', 'Ruiz', 'Mendez', 'Gabo@mail.com', 'gabo123', '70709090', 'Calle cruz, Desamparados');


INSERT INTO cafeteria.categoria (id_categoria, nombre_categoria) 
VALUES 
(1, 'Cafe'), 
(2, 'Accesorios');



-- Insertar Productos

INSERT INTO cafeteria.producto (id_producto, nombreProducto, Descripcion, Precio, StockDisponible, id_productor, id_categoria, fecha_ingreso, Zona_origen) VALUES 
(1, 'Cafe Don Lucas Geisha', 'Cafe Don Lucas Geisha, 450 gramos', 15.00, 100, 1, 1, CURDATE(), 'Los Santos'),
(3, 'Cafe Haug', 'Cafe Haug, 350 gramos', 12.00, 100, 1, 1, CURDATE(), 'Los Santos'),
(4, 'Cafe Quetzal', 'Cafe Quetzal, 500 gramos', 11.50, 100, 1, 1, CURDATE(), 'Los Santos'),
(5, 'Cafe reserva', 'Cafe reserva, 340 gramos', 15.00, 100, 1, 1, CURDATE(), 'Los Santos'),
(6, 'Cafe 1820 Clasico', 'Cafe 1820 Clasico, 500 gramos', 8.50, 100, 1, 1, CURDATE(), 'Los Santos'),
(7, 'Cafe Leyenda Clasico', 'Cafe Leyenda Clasico, 500 gramos', 5.50, 100, 1, 1, CURDATE(), 'Los Santos'),
(8, 'Termo cafe', 'Termo cafe, Acero inox, 1 litro', 12.00, 50, 1, 2, CURDATE(), 'Los Santos'),
(9, 'Prensa francesa', 'Prensa francesa, 600ml', 15.00, 50, 1, 2, CURDATE(), 'Los Santos'),
(10, 'Juego de tazas', 'Juego de tazas', 10.00, 50, 1, 2, CURDATE(), 'Los Santos'),
(11, 'Espumadores', 'Espumadores', 10.00, 50, 1, 2, CURDATE(), 'Los Santos'),
(12, 'Chorreador', 'Chorreador', 8.00, 50, 1, 2, CURDATE(), 'Los Santos'),
(13, 'CoffeMaker', 'CoffeMaker', 30.00, 50, 1, 2, CURDATE(), 'Los Santos'),
(14, 'Hervidor', 'Hervidor', 20.00, 50, 1, 2, CURDATE(), 'Los Santos'),
(15, 'Filtros cafe', 'Filtros cafe', 2.50, 50, 1, 2, CURDATE(), 'Los Santos');



-- Insertar MetodoPago

INSERT INTO cafeteria.metodopago 
(id_metodoPago, TipoMetodo, DetallesPago, id_Usuario) 
VALUES (1, 'PayPal', 'paypal@example.com', 1);



-- Insertar pedido

INSERT INTO cafeteria.pedido (id_pedido, id_usuario, id_producto, Cantidad_Producto, direccionEnvio, metodoPago, Total, Estado_Pedido, FechaPedido, FechaEnviado, FechaLlegada) 
VALUES 
(1, 1, 1, 2, 'Calle 123, Ciudad Colon', 'PayPal', 30.00, 'Procesado', '2024-01-10', '2024-01-11', '2024-01-15'), (2, 2, 2, 1, 'Calle 5, Calle blancos', 'PayPal', 10.00, 'Enviado', '2024-01-12
', '2024-01-13', '2024-01-17');



-- insertar factura

INSERT INTO cafeteria.factura (id_factura, id_pedido, numero_factura, fecha_emision, forma_pago, subtotal, impuestos, Total) VALUES (1, 1, 'F-001', '2024-01-10', CURDATE(), 30.00, 1.00, 31.00);
