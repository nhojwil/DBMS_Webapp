-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2014 at 07:08 PM
-- Server version: 5.6.19
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sap_db`
--
CREATE DATABASE IF NOT EXISTS `sap_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sap_db`;

-- --------------------------------------------------------

--
-- Table structure for table `sap_adhoc_programs`
--

DROP TABLE IF EXISTS `sap_adhoc_programs`;
CREATE TABLE IF NOT EXISTS `sap_adhoc_programs` (
`id` int(11) NOT NULL,
  `centre_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `summary` text,
  `description` text,
  `age_group` varchar(50) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `min_pax` varchar(45) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `trial` enum('Trial Class','Trial Term') DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  `activities_url` text,
  `min_group_booking` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Table structure for table `sap_admins`
--

DROP TABLE IF EXISTS `sap_admins`;
CREATE TABLE IF NOT EXISTS `sap_admins` (
`id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `super` tinyint(1) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `sap_centres`
--

DROP TABLE IF EXISTS `sap_centres`;
CREATE TABLE IF NOT EXISTS `sap_centres` (
`id` int(11) NOT NULL,
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
  `filename` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

-- --------------------------------------------------------

--
-- Table structure for table `sap_centre_locations`
--

DROP TABLE IF EXISTS `sap_centre_locations`;
CREATE TABLE IF NOT EXISTS `sap_centre_locations` (
`id` int(11) NOT NULL,
  `centre_id` int(11) NOT NULL,
  `location_name` text,
  `street` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

--
-- Table structure for table `sap_program_locations`
--

DROP TABLE IF EXISTS `sap_program_locations`;
CREATE TABLE IF NOT EXISTS `sap_program_locations` (
  `centre_location_id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `program_type` enum('Standard','Adhoc') DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sap_standard_programs`
--

DROP TABLE IF EXISTS `sap_standard_programs`;
CREATE TABLE IF NOT EXISTS `sap_standard_programs` (
`id` int(11) NOT NULL,
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
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

-- --------------------------------------------------------

--
-- Table structure for table `sap_users`
--

DROP TABLE IF EXISTS `sap_users`;
CREATE TABLE IF NOT EXISTS `sap_users` (
`id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salutation` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sap_adhoc_programs`
--
ALTER TABLE `sap_adhoc_programs`
 ADD PRIMARY KEY (`id`,`centre_id`), ADD KEY `fk_sap_adhoc_programs_sap_centres1_idx` (`centre_id`);

--
-- Indexes for table `sap_admins`
--
ALTER TABLE `sap_admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sap_centres`
--
ALTER TABLE `sap_centres`
 ADD PRIMARY KEY (`id`,`contact_user_id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD UNIQUE KEY `slug_id_UNIQUE` (`slug`), ADD KEY `fk_sap_centres_sap_users1_idx` (`contact_user_id`);

--
-- Indexes for table `sap_centre_locations`
--
ALTER TABLE `sap_centre_locations`
 ADD PRIMARY KEY (`id`,`centre_id`), ADD KEY `fk_sap_centre_locations_sap_centres` (`centre_id`);

--
-- Indexes for table `sap_program_locations`
--
ALTER TABLE `sap_program_locations`
 ADD PRIMARY KEY (`centre_location_id`);

--
-- Indexes for table `sap_standard_programs`
--
ALTER TABLE `sap_standard_programs`
 ADD PRIMARY KEY (`id`,`centre_id`), ADD KEY `fk_sap_standard_programs_sap_centres1_idx` (`centre_id`);

--
-- Indexes for table `sap_users`
--
ALTER TABLE `sap_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sap_adhoc_programs`
--
ALTER TABLE `sap_adhoc_programs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `sap_admins`
--
ALTER TABLE `sap_admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sap_centres`
--
ALTER TABLE `sap_centres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `sap_centre_locations`
--
ALTER TABLE `sap_centre_locations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `sap_standard_programs`
--
ALTER TABLE `sap_standard_programs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `sap_users`
--
ALTER TABLE `sap_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sap_adhoc_programs`
--
ALTER TABLE `sap_adhoc_programs`
ADD CONSTRAINT `fk_sap_adhoc_programs_sap_centres1` FOREIGN KEY (`centre_id`) REFERENCES `sap_centres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sap_centres`
--
ALTER TABLE `sap_centres`
ADD CONSTRAINT `fk_sap_centres_sap_users1` FOREIGN KEY (`contact_user_id`) REFERENCES `sap_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sap_centre_locations`
--
ALTER TABLE `sap_centre_locations`
ADD CONSTRAINT `fk_sap_centre_locations_sap_centres` FOREIGN KEY (`centre_id`) REFERENCES `sap_centres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sap_standard_programs`
--
ALTER TABLE `sap_standard_programs`
ADD CONSTRAINT `fk_sap_standard_programs_sap_centres1` FOREIGN KEY (`centre_id`) REFERENCES `sap_centres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
