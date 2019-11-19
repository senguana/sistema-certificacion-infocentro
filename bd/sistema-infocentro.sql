-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-11-2019 a las 19:08:32
-- Versión del servidor: 5.7.26
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema-infocentro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `add_curso`
--

DROP TABLE IF EXISTS `add_curso`;
CREATE TABLE IF NOT EXISTS `add_curso` (
  `id_add_curso` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  PRIMARY KEY (`id_add_curso`),
  KEY `curso_id` (`curso_id`),
  KEY `persona_id` (`persona_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `add_curso_estudiante`
--

DROP TABLE IF EXISTS `add_curso_estudiante`;
CREATE TABLE IF NOT EXISTS `add_curso_estudiante` (
  `id_add` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alumno_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id_add`),
  KEY `alumno_id` (`alumno_id`),
  KEY `curso_id` (`curso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `id_alum` int(20) NOT NULL AUTO_INCREMENT,
  `dni_alum` int(10) NOT NULL,
  `nombres_alum` varchar(80) NOT NULL,
  `apellidos_alum` varchar(80) NOT NULL,
  `genero_alum` varchar(10) NOT NULL,
  `edad_alum` int(10) NOT NULL,
  `fecha_nac` date NOT NULL,
  `cod_institucion` int(11) NOT NULL,
  `cod_carrera` int(11) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_alum`),
  KEY `cod_institucion` (`cod_institucion`,`cod_carrera`),
  KEY `cod_carrera` (`cod_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_basica`
--

DROP TABLE IF EXISTS `alumno_basica`;
CREATE TABLE IF NOT EXISTS `alumno_basica` (
  `id_alumno_s` int(11) NOT NULL AUTO_INCREMENT,
  `dni_alum_s` int(11) NOT NULL,
  `nombres_alum_s` varchar(50) NOT NULL,
  `apellidos_alumn_s` varchar(50) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `edad` int(5) DEFAULT NULL,
  `fech_nac` date DEFAULT NULL,
  `institucion_id` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `grado_id` int(11) NOT NULL,
  PRIMARY KEY (`id_alumno_s`),
  KEY `institucion_id` (`institucion_id`),
  KEY `grado_id` (`grado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno_basica`
--

INSERT INTO `alumno_basica` (`id_alumno_s`, `dni_alum_s`, `nombres_alum_s`, `apellidos_alumn_s`, `genero`, `edad`, `fech_nac`, `institucion_id`, `estado`, `grado_id`) VALUES
(1, 987987809, 'iuuiyui iyiuy', 'iyiu iyuiyi', 'Masculino', NULL, '2000-01-20', 2, 'Activo', 1),
(2, 78686987, 'hjg jgugu', 'uiguig uguig', 'Femenino', NULL, '2000-02-20', 1, 'Activo', 1),
(3, 78686987, 'hjg jgugu', 'uiguig uguig', 'Femenino', NULL, '2000-02-20', 1, 'Activo', 1),
(4, 78686987, 'hjg jgugu', 'uiguig uguig', 'Femenino', NULL, '2000-02-20', 1, 'Activo', 1),
(5, 78686987, 'hjg jgugu', 'uiguig uguig', 'Femenino', NULL, '2000-02-20', 1, 'Activo', 1),
(6, 78686987, 'hjg jgugu', 'uiguig uguig', 'Femenino', NULL, '2000-02-20', 1, 'Activo', 1),
(7, 1450152325, 'Josefina Mamas', 'Senguana Wisuma', 'Masculino', NULL, '2019-11-05', 7, 'Activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

DROP TABLE IF EXISTS `carrera`;
CREATE TABLE IF NOT EXISTS `carrera` (
  `id_carrera` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` varchar(80) NOT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(150) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `total_horas` int(10) NOT NULL,
  `docente_id` int(11) NOT NULL,
  PRIMARY KEY (`id_curso`),
  KEY `curso_ibfk_1` (`docente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `fecha_inicio`, `fecha_fin`, `total_horas`, `docente_id`) VALUES
(23, 'IOJOJ', '2019-11-16', '2019-11-12', 90, 2),
(24, 'JOJ', '2019-11-06', '2019-11-05', 90, 2),
(25, 'JOJ', '2019-11-06', '2019-11-05', 90, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

DROP TABLE IF EXISTS `docente`;
CREATE TABLE IF NOT EXISTS `docente` (
  `id_docente` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `telefono` int(10) NOT NULL,
  `genero` varchar(30) NOT NULL,
  PRIMARY KEY (`id_docente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_docente`, `nombre`, `apellido`, `correo`, `telefono`, `genero`) VALUES
(1, 'Emilio', 'Senguana', 'emilio.senguana@itsae.edu.ec', 997780813, 'Masculino'),
(2, 'Alexis PaÃºl', 'Ramirez Quezada', 'alexis.ramirez@itsae.edu.ec', 997780812, 'Masculino'),
(3, 'Danis Ignacio', 'Manchu Tumink', 'danis.manchu@itsae.edue.c', 99708014, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

DROP TABLE IF EXISTS `grado`;
CREATE TABLE IF NOT EXISTS `grado` (
  `id_grado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) NOT NULL,
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `descripcion`) VALUES
(1, 'Primero de BÃ¡sica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

DROP TABLE IF EXISTS `institucion`;
CREATE TABLE IF NOT EXISTS `institucion` (
  `id_institucion` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_institucion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id_institucion`, `nombre_institucion`) VALUES
(1, '13 de ABRIL DEL LUZ DE MAERICuigiuc'),
(2, 'Escuela Nueva Loja'),
(7, 'JARAMILLO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  `nombres_per` varchar(50) NOT NULL,
  `apellidos_per` varchar(50) NOT NULL,
  `genero_per` varchar(10) NOT NULL,
  PRIMARY KEY (`id_per`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

DROP TABLE IF EXISTS `profesion`;
CREATE TABLE IF NOT EXISTS `profesion` (
  `id_profesion` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_profesion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`id_profesion`, `nombre_profesion`) VALUES
(1, 'Tecnologo(a)'),
(2, 'Ingeniero(a)'),
(3, 'Licenciado(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

DROP TABLE IF EXISTS `representante`;
CREATE TABLE IF NOT EXISTS `representante` (
  `id_repre` int(11) NOT NULL AUTO_INCREMENT,
  `dni_repre` int(10) UNSIGNED NOT NULL,
  `nombres_repre` varchar(50) NOT NULL,
  `apellidos_repre` varchar(50) NOT NULL,
  `telefono_repre` int(10) UNSIGNED NOT NULL,
  `cod_profesion` int(11) NOT NULL,
  `genero` varchar(15) NOT NULL,
  PRIMARY KEY (`id_repre`),
  KEY `cod_profesion` (`cod_profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`id_repre`, `dni_repre`, `nombres_repre`, `apellidos_repre`, `telefono_repre`, `cod_profesion`, `genero`) VALUES
(115, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(116, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(117, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(118, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(119, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(120, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(121, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(122, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(123, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(124, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(125, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(126, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(127, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino'),
(128, 1450178636, 'emil', 'Emilio', 9970708, 1, 'Masculino'),
(129, 1450178688, 'emil', 'Emilio', 9970708, 1, 'Masculino'),
(130, 1450178677, 'NARVAEZ', 'RAMIRO', 9970708, 3, 'Masculino'),
(131, 1450178666, 'NARVAEZ J', 'RAMIRO JARAMILLO', 9970708, 1, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usua` int(10) NOT NULL AUTO_INCREMENT,
  `dni_usua` int(10) DEFAULT NULL,
  `nombre_usua` varchar(50) DEFAULT NULL,
  `apellido_usua` varchar(50) DEFAULT NULL,
  `correo_usua` varchar(100) NOT NULL,
  `genero_usua` varchar(10) DEFAULT NULL,
  `username_usua` varchar(50) NOT NULL,
  `password_usua` varchar(200) NOT NULL,
  `date_agregado` date DEFAULT NULL,
  `estado` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_usua`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usua`, `dni_usua`, `nombre_usua`, `apellido_usua`, `correo_usua`, `genero_usua`, `username_usua`, `password_usua`, `date_agregado`, `estado`) VALUES
(1, 1450152325, 'Emilio', 'Senguana', 'emilio.senguana@itsae.edu.ec', 'Masculino', 'admin123', 'admin', '2019-11-19', 1),
(2, 1450152328, 'ADIEL', 'SENGUANA', 'adiel.senguana@gmail.com', 'Masculino', 'adiel.senguana', 'adiel2019', '2019-11-03', 0),
(3, 1450152388, 'Milady2', 'Llumitaxi', 'milady2.llumitaxi@itsae.edu.ec', 'Femenino', 'milady2', '$2y$10$lMqBOoq8yVerahCJyLgSqu.tfc9.3XZPxuOlzc1.sPysGDHD96Z7a', '2019-11-03', 0),
(4, 1450152399, 'Milady2', 'Llumitaxi', 'milady3.llumitaxi@itsae.edu.ec', 'Femenino', 'milady3', '$2y$10$WgvG6hdXyz0kn3JLc6KtPOpbSzDulFtGs//iodCWybDqQVpIJJFhi', '2019-11-03', 0),
(5, 145015238, 'Emilioyo no soy emilio', 'Senguana201922', 'milady.llumitaxi@gmail.com', 'Masculino', 'admin', 'milady', '2019-11-03', 0),
(12, 145015232, 'Emilio', 'Senguana', 'emilio.senguan@itsae.edu.ec', 'Masculino', 'admin2', '$2y$10$dnvYCmL43/NSY.5YkA2F7Ovmf898g7P25g8MFmkYCUjpdt2LrPtKq', '2019-11-04', 0),
(22, 5868689, 'iu', 'i', 'i@gmail.o', '0', 'giiugui', '$2y$10$VQ3Nc5vJOFM/ER2HKIdrYO9/U3Jk8zhEzX/C03M/5fLsNa1sxKjRq', '2019-11-04', 0),
(23, 696970, 'g', 'i', 'gi@gmail.com', '0', 'i', '$2y$10$hz8EIWFUgrSua2nVpMgjSurqycoBSehbpRofW.ofllJcNfMUfIhXi', '2019-11-04', 0),
(24, 145015222, 'g', 'i', 'i@gmail.c', '0', '2', '$2y$10$nuFrhSAGsOgVWFmkc6wJqe4Vd7ajOK4tvRsdSkBMJwuj1DHaJglIu', '2019-11-04', 0),
(25, 1450152324, 'Lucimina', 'Senguana', 'lucimina@gmail.com', 'Femenino', 'lucimina', '$2y$10$8R6n1plyEGWaUztyEZQDZuhBAu.fonvoD58owe6b.qZDVRa7.Z522', '2019-11-04', 0),
(26, 1450152327, 'Eddy', 'Senguana', 'eddy@gmail.com', 'Masculino', 'edy', '$2y$10$YSVvCVkzAE.BVHTkYcA9n.hP34.EOYANv6Wuge56gSk.PVAs24yee', '2019-11-04', 0),
(27, 1450130008, 'Danis', 'Mnachu', 'ignaciomanchu@itsae.edu.ec', 'Masculino', 'ignacio', '$2y$10$C68Z1Wg8PLqDp.AXo40IR.7DOjI9tw.3Cb/h7//IyZeeUDZRXgZPW', '2019-11-07', 0),
(28, 145015233, 'Emilio', 'Senguana', 'emilio@gmail.com', 'Masculino', 'emilio', '$2y$10$JvpqcfuQ5OghPrc3okQhP.FCQ9/8WWraEYt1iMItp85TXonC9nl9i', '2019-11-08', 0),
(29, 16166, 'eeueu', 'zhzh', 'emi@gam', 'Masculino', 'eee', '$2y$10$ulwCHPr8IfBnYNheYFW1Rea5Pjj5GqTP/8k5X108bqwXrFLcjIzJ2', '2019-11-18', 0),
(30, 1450, 'emili', 'senguana', 'emilio.senguana@gmail.com', 'Masculino', 'admi1', '$2y$10$NlWvtQJCbLhal3n5xZRMV.L6hnYEuenuGvxeQFBqo6a8rba0uwGqq', '2019-11-18', 0),
(31, 14501522, 'emilio', 'senga', 'ana@gmail.com', 'Masculino', 'ana', '$2y$10$q/URfUq9lsWIfGZbI2ya8unlkEVMcKcRFhe9kyKIdnSHnBEPbkWrS', '2019-11-18', 0),
(32, 1450152424, 'andy', 'suarez', 'andy@suarez', 'Masculino', 'andy', '$2y$10$Azt.0OmOwzmQe.J.ToIYreiqkSpFsp8qreWydXZE4zoHMwMUdUIFe', '2019-11-18', 0),
(33, 1450152433, 'andy3', 'suarez3', 'andy@suarez3', 'Masculino', 'andy3', '$2y$10$kyecMvlqDuL.DPuYJ.j7ouUQ6HNrbcrS1T.fpRwJDFEU4rizbvFWy', '2019-11-18', 0),
(34, 1457987, 'gugu', 'adi', 'guig@gmail.com', 'Masculino', 'admin33', '$2y$10$SoPn1nGaCB0Q9uuZudzse.JHqB8a2H7UqEi89rgHNC6f.2QqA15z.', '2019-11-18', 0),
(35, 1450152344, 'emilio yanluam', 'senguana Wisuma', 'emili02017@gmail.com', 'Masculino', 'admn', '$2y$10$2PhZ6a9Y58haesKoV7eVe.x9th/JxSQLFhMngP9GdvyM5EBAWvTG2', '2019-11-18', 0),
(36, 1450152356, 'emilio2019', 'senguana', 'emili@gmail.com88', 'Masculino', 'adm9n', '$2y$10$V6DHKVcnyXYNLYFQpaWWAuFshSSGqjLrn/MHJQUXwAzqO9wKQvn6i', '2019-11-18', 0),
(37, 144687, 'jgkug', 'ig', 'gui@gmail', 'Masculino', 'g', '$2y$10$euh3jB3O3SRM57/dSEZx4ukjh/Gz3BVVjOeDe8UBuXPLSwm1WseRK', '2019-11-18', 0),
(38, 1450152333, 'emilio', 'senguana', '209emilio@gmail.com', 'Masculino', 'admin44', '$2y$10$KkrRAHmKYRhvVQDj46572OaSWuHM6uA7lj2FxiJveRq5cFfpyEKF6', '2019-11-18', 0),
(39, 1569789, 'emilio', 'Veracruz', '909milio@gmail.com', 'Masculino', 'amn', '$2y$10$EZ11n/ztn0bUxfqRgQRY6uE2q98DutYi/EFGpE2hSWKT3bPZ4OAd6', '2019-11-18', 0),
(40, 1450152322, 'Emilio YANKUEM', 'Senguana', 'emilio2019@gmail.com', 'Masculino', 'admin2389', 'ADMIN3', '2019-11-18', 0),
(41, 145018977, 'Emilio', 'Senaua', 'admingmail@gma.com', 'Masculino', 'admin3', '$2y$10$p1B0pbGdtMgFUu3hLKyzB.OlYy6zl3xyCwimDSCvfc/jXh5U4Pf1G', '2019-11-18', 1),
(42, 897979, 'emili', 'oih', 'kh@hmal', 'Masculino', 'ih', '$2y$10$RYgMUeqIuGrxc.nOm40Qyu8s.0mz66/BF9Y.T8tP6k2LRQzPJefyS', '2019-11-18', 0),
(43, 1689696, 'emilio', 'snguana', 'dmin@gmail-com', 'Masculino', 'admin1234', 'ADMIN45', '2019-11-18', 0),
(44, 1569879797, 'EMILIO YANKUAM', 'SENGUANA WISUMA', 'sengua2017@gmail.com', 'Masculino', 'emilio2019', '$2y$10$YBSH4odkoQvFUBktDV5Bo.Y7P8htcdNyzpliG7PuY.W23iyAkcv8u', '2019-11-18', 0),
(45, 12246633, 'emio', 'g', 'iu@gmail.com', 'Masculino', 'gui', '$2y$10$2s2vZMICZ..OFzLq6.zZDOEjRr7PKxmKp8TdfMf8dsS8C5CIM8NAy', '2019-11-18', 0),
(46, 98098098, 'emilio', 'senguaan', 'emilio19901@gmail.com', 'Masculino', 'amnf', '$2y$10$q0fHMSaEvih.ddNSLS9rReRcV7l.BfqFn.SIRIvudhvMpOodkXWTq', '2019-11-18', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `add_curso`
--
ALTER TABLE `add_curso`
  ADD CONSTRAINT `add_curso_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `add_curso_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id_per`);

--
-- Filtros para la tabla `add_curso_estudiante`
--
ALTER TABLE `add_curso_estudiante`
  ADD CONSTRAINT `add_curso_estudiante_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno_basica` (`id_alumno_s`),
  ADD CONSTRAINT `add_curso_estudiante_ibfk_2` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id_alum`),
  ADD CONSTRAINT `add_curso_estudiante_ibfk_3` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id_curso`);

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`cod_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`cod_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumno_basica`
--
ALTER TABLE `alumno_basica`
  ADD CONSTRAINT `grado_id` FOREIGN KEY (`grado_id`) REFERENCES `grado` (`id_grado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `institucion_id` FOREIGN KEY (`institucion_id`) REFERENCES `institucion` (`id_institucion`);

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `representante`
--
ALTER TABLE `representante`
  ADD CONSTRAINT `representante_ibfk_1` FOREIGN KEY (`cod_profesion`) REFERENCES `profesion` (`id_profesion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
