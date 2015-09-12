-- MySQL dump 10.13  Distrib 5.6.26, for osx10.10 (x86_64)
--
-- Host: localhost    Database: snail_forum
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
-- Table structure for table `snail_forum_board`
--

DROP TABLE IF EXISTS `snail_forum_board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snail_forum_board` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `display_order` smallint(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `count_topic` int(10) unsigned NOT NULL DEFAULT '0',
  `count_post` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL DEFAULT '0',
  `last_topic_id` int(10) unsigned NOT NULL DEFAULT '0',
  `last_topic_title` varchar(50) NOT NULL DEFAULT '',
  `last_post_id` int(11) unsigned NOT NULL DEFAULT '0',
  `last_publish_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最近一次发帖或者回复的时间',
  `col_num` tinyint(4) NOT NULL DEFAULT '1',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `display_order` (`display_order`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `snail_forum_config`
--

DROP TABLE IF EXISTS `snail_forum_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snail_forum_config` (
  `key` varchar(50) NOT NULL DEFAULT '',
  `value` longtext NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `snail_forum_post`
--

DROP TABLE IF EXISTS `snail_forum_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snail_forum_post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `created_at` int(11) unsigned NOT NULL,
  `content` longtext NOT NULL,
  `reply_to` int(10) unsigned NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `snail_forum_topic`
--

DROP TABLE IF EXISTS `snail_forum_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snail_forum_topic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `board_id` int(11) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0',
  `is_top` tinyint(10) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_locked` tinyint(11) NOT NULL DEFAULT '0',
  `author_id` int(10) unsigned NOT NULL,
  `author_username` varchar(255) NOT NULL DEFAULT '',
  `last_post_time` int(11) NOT NULL DEFAULT '0',
  `last_post_user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `last_post_username` varchar(255) NOT NULL DEFAULT '',
  `count_view` int(11) NOT NULL DEFAULT '0',
  `count_post` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `snail_forum_user`
--

DROP TABLE IF EXISTS `snail_forum_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snail_forum_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `credit` int(10) unsigned NOT NULL DEFAULT '0',
  `count_topic` int(10) unsigned NOT NULL DEFAULT '0',
  `count_post` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-12 20:42:37
