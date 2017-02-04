/*
SQLyog Community v9.20 
MySQL - 5.5.15 : Database - airport
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`airport` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `airport`;

/*Table structure for table `airpoints` */

DROP TABLE IF EXISTS `airpoints`;

CREATE TABLE `airpoints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `point_name` varchar(255) NOT NULL,
  `lognitude` float DEFAULT NULL,
  `lattitude` float DEFAULT NULL,
  `country_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `airpoints` */

/*Table structure for table `flights` */

DROP TABLE IF EXISTS `flights`;

CREATE TABLE `flights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_point` int(11) NOT NULL,
  `dest_point` int(11) NOT NULL,
  `flight_code` varchar(100) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `flight_lenght` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `flights` */

/*Table structure for table `shedules` */

DROP TABLE IF EXISTS `shedules`;

CREATE TABLE `shedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dest_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `flight_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `shedules` */

/*Table structure for table `tickets` */

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_code` varchar(30) NOT NULL,
  `family` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `buy_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `age` int(11) NOT NULL,
  `sending_point_id` int(11) NOT NULL,
  `dest_point_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tickets` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
