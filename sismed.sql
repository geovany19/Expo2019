-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2019 a las 20:07:58
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sismed`
--

CREATE DATABASE `sismed`;

USE `sismed`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_calificacion` (IN `id_calificacion` INT, IN `puntuacion` DOUBLE, IN `resena` VARCHAR(100), IN `usuario_calificador` INT, IN `usuario_calificado` INT, IN `id_tipousuario` INT)  NO SQL
INSERT INTO calificacion VALUES(`id_calificacion`, `puntuacion`, `resena`, `usuario_calificador`, `usuario_calificado`, `id_tipousuario`)$$

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
(0, 'INSERTAR', 'root', 'localhost', '2019-08-11 22:24:13', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:26:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 10:30:37', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 11:50:05', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 11:51:07', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 11:51:12', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-12 11:53:59', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:16:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:16:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:16:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:16:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:16:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:16:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:16:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:16:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:16:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:16:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:27:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:27:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:27:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:27:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:27:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:27:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:27:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:27:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:27:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 08:27:00', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 09:22:59', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 09:27:54', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 09:31:10', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 09:31:41', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 09:56:45', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 09:57:13', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-13 11:00:51', 'consulta'),
(0, 'INSERTAR', 'root', 'localhost', '2019-08-18 11:57:46', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-21 19:18:29', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-21 19:18:29', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-21 22:41:57', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-22 11:06:37', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-23 22:31:44', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-23 22:33:06', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-24 22:01:45', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-25 20:05:45', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:08:50', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:18:45', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:37:19', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:38:01', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:39:15', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:45:17', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:46:08', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:46:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:46:20', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:46:21', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:47:31', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:48:42', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:48:43', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:48:52', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:48:58', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:48:59', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-26 22:49:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 00:43:07', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 00:44:32', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 00:47:00', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 00:47:43', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 00:49:30', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 00:49:53', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 13:48:34', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 13:49:18', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 13:53:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 14:28:57', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 14:29:15', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 14:33:16', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 20:34:32', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 21:04:20', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-27 21:05:33', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 09:11:02', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 09:11:48', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 09:24:55', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 09:25:58', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 10:08:46', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 10:25:27', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 10:31:38', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 10:51:43', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 10:52:18', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 11:09:45', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 11:16:03', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 11:16:47', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 11:31:03', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 11:41:04', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 11:53:24', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 11:53:50', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 12:02:57', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 15:00:50', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 15:10:18', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 15:17:33', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-28 15:31:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-29 11:05:02', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-29 14:18:58', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-29 14:24:41', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-29 14:36:34', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-09-29 14:43:31', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-21 21:26:04', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-21 21:31:20', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-21 21:31:59', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-21 21:32:36', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-24 23:32:08', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-24 23:34:18', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-24 23:37:11', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-24 23:46:53', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-24 23:48:00', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-24 23:48:49', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-25 11:25:56', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-25 11:28:06', 'cita'),
(0, 'INSERTAR', 'root', 'localhost', '2019-10-25 11:30:34', 'cita');

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
  `id_estado` int(11) DEFAULT NULL,
  `fecha_maxima` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `id_doctor`, `id_paciente`, `fecha_cita`, `hora_cita`, `id_estado`, `fecha_maxima`) VALUES
(1, 4, 4, '2019-09-22', '09:00:00', 1, '0000-00-00 00:00:00'),
(2, 4, 2, '2019-09-22', '09:30:00', 1, '0000-00-00 00:00:00'),
(3, 4, 3, '2019-09-23', '09:30:00', 1, '0000-00-00 00:00:00'),
(5, 4, 1, '2019-09-24', '09:00:00', 1, '0000-00-00 00:00:00'),
(6, 4, 2, '2019-09-24', '08:00:00', 3, '0000-00-00 00:00:00'),
(7, 4, 3, '2019-09-25', '10:00:00', 1, '0000-00-00 00:00:00'),
(9, 1, 2, '2019-09-27', '10:00:00', 1, '0000-00-00 00:00:00'),
(10, 4, 6, '2019-09-25', '12:00:00', 1, '0000-00-00 00:00:00'),
(11, 1, 10, '2019-09-27', '22:37:00', 2, '0000-00-00 00:00:00'),
(12, 3, 2, '2019-09-26', '22:37:00', 3, '0000-00-00 00:00:00'),
(13, 5, 5, '2019-09-27', '22:39:00', 2, '0000-00-00 00:00:00'),
(14, 4, 5, '2019-09-27', '10:30:00', 1, '0000-00-00 00:00:00'),
(16, 4, 20, '2019-09-27', '14:45:00', 1, '0000-00-00 00:00:00'),
(17, 4, 5, '2019-09-27', '06:46:00', 3, '0000-00-00 00:00:00'),
(18, 4, 5, '2019-09-27', '07:46:00', 1, '0000-00-00 00:00:00'),
(19, 4, 5, '2019-09-27', '06:47:00', 1, '0000-00-00 00:00:00'),
(20, 4, 5, '2019-09-27', '06:47:00', 1, '0000-00-00 00:00:00'),
(21, 4, 5, '2019-09-27', '06:47:00', 3, '0000-00-00 00:00:00'),
(22, 4, 5, '2019-09-26', '06:47:00', 1, '0000-00-00 00:00:00'),
(23, 4, 5, '2019-09-26', '06:47:00', 3, '0000-00-00 00:00:00'),
(25, 2, 4, '2019-09-26', '23:00:00', 2, '0000-00-00 00:00:00'),
(26, 4, 2, '2019-08-27', '10:00:00', 3, '0000-00-00 00:00:00'),
(27, 5, 2, '2019-09-26', '08:00:00', 3, '0000-00-00 00:00:00'),
(28, 1, 2, '2019-09-27', '00:00:00', 3, '0000-00-00 00:00:00'),
(29, 1, 2, '2019-09-27', '03:00:00', 3, '0000-00-00 00:00:00'),
(30, 1, 2, '2019-09-28', '08:00:00', 3, '0000-00-00 00:00:00'),
(31, 1, 2, '2019-09-28', '07:00:00', 3, '0000-00-00 00:00:00'),
(32, 4, 16, '2019-09-27', '13:55:00', 3, '0000-00-00 00:00:00'),
(33, 4, 16, '2019-09-30', '13:55:00', 3, '0000-00-00 00:00:00'),
(34, 4, 16, '2019-09-27', '14:00:00', 1, '0000-00-00 00:00:00'),
(35, 4, 17, '2019-09-27', '02:30:00', 1, '0000-00-00 00:00:00'),
(36, 1, 17, '2019-09-27', '02:30:00', 2, '0000-00-00 00:00:00'),
(37, 4, 17, '2019-09-27', '14:30:00', 1, '0000-00-00 00:00:00'),
(38, 4, 16, '2019-09-28', '08:00:00', 1, '0000-00-00 00:00:00'),
(39, 4, 16, '2019-09-27', '21:05:00', 1, '0000-00-00 00:00:00'),
(40, 4, 16, '2019-09-27', '21:05:00', 1, '0000-00-00 00:00:00'),
(41, 4, 2, '2019-09-28', '10:00:00', 1, '0000-00-00 00:00:00'),
(42, 4, 5, '2019-09-28', '11:00:00', 1, '0000-00-00 00:00:00'),
(43, 4, 20, '2019-09-28', '09:30:00', 1, '0000-00-00 00:00:00'),
(44, 4, 20, '2019-09-28', '09:30:00', 1, '0000-00-00 00:00:00'),
(45, 4, 20, '2019-09-28', '10:10:00', 1, '0000-00-00 00:00:00'),
(46, 4, 22, '2019-09-28', '10:27:00', 1, '0000-00-00 00:00:00'),
(47, 4, 20, '2019-09-28', '10:35:00', 1, '0000-00-00 00:00:00'),
(48, 4, 23, '2019-09-28', '10:55:00', 3, '0000-00-00 00:00:00'),
(49, 4, 23, '2019-09-28', '10:55:00', 1, '0000-00-00 00:00:00'),
(51, 4, 20, '2019-09-28', '11:20:00', 3, '0000-00-00 00:00:00'),
(52, 4, 20, '2019-09-28', '11:20:00', 1, '0000-00-00 00:00:00'),
(53, 4, 20, '2019-09-28', '11:35:00', 1, '0000-00-00 00:00:00'),
(54, 4, 20, '2019-09-28', '11:45:00', 1, '0000-00-00 00:00:00'),
(55, 4, 24, '2019-09-28', '11:58:00', 3, '0000-00-00 00:00:00'),
(56, 4, 24, '2019-09-28', '11:59:00', 1, '0000-00-00 00:00:00'),
(57, 4, 24, '2019-09-28', '12:05:00', 1, '0000-00-00 00:00:00'),
(58, 4, 20, '2019-09-28', '15:05:00', 1, '0000-00-00 00:00:00'),
(59, 4, 20, '2019-09-28', '15:15:00', 1, '0000-00-00 00:00:00'),
(60, 4, 20, '2019-09-28', '15:20:00', 1, '0000-00-00 00:00:00'),
(61, 4, 20, '2019-09-28', '15:35:00', 1, '0000-00-00 00:00:00'),
(62, 4, 20, '2019-09-29', '11:10:00', 1, '0000-00-00 00:00:00'),
(63, 4, 20, '2019-09-29', '15:00:00', 4, '0000-00-00 00:00:00'),
(64, 4, 20, '2019-09-29', '15:05:00', 3, '0000-00-00 00:00:00'),
(65, 4, 20, '2019-09-29', '15:15:00', 2, '0000-00-00 00:00:00'),
(66, 4, 20, '2019-09-29', '15:30:00', 2, '0000-00-00 00:00:00'),
(67, 1, 25, '2019-10-21', '23:30:00', 3, '0000-00-00 00:00:00'),
(68, 1, 25, '2019-10-21', '21:30:00', 3, '0000-00-00 00:00:00'),
(69, 1, 25, '2019-10-21', '22:45:00', 2, '0000-00-00 00:00:00'),
(70, 5, 25, '2019-10-22', '10:00:00', 2, '0000-00-00 00:00:00'),
(71, 1, 2, '2019-10-25', '10:00:00', 3, '0000-00-00 00:00:00'),
(72, 2, 2, '2019-10-25', '09:00:00', 3, '0000-00-00 00:00:00'),
(73, 4, 2, '2019-10-25', '10:00:00', 3, '2019-10-24 00:00:00'),
(74, 4, 2, '2019-10-26', '08:00:00', 3, '0000-00-00 00:00:00'),
(75, 5, 2, '2019-10-26', '08:30:00', 3, '0000-00-00 00:00:00'),
(76, 1, 2, '2019-10-26', '10:00:00', 3, '0000-00-00 00:00:00'),
(77, 2, 2, '2019-10-22', '08:00:00', 3, '0000-00-00 00:00:00'),
(78, 1, 2, '2019-10-24', '08:00:00', 3, '0000-00-00 00:00:00'),
(79, 1, 2, '2019-10-26', '05:00:00', 3, '0000-00-00 00:00:00');

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
  `padecimientos` varchar(200) NOT NULL,
  `receta` varchar(250) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `padecimientos`, `receta`, `id_doctor`, `id_paciente`, `id_cita`) VALUES
(1, 'Dolor de cabeza', '1 acetaminofen cada 8 horas por 1 día', 4, 1, 1),
(2, 'Cancer', 'Amor', 4, 20, 16),
(3, 'Cancer', 'quimioterapia', 4, 17, 37),
(4, 'gripe', 'virogrip', 4, 5, 18),
(7, 'hola', 'Hols', 4, 5, 19),
(8, 'dsfd', 'dsfsd', 4, 5, 19),
(9, 'waesrdtfy', 'sdfgvhkj', 4, 5, 19),
(10, 'hgshgdshg', 'dshjdjdfhjf', 4, 16, 38),
(11, 'hgshgdshg', 'dshjdjdfhjf', 4, 16, 38),
(12, 'wserty', 'wadsfgh', 4, 16, 38),
(13, 'wesdrgf', 'asdfgh', 4, 16, 38),
(14, 'wesdrgf', 'asdfgh', 4, 16, 38),
(15, 'wsadf', 'dfg', 4, 16, 38),
(16, 'majo', 'majo', 4, 16, 38),
(17, 'holi', 'holi', 4, 16, 38),
(18, 'gripe', 'lol', 4, 5, 20),
(19, 'yuaiussoi', 'hjdshsdjfjd', 4, 17, 35),
(22, 'hola', 'hola', 4, 2, 41),
(23, 'Es guapo', 'Ninguna, no puede dejar de ser guapo', 4, 20, 45),
(24, 'Tiene novio', 'Dejarlo por Bryan', 4, 22, 46),
(25, 'Le duele la muela', 'Jarabe de semilla de guayaba', 4, 20, 47),
(26, 'gripe', 'acetaminofen', 4, 23, 49),
(27, 'guapo', 'nada', 4, 20, 52),
(28, 'guapo', 'No se puede dejar de ser guapo, perdon', 4, 20, 53),
(29, 'gripe', 'acetaminofen', 4, 20, 54),
(30, 'Guapo', 'Acetaminofen', 4, 24, 56),
(31, 'jaja', 'ajaj', 4, 24, 57),
(32, 'cancer', 'amor', 4, 20, 58),
(33, 'dfghj', 'fghjkl', 4, 20, 59),
(34, 'ser feo', 'ser guapo', 4, 20, 60),
(35, 'ajaj', 'ajaja', 4, 20, 61),
(36, 'Dolor de cabeza', 'acetaminofen', 4, 20, 62);

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
  `telefono_doctor` varchar(8) NOT NULL,
  `id_especialidad` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `token_doctor` varchar(100) NOT NULL,
  `clave_actualizada` timestamp NULL DEFAULT NULL,
  `cuenta_bloqueada` timestamp NULL DEFAULT NULL,
  `id_sesion` int(11) DEFAULT NULL,
  `autenticar_doctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doctor`, `nombre_doctor`, `apellido_doctor`, `correo_doctor`, `usuario_doctor`, `contrasena_doctor`, `fecha_nacimiento`, `foto_doctor`, `telefono_doctor`, `id_especialidad`, `id_estado`, `token_doctor`, `clave_actualizada`, `cuenta_bloqueada`, `id_sesion`, `autenticar_doctor`) VALUES
(1, 'Federico', 'Ramirez', 'fede@gmail.com', 'Fede', '$2y$10$gZkOWNToIRGwyZCHHzmMq.iWGke1GXQtAUg6LKeCxix1jkgSTH03G', '2000-08-29', '5d2ce5fdea331.jpg', '78452447', 2, 1, '', NULL, NULL, 2, 0),
(2, 'Bryan', 'Amaya', 'bryan28@gmail.com', 'BA01', '$2y$10$K9IUbArlaysW0ZD.Lez1Ve52.oGcn4AV50kPKRi2SLaonXl0pjozK', '2001-08-16', '5d2cf28163ba9.jpg', '70578220', 2, 1, '', NULL, NULL, 2, 0),
(3, 'Geovany', 'Fuentes', 'geovany@gmail.com', 'geovany', '$2y$10$AUjA29YYWOYOfBoT80eCku4tl5tcIIWWq4e7PpQV68gcT8KKEL656', '2000-09-04', '5d2cf2a2bfdb8.jpg', '', 8, 1, '', NULL, NULL, 2, 0),
(4, 'Maria', 'Campos', 'federicoramirez0050@gmail.com', 'maria1', '$2y$10$hWjMHuSsyRKzwowwsHrd/ukpwJ3dOZLKzH7lD6tyc2y9rvyPsKLkG', '2000-06-04', '5d2cf2cf2cfda.jpg', '32326565', 1, 1, '5d8afb20953b1', NULL, NULL, 2, 0),
(5, 'Patricia', 'Soriano', 'patricia_soriano@gmail.com', 'PS01', '$2y$10$QAzi8yRHsvwzQotubSQov.Q7wrL5BQ0fJUX3Hstd4PhZWrTtSk3Aa', '1986-07-18', '5d2cf2cf2cfda.jpg', '', 7, 1, '', NULL, NULL, 2, 0),
(6, 'César', 'Ferrufino', 'cesar_ferrufino@gmail.com', 'CF01', '$2y$10$gZkOWNToIRGwyZCHHzmMq.iWGke1GXQtAUg6LKeCxix1jkgSTH03G', '2001-05-02', '5d2ce5fdea331.jpg', '', 3, 1, '', NULL, NULL, 2, 0),
(7, 'Pamela', 'Urbina', 'pamela_urbina@gmail.com', 'PU01', '$2y$10$K9IUbArlaysW0ZD.Lez1Ve52.oGcn4AV50kPKRi2SLaonXl0pjozK', '2000-06-12', '5d2cf28163ba9.jpg', '', 5, 1, '', NULL, NULL, 2, 0),
(8, 'Marcelo', 'Mayorga', 'marcelo_mayorga@gmail.com', 'MM01', '$2y$10$AUjA29YYWOYOfBoT80eCku4tl5tcIIWWq4e7PpQV68gcT8KKEL656', '2000-12-20', '5d2cf2a2bfdb8.jpg', '', 10, 1, '', NULL, NULL, 2, 0),
(9, 'Gabriela', 'Alfaro', 'gabriela_alfaro@gmail.com', 'GA01', '$2y$10$QAzi8yRHsvwzQotubSQov.Q7wrL5BQ0fJUX3Hstd4PhZWrTtSk3Aa', '2000-08-21', '5d2cf2cf2cfda.jpg', '74201550', 6, 1, '', NULL, NULL, 2, 0),
(10, 'Alejandra', 'Menjivar', 'alejandra_menjivar@gmail.com', 'AM01', '$2y$10$QAzi8yRHsvwzQotubSQov.Q7wrL5BQ0fJUX3Hstd4PhZWrTtSk3Aa', '1995-03-23', '5d2cf2cf2cfda.jpg', '76044500', 9, 1, '', NULL, NULL, 2, 0),
(11, 'Sofía', 'Hill', 'sofia_hill@gmail.com', 'SH01', '$2y$10$YjixcxKYSCCK5W0LphSmO.acqr/TaL.BFmMKap0WCnscAP77h2eqC', '1997-09-02', '5d7eaf031452a.jpg', '', 2, 1, '', NULL, NULL, 2, 0),
(12, 'Giovanni', 'Bonilla', 'giovanni_bonilla@gmail.com', 'GB01', '$2y$10$FbVNKLj69X.6Oyf.rm/tyOYq9IwnD0E..JXFukan459EIGr1oxqS6', '1998-04-06', '5d8ae7886376e.jpg', '', 3, 1, '', NULL, NULL, 2, 0),
(13, 'majito', 'Campos', 'maria_campos84@hotmail.com', 'maria1234', '$2y$10$bSw7lxjnbl11TfdHWnaemuo8n0Y1SxUruIrUKDcfEQvu6gNReEABy', '2000-06-04', NULL, '', NULL, 1, '', '2019-09-27 06:00:00', NULL, 2, 0),
(14, 'Ashley', 'Halsey', 'ashley.halsey@gmail.com', 'ashley.halsey', '$2y$10$lssqY9QXaRBk3O6f/46oteokJRp27dgmBcFUDYhc56yQAUkfcS9im', '1991-11-08', '5d8ee4a415ae2.jpg', '70668884', 4, 1, '', NULL, NULL, 2, 0),
(15, 'Ingrid', 'Del Carmen', 'ingrid@gmail.com', 'ingrid1', '$2y$10$NYJmn9.pibVsN.SKgz8Wy.vc4ZOQMeDW264y/58qEGv0UHU906hEa', '1988-10-03', NULL, '', NULL, 0, '', '2019-09-28 06:00:00', NULL, 2, 0),
(16, 'Victor Manuel', 'Henriquez Garcia', 'bryalema@gmail.com', 'Victor01', '$2y$10$.jUNtSRFGxXdoHWI98BY0OWqxbEkbnKEv3enpXE7qmxMmUGwty0A6', '2001-12-04', '5d8f8d63936a2.png', '25252525', 1, 1, '', NULL, NULL, 2, 0),
(17, 'Daniel', 'Rivas', 'daniel_rivas@gmail.com', 'DR01', '$2y$10$TNlngvkYf6A6KSE3O1dqnegI4vzuDFW6HLvM0LKWHWfTlmmIeYjve', '1986-05-07', '5d910ffb79bc5.jpg', '78241000', 7, 1, '', NULL, NULL, 2, 0),
(18, 'Jessica', 'Arias', 'jessica_arias@gmail.com', 'JA01', '$2y$10$PPIK11QwZZ/0n/eM3dtPP.d02f03W9JkMEMLqDKgSr4Ckqm8ld4Em', '1989-02-22', '5db251b83857b.png', '74552210', 3, 0, '', NULL, NULL, 2, 0),
(19, 'Mateo', 'Hill', 'mateo_hill@outlook.com', 'MH01', '$2y$10$xAkv6UXjoKgONme858.lJu4Xt1tiIupqrpCm7YrTUEa.QLMlZqTbm', '1996-05-05', '5db2531f2f9f2.jpg', '70365444', 9, 1, '', NULL, NULL, 2, 0);

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
(1, 'Cardiologia', 'Se encarga del estudio diagnostico y tratamiento de las enfermedades del corazon.'),
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
(1, 'Realizada'),
(2, 'Pendiente'),
(3, 'Cancelada'),
(4, 'Aceptada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_sesion`
--

CREATE TABLE `estado_sesion` (
  `id_sesion` int(11) NOT NULL,
  `estado_sesion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_sesion`
--

INSERT INTO `estado_sesion` (`id_sesion`, `estado_sesion`) VALUES
(1, 'En línea'),
(2, 'Desconectado');

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
  `foto_paciente` varchar(150) DEFAULT 'no-disponible.png',
  `peso_paciente` double DEFAULT NULL,
  `estatura_paciente` double DEFAULT NULL,
  `telefono_paciente` varchar(8) NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `token_paciente` varchar(100) NOT NULL,
  `clave_actualizada` timestamp NULL DEFAULT NULL,
  `cuenta_bloqueada` timestamp NULL DEFAULT NULL,
  `id_sesion` int(11) DEFAULT NULL,
  `autenticar_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre_paciente`, `apellido_paciente`, `correo_paciente`, `usuario_paciente`, `contrasena_paciente`, `fecha_nacimiento`, `foto_paciente`, `peso_paciente`, `estatura_paciente`, `telefono_paciente`, `id_estado`, `token_paciente`, `clave_actualizada`, `cuenta_bloqueada`, `id_sesion`, `autenticar_paciente`) VALUES
(1, 'Bryan Alejandro', 'Amaya', 'federicoramirez0050@gmail.com', 'ElBatmanBosco', '123456', '2001-08-16', '5d811eadec008.jpg', 150, 172, '78441147', 1, '5d807c4b31cde', '2019-09-16 06:00:00', '2019-09-17 06:00:00', 2, 0),
(2, 'Daniel', 'Carranza Miguel', 'federicoramirez0050@gmail.com', 'DanielCarranza', '$2y$10$HGDSSBESuGr4L4iIMu4kSeHllD.hgAAtLA3to.Gk1JFFgLmtfmztG', '2000-06-30', 'no-disponible.png', 130, 165, '', 1, '5d80e9986e01f', '2019-09-17 06:00:00', '2019-09-17 06:00:00', 2, 0),
(3, 'Bryan Alejandro', 'Amaya', 'federicoramirez0050@gmail.com', 'Bryan', '123456', '2001-08-16', '5d811eadec008.jpg', 150, 172, '0', 1, '5d807c4b31cde', '2019-09-16 06:00:00', '2019-09-27 06:00:00', 2, 0),
(4, 'Fernando', 'Perez', 'fernando_perez@gmail.com', 'fernando.perez', '', '1997-05-27', 'no-disponible.png', 134, 180, '78554420', 1, '', NULL, NULL, 2, 0),
(5, 'Maria', 'Mercedes', 'maria_mercedes@hotmail.com', 'maria.mercedes', '', '1999-03-08', 'no-disponible.png', 130, 165, '77558866', 1, '', NULL, NULL, 2, 0),
(6, 'Alejandro', 'Magno', 'alejandro_magno@gmail.com', '', '', '1986-01-05', 'no-disponible.png', 140, 180, '22775544', 0, '', NULL, NULL, 2, 0),
(9, 'Boris', 'Huezo', 'boris_huezo@gmail.com', 'boris.huezo', '', '2000-04-16', 'no-disponible.png', 120, 175, '78542580', 1, '', NULL, NULL, 2, 0),
(10, 'Raúl', 'Pocasangre', 'raul_pocasamgre@gmail.com', '', '', '2008-08-08', 'no-disponible.png', 150, 174, '66880145', NULL, '', NULL, NULL, 2, 0),
(11, 'Paola', 'Torres', 'paola_torres@gmail.com', '', '', '1988-09-15', 'no-disponible.png', 117, 168, '78451234', NULL, '', NULL, NULL, 2, 0),
(12, 'Patricia', 'Soriano', 'patricia_soriano@gmail.com', '', '', '1966-07-18', 'no-disponible.png', 157, 160, '55529736', NULL, '', NULL, NULL, 2, 0),
(13, 'Aaron', 'Peña', 'aaron_pea@gmail.com', '', '', '2010-08-08', 'no-disponible.png', 152, 170, '78545522', NULL, '', NULL, NULL, 2, 0),
(14, 'Prueba', 'Wuju', 'prueba@gmail.com', '', '', '1972-09-08', 'no-disponible.png', 147, 163, '75221866', NULL, '', NULL, NULL, 2, 0),
(15, 'Geovany', 'Fuentes', 'bryaleama@gmail.com', 'bryan', '$2y$10$D74vMCrRW6queL9FMv3GWeaufpXQLfmMsot/YCQHFaIY06AIoVoeG', '2000-08-06', NULL, 150, 172, '', 0, '5d8f9f97b9d30', '2019-09-27 06:00:00', '2019-09-27 06:00:00', 2, 0),
(16, 'Geovany', 'Fuentes', 'maria_campos84@hotmail.com', 'geova', '$2y$10$pshZlxk3cd1H5fONwAoUa.oP2JWj.Y/jG27qtEVp0SrW0FF0iMq4S', '2000-09-04', NULL, 175, 172, '', 1, '', '2019-09-27 06:00:00', NULL, 2, 0),
(17, 'jose', 'campos', 'maria_campos84@hotmail.com', 'jose123', '$2y$10$vc.82G.aGQys83g8uTJhA.tgRP5B0ONXmMJ1dihnh32QLwLy0FxkW', '2000-03-09', NULL, 120, 120, '', 1, '', '2019-09-27 06:00:00', NULL, 2, 0),
(18, 'Ricardo', 'Sanchez', 'ricardo_sanchez@gmail.com', 'Ricardo.Sanchez', '$2y$10$u4byca/PfyQtl6/j7XzjBu/2mhEzL3CviJ0z8pz2AdVwtfdyMm/TW', '2002-06-18', '5d8edef5535b9.png', 175, 183, '78558877', 1, '', NULL, NULL, 2, 0),
(19, 'Elvis', 'Alas', 'elvis_alas@gmail.com', 'Elvis.Alas', '$2y$10$23nXSdBVmQHJswUpGCVZiugrkoD.SBbYQLuqZZg2HWGHqS91Azhna', '1988-05-06', NULL, 162, 184, '77982220', 0, '', '2019-09-28 06:00:00', NULL, 2, 0),
(20, 'Bryan', 'Amaya', 'federicoramirez0050@gmail.com', 'Bryan1', '$2y$10$AKm7q0zpnApugvnWQPYl6OcBoTkEhLNh2LZ8Ur08/8/9ciKZlbEHa', '2000-08-16', NULL, 150, 172, '77889977', 1, '5d8f9f97b9d30', '2019-09-28 06:00:00', NULL, 2, 0),
(21, 'Marcelo', 'Mayorga', 'marcelo.mayorga@gmail.com', '', '', '2000-12-20', 'no-disponible.png', 168, 170, '70542111', NULL, '', NULL, NULL, 2, 0),
(22, 'Daniela Nicole', 'Aparicio Perez', 'daniela.aparicio01@gmail.com', 'nicoleaparicio5', '$2y$10$ZwyvV4z9zcKGaeaFobMnn.I5hI71CM.wQVxko4z1W1pmdhBzRTBq6', '2001-06-28', NULL, 130, 160, '70148448', 1, '', '2019-09-28 06:00:00', NULL, 2, 0),
(23, 'Wilfredo', 'Granados', 'bryaleama@gmail.com', 'Wil', '$2y$10$3sDQBLumz9xZleHGO5myK.VTxhWuTj/zmRZt0bxEw77AUkB88ddpa', '1998-08-16', NULL, 160, 175, '', 1, '5d8f9f97b9d30', '2019-09-28 06:00:00', NULL, 2, 0),
(24, 'Edgar', 'Rivas', 'bryaleama@gmail.com', 'Edgar', '$2y$10$pU/uDp1ED5k5jHgp6fBQUOXts5c7a0/aKNcT.snIsEQV7AZH/IZc6', '1995-07-06', NULL, 160, 165, '', 1, '5d8f9f97b9d30', '2019-09-28 06:00:00', '2019-09-28 06:00:00', 2, 0),
(25, 'Marina', 'Polanco', 'federicoramirez0050@gmail.com', 'marina', '$2y$10$Xnd9xR9vaLPLl2cFkSvoueriuzAvVkY1QWcbLOQHo/eXnhfXSOwAe', '1996-09-12', NULL, 143, 169, '74201455', 1, '', '2019-10-22 06:00:00', NULL, 2, 0),
(26, 'Marina', 'Polanco', 'federicoramirez0050@gmail.com', 'marina', '$2y$10$Q8t2SoeqmrK8WCwhfDbTPuexjzXZ4o7p/vjLnDnVdjiXSUoGwZo8.', '1996-09-12', NULL, 143, 169, '74201455', 0, '', '2019-10-22 06:00:00', NULL, 2, 429904);

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
  `correo_usuario` varchar(125) NOT NULL,
  `usuario_usuario` varchar(25) NOT NULL,
  `contrasena_usuario` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `foto_usuario` varchar(150) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `token_usuario` varchar(100) NOT NULL,
  `clave_actualizada` timestamp NULL DEFAULT NULL,
  `cuenta_bloqueada` timestamp NULL DEFAULT NULL,
  `id_sesion` int(11) DEFAULT NULL,
  `autenticar_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_a`
--

INSERT INTO `usuarios_a` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `usuario_usuario`, `contrasena_usuario`, `fecha_nacimiento`, `foto_usuario`, `id_estado`, `token_usuario`, `clave_actualizada`, `cuenta_bloqueada`, `id_sesion`, `autenticar_usuario`) VALUES
(23, 'Daniel', 'Carranza', 'geofuentes.gf@gmail.com', 'daniel.carranza', '$2y$10$VjPXOXSUbZKmFUWGuhrKBucWzgRUds.Ab4kJLsjvDyMaNfqZNBHCi', '1996-08-25', '5d8af316c9724.jpg', 1, '', NULL, '2019-09-26 06:00:00', 2, 0),
(24, 'Guaynaa', 'Bichi', 'guaynaa@gmail.com', 'GB01', '$2y$10$5/iZ539OYc2cqPDnAdC3yuXxlP/TgdBWBoja0F2zp3nBkiviFM1YW', '1999-05-18', '5d8aea006b098.jpg', 1, '', NULL, NULL, 2, 0),
(25, 'Danilo', 'Paz', 'danilo_paz@outlook.com', 'DP01', '$2y$10$d72BI7w0SRNUcUwI3Gs0p.FM2ArhTQ/REGr3.JPm05QuvKp0SVNKy', '1989-03-16', '5d8b75c49cd8e.jpg', 1, '', NULL, NULL, 2, 0),
(26, 'Samuel', 'Polanco', 'samuel_polanco@hotmail.com', 'SP01', '$2y$10$8Be2eIm4d09TJ8G/UClnQ.zEZtacopr1gLDxZOb3nCn9jcIyNuHs2', '1993-08-15', '5d8b76407aa3d.jpg', 1, '', NULL, NULL, 2, 0),
(27, 'Geovany Arturo', 'Fuentes', 'federicoramirez0050@gmail.com', 'admin1', '$2y$10$FxHOYeGn3vYq9jsV.Mdw0OHd3QGvXoUsmgHkRM.Pck1dsrGCFwLtS', '2000-09-04', NULL, 1, '', NULL, '2019-09-25 06:00:00', 1, 0),
(28, 'Carlos', 'Ramirez', 'federicoramirez0050@gmail.com', 'admin', '$2y$10$2E0SvFSl7ud91q3Z4Dr25.pBmV0Eeg014iOaapLcdv1EfyQcyaaa2', '2000-09-04', NULL, 1, '5d8d79420451f', NULL, '2019-09-25 06:00:00', 2, 0);

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
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_cita` (`id_cita`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `id_especialidad` (`id_especialidad`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_sesion` (`id_sesion`);

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
-- Indices de la tabla `estado_sesion`
--
ALTER TABLE `estado_sesion`
  ADD PRIMARY KEY (`id_sesion`);

--
-- Indices de la tabla `estado_usuarios`
--
ALTER TABLE `estado_usuarios`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_sesion` (`id_sesion`);

--
-- Indices de la tabla `usuarios_a`
--
ALTER TABLE `usuarios_a`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_sesion` (`id_sesion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `estado_sesion`
--
ALTER TABLE `estado_sesion`
  MODIFY `id_sesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `usuarios_a`
--
ALTER TABLE `usuarios_a`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado_cita` (`id_estado`);

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`),
  ADD CONSTRAINT `consulta_ibfk_4` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id_cita`);

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `doctores_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado_usuarios` (`id_estado`),
  ADD CONSTRAINT `doctores_ibfk_2` FOREIGN KEY (`id_sesion`) REFERENCES `estado_sesion` (`id_sesion`),
  ADD CONSTRAINT `doctores_ibfk_3` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado_usuarios` (`id_estado`),
  ADD CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`id_sesion`) REFERENCES `estado_sesion` (`id_sesion`);

--
-- Filtros para la tabla `usuarios_a`
--
ALTER TABLE `usuarios_a`
  ADD CONSTRAINT `usuarios_a_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado_usuarios` (`id_estado`),
  ADD CONSTRAINT `usuarios_a_ibfk_2` FOREIGN KEY (`id_sesion`) REFERENCES `estado_sesion` (`id_sesion`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
