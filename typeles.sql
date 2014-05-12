-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                5.1.50-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Versie:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Structuur van  tabel typeles.exercises wordt geschreven
CREATE TABLE IF NOT EXISTS `exercises` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Omschrijving` tinytext NOT NULL,
  `Text` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel typeles.exercises: ~3 rows (ongeveer)
/*!40000 ALTER TABLE `exercises` DISABLE KEYS */;
REPLACE INTO `exercises` (`ID`, `Omschrijving`, `Text`) VALUES
	(1, 'Les 1', 'fjfjfjfj'),
	(2, 'Les 2 ', 'fj fj fj fj'),
	(3, 'Les 3', 'fjkfjkfjkfjk');
/*!40000 ALTER TABLE `exercises` ENABLE KEYS */;


-- Structuur van  tabel typeles.results wordt geschreven
CREATE TABLE IF NOT EXISTS `results` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Exercise` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Time` double NOT NULL,
  `Faults` double NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel typeles.results: ~50 rows (ongeveer)
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
REPLACE INTO `results` (`ID`, `ID_Exercise`, `ID_User`, `Time`, `Faults`, `CreationDate`) VALUES
	(1, 1, 1, 2.827, 1, '2014-05-11 15:47:14'),
	(2, 1, 1, 1.843, 0, '2014-05-11 15:47:38'),
	(3, 1, 1, 0.933, 0, '2014-05-11 15:48:24'),
	(4, 1, 1, 0.796, 0, '2014-05-11 15:48:32'),
	(5, 1, 1, 0.752, 1, '2014-05-11 15:48:44'),
	(6, 1, 1, 0.918, 0, '2014-05-11 15:49:07'),
	(7, 1, 1, 0.769, 0, '2014-05-11 15:49:41'),
	(8, 1, 1, 0.832, 0, '2014-05-11 15:49:57'),
	(9, 1, 1, 0.652, 1, '2014-05-11 15:50:15'),
	(10, 1, 1, 0.675, 0, '2014-05-11 15:50:36'),
	(11, 1, 1, 0.92, 1, '2014-05-11 15:50:48'),
	(12, 1, 1, 0.678, 1, '2014-05-11 15:51:13'),
	(13, 2, 1, 5.706, 0, '2014-05-11 15:51:40'),
	(14, 2, 1, 5.003, 0, '2014-05-11 15:52:04'),
	(15, 2, 1, 3.873, 0, '2014-05-11 15:52:19'),
	(16, 2, 1, 3.77, 7, '2014-05-11 15:52:35'),
	(17, 2, 1, 2.491, 0, '2014-05-11 15:52:51'),
	(18, 2, 1, 3.271, 1, '2014-05-11 15:53:05'),
	(19, 2, 1, 6.183, 5, '2014-05-11 15:53:44'),
	(20, 2, 1, 3.223, 2, '2014-05-11 15:53:59'),
	(22, 2, 1, 3.245, 3, '2014-05-11 15:54:22'),
	(23, 2, 1, 2.862, 2, '2014-05-11 15:54:54'),
	(24, 2, 1, 8.583, 5, '2014-05-11 15:55:40'),
	(25, 1, 1, 1.311, 1, '2014-05-11 15:57:14'),
	(26, 1, 1, 0.766, 0, '2014-05-11 15:57:25'),
	(27, 1, 1, 0.762, 1, '2014-05-11 15:57:41'),
	(28, 1, 1, 0.831, 1, '2014-05-11 15:57:53'),
	(29, 1, 1, 0.735, 1, '2014-05-11 15:58:10'),
	(30, 1, 1, 0.923, 1, '2014-05-11 15:58:58'),
	(31, 3, 1, 3.472, 0, '2014-05-11 16:01:17'),
	(32, 3, 1, 4.836, 8, '2014-05-11 16:01:42'),
	(33, 3, 1, 4.398, 4, '2014-05-11 16:01:59'),
	(34, 3, 1, 2.768, 0, '2014-05-11 16:02:13'),
	(35, 3, 1, 2.556, 0, '2014-05-11 16:02:29'),
	(36, 3, 1, 1.989, 0, '2014-05-11 16:02:42'),
	(37, 3, 1, 2.207, 0, '2014-05-11 16:03:02'),
	(38, 3, 1, 1.985, 0, '2014-05-11 16:03:17'),
	(39, 3, 1, 1.05, 1, '2014-05-11 16:03:28'),
	(40, 3, 1, 1.543, 3, '2014-05-11 16:03:35'),
	(42, 3, 1, 2.451, 5, '2014-05-11 16:04:08'),
	(43, 3, 1, 1.98, 0, '2014-05-11 16:04:21'),
	(44, 3, 1, 1.754, 6, '2014-05-11 16:04:38'),
	(45, 3, 1, 1.785, 2, '2014-05-11 16:04:59'),
	(46, 3, 1, 1.65, 0, '2014-05-11 16:05:58'),
	(47, 3, 1, 2.323, 6, '2014-05-11 16:06:31'),
	(48, 3, 1, 1.664, 3, '2014-05-11 16:06:52'),
	(49, 3, 1, 1.671, 2, '2014-05-11 16:07:46'),
	(50, 3, 1, 1.485, 0, '2014-05-11 16:08:12'),
	(51, 3, 1, 2.163, 8, '2014-05-11 16:08:38'),
	(52, 3, 1, 3.454, 11, '2014-05-11 16:09:25');
/*!40000 ALTER TABLE `results` ENABLE KEYS */;


-- Structuur van  tabel typeles.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel typeles.users: ~2 rows (ongeveer)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`ID`, `Username`, `Password`, `Status`) VALUES
	(1, 'robbe', '3bfd258844524c16d1544cd18a25b287', 1),
	(2, 'jasper', '3bfd258844524c16d1544cd18a25b287', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
