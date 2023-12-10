-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 26 déc. 2021 à 04:31
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_bioluxoptical`
--

-- --------------------------------------------------------

--
-- Structure de la table `attribute`
--

CREATE TABLE `attribute` (
  `id_attrib` int(8) NOT NULL,
  `duration_prop` int(3) NOT NULL DEFAULT '0',
  `date_reg_prop` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description_prop` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_prop` varchar(44) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_img_attrib.png',
  `id_mag` int(4) NOT NULL,
  `id_mat` int(8) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `id_user` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `attribute`
--

INSERT INTO `attribute` (`id_attrib`, `duration_prop`, `date_reg_prop`, `description_prop`, `img_prop`, `id_mag`, `id_mat`, `quantity`, `id_user`) VALUES
(1, 1, '2021-10-15 13:44:10', 'Perçage haute précision en 3 dimensions\r\nFonctionnement sans eau\r\nMeulage simultané possible : perçage en temps masqué\r\nPilotage automatisé par la meuleuse\r\nDécoupe créative avec la Master HPE-8000', '1/surmesures3.png', 1, 3, 1, 1),
(2, 1, '2021-10-15 16:49:21', 'A modifer&nbsp;', '7/surmesures3.png', 7, 10, 1, 1),
(3, 720, '2021-10-15 16:52:38', 'Avec ou modifiable', '1/surmesures3.png', 1, 10, 6, 1),
(4, 720, '2021-10-19 14:51:32', '<ol><ol><li>Ecran tactile inclinable 9,7’’</li><li>LCD\r\n- Blocage manuel </li><li>Scan digital (reconnaissance, trous de perçage, gravure) </li><li>Caméra live </li><li>Modification de forme </li><li>Nouveau Software 2.0 </li><li>Interface ludique et...</li></ol></ol>', '12/SERMI_NEW_LOGO.png', 12, 5, 2, 8),
(5, 720, '2021-10-26 17:48:27', '<u>Core </u><b>i7235</b><br><i>DELL </i>Latitude', '12/shicEtRebelle.png', 12, 24, 2, 8),
(6, 720, '2021-10-26 18:21:16', 'Huvitz cherche toujours à répondre à vos questions\r\net souhaits. Le résultat est le HLM-9000 renforcé\r\navec capteur Hartmann et son design curviligne.', '1/5d12be8d2d63f3b6197.jpg', 1, 17, 1, 8),
(7, 720, '2021-10-28 17:35:29', '<ol><ol><li>Ecran tactile inclinable 9,7’’</li><li>LCD\r\n- Blocage manuel </li><li>Scan digital (reconnaissance, trous de perçage, gravure) </li><li>Caméra live </li><li>Modification de forme </li><li>Nouveau Software 2.0 </li><li>Interface ludique et...</li></ol></ol>', '13/services.png', 13, 5, 1, 8),
(8, 1, '2021-10-29 00:42:42', 'Huvitz cherche toujours à répondre à aux questions\r\net souhaits. Le résultat est le HLM-9000 renforcé\r\navec capteur Hartmann et son design curviligne.', '12/progressive.png', 12, 17, 1, 8),
(9, 360, '2021-11-01 18:44:49', '±0.25 ou ±0.50', '1/surmesures3.png', 1, 22, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `bo_sessions`
--

CREATE TABLE `bo_sessions` (
  `session_id` int(17) NOT NULL,
  `ip_address` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` varchar(89) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(8) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_cat` int(2) NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `generation` text COLLATE utf8mb4_unicode_ci,
  `label` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(8) NOT NULL,
  `img_cat` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_cat` int(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_cat`, `date_reg`, `generation`, `label`, `id_user`, `img_cat`, `article`, `state_cat`) VALUES
(1, '2021-08-29 15:00:00', 'Asterix', 'GENRE', 8, '1/genre.png', 'LUNETTE', 1),
(2, '2021-08-29 16:00:00', 'asterix', 'FORME', 8, '2/forme.jpg', 'LUNETTE', 1),
(3, '2021-08-30 09:00:00', 'asterix', 'PROGESSIFS', 8, '3/progressive.png', 'VERRE', 1),
(4, '2021-08-30 20:00:00', '----------------------', 'DOUBLE FOYER', 8, '4/double_foyer.png', 'VERRE', 1),
(5, '2021-08-30 06:32:43', NULL, 'TEINTE', 8, '8/teinte.png', 'VERRE', 1),
(6, '2021-08-30 04:27:40', NULL, 'COULEUR', 8, '8/couleur.png', 'LUNETTE', 1),
(7, '2021-09-07 00:00:00', 'Universelle', 'SERVICE', 8, '7/services.png', 'SERVICE', -1),
(8, '0000-00-00 00:00:00', 'Obelisque', 'MULTIFOCAL', 8, '8/progressives.jpg', 'VERRE', 0),
(9, '2021-10-29 00:40:20', 'Petit et grand', 'TESTE', 8, '/services.png', 'SERVICE', 0);

-- --------------------------------------------------------

--
-- Structure de la table `communicate`
--

CREATE TABLE `communicate` (
  `id_com` int(8) NOT NULL,
  `date_init` datetime NOT NULL,
  `subject` varchar(44) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrip` text COLLATE utf8mb4_unicode_ci,
  `date_end` datetime DEFAULT NULL,
  `id_user` int(8) DEFAULT NULL,
  `pattern` varchar(103) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_com` varchar(31) COLLATE utf8mb4_unicode_ci DEFAULT 'fa fa-group',
  `state` int(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `communicate`
--

INSERT INTO `communicate` (`id_com`, `date_init`, `subject`, `descrip`, `date_end`, `id_user`, `pattern`, `img_com`, `state`) VALUES
(1, '2021-09-05 10:39:00', 'Les lunettes shadows', NULL, NULL, 1, 'FORUM', '1/shicEtRebelle.png', 1),
(2, '2021-09-07 00:00:00', 'TEMOIGNAGE', 'Vos remarques, exigences, témoignages et propositions sont la preuve de \r\nnotre mobilisation de tous les jours, de toujours et pour vous, \r\ntoujours.                \r\n<div>\r\n                  \r\n                </div>                \r\n                <div>\r\n                  \r\n                </div>                \r\n                <div>\r\n                  \r\n                </div>\r\n              <br>              <br>', '2021-09-07 00:00:00', 1, 'TEMOIGNAGE', 'fa fa-group', 1),
(3, '2021-09-09 16:45:26', 'LIRE PLUS', NULL, '2021-09-09 16:45:26', 1, 'LIRE', 'fa fa-group', 1),
(4, '2021-09-24 04:55:23', 'CONSEIL', '<div>                Texte avant la liste des conseils. <br></div><div>Ajout Un ! <br></div><div>Ajout deux ? <br></div><div>Ajout 3 ! Enfin !<br></div>', NULL, 1, 'CONSEIL', 'fa fa-group', 1),
(5, '2021-09-28 15:15:37', 'CONTACT', 'Vos remarques, exigences, témoignages et propositions sont les Bienvenus.', NULL, 1, 'CONTACT', 'fa fa-phone-square', 1),
(6, '2021-10-06 00:00:00', 'NEWSLETTER', NULL, NULL, 1, NULL, 'fa fa-group', 1),
(7, '2021-04-30 13:33:43', 'CONDITIONS GENERALES', 'Ici une description des conditions générales d\'une du site.', '2021-04-30 13:33:43', 8, 'FORUM_CONDICION', '7/forum.jpg', 1),
(17, '2021-04-29 13:50:42', 'Les Lunettes Universel', 'sqefseipfuojs seoihze\'s seroihrzes<br>', NULL, 1, 'FORUM', '1/lunettesEssaisUniverselle.png', 0),
(18, '2021-04-29 13:51:05', 'Les Lunettes Universelles', 'sqefseipfuojs seoihze\'s seroihrzes<br>', NULL, 1, 'FORUM', '1/lunettesEssaisUniverselle.png', 0),
(26, '2021-04-29 13:55:39', 'Les Lunettes Universel', 'sqefseipfuojs seoihze\'s seroihrzes<br>', NULL, 1, 'FORUM', '1/lunettesEssaisUniverselle.png', 1),
(27, '2021-04-29 13:57:24', 'Les Lunettes Universel', 'sqefseipfuojs seoihze\'s seroihrzes<br>', NULL, 1, 'FORUM', '1/lunettesEssaisUniverselle.png', 1),
(28, '2021-04-29 13:57:35', 'Les Lunettes Universel', 'sqefseipfuojs seoihze\'s seroihrzes<br>', NULL, 1, 'FORUM', '1/lunettesEssaisUniverselle.png', 0),
(30, '2021-04-29 13:59:08', 'Les Lunettes Universel', 'sqefseipfuojs seoihze\'s seroihrzes<br>', NULL, 1, 'FORUM', '1/lunettesEssaisUniverselle.png', 1),
(31, '2021-04-29 13:59:44', 'Les Lunettes Universel', 'sqefseipfuojs seoihze\'s seroihrzes<br>', NULL, 1, 'FORUM', '1/lunettesEssaisUniverselle.png', 0),
(32, '2021-04-29 14:00:06', 'Les Lunettes Universel', 'sqefseipfuojs seoihze\'s seroihrzes<br>', NULL, 1, 'FORUM', '1/lunettesEssaisUniverselle.png', 1),
(33, '2021-04-29 14:04:33', 'Présentoire en colone', 'Efficace dans la présentation de montures en présentiel.<br>', NULL, 1, 'FORUM', '1/presentoireColonne.png', 1),
(34, '2021-04-29 17:26:24', 'Un autre sujet', 'Un autre sujet Description du thème à aborder * :e  Un autre sujet Un autre sujet<br><br><br><br><br>', '2021-05-13 00:00:00', 1, 'FORUM', '1/5d12be8d2d63f3b6197.jpg', 2),
(36, '2021-10-25 12:09:18', 'se5ydrh', 'se4jhtnse5tjn zsdrb', NULL, 1, 'FORUM', '0/defaultImgCom.png', -1),
(37, '2021-12-11 07:21:33', '17', 'Description donnée par le patient / client', '2021-12-12 16:11:18', 2, 'CONSULTATION', 'fa fa-group', 1),
(38, '0000-00-00 00:00:00', '17', 'Une autre description deonnée par le client', NULL, 3, 'CONSULTATION', 'fa fa-group', 0),
(39, '2021-12-12 06:12:00', '26', 'Encore une autre description donnée par le client', NULL, NULL, 'CONSULTATION', 'fa fa-group', -1),
(40, '0000-00-00 00:00:00', '17', 'Mots de tête toute les journées', NULL, 2, 'CONSULTATION', 'fa fa-group', -1),
(41, '0000-00-00 00:00:00', '17', 'Mots de tête toute les journées', NULL, 5, 'CONSULTATION', 'fa fa-group', -1),
(42, '0000-00-00 00:00:00', '17', 'Mots de tête toute les journées', NULL, 7, 'CONSULTATION', 'fa fa-group', 0),
(43, '2021-12-12 20:38:38', '17', 'Mots de tête toute les journées', NULL, NULL, 'CONSULTATION', 'fa fa-group', -1),
(44, '2021-12-12 20:40:01', '17', 'Mots de tête toute les journées', NULL, NULL, 'CONSULTATION', 'fa fa-group', -1),
(45, '2021-12-12 20:40:30', '17', 'Mots de tête toute les journées', NULL, NULL, 'CONSULTATION', 'fa fa-group', -1),
(46, '0000-00-00 00:00:00', '25', 'Ma première consultation', NULL, 7, 'CONSULTATION', 'fa fa-group', 0),
(47, '2021-12-13 06:24:13', 'Forum de teste', 'Il n\'y aura rien à faire : rien de rien', '2021-12-13 06:24:22', 1, 'FORUM', '1/manequin03.png', 1),
(53, '2021-12-16 19:47:09', '39', 'Ceci est une description de mon mal', NULL, NULL, 'CONSULTATION', 'fa fa-group', -1);

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `id_country` int(2) NOT NULL,
  `name_country` varchar(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_flag` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_zone` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '(+237)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id_country`, `name_country`, `img_flag`, `num_zone`) VALUES
(1, 'Cameroun', 'cameroun.png', '(+237)'),
(2, 'Congo', 'congo.png', '(+243)'),
(3, 'Côte d\'Ivoire', 'coteivoire.png', '(+225)');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `id_costomer` int(8) NOT NULL,
  `fname_cost` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sname_cost` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` tinyint(1) NOT NULL,
  `id_slice_age` int(2) NOT NULL,
  `profession` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_cost` varchar(53) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date_cost` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password_cost` varchar(103) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_img` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT 'defaultMan.png',
  `id_user` int(8) DEFAULT NULL,
  `id_country` int(2) DEFAULT NULL,
  `state_account` int(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id_costomer`, `fname_cost`, `sname_cost`, `genre`, `id_slice_age`, `profession`, `email_cost`, `phone`, `reg_date_cost`, `password_cost`, `profile_img`, `id_user`, `id_country`, `state_account`) VALUES
(1, 'admin', 'ADMINISTRATEUR', 1, 3, 'ADMINISTRATEUR', 'info@bioluxoptical.com', '698204289', '2021-09-09 17:12:52', 'ea7c525fee263d03ca145e58281dce8f220218cf', 'profile_adm00.png', 1, 1, 1),
(8, 'BIOLUXOPTICAL', NULL, 1, 4, 'ADMINISTRATEUR', 'mbouchebomdaulriche@gmail.com', '675776125', '2021-05-03 17:56:05', 'ea7c525fee263d03ca145e58281dce8f220218cf', 'defaultMan.png', 8, 1, 1),
(15, 'Utilisateur', 'Test', 1, 3, '0', 'test@gmail.com', '698204289', '2021-09-22 19:05:05', '123456789àhacher', 'defaultMan.png', 1, 1, 1),
(17, 'TCHAWO BOMDA', 'Charmaline', 0, 2, 'ETUDIANT', 'charmeline123@gmail.com', '2154277782', '2021-09-05 00:00:00', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', '1/manequin04.jpg', NULL, 1, 1),
(21, 'Le Chapelier', 'Merveil', 1, 3, 'Dessinateur', 'alice@gmail.com', '676854855', '2021-09-05 00:00:00', '3c7435cfd4e31b9be3991041c9a4f8292b752e5b', '1/king.png', 1, 1, -1),
(22, 'NOUVELLE', 'TEST', 0, 2, 'TECHN', 'drgbdrmrf@gmail.com', '2154277782', '2021-09-05 00:00:00', 'a2527be74e139db702563dc49ac9b3244d379359', '2/manequin04.jpg', 1, 2, -1),
(23, 'SONIA', 'Manik', 1, 3, 'Manga k', NULL, '2154277782', '2021-09-05 00:00:00', '3c7435cfd4e31b9be3991041c9a4f8292b752e5b', '3/THEME.png', 1, 3, 1),
(24, 'MBOUCHE BOMDA', 'ULRIHE', 1, 2, 'Etudiant', NULL, '698204289', '2021-09-08 00:00:00', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', '1/addCard.png', 1, 1, -1),
(25, 'ROSTIN', '', 1, 3, 'Etudiant', 'rostin235@gmail.com', '698204289', '2021-09-08 00:00:00', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', '1/index.jpg', 1, 1, -1),
(26, 'DJIFFO', 'Angeline', 0, 4, 'E N S E I G N A N T', 'diffoangele@gmail.com', '677832828', '2021-09-08 00:00:00', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', '2/GUESS.png', 1, 2, 1),
(27, 'MBOUCHE BOMDA', 'ULRIHE', 1, 2, 'Eboueur', 'ulrichembouchebomda@gmail.com', '698204289', '2021-09-08 00:00:00', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', '1/board-2440249__340.jpg', 8, 1, -1),
(28, 'MBOUCHE BOMDA', 'ULRIHE', 1, 2, '2', 'ulrichembouchebomda@gmail.com', '698204289', '2021-09-08 00:00:00', '123456789', '1631079119ULRIHE.jpg', NULL, 1, -1),
(30, 'MBOUCHE BOMDA', 'ULRICHE', 1, 2, 'Analyste', 'ulrichembouchebomda@gmail.com', '123456789', '2021-09-08 00:00:00', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', '1631080787ULRIHE.jpg', NULL, 1, -1),
(31, 'LOUISA', 'NOSO', 0, 3, 'SECRETAIRE - Commerciale', 'louisa123@gmail.com', '672262043', '2021-09-08 00:00:00', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', '1/shicEtRebelle.png', NULL, 1, 1),
(32, 'TAVEA', 'FREDERIC', 1, 3, '1', 'frederictavea@gmail.com', '672242043', '2021-09-08 00:00:00', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', '1631108336FREDERIC.jpg', NULL, 1, -1),
(33, 'CHI12', 'SANDRINE', 0, 3, '', 'sandinechi@gmail.com', '679585865', '2021-09-09 00:00:00', 'ea7c525fee263d03ca145e58281dce8f220218cf', '1631150367SANDRINE.png', NULL, 1, -1),
(34, 'SANDRA', '', 0, 3, '3', 'sandra@gmail.com', '682345892', '2021-09-09 00:00:00', '7c33683cb42b6bdf0186cb8eed45ee041bd8c69f', '1631160541.jpg', NULL, 1, -1),
(35, 'SANDRA', '', 0, 3, '3', 'sandra@gmail.com', '682345892', '2021-09-09 00:00:00', '4abb220a07b7c5ff85b6d38d9089fbbf896533b7', '1631160627.jpg', NULL, 1, -1),
(37, 'SANDRA', '', 0, 3, '3', 'sandra@gmail.com', '682345892', '2021-09-09 00:00:00', '7c33683cb42b6bdf0186cb8eed45ee041bd8c69f', '1631160789.jpg', NULL, 1, -1),
(38, 'SANDRA', '', 0, 3, '3', 'sandra@gmail.com', '682345892', '2021-09-09 00:00:00', '7c33683cb42b6bdf0186cb8eed45ee041bd8c69f', '1631161042.jpg', NULL, 1, -1),
(39, 'King0707', 'LeGrand', 1, 3, 'ETUDIANT', 'ulrichembouchebomda@gmail.com', '698204289', '2021-09-23 00:00:00', '4abb220a07b7c5ff85b6d38d9089fbbf896533b7', '1632422311LeRoi.jpg', NULL, 1, 1),
(40, 'Tchawo', 'Charmeline', 0, 1, '3', 'mbouchebomdaulriche@yahoo.com', '676254855', '2021-09-25 00:00:00', 'ea7c525fee263d03ca145e58281dce8f220218cf', '1632572593.jpg', NULL, 2, 1),
(41, 'DrKing', 'maman', 2, 4, 'Menagere', NULL, '698204289', '2021-09-25 00:00:00', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', 'IMG-20190318-WA0055.jpg', 1, 3, -1),
(42, 'Jack S', 'Sparow', 0, 3, '1', 'jacksparow@gmail.com', '698204289', '2021-10-18 14:21:06', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', '2/1330940013845.jpg', NULL, 2, -1),
(43, 'Junior', 'le roi', 1, 3, 'A U T R E', 'leroijunior@yahoo.fr', '698204289', '2021-05-01 13:04:46', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', '1/AlbumArtSmall.jpg', NULL, 1, -1),
(44, 'Julienne', '', 0, 3, '1', 'julienne@gmail.com', '676524355', '2021-10-27 04:54:39', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', '1/banner_59fdfec851f2b.jpg', NULL, 1, -1);

-- --------------------------------------------------------

--
-- Structure de la table `customer_role`
--

CREATE TABLE `customer_role` (
  `id_u_r` int(2) NOT NULL,
  `date_attrib` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(8) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '-1',
  `id_role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer_role`
--

INSERT INTO `customer_role` (`id_u_r`, `date_attrib`, `id_user`, `state`, `id_role`) VALUES
(1, '2021-09-08 19:13:15', 24, 1, 3),
(3, '2021-09-09 16:17:22', 25, 1, 3),
(4, '2021-09-24 06:38:31', 27, 0, 3),
(5, '2021-09-26 00:23:13', 31, 1, 3),
(6, '2021-09-26 05:01:35', 39, 1, 3),
(8, '2021-10-16 06:43:20', 1, 1, 5),
(10, '2021-10-16 06:43:20', 17, 1, 3),
(13, '2021-10-16 06:43:20', 21, 1, 5),
(14, '2021-10-16 06:43:20', 22, -1, 3),
(15, '2021-10-16 06:43:20', 23, -1, 5),
(16, '2021-10-16 06:43:20', 26, 1, 3),
(17, '2021-10-16 06:43:21', 28, -1, 5),
(19, '2021-10-16 06:43:21', 30, 1, 5),
(20, '2021-10-16 06:43:21', 32, -1, 5),
(21, '2021-10-16 06:43:21', 33, 1, 5),
(22, '2021-10-16 06:43:21', 34, 1, 5),
(23, '2021-10-16 06:43:21', 35, 1, 5),
(25, '2021-10-16 06:43:21', 37, -1, 5),
(26, '2021-10-16 06:43:21', 38, 1, 5),
(27, '2021-10-16 06:43:21', 40, -1, 5),
(28, '2021-10-16 06:43:21', 41, -1, 5),
(29, '2021-10-18 14:21:06', 42, -1, 3),
(30, '2021-05-01 13:04:46', 43, -1, 3),
(31, '2021-10-27 04:54:39', 44, -1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `delivery_form`
--

CREATE TABLE `delivery_form` (
  `id_deliv` int(11) NOT NULL,
  `designation` varchar(31) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_ord` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantities` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` varchar(31) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_deliv` varchar(103) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(8) NOT NULL,
  `path_scan` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_mag` int(2) NOT NULL,
  `id_prov` int(2) NOT NULL,
  `id_reason` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `invemtory_line`
--

CREATE TABLE `invemtory_line` (
  `id_inv_line` int(4) NOT NULL,
  `quantity` int(6) NOT NULL,
  `date_inv_line` datetime NOT NULL,
  `id_inv` int(6) NOT NULL,
  `id_reason` int(8) NOT NULL,
  `num_line` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inventory`
--

CREATE TABLE `inventory` (
  `id_inv` int(8) NOT NULL,
  `date_inv` datetime NOT NULL,
  `ref_num_inv` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_validation` int(1) NOT NULL,
  `id_mag` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `issue`
--

CREATE TABLE `issue` (
  `id_issue` int(8) NOT NULL,
  `content` varchar(895) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_issue` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_com` int(11) NOT NULL,
  `issuer_id` int(8) DEFAULT '1',
  `title_rm` varchar(31) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_issue` varchar(805) COLLATE utf8mb4_unicode_ci DEFAULT 'fa fa-book',
  `state_msg` int(1) DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `issue`
--

INSERT INTO `issue` (`id_issue`, `content`, `date_issue`, `id_com`, `issuer_id`, `title_rm`, `img_issue`, `state_msg`) VALUES
(1, 'Ceci est ma réponse: rien.', '0000-00-00 00:00:00', 1, 15, 'indexForum', NULL, 1),
(2, 'Un tem', '0000-00-00 00:00:00', 1, 23, NULL, NULL, -1),
(4, 'trois tem', '0000-00-00 00:00:00', 2, 17, NULL, NULL, 1),
(5, 'Ceci est ma réponse : f2licit.', '0000-00-00 00:00:00', 2, 39, NULL, NULL, 1),
(6, 'cinq tem', '0000-00-00 00:00:00', 2, 39, NULL, '8-Repondu<br>', 0),
(7, 'J\'ai ete satisfaite', '2021-09-08 21:52:55', 2, 31, NULL, '8-srgbxdsxrg e4dyhrf dry5hcn vdf5ujng<br>', 1),
(10, 'Une documentation bien fournie pour entretenir des échanges professionnels<br>', '2021-09-09 17:15:46', 3, 1, 'Documentation', 'fa fa-book', 1),
(11, 'Une personnel hautement performent<br>', '2021-09-09 17:15:46', 3, 8, 'Personnel', 'fa fa-users', 1),
(12, 'Un management digne des plus grands professionnels<br>', '2021-09-09 17:17:15', 3, 8, 'Gestion', 'fa fa-laptop', 1),
(13, '', '2021-09-24 05:05:51', 4, 1, 'Comment Commander ?', 'fa fa-user-md', 1),
(14, 'Acheter des lunettes de vue peut être compliqué. Si vous portez des lunettes, vous savez à quel point il est difficile de trouver la paire parfaite. Nous pouvons vous aider avec ce problème, mais vous allez peut-être vous demander si vous pouvez vraiment acheter des lunettes de vue en ligne. La réponse est oui, c’est possible - et chez EyeBuyDirect nous vous facilitons la tâche. Tout ce dont vous avez besoin, c’est de vous munir de votre ordonnance et de suivre nos conseils pour renseigner les informations. C’est tout ! De plus, vous pouvez prendre votre temps en choisissant vos montures de lunettes de vue depuis le confort de votre canapé.\r\nNous vous proposons des centaines de lunettes pour homme, femme et enfant. Nous ne pouvons pas vous promettre que vous n’en choisirez qu’une paire, mais avec des prix aussi bas que les nôtres, n’hésitez pas à vous faire plaisir. Parcourez notre', '2021-09-24 05:05:51', 4, 8, 'Bien Choisir Votre Monture !', 'fa fa-thumbs-o-up', 1),
(15, 'Texte d\'essai<br>', '2021-09-24 05:05:51', 4, 8, 'A Propos Des Types De Verres', 'fa fa-glass', 1),
(16, '<div>                  Les valeurs de l’ordonnance, exprimées en dioptries δ, correspondent à la puissance que le verre devra apporter pour compenser le défaut de l’oeil. <br></div><div>Les puissances évoluent par paliers de 0,25 δ (valeur minimale). <br></div><div><br></div><div>La Sphère désigne la puissance à ajouter pour corriger la myopie, l\'hypermétropie ou l\'astigmatisme.\r\n\r\nLes chiffres hors parenthèses précédés du + correspondent à l’hypermétropie. Ils signifient que le verre devra apporter de la puissance.\r\nLes chiffres hors parenthèses précédés du - correspondent à une myopie. Le verra diminuera la puissance de l’oeil.\r\nPlan signifie que la valeur de la sphère est nulle. L’ophtalmologiste peut aussi noter (±)0.00. <br></div><div>Cette valeur indique qu\'aucune correction omnidirectionnelle n\'est à apporter pour l\'oeil concerné. Ceci peut se produire lorsque l\'oeil concerné', '2021-09-24 05:05:51', 4, 8, 'Comment Lire Son Ordonnance ?', 'fa fa-list-ol', 1),
(20, 'Les lunettes Bioluxoptical sont fabriquées à la main à partir de matériaux de haute qualité de fournisseurs étrangers. Les montures en acétate et en plastique sont un équilibre parfait entre poids léger et durabilité alors que nos montures en métal adoptent un style classique et une structure robuste. En plus de nos styles maison, vous pouvez également trouver une sélection de lunettes premium Ray-Ban et Oakley.', '2021-09-29 09:49:14', 4, 1, 'Comment choisir vos verres ?', 'fa fa-book', 1),
(24, '', '2021-10-06 02:21:07', 6, 1, 'NEWSLETTER', 'fa fa-phone', -1),
(25, '', '2021-10-06 02:22:02', 6, 1, 'NEWSLETTER', 'fa fa-phone', -1),
(26, '', '2021-10-06 02:28:06', 6, 1, 'NEWSLETTER', 'fa fa-phone', -1),
(27, '', '2021-10-06 02:30:37', 6, 1, 'NEWSLETTER', 'fa fa-phone', -1),
(28, 'mbouchebomdaulriche@gmail.com', '2021-10-06 02:39:30', 6, 1, 'NEWSLETTER', 'fa fa-phone', -1),
(29, 'mbouchebomdaulriche@gmail.com', '2021-10-06 02:39:44', 6, 1, 'NEWSLETTER', 'fa fa-phone', -1),
(30, 'mbouchebomdaulriche@gmail.com', '2021-10-06 02:40:35', 6, 1, 'NEWSLETTER', 'fa fa-phone', -1),
(31, 'Outils de consultation<br>', '0000-00-00 00:00:00', 32, 1, 'indexForum', '1/lunettesEssaisUniverselle.png', -1),
(32, 'Accésoire de vente <br>', '0000-00-00 00:00:00', 33, 1, 'indexForum', '1/presentoireColonne.png', 1),
(33, 'Un autre sujet Premier message  Un autre sujet <br><br><br>', '0000-00-00 00:00:00', 34, 1, 'indexForum', '1/5d12be8d2d63f3b6197.jpg', 1),
(34, '<img alt=\"\"><img alt=\"\"><br>', '2021-04-29 23:30:57', 1, 39, 'Forum', 'fa fa-book', 1),
(35, 'Une deuxième réponse', '2021-04-29 23:41:20', 1, 39, 'Forum', 'fa fa-users', 1),
(36, 'Intervention de l\'admin là !<br>', '2021-04-30 00:14:54', 1, 1, 'Forum', 'fa fa-users', 1),
(37, '<h1>Lorem Ipsum is that i</h1><h4><u>t has a more-or-less normal distri</u></h4>bution of \r\nletters, as opposed to using \'C<br><ol><li><i>ontent here, content here\', making i</i></li><li><i>t \r\nlook like readable English</i></li><li><i>Lorem Ipsum is that i</i></li><li><i>t has a more-or-less normal distri</i></li><li><i>bution of \r\nletters, as opposed to using \'C</i></li></ol><b>ontent here, content here\', making i</b><br>t \r\nlook like readable English<br>', '2021-04-30 00:35:19', 1, 1, 'Forum', 'fa fa-users', 1),
(38, 'Un lambda ?', '2021-04-30 00:50:11', 1, 39, 'Forum', 'fa fa-users', 1),
(39, 'Abeg hô !!!!!!!!!!!!', '2021-04-30 02:39:42', 1, 31, 'Forum', 'fa fa-users', 1),
(40, 'Je ne vois pas la préoccupation', '2021-04-30 04:42:08', 30, 31, 'Forum', 'fa fa-users', 1),
(41, 'Ici ça pas bien<br>', '2021-04-30 04:43:56', 1, 31, 'Forum', 'fa fa-users', 1),
(43, 'Ici ça devrai marcher !<br>', '2021-04-30 04:47:49', 32, 1, 'Forum', 'fa fa-users', 1),
(44, 'Pourquoi çà ne marche pas ?<br>', '2021-04-30 04:50:16', 32, 1, 'Forum', 'fa fa-users', 1),
(45, 'comment est-ce possible ?<br>', '2021-04-30 05:24:34', 32, 31, 'Forum', 'fa fa-users', 1),
(46, 'Un message de test : au moins<u> 10 caractaires</u><img alt=\"\"><a target=\"\" rel=\"\"></a>', '2021-04-30 07:15:03', 34, 39, 'Forum', 'fa fa-users', 1),
(47, 'Sandrine doit rentrer chez elle', '2021-04-30 09:12:10', 32, 31, 'Forum', 'fa fa-users', 1),
(48, 'Ulriche est hight', '2021-04-30 09:18:12', 32, 31, 'Forum', 'fa fa-users', 1),
(50, 'Ceci est un texte devant donner plus de datails sur les condition générales d\'usage du forum...', '2021-04-30 14:10:03', 7, 8, 'indexForum', 'fa fa-book', 1),
(51, 'Ceci esl la première réponse', '2021-04-30 23:45:55', 33, 25, 'Forum', 'fa fa-users', 1),
(52, 'Un test id valide', '2021-05-01 00:15:35', 33, 38, 'Forum', 'fa fa-users', 1),
(53, 'a première énumération', '2021-05-01 01:51:01', 7, 1, 'Condition', 'fa fa-users', 1),
(54, 'Deuxième condition... (à modifier)', '2021-05-01 01:52:49', 7, 1, 'Condition', 'fa fa-users', 1),
(55, 'Troisième énum sur moins 17 carac', '2021-05-01 02:14:11', 7, 1, 'Condition', 'fa fa-users', 1),
(56, 'C\'est how noor ?', '2021-05-01 06:39:34', 1, 30, 'Forum', 'fa fa-users', 1),
(60, 'Enfin, c\'est fini !<br>', '2021-05-01 09:30:27', 34, 1, 'Forum', 'fa fa-users', 1),
(63, 'Quatrième condition', '2021-05-03 18:56:12', 7, 8, 'Condition', 'fa fa-users', 1),
(64, 'ulrichembouchebomda@gmail.com', '2021-10-24 19:05:24', 6, 1, 'NEWSLETTER', 'fa fa-phone', -1),
(65, 'jacksparow@gmail.com', '2021-10-24 19:05:46', 6, 1, 'NEWSLETTER', 'fa fa-phone', -1),
(69, 'Mensions legales pour les ventes<br><br>copier-coller :<br><div><b>Article 1</b></div><div>- Objet Les présentes Conditions Générales de Vente (ci-après « CGV ») ont pour objet, d\'une part, d\'informer le consommateur (ci-après « Acheteur ») sur les conditions et modalités dans lesquelles le vendeur (ci-après « BIOLUX OPTICAL Sarl» ou « le Vendeur ») procède à la vente et à la livraison des produits commandés et, d\'autre part, de définir les droits et obligations des parties dans le cadre de la vente de produits par BIOLUX OPTICAL Sarl à l’Acheteur.<br></div><div><br></div><div><b>Article 2</b></div><div>...<br></div><div><br></div>', '2021-10-25 10:55:24', 3, 1, 'Exemple', 'fa fa-shopping-cart', 1),
(72, 'test test test<br>', '2021-10-25 13:50:31', 2, 8, 'TEMOIGNAGE', 'fa fa-like', 1),
(73, 'Cinquieme condition', '2021-10-25 08:26:46', 7, 8, 'Condition', 'fa fa-users', 1),
(74, '6 et il n\'y a pas de limite', '2021-10-25 09:15:06', 7, 8, 'Condition', 'fa fa-users', 1),
(75, 'asw4erhdr5t6fm&nbsp;', '2021-10-25 12:09:18', 36, 1, 'indexForum', '0/defaultImgCom.png', 1),
(77, 'Une bonne validation<br>', '2021-10-26 12:04:13', 4, 8, 'Valider', 'fa fa-building-o', 0),
(78, 'Il faut retiter un materiel du repertoire<br>', '2021-10-26 18:34:40', 5, 8, 'admin ADMINISTRATEUR | Notifica', 'fa fa-phone', 1),
(79, 'srkdjgd asel;ihbbd seoihvsd', '2021-10-26 09:07:35', 26, 31, 'Forum', 'fa fa-users', 1),
(80, 'awet44 se4xdydh s dyxrhnf dryhnf', '2021-10-26 09:07:45', 26, 31, 'Forum', 'fa fa-users', 1),
(81, 'Un test&nbsp;', '2021-10-28 18:16:27', 1, 31, 'Forum', 'fa fa-users', 1),
(82, 'Text gratuit', '2021-12-12 05:39:03', 37, 1, 'Consult', 'fa fa-users', 1),
(84, 'Pas <b>encore<u>.</u></b>', '2021-12-12 05:45:00', 34, 1, 'Forum', 'fa fa-users', 1),
(85, 'Pas <b>encore<u>. ç_a</u></b>', '2021-12-12 05:52:30', 34, 1, 'Forum', 'fa fa-users', 1),
(86, 'Pas <b>encore<u>. ç_a2</u></b>', '2021-12-12 05:53:08', 34, 1, 'Forum', 'fa fa-users', 1),
(87, 'Bien ! <u>alors </u>?', '2021-12-12 05:58:49', 34, 1, 'Forum', 'fa fa-users', 1),
(90, 'Bien !', '2021-12-12 06:12:18', 37, 1, 'Consult', 'fa fa-users', 1),
(92, 'Enfin !<br>', '2021-12-12 06:22:15', 37, 1, 'Consult', 'fa fa-users', 1),
(93, 'La prochaine consultation à pour ....', '2021-12-12 15:44:43', 37, 1, 'Consult', 'fa fa-users', 1),
(94, 'Inconnu d\'ici et d\'alleurs<br>', '2021-12-12 22:21:19', 2, 25, 'TEMOIGNAGE', '1-OK répondu::sdfplkfd', 1),
(95, 'Il n\'y aura rien à faire', '2021-12-13 06:24:13', 47, 1, 'indexForum', '1/manequin03.png', 1),
(96, 'Pourquoi cela est ainsi ici ?', '2021-12-13 06:25:14', 47, 1, 'Forum', 'fa fa-users', 1),
(97, 'Moi je l\'ai fait', '2021-12-15 03:00:25', 37, 17, 'Forum', 'fa fa-users', 1),
(98, 'vh,vcn b drtuhj cnv tdjn vcdrh', '2021-12-15 03:03:15', 37, 17, 'Forum', 'fa fa-users', 1),
(99, 'Pourquoi cela est ainsi ici ?', '2021-12-15 03:31:24', 47, 39, 'Forum', 'fa fa-users', 1),
(100, 'Encore une intervention de teste', '2021-12-15 04:23:32', 1, 39, 'Forum', 'fa fa-users', 1),
(101, 'Ici un ensemble de liens vers lesdits fichiers<br>', '2021-12-15 19:02:54', 3, 1, 'Fichiers complémentaires', 'fa fa-file-o', 0),
(102, 'Je répond depuis le compte admin<br>', '2021-12-16 07:27:30', 40, 1, 'Consult', 'fa fa-users', 1),
(103, 'Ceci est mon témoignage', '2021-12-26 00:41:56', 2, 31, 'TEMOIGNAGE', 'fa fa-like', -1);

-- --------------------------------------------------------

--
-- Structure de la table `manipulate`
--

CREATE TABLE `manipulate` (
  `id_manip` int(11) NOT NULL,
  `name_manip` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mat` int(4) NOT NULL,
  `id_user` int(8) NOT NULL,
  `id_costomer` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `material`
--

CREATE TABLE `material` (
  `id_mat` int(4) NOT NULL,
  `name_mat` varchar(62) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_num_mat` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_mat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_mat` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state_mat` int(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `material`
--

INSERT INTO `material` (`id_mat`, `name_mat`, `reg_num_mat`, `desc_mat`, `img_mat`, `date_reg`, `state_mat`) VALUES
(1, 'Poste de soudure', NULL, 'Base plate en rectangle de quelques centimètres de hauteur, surmontée sur de deux bras mécaniques maniables...', 'poste_soudure.png', '2021-10-14 12:00:50', -1),
(2, 'MEULEUSES', 'HPE-410 DRILL', 'Cette PRO Génération reprend les points forts de son\r\naînée, et s\'enrichit des dernières avancées\r\ntechnologiques Huvitz', 'meuleuse.png', '2021-10-14 12:46:39', -1),
(3, 'La Perceuse', 'HDM-8000', 'Perçage haute précision en 3 dimensions\r\nFonctionnement sans eau\r\nMeulage simultané possible : perçage en temps masqué\r\nPilotage automatisé par la meuleuse\r\nDécoupe créative avec la Master HPE-8000', 'perceuse.png', '2021-10-14 12:46:39', -1),
(4, 'Les Bloqueurs', 'HAB-8000', 'Ecran tactile inclinable 10,4’’ LCD haute résolution\r\nBlocage automatique\r\nFrontofocomètre intégré\r\nLecteur de monture, gabarit et verre de présentation\r\nModification de forme et éditeur de perçage\r\nMis', 'bloqueurs.png', '2021-10-14 12:46:39', -1),
(5, 'Les Bloqueurs', 'HBK-410', '<ol><ol><li>Ecran tactile inclinable 9,7’’</li><li>LCD\r\n- Blocage manuel </li><li>Scan digital (reconnaissance, trous de perçage, gravure) </li><li>Caméra live </li><li>Modification de forme </li><li>Nouveau Software 2.0 </li><li>Interface ludique et...</li></ol></ol>', 'bloqueurs.PNG', '2021-10-14 12:46:39', 1),
(6, 'Le Palpeur', 'HFR-8000X', 'Palpage en 3 dimensions, 1440 points\r\nMode auto et semi-auto\r\nDétection des formes concaves\r\nAdapté aux montures fortement basées\r\nCouvercle antipoussière pour la durée de la vie', 'palpeur.png', '2021-10-14 12:54:34', 1),
(7, 'Unités de Réfraction', 'HRT-7000', 'Mécanisme de poignée : conception ergonomique avec mécanisme de\r\npoignée unique facilitant le mouvement de translation\r\nBras robotisé : mouvement électrique de montée et descente du bras de réfracteu', 'unites_refraction', '2021-10-14 12:54:34', -1),
(8, 'ECRAN MURAL', '----------', 'Pour recevoir les tests de vision\r\nPour tout type de projecteur', 'ecran_murale.png', '2021-10-14 13:09:06', 1),
(9, 'MENTONNIERE', '-------------', 'Ajustable manuellement', 'MENTONNIERE.png', '2021-10-14 13:09:06', -1),
(10, 'TABOURETS', '-----------', 'Avec ou sans dossier\r\nAvec ou sans roulettes\r\nPiètement : finition plastique noir ou inox\r\nGamme complète et sur-mesure disponible à\r\nla demande', 'TABOURETS.png', '2021-10-14 13:09:06', 1),
(12, 'Réfracteurs Manuels', 'TW-1430 PH-4', 'Réfracteur type American Optical\r\nLentilles traitées antireflet\r\nCyl 0.00 à -6.00D (-8.00 avec bonettes )\r\nSphères +16.75 à -19.00D\r\n10 filtres sur chaque œil\r\nRéglage de la convergence pour la VP\r\nForm', 'Réfracteurs.png', '2021-10-14 13:09:06', -1),
(13, 'Ecrans', 'LCD-1000P', 'LCD 24 \"à polarisation circulaire\r\nDifférents types de graphiques standard, graphiques polarisés pour test binoculaire,\r\ngraphique ETDRS, test de contraste, test 3D, test de vision des couleurs,...', 'Ecran.png', '2021-10-14 13:19:52', 1),
(14, 'Lampe à fente', 'HS-5000', 'Le biomicroscope peut être utilisé facilement par tout praticien.\r\nLa HS-5000/HS-5500 vous procure des images nettes et\r\nun grand angle de vision grâce à son système optique', 'lampeAfente.png', '2021-10-14 13:19:52', 1),
(15, 'Topographe cornéen', 'EYE TOP-S', 'Eye Top-S vous offre la meilleure précision et un confort\r\nd\'utilisation maximal grâce au logiciel avancé PHOENIX.\r\nPHOENIX est incomparablement confortable et efficace', 'Topographe.png', '2021-10-14 13:19:52', -1),
(16, 'LUNETTES D’ESSAI', 'UB-4', 'OPTION FILTRES POLARISÉS', 'LUNETTES.png', '2021-10-14 13:19:52', 1),
(17, 'Frontofocomètre', 'HLM-9000', 'Huvitz cherche toujours à répondre à vos questions\r\net souhaits. Le résultat est le HLM-9000 renforcé\r\navec capteur Hartmann et son design curviligne.', 'Frontofocometre.png', '2021-10-14 13:19:52', 1),
(18, 'Perceuse manuelle', 'LESS STRESS®', 'Perçage et fraisage possibles avec exactitude (0,05 mm d\'après pochoir ou dessin)\r\nAffichage numérique des deux axes\r\nQuelle que soit la correction, tous les angles et distances restent les mêmes', 'perceuse_man.png', '2021-10-14 13:37:59', -1),
(19, 'Meuleuse manuelle', 'NOVADIA', 'Meuleuse manuelle électrique\r\n- contre-biseau\r\n- retouche biseau\r\nRemplissage du réservoir d\'eau\r\n- Démonter la façade, la faire pivoter puis tirer vers soi', 'MeuleuseMan.png', '2021-10-14 13:37:59', -1),
(20, 'ÉCHELLE D’ACUITÉ', '-----------', 'Distance = 3M', 'acuite.png', '2021-10-14 13:37:59', -1),
(21, 'Test de Pigassou', 'PVC', 'Produit\r\nNOVACEL', 'Pigassou.png', '2021-10-14 13:37:59', -1),
(22, 'Test de confirmation monoculaire\r\n', '------------', '±0.25 ou ±0.50', 'monoculaire.png', '2021-10-14 13:37:59', 1),
(24, 'DESKTOP', 'MATRST1', '<u>Core </u><b>i7235</b><br><i>DELL </i>Latitude', 'desktop.png', '2021-10-14 16:03:56', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mesure`
--

CREATE TABLE `mesure` (
  `id_mes` int(11) NOT NULL,
  `mane_mes` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_mes` varchar(44) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_mes` int(1) NOT NULL DEFAULT '-1',
  `min_mes` int(3) NOT NULL DEFAULT '6',
  `max_mes` int(3) NOT NULL DEFAULT '180',
  `desc_mes` text COLLATE utf8mb4_unicode_ci,
  `id_user` int(8) NOT NULL,
  `date_reg_mes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mesure`
--

INSERT INTO `mesure` (`id_mes`, `mane_mes`, `img_mes`, `state_mes`, `min_mes`, `max_mes`, `desc_mes`, `id_user`, `date_reg_mes`) VALUES
(1, 'Mesure 1', 'mes1.jpg', 1, 100, 175, NULL, 8, '2021-12-14 08:34:07'),
(2, 'Mesure 2', 'mes2.jpg', 1, 35, 75, NULL, 1, '2021-12-14 08:34:07'),
(3, 'Mesure 3', 'mes3.jpg', 1, 6, 15, NULL, 1, '2021-12-14 09:05:16'),
(4, 'Mesure 4', 'mes4.jpg', 1, 35, 60, NULL, 8, '2021-12-14 09:05:16'),
(5, 'Mesure 5', 'mes5.jpg', 1, 100, 175, NULL, 8, '2021-12-14 09:08:11');

-- --------------------------------------------------------

--
-- Structure de la table `order_cart`
--

CREATE TABLE `order_cart` (
  `id_ord` int(11) NOT NULL,
  `id_mag` int(4) DEFAULT NULL,
  `id_costomer` int(8) NOT NULL,
  `id_op` int(4) DEFAULT NULL,
  `id_manager` int(8) DEFAULT NULL,
  `total` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_ref` varchar(202) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_paid` varchar(44) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_paid` int(1) NOT NULL DEFAULT '-1',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirm_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_cart`
--

INSERT INTO `order_cart` (`id_ord`, `id_mag`, `id_costomer`, `id_op`, `id_manager`, `total`, `paid_ref`, `account_paid`, `state_paid`, `order_date`, `confirm_date`) VALUES
(1, 1, 31, 6, 8, '29800', 'CDFGH.DERD235.ZSD', '698204289', 1, '2021-10-20 06:20:42', '2021-10-20 06:20:42'),
(3, 1, 43, 5, NULL, '66000', 'xrfhv1223rdh564xrshxcbrsyhx', 'xcfg125xdf2354xestf', -1, '2021-05-01 12:06:13', '2021-05-01 12:06:13'),
(5, NULL, 31, NULL, NULL, '4800', NULL, NULL, -1, '2021-10-28 15:43:41', '2021-10-28 15:43:41'),
(6, 7, 26, 5, NULL, '29000', 'DFRsgFW1245WD', '698204289', -1, '2021-11-01 07:41:41', '2021-10-31 20:42:49'),
(7, 12, 39, 6, 1, '35800', 'Mesure 1=100; Mesure 2=35; Mesure 3=6; Mesure 4=35; Mesure 5=100; ', 'SUR-MESURES', -2, '2021-12-14 18:19:15', '2021-12-14 18:19:15'),
(8, 7, 39, 7, NULL, '91600', 'Mesure 1=100; Mesure 2=35; Mesure 3=6; Mesure 4=35; Mesure 5=100; 39/bgr02.png', NULL, -2, '2021-12-14 18:57:10', '2021-12-14 00:00:00'),
(9, 5, 39, 4, NULL, '35800', 'Mesure 1=100; Mesure 2=35; Mesure 3=6; Mesure 4=35; Mesure 5=101; Array', NULL, -2, '2021-12-14 20:09:28', NULL),
(10, 12, 39, 3, 1, '212700', 'xrfhv1223rdh564xrshxcbrsyhx', 'xcfg125xdf2354xestf', 1, '2021-12-15 05:59:50', '2021-12-15 07:00:49'),
(11, 12, 39, 6, NULL, '1200', '35453ctfgn543ftuh3', '698324323', -1, '2021-12-16 13:21:36', '2021-12-16 15:19:18');

-- --------------------------------------------------------

--
-- Structure de la table `order_qty`
--

CREATE TABLE `order_qty` (
  `id_oq` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `id_reason` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_qty`
--

INSERT INTO `order_qty` (`id_oq`, `id_order`, `qty`, `id_reason`) VALUES
(11, 1, '1', 40),
(12, 1, '1', 34),
(14, 3, '1', 42),
(19, 5, '1', 34),
(20, 5, '1', 33),
(21, 6, '1', 11),
(22, 10, '3', 43),
(24, 11, '1', 40);

-- --------------------------------------------------------

--
-- Structure de la table `propose`
--

CREATE TABLE `propose` (
  `id_prop` int(11) NOT NULL,
  `duration_prop` int(3) DEFAULT NULL,
  `date_reg_prop` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description_prop` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_prop` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_mag` int(2) NOT NULL,
  `id_reason` int(8) NOT NULL,
  `quantity` int(6) DEFAULT '0',
  `id_user` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `propose`
--

INSERT INTO `propose` (`id_prop`, `duration_prop`, `date_reg_prop`, `description_prop`, `img_prop`, `id_mag`, `id_reason`, `quantity`, `id_user`) VALUES
(1, 1, '2021-10-15 16:59:39', 'r6t8f asetgsdv s34yehb', '1/surmesures3.png', 1, 36, 1, 1),
(2, 773, '2021-10-15 17:01:46', 'xhb c xdrhfsdr zwegvd&nbsp;', NULL, 1, 46, 0, 1),
(3, 0, '2021-10-17 02:41:47', 'Ce champs ne doit pas etre obligatoire', '1/download.png', 1, 13, 1, 1),
(4, 1, '2021-10-17 02:52:41', 'Rien pour le moment', '1/download.png', 1, 3, 1, 1),
(5, 720, '2021-10-17 12:49:56', 'Pour etre retirer, il faudrait d\'abord supprimer cette reletion.', '12/pc_lunettes.png', 12, 48, 1253, 1),
(6, 720, '2021-10-17 13:52:45', 'Une reduction de 10% est offerte pendant 29 jours', '1/addCard.png', 1, 6, 27, 1),
(7, 15, '2021-04-28 06:15:40', '<div>\r\n                      Le champ Description de l\'attribution  : est requis.\r\n                    </div>', '1/addCard.png', 1, 51, 452, 8),
(8, 1, '2021-05-01 14:12:47', 'Rien que pour une test<br>', '15/cameroun.png', 15, 13, 1, 1),
(9, 1, '2021-05-03 18:16:51', 'Disponible à ce prix dans tous nos magasin<br>', '12/congo.png', 12, 1, 1, 8),
(10, 720, '2021-12-16 04:55:07', 'Le champ Description de l\'attribution &nbsp;: est requis.<br>', '12/promotion.png', 12, 44, 600, 1);

-- --------------------------------------------------------

--
-- Structure de la table `provider`
--

CREATE TABLE `provider` (
  `id_prov` int(2) NOT NULL,
  `name_prov` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_reason` varchar(202) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_logo` varchar(44) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DefaultImgProvider.png',
  `description` varchar(202) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_number` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int(8) NOT NULL,
  `termes` varchar(809) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(103) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_reg_prov` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type_prov` int(2) NOT NULL,
  `state_prov` int(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `provider`
--

INSERT INTO `provider` (`id_prov`, `name_prov`, `social_reason`, `img_logo`, `description`, `code_number`, `id_user`, `termes`, `contact`, `date_reg_prov`, `type_prov`, `state_prov`) VALUES
(1, 'NOVACEL', '', 'novacel.png', ' Création de la Société NOVACEL par Mr Roger DÜNING à Château-Thierry (02)Vente et surfaçage de verre', 'LV01AN14US1', 1, '', '02 72 34 99 77', '2021-09-07 13:47:51', 1, 1),
(2, 'DIRECT OPTIC', '', 'DefaultImgProvider.png', 'Direct Optic est le premier opticien en ligne Français. Depuis 2008, nous proposons des lunettes...', 'PA01AN02US1', 1, '', '12 44 34 64 57', '2021-09-07 13:47:51', 1, 1),
(3, 'Visa.', '--------------', '2/visa.png', 'dasjhsd asdjhiyadjh aiuiae aeiua faux text', 'OP01AN21US1', 10, 'Prestation de service.', 'Contact chez nous', '2021-09-25 23:33:11', 2, 1),
(4, 'PayPal', '------------', '2/paypal.png', 'dasjhsd asdjhiyadjh aiuiae aeiua faux text', 'OP02AN21US1', 1, 'Prestation de service', NULL, '2021-09-25 23:33:11', 2, 1),
(5, 'Express Union', '---------------', '2/eu.png', 'dasjhsd asdjhiyadjh aiuiae aeiua faux text', 'OP03AN21US1', 1, 'Description de la prestation de service', NULL, '2021-09-25 23:33:11', 2, 1),
(6, 'Orange Money', '----------------', '2/orangemoney.png', 'dasjhsd asdjhiyadjh aiuiae aeiua faux text', 'OP04AN21US1', 1, 'Description de la prestation de service', NULL, '2021-09-25 23:33:11', 2, 1),
(7, 'MTN Mobile Money', '---------------', '2/mtnmobilemoney.png', 'dasjhsd asdjhiyadjh aiuiae aeiua faux text', 'OP05AN21US1', 1, 'Description de la prestation de service', NULL, '2021-09-25 23:33:11', 2, 1),
(10, 'partenaire', 'Raison sociale', '1/manequin02.png', 'Description                    \r\n                  <br><ul><li>Une seule</li><li> et</li><li> simple</li></ul>', '1425123456', 10, '<ol><li>Termes</li><li> du</li><li> partenariat</li></ol>', 'Contact chez nous', '2021-10-13 09:47:46', 1, 1),
(12, 'partenaire', 'Raison sociale', '1/conseil.png', 'Description', '1425123456', 1, 'Termes du partenariat :<div><div><ul><li><a href=\"http://192.168.42.69:8080/bioluxoptical/admin/C_Provider/addProv.html#\" target=\"\" rel=\"\"> Normal text </a></li><li><div><a target=\"\" rel=\"\">Bold</a><a target=\"\" rel=\"\">Italic</a><a target=\"\" rel=\"\">Underline</a></div></li><li><div><a target=\"\" rel=\"\"></a><a target=\"\" rel=\"\"></a><a target=\"\" rel=\"\"></a><a target=\"\" rel=\"\"></a></div></li><li><a target=\"\" rel=\"\"></a></li><li><a target=\"\" rel=\"\"></a></li></ul></div></div>', 'Contact chez nous', '2021-10-13 09:48:25', 3, 1),
(17, 'partenaire m2', 'Raison sociale', '3/conseil.png', 'AWRfsv&nbsp;<br>szexlfjksdh <br><br>sdruioxhdixdrf<br>sejklxd', '568655456', 6, 'sebjksdf&nbsp;<br><br>sdkdfj<br>sdxlujhsduidf', 'Contact chez nous', '2021-10-13 11:25:06', 3, 1),
(19, 'partenaire 5', 'Raison sociale', '1/images1.jpg', 'utjh<br> jy<br>jytiy uigjbk<br>jyrfuy\\<br><br>uyjfuy<br>', '1425123456', 6, 'Bold<a target=\"\" rel=\"\">Italic</a><a target=\"\" rel=\"\">Underline</a><li><div><a target=\"\" rel=\"\"></a><a target=\"\" rel=\"\"></a><a target=\"\" rel=\"\"></a><a target=\"\" rel=\"\"></a></div></li><li>kgujbkj</li><li>jygy<br></li>', 'Contact chez nous', '2021-10-14 06:54:59', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reason`
--

CREATE TABLE `reason` (
  `id_reason` int(8) NOT NULL,
  `name_reason` varchar(62) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_reason` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_reason` float NOT NULL,
  `old_price` float NOT NULL DEFAULT '0',
  `origine_reason` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_reason` int(1) NOT NULL DEFAULT '-1',
  `type_reason` int(2) NOT NULL,
  `note_reason` varchar(89) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_reason` varchar(157) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2_reason` varchar(157) COLLATE utf8mb4_unicode_ci DEFAULT 'big/1/1.png',
  `id_cat_reason` int(2) DEFAULT NULL,
  `id_user` int(8) NOT NULL,
  `description_reason` varchar(809) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_reg_reason` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_manufacturate` date DEFAULT NULL,
  `date_experation` date DEFAULT NULL,
  `id_sub_cat` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reason`
--

INSERT INTO `reason` (`id_reason`, `name_reason`, `code_reason`, `price_reason`, `old_price`, `origine_reason`, `state_reason`, `type_reason`, `note_reason`, `img_reason`, `img2_reason`, `id_cat_reason`, `id_user`, `description_reason`, `date_reg_reason`, `date_manufacturate`, `date_experation`, `id_sub_cat`) VALUES
(1, 'consultation adéquate', 'GEN001TMBO', 1500, 1700, 'Biolux Optical', 1, 1, 'Vous êtes entre les mains d\'experts qualifiés.', 'small/1/consultation.png', 'big/1/consultation.png', 1, 8, 'Tout reste intacte lors de la modif<br>', '2021-08-30 06:27:38', '0000-00-00', '0000-00-00', 5),
(3, 'Néttoyage / Réparqtion', 'GEN002TMBO', 500, 700, 'Biolux Optical', 1, 1, 'Nous faisons renaître vos verres,                                                        ', 'small/1/entretien.png', 'big/1/entretien.png', 1, 1, 'Une plus grande description est à donner', '2021-08-30 06:27:38', '0000-00-00', '0000-00-00', 5),
(4, 'Magnelia 01 Nude et Or', 'PRM001M6DLA', 59000, 62000, 'FLOWER', 1, 3, 'Prix de vente généralement constaté.                                ', 'small/3/magnelia00.png', 'big/3/magnelia00.png', 1, 1, 'Une description par défaut', '2021-09-27 00:00:00', '0000-00-00', '0000-00-00', 5),
(6, 'Pivoine 03 Bleu écaille', 'PRM003M6DLA', 41000, 45000, 'FLOWER', 1, 3, 'Prix de vente généralement constaté', 'small/3/pivoine00.png', 'big/3/pivoine00.png', 1, 1, 'Ce doit etre retirer', '2021-09-07 16:27:59', '0000-00-00', '0000-00-00', 5),
(11, 'FOUR noir et écaille PLUS1.5', 'PRM011M6DLA', 29000, 34000, 'PANTONE', 1, 3, 'Une brève remarque sur le produit ou sur sa vente                            ', 'small/3/fourNoire.png', 'big/3/fourNoire.png', 1, 1, 'Ceci est pour Femme', '2021-09-22 10:15:48', '0000-00-00', '0000-00-00', 3),
(13, 'TRAITEMENT ANTI-REFLET DURACOAT', 'GEN003TMBO', 27000, 34000, 'Biolux Optical', 1, 2, 'DURCI : (AMC-DIC SYSTEM 400)                                                             ', 'small/2/anti_reflet.PNG', 'big/2/anti_reflet.PNG', 1, 1, 'Pour toute catégorie', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 5),
(14, 'Contrôle qualité', 'SRV001M6DLA', 22000, 25000, 'Biolux Optical', 1, 2, 'Traitement au Frontomètre digital                            ', 'small/2/quality.png', 'big/2/quality.png', 1, 1, 'Service mixte ...', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 5),
(32, 'Monture2', 'PRM002M6DLA', 27000, 34000, 'Biolux Optical', 1, 3, 'sdklns suh,jloh ss', 'small/3/glass.png', 'big/1/1.png', 2, 1, 'Modifier 2', '2021-09-22 16:39:00', '0000-00-00', '0000-00-00', 6),
(33, 'Lunette modifiée', 'PRM002M6DLA', 2000, 2500, 'Biolux Optical', 1, 4, 'sdklns suh,jloh ss', 'small/4/depositphotos_11312939-stock-photo-assorted-styles-of-tinted-sunglasses.jpg', 'big/4/depositphotos_11312939-stock-photo-assorted-styles-of-tinted-sunglasses.jpg', 6, 1, 'Rien a sign', '2021-09-22 16:54:56', '0000-00-00', '0000-00-00', 22),
(34, 'Monture modifiée', 'PRM002M6DLA', 2800, 3400, 'Biolux Optical', 1, 4, 'sdklns suh,jloh ss', 'small/4/depositphotos_12483173-stock-photo-beautiful-glasses.jpg', 'big/4/depositphotos_12483173-stock-photo-beautiful-glasses.jpg', 2, 1, 'se4yhrb ws34eyhdb s3tegb&nbsp;', '2021-09-23 22:52:22', '0000-00-00', '0000-00-00', 9),
(35, 'Lunette modifiée', 'PRM002M6DLA', 27000, 34000, 'Biolux Optical', 1, 3, 'sdklns suh,jloh ss                  ', NULL, 'big/1/1.png', 2, 1, 'Ceci est pour enfant', '2021-09-23 22:57:24', '0000-00-00', '0000-00-00', 6),
(36, 'Lunette modifiée pre', 'PRM002M6DLA', 27000, 34000, 'Biolux Optical', 1, 3, 'sdklns suh,jloh ss                                    ', 'small/3/glss.png', 'big/3/glss.png', 1, 1, 'Ceci est pour enfant', '2021-09-23 23:08:31', '0000-00-00', '0000-00-00', 2),
(37, 'Lunette modifiée', 'PRM002M6DLA', 27000, 34000, 'Biolux Optical', 1, 3, 'sdklns suh,jloh ss                  ', 'small/3/glss.png', 'big/3/glss.png', 2, 1, 'Ceci est pour enfant', '2021-09-23 23:22:45', '0000-00-00', '0000-00-00', 6),
(38, 'Lunette modifiée', 'PRM002M6DLA', 27000, 34000, 'Biolux Optical', 0, 3, 'sdklns suh,jloh ss                  ', 'small/3/glss.png', 'big/3/glss.png', 2, 1, 'Ceci est pour enfant', '2021-09-24 01:03:16', '0000-00-00', '0000-00-00', 6),
(40, 'Monture pour verre Progressif', 'PRM002M6DLA', 1200, 1500, 'Biolux Optical', 1, 5, 'Ici, un texte descriptif de la monture enregistrée en relation avec la catégorie soft des', 'small/5/GriseClaire.png', 'big/5/noire.png', 3, 1, 'Spéciale : distribution limitée', '2021-09-25 05:04:00', '0000-00-00', '0000-00-00', 12),
(41, 'Magnelia 01 Bordeaux et Or', 'PRM002M6DLA', 54000, 55000, 'FLOWER', 1, 3, 'Prix de vente généralement constaté.', 'small/3/magnelia01.png', 'big/3/magnelia01.png', 1, 1, 'Une description par défaut', '2021-09-28 05:56:41', '0000-00-00', '0000-00-00', 5),
(42, 'Pivoine 03 Rouge écaille', 'PROMO001M6DLA', 66000, 0, 'FLOWER', 1, 3, 'Prix de vente généralement constaté', 'small/3/pivoine01.png', 'big/3/pivoine01.png', 1, 1, 'dsrghilser sdyhrb modif', '2021-09-28 06:14:00', '0000-00-00', '0000-00-00', 5),
(43, 'Pivoine 03 Noire écaille', 'PRM002M6DLA', 70900, 75500, 'FLOWER', 1, 3, 'Prix de vente généralement constaté', 'small/3/pivoine02.png', 'big/3/pivoine02.png', 1, 1, 'Description par défaut', '2021-09-28 06:22:08', '0000-00-00', '0000-00-00', 5),
(44, 'Azalée 01 Noir et Or rose', 'PROMO004M6DLA', 50900, 61000, 'FLOWER', 1, 3, 'Prix de vente généralement constaté', 'small/3/AzaleeNoir.png', 'big/3/AzaleeNoir.png', 2, 8, 'Description simple', '2021-09-28 06:26:46', '0000-00-00', '0000-00-00', 6),
(45, 'GU2799', 'PRM010M6DLA', 48000, 50000, 'GUESS', 1, 3, 'Le prix de vente est generalement au constat                                             ', 'small/3/GUESS.png', 'big/3/GUESS.png', 1, 1, 'Par defaut', '2021-09-28 06:52:32', '0000-00-00', '0000-00-00', 3),
(46, 'EBAUCHAGE', 'GEN005TMBO', 1500, 2000, 'Biolux Optical', 1, 2, 'Une bonne remarque va de soi                    ', 'small/2/ebouchage.png', 'big/2/ebouchage.png', 1, 1, 'Une description est obligqtoire', '2021-09-28 07:43:49', '0000-00-00', '0000-00-00', 5),
(48, 'Monture2', 'CodeDF45', 1000, 0, 'BOs', 1, 4, 'A changer aussi', 'small/4/glass.png', 'big/4/glass.png', 3, 1, 'A changer', '2021-10-16 23:48:21', '0000-00-00', '0000-00-00', 11),
(49, 'Verre 0.3', 'ENF04FMBO', 56000, 60000, 'Biolux Optical', 1, 4, 'Tout prix ... sont inclut', 'small/4/soldes.png', 'big/4/soldes.png', 1, 8, 'Tout prix ... sont inclut&nbsp;                    \r\n                  rsdyhdf bed\'rh<br>', '2021-10-17 10:01:14', '0000-00-00', '0000-00-00', 4),
(50, 'Monture Test3', 'LDUYHXCFNV', 1000, 1234, 'BOs', 1, 4, 'Remarque SERXD AWF', 'small/4/FONDBLANC.JPG', 'big/4/download.png', 2, 1, 'Description FGS', '2021-10-17 10:11:57', '0000-00-00', '0000-00-00', 9),
(51, 'Verres003', '20/23/23635', 53000, 55000, 'Biolux Optical', 1, 5, 'Solde pour .....durée.<br>', 'small/5/presentoireVitrine.png', 'big/5/soldes.png', 4, 8, 'Verres003, 20/23/23635, Biolux Optical<br><br><br>', '2021-04-28 06:13:26', '0000-00-00', '0000-00-00', 19),
(52, 'Conseils pratiques', 'CPBO210DS', 500, 0, 'Biolux Optical', 1, 1, 'Une breve remarque<br>', 'small/1/surmesures2.png', 'big/1/surmesures2.png', 1, 8, 'Une courte description<br>', '2021-05-03 18:27:24', '0000-00-00', '0000-00-00', 4),
(53, 'LIVRAISON', 'LIV01-21BO', 500, 600, '--------------', 1, 2, 'Une breve remarque sur le montant a payer : mode de paiement<br>', 'small/2/shipping_compressor.png', 'big/2/livraison.png', 1, 8, '<div>Le service de livraison - Description : delais, point de livraison, point de reception...</div>', '2021-10-25 06:14:04', '0000-00-00', '0000-00-00', 5),
(54, 'Simple exemple', 'SE2021BO', 33000, 33000, 'BOL', 1, 5, 'Une simple remarque<br>', 'small/5/depositphotos_6696880-stock-photo-sunglasses.jpg', 'big/5/depositphotos_11312939-stock-photo-assorted-styles-of-tinted-sunglasses.jpg', 5, 8, 'Une simple Description<br>', '2021-10-25 11:18:00', '0000-00-00', '0000-00-00', 24),
(55, 'Lunette12', 'PRM004M6DLA', 1200, 1000, 'Biolux Optical', 1, 3, 'Une<br>Remarque en<br><b>copier-coller</b><br>peut se faire<br>depuis un <u>autre fichier', 'small/3/conseil.png', 'big/3/conseil.png', 6, 1, '<div>Une <br><i>description </i>en <br><b>copier-coller</b> <br>peut se faire <br>depuis un <u>autre fichier</u></div>', '2021-10-30 05:21:32', '0000-00-00', '0000-00-00', 22),
(56, 'Gravage de verre progressif', 'OME80-00', 1000, 1500, 'Biolux Optical', 1, 2, 'Prendre attache avec le service client', 'small/2/gravageVp.png', 'big/2/gravageVp2.png', 3, 1, 'Prendre attache avec le service commercial', '2021-05-10 16:20:33', '0000-00-00', '0000-00-00', 11);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(2) NOT NULL,
  `name_role` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_role` int(1) NOT NULL,
  `desc_role` varchar(53) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_role` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `name_role`, `level_role`, `desc_role`, `img_role`) VALUES
(1, 'ADMINISTRATEUR', 0, 'Tous les droits', 'admin.png'),
(2, 'MANAGER', 1, 'Droits sur les comptes de level plus grand', 'manager.png'),
(3, 'ABONNE', 5, 'Droit de consultation du site Web', 'abonne.png'),
(4, 'OPTICIEN', 3, 'Recommandations, conseils et prescriptions', 'consultation.png'),
(5, 'PARTENAIRE', 2, NULL, NULL),
(6, 'STAGIERE', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `slice_age`
--

CREATE TABLE `slice_age` (
  `id_slice_age` int(2) NOT NULL,
  `label` varchar(31) COLLATE utf8mb4_unicode_ci DEFAULT 'ADOLESCENT',
  `content` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '[16 - 25] ans',
  `img_rep` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slice_age`
--

INSERT INTO `slice_age` (`id_slice_age`, `label`, `content`, `img_rep`) VALUES
(1, 'ENFANT', '[7 - 15] ans', NULL),
(2, 'ADOLESCENT', '[16 - 24] ans', NULL),
(3, 'ADULTE', '[25 - 45] ans', NULL),
(4, 'ADULTE MATURE', '[45 - 60] ans', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(2) NOT NULL,
  `title0` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BIOLUX OPTICAL',
  `title` varchar(62) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_slide` varchar(44) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(8) NOT NULL,
  `state_slide` int(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slide`
--

INSERT INTO `slide` (`id_slide`, `title0`, `title`, `description`, `img_slide`, `last_modification`, `id_user`, `state_slide`) VALUES
(1, 'Bienvenue chez BIOLUX OPTICAL', 'La qualité aux mains des professionnels', 'Soulagez immédiatement votre douleur, sans avoir besoin de déboursser des sommes vertigineuses.', '1.png', '2021-09-27 20:48:48', 1, 1),
(2, 'BIOLUX OPTICAL', 'L\'inovation technologique et satisfaction de tous à petit prix', 'Il n\'y a qu\'un patron : le client. Et il peut licencier tout le personnel, depuis le directeur jusqu\'à l\'employé, tout simplement en allant dépenser son argent ailleurs.', '2.png', '2021-09-27 20:48:48', 8, 1),
(3, 'Nos Clients', 'Une clientelle abonnée et vive du regard', 'L\'une des choses les plus importantes que nos clients apprécient, c\'est notre art de vendre. L\'une de nos règles cardinales est et sera toujours de ne jamais laisser un client quitter nos locqux sans avoir acheté ou apprie quelque chose. Car oui, vous sommes des professionnels de l\'optique lunettière. ', '3.png', '2021-09-27 20:57:48', 8, 1),
(4, 'Votre partenaire pour l\'avenir', 'Le client est roi, surtout s\'il paie avec des couronnes.', 'On ne demande pas à notre client ce qu\'il peut faire pour vous mais ce que nous pouvouns faire pour lui.', '4/shicEtRebelle.png', '2021-09-27 20:57:48', 1, 1),
(5, 'BIOLUX OPTICAL -CONDITIONS DE VENTE', 'Termes de ventes / Commandes / achats', '<div><b>Article 1</b></div><div>- Objet  Les présentes Conditions Générales de Vente (ci-après « CGV ») ont pour objet, d\'une part, d\'informer le consommateur (ci-après « Acheteur ») sur les conditions et modalités dans lesquelles le vendeur (ci-après « BIOLUX OPTICAL Sarl» ou « le Vendeur ») procède à la vente et à la livraison des produits commandés et, d\'autre part, de définir les droits et obligations des parties dans le cadre de la vente de produits par BIOLUX OPTICAL Sarl à l’Acheteur. <br></div><div><br></div><div><b>Article 2</b></div><div>...<br></div>                          \r\n                        <br>', '5/addCard.png', '2021-05-03 18:15:17', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `storeshop`
--

CREATE TABLE `storeshop` (
  `id_mag` int(4) NOT NULL,
  `name` varchar(44) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_box` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `altitude` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(103) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_img` varchar(31) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_town` int(4) NOT NULL,
  `phone_ss` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_mag` int(1) NOT NULL DEFAULT '-1',
  `date_reg_mag` datetime NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `storeshop`
--

INSERT INTO `storeshop` (`id_mag`, `name`, `po_box`, `longitude`, `latitude`, `altitude`, `description`, `building_img`, `id_town`, `phone_ss`, `state_mag`, `date_reg_mag`, `details`) VALUES
(1, 'Douala - Mag1', 'En attente', '0', '0', '0', 'Marché Dalip, Immeuble BIOLUX', '1/outside000.PNG', 1, '243139842', 1, '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.'),
(5, 'Douala - Mag2', 'Magasin Test1', '123.125477', '123.1245877', '123.124577', 'Description simple', '4/manequin01.jpg', 4, '123456789', 1, '2021-09-04 00:00:00', NULL),
(7, 'Kinshasa - Mag1', '533 Kinshasa', '12.124578', '14.123456', '2.4582367', 'Une desription doit être renseignée', '3/123456789.jpg', 3, '652341571', 1, '2021-09-06 00:00:00', NULL),
(10, 'Douala - Mag3', '456 Douala-Cameroun', '12.124579', '14.123401', '2.4582001', 'Magasin face entrée ...', '1/surmesures.png', 1, '642758452', 1, '2021-09-20 00:00:00', NULL),
(11, 'Kinshasa - Mag2', '4582 Kinshasa', '13.115578', '13.145426', '5.4582367', 'Un dernier text en guise de description', '3/Capture00.JPG', 3, '653214543', 0, '2021-09-20 00:00:00', NULL),
(12, 'Yaoundé - Mag1', '459 Yaoundé-Cameroun', '12.124578', '14.123456', '2.4582367', 'Avenue KENNEDY', '2/outside000.PNG', 2, '677637483', 1, '2021-09-27 00:00:00', NULL),
(13, 'Douala - Mag4', 'Un nouveau magasin', '12.124578', '14.123456', '2.4582367', 'Marché NDOKOTI --- Modifier, entrée 404&nbsp;', '1/addCard.png', 1, '698204289', 1, '2021-10-13 00:00:00', NULL),
(14, 'Biolux - Partenaires', 'TOUT.HORIZON', '0.0000001', '0.0000001', '0.0000001', 'Magasin Regroupant tous les collaborateurs et externes', NULL, 1, 'AUCUN.NUMERO', -1, '2021-10-13 00:00:00', NULL),
(15, 'BIOLUX OPTICAL', 'www.bioluxoptical.com', '9999999999999', '9999999999999', '9999999999999', 'Ce magasin virtuel est celui géré par l\'administrateur', 'fa fa-building-0', 1, '698204289', -1, '2021-05-01 13:22:54', 'Un plus de détails pour plus tard');

-- --------------------------------------------------------

--
-- Structure de la table `sub_category`
--

CREATE TABLE `sub_category` (
  `id_sub_cat` int(4) NOT NULL,
  `date_s_cat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `label_c_cat` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(8) NOT NULL,
  `id_cat` int(2) NOT NULL,
  `img_sub_cat` varchar(44) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_sub_cat` int(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_category`
--

INSERT INTO `sub_category` (`id_sub_cat`, `date_s_cat`, `label_c_cat`, `id_user`, `id_cat`, `img_sub_cat`, `state_sub_cat`) VALUES
(2, '2021-08-30 09:00:00', 'HOMME', 8, 1, '1/homme.png', 1),
(3, '2021-08-30 17:00:00', 'FEMME', 8, 1, '1/manequin04.jpg', 1),
(4, '2021-08-30 00:50:00', 'ENFANT', 8, 1, '1/enfant.png', 1),
(5, '2021-08-30 00:37:00', 'MIXTE', 8, 1, '1/manequin02.jpg', 1),
(6, '2021-08-29 08:00:00', 'CARREE', 8, 2, '2/carree.jpg', 1),
(7, '2021-08-29 00:00:00', 'PAPILLON', 1, 2, '2/manequin01.png', 1),
(8, '2021-08-28 00:00:00', 'RECTANGULAIRE', 8, 2, '2/rectangle.jpg', 1),
(9, '2021-08-31 18:00:00', 'RONDE', 8, 2, '2/ronde.png', 1),
(10, '2021-08-30 00:29:00', 'OVALE', 8, 2, '2/ovale.jpg', 1),
(11, '2021-08-30 00:00:00', 'HARD DESIGN', 1, 3, '3/manequin03.png', 1),
(12, '2021-08-29 00:00:00', 'SOFT DESIGN', 8, 3, NULL, 1),
(13, '2021-08-29 00:00:00', 'PROGESSIF OFFICE', 8, 3, NULL, 1),
(14, '2021-08-28 00:00:00', 'SEGMENT DROIT', 8, 4, NULL, 1),
(15, '2021-08-28 12:00:00', 'SEGMENT ROND', 8, 4, NULL, 1),
(16, '2021-08-27 00:00:00', 'SEGMENT DIFFUS', 8, 4, NULL, 1),
(17, '2021-08-31 00:00:00', 'VISION SIMPLE', 8, 4, NULL, 1),
(18, '2021-08-28 12:35:00', 'SPHERIQUE', 8, 4, NULL, 1),
(19, '2021-08-30 08:29:31', 'TORIQUE', 8, 4, NULL, 1),
(20, '2021-08-31 00:00:00', 'ASPHIQUE', 8, 4, NULL, 1),
(21, '2021-08-29 00:00:00', 'ATORIQUE', 8, 4, NULL, 1),
(22, '2021-08-29 00:00:00', 'NOIRE', 8, 6, '6/noire.png', 1),
(23, '2021-08-29 00:00:00', 'GRISE', 8, 6, NULL, 1),
(24, '2021-10-25 11:20:37', 'GRISE', 8, 5, NULL, 1),
(26, '2021-11-01 13:26:53', 'BLUE Clair', 8, 6, '6/blueclaire.png', 1),
(27, '2021-11-01 13:42:35', 'Grise Claire', 8, 6, '6/GriseClaire.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `town`
--

CREATE TABLE `town` (
  `id_town` int(4) NOT NULL,
  `name_town` varchar(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_country` int(2) NOT NULL,
  `img_town` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `town`
--

INSERT INTO `town` (`id_town`, `name_town`, `id_country`, `img_town`) VALUES
(1, 'Douala', 1, NULL),
(2, 'Yaoundé', 1, NULL),
(3, 'Kinshasa', 2, NULL),
(4, 'Abidjan', 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_prov`
--

CREATE TABLE `type_prov` (
  `id_type` int(2) NOT NULL,
  `name_type` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_type` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_prov`
--

INSERT INTO `type_prov` (`id_type`, `name_type`, `img_type`, `state`) VALUES
(1, 'PARTENAIRE', NULL, 1),
(2, 'OPERATEUR MONETAIRE', NULL, 1),
(3, 'LIVREUR', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_reason`
--

CREATE TABLE `type_reason` (
  `id_type` int(2) NOT NULL,
  `name_type` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_type` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_reason`
--

INSERT INTO `type_reason` (`id_type`, `name_type`, `img_type`) VALUES
(1, 'GENERIQUE', NULL),
(2, 'SERVICE', NULL),
(3, 'LUNETTE', NULL),
(4, 'MONTURE', 'monture.png'),
(5, 'VERRE', 'lentille.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(8) NOT NULL,
  `first_name` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_name` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_number` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(2) NOT NULL,
  `working_time1` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '08h00 - 13h00',
  `working_time2` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT '14h00 - 17h30',
  `genre` tinyint(1) NOT NULL DEFAULT '1',
  `phone` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(58) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diploma` varchar(44) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `years_exp` int(2) DEFAULT NULL,
  `profile_img` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `function` varchar(53) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(44) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mag` int(4) NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `second_name`, `reg_number`, `age`, `working_time1`, `working_time2`, `genre`, `phone`, `email`, `diploma`, `years_exp`, `profile_img`, `function`, `password`, `id_mag`, `date_reg`) VALUES
(1, 'admin', 'bioluxoptical', '21001DLA', 0, '08h00 - 13h00', '13h30 - 17h30', 1, '+237 675 776 125', 'info@bioluxoptical.com', '-----------------', 21, '0/profile_adm00.png', 'biolux-adm@echo', 'ea7c525fee263d03ca145e58281dce8f220218cf', 1, '2021-09-07 03:44:46'),
(2, 'ISSAC', 'Fidèle', '21002DLA', 32, '08h30 - 13h00', '14h00 - 17h30', 1, '676460128', 'fideleissac@gmail.com', 'TECHNICIEN OPTICIEN LUNETTIER', 5, '1/profile_man00.png', 'OPTICIEN', 'ea7c525fee263d03ca145e58281dce8f220218cf', 1, '2021-09-07 03:44:46'),
(3, 'DOLICE', NULL, '21003DLA', 28, '08h00 - 13h00', '14h00 - 17h30', 0, '697328945', 'dolice@gmail.com', 'TECHNICIEN OPTICIEN LUNETTIER', 4, '5/profile_woman01.png', 'OPTICIEN', 'ea7c525fee263d03ca145e58281dce8f220218cf', 1, '2021-09-07 03:44:46'),
(5, 'MAKOU', 'Leocadie ', '21017YDE', 32, '08h30 - 13h00', '14h00 - 17h00', 0, '674984778', 'leocadiemakou@gmail.com', 'TECHNICIEN OPTICIEN LUNETTIER', 5, '5/profile_woman00.png', 'OPTICIEN', 'ea7c525fee263d03ca145e58281dce8f220218cf', 12, '2021-09-07 03:44:46'),
(6, 'TAVEA', 'Frédéric', '21000DLA', 53, '09h00 - 13h00', '14h30 - 16h30', 1, '675776125', 'frederictavea@gmail.com', 'DOCTORAT PHISICIEN', 22, '1/profile_man00.png', 'DIRECTEUR', 'ea7c525fee263d03ca145e58281dce8f220218cf', 1, '2021-09-07 03:44:46'),
(7, 'HEIN', 'JAMES', '2006DLA3', 35, '8h00 - 12h30', '13h00 - 17h30', 1, '698204289', 'jameshein@gmai.com', 'INGENIEUR LUNETTIER', 12, '10/conseil.png', 'Colaborateur', 'c1bb9665cedba25a31c3ad84fb093f73febdc3dc', 14, '2021-09-09 21:57:33'),
(8, 'BIOLUXOPTICAL', 'SARL', 'COMMENT', 22, '08h00 - 13h00', '14h00 - 17h30', 1, '675776125', 'info@bioluxoptical.com', 'ADMINISTRATEUR', 1, '0/profile_adm00.png', 'ADMINISTRATEUR', 'ea7c525fee263d03ca145e58281dce8f220218cf', 1, '2021-10-12 16:22:37'),
(9, 'MINGUIM', 'NICANORD', '16A475FS', 40, '8h30 - 12h10', '13h10 - 16h10', 1, '698204289', 'gi@gim.ghj', 'BTS LUNETTIER', 4, '13/profile_man01.png', 'Gestion du materiel', 'ea7c525fee263d03ca145e58281dce8f220218cf', 13, '2021-10-15 02:26:57'),
(10, 'MANYONG', 'SONIA', '721DLA02', 28, '8h0 - 13h0', '13h0 - 17h30', 0, '677832828', 'maniyongsonia@gmail.com', 'MARKETING EN MANAGEMENT', 3, '13/Diapositive5.JPG', 'LICENCE', '09758952c76a91b4f1d67a31670e787c3fe393d0', 13, '2021-10-27 05:07:13');

-- --------------------------------------------------------

--
-- Structure de la table `users_role`
--

CREATE TABLE `users_role` (
  `id_u_r` int(8) NOT NULL,
  `date_attrib` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(8) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '-1',
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_role`
--

INSERT INTO `users_role` (`id_u_r`, `date_attrib`, `id_user`, `state`, `id_role`) VALUES
(2, '2021-08-29 10:37:38', 1, 1, 1),
(3, '2021-08-29 16:27:25', 1, 1, 2),
(4, '2021-09-09 22:23:00', 7, 1, 4),
(5, '0000-00-00 00:00:00', 8, 1, 1),
(10, '2021-10-13 16:01:55', 2, 1, 4),
(11, '2021-10-13 16:01:55', 3, 1, 4),
(13, '2021-10-13 16:01:55', 6, 1, 2),
(16, '2021-10-14 05:49:06', 5, 1, 4),
(17, '2021-10-15 02:26:57', 9, 0, 2),
(18, '2021-10-27 05:07:13', 10, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `visites_jour`
--

CREATE TABLE `visites_jour` (
  `visites` mediumint(8) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `visites_jour`
--

INSERT INTO `visites_jour` (`visites`, `date`) VALUES
(289, '2021-08-29'),
(12, '2021-08-28'),
(14, '2021-08-27'),
(55, '2021-09-03'),
(154, '2021-09-04'),
(404, '2021-09-05'),
(1139, '2021-09-06'),
(1615, '2021-09-07'),
(514, '2021-09-08'),
(1164, '2021-09-09'),
(3, '2021-09-17'),
(12, '2021-09-18'),
(6, '2021-09-19'),
(10, '2021-09-20'),
(1, '2021-09-21'),
(72, '2021-09-22'),
(111, '2021-09-23'),
(137, '2021-09-24'),
(182, '2021-09-25'),
(1, '2021-09-26'),
(40, '2021-09-27'),
(50, '2021-09-28'),
(102, '2021-09-29'),
(28, '2021-09-30'),
(4, '2021-10-04'),
(289, '2021-10-05'),
(26, '2021-10-12'),
(37, '2021-10-13'),
(24, '2021-10-14'),
(16, '2021-10-15'),
(29, '2021-10-16'),
(37, '2021-10-17'),
(76, '2021-10-18'),
(22, '2021-10-19'),
(48, '2021-10-20'),
(10, '2021-04-27'),
(25, '2021-04-28'),
(25, '2021-04-29'),
(5, '2021-04-30'),
(11, '2021-05-01'),
(38, '2021-05-02'),
(38, '2021-05-02'),
(12, '2021-05-03'),
(6, '2021-05-04'),
(3, '2021-10-23'),
(40, '2021-10-24'),
(68, '2021-10-25'),
(57, '2021-10-26'),
(30, '2021-10-27'),
(21, '2021-10-28'),
(3, '2021-10-30'),
(10, '2021-11-01'),
(19, '2021-05-10'),
(4, '2021-12-09'),
(8, '2021-12-10'),
(11, '2021-12-11'),
(34, '2021-12-12'),
(18, '2021-12-13'),
(4, '2021-12-14'),
(42, '2021-12-15'),
(42, '2021-12-16'),
(14, '2021-12-23'),
(1, '2021-12-25'),
(21, '2021-12-26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id_attrib`),
  ADD KEY `id_mag` (`id_mag`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `bo_sessions`
--
ALTER TABLE `bo_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `id_u_r` (`id_user`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `communicate`
--
ALTER TABLE `communicate`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `user` (`id_user`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_costomer`),
  ADD KEY `Slice_age` (`id_slice_age`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `country` (`id_country`);

--
-- Index pour la table `customer_role`
--
ALTER TABLE `customer_role`
  ADD PRIMARY KEY (`id_u_r`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Index pour la table `delivery_form`
--
ALTER TABLE `delivery_form`
  ADD PRIMARY KEY (`id_deliv`),
  ADD KEY `id_mag` (`id_mag`),
  ADD KEY `id_reason` (`id_reason`),
  ADD KEY `id_prov` (`id_prov`);

--
-- Index pour la table `invemtory_line`
--
ALTER TABLE `invemtory_line`
  ADD PRIMARY KEY (`id_inv_line`),
  ADD KEY `id_inv` (`id_inv`),
  ADD KEY `id_reason` (`id_reason`);

--
-- Index pour la table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_inv`),
  ADD KEY `id_mag` (`id_mag`);

--
-- Index pour la table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id_issue`),
  ADD KEY `id_com` (`id_com`),
  ADD KEY `issuer_id` (`issuer_id`);

--
-- Index pour la table `manipulate`
--
ALTER TABLE `manipulate`
  ADD PRIMARY KEY (`id_manip`),
  ADD KEY `materials` (`id_mat`),
  ADD KEY `users` (`id_user`),
  ADD KEY `costomers` (`id_costomer`);

--
-- Index pour la table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_mat`);

--
-- Index pour la table `mesure`
--
ALTER TABLE `mesure`
  ADD PRIMARY KEY (`id_mes`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `order_cart`
--
ALTER TABLE `order_cart`
  ADD PRIMARY KEY (`id_ord`),
  ADD KEY `id_mag` (`id_mag`),
  ADD KEY `id_costomer` (`id_costomer`),
  ADD KEY `id_prov` (`id_op`),
  ADD KEY `id_user` (`id_manager`);

--
-- Index pour la table `order_qty`
--
ALTER TABLE `order_qty`
  ADD PRIMARY KEY (`id_oq`),
  ADD KEY `id_reason` (`id_reason`),
  ADD KEY `id_order` (`id_order`);

--
-- Index pour la table `propose`
--
ALTER TABLE `propose`
  ADD PRIMARY KEY (`id_prop`),
  ADD KEY `id_mag` (`id_mag`),
  ADD KEY `id_reason` (`id_reason`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id_prov`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_type` (`type_prov`);

--
-- Index pour la table `reason`
--
ALTER TABLE `reason`
  ADD PRIMARY KEY (`id_reason`),
  ADD KEY `id_cat_reason` (`id_cat_reason`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `type_reason` (`type_reason`),
  ADD KEY `id_sub_cat` (`id_sub_cat`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `slice_age`
--
ALTER TABLE `slice_age`
  ADD PRIMARY KEY (`id_slice_age`);

--
-- Index pour la table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `storeshop`
--
ALTER TABLE `storeshop`
  ADD PRIMARY KEY (`id_mag`),
  ADD KEY `id_town` (`id_town`),
  ADD KEY `id_town_2` (`id_town`);

--
-- Index pour la table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id_sub_cat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id_town`),
  ADD KEY `id_country` (`id_country`);

--
-- Index pour la table `type_prov`
--
ALTER TABLE `type_prov`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `type_reason`
--
ALTER TABLE `type_reason`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_mag` (`id_mag`);

--
-- Index pour la table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_u_r`),
  ADD KEY `users` (`id_user`),
  ADD KEY `role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id_attrib` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `bo_sessions`
--
ALTER TABLE `bo_sessions`
  MODIFY `session_id` int(17) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `communicate`
--
ALTER TABLE `communicate`
  MODIFY `id_com` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_costomer` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `customer_role`
--
ALTER TABLE `customer_role`
  MODIFY `id_u_r` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `delivery_form`
--
ALTER TABLE `delivery_form`
  MODIFY `id_deliv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invemtory_line`
--
ALTER TABLE `invemtory_line`
  MODIFY `id_inv_line` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_inv` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `issue`
--
ALTER TABLE `issue`
  MODIFY `id_issue` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT pour la table `manipulate`
--
ALTER TABLE `manipulate`
  MODIFY `id_manip` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `material`
--
ALTER TABLE `material`
  MODIFY `id_mat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `mesure`
--
ALTER TABLE `mesure`
  MODIFY `id_mes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `order_cart`
--
ALTER TABLE `order_cart`
  MODIFY `id_ord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `order_qty`
--
ALTER TABLE `order_qty`
  MODIFY `id_oq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `propose`
--
ALTER TABLE `propose`
  MODIFY `id_prop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `provider`
--
ALTER TABLE `provider`
  MODIFY `id_prov` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `reason`
--
ALTER TABLE `reason`
  MODIFY `id_reason` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `slice_age`
--
ALTER TABLE `slice_age`
  MODIFY `id_slice_age` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `storeshop`
--
ALTER TABLE `storeshop`
  MODIFY `id_mag` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id_sub_cat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `town`
--
ALTER TABLE `town`
  MODIFY `id_town` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type_prov`
--
ALTER TABLE `type_prov`
  MODIFY `id_type` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_reason`
--
ALTER TABLE `type_reason`
  MODIFY `id_type` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_u_r` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attribute`
--
ALTER TABLE `attribute`
  ADD CONSTRAINT `attribute_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `attribute_ibfk_2` FOREIGN KEY (`id_mat`) REFERENCES `material` (`id_mat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attribute_ibfk_3` FOREIGN KEY (`id_mag`) REFERENCES `storeshop` (`id_mag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `communicate`
--
ALTER TABLE `communicate`
  ADD CONSTRAINT `communicate_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`id_slice_age`) REFERENCES `slice_age` (`id_slice_age`) ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_3` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`);

--
-- Contraintes pour la table `customer_role`
--
ALTER TABLE `customer_role`
  ADD CONSTRAINT `customer_role_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_costomer`),
  ADD CONSTRAINT `customer_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `delivery_form`
--
ALTER TABLE `delivery_form`
  ADD CONSTRAINT `delivery_form_ibfk_1` FOREIGN KEY (`id_prov`) REFERENCES `provider` (`id_prov`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delivery_form_ibfk_2` FOREIGN KEY (`id_reason`) REFERENCES `reason` (`id_reason`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delivery_form_ibfk_3` FOREIGN KEY (`id_mag`) REFERENCES `storeshop` (`id_mag`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `invemtory_line`
--
ALTER TABLE `invemtory_line`
  ADD CONSTRAINT `invemtory_line_ibfk_1` FOREIGN KEY (`id_inv`) REFERENCES `inventory` (`id_inv`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invemtory_line_ibfk_2` FOREIGN KEY (`id_reason`) REFERENCES `reason` (`id_reason`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`id_mag`) REFERENCES `storeshop` (`id_mag`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`id_com`) REFERENCES `communicate` (`id_com`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`issuer_id`) REFERENCES `customer` (`id_costomer`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `manipulate`
--
ALTER TABLE `manipulate`
  ADD CONSTRAINT `manipulate_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `manipulate_ibfk_2` FOREIGN KEY (`id_mat`) REFERENCES `material` (`id_mat`) ON DELETE CASCADE,
  ADD CONSTRAINT `manipulate_ibfk_3` FOREIGN KEY (`id_costomer`) REFERENCES `customer` (`id_costomer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mesure`
--
ALTER TABLE `mesure`
  ADD CONSTRAINT `mesure_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `order_cart`
--
ALTER TABLE `order_cart`
  ADD CONSTRAINT `order_cart_ibfk_2` FOREIGN KEY (`id_costomer`) REFERENCES `customer` (`id_costomer`),
  ADD CONSTRAINT `order_cart_ibfk_3` FOREIGN KEY (`id_mag`) REFERENCES `storeshop` (`id_mag`),
  ADD CONSTRAINT `order_cart_ibfk_4` FOREIGN KEY (`id_manager`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `order_cart_ibfk_5` FOREIGN KEY (`id_op`) REFERENCES `provider` (`id_prov`);

--
-- Contraintes pour la table `order_qty`
--
ALTER TABLE `order_qty`
  ADD CONSTRAINT `order_qty_ibfk_1` FOREIGN KEY (`id_reason`) REFERENCES `reason` (`id_reason`),
  ADD CONSTRAINT `order_qty_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order_cart` (`id_ord`);

--
-- Contraintes pour la table `propose`
--
ALTER TABLE `propose`
  ADD CONSTRAINT `propose_ibfk_1` FOREIGN KEY (`id_reason`) REFERENCES `reason` (`id_reason`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `propose_ibfk_2` FOREIGN KEY (`id_mag`) REFERENCES `storeshop` (`id_mag`) ON UPDATE CASCADE,
  ADD CONSTRAINT `propose_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `provider_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `provider_ibfk_2` FOREIGN KEY (`type_prov`) REFERENCES `type_prov` (`id_type`);

--
-- Contraintes pour la table `reason`
--
ALTER TABLE `reason`
  ADD CONSTRAINT `reason_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reason_ibfk_2` FOREIGN KEY (`id_cat_reason`) REFERENCES `category` (`id_cat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reason_ibfk_3` FOREIGN KEY (`type_reason`) REFERENCES `type_reason` (`id_type`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reason_ibfk_4` FOREIGN KEY (`id_sub_cat`) REFERENCES `sub_category` (`id_sub_cat`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `slide_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `storeshop`
--
ALTER TABLE `storeshop`
  ADD CONSTRAINT `storeshop_ibfk_1` FOREIGN KEY (`id_town`) REFERENCES `town` (`id_town`);

--
-- Contraintes pour la table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `town`
--
ALTER TABLE `town`
  ADD CONSTRAINT `town_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_mag`) REFERENCES `storeshop` (`id_mag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_role`
--
ALTER TABLE `users_role`
  ADD CONSTRAINT `users_role_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `users_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
