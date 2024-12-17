-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2024 a las 21:15:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
  `fecha_emision` date DEFAULT NULL,
  `forma_pago` varchar(50) DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Correo_comprador` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `fecha_emision`, `forma_pago`, `Total`, `Correo_comprador`, `Direccion`) VALUES
(1, '2024-01-10', 'PayPal', 31.00, '', ''),
(2, '0000-00-00', '[value-3]', 0.00, '[value-5]', ''),
(3, '2024-12-14', 'Paypal', 9600.00, 'kspdokap@gmail.com', ''),
(4, '2024-12-14', 'Paypal', 9600.00, 'kspdokap@gmail.com', ''),
(5, '2024-12-14', 'VISA', 53600.00, 'kspdokap@gmail.com', ''),
(6, '2024-12-14', 'VISA', 53600.00, 'kspdokap@gmail.com', ''),
(7, '2024-12-14', 'VISA', 53600.00, 'kspdokap@gmail.com', ''),
(8, '2024-12-14', 'Paypal', 3500.00, 'kspdokap@gmail.com', ''),
(9, '2024-12-14', 'Paypal', 3500.00, 'kspdokap@gmail.com', ''),
(10, '2024-12-14', 'MasterCard', 7000.00, 'kspdokap@gmail.com', ''),
(11, '2024-12-14', 'Paypal', 9600.00, 'kspdokap@gmail.com', ''),
(12, '2024-12-14', 'MasterCard', 7000.00, 'kspdokap@gmail.com', ''),
(13, '2024-12-14', 'MasterCard', 7000.00, 'kspdokap@gmail.com', ''),
(14, '2024-12-17', 'MasterCard', 26100.00, 'ejemplo@gmail.com', ''),
(15, '2024-12-17', 'MasterCard', 38100.00, '', 'sna jose'),
(16, '2024-12-17', 'MasterCard', 20200.00, 'ejemplo@gmail.com', 'sna jose'),
(17, '2024-12-17', 'MasterCard', 58600.00, 'ejemplo@gmail.com', 'sna jose desamparados'),
(18, '2024-12-17', 'Paypal', 21400.00, 'ejemplo@gmail.com', 'San miguel desamparados');

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
(24, 'cafe 1820', '       este es un cafe normal', 15000.00, 'guanacaste', 25, 1, '2024-12-17'),
(25, 'cafe quetzal 550g', 'cafe', 2600.00, 'guanacaste', 30, 1, '2024-12-14'),
(26, 'juego de tazas x4', 'tazas recomendadas para tomar cafe de buena calidad', 5500.00, 'San jose', 20, 1, '2024-12-14');

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
(4, 2, 'jose', 'benavaide', 'sadd', 'dpoawmfa@gmail.copm', '1234', '9999', 'dasdwda', NULL),
(5, 2, 'jose', 'benavaide', 'sadd', 'klkl@gmail.com', 'llll', '9999', 'dasdw', NULL),
(6, 2, 'rqwe', 'rwqe', 'rqwe', 'mm@gmail.com', '1111', '4123', '213213', 'MasterCard'),
(7, 2, 'manuel', 'lopez', 'ramirez', 'ejemplo@gmail.com', '1234', '9999', 'san jose', 'Paypal');

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
  ADD PRIMARY KEY (`id_factura`);

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
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

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
