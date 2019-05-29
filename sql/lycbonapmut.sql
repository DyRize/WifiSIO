-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 08 déc. 2018 à 17:09
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lycbonapmut`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `mac` varchar(12) NOT NULL,
  `num` int(11) NOT NULL,
  `appareil` varchar(25) NOT NULL,
  `groupeUtilisateur` varchar(15) NOT NULL,
  `dateDemande` date NOT NULL,
  `etat` varchar(10) NOT NULL,
  PRIMARY KEY (`mac`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`mac`, `num`, `appareil`, `groupeUtilisateur`, `dateDemande`, `etat`) VALUES
('aaaaaaaaaaaa', 2, 'Autre', 'Enseignant', '2018-12-08', 'oui'),
('eeeeeeeeeeee', 2, 'Autre', 'Enseignant', '2018-12-08', ''),
('cccccccccccc', 2, 'Tablette', 'Enseignant', '2018-12-08', 'Demandé');

-- --------------------------------------------------------

--
-- Structure de la table `port_etudiant`
--

DROP TABLE IF EXISTS `port_etudiant`;
CREATE TABLE IF NOT EXISTS `port_etudiant` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `numGroupe` int(11) NOT NULL,
  `nom` char(32) NOT NULL,
  `prenom` char(32) NOT NULL,
  `mel` char(64) NOT NULL,
  `mdp` char(32) NOT NULL,
  `numexam` char(32) DEFAULT NULL,
  `valide` char(1) DEFAULT 'O',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `port_etudiant`
--

INSERT INTO `port_etudiant` (`num`, `numGroupe`, `nom`, `prenom`, `mel`, `mdp`, `numexam`, `valide`) VALUES
(216, 15, 'LE FLOUR', 'Dylan', 'dylan.leflour25@gmail.com', '25b1ee28401b26c2de1df6c474ceda27', NULL, 'O');

-- --------------------------------------------------------

--
-- Structure de la table `port_professeur`
--

DROP TABLE IF EXISTS `port_professeur`;
CREATE TABLE IF NOT EXISTS `port_professeur` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `nom` char(32) NOT NULL,
  `prenom` char(32) NOT NULL,
  `mel` char(64) NOT NULL,
  `mdp` char(32) NOT NULL,
  `niveau` int(11) NOT NULL,
  `valide` char(1) DEFAULT 'O',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `port_professeur`
--

INSERT INTO `port_professeur` (`num`, `nom`, `prenom`, `mel`, `mdp`, `niveau`, `valide`) VALUES
(1, 'ADMIN', 'Prof', 'prof.admin@gmail.com', '25b1ee28401b26c2de1df6c474ceda27', 0, 'O'),
(2, 'USER', 'Prof', 'prof.user@gmail.com', '25b1ee28401b26c2de1df6c474ceda27', 1, 'O');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
