-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2021 a las 23:35:13
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inspeccion_recibo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `idInvoice` int(11) NOT NULL,
  `noParte` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `idInvoice`, `noParte`, `fecha`) VALUES
(1, 123456, '1', '0000-00-00'),
(2, 123456, '1', '0000-00-00'),
(3, 123456, '2', '0000-00-00'),
(4, 654321, '1', '0000-00-00'),
(5, 654321, '2', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parte`
--

CREATE TABLE `parte` (
  `noParte` varchar(20) NOT NULL,
  `proveedor` varchar(25) NOT NULL,
  `subproveedor` varchar(25) DEFAULT NULL,
  `familia` varchar(25) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `ruta_imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parte`
--

INSERT INTO `parte` (`noParte`, `proveedor`, `subproveedor`, `familia`, `descripcion`, `ruta_imagen`) VALUES
('1', 'Pass Germany', 'NA', 'VW', 'tubo negro chido', ''),
('2', 'Pass Germany', 'NA', 'Ford', 'tubo blanco no chido', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `idReporte` int(11) NOT NULL,
  `noParte` varchar(20) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `noTrabajador` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fechafifo` date NOT NULL,
  `noPiezas` int(11) NOT NULL,
  `noCaja` varchar(25) NOT NULL,
  `turno` varchar(1) NOT NULL,
  `inspeccion1` varchar(5) NOT NULL,
  `inspeccion2` varchar(5) NOT NULL,
  `inspeccion3` varchar(5) NOT NULL,
  `inspeccion4` varchar(5) NOT NULL,
  `inspeccion5` varchar(5) NOT NULL,
  `estatus` varchar(2) NOT NULL,
  `observacion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`idReporte`, `noParte`, `idFactura`, `noTrabajador`, `fecha`, `fechafifo`, `noPiezas`, `noCaja`, `turno`, `inspeccion1`, `inspeccion2`, `inspeccion3`, `inspeccion4`, `inspeccion5`, `estatus`, `observacion`) VALUES
(2, '1', 2, 1, '0000-00-00', '0000-00-00', 12, '1a', 'A', 'OK', 'OK', 'OK', 'OK', 'OK', 'A', 'BIEN'),
(4, '1', 2, 1, '0000-00-00', '0000-00-00', 12, '1a', 'A', 'OK', 'OK', 'OK', 'OK', 'OK', 'A', 'BIEN'),
(5, '2', 3, 1, '0000-00-00', '0000-00-00', 13, '2b', 'B', 'OK', 'OK', 'OK', 'OK', 'OK', 'NA', 'MAL'),
(6, '1', 4, 1, '0000-00-00', '0000-00-00', 14, '3c', 'A', 'OK', 'OK', 'OK', 'OK', 'OK', 'AO', 'REGULAR'),
(7, '2', 5, 1, '0000-00-00', '0000-00-00', 15, '4d', 'B', 'OK', 'OK', 'OK', 'OK', 'OK', 'A', 'BIEN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `noTrabajador` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `rol` varchar(10) NOT NULL,
  `ruta_firma` varchar(100) NOT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`noTrabajador`, `nombre`, `apellido`, `rol`, `ruta_firma`, `password`) VALUES
(1, 'Jafet', 'Ventura', 'admin', '', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoresinsp`
--

CREATE TABLE `valoresinsp` (
  `idValor` int(11) NOT NULL,
  `noParte` varchar(20) NOT NULL,
  `caracteristicas` varchar(80) NOT NULL,
  `especificacion` varchar(80) NOT NULL,
  `equipo` varchar(80) NOT NULL,
  `toleranciamin` varchar(5) NOT NULL,
  `toleranciamax` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valoresinsp`
--

INSERT INTO `valoresinsp` (`idValor`, `noParte`, `caracteristicas`, `especificacion`, `equipo`, `toleranciamin`, `toleranciamax`) VALUES
(1, '1', 'carac1', 'espec1', 'equipo1', 'min', 'max'),
(2, '1', 'carac2', 'espec2', 'equipo2', 'min', 'max'),
(3, '2', 'carac3', 'espec3', 'equipo3', 'min', 'max'),
(4, '2', 'carac4', 'espec4', 'equipo4', 'min', 'max');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `noParte` (`noParte`);

--
-- Indices de la tabla `parte`
--
ALTER TABLE `parte`
  ADD PRIMARY KEY (`noParte`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`idReporte`),
  ADD KEY `noParte` (`noParte`),
  ADD KEY `idFactura` (`idFactura`),
  ADD KEY `noTrabajador` (`noTrabajador`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`noTrabajador`);

--
-- Indices de la tabla `valoresinsp`
--
ALTER TABLE `valoresinsp`
  ADD PRIMARY KEY (`idValor`),
  ADD KEY `noParte` (`noParte`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `valoresinsp`
--
ALTER TABLE `valoresinsp`
  MODIFY `idValor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`noParte`) REFERENCES `parte` (`noParte`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`noParte`) REFERENCES `parte` (`noParte`),
  ADD CONSTRAINT `reporte_ibfk_2` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`),
  ADD CONSTRAINT `reporte_ibfk_3` FOREIGN KEY (`noTrabajador`) REFERENCES `usuario` (`noTrabajador`);

--
-- Filtros para la tabla `valoresinsp`
--
ALTER TABLE `valoresinsp`
  ADD CONSTRAINT `valoresinsp_ibfk_1` FOREIGN KEY (`noParte`) REFERENCES `parte` (`noParte`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
