-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 19 Mars 2014 à 11:03
-- Version du serveur: 5.6.14
-- Version de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projetIHM`
--

-- --------------------------------------------------------

--
-- Structure de la table `Habite`
--

CREATE TABLE IF NOT EXISTS `Habite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personne_id` int(11) DEFAULT NULL,
  `logement_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5639915DA21BD112` (`personne_id`),
  UNIQUE KEY `UNIQ_5639915D58ABF955` (`logement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Habite`
--

INSERT INTO `Habite` (`id`, `personne_id`, `logement_id`) VALUES
(1, 12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Logement`
--

CREATE TABLE IF NOT EXISTS `Logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numRue` int(11) NOT NULL,
  `nomRue` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Logement`
--

INSERT INTO `Logement` (`id`, `numRue`, `nomRue`, `ville`, `cp`) VALUES
(2, 42, 'cons', 'Le mans', 42000);

-- --------------------------------------------------------

--
-- Structure de la table `Mariage`
--

CREATE TABLE IF NOT EXISTS `Mariage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numSecu1` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `numSecu2` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `dateMariage` date NOT NULL,
  `villeMairie` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Mariage`
--

INSERT INTO `Mariage` (`id`, `numSecu1`, `numSecu2`, `dateMariage`, `villeMairie`) VALUES
(2, '852369', '4564566', '2009-03-01', 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
--

CREATE TABLE IF NOT EXISTS `Personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nsecu` int(30) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateNai` date NOT NULL,
  `villeNai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`id`, `Nsecu`, `nom`, `prenom`, `dateNai`, `villeNai`, `sexe`) VALUES
(11, 123, 'ENT', 'Loïc', '2009-01-01', 'Amiens', 'M'),
(12, 852369, 'BLOT', 'PA', '2012-08-10', 'Le Mans', 'M'),
(13, 4564566, 'BERTE', 'Agathe', '1994-05-12', 'Le Mans', 'F');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Habite`
--
ALTER TABLE `Habite`
  ADD CONSTRAINT `FK_5639915D58ABF955` FOREIGN KEY (`logement_id`) REFERENCES `Logement` (`id`),
  ADD CONSTRAINT `FK_5639915DA21BD112` FOREIGN KEY (`personne_id`) REFERENCES `Personne` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
