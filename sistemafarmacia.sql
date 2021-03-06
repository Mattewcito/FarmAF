-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2022 a las 01:50:18
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
  `telefono` int(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `sexo` varchar(45) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellidos`, `dni`, `telefono`, `correo`, `sexo`, `avatar`, `estado`) VALUES
(4, 'Pedro ', 'Martinez', 2147483647, 2147483646, 'as32321art@gmail.com', 'Masculino', 'prov_default.png', 'A'),
(5, 'Mariana', 'Cecilia', 5465451, 2147483647, 'matri123@gmail.com', 'Femenino', 'prov_default.png', 'A'),
(6, 'Felipe', 'Suarza', 24546334, 313552122, 'braezapata11@misena.edu.com', 'Masculino', 'prov_default.png', 'A'),
(7, 'David', 'Fergunso', 10035464, 2147483647, 'julivel@noraver.com', 'Masculino', 'prov_default.png', 'A'),
(8, 'Wendy', 'Sulca', 2147483647, 353423132, 'emaloso25@gmail.com', 'Femenino', 'prov_default.png', 'A'),
(9, 'Pedro', 'Escamoso', 4329378, 2147483647, '', 'Masculino', 'prov_default.png', 'A'),
(10, 'Mario', 'Alfonso', 2147483647, 2147483647, '', 'Hombre', 'prov_default.png', 'A');

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
(23, 'Laboratorios Ecar S A ', '6293df4b01501-ecar.webp', 'A'),
(25, 'Pfizer', '6293e05bb077d-Pfizer-logo.png', 'A'),
(26, 'MK', '6293dfeaabd40-LOGO-MK2-300x300.png', 'A'),
(27, 'JGB', '6293e09613d84-JGB-logo.png', 'A'),
(28, 'Construlaf S A S', '62954f93b8595-Captura.JPG', 'A'),
(29, 'Tecnoquímica', '6293e10e8f2c2-tecnoquimicas.jpg', 'A'),
(30, 'Genomma Lab', '6293e1509b49e-unnamed.jpg', 'A'),
(31, 'Farmabio S A S', '6293e17093c73-Farmabio.png', 'A'),
(32, 'Vichy ', '6293e1a2cff5e-kisspng-vichy-idalia-smoothness-and-glow-energizing-crea-electron-5b48e18e156de4.1980454415315029900878.jpg', 'A'),
(33, 'Genfar', '6293e1c3295ca-GENFAR.png', 'A'),
(35, 'PORTUGAL', '6293e213cf1e7-412__loggo08.png', 'A');

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
  `estado` varchar(10) NOT NULL DEFAULT 'A',
  `precio_compra` float NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(8, 'TABLETA', 'A'),
(9, 'JABÓN LÍQUIDO', 'A'),
(10, 'CHAMPÚ', 'A'),
(11, 'LOCIÓN', 'A'),
(12, 'ESPUMA', 'A'),
(13, 'SOLUCIÓN TÓPICA', 'A'),
(14, 'UNGÜENTO', 'A'),
(15, 'CREMA TOPICA', 'A'),
(16, 'SOLUCIÓN', 'A'),
(17, 'TABLETA DE LIBERACIÓN PROLONGADA', 'A'),
(18, 'CÁPSULA BLANDA', 'A'),
(19, 'CÁPSULA', 'A'),
(20, 'TABLETA MASTICABLE', 'A'),
(21, 'POLVO EFERVESCENTE', 'A'),
(22, 'POLVO PARA RECONSTITUIR A SOLUCIÓN ORAL', 'A'),
(23, 'TABLETA EFERVESCENTE', 'A'),
(24, 'GRANULADO', 'A'),
(25, 'TABLETA LACADA', 'A'),
(26, 'ESPUMA TÓPICA EN AEROSOL', 'A'),
(27, 'SOLUCIÓN BUCOFARÍNGEA', 'A'),
(28, 'POLVO TÓPICO', 'A'),
(29, 'TALCO SECO EN AEROSOL', 'A'),
(30, 'SUSUPENSIÓN EN AEROSOL', 'A'),
(31, 'GEL TÓPICO.', 'A'),
(32, 'LIOFILIZADO PARA SOLUCIÓN BEBIBLE', 'A'),
(33, 'CÁPSULA DURA', 'A'),
(34, 'TABLETA RECUBIERTA', 'A'),
(35, 'GOTAS – SOLUCIÓN ORAL', 'A'),
(36, 'LIQUIDO', 'A'),
(37, 'pruebaa', 'I');

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
(15, 'Acetaminofen', '500 MG', 'null', 1000, '6293e9e8e72a2-128968-1-ACETAMINOFEN-FORTE-500+65MG-TAB-CAJ-X-16-MK.jpg', 'A', 33, 12, 8),
(16, 'Ibuprofeno ', '200 MG', '', 43000, '6295270e2c41e-large-83000431_IBUPROFENO_800MG_TABX10_GF_Blister.jpg', 'A', 27, 12, 34),
(17, 'Ambroxol', '200 ML', 'Con receta medica', 16000, '6293e9fb7e80d-97481_1_RP_AMBROXOL_15MG_5ML_SOL_ORAL_FCO_X_120ML_MK.jpg', 'A', 26, 12, 16),
(18, 'Guaifenesina', '240 ML', 'Con receta medica', 19000, '629526e93398e-318708.png', 'A', 27, 12, 36),
(19, 'Naproxeno', '500 MG', '', 5800, '6295278a0ffd8-unnamed (3).jpg', 'A', 33, 12, 18),
(20, 'Gaviscon', '300 ML', 'Doble acción y suscepción oral', 56000, '629526bbd262a-61j67d8qUuS._AC_SX425_.jpg', 'A', 30, 13, 36),
(21, 'Maalox', '120 ML', '', 54000, '629527714e4dd-unnamed (2).jpg', 'A', 23, 13, 36),
(22, 'Loratadina', '10 MG', '', 1200, '62952749cf782-unnamed (1).jpg', 'A', 30, 15, 20),
(23, 'Vitamina C', '50 MG', 'null', 1900, '629527a71340a-110896-1-VITA-C-500MG-TAB-MAST-CAJ-X-100-MK-NARANJA.jpg', 'A', 27, 18, 20),
(24, 'Condones', '', 'Durex', 6000, '629424ca6c326-Captura.JPG', 'A', 30, 18, 14),
(28, 'Alcohol', '200 ML', 'null', 6500, '6293e9f3645e2-large-81000880_ALCOHOL_ANTISEPTICO_JGB_700ML.jpg', 'A', 27, 18, 36);

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
(16, 'Químicos Campota Y Cía. Ltda.', 2147483647, 'Qimini@info.com', 'CL 99DD INT 11', '629529a8c5329-449-1920w.png', 'A'),
(17, 'Drogas Calidad', 2147483647, 'drogate@gmail.com', 'Cl. 54 #47-29', '6293eb8c17163-1015235.jpeg', 'A'),
(18, 'Verona Drogueria', 2147483647, 'verona@info.com', 'Atiende en Medellín desde su sede principal en Bel', '6293eb937bcfd-1007925.jpeg', 'A'),
(19, 'Reprefarcos S.A.S.', 2147483647, '', 'Cra 3a  Bis # 21 a A-14 7', '629529d47ff43-descarga.jpg', 'A'),
(20, 'Deposito De Drogas Monaco S A, ANTIOQUIA', 2147483647, '', 'Cl. 46 #45-47', '6295284c3ae5e-descarga.png', 'A'),
(21, 'Distribuidora De Medicamentos Dismedvital S A S', 2147483647, '', 'CARRERA 52 35 58, MEDELLIN, ANTIOQUIA', '629528a7de57c-Proveedores_Home_Distrimedical_8.png', 'A'),
(22, 'Distribuidora De Medicamentos Gold Medical S A S', 2147483647, '', 'CARRERA 84 43 54 IN 201', '629529029cf1c-cropped-LOGO-CENTRO-MEDICO.png', 'A'),
(23, 'Deposito De Medicamentos Hospitalarios S A S', 2147483647, '', ' TRANSVERSAL 6 45 135, MEDELLIN, ANTIOQUIA', '62952968d2ae7-logo-sumintegral-01.jpg', 'A');

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
(12, 'Analgésicos', 'A'),
(13, 'Antiácidos ', 'A'),
(14, 'antiulcerosos', 'A'),
(15, 'Antialérgicos', 'A'),
(16, 'Antidiarreicos ', 'A'),
(17, 'laxantes', 'A'),
(18, 'Antiinfecciosos', 'A'),
(19, 'Antiinflamatorios', 'A'),
(20, 'Antipiréticos', 'A'),
(21, 'Antitusivos ', 'A'),
(22, 'mucolíticos', 'A');

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
(2, 'Trabajador'),
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
(1, 'Brayan', 'Zapata', '1992-10-14', 'root', '$2y$10$2c0L7Dv7PQLcEbfmrhUeIOkmj7BK66gIpdZaY.jSR4gAAqy5wM5he', '3017245403', 'CR 99DD CL 107 ', 'brianmer242003@gmail.com', 'Masculino', 'Gerente de la Asunción', '62aa36755b82b-cover_program-farmaceutico.png', 3),
(13, 'Emanuel ', 'López', '2003-01-25', 'Emanuel', '$2y$10$vDFBmCMT8doVoJ3WoCY9GecQgj/3ZnfKkYguqhYYNSaAbOK0mdv8K', '3018912131', 'calle 46 #20-20', 'brianmer242003@gmail.com\n', 'Masculino', '', '62aa36ede346d-cover_program-farmaceutico.png', 1),
(15, 'Juliana', 'Velásquez', '1994-07-19', 'Juliana', '$2y$10$rGubLDBqxHU9vEsSBWaUbeKZkvvfmqmCE3IpVjTznahUx6FNKizx2', '313235231313', 'calle 50A #16-54', 'brianmer242003@gmail.com\n', 'Femenino', '', '62aa3758a30d0-perfil-farmaceutica-espana.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `dni` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `estado_pago`
--
ALTER TABLE `estado_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id_laboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id_presentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tip_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tipo_us`
--
ALTER TABLE `tipo_us`
  MODIFY `id_tipo_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  MODIFY `id_ventaproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `lote_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
