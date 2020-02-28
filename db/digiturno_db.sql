-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2020 a las 19:50:54
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `digiturno_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `cedula_paciente` varchar(10) NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `id_medico` int(11) NOT NULL,
  `fecha_registro_cita` date NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `cedula_paciente`, `fecha_cita`, `hora_cita`, `id_medico`, `fecha_registro_cita`, `estado`) VALUES
(4, '89323', '2020-02-21', '12:13:00', 68, '2020-02-21', ''),
(6, '1010', '2020-02-27', '19:00:00', 65, '2020-02-22', ''),
(7, '1010', '2020-02-23', '06:00:00', 68, '2020-02-22', ''),
(8, '1010', '2020-02-23', '06:00:00', 67, '2020-02-22', ''),
(11, '1010', '2020-02-28', '01:01:00', 67, '2020-02-24', ''),
(13, '9898', '2020-02-24', '01:00:00', 68, '2020-02-24', 'externa'),
(15, '1010', '2020-02-25', '01:00:00', 68, '2020-02-24', 'interna'),
(16, '1010', '2020-02-25', '13:03:00', 65, '2020-02-24', 'externa'),
(17, '1010', '2020-02-26', '14:02:00', 68, '2020-02-24', 'interna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `cedula_paciente` varchar(10) NOT NULL,
  `nombre_paciente` varchar(40) NOT NULL,
  `apellido_paciente` varchar(40) NOT NULL,
  `correo_paciente` varchar(90) NOT NULL,
  `celular_paciente` varchar(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `cedula_paciente`, `nombre_paciente`, `apellido_paciente`, `correo_paciente`, `celular_paciente`, `fecha_nacimiento`, `id_usuario`) VALUES
(4, '190929', 'mario', 'guti', 'mario@mario', '12893', '2018-01-30', 4),
(5, '1929', 'felipe', 'castro', '8923uua@gmail.com', '12783729', '2020-12-31', 4),
(7, '8989', 'pedro', 'fernandez', 'ueu@hhajs.com', '8932988', '2020-02-20', 4),
(8, '1010', 'beto', 'fernandez', 'beto@gmail.com', '839273', '1998-05-28', 4),
(9, '9898', 'Franklin eduardo', 'perez gomez', 'developerbrayan@gmail.com', '3219203289', '2020-02-04', 4),
(10, '12212', 'mario', 'gutierres', 'mario1@gmail.com', '1212332', '2020-02-03', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora_llamada` time NOT NULL,
  `turno` int(11) NOT NULL,
  `hora_atendido` time NOT NULL,
  `atendido` int(11) NOT NULL,
  `sonido` varchar(20) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `cedula`, `fecha`, `hora_llamada`, `turno`, `hora_atendido`, `atendido`, `sonido`, `id_usuario`) VALUES
(42, '1010', '2020-02-20', '17:56:25', 1, '00:00:00', 1, '', 0),
(45, '9898', '2020-02-19', '23:53:09', 3, '00:00:00', 0, '', 0),
(46, '1010', '2020-02-20', '17:56:23', 1, '00:00:00', 1, '', 0),
(47, '1010', '2020-02-20', '17:56:26', 2, '00:00:00', 1, '', 0),
(48, '1010', '2020-02-20', '17:56:21', 3, '00:00:00', 0, '', 0),
(49, '1010', '2020-02-21', '18:11:15', 1, '18:11:40', 2, '', 0),
(50, '1010', '2020-02-21', '18:11:21', 2, '00:00:00', 0, '', 0),
(51, '1010', '2020-02-21', '10:36:32', 3, '00:00:00', 0, '', 0),
(52, '1010', '2020-02-21', '18:11:17', 4, '00:00:00', 0, '', 0),
(53, '1010', '2020-02-21', '18:11:20', 5, '00:00:00', 0, '', 0),
(54, '1010', '2020-02-21', '18:11:18', 6, '00:00:00', 0, '', 0),
(55, '1010', '2020-02-22', '18:15:24', 1, '18:30:01', 2, '', 0),
(56, '1010', '2020-02-22', '18:30:17', 2, '18:44:18', 2, '', 0),
(57, '1010', '2020-02-22', '18:44:41', 3, '18:45:45', 2, '', 0),
(58, '1010', '2020-02-23', '16:06:18', 1, '00:00:00', 1, '', 0),
(59, '1010', '2020-02-22', '00:41:20', 2, '00:00:00', 0, '', 0),
(60, '1010', '2020-02-23', '00:43:29', 2, '00:00:00', 0, '', 0),
(61, '1010', '2020-02-23', '00:43:36', 3, '00:00:00', 0, '', 0),
(62, '1010', '2020-02-23', '16:35:44', 4, '00:00:00', 1, '', 0),
(63, '1010', '2020-02-24', '11:17:12', 1, '11:32:03', 2, '', 0),
(64, '1010', '2020-02-24', '11:29:56', 2, '11:30:15', 2, '', 0),
(65, '1010', '2020-02-24', '11:32:17', 3, '11:54:50', 2, '', 0),
(66, '1010', '2020-02-24', '11:55:03', 4, '11:55:41', 2, '', 0),
(67, '1010', '2020-02-24', '11:56:24', 5, '12:55:02', 2, '', 0),
(68, '1010', '2020-02-24', '16:25:30', 6, '00:00:00', 1, '', 4),
(69, '1010', '2020-02-24', '15:26:29', 7, '15:26:50', 2, '', 0),
(70, '12212', '2020-02-24', '16:16:55', 8, '00:00:00', 1, '', 0),
(71, '1010', '2020-02-24', '16:33:33', 9, '00:00:00', 1, '', 4),
(72, '1010', '2020-02-24', '16:35:38', 10, '00:00:00', 1, '', 4),
(73, '1010', '2020-02-25', '17:01:43', 1, '00:00:00', 1, '', 68),
(74, '1010', '2020-02-25', '17:11:20', 2, '00:00:00', 1, '', 68);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `rol` varchar(10) NOT NULL,
  `privilegio` varchar(20) NOT NULL,
  `clave` varchar(90) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `imagen_profile` varchar(300) NOT NULL,
  `tema` varchar(30) NOT NULL,
  `estado_usuario` varchar(20) NOT NULL,
  `id_user_admin` int(11) NOT NULL,
  `n_modulo` int(11) NOT NULL,
  `estado_modulo` varchar(10) NOT NULL,
  `n_consultorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `cedula`, `email`, `nombre`, `apellido`, `fecha_nacimiento`, `rol`, `privilegio`, `clave`, `telefono`, `imagen_profile`, `tema`, `estado_usuario`, `id_user_admin`, `n_modulo`, `estado_modulo`, `n_consultorio`) VALUES
(4, 'admin', '', 'admin@admin.com', 'admin', '', '0000-00-00', 'admin', '1', 'admin123', '318 66787', 'imagen_perfil_dark.png', '', '', 0, 0, '', 0),
(65, 'medico', '8973823', 'juan@gmail.com', 'juan pedro', 'arstizabal', '2019-06-24', 'admin', '3', 'medico', '8392839', '', '', '', 4, 0, '', 0),
(66, 'secre', '89327', 'maria@gmail.com', 'maria paula', 'acevedo', '2020-02-12', 'admin', '2', 'secre', '832783723', '', '', '', 4, 0, '0', 0),
(67, 'm', '8828', 'developerbrayan@gmail.com', 'mauricio', 'fernandez', '2020-02-03', 'admin', '3', 'm', '3219203289', '', '', '', 4, 0, '', 0),
(68, 's', '123', '982@gmail.com', 'mario', 'peña', '2020-01-26', 'admin', '2', 's', '32343232', '', '', '', 4, 1, '1', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
