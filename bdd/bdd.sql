-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : lun. 23 jan. 2023 à 08:36
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
-- Structure de la table `actionréalisée`
--

DROP TABLE IF EXISTS `actionréalisée`;
CREATE TABLE IF NOT EXISTS `actionréalisée` (
  `idAction` int(11) NOT NULL AUTO_INCREMENT,
  `libelleAction` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idAction`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

DROP TABLE IF EXISTS `avoir`;
CREATE TABLE IF NOT EXISTS `avoir` (
  `idInter` int(11) NOT NULL,
  `idConditonsMeteos` int(11) NOT NULL,
  PRIMARY KEY (`idInter`,`idConditonsMeteos`),
  KEY `idConditonsMeteos` (`idConditonsMeteos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `a_une_precision`
--

DROP TABLE IF EXISTS `a_une_precision`;
CREATE TABLE IF NOT EXISTS `a_une_precision` (
  `idInter` int(11) NOT NULL,
  `idPrecision` int(11) NOT NULL,
  PRIMARY KEY (`idInter`,`idPrecision`),
  KEY `idPrecision` (`idPrecision`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `a_une_precision`
--

INSERT INTO `a_une_precision` (`idInter`, `idPrecision`) VALUES
(1, 6),
(1, 8),
(2, 12),
(3, 4),
(3, 5),
(4, 1),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(8, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cei`
--

DROP TABLE IF EXISTS `cei`;
CREATE TABLE IF NOT EXISTS `cei` (
  `idCEI` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCEI` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCEI`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `cei`
--

INSERT INTO `cei` (`idCEI`, `libelleCEI`) VALUES
(1, 'Champigny'),
(2, 'Villeparisis'),
(3, 'Brie-Comte-Robert'),
(4, 'Rosny'),
(5, 'Saint-Denis'),
(6, 'Eragny'),
(7, 'Fontenay'),
(8, 'Boulogne'),
(9, 'Rocquencourt'),
(10, 'Orgeval'),
(11, 'Jouy-en-Josas'),
(12, 'Plaisir'),
(13, 'Maulette'),
(14, 'Trappes'),
(15, 'Ablis'),
(16, 'Nanterre'),
(17, 'Villabé'),
(18, 'Orsay'),
(19, 'Chevilly-Larue');

-- --------------------------------------------------------

--
-- Structure de la table `conditionsmeteos`
--

DROP TABLE IF EXISTS `conditionsmeteos`;
CREATE TABLE IF NOT EXISTS `conditionsmeteos` (
  `idConditonsMeteos` int(11) NOT NULL AUTO_INCREMENT,
  `libelleConditionsMeteos` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idConditonsMeteos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `idInter` int(11) NOT NULL,
  `idVoie` int(11) NOT NULL,
  PRIMARY KEY (`idInter`,`idVoie`),
  KEY `idVoie` (`idVoie`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`idInter`, `idVoie`) VALUES
(1, 1),
(3, 1),
(3, 2),
(4, 5),
(5, 2),
(5, 3),
(6, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ddp`
--

DROP TABLE IF EXISTS `ddp`;
CREATE TABLE IF NOT EXISTS `ddp` (
  `idDDP` int(11) NOT NULL AUTO_INCREMENT,
  `natureDegat` varchar(50) DEFAULT NULL,
  `unite` varchar(50) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDDP`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `ddp`
--

INSERT INTO `ddp` (`idDDP`, `natureDegat`, `unite`, `quantite`) VALUES
(1, 'Glissières', 'm', 2);

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

DROP TABLE IF EXISTS `employer`;
CREATE TABLE IF NOT EXISTS `employer` (
  `idInter` int(11) NOT NULL,
  `idMoyensHumains` int(11) NOT NULL,
  PRIMARY KEY (`idInter`,`idMoyensHumains`),
  KEY `idMoyensHumains` (`idMoyensHumains`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_intervention`
--

DROP TABLE IF EXISTS `fiche_intervention`;
CREATE TABLE IF NOT EXISTS `fiche_intervention` (
  `idInter` int(11) NOT NULL AUTO_INCREMENT,
  `dateInter` date DEFAULT NULL,
  `heureInter` time DEFAULT current_timestamp(),
  `commentaireInter` varchar(50) DEFAULT NULL,
  `origineInter` varchar(50) DEFAULT NULL,
  `axeInter` varchar(50) DEFAULT NULL,
  `sensIntervention` varchar(50) DEFAULT NULL,
  `localisationInter` varchar(50) DEFAULT NULL,
  `communeInter` varchar(50) DEFAULT NULL,
  `heureArriveeInter` time DEFAULT current_timestamp(),
  `heureDepartInter` time DEFAULT current_timestamp(),
  `etatChausseeInter` varchar(50) DEFAULT NULL,
  `heureDebutInter` time DEFAULT current_timestamp(),
  `heureFinInter` time DEFAULT current_timestamp(),
  `typeInter` varchar(50) DEFAULT NULL,
  `circonstanceInter` varchar(50) DEFAULT NULL,
  `presenceTiers` tinyint(1) DEFAULT NULL,
  `idDDP` int(11) DEFAULT NULL,
  `idCEI` int(11) DEFAULT NULL,
  PRIMARY KEY (`idInter`),
  KEY `idDDP` (`idDDP`),
  KEY `FK_fiche_cei` (`idCEI`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `fiche_intervention`
--

INSERT INTO `fiche_intervention` (`idInter`, `dateInter`, `heureInter`, `commentaireInter`, `origineInter`, `axeInter`, `sensIntervention`, `localisationInter`, `communeInter`, `heureArriveeInter`, `heureDepartInter`, `etatChausseeInter`, `heureDebutInter`, `heureFinInter`, `typeInter`, `circonstanceInter`, `presenceTiers`, `idDDP`, `idCEI`) VALUES
(3, '2023-01-20', '12:04:42', NULL, 'OST', '', 'W', '', NULL, '12:04:42', '12:04:42', NULL, '14:04:00', '15:04:00', 'Animaux', NULL, NULL, NULL, NULL),
(4, '2023-01-20', '12:05:24', NULL, 'OST', 'ceci est un axe', 'W', 'ceci est une localisation', NULL, '12:05:24', '12:05:24', NULL, '16:05:00', '17:05:00', 'Accident', NULL, NULL, NULL, NULL),
(5, '2023-01-20', '12:12:57', NULL, 'OST', '', 'W', '', NULL, '12:12:57', '12:12:57', NULL, '17:12:00', '16:12:00', 'Accident', NULL, 1, 0, NULL),
(2, '2023-01-07', '08:21:04', 'Ceci est un commentaire 2', 'Police', '', 'Y', '', 'Ceci est une commune 2', '00:00:08', '00:00:12', 'Chaussée mouillée', '13:39:50', '13:39:50', 'Animaux', 'Ceci est une circonstance 2', 0, 0, NULL),
(1, '2023-01-17', '12:00:48', 'Ceci est un commentaire', 'OST', 'axe 1', 'EXT', 'localisation 1', 'Ceci est une commune', '18:30:48', '20:00:00', NULL, '13:40:12', '13:40:12', 'Accident', 'Ceci est une circonstance', 1, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `impliquer`
--

DROP TABLE IF EXISTS `impliquer`;
CREATE TABLE IF NOT EXISTS `impliquer` (
  `idInter` int(11) NOT NULL,
  `idVehicule` int(11) NOT NULL,
  PRIMARY KEY (`idInter`,`idVehicule`),
  KEY `idVehicule` (`idVehicule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

DROP TABLE IF EXISTS `intervenant`;
CREATE TABLE IF NOT EXISTS `intervenant` (
  `idIntervenant` int(11) NOT NULL AUTO_INCREMENT,
  `libelleIntervenant` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idIntervenant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `intervenir`
--

DROP TABLE IF EXISTS `intervenir`;
CREATE TABLE IF NOT EXISTS `intervenir` (
  `idInter` int(11) NOT NULL,
  `idIntervenant` int(11) NOT NULL,
  PRIMARY KEY (`idInter`,`idIntervenant`),
  KEY `idIntervenant` (`idIntervenant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `joindre`
--

DROP TABLE IF EXISTS `joindre`;
CREATE TABLE IF NOT EXISTS `joindre` (
  `idInter` int(11) NOT NULL,
  `idPhoto` int(11) NOT NULL,
  PRIMARY KEY (`idInter`,`idPhoto`),
  KEY `idPhoto` (`idPhoto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `moyenshumains`
--

DROP TABLE IF EXISTS `moyenshumains`;
CREATE TABLE IF NOT EXISTS `moyenshumains` (
  `idMoyensHumains` int(11) NOT NULL AUTO_INCREMENT,
  `libelleMoyensHumains` varchar(50) DEFAULT NULL,
  `nbMoyensHumains` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMoyensHumains`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `moyensmatériels`
--

DROP TABLE IF EXISTS `moyensmatériels`;
CREATE TABLE IF NOT EXISTS `moyensmatériels` (
  `idMoyensMateriels` int(11) NOT NULL AUTO_INCREMENT,
  `libelleMoyensMateriels` varchar(50) DEFAULT NULL,
  `nbMoyenMateriel` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMoyensMateriels`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `photographie`
--

DROP TABLE IF EXISTS `photographie`;
CREATE TABLE IF NOT EXISTS `photographie` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `lienPhoto` varchar(50) NOT NULL,
  PRIMARY KEY (`idPhoto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

DROP TABLE IF EXISTS `posseder`;
CREATE TABLE IF NOT EXISTS `posseder` (
  `idInter` int(11) NOT NULL,
  `idMoyensMateriels` int(11) NOT NULL,
  PRIMARY KEY (`idInter`,`idMoyensMateriels`),
  KEY `idMoyensMateriels` (`idMoyensMateriels`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `precisionintervention`
--

DROP TABLE IF EXISTS `precisionintervention`;
CREATE TABLE IF NOT EXISTS `precisionintervention` (
  `idPrecision` int(11) NOT NULL AUTO_INCREMENT,
  `niveauPrecision` int(11) DEFAULT NULL,
  `libellePrecision` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idPrecision`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `precisionintervention`
--

INSERT INTO `precisionintervention` (`idPrecision`, `niveauPrecision`, `libellePrecision`) VALUES
(1, 1, 'Matériel'),
(2, 1, 'Corporel'),
(3, 1, 'Mortel'),
(4, 1, 'Animal errant'),
(5, 1, 'Animal mort'),
(6, 1, 'Ralentissement'),
(7, 1, 'Circulation en accordéons'),
(8, 1, 'Circulation à l\'arrêt'),
(9, 1, 'Vent violent'),
(10, 1, 'Pluie violente'),
(11, 1, 'Chutes de neige violente'),
(12, 1, 'Inondation'),
(13, 1, 'Incendie'),
(14, 1, 'Chaussée glissante'),
(15, 1, 'Évènement inopinés'),
(16, 1, 'Obstacles'),
(17, 1, 'Piéton Cycliste'),
(18, 1, 'Véhicule génant'),
(19, 1, 'Véhicule à contresens'),
(20, 1, 'Véhicules arrêté'),
(21, 1, 'Introduction d\'un véhicule dans le balisage'),
(22, 1, 'Autres'),
(23, 1, 'Rebouchage d’un nid de poule'),
(24, 1, 'Épandage d’absorbant sur la chaussée ');

-- --------------------------------------------------------

--
-- Structure de la table `realiser`
--

DROP TABLE IF EXISTS `realiser`;
CREATE TABLE IF NOT EXISTS `realiser` (
  `idInter` int(11) NOT NULL,
  `idAction` int(11) NOT NULL,
  PRIMARY KEY (`idInter`,`idAction`),
  KEY `idAction` (`idAction`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `vehiculesimplique`
--

DROP TABLE IF EXISTS `vehiculesimplique`;
CREATE TABLE IF NOT EXISTS `vehiculesimplique` (
  `idVehicule` int(11) NOT NULL AUTO_INCREMENT,
  `typeVehicule` varchar(50) DEFAULT NULL,
  `genreVehicule` varchar(50) DEFAULT NULL,
  `nbVehicule` varchar(50) DEFAULT NULL,
  `marqueVehicule` varchar(50) DEFAULT NULL,
  `ImmitraculationVehicule` varchar(50) DEFAULT NULL,
  `degatsMaterielsVechicule` varchar(50) DEFAULT NULL,
  `dommagesCorporelsVehicule` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idVehicule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `voie`
--

DROP TABLE IF EXISTS `voie`;
CREATE TABLE IF NOT EXISTS `voie` (
  `idVoie` int(11) NOT NULL AUTO_INCREMENT,
  `libelleVoie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idVoie`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `voie`
--

INSERT INTO `voie` (`idVoie`, `libelleVoie`) VALUES
(1, 'BAU'),
(2, 'Voie lente'),
(3, 'Voie médiane'),
(4, 'Voie rapide'),
(5, 'TPC'),
(6, 'Accotement');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_accident`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_accident`;
CREATE TABLE IF NOT EXISTS `vue_accident` (
`idPrecision` int(11)
,`libellePrecision` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_animaux`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_animaux`;
CREATE TABLE IF NOT EXISTS `vue_animaux` (
`idPrecision` int(11)
,`libellePrecision` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_balisage`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_balisage`;
CREATE TABLE IF NOT EXISTS `vue_balisage` (
`idPrecision` int(11)
,`libellePrecision` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_bouchon`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_bouchon`;
CREATE TABLE IF NOT EXISTS `vue_bouchon` (
`idPrecision` int(11)
,`libellePrecision` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_chaussee`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_chaussee`;
CREATE TABLE IF NOT EXISTS `vue_chaussee` (
`idPrecision` int(11)
,`libellePrecision` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_intemp`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_intemp`;
CREATE TABLE IF NOT EXISTS `vue_intemp` (
`idPrecision` int(11)
,`libellePrecision` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_obstacle`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_obstacle`;
CREATE TABLE IF NOT EXISTS `vue_obstacle` (
`idPrecision` int(11)
,`libellePrecision` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la vue `vue_accident`
--
DROP TABLE IF EXISTS `vue_accident`;

DROP VIEW IF EXISTS `vue_accident`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_accident`  AS SELECT `precisionintervention`.`idPrecision` AS `idPrecision`, `precisionintervention`.`libellePrecision` AS `libellePrecision` FROM `precisionintervention` WHERE `precisionintervention`.`idPrecision` in (1,2,3)  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_animaux`
--
DROP TABLE IF EXISTS `vue_animaux`;

DROP VIEW IF EXISTS `vue_animaux`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_animaux`  AS SELECT `precisionintervention`.`idPrecision` AS `idPrecision`, `precisionintervention`.`libellePrecision` AS `libellePrecision` FROM `precisionintervention` WHERE `precisionintervention`.`idPrecision` in (4,5)  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_balisage`
--
DROP TABLE IF EXISTS `vue_balisage`;

DROP VIEW IF EXISTS `vue_balisage`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_balisage`  AS SELECT `precisionintervention`.`idPrecision` AS `idPrecision`, `precisionintervention`.`libellePrecision` AS `libellePrecision` FROM `precisionintervention` WHERE `precisionintervention`.`idPrecision` in (21,22)  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_bouchon`
--
DROP TABLE IF EXISTS `vue_bouchon`;

DROP VIEW IF EXISTS `vue_bouchon`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_bouchon`  AS SELECT `precisionintervention`.`idPrecision` AS `idPrecision`, `precisionintervention`.`libellePrecision` AS `libellePrecision` FROM `precisionintervention` WHERE `precisionintervention`.`idPrecision` in (6,7,8)  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_chaussee`
--
DROP TABLE IF EXISTS `vue_chaussee`;

DROP VIEW IF EXISTS `vue_chaussee`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_chaussee`  AS SELECT `precisionintervention`.`idPrecision` AS `idPrecision`, `precisionintervention`.`libellePrecision` AS `libellePrecision` FROM `precisionintervention` WHERE `precisionintervention`.`idPrecision` in (23,24,22)  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_intemp`
--
DROP TABLE IF EXISTS `vue_intemp`;

DROP VIEW IF EXISTS `vue_intemp`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_intemp`  AS SELECT `precisionintervention`.`idPrecision` AS `idPrecision`, `precisionintervention`.`libellePrecision` AS `libellePrecision` FROM `precisionintervention` WHERE `precisionintervention`.`idPrecision` in (9,10,11,12,13)  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_obstacle`
--
DROP TABLE IF EXISTS `vue_obstacle`;

DROP VIEW IF EXISTS `vue_obstacle`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_obstacle`  AS SELECT `precisionintervention`.`idPrecision` AS `idPrecision`, `precisionintervention`.`libellePrecision` AS `libellePrecision` FROM `precisionintervention` WHERE `precisionintervention`.`idPrecision` in (14,15,16,17,18,19,20)  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
