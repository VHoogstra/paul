-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: paul
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `var` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'2018-06-14 17:30:49','2018-06-14 17:30:49',1,'search','admin@admin.nl searched at2018-06-14 19:30:49  for user: 8101944','8101944'),(2,'2018-06-14 17:34:17','2018-06-14 17:34:17',1,'search','admin@admin.nl searched at2018-06-14 19:34:17  for user: 8101944','8101944'),(3,'2018-06-14 17:36:20','2018-06-14 17:36:20',1,'search','admin@admin.nl searched at2018-06-14 19:36:20  for user: 8101944','8101944'),(4,'2018-06-14 17:43:19','2018-06-14 17:43:19',1,'search','admin@admin.nl searched at2018-06-14 19:43:19  for user: 8101944','8101944'),(5,'2018-06-14 17:47:19','2018-06-14 17:47:19',1,'search','admin@admin.nl searched at2018-06-14 19:47:19  for user: 8101944','8101944'),(6,'2018-06-14 17:47:21','2018-06-14 17:47:21',1,'search','admin@admin.nl searched at2018-06-14 19:47:21  for user: 8101944','8101944'),(7,'2018-06-14 17:57:17','2018-06-14 17:57:17',1,'search','admin@admin.nl searched at2018-06-14 19:57:17  for user: 8101944','8101944'),(8,'2018-06-14 17:57:31','2018-06-14 17:57:31',1,'search','admin@admin.nl searched at2018-06-14 19:57:31  for user: 8101944','8101944'),(9,'2018-06-14 17:58:13','2018-06-14 17:58:13',1,'search','admin@admin.nl searched at2018-06-14 19:58:13  for user: 8101944','8101944'),(10,'2018-06-14 17:58:23','2018-06-14 17:58:23',1,'search','admin@admin.nl searched at2018-06-14 19:58:23  for user: 8101944','8101944'),(11,'2018-06-14 17:58:30','2018-06-14 17:58:30',1,'search','admin@admin.nl searched at2018-06-14 19:58:30  for user: 8101944','8101944'),(12,'2018-06-14 18:00:44','2018-06-14 18:00:44',1,'search','admin@admin.nl searched at2018-06-14 20:00:44  for user: 8101944','8101944'),(13,'2018-06-14 18:00:47','2018-06-14 18:00:47',1,'search','admin@admin.nl searched at2018-06-14 20:00:47  for user: 8101944','8101944'),(14,'2018-06-14 18:01:48','2018-06-14 18:01:48',1,'search','admin@admin.nl searched at2018-06-14 20:01:48  for user: 8101944','8101944'),(15,'2018-06-14 18:02:39','2018-06-14 18:02:39',1,'search','admin@admin.nl searched at2018-06-14 20:02:39  for user: 8101944','8101944'),(16,'2018-06-14 18:02:48','2018-06-14 18:02:48',1,'search','admin@admin.nl searched at2018-06-14 20:02:48  for user: 8101944','8101944'),(17,'2018-06-14 18:03:19','2018-06-14 18:03:19',1,'search','admin@admin.nl searched at2018-06-14 20:03:19  for user: 8101944','8101944'),(18,'2018-06-14 18:05:09','2018-06-14 18:05:09',1,'search','admin@admin.nl searched at2018-06-14 20:05:09  for user: 8101944','8101944'),(19,'2018-06-14 18:05:12','2018-06-14 18:05:12',1,'search','admin@admin.nl searched at2018-06-14 20:05:12  for user: 8101944','8101944'),(20,'2018-06-14 18:07:31','2018-06-14 18:07:31',1,'search','admin@admin.nl searched at2018-06-14 20:07:31  for user: 8101944','8101944'),(21,'2018-06-14 18:08:17','2018-06-14 18:08:17',1,'search','admin@admin.nl searched at2018-06-14 20:08:17  for user: 8101944','8101944'),(22,'2018-06-14 18:08:20','2018-06-14 18:08:20',1,'search','admin@admin.nl searched at2018-06-14 20:08:20  for user: 8101944','8101944'),(23,'2018-06-14 18:08:26','2018-06-14 18:08:26',1,'search','admin@admin.nl searched at2018-06-14 20:08:26  for user: 8101944','8101944'),(24,'2018-06-14 18:08:31','2018-06-14 18:08:31',1,'search','admin@admin.nl searched at2018-06-14 20:08:31  for user: 8101944','8101944'),(25,'2018-06-14 18:09:16','2018-06-14 18:09:16',1,'search','admin@admin.nl searched at2018-06-14 20:09:16  for user: 8101944','8101944'),(26,'2018-06-14 18:09:37','2018-06-14 18:09:37',1,'search','admin@admin.nl searched at2018-06-14 20:09:37  for user: 8101944','8101944'),(27,'2018-06-14 18:09:47','2018-06-14 18:09:47',1,'search','admin@admin.nl searched at2018-06-14 20:09:47  for user: 8101944','8101944'),(28,'2018-06-14 18:09:50','2018-06-14 18:09:50',1,'search','admin@admin.nl searched at2018-06-14 20:09:50  for user: 8101944','8101944'),(29,'2018-06-14 18:09:55','2018-06-14 18:09:55',1,'search','admin@admin.nl searched at2018-06-14 20:09:55  for user: 8101944','8101944'),(30,'2018-06-14 18:09:56','2018-06-14 18:09:56',1,'search','admin@admin.nl searched at2018-06-14 20:09:56  for user: 8101944','8101944'),(31,'2018-06-14 18:10:20','2018-06-14 18:10:20',1,'search','admin@admin.nl searched at2018-06-14 20:10:20  for user: 8101944','8101944'),(32,'2018-06-14 18:10:37','2018-06-14 18:10:37',1,'search','admin@admin.nl searched at2018-06-14 20:10:37  for user: 8101944','8101944'),(33,'2018-06-14 18:10:37','2018-06-14 18:10:37',1,'search','admin@admin.nl searched at2018-06-14 20:10:37  for user: 8101944','8101944'),(34,'2018-06-14 18:10:45','2018-06-14 18:10:45',1,'search','admin@admin.nl searched at2018-06-14 20:10:45  for user: 8101944','8101944'),(35,'2018-06-14 18:10:57','2018-06-14 18:10:57',1,'search','admin@admin.nl searched at2018-06-14 20:10:57  for user: 8101944','8101944'),(36,'2018-06-14 18:11:51','2018-06-14 18:11:51',1,'search','admin@admin.nl searched at2018-06-14 20:11:51  for user: 8101944','8101944'),(37,'2018-06-14 18:12:31','2018-06-14 18:12:31',1,'search','admin@admin.nl searched at2018-06-14 20:12:31  for user: 8101944','8101944'),(38,'2018-06-14 18:14:53','2018-06-14 18:14:53',1,'search','admin@admin.nl searched at2018-06-14 20:14:53  for user: 8101944','8101944'),(39,'2018-06-14 18:17:39','2018-06-14 18:17:39',1,'search','admin@admin.nl searched at2018-06-14 20:17:39  for user: 3103250','3103250'),(40,'2018-06-14 18:18:37','2018-06-14 18:18:37',1,'search','admin@admin.nl searched at2018-06-14 20:18:37  for user: 3103250','3103250'),(41,'2018-06-14 18:18:55','2018-06-14 18:18:55',1,'search','admin@admin.nl searched at2018-06-14 20:18:55  for user: 3103250','3103250'),(42,'2018-06-14 18:19:12','2018-06-14 18:19:12',1,'search','admin@admin.nl searched at2018-06-14 20:19:12  for user: 3103250','3103250'),(43,'2018-06-14 18:19:19','2018-06-14 18:19:19',1,'search','admin@admin.nl searched at2018-06-14 20:19:19  for user: 8102588','8102588'),(44,'2018-06-14 18:19:23','2018-06-14 18:19:23',1,'search','admin@admin.nl searched at2018-06-14 20:19:23  for user: 8102588','8102588'),(45,'2018-06-14 18:35:23','2018-06-14 18:35:23',1,'search','admin@admin.nl searched at2018-06-14 20:35:23  for user: 8110336','8110336'),(46,'2018-06-14 18:47:43','2018-06-14 18:47:43',1,'search','admin@admin.nl searched at2018-06-14 20:47:43  for user: 8103685','8103685'),(47,'2018-06-14 18:47:45','2018-06-14 18:47:45',1,'search','admin@admin.nl searched at2018-06-14 20:47:45  for user: 8103685','8103685'),(48,'2018-06-14 18:51:38','2018-06-14 18:51:38',2,'logon','vincent_Hoogstra@live.nl logged in at 2018-06-14 20:51:38 from: 127.0.0.1','127.0.0.1'),(49,'2018-06-15 06:11:11','2018-06-15 06:11:11',1,'logon','admin@admin.nl logged in at 2018-06-15 08:11:11 from: 127.0.0.1','127.0.0.1'),(50,'2018-06-15 06:12:36','2018-06-15 06:12:36',1,'search','admin@admin.nl searched at2018-06-15 08:12:36  for user: 8110125','8110125'),(51,'2018-06-15 06:34:17','2018-06-15 06:34:17',1,'search','admin@admin.nl searched at2018-06-15 08:34:17  for user: 3102955','3102955'),(52,'2018-06-23 13:28:51','2018-06-23 13:28:51',1,'logon','admin@admin.nl logged in at 2018-06-23 15:28:51 from: 127.0.0.1','127.0.0.1'),(53,'2018-06-23 13:31:50','2018-06-23 13:31:50',1,'search','admin@admin.nl searched at2018-06-23 15:31:50  for user: 8110125','8110125'),(54,'2018-06-23 13:34:08','2018-06-23 13:34:08',1,'search','admin@admin.nl searched at2018-06-23 15:34:08  for user: 8110125','8110125'),(55,'2018-06-23 13:41:14','2018-06-23 13:41:14',1,'search','admin@admin.nl searched at2018-06-23 15:41:14  for user: 3102955','3102955'),(56,'2018-06-23 13:48:06','2018-06-23 13:48:06',1,'search','admin@admin.nl searched at2018-06-23 15:48:06  for user: 8110125','8110125'),(57,'2018-06-23 13:48:29','2018-06-23 13:48:29',1,'search','admin@admin.nl searched at2018-06-23 15:48:29  for user: 8110125','8110125'),(58,'2018-06-23 13:51:05','2018-06-23 13:51:05',1,'search','admin@admin.nl searched at2018-06-23 15:51:05  for user: 3102955','3102955'),(59,'2018-06-28 10:36:52','2018-06-28 10:36:52',1,'logon','admin@admin.nl logged in at 2018-06-28 12:36:52 from: 127.0.0.1','127.0.0.1'),(60,'2018-06-28 10:39:59','2018-06-28 10:39:59',1,'search','admin@admin.nl searched at2018-06-28 12:39:59  for user: 3102955','3102955'),(61,'2018-06-28 10:40:49','2018-06-28 10:40:49',1,'search','admin@admin.nl searched at2018-06-28 12:40:49  for user: 3102955','3102955'),(62,'2018-06-28 10:42:18','2018-06-28 10:42:18',1,'search','admin@admin.nl searched at2018-06-28 12:42:18  for user: 3102955','3102955'),(63,'2018-06-28 10:43:21','2018-06-28 10:43:21',1,'search','admin@admin.nl searched at2018-06-28 12:43:21  for user: 3102955','3102955'),(64,'2018-06-28 11:17:28','2018-06-28 11:17:28',1,'search','admin@admin.nl searched at2018-06-28 13:17:28  for user: 8113056','8113056'),(65,'2018-06-28 11:44:06','2018-06-28 11:44:06',3,'logon','user@user.nl logged in at 2018-06-28 13:44:06 from: 127.0.0.1','127.0.0.1'),(66,'2018-06-28 12:09:34','2018-06-28 12:09:34',1,'logon','admin@admin.nl logged in at 2018-06-28 14:09:34 from: 127.0.0.1','127.0.0.1'),(67,'2018-06-28 12:20:54','2018-06-28 12:20:54',3,'logon','user@user.nl logged in at 2018-06-28 14:20:54 from: 127.0.0.1','127.0.0.1'),(68,'2018-06-28 12:38:04','2018-06-28 12:38:04',1,'logon','admin@admin.nl logged in at 2018-06-28 14:38:04 from: 127.0.0.1','127.0.0.1'),(69,'2018-06-28 12:38:13','2018-06-28 12:38:13',1,'search','admin@admin.nl searched at2018-06-28 14:38:13  for user: 3102955','3102955'),(70,'2018-06-28 12:38:33','2018-06-28 12:38:33',1,'search','admin@admin.nl searched at2018-06-28 14:38:33  for user: 3102955','3102955'),(71,'2018-06-28 12:46:39','2018-06-28 12:46:39',1,'search','admin@admin.nl searched at2018-06-28 14:46:39  for user: 8110125','8110125'),(72,'2018-06-28 12:46:50','2018-06-28 12:46:50',1,'search','admin@admin.nl searched at2018-06-28 14:46:50  for user: 3103250','3103250'),(73,'2018-06-28 12:46:53','2018-06-28 12:46:53',1,'search','admin@admin.nl searched at2018-06-28 14:46:53  for user: 3103250','3103250');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-28 16:50:19