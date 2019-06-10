-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2019 a las 15:49:31
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
(0, 'INSERTAR', 'root', 'localhost', '2019-04-30 20:57:25', 'cita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_doctor`
--

CREATE TABLE `calificacion_doctor` (
  `id_calificacion` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `calificacion_doctor` int(11) NOT NULL,
  `comentario` varchar(200) NOT NULL
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
  `id_doctor` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `id_doctor`, `id_paciente`, `fecha_cita`, `hora_cita`, `id_estado`) VALUES
(1, 4, 6, '2019-05-02', '15:00:00', 1),
(2, 2, 5, '2019-04-30', '14:00:00', 3),
(3, 5, 7, '2019-04-29', '09:30:00', 3),
(4, 7, 1, '2019-04-30', '10:30:00', 4),
(5, 3, 10, '2019-04-30', '13:15:00', 2),
(6, 5, 7, '2019-04-29', '09:30:00', 3);

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
  `peso` double DEFAULT NULL,
  `estatura` double DEFAULT NULL,
  `presion` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `padecimientos`, `id_doctor`, `id_paciente`, `receta`, `peso`, `estatura`, `presion`) VALUES
(1, 'Tos', 3, 7, 'Jarabe para tos cada 8 horas', 176, 185, 122),
(2, 'Cefalea', 5, 9, 'Acetaminofen', 169, 134, 125),
(3, 'Gastritis', 3, 9, 'Pepto Bismol', 101, 172, 139),
(4, 'Temperatura alta', 8, 9, 'Trapitos húmedos en la frente', 137, 163, 125),
(5, 'Dengue', 7, 9, 'Acetaminofen', 139, 114, 101),
(6, 'Infección en la garganta', 4, 4, 'Jarabe para la tos', 184, 154, 110),
(7, 'Infección en las vías urinarias', 1, 6, 'Agua en abundancia y medicamentos', 109, 190, 122),
(8, 'Mal de orin', 8, 4, 'Agua en abundancia', 104, 131, 112),
(9, 'Extracción de cordales', 6, 2, 'Acetaminofen', 127, 170, 139),
(10, 'VIH', 4, 6, 'Medicamentos', 136, 123, 116);

--
-- Disparadores `consulta`
--
DELIMITER $$
CREATE TRIGGER `bitacora_consulta` AFTER INSERT ON `consulta` FOR EACH ROW INSERT INTO bitacora (host, usuario, operacion, modificado, tabla) VALUES ("localhost", "root", "INSERTAR", NOW(), "consulta")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `id_disponibilidad` int(11) NOT NULL,
  `dia_disponible` varchar(10) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `id_doctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disponibilidad`
--

INSERT INTO `disponibilidad` (`id_disponibilidad`, `dia_disponible`, `hora_inicio`, `hora_fin`, `id_doctor`) VALUES
(1, 'Lunes', '08:00:00', '11:00:00', 9),
(2, 'Lunes', '13:00:00', '15:30:00', 7),
(3, 'Martes', '10:00:00', '17:00:00', 7),
(4, 'Martes', '09:00:00', '14:00:00', 7),
(5, 'Miércoles', '07:00:00', '11:30:00', 5),
(6, 'Miércoles', '09:00:00', '17:00:00', 2),
(7, 'Jueves', '07:00:00', '16:00:00', 6),
(8, 'Viernes', '08:30:00', '17:00:00', 9),
(9, 'Viernes', '11:00:00', '16:00:00', 4),
(10, 'Sábado', '08:00:00', '12:30:00', 1);

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
  `correo_doctor` varchar(100) NOT NULL,
  `usuario_doctor` varchar(25) NOT NULL,
  `contrasena_doctor` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `foto_doctor` varchar(50) DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doctor`, `nombre_doctor`, `apellido_doctor`, `correo_doctor`, `usuario_doctor`, `contrasena_doctor`, `fecha_nacimiento`, `foto_doctor`, `id_especialidad`, `id_estado`) VALUES
(1, 'Carlos', 'Ramirez', 'RamirezCarlos@gmail.com', 'CarRam1', 'LJZ91DBJ9KZ', '1999-04-29', '5cfbef4223c64.png', 1, 1),
(2, 'Faith', 'Ware', 'augue@diamluctus.ca', 'RYS95ZHC2RY', 'KLV27NRB4FC', '1999-04-03', 'Porttitor Eros Nec LLC', 8, 1),
(3, 'Marsden', 'Melendez', 'In.condimentum@convallisl.es', 'CTH86YOU4XP', 'DIM73LAI5QT', '2000-08-29', '5cf9713676cc5.jpg', 7, 1),
(4, 'Callum', 'Richards', 'molestie@Sedeu.com', 'OSD32HFP5YS', 'PSK42IEG0PQ', '2001-08-16', '5cf97a422b869.png', 4, 1),
(5, 'Isabelle', 'Hicks', 'sem.consequat@gmail.com', 'UGG00RZI7UR', 'PLL22AND5QU', '2000-06-04', 'Adipiscing Ligula Associates', 9, 1),
(6, 'Keane', 'Sandoval', 'natoque@dolorFuscefeugiat.com', 'SIN45XBP6HD', 'DJT89QNC4YO', '2000-09-04', 'Adipiscing Fringilla Associates', 8, 1),
(7, 'Ciara', 'Torres', 'eu@adlitora.com', 'EWT16TLE3OH', 'OGN81XJD2MG', '1980-06-13', 'Habitant Morbi Tristique Company', 6, 1),
(8, 'Dillon', 'Wood', 'ut.ipsum@dolorsitamet.edu', 'OMG23HBL5SS', 'KWL29SPP6JH', '1995-02-27', 'Eu Eleifend Nec Incorporated', 6, 1),
(9, 'Dalton', 'Wyatt', 'fringilla@mienim.com', 'XPA32DZC5AS', 'ZFQ29HFO8WC', '1984-09-20', 'Turpis Company', 1, 1),
(10, 'Perry', 'Garner', 'perry@gmail.es', 'ZJP43QHA2UU', 'DMV29SXT8NH', '1997-11-02', 'usuario2', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_especialidad` varchar(25) DEFAULT NULL,
  `descripcion` varchar(130) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre_especialidad`, `descripcion`) VALUES
(1, 'Cardiología', 'se encarga del estudio, diagnóstico y tratamiento de las enfermedades del corazón y del aparato circulatorio.'),
(2, 'Nutriología', ' estudia la alimentación humana y su relación con los procesos químicos, biológicos y metabólicos y estado de salud humana.'),
(3, 'Oftalmología', 'estudia las enfermedades de ojo y su tratamiento, incluyendo el globo ocular, su musculatura, el sistema lagrimal y los párpados. '),
(4, 'Pediatría', 'es la especialidad médica que estudia al niño y sus enfermedades.'),
(5, 'Oncología médica', 'diagnóstico y tratamiento del cáncer, centrada en la atención del enfermo con cáncer como un todo'),
(6, 'Dermatología', 'es la especialidad médica encargada del estudio de la piel, su estructura, función y enfermedades.'),
(7, 'Gastroenterología', ' comprende el diagnóstico y tratamiento de pacientes con afecciones del  estómago, intestino delgado, colon, recto y páncreas'),
(8, 'Ginecología', 'especialidad médica que trata las enfermedades del sistema reproductor femenino (útero, vagina y ovarios) y de la reproducción.'),
(9, 'Neumología', 'es la especialidad médica encargada del estudio de las enfermedades del aparato respiratorio.'),
(10, 'Urología', 'tratamiento de las patologías que afectan al aparato urinario de ambos sexos y al aparato reproductor masculino, sin límite edad.');

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
(2, 'En curso'),
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
(1, 'Activo'),
(2, 'Inactivo');

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
(1, 'Cleo', 'Pearson', 'placerat@ametmassaQuisque', 'D6D 5B3', 'SCS92OZU3EL', '2030-08-18', '1695081685299', 105, 154, NULL),
(2, 'Sybil', 'Cabrera', 'elit.Etiam.laoreet@semper', 'J8N 8G6', 'ZFY77LQB8LF', '2003-06-18', '1646081225699', 142, 181, NULL),
(3, 'Neville', 'Serrano', 'cursus.purus.Nullam@erosn', 'U3R 4F9', 'PCJ16YYS6IR', '2001-04-20', '1644030558399', 142, 158, NULL),
(4, 'Libby', 'Holland', 'lorem.semper@mauris.co.uk', 'T8M 9H4', 'WQZ35JTU5SE', '2009-10-18', '1667122120599', 188, 116, NULL),
(5, 'Britanni', 'Gates', 'dui.Cras.pellentesque@cur', 'T3H 1Z2', 'XLY79FHB2SK', '2007-04-19', '1660051016199', 161, 173, NULL),
(6, 'Daryl', 'Stuart', 'lorem.sit@Donecluctusaliq', 'H9P 3B0', 'BYY72UMF7PZ', '2004-10-19', '1653102207499', 132, 106, NULL),
(7, 'Grant', 'Cantu', 'ligula@tempusscelerisquel', 'P0V 7U2', 'WDH96CRE4TO', '2022-02-20', '1686072856999', 110, 121, NULL),
(8, 'Julian', 'Bates', 'enim.non.nisi@sagittisDui', 'L8V 0S9', 'CDX20IMZ6SA', '2028-02-20', '1635111358599', 173, 150, NULL),
(9, 'Roanna', 'Joyce', 'non.enim.Mauris@tortor.ne', 'K1S 8K7', 'YQP93RVM6OB', '2024-08-18', '1614081366899', 181, 152, NULL),
(10, 'Benedict', 'Hart', 'non@aliquam.com', 'V4A 2Z7', 'AUG68JWB5YH', '2007-12-18', '1697102623899', 124, 123, NULL);

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
(1, 'MacKenzie', 'Andrews', 'nec.cursus@maurissapiencu', 'N3P 4X9', 'OBC22TVM6NY', '1985-02-10', '8311', NULL),
(2, 'Cassandra', 'Church', 'ut@hendreritid.org', 'A0U 2U1', 'RQM10TIO1ZK', '2019-04-29', '7343', NULL),
(3, 'Len', 'Miranda', 'aptent@Maurisnondui.org', 'Z1G 3W5', 'NKI94ECW5SF', '2004-04-05', '2170', NULL),
(4, 'Lucas', 'Hines', 'diam.Sed@ultrices.org', 'X8B 2E1', 'OWA64LOP2RG', '1999-08-13', '4951', NULL),
(5, 'Zane', 'Hanson', 'nunc@mollisPhasellusliber', 'V7E 3W9', 'BNW75OPE0DY', '1989-01-28', '9987', NULL),
(6, 'Xyla', 'Forbes', 'consectetuer@quis.org', 'H7V 7K6', 'TEI35GVS6IJ', '2006-06-06', '6237', NULL),
(7, 'Kaitlin', 'Johnson', 'vulputate.nisi@lectus.ca', 'H6V 3C6', 'QKS06AWJ6BH', '2000-08-21', '4806', NULL),
(8, 'Thane', 'Bauer', 'ligula@diam.co.uk', 'N4H 2R5', 'PLT45IMB2HR', '2001-04-10', '1209', NULL),
(9, 'Alden', 'Willis', 'ligula.Donec@Quisquepurus', 'X9D 6N3', 'ARV39VRR0FN', '2005-03-05', '7304', NULL),
(10, 'Denise', 'Buckley', 'ipsum.cursus@massaSuspend', 'M1Y 7E4', 'PMQ90RWX3VW', '1990-10-31', '3691', NULL);

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
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`id_disponibilidad`),
  ADD KEY `id_doctor` (`id_doctor`);

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
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `calificacion_paciente`
--
ALTER TABLE `calificacion_paciente`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  MODIFY `id_disponibilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios_a`
--
ALTER TABLE `usuarios_a`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD CONSTRAINT `disponibilidad_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`);

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `doctores_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `doctores_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado_usuarios` (`id_estado`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`id_tipousuario`) REFERENCES `tipo_usuario` (`id_tipousuario`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado_usuarios` (`id_estado`);

--
-- Filtros para la tabla `usuarios_a`
--
ALTER TABLE `usuarios_a`
  ADD CONSTRAINT `usuarios_a_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado_usuarios` (`id_estado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
