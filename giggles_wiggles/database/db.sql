-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: giggleswiggles
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `address_type` enum('billing','shipping') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,1,'51713 Botsford Pass','80890','Lake Arvilla','Arizona','billing','2023-12-12 23:44:45','2023-12-12 23:44:45'),(2,2,'843 Leatha Lights','19045','Lake Patricia','Tennessee','billing','2023-12-12 23:44:45','2023-12-12 23:44:45'),(3,3,'3417 White Springs','11696-7865','Legrosfort','Wisconsin','billing','2023-12-12 23:44:45','2023-12-12 23:44:45'),(4,4,'72707 Von Stream Suite 388','62088-0771','Denisview','District of Columbia','billing','2023-12-12 23:44:45','2023-12-12 23:44:45'),(5,5,'63406 Kulas Lakes','38000','Kennethfurt','Kentucky','billing','2023-12-12 23:44:45','2023-12-12 23:44:45'),(6,6,'42341 Cali Stream Suite 627','82498-3277','Haylieland','Oregon','billing','2023-12-12 23:44:45','2023-12-12 23:44:45'),(7,7,'15880 Tremblay Creek','41403','Lake Heatherberg','Oklahoma','billing','2023-12-12 23:44:45','2023-12-12 23:44:45'),(8,8,'530 Bashirian Shoal','01740-1926','Hobarttown','Arkansas','billing','2023-12-12 23:44:45','2023-12-12 23:44:45'),(9,9,'5013 Rath Plaza','11149-2241','New Dario','New Hampshire','billing','2023-12-12 23:44:45','2023-12-12 23:44:45'),(10,10,'94174 Stiedemann Path','81740','Lake Geochester','North Carolina','billing','2023-12-12 23:44:45','2023-12-12 23:44:45'),(11,11,'3481 Garland Fork','96217-2554','Lake Ricardotown','Arkansas','billing','2023-12-12 23:44:45','2023-12-12 23:44:45');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'apparel',NULL,NULL),(2,'furniture',NULL,NULL),(3,'toys',NULL,NULL),(4,'bedding',NULL,NULL),(5,'bathing',NULL,NULL),(6,'gear',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'product_1_image_01.png',1,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(2,'product_1_image_02.png',1,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(3,'product_1_image_03.png',1,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(4,'product_1_image_04.png',1,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(5,'product_1_image_05.png',1,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(6,'product_2_image_01.png',2,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(7,'product_2_image_02.png',2,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(8,'product_2_image_03.png',2,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(9,'product_2_image_04.png',2,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(10,'product_2_image_05.png',2,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(11,'product_3_image_01.png',3,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(12,'product_3_image_02.png',3,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(13,'product_3_image_03.png',3,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(14,'product_3_image_04.png',3,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(15,'product_3_image_05.png',3,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(16,'product_4_image_01.png',4,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(17,'product_4_image_02.png',4,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(18,'product_4_image_03.png',4,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(19,'product_4_image_04.png',4,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(20,'product_4_image_05.png',4,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(21,'product_5_image_01.png',5,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(22,'product_5_image_02.png',5,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(23,'product_5_image_03.png',5,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(24,'product_5_image_04.png',5,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(25,'product_5_image_05.png',5,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(26,'product_6_image_01.png',6,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(27,'product_6_image_02.png',6,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(28,'product_6_image_03.png',6,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(29,'product_6_image_04.png',6,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(30,'product_6_image_05.png',6,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(31,'product_7_image_01.png',7,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(32,'product_7_image_02.png',7,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(33,'product_7_image_03.png',7,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(34,'product_7_image_04.png',7,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(35,'product_7_image_05.png',7,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(36,'product_8_image_01.png',8,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(37,'product_8_image_02.png',8,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(38,'product_8_image_03.png',8,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(39,'product_8_image_04.png',8,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(40,'product_8_image_05.png',8,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(41,'product_9_image_01.png',9,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(42,'product_9_image_02.png',9,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(43,'product_9_image_03.png',9,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(44,'product_9_image_04.png',9,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(45,'product_9_image_05.png',9,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(46,'product_10_image_01.png',10,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(47,'product_10_image_02.png',10,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(48,'product_10_image_03.png',10,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(49,'product_10_image_04.png',10,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(50,'product_10_image_05.png',10,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(51,'product_11_image_01.png',11,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(52,'product_11_image_02.png',11,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(53,'product_11_image_03.png',11,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(54,'product_11_image_04.png',11,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(55,'product_11_image_05.png',11,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(56,'product_12_image_01.png',12,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(57,'product_12_image_02.png',12,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(58,'product_12_image_03.png',12,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(59,'product_12_image_04.png',12,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(60,'product_12_image_05.png',12,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(61,'product_13_image_01.png',13,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(62,'product_13_image_02.png',13,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(63,'product_13_image_03.png',13,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(64,'product_13_image_04.png',13,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(65,'product_13_image_05.png',13,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(66,'product_14_image_01.png',14,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(67,'product_14_image_02.png',14,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(68,'product_14_image_03.png',14,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(69,'product_14_image_04.png',14,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(70,'product_14_image_05.png',14,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(71,'product_15_image_01.png',15,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(72,'product_15_image_02.png',15,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(73,'product_15_image_03.png',15,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(74,'product_15_image_04.png',15,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(75,'product_15_image_05.png',15,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(76,'product_16_image_01.png',16,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(77,'product_16_image_02.png',16,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(78,'product_16_image_03.png',16,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(79,'product_16_image_04.png',16,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(80,'product_16_image_05.png',16,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(81,'product_17_image_01.png',17,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(82,'product_17_image_02.png',17,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(83,'product_17_image_03.png',17,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(84,'product_17_image_04.png',17,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(85,'product_17_image_05.png',17,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(86,'product_18_image_01.png',18,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(87,'product_18_image_02.png',18,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(88,'product_18_image_03.png',18,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(89,'product_18_image_04.png',18,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(90,'product_18_image_05.png',18,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(91,'product_19_image_01.png',19,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(92,'product_19_image_02.png',19,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(93,'product_19_image_03.png',19,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(94,'product_19_image_04.png',19,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(95,'product_19_image_05.png',19,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(96,'product_20_image_01.png',20,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(97,'product_20_image_02.png',20,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(98,'product_20_image_03.png',20,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(99,'product_20_image_04.png',20,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(100,'product_20_image_05.png',20,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(101,'product_21_image_01.png',21,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(102,'product_21_image_02.png',21,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(103,'product_21_image_03.png',21,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(104,'product_21_image_04.png',21,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(105,'product_21_image_05.png',21,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(106,'product_22_image_01.png',22,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(107,'product_22_image_02.png',22,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(108,'product_22_image_03.png',22,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(109,'product_22_image_04.png',22,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(110,'product_22_image_05.png',22,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(111,'product_23_image_01.png',23,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(112,'product_23_image_02.png',23,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(113,'product_23_image_03.png',23,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(114,'product_23_image_04.png',23,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(115,'product_23_image_05.png',23,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(116,'product_24_image_01.png',24,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(117,'product_24_image_02.png',24,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(118,'product_24_image_03.png',24,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(119,'product_24_image_04.png',24,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(120,'product_24_image_05.png',24,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(121,'product_25_image_01.png',25,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(122,'product_25_image_02.png',25,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(123,'product_25_image_03.png',25,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(124,'product_25_image_04.png',25,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(125,'product_25_image_05.png',25,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(126,'product_26_image_01.png',26,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(127,'product_26_image_02.png',26,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(128,'product_26_image_03.png',26,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(129,'product_26_image_04.png',26,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(130,'product_26_image_05.png',26,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(131,'product_27_image_01.png',27,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(132,'product_27_image_02.png',27,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(133,'product_27_image_03.png',27,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(134,'product_27_image_04.png',27,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(135,'product_27_image_05.png',27,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(136,'product_28_image_01.png',28,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(137,'product_28_image_02.png',28,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(138,'product_28_image_03.png',28,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(139,'product_28_image_04.png',28,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(140,'product_28_image_05.png',28,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(141,'product_29_image_01.png',29,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(142,'product_29_image_02.png',29,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(143,'product_29_image_03.png',29,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(144,'product_29_image_04.png',29,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(145,'product_29_image_05.png',29,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(146,'product_30_image_01.png',30,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(147,'product_30_image_02.png',30,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(148,'product_30_image_03.png',30,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(149,'product_30_image_04.png',30,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(150,'product_30_image_05.png',30,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(151,'product_31_image_01.png',31,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(152,'product_31_image_02.png',31,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(153,'product_31_image_03.png',31,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(154,'product_31_image_04.png',31,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(155,'product_31_image_05.png',31,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(156,'product_32_image_01.png',32,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(157,'product_32_image_02.png',32,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(158,'product_32_image_03.png',32,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(159,'product_32_image_04.png',32,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(160,'product_32_image_05.png',32,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(161,'product_33_image_01.png',33,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(162,'product_33_image_02.png',33,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(163,'product_33_image_03.png',33,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(164,'product_33_image_04.png',33,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(165,'product_33_image_05.png',33,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(166,'product_34_image_01.png',34,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(167,'product_34_image_02.png',34,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(168,'product_34_image_03.png',34,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(169,'product_34_image_04.png',34,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(170,'product_34_image_05.png',34,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(171,'product_35_image_01.png',35,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(172,'product_35_image_02.png',35,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(173,'product_35_image_03.png',35,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(174,'product_35_image_04.png',35,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(175,'product_35_image_05.png',35,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(176,'product_36_image_01.png',36,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(177,'product_36_image_02.png',36,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(178,'product_36_image_03.png',36,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(179,'product_36_image_04.png',36,'2023-12-12 23:44:46','2023-12-12 23:44:46'),(180,'product_36_image_05.png',36,'2023-12-12 23:44:46','2023-12-12 23:44:46');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `line_items`
--

DROP TABLE IF EXISTS `line_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `line_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `line_items`
--

LOCK TABLES `line_items` WRITE;
/*!40000 ALTER TABLE `line_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `line_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2023_12_05_162101_create_categories_table',1),(7,'2023_12_05_163507_create_ratings_table',1),(8,'2023_12_05_163827_create_products_table',1),(9,'2023_12_05_165706_create_addresses_table',1),(10,'2023_12_05_170900_create_images_table',1),(11,'2023_12_05_171006_create_line_items_table',1),(12,'2023_12_05_171114_create_orders_table',1),(13,'2023_12_05_171440_create_tax_rates_table',1),(14,'2023_12_05_171557_create_transactions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `pst` double(8,2) NOT NULL,
  `gst` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text NOT NULL,
  `availability` tinyint(4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `gender` enum('M','F','G') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Baby Onesie',1,19.99,'A baby onesie is a must-have for your little one. Our onesie is not only cute but also comfortable, making it perfect for everyday wear. Made with soft and breathable fabric, it ensures your baby stays cozy all day long.',1,100,'G',NULL,NULL),(2,'Toddler Romper',1,24.99,'Dress your toddler in style with our adorable romper. Crafted with attention to detail, it offers both fashion and comfort. Your little one will look charming and feel comfortable whether theyre playing or napping.',1,75,'G',NULL,NULL),(3,'Baby Girl Dress',1,29.99,'Make your baby girl look like a princess with our beautiful dress. This dress is designed to be both elegant and comfy, perfect for special occasions or everyday wear. Your little one will steal the spotlight wherever she goes.',1,60,'F',NULL,NULL),(4,'Baby Boy T-Shirt',1,14.99,'Keep your baby boy cool and stylish in our trendy t-shirt. Made with high-quality materials, its not only fashionable but also durable. Your little man will love wearing it for playtime or outings.',1,80,'M',NULL,NULL),(5,'Newborn Hat and Socks Set',1,9.99,'Ensure your newborn stays warm and cozy with our hat and socks set. Crafted with soft and gentle fabric, it provides comfort and protection for your precious bundle of joy.',1,120,'G',NULL,NULL),(6,'Baby Pajama Set',1,21.99,'Give your baby the gift of a good nights sleep with our comfortable pajama set. Designed for ease and comfort, its perfect for bedtime cuddles and sweet dreams.',1,90,'G',NULL,NULL),(7,'Baby Sun Hat',1,12.99,'Protect your baby from the suns rays with our adorable sun hat. Made with sun-safe materials, its both practical and cute. Your little one will enjoy outdoor adventures while staying shaded.',1,70,'G',NULL,NULL),(8,'Baby Leggings',1,16.99,'Dress your baby in style with our stretchy and stylish leggings. They provide ease of movement and keep your little one looking fashionable. Perfect for any occasion.',1,85,'G',NULL,NULL),(9,'Baby Bodysuit Set',1,32.99,'Our colorful and soft bodysuit set is a must-have for your babys wardrobe. Made with care, these bodysuits offer comfort and convenience for both you and your baby.',1,50,'G',NULL,NULL),(10,'Baby Winter Jacket',1,39.99,'Keep your baby warm and cozy during the winter season with our winter jacket. Designed to provide insulation and protection from the cold, its the perfect outerwear for your little one.',1,45,'G',NULL,NULL),(11,'Baby Crib',2,199.99,'Ensure your babys safety and comfort with our high-quality crib. Made with the utmost care, it provides a secure and peaceful sleeping environment for your precious one.',1,30,'G',NULL,NULL),(12,'Changing Table',2,89.99,'Make diaper changes a breeze with our convenient changing table. Its designed for efficiency and safety, ensuring your baby is comfortable during every diaper change.',1,40,'G',NULL,NULL),(13,'Rocking Chair',2,149.99,'Soothe your baby with our comfortable rocking chair. Its the perfect addition to your nursery, providing a cozy spot for you and your baby to bond.',1,25,'G',NULL,NULL),(14,'Baby Dresser',2,129.99,'Organize your babys clothes and essentials with our spacious dresser. Its designed to keep everything neat and tidy, making it easier for you to care for your baby.',1,35,'G',NULL,NULL),(15,'Baby High Chair',2,79.99,'Enjoy mealtime with your baby using our adjustable high chair. Its designed to provide a safe and comfortable eating experience for your little one.',1,50,'G',NULL,NULL),(16,'Baby Bassinet',2,69.99,'Keep your newborn close and cozy with our portable bassinet. Its perfect for naptime and nighttime sleep, ensuring your baby feels secure.',1,20,'G',NULL,NULL),(17,'Baby Swing',2,59.99,'Entertain and soothe your baby with our fun and soothing swing. Its designed to provide comfort and relaxation for your little one.',1,30,'G',NULL,NULL),(18,'Baby Playpen',2,99.99,'Create a safe space for your baby to explore and play with our secure playpen. Its perfect for keeping your baby engaged and protected.',1,15,'G',NULL,NULL),(19,'Baby Rocking Bassinet',2,79.99,'Soothe your baby with our rocking bassinet featuring music and lights. Its designed to create a calming atmosphere for your little one.',1,25,'G',NULL,NULL),(20,'Baby Wardrobe',2,119.99,'Stay organized with our spacious wardrobe for baby clothes. It offers plenty of storage space for all your babys outfits and accessories.',1,20,'G',NULL,NULL),(21,'Plush Stuffed Animal',3,12.99,'Give your baby a cuddly companion with our soft and lovable stuffed animal toy. Its perfect for snuggles and playtime, providing comfort and companionship.',1,100,'G',NULL,NULL),(22,'Baby Rattle Set',3,9.99,'Stimulate your babys senses with our colorful and noisy rattle set. Its designed to encourage sensory development and provide hours of entertainment.',1,80,'G',NULL,NULL),(23,'Baby Activity Gym',3,29.99,'Promote motor skills development with our interactive play gym. It offers a fun and engaging way for your baby to explore and learn.',1,60,'G',NULL,NULL),(24,'Musical Mobile',3,19.99,'Enhance your babys crib with our musical mobile. It plays soothing melodies and provides visual stimulation for your baby.',1,75,'G',NULL,NULL),(25,'Baby Teething Toy',3,7.99,'Ease your babys teething discomfort with our teething toy. Its designed to provide relief and comfort during this important developmental stage.',1,90,'G',NULL,NULL),(26,'Baby Play Mat',3,24.99,'Encourage tummy time and play with our soft and padded play mat. Its perfect for early developmental activities and exploration.',1,70,'G',NULL,NULL),(27,'Baby Shape Sorter',3,14.99,'Support your babys cognitive development with our educational shape sorter toy. It helps improve problem-solving skills and hand-eye coordination.',1,85,'G',NULL,NULL),(28,'Baby Bath Toys',3,8.99,'Make bath time fun with our floating bath toys. They provide entertainment and stimulation for your baby during their bath.',1,120,'G',NULL,NULL),(29,'Baby Stacking Rings',3,10.99,'Enhance your babys fine motor skills with our stacking rings toy. Its designed to help your baby develop their hand-eye coordination.',1,60,'G',NULL,NULL),(30,'Baby Push Walker',3,29.99,'Assist your baby in taking their first steps with our push walker. It offers support and stability as your baby learns to walk.',1,40,'G',NULL,NULL),(31,'Baby Crib Bedding Set',4,49.99,'Create a cozy and inviting crib environment with our bedding set. It includes everything you need for a comfortable nights sleep for your baby.',1,50,'G',NULL,NULL),(32,'Baby Swaddle Blankets',4,19.99,'Swaddle your newborn in softness with our breathable swaddle blankets. Theyre designed to provide comfort and security for your baby.',1,80,'G',NULL,NULL),(33,'Baby Quilt',4,39.99,'Add warmth and comfort to your babys crib with our quilted blanket. Its perfect for keeping your little one snug during naptime and bedtime.',1,45,'G',NULL,NULL),(34,'Baby Fitted Sheets',4,12.99,'Ensure a secure fit for your babys crib mattress with our fitted sheets. Theyre designed for convenience and safety.',1,70,'G',NULL,NULL),(35,'Baby Sleep Sack',4,17.99,'Provide a safe and cozy sleep environment for your baby with our wearable sleep sack. Its designed to keep your baby comfortable throughout the night.',1,65,'G',NULL,NULL),(36,'Baby Pillow',4,9.99,'Support your infants head and neck with our soft and supportive baby pillow. Its designed for optimal comfort during sleep.',1,100,'G',NULL,NULL),(37,'Baby Bumper Pad',4,14.99,'Protect your baby from crib rails with our bumper pad. It adds a layer of safety to your babys crib.',1,60,'G',NULL,NULL),(38,'Baby Crib Mobile',4,19.99,'Add visual and auditory stimulation to your babys crib with our colorful and stimulating mobile. Its designed to captivate your babys attention.',1,75,'G',NULL,NULL),(39,'Baby Bed Canopy',4,24.99,'Create a dreamy atmosphere in your babys nursery with our bed canopy. It adds a touch of magic to the room.',1,40,'G',NULL,NULL),(40,'Baby Nursery Bedding Set',4,69.99,'Complete your nursery decor with our comprehensive bedding set. It includes crib sheets, blankets, and more to create a cozy and coordinated look.',1,35,'G',NULL,NULL),(41,'Baby Bath Tub',5,29.99,'Make bath time safe and enjoyable with our ergonomic baby bath tub. Its designed to provide a comfortable and secure bathing experience for your baby.',1,50,'G',NULL,NULL),(42,'Baby Hooded Towels',5,12.99,'Wrap your baby in warmth and softness with our absorbent hooded towels. Theyre perfect for post-bath cuddles and keeping your baby cozy.',1,80,'G',NULL,NULL),(43,'Baby Bathrobe',5,16.99,'Keep your baby warm and cozy after bath time with our soft bathrobe. Its designed for comfort and convenience.',1,65,'G',NULL,NULL),(44,'Baby Bath Thermometer',5,9.99,'Ensure your babys bath water is at the perfect temperature with our floating thermometer. It provides peace of mind during bath time.',1,90,'G',NULL,NULL),(45,'Baby Shampoo and Body Wash',5,7.99,'Gently cleanse your babys delicate skin and hair with our tear-free shampoo and body wash. Its designed for the utmost care and gentleness.',1,120,'G',NULL,NULL),(46,'Baby Bath Mat',5,14.99,'Add safety to bath time with our non-slip bath mat. It ensures your babys stability while bathing.',1,70,'G',NULL,NULL),(47,'Baby Bath Seat',5,19.99,'Support your baby during bath time with our bath seat. Its designed to help your baby sit securely.',1,55,'G',NULL,NULL),(48,'Baby Bath Toys Organizer',5,8.99,'Keep bath toys organized and tidy with our mesh organizer. Its perfect for maintaining a clutter-free bath space.',1,100,'G',NULL,NULL),(49,'Baby Bath Spout Cover',5,6.99,'Prevent bumps and bruises during bath time with our soft spout cover. It adds a layer of safety to your babys bath.',1,75,'G',NULL,NULL),(50,'Baby Bath Mittens',5,5.99,'Make bath time gentle and fun with our cute animal-shaped bath mittens. Theyre designed for gentle cleaning.',1,90,'G',NULL,NULL),(51,'Baby Stroller',6,149.99,'Stay on the move with your baby using our lightweight and easy-to-fold stroller. It offers convenience and comfort for both you and your little one.',1,40,'G',NULL,NULL),(52,'Baby Diaper Bag',6,49.99,'Stay organized and stylish with our spacious diaper bag. It features multiple compartments for all your babys essentials.',1,60,'G',NULL,NULL),(53,'Baby Car Seat',6,99.99,'Ensure your babys safety during car rides with our comfortable and secure car seat. Its designed for infants and provides peace of mind.',1,35,'G',NULL,NULL),(54,'Baby Carrier',6,39.99,'Experience hands-free mobility with our ergonomic baby carrier. Its designed for comfort and convenience, allowing you to keep your baby close.',1,50,'G',NULL,NULL),(55,'Baby Playpen',6,69.99,'Create a safe space for your baby to explore and play with our secure playpen. Its perfect for keeping your baby engaged and protected.',1,30,'G',NULL,NULL),(56,'Baby Monitor',6,79.99,'Keep an eye on your baby with our video baby monitor. It provides real-time monitoring and peace of mind.',1,45,'G',NULL,NULL),(57,'Baby Bouncer',6,29.99,'Keep your baby entertained and comfortable with our bouncing seat. Its perfect for playtime and relaxation.',1,55,'G',NULL,NULL),(58,'Baby Travel Cot',6,59.99,'Ensure your baby has a comfortable sleeping arrangement while traveling with our portable travel cot. Its designed for on-the-go parents.',1,25,'G',NULL,NULL),(59,'Baby High Chair',6,49.99,'Enjoy mealtime with your baby using our adjustable high chair. Its designed to provide a safe and comfortable eating experience for your little one.',1,40,'G',NULL,NULL),(60,'Baby Backpack',6,34.99,'Stay on the move with our backpack-style diaper bag designed for parents who are always on the go. It combines style and functionality for busy families.',1,70,'G',NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_rates`
--

DROP TABLE IF EXISTS `tax_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tax_rates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `province` varchar(255) NOT NULL,
  `pst` decimal(10,5) NOT NULL,
  `gst` decimal(10,5) NOT NULL,
  `hst` decimal(10,5) NOT NULL,
  `value_added` decimal(10,5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_rates`
--

LOCK TABLES `tax_rates` WRITE;
/*!40000 ALTER TABLE `tax_rates` DISABLE KEYS */;
INSERT INTO `tax_rates` VALUES (1,'Alberta',0.00000,0.05000,0.00000,0.05000,NULL,NULL),(2,'British Columbia',0.07000,0.05000,0.00000,0.12000,NULL,NULL),(3,'Manitoba',0.07000,0.05000,0.00000,0.12000,NULL,NULL),(4,'New Brunswick',0.00000,0.00000,0.15000,0.15000,NULL,NULL),(5,'Newfoundland and Labrador',0.00000,0.00000,0.15000,0.15000,NULL,NULL),(6,'Northwest Territories',0.00000,0.05000,0.00000,0.05000,NULL,NULL),(7,'Nova Scotia',0.00000,0.00000,0.15000,0.15000,NULL,NULL),(8,'Nunavut',0.00000,0.05000,0.00000,0.05000,NULL,NULL),(9,'Ontario',0.00000,0.00000,0.13000,0.13000,NULL,NULL),(10,'Prince Edward Island',0.00000,0.00000,0.15000,0.15000,NULL,NULL),(11,'Quebec',0.09975,0.05000,0.00000,0.14975,NULL,NULL),(12,'Saskatchewan',0.06000,0.05000,0.00000,0.11000,NULL,NULL),(13,'Yukon',0.00000,0.05000,0.00000,0.05000,NULL,NULL);
/*!40000 ALTER TABLE `tax_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','User','admin@admin.com','yCSyQl15LW',NULL,1,'$2y$12$Vi71hcm4c4jh5PZpBSV3mOOJdlVTTL.CAlSkEEasQqFBkT4fhGMsC','2023-12-12 23:44:45','2023-12-12 23:44:45'),(2,'Kiarra','Morar','fadel.nathan@example.com','xyy0g7rcq5',NULL,0,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','2023-12-12 23:44:45','2023-12-12 23:44:45'),(3,'Lenora','Wilderman','sven54@example.org','1B5iVjOwv7',NULL,0,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','2023-12-12 23:44:45','2023-12-12 23:44:45'),(4,'Karolann','Schultz','gino82@example.net','SzzMwBeG3A',NULL,0,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','2023-12-12 23:44:45','2023-12-12 23:44:45'),(5,'Desiree','Legros','hammes.lester@example.net','ucQL8nS8IH',NULL,0,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','2023-12-12 23:44:45','2023-12-12 23:44:45'),(6,'Tyreek','Pfeffer','kleannon@example.net','OyT35odBby',NULL,0,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','2023-12-12 23:44:45','2023-12-12 23:44:45'),(7,'Fermin','Champlin','schneider.mariane@example.net','GcYE2jOPtJ',NULL,0,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','2023-12-12 23:44:45','2023-12-12 23:44:45'),(8,'Carmella','Hahn','mwuckert@example.com','RUStZH0t99',NULL,0,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','2023-12-12 23:44:45','2023-12-12 23:44:45'),(9,'Ewell','Schultz','reilly.eldridge@example.net','zYgyIQmkyX',NULL,0,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','2023-12-12 23:44:45','2023-12-12 23:44:45'),(10,'Kaley','Dooley','allan.thiel@example.com','oujuX1D7oL',NULL,0,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','2023-12-12 23:44:45','2023-12-12 23:44:45'),(11,'Annabell','Kertzmann','adella.adams@example.com','4lpdkEJ8kX',NULL,0,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','2023-12-12 23:44:45','2023-12-12 23:44:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-12 11:49:03
