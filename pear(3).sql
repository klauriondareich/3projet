-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 juin 2022 à 10:11
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pear`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `mdp` varchar(1000) NOT NULL,
  `email` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mdp`, `email`) VALUES
(0, 'admin1', '$2y$10$y4wl9mJqnq7YJ9e3pDhX3OUb1Ur1vVx6dIt7wHdVhWMRuz5esAyPu', 'louis.aubignat@supinfo.com'),
(1, 'laurion', '$2y$10$uA2u6QO3NUh7j6EpaR7pHeKEAEfYbeO80s.K/mTP3V.s/nPTxGX5q', 'kouhouinikina@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `docs`
--

DROP TABLE IF EXISTS `docs`;
CREATE TABLE IF NOT EXISTS `docs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `user_id` int NOT NULL,
  `upload_date` varchar(100) NOT NULL,
  `size` float NOT NULL,
  `file_type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `docs`
--

INSERT INTO `docs` (`id`, `nom`, `user_id`, `upload_date`, `size`, `file_type`) VALUES
(1, 'hisokaaa.webp', 2, '25-05-22 02:55:14', 134432, 'webp'),
(2, 'hisoka.webp', 2, '25-05-22 02:56:58', 357020, 'webp'),
(3, 'hisoka.webp', 2, '25-05-22 02:59:53', 357020, 'webp'),
(4, 'hisoka.webp', 2, '25-05-22 03:01:49', 357020, 'webp'),
(5, 'haruo.webp', 2, '25-05-22 03:01:57', 138462, 'webp'),
(6, 'haruo.webp', 2, '25-05-22 03:06:23', 138462, 'webp'),
(7, 'haruo.webp', 2, '25-05-22 03:07:18', 138462, 'webp');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(5000) NOT NULL,
  `email` varchar(5000) NOT NULL,
  `mdp` mediumtext NOT NULL,
  `size_of_all_docs` int DEFAULT NULL,
  `blocked` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mdp`, `size_of_all_docs`, `blocked`) VALUES
(1, 'oui', 'oui@oui.fr', '$2y$10$uSyd5ci11iJhkbj/.uSMre5yzWX61t.9ZIbIAe0Vmg0PvIAJuCMNO', NULL, NULL),
(2, 'non', 'non@non.fr', '$2y$10$/WAeIfciofURbqxlK5IFlO57de5JFDDpnW0I3TR2fjRvkeyofS7he', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
