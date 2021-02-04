-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2021 a las 05:30:38
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id16080583_ofisial_massimo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE `boleta` (
  `idboleta` int(11) NOT NULL,
  `idcomanda` int(11) NOT NULL,
  `importe` double NOT NULL,
  `pago` double NOT NULL,
  `vuelto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boleta`
--

INSERT INTO `boleta` (`idboleta`, `idcomanda`, `importe`, `pago`, `vuelto`) VALUES
(1, 4, 7, 20, 13),
(3, 5, 3, 20, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comanda`
--

CREATE TABLE `comanda` (
  `idcomanda` int(11) NOT NULL,
  `numeroComanda` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `numeroMesa` int(20) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comanda`
--

INSERT INTO `comanda` (`idcomanda`, `numeroComanda`, `fecha`, `numeroMesa`, `cliente`, `estado`, `total`) VALUES
(1, '6', '2021-02-02', 3, 'alexandra', 'eliminada', 0),
(2, '6', '2021-02-02', 3, 'alexandra', 'PorAtender', 2),
(3, '9', '2021-02-02', 10, 'Jonny', 'eliminada', 44),
(4, '9', '2021-02-03', 10, 'Jonny', 'Pagado', 7),
(5, '5', '2021-02-03', 5, 'DIEGO', 'Pagado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecomanda`
--

CREATE TABLE `detallecomanda` (
  `idDetalleComanda` int(11) NOT NULL,
  `idcomanda` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallecomanda`
--

INSERT INTO `detallecomanda` (`idDetalleComanda`, `idcomanda`, `idproducto`, `cantidad`) VALUES
(1, 2, 7, 2),
(2, 3, 7, 3),
(3, 3, 34, 8),
(4, 3, 28, 1),
(5, 4, 7, 7),
(6, 5, 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleproforma`
--

CREATE TABLE `detalleproforma` (
  `idDetalleProforma` int(11) NOT NULL,
  `idproforma` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `tipo`, `precio`, `estado`) VALUES
(1, 'Tequeños', 'entrada', 1, 0),
(2, 'Huancaina', 'entrada', 1, 0),
(3, 'Ocopa', 'entrada', 1, 0),
(4, 'Pastel de Papa al Horno', 'entrada', 1, 0),
(5, 'Causa de Pollo', 'entrada', 1, 0),
(6, 'Palta Rellena', 'entrada', 1, 0),
(7, 'Ceviche', 'entrada', 1, 1),
(8, 'Salpicon de Pollo', 'entrada', 1, 0),
(9, 'Yucas Rellenas', 'entrada', 1, 0),
(10, 'Humita', 'entrada', 1, 0),
(11, 'Seco de Pollo', 'segundo', 6, 0),
(12, 'Estofado de Pollo', 'segundo', 6, 0),
(13, 'Tallarines Rojos', 'segundo', 6, 0),
(14, 'Frejol Panamito', 'segundo', 6, 0),
(15, 'Pescado Frito', 'segundo', 6, 0),
(16, 'Tallarines Veerdes', 'segundo', 6, 0),
(17, 'Escabeche de Pollo', 'segundo', 6, 0),
(18, 'Chanfainita', 'segundo', 6, 0),
(19, 'Lomo Saltado', 'segundo', 6, 0),
(20, 'Arroz Chaufa', 'segundo', 6, 0),
(21, 'Menestron', 'sopa', 2, 0),
(22, 'Aguadito', 'sopa', 6, 0),
(23, 'Caldo de Gallina', 'sopa', 2, 0),
(24, 'Minuta', 'sopa', 2, 0),
(25, 'Sopa de Patas', 'sopa', 2, 0),
(26, 'Chupe de camarones', 'sopa', 2, 0),
(27, 'Te', 'bebida', 1, 0),
(28, 'Cafe', 'bebida', 1, 0),
(29, 'Jugo de Papaya', 'bebida', 4, 0),
(30, 'Jugo Surtido', 'bebida', 4, 0),
(31, 'Chicha', 'bebida', 2, 0),
(32, 'Maracuya', 'bebida', 2, 0),
(33, 'Inka Cola', 'gaseosa', 5, 0),
(34, 'Coca Cola', 'gaseosa', 5, 0),
(35, 'Pepsi', 'gaseosa', 4, 0),
(36, 'Fanta', 'gaseosa', 4, 0),
(37, 'Gordita Inka Cola', 'gaseosa', 3.5, 0),
(38, 'Choclo con queso', 'entrada', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proforma`
--

CREATE TABLE `proforma` (
  `idproforma` int(11) NOT NULL,
  `fechaEmision` date NOT NULL,
  `fechaEntrega` date NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `DNI` int(8) NOT NULL,
  `Total` double NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proforma`
--

INSERT INTO `proforma` (`idproforma`, `fechaEmision`, `fechaEntrega`, `Nombre`, `Apellido`, `DNI`, `Total`, `Estado`) VALUES
(1, '2020-02-01', '2020-02-03', 'elvis', 'raymondi taipe', 12345678, 30, 'Pagado'),
(2, '2020-02-01', '2020-02-04', 'alejandro', 'hermitaño ychpas', 12345679, 100, 'NoPagado'),
(3, '2020-02-01', '2020-02-03', 'jonny ', 'mendoza garcia', 12345695, 30, 'NoPagado'),
(4, '2020-02-01', '2020-02-04', 'angela ', 'centeno macalupu', 12345215, 20, 'NoPagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `cargo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `dni` int(8) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `idrol` int(10) NOT NULL,
  `estado` int(10) NOT NULL,
  `secreto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `usuario`, `dni`, `pass`, `email`, `foto`, `idrol`, `estado`, `secreto`) VALUES
(1, 'Alejandro Hermitañooo', 'hermi', 73058107, 'e10adc3949ba59abbe56e057f20f883e', 'hermi@gmail.com', '../img/administrador.png', 3, 1, 'Ale730her'),
(14, 'ricardo aponte', 'richi', 70976008, 'e10adc3949ba59abbe56e057f20f883e', 'ricardojraf1999@gmail.com', '../img/administrador.png', 3, 1, 'ric709'),
(18, 'diego', 'die756wil', 75632697, 'e10adc3949ba59abbe56e057f20f883e', 'wili@gmail.com', '../img/cajero.png', 1, 0, 'die756'),
(19, 'Paola', 'Pao763pek', 76324689, 'e10adc3949ba59abbe56e057f20f883e', 'peko@gmail.com', '../img/administrador.png', 3, 0, 'Pao763'),
(20, 'ximena', 'xim763cpp', 76398745, 'e10adc3949ba59abbe56e057f20f883e', 'cpppekopeko@diva.com', '../img/administrador.png', 3, 0, 'xim763');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD PRIMARY KEY (`idboleta`),
  ADD KEY `idcomanda` (`idcomanda`);

--
-- Indices de la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`idcomanda`);

--
-- Indices de la tabla `detallecomanda`
--
ALTER TABLE `detallecomanda`
  ADD PRIMARY KEY (`idDetalleComanda`),
  ADD KEY `idcomanda` (`idcomanda`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `detalleproforma`
--
ALTER TABLE `detalleproforma`
  ADD PRIMARY KEY (`idDetalleProforma`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idproforma` (`idproforma`);

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
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `proforma`
--
ALTER TABLE `proforma`
  ADD PRIMARY KEY (`idproforma`);

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
-- AUTO_INCREMENT de la tabla `boleta`
--
ALTER TABLE `boleta`
  MODIFY `idboleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comanda`
--
ALTER TABLE `comanda`
  MODIFY `idcomanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detallecomanda`
--
ALTER TABLE `detallecomanda`
  MODIFY `idDetalleComanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalleproforma`
--
ALTER TABLE `detalleproforma`
  MODIFY `idDetalleProforma` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `proforma`
--
ALTER TABLE `proforma`
  MODIFY `idproforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD CONSTRAINT `boleta_ibfk_1` FOREIGN KEY (`idcomanda`) REFERENCES `comanda` (`idcomanda`);

--
-- Filtros para la tabla `detallecomanda`
--
ALTER TABLE `detallecomanda`
  ADD CONSTRAINT `detallecomanda_ibfk_1` FOREIGN KEY (`idcomanda`) REFERENCES `comanda` (`idcomanda`),
  ADD CONSTRAINT `detallecomanda_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `detalleproforma`
--
ALTER TABLE `detalleproforma`
  ADD CONSTRAINT `detalleproforma_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `detalleproforma_ibfk_2` FOREIGN KEY (`idproforma`) REFERENCES `proforma` (`idproforma`);

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
