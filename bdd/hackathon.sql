-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 19 Mars 2016 à 13:21
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hackathon` 
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Texte` text NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `offre` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `dfxghj` (`utilisateur`),
  KEY `fgfds` (`offre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`ID`, `Texte`, `utilisateur`, `offre`) VALUES
(1, 'Projet de fou furieux !', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `offreent`
--

DROP TABLE IF EXISTS `offreent`;
CREATE TABLE IF NOT EXISTS `offreent` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Entreprise` varchar(255) NOT NULL,
  `MaquetteUnity` int(11) NOT NULL,
  `Projet` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Prix` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `jdfsoig` (`Projet`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `offreent`
--

INSERT INTO `offreent` (`ID`, `Entreprise`, `MaquetteUnity`, `Projet`, `Description`, `Prix`) VALUES
(2, 'InnoConcept', 1, 1, 'Voici le projet de InnoConcept pour l''aménagement du centre-ville de Laval', 5000000);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) DEFAULT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`ID`, `Nom`, `Description`) VALUES
(1, 'Aménagement centre-ville', 'Dans l''optique de dynamiser le centre-ville de Laval, la municipalité propose les projets suivants.\r\n\r\nNotre but est d''améliorer le confort piétonnier des habitants pour favoriser les commerces du centre-ville.');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `Pseudo`) VALUES
(1, 'stDupont@gmail.com'),
(2, 'test@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Etat` tinyint(1) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `offre` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `njcvb` (`utilisateur`),
  KEY `dsfkjg` (`offre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateur` (`ID`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`offre`) REFERENCES `offreent` (`ID`);

--
-- Contraintes pour la table `offreent`
--
ALTER TABLE `offreent`
  ADD CONSTRAINT `offreent_ibfk_1` FOREIGN KEY (`Projet`) REFERENCES `projet` (`ID`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateur` (`ID`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`offre`) REFERENCES `offreent` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
