-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-11-2019 a las 21:22:13
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

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
-- Estructura de tabla para la tabla `add_curso_estudiante`
--

DROP TABLE IF EXISTS `add_curso_estudiante`;
CREATE TABLE IF NOT EXISTS `add_curso_estudiante` (
  `id_add` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alumno_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id_add`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `id_alumno_s` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno_basica`
--

INSERT INTO `alumno_basica` (`id_alumno_s`, `dni_alum_s`, `nombres_alum_s`, `apellidos_alumn_s`, `genero`, `edad`, `fech_nac`, `institucion_id`, `estado`, `grado_id`) VALUES
(1, 987987809, 'iuuiyui iyiuy', 'iyiu iyuiyi', 'Masculino', NULL, '2000-01-20', 2, 'Activo', 1),
(2, 78686987, 'hjg jgugu', 'uiguig uguig', 'Femenino', NULL, '2000-02-20', 1, 'Activo', 1),
(3, 78686987, 'hjg jgugu', 'uiguig uguig', 'Femenino', NULL, '2000-02-20', 1, 'Activo', 1),
(4, 78686987, 'hjg jgugu', 'uiguig uguig', 'Femenino', NULL, '2000-02-20', 1, 'Activo', 1),
(5, 78686987, 'hjg jgugu', 'uiguig uguig', 'Femenino', NULL, '2000-02-20', 1, 'Activo', 1),
(6, 78686987, 'hjg jgugu', 'uiguig uguig', 'Femenino', NULL, '2000-02-20', 1, 'Activo', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `fecha_inicio`, `fecha_fin`, `total_horas`, `docente_id`) VALUES
(1, 'INTRODUCCIÓN A COMPUTACIÓN BÁSICA', '2019-11-08', '2019-12-03', 40, 1),
(2, 'PROGRAMACIÃ³ PHP', '2019-11-15', '2019-11-30', 40, 1),
(3, 'PROGRAMACIÃ³ PHP', '2019-11-15', '2019-11-30', 40, 1),
(4, 'PROGRAMACIÃ³ PHP', '2019-11-15', '2019-11-30', 40, 1),
(5, 'PROGRAMACIÃ³N HTML4', '2019-11-08', '2019-11-29', 25, 2),
(6, 'PROGRAMACIÃ³N HTML4', '2019-11-08', '2019-11-29', 25, 2),
(7, 'PROGRAMACIÃ³N HTML5', '2019-11-08', '2019-11-29', 25, 2),
(8, 'FUNDAMENTOS DE PROGRAMACIÃ³N', '2019-11-08', '2019-11-29', 25, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `descripcion`) VALUES
(1, 'primero de Basica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

DROP TABLE IF EXISTS `institucion`;
CREATE TABLE IF NOT EXISTS `institucion` (
  `id_institucion` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_institucion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id_institucion`, `nombre_institucion`) VALUES
(1, '13 de Abril'),
(2, 'Escuela Nueva Loja');

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
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

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
(127, 1450152325, 'Emilio', 'Senguana', 99707717, 1, 'Masculino');

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
  `profesion` int(50) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_usua`),
  KEY `profesion` (`profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usua`, `dni_usua`, `nombre_usua`, `apellido_usua`, `correo_usua`, `genero_usua`, `username_usua`, `password_usua`, `date_agregado`, `profesion`, `estado`) VALUES
(1, 1450152325, 'Emilio', 'Senguana', 'emilio.senguana@itsae.edu.ec', 'Masculino', 'admin123', 'admin', '2019-11-04', 3, 1),
(2, 1450152328, 'ADIEL', 'SENGUANA', 'adiel.senguana@gmail.com', 'Masculino', 'adiel.senguana', 'adiel2019', '2019-11-03', 2, 0),
(3, 1450152388, 'Milady2', 'Llumitaxi', 'milady2.llumitaxi@itsae.edu.ec', 'Femenino', 'milady2', '$2y$10$lMqBOoq8yVerahCJyLgSqu.tfc9.3XZPxuOlzc1.sPysGDHD96Z7a', '2019-11-03', 3, 0),
(4, 1450152399, 'Milady2', 'Llumitaxi', 'milady3.llumitaxi@itsae.edu.ec', 'Femenino', 'milady3', '$2y$10$WgvG6hdXyz0kn3JLc6KtPOpbSzDulFtGs//iodCWybDqQVpIJJFhi', '2019-11-03', 3, 0),
(5, 145015238, 'Emilioyo no soy emilio', 'Senguana201922', 'milady.llumitaxi@gmail.com', 'Masculino', 'admin', 'milady', '2019-11-03', 1, 0),
(12, 145015232, 'Emilio', 'Senguana', 'emilio.senguan@itsae.edu.ec', 'Masculino', 'admin2', '$2y$10$dnvYCmL43/NSY.5YkA2F7Ovmf898g7P25g8MFmkYCUjpdt2LrPtKq', '2019-11-04', 1, 0),
(22, 5868689, 'iu', 'i', 'i@gmail.o', '0', 'giiugui', '$2y$10$VQ3Nc5vJOFM/ER2HKIdrYO9/U3Jk8zhEzX/C03M/5fLsNa1sxKjRq', '2019-11-04', 2, 0),
(23, 696970, 'g', 'i', 'gi@gmail.com', '0', 'i', '$2y$10$hz8EIWFUgrSua2nVpMgjSurqycoBSehbpRofW.ofllJcNfMUfIhXi', '2019-11-04', 2, 0),
(24, 145015222, 'g', 'i', 'i@gmail.c', '0', '2', '$2y$10$nuFrhSAGsOgVWFmkc6wJqe4Vd7ajOK4tvRsdSkBMJwuj1DHaJglIu', '2019-11-04', 2, 0),
(25, 1450152324, 'Lucimina', 'Senguana', 'lucimina@gmail.com', 'Femenino', 'lucimina', '$2y$10$8R6n1plyEGWaUztyEZQDZuhBAu.fonvoD58owe6b.qZDVRa7.Z522', '2019-11-04', 1, 0),
(26, 1450152327, 'Eddy', 'Senguana', 'eddy@gmail.com', 'Masculino', 'edy', '$2y$10$YSVvCVkzAE.BVHTkYcA9n.hP34.EOYANv6Wuge56gSk.PVAs24yee', '2019-11-04', 1, 0),
(27, 1450130008, 'Danis', 'Mnachu', 'ignaciomanchu@itsae.edu.ec', 'Masculino', 'ignacio', '$2y$10$C68Z1Wg8PLqDp.AXo40IR.7DOjI9tw.3Cb/h7//IyZeeUDZRXgZPW', '2019-11-07', 1, 0),
(28, 145015233, 'Emilio', 'Senguana', 'emilio@gmail.com', 'Masculino', 'emilio', '$2y$10$JvpqcfuQ5OghPrc3okQhP.FCQ9/8WWraEYt1iMItp85TXonC9nl9i', '2019-11-08', 1, 1);

--
-- Restricciones para tablas volcadas
--

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
  ADD CONSTRAINT `grado_id` FOREIGN KEY (`grado_id`) REFERENCES `grado` (`id_grado`),
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

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`profesion`) REFERENCES `profesion` (`id_profesion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
