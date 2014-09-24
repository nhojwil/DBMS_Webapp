# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.19)
# Database: sap_db
# Generation Time: 2014-07-16 06:32:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table sap_adhoc_programs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sap_adhoc_programs`;

CREATE TABLE `sap_adhoc_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centre_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `summary` text,
  `description` text,
  `age_group` varchar(50) DEFAULT NULL,
  `min_pax` varchar(45) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `trial` enum('Trial Class','Trial Term') DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  `activities_url` text,
  `min_group_booking` varchar(50) DEFAULT NULL,
  `dates` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`,`centre_id`),
  KEY `fk_sap_adhoc_programs_sap_centres1_idx` (`centre_id`),
  CONSTRAINT `fk_sap_adhoc_programs_sap_centres1` FOREIGN KEY (`centre_id`) REFERENCES `sap_centres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sap_admins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sap_admins`;

CREATE TABLE `sap_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `super` tinyint(1) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `sap_admins` (`id`, `email`, `password`, `super`, `name`, `date_added`, `date_updated`)
VALUES
	(1,'admin@seriousaboutpreschool.com','fb33203e6393991af591a49c3fe4e34e94b93278',1,'Admin','2014-07-06 16:00:00','2014-07-06 16:00:00');

/*!40000 ALTER TABLE `sap_admins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sap_centre_locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sap_centre_locations`;

CREATE TABLE `sap_centre_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centre_id` int(11) NOT NULL,
  `location_name` text,
  `street` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`centre_id`),
  KEY `fk_sap_centre_locations_sap_centres` (`centre_id`),
  CONSTRAINT `fk_sap_centre_locations_sap_centres` FOREIGN KEY (`centre_id`) REFERENCES `sap_centres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sap_centres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sap_centres`;

CREATE TABLE `sap_centres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_user_id` int(11) NOT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `description` text,
  `rating` int(11) DEFAULT NULL COMMENT '	',
  `date_added` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `region` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`,`contact_user_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `slug_id_UNIQUE` (`slug`),
  KEY `fk_sap_centres_sap_users1_idx` (`contact_user_id`),
  CONSTRAINT `fk_sap_centres_sap_users1` FOREIGN KEY (`contact_user_id`) REFERENCES `sap_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# Dump of table sap_standard_programs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sap_standard_programs`;

CREATE TABLE `sap_standard_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centre_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `type` varchar(100) DEFAULT NULL,
  `sp_focus` varchar(100) DEFAULT NULL,
  `age_group` varchar(50) DEFAULT NULL,
  `class_schedule` varchar(100) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `class_duration` varchar(45) DEFAULT NULL,
  `trial` varchar(30) DEFAULT NULL,
  `trial_class_fee` float DEFAULT NULL,
  `trial_class_fee_sap` float DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  `website_address` text,
  `address` text,
  `contact` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`centre_id`),
  KEY `fk_sap_standard_programs_sap_centres1_idx` (`centre_id`),
  CONSTRAINT `fk_sap_standard_programs_sap_centres1` FOREIGN KEY (`centre_id`) REFERENCES `sap_centres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sap_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sap_users`;

CREATE TABLE `sap_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salutation` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
