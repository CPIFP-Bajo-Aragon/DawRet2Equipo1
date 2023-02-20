CREATE DATABASE  IF NOT EXISTS `sarabastall3242` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sarabastall3242`;
-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: sarabastall3242
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abono`
--

DROP TABLE IF EXISTS `abono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abono` (
  `Id_Abono` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Prestamo` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad` float NOT NULL,
  `Id_Movimiento` int(11) NOT NULL,
  PRIMARY KEY (`Id_Abono`),
  KEY `Id_Prestamo` (`Id_Prestamo`),
  KEY `Id_Movimiento` (`Id_Movimiento`),
  CONSTRAINT `ABONO_ibfk_1` FOREIGN KEY (`Id_Prestamo`) REFERENCES `prestamo` (`Id_Prestamo`),
  CONSTRAINT `ABONO_ibfk_2` FOREIGN KEY (`Id_Movimiento`) REFERENCES `movimiento` (`Id_Movimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno` (
  `Id_Persona` int(11) NOT NULL AUTO_INCREMENT,
  `Curso_Actual` varchar(20) NOT NULL,
  `Tutor_Legal` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Persona`),
  CONSTRAINT `ALUMNO_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `persona` (`Id_Persona`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `beca`
--

DROP TABLE IF EXISTS `beca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beca` (
  `Id_Beca` int(11) NOT NULL AUTO_INCREMENT,
  `Importe` float NOT NULL,
  `Observaciones` varchar(150) DEFAULT NULL,
  `Fecha_Beca` date NOT NULL,
  `Nota_Media` float NOT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Id_Centro` int(11) NOT NULL,
  `Id_Tipo_Beca` int(11) NOT NULL,
  `Fecha_Financiacion` date DEFAULT NULL,
  PRIMARY KEY (`Id_Beca`),
  KEY `Id_Persona` (`Id_Persona`),
  KEY `Id_Centro` (`Id_Centro`),
  KEY `BECA_ibfk_3` (`Id_Tipo_Beca`),
  CONSTRAINT `BECA_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `alumno` (`Id_Persona`),
  CONSTRAINT `BECA_ibfk_2` FOREIGN KEY (`Id_Centro`) REFERENCES `centro` (`Id_Centro`),
  CONSTRAINT `BECA_ibfk_3` FOREIGN KEY (`Id_Tipo_Beca`) REFERENCES `tipo_beca` (`Id_Tipo_Beca`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `centro`
--

DROP TABLE IF EXISTS `centro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `centro` (
  `Id_Centro` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Cuantia` float NOT NULL,
  `Id_Ciudad` int(11) NOT NULL,
  `Id_Estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Centro`),
  KEY `Id_Ciudad` (`Id_Ciudad`),
  KEY `Id_Estado` (`Id_Estado`),
  CONSTRAINT `CENTRO_ibfk_1` FOREIGN KEY (`Id_Ciudad`) REFERENCES `ciudad` (`Id_Ciudad`),
  CONSTRAINT `Id_Estado` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ciudad` (
  `Id_Ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Ciudad` varchar(50) NOT NULL,
  `Distancia` float NOT NULL,
  PRIMARY KEY (`Id_Ciudad`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curso` (
  `Id_Curso` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Importe` float DEFAULT NULL,
  `Fecha_Impartir` date NOT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Id_Especialidad` int(11) NOT NULL,
  `Id_Movimiento` int(11) DEFAULT NULL,
  `Id_Estado` int(11) NOT NULL,
  PRIMARY KEY (`Id_Curso`),
  KEY `Id_Persona` (`Id_Persona`),
  KEY `Id_Especialidad` (`Id_Especialidad`),
  KEY `Id_Movimiento` (`Id_Movimiento`),
  KEY `CURSO_ibfk_4` (`Id_Estado`),
  CONSTRAINT `CURSO_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `profesor` (`Id_Persona`),
  CONSTRAINT `CURSO_ibfk_2` FOREIGN KEY (`Id_Especialidad`) REFERENCES `especialidad` (`Id_Especialidad`),
  CONSTRAINT `CURSO_ibfk_3` FOREIGN KEY (`Id_Movimiento`) REFERENCES `movimiento` (`Id_Movimiento`),
  CONSTRAINT `CURSO_ibfk_4` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especialidad` (
  `Id_Especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Especialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `especializar`
--

DROP TABLE IF EXISTS `especializar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especializar` (
  `Id_Especialidad` int(11) NOT NULL,
  `Id_Persona` int(11) NOT NULL,
  PRIMARY KEY (`Id_Especialidad`,`Id_Persona`),
  KEY `Id_Persona` (`Id_Persona`),
  CONSTRAINT `ESPECIALIZAR_ibfk_1` FOREIGN KEY (`Id_Especialidad`) REFERENCES `especialidad` (`Id_Especialidad`),
  CONSTRAINT `ESPECIALIZAR_ibfk_2` FOREIGN KEY (`Id_Persona`) REFERENCES `trabajador` (`Id_Persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `Id_Estado` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `madrina`
--

DROP TABLE IF EXISTS `madrina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `madrina` (
  `Id_Persona` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Beca` int(11) NOT NULL,
  `Fecha_Financiacion` date NOT NULL,
  PRIMARY KEY (`Id_Persona`),
  KEY `Id_Beca` (`Id_Beca`),
  CONSTRAINT `MADRINA_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `persona` (`Id_Persona`),
  CONSTRAINT `MADRINA_ibfk_2` FOREIGN KEY (`Id_Beca`) REFERENCES `beca` (`Id_Beca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `material` (
  `Id_Material` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Archivo` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Material`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movimiento` (
  `Id_Movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Procedencia` varchar(50) NOT NULL,
  `Cantidad` float NOT NULL,
  `Id_TipoMov` int(11) NOT NULL,
  `Id_Beca` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Movimiento`),
  KEY `Id_TipoMov` (`Id_TipoMov`),
  KEY `Id_Beca` (`Id_Beca`),
  CONSTRAINT `MOVIMIENTO_ibfk_1` FOREIGN KEY (`Id_TipoMov`) REFERENCES `tipo_movimiento` (`Id_TipoMov`),
  CONSTRAINT `MOVIMIENTO_ibfk_2` FOREIGN KEY (`Id_Beca`) REFERENCES `beca` (`Id_Beca`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `Id_Persona` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Direccion` varchar(80) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Login` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Id_Rol` int(11) DEFAULT NULL,
  `Id_Estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Persona`),
  KEY `Id_Rol` (`Id_Rol`),
  KEY `Fk48` (`Id_Estado`),
  CONSTRAINT `Fk48` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`),
  CONSTRAINT `PERSONA_ibfk_1` FOREIGN KEY (`Id_Rol`) REFERENCES `rol` (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `poseer`
--

DROP TABLE IF EXISTS `poseer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `poseer` (
  `Id_Material` int(11) NOT NULL,
  `Id_Curso` int(11) NOT NULL,
  PRIMARY KEY (`Id_Curso`,`Id_Material`),
  KEY `Id_Material` (`Id_Material`),
  CONSTRAINT `POSEER_ibfk_1` FOREIGN KEY (`Id_Curso`) REFERENCES `curso` (`Id_Curso`),
  CONSTRAINT `POSEER_ibfk_2` FOREIGN KEY (`Id_Material`) REFERENCES `material` (`Id_Material`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prestamo` (
  `Id_Prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `Concepto` varchar(50) NOT NULL,
  `Importe` float NOT NULL,
  `Observaciones` varchar(150) DEFAULT NULL,
  `Fecha_Fin` date DEFAULT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Id_TipoPrestamo` int(11) NOT NULL,
  `Id_Movimiento` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  PRIMARY KEY (`Id_Prestamo`),
  KEY `Id_Persona` (`Id_Persona`),
  KEY `Id_TipoPrestamo` (`Id_TipoPrestamo`),
  KEY `Id_Movimiento` (`Id_Movimiento`),
  KEY `PRESTAMO_ibfk_4` (`Id_Estado`),
  CONSTRAINT `PRESTAMO_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `persona` (`Id_Persona`),
  CONSTRAINT `PRESTAMO_ibfk_2` FOREIGN KEY (`Id_TipoPrestamo`) REFERENCES `tipo_prestamo` (`Id_TipoPrestamo`),
  CONSTRAINT `PRESTAMO_ibfk_3` FOREIGN KEY (`Id_Movimiento`) REFERENCES `movimiento` (`Id_Movimiento`),
  CONSTRAINT `PRESTAMO_ibfk_4` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesor` (
  `Id_Persona` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id_Persona`),
  CONSTRAINT `PROFESOR_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `persona` (`Id_Persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recibir`
--

DROP TABLE IF EXISTS `recibir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recibir` (
  `Id_Curso` int(11) NOT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Id_Curso`,`Id_Persona`),
  KEY `Id_Persona` (`Id_Persona`),
  CONSTRAINT `RECIBIR_ibfk_1` FOREIGN KEY (`Id_Curso`) REFERENCES `curso` (`Id_Curso`),
  CONSTRAINT `RECIBIR_ibfk_2` FOREIGN KEY (`Id_Persona`) REFERENCES `trabajador` (`Id_Persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `Id_Rol` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Rol` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_beca`
--

DROP TABLE IF EXISTS `tipo_beca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_beca` (
  `Id_Tipo_Beca` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_Beca` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Id_Tipo_Beca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_movimiento`
--

DROP TABLE IF EXISTS `tipo_movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_movimiento` (
  `Id_TipoMov` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_TipoMov` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_TipoMov`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_prestamo`
--

DROP TABLE IF EXISTS `tipo_prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_prestamo` (
  `Id_TipoPrestamo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_TipoPrestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trabajador` (
  `Id_Persona` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id_Persona`),
  CONSTRAINT `TRABAJADOR_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `persona` (`Id_Persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-19 23:00:21
