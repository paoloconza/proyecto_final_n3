-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: university_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumnos_clases`
--

DROP TABLE IF EXISTS `alumnos_clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos_clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `clase_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `clase_id` (`clase_id`),
  CONSTRAINT `alumnos_clases_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `alumnos_clases_ibfk_2` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos_clases`
--

LOCK TABLES `alumnos_clases` WRITE;
/*!40000 ALTER TABLE `alumnos_clases` DISABLE KEYS */;
INSERT INTO `alumnos_clases` VALUES (1,1,1),(2,11,2),(3,3,3),(4,4,4),(5,5,5),(6,6,6),(7,7,7),(8,8,8),(9,9,9),(10,10,10);
/*!40000 ALTER TABLE `alumnos_clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `clase_id` int(11) DEFAULT NULL,
  `calificacion` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `clase_id` (`clase_id`),
  CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificaciones`
--

LOCK TABLES `calificaciones` WRITE;
/*!40000 ALTER TABLE `calificaciones` DISABLE KEYS */;
INSERT INTO `calificaciones` VALUES (1,10,1,90.50),(2,10,2,85.00);
/*!40000 ALTER TABLE `calificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clases`
--

DROP TABLE IF EXISTS `clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clase` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clases`
--

LOCK TABLES `clases` WRITE;
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
INSERT INTO `clases` VALUES (1,'Guarani'),(2,'Biologia'),(3,'Biomedicina'),(4,'Ciencia de materiales'),(5,'Ciencias ambientales'),(6,'Ciencias basicas'),(7,'Ciencia de la tierra'),(8,'Astronomia'),(9,'Gastronomia'),(10,'Idiomas');
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maestros_clases`
--

DROP TABLE IF EXISTS `maestros_clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maestros_clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `clase_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `clase_id` (`clase_id`),
  CONSTRAINT `maestros_clases_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `maestros_clases_ibfk_2` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestros_clases`
--

LOCK TABLES `maestros_clases` WRITE;
/*!40000 ALTER TABLE `maestros_clases` DISABLE KEYS */;
INSERT INTO `maestros_clases` VALUES (11,24,1),(12,25,2),(13,26,3),(14,27,4),(15,28,5),(16,29,6),(17,30,7),(18,31,8),(19,32,9),(20,33,10),(21,2,NULL);
/*!40000 ALTER TABLE `maestros_clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'maestro'),(3,'alumno');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` varchar(50) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `correo` varchar(220) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo` (`correo`),
  KEY `rol_id` (`rol_id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Paolo','Conza','76945412','28-04-95','jr. los pioneros','admin@admin','admin',1),(2,'Jesus','Conza','12345678','19-01-02','AA-HH Barrio Nuevo','maestro@maestro','maestro',2),(3,'Carla','Conza','76945412','28-04-95','jr. los pioneros','alumno@alumno','alumno',3),(4,'Paolo','Conza','12345678','28-04-1995','Jr. Los Pioneros 123','paolo@alumno','alumno',3),(5,'Maria','Gomez','23456789','15-08-1990','Av. Principal 456','maria@alumno','alumno',3),(6,'Juan','Perez','34567890','02-03-1985','Calle Secundaria 789','juan@alumno','alumno',3),(7,'Ana','Rodriguez','45678901','10-12-1998','Carrera 45 567','ana@alumno','alumno',3),(8,'Carlos','Sanchez','56789012','05-06-1992','Alameda Central 890','carlos@alumno','alumno',3),(9,'Laura','Fernandez','67890123','18-11-1987','Pasaje del Sol 1234','laura@alumno','alumno',3),(10,'Diego','Lopez','78901234','23-09-1996','Plaza Mayor 5678','diego@alumno','alumno',3),(11,'Sofia','Martinez','89012345','07-04-1983','Avenida Central 9012','sofia@alumno','alumno',3),(12,'Manuel','Torres','90123456','14-02-1990','Callejón Secreto 345','manuel@alumno','alumno',3),(13,'Elena','Hernandez','01234567','30-07-1989','Ruta Escondida 6789','elena@alumno','alumno',3),(14,'Luis','Garcia','11223344','22-06-1993','Camino Real 234','luis@alumno','alumno',3),(15,'Isabel','Diaz','22334455','11-05-1986','Pasillo Luminoso 567','isabel@alumno','alumno',3),(16,'Pedro','Rojas','33445566','03-09-1997','Carrera Veloz 789','pedro@alumno','alumno',3),(17,'Marta','Molina','44556677','25-12-1984','Rincon Secreto 1234','marta@alumno','alumno',3),(18,'Javier','Castro','55667788','17-08-1991','Bulevar Central 5678','javier@alumno','alumno',3),(19,'Carmen','Gutierrez','66778899','09-01-1988','Paseo Sereno 9012','carmen@alumno','alumno',3),(20,'Raul','Ramirez','77889900','04-07-1994','Callejuela Tranquila 345','raul@alumno','alumno',3),(21,'Patricia','Santos','88990011','28-02-1981','Sendero Pacifico 6789','patricia@alumno','alumno',3),(22,'Fernando','Mendez','99001122','15-03-1995','Avenida Delicias 234','fernando@alumno','alumno',3),(23,'Monica','Vega','00112233','20-10-1982','Paseo Encantado 567','monica@alumno','alumno',3),(24,'Juan','Gonzalez','11112222','01-02-1980','Dirección1','juan@maestro','maestro',2),(25,'Maria','Lopez','22223333','15-03-1975','Dirección2','maria@maestro','maestro',2),(26,'Carlos','Martinez','33334444','10-04-1982','Dirección3','carlos@maestro','maestro',2),(27,'Ana','Rodriguez','44445555','23-05-1978','Dirección4','ana@maestro','maestro',2),(28,'Luis','Fernandez','55556666','07-06-1985','Dirección5','luis@maestro','maestro',2),(29,'Laura','Gomez','66667777','20-07-1990','Dirección6','laura@maestro','maestro',2),(30,'Javier','Perez','77778888','04-08-1987','Dirección7','javier@maestro','maestro',2),(31,'Elena','Sanchez','88889999','19-09-1983','Dirección8','elena@maestro','maestro',2),(32,'Fernando','Torres','99990000','02-10-1988','Dirección9','fernando@maestro','maestro',2),(33,'Sofia','Gutierrez','00001111','15-11-1995','Dirección10','sofia@maestro','maestro',2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'university_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-28 13:24:30
