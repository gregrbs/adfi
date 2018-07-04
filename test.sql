-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 juil. 2018 à 08:05
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `doc_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `statut_user` int(2) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`doc_id`, `user_id`, `statut_user`, `file_name`, `file_url`) VALUES
(1, 0, 0, 'P1100739.jpg', 'documents/P1100739.jpg'),
(2, 0, 0, 'P1100744.jpg', 'documents/P1100744.jpg'),
(3, 0, 0, 'Rapport de stage REBUS Grégory.pdf', 'documents/Rapport de stage REBUS Grégory.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise` varchar(100) NOT NULL,
  `login` varchar(10) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `statut` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `entreprise`, `login`, `motdepasse`, `statut`) VALUES
(51, 'te', 'te', '33e9505d12942e8259a3c96fb6f88ed325b95797', 2),
(50, 'nr', 'nr', 'a8643e0e26d5ead82e73aae64966ca144f152d8a', 2),
(48, 'gre', 'gre', '430502bf70edcfa4f07892536cabbcb1e2f6471f', 1),
(49, 'br', 'br', '3eb65786145ecb71e9dcbb3a09f06a0b3a6c4d2d', 2),
(47, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(45, 'test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 2),
(38, 'greg', 'greg', 'ff6f99715c81ff80284429b26335ffd86a5662b6', 1),
(46, 'user', 'user', '12dea96fec20593566ab75692c9949596833adc9', 2),
(52, 'pp', 'pp', '6d3236ec3c88039ca534b81acad564e847ecb062', 1),
(53, 'exia', 'gregory', '9e577fc902c108965b16c41e431ab3cfb9759d21', 1),
(54, 'ADFI', 'adfi', 'bf8934fff1e1b5ca74645d4d2d27faa82698fb7e', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
