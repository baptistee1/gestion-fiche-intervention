-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : lun. 06 fév. 2023 à 09:20
-- Version du serveur : 10.10.2-MariaDB
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `fiche_intervention`
--

DROP TABLE IF EXISTS `fiche_intervention`;
CREATE TABLE IF NOT EXISTS `fiche_intervention` (
  `idInter` int(11) NOT NULL AUTO_INCREMENT,
  `dateInter` date DEFAULT NULL,
  `heureInter` time DEFAULT NULL,
  `commentaireInter` varchar(50) DEFAULT NULL,
  `origineInter` varchar(50) DEFAULT NULL,
  `axeInter` varchar(50) DEFAULT NULL,
  `sensIntervention` varchar(50) DEFAULT NULL,
  `localisationInter` varchar(50) DEFAULT NULL,
  `communeInter` varchar(50) DEFAULT NULL,
  `heureArriveeInter` time DEFAULT NULL,
  `heureDepartInter` time DEFAULT NULL,
  `etatChausseeInter` varchar(50) DEFAULT NULL,
  `heureDebutInter` time DEFAULT NULL,
  `heureFinInter` time DEFAULT NULL,
  `typeInter` varchar(50) DEFAULT NULL,
  `circonstanceInter` varchar(50) DEFAULT NULL,
  `presenceTiers` varchar(50) DEFAULT NULL,
  `idDDP` int(11) DEFAULT NULL,
  `idCEI` int(11) DEFAULT NULL,
  PRIMARY KEY (`idInter`),
  KEY `idDDP` (`idDDP`),
  KEY `FK_fiche_cei` (`idCEI`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `fiche_intervention`
--

INSERT INTO `fiche_intervention` (`idInter`, `dateInter`, `heureInter`, `commentaireInter`, `origineInter`, `axeInter`, `sensIntervention`, `localisationInter`, `communeInter`, `heureArriveeInter`, `heureDepartInter`, `etatChausseeInter`, `heureDebutInter`, `heureFinInter`, `typeInter`, `circonstanceInter`, `presenceTiers`, `idDDP`, `idCEI`) VALUES
(1, '2023-02-02', '15:48:00', '', 'Police', 'ceci est un axe', 'Y', '', '', '17:14:00', '17:14:00', 'Chaussée mouillée', '16:48:00', '17:48:00', NULL, NULL, 'on', 1, 5),
(2, '2023-02-02', '17:06:00', 'Ceci est une observation', 'OST', 'ceci est un axe', 'W', 'ceci est une localisation', '', '10:36:00', '13:36:00', NULL, '17:06:00', '17:06:00', NULL, NULL, NULL, NULL, 5),
(3, '2023-02-02', '18:58:00', '', 'OST', 'ceci est un axe', 'W', 'ceci est une localisation', NULL, NULL, NULL, NULL, '18:58:00', '19:58:00', 'none', NULL, NULL, NULL, 4),
(4, '2023-02-26', '11:41:00', '', 'OST', 'ceci est un axe', 'W', 'ceci est une localisation', NULL, NULL, NULL, NULL, '10:41:00', '12:41:00', 'Accident', NULL, NULL, NULL, 5),
(5, '2023-02-06', '12:01:00', '', 'Police', 'ceci est un axe', 'W', '', NULL, NULL, NULL, NULL, '11:01:00', '11:01:00', NULL, NULL, NULL, NULL, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
