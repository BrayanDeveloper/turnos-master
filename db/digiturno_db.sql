-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2020 a las 11:41:50
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
  `estado` varchar(10) NOT NULL,
  `atendido` int(11) NOT NULL,
  `hora_llamada` time NOT NULL,
  `id_usuario_medic` int(11) NOT NULL,
  `color_aviso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `cedula_paciente`, `fecha_cita`, `hora_cita`, `id_medico`, `fecha_registro_cita`, `estado`, `atendido`, `hora_llamada`, `id_usuario_medic`, `color_aviso`) VALUES
(4, '89323', '2020-02-21', '12:13:00', 68, '2020-02-21', '', 0, '00:00:00', 0, ''),
(6, '1010', '2020-02-27', '19:00:00', 65, '2020-02-22', '', 0, '00:00:00', 0, ''),
(7, '1010', '2020-02-23', '06:00:00', 68, '2020-02-22', '', 0, '00:00:00', 0, ''),
(8, '1010', '2020-02-27', '06:00:00', 67, '2020-02-22', '', 1, '11:40:09', 67, ''),
(11, '1010', '2020-02-27', '01:01:00', 69, '2020-02-24', '', 1, '11:10:35', 67, ''),
(13, '9898', '2020-02-24', '01:00:00', 68, '2020-02-24', 'externa', 0, '00:00:00', 0, ''),
(15, '1010', '2020-02-25', '01:00:00', 68, '2020-02-24', 'interna', 0, '00:00:00', 0, ''),
(16, '1010', '2020-02-25', '13:03:00', 65, '2020-02-24', 'externa', 0, '00:00:00', 0, ''),
(17, '1010', '2020-02-26', '14:02:00', 68, '2020-02-24', 'interna', 0, '00:00:00', 0, ''),
(18, '1010', '2020-02-27', '16:00:00', 70, '2020-02-27', 'interna', 2, '15:25:58', 70, ''),
(19, '1010', '2020-02-28', '10:01:00', 70, '2020-02-28', 'interna', 0, '00:00:00', 0, '#4ABED8'),
(20, '1010', '2020-02-28', '11:11:00', 70, '2020-02-28', 'interna', 1, '11:03:16', 70, '#4ABED8');

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
  `id_usuario` int(11) NOT NULL,
  `color_aviso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `cedula`, `fecha`, `hora_llamada`, `turno`, `hora_atendido`, `atendido`, `sonido`, `id_usuario`, `color_aviso`) VALUES
(80, '1010', '2020-02-28', '10:51:48', 1, '10:59:40', 2, 'sonido.mp3', 66, '#31E078'),
(81, '1010', '2020-02-28', '11:11:02', 2, '00:00:00', 1, 'sonido.mp3', 66, '#31E078'),
(82, '1010', '2020-02-28', '11:11:04', 3, '00:00:00', 1, 'sonido.mp3', 66, '#D8774A'),
(83, '1010', '2020-02-28', '11:11:06', 4, '00:00:00', 1, 'sonido.mp3', 66, '#D8774A'),
(84, '1010', '2020-02-28', '11:11:08', 5, '00:00:00', 1, 'sonido.mp3', 66, '#31E078');

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
(68, 's', '123', '982@gmail.com', 'mario', 'peña', '2020-01-26', 'admin', '2', 's', '32343232', '', '', '', 4, 1, '1', 0),
(69, 'me', '8898', 'ca@gmail.com', 'camilo', 'hernandez', '2013-10-05', 'admin', '3', 'me', '32323', '', '', '', 66, 0, '', 9),
(70, 'med', '123', 'mario@ag.com', 'mario', 'aguilar', '1980-09-19', 'admin', '3', 'med', '322312', '', '', '', 66, 0, '', 0);

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
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
