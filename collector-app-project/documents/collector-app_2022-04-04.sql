# ************************************************************
# Sequel Ace SQL dump
# Version 20031
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.37)
# Database: collector-app
# Generation Time: 2022-04-04 09:28:24 +0000
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `formats` WRITE;
/*!40000 ALTER TABLE `formats` DISABLE KEYS */;

INSERT INTO `formats` (`id`, `format`)
VALUES
	(1,'7\"'),
	(2,'10\"'),
	(3,'12\"'),
	(4,'2 x 12\"');

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
  CONSTRAINT `fk_releases_formats` FOREIGN KEY (`format`) REFERENCES `formats`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `releases` WRITE;
/*!40000 ALTER TABLE `releases` DISABLE KEYS */;

INSERT INTO `releases` (`id`, `artist`, `release_name`, `label`, `year`, `format`, `image_url`)
VALUES
	(1,'Florian T M Zeisig','Slow Bench','enmossed','2022',1,'https://www.discogs.com/release/22458883-Florian-T-M-Zeisig-Slow-Bench/image/SW1hZ2U6NzQ4MzQzMTE='),
	(2,'Another Channel','Behind The Glow','Moonshine Recordings','2022',3,'https://www.discogs.com/release/22369501-Another-Channel-Behind-The-Glow/image/SW1hZ2U6NzQ0Njk5MTM='),
	(3,'Ike','Stone Diviner','Die Orakel','2021',3,'https://www.discogs.com/release/19859281-Ike-Stone-Diviner/image/SW1hZ2U6NjQzMjk4NzE='),
	(4,'Priori','Your Own Power','NAFF','2021',3,'https://www.discogs.com/release/20655262-Priori-Your-Own-Power/image/SW1hZ2U6Njg5NzA0MTg='),
	(5,'Ura','Entertainment','Collect-Call','2019',3,'https://www.discogs.com/release/13339374-URA-Entertainment/image/SW1hZ2U6MzkwODk5MDE=');

/*!40000 ALTER TABLE `releases` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
