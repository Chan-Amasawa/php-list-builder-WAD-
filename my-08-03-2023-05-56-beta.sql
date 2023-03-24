-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for Linux (x86_64)
--
-- Host: mysql.hostinger.ro    Database: u574849695_23
-- ------------------------------------------------------
-- Server version	10.5.12-MariaDB-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `my`
--

DROP TABLE IF EXISTS `my`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my`
--

LOCK TABLES `my` WRITE;
/*!40000 ALTER TABLE `my` DISABLE KEYS */;
INSERT INTO `my` VALUES (69,'Mathew Ferry III',8,'1990-07-19 09:12:10'),(70,'Ali Glover',0,'2019-01-11 10:44:12'),(71,'Verna Berge',651179,'1972-01-10 11:21:32'),(72,'Kari Stroman',56,'2020-10-31 01:37:01'),(73,'Deron Batz DVM',90549,'2011-02-17 04:37:50'),(74,'Amara Schowalter I',1361730,'1991-12-04 22:15:45'),(75,'Alivia Langosh',25740987,'2020-09-27 10:18:10'),(76,'Kevin Weimann',7701,'1989-03-15 11:32:13'),(77,'Gracie Bailey',88,'2009-08-14 10:34:44'),(78,'Helena Heller',0,'1971-04-14 15:11:17'),(79,'Coralie Schowalter D',2,'1994-10-28 13:34:46'),(80,'Maegan Bernhard',550,'1991-02-02 17:21:08'),(81,'Liliana Anderson',193,'2015-05-10 01:19:51'),(82,'Emmet Roob',4941192,'1987-03-11 20:41:13'),(83,'Daniela Morar',342107,'1981-10-28 05:20:32'),(84,'Roslyn Wuckert',89817143,'2013-02-03 05:28:43'),(85,'Aleen Wolf PhD',46796724,'1971-08-23 18:37:21'),(86,'Easter Reilly',2,'1980-08-26 07:35:37'),(87,'Clarissa Russel Sr.',622760959,'2015-06-20 22:15:00'),(88,'Kareem Stamm',5190,'2005-12-06 01:37:24'),(89,'Celestine Witting DV',38,'1971-07-15 03:35:54'),(90,'Hattie Hagenes',53668097,'1976-10-16 16:15:08'),(91,'Dr. Korey Emmerich',642899488,'1994-06-30 06:14:38'),(92,'Mr. Ansley Bergnaum',5596846,'1982-06-11 06:39:32'),(93,'Novella Bartoletti',862680,'2000-12-12 10:32:11'),(94,'Judah Luettgen',0,'2006-01-17 09:31:19'),(95,'Evan Schoen I',9227,'2017-07-07 20:40:34'),(96,'Lavinia Walter',0,'1998-05-02 10:05:31'),(97,'Dr. Demarcus Fisher',46374,'1981-08-24 09:17:18'),(98,'Amiya Romaguera V',13558070,'2018-08-26 01:20:05'),(99,'Estelle Hayes',82,'2009-09-09 00:38:42'),(100,'Prof. Raheem Goldner',796308,'1978-08-08 01:32:27'),(101,'Melany Miller',6178190,'2021-11-06 04:44:43'),(102,'Dr. Liza Lowe DDS',921,'1992-07-08 04:18:00'),(103,'Garth Wiegand',8705,'2012-12-23 16:02:29'),(104,'Owen Rowe',729652,'2003-05-15 05:00:18'),(105,'Esteban Ullrich',697793,'2017-12-03 11:28:28'),(106,'Prince Corkery',9933161,'2005-01-14 06:01:59'),(107,'Queen Cruickshank',7,'1980-07-29 20:46:54'),(108,'Dr. Gisselle Jaskols',48,'2002-09-21 16:24:23'),(109,'Mossie Kuhlman',97511588,'1999-12-25 10:16:26'),(110,'Maude Langworth PhD',0,'1998-10-09 20:46:15'),(111,'Darrion Tremblay DVM',5,'1998-03-29 11:08:59'),(112,'Mr. Jackson Hoeger',27,'2007-04-13 16:29:57'),(113,'Mrs. Christine Lowe',511729,'2007-01-14 08:21:46'),(114,'Elsa Boehm',853576,'2016-11-09 03:49:20'),(115,'Mr. Mac Kihn Sr.',74259988,'1978-12-11 00:12:53'),(116,'Taylor Reynolds',0,'2002-01-03 08:07:49'),(117,'Judah Brakus',0,'1983-03-23 21:19:38'),(118,'Miss Gwen Pollich DV',6118,'2004-02-11 10:00:57'),(119,'Osvaldo O\'Reilly',1,'1991-11-29 08:51:41'),(120,'Kurt Hirthe',271293,'1995-02-12 02:28:08'),(121,'Dr. Garth Carter DVM',16382931,'2003-02-19 20:32:56'),(122,'Ms. Dorothea Steuber',8,'2000-04-11 15:14:33'),(123,'Mr. Porter Kling V',52501,'2016-06-20 14:27:57'),(124,'Miss Zula Schroeder ',78699,'1987-03-12 01:36:46'),(125,'Chadrick Tromp',0,'2010-05-24 05:48:26'),(126,'Prof. Candice Collie',1578,'1970-02-05 18:58:37'),(127,'Arturo Volkman',667,'1981-07-08 06:39:28'),(128,'Joany Lesch',681,'1970-05-05 13:45:03'),(129,'Kaleigh Bahringer',62572874,'1997-04-19 22:35:54'),(130,'Ayla Wehner',878,'1977-07-21 13:09:58'),(131,'Jerrell Hayes',315575058,'1976-06-07 23:15:08'),(132,'Kira Monahan I',0,'1970-11-07 07:18:36'),(133,'Dr. Leonora Swaniaws',5084,'1992-05-09 12:41:50'),(134,'Jaime Pacocha',47841,'1973-12-31 05:40:29'),(135,'Mr. Guy Sporer III',3770630,'2001-07-26 09:15:44'),(136,'Mac Hackett',4515787,'2002-03-10 10:13:40'),(137,'Gayle Lindgren',64,'1989-02-16 00:47:27'),(138,'Athena Brown DVM',18093375,'2005-05-17 02:52:10'),(139,'Aileen Leuschke',17,'1993-05-03 01:14:21'),(140,'Zander Larkin MD',5029660,'2011-02-18 08:38:57'),(141,'Garnett Hudson IV',79,'2009-07-08 08:59:39'),(142,'Mr. Keon Brekke DDS',0,'2000-09-27 13:58:19'),(143,'Mrs. Beth Murray MD',18,'1975-04-01 08:21:36'),(144,'Dion Kilback IV',84,'2016-09-25 12:36:41'),(145,'Tristian Gusikowski ',7275,'2003-09-23 07:23:20'),(146,'Nathaniel Grant',5035423,'2020-08-30 02:49:20'),(147,'Alejandrin Beahan',11,'1970-12-07 14:29:30'),(148,'Sophie Ebert',949,'1970-07-16 21:19:30'),(149,'Maybell Connelly',160988,'1989-09-30 22:15:02'),(150,'Dr. Guido Feest IV',9469210,'1990-06-22 06:22:45'),(151,'Meta Willms',728540283,'2020-05-07 03:51:22'),(152,'Prof. Nannie Gorczan',38,'1976-04-09 20:26:36'),(153,'Maude Kuphal',91,'1982-02-06 04:34:58'),(154,'Napoleon Dibbert',0,'1980-03-01 14:29:01'),(155,'Brant Gottlieb',6422112,'2006-01-05 21:29:16'),(156,'Madge Waelchi',303896180,'2009-11-27 14:44:32'),(157,'Karlie Greenholt',294228,'1990-10-17 13:49:18'),(158,'Clementina Robel Sr.',0,'2001-01-01 23:42:13'),(159,'Reta Herzog',52145,'2007-05-22 21:23:56'),(160,'Stanford Luettgen',7152583,'1971-07-05 01:28:20'),(161,'Georgiana Schulist I',7338379,'2001-08-09 19:37:00'),(162,'Annie Padberg',29,'1976-03-18 09:00:15'),(163,'Deanna Daugherty III',4,'1984-10-27 03:34:21'),(164,'Mrs. Raegan Kuhn',13728233,'1991-04-28 14:02:29'),(165,'Mr. Ole Herman',75572,'1996-06-09 04:51:33'),(166,'Glenda Crona',968416,'1971-06-10 23:06:32'),(167,'Dr. Chelsey Keeling ',88,'2013-12-06 11:23:48'),(168,'Albertha Schamberger',7135,'2000-10-16 19:00:17');
/*!40000 ALTER TABLE `my` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-08  5:56:17
