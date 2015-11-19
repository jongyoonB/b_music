-- MySQL dump 10.15  Distrib 10.0.17-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: b_music
-- ------------------------------------------------------
-- Server version	10.0.17-MariaDB

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

drop table if exists `b_music`;
create table `b_music`;

use `b_music`;

DROP TABLE IF EXISTS `album_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_info` (
  `code` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `artist_code` int(10) unsigned DEFAULT NULL,
  `release_date` date NOT NULL,
  `image_url` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code`),
  KEY `artist_code` (`artist_code`),
  CONSTRAINT `album_info_ibfk_1` FOREIGN KEY (`artist_code`) REFERENCES `artist` (artist_code) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_info`
--

LOCK TABLES `album_info` WRITE;
/*!40000 ALTER TABLE `album_info` DISABLE KEYS */;
INSERT INTO `album_info` VALUES (20,'20앨범',1,'2015-11-02','이십이미지'),(50,'50앨범',2,'2015-07-08','오십이미지'),(100,'100앨범',1,'2013-11-07','백이미지'),(130,'백삼십앨범',3,'2015-09-03','백삼십이미지');
/*!40000 ALTER TABLE `album_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist` (
  `code` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES (1,'배가연','배가'),(2,'dj_cu','cu'),(3,'しらない','しらない');
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lyric`
--

DROP TABLE IF EXISTS `lyric`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lyric` (
  `code` int(10) unsigned NOT NULL DEFAULT '0',
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code`),
  CONSTRAINT `lyric_ibfk_1` FOREIGN KEY (`code`) REFERENCES `title_info` (title_code) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lyric`
--

LOCK TABLES `lyric` WRITE;
/*!40000 ALTER TABLE `lyric` DISABLE KEYS */;
INSERT INTO `lyric` VALUES (1,'1-lyric'),(2,'2-lyric'),(16,'16-lyric'),(25,'25-lyric'),(152,'152-lyric');
/*!40000 ALTER TABLE `lyric` ENABLE KEYS */;
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
INSERT INTO `member` VALUES ('admin','admin1!','admin@gmail.com','admin','admin',NULL,NULL),('user1','user1!','user1@gmail.com','usr1Nick','free',NULL,NULL),('user2','user2!','user2@hotmail.com','usr2Nick',NULL,NULL,NULL),('user3','user3!','user3@gmail.com','usr3Nick','listen',45,NULL);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `song_list`
--

DROP TABLE IF EXISTS `song_list`;
/*!50001 DROP VIEW IF EXISTS `song_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `song_list` (
  `code` tinyint NOT NULL,
  `곡 명` tinyint NOT NULL,
  `앨범` tinyint NOT NULL,
  `아티스트` tinyint NOT NULL,
  `장르` tinyint NOT NULL,
  `발매 일` tinyint NOT NULL,
  `hits` tinyint NOT NULL,
  `url` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `title_info`
--

DROP TABLE IF EXISTS `title_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `title_info` (
  `code` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `track_num` int(10) unsigned DEFAULT NULL,
  `album_code` int(10) unsigned DEFAULT NULL,
  `genre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hits` int(10) NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code`),
  KEY `album_code` (`album_code`),
  CONSTRAINT `title_info_ibfk_1` FOREIGN KEY (`album_code`) REFERENCES `album_info` (album_code) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `title_info`
--

LOCK TABLES `title_info` WRITE;
/*!40000 ALTER TABLE `title_info` DISABLE KEYS */;
INSERT INTO `title_info` VALUES (21,'이십1',1,20,'k-pop',3,'S.E.S/SES4.5/S.E.S-A%20Song%20For%20You'),(23,'이십3',3,20,'pop',6,'S.E.S/SES4.5/S.E.S-Believe%20In%20Love'),(52,'오십2',2,50,'rock',5,'S.E.S/SES4.5/S.E.S-Love%20Is...Day%20By%20Day'),(100,'백1',1,100,'pop',2,'S.E.S/SES4.5/S.E.S-꿈을%20모아서%20(Just%20In%20Love)'),(130,'백삼십3',3,130,'k-pop',4,'S.E.S/SES4.5/S.E.S-사랑이라는%20이름의%20용기%20(In%20The%20Name%20Of%20Love)');
/*!40000 ALTER TABLE `title_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `top_100`
--

DROP TABLE IF EXISTS `top_100`;
/*!50001 DROP VIEW IF EXISTS `top_100`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `top_100` (
  `code` tinyint NOT NULL,
  `곡 명` tinyint NOT NULL,
  `앨범` tinyint NOT NULL,
  `아티스트` tinyint NOT NULL,
  `장르` tinyint NOT NULL,
  `발매 일` tinyint NOT NULL,
  `hits` tinyint NOT NULL,
  `url` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `song_list`
--

/*!50001 DROP TABLE IF EXISTS `song_list`*/;
/*!50001 DROP VIEW IF EXISTS `song_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`b_admin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `song_list` AS select `title_info`.title_code AS `code`,`title_info`.title_name AS `곡 명`,`album_info`.album_title AS `앨범`,`artist`.artitst_name AS `아티스트`,`title_info`.`genre` AS `장르`,`album_info`.`release_date` AS `발매 일`,`title_info`.`hits` AS `hits`,`title_info`.`url` AS `url` from ((`title_info` join `album_info`) join `artist`) where ((`title_info`.`album_code` = `album_info`.album_code) and (`album_info`.`artist_code` = `artist`.artist_code)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `top_100`
--

/*!50001 DROP TABLE IF EXISTS `top_100`*/;
/*!50001 DROP VIEW IF EXISTS `top_100`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`b_admin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `top_100` AS select `title_info`.title_code AS `code`,`title_info`.title_name AS `곡 명`,`album_info`.album_title AS `앨범`,`artist`.artitst_name AS `아티스트`,`title_info`.`genre` AS `장르`,`album_info`.`release_date` AS `발매 일`,`title_info`.`hits` AS `hits`,`title_info`.`url` AS `url` from ((`title_info` join `album_info`) join `artist`) where ((`title_info`.`album_code` = `album_info`.album_code) and (`album_info`.`artist_code` = `artist`.artist_code)) order by `title_info`.`hits` desc,`title_info`.title_name */;
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

-- Dump completed on 2015-11-09  7:31:02
