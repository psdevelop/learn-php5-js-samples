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
  `closed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Structure for the `airtypes` table : 
#

CREATE TABLE `airtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  `closed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Structure for the `attempts` table : 
#

CREATE TABLE `attempts` (
  `ip` varchar(15) NOT NULL,
  `count` int(11) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for the `companies` table : 
#

CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `closed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Structure for the `countries` table : 
#

CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  `closed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
  `flights_hours` float(9,3) DEFAULT NULL,
  `closed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Structure for the `sessions` table : 
#

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=216 DEFAULT CHARSET=utf8;

#
# Structure for the `shedules` table : 
#

CREATE TABLE `shedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dest_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `flight_id` int(11) NOT NULL,
  `airtype_id` int(11) DEFAULT NULL,
  `closed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `closed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Structure for the `users` table : 
#

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT 'psdevelop@yandex.ru',
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `person_id` int(11) NOT NULL DEFAULT '0',
  `closed` int(11) NOT NULL DEFAULT '0',
  `enable_admin` char(1) NOT NULL DEFAULT '0',
  `enable_deleting` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

#
# Definition for the `delete_object_by_type` procedure : 
#

CREATE DEFINER = 'root'@'localhost' PROCEDURE `delete_object_by_type`(
        IN OBJ_TYPE VARCHAR(50),
        IN OBJ_ID INTEGER(11),
        OUT OBJ_COUNT INTEGER(11)
    )
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
    IF OBJ_TYPE="airpoint" THEN
    	UPDATE airpoints SET closed=1 WHERE id=OBJ_ID;
    ELSE
    	IF OBJ_TYPE="airtype" THEN
        	UPDATE airtypes SET closed=1 WHERE id=OBJ_ID;
        ELSE
        	IF OBJ_TYPE="person_type" THEN
            	UPDATE person_types SET closed=1 WHERE id=OBJ_ID;
            ELSE
            	IF OBJ_TYPE="user" THEN
            		UPDATE users SET isactive=0 WHERE id=OBJ_ID;
                ELSE
					IF OBJ_TYPE="companies" THEN
            			UPDATE companies SET closed=1 WHERE id=OBJ_ID;
                    ELSE
						IF OBJ_TYPE="country" THEN
							UPDATE countries SET closed=1 WHERE id=OBJ_ID;
                        ELSE
                        	IF OBJ_TYPE="flight" THEN
							UPDATE flights SET closed=1 WHERE id=OBJ_ID;
                        	ELSE
                            	IF OBJ_TYPE="shedule" THEN
								UPDATE shedules SET closed=1 WHERE id=OBJ_ID;
                        		ELSE
                                	IF OBJ_TYPE="ticket" THEN
									UPDATE tickets SET closed=1 WHERE id=OBJ_ID;
                        			END IF;
                        		END IF;
                        	END IF;
                        END IF;
                    END IF;
                END IF;
    		END IF;
    	END IF;
    END IF;
      
END;

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
    `aip`.`closed` AS `closed`,
    `cou`.`country_name` AS `country_name`,
    concat(`aip`.`point_name`,' ',`cou`.`country_name`) AS `airpoint_name` 
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
    `fl`.`flights_hours` AS `flights_hours`,
    `src`.`country_id` AS `src_country_id`,
    `fl`.`closed` AS `closed`,
    `src`.`lattitude` AS `src_lattitude`,
    `src`.`lognitude` AS `src_lognitude`,
    `src`.`point_name` AS `src_point_name`,
    `src`.`country_name` AS `src_country_name`,
    `dst`.`country_id` AS `dst_country_id`,
    `dst`.`lattitude` AS `dst_lattitude`,
    `dst`.`lognitude` AS `dst_lognitude`,
    `dst`.`point_name` AS `dst_point_name`,
    `dst`.`country_name` AS `dst_country_name`,
    `cmp`.`company_name` AS `company_name`,
    concat('Рейс,',`fl`.`flight_code`,',',`cmp`.`company_name`,', из ',`src`.`point_name`,', до ',`dst`.`point_name`) AS `flight_name` 
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
    `shd`.`closed` AS `closed`,
    `shd`.`flight_id` AS `flight_id`,
    `atp`.`type_name` AS `type_name`,
    `flv`.`company_id` AS `company_id`,
    `flv`.`company_name` AS `company_name`,
    `flv`.`dest_id` AS `dest_id`,
    `flv`.`flights_hours` AS `flights_hours`,
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
    `flv`.`start_time` AS `start_time`,
    `flv`.`flight_name` AS `flight_name`,
    concat(`atp`.`type_name`,',',`shd`.`source_dt`,',-',`shd`.`dest_dt`,',',`flv`.`flight_name`) AS `shedule_name` 
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
    `tck`.`closed` AS `closed`,
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
    `shd`.`flights_hours` AS `flights_hours`,
    `shd`.`source_id` AS `source_id`,
    `shd`.`src_country_id` AS `src_country_id`,
    `shd`.`src_country_name` AS `src_country_name`,
    `shd`.`src_lattitude` AS `src_lattitude`,
    `shd`.`src_lognitude` AS `src_lognitude`,
    `shd`.`src_point_name` AS `src_point_name`,
    `shd`.`start_time` AS `start_time`,
    `shd`.`shedule_name` AS `shedule_name` 
  from 
    (`tickets` `tck` left join `shedules_view` `shd` on((`tck`.`shedule_item_id` = `shd`.`id`)));

#
# Data for the `airpoints` table  (LIMIT -497,500)
#

INSERT INTO `airpoints` (`id`, `point_name`, `lognitude`, `lattitude`, `country_id`, `closed`) VALUES 
  (1,'г. Геленджик',150,450,1,0),
  (2,'г. Москва Шереметьево',200,320,1,0);
COMMIT;

#
# Data for the `airtypes` table  (LIMIT -498,500)
#

INSERT INTO `airtypes` (`id`, `type_name`, `closed`) VALUES 
  (1,'Ту-154',0);
COMMIT;

#
# Data for the `companies` table  (LIMIT -498,500)
#

INSERT INTO `companies` (`id`, `company_name`, `closed`) VALUES 
  (1,'Аэрофлот',0);
COMMIT;

#
# Data for the `countries` table  (LIMIT -497,500)
#

INSERT INTO `countries` (`id`, `country_name`, `closed`) VALUES 
  (1,'Россия',0),
  (2,'Украина',0);
COMMIT;

#
# Data for the `flights` table  (LIMIT -498,500)
#

INSERT INTO `flights` (`id`, `source_point`, `dest_point`, `flight_code`, `start_time`, `end_time`, `flight_lenght`, `company_id`, `flights_hours`, `closed`) VALUES 
  (1,1,2,'2056','20:56:00','22:56:00',1600,1,2.100,0);
COMMIT;

#
# Data for the `sessions` table  (LIMIT -494,500)
#

INSERT INTO `sessions` (`id`, `uid`, `username`, `hash`, `expiredate`, `ip`) VALUES 
  (211,0,'operator1','---','2012-04-08 19:41:08','127.0.0.1'),
  (212,0,'operator1','---','2012-04-08 20:07:27','127.0.0.1'),
  (213,0,'operator1','---','2012-04-08 21:28:31','127.0.0.1'),
  (214,0,'operator1','---','2012-04-08 21:29:02','127.0.0.1'),
  (215,0,'operator1','---','2012-04-08 21:32:32','127.0.0.1');
COMMIT;

#
# Data for the `shedules` table  (LIMIT -498,500)
#

INSERT INTO `shedules` (`id`, `source_dt`, `dest_dt`, `flight_id`, `airtype_id`, `closed`) VALUES 
  (1,'2012-04-08 21:09:00','2012-04-08 23:09:00',1,1,0);
COMMIT;

#
# Data for the `tickets` table  (LIMIT -498,500)
#

INSERT INTO `tickets` (`id`, `ticket_code`, `family`, `name`, `surname`, `buy_datetime`, `age`, `shedule_item_id`, `birthdate`, `closed`) VALUES 
  (1,'021512042054','Иванов','Иван','Иванович','2012-04-08 21:24:00',70,1,'2012-04-08',0);
COMMIT;

#
# Data for the `users` table  (LIMIT -487,500)
#

INSERT INTO `users` (`id`, `username`, `password`, `email`, `isactive`, `person_id`, `closed`, `enable_admin`, `enable_deleting`) VALUES 
  (7,'operator1','c2VpZjUzNm1hc2hh','psdevelop@yandex.ru',1,55,0,'1','1'),
  (8,'operator2','bWZmamk0bGhqZDVlNHRn','psdevelop@yandex.ru',1,52,0,'0','0'),
  (9,'operator3','M3J5d2V0NGg0d2U3ZnFyc2Rn','psdevelop@yandex.ru',1,50,0,'0','0'),
  (10,'operator4','dm1scmV5N2R0Z3lsdTNzZA==','psdevelop@yandex.ru',1,49,0,'0','0'),
  (11,'operator5','ZHN0azdsdGRmZXI1ZXd0NA==','psdevelop@yandex.ru',1,41,0,'0','0'),
  (12,'manager1','ZXd0Nmp0anQ3OWhlNGhnc3dl','psdevelop@yandex.ru',1,57,0,'0','0'),
  (13,'manager2','b2dxZm9wd2V3cDQ3M3dl','psdevelop@yandex.ru',1,60,0,'0','0'),
  (14,'manager3','ZXJiZXl0N2JyNjY1Mzd0','psdevelop@yandex.ru',1,62,0,'0','0'),
  (15,'manager4','','psdevelop@yandex.ru',1,58,0,'0','0'),
  (16,'manager5','','psdevelop@yandex.ru',1,61,0,'0','0'),
  (17,'manager6','','psdevelop@yandex.ru',1,59,0,'0','0'),
  (18,'manager7','','psdevelop@yandex.ru',1,56,0,'0','0');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;