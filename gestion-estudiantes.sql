-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-12-2021 a las 00:58:42
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion-estudiantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asignaturas`
--

CREATE TABLE `Asignaturas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `profesorId` int(11) NOT NULL COMMENT 'Foreign key: Profesores.id',
  `cursoId` int(11) NOT NULL COMMENT 'ForeignKey: Cursos.id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Asignaturas`
--

INSERT INTO `Asignaturas` (`id`, `nombre`, `profesorId`, `cursoId`) VALUES
(1, 'Computación en Servidor Web', 1, 1),
(2, 'Computación en Cliente Web', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AsignaturasEstudiantes`
--

CREATE TABLE `AsignaturasEstudiantes` (
  `asignaturaId` int(11) NOT NULL COMMENT 'Foreign key: Asignaturas.id',
  `estudianteId` int(11) NOT NULL COMMENT 'Foreign key: Estudiantes.id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `AsignaturasEstudiantes`
--

INSERT INTO `AsignaturasEstudiantes` (`asignaturaId`, `estudianteId`) VALUES
(1, 2),
(1, 4),
(2, 3),
(2, 4),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cursos`
--

CREATE TABLE `Cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Cursos`
--

INSERT INTO `Cursos` (`id`, `nombre`, `fechaInicio`, `fechaFin`) VALUES
(1, 'Máster Ingeniería Software 2021/2022', '2021-10-21', '2022-09-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estudiantes`
--

CREATE TABLE `Estudiantes` (
  `personaId` int(11) NOT NULL COMMENT 'Foreign key persona.id',
  `email` varchar(200) NOT NULL,
  `prefijoTelefono` varchar(10) NOT NULL COMMENT 'Enumerado',
  `telefono` varchar(20) NOT NULL,
  `tipoIdentificacion` varchar(20) NOT NULL COMMENT 'Enumerado',
  `numeroIdentificacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Estudiantes`
--

INSERT INTO `Estudiantes` (`personaId`, `email`, `prefijoTelefono`, `telefono`, `tipoIdentificacion`, `numeroIdentificacion`) VALUES
(2, 'miguelangel.gonzalezdechave638@comunidadunir.net', '+34', '661648309', 'DNI', '91136734Q'),
(3, 'anagabriela.munoz853@comunidadunir.net', '+57', '3763524004', 'NIE', 'Z7808140J'),
(4, 'hectorfernando.rojas137@comunidadunir.net', '+57', '369099519', 'NIE', 'X6193804L'),
(5, 'gloriaalejandra.rocha491@comunidadunir.net', '+34', '614438160', 'DNI', '15119887D'),
(6, 'daniel.tellez191@comunidadunir.net', '+57', '3905526552', 'NIE', 'X5384549L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Personas`
--

CREATE TABLE `Personas` (
  `id` int(11) NOT NULL COMMENT 'Identificador interno de la base de datos de la persona',
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Personas`
--

INSERT INTO `Personas` (`id`, `nombre`, `apellidos`) VALUES
(1, 'Javier', 'Cubo Villalba'),
(2, 'Miguel', 'González de Chaves'),
(3, 'Ana Gabriela', 'Muñoz Cabrera'),
(4, 'Hector Fernando', 'Rojas Guarnizo'),
(5, 'Gloria Alejandra', 'Rocha Ronderos'),
(6, 'Daniel', 'Téllez Rodríguez'),
(7, 'Ismael', 'Sagredo Olivenza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Profesores`
--

CREATE TABLE `Profesores` (
  `personaId` int(11) NOT NULL COMMENT 'Foreign key persona.id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Profesores`
--

INSERT INTO `Profesores` (`personaId`) VALUES
(1),
(7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Asignaturas`
--
ALTER TABLE `Asignaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesorId` (`profesorId`),
  ADD KEY `cursoId` (`cursoId`);

--
-- Indices de la tabla `AsignaturasEstudiantes`
--
ALTER TABLE `AsignaturasEstudiantes`
  ADD PRIMARY KEY (`asignaturaId`,`estudianteId`),
  ADD KEY `asignaturasestudiantes_ibfk_2` (`estudianteId`);

--
-- Indices de la tabla `Cursos`
--
ALTER TABLE `Cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Estudiantes`
--
ALTER TABLE `Estudiantes`
  ADD PRIMARY KEY (`personaId`);

--
-- Indices de la tabla `Personas`
--
ALTER TABLE `Personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Profesores`
--
ALTER TABLE `Profesores`
  ADD PRIMARY KEY (`personaId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Asignaturas`
--
ALTER TABLE `Asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Cursos`
--
ALTER TABLE `Cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Personas`
--
ALTER TABLE `Personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador interno de la base de datos de la persona', AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Asignaturas`
--
ALTER TABLE `Asignaturas`
  ADD CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`profesorId`) REFERENCES `Profesores` (`personaId`),
  ADD CONSTRAINT `asignaturas_ibfk_2` FOREIGN KEY (`cursoId`) REFERENCES `Cursos` (`id`);

--
-- Filtros para la tabla `AsignaturasEstudiantes`
--
ALTER TABLE `AsignaturasEstudiantes`
  ADD CONSTRAINT `asignaturasestudiantes_ibfk_1` FOREIGN KEY (`asignaturaId`) REFERENCES `Asignaturas` (`id`),
  ADD CONSTRAINT `asignaturasestudiantes_ibfk_2` FOREIGN KEY (`estudianteId`) REFERENCES `Estudiantes` (`personaId`);

--
-- Filtros para la tabla `Profesores`
--
ALTER TABLE `Profesores`
  ADD CONSTRAINT `profesores_ibfk_2` FOREIGN KEY (`personaId`) REFERENCES `Personas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
