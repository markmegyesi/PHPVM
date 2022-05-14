# PHPVM

## Table of contents
* [General info](#general-info)
* [Technology](#technology)
* [Setup](#setup)

## General info
This project is a simple one-page webpage. 
	
## Technology
Project is created with:
* PHP version: 8.0
	
## Setup
To run this project create an SQL database:



CREATE DATABASE IF NOT EXISTS `eszternail` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `eszternail`;


CREATE TABLE IF NOT EXISTS `arlista` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `szolgaltatas` varchar(255) NOT NULL,
  `ar` int(50) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;


/*!40000 ALTER TABLE `arlista` DISABLE KEYS */;
INSERT INTO `arlista` (`id`, `szolgaltatas`, `ar`) VALUES
	(1, 'Manikűr', 4000),
	(2, 'Géllakk+Manikűr', 5000),
	(3, 'Megerősített géllakk', 6000),
	(4, 'Épített köröm zselével+Géllakk', 7500),
	(6, 'Épített köröm francia zselével', 8500),
	(8, 'Leszedés + manikűr', 5000),
	(10, 'Töltés', 6800);
/*!40000 ALTER TABLE `arlista` ENABLE KEYS */;


CREATE TABLE IF NOT EXISTS `engedelyek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `megnevezes` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


/*!40000 ALTER TABLE `engedelyek` DISABLE KEYS */;
INSERT INTO `engedelyek` (`id`, `megnevezes`) VALUES
	(1, 'admin'),
	(2, 'felhasznalo');
/*!40000 ALTER TABLE `engedelyek` ENABLE KEYS */;


CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nev` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jelszo` varchar(255) DEFAULT NULL,
  `valid` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


/*!40000 ALTER TABLE `felhasznalok` DISABLE KEYS */;
INSERT INTO `felhasznalok` (`id`, `nev`, `email`, `jelszo`, `valid`) VALUES
	(1, 'Hámorszky Eszter', 'hamorszkyeszter@gmail.com', 'abcdef', 1),
	(2, 'Kiss Anna', 'annakiss@gmail.com', '123456', 2);
/*!40000 ALTER TABLE `felhasznalok` ENABLE KEYS */;


CREATE TABLE IF NOT EXISTS `felhasznalo_engedelyek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `van` tinyint(4) NOT NULL DEFAULT 0,
  `felhasznalo_id` int(10) unsigned NOT NULL,
  `jogosultsag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `felhasznalo` (`felhasznalo_id`),
  KEY `jogosultsag` (`jogosultsag_id`),
  CONSTRAINT `felhasznalo` FOREIGN KEY (`felhasznalo_id`) REFERENCES `felhasznalok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `jogosultsag` FOREIGN KEY (`jogosultsag_id`) REFERENCES `engedelyek` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


/*!40000 ALTER TABLE `felhasznalo_engedelyek` DISABLE KEYS */;
INSERT INTO `felhasznalo_engedelyek` (`id`, `van`, `felhasznalo_id`, `jogosultsag_id`) VALUES
	(1, 1, 1, 1),
	(2, 1, 2, 2);
	
/*!40000 ALTER TABLE `felhasznalo_engedelyek` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

And install it locally by download the code as ZIP then unpack it in your ./xampp/htdocs folder.

Test admin:
E-mail:hamorszkyeszter@gmail.com
Password:abcdef

Test user:
Email:annakiss@gmail.com
Password:123456

## Sources
The Bootstrap template:https://github.com/StartBootstrap/startbootstrap-freelancer
