# ForumMaterialDesign
Un forum en Material Design
SQL :
```SQL
-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.18-0ubuntu0.16.04.1 - (Ubuntu)
-- SE du serveur:                Linux
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `forum`;

-- Export de la structure de la table forum. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `desc` longtext,
  `image` longtext,
  `for` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Export de données de la table forum.categories : ~4 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `nom`, `desc`, `image`, `for`) VALUES
	(1, 'Root', 'I\'m Root', 'img/19006_1_other_wallpapers_42.jpg', 0),
	(2, 'Groot', 'I\'m Root', 'img/19006_1_other_wallpapers_42.jpg', 0),
	(3, 'Boot', 'I\'m Root', 'img/19006_1_other_wallpapers_42.jpg', 0),
	(4, 'Foot', 'I\'m Root', 'img/19006_1_other_wallpapers_42.jpg', 0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Export de la structure de la table forum. reponses
CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sujet` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `content` longtext,
  `is_best` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Export de données de la table forum.reponses : ~6 rows (environ)
/*!40000 ALTER TABLE `reponses` DISABLE KEYS */;
INSERT INTO `reponses` (`id`, `id_sujet`, `id_user`, `content`, `is_best`) VALUES
	(1, 1, 1, 'Test de réponse', 0),
	(3, 1, 3, '42', 0),
	(4, 1, 3, 'Je suis 42 aussi', 0),
	(5, 1, 3, 'HAha', 0),
	(6, 1, 3, 'Bon, ça marche plutôt bien :)', 0),
	(7, 1, 3, 'Je suis muuuusiiiiiiiiiiiiiiik ? :D', 0),
	(8, 3, 5, 'I\'m a f****** cute tree !  Wouallez !!!!!!!! :D', 0),
	(9, 1, 3, 'éééé', 0),
	(10, 1, 7, 'C un petit peu nul ce forum ...', 0),
	(11, 3, 7, 'on arrête le LSD la svp __\'', 0),
	(12, 5, 8, 'Desolé Erreur 404\r\n', 0),
	(13, 2, 7, 'Episode 4 ,10:03 -->oublié de faire une coupure ou quoi ?', 0),
	(14, 2, 7, '666', 0),
	(15, 2, 7, 'live', 0);
/*!40000 ALTER TABLE `reponses` ENABLE KEYS */;

-- Export de la structure de la table forum. topics
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` text,
  `content` longtext,
  `type` int(11) DEFAULT '1',
  `is_special` int(11) DEFAULT NULL,
  `cat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Export de données de la table forum.topics : ~3 rows (environ)
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`id`, `id_user`, `title`, `content`, `type`, `is_special`, `cat`) VALUES
	(1, 1, 'Je suis 42', 'Yolo', 1, 0, 1),
	(2, 3, 'I\'m 42', 'Bah, test quoi...', 1, NULL, 1),
	(3, 3, 'I\'m Groot', 'And I\'m the guardian of the galaxy', 1, NULL, 2),
	(4, 7, '.', 'SPAM', 1, NULL, 1),
	(5, 8, 'Bonjour', 'Ce forum est un peu vide et comme j\'ai pas de vie je le r', 1, NULL, 3);
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;

-- Export de la structure de la table forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `picture` longtext,
  `pseudo` varchar(50) NOT NULL,
  `mail` tinytext,
  `password` tinytext NOT NULL,
  `rank` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Export de données de la table forum.user : ~4 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `picture`, `pseudo`, `mail`, `password`, `rank`) VALUES
	(0000000001, 'img/dpbm.jpg', 'Louis', '42', '42', 42),
	(0000000003, 'https://yt3.ggpht.com/-8O4srxy7iKs/AAAAAAAAAAI/AAAAAAAAAAA/4OwI_GCJeGs/s88-c-k-no-mo-rj-c0xffffff/photo.jpg', 'admin', NULL, '$2y$10$BWqImKJ6wX2wSIuap6H92u1ayCtgh4n/UBQkpWxk3y.aIOAEqoneC', 1),
	(0000000004, NULL, 'test', NULL, '$2y$10$y.T/./IUV3qxhrFw93Pn0uMucpu8DRSW8owC9bH4kugB47NJIEvNq', 1),
	(0000000005, NULL, 'Jack', NULL, '$2y$10$pm9lPqTvrzv/4uMPcwHGn.4pTRsBcMnOnWOmbo4uoH9HXbCc.dnV.', 1),
	(0000000006, NULL, 'test', NULL, '$2y$10$tjWQAbXPDxCc1MtmXaUc/u2HrCZ7Am2tQo4NbjhqkAuzxd3O9jEqq', 1),
	(0000000007, NULL, 'ah', NULL, '$2y$10$18SZGQIoEAkIPz8sb1ifAOdHDNfUrTGHM0iCHvL.0mTJ0/rWG5sQG', 1),
	(0000000008, NULL, 'Omer', NULL, '$2y$10$iJoITBepIqWJCUZXrXgwfuNXRG6a.lgrwRosj80nwcmzmaBn.pCSO', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
```
