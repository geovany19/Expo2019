﻿-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2019 a las 19:51:50
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

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
CREATE DATABASE IF NOT EXISTS `sismed`;

USE `sismed`;

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
(0, 'INSERTAR', 'root', 'localhost', '2019-08-05 14:57:33', 'consulta');

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
(9, 3, 1, 5, NULL);

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
(1, 4, 1, '2019-03-20', '09:00:00', 4),
(2, 4, 1, '2019-03-20', '10:00:00', 4),
(3, 3, 1, '2019-03-20', '10:30:00', 4),
(5, 2, 1, '2019-03-21', '08:10:00', 4),
(6, 4, 1, '2019-03-21', '08:40:00', 4),
(7, 4, 1, '2019-03-21', '09:20:00', 4),
(8, 3, 1, '2019-03-21', '15:00:00', 4),
(9, 2, 1, '2019-03-21', '16:00:00', 4),
(10, 2, 1, '2019-03-21', '16:30:00', 4),
(11, 3, 1, '2019-03-22', '08:15:00', 4),
(12, 3, 1, '2019-03-22', '08:50:00', 4),
(13, 2, 1, '2019-03-22', '09:05:00', 4),
(14, 2, 1, '2019-03-22', '09:45:00', 4),
(15, 4, 2, '2019-03-23', '07:30:00', 4),
(16, 4, 2, '2019-03-23', '08:00:00', 4),
(17, 3, 2, '2019-03-23', '08:30:00', 4),
(18, 2, 2, '2019-03-23', '08:10:00', 4),
(19, 2, 1, '2019-03-23', '08:40:00', 4),
(20, 2, 1, '2019-03-23', '09:20:00', 4),
(21, 3, 1, '2019-03-23', '08:05:00', 4),
(22, 2, 1, '2019-03-23', '16:00:00', 4),
(23, 2, 1, '2019-03-24', '10:00:00', 4),
(24, 3, 1, '2019-03-24', '08:15:00', 4),
(25, 3, 1, '2019-03-24', '08:50:00', 4),
(26, 2, 1, '2019-03-24', '09:05:00', 4),
(27, 2, 1, '2019-03-22', '10:35:00', 4),
(28, 1, 2, '2019-03-25', '07:35:00', 4),
(29, 2, 2, '2019-03-25', '08:00:00', 4),
(30, 3, 1, '2019-03-25', '08:30:00', 4),
(31, 4, 2, '2019-03-25', '08:10:00', 4),
(32, 4, 2, '2019-03-25', '08:40:00', 4),
(33, 3, 1, '2019-03-25', '09:20:00', 4),
(34, 3, 1, '2019-03-26', '14:05:00', 4),
(35, 4, 1, '2019-03-26', '15:15:00', 4),
(36, 2, 1, '2019-03-26', '07:00:00', 3),
(37, 1, 2, '2019-03-26', '08:15:00', 3),
(38, 4, 1, '2019-03-26', '08:50:00', 4),
(39, 1, 2, '2019-03-26', '09:05:00', 4),
(40, 1, 2, '2019-04-27', '09:05:00', 4);

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
(12, 'Mal de orin', 4, 1, 'Agua en abundancia', 12),
(13, 'Gastritis', 1, 1, 'Medicamentos', 13),
(14, 'Gastritis', 3, 1, 'Medicamentos', 14),
(15, 'Gastritis', 3, 1, 'Medicamentos', 40);

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
  `correo_doctor` varchar(25) NOT NULL,
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
(4, 'Maria', 'Campos', 'mariacampos@gmail.com', 'maria1', '$2y$10$QAzi8yRHsvwzQotubSQov.Q7wrL5BQ0fJUX3Hstd4PhZWrTtSk3Aa', '2000-06-04', '5d2cf2cf2cfda.jpg', 1, 1);

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
  `correo_paciente` varchar(25) NOT NULL,
  `usuario_paciente` varchar(25) NOT NULL,
  `contrasena_paciente` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `foto_paciente` varchar(150) DEFAULT NULL,
  `peso_paciente` double DEFAULT NULL,
  `estatura_paciente` double DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre_paciente`, `apellido_paciente`, `correo_paciente`, `usuario_paciente`, `contrasena_paciente`, `fecha_nacimiento`, `foto_paciente`, `peso_paciente`, `estatura_paciente`, `id_estado`) VALUES
(1, 'Carlos', 'Ramírez', 'carlos@gmail.com', 'carlos', '1234567', '2000-08-29', '5d3f01c0e1a05.jpg', 157, 162, 1),
(2, 'Oswaldo', 'Franco', 'oswaldo@gmail.com', 'oswaldo', '1234567', '2001-04-10', '5d3f01c0e1a05.jpg', 157, 162, 1);

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
-- Indices de la tabla `dias_disponibilidad`
--
ALTER TABLE `dias_disponibilidad`
  ADD PRIMARY KEY (`id_dia`),
  ADD UNIQUE KEY `dia` (`dia`);

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`id_disponibilidad`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_dia` (`id_dia`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `id_especialidad` (`id_especialidad`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `estado_cita`
--
ALTER TABLE `estado_cita`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estado_usuarios`
--
ALTER TABLE `estado_usuarios`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id_mes`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `id_tipousuario` (`id_tipousuario`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipousuario`);

--
-- Indices de la tabla `usuarios_a`
--
ALTER TABLE `usuarios_a`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion_doctor`
--
ALTER TABLE `calificacion_doctor`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `calificacion_paciente`
--
ALTER TABLE `calificacion_paciente`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `dias_disponibilidad`
--
ALTER TABLE `dias_disponibilidad`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  MODIFY `id_disponibilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estado_cita`
--
ALTER TABLE `estado_cita`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_usuarios`
--
ALTER TABLE `estado_usuarios`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id_mes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios_a`
--
ALTER TABLE `usuarios_a`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion_doctor`
--
ALTER TABLE `calificacion_doctor`
  ADD CONSTRAINT `calificacion_doctor_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`),
  ADD CONSTRAINT `calificacion_doctor_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `calificacion_paciente`
--
ALTER TABLE `calificacion_paciente`
  ADD CONSTRAINT `calificacion_paciente_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `calificacion_paciente_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`);

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado_cita` (`id_estado`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`),
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id_cita`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`),
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD CONSTRAINT `disponibilidad_ibfk_1` FOREIGN KEY (`id_dia`) REFERENCES `dias_disponibilidad` (`id_dia`),
  ADD CONSTRAINT `disponibilidad_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`);

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `doctores_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `doctores_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado_usuarios` (`id_estado`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado_usuarios` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
