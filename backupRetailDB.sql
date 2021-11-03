-- MySQL dump 10.16  Distrib 10.2.19-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: galloRetailDB
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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `order_cc` varchar(255) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_phone` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`,`email`),
  KEY `name` (`order_name`),
  KEY `order_date` (`order_date`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (9,'2018-12-08 05:29:25','Mary Todd','mary@gmail.com','$1$9LXXhrS0$CDbtb85S6d889RcnDE2Xd1','555 Main St, Los Angeles, CA 90048','555-555-5555'),(11,'2018-12-10 04:29:28','Mary Todd','mary@gmail.com','$1$O.8TWF/k$2C.Ufo4A5Cft/aYsm9BN11','555 Main St., Los Angeles, CA 90048','555-555-5555'),(12,'2018-12-12 16:52:26','Mary Todd','mary@gmail.com','$1$vf.G6TII$Mno72jyIXYKdRJaJcuEeG0','555 Main St., Los Angeles, CA 90048','555-555-5555');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_items` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_items`
--

LOCK TABLES `orders_items` WRITE;
/*!40000 ALTER TABLE `orders_items` DISABLE KEYS */;
INSERT INTO `orders_items` VALUES (9,12,2),(9,15,1),(9,18,3),(9,20,1),(9,23,1),(11,19,1),(11,20,2),(12,15,1),(12,20,1);
/*!40000 ALTER TABLE `orders_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `product_category` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `name` (`product_name`),
  KEY `category` (`product_category`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Duck Foie Gras – Micuit','DuckFoieGras.jpg','A specialty creation made from the best duck foie gras, delicately crafted by French brand Rougie.',98.25,'specialty'),(2,'Balsamic Vinegar Of Reggio Emilia Silver Seal','BalsamicVinegar.jpg','One of the rarest Balsamics, this vinegar has been aged in barrels for over 50 years.',157.50,'specialty'),(3,'Special Reserve Russian Osetra Caviar - Malossol, Farm Raised','Caviar.jpg','This exceptional caviar delivers the glossiest, largest and most flavorful eggs, of superb quality.',181.25,'specialty'),(4,'Royal Mustard with Cognac','Mustard.jpg','A luxurious medium-grain French mustard flavored with cognac, this is perfect to add to roasted meats and on sandwiches',31.75,'specialty'),(5,'Hawaiian Black Lava Sea Salt – Coarse','BlackSalt.jpg','Premium sea salt from Hawaii mixed with Coconut shell charcoal.',21.00,'specialty'),(6,'Pont L\'Eveque AOC','PontCheese.jpg','An AOC controlled cheese, Pont L\'Eveque\'s manufacture is bound to strict quality control and very particular processes.',12.25,'cheese'),(7,'Camembert Le Bocage','Camembert.jpg','A lush, creamy and buttery cow\'s milk cheese, this Camembert from Normandy has a mild flavor that finishes smoothly on the palate.',7.75,'cheese'),(8,'Brie De Meaux – 50%','Brie.jpg','Arguably the most popular of French cheeses, this Brie has a velvety taste and bears the AOC standard, undisputable mark of quality.',131.75,'cheese'),(9,'Fresh Smoked Mozzarella','SmokedMozzarella.jpg','Fresh smoked mozzarella made from scratch in an Italian market, smoked to enhance its natural flavor',7.75,'cheese'),(10,'Fiscalini 18 Month Farmstead Cheddar','Cheddar.jpg','A delicious extra mature cheddar cheese from California.',28.25,'cheese'),(11,'Shropshire Blue Cheese','BlueCheese.jpg','A sharp blue cheese similar to Stilton.',23.25,'cheese'),(12,'Wagyu Beef Rib Eye Steaks MS5/6','RibEye.jpg','From Australia by Greg Norman Signature',53.75,'meat'),(13,'Whole Rabbit','Rabbit.jpg','From United States by Pel-Freez',39.00,'meat'),(14,'Prosciutto Di Parma – Sliced','Prosciutto.jpg','From Italy by Vill Antica',17.50,'meat'),(15,'Saucisson Sec Sausage','Sausage.jpg','From United States by Terroirs d\'Antan',22.75,'meat'),(16,'Sakura Duroc Pork 8-Bone Rack','Pork.jpg','A generously-sized rib rack with exceptional meat quality, from Midwest-raised Sakura pigs.',98.50,'meat'),(17,'Lamb 7-8 Frenched Rib Racks, Frozen','Lamb.jpg','Our deliciously juicy and tender New Zealand grass-fed rack of lamb has a showstopping Frenched bone.',38.00,'meat'),(18,'French Almond Macaroons','Macaroons.jpg','Light and airy cloud-like cookies made with almond flour and filled with unexpected flavors.',9.25,'snack'),(19,'French Opera Cake – Frozen','OperaCake.jpg','A soft and spongy cookie sandwich filled with buttery cream and covered with chocolate ganache.',49.00,'snack'),(20,'Spanish Marcona Almonds - Fried and Salted','Almonds.jpg','Totally natural, totally sweet, these Marcona almonds are lightly fried in oil and salted.',23.50,'snack'),(21,'100% Butter French Curved Croissants - 3.5 oz, Unbaked','Croissants.jpg','Shapely shells of golden pastry, these croissants are filled with all the warmth of a French patisserie.',49.75,'snack'),(22,'Pain au Chocolat','ChocolateCroissant.jpg','Flaky, buttery and indulgent chocolate-filled French croissants at home!',142.25,'snack'),(23,'Fig and Almond Cake','Cake.jpg','A traditional, all-natural Spanish treat of sweet sun-dried Spanish figs pressed with plump almonds to serve with cheese.',3.25,'snack'),(24,'Anova Sous Vide','SousVide.jpg','Precision cooker heats and circulates water in your pot, evenly cooking food to a precise internal temperature',214.95,'tool'),(25,'Shun Kaji 11-Piece Knife Block Set','KnifeSet.jpg','Inspired by centuries-old samurai sword–making techniques, the blades’ construction creates a supersharp cutting edge.',2372.00,'tool'),(26,'Antonini Olivewood Cheese Knives Set','CheeseKnife.jpg','Handles are carved from aged olivewood, a Mediterranean hardwood prized for its rich coloration and intricate grain.',59.95,'tool');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userid` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` datetime NOT NULL,
  `user_level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Eugene','Mondkar','eugene@gmail.com','$2y$10$5bKUvK1X7vadv/ZQAI2DO.BbSHtLZM/E9OVW3h7wOhxbuh.XG19/e','2018-11-18 00:04:15',1),(5,'Mary','Todd','mary@gmail.com','$2y$10$EbqWEudA488TLt49vSokr.x4c.7qwUveBNFeNTCUzl/UqF20mYij.','2018-12-05 14:22:15',0);
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

-- Dump completed on 2018-12-12 16:57:24
