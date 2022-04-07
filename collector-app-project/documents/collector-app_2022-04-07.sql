# ************************************************************
# Sequel Ace SQL dump
# Version 20031
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.37)
# Database: collector-app
# Generation Time: 2022-04-07 13:11:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table formats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `formats`;

CREATE TABLE `formats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `format` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

LOCK TABLES `formats` WRITE;
/*!40000 ALTER TABLE `formats` DISABLE KEYS */;

INSERT INTO `formats` (`id`, `format`)
VALUES
	(1,'7\"'),
	(2,'10\"'),
	(3,'12\"'),
	(4,'2 x 12\"'),
	(5,'3 x 12\"');

/*!40000 ALTER TABLE `formats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table releases
# ------------------------------------------------------------

DROP TABLE IF EXISTS `releases`;

CREATE TABLE `releases` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `artist` varchar(255) DEFAULT NULL,
  `release_name` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `format` int(11) unsigned DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_releases_formats` (`format`),
  CONSTRAINT `fk_releases_formats` FOREIGN KEY (`format`) REFERENCES `formats` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

LOCK TABLES `releases` WRITE;
/*!40000 ALTER TABLE `releases` DISABLE KEYS */;

INSERT INTO `releases` (`id`, `artist`, `release_name`, `label`, `year`, `format`, `image_url`)
VALUES
	(1,'Florian T M Zeisig','Slow Bench','enmossed','2022',1,'R-22458883-1646926153-9657.jpeg'),
	(2,'Another Channel','Behind The Glow','Moonshine Recordings','2022',3,'a4095236088_16.jpeg'),
	(3,'Ike','Stone Diviner','Die Orakel','2021',3,'R-19859281-1628951643-1229.jpeg'),
	(4,'Priori','Your Own Power','NAFF','2021',3,'R-20655262-1637187743-8641.jpeg'),
	(5,'Ura','Entertainment','Collect-Call','2019',3,'R-13339374-1552351934-1616.jpeg'),
	(28,'Huerco S','Plonk','Insienso','2022',4,'ce8e33394ab7a83ac40db37c67119c3890687f76.jpg'),
	(29,'Jake Muir','Mana','Illian Tape','2021',3,'0255fc73dae8204c023440b51d7ed86c09aff17f.jpg'),
	(31,'Downstairs J','Basement, etc...','Insienso','2021',3,'39eef8d060125aa7c2783dfeacec7e846e24b101.jpg'),
	(32,'Various','Virtual Dreams (Ambient Explorations In The House & Techno Age, 1993-1997)','Music From Memory','2020',5,'72971f6cbe19c87baf90cbe4f56b3bb6dbbdc88f.jpg'),
	(33,'Dbridge & Vegas','True Romance VIP / Inner Disbelief VIP','Metalheadz','2014',2,'3783b32e9392921401ba98a32c44657a4e969d86.jpg');

/*!40000 ALTER TABLE `releases` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
