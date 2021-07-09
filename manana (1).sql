-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2021 a las 23:25:11
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
(3365027, 'Imagenes/Facturas/CAC920731883FF20756.pdf', '2021-06-16'),
(3365547, 'Imagenes/Facturas/Invoice 3365547 (003).pdf', '2021-07-07');

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
(10, 3365027, '05277MX'),
(18, 3365027, '06179 MX'),
(9, 3365027, '06N133723CMX'),
(14, 3365027, 'S9000650MX');

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
(2, 3, '22.92', '22.05', '23', '23', '23'),
(3, 3, '13.91', '14', '14.09', '14.05', '14'),
(4, 3, 'ok', 'ok', 'ok', 'ok', 'ok'),
(5, 3, '181', '181', '181', '181', '181'),
(6, 3, 'ok', 'ok', 'ok', 'ok', 'ok'),
(7, 3, 'ok', 'ok', 'ok', 'ok', 'ok'),
(8, 3, 'ok', 'ok', 'ok', 'ok', 'ok'),
(9, 3, 'ok', 'ok', 'ok', 'ok', 'ok'),
(10, 4, ' 8', '8', '8', ' 8', ' 8 '),
(11, 4, ' Ok ', ' o k', ' ok ', 'ok ', 'ok '),
(12, 5, ' 5', ' 5 ', ' 5 ', ' 5 ', ' 5 '),
(13, 5, ' 7. 52', ' 7 . 58 ', '  7  . 4 5', '  7.5 2 ', '  7.5 '),
(14, 5, 'ok', 'ok', 'ok', 'ok', 'ok'),
(15, 6, 'ok', 'ok', 'ok', 'ok', 'ok'),
(16, 6, '1 0 .4  6', ' 1 0 . 52 ', ' 1 0 . 42 ', ' 1 0. 52 ', '  10 . 44 ');

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
(' W700468MX  ', 'PASS GmbH & Co. KG', 'NA', 'conector', 'Imagenes/Partes/eeeee.PNG'),
('04004019MX', 'PASS Germany  ', 'NA', 'GOMA', 'Imagenes/Partes/Capturaqwe.PNG'),
('04008812MX', 'PASS GmbH & Co. KG', 'NA', 'Conector', 'Imagenes/Partes/xsw.PNG'),
('05277MX', 'PASS GmbH & Co. KG', 'NA', 'clip', 'Imagenes/Partes/ax.PNG'),
('05366MX', 'PASS Germany  ', 'Karl Enghofer GmbH & Co. ', 'Tubo de union', 'Imagenes/Partes/Captura´k.PNG'),
('05458 MX', 'PASS GmbH & Co. KG', 'Scherdel GmbH ', 'Abrazadera', 'Imagenes/Partes/Captura111.PNG'),
('05473MX', 'PASS Germany  ', 'A. Raymond GmbH & Co. KG', 'CLIP', 'Imagenes/Partes/Captura11.PNG'),
('05828MX', 'PASS GmbH & Co. KG', 'NA', 'ROLLO', 'Imagenes/Partes/WEW.PNG'),
('059121127BMX', 'PASS Germany  ', 'NA', 'Conector', 'Imagenes/Partes/WhatsApp Image 2021-07-07 at 4.43.00 PM.jpeg'),
('06179 MX', 'PASS GmbH & Co. KG', 'LANGENDORF TEXTIL  GMBH', 'Abrazadera', 'Imagenes/Partes/Captura1.PNG'),
('06N133723CMX', 'PASS Germany', 'NA', 'Pieza de gasolina', 'Imagenes/Partes/imagen_2021-06-22_121817.png'),
('07508', 'PASS GmbH & Co. KG', 'Industrie Plastic  Plasse', 'Valvula', 'Imagenes/Partes/WhatsApp Image 2021-07-07 at 4.43.00 PM (1).jpeg'),
('08327MX', 'PASS GmbH & Co. KG', 'NA', 'Manguera', 'Imagenes/Partes/q.PNG'),
('08341MX', 'PASS GmbH & Co. KG', 'NA', 'clip', 'Imagenes/Partes/Capturae.PNG'),
('4k0122293C MX', 'PASS Germany  ', 'NA', 'CONECTOR', 'Imagenes/Partes/WhatsApp Image 2021-07-07 at 4.43.01 PM.jpeg'),
('80A121107BNMX', 'PASS Germany  ', 'NA', 'Manguera', 'Imagenes/Partes/WhatsApp Image 2021-07-07 at 4.20.52 PM (1).jpeg'),
('80A121107BPMX', 'PASS Germany  ', 'NA', 'Manguera', 'Imagenes/Partes/WhatsApp Image 2021-07-07 at 4.20.52 PM (2).jpeg'),
('8W0121087MX', 'PASS Germany  ', 'NA', 'Conector', 'Imagenes/Partes/Capturadd.PNG'),
('K6004390MX', 'PASS GmbH & Co. KG', 'NA', 'POLIAMIDA', 'Imagenes/Partes/WhatsApp Image 2021-07-07 at 4.20.52 PM.jpeg'),
('ML3E6622EBMX', 'PASS GmbH & Co. KG', 'NA', 'Bocina', 'Imagenes/Partes/2222.PNG'),
('S3000695MX', 'PASS Germany  ', 'NA', 'Manguera', 'Imagenes/Partes/20210526_124804.jpg'),
('S7005517MX', 'PASS GmbH & Co. KG', 'NA', 'Poliamida doblada', 'Imagenes/Partes/qa.PNG'),
('S7005765MX', 'PASS GmbH & Co. KG', 'NA', 'Manguera', 'Imagenes/Partes/qaw.PNG'),
('S7005766MX', 'PASS GmbH & Co. KG', 'NA', 'manguera doblada', 'Imagenes/Partes/ww.PNG'),
('S7006012MX', 'PASS GmbH & Co. KG', 'NA', 'Manguera', 'Imagenes/Partes/sss.PNG'),
('S7006355 MX', 'PASS GmbH & Co. KG', 'NA', 'MANGUERA', 'Imagenes/Partes/WhatsApp Image 2021-07-07 at 4.43.01 PM (1).jpeg'),
('s8001022 MX', 'PASS GmbH & Co. KG', 'NA', 'MANGUERA', 'Imagenes/Partes/000.PNG'),
('S8001164MX', 'PASS GmbH & Co. KG', 'NA', 'MANGUERA', 'Imagenes/Partes/000.PNG'),
('S9000650MX', 'PASS GmbH & Co. KG', 'NA', 'Goma', 'Imagenes/Partes/Captura.PNG');

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
(3, 9, 2, '2021-06-16', '2021-06-04', 'PP1383370353', 'A', 'AA', 'N/A'),
(4, 10, 2, '2021-06-16', '2021-06-04', 'pp 13 8  90 87 ', 'A', 'AA', 'todo bien'),
(5, 14, 2, '2021-06-16', '2021-06-04', '1 9 8 5 6 3 5 4 ', 'A', 'AA', 'todo bien'),
(6, 18, 2, '2021-07-01', '2021-07-01', '', '', 'AA', 'todo bien');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `noTrabajador` int(11) NOT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`noTrabajador`, `userName`, `nombre`, `apellido`, `rol`, `password`) VALUES
(1, 'jventura', 'Jafet', 'Ventura', 'admin', '1234'),
(2, 'egarcia', 'Eduardo', 'García', 'Auditor', '12345'),
(3, 'pmarquez', 'Pedro', 'Marquez', 'Consultor', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoresinsp`
--

CREATE TABLE `valoresinsp` (
  `idValor` int(11) NOT NULL,
  `noParte` varchar(20) NOT NULL,
  `caracteristicas` varchar(100) NOT NULL,
  `especificacion` varchar(100) NOT NULL,
  `equipo` varchar(100) NOT NULL,
  `toleranciamin` varchar(10) NOT NULL,
  `toleranciamax` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valoresinsp`
--

INSERT INTO `valoresinsp` (`idValor`, `noParte`, `caracteristicas`, `especificacion`, `equipo`, `toleranciamin`, `toleranciamax`) VALUES
(84, ' W700468MX', 'Condiciones del conector						', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(85, ' W700468MX', 'longitud', '47+ / - 1 mm			', 'Vernier', '46', '48'),
(52, '04004019MX', 'Condiciones del soporte	', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(50, '04004019MX', 'Diametro externo', '15 mm +/- 1.5 mm			', 'Vernier', '13.5 mm', '16.5 mm'),
(51, '04004019MX', 'Dureza', '55 +/- 5 shores', 'Durómetro', '50', '60'),
(81, '04008812MX', 'Condiciones del conector						', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(82, '04008812MX', 'Diametro externo						', '6mm + / - 0.30 mm			', 'Vernier', '5.70', '6.30'),
(35, '05277MX', ' ranuras de ensamble   ', '8+/-0.1', 'Vernier', '8.1', '7.9'),
(36, '05277MX', 'Sin rayones, golpes, suciedad, deformaciones  ', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(43, '05366MX', 'Color', 'Plata			', 'Visual', 'nok', 'ok'),
(44, '05366MX', 'Condición del tubo de unión', 'No presente daños, deformaciones , oxidaciones', 'Visual', 'nok', 'ok'),
(42, '05366MX', 'longitud', '29 +/- 1 mm			', 'Vernier', '28 mm', '30 mm'),
(54, '05458 MX', 'Ancho de abrazadera', '12 mm + / - 0.30 mm			', 'Vernier', '11.70', '12.30'),
(55, '05458 MX', 'Condiciones de la abrazadera	', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(33, '05473MX', 'Condiciones del clip', 'visual', 'Visual', 'nok', 'ok'),
(79, '05828MX', 'Condiciones del rollo						', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(105, '059121127BMX', 'Condiciones del conector', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(103, '059121127BMX', 'Diámetro interno', '4.0 +/- 0.2 mm			', 'Vernier', '3.80 mm', '4.20 mm'),
(104, '059121127BMX', 'longitud', '37.0 +/- 0.5 mm			', 'Vernier', '36.50 mm', '37.50 mm'),
(30, '06179 MX', 'Condiciones de la abrazadera	', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(31, '06179 MX', 'diametro interno						', '10.5 mm +/- .1mm', 'Vernier', '10.4', '10.6'),
(5, '06N133723CMX', 'Diámetro a inspeccionar ', '23 +/- 1mm', 'Vernier', '22mm', '24mm'),
(7, '06N133723CMX', 'Diámetro de la manguera', '14 +/- .30mm', 'Vernier', '13.7', '14.3'),
(12, '06N133723CMX', 'Fecha de trazabilidad impresa en la manguera', 'visual', 'Visual', 'nok', 'ok'),
(6, '06N133723CMX', 'longitud', '181+/- 1mm', 'Cinta Métrica', '180mm', '181mm'),
(9, '06N133723CMX', 'Pieza completa( con ambos conectores)', 'visual', 'Visual', 'nok', 'ok'),
(11, '06N133723CMX', 'Presencia de aro metálico', 'visual', 'Visual', 'nok', 'ok'),
(10, '06N133723CMX', 'presencia de o-ring interior(color amarillo)', 'visual', 'Visual', 'nok', 'ok'),
(8, '06N133723CMX', 'Sin deformaciones en la geometría ', 'Sin rasgaduras, golpes o suciedad', 'Visual', 'nok', 'ok'),
(119, '07508', 'Balin de plastico', 'Presencia del balin			', 'Visual', 'nok', 'ok'),
(120, '07508', 'Condición de la valvula						', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(117, '07508', 'Diametro externo', '9.5 +/- 0.2 mm			', 'Vernier', '9.30 mm', '9.70 mm'),
(118, '07508', 'longitud', '14.5 +/- 0.2 mm		', 'Vernier', '14.30 mm', '14.70 mm'),
(38, '08327MX', 'Dureza', '60 Sh A ± 5 		', 'Durómetro', '55', '65'),
(41, '08327MX', 'Flecha blanca legible en los extremos', 'visual', 'Visual', 'nok', 'ok'),
(39, '08327MX', 'Recubrimiento de aluminio completo', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(40, '08327MX', 'Sin rayones, golpes, suciedad o deformaciones', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(27, '08341MX', '  ranuras de ensamble ', '8+/-0.1', 'Vernier', '8.1', '7.9'),
(28, '08341MX', 'Presencia Clip metálico dentro', 'visual', 'Visual', 'nok', 'ok'),
(29, '08341MX', 'Sin rayones, golpes, suciedad, deformaciones ', 'visual', 'Visual', 'nok', 'ok'),
(96, '4k0122293C MX', 'Condiciones del conector						', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(94, '4k0122293C MX', 'Diámetro interno', '4 mm +/- 0.1			', 'Vernier', '3.90 mm', '4.10 mm'),
(95, '4k0122293C MX', 'longitud', '38.5 +/- 0.5 mm			', 'Vernier', '39.00 mm', '38.00 mm'),
(97, '4k0122293C MX', 'Presencia de O-ring y  correcta posición de clip				', 'Ensamble correcto			', 'Visual', 'nok', 'ok'),
(92, '80A121107BNMX', 'Condición de la manguera', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(91, '80A121107BNMX', 'Dureza', '60 +/- 5 shores			', 'PASS 0025 (Durometro)', '55', '65'),
(108, '80A121107BPMX', 'Condición de la manguera', 'No presente daños, deformaciones			', 'Visual', 'nok', 'ok'),
(110, '80A121107BPMX', 'Diámetro interno', '7.25mm +/- 0.25 mm			', 'Vernier', '7', '7.25'),
(109, '80A121107BPMX', 'Diámetro interno', '8mm  + 0.5mm/ - 1mm			', 'Vernier', '7', '8.5'),
(107, '80A121107BPMX', 'Dureza', '70 +/- 5 shores			', 'Durómetro', '65', '75'),
(48, '8W0121087MX', 'Condiciones del conector', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(46, '8W0121087MX', 'Diámetro interno', '4.8 +/- 0.1 mm', 'Vernier', '4.70 mm', '4.90 mm'),
(47, '8W0121087MX', 'Longitud del conector', '66 +/- 0.3 mm', 'Vernier', '65. 70 mm', '66.30 mm'),
(87, 'K6004390MX', 'Condiciones de la poliamida', 'No presente daños, deformaciones, cortes en diagonal, contaminaciones, ondulaciones.', 'Visual', 'nok', 'ok'),
(89, 'K6004390MX', 'Impresión', 'Legible y  debe contener logo de Audi,Mexico,YGU ,80A.121.081.ET			', 'Vernier', 'nok', 'ok'),
(88, 'K6004390MX', 'longitud', '558MM +/ 3MM			', 'Cinta Métrica', '555.00', '561.00'),
(99, 'ML3E6622EBMX', ' Presencia 2 tornillos y rejilla metálica   \"						', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(100, 'ML3E6622EBMX', 'Presencia 2 tornillos y rejilla metálica ', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(101, 'ML3E6622EBMX', 'Sin rayones, golpes, suciedad, deformaciones 						', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(57, 'S7005517MX', 'Condición de la manguera', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(58, 'S7005517MX', 'Diámetro interno', '5 mm +/- 0.30', 'Puntas de prueba', '4.70 mm', '5.30 mm'),
(64, 'S7005765MX', 'Condición de la manguera', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(65, 'S7005765MX', 'Diámetro interno', '5 mm +/- 0.30mm', 'Puntas de prueba', '4.70 mm', '5.30 mm'),
(67, 'S7005766MX', 'Condición de la manguera', 'visual', 'Visual', 'nok', 'ok'),
(68, 'S7005766MX', 'Diámetro interno A', '5 mm+/- .30', 'Puntas De prueba', '4.70 mm', '5.30 mm'),
(69, 'S7005766MX', 'Diámetro interno B', '6.5 mm +/- .30', 'Puntas de prueba', '6.20 mm', '6.80 mm'),
(60, 'S7006012MX', 'Condición de la manguera', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok'),
(61, 'S7006012MX', 'Diámetro interno A						', '5mm + / - 0.30	', 'Puntas de prueba', '4.70 mm', '5.30 mm'),
(62, 'S7006012MX', 'Diámetro interno B					Diametro interno A						', '4mm + / - 0.30', 'Puntas de prueba', '3.70 mm', '4.30 mm'),
(113, 'S7006355 MX', 'Condición de la manguera', 'No presente daños ,deformaciones			', 'Visual', 'nok', 'OK'),
(114, 'S7006355 MX', 'diámetro interior lado (A) 					', ' 9.3 ± 0.2 mm			', 'Vernier', '9.5', '9.1'),
(115, 'S7006355 MX', 'diámetro interior lado (B) 						', '7,3 ± 0,2 mm			', 'Vernier', '7.5', '7.1'),
(112, 'S7006355 MX', 'Dureza', '70 + / - 5 Shores			', 'Durómetro', '65', '75'),
(71, 's8001022 MX', 'Condiciones de la manguera						', 'No presente daños ni deformaciones	', 'Visual', 'nok', 'Ok'),
(72, 's8001022 MX', 'Diametro interno  						', '8mm + / - 0.30			', 'PASS 0007 (Puntas de prueba) 	', '7.70', '8.30'),
(73, 's8001022 MX', 'Dureza (Shores)						', '70 + / - 5 Shores			', 'PASS 0007 (Puntas de prueba) 	', '65', '75'),
(75, 'S8001164MX', 'Condición de la manguera', 'No presente daños ni deformaciones	', 'Visual', 'nok', 'OK'),
(76, 'S8001164MX', 'Diametro interno  						', '8mm + / - 0.30			', 'PASS 0007 (Puntas de prueba) 	', '7.70', '8.30'),
(77, 'S8001164MX', 'Longitud						', '38+ / - 1 mm			', 'Vernier', '37', '39'),
(23, 'S9000650MX', 'Ancho', '5 mm', 'Vernier', '5', '5'),
(24, 'S9000650MX', 'Diámetro interno', '7.5 +/-0,1', 'Vernier', '7.4', '7.6'),
(25, 'S9000650MX', 'Sin rayones, golpes, suciedad,deformaciones', 'No presente daños, deformaciones', 'Visual', 'nok', 'ok');

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
  ADD UNIQUE KEY `factura_partes` (`idInvoice`,`noParte`),
  ADD KEY `noParte` (`noParte`);

--
-- Indices de la tabla `inspecciones`
--
ALTER TABLE `inspecciones`
  ADD PRIMARY KEY (`idInspeccion`),
  ADD UNIQUE KEY `inspeccion` (`idInspeccion`,`idReporte`),
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
  ADD UNIQUE KEY `valoresinspc` (`noParte`,`caracteristicas`,`especificacion`,`equipo`,`toleranciamin`,`toleranciamax`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facturas_parte`
--
ALTER TABLE `facturas_parte`
  MODIFY `idFacPar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `inspecciones`
--
ALTER TABLE `inspecciones`
  MODIFY `idInspeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `valoresinsp`
--
ALTER TABLE `valoresinsp`
  MODIFY `idValor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

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
  ADD CONSTRAINT `inspecciones_ibfk_1` FOREIGN KEY (`idReporte`) REFERENCES `reporte` (`idReporte`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`idFacPar`) REFERENCES `facturas_parte` (`idFacPar`) ON DELETE CASCADE,
  ADD CONSTRAINT `reporte_ibfk_2` FOREIGN KEY (`noTrabajador`) REFERENCES `usuario` (`noTrabajador`) ON DELETE CASCADE;

--
-- Filtros para la tabla `valoresinsp`
--
ALTER TABLE `valoresinsp`
  ADD CONSTRAINT `valoresinsp_ibfk_1` FOREIGN KEY (`noParte`) REFERENCES `parte` (`noParte`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
