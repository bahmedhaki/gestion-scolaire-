-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 26 avr. 2018 à 17:43
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_school`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences`
--

DROP TABLE IF EXISTS `absences`;
CREATE TABLE IF NOT EXISTS `absences` (
  `id_etudiant` int(5) NOT NULL,
  `date` date NOT NULL,
  `heur_debut` time NOT NULL,
  `heur_fin` time NOT NULL,
  `presence` varchar(10) NOT NULL,
  `commentaire` varchar(500) NOT NULL,
  `justifier` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `code_class` int(11) NOT NULL AUTO_INCREMENT,
  `nivea_scolaire` varchar(30) NOT NULL,
  `section` varchar(10) NOT NULL,
  `annee_scolaire` year(4) NOT NULL,
  PRIMARY KEY (`code_class`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `code_coure` int(11) NOT NULL AUTO_INCREMENT,
  `code_class` int(11) NOT NULL,
  `ceoffesion` int(11) NOT NULL,
  `module` varchar(20) NOT NULL,
  PRIMARY KEY (`code_coure`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `address` varchar(25) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `code_class` int(11) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `code_note` int(11) NOT NULL AUTO_INCREMENT,
  `code_class` int(11) NOT NULL,
  `code_coure` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `devoir1` float NOT NULL,
  `devoir2` float NOT NULL,
  `examan` float NOT NULL,
  `control` float NOT NULL,
  `note` float NOT NULL,
  `resultat` float NOT NULL,
  `note_semester` float NOT NULL,
  `note_annualle` float NOT NULL,
  `code_etud` int(11) NOT NULL,
  PRIMARY KEY (`code_note`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prof`
--

DROP TABLE IF EXISTS `prof`;
CREATE TABLE IF NOT EXISTS `prof` (
  `code_prof` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(25) NOT NULL,
  `prenom` int(25) NOT NULL,
  `telephone` int(20) NOT NULL,
  `sex` int(10) NOT NULL,
  `address` int(30) NOT NULL,
  `photo` int(20) NOT NULL,
  PRIMARY KEY (`code_prof`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type_user` text NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user`, `password`, `type_user`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('prof', '81dc9bdb52d04dc20036dbd8313ed055', 'prof'),
('etudiant', '912e79cd13c64069d91da65d62fbb78c', 'etudiant');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
