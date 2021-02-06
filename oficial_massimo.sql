-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-02-2021 a las 07:24:30
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oficial_massimo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comanda`
--

CREATE TABLE `comanda` (
  `idcomanda` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `numeroMesa` int(20) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantedepago`
--

CREATE TABLE `comprobantedepago` (
  `idcomprobante` int(11) NOT NULL,
  `tipocomprobante` int(11) NOT NULL,
  `serie` varchar(4) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `cliente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dni` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idcomanda` int(11) NOT NULL,
  `descuento` double NOT NULL,
  `pago` double NOT NULL,
  `vuelto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecomanda`
--

CREATE TABLE `detallecomanda` (
  `idDetalleComanda` int(11) NOT NULL,
  `idcomanda` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `idpriv` int(10) NOT NULL,
  `idrol` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `privilegio` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`idpriv`, `idrol`, `nombre`, `privilegio`, `url`) VALUES
(1, 3, 'Gestionar Usuarios', 'btnGestionarUsuarios', '../moduloGestionSistema/getUsuarios.php'),
(2, 2, 'Actualizar Carta', 'bntActualizar', '../moduloVentas/getCarta.php'),
(4, 1, 'Emitir Cuenta', 'btnEmitirCuenta', '../moduloVentas/getCuenta.php'),
(5, 3, 'Actualizar Carta', 'bntActualizar', '../moduloVentas/getCarta.php'),
(7, 3, 'Emitir Cuenta', 'btnEmitirCuenta', '../moduloVentas/getCuenta.php'),
(9, 2, 'Emitir Comanda', 'btnEmitirComanda', '../moduloVentas/getComanda.php'),
(10, 1, 'Emitir Boleta', 'btnEmitirBoleta', '../moduloVentas/getBoleta.php'),
(13, 3, 'Emitir Comanda', 'btnEmitirComanda', '../moduloVentas/getComanda.php'),
(14, 3, 'Emitir Boleta', 'btnEmitirBoleta', '../moduloVentas/getBoleta.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `estado` int(1) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `tipo`, `precio`, `estado`, `stock`) VALUES
(1, 'Tequeños', 'entrada', 6, 0, 0),
(2, 'Huancaina', 'entrada', 5, 1, 10),
(3, 'Ocopa', 'entrada', 5, 1, 10),
(4, 'Pastel de Papa al Horno', 'entrada', 3, 1, 20),
(5, 'Causa de Pollo', 'entrada', 15, 1, 15),
(6, 'Palta Rellena', 'entrada', 5, 1, 12),
(7, 'Ceviche', 'entrada', 15, 1, 17),
(8, 'Salpicon de Pollo', 'entrada', 12, 1, 15),
(9, 'Yucas Rellenas', 'entrada', 1, 0, 0),
(10, 'Humita', 'entrada', 1, 0, 0),
(11, 'Seco de Pollo', 'segundo', 6, 0, 0),
(12, 'Estofado de Pollo', 'segundo', 6, 1, 20),
(13, 'Tallarines Rojos', 'segundo', 6, 0, 0),
(14, 'Frejol Panamito', 'segundo', 6, 0, 0),
(15, 'Pescado Frito', 'segundo', 6, 0, 0),
(16, 'Tallarines Veerdes', 'segundo', 6, 0, 0),
(17, 'Escabeche de Pollo', 'segundo', 6, 1, 20),
(18, 'Chanfainita', 'segundo', 6, 0, 0),
(19, 'Lomo Saltado', 'segundo', 6, 0, 0),
(20, 'Arroz Chaufa', 'segundo', 6, 1, 20),
(21, 'Menestron', 'sopa', 2, 0, 0),
(22, 'Aguadito', 'sopa', 6, 0, 0),
(23, 'Caldo de Gallina', 'sopa', 2, 1, 16),
(24, 'Minuta', 'sopa', 2, 1, 12),
(25, 'Sopa de Patas', 'sopa', 2, 1, 10),
(26, 'Chupe de camarones', 'sopa', 2, 0, 0),
(27, 'Te', 'bebida', 1, 0, 0),
(28, 'Cafe', 'bebida', 1, 0, 0),
(29, 'Jugo de Papaya', 'bebida', 4, 0, 0),
(30, 'Jugo Surtido', 'bebida', 4, 0, 0),
(31, 'Chicha', 'bebida', 2, 0, 0),
(32, 'Maracuya', 'bebida', 2, 0, 0),
(33, 'Inka Cola', 'gaseosa', 5, 1, 10),
(34, 'Coca Cola', 'gaseosa', 5, 1, 20),
(35, 'Pepsi', 'gaseosa', 4, 0, 0),
(36, 'Fanta', 'gaseosa', 4, 0, 0),
(37, 'Gordita Inka Cola', 'gaseosa', 3.5, 0, 0),
(38, 'Choclo con queso', 'entrada', 2, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `cargo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `cargo`) VALUES
(1, 'Cajero'),
(2, 'Recepcionista'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(10) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `dni` int(8) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `idrol` int(10) NOT NULL,
  `estado` int(10) NOT NULL,
  `secreto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `usuario`, `dni`, `pass`, `email`, `foto`, `idrol`, `estado`, `secreto`) VALUES
(1, 'Alejandro Hermitañooo', 'hermi', 73058107, 'e10adc3949ba59abbe56e057f20f883e', 'hermi@gmail.com', '../img/administrador.png', 3, 1, 'Ale730her'),
(14, 'ricardo aponte', 'richi', 70976008, 'e10adc3949ba59abbe56e057f20f883e', 'ricardojraf1999@gmail.com', '../img/administrador.png', 3, 1, 'ric709'),
(18, 'diego', 'die756wil', 75632697, 'e10adc3949ba59abbe56e057f20f883e', 'wili@gmail.com', '../img/cajero.png', 1, 0, 'die756'),
(19, 'Paola', 'Pao763pek', 76324689, 'e10adc3949ba59abbe56e057f20f883e', 'peko@gmail.com', '../img/administrador.png', 3, 0, 'Pao763'),
(20, 'ximena', 'xim763cpp', 76398745, 'e10adc3949ba59abbe56e057f20f883e', 'cpppekopeko@diva.com', '../img/administrador.png', 3, 0, 'xim763'),
(21, 'Piero', 'pierovg', 75013406, '123456', 'pierovillanueva.g@hotmail.com', 'xx', 3, 1, 'xx');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`idcomanda`);

--
-- Indices de la tabla `comprobantedepago`
--
ALTER TABLE `comprobantedepago`
  ADD PRIMARY KEY (`idcomprobante`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `idcomanda` (`idcomanda`);

--
-- Indices de la tabla `detallecomanda`
--
ALTER TABLE `detallecomanda`
  ADD PRIMARY KEY (`idDetalleComanda`),
  ADD KEY `idcomanda` (`idcomanda`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`idpriv`),
  ADD KEY `idrol` (`idrol`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comanda`
--
ALTER TABLE `comanda`
  MODIFY `idcomanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comprobantedepago`
--
ALTER TABLE `comprobantedepago`
  MODIFY `idcomprobante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallecomanda`
--
ALTER TABLE `detallecomanda`
  MODIFY `idDetalleComanda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `idpriv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comprobantedepago`
--
ALTER TABLE `comprobantedepago`
  ADD CONSTRAINT `comprobantedepago_ibfk_1` FOREIGN KEY (`idcomanda`) REFERENCES `comanda` (`idcomanda`);

--
-- Filtros para la tabla `detallecomanda`
--
ALTER TABLE `detallecomanda`
  ADD CONSTRAINT `detallecomanda_ibfk_1` FOREIGN KEY (`idcomanda`) REFERENCES `comanda` (`idcomanda`),
  ADD CONSTRAINT `detallecomanda_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD CONSTRAINT `privilegios_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
