-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: retea_sociala_db
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `imprieteniri`
--

DROP TABLE IF EXISTS `imprieteniri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imprieteniri` (
  `imprieteniri_id` int NOT NULL AUTO_INCREMENT,
  `utilizator_id` int NOT NULL,
  `prieten_id` int NOT NULL,
  `stare_de_imprietenire` enum('in asteptare','acceptat','respins') NOT NULL,
  `data_actiune_de_imprietenire` datetime NOT NULL,
  PRIMARY KEY (`imprieteniri_id`),
  KEY `fk_utilizator_idx` (`utilizator_id`),
  KEY `fk_prieten_idx` (`prieten_id`),
  CONSTRAINT `fk_prieten` FOREIGN KEY (`prieten_id`) REFERENCES `utilizatori` (`utilizator_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_utilizator` FOREIGN KEY (`utilizator_id`) REFERENCES `utilizatori` (`utilizator_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `postari`
--

DROP TABLE IF EXISTS `postari`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postari` (
  `postare_id` int NOT NULL AUTO_INCREMENT,
  `titlu` varchar(45) NOT NULL,
  `continut` varchar(255) NOT NULL,
  `data_publicarii` datetime NOT NULL,
  `utilizator_id` int NOT NULL,
  PRIMARY KEY (`postare_id`),
  KEY `fk_utilizator_id_idx` (`utilizator_id`),
  CONSTRAINT `fk_utilizator_id` FOREIGN KEY (`utilizator_id`) REFERENCES `utilizatori` (`utilizator_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `utilizatori`
--

DROP TABLE IF EXISTS `utilizatori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilizatori` (
  `utilizator_id` int NOT NULL AUTO_INCREMENT,
  `nume` varchar(45) NOT NULL,
  `prenume` varchar(45) NOT NULL,
  `data_nasterii` date NOT NULL,
  `locul_nasterii` varchar(100) NOT NULL,
  `adresa_de_email` varchar(45) DEFAULT NULL,
  `numele_de_utilizator` varchar(45) NOT NULL,
  `un_scurt_cv` varchar(255) DEFAULT NULL,
  `o_fotografie` blob,
  PRIMARY KEY (`utilizator_id`),
  UNIQUE KEY `numele_de_utilizator_UNIQUE` (`numele_de_utilizator`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-06 17:09:55
