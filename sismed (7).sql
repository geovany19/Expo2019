-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2019 a las 05:26:12
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sismed`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_calificacion` (IN `id_calificacion` INT, IN `puntuacion` DOUBLE, IN `resena` VARCHAR(100), IN `usuario_calificador` INT, IN `usuario_calificado` INT, IN `id_tipousuario` INT)  NO SQL
INSERT INTO calificacion VALUES(`id_calificacion`, `puntuacion`, `resena`, `usuario_calificador`, `usuario_calificado`, `id_tipousuario`)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_cita` (IN `id_cita` INT, IN `id_doctor` INT, IN `id_paciente` INT, IN `fecha_cita` DATE, IN `hora_cita` TIME, IN `id_estado` INT)  NO SQL
INSERT INTO cita VALUES(`id_cita`, `id_doctor`, `id_estado`, `fecha_cita`, `hora_cita`, `id_estado`)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_disponibilidad` (IN `id_disponibilidad` INT, IN `fecha_disponible` DATE, IN `hora_inicio` TIME, IN `hora_fin` TIME, IN `id_doctor` INT)  NO SQL
INSERT INTO disponibilidad VALUES(`id_disponibilidad`, `fecha_disponible`, `hora_inicio`, `hora_fin`, `id_doctor`)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `operacion` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `host` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `modificado` datetime DEFAULT NULL,
  `tabla` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_bitacora`, `operacion`, `usuario`, `host`, `modificado`, `tabla`) VALUES
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 20:57:25', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 20:57:25', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-29 20:44:03', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 14:09:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 20:57:25', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-07-23 21:27:13', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-04 19:59:10', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-04 19:59:10', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-04 19:59:10', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-04 19:59:10', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-04 19:59:10', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-04 19:59:10', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-04 20:01:06', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-04 20:01:06', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-04 20:01:06', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 10:23:10', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 10:25:04', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:49:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:55:23', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:56:57', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:57:33', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 14:46:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 14:46:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 14:46:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 14:46:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 14:46:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 14:46:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 14:46:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 14:46:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 14:46:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 14:46:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 17:11:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:37:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:51:30', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:51:30', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:51:30', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:51:30', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:51:30', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:51:30', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:51:30', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:51:30', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:51:30', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 18:51:30', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 19:04:10', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 19:04:10', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 19:04:10', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 19:04:10', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 19:04:10', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 19:04:10', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 19:04:10', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 19:04:10', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 19:04:10', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 19:04:10', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 20:20:01', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 20:20:01', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 20:20:01', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 20:20:01', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 20:20:01', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 20:20:01', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 20:20:01', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 20:20:01', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 20:20:01', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 20:20:01', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 21:22:31', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 22:24:13', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 22:24:13', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 22:24:13', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 22:24:13', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 22:24:13', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 22:24:13', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 22:24:13', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 22:24:13', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 22:24:13', 'consulta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_doctor`
--

CREATE TABLE `calificacion_doctor` (
  `id_calificacion` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacion_doctor`
--

INSERT INTO `calificacion_doctor` (`id_calificacion`, `id_doctor`, `id_paciente`, `calificacion`, `comentario`) VALUES
(1, 2, 1, 4, 'Buena atención'),
(2, 4, 1, 5, 'Excelente desempeño'),
(3, 3, 1, 5, NULL),
(4, 4, 1, 4, NULL),
(5, 2, 1, 4, 'Buena atención'),
(6, 4, 1, 3, 'Desempeño no muy destacable'),
(7, 3, 1, 3, NULL),
(8, 4, 1, 5, NULL),
(9, 3, 1, 5, NULL),
(10, 1, 4, 5, NULL),
(11, 8, 1, 5, 'Buena atención'),
(12, 5, 1, 5, 'Excelente desempeño. Excelente doctora'),
(13, 6, 2, 3, 'Su desempeño puede mejorar.'),
(14, 6, 3, 4, NULL),
(15, 9, 2, 4, 'Buena atención'),
(16, 10, 1, 5, 'Excelente doctora'),
(17, 10, 2, 4, NULL),
(18, 8, 3, 4, NULL),
(19, 9, 4, 5, NULL),
(20, 1, 4, 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_paciente`
--

CREATE TABLE `calificacion_paciente` (
  `id_calificacion` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `calificacion_paciente` int(11) NOT NULL,
  `comentario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `id_doctor`, `id_paciente`, `fecha_cita`, `hora_cita`, `id_estado`) VALUES
(1, 4, 1, '2019-01-21', '09:00:00', 4),
(2, 4, 1, '2019-01-21', '10:00:00', 4),
(3, 3, 1, '2019-01-21', '10:30:00', 4),
(5, 2, 1, '2019-01-21', '08:10:00', 4),
(6, 4, 1, '2019-01-22', '08:40:00', 4),
(7, 4, 1, '2019-01-22', '09:20:00', 4),
(8, 3, 1, '2019-01-22', '15:00:00', 4),
(9, 2, 1, '2019-01-22', '16:00:00', 4),
(10, 2, 1, '2019-01-22', '16:30:00', 4),
(11, 3, 1, '2019-01-23', '08:15:00', 4),
(12, 3, 1, '2019-01-23', '08:50:00', 4),
(13, 2, 1, '2019-01-23', '09:05:00', 4),
(14, 2, 1, '2019-01-23', '09:45:00', 4),
(15, 4, 2, '2019-01-24', '07:30:00', 4),
(16, 6, 2, '2019-01-24', '08:00:00', 4),
(17, 3, 2, '2019-01-24', '08:30:00', 4),
(18, 7, 2, '2019-01-24', '08:10:00', 4),
(19, 8, 1, '2019-01-24', '10:40:00', 4),
(20, 6, 1, '2019-01-24', '11:20:00', 4),
(21, 3, 1, '2019-01-24', '13:05:00', 4),
(22, 5, 1, '2019-01-24', '16:00:00', 4),
(23, 5, 1, '2019-01-25', '10:00:00', 3),
(24, 5, 1, '2019-01-25', '08:15:00', 4),
(25, 9, 3, '2019-01-25', '08:50:00', 4),
(26, 10, 2, '2019-01-25', '09:05:00', 4),
(27, 10, 1, '2019-01-25', '10:35:00', 4),
(28, 6, 4, '2019-01-26', '07:35:00', 4),
(29, 3, 4, '2019-01-26', '08:00:00', 4),
(30, 8, 1, '2019-01-26', '10:30:00', 4),
(31, 4, 2, '2019-01-26', '11:10:00', 4),
(32, 4, 2, '2019-01-26', '08:40:00', 4),
(33, 3, 1, '2019-01-26', '09:20:00', 4),
(34, 7, 1, '2019-01-26', '10:05:00', 4),
(35, 4, 1, '2019-01-26', '11:15:00', 4),
(36, 2, 1, '2019-01-30', '14:00:00', 3),
(37, 1, 2, '2019-01-28', '13:15:00', 4),
(38, 8, 1, '2019-01-28', '11:50:00', 4),
(39, 2, 2, '2019-01-28', '14:05:00', 4),
(40, 2, 2, '2019-01-28', '14:05:00', 4),
(41, 1, 2, '2019-01-28', '08:10:00', 4),
(42, 4, 2, '2019-01-28', '08:40:00', 4),
(43, 4, 1, '2019-01-28', '09:20:00', 4),
(44, 1, 1, '2019-01-28', '10:05:00', 4),
(45, 3, 1, '2019-01-28', '11:15:00', 4),
(46, 2, 1, '2019-01-29', '07:30:00', 4),
(47, 3, 1, '2019-01-29', '12:00:00', 4),
(48, 4, 2, '2019-01-29', '13:40:00', 4),
(49, 2, 1, '2019-01-29', '09:05:00', 4),
(50, 2, 2, '2019-01-29', '09:25:00', 4),
(51, 10, 2, '2019-01-29', '09:15:00', 4),
(52, 5, 1, '2019-01-29', '10:50:00', 4),
(53, 2, 2, '2019-01-29', '11:05:00', 4),
(54, 2, 2, '2019-01-29', '15:05:00', 4),
(55, 6, 2, '2019-01-30', '14:10:00', 4),
(56, 8, 2, '2019-01-30', '10:40:00', 4),
(57, 9, 3, '2019-01-30', '10:20:00', 4),
(58, 10, 1, '2019-01-30', '11:25:00', 4),
(59, 3, 1, '2019-01-30', '11:15:00', 4),
(60, 2, 1, '2019-01-31', '07:30:00', 4),
(61, 6, 1, '2019-01-31', '11:25:00', 3),
(62, 7, 2, '2019-01-31', '13:40:00', 4),
(63, 5, 3, '2019-01-31', '14:05:00', 4),
(64, 2, 2, '2019-01-31', '14:25:00', 4),
(65, 6, 2, '2019-02-01', '15:10:00', 4),
(66, 8, 2, '2019-02-01', '14:40:00', 4),
(67, 9, 3, '2019-02-01', '10:20:00', 4),
(68, 10, 1, '2019-02-01', '09:25:00', 4),
(69, 7, 1, '2019-02-01', '10:15:00', 4),
(70, 2, 1, '2019-02-01', '07:30:00', 4),
(71, 6, 1, '2019-02-02', '15:25:00', 4),
(72, 10, 3, '2019-02-02', '10:05:00', 4),
(73, 5, 3, '2019-02-04', '15:05:00', 4),
(74, 9, 4, '2019-02-04', '09:55:00', 4);

--
-- Disparadores `cita`
--
DELIMITER $$
CREATE TRIGGER `bitacora_cita` AFTER INSERT ON `cita` FOR EACH ROW INSERT INTO bitacora (host, usuario, operacion, modificado, tabla) VALUES ("localhost", "root", "INSERTAR", NOW(), "cita")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `padecimientos` varchar(200) DEFAULT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `receta` varchar(200) DEFAULT NULL,
  `id_cita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `padecimientos`, `id_doctor`, `id_paciente`, `receta`, `id_cita`) VALUES
(1, 'Tos', 1, 1, 'Jarabe para tos cada 8 horas', 1),
(2, 'Cefalea', 1, 1, 'Acetaminofen', 2),
(3, 'Gastritis', 3, 1, 'Pepto Bismol', 3),
(4, 'Temperatura alta', 4, 1, 'Trapitos húmedos en la frente', 5),
(5, 'Dengue', 1, 1, 'Acetaminofen', 6),
(6, 'Infección en la garganta', 2, 1, 'Jarabe para la tos', 7),
(7, 'Infección en las vías urinarias', 3, 1, 'Agua en abundancia y medicamentos', 8),
(8, 'Mal de orin', 4, 1, 'Agua en abundancia', 9),
(10, 'VIH', 1, 1, 'Medicamentos', 10),
(11, 'Infección en las vías urinarias', 3, 1, 'Agua en abundancia y medicamentos', 11),
(12, 'Mal de orin', 2, 1, 'Agua en abundancia', 12),
(13, 'Gastritis', 1, 1, 'Medicamentos', 13),
(14, 'Gastritis', 3, 1, 'Medicamentos', 14),
(15, 'Gastritis', 6, 3, 'Medicamentos', 15),
(16, 'Tos', 9, 4, 'Jarabe para tos cada 8 horas', 16),
(17, 'Cefalea', 6, 3, 'Acetaminofen', 17),
(18, 'Gastritis', 10, 2, 'Pepto Bismol', 18),
(19, 'Conjuntivitis', 8, 1, 'Aplicar gotas para los ojos cada 6 horas durante 7 días.', 19),
(20, 'Dengue', 6, 2, 'Acetaminofen', 20),
(21, 'Dengue', 10, 4, '1 acetaminofen cada 8 horas', 21),
(22, 'Infección en las vías urinarias', 7, 3, 'Agua en abundancia y medicamentos', 22),
(23, 'Mal de orin', 5, 1, 'Agua en abundancia', 23),
(24, 'Dolor de huesos', 1, 3, 'Medicamentos. Incapacidad por 3 días.', 24),
(25, 'Infección en las vías urinarias', 3, 1, 'Agua en abundancia y medicamentos', 25),
(26, 'Mal de orin', 4, 4, 'Agua en abundancia', 26),
(27, 'Gastritis', 8, 1, 'Medicamentos', 27),
(28, 'Gastritis', 3, 4, 'Medicamentos', 28),
(29, 'Gastritis', 6, 4, 'Medicamentos', 29),
(30, 'Dengue', 8, 1, 'Acetaminofen', 30),
(31, 'Dengue', 4, 2, '1 acetaminofen cada 8 horas', 31),
(32, 'Infección en las vías urinarias', 4, 2, 'Agua en abundancia y medicamentos', 32),
(33, 'Mal de orin', 3, 1, 'Agua en abundancia', 33),
(34, 'Dolor de huesos', 7, 1, 'Medicamentos. Incapacidad por 3 días.', 34),
(35, 'Infección en las vías urinarias', 4, 1, 'Agua en abundancia y medicamentos', 35),
(36, 'Mal de orin', 1, 2, 'Agua en abundancia', 37),
(37, 'Gastritis', 8, 1, 'Medicamentos', 38),
(38, 'Cefalea', 2, 2, 'Medicamentos', 39),
(39, 'Zika', 2, 2, 'Medicamentos', 40),
(40, 'H1N1', 1, 2, 'Cuarentena', 41),
(41, 'Chequeo de peso corporal', 4, 2, 'Plan de alimentación', 42),
(42, 'Reducción de peso corporal', 4, 1, 'Continuar según plan de alimentación, ejercitarse a diario y tomar abundante agua', 43),
(43, 'Rotavirus', 1, 1, 'Vacunas', 44),
(44, 'Dolor de huesos', 3, 1, 'Medicamentos. Incapacidad por 3 días.', 45),
(45, 'Infección en las vías urinarias', 2, 1, 'Agua en abundancia y medicamentos', 46),
(46, 'Mal de orin', 3, 1, 'Agua en abundancia', 47),
(47, 'Gastritis', 4, 2, 'Medicamentos', 48),
(48, 'Cefalea', 2, 1, 'Medicamentos', 49),
(49, 'Zika', 2, 2, 'Medicamentos', 50),
(50, 'Infección en las vías urinarias', 10, 2, 'Agua en abundancia y medicamentos', 51),
(51, 'Mal de orin', 5, 1, 'Agua en abundancia', 52),
(52, 'Gastritis', 2, 2, 'Medicamentos', 53),
(53, 'Cefalea', 2, 2, 'Medicamentos', 54),
(54, 'Zika', 6, 2, 'Medicamentos', 55),
(55, 'H1N1', 8, 2, 'Cuarentena', 56),
(56, 'Chequeo de peso corporal', 9, 3, 'Plan de alimentación', 57),
(57, 'Reducción de peso corporal', 10, 1, 'Continuar según plan de alimentación, ejercitarse a diario y tomar abundante agua', 58),
(58, 'Rotavirus', 3, 1, 'Vacunas', 59),
(59, 'Dolor de huesos', 2, 1, 'Medicamentos. Incapacidad por 3 días.', 60),
(60, 'Infección en las vías urinarias', 6, 1, 'Agua en abundancia y medicamentos', 61),
(61, 'Mal de orin', 7, 2, 'Agua en abundancia', 62),
(62, 'Gastritis', 5, 3, 'Medicamentos', 63),
(63, 'Cefalea', 2, 2, 'Medicamentos', 64),
(64, 'Zika', 6, 2, 'Medicamentos', 65),
(65, 'Chequeo de peso corporal', 8, 2, 'Plan de alimentación', 66),
(66, 'Reducción de peso corporal', 9, 3, 'Continuar según plan de alimentación, ejercitarse a diario y tomar abundante agua', 67),
(67, 'Rotavirus', 10, 1, 'Vacunas', 68),
(68, 'Dolor de huesos', 7, 1, 'Medicamentos. Incapacidad por 3 días.', 69),
(69, 'Infección en las vías urinarias', 2, 1, 'Agua en abundancia y medicamentos', 70),
(70, 'Mal de orin', 6, 1, 'Agua en abundancia', 71),
(71, 'Gastritis', 10, 3, 'Medicamentos', 72),
(72, 'Cefalea', 5, 3, 'Medicamentos', 73),
(73, 'Zika', 9, 4, 'Medicamentos', 74);

--
-- Disparadores `consulta`
--
DELIMITER $$
CREATE TRIGGER `bitacora_consulta` AFTER INSERT ON `consulta` FOR EACH ROW INSERT INTO bitacora (host, usuario, operacion, modificado, tabla) VALUES ("localhost", "root", "INSERTAR", NOW(), "consulta")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_disponibilidad`
--

CREATE TABLE `dias_disponibilidad` (
  `id_dia` int(11) NOT NULL,
  `dia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dias_disponibilidad`
--

INSERT INTO `dias_disponibilidad` (`id_dia`, `dia`) VALUES
(1, 'Domingo'),
(5, 'Jueves'),
(2, 'Lunes'),
(3, 'Martes'),
(4, 'Miércoles'),
(7, 'Sábado'),
(6, 'Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `id_disponibilidad` int(11) NOT NULL,
  `id_dia` int(11) DEFAULT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `id_doctor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disponibilidad`
--

INSERT INTO `disponibilidad` (`id_disponibilidad`, `id_dia`, `hora_inicio`, `hora_fin`, `id_doctor`) VALUES
(1, 2, '06:30:00', '10:30:00', 4),
(2, 1, '07:00:00', '11:30:00', 4),
(3, 2, '10:00:00', '17:00:00', 3),
(4, 4, '08:00:00', '16:00:00', 4),
(5, 5, '07:00:00', '11:30:00', 3),
(6, 4, '09:00:00', '17:00:00', 4),
(7, 6, '07:00:00', '16:00:00', 4),
(8, 5, '08:30:00', '17:00:00', 4),
(10, 7, '08:00:00', '12:30:00', 4);

--
-- Disparadores `disponibilidad`
--
DELIMITER $$
CREATE TRIGGER `bitacora_disponibilidad` AFTER INSERT ON `disponibilidad` FOR EACH ROW INSERT INTO bitacora (host, usuario, operacion, modificado, tabla) VALUES ("localhost", "root", "INSERTAR", NOW(), "disponibilidad")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id_doctor` int(11) NOT NULL,
  `nombre_doctor` varchar(25) NOT NULL,
  `apellido_doctor` varchar(25) NOT NULL,
  `correo_doctor` varchar(150) NOT NULL,
  `usuario_doctor` varchar(25) NOT NULL,
  `contrasena_doctor` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `foto_doctor` varchar(150) DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doctor`, `nombre_doctor`, `apellido_doctor`, `correo_doctor`, `usuario_doctor`, `contrasena_doctor`, `fecha_nacimiento`, `foto_doctor`, `id_especialidad`, `id_estado`) VALUES
(1, 'Carlos', 'Ramirez', 'fede@gmail.com', 'FR1', '$2y$10$gZkOWNToIRGwyZCHHzmMq.iWGke1GXQtAUg6LKeCxix1jkgSTH03G', '2000-08-29', '5d2ce5fdea331.jpg', 4, 1),
(2, 'Bryan', 'Amaya', 'bryan28@gmail.com', 'Boscopony', '$2y$10$K9IUbArlaysW0ZD.Lez1Ve52.oGcn4AV50kPKRi2SLaonXl0pjozK', '2001-08-16', '5d2cf28163ba9.jpg', 2, 1),
(3, 'Geovany', 'Fuentes', 'geovany@gmail.com', 'geovany', '$2y$10$AUjA29YYWOYOfBoT80eCku4tl5tcIIWWq4e7PpQV68gcT8KKEL656', '2000-09-04', '5d2cf2a2bfdb8.jpg', 8, 1),
(4, 'Maria', 'Campos', 'mariacampos@gmail.com', 'maria1', '$2y$10$QAzi8yRHsvwzQotubSQov.Q7wrL5BQ0fJUX3Hstd4PhZWrTtSk3Aa', '2000-06-04', '5d2cf2cf2cfda.jpg', 1, 1),
(5, 'Patricia', 'Soriano', 'patricia_soriano@gmail.com', 'PS01', '$2y$10$QAzi8yRHsvwzQotubSQov.Q7wrL5BQ0fJUX3Hstd4PhZWrTtSk3Aa', '1986-07-18', '5d2cf2cf2cfda.jpg', 7, 1),
(6, 'César', 'Ferrufino', 'cesar_ferrufino@gmail.com', 'CF01', '$2y$10$gZkOWNToIRGwyZCHHzmMq.iWGke1GXQtAUg6LKeCxix1jkgSTH03G', '2001-05-02', '5d2ce5fdea331.jpg', 3, 1),
(7, 'Pamela', 'Urbina', 'pamela_urbina@gmail.com', 'PU01', '$2y$10$K9IUbArlaysW0ZD.Lez1Ve52.oGcn4AV50kPKRi2SLaonXl0pjozK', '2000-06-12', '5d2cf28163ba9.jpg', 5, 1),
(8, 'Marcelo', 'Mayorga', 'marcelo_mayorga@gmail.com', 'MM01', '$2y$10$AUjA29YYWOYOfBoT80eCku4tl5tcIIWWq4e7PpQV68gcT8KKEL656', '2000-12-20', '5d2cf2a2bfdb8.jpg', 10, 1),
(9, 'Gabriela', 'Alfaro', 'gabriela_alfaro@gmail.com', 'GA01', '$2y$10$QAzi8yRHsvwzQotubSQov.Q7wrL5BQ0fJUX3Hstd4PhZWrTtSk3Aa', '2000-08-21', '5d2cf2cf2cfda.jpg', 6, 1),
(10, 'Alejandra', 'Menjívar', 'alejandra_menjivar@gmail.com', 'AM01', '$2y$10$QAzi8yRHsvwzQotubSQov.Q7wrL5BQ0fJUX3Hstd4PhZWrTtSk3Aa', '1995-03-23', '5d2cf2cf2cfda.jpg', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_especialidad` varchar(25) DEFAULT NULL,
  `descripcion_especialidad` varchar(130) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre_especialidad`, `descripcion_especialidad`) VALUES
(1, 'Cardiología', 'Se encarga del estudio, diagnóstico y tratamiento de las enfermedades del corazón y del aparato circulatorio. hola'),
(2, 'Nutriología', 'Estudia la alimentación humana y su relación con los procesos químicos, biológicos y metabólicos y estado de salud humana.'),
(3, 'Oftalmología', 'Estudia las enfermedades de ojo y su tratamiento, incluyendo el globo ocular, su musculatura, el sistema lagrimal y los párpados.'),
(4, 'Pediatría', 'Es la especialidad médica que estudia al niño y sus enfermedades.'),
(5, 'Oncología médica', 'Diagnóstico y tratamiento del cáncer, centrada en la atención del enfermo con cáncer como un todo'),
(6, 'Dermatología', 'Es la especialidad médica encargada del estudio de la piel, su estructura, función y enfermedades.'),
(7, 'Gastroenterología', 'Comprende el diagnóstico y tratamiento de pacientes con afecciones del  estómago, intestino delgado, colon, recto y páncreas'),
(8, 'Ginecología', 'Especialidad médica que trata las enfermedades del sistema reproductor femenino (útero, vagina y ovarios) y de la reproducción.'),
(9, 'Neumología', 'Es la especialidad médica encargada del estudio de las enfermedades del aparato respiratorio.'),
(10, 'Urología', 'Tratamiento de las patologías que afectan al aparato urinario de ambos sexos y al aparato reproductor masculino.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_cita`
--

CREATE TABLE `estado_cita` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_cita`
--

INSERT INTO `estado_cita` (`id_estado`, `estado`) VALUES
(1, 'Pendiente'),
(2, 'Aceptada'),
(3, 'Cancelada'),
(4, 'Realizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_usuarios`
--

CREATE TABLE `estado_usuarios` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_usuarios`
--

INSERT INTO `estado_usuarios` (`id_estado`, `estado`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `id_mes` int(11) NOT NULL,
  `mes` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id_mes`, `mes`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `id_notificacion` int(11) NOT NULL,
  `notificacion` varchar(50) DEFAULT NULL,
  `id_tipousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id_notificacion`, `notificacion`, `id_tipousuario`) VALUES
(1, 'Se ha registrado un nuevo paciente', 1),
(2, 'citas registradas para hoy', 1),
(3, 'doctores disponibles hoy', 1),
(4, 'Cita programada para hoy', 2),
(5, 'Cita cancelada', 2),
(6, 'Cita reprogramada', 2),
(7, 'citas programadas para hoy', 3),
(8, 'Se ha solicitado una nueva cita', 3),
(9, 'Cita cancelada', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `nombre_paciente` varchar(25) NOT NULL,
  `apellido_paciente` varchar(25) NOT NULL,
  `correo_paciente` varchar(150) NOT NULL,
  `usuario_paciente` varchar(25) NOT NULL,
  `contrasena_paciente` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `foto_paciente` varchar(150) DEFAULT NULL,
  `peso_paciente` double DEFAULT NULL,
  `estatura_paciente` double DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `clave_actualizada` timestamp NULL DEFAULT NULL,
  `cuenta_bloqueada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre_paciente`, `apellido_paciente`, `correo_paciente`, `usuario_paciente`, `contrasena_paciente`, `fecha_nacimiento`, `foto_paciente`, `peso_paciente`, `estatura_paciente`, `id_estado`, `clave_actualizada`, `cuenta_bloqueada`) VALUES
(1, 'Bryan Alejandro', 'Amaya Pérez', 'bryaleama@gmail.com', 'ElBatmanBosco', '$2y$10$E3l6oK6RXTFwSGjbyf43b.ZRjgc43jcsVq8gI1T6moTF8I/8ZTG.S', '2001-08-16', NULL, 150, 172, 1, '2019-09-14 06:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipousuario` int(11) NOT NULL,
  `tipo_usuario` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipousuario`, `tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Doctor'),
(3, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_a`
--

CREATE TABLE `usuarios_a` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(25) NOT NULL,
  `apellido_usuario` varchar(25) NOT NULL,
  `correo_usuario` varchar(25) NOT NULL,
  `usuario_usuario` varchar(25) NOT NULL,
  `contrasena_usuario` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `foto_usuario` varchar(150) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_a`
--

INSERT INTO `usuarios_a` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `usuario_usuario`, `contrasena_usuario`, `fecha_nacimiento`, `foto_usuario`, `id_estado`) VALUES
(1, 'MacKenzie', 'Andrews', 'nec.cursus@maurissapiencu', 'N3P 4X9', 'OBC22TVM6NY', '1985-02-10', '8311', 1),
(2, 'Cassandra', 'Church', 'ut@hendreritid.org', 'A0U 2U1', 'RQM10TIO1ZK', '2019-04-29', '7343', 1),
(3, 'Len', 'Miranda', 'aptent@Maurisnondui.org', 'Z1G 3W5', 'NKI94ECW5SF', '2004-04-05', '2170', 1),
(4, 'Lucas', 'Hines', 'diam.Sed@ultrices.org', 'X8B 2E1', 'OWA64LOP2RG', '1999-08-13', '4951', 1),
(5, 'Zane', 'Hanson', 'nunc@mollisPhasellusliber', 'V7E 3W9', 'BNW75OPE0DY', '1989-01-28', '9987', 1),
(6, 'Xyla', 'Forbes', 'consectetuer@quis.org', 'H7V 7K6', 'TEI35GVS6IJ', '2006-06-06', '6237', 1),
(7, 'Kaitlin', 'Johnson', 'vulputate.nisi@lectus.ca', 'H6V 3C6', 'QKS06AWJ6BH', '2000-08-21', '4806', 1),
(8, 'Thane', 'Bauer', 'ligula@diam.co.uk', 'N4H 2R5', 'PLT45IMB2HR', '2001-04-10', '1209', 1),
(9, 'Alden', 'Willis', 'ligula.Donec@Quisquepurus', 'X9D 6N3', 'ARV39VRR0FN', '2005-03-05', '7304', 1),
(10, 'Denise', 'Buckley', 'ipsum.cursus@massaSuspend', 'M1Y 7E4', 'PMQ90RWX3VW', '1990-10-31', '3691', 1),
(11, 'Fede', 'Ramírez', 'fede@gmail.com', 'fede', '$2y$10$/pLNQolNf1O88rkPkDpEQ.NYVIQKlLZPCx/8.mDHx0NYljtsZl8pe', '2000-08-29', NULL, 1),
(12, 'Geovany', 'Pineda', 'geova@gmail.com', 'geova', '$2y$10$IcEnmb9qF2pzhmQ1AWsahOBX42gQIJ8490Hpyi00O0qYRE5aboJbm', '2000-09-04', NULL, 1),
(13, 'María', 'Campos', 'maria@gmail.com', 'majo', '$2y$10$.LT4Q5Ulr0ufqsiTNUW/nO4KSWKE3zZeRZNLqn93xmaQSlE8bPP/q', '2000-06-04', NULL, 1),
(14, 'Bryan', 'Amaya', 'bryan@gmail.com', 'bryan', '$2y$10$pPEmi8Nd9AWYikmvpaa7PuKN7.pq2N2lU2qa38aFF7hB8eR8HhFCa', '2001-08-16', NULL, 1),
(15, 'Admin', 'Admin', 'admin@gmail.com', 'admin', '$2y$10$L3VCHFPcCcbbf1jaKrSuPOY8ak/Da3gM5Z8pBVJmC4PyWUyjMHQyO', '2019-06-12', NULL, 1),
(16, 'Geovany Arturo', 'Fuentes', 'geo@gola.com', 'geova', '$2y$10$ZJsqSkJdMSpsLhWqgTtROejONWoxWUuVDWpCv5V7NchIpadlemq6C', '1988-09-04', NULL, 1),
(17, 'juan', 'miguel', 'juan@gmaiul.com', 'miguelito', '$2y$10$AlNsgw0.12jDbkVLCO2iLu0UumVB7pxiyJER822ZT9h/kP3dkC8UG', '1999-05-06', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion_doctor`
--
ALTER TABLE `calificacion_doctor`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `calificacion_paciente`
--
ALTER TABLE `calificacion_paciente`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_cita` (`id_cita`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
