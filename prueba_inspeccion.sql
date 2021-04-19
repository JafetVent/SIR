-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2021 a las 22:32:37
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
-- Base de datos: `prueba_inspeccion`
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
(55555, 'EN ALGUN LUGAR', '2021-04-19'),
(66666, 'EN ALGUN LUGAR', '2021-04-19'),
(88989, 'Imagenes/Facturas/Escaneo0648.pdf', '2021-04-19'),
(123456, '1', '0000-00-00'),
(345678, '1', '0000-00-00'),
(567890, '1', '0000-00-00'),
(582147, 'Imagenes/Facturas/Acuse_MiCompuGTO_Folio_622639.pdf', '2021-03-31'),
(777777, 'en algun lugar', '2021-04-19'),
(789012, '1', '0000-00-00'),
(901234, '1', '0000-00-00');

--
-- Disparadores `factura`
--
DELIMITER $$
CREATE TRIGGER `tg_Factura` AFTER INSERT ON `factura` FOR EACH ROW BEGIN
	
	DECLARE new_idInvoice int;
	
	SET new_idInvoice = NEW.idInvoice;

        INSERT INTO facturas_parte(IdInvoice)
        VALUES (new_idInvoice);
	
	INSERT INTO reporte(idFacPar)
	SELECT
	   idFacPar
	FROM
	   facturas_parte where idInvoice = new_idInvoice;
		
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_parte`
--

CREATE TABLE `facturas_parte` (
  `idFacPar` int(11) NOT NULL,
  `idInvoice` int(11) DEFAULT NULL,
  `noParte` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturas_parte`
--

INSERT INTO `facturas_parte` (`idFacPar`, `idInvoice`, `noParte`) VALUES
(6, 123456, '1'),
(7, 789012, '1'),
(8, 345678, '1'),
(9, 901234, '1'),
(10, 567890, '1'),
(11, 123456, '1'),
(12, 789012, '1'),
(13, 345678, '1'),
(14, 901234, '1'),
(15, 567890, '1'),
(17, 582147, '1'),
(79, 66666, '2'),
(80, 55555, '1'),
(81, 777777, '1'),
(82, 88989, '1');

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
('2', 'Pass Germany', 'NA', 'Ford', 'tubo blanco no chido', ''),
('asdfa', 'Pass Germany', 'Passito', 'Ford', 'alguna imagen chida', 'Imagenes/Partes/SIR2.jpeg');

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
  `noPiezas` int(11) DEFAULT NULL,
  `noCaja` varchar(25) DEFAULT NULL,
  `turno` varchar(1) DEFAULT NULL,
  `inspeccion1` varchar(5) DEFAULT NULL,
  `inspeccion2` varchar(5) DEFAULT NULL,
  `inspeccion3` varchar(5) DEFAULT NULL,
  `inspeccion4` varchar(5) DEFAULT NULL,
  `inspeccion5` varchar(5) DEFAULT NULL,
  `estatus` varchar(2) DEFAULT NULL,
  `observacion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`idReporte`, `idFacPar`, `noTrabajador`, `fecha`, `fechafifo`, `noPiezas`, `noCaja`, `turno`, `inspeccion1`, `inspeccion2`, `inspeccion3`, `inspeccion4`, `inspeccion5`, `estatus`, `observacion`) VALUES
(6, 6, 1, '0000-00-00', '0000-00-00', 12, '1a', 'A', 'OK', 'OK', 'OK', 'OK', 'OK', 'AA', 'BIEN'),
(7, 7, 1, '0000-00-00', '0000-00-00', 12, '1a', 'A', 'OK', 'OK', 'OK', 'OK', 'OK', 'AA', 'BIEN'),
(8, 8, 1, '0000-00-00', '0000-00-00', 13, '2b', 'B', 'OK', 'OK', 'OK', 'OK', 'OK', 'NA', 'MAL'),
(9, 9, 1, '0000-00-00', '0000-00-00', 14, '3c', 'A', 'OK', 'OK', 'OK', 'OK', 'OK', 'AO', 'REGULAR'),
(10, 10, 1, '0000-00-00', '0000-00-00', 15, '4d', 'B', 'OK', 'OK', 'OK', 'OK', 'OK', 'AA', 'BIEN'),
(11, 11, 1, '0000-00-00', '0000-00-00', 12, '1a', 'A', 'OK', 'OK', 'OK', 'OK', 'OK', 'AA', 'BIEN'),
(12, 12, 1, '0000-00-00', '0000-00-00', 12, '1a', 'A', 'OK', 'OK', 'OK', 'OK', 'OK', 'AA', 'BIEN'),
(13, 13, 1, '0000-00-00', '0000-00-00', 13, '2b', 'B', 'OK', 'OK', 'OK', 'OK', 'OK', 'NA', 'MAL'),
(14, 14, 1, '0000-00-00', '0000-00-00', 14, '3c', 'A', 'OK', 'OK', 'OK', 'OK', 'OK', 'AO', 'REGULAR'),
(15, 15, 1, '0000-00-00', '0000-00-00', 15, '4d', 'B', 'OK', 'OK', 'OK', 'OK', 'OK', 'AA', 'BIEN'),
(17, 17, 1, '0000-00-00', '0000-00-00', 0, '', '', '', '', '', '', '', '', NULL),
(112, 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `noTrabajador` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `rol` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL,
  `ruta_firma` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`noTrabajador`, `nombre`, `apellido`, `rol`, `password`, `ruta_firma`) VALUES
(1, 'Jafet', 'Ventura', 'admin', '1234', '');

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
  ADD KEY `idInvoice` (`idInvoice`),
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
  ADD KEY `noParte` (`noParte`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facturas_parte`
--
ALTER TABLE `facturas_parte`
  MODIFY `idFacPar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

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
  ADD CONSTRAINT `facturas_parte_ibfk_1` FOREIGN KEY (`idInvoice`) REFERENCES `factura` (`idInvoice`),
  ADD CONSTRAINT `facturas_parte_ibfk_2` FOREIGN KEY (`noParte`) REFERENCES `parte` (`noParte`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`idFacPar`) REFERENCES `facturas_parte` (`idFacPar`),
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
