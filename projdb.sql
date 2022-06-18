-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 09:47 PM
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
  `file_path` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `nom`, `user_id`, `upload_date`, `size`, `file_type`, `file_path`) VALUES
(1, 'hisokaaa.webp', 2, '25-05-22 02:55:14', 134432, 'webp', NULL),
(2, 'hisoka.webp', 2, '25-05-22 02:56:58', 357020, 'webp', NULL),
(3, 'hisoka.webp', 2, '25-05-22 02:59:53', 357020, 'webp', NULL),
(4, 'hisoka.webp', 2, '25-05-22 03:01:49', 357020, 'webp', NULL),
(5, 'haruo.webp', 2, '25-05-22 03:01:57', 138462, 'webp', NULL),
(6, 'haruo.webp', 2, '25-05-22 03:06:23', 138462, 'webp', NULL),
(7, 'haruo.webp', 2, '25-05-22 03:07:18', 138462, 'webp', NULL),
(8, 'anglais.png', 1, '2022-05-30T09:48:07.176Z', 144882, 'image/png', '1654731241405-anglais.png'),
(9, 'anglais.png', 1, '2022-05-30T09:48:07.176Z', 144882, 'image/png', '1654731376524-anglais.png'),
(11, 'attitude-2.jpg', 1, '2022-05-06T23:07:03.834Z', 68172, 'image/jpeg', '1654731939707-attitude-2.jpg'),
(12, 'black-developer-crop.png', 1, '2022-01-29T13:56:27.043Z', 90782, 'image/png', '1654733186141-black-developer-crop.png'),
(13, 'bg-crop.jpg', 0, '2022-02-02T00:20:00.897Z', 110809, 'image/jpeg', '1654735040214-bg-crop.jpg'),
(14, 'bg.png', 3, '2022-06-03T15:19:42.667Z', 57547, 'image/png', '1654735161928-bg.png'),
(15, 'Capturecc.PNG', 3, '2022-02-22T09:19:37.058Z', 405140, 'image/png', '1654737006977-Capturecc.PNG'),
(16, 'projet-fin-dannee.pdf', 3, '2022-01-27T19:56:34.866Z', 583233, 'application/pdf', '1654766622177-projet-fin-dannee.pdf'),
(17, '8e15638d-407e-4e82-b6ff-b4a7826d3e93.jpg', 3, '2022-05-04T14:40:14.978Z', 60281, 'image/jpeg', '1654772785735-8e15638d-407e-4e82-b6ff-b4a7826d3e93.jpg'),
(18, 'mohammed-ali.mp4', 3, '2022-05-09T12:23:23.449Z', 6666260, 'video/mp4', '1654952989201-mohammed-ali.mp4'),
(19, 'Diagrammes d\'activité.png', 0, '13-06-22 03:13:14', 76257, 'png', NULL),
(20, 'error-macos.png', 3, '2022-06-14T09:14:04.423Z', 92489, 'image/png', '1655211215266-error-macos.png'),
(21, 'close.png', 10, '14-06-22 03:17:33', 992, 'png', NULL),
(22, 'error-macos.png', 19, '2022-06-14T09:14:04.423Z', 92489, 'image/png', '1655391786723-error-macos.png'),
(23, '3proj.png', 19, '2022-06-15T10:46:19.385Z', 40799, 'image/png', '1655391831368-3proj.png'),
(24, '3proj.png', 19, '2022-06-15T10:46:19.385Z', 40799, 'image/png', '1655391897611-3proj.png'),
(40, 'admin.png', 25, '2022-06-09T01:44:23.187Z', 31869, 'image/png', '1655572168069-admin.png'),
(41, 'banner-okacodehub.png', 25, '2022-05-16T21:03:17.619Z', 643963, 'image/png', '1655572177295-banner-okacodehub.png'),
(26, 'BLED vocabulaire anglais.pdf', 3, '2022-06-02T09:08:44.503Z', 14773600, 'application/pdf', '1655430556090-BLED vocabulaire anglais.pdf'),
(27, 'access-new-url.png', 3, '2022-06-15T22:06:04.532Z', 33366, 'image/png', '1655461108836-access-new-url.png'),
(28, 'active-directory-1.png', 3, '2022-06-15T12:04:17.566Z', 474041, 'image/png', '1655461508014-active-directory-1.png'),
(29, 'active-directory-3.png', 3, '2022-06-15T12:06:59.920Z', 112911, 'image/png', '1655461515846-active-directory-3.png'),
(30, 'Dag001.png', 3, '2022-06-15T12:45:44.685Z', 81490, 'image/png', '1655461528830-Dag001.png'),
(31, '9f7b425da79d46c3bda4fb0da81c81.png', 20, '17-06-22 06:12:56', 74899, 'png', NULL),
(32, 'barcamp-site.png', 20, '17-06-22 06:13:25', 1035380, 'png', NULL),
(33, 'black-developer-crop.png', 20, '17-06-22 06:13:50', 90782, 'png', NULL),
(34, 'icon-images_anonymous-12f39ec1-5414-44ad-bf37-34c766442ee2.webp', 20, '17-06-22 06:14:07', 2946, 'webp', NULL),
(42, 'facture-ecole241.pdf', 25, '2022-01-21T13:12:37.689Z', 129334, 'application/pdf', '1655572188681-facture-ecole241.pdf'),
(39, 'banner-okacodehub.png', 24, '18-06-22 12:53:41', 643963, 'png', '1655506421banner-okacodehub.png'),
(43, 'mohammed-ali.mp4', 25, '2022-05-09T12:23:23.449Z', 6666260, 'video/mp4', '1655572284876-mohammed-ali.mp4'),
(44, 'mohammed-ali.mp4', 24, '18-06-22 08:06:39', 6666260, 'mp4', '1655575599mohammed-ali.mp4'),
(45, 'facture-ecole241.pdf', 24, '18-06-22 09:39:41', 129334, 'pdf', '1655581181facture-ecole241.pdf');

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
(21, 'Dave', 'dave@gmail.com', '$2y$10$FkIUkU0.riIwVZV9Jmp4xeoxpTWBUzOyAyY6kqlOJDeVlibRSNM8S', 0, 0),
(3, 'dada', 'dada@gmail.com', '$2a$10$xlObgoJLVN6wY2JpYl2EcOCgn90KS8fdVminJijgzbhP/UC6isjfO', 23340324, 0),
(20, 'Test', 'test@gmail.com', '$2y$10$PYXnC221rosaW5Aznyvj0.5sn2HLAR087FSeXeCciOPG7m98p5hO.', NULL, 1),
(5, 'laurion', 'laurion@gmail.com', '$2a$10$AbjCBqLHNsPR2mI.pYZYgOAavvM.Rl7r0bEeB3HmCQxh9vaMo5APi', 0, 0),
(25, 'Kira', 'kira.mahieddine@yahoo.fr', '$2a$10$A835pyjX76C9uIVv7gYe5.keFc32KG8vnwJjEcgmOgP5YZlGZwViG', 0, 0),
(23, 'Emmanuel', 'emmanuel@gmail.com', '$2y$10$ksNpYnR6O/1OYolvSInkpehKbFNUQmIEZ7OGSGp70hbdniI47W.x.', 0, 0),
(24, 'pierre@gmail.com', 'pierre@gmail.com', '$2y$10$KldKrmU7K7cpekncdNeGNewLmDQXMbQ7.KYUj0HZuFkTj7/Ggsecy', 0, 0),
(14, 'dada', 'kld@gmail.com', '$2a$10$Dh09zveNFa6EdY97r6NStOoVVwA4wFf1SOQrs.nZeW68PlQUvrTQ2', 0, 0),
(22, 'Franck', 'franck@gmail.com', '$2y$10$6m6tYxv/t7p11qLhNGpJzO8EcQ1Gdxv.e5h0q2WdJvdVk32rItG32', 0, 0),
(19, 'DevJs', 'devJs@gmail.com', '$2a$10$J7WPCgcDpbdK3xAiAGo.Wuc8u1Tig4mqnSXXv1Ow1YAAZhFmPtaam', 0, 0),
(17, 'Dareich', 'dareich@gmail.com', '$2a$10$HoM7P9ihTBPqO36bD5viNeSyuMi9Jw/PCTMyuWFlODJ/nVtmf62fC', 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
