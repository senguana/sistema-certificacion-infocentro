-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-12-2019 a las 12:13:27
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.0.33

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
  `id_add` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_basica_id` int(11) DEFAULT NULL,
  `persona_id` int(50) DEFAULT NULL,
  `curso_id` int(11) NOT NULL,
  `estado` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_add`),
  KEY `add_curso_estudiante_ibfk_3` (`curso_id`),
  KEY `add_curso_estudiante_ibfk_4` (`alumno_basica_id`),
  KEY `persona_id` (`persona_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `add_curso_estudiante`
--

INSERT INTO `add_curso_estudiante` (`id_add`, `alumno_basica_id`, `persona_id`, `curso_id`, `estado`) VALUES
(7, NULL, 10, 29, 0),
(8, NULL, 9, 29, 0),
(9, NULL, 1, 29, 0),
(10, NULL, 8, 29, 0),
(11, NULL, 3, 29, 0),
(12, NULL, 12, 29, 0),
(13, NULL, 6, 29, 0),
(14, NULL, 11, 29, 0),
(15, NULL, 7, 29, 1),
(16, NULL, 5, 29, 1),
(17, NULL, 4, 29, 1);

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
  `edad` int(10) DEFAULT NULL,
  `fech_nac` date NOT NULL,
  `institucion_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_alumno_s`),
  KEY `institucion_id` (`institucion_id`),
  KEY `grado_id` (`grado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno_basica`
--

INSERT INTO `alumno_basica` (`id_alumno_s`, `dni_alum_s`, `nombres_alum_s`, `apellidos_alumn_s`, `genero`, `edad`, `fech_nac`, `institucion_id`, `grado_id`, `estado`) VALUES
(18, 1450152325, 'Emilio Yankuam', 'Senguana Wisuma', 'Masculino', 19, '2000-01-06', 11, 2, '1'),
(20, 1450172637, 'Josefina Mamas', 'Senguana Wisuma', 'Femenino', 19, '2000-01-04', 1, 1, '1'),
(22, 1450172456, 'Nelcida Anasat', 'Senguana Wisuma', 'Femenino', 14, '2005-03-08', 9, 3, '1'),
(23, 1450152323, 'MILADY CABRERA', 'CELIA YULI', 'Femenino', 20, '2017-08-01', 11, 4, '1'),
(24, 1450152326, 'CEVALLOS NARANJA', 'JUAN VILLACIS', 'Masculino', 3, '2017-05-01', 7, 2, '1'),
(25, 145015234, 'Emilio Yankuam', 'senguana', 'Masculino', 19, '2019-11-03', 1, 3, '1'),
(27, 1450152389, 'Emilio Yankuam', 'Senguana Wisuma', 'Masculino', 19, '2000-01-06', 1, 10, '1'),
(28, 1450152320, 'Pedro Abad', 'Sanchez Nenigno', 'Masculino', 14, '2005-06-20', 8, 10, '1'),
(29, 1450152322, 'Josefina Mamas', 'Senguana Wisuma', 'Femenino', 18, '2001-06-05', 9, 10, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

DROP TABLE IF EXISTS `certificado`;
CREATE TABLE IF NOT EXISTS `certificado` (
  `id_certificado` int(15) NOT NULL AUTO_INCREMENT,
  `configuracion_id` int(15) NOT NULL,
  `add_curso_id` int(15) NOT NULL,
  `representante_id` int(15) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_certificado`),
  KEY `configuracion_id` (`configuracion_id`),
  KEY `add_curso_id` (`add_curso_id`),
  KEY `representante_id` (`representante_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

DROP TABLE IF EXISTS `comuna`;
CREATE TABLE IF NOT EXISTS `comuna` (
  `id_comuna` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(90) NOT NULL,
  PRIMARY KEY (`id_comuna`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id_comuna`, `descripcion`) VALUES
(1, 'CONGOMA MEDIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE IF NOT EXISTS `configuracion` (
  `id_conf` int(11) NOT NULL AUTO_INCREMENT,
  `entidad` varchar(100) NOT NULL,
  `imagen_fondo` text NOT NULL,
  `imagen1` text NOT NULL,
  `imagen2` text NOT NULL,
  `imagen3` text NOT NULL,
  `imagen4` text NOT NULL,
  PRIMARY KEY (`id_conf`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id_conf`, `entidad`, `imagen_fondo`, `imagen1`, `imagen2`, `imagen3`, `imagen4`) VALUES
(17, 'INFOCENTRO', '../upload/34ed387fe94036f6efec766c73810c55.jpg', '../upload/d9eacd6f9874435f9a197edcda5d2364.jpg', '../upload/56957945f9617c8e196e7577fdd72471.jpg', '../upload/9fba4d3bd9a2083753d9e62d1ac04e5c.jpg', '../upload/620ffdaa0332c5f9fd332ad0bca9ec1f.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `fecha_inicio`, `fecha_fin`, `total_horas`, `docente_id`) VALUES
(29, 'TIC ARTESANOS', '2019-11-20', '2019-12-23', 25, 1);

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
(1, 'Emilio Yankuam', 'Senguana Wisuma', 'emilio.senguana@itsae.edu.ec', 997780813, 'Masculino'),
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `descripcion`) VALUES
(1, 'Primero de Básica'),
(2, 'Segundo de Básica'),
(3, 'Tercero de Basica'),
(4, 'Cuarto de Básica'),
(5, 'Quinto de Bàsica'),
(6, 'Sexto de Basica'),
(7, 'Septimo de Basica'),
(8, 'Octavo de Bàsica'),
(9, 'Decimo de Bàsica '),
(10, 'Primero de Bachillerato '),
(11, 'Segundo de Bachillerato '),
(12, 'Tercero de Bachillerato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

DROP TABLE IF EXISTS `institucion`;
CREATE TABLE IF NOT EXISTS `institucion` (
  `id_institucion` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_institucion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id_institucion`, `nombre_institucion`) VALUES
(1, 'LUZ DE AMERICA'),
(2, 'Escuela Nueva Loja'),
(7, 'ESCUELA SAN MIGUEL'),
(8, 'ELOY ALFARO'),
(9, 'ANTONIO SAMANIEGO'),
(11, 'ALONSO VITERRY GARRIDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  `dni` bigint(10) NOT NULL,
  `nombres_per` varchar(50) NOT NULL,
  `apellidos_per` varchar(50) NOT NULL,
  `genero_per` varchar(10) NOT NULL,
  `comuna` int(11) NOT NULL,
  PRIMARY KEY (`id_per`),
  KEY `comuna` (`comuna`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_per`, `dni`, `nombres_per`, `apellidos_per`, `genero_per`, `comuna`) VALUES
(1, 1707065247, ' MARIA ALEJANDRINA', 'MATUTE ERAS', 'Femenino', 1),
(2, 1713598124, 'MAURA ELISA', 'QUINTERO ROSERO ', 'Femenino', 1),
(3, 1708373442, 'MERO ', 'NIEVE CONCEPCION ', 'Femenino', 1),
(4, 2300565690, 'ANGIE CAROLINA', 'BASTIDAS QUINTEROS ', 'Femenino', 1),
(5, 2300058654, ' RUTH ANDREA', 'COYAGO BENAVIDES', 'Femenino', 1),
(6, 1721802963, 'LORENA ADRIANA', 'COYAGO BENAVIDES', 'Femenino', 1),
(7, 1727320549, 'NATALY ALEJANDRA', 'COYAGO BENAVIDES', 'Femenino', 1),
(8, 1708195175, ' BLANCA OFELIA', 'CALDERÓN TORO', 'Femenino', 1),
(9, 1705486510, ' RUTH XIMENA', 'ANDRADE ESCUDERO', 'Femenino', 1),
(10, 1314391473, ' ARIANNA YAMILE', 'CARBONEL PERALTA', 'Femenino', 1),
(11, 1723912430, ' ERIKA ELIZABETH', 'MARCILLO CEDEÑO', 'Femenino', 1),
(12, 1708582372, ' MARIA ESTERFILA', 'MATUTE MELO', 'Femenino', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

DROP TABLE IF EXISTS `profesion`;
CREATE TABLE IF NOT EXISTS `profesion` (
  `id_profesion` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_profesion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`id_profesion`, `nombre_profesion`) VALUES
(1, 'Tecnologo(a)'),
(2, 'Ingeniero(a)'),
(3, 'Licenciado(a)'),
(4, 'Magister');

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
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`id_repre`, `dni_repre`, `nombres_repre`, `apellidos_repre`, `telefono_repre`, `cod_profesion`, `genero`) VALUES
(129, 1450152329, 'Ximena', 'Orosco Calderón', 997780823, 4, 'Femenino'),
(130, 1450152352, 'Marcos', 'Gabilanes Párraga', 998808134, 3, 'Masculino');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usua`, `dni_usua`, `nombre_usua`, `apellido_usua`, `correo_usua`, `genero_usua`, `username_usua`, `password_usua`, `date_agregado`, `estado`) VALUES
(1, 1450152325, 'Emilio', 'Senguana', 'emilio.senguana@itsae.edu.ec', 'Masculino', 'admin', '$2y$10$FlIH0ZouvtvNW/wfqtGBMeG4w7BQ36BsMcWauP3JdFgR9U4Z6.yBW', '2019-11-19', 1),
(3, 1450152399, 'Emilio Yankuam', 'Senguana Emilio', 'emilio.senguana2019@itsae.edu.ec', 'Masculino', 'emilio2019', '$2y$10$SC0vVwATE5vL1Ocg3Ldh5O/QSyhl9oZP2P2Qqe2ACzfnuWd9n3yie', '2019-11-27', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `add_curso_estudiante`
--
ALTER TABLE `add_curso_estudiante`
  ADD CONSTRAINT `add_curso_estudiante_ibfk_3` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add_curso_estudiante_ibfk_4` FOREIGN KEY (`alumno_basica_id`) REFERENCES `alumno_basica` (`id_alumno_s`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add_curso_estudiante_ibfk_5` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id_per`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumno_basica`
--
ALTER TABLE `alumno_basica`
  ADD CONSTRAINT `grado_id` FOREIGN KEY (`grado_id`) REFERENCES `grado` (`id_grado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `institucion_id` FOREIGN KEY (`institucion_id`) REFERENCES `institucion` (`id_institucion`);

--
-- Filtros para la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD CONSTRAINT `certificado_ibfk_1` FOREIGN KEY (`configuracion_id`) REFERENCES `configuracion` (`id_conf`),
  ADD CONSTRAINT `certificado_ibfk_2` FOREIGN KEY (`add_curso_id`) REFERENCES `add_curso_estudiante` (`id_add`),
  ADD CONSTRAINT `certificado_ibfk_3` FOREIGN KEY (`representante_id`) REFERENCES `representante` (`id_repre`);

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`comuna`) REFERENCES `comuna` (`id_comuna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `representante`
--
ALTER TABLE `representante`
  ADD CONSTRAINT `representante_ibfk_1` FOREIGN KEY (`cod_profesion`) REFERENCES `profesion` (`id_profesion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
