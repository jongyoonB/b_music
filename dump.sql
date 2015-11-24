-- MySQL dump 10.13  Distrib 5.6.26, for Win32 (x86)
--
-- Host: localhost    Database: b_music
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `album_info`
--


drop database if exists `b_music`;
create database `b_music`;
use b_music;


DROP TABLE IF EXISTS `album_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_info` (
  `album_code` int(10) unsigned NOT NULL DEFAULT '0',
  `album_title` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `artist_code` int(10) unsigned DEFAULT NULL,
  `release_date` date NOT NULL,
  `art_url` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`album_code`),
  KEY `artist_code` (`artist_code`),
  CONSTRAINT `album_info_ibfk_1` FOREIGN KEY (`artist_code`) REFERENCES `artist` (`artist_code`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_info`
--

LOCK TABLES `album_info` WRITE;
/*!40000 ALTER TABLE `album_info` DISABLE KEYS */;
INSERT INTO `album_info` VALUES (20,'20앨범',1,'2015-11-02','https://www.googledrive.com/host/0B31ARqNh-8RLaGs1Umd0d2pSZXM'),(40,'40앨범',3,'2015-11-10','https://www.googledrive.com/host/0B31ARqNh-8RLaGs1Umd0d2pSZXM'),(50,'50앨범',2,'2015-07-08','https://www.googledrive.com/host/0B31ARqNh-8RLaGs1Umd0d2pSZXM'),(100,'100앨범',1,'2013-11-07','https://www.googledrive.com/host/0B31ARqNh-8RLaGs1Umd0d2pSZXM'),(130,'130앨범',3,'2015-09-03','https://www.googledrive.com/host/0B31ARqNh-8RLbk5oczQyQk9kLTg'),(200,'200앨범',2,'2015-11-08','https://www.googledrive.com/host/0B31ARqNh-8RLbk5oczQyQk9kLTg');
/*!40000 ALTER TABLE `album_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `album_list`
--

DROP TABLE IF EXISTS `album_list`;
/*!50001 DROP VIEW IF EXISTS `album_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `album_list` AS SELECT 
 1 AS `album_code`,
 1 AS `앨범 명`,
 1 AS `아티스트`,
 1 AS `art_url`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist` (
  `artist_code` int(10) unsigned NOT NULL DEFAULT '0',
  `artist_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `artist_info` longtext COLLATE utf8_unicode_ci,
  `artist_image` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`artist_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES (1,'배가연','배가',''),(2,'dj_cu','cu',''),(3,'しらない','しらない','');
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `e_mail` text COLLATE utf8_unicode_ci,
  `nick` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remain_play` int(10) unsigned DEFAULT NULL,
  `ip_add` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('admin','admin1!','admin1@gmail.com','admin','admin',NULL,NULL),('user10','user10!','user10@gmail.com','유저10!','free',NULL,NULL),('user100','user100!','user100@gmail.com','유저100','free',NULL,NULL),('user101','user101!','user101@gmail.com','유저101','free',NULL,NULL),('user102','user102!','user102@gmail.com','유저102','free',NULL,NULL),('user103','user103!','user103@gmail.com','유저103','free',NULL,NULL),('user11','user11!','user11@gmail.com','유저11','free',NULL,NULL),('user12','user12!','user12@gmail.com','유저12','free',NULL,NULL),('user13','user13!','user13@gmail.com','유저13','free',NULL,NULL),('user14','user14!','user14@gmail.com','유저14','free',NULL,NULL),('user15','user15!','user15@gmail.com','유저15','free',NULL,NULL),('user16','user16!','user16@gmail.com','유저16','free',NULL,NULL),('user17','user17!','user17@gmail.com','유저17','free',NULL,NULL),('user18','user18!','user18@gmail.com','유저18','free',NULL,NULL),('user19','user19!','user19@gmail.com','유저19','free',NULL,NULL),('user2','user2!','user2@hotmail.com','usr2Nick','not-paid',NULL,'::1'),('user20','user20!','user20@gmail.com','유저20','free',NULL,NULL),('user21','user21!','user21@gmail.com','유저21','free',NULL,NULL),('user22','user22!','user22@gmail.com','유저22','free',NULL,NULL),('user23','user23!','user23@gmail.com','유저23','free',NULL,NULL),('user24','user24!','user24@gmail.com','유저24','free',NULL,NULL),('user25','user25!','user25@gmail.com','유저25','free',NULL,NULL),('user26','user26!','user26@gmail.com','유저26','free',NULL,NULL),('user27','user27!','user27@gmail.com','유저27','free',NULL,NULL),('user28','user28!','user28@gmail.com','유저28','free',NULL,NULL),('user29','user29!','user29@gmail.com','유저29','free',NULL,NULL),('user3','user3!','user3@gmail.com','usr3Nick','free',NULL,''),('user30','user30!','user30@gmail.com','유저30','free',NULL,NULL),('user31','user31!','user31@gmail.com','유저31','free',NULL,NULL),('user32','user32!','user32@gmail.com','유저32','free',NULL,NULL),('user33','user33!','user33@gmail.com','유저33','free',NULL,NULL),('user34','user34!','user34@gmail.com','유저34','free',NULL,NULL),('user35','user35!','user35@gmail.com','유저35','free',NULL,NULL),('user36','user36!','user36@gmail.com','유저36','free',NULL,NULL),('user37','user37!','user37@gmail.com','유저37','free',NULL,NULL),('user38','user38!','user38@gmail.com','유저38','free',NULL,NULL),('user39','user39!','user39@gmail.com','유저39','free',NULL,NULL),('user4','user4!','user4@gmail.com','유저4',NULL,NULL,NULL),('user40','user40!','user40@gmail.com','유저40','free',NULL,NULL),('user41','user41!','user41@gmail.com','유저41','free',NULL,NULL),('user42','user42!','user42@gmail.com','유저42','free',NULL,NULL),('user43','user43!','user43@gmail.com','유저43','free',NULL,NULL),('user44','user44!','user44@gmail.com','유저44','free',NULL,NULL),('user45','user45!','user45@gmail.com','유저45','free',NULL,NULL),('user46','user46!','user46@gmail.com','유저46','free',NULL,NULL),('user47','user47!','user47@gmail.com','유저47','free',NULL,NULL),('user48','user48!','user48@gmail.com','유저48','free',NULL,NULL),('user49','user49!','user49@gmail.com','유저49','free',NULL,NULL),('user5','user5!','user5@gmail.com','유저5','free',NULL,NULL),('user50','user50!','user50@gmail.com','유저50','free',NULL,NULL),('user51','user51!','user51@gmail.com','유저51','free',NULL,NULL),('user52','user52!','user52@gmail.com','유저52','free',NULL,NULL),('user53','user53!','user53@gmail.com','유저53','free',NULL,NULL),('user54','user54!','user54@gmail.com','유저54','free',NULL,NULL),('user55','user55!','user55@gmail.com','유저55','free',NULL,NULL),('user56','user56!','user56@gmail.com','유저56','free',NULL,NULL),('user57','user57!','user57@gmail.com','유저57','free',NULL,NULL),('user58','user58!','user58@gmail.com','유저58','free',NULL,NULL),('user59','user59!','user59@gmail.com','유저59','free',NULL,NULL),('user6','user6!','user6@gmail.com','유저6','free',NULL,NULL),('user60','user60!','user60@gmail.com','유저60','free',NULL,NULL),('user61','user61!','user61@gmail.com','유저61','free',NULL,NULL),('user62','user62!','user62@gmail.com','유저62','free',NULL,NULL),('user63','user63!','user63@gmail.com','유저63','free',NULL,NULL),('user64','user64!','user64@gmail.com','유저64','free',NULL,NULL),('user65','user65!','user65@gmail.com','유저65','free',NULL,NULL),('user66','user66!','user66@gmail.com','유저66','free',NULL,NULL),('user67','user67!','user67@gmail.com','유저67','free',NULL,NULL),('user68','user68!','user68@gmail.com','유저68','free',NULL,NULL),('user69','user69!','user69@gmail.com','유저69','free',NULL,NULL),('user7','user7!','user7@gmail.com','유저7','free',NULL,NULL),('user70','user70!','user70@gmail.com','유저70','free',NULL,NULL),('user71','user71!','user71@gmail.com','유저71','free',NULL,NULL),('user72','user72!','user72@gmail.com','유저72','free',NULL,NULL),('user73','user73!','user73@gmail.com','유저73','free',NULL,NULL),('user74','user74!','user74@gmail.com','유저74','free',NULL,NULL),('user75','user75!','user75@gmail.com','유저75','free',NULL,NULL),('user76','user76!','user76@gmail.com','유저76','free',NULL,NULL),('user77','user77!','user77@gmail.com','유저77','free',NULL,NULL),('user78','user78!','user78@gmail.com','유저78','free',NULL,NULL),('user79','user79!','user79@gmail.com','유저79','free',NULL,NULL),('user8','user8!','user8@gmail.com','유저8','free',NULL,NULL),('user80','user80!','user80@gmail.com','유저80','free',NULL,NULL),('user81','user81!','user81@gmail.com','유저81','free',NULL,NULL),('user82','user82!','user82@gmail.com','유저82','free',NULL,NULL),('user83','user83!','user83@gmail.com','유저83','free',NULL,NULL),('user84','user84!','user84@gmail.com','유저84','free',NULL,NULL),('user85','user85!','user85@gmail.com','유저85','free',NULL,NULL),('user86','user86!','user86@gmail.com','유저86','free',NULL,NULL),('user87','user87!','user87@gmail.com','유저87','free',NULL,NULL),('user88','user88!','user88@gmail.com','유저88','free',NULL,NULL),('user89','user89!','user89@gmail.com','유저89','free',NULL,NULL),('user9','user9!','user9@gmail.com','유저9','free',NULL,NULL),('user90','user90!','user90@gmail.com','유저90','free',NULL,NULL),('user91','user91!','user91@gmail.com','유저91','free',NULL,NULL);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `song_list`
--

DROP TABLE IF EXISTS `song_list`;
/*!50001 DROP VIEW IF EXISTS `song_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `song_list` AS SELECT 
 1 AS `title_code`,
 1 AS `곡 명`,
 1 AS `앨범`,
 1 AS `album_code`,
 1 AS `아티스트`,
 1 AS `장르`,
 1 AS `발매 일`,
 1 AS `hits`,
 1 AS `url`,
 1 AS `url_short`,
 1 AS `art_url`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `title_info`
--

DROP TABLE IF EXISTS `title_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `title_info` (
  `title_code` int(10) unsigned NOT NULL DEFAULT '0',
  `title_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `track_num` int(10) unsigned DEFAULT NULL,
  `album_code` int(10) unsigned DEFAULT NULL,
  `genre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hits` int(10) NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `url_short` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`title_code`),
  KEY `album_code` (`album_code`),
  CONSTRAINT `title_info_ibfk_1` FOREIGN KEY (`album_code`) REFERENCES `album_info` (`album_code`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `title_info`
--

LOCK TABLES `title_info` WRITE;
/*!40000 ALTER TABLE `title_info` DISABLE KEYS */;
INSERT INTO `title_info` VALUES (1,'일',1,40,'k-pop',5,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(2,'이',2,40,'k-pop',4,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(3,'삼',3,50,'k-pop',3,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(4,'사',4,200,'rock',2,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(5,'오',5,200,'pop',5,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(6,'육',4,130,'pop',6,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(7,'칠',3,40,'pop',8,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(8,'팔',2,200,'dance',1,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(9,'구',1,20,'electronic',9,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(10,'십',5,130,'electronic',4,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(11,'십일',6,50,'dance',5,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(12,'십이',8,20,'dance',6,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(14,'십사',11,130,'pop',12,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(15,'십오',5,20,'pop',11,'https://www.googledrive.com/host/0B31ARqNh-8RLZlZYQXg4U1Bxa0k','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(16,'십육',6,20,'blues',5,'https://www.googledrive.com/host/0B31ARqNh-8RLcVVCLVpyazJRN3M','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(18,'십팔',7,40,'dance',8,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(19,'십구',5,130,'pop',9,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(20,'이십20',20,20,'k-pop',10,'https://www.googledrive.com/host/0B31ARqNh-8RLcVVCLVpyazJRN3M','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(21,'이십1',1,130,'k-pop',3,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(23,'이십3',3,20,'pop',6,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(52,'오십이',2,50,'rock',5,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(125,'백25',2,50,'pop',6,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU'),(130,'백삼십3',3,130,'k-pop',4,'https://www.googledrive.com/host/0B31ARqNh-8RLQUduUmx2UU12cXc','https://www.googledrive.com/host/0B31ARqNh-8RLTUZiQjE4U3VYMFU');
/*!40000 ALTER TABLE `title_info` ENABLE KEYS */;
UNLOCK TABLES;

create view album_list AS
  SELECT album_info.album_code , album_info.album_title '앨범 명', artist.artist_name '아티스트', album_info.art_url from album_info, artist where album_info.artist_code = artist.artist_code;

create view song_list as 
  select title_info.title_code, title_info.title_name as `곡 명`, album_info.album_title as `앨범`, title_info.album_code, artist.artist_name as `아티스트`, title_info.genre as `장르`, album_info.release_date as `발매 일`, title_info.hits, title_info.url, title_info.url_short, album_info.art_url from title_info, album_info, artist where title_info.album_code = album_info.album_code and album_info.artist_code = artist.artist_code;

--
-- Final view structure for view `album_list`
--

/*!50001 DROP VIEW IF EXISTS `album_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `album_list` AS select `album_info`.`album_code` AS `album_code`,`album_info`.`album_title` AS `앨범 명`,`artist`.`artist_name` AS `아티스트`,`album_info`.`art_url` AS `art_url` from (`album_info` join `artist`) where (`album_info`.`artist_code` = `artist`.`artist_code`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `song_list`
--

/*!50001 DROP VIEW IF EXISTS `song_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `song_list` AS select `title_info`.`title_code` AS `title_code`,`title_info`.`title_name` AS `곡 명`,`album_info`.`album_title` AS `앨범`,`title_info`.`album_code` AS `album_code`,`artist`.`artist_name` AS `아티스트`,`title_info`.`genre` AS `장르`,`album_info`.`release_date` AS `발매 일`,`title_info`.`hits` AS `hits`,`title_info`.`url` AS `url`,`title_info`.`url_short` AS `url_short`,`album_info`.`art_url` AS `art_url` from ((`title_info` join `album_info`) join `artist`) where ((`title_info`.`album_code` = `album_info`.`album_code`) and (`album_info`.`artist_code` = `artist`.`artist_code`)) */;
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

-- Dump completed on 2015-11-23 23:29:58
