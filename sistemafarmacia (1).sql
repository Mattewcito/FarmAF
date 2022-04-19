-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2022 a las 00:10:33
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

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
(21, 1, '2022-07-28', 28, 7, 8, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id_laboratorio` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`id_laboratorio`, `nombre`, `avatar`) VALUES
(1, 'Pfizer', '6222c67b1237a-2.jpeg'),
(2, 'Heel', '622aa9ab82a4e-heel-logo-dos-tintas.jpg'),
(3, 'BAYER', '6222c6c509a63-bayer.jpeg'),
(4, 'JGB', '6230f2ae9e1e3-622f8d186b44d-JGB-logo.png'),
(8, 'Yoma lab', '6230a9ba9d9d3-8.gif'),
(10, 'Natural feeling', '6230f6b865c33-feeling-150x117.jpg'),
(11, 'Nosotras', '6230f62f97269-512-512-9ca0a675363d8521cc871b0faa79f794.png'),
(12, 'Nosotras loving', '6230f6e45282f-descarga.png'),
(13, 'Mk', '6230f6f96bac5-622f8cec8ae5c-1771cc7f-2319-4fea-9381-0c63a0c9ba6a.jpg'),
(21, 'GENFAR', '6230fb03a2ef7-descarga.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id_lote` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `vencimiento` date NOT NULL,
  `lote_id_prod` int(11) NOT NULL,
  `lote_id_prov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id_lote`, `stock`, `vencimiento`, `lote_id_prod`, `lote_id_prov`) VALUES
(25, 5, '2022-07-09', 2, 8),
(26, 2, '2022-06-24', 2, 8),
(28, 19, '2022-07-28', 7, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `id_presentacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`id_presentacion`, `nombre`) VALUES
(1, 'Tabletas'),
(3, 'Frasco'),
(4, 'Ampolla'),
(5, 'Blister x 10'),
(6, 'Frasco ampolla');

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
  `prod_lab` int(11) NOT NULL,
  `prod_tip_prod` int(11) NOT NULL,
  `prod_present` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `concentracion`, `adicional`, `precio`, `avatar`, `prod_lab`, `prod_tip_prod`, `prod_present`) VALUES
(2, 'cetirizina', '10ml', 'pastillas', 1300, '6230fa0b68a8b-cetirizina-10mg-10und.jpg', 21, 1, 1),
(4, 'Omeprazol', '20mg', 'pastilla', 5500, '6230fa77d6955-omeprazol-20mg-10und.jpg', 21, 1, 1),
(5, 'Sucralfato', '20g/100ml', 'Administración oral', 71000, '6230fa9cf2f78-144481-1-SUCRALFATO-1GR-5ML-SUSP-ORAL-FCO-X-200ML-GENFAR.jpg', 21, 1, 3),
(6, 'Metoclopramida', '5mg/1mL', 'Es un antiemético', 6800, '6230fa4e2998a-95230_1_METOCLOPRAMIDA_10MG_TAB_CAJ_X_30_AMER_GEN.jpg', 3, 1, 1),
(7, 'Glimepirida', '4mg', 'Antidiabético oral', 56000, '6230fa2d7add7-96909-1-GLIMEPIRIDA-4MG-TAB-CAJ-X-15-MK.jpg', 13, 1, 1),
(8, 'Atropina (clorhidrato)', '1 mg/mL', 'pastillas', 20500, '6230f9da1bcf1-atropina-600x600.png', 4, 1, 5);

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
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `telefono`, `correo`, `direccion`, `avatar`) VALUES
(3, 'Mk', 4444441, '', 'CARRERA  46 N° 51-58/ BOGOTA: CARRERA 71 NUMERO 48', '6246434c829df-logo-mk.png'),
(4, 'noraver', 4444441, 'julivel@noraver.com', 'Cra 3a  Bis # 21 a A-14 7 D 22 CC Gran Plaza ', '6246434058ba7-noraver.png'),
(6, 'Genfar', 4444441, 'so25@gmail.com', 'calle 50A numero 41 47', '62464335bd5d8-GENFAR.png'),
(7, 'JGB', 2394136, 'asasacs@gmai.com', 'CARRERA  46 N° 51-58/ BOGOTA: CARRERA 71 NUMERO 48', '62464329efd8b-JGB-logo.png'),
(8, 'Bayer', 2394136, 'so25@gmail.com', 'TRANSVERSAL  93 Nº 51 - 98 BLOQUE E1 PISO', '6246431ee324a-bayer.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tip_prod` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tip_prod`, `nombre`) VALUES
(1, 'Inyectable'),
(2, 'Comprimido'),
(4, 'Cápsula'),
(7, 'Liquido oral'),
(9, 'Polvo oral'),
(10, 'Cápsula blanda');

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
  `telefono_us` int(11) DEFAULT NULL,
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
(1, 'Brayan', 'Zapata', '1996-10-14', 'root', '$2y$10$oSQYlBG7NCQuzp11/SIX/.El2a3z7p7qi3s9XXjupTYDfAgVnfoMi', 2723128, 'calle 46 #20-20', 'brayzapata@gmail.com', 'Masculino', 'vsdxad', '624f70c21a70a-icon-5359553_960_720.webp', 3),
(2, 'Manuel ', 'Gonzales', '1997-05-15', 'manuel', '$2y$10$htEFMffJxGWogZVHYQIc/.yK9Jl2jyM/mj91O180IRAbpxTeejvH6', 2312589, 'calle 50A #16-54', 'manugon@gmail.com', 'Masculino', 'Amante del futbol ', '624f711720f2e-images.png', 1),
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
  `vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha`, `cliente`, `dni`, `total`, `vendedor`) VALUES
(8, '2022-04-01 16:19:27', 'Ernesto perez', 0, 36400, 1),
(9, '2022-03-01 16:25:21', 'FRAILEJON', 1234, 2600, 1),
(11, '2022-04-01 17:11:45', 'Andrea', 0, 280000, 3),
(12, '2022-03-01 17:12:33', 'ema', 0, 280000, 1),
(13, '2022-04-01 17:13:23', 'steven', 0, 280000, 5),
(19, '2022-04-02 19:27:39', 'Mario Ruiz', 13232, 341200, 5),
(20, '2022-04-02 19:41:51', 'Dario', 23232, 56000, 1),
(21, '2022-04-02 19:42:15', 'Andrea', 123, 1300, 2),
(22, '2022-04-02 19:42:40', 'Lucas', 21133, 56000, 5),
(24, '2022-02-02 19:44:09', 'Daniel Cardona', 1232323, 394600, 1),
(26, '2022-03-06 17:34:36', 'Juana Martinez', 429625, 69000, 1),
(30, '2022-04-07 00:36:30', 'xxxx', 0, 1300, 1),
(34, '2022-03-07 00:49:03', 'xxx3', 0, 56000, 1),
(35, '2022-04-02 19:42:15', 'Andrea', 123, 1300, 2),
(36, '2022-02-02 19:44:09', 'Daniel Cardona', 1232323, 394600, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_producto`
--

CREATE TABLE `venta_producto` (
  `id_ventaproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `venta_id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta_producto`
--

INSERT INTO `venta_producto` (`id_ventaproducto`, `cantidad`, `subtotal`, `producto_id_producto`, `venta_id_venta`) VALUES
(2, 28, 36400, 2, 8),
(3, 2, 2600, 2, 9),
(5, 5, 280000, 7, 11),
(6, 5, 280000, 7, 12),
(7, 5, 280000, 7, 13),
(13, 4, 5200, 2, 19),
(14, 6, 336000, 7, 19),
(15, 1, 56000, 7, 20),
(16, 1, 1300, 2, 21),
(17, 1, 56000, 7, 22),
(19, 2, 2600, 2, 24),
(20, 7, 392000, 7, 24),
(22, 1, 1300, 2, 30),
(23, 1, 56000, 7, 34);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_det_venta` (`id_det_venta`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id_laboratorio`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id_lote`),
  ADD KEY `lote_id_prod` (`lote_id_prod`,`lote_id_prov`),
  ADD KEY `lote_id_prov` (`lote_id_prov`);

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
  ADD KEY `vendedor` (`vendedor`);

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
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id_laboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id_lote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id_presentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tip_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  MODIFY `id_ventaproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_det_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_ibfk_2` FOREIGN KEY (`lote_id_prod`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `lote_ibfk_3` FOREIGN KEY (`lote_id_prov`) REFERENCES `proveedor` (`id_proveedor`);

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
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`vendedor`) REFERENCES `usuario` (`id_usuario`);

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
