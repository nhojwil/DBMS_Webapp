

-- July 17, 2014
ALTER TABLE `sap_centre_locations`
  DROP `street`,
  DROP `city`,
  DROP `province`,
  DROP `zip_code`;

ALTER TABLE  `sap_centre_locations` ADD  `branch` VARCHAR( 100 ) NOT NULL AFTER  `location_name` ,
ADD  `area` VARCHAR( 100 ) NOT NULL AFTER  `branch` ,
ADD  `region` VARCHAR( 100 ) NOT NULL AFTER  `area` ;

ALTER TABLE `sap_standard_programs`
  DROP `address`;

ALTER TABLE  `sap_standard_programs` ADD `location_id` INT( 11 ) NOT NULL ;
ALTER TABLE  `sap_adhoc_programs` ADD `location_id` INT( 11 ) NOT NULL ;

-- July 21, 2014
ALTER TABLE `sap_centres` ADD `billing_address` VARCHAR(400) NULL ;
ALTER TABLE `sap_standard_programs` ADD `billing_address` VARCHAR(400) NULL ;

-- July 23, 2014
CREATE TABLE IF NOT EXISTS `sap_ads` (
`id` int(8) NOT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `ad_location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `sap_ads` (`id`, `filename`, `ad_location`) VALUES
(1, 'ad_banner_1.png', 'home_top_header'),
(2, 'ad_banner_2.png', 'home_content_1'),
(3, 'ad_banner_3.png', 'home_content_2'),
(4, 'ad_banner_4.png', 'home_content_3');