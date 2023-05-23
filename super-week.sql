-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 23 mai 2023 à 10:09
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `super-week`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `title`, `content`, `id_user`) VALUES
(1, 'boubou', 'fantome', 6),
(2, 'Ronron', 'Ronflex', 2),
(3, 'Coco', 'Musique', 4),
(4, 'Dodo', 'Berceuse', 1),
(5, 'Toto', 'blague', 5),
(6, 'Cheval', 'Animal', 3),
(7, 'Lampe', 'Lumière', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `password`) VALUES
(1, 'paul@logo.fr', 'Paul', 'Logo', '$2y$10$HkkWFeUgSuzC4ovOAbYYXOBDEuKlQ87WTMTM1Ti.1zrE4dTTz721e'),
(2, 'marc@coco.com', 'Marc', 'Coco', '$2y$10$Ts.aM1lzmznljzULIcF7Hevm2n.w4ufO9BIe8ATSB4WrZQ287O0VO'),
(3, 'sandy@dob.com', 'Sandy', 'Dob', '$2y$10$wChQGLPwmhIBcP1bwW197u.XsZGRlAokZzR9oTHL1K6ORO5zUUaau'),
(4, 'adri@merc.fr', 'Adri', 'Merc', '$2y$10$rE5OQWIHYm59eVNddCstZugV9CLN0EBMl4P7o6I58myPmth5CotP2'),
(5, 'anny@marsy.fr', 'Anny', 'Marsy', '$2y$10$yNlJOXvlMyd1xsJ3JT.bGOtqS0s61IU/a29.658TnNQYV6K0fAiue'),
(6, 'test@test.com', 't', '', '$2y$10$gsuTJlS3uFALDc4PvOtZFuJ15HxCOfE3fgdLBrDkFi7d91d4wVqsW'),
(7, 't@test.com', '', 'r', '$2y$10$pIuG.5wJHmFenMWjxo6ZleeTEUkeMORw0EAj4r6vJyhN05ibPvvJe'),
(8, 'toto@test.com', 'to', 'to', '$2y$10$zcRzzzCQoSVN4MU.jzGJsOn.vJBp.bwnn.Looo9Iwm4mTGo0.cywu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
