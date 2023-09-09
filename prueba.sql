-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2023 a las 13:31:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialclinico`
--

CREATE TABLE `historialclinico` (
  `HistorialID` int(11) NOT NULL,
  `PacienteID` int(11) DEFAULT NULL,
  `AntecedentesMedicos` varchar(200) DEFAULT NULL,
  `Alergias` varchar(100) DEFAULT NULL,
  `MedicamentosActuales` varchar(200) DEFAULT NULL,
  `HistorialProcedimientos` varchar(200) DEFAULT NULL,
  `HistorialEnfermedadesFamiliares` varchar(200) DEFAULT NULL,
  `HistorialVacunas` varchar(200) DEFAULT NULL,
  `NotasAdicionales` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historialclinico`
--

INSERT INTO `historialclinico` (`HistorialID`, `PacienteID`, `AntecedentesMedicos`, `Alergias`, `MedicamentosActuales`, `HistorialProcedimientos`, `HistorialEnfermedadesFamiliares`, `HistorialVacunas`, `NotasAdicionales`) VALUES
(1, 1, 'asdfasd', 'asdasd', 'asddas', 'saddas', 'saddas', 'asdasdasd', 'dasdas'),
(2, 1, 'asdasd', 'sadasd', 'asddasasd', 'asd', 'dasdas', 'asdasd', 'asdsdaa'),
(3, 1, 'asdsda', 'asdsd', 'asdasdd', 'asddas', 'saddas', 'asdsa', 'sadasd'),
(4, 1, 'asds', 'aasddas', 'dasd', 'sadasd', 'asdasd', 'sadsada', 'sdaasdd'),
(5, 1, 'asdas', 'dasdas', 'dsad', 'asdd', 'asdasd', 'asdasd', 'adsasd'),
(6, 1, 'sadasd', 'sdad', 'asdasd', 'asdd', 'sdasd', 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `PacienteID` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Genero` varchar(10) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`PacienteID`, `Nombre`, `Edad`, `Genero`, `FechaNacimiento`, `Direccion`, `Telefono`, `email`, `password`) VALUES
(1, 'Juan Pérez', 35, 'Masculino', '1988-05-15', 'Calle Principal 123', '1234567890', 'juan@example.com', '482c811da5d5b4bc6d497ffa98491e38'),
(2, 'Thomas', 21, 'Masculino', '0000-00-00', 'dasd', 'dsadsa', '1234', '4d18db80e353e526ad6d42a62aaa29be'),
(4, 'Thomas', 21, 'Masculino', '2000-12-20', 'asdasd', 'dsdaasd', 'sdadas', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Thomas', 31, 'Masculino', '2000-05-15', 'asdasd', 'dsads', '231', 'aa29895c7948fc77fe827180da57de6d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `persona_id` int(11) NOT NULL,
  `persona_tip_id` int(11) NOT NULL,
  `persona_identificacion` text NOT NULL,
  `persona_nombre` text NOT NULL,
  `persona_apellido` text NOT NULL,
  `persona_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `tip_id` int(11) NOT NULL,
  `tip_nombre` text NOT NULL,
  `tip_sigla` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`tip_id`, `tip_nombre`, `tip_sigla`) VALUES
(1, 'tarjeta de Identidad', 'TI'),
(2, 'Cédula de Ciudadanía', 'CC'),
(3, 'Pasaporte', 'PS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` text NOT NULL,
  `usuario_email` text NOT NULL,
  `usuario_pasw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_email`, `usuario_pasw`) VALUES
(1, 'Roberto', 'est_ra_carrillo@fesc.edu.co', '63137a6310f821684ea156c4c907b0c2'),
(2, 'Yourgen', 'art_yd_rincon@fesc.edu.co', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(3, 'Maritza', 'est_em_pedraza@fesc.edu.co', 'a154597470888f67ccb68b807e950447'),
(4, 'merly', 'est_md_jurado@fesc.edu.co', '0458e4aac4b0cbff2cd78d6399f946ee'),
(5, 'michell', 'est_mk_galvis@fesc.edu.co', '3e38664537015e57d0c70b533b127611'),
(6, 'thomas', 't@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historialclinico`
--
ALTER TABLE `historialclinico`
  ADD PRIMARY KEY (`HistorialID`),
  ADD KEY `PacienteID` (`PacienteID`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`PacienteID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`persona_id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historialclinico`
--
ALTER TABLE `historialclinico`
  MODIFY `HistorialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `PacienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `persona_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historialclinico`
--
ALTER TABLE `historialclinico`
  ADD CONSTRAINT `historialclinico_ibfk_1` FOREIGN KEY (`PacienteID`) REFERENCES `paciente` (`PacienteID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
