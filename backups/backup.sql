/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.8.6-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: arborist_tre
-- ------------------------------------------------------
-- Server version	11.8.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tree_type` varchar(255) DEFAULT NULL,
  `tree_height` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `location_area` varchar(255) DEFAULT NULL,
  `access_level` varchar(255) DEFAULT NULL,
  `hazards` text DEFAULT NULL,
  `urgency` varchar(255) DEFAULT NULL,
  `photos` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` VALUES
(1,'asdfghjkl','assistant@communitylink.com','WRJLVHEDFJN','DFGHJ','2026-03-23 10:36:55',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,'asf','fsf@gmail.com','12e','sdfsdcsdv','2026-03-24 02:06:43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(3,'Jawlan Mahmut','jmai0017@student.monash.edu','wevrverf','rveerver','2026-03-24 02:12:30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(4,'asdfghjkl;','jmai0017@student.monash.edu','asc','acdc','2026-03-24 02:25:43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(5,'Jawlan Mahmut','jmai0017@student.monash.edu','dvcefve','vefvefve','2026-03-24 02:28:20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(6,'Jawlan Mahmut','jmai0017@student.monash.edu','evwvw','wevwevw','2026-03-24 02:30:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(8,' ','a@gmail.com',' ','afasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjhafasdfasdffffffffsdfasdfkjahklsdfkhalksdflhjasdfkjhaksdfljhalksdfhalksdfhlkjh','2026-03-25 22:00:18',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(9,'Maihemuti Jiewulan','jawlan.mahmut@gmail.com','vv','vefve','2026-04-19 21:16:50',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(10,'Maihemuti Jiewulan','jawlan.mahmut@gmail.com','fvvfd','dfvdf','2026-04-19 21:31:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(11,'Maihemuti Jiewulan','jmai0017@student.monash.edu','2fvefve','ververbveb','2026-04-19 21:32:53',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(12,'Maihemuti Jiewulan','jawlan.mahmut@gmail.com','efvefv','vrvr','2026-04-19 21:41:45','0493758068','560, Lonsdale St.','tvrtvbrtb','rtbrtb','Pruning / Trimming','Front Yard','Good Access (vehicle can enter)','[\"Fence\"]','Normal','[\"uploads\\/photos\\/1776634905_\\u4eea\\u8868\\u677f 1.png\"]','uploads/videos/1776634905_D7771934fc97eafb20eb43e37eed0ca4.mp4');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `employee_services`
--

DROP TABLE IF EXISTS `employee_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_services` (
  `employee_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`,`service_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `employee_services_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employee_services_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_services`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `employee_services` WRITE;
/*!40000 ALTER TABLE `employee_services` DISABLE KEYS */;
INSERT INTO `employee_services` VALUES
(1,1),
(3,1),
(4,1),
(5,1),
(1,2),
(2,2),
(5,2),
(1,3),
(2,3),
(3,3);
/*!40000 ALTER TABLE `employee_services` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_time` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES
(1,'James Carter','james.carter@arborist.com','0411 111 111','active','2026-03-22 19:11:40','2026-03-22 19:11:40'),
(2,'Priya Nair','priya.nair@arborist.com','0422 222 222','active','2026-03-22 19:11:40','2026-03-22 19:11:40'),
(3,'Tom Brennan','tom.brennan@arborist.com','0433 333 333','active','2026-03-22 19:11:40','2026-03-22 19:11:40'),
(4,'Sarah Okafor','sarah.okafor@arborist.com','0444 444 444','active','2026-03-22 19:11:40','2026-03-22 19:11:40'),
(5,'Liam Hutchins','liam.hutchins@arborist.com','0455 555 555','active','2026-03-22 19:11:40','2026-03-22 19:11:40');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `status` enum('available','broken') DEFAULT 'available',
  `created_time` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` VALUES
(1,'Chainsaw','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(2,'Chainsaw','broken','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(3,'Chainsaw','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(4,'Wood Chipper','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(5,'Wood Chipper','broken','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(6,'Stump Grinder','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(7,'Stump Grinder','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(8,'Climbing Gear','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(9,'Climbing Gear','broken','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(10,'Climbing Gear','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(11,'Truck','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(12,'Truck','broken','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(13,'Truck','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(14,'Rope Kit','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(15,'Rope Kit','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(16,'Rope Kit','broken','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(17,'Safety Helmet','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(18,'Safety Helmet','available','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(19,'Leaf Blower','broken','2026-04-21 13:46:48','2026-04-21 13:46:48'),
(20,'Leaf Blower','available','2026-04-21 13:46:48','2026-04-21 13:46:48');
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `quote_visits`
--

DROP TABLE IF EXISTS `quote_visits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `quote_visits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_quote_enquiry` (`enquiry_id`),
  KEY `fk_quote_staff` (`staff_id`),
  CONSTRAINT `fk_quote_enquiry` FOREIGN KEY (`enquiry_id`) REFERENCES `contact_messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_quote_staff` FOREIGN KEY (`staff_id`) REFERENCES `employees` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quote_visits`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `quote_visits` WRITE;
/*!40000 ALTER TABLE `quote_visits` DISABLE KEYS */;
INSERT INTO `quote_visits` VALUES
(1,1,2,'2026-04-30','13:27:38','public_html/team102-onboarding-project-main/app','2026-04-21 03:25:50','2026-04-21 03:25:50'),
(2,1,1,'2026-04-02','17:46:54','asdfghjkl','2026-04-21 19:43:55','2026-04-21 19:43:55');
/*!40000 ALTER TABLE `quote_visits` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES
(1,'Tree Removal'),
(2,'Pruning & Trimming'),
(3,'Health Care');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `shift_allocations`
--

DROP TABLE IF EXISTS `shift_allocations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `shift_allocations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` enum('assigned','confirmed','cancelled') DEFAULT 'assigned',
  `created_time` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_allocation` (`shift_id`,`employee_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `shift_allocations_ibfk_1` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `shift_allocations_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shift_allocations`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `shift_allocations` WRITE;
/*!40000 ALTER TABLE `shift_allocations` DISABLE KEYS */;
INSERT INTO `shift_allocations` VALUES
(1,6,1,'assigned','2026-04-21 18:40:12'),
(2,7,1,'assigned','2026-04-21 18:40:43'),
(3,8,1,'assigned','2026-04-21 20:08:16');
/*!40000 ALTER TABLE `shift_allocations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `shifts`
--

DROP TABLE IF EXISTS `shifts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `shifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_date` date NOT NULL,
  `shift_type` enum('Morning','Afternoon','Full Day') DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `shifts_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shifts`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `shifts` WRITE;
/*!40000 ALTER TABLE `shifts` DISABLE KEYS */;
INSERT INTO `shifts` VALUES
(1,'2026-03-23','Morning','06:00:00','12:00:00',2,'Brighton','Crown pruning — council job','2026-03-22 19:11:40'),
(2,'2026-03-23','Afternoon','12:00:00','18:00:00',3,'Brighton','Post-prune health treatment','2026-03-22 19:11:40'),
(3,'2026-03-24','Full Day','06:00:00','18:00:00',1,'Hawthorn','Large gum tree removal','2026-03-22 19:11:40'),
(6,'2026-05-02','Morning','04:32:16','04:32:20',2,'b','hhh','2026-04-21 18:40:12'),
(7,'2026-04-24','Afternoon','04:43:33','16:41:32',2,'b','eve','2026-04-21 18:40:43'),
(8,'2026-04-10','Afternoon','06:10:00','06:10:01',2,'public_html/team102-onboarding-project-main/app','vvfvfvd','2026-04-21 20:08:16');
/*!40000 ALTER TABLE `shifts` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `shifts_equipment`
--

DROP TABLE IF EXISTS `shifts_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `shifts_equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `shift_id` (`shift_id`),
  KEY `equipment_id` (`equipment_id`),
  CONSTRAINT `shifts_equipment_ibfk_1` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`),
  CONSTRAINT `shifts_equipment_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shifts_equipment`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `shifts_equipment` WRITE;
/*!40000 ALTER TABLE `shifts_equipment` DISABLE KEYS */;
INSERT INTO `shifts_equipment` VALUES
(1,8,3,'2026-04-21 20:08:16','2026-04-21 20:08:16'),
(2,8,20,'2026-04-21 20:08:16','2026-04-21 20:08:16');
/*!40000 ALTER TABLE `shifts_equipment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expires` datetime DEFAULT NULL,
  `role` varchar(50) DEFAULT 'admin',
  `created_time` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `employee_id` int(11) DEFAULT NULL,
  `failed_attempts` int(11) DEFAULT 0,
  `last_failed_attempt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'admin','admin@example.com','$2a$12$j/IDjNyowwtBg4pJZFVwu.Irx8RX1.r5.A0UOwXPyRlbU02wtsgD6','dc17e4b03429ea6242575d6b06367812be7b7afcff9b06319946ad4343cd4daf','2026-03-23 20:46:40','admin','2026-03-22 19:11:40','2026-03-23 08:46:40',NULL,0,NULL),
(2,'James Carter','jamescarter@example.com','$2a$12$S0vIquN3CtHoohakr/ZtH.YQU1D9kaQGXu.39PnsoUQFTZcfR05.y',NULL,NULL,'employee','2026-04-21 16:23:38','2026-04-22 05:04:15',1,0,NULL),
(19,'jw','jawlan.mahmut@gmail.com','$2y$12$ecdZc7fsHSwozCyibPbV.eeLDefpu4wx/hmuvw7sT.h1jMXgRZxXO','$2y$12$cmgk9c5j5A10sJJViX76Y.FZ088mboeKY/4RMazsXbdR9fVhreKfi','2026-03-24 14:32:55','admin','2026-03-22 23:58:49','2026-03-24 02:32:55',NULL,0,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-04-22 16:57:37
