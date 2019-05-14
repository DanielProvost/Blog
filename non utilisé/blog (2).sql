-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 03 mai 2019 à 14:54
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`Id`, `Name`) VALUES
(1, 'Sport'),
(2, 'Jeux');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nickname` varchar(255) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Content` text NOT NULL,
  `PostId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `PostId` (`PostId`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`Id`, `Nickname`, `CreatedAt`, `Content`, `PostId`) VALUES
(4, 'Dan', '2019-03-28 13:54:26', 'Bonjour les pirates!', 3),
(31, 'Phil', '2019-04-04 10:43:22', 'Cool !', 1),
(27, 'Maya', '2019-03-29 15:40:36', 'Super', 3),
(26, 'Sofiane', '2019-03-29 13:25:44', 'Elle est super chouette ta page!', 2),
(22, 'Dan', '2019-03-29 09:44:09', 'Et vive le sport !', 1),
(20, 'Fab', '2019-03-29 09:42:52', 'C Super les pirates !', 2),
(32, 'Sergio', '2019-05-03 11:01:02', 'On reprend le post auj!', 3);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Content` text NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Category` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Category` (`Category`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`Id`, `Title`, `CreatedAt`, `Content`, `Image`, `Category`) VALUES
(1, 'Article1', '2019-03-21 13:30:35', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'image1.jpg', 1),
(2, 'Article2', '2019-03-21 13:31:34', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'image2.jpg', 2),
(3, 'Article3', '2019-03-21 13:32:14', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'image3.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Birthdate` date NOT NULL,
  `Adress` varchar(255) NOT NULL,
  `Zipcode` char(10) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Gender` enum('M.','MM') NOT NULL,
  `CreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `LastloginAt` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id`, `Email`, `Password`, `Firstname`, `Lastname`, `Birthdate`, `Adress`, `Zipcode`, `City`, `Gender`, `CreatedAt`, `LastloginAt`) VALUES
(13, 'dprovost67@gmail.com', '$2y$10$6DZRwDHtVhHtQZchDTkGOONe02df3OapAmwjtX1Pfo7CvfrL1v86a', 'Daniel', 'PROVOST', '1975-02-14', '', '', '', 'M.', '2019-04-08 10:04:10', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
