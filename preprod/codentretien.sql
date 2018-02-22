-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 22 fév. 2018 à 08:44
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `codentretien`
--

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `idGroup` int(11) NOT NULL AUTO_INCREMENT,
  `labelGroup` varchar(32) NOT NULL,
  PRIMARY KEY (`idGroup`),
  UNIQUE KEY `idGroup` (`idGroup`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `group`
--

INSERT INTO `group` (`idGroup`, `labelGroup`) VALUES
(1, 'Administrateur'),
(2, 'Admin'),
(3, 'Professeur'),
(4, 'Agent'),
(5, 'Prof'),
(6, 'Testeur'),
(7, 'test'),
(8, 'testestests'),
(9, 'rock'),
(10, 'test'),
(11, 'gfgfgf'),
(12, 'dgfgfgf'),
(13, 'rererere'),
(14, 'yyyyy'),
(15, 'fdfdfdf'),
(100, 'XYLIARIS');

-- --------------------------------------------------------

--
-- Structure de la table `map_permissions`
--

DROP TABLE IF EXISTS `map_permissions`;
CREATE TABLE IF NOT EXISTS `map_permissions` (
  `idGroup` int(11) NOT NULL,
  `idPermission` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `map_permissions`
--

INSERT INTO `map_permissions` (`idGroup`, `idPermission`) VALUES
(1, 101),
(1, 4),
(2, 3),
(2, 2),
(3, 101),
(3, 3),
(3, 2),
(4, 4),
(4, 3),
(4, 2),
(2, 1),
(1, 3),
(4, 1),
(5, 2),
(5, 1),
(6, 2),
(1, 2),
(6, 101),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(1, 1),
(9, 4),
(9, 3),
(9, 1),
(9, 101),
(10, 2),
(0, 3),
(12, 4),
(0, 2),
(0, 1),
(2, 4),
(3, 1),
(13, 101),
(15, 1),
(11, 3),
(15, 2),
(15, 3),
(15, 4),
(15, 101),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 101),
(100, 1),
(100, 2),
(100, 3),
(100, 4),
(100, 101);

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `idPermission` int(11) NOT NULL AUTO_INCREMENT,
  `labelPermission` varchar(32) NOT NULL,
  PRIMARY KEY (`idPermission`),
  UNIQUE KEY `idPermission` (`idPermission`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`idPermission`, `labelPermission`) VALUES
(1, 'Panneau d\'administration'),
(2, 'Gestion des permissions'),
(3, 'troisieme permission'),
(4, 'Administration'),
(101, 'Faire une demande');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_label` varchar(30) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`room_id`, `room_label`) VALUES
(1, 'C115'),
(2, 'C200'),
(3, 'C400'),
(4, 'C564');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_creation` date NOT NULL,
  `ticket_editDate` date NOT NULL,
  `ticket_description` longtext NOT NULL,
  `ticket_title` varchar(50) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `ticket_eventDate` date NOT NULL,
  `ticket_option` int(11) NOT NULL,
  `ticket_disposition` int(11) NOT NULL,
  `ticket_type` int(11) NOT NULL,
  `ticket_isAccepted` tinyint(1) NOT NULL,
  `ticket_deniedReason` varchar(256) CHARACTER SET utf16 COLLATE utf16_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ticket_id`),
  UNIQUE KEY `ticket_id` (`ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `ticket_creation`, `ticket_editDate`, `ticket_description`, `ticket_title`, `room_id`, `user_id`, `status_id`, `ticket_eventDate`, `ticket_option`, `ticket_disposition`, `ticket_type`, `ticket_isAccepted`, `ticket_deniedReason`) VALUES
(4, '2018-02-16', '2018-02-22', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard.', 'Ecran noir', 2, 1, 1, '2018-02-15', 1, 1, 1, 0, ''),
(3, '2018-02-01', '2018-02-16', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'problème de pc', 1, 24, 2, '2018-02-08', 1, 1, 1, 0, ''),
(5, '2018-02-09', '2018-02-21', 'Contrairement à une opinion répandue, le Lorem Ipsum n\'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s\'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum.', 'Imprimante de merde', 3, 24, 2, '2018-02-16', 1, 1, 1, 0, ''),
(9, '2018-02-21', '2018-02-21', 'je suis un bg', 'Bonjour, je mange des nems', 4, 1, 2, '0000-00-00', 0, 0, 0, 0, 'kiiki'),
(10, '2018-02-22', '2018-02-22', 'trololo', 'test', 2, 1, 2, '0000-00-00', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(32) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_idGroup` int(11) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_birthday` date DEFAULT NULL,
  `user_gender` int(11) NOT NULL,
  `user_numberPhone` varchar(20) NOT NULL,
  `user_firstName` varchar(50) NOT NULL,
  `user_lastName` varchar(50) NOT NULL,
  `user_createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_idGroup`, `user_email`, `user_birthday`, `user_gender`, `user_numberPhone`, `user_firstName`, `user_lastName`, `user_createdOn`) VALUES
(1, 'admin', 'admin', 1, 'nicolas6720@gmail.com', '1997-06-13', 1, '0687916339', 'Nicolas', 'KLEIN', '2018-02-12 11:04:47'),
(24, 'Xyliaris', '44553272', 100, 'xyliaris@gmail.com', '2018-02-14', 1, '0666666666', 'Xyl', 'Iaris', '2018-02-19 12:29:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
