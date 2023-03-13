-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 31-01-2023 a las 09:04:58
-- Versión del servidor: 8.0.30-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Sarabastall1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ABONO`
--

CREATE TABLE `ABONO` (
  `Id_Abono` int NOT NULL,
  `Id_Prestamo` int NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad` float NOT NULL,
  `Id_Movimiento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ALUMNO`
--

CREATE TABLE `ALUMNO` (
  `Id_Persona` int NOT NULL,
  `Curso_Actual` varchar(20) NOT NULL,
  `Tutor_Legal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BECA`
--

CREATE TABLE `BECA` (
  `Id_Beca` int NOT NULL,
  `Importe` varchar(20) NOT NULL,
  `Observaciones` varchar(150) DEFAULT NULL,
  `Fecha_Beca` date NOT NULL,
  `Nota_Media` float NOT NULL,
  `Id_Persona` int NOT NULL,
  `Id_Centro` int NOT NULL,
  `Id_Tipo_Beca` int NOT NULL,
  `Fecha_Financiacion` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CENTRO`
--

CREATE TABLE `CENTRO` (
  `Id_Centro` int NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Cuantia` float NOT NULL,
  `Id_Ciudad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CIUDAD`
--

CREATE TABLE `CIUDAD` (
  `Id_Ciudad` int NOT NULL,
  `Nombre_Ciudad` varchar(50) NOT NULL,
  `Cuantia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CURSO`
--

CREATE TABLE `CURSO` (
  `Id_Curso` int NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Importe` float DEFAULT NULL,
  `Fecha_Impartir` date NOT NULL,
  `Id_Persona` int NOT NULL,
  `Id_Especialidad` int NOT NULL,
  `Id_Movimiento` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESPECIALIDAD`
--

CREATE TABLE `ESPECIALIDAD` (
  `Id_Especialidad` int NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESPECIALIZAR`
--

CREATE TABLE `ESPECIALIZAR` (
  `Id_Especialidad` int NOT NULL,
  `Id_Persona` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Estructura de tabla para la tabla `MADRINA`
--

CREATE TABLE `MADRINA` (
  `Id_Persona` int NOT NULL,
  `Id_Beca` int NOT NULL,
  `Fecha_Financiacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_BECA`
--

CREATE TABLE `TIPO_BECA` (
  `Id_Tipo_Beca` int NOT NULL,
  `Tipo_Beca` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MATERIAL`
--

CREATE TABLE `MATERIAL` (
  `Id_Material` int NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Archivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MOVIMIENTO`
--

CREATE TABLE `MOVIMIENTO` (
  `Id_Movimiento` int NOT NULL,
  `Fecha` date NOT NULL,
  `Procedencia` varchar(50) NOT NULL,
  `Accion` varchar(20) NOT NULL,
  `Id_TipoMov` int NOT NULL,
  `Id_Beca` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PERSONA`
--

CREATE TABLE `PERSONA` (
  `Id_Persona` int NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Direccion` varchar(80) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Login` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Id_Rol` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `PERSONA`
--

INSERT INTO `PERSONA` (`Id_Persona`, `Nombre`, `Apellidos`, `Direccion`, `Fecha_Nacimiento`, `Telefono`, `Email`, `Login`, `Password`, `Id_Rol`) VALUES
(1, 'Admin', 'Admin', 'C/Jose pardo sastron', '2000-01-05', '346523625', 'admin@gmail.com', 'admin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `POSEER`
--

CREATE TABLE `POSEER` (
  `Id_Material` int NOT NULL,
  `Id_Curso` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRESTAMO`
--

CREATE TABLE `PRESTAMO` (
  `Id_Prestamo` int NOT NULL,
  `Concepto` varchar(50) NOT NULL,
  `Importe` float NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Observaciones` varchar(150) DEFAULT NULL,
  `Fecha_Fin` date DEFAULT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Id_Persona` int NOT NULL,
  `Id_TipoPrestamo` int NOT NULL,
  `Id_Movimiento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROFESOR`
--

CREATE TABLE `PROFESOR` (
  `Id_Persona` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RECIBIR`
--

CREATE TABLE `RECIBIR` (
  `Id_Curso` int NOT NULL,
  `Id_Persona` int NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ROL`
--

CREATE TABLE `ROL` (
  `Id_Rol` int NOT NULL,
  `Nombre_Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ROL`
--

INSERT INTO `ROL` (`Id_Rol`, `Nombre_Rol`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_MOVIMIENTO`
--

CREATE TABLE `TIPO_MOVIMIENTO` (
  `Id_TipoMov` int NOT NULL,
  `Nombre_TipoMov` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_PRESTAMO`
--

CREATE TABLE `TIPO_PRESTAMO` (
  `Id_TipoPrestamo` int NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TRABAJADOR`
--

CREATE TABLE `TRABAJADOR` (
  `Id_Persona` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ABONO`
--
ALTER TABLE `ABONO`
  ADD PRIMARY KEY (`Id_Abono`),
  ADD KEY `Id_Prestamo` (`Id_Prestamo`),
  ADD KEY `Id_Movimiento` (`Id_Movimiento`);

--
-- Indices de la tabla `ALUMNO`
--
ALTER TABLE `ALUMNO`
  ADD PRIMARY KEY (`Id_Persona`);

--
-- Indices de la tabla `BECA`
--
ALTER TABLE `BECA`
  ADD PRIMARY KEY (`Id_Beca`),
  ADD KEY `Id_Persona` (`Id_Persona`),
  ADD KEY `Id_Centro` (`Id_Centro`);



--
-- Indices de la tabla `CENTRO`
--
ALTER TABLE `CENTRO`
  ADD PRIMARY KEY (`Id_Centro`),
  ADD KEY `Id_Ciudad` (`Id_Ciudad`);

--
-- Indices de la tabla `CIUDAD`
--
ALTER TABLE `CIUDAD`
  ADD PRIMARY KEY (`Id_Ciudad`);

--
-- Indices de la tabla `CURSO`
--
ALTER TABLE `CURSO`
  ADD PRIMARY KEY (`Id_Curso`),
  ADD KEY `Id_Persona` (`Id_Persona`),
  ADD KEY `Id_Especialidad` (`Id_Especialidad`),
  ADD KEY `Id_Movimiento` (`Id_Movimiento`);

--
-- Indices de la tabla `ESPECIALIDAD`
--
ALTER TABLE `ESPECIALIDAD`
  ADD PRIMARY KEY (`Id_Especialidad`);

--
-- Indices de la tabla `ESPECIALIZAR`
--
ALTER TABLE `ESPECIALIZAR`
  ADD PRIMARY KEY (`Id_Especialidad`,`Id_Persona`),
  ADD KEY `Id_Persona` (`Id_Persona`);

--
-- Indices de la tabla `TIPO BECA`
--
ALTER TABLE `TIPO_BECA`
  ADD PRIMARY KEY (`Id_Tipo_Beca`);

--
-- Indices de la tabla `MADRINA`
--
ALTER TABLE `MADRINA`
  ADD PRIMARY KEY (`Id_Persona`),
  ADD KEY `Id_Beca` (`Id_Beca`);

--
-- Indices de la tabla `MATERIAL`
--
ALTER TABLE `MATERIAL`
  ADD PRIMARY KEY (`Id_Material`);

--
-- Indices de la tabla `MOVIMIENTO`
--
ALTER TABLE `MOVIMIENTO`
  ADD PRIMARY KEY (`Id_Movimiento`),
  ADD KEY `Id_TipoMov` (`Id_TipoMov`),
  ADD KEY `Id_Beca` (`Id_Beca`);

--
-- Indices de la tabla `PERSONA`
--
ALTER TABLE `PERSONA`
  ADD PRIMARY KEY (`Id_Persona`),
  ADD KEY `Id_Rol` (`Id_Rol`);

--
-- Indices de la tabla `POSEER`
--
ALTER TABLE `POSEER`
  ADD PRIMARY KEY (`Id_Curso`,`Id_Material`),
  ADD KEY `Id_Material` (`Id_Material`);

--
-- Indices de la tabla `PRESTAMO`
--
ALTER TABLE `PRESTAMO`
  ADD PRIMARY KEY (`Id_Prestamo`),
  ADD KEY `Id_Persona` (`Id_Persona`),
  ADD KEY `Id_TipoPrestamo` (`Id_TipoPrestamo`),
  ADD KEY `Id_Movimiento` (`Id_Movimiento`);

--
-- Indices de la tabla `PROFESOR`
--
ALTER TABLE `PROFESOR`
  ADD PRIMARY KEY (`Id_Persona`);

--
-- Indices de la tabla `RECIBIR`
--
ALTER TABLE `RECIBIR`
  ADD PRIMARY KEY (`Id_Curso`,`Id_Persona`),
  ADD KEY `Id_Persona` (`Id_Persona`);


--
-- Indices de la tabla `ROL`
--
ALTER TABLE `ROL`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- Indices de la tabla `TIPO_MOVIMIENTO`
--
ALTER TABLE `TIPO_MOVIMIENTO`
  ADD PRIMARY KEY (`Id_TipoMov`);

--
-- Indices de la tabla `TIPO_PRESTAMO`
--
ALTER TABLE `TIPO_PRESTAMO`
  ADD PRIMARY KEY (`Id_TipoPrestamo`);

--
-- Indices de la tabla `TRABAJADOR`
--
ALTER TABLE `TRABAJADOR`
  ADD PRIMARY KEY (`Id_Persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ABONO`
--
ALTER TABLE `ABONO`
  MODIFY `Id_Abono` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ALUMNO`
--
ALTER TABLE `ALUMNO`
  MODIFY `Id_Persona` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `BECA`
--
ALTER TABLE `BECA`
  MODIFY `Id_Beca` int NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT de la tabla `CENTRO`
--
ALTER TABLE `CENTRO`
  MODIFY `Id_Centro` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `CIUDAD`
--
ALTER TABLE `CIUDAD`
  MODIFY `Id_Ciudad` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `CURSO`
--
ALTER TABLE `CURSO`
  MODIFY `Id_Curso` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ESPECIALIDAD`
--
ALTER TABLE `ESPECIALIDAD`
  MODIFY `Id_Especialidad` int NOT NULL AUTO_INCREMENT;



--
-- AUTO_INCREMENT de la tabla `MADRINA`
--
ALTER TABLE `MADRINA`
  MODIFY `Id_Persona` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `MATERIAL`
--
ALTER TABLE `MATERIAL`
  MODIFY `Id_Material` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `MOVIMIENTO`
--
ALTER TABLE `MOVIMIENTO`
  MODIFY `Id_Movimiento` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `PERSONA`
--
ALTER TABLE `PERSONA`
  MODIFY `Id_Persona` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `PRESTAMO`
--
ALTER TABLE `PRESTAMO`
  MODIFY `Id_Prestamo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `PROFESOR`
--
ALTER TABLE `PROFESOR`
  MODIFY `Id_Persona` int NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT de la tabla `ROL`
--
ALTER TABLE `ROL`
  MODIFY `Id_Rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `TIPO_MOVIMIENTO`
--
ALTER TABLE `TIPO_MOVIMIENTO`
  MODIFY `Id_TipoMov` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TIPO_PRESTAMO`
--
ALTER TABLE `TIPO_PRESTAMO`
  MODIFY `Id_TipoPrestamo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TRABAJADOR`
--
ALTER TABLE `TRABAJADOR`
  MODIFY `Id_Persona` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TRABAJADOR`
--
ALTER TABLE `TIPO_BECA`
  MODIFY `Id_Tipo_Beca` int NOT NULL AUTO_INCREMENT;



--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ABONO`
--
ALTER TABLE `ABONO`
  ADD CONSTRAINT `ABONO_ibfk_1` FOREIGN KEY (`Id_Prestamo`) REFERENCES `PRESTAMO` (`Id_Prestamo`),
  ADD CONSTRAINT `ABONO_ibfk_2` FOREIGN KEY (`Id_Movimiento`) REFERENCES `MOVIMIENTO` (`Id_Movimiento`);

--
-- Filtros para la tabla `ALUMNO`
--
ALTER TABLE `ALUMNO`
  ADD CONSTRAINT `ALUMNO_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `PERSONA` (`Id_Persona`);

--
-- Filtros para la tabla `BECA`
--
ALTER TABLE `BECA`
  ADD CONSTRAINT `BECA_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `ALUMNO` (`Id_Persona`),
  ADD CONSTRAINT `BECA_ibfk_2` FOREIGN KEY (`Id_Centro`) REFERENCES `CENTRO` (`Id_Centro`),
  ADD CONSTRAINT `BECA_ibfk_3` FOREIGN KEY (`Id_Tipo_Beca`) REFERENCES `TIPO_BECA` (`Id_Tipo_Beca`);



--
-- Filtros para la tabla `CENTRO`
--
ALTER TABLE `CENTRO`
  ADD CONSTRAINT `CENTRO_ibfk_1` FOREIGN KEY (`Id_Ciudad`) REFERENCES `CIUDAD` (`Id_Ciudad`);

--
-- Filtros para la tabla `CURSO`
--
ALTER TABLE `CURSO`
  ADD CONSTRAINT `CURSO_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `PROFESOR` (`Id_Persona`),
  ADD CONSTRAINT `CURSO_ibfk_2` FOREIGN KEY (`Id_Especialidad`) REFERENCES `ESPECIALIDAD` (`Id_Especialidad`),
  ADD CONSTRAINT `CURSO_ibfk_3` FOREIGN KEY (`Id_Movimiento`) REFERENCES `MOVIMIENTO` (`Id_Movimiento`);

--
-- Filtros para la tabla `ESPECIALIZAR`
--
ALTER TABLE `ESPECIALIZAR`
  ADD CONSTRAINT `ESPECIALIZAR_ibfk_1` FOREIGN KEY (`Id_Especialidad`) REFERENCES `ESPECIALIDAD` (`Id_Especialidad`),
  ADD CONSTRAINT `ESPECIALIZAR_ibfk_2` FOREIGN KEY (`Id_Persona`) REFERENCES `TRABAJADOR` (`Id_Persona`);



--
-- Filtros para la tabla `MADRINA`
--
ALTER TABLE `MADRINA`
  ADD CONSTRAINT `MADRINA_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `PERSONA` (`Id_Persona`),
  ADD CONSTRAINT `MADRINA_ibfk_2` FOREIGN KEY (`Id_Beca`) REFERENCES `BECA` (`Id_Beca`);


--
-- Filtros para la tabla `MOVIMIENTO`
--
ALTER TABLE `MOVIMIENTO`
  ADD CONSTRAINT `MOVIMIENTO_ibfk_1` FOREIGN KEY (`Id_TipoMov`) REFERENCES `TIPO_MOVIMIENTO` (`Id_TipoMov`),
  ADD CONSTRAINT `MOVIMIENTO_ibfk_2` FOREIGN KEY (`Id_Beca`) REFERENCES `BECA` (`Id_Beca`);

--
-- Filtros para la tabla `PERSONA`
--
ALTER TABLE `PERSONA`
  ADD CONSTRAINT `PERSONA_ibfk_1` FOREIGN KEY (`Id_Rol`) REFERENCES `ROL` (`Id_Rol`);

--
-- Filtros para la tabla `POSEER`
--
ALTER TABLE `POSEER`
  ADD CONSTRAINT `POSEER_ibfk_1` FOREIGN KEY (`Id_Curso`) REFERENCES `CURSO` (`Id_Curso`),
  ADD CONSTRAINT `POSEER_ibfk_2` FOREIGN KEY (`Id_Material`) REFERENCES `MATERIAL` (`Id_Material`);

--
-- Filtros para la tabla `PRESTAMO`
--
ALTER TABLE `PRESTAMO`
  ADD CONSTRAINT `PRESTAMO_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `PERSONA` (`Id_Persona`),
  ADD CONSTRAINT `PRESTAMO_ibfk_2` FOREIGN KEY (`Id_TipoPrestamo`) REFERENCES `TIPO_PRESTAMO` (`Id_TipoPrestamo`),
  ADD CONSTRAINT `PRESTAMO_ibfk_3` FOREIGN KEY (`Id_Movimiento`) REFERENCES `MOVIMIENTO` (`Id_Movimiento`);

--
-- Filtros para la tabla `PROFESOR`
--
ALTER TABLE `PROFESOR`
  ADD CONSTRAINT `PROFESOR_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `PERSONA` (`Id_Persona`);

--
-- Filtros para la tabla `RECIBIR`
--
ALTER TABLE `RECIBIR`
  ADD CONSTRAINT `RECIBIR_ibfk_1` FOREIGN KEY (`Id_Curso`) REFERENCES `CURSO` (`Id_Curso`),
  ADD CONSTRAINT `RECIBIR_ibfk_2` FOREIGN KEY (`Id_Persona`) REFERENCES `TRABAJADOR` (`Id_Persona`);


--
-- Filtros para la tabla `TRABAJADOR`
--
ALTER TABLE `TRABAJADOR`
  ADD CONSTRAINT `TRABAJADOR_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `PERSONA` (`Id_Persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
