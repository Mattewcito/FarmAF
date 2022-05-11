-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2022 a las 06:42:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemafarmacia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `dni` int(45) DEFAULT NULL,
  `edad` date NOT NULL,
  `telefono` int(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `sexo` varchar(45) NOT NULL,
  `adicional` varchar(500) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellidos`, `dni`, `edad`, `telefono`, `correo`, `sexo`, `adicional`, `avatar`, `estado`) VALUES
(1, 'Juan Diego', 'Herrera Lopez', 15563221, '1993-11-03', 301754086, 'JuanLopzzz@gmail.com', 'Masculino', NULL, NULL, 'A'),
(2, 'Pablo', 'Vasquez', 48978, '1992-04-04', 2723128, 'pablovasquez@gmail.com', 'Masculino', 'Cliente frecuente', 'prov_default.png', 'A'),
(3, 'Dylan', 'Gomez', 10204569, '1993-05-28', 2996587, 'dylango19@gmail.com', 'Masculino', 'Nuevo cliente', 'prov_default.png', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `total` float NOT NULL,
  `id_estado_pago` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `codigo`, `fecha_compra`, `fecha_entrega`, `total`, `id_estado_pago`, `id_proveedor`) VALUES
(1, '98745', '2022-05-04', '2022-05-12', 20500, 1, 7),
(2, '123589', '2022-05-04', '2022-05-06', 56000, 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle` int(11) NOT NULL,
  `det_cantidad` int(11) NOT NULL,
  `det_vencimiento` date NOT NULL,
  `id__det_lote` int(11) NOT NULL,
  `id__det_prod` int(11) NOT NULL,
  `lote_id_prov` int(11) NOT NULL,
  `id_det_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle`, `det_cantidad`, `det_vencimiento`, `id__det_lote`, `id__det_prod`, `lote_id_prov`, `id_det_venta`) VALUES
(2, 5, '2022-06-24', 29, 7, 8, 11),
(3, 5, '2022-06-24', 29, 7, 8, 12),
(4, 5, '2022-07-28', 28, 7, 8, 13),
(11, 4, '2022-06-24', 26, 2, 8, 19),
(12, 6, '2022-07-28', 28, 7, 8, 19),
(13, 1, '2022-07-28', 28, 7, 8, 20),
(14, 1, '2022-06-24', 26, 2, 8, 21),
(15, 1, '2022-07-28', 28, 7, 8, 22),
(17, 2, '2022-06-24', 26, 2, 8, 24),
(18, 7, '2022-07-28', 28, 7, 8, 24),
(20, 1, '2022-06-24', 26, 2, 8, 30),
(21, 1, '2022-07-28', 28, 7, 8, 34),
(22, 1, '2022-06-24', 26, 2, 8, 37),
(23, 1, '2022-06-24', 26, 2, 8, 38),
(24, 2, '2022-07-09', 25, 2, 8, 38),
(25, 1, '2022-07-09', 25, 2, 8, 39),
(26, 2, '2022-07-09', 25, 2, 8, 40),
(27, 1, '2021-10-15', 30, 8, 8, 41),
(28, 6, '2022-07-28', 28, 7, 8, 42),
(29, 14, '2021-10-15', 30, 8, 8, 43),
(30, 12, '2022-07-28', 28, 7, 8, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pago`
--

CREATE TABLE `estado_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_pago`
--

INSERT INTO `estado_pago` (`id`, `nombre`) VALUES
(1, 'cancelado'),
(2, 'No cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id_laboratorio` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`id_laboratorio`, `nombre`, `avatar`, `estado`) VALUES
(1, 'Pfizer', '6222c67b1237a-2.jpeg', 'A'),
(2, 'Heel', '622aa9ab82a4e-heel-logo-dos-tintas.jpg', 'A'),
(3, 'BAYER', '6222c6c509a63-bayer.jpeg', 'A'),
(4, 'JGB', '6230f2ae9e1e3-622f8d186b44d-JGB-logo.png', 'A'),
(8, 'Yoma lab', '6230a9ba9d9d3-8.gif', 'A'),
(10, 'Natural feeling', '6230f6b865c33-feeling-150x117.jpg', 'A'),
(11, 'Nosotras', '6230f62f97269-512-512-9ca0a675363d8521cc871b0faa79f794.png', 'A'),
(12, 'Nosotras loving', '6230f6e45282f-descarga.png', 'A'),
(13, 'Mk', '6230f6f96bac5-622f8cec8ae5c-1771cc7f-2319-4fea-9381-0c63a0c9ba6a.jpg', 'A'),
(21, 'GENFAR', '6230fb03a2ef7-descarga.jpg', 'A'),
(22, 'x', 'lab_default.jpg', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidad_lote` int(11) NOT NULL,
  `vencimiento` date NOT NULL,
  `precio_compra` float NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id`, `codigo`, `cantidad`, `cantidad_lote`, `vencimiento`, `precio_compra`, `id_compra`, `id_producto`) VALUES
(1, '123658', 1, 1, '2022-05-27', 20500, 2, 8),
(2, '987423', 1, 1, '2022-06-04', 56000, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `id_presentacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`id_presentacion`, `nombre`, `estado`) VALUES
(1, 'Tabletas', 'A'),
(3, 'Frasco', 'A'),
(4, 'Ampolla', 'A'),
(5, 'Blister x 10', 'A'),
(6, 'Frasco ampolla', 'A'),
(7, 'xxx', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `concentracion` varchar(250) NOT NULL,
  `adicional` varchar(250) NOT NULL,
  `precio` float NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A',
  `prod_lab` int(11) NOT NULL,
  `prod_tip_prod` int(11) NOT NULL,
  `prod_present` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `concentracion`, `adicional`, `precio`, `avatar`, `estado`, `prod_lab`, `prod_tip_prod`, `prod_present`) VALUES
(2, 'cetirizina', '10ml', 'pastillas', 1300, '6230fa0b68a8b-cetirizina-10mg-10und.jpg', 'A', 21, 1, 1),
(4, 'Omeprazol', '20mg', 'pastilla', 5500, '6230fa77d6955-omeprazol-20mg-10und.jpg', 'A', 21, 1, 1),
(5, 'Sucralfato', '20g/100ml', 'Administración oral', 71000, '6230fa9cf2f78-144481-1-SUCRALFATO-1GR-5ML-SUSP-ORAL-FCO-X-200ML-GENFAR.jpg', 'A', 21, 1, 3),
(6, 'Metoclopramida', '5mg/1mL', 'Es un antiemético', 6800, '625f7bfa2b2c8-6230fa4e2998a-95230_1_METOCLOPRAMIDA_10MG_TAB_CAJ_X_30_AMER_GEN.jpg', 'A', 3, 1, 1),
(7, 'Glimepirida', '4mg', 'Antidiabético oral', 56000, '6230fa2d7add7-96909-1-GLIMEPIRIDA-4MG-TAB-CAJ-X-15-MK.jpg', 'A', 13, 1, 1),
(8, 'Atropina (clorhidrato)', '1 mg/mL', 'pastillas', 20500, '6230f9da1bcf1-atropina-600x600.png', 'A', 4, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `telefono`, `correo`, `direccion`, `avatar`, `estado`) VALUES
(3, 'Mk', 4444441, '', 'CARRERA  46 N° 51-58/ BOGOTA: CARRERA 71 NUMERO 48', '6246434c829df-logo-mk.png', 'A'),
(4, 'noraver', 4444441, 'julivel@noraver.com', 'Cra 3a  Bis # 21 a A-14 7 D 22 CC Gran Plaza ', '6246434058ba7-noraver.png', 'A'),
(6, 'Genfar', 4444441, 'so25@gmail.com', 'calle 50A numero 41 47', '62464335bd5d8-GENFAR.png', 'A'),
(7, 'JGB', 2394136, 'asasacs@gmai.com', 'CARRERA  46 N° 51-58/ BOGOTA: CARRERA 71 NUMERO 48', '62464329efd8b-JGB-logo.png', 'A'),
(8, 'Bayer', 2394136, 'so25@gmail.com', 'TRANSVERSAL  93 Nº 51 - 98 BLOQUE E1 PISO', '6246431ee324a-bayer.png', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tip_prod` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tip_prod`, `nombre`, `estado`) VALUES
(1, 'Inyectable', 'A'),
(2, 'Comprimido', 'A'),
(4, 'Cápsula', 'A'),
(7, 'Liquido oral', 'A'),
(9, 'Polvo oral', 'A'),
(10, 'Cápsula blanda', 'A'),
(11, 'xx', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_us`
--

CREATE TABLE `tipo_us` (
  `id_tipo_us` int(11) NOT NULL,
  `nombre_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_us`
--

INSERT INTO `tipo_us` (`id_tipo_us`, `nombre_tipo`) VALUES
(1, 'Administrador'),
(2, 'Tecnico'),
(3, 'Root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_us` varchar(50) NOT NULL,
  `apellidos_us` varchar(50) NOT NULL,
  `edad` date NOT NULL,
  `dni_us` varchar(45) NOT NULL,
  `contrasena_us` varchar(255) NOT NULL,
  `telefono_us` varchar(20) DEFAULT NULL,
  `residencia_us` varchar(45) DEFAULT NULL,
  `correo_us` varchar(25) DEFAULT NULL,
  `sexo_us` varchar(25) DEFAULT NULL,
  `adicional_us` varchar(500) DEFAULT NULL,
  `avatar` varchar(250) NOT NULL,
  `us_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_us`, `apellidos_us`, `edad`, `dni_us`, `contrasena_us`, `telefono_us`, `residencia_us`, `correo_us`, `sexo_us`, `adicional_us`, `avatar`, `us_tipo`) VALUES
(1, 'Brayan', 'Zapata', '1996-10-14', 'root', '$2y$10$R9pcV1uvoaU7lUbP3A.jT.JHYyEXXxTI33s11LU.htzlQPwz/zd1W', '3017245403', 'calle 46 #20-20', 'brianmer242003@gmail.com', 'Masculino', 'Ing sistemas', '625f6519d1763-624f70c21a70a-icon-5359553_960_720.webp', 3),
(2, 'Manuel ', 'Gonzales', '1997-05-15', 'manuel', '$2y$10$htEFMffJxGWogZVHYQIc/.yK9Jl2jyM/mj91O180IRAbpxTeejvH6', '2312589', 'calle 50A #16-54', 'manugon@gmail.com', 'Masculino', 'Amante del futbol ', '624f711720f2e-images.png', 1),
(3, 'Daniel', 'perez ', '1994-07-19', 'daniel', '$2y$10$eyuoKHB2GZuj1n6DjH7nAesgyTg9Xvt5NP9WOPpvVbCMmnoTBVgTy', NULL, NULL, NULL, NULL, NULL, '624f743c7eb85-icono-del-usuario-en-estilo-plano-de-moda-aislado-fondo-gris-símbolo-123663211.jpg', 2),
(5, 'Michelle', 'Echeverri Gomez', '1992-09-17', 'michelle', '$2y$10$88mVA.iVVyZmTyu6z6aAkOBUx3hxLmNRi0pB/RLyJDvUQv/vOAQ6K', NULL, NULL, NULL, NULL, NULL, '624f71d91163d-images.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `dni` int(11) NOT NULL,
  `total` float NOT NULL,
  `vendedor` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha`, `cliente`, `dni`, `total`, `vendedor`, `id_cliente`) VALUES
(8, '2022-04-01 16:19:27', 'Ernesto perez', 0, 36400, 1, NULL),
(9, '2022-03-01 16:25:21', 'FRAILEJON', 1234, 2600, 1, NULL),
(11, '2022-04-01 17:11:45', 'Andrea', 0, 280000, 3, NULL),
(12, '2022-03-01 17:12:33', 'ema', 0, 280000, 1, NULL),
(13, '2022-04-01 17:13:23', 'steven', 0, 280000, 5, NULL),
(19, '2022-04-02 19:27:39', 'Mario Ruiz', 13232, 341200, 5, NULL),
(20, '2022-04-02 19:41:51', 'Dario', 23232, 56000, 1, NULL),
(21, '2022-04-02 19:42:15', 'Andrea', 123, 1300, 2, NULL),
(22, '2022-04-02 19:42:40', 'Lucas', 21133, 56000, 5, NULL),
(24, '2022-02-02 19:44:09', 'Daniel Cardona', 1232323, 394600, 1, NULL),
(26, '2022-03-06 17:34:36', 'Juana Martinez', 429625, 69000, 1, NULL),
(30, '2022-04-07 00:36:30', 'xxxx', 0, 1300, 1, NULL),
(34, '2022-03-07 00:49:03', 'xxx3', 0, 56000, 1, NULL),
(35, '2022-04-02 19:42:15', 'Andrea', 123, 1300, 2, NULL),
(36, '2022-02-02 19:44:09', 'Daniel Cardona', 1232323, 394600, 2, NULL),
(37, '2022-04-15 21:56:37', 'Brayan Daniel', 32434343, 1300, 1, NULL),
(38, '2022-04-19 08:15:24', 'fdkfdfdfdf', 32434343, 3900, 1, NULL),
(39, '2022-04-19 21:11:23', 'asasdas', 0, 1400, 1, NULL),
(40, '2022-04-19 21:52:57', 'x', 0, 2600, 1, NULL),
(41, '2022-04-26 21:46:27', '', 0, 20500, 1, 2),
(42, '2022-04-28 11:51:17', '', 0, 336000, 1, 1),
(43, '2022-04-28 11:51:44', '', 0, 959000, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_producto`
--

CREATE TABLE `venta_producto` (
  `id_ventaproducto` int(11) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `venta_id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta_producto`
--

INSERT INTO `venta_producto` (`id_ventaproducto`, `precio`, `cantidad`, `subtotal`, `producto_id_producto`, `venta_id_venta`) VALUES
(2, 0, 28, 36400, 2, 8),
(3, 0, 2, 2600, 2, 9),
(5, 0, 5, 280000, 7, 11),
(6, 0, 5, 280000, 7, 12),
(7, 0, 5, 280000, 7, 13),
(13, 0, 4, 5200, 2, 19),
(14, 0, 6, 336000, 7, 19),
(15, 0, 1, 56000, 7, 20),
(16, 0, 1, 1300, 2, 21),
(17, 0, 1, 56000, 7, 22),
(19, 0, 2, 2600, 2, 24),
(20, 0, 7, 392000, 7, 24),
(22, 0, 1, 1300, 2, 30),
(23, 0, 1, 56000, 7, 34),
(24, 0, 1, 1300, 2, 37),
(25, 0, 3, 3900, 2, 38),
(26, 1400, 1, 1400, 2, 39),
(27, 1300, 2, 2600, 2, 40),
(28, 20500, 1, 20500, 8, 41),
(29, 56000, 6, 336000, 7, 42),
(30, 20500, 14, 287000, 8, 43),
(31, 56000, 12, 672000, 7, 43);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estado_pago` (`id_estado_pago`,`id_proveedor`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_det_venta` (`id_det_venta`);

--
-- Indices de la tabla `estado_pago`
--
ALTER TABLE `estado_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id_laboratorio`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`id_presentacion`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `prod_lab` (`prod_lab`,`prod_tip_prod`,`prod_present`),
  ADD KEY `prod_tip_prod` (`prod_tip_prod`),
  ADD KEY `prod_present` (`prod_present`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tip_prod`);

--
-- Indices de la tabla `tipo_us`
--
ALTER TABLE `tipo_us`
  ADD PRIMARY KEY (`id_tipo_us`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `us_tipo` (`us_tipo`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD PRIMARY KEY (`id_ventaproducto`),
  ADD KEY `venta_id_venta` (`venta_id_venta`),
  ADD KEY `producto_id_producto` (`producto_id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `estado_pago`
--
ALTER TABLE `estado_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id_laboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id_presentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tip_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_us`
--
ALTER TABLE `tipo_us`
  MODIFY `id_tipo_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  MODIFY `id_ventaproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_estado_pago`) REFERENCES `estado_pago` (`id`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_det_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `lote_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`prod_tip_prod`) REFERENCES `tipo_producto` (`id_tip_prod`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`prod_present`) REFERENCES `presentacion` (`id_presentacion`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`prod_lab`) REFERENCES `laboratorio` (`id_laboratorio`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`us_tipo`) REFERENCES `tipo_us` (`id_tipo_us`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`vendedor`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD CONSTRAINT `venta_producto_ibfk_1` FOREIGN KEY (`venta_id_venta`) REFERENCES `venta` (`id_venta`),
  ADD CONSTRAINT `venta_producto_ibfk_2` FOREIGN KEY (`producto_id_producto`) REFERENCES `producto` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
