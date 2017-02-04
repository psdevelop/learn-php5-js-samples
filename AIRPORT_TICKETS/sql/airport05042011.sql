# SQL Manager 2011 Lite for MySQL 5.0.0.3
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : airport


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `airport`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `airport`;

#
# Structure for the `airpoints` table : 
#

CREATE TABLE `airpoints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `point_name` varchar(255) NOT NULL,
  `lognitude` float DEFAULT NULL,
  `lattitude` float DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `airtypes` table : 
#

CREATE TABLE `airtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `companies` table : 
#

CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `countries` table : 
#

CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `flights` table : 
#

CREATE TABLE `flights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_point` int(11) NOT NULL,
  `dest_point` int(11) NOT NULL,
  `flight_code` varchar(100) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `flight_lenght` float DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `shedules` table : 
#

CREATE TABLE `shedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dest_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `flight_id` int(11) NOT NULL,
  `airtype_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `tickets` table : 
#

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_code` varchar(30) NOT NULL,
  `family` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `buy_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `age` int(11) NOT NULL,
  `shedule_item_id` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Definition for the `airpoints_view` view : 
#

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `airpoints_view` AS 
  select 
    `aip`.`id` AS `id`,
    `aip`.`country_id` AS `country_id`,
    `aip`.`lattitude` AS `lattitude`,
    `aip`.`lognitude` AS `lognitude`,
    `aip`.`point_name` AS `point_name`,
    `cou`.`country_name` AS `country_name` 
  from 
    (`airpoints` `aip` left join `countries` `cou` on((`aip`.`country_id` = `cou`.`id`)));

#
# Definition for the `flights_view` view : 
#

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `flights_view` AS 
  select 
    `fl`.`id` AS `id`,
    `fl`.`dest_point` AS `dest_id`,
    `fl`.`source_point` AS `source_id`,
    `fl`.`start_time` AS `start_time`,
    `fl`.`end_time` AS `end_time`,
    `fl`.`flight_code` AS `flight_code`,
    `fl`.`flight_lenght` AS `flight_lenght`,
    `fl`.`company_id` AS `company_id`,
    `src`.`country_id` AS `src_country_id`,
    `src`.`lattitude` AS `src_lattitude`,
    `src`.`lognitude` AS `src_lognitude`,
    `src`.`point_name` AS `src_point_name`,
    `src`.`country_name` AS `src_country_name`,
    `dst`.`country_id` AS `dst_country_id`,
    `dst`.`lattitude` AS `dst_lattitude`,
    `dst`.`lognitude` AS `dst_lognitude`,
    `dst`.`point_name` AS `dst_point_name`,
    `dst`.`country_name` AS `dst_country_name`,
    `cmp`.`company_name` AS `company_name` 
  from 
    (((`flights` `fl` left join `airpoints_view` `src` on((`fl`.`source_point` = `src`.`id`))) left join `airpoints_view` `dst` on((`fl`.`dest_point` = `dst`.`id`))) left join `companies` `cmp` on((`fl`.`company_id` = `cmp`.`id`)));

#
# Definition for the `shedules_view` view : 
#

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shedules_view` AS 
  select 
    `shd`.`id` AS `id`,
    `shd`.`airtype_id` AS `airtype_id`,
    `shd`.`source_dt` AS `source_dt`,
    `shd`.`dest_dt` AS `dest_dt`,
    `atp`.`type_name` AS `type_name`,
    `flv`.`id` AS `flight_id`,
    `flv`.`company_id` AS `company_id`,
    `flv`.`company_name` AS `company_name`,
    `flv`.`dest_id` AS `dest_id`,
    `flv`.`dst_country_id` AS `dst_country_id`,
    `flv`.`dst_country_name` AS `dst_country_name`,
    `flv`.`dst_lattitude` AS `dst_lattitude`,
    `flv`.`dst_lognitude` AS `dst_lognitude`,
    `flv`.`dst_point_name` AS `dst_point_name`,
    `flv`.`end_time` AS `end_time`,
    `flv`.`flight_code` AS `flight_code`,
    `flv`.`flight_lenght` AS `flight_lenght`,
    `flv`.`source_id` AS `source_id`,
    `flv`.`src_country_id` AS `src_country_id`,
    `flv`.`src_country_name` AS `src_country_name`,
    `flv`.`src_lattitude` AS `src_lattitude`,
    `flv`.`src_lognitude` AS `src_lognitude`,
    `flv`.`src_point_name` AS `src_point_name`,
    `flv`.`start_time` AS `start_time` 
  from 
    ((`shedules` `shd` left join `flights_view` `flv` on((`shd`.`flight_id` = `flv`.`id`))) left join `airtypes` `atp` on((`shd`.`airtype_id` = `atp`.`id`)));

#
# Definition for the `ticket_view` view : 
#

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ticket_view` AS 
  select 
    `tck`.`id` AS `id`,
    `tck`.`age` AS `age`,
    `tck`.`buy_datetime` AS `buy_datetime`,
    `tck`.`family` AS `family`,
    `tck`.`name` AS `name`,
    `tck`.`surname` AS `surname`,
    `tck`.`ticket_code` AS `ticket_code`,
    `tck`.`shedule_item_id` AS `shedule_item_id`,
    `tck`.`birthdate` AS `birthdate`,
    `shd`.`airtype_id` AS `airtype_id`,
    `shd`.`source_dt` AS `source_dt`,
    `shd`.`dest_dt` AS `dest_dt`,
    `shd`.`type_name` AS `type_name`,
    `shd`.`flight_id` AS `flight_id`,
    `shd`.`company_id` AS `company_id`,
    `shd`.`company_name` AS `company_name`,
    `shd`.`dest_id` AS `dest_id`,
    `shd`.`dst_country_id` AS `dst_country_id`,
    `shd`.`dst_country_name` AS `dst_country_name`,
    `shd`.`dst_lattitude` AS `dst_lattitude`,
    `shd`.`dst_lognitude` AS `dst_lognitude`,
    `shd`.`dst_point_name` AS `dst_point_name`,
    `shd`.`end_time` AS `end_time`,
    `shd`.`flight_code` AS `flight_code`,
    `shd`.`flight_lenght` AS `flight_lenght`,
    `shd`.`source_id` AS `source_id`,
    `shd`.`src_country_id` AS `src_country_id`,
    `shd`.`src_country_name` AS `src_country_name`,
    `shd`.`src_lattitude` AS `src_lattitude`,
    `shd`.`src_lognitude` AS `src_lognitude`,
    `shd`.`src_point_name` AS `src_point_name`,
    `shd`.`start_time` AS `start_time` 
  from 
    (`tickets` `tck` left join `shedules_view` `shd` on((`tck`.`shedule_item_id` = `shd`.`id`)));



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;