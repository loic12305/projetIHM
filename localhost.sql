-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 24 Mars 2015 à 17:26
-- Version du serveur :  5.6.21
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projetIHM`
--
CREATE DATABASE IF NOT EXISTS `projetIHM` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetIHM`;

-- --------------------------------------------------------

--
-- Structure de la table `Habite`
--

CREATE TABLE IF NOT EXISTS `Habite` (
`id` int(11) NOT NULL,
  `personne_id` int(11) DEFAULT NULL,
  `logement_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Habite`
--

INSERT INTO `Habite` (`id`, `personne_id`, `logement_id`) VALUES
(2, 13, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Logement`
--

CREATE TABLE IF NOT EXISTS `Logement` (
`id` int(11) NOT NULL,
  `numRue` int(11) NOT NULL,
  `nomRue` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Logement`
--

INSERT INTO `Logement` (`id`, `numRue`, `nomRue`, `ville`, `cp`) VALUES
(2, 42, 'rue de la mouche', 'Le mans', 42000),
(3, 39, 'rue des Maraichers', 'Nantes', 44300);

-- --------------------------------------------------------

--
-- Structure de la table `Mariage`
--

CREATE TABLE IF NOT EXISTS `Mariage` (
`id` int(11) NOT NULL,
  `dateMariage` date NOT NULL,
  `villeMairie` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `personne1_id` int(11) DEFAULT NULL,
  `personne2_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
--

CREATE TABLE IF NOT EXISTS `Personne` (
`id` int(11) NOT NULL,
  `Nsecu` int(30) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateNai` date NOT NULL,
  `villeNai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`id`, `Nsecu`, `nom`, `prenom`, `dateNai`, `villeNai`, `sexe`) VALUES
(11, 123, 'ENT', 'Loïc', '2009-01-01', 'Amiens', 'M'),
(12, 852369, 'BLOT', 'PA', '2012-08-10', 'Le Mans', 'M'),
(13, 4564566, 'BERTE', 'Agathe', '1994-05-12', 'Le Mans', 'F');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'admin', 'admin', 'admin@test', 'admin@test', 1, 'e9v6qpesbdskg8800wkko0g4scosoo8', 'qXQAw6MWMC2H2XAgTogYxjkwEIuLMJpDdhsD2iZMvQmWyfOwTzFEIRhdKbFvSZVOA8WqdKsnigqMyeINxyoJWQ==', '2015-03-24 16:47:51', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Habite`
--
ALTER TABLE `Habite`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_5639915DA21BD112` (`personne_id`), ADD UNIQUE KEY `UNIQ_5639915D58ABF955` (`logement_id`);

--
-- Index pour la table `Logement`
--
ALTER TABLE `Logement`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Mariage`
--
ALTER TABLE `Mariage`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_E055D5BE2577470A` (`personne1_id`), ADD UNIQUE KEY `UNIQ_E055D5BE37C2E8E4` (`personne2_id`);

--
-- Index pour la table `Personne`
--
ALTER TABLE `Personne`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`), ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Habite`
--
ALTER TABLE `Habite`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Logement`
--
ALTER TABLE `Logement`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Mariage`
--
ALTER TABLE `Mariage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Personne`
--
ALTER TABLE `Personne`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Habite`
--
ALTER TABLE `Habite`
ADD CONSTRAINT `FK_5639915D58ABF955` FOREIGN KEY (`logement_id`) REFERENCES `Logement` (`id`),
ADD CONSTRAINT `FK_5639915DA21BD112` FOREIGN KEY (`personne_id`) REFERENCES `Personne` (`id`);

--
-- Contraintes pour la table `Mariage`
--
ALTER TABLE `Mariage`
ADD CONSTRAINT `FK_E055D5BE2577470A` FOREIGN KEY (`personne1_id`) REFERENCES `Personne` (`id`),
ADD CONSTRAINT `FK_E055D5BE37C2E8E4` FOREIGN KEY (`personne2_id`) REFERENCES `Personne` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
