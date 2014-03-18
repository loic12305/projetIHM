-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 18 Mars 2014 à 01:25
-- Version du serveur: 5.6.12
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projetBDD`
--
CREATE DATABASE IF NOT EXISTS `projetBDD` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetBDD`;

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `datee`()
BEGIN
DECLARE num1,num2 INT;
SELECT numSecu1 INTO num1 FROM Mariage WHERE numSecu1=987 OR  numSecu2=987;
SELECT numSecu1 INTO num2 FROM Mariage WHERE numSecu1=456188 OR  numSecu1=456188;

IF num1 IS NOT NULL OR num2 IS NOT NULL THEN
	SELECT num1,num2;
END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `Adresses`
--

CREATE TABLE IF NOT EXISTS `Adresses` (
  `positionGPS` varchar(11) NOT NULL,
  `numRue` int(3) NOT NULL,
  `nomRue` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `cp` int(5) NOT NULL,
  PRIMARY KEY (`positionGPS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Adresses`
--

INSERT INTO `Adresses` (`positionGPS`, `numRue`, `nomRue`, `ville`, `cp`) VALUES
('1N,2E', 6, 'rue du choux', 'Paris', 98000),
('23N,5S', 39, 'rue des maraichers', 'Nantes', 44300);

-- --------------------------------------------------------

--
-- Structure de la table `Habite`
--

CREATE TABLE IF NOT EXISTS `Habite` (
  `numSecu` varchar(15) NOT NULL,
  `positionGPS` varchar(11) NOT NULL,
  `typeLog` varchar(15) NOT NULL,
  PRIMARY KEY (`numSecu`,`positionGPS`),
  KEY `positionGPS` (`positionGPS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Habite`
--

INSERT INTO `Habite` (`numSecu`, `positionGPS`, `typeLog`) VALUES
('096859478671254', '23N,5S', 'maison'),
('950496879605934', '23N,5S', 'maison');

-- --------------------------------------------------------

--
-- Structure de la table `Mariage`
--

CREATE TABLE IF NOT EXISTS `Mariage` (
  `numContrat` int(11) NOT NULL AUTO_INCREMENT,
  `numSecu1` varchar(15) NOT NULL,
  `numSecu2` varchar(15) NOT NULL,
  `dateM` date NOT NULL,
  `villeMairie` varchar(30) NOT NULL,
  PRIMARY KEY (`numContrat`),
  KEY `numSecu1` (`numSecu1`),
  KEY `numSecu2` (`numSecu2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Mariage`
--

INSERT INTO `Mariage` (`numContrat`, `numSecu1`, `numSecu2`, `dateM`, `villeMairie`) VALUES
(1, '096859478671254', '950496879605934', '2014-03-14', 'Nantes');

--
-- Déclencheurs `Mariage`
--
DROP TRIGGER IF EXISTS `check_before_insert`;
DELIMITER //
CREATE TRIGGER `check_before_insert` BEFORE INSERT ON `Mariage`
 FOR EACH ROW BEGIN

/* verifie la majoritée des maries*/
  DECLARE date DATE;
  DECLARE age DATE;
  DECLARE existe1,existe2 INT;
  
  SET date = DATE_SUB(CURDATE(),INTERVAL 18 YEAR);
  SELECT dateNai INTO age FROM Personnes WHERE Nsecu=NEW.numSecu1;
  IF age > date THEN
	SIGNAL SQLSTATE '45001' SET MESSAGE_TEXT = 'n est pas majeur';
  END IF;

  SELECT dateNai INTO age FROM Personnes WHERE Nsecu=NEW.numSecu2;
  IF age > date THEN
	  SIGNAL SQLSTATE '45001' SET MESSAGE_TEXT = 'n est pas majeur';
  END IF;

/*verifie que la personne ne se marie pas avec elle meme*/
  IF NEW.numSecu1 = NEW.numSecu2 THEN
	SIGNAL SQLSTATE '45002' SET MESSAGE_TEXT = 'Cette peronne ne peut pas se marier avec elle meme';
  END IF;



/*verifie que la personne n'est pas déja marié*/

/*le select numSecu1 est juste là pour retourne quelque chose*/
SELECT numSecu1 INTO existe1 FROM Mariage WHERE numSecu1=NEW.numSecu1 OR  numSecu2=NEW.numSecu1;
SELECT numSecu1 INTO existe2 FROM Mariage WHERE numSecu1=NEW.numSecu2 OR  numSecu2=NEW.numSecu2;

IF existe1 IS NOT NULL OR existe2 IS NOT NULL THEN
	SIGNAL SQLSTATE '45003' SET MESSAGE_TEXT = 'Une des peronnes est deja marie';
END IF;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `Personnes`
--

CREATE TABLE IF NOT EXISTS `Personnes` (
  `Nsecu` varchar(15) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dateNai` date NOT NULL,
  `villeNai` varchar(30) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  PRIMARY KEY (`Nsecu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Personnes`
--

INSERT INTO `Personnes` (`Nsecu`, `nom`, `prenom`, `dateNai`, `villeNai`, `sexe`) VALUES
('096777778456738', 'ENT', 'loïc', '1992-05-09', 'Amiens', 'M'),
('096859478671254', 'DEF', 'Sophie', '1989-02-12', 'Paris', 'F'),
('123456789101112', 'TRUC', 'Max', '2013-04-16', 'Nantes', 'H'),
('950496879605934', 'MOU', 'Paul', '1985-03-11', 'Dijon', 'M');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Habite`
--
ALTER TABLE `Habite`
  ADD CONSTRAINT `Habite_ibfk_1` FOREIGN KEY (`numSecu`) REFERENCES `Personnes` (`Nsecu`),
  ADD CONSTRAINT `Habite_ibfk_2` FOREIGN KEY (`positionGPS`) REFERENCES `Adresses` (`positionGPS`);

--
-- Contraintes pour la table `Mariage`
--
ALTER TABLE `Mariage`
  ADD CONSTRAINT `Mariage_ibfk_1` FOREIGN KEY (`numSecu1`) REFERENCES `Personnes` (`Nsecu`),
  ADD CONSTRAINT `Mariage_ibfk_2` FOREIGN KEY (`numSecu2`) REFERENCES `Personnes` (`Nsecu`);
--
-- Base de données: `projetIHM`
--
CREATE DATABASE IF NOT EXISTS `projetIHM` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetIHM`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Mariage`
--

INSERT INTO `Mariage` (`id`, `numSecu1`, `numSecu2`, `dateMariage`, `villeMairie`) VALUES
(1, '4564566', '852369', '2010-05-01', 'Le Mans');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
