-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-11-2019 a las 14:29:55
-- Versión del servidor: 5.7.24
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
-- Estructura de tabla para la tabla `add_curso_estudiante`
--

DROP TABLE IF EXISTS `add_curso_estudiante`;
CREATE TABLE IF NOT EXISTS `add_curso_estudiante` (
  `id_add` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alumno_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  PRIMARY KEY (`id_add`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `cod_cursos` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  PRIMARY KEY (`id_alum`),
  KEY `cod_institucion` (`cod_institucion`,`cod_carrera`,`cod_cursos`),
  KEY `cod_carrera` (`cod_carrera`),
  KEY `cod_cursos` (`cod_cursos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

DROP TABLE IF EXISTS `carrera`;
CREATE TABLE IF NOT EXISTS `carrera` (
  `id_carrera` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` varchar(80) NOT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(150) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

DROP TABLE IF EXISTS `institucion`;
CREATE TABLE IF NOT EXISTS `institucion` (
  `id_institucion` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_institucion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

DROP TABLE IF EXISTS `nivel`;
CREATE TABLE IF NOT EXISTS `nivel` (
  `id_nivel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

DROP TABLE IF EXISTS `profesion`;
CREATE TABLE IF NOT EXISTS `profesion` (
  `id_profesion` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_profesion` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `nombres_repre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `apellidos_repre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `telefono_repre` int(10) UNSIGNED NOT NULL,
  `cod_profesion` int(11) NOT NULL,
  `genero` varchar(15) NOT NULL,
  PRIMARY KEY (`id_repre`),
  KEY `cod_profesion` (`cod_profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`id_repre`, `dni_repre`, `nombres_repre`, `apellidos_repre`, `telefono_repre`, `cod_profesion`, `genero`) VALUES
(9, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(10, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(11, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(12, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(13, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(14, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(15, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(16, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(17, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(18, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(19, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(20, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(21, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(22, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(23, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(24, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(25, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(26, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(27, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(28, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(29, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(30, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(31, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(32, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(33, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(34, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(35, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(36, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(37, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(38, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(39, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(40, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(41, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(42, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(43, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(44, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(45, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(46, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(47, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(48, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(49, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(50, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(51, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(52, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(53, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(54, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(55, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(56, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(57, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(58, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(59, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(60, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(61, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(62, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(63, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(64, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(65, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(66, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(67, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(68, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(69, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(70, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(71, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(72, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(73, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(74, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(75, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(76, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(77, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(78, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(79, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(80, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(81, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(82, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(83, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(84, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(85, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(86, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(87, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(88, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(89, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(90, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(91, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(92, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(93, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(94, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(95, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(96, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(97, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(98, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(99, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(100, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(101, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(102, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(103, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(104, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino'),
(105, 9098098, 'Pedro', 'Abad', 9979798, 1, 'Masculino');

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
  `username_usua` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password_usua` varchar(200) NOT NULL,
  `date_agregado` date DEFAULT NULL,
  `profesion` int(50) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_usua`),
  KEY `profesion` (`profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usua`, `dni_usua`, `nombre_usua`, `apellido_usua`, `correo_usua`, `genero_usua`, `username_usua`, `password_usua`, `date_agregado`, `profesion`, `estado`) VALUES
(1, 1450152325, 'Emilio', 'Senguana', 'emilio.senguana@itsae.edu.ec', 'Masculino', 'admin123', 'admin', '2019-11-04', 3, 1),
(2, 1450152328, 'ADIEL', 'SENGUANA', 'adiel.senguana@gmail.com', 'Masculino', 'adiel.senguana', 'adiel2019', '2019-11-03', 2, 1),
(3, 1450152388, 'Milady2', 'Llumitaxi', 'milady2.llumitaxi@itsae.edu.ec', 'Femenino', 'milady2', '$2y$10$lMqBOoq8yVerahCJyLgSqu.tfc9.3XZPxuOlzc1.sPysGDHD96Z7a', '2019-11-03', 3, 1),
(4, 1450152399, 'Milady2', 'Llumitaxi', 'milady3.llumitaxi@itsae.edu.ec', 'Femenino', 'milady3', '$2y$10$WgvG6hdXyz0kn3JLc6KtPOpbSzDulFtGs//iodCWybDqQVpIJJFhi', '2019-11-03', 3, 1),
(5, 145015238, 'Emilioyo no soy emilio', 'Senguana201922', 'milady.llumitaxi@gmail.com', 'Masculino', 'admin', 'milady', '2019-11-03', 1, 1),
(12, 145015232, 'Emilio', 'Senguana', 'emilio.senguan@itsae.edu.ec', 'Masculino', 'admin2', '$2y$10$dnvYCmL43/NSY.5YkA2F7Ovmf898g7P25g8MFmkYCUjpdt2LrPtKq', '2019-11-04', 1, 1),
(22, 5868689, 'iu', 'i', 'i@gmail.o', '0', 'giiugui', '$2y$10$VQ3Nc5vJOFM/ER2HKIdrYO9/U3Jk8zhEzX/C03M/5fLsNa1sxKjRq', '2019-11-04', 2, 1),
(23, 696970, 'g', 'i', 'gi@gmail.com', '0', 'i', '$2y$10$hz8EIWFUgrSua2nVpMgjSurqycoBSehbpRofW.ofllJcNfMUfIhXi', '2019-11-04', 2, 1),
(24, 145015222, 'g', 'i', 'i@gmail.c', '0', '2', '$2y$10$nuFrhSAGsOgVWFmkc6wJqe4Vd7ajOK4tvRsdSkBMJwuj1DHaJglIu', '2019-11-04', 2, 1),
(25, 1450152324, 'Lucimina', 'Senguana', 'lucimina@gmail.com', 'Femenino', 'lucimina', '$2y$10$8R6n1plyEGWaUztyEZQDZuhBAu.fonvoD58owe6b.qZDVRa7.Z522', '2019-11-04', 1, 1),
(26, 1450152327, 'Eddy', 'Senguana', 'eddy@gmail.com', 'Masculino', 'edy', '$2y$10$YSVvCVkzAE.BVHTkYcA9n.hP34.EOYANv6Wuge56gSk.PVAs24yee', '2019-11-04', 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`cod_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`cod_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`cod_cursos`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

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
