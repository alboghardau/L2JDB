CREATE DATABASE  IF NOT EXISTS `bogdanh_l2jdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bogdanh_l2jdb`;
-- MySQL dump 10.13  Distrib 5.5.9, for Win32 (x86)
--
-- Host: localhost    Database: bogdanh_l2jdb
-- ------------------------------------------------------
-- Server version	5.1.53-community-log

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
-- Table structure for table `istracker`
--

DROP TABLE IF EXISTS `istracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `istracker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `istracker`
--

LOCK TABLES `istracker` WRITE;
/*!40000 ALTER TABLE `istracker` DISABLE KEYS */;
INSERT INTO `istracker` VALUES (1,'Mobs MOS','Missing drop / spoil for mobs.... Solina Knights / Solina Knights Captain','Bug','Open'),(2,'Java scripts','Javascripts in drop loc application - to be deleted','Bug','Open'),(4,'Sel Mahum','Missing Sel Mahum mobs and their drops in Freya DB','Bug','Open'),(5,'Dropable items','Show in drop loc ( item search ) just the dropable items','Feature','Open'),(6,'Mob weakness','Specify for each mob the classes that kill it easy. Ex low mdef => mage','Feature','Open'),(7,'Mobs page','Add real time selection between drop/spoil/map','Feature','Open'),(8,'Like button','Posible idea: Add like button for mobs , and results returned DESC after this nr of likes.','Feature','Open'),(9,'Recipe','Posible idea: Droploc for all the items in one rec.','Feature','Open'),(10,'DropLoc links','Rewrite all links in drop locator .','Bug','Open'),(11,'Site link','Make www to display all the time','Bug','Open'),(15,'Missing SA','Missing SA name for items ( focus etc )','Bug','Open'),(13,'Quests','Create platform where anyone can upload his guide , and they can vote for the guides.','Feature','Open'),(14,'Cookie for droploc rate','Possible idea: Make cookie based interaction between client/site where the rate is saved for him in a cookie , and when he comes back on site rate is still there.','Bug','Solved');
/*!40000 ALTER TABLE `istracker` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-09-15 12:50:12
