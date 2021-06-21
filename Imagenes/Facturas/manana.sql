-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2021 a las 16:54:11
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
-- Base de datos: `manana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idInvoice` int(11) NOT NULL,
  `ruta_factura` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idInvoice`, `ruta_factura`, `fecha`) VALUES
(41545, 'Imagenes/Facturas/imagen_2021-06-03_081004.pdf', '2021-06-17'),
(123456, '1', '0000-00-00'),
(345678, '1', '0000-00-00'),
(567890, '1', '0000-00-00'),
(789012, '1', '0000-00-00'),
(901234, '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_parte`
--

CREATE TABLE `facturas_parte` (
  `idFacPar` int(11) NOT NULL,
  `idInvoice` int(11) NOT NULL,
  `noParte` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturas_parte`
--

INSERT INTO `facturas_parte` (`idFacPar`, `idInvoice`, `noParte`) VALUES
(77, 41545, '1'),
(41, 123456, '1'),
(42, 123456, '2'),
(47, 345678, '1'),
(48, 345678, '2'),
(51, 567890, '1'),
(57, 567890, '2'),
(61, 789012, '1'),
(65, 789012, '2'),
(71, 901234, '1');

--
-- Disparadores `facturas_parte`
--
DELIMITER $$
CREATE TRIGGER `prueba` AFTER INSERT ON `facturas_parte` FOR EACH ROW BEGIN
  INSERT INTO reporte (idFacPar)
  VALUES (new.idFacPar);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspecciones`
--

CREATE TABLE `inspecciones` (
  `idInspeccion` int(11) NOT NULL,
  `idReporte` int(11) NOT NULL,
  `i1` varchar(80) NOT NULL,
  `i2` varchar(80) NOT NULL,
  `i3` varchar(80) NOT NULL,
  `i4` varchar(80) NOT NULL,
  `i5` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inspecciones`
--

INSERT INTO `inspecciones` (`idInspeccion`, `idReporte`, `i1`, `i2`, `i3`, `i4`, `i5`) VALUES
(1, 1, 'ok', 'ok', 'ok', 'ok', 'ok'),
(2, 1, 'ok', 'ok', 'ok', 'ok', 'ok'),
(7, 2, 'ok', 'ok', 'ok', 'ok', 'ok'),
(8, 2, 'ok', 'ok', 'ok', 'ok', 'ok'),
(9, 3, 'ok', 'ok', 'ok', 'ok', 'ok'),
(10, 3, 'ok', 'ok', 'ok', 'ok', 'ok'),
(11, 4, 'ok', 'ok', 'ok', 'ok', 'ok'),
(12, 4, 'ok', 'ok', 'ok', 'ok', 'ok'),
(13, 5, 'ok', 'ok', 'ok', 'ok', 'ok'),
(14, 5, 'ok', 'ok', 'ok', 'ok', 'ok');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parte`
--

CREATE TABLE `parte` (
  `noParte` varchar(20) NOT NULL,
  `proveedor` varchar(25) NOT NULL,
  `subproveedor` varchar(25) DEFAULT NULL,
  `descripcion` varchar(80) NOT NULL,
  `ruta_imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parte`
--

INSERT INTO `parte` (`noParte`, `proveedor`, `subproveedor`, `descripcion`, `ruta_imagen`) VALUES
('1', 'Pass Germany', 'NA', 'tubo negro chido', 'Imagenes/Partes/ej1.jpg'),
('2', 'Pass Germany', 'NA', 'tubo blanco no chido', 'Imagenes/Partes/ej2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `idReporte` int(11) NOT NULL,
  `idFacPar` int(11) DEFAULT NULL,
  `noTrabajador` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fechafifo` date DEFAULT NULL,
  `noCaja` varchar(25) DEFAULT NULL,
  `turno` varchar(1) DEFAULT NULL,
  `estatus` varchar(2) DEFAULT NULL,
  `observacion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`idReporte`, `idFacPar`, `noTrabajador`, `fecha`, `fechafifo`, `noCaja`, `turno`, `estatus`, `observacion`) VALUES
(1, 41, 1, '2021-06-15', '2021-06-15', '18', 'A', 'AA', 'prueba chida ok ok '),
(2, 42, 1, '2021-06-17', '2021-06-17', '11', 'A', 'AA', 'prueba auditor'),
(3, 47, 1, '2021-06-17', '2021-06-17', '17', 'A', 'NA', 'prueba chida NA'),
(4, 48, 1, '2021-06-17', '2021-06-17', '19', 'B', 'AO', 'prueba AO'),
(5, 51, 1, '2021-06-17', '2021-06-17', '78', 'A', 'AO', 'observacion tal x de y'),
(6, 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `noTrabajador` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `userName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`noTrabajador`, `nombre`, `apellido`, `rol`, `password`, `userName`) VALUES
(1, 'Jafet', 'Ventura', 'admin', '1234', 'jventura'),
(2, 'Eduardo', 'García', 'Auditor', 'egarcia', '12345'),
(3, 'Pedro', 'Marquez', 'Consultor', 'pmarquez', '12345');

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
  ADD PRIMARY KEY (`idInvoice`);

--
-- Indices de la tabla `facturas_parte`
--
ALTER TABLE `facturas_parte`
  ADD PRIMARY KEY (`idFacPar`),
  ADD UNIQUE KEY `factura_parte` (`idInvoice`,`noParte`),
  ADD KEY `noParte` (`noParte`);

--
-- Indices de la tabla `inspecciones`
--
ALTER TABLE `inspecciones`
  ADD PRIMARY KEY (`idInspeccion`),
  ADD UNIQUE KEY `inspecciones` (`idInspeccion`,`idReporte`),
  ADD KEY `idReporte` (`idReporte`);

--
-- Indices de la tabla `parte`
--
ALTER TABLE `parte`
  ADD PRIMARY KEY (`noParte`),
  ADD UNIQUE KEY `noParte` (`noParte`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`idReporte`),
  ADD KEY `idFacPar` (`idFacPar`),
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
  ADD UNIQUE KEY `valoresInsp` (`noParte`,`caracteristicas`,`especificacion`,`equipo`,`toleranciamin`,`toleranciamax`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facturas_parte`
--
ALTER TABLE `facturas_parte`
  MODIFY `idFacPar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `inspecciones`
--
ALTER TABLE `inspecciones`
  MODIFY `idInspeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `valoresinsp`
--
ALTER TABLE `valoresinsp`
  MODIFY `idValor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas_parte`
--
ALTER TABLE `facturas_parte`
  ADD CONSTRAINT `facturas_parte_ibfk_1` FOREIGN KEY (`idInvoice`) REFERENCES `factura` (`idInvoice`) ON DELETE CASCADE,
  ADD CONSTRAINT `facturas_parte_ibfk_2` FOREIGN KEY (`noParte`) REFERENCES `parte` (`noParte`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inspecciones`
--
ALTER TABLE `inspecciones`
  ADD CONSTRAINT `inspecciones_ibfk_1` FOREIGN KEY (`idReporte`) REFERENCES `reporte` (`idReporte`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`idFacPar`) REFERENCES `facturas_parte` (`idFacPar`) ON DELETE CASCADE,
  ADD CONSTRAINT `reporte_ibfk_2` FOREIGN KEY (`noTrabajador`) REFERENCES `usuario` (`noTrabajador`);

--
-- Filtros para la tabla `valoresinsp`
--
ALTER TABLE `valoresinsp`
  ADD CONSTRAINT `valoresinsp_ibfk_1` FOREIGN KEY (`noParte`) REFERENCES `parte` (`noParte`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
