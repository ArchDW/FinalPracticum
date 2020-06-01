-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql313.byethost.com
-- Tiempo de generación: 13-03-2020 a las 13:34:42
-- Versión del servidor: 5.6.45-86.1
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `b13_24938758_practicum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id` int(11) NOT NULL,
  `accion` varchar(255) NOT NULL,
  `protocolo` int(11) NOT NULL,
  `evaluacion` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id`, `accion`, `protocolo`, `evaluacion`, `fecha`) VALUES
(4, 'Hola', 3, 10, '31/12/2019'),
(5, 'Adios', 3, 6, '31/12/2019'),
(6, 'Receso', 3, 5, '12/12/2019'),
(7, 'Hola', 4, 10, '12/12/2019'),
(8, 'Reseso', 4, 5, '31/12/2019'),
(9, 'Adios', 4, 8, '25/12/2019'),
(10, 'shfkj', 3, 5, '12/12/2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `actividad` varchar(255) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `matricula` int(11) NOT NULL,
  `claveD` varchar(10) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `actividad`, `fecha`, `matricula`, `claveD`, `estado`) VALUES
(1, 'Hola', '31/12/2019', 14070006, 'D2', 0),
(2, 'Hola', '31/12/2019', 15070118, 'D2', 0),
(3, 'Adios', '12/12/2019', 14070006, 'D2', 0),
(4, 'Adios', '12/12/2019', 15070118, 'D2', 0),
(5, 'Reseso', '25/12/2019', 14070006, 'D2', 0),
(6, 'nada', '12/12/2019', 15070118, 'D2', 1),
(7, 'Evidencias del Parcial Actual', '15/12/2019', 14070006, 'D2', 1),
(8, 'adas', '12/12/2019', 14070006, 'D2', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `primerAp` varchar(20) NOT NULL,
  `SegundoAp` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `activo` varchar(10) NOT NULL,
  `Semestre` int(11) NOT NULL,
  `Licenciatura` int(11) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombre`, `primerAp`, `SegundoAp`, `edad`, `email`, `activo`, `Semestre`, `Licenciatura`, `fecha_nacimiento`) VALUES
(14070006, 'Luis', 'Jacobo', 'Garcia', 23, 'luisnumero53@gmail.com', 'Activo', 12, 241302, '1996-05-31'),
(15070118, 'Lorena', 'Trujillo', 'Landeros', 23, 'lore@gmail.com', 'Activo', 10, 241301, '1996-10-05'),
(99999999, 'Juan', 'Legaspi', 'Legaspi', 12, 'Juan@gmail.com', 'Activo', 3, 2, '2020-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id` int(11) NOT NULL,
  `fortaleza` varchar(255) NOT NULL,
  `debilidad` varchar(255) NOT NULL,
  `aspecto` varchar(255) NOT NULL,
  `estrategia` varchar(255) NOT NULL,
  `matricula` int(11) NOT NULL,
  `claveD` varchar(10) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `diagnosticos`
--

INSERT INTO `diagnosticos` (`id`, `fortaleza`, `debilidad`, `aspecto`, `estrategia`, `matricula`, `claveD`, `estado`) VALUES
(1, 'Hola', 'Adios', 'Reseso', 'Ok', 14070006, 'D2', 0),
(2, 'as', 'asd', 'das', 'asd', 15070118, 'D2', 0),
(3, 'asd', 'adsdas', 'asdas', 'asda', 15070118, 'D2', 1),
(4, 'a', 'a', 'a', 'a', 14070006, 'D2', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biblioteca_ase_tit`
--

CREATE TABLE `biblioteca_ase_tit` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `claveD` varchar(10) NOT NULL,
  `matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biblioteca_tut_pro`
--

CREATE TABLE `biblioteca_tut_pro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `claveD` varchar(10) NOT NULL,
  `matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `habilidad`
--

CREATE TABLE `habilidad` (
  `id` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `claveD` varchar(10) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `evaluacion` int(11) DEFAULT NULL,
  `evidencia` varchar(255) DEFAULT NULL,
  `aspectos` varchar(255) DEFAULT NULL,
  `atencion` varchar(255) DEFAULT NULL,
  `fortaleza` varchar(255) DEFAULT NULL,
  `formas` varchar(255) DEFAULT NULL,
  `preguntas` varchar(255) DEFAULT NULL,
  `reflexion` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habilidad`
--

INSERT INTO `habilidad` (`id`, `matricula`, `claveD`, `fecha`, `observacion`, `evaluacion`, `evidencia`, `aspectos`, `atencion`, `fortaleza`, `formas`, `preguntas`, `reflexion`) VALUES
(1, 14070006, 'D2', '05/02/2020', 'asdas', 4, 'asa', NULL, 'asdasd', 'asdasd', 'asdasd', 'asdasd', NULL),
(2, 15070118, 'D2', '05/02/2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inducion`
--

CREATE TABLE `inducion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `modalidad` int(11) NOT NULL,
  `tematica` varchar(255) NOT NULL,
  `matricula` int(11) NOT NULL,
  `claveD` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `evaluacion` int(11) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inducion`
--

INSERT INTO `inducion` (`id`, `nombre`, `modalidad`, `tematica`, `matricula`, `claveD`, `estado`, `evaluacion`, `archivo`) VALUES
(3, 'Optimizacion de Videojuegos', 1, 'Ver la OptimizacÃ³n que realizan los Motores GrÃ¡ficos', 14070006, 'D2', 'Activo', NULL, NULL),
(4, 'Lore', 3, 'lore', 15070118, 'D2', 'Inactivar', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licenciatura`
--

CREATE TABLE `licenciatura` (
  `claveLic` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `activo` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `licenciatura`
--

INSERT INTO `licenciatura` (`claveLic`, `nombre`, `activo`) VALUES
(1, 'Informe de PrÃ¡cticas Profesionales ', 'Activo'),
(2, 'Portafolio de Evidencias       ', 'Activo'),
(3, 'Tesis de InvestigaciÃ³n  ', 'Activo'),
(241301, 'EducaciÃ³n Preescolar', 'Activo'),
(241302, 'EducaciÃ³n Primaria', 'Activo'),
(241303, 'Trabajo Social', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `claveD` varchar(10) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `primerAp` varchar(20) NOT NULL,
  `SegundoAp` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `activo` varchar(10) NOT NULL,
  `GradoAc` varchar(15) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`claveD`, `nombre`, `primerAp`, `SegundoAp`, `edad`, `email`, `activo`, `GradoAc`, `fecha_nacimiento`) VALUES
('D1', 'Luis Gerardo', 'Dorado', 'Rosales', 25, 'toca@gmail.com', 'Inactivar', 'Maestria', '1996-05-31'),
('D2', 'Luis Humberto', 'Jacobo', 'Garcia', 23, 'luisnumero53@gmail.com', 'Activo', 'Maestria', '1996-05-31'),
('D3', 'Edgar', 'De la Cruz', 'Garcia', 24, 'toro@gmail.com', 'Activo', 'Maestria', '1996-05-31'),
('D4', 'luis', 'ja|', 'ga|', 12, 'luis@gmail.com', 'Activo', 'Maestria', '1996-05-31'),
('D5', 'Rocardo', 'SAldivar', 'Quezada', 39, 'ricardo@gmail', 'Activo', 'Maestria', NULL),
('legaspi', 'legaspi', 'legaspi', 'legaspi', 12, 'legaspi@gmail.com', 'Activo', 'Maestria', '1996-05-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_type`) VALUES
(1, 'filter.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE `modalidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modalidad`
--

INSERT INTO `modalidad` (`id`, `nombre`) VALUES
(1, 'Informe de PrÃ¡cticas Profesionales'),
(2, 'Portafolio de Evidencias'),
(3, 'Tesis de InvestigaciÃ³n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` int(11) NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id`, `id_encuesta`, `nombre`, `valor`) VALUES
(1, 1, 'Muy Bueno', 1),
(2, 1, 'Bueno', 6),
(3, 1, 'Malo', 2),
(4, 2, '1', 1),
(5, 2, '2', 0),
(6, 3, 'gf', 0),
(7, 3, 'fg', 0),
(8, 3, 'po', 1),
(9, 3, 'op', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planEstudios`
--

CREATE TABLE `planEstudios` (
  `idPlanEst` varchar(10) NOT NULL,
  `ano` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planEstudios`
--

INSERT INTO `planEstudios` (`idPlanEst`, `ano`, `estado`) VALUES
('p2012', '2012', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planlic`
--

CREATE TABLE `planlic` (
  `claveLic` int(11) NOT NULL,
  `idPlanEst` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `proposito` varchar(255) NOT NULL,
  `matricula` int(11) NOT NULL,
  `claveD` varchar(10) NOT NULL,
  `acuerdos` varchar(255) DEFAULT NULL,
  `evaluacion` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id`, `nombre`, `proposito`, `matricula`, `claveD`, `acuerdos`, `evaluacion`) VALUES
(1, 'S1', 'Bienvenida', 14070006, 'D2', 'Trabajar en Conjunto', NULL),
(2, 'S1', 'Bienvenida', 15070118, 'D2', NULL, NULL),
(3, 'S2', 'ReprovaciÃ³n de una materia', 14070006, 'D2', 'Recuperar el Siguiente Parcial', NULL),
(4, 'S2', 'Falta a clases', 15070118, 'D2', NULL, NULL),
(5, 'Luis', 'asda', 14070006, '', NULL, NULL),
(6, 'S3', 'S3', 14070006, '', NULL, NULL),
(7, 'S3', 'S3', 14070006, 'D2', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

CREATE TABLE `tutores` (
  `claveD` varchar(10) NOT NULL,
  `matricula` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tutores`
--

INSERT INTO `tutores` (`claveD`, `matricula`) VALUES
('D2', 14070006),
('D2', 15070118),
('legaspi', 99999999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'Arch', 'grapha', 'c761f9d15f918dd830c08d9c4c49842c24d919ef', 1, 'muin6qh31.jpeg', 1, '2020-03-13 13:13:59'),
(7, 'Luis Gerardo', 'D1', '3be2d1ddf9e62cdc20625a006ccef7eb2f3376cb', 2, 'qxycqc7w7.jpeg', 0, '2020-01-03 06:38:09'),
(8, 'Luis Humberto', 'D2', '5a36f117812e69f1a5ab7e32a43b6e3db24618b2', 2, 'vh6fno18.jpeg', 1, '2020-03-12 23:23:46'),
(9, 'Edgar', 'D3', 'd4153f68d8476e767261362dfd8ef57db3a19632', 2, 'oochxz9.png', 1, '2019-10-16 09:45:57'),
(12, 'Luis', 'D4', '5a36f117812e69f1a5ab7e32a43b6e3db24618b2', 2, 'no_image.jpg', 1, '2020-02-10 13:20:21'),
(17, 'Luis', '14070006', '5a36f117812e69f1a5ab7e32a43b6e3db24618b2', 3, 'jzhsa4x417.jpeg', 1, '2020-03-06 11:23:45'),
(18, 'Lorena', '15070118', '5a36f117812e69f1a5ab7e32a43b6e3db24618b2', 3, 'no_image.jpg', 1, '2019-12-26 13:26:09'),
(20, 'legaspi', 'legaspi', '709c7c14e344f0b0355a2ff8c7dc3fed864ca9af', 2, 'no_image.jpg', 1, '2020-03-10 12:49:12'),
(21, 'juan manuel', '99999999', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', 3, 'no_image.jpg', 1, '2020-03-10 12:47:36'),
(22, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'no_image.jpg', 1, '2020-02-11 13:32:56'),
(28, 'cesar', 'alumno', '684b10ab8da41b83690bd96f9a846b9814d8a288', 3, 'no_image.jpg', 1, '2020-03-03 10:16:46'),
(26, 'Cesar', 'cesar', '8eee89c994b90ad49540aa5dcd839138c25e0c96', 1, 'no_image.jpg', 1, '2020-03-03 10:16:22'),
(27, 'cesar', 'docente', '40a0ef5ed7906a72ffd24c86ed6ba43c2b8735e8', 2, 'no_image.jpg', 1, '2020-03-03 10:16:32'),
(29, 'Manuel Avila Camacho', 'normal', '9c2a6e4809aeef7b7712ca4db05a681452f4f748', 1, '3e8arcpl29.jpg', 1, '2020-03-13 13:18:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(4, 'Admin', 1, 1),
(5, 'Maestros', 2, 1),
(6, 'Alumnos', 3, 1),
(7, 'Control Escolar', 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `protocolo` (`protocolo`);

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `claveD` (`claveD`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `Licenciatura` (`Licenciatura`);

--
-- Indices de la tabla `biblioteca_ase_tit`
--
ALTER TABLE `biblioteca_ase_tit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `claveD_h` (`claveD`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `biblioteca_tut_pro`
--
ALTER TABLE `biblioteca_tut_pro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `claveD_h` (`claveD`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `claveD` (`claveD`);

--
-- Indices de la tabla `habilidad`
--
ALTER TABLE `habilidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `claveD_h` (`claveD`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `inducion`
--
ALTER TABLE `inducion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modalidad` (`modalidad`),
  ADD KEY `claveD_1` (`claveD`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `licenciatura`
--
ALTER TABLE `licenciatura`
  ADD PRIMARY KEY (`claveLic`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`claveD`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planEstudios`
--
ALTER TABLE `planEstudios`
  ADD PRIMARY KEY (`idPlanEst`);

--
-- Indices de la tabla `planlic`
--
ALTER TABLE `planlic`
  ADD PRIMARY KEY (`claveLic`,`idPlanEst`),
  ADD KEY `idPlanEst` (`idPlanEst`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `claveD` (`claveD`);

--
-- Indices de la tabla `tutores`
--
ALTER TABLE `tutores`
  ADD PRIMARY KEY (`claveD`,`matricula`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_level` (`user_level`);

--
-- Indices de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `biblioteca_ase_tit`
--
ALTER TABLE `biblioteca_ase_tit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `biblioteca_tut_pro`
--
ALTER TABLE `biblioteca_tut_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `habilidad`
--
ALTER TABLE `habilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `inducion`
--
ALTER TABLE `inducion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD CONSTRAINT `acciones_ibfk_1` FOREIGN KEY (`protocolo`) REFERENCES `inducion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_ibfk_2` FOREIGN KEY (`claveD`) REFERENCES `maestros` (`claveD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`Licenciatura`) REFERENCES `licenciatura` (`claveLic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `biblioteca_ase_tit`
--
ALTER TABLE `biblioteca_ase_tit`
  ADD CONSTRAINT `biblioteca_ase_tit_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `biblioteca_ase_tit_ibfk_2` FOREIGN KEY (`claveD`) REFERENCES `maestros` (`claveD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `biblioteca_tut_pro`
--
ALTER TABLE `biblioteca_tut_pro`
  ADD CONSTRAINT `biblioteca_tut_pro_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `biblioteca_tut_pro_ibfk_2` FOREIGN KEY (`claveD`) REFERENCES `maestros` (`claveD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `diagnosticos_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnosticos_ibfk_2` FOREIGN KEY (`claveD`) REFERENCES `maestros` (`claveD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `habilidad`
--
ALTER TABLE `habilidad`
  ADD CONSTRAINT `habilidad_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `habilidad_ibfk_3` FOREIGN KEY (`claveD`) REFERENCES `maestros` (`claveD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inducion`
--
ALTER TABLE `inducion`
  ADD CONSTRAINT `induc3on_ibfk_3` FOREIGN KEY (`claveD`) REFERENCES `maestros` (`claveD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inducion_ibfk_1` FOREIGN KEY (`modalidad`) REFERENCES `modalidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inducion_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planlic`
--
ALTER TABLE `planlic`
  ADD CONSTRAINT `planlic_ibfk_1` FOREIGN KEY (`claveLic`) REFERENCES `licenciatura` (`claveLic`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planlic_ibfk_2` FOREIGN KEY (`idPlanEst`) REFERENCES `planEstudios` (`idPlanEst`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sesiones_ibfk_2` FOREIGN KEY (`claveD`) REFERENCES `maestros` (`claveD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tutores`
--
ALTER TABLE `tutores`
  ADD CONSTRAINT `tutores_ibfk_1` FOREIGN KEY (`claveD`) REFERENCES `maestros` (`claveD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutores_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;