-- MySQL dump 10.16  Distrib 10.2.19-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: galloPortalDB
-- ------------------------------------------------------
-- Server version	10.2.19-MariaDB

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_unique` (`cat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Inventory','Inventory issues are addressed here'),(3,'Work Schedule','Fill in requests and other schedule related topics'),(4,'Customer Feedback','Topics dealing with customer feedback and service');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `empID` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `empUN` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` datetime NOT NULL,
  `user_level` tinyint(1) unsigned NOT NULL,
  `pay_rate` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`empID`),
  KEY `user_name` (`empUN`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (3,'Eugene','Mondkar','eugene','$2y$10$96KsccCpPnBAdW/UqKTA.OLz3nYHvjEIbtSK/2BCxKkDdvqfb0Sre','2018-12-11 04:51:36',3,99.99),(5,'Tom','Jones','tjones','$2y$10$s77Q6MrK/3PsyCjxdElodOXbgBPkNozPMUGGxeTjqB8b9HeKZow66','2018-12-11 06:13:23',2,17.99),(6,'Sarah','Huckabee','shuckabee','$2y$10$hpveKncFwa4A2iWiuPl1/eYjSwbnkOQIAQUS.OF8NoqBbxBmzAYO.','2018-12-11 12:33:30',2,21.00),(7,'Matt','LeBlanc','mleblanc','$2y$10$p2I1EDIMa6ytH1.1rL8z6eGXvBNdB4uPVUoLxjbreSA4BOED.kjFS','2018-12-11 12:34:59',2,15.00);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Spoke to the vendor today and he informed me a shipment was coming in next week. In the meantime let customers know that we will have more soon.','2018-12-12 05:41:30',1,3),(2,'The vendor promised us that we would have it by the end of this week. He seems to have extended the timeline. We should follow up.','2018-12-12 05:41:30',1,6),(3,'Hey Tom, I should be able to cover you this Thursday. Do you mind covering my shift Monday next week?','2018-12-12 05:45:09',2,6),(4,'No problem, Sarah. I got you covered for Monday. Thanks for Thursday.','2018-12-12 05:45:09',2,5),(6,'Great, make sure to get a written confirmation either through an email or text exchange along with a price list and a promise to deliver. ','2018-12-12 13:15:52',4,3),(7,'Let me know what you guys finally agree to. ','2018-12-12 13:20:13',2,3),(8,'I will let the vendor know and ask them to send more','2018-12-12 14:04:57',8,5),(10,'Mary Todd\'s last order was missing the printout of the invoice. We need to make sure to include it. ','2018-12-12 14:50:38',11,3);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timesheet`
--

DROP TABLE IF EXISTS `timesheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timesheet` (
  `shiftNum` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `empID` mediumint(6) unsigned NOT NULL,
  `start_time` decimal(10,2) NOT NULL DEFAULT 0.00,
  `end_time` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shift_date` varchar(255) NOT NULL,
  `num_hours` decimal(10,2) NOT NULL DEFAULT 0.00,
  `approval` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`shiftNum`),
  KEY `employee_id` (`empID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timesheet`
--

LOCK TABLES `timesheet` WRITE;
/*!40000 ALTER TABLE `timesheet` DISABLE KEYS */;
INSERT INTO `timesheet` VALUES (20,6,9.00,5.00,'2018-12-12',8.00,'Approved',168.00),(21,6,10.00,5.00,'2018-12-13',7.00,'Approved',147.00),(22,6,11.00,5.00,'2018-12-14',6.00,'Needs Approval',126.00),(23,5,9.00,5.00,'2018-12-12',8.00,'Approved',143.92),(24,5,10.00,9.00,'2018-12-14',11.00,'Needs Approval',197.89),(25,7,5.00,11.00,'2018-12-12',6.00,'Approved',90.00),(26,7,5.00,11.00,'2018-12-13',6.00,'Approved',90.00),(27,7,5.00,11.00,'2018-12-14',6.00,'Needs Approval',90.00);
/*!40000 ALTER TABLE `timesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL AUTO_INCREMENT,
  `topic_subject` text NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_cat` (`topic_cat`),
  CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'We need more foie gras','2018-12-12 04:37:04',1,3),(2,'I need a fill in for Thursday afternoon shift','2018-12-12 04:39:15',3,5),(3,'We need more cheese suppliers','2018-12-12 06:39:30',1,3),(4,'Meat supplier willing to deliver more rabbit ','2018-12-12 06:47:11',1,5),(8,'Mary Todd really loved the Rabbit she got','2018-12-12 14:03:19',4,3),(11,'Mary Todd last order missing invoice printout','2018-12-12 14:48:14',4,3);
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-12 16:58:49
