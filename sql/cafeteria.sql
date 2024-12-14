-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2024 a las 06:22:14
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

<<<<<<< HEAD
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
=======
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
>>>>>>> 5aa3fe819ea23fc01b877a61f2b460a165aa72aa


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Cafe'),
(2, 'Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `numero_factura` varchar(50) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `forma_pago` varchar(50) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `impuestos` decimal(10,2) DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_pedido`, `numero_factura`, `fecha_emision`, `forma_pago`, `subtotal`, `impuestos`, `Total`) VALUES
(1, 1, 'F-001', '2024-01-10', 'PayPal', 30.00, 1.00, 31.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `Cantidad_Producto` int(11) DEFAULT NULL,
  `direccionEnvio` varchar(200) DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Estado_Pedido` varchar(50) DEFAULT NULL,
  `FechaPedido` date DEFAULT NULL,
  `FechaEnviado` date DEFAULT NULL,
  `FechaLlegada` date DEFAULT NULL,
  `metodoPago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_usuario`, `id_producto`, `Cantidad_Producto`, `direccionEnvio`, `Total`, `Estado_Pedido`, `FechaPedido`, `FechaEnviado`, `FechaLlegada`, `metodoPago`) VALUES
(1, 1, 1, 2, 'Calle 123, Ciudad Colon', 30.00, 'Procesado', '2024-01-10', '2024-01-11', '2024-01-15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombreProducto` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Zona_origen` varchar(100) DEFAULT NULL,
  `StockDisponible` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombreProducto`, `Descripcion`, `Precio`, `Zona_origen`, `StockDisponible`, `id_categoria`, `fecha_ingreso`) VALUES
(1, 'Cafe Don Lucas Geisha', 'Cafe Don Lucas Geisha, 450 gramos', 15.00, 'Los Santos', 100, 1, '2024-12-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_Rol` int(11) NOT NULL,
  `Rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_Rol`, `Rol`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_Rol` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `PrimerApellido` varchar(50) DEFAULT NULL,
  `SegundoApellido` varchar(50) DEFAULT NULL,
  `CorreoElectronico` varchar(50) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `metodoPago` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_Rol`, `nombre`, `PrimerApellido`, `SegundoApellido`, `CorreoElectronico`, `contrasena`, `Telefono`, `Direccion`, `metodoPago`) VALUES
(1, 1, 'Jimmy', 'Cabalceta', 'Alpizar', 'jimmy@mail.com', 'jimmy123', '12345678', 'Calle 123, Ciudad Colon', ''),
(2, 2, 'Ulfet', 'Arac', 'Arac', 'ulfet@mail.com', 'ulfet123', '80804040', 'Calle 5, Calle blancos', ''),
(3, 2, 'jose', 'benavaide', 'sadd', 'dpoawmfa@gmail.copm', '1234', '9999', 'dasdwda', NULL),
(4, 2, 'jose', 'benavaide', 'sadd', 'dpoawmfa@gmail.copm', '1234', '9999', 'dasdwda', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `metodoPago` (`metodoPago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_Rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_Rol` (`id_Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`metodoPago`) REFERENCES `metodopago` (`id_metodoPago`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_Rol`) REFERENCES `roles` (`id_Rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
