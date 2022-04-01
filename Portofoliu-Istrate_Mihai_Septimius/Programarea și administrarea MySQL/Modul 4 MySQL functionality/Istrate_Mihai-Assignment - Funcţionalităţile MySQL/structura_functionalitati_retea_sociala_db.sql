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
-- Temporary view structure for view `date_principale_utilizator`
--

DROP TABLE IF EXISTS `date_principale_utilizator`;
/*!50001 DROP VIEW IF EXISTS `date_principale_utilizator`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `date_principale_utilizator` AS SELECT 
 1 AS `nume`,
 1 AS `prenume`,
 1 AS `data_nasterii`,
 1 AS `locul_nasterii`*/;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  FULLTEXT KEY `titlu_si_continut` (`titlu`,`continut`),
  CONSTRAINT `fk_utilizator_id` FOREIGN KEY (`utilizator_id`) REFERENCES `utilizatori` (`utilizator_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  UNIQUE KEY `numele_de_utilizator_UNIQUE` (`numele_de_utilizator`),
  KEY `nume_si_prenume` (`nume`,`prenume`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'retea_sociala_db'
--
/*!50003 DROP FUNCTION IF EXISTS `numarul_de_prieteni` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `numarul_de_prieteni`(id_utilizator_cautat int unsigned) RETURNS int
    DETERMINISTIC
BEGIN
DECLARE nr_Prieteni INT;

SELECT count(DISTINCT prieten_id) INTO nr_Prieteni
FROM imprieteniri WHERE utilizator_id=id_utilizator_cautat AND stare_de_imprietenire='acceptat';
RETURN nr_Prieteni;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `introduce_utilizator` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `introduce_utilizator`(numeValue varchar(45),prenumeValue varchar(45),data_nasteriiValue date,locul_nasteriiValue varchar(100),adresa_de_emailValue varchar(45),numele_de_utilizatorValue varchar(45),un_scurt_cvValue varchar(255),o_fotografieValue blob)
BEGIN

/*In tabelul utilizatori doar aceste 3 coloane:email,descrierea si fotografia pot fi si fara valoare,de aceea le-am atribuit valori default daca la apelarea procedurii utilizatorul le atribuie ca valoare '' */
IF adresa_de_emailValue='' THEN SET adresa_de_emailValue=''; END IF;
IF un_scurt_cvValue='' THEN SET un_scurt_cvValue=''; END IF;
IF o_fotografieValue='' THEN SET o_fotografieValue=NULL; END IF;


INSERT INTO utilizatori(nume,prenume,data_nasterii,locul_nasterii,adresa_de_email,numele_de_utilizator,un_scurt_cv,o_fotografie) VALUES(numeValue,prenumeValue,data_nasteriiValue,locul_nasteriiValue,adresa_de_emailValue,numele_de_utilizatorValue,un_scurt_cvValue,o_fotografieValue);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modifica_utilizator` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modifica_utilizator`(numeColoana varchar(45),valoareColoana varchar(45),valoareColoana_FOTO BLOB,id int unsigned)
BEGIN

IF valoareColoana_FOTO='' THEN SET valoareColoana_FOTO=NULL ; END IF;


IF numeColoana='nume' THEN  
UPDATE utilizatori SET nume=valoareColoana WHERE utilizator_id=id;
END IF;

IF numeColoana='prenume' THEN  
UPDATE utilizatori SET prenume=valoareColoana WHERE utilizator_id=id;
END IF;

IF numeColoana='data_nasterii' THEN
SET valoareColoana=CONVERT(valoareColoana,DATE);  
UPDATE utilizatori SET data_nasterii=valoareColoana WHERE utilizator_id=id;
END IF;

IF numeColoana='locul_nasterii' THEN  
UPDATE utilizatori SET locul_nasterii=valoareColoana WHERE utilizator_id=id;
END IF;

IF numeColoana='adresa_de_email' THEN  
UPDATE utilizatori SET adresa_de_email=valoareColoana WHERE utilizator_id=id;
END IF;

IF numeColoana='numele_de_utilizator' THEN  
UPDATE utilizatori SET numele_de_utilizator=valoareColoana WHERE utilizator_id=id;
END IF;

IF numeColoana='un_scurt_cv' THEN  
UPDATE utilizatori SET un_scurt_cv=valoareColoana WHERE utilizator_id=id;
END IF;

IF numeColoana='o_fotografie' THEN  
UPDATE utilizatori SET o_fotografie=valoareColoana_FOTO WHERE utilizator_id=id;
END IF;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sterge_utilizator` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sterge_utilizator`(id int unsigned)
BEGIN
/*Pentru a permite stergerea am inlaturat temporar in cadrul executiei procedurii, negarea cheii straine*/
SET FOREIGN_KEY_CHECKS=0;

ALTER TABLE utilizatori DISABLE KEYS;
ALTER TABLE postari DISABLE KEYS;
ALTER TABLE imprieteniri DISABLE KEYS;


DELETE FROM utilizatori WHERE utilizator_id=id;
DELETE FROM postari WHERE utilizator_id=id;
DELETE FROM imprieteniri WHERE utilizator_id=id;

ALTER TABLE utilizatori ENABLE KEYS;
ALTER TABLE postari ENABLE KEYS;
ALTER TABLE imprieteniri ENABLE KEYS;


SET FOREIGN_KEY_CHECKS=1;



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `date_principale_utilizator`
--

/*!50001 DROP VIEW IF EXISTS `date_principale_utilizator`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `date_principale_utilizator` AS select `utilizatori`.`nume` AS `nume`,`utilizatori`.`prenume` AS `prenume`,`utilizatori`.`data_nasterii` AS `data_nasterii`,`utilizatori`.`locul_nasterii` AS `locul_nasterii` from `utilizatori` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-24 14:18:42
