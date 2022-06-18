-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 12:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mdp` varchar(1000) NOT NULL,
  `email` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mdp`, `email`) VALUES
(0, 'admin1', '$2y$10$zfktYJEq17/2P9/bYeFmNendPPlpKnWLxOQSzCtNFzBfIbO8dOpTS', 'louis.aubignat@supinfo.com'),
(1, 'laurion', '$2y$10$uA2u6QO3NUh7j6EpaR7pHeKEAEfYbeO80s.K/mTP3V.s/nPTxGX5q', 'kouhouinikina@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_date` varchar(100) NOT NULL,
  `size` float NOT NULL,
  `file_type` text NOT NULL,
  `file_path` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `nom`, `user_id`, `upload_date`, `size`, `file_type`, `file_path`) VALUES
(1, 'affiche-barcamp.jpg', 1, '2022-05-10T08:18:21.445Z', 260661, 'image/jpeg', '1655591631139-affiche-barcamp.jpg'),
(2, 'anglais.png', 1, '2022-05-30T09:48:07.176Z', 144882, 'image/png', '1655591639790-anglais.png'),
(3, 'projet-fin-dannee.pdf', 1, '2022-01-27T19:56:34.866Z', 583233, 'application/pdf', '1655591652136-projet-fin-dannee.pdf'),
(4, 'mohammed-ali.mp4', 1, '2022-05-09T12:23:23.449Z', 6666260, 'video/mp4', '1655591657505-mohammed-ali.mp4'),
(5, 'c#.PNG', 1, '2022-01-17T10:10:40.919Z', 71865, 'image/png', '1655591845600-c.PNG'),
(6, 'attitude-2.jpg', 2, '2022-05-06T23:07:03.834Z', 68172, 'image/jpeg', '1655592064383-attitude-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(5000) NOT NULL,
  `email` varchar(5000) NOT NULL,
  `mdp` mediumtext NOT NULL,
  `size_of_all_docs` int(11) DEFAULT NULL,
  `blocked` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mdp`, `size_of_all_docs`, `blocked`) VALUES
(1, 'Dada', 'dada@gmail.com', '$2a$10$jsVmPf9Qsdc7igQmp/8/W.v9bW.FBkR1Iz3DPbWw.6il272mc5.fm', 7726896, 1),
(2, 'Kira', 'kira.mahieddine@yahoo.fr', '$2a$10$cAOfz.4TFzXpWYTlbunZw.Bxq0NaGz3sSragSltqJFLLYynL5nsn.', 68172, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
