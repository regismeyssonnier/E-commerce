-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Mercredi 25 Mars 2009 à 12:24
-- Version du serveur: 5.0.27
-- Version de PHP: 5.2.0
-- 
-- Base de données: `projet_php`
-- 

-- --------------------------------------------------------

-- 
-- Creation de la base Projet_php
-- 
DROP DATABASE IF EXISTS `projet_php_regis_meysso`;

CREATE DATABASE IF NOT EXISTS `projet_php_regis_meysso`;
USE `projet_php_regis_meysso`;

-- 
-- Structure de la table `art_cat_car`
-- 

CREATE TABLE `ART_CAT_CAR` (
  `ID_ARTICLE_A` int(11) NOT NULL,
  `CODE_CATEGORIE_A` int(11) NOT NULL,
  `CODE_CARACTERISTIQUE_A` int(11) NOT NULL,
  PRIMARY KEY  (`ID_ARTICLE_A`,`CODE_CATEGORIE_A`,`CODE_CARACTERISTIQUE_A`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `art_cat_car`
-- 

INSERT INTO `ART_CAT_CAR` (`ID_ARTICLE_A`, `CODE_CATEGORIE_A`, `CODE_CARACTERISTIQUE_A`) VALUES 
(1, 2, 1),
(1, 2, 5),
(1, 2, 9),
(1, 2, 11),
(2, 2, 1),
(2, 2, 5),
(2, 2, 8),
(2, 2, 11),
(3, 2, 1),
(3, 2, 4),
(3, 2, 10),
(3, 2, 11),
(4, 2, 1),
(4, 2, 5),
(4, 2, 9),
(4, 2, 11),
(5, 2, 1),
(5, 2, 6),
(5, 2, 7),
(5, 2, 11),
(6, 2, 2),
(6, 2, 6),
(6, 2, 7),
(6, 2, 11),
(7, 2, 1),
(7, 2, 3),
(7, 2, 9),
(7, 2, 11),
(8, 2, 1),
(8, 2, 4),
(8, 2, 9),
(8, 2, 11),
(9, 2, 1),
(9, 2, 3),
(9, 2, 8),
(9, 2, 11),
(10, 2, 1),
(10, 2, 6),
(10, 2, 7),
(10, 2, 11),
(11, 2, 1),
(11, 2, 5),
(11, 2, 9),
(11, 2, 11),
(12, 2, 1),
(12, 2, 5),
(12, 2, 8),
(12, 2, 11),
(13, 2, 2),
(13, 2, 6),
(13, 2, 7),
(13, 2, 11),
(14, 2, 1),
(14, 2, 6),
(14, 2, 9),
(14, 2, 11),
(15, 2, 4),
(15, 2, 10),
(15, 2, 11),
(15, 2, 12),
(16, 2, 2),
(16, 2, 6),
(16, 2, 7),
(16, 2, 11),
(17, 2, 4),
(17, 2, 10),
(17, 2, 11),
(17, 2, 12),
(18, 2, 1),
(18, 2, 3),
(18, 2, 9),
(18, 2, 11),
(19, 2, 1),
(19, 2, 6),
(19, 2, 8),
(19, 2, 11),
(20, 2, 4),
(20, 2, 8),
(20, 2, 11),
(20, 2, 12),
(21, 2, 1),
(21, 2, 3),
(21, 2, 7),
(21, 2, 11),
(22, 2, 1),
(22, 2, 3),
(22, 2, 7),
(22, 2, 11),
(23, 2, 2),
(23, 2, 6),
(23, 2, 7),
(23, 2, 11),
(24, 2, 1),
(24, 2, 3),
(24, 2, 8),
(24, 2, 11),
(25, 2, 2),
(25, 2, 6),
(25, 2, 7),
(25, 2, 11),
(26, 3, 0),
(27, 5, 13),
(27, 5, 15),
(28, 5, 14),
(28, 5, 15),
(28, 5, 16),
(29, 5, 14),
(29, 5, 15),
(29, 5, 16),
(30, 5, 13),
(30, 5, 15),
(31, 5, 14),
(31, 5, 15),
(31, 5, 16),
(32, 5, 14),
(32, 5, 15),
(32, 5, 16),
(33, 5, 13),
(33, 5, 15),
(34, 5, 13),
(34, 5, 15),
(35, 5, 14),
(35, 5, 15),
(35, 5, 16),
(36, 5, 13),
(36, 5, 15),
(37, 5, 14),
(37, 5, 15),
(37, 5, 16),
(38, 5, 14),
(38, 5, 15),
(38, 5, 16),
(39, 5, 14),
(39, 5, 15),
(39, 5, 16),
(40, 5, 14),
(40, 5, 15),
(40, 5, 16),
(41, 5, 14),
(41, 5, 15),
(41, 5, 16),
(42, 12, 14),
(42, 12, 17),
(43, 12, 14),
(43, 12, 17),
(44, 12, 14),
(44, 12, 17),
(45, 12, 14),
(45, 12, 17),
(46, 12, 14),
(46, 12, 17),
(47, 12, 14),
(47, 12, 17),
(48, 12, 13),
(48, 12, 17),
(49, 12, 14),
(49, 12, 17),
(50, 12, 14),
(50, 12, 17),
(51, 12, 14),
(51, 12, 17),
(52, 13, 17),
(53, 13, 17),
(54, 13, 17),
(55, 13, 17),
(56, 13, 17),
(57, 13, 17),
(58, 13, 17),
(59, 13, 17),
(60, 13, 17),
(61, 13, 17),
(62, 15, 18),
(63, 15, 18),
(64, 16, 19),
(64, 16, 22),
(65, 16, 20),
(65, 16, 22),
(66, 16, 19),
(66, 16, 21),
(67, 16, 20),
(67, 16, 22),
(68, 16, 20),
(68, 16, 22),
(69, 16, 20),
(69, 16, 22),
(70, 16, 19),
(70, 16, 21),
(71, 16, 20),
(71, 16, 22),
(72, 16, 20),
(72, 16, 22),
(73, 16, 20),
(73, 16, 22),
(74, 18, 23),
(75, 18, 24),
(76, 18, 25),
(77, 18, 23),
(78, 18, 24),
(79, 18, 24),
(80, 18, 25),
(81, 18, 24),
(82, 18, 23),
(83, 18, 26),
(84, 19, 27),
(84, 19, 28),
(84, 19, 30),
(85, 19, 27),
(85, 19, 29),
(85, 19, 30),
(86, 19, 27),
(86, 19, 28),
(86, 19, 30),
(87, 19, 27),
(87, 19, 29),
(87, 19, 30),
(88, 19, 27),
(88, 19, 28),
(88, 19, 30),
(89, 19, 27),
(89, 19, 29),
(89, 19, 31),
(90, 19, 27),
(90, 19, 28),
(90, 19, 31),
(91, 19, 27),
(91, 19, 29),
(91, 19, 31),
(92, 19, 27),
(92, 19, 28),
(92, 19, 31),
(93, 19, 27),
(93, 19, 29),
(93, 19, 31),
(94, 21, 32),
(94, 21, 34),
(95, 21, 32),
(95, 21, 35),
(96, 22, 33),
(96, 22, 34),
(97, 22, 33),
(97, 22, 35),
(98, 22, 33),
(98, 22, 34),
(99, 22, 33),
(99, 22, 35),
(100, 22, 33),
(100, 22, 35),
(101, 22, 33),
(101, 22, 35),
(102, 22, 33),
(102, 22, 34),
(103, 22, 33),
(103, 22, 35),
(104, 22, 33),
(104, 22, 35),
(105, 22, 33),
(105, 22, 35);

-- --------------------------------------------------------

-- 
-- Structure de la table `article`
-- 

CREATE TABLE `ARTICLE` (
  `ID_ARTICLE` int(11) NOT NULL auto_increment,
  `NOM_ARTICLE` varchar(500) NOT NULL,
  `PRIX_ARTICLE` double NOT NULL,
  `LIBELLE_ARTICLE` text,
  `CODE_OFFRE` int(11) default NULL,
  PRIMARY KEY  (`ID_ARTICLE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

-- 
-- Contenu de la table `article`
-- 

INSERT INTO `ARTICLE` (`ID_ARTICLE`, `NOM_ARTICLE`, `PRIX_ARTICLE`, `LIBELLE_ARTICLE`, `CODE_OFFRE`) VALUES 
(3, 'Asus Xenon', 1300, 'Nouveau portable dernière génération', NULL),
(2, 'Sony Vaio', 1750, 'Portable Sony dernière génération', NULL),
(1, 'Acer X322 power plus', 1500, 'Magnifique portable d''un rapport qualité prix sans pareil', 1),
(4, 'Hewlett Packard Notepad 3200', 1650, 'Portable Hewlett Packard puissant au design très soigner', NULL),
(5, 'Asus Inspector', 2000, 'Portable doté d''un processeur surpuissant', NULL),
(6, 'Acer 522', 2500, 'Portable de luxe', NULL),
(7, 'Hewlett Packard Serie 5', 1560, 'Portable de grande qualité', NULL),
(8, 'Sony Vaio 2', 1500, 'Portbale succédant au Vaio première génération', 2),
(9, 'Sony Vaio 2 power plus', 2100, 'Variante du Vaio 2', NULL),
(10, 'Acer X355', 2500, 'Portable dernière génération surpuissant', NULL),
(11, 'Asus Inspiron', 1700, 'Portable Asus sobre et puissant', NULL),
(12, 'Asus Inspiron serie plus', 1800, 'Portable possédant un processeur plus puissant que son frère l''Inspiron', NULL),
(13, 'Acer 565', 2500, 'Portable surpuissant ', 2),
(14, 'Hewlett Packard serie 3', 1500, 'Petit portable fait pour le multimédia', NULL),
(15, 'Acer mini', 1200, 'Mini portable', NULL),
(16, 'Acer 655', 2500, 'Portable surpuissant', NULL),
(17, 'Hewlett Packard serie 1', 1250, 'Petit portable puissant et charmant', NULL),
(18, 'Hewlett Packard serie 2', 1500, 'Portable issu de la série 2 comportant un beau design', NULL),
(19, 'Acer 322', 1890, 'Portable fait multimédia et la vidéo ', 3),
(20, 'IBM Touchpad', 1700, 'Petit portable très puissant', NULL),
(21, 'Asus Detector', 2000, 'Portable de couleur blanche très puissant', NULL),
(22, 'Acer 555', 2000, 'Portable puissant', NULL),
(23, 'Acer big screen', 2200, 'Portable 19 pouces très puissant', 3),
(24, 'Asus Xylo', 1750, 'Portable puissant de couleur noir', NULL),
(25, 'Hewlett Packard Serie 6', 2350, 'Portable très puissant', NULL),
(26, 'kit evolution Intel Xenon', 560, 'Ce kit evolution permettra de boster et faire éoluer votre ordinateur', 4),
(27, 'Alimentation  PC Philipps 1100', 500, 'Alimentation PC Philipps premier prix', NULL),
(28, 'Alimentation  PC Philipps 1200', 600, 'Alimentation PC haut de gamme', NULL),
(29, 'Alimentation PC Philipps 1250', 650, 'Alimentation PC haut de gamme', NULL),
(30, 'Alimentation PC Xenler 500', 450, 'Alimentation PC Xenler premier prix', NULL),
(31, 'Alimentation PC Xenler 600', 600, 'Alimentation PC Xenler haut de gamme', NULL),
(32, 'Alimentation PC Xenler 700', 700, 'Alimentation PC Xenler haut de gamme', 2),
(33, 'Alimentation PC Bastion 400', 400, 'Alimentation PC Bastion entrée de gamme', NULL),
(34, 'Alimentation PC Bastion 450', 450, 'Alimentation PC Bastion milieu de gamme', NULL),
(35, 'Alimentation PC Bastion 500', 550, 'Alimentation PC Bastion haut de gamme', NULL),
(36, 'Alimentation  PC Philipps 1000', 450, 'Alimentation PC bas prix', NULL),
(37, 'Alimentation PC Xestion 400', 600, 'Alimentation PC Xestion haut de gamme', NULL),
(38, 'Alimentation PC Xestion 450', 650, 'Alimentation PC Xestion haut de gamme', NULL),
(39, 'Alimentation PC Xestion 600', 700, 'Alimentation PC Xestion haut de gamme', 1),
(40, 'Alimentation PC Xestion 650', 750, 'Alimentation PC Xestion haut de gamme', NULL),
(41, 'Alimentation PC Xestion 700', 800, 'Alimentation PC Xestion haut de gamme', NULL),
(42, 'Boitier Gladiator ATX 322', 50, 'Grand boitier avec alimentation', 4),
(43, 'Boitier Gladiator QTZ 325', 70, 'Grand boitier avec alimentation', NULL),
(44, 'Boitier Gladiator XYZ 500', 70, 'Grand Boitier Gladiator avec alimentation', NULL),
(45, 'Boitier Gladiator XYZ 500 Blanc', 70, 'Grand boitier Gladiator de couleur blanche avec alimentation', NULL),
(46, 'Boitier Gladiator QVX 500', 70, 'Grand boitier Gladiator avec alimentation', NULL),
(47, 'Boitier Gladiator DFR 500', 70, 'Grand boitier gladiator avec alimentation', NULL),
(48, 'Boitier Moyen Gladiator X455', 45, 'Boitier moyen Gladiator avec alimentation', 3),
(49, 'Boitier Gladiator TYU 500', 70, 'Grand boitier Gladiator avec alimentation', NULL),
(50, 'Boitier Gladiator TYU 500 Blanc', 70, 'Grand boitier Gladiator de couleur blanche avec alimentation', NULL),
(51, 'Boitier Gladiator KLM 500', 75, 'Grand boitier Gladiator avec alimentation', NULL),
(52, 'Boitier Alliage X322', 70, 'Grand boitier Alliage avec côté transparent sans alimentation', NULL),
(53, 'Boitier Alliage X323', 70, 'Grand Boitier Alliage sans alimentation', NULL),
(54, 'Boitier Alliage X355', 125, 'Grand boitier Alliage doté d''un très beau design sans alimentation', 2),
(55, 'Boitier Alliage X365', 150, 'Grand boitier Alliage sans alimentation doté d''un très beau design ', NULL),
(56, 'Boitier Alliage X345', 75, 'Grand boitier Alliage sans alimentation', NULL),
(57, 'Boitier Alliage X350', 89, 'Grand boitier Alliage sans alimentation', NULL),
(58, 'Boitier Alliage XPower', 100, 'Grand boitier Alliage sans alimentation', NULL),
(59, 'Boitier Alliage X500', 50, 'Grand boitier Alliage sans alimentation', NULL),
(60, 'Boitier Alliage X655', 125, 'Grand boitier Alliage sans alimentation', 1),
(61, 'Boitier Alliage X600', 110, 'Grand boitier Alliage sans alimentation', NULL),
(62, 'Graveur Blu ray Samsung X425', 125, 'Graveur Blu ray', NULL),
(63, 'Graveur Blu ray Samsung X555', 150, 'Graveur Blu ray dernière génération', 1),
(64, 'Graveur DVD Samsung X555', 150, 'Graveur DVD très rapide', NULL),
(65, 'Graveur DVD Philips Z896', 125, 'Graveur DVD haut de gamme', NULL),
(66, 'Graveur DVD Samsung X322', 75, 'Graveur DVD ayant un très bon raport qualité prix', NULL),
(67, 'Graveur DVD Sony Xenon', 100, 'Graveur DVD Sony haut de gamme', NULL),
(68, 'Graveur DVD Samsung Ultra Serie', 125, 'Graveur DVD Samsung haut de gamme', NULL),
(69, 'Graveur DVD Samsung X600', 150, 'Graveur DVD Samsung dernière génération haut de gamme', 1),
(70, 'Graveur DVD Samsung X450', 75, 'Graveur DVD Samsung milieu de gamme', NULL),
(71, 'Graveur DVD Philips Z900', 150, 'Graveur DVD Philips haut de gamme', NULL),
(72, 'Graveur DVD Samsung Z500', 150, 'Graveur DVD Samsung très haut de gamme dernière génération', NULL),
(73, 'Graveur DVD Samsung Z600', 175, 'Graveur DVD haut de gamme', 1),
(74, 'Cle USB Kingston Datatraveler', 10, 'Cle USB 2Go', NULL),
(75, 'Cle USB Kingston Datatraveler4', 15, 'Cle USB 4Go', NULL),
(76, 'Cle USB Kingston Datatraveler8', 20, 'Cle USB 8Go de couleur verte', NULL),
(77, 'Cle USB LG', 12, 'Cle USB 2Go', NULL),
(78, 'Cle USB Maxston', 15, 'Cle USB 4Go', NULL),
(79, 'Cle USB Sony', 15, 'Cle USB 4Go', NULL),
(80, 'Cle USB LG MAX', 20, 'Cle USB 8Go', 3),
(81, 'Cle USB LG Travel', 15, 'Cle USB 4Go', NULL),
(82, 'Cle USB Sony X22', 8, 'Cle USB 2Go', NULL),
(83, 'Cle USB Kingston King Size', 20, 'Cle USB 16Go', NULL),
(84, 'Disque dur externe Western Digital X250', 150, 'Disque dur externe prêt à brancher', 1),
(85, 'Disque dur externe Maxton X250', 150, 'Disque dur externe prêt à être brancher, ultra rapide', NULL),
(86, 'Disque dur externe Maxtor X250', 120, 'Disque dur externe prêt à être brancher', NULL),
(87, 'Disque dur externe Western Digital X250 plus', 150, 'Disque dur externe prêt à être brancher, utra rapide', 1),
(88, 'Disque dur externe Philips X250', 125, 'Disque dur externe prêt à être brancher', NULL),
(89, 'Disque dur externe Philips X500', 200, 'Disque dur externe prêt à être brancher, ultra rapide', NULL),
(90, 'Disque dur externe Maxtor X500', 220, 'Disque dur externe prêt à être brancher', NULL),
(91, 'Disque dur externe Maxton X500', 220, 'Disque dur externe prêt à être brancher, ultra rapide', NULL),
(92, 'Disque dur externe Western Digital X500', 225, 'Disque dur externe prêt à être brancher', NULL),
(93, 'Disque dur externe Western Digital X500 plus', 250, 'Disque dur externe prêt à être brancher, ultra rapide', 1),
(94, 'Moniteur 17 pouces Philipps LCD Screen', 200, 'Moniteur 17 pouces très haute qualité', NULL),
(95, 'Moniteur 17 pouces Samsung LCD Screen', 225, 'Moniteur LCD 17 pouces très haute qualité', NULL),
(96, 'Moniteur 19 pouces Philipps LCD Screen', 320, 'Moniteur 19 pouces Philipps très haute qualité', NULL),
(97, 'Moniteur 19 pouces Samsung LCD Screen', 350, 'Moniteur 19 pouces Samsung de très haute qualité', 2),
(98, 'Moniteur 19 pouces Samsung LCD Screen spider', 325, 'Moniteur LCD 19 pouces Samsung de très haute qualité', NULL),
(99, 'Moniteur LCD 19 pouces Iyama X500', 320, 'Moniteur LCD 19 pouces Iyama dernière génération de très haute qualité', NULL),
(100, 'Moniteur LCD 19 pouces Iyama X600', 325, 'Moniteur LCD 19 pouces Iyama dernière génération', NULL),
(101, 'Moniteur LCD 19 pouces Asus Xenon', 320, 'Moniteur LCD 19 pouces Asus très haute qualité', NULL),
(102, 'Moniteur LCD 19 pouces Acer X450', 300, 'Moniteur LCD 19 pouces dernière génération', NULL),
(103, 'Moniteur LCD 19 pouces Acer X300', 300, 'Moniteur LCD 19 pouces Acer de très haute qualité', NULL),
(104, 'Moniteur LCD 19 pouces Philips X300', 300, 'Moniteur LCD 19 pouces Philips dernière génération', NULL),
(105, 'Moniteur LCD 19 pouces Acer Home Theater', 350, 'Moniteur LCD 19 pouces Acer Home Theater dernière génération', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `caracteristique`
-- 

CREATE TABLE `CARACTERISTIQUE` (
  `CODE_CARACTERISTIQUE` int(11) NOT NULL auto_increment,
  `LIBELLE_CARACTERISTIQUE` varchar(255) NOT NULL,
  PRIMARY KEY  (`CODE_CARACTERISTIQUE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- 
-- Contenu de la table `caracteristique`
-- 

INSERT INTO `CARACTERISTIQUE` (`CODE_CARACTERISTIQUE`, `LIBELLE_CARACTERISTIQUE`) VALUES 
(1, 'écran 17 pouces'),
(2, 'écran 19 pouces'),
(3, 'Carte graphique ATI Radeon HD3650'),
(4, 'Carte graphique ATI Xilax'),
(5, 'Carte graphique Nvidia X3000'),
(6, 'Carte graphique Nvidia X4000'),
(7, 'Processeur Intel Core 2 duo 3ghz'),
(8, 'Processeur Intel Core 2 duo 2.5ghz'),
(9, 'Processeur Intel Core 2 duo 2ghz'),
(10, 'Processeur Intel Core 2 duo 1.7ghz'),
(11, 'Système Windows Vista Familiale'),
(12, 'écran 15 pouces'),
(13, 'Alimentation 500W'),
(14, 'Alimentation 520W'),
(15, 'Ventilateur 12cm'),
(16, 'Connecteur plaqués or'),
(17, '4 ports USB 2.0'),
(18, 'Vitesse du graveur X16'),
(19, 'Mémoire tampon 2Mo'),
(20, 'Mémoire tampon 4Mo'),
(21, 'Vitesse du graveur X48'),
(22, 'Vitesse du graveur X64'),
(23, 'Cle USB 2Go'),
(24, 'Cle USB 4Go'),
(25, 'Cle USB 8Go'),
(26, 'Cle USB 16Go'),
(27, 'USB 2.0'),
(28, 'Vitesse : 8000tr/min'),
(29, 'Vitesse : 12000tr/min'),
(30, 'Disque dur 250Go'),
(31, 'Disque dur 500Go'),
(32, 'Format : 17 pouces'),
(33, 'Format : 19 pouces'),
(34, 'Résolution : 1368*428'),
(35, 'Résolution : 1500 * 550');

-- --------------------------------------------------------

-- 
-- Structure de la table `categorie`
-- 

CREATE TABLE `CATEGORIE` (
  `CODE_CATEGORIE` int(11) NOT NULL auto_increment,
  `LIBELLE_CATEGORIE` varchar(250) NOT NULL,
  `CODE_CAT` int(11) default NULL,
  PRIMARY KEY  (`CODE_CATEGORIE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

-- 
-- Contenu de la table `categorie`
-- 

INSERT INTO `CATEGORIE` (`CODE_CATEGORIE`, `LIBELLE_CATEGORIE`, `CODE_CAT`) VALUES 
(1, 'Ordinateur', NULL),
(2, 'Ordinateurs portable', 1),
(3, 'kit evolution', 1),
(4, 'Composant', NULL),
(5, 'Alimentation pc', 4),
(6, 'Boitier', 4),
(14, 'Graveur', 4),
(13, 'Boitier PC sans alimentation', 6),
(12, 'Boitier PC alimentation', 6),
(15, 'Graveur Blu ray', 14),
(16, 'Graveur DVD', 14),
(17, 'Périphérique', NULL),
(18, 'Cle USB', 17),
(19, 'Disque dur externe', 17),
(20, 'Moniteur LCD', 17),
(21, 'Moniteur 17', 20),
(22, 'Moniteur 19', 20);

-- --------------------------------------------------------

-- 
-- Structure de la table `client`
-- 

CREATE TABLE `CLIENT` (
  `ID_CLIENT` int(11) NOT NULL auto_increment,
  `NOM_CLIENT` varchar(100) NOT NULL,
  `PRENOM_CLIENT` varchar(100) NOT NULL,
  `ADRESSE_CLIENT` varchar(255) NOT NULL,
  `CP_CLIENT` varchar(5) NOT NULL,
  `VILLE_CLIENT` varchar(100) NOT NULL,
  `TELEPHONE_CLIENT` varchar(10) default NULL,
  `EMAIL_CLIENT` varchar(150) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `MDP` varchar(50) NOT NULL,
  `PROFIL` varchar(15) default NULL,
  PRIMARY KEY  (`ID_CLIENT`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Contenu de la table `client`
-- 

INSERT INTO `CLIENT` (`ID_CLIENT`, `NOM_CLIENT`, `PRENOM_CLIENT`, `ADRESSE_CLIENT`, `CP_CLIENT`, `VILLE_CLIENT`, `TELEPHONE_CLIENT`, `EMAIL_CLIENT`, `LOGIN`, `MDP`, `PROFIL`) VALUES 
(1, 'Meyssonnier', 'Régis', 'zerfze', '07110', 'Largentière', '0454545454', 'randlmey@aol.com', 'regis', 'fee5a5851188651cfd0aeef9a9b7f1a1', 'administrateur'),
(2, 'Bacquias', 'Régis', 'refrff', '07110', 'Largentière', '0475391590', 'zerfz@aol.com', 'louis', '777cadc280bb23ebea268ded98338c39', 'visiteur'),
(3, 'Herio', 'Régis', 'dfrzefzf', '07110', 'Largentière', '0454545454', 'azd@zz.dza', 'ezde', 'd80cdf5f6cfaad4ede8bcc9b0015149d', 'visiteur'),
(4, 'Meyssonnier', 'Laurent', 'rue de bourgogne', '21000', 'Dijon', '0312658794', 'laurent@aol.com', 'laurent', '34a321664be49e31c2368f6f42798a98', 'acheteur'),
(5, 'Meyssonnier', 'Jacqueline', 'HLM Sainte Foi bat3 n°63', '7110', 'Largentière', '0475391590', 'jacq@aol.com', 'jacqueline', '2faa660770cf3c009cbf8b7e7efef232', 'visiteur'),
(6, 'Meyssonnier', 'Georges', 'HLM Sainte foi', '7110', 'Largentière', '0475391590', 'georges@aol.com', 'georges', 'c5c6c8e77d4534ba39f5afec86a3a23a', 'visiteur'),
(7, 'Liogier', 'Pascal', '5 rue des roulettes', '7200', 'Saint-etienne', '0475985632', 'pascal.liogier@orange.fr', 'pascal', '57c2877c1d84c4b49f3289657deca65c', 'visiteur'),
(8, 'Thierry', 'Romain', '3 rue des arts', '21000', 'Dijon', '0356989898', 'romain@aol.com', 'romain', '5026bc63b5418ffdb54f238db245ec01', 'visiteur');

-- --------------------------------------------------------

-- 
-- Structure de la table `commande`
-- 

CREATE TABLE `COMMANDE` (
  `ID_COMMANDE` int(11) NOT NULL,
  `MODE_PAIEMENT` varchar(9) NOT NULL,
  `NUM_CARTE_BANCAIRE` varchar(16) default NULL,
  `DATE_COMMANDE` date NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  PRIMARY KEY  (`ID_COMMANDE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `commande`
-- 

INSERT INTO `COMMANDE` (`ID_COMMANDE`, `MODE_PAIEMENT`, `NUM_CARTE_BANCAIRE`, `DATE_COMMANDE`, `ID_CLIENT`) VALUES 
(1, 'cb', '1234567891011121', '2009-02-19', 4),
(2, 'cheque', NULL, '2009-02-19', 4),
(3, 'cheque', NULL, '2009-02-19', 4),
(4, 'cheque', NULL, '2009-02-21', 4),
(5, 'cheque', NULL, '2009-02-23', 4),
(6, 'cheque', NULL, '2009-03-12', 4),
(7, 'cb', '5646556456465465', '2009-03-22', 4);

-- --------------------------------------------------------

-- 
-- Structure de la table `commander`
-- 

CREATE TABLE `COMMANDER` (
  `ID_COMMANDE` int(11) NOT NULL,
  `ID_ARTICLE` int(11) NOT NULL,
  `QUANTITE_COMMANDER` int(11) NOT NULL,
  PRIMARY KEY  (`ID_COMMANDE`,`ID_ARTICLE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `commander`
-- 

INSERT INTO `COMMANDER` (`ID_COMMANDE`, `ID_ARTICLE`, `QUANTITE_COMMANDER`) VALUES 
(2, 3, 1),
(1, 3, 1),
(1, 1, 1),
(3, 3, 20),
(4, 1, 1),
(5, 3, 5),
(6, 2, 6),
(6, 7, 1),
(6, 1, 1),
(6, 4, 1),
(6, 3, 1),
(6, 6, 3),
(7, 2, 3);

-- --------------------------------------------------------

-- 
-- Structure de la table `est_associe`
-- 

CREATE TABLE `EST_ASSOCIE` (
  `ID_ARTICLE1` int(11) NOT NULL,
  `ID_ARTICLE2` int(11) NOT NULL,
  PRIMARY KEY  (`ID_ARTICLE1`,`ID_ARTICLE2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `est_associe`
-- 

INSERT INTO `EST_ASSOCIE` (`ID_ARTICLE1`, `ID_ARTICLE2`) VALUES 
(1, 10),
(1, 74),
(1, 80),
(1, 86),
(1, 87),
(1, 91),
(2, 8),
(2, 9),
(2, 75),
(2, 82),
(2, 85),
(2, 90),
(3, 5),
(3, 11),
(3, 12),
(3, 21),
(3, 24),
(3, 76),
(3, 77),
(4, 7),
(4, 25),
(4, 78),
(4, 81),
(4, 85),
(4, 90),
(5, 3),
(5, 11),
(5, 12),
(5, 21),
(5, 24),
(5, 76),
(5, 78),
(5, 85),
(5, 90),
(6, 13),
(6, 16),
(6, 19),
(6, 22),
(6, 75),
(6, 80),
(6, 85),
(6, 90),
(7, 4),
(7, 18),
(7, 25),
(7, 75),
(7, 85),
(7, 90),
(7, 91),
(8, 2),
(8, 9),
(8, 75),
(8, 77),
(8, 85),
(8, 90),
(9, 28),
(9, 75),
(9, 77),
(9, 85),
(9, 90),
(10, 1),
(10, 75),
(10, 76),
(10, 90),
(10, 91),
(11, 3),
(11, 5),
(11, 12),
(11, 21),
(11, 24),
(11, 77),
(11, 78),
(11, 85),
(11, 90),
(12, 3),
(12, 5),
(12, 11),
(12, 21),
(12, 24),
(12, 77),
(12, 78),
(12, 85),
(12, 90),
(13, 6),
(13, 19),
(13, 22),
(13, 75),
(13, 79),
(13, 87),
(13, 91),
(14, 17),
(14, 18),
(14, 75),
(14, 82),
(14, 85),
(14, 90),
(15, 20),
(15, 75),
(15, 80),
(15, 85),
(15, 87),
(16, 6),
(16, 13),
(16, 19),
(16, 22),
(16, 75),
(16, 76),
(16, 85),
(16, 86),
(17, 14),
(17, 18),
(17, 75),
(17, 77),
(17, 87),
(17, 91),
(18, 14),
(18, 17),
(18, 75),
(18, 77),
(18, 87),
(18, 91),
(19, 6),
(19, 13),
(19, 16),
(19, 22),
(19, 74),
(19, 83),
(19, 84),
(19, 93),
(20, 14),
(20, 17),
(20, 75),
(20, 76),
(20, 85),
(20, 87),
(21, 3),
(21, 5),
(21, 11),
(21, 12),
(21, 24),
(21, 74),
(21, 80),
(21, 87),
(21, 88),
(22, 6),
(22, 13),
(22, 16),
(22, 19),
(22, 75),
(22, 81),
(22, 86),
(22, 90),
(23, 6),
(23, 10),
(23, 13),
(23, 16),
(23, 22),
(23, 75),
(23, 76),
(23, 85),
(23, 86),
(24, 3),
(24, 5),
(24, 11),
(24, 12),
(24, 21),
(24, 75),
(24, 83),
(24, 85),
(24, 92),
(25, 4),
(25, 7),
(25, 74),
(25, 75),
(25, 84),
(25, 85),
(27, 28),
(27, 29),
(27, 36),
(27, 52),
(27, 61),
(28, 27),
(28, 29),
(28, 36),
(28, 55),
(28, 60),
(29, 27),
(29, 28),
(29, 36),
(29, 53),
(29, 59),
(30, 31),
(30, 32),
(30, 55),
(30, 56),
(31, 30),
(31, 32),
(31, 52),
(31, 53),
(32, 30),
(32, 31),
(32, 58),
(32, 59),
(33, 34),
(33, 35),
(33, 55),
(33, 57),
(34, 33),
(34, 35),
(34, 53),
(34, 58),
(35, 33),
(35, 34),
(35, 53),
(35, 56),
(36, 27),
(36, 28),
(36, 29),
(36, 56),
(36, 57),
(37, 38),
(37, 39),
(37, 40),
(37, 41),
(37, 52),
(37, 59),
(38, 37),
(38, 39),
(38, 40),
(38, 41),
(38, 52),
(38, 54),
(39, 37),
(39, 38),
(39, 40),
(39, 41),
(39, 55),
(39, 59),
(40, 37),
(40, 38),
(40, 39),
(40, 41),
(40, 52),
(40, 57),
(41, 37),
(41, 38),
(41, 39),
(41, 40),
(41, 55),
(41, 56),
(42, 62),
(42, 70),
(43, 63),
(43, 65),
(44, 63),
(44, 73),
(45, 63),
(45, 70),
(46, 62),
(46, 70),
(47, 63),
(47, 70),
(48, 62),
(48, 70),
(49, 62),
(49, 72),
(50, 62),
(50, 73),
(51, 63),
(51, 65),
(52, 27),
(52, 41),
(52, 62),
(52, 70),
(53, 28),
(53, 40),
(53, 62),
(53, 70),
(54, 28),
(54, 29),
(54, 62),
(54, 64),
(55, 27),
(55, 40),
(55, 62),
(55, 65),
(56, 28),
(56, 31),
(56, 63),
(56, 70),
(57, 28),
(57, 30),
(57, 62),
(57, 69),
(58, 35),
(58, 39),
(58, 63),
(58, 70),
(59, 28),
(59, 32),
(59, 62),
(59, 71),
(60, 28),
(60, 35),
(60, 63),
(60, 71),
(61, 28),
(61, 40),
(61, 63),
(61, 73),
(62, 52),
(62, 60),
(63, 53),
(63, 58),
(64, 44),
(64, 54),
(65, 46),
(65, 61),
(66, 47),
(66, 56),
(67, 50),
(67, 61),
(68, 41),
(68, 57),
(69, 48),
(69, 52),
(70, 48),
(70, 53),
(71, 47),
(71, 56),
(72, 47),
(72, 59),
(73, 48),
(73, 61),
(74, 84),
(74, 90),
(75, 86),
(75, 90),
(76, 85),
(76, 93),
(77, 85),
(77, 90),
(78, 84),
(78, 89),
(79, 84),
(79, 86),
(80, 88),
(80, 92),
(81, 85),
(81, 87),
(82, 84),
(82, 90),
(83, 85),
(83, 93),
(84, 74),
(84, 75),
(85, 75),
(85, 83),
(86, 75),
(86, 78),
(87, 78),
(87, 79),
(88, 74),
(88, 83),
(89, 78),
(89, 79),
(90, 78),
(90, 83),
(91, 74),
(91, 76),
(92, 74),
(92, 78),
(93, 74),
(93, 79),
(94, 96),
(95, 97),
(95, 98),
(96, 94),
(97, 95),
(97, 98),
(98, 95),
(98, 97),
(99, 100),
(100, 99),
(101, 100),
(102, 103),
(102, 105),
(103, 102),
(103, 105),
(104, 96),
(105, 102),
(105, 103);

-- --------------------------------------------------------

-- 
-- Structure de la table `identifier`
-- 

CREATE TABLE `IDENTIFIER` (
  `ID_MOT_CLE_I` int(11) NOT NULL,
  `ID_ARTICLE_I` int(11) NOT NULL,
  PRIMARY KEY  (`ID_MOT_CLE_I`,`ID_ARTICLE_I`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `identifier`
-- 

INSERT INTO `IDENTIFIER` (`ID_MOT_CLE_I`, `ID_ARTICLE_I`) VALUES 
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(6, 1),
(6, 15),
(6, 17),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(7, 10),
(7, 11),
(7, 12),
(7, 13),
(7, 14),
(7, 15),
(7, 16),
(7, 17),
(7, 18),
(7, 19),
(7, 20),
(7, 21),
(7, 22),
(7, 23),
(7, 24),
(7, 25),
(8, 1),
(8, 2),
(8, 4),
(8, 5),
(8, 6),
(8, 11),
(8, 12),
(8, 13),
(8, 15),
(8, 16),
(8, 19),
(8, 20),
(8, 22),
(8, 24),
(9, 3),
(10, 6),
(10, 16),
(10, 23),
(11, 7),
(11, 8),
(11, 9),
(11, 10),
(11, 17),
(11, 18),
(11, 23),
(11, 25),
(12, 14),
(12, 21),
(13, 26),
(14, 27),
(14, 28),
(14, 29),
(14, 30),
(14, 31),
(14, 32),
(14, 33),
(14, 34),
(14, 35),
(14, 36),
(14, 37),
(14, 38),
(14, 39),
(14, 40),
(14, 41),
(14, 42),
(14, 43),
(14, 44),
(14, 45),
(14, 46),
(14, 47),
(14, 48),
(14, 49),
(14, 50),
(14, 51),
(15, 27),
(15, 28),
(15, 29),
(15, 30),
(15, 31),
(15, 32),
(15, 33),
(15, 34),
(15, 35),
(15, 36),
(15, 37),
(15, 38),
(15, 39),
(15, 40),
(15, 41),
(15, 42),
(15, 43),
(15, 44),
(15, 45),
(15, 46),
(15, 47),
(15, 48),
(15, 49),
(15, 50),
(15, 51),
(16, 27),
(16, 28),
(16, 29),
(16, 30),
(16, 31),
(16, 32),
(16, 33),
(16, 34),
(16, 35),
(16, 36),
(16, 37),
(16, 38),
(16, 39),
(16, 40),
(16, 41),
(16, 42),
(16, 43),
(16, 44),
(16, 45),
(16, 46),
(16, 47),
(16, 48),
(16, 49),
(16, 50),
(16, 51),
(17, 42),
(17, 43),
(17, 44),
(17, 45),
(17, 46),
(17, 47),
(17, 48),
(17, 49),
(17, 50),
(17, 51),
(17, 52),
(17, 53),
(17, 54),
(17, 55),
(17, 56),
(17, 57),
(17, 58),
(17, 59),
(17, 60),
(17, 61),
(17, 74),
(17, 75),
(17, 76),
(17, 77),
(17, 78),
(17, 79),
(17, 80),
(17, 81),
(17, 82),
(17, 83),
(17, 84),
(17, 85),
(17, 86),
(17, 87),
(17, 88),
(17, 89),
(17, 90),
(17, 91),
(17, 92),
(17, 93),
(18, 42),
(18, 43),
(18, 44),
(18, 45),
(18, 46),
(18, 47),
(18, 48),
(18, 49),
(18, 50),
(18, 51),
(18, 52),
(18, 53),
(18, 54),
(18, 55),
(18, 56),
(18, 57),
(18, 58),
(18, 59),
(18, 60),
(18, 61),
(19, 62),
(19, 63),
(19, 64),
(19, 65),
(19, 66),
(19, 67),
(19, 68),
(19, 69),
(19, 70),
(19, 71),
(19, 72),
(19, 73),
(19, 84),
(19, 85),
(19, 86),
(19, 87),
(19, 88),
(19, 89),
(19, 90),
(19, 91),
(19, 92),
(19, 93),
(20, 62),
(20, 63),
(20, 64),
(20, 65),
(20, 66),
(20, 67),
(20, 68),
(20, 69),
(20, 70),
(20, 71),
(20, 72),
(20, 73),
(21, 62),
(21, 63),
(22, 64),
(22, 65),
(22, 66),
(22, 67),
(22, 68),
(22, 69),
(22, 70),
(22, 71),
(22, 72),
(22, 73),
(23, 74),
(23, 75),
(23, 76),
(23, 77),
(23, 78),
(23, 79),
(23, 80),
(23, 81),
(23, 82),
(23, 83),
(24, 84),
(24, 85),
(24, 86),
(24, 87),
(24, 88),
(24, 89),
(24, 90),
(24, 91),
(24, 92),
(24, 93),
(25, 84),
(25, 85),
(25, 86),
(25, 87),
(25, 88),
(25, 89),
(25, 90),
(25, 91),
(25, 92),
(25, 93),
(26, 94),
(26, 95),
(26, 96),
(26, 97),
(26, 98),
(26, 99),
(26, 100),
(26, 101),
(26, 102),
(26, 103),
(26, 104),
(26, 105),
(27, 94),
(27, 95),
(27, 96),
(27, 97),
(27, 98),
(27, 99),
(27, 100),
(27, 101),
(27, 102),
(27, 103),
(27, 104),
(27, 105),
(28, 94),
(28, 95),
(28, 96),
(28, 97),
(28, 98),
(28, 99),
(28, 100),
(28, 101),
(28, 102),
(28, 103),
(28, 104),
(28, 105),
(29, 94),
(29, 95),
(29, 96),
(29, 97),
(29, 98),
(29, 99),
(29, 101),
(29, 102),
(29, 103),
(29, 104),
(29, 105);

-- --------------------------------------------------------

-- 
-- Structure de la table `meta_art_cat_car`
-- 

CREATE TABLE `META_ART_CAT_CAR` (
  `NOM_CHAMP` varchar(50) NOT NULL,
  `TYPE_CHAMP` varchar(35) NOT NULL,
  `VALEUR_CHAMP` varchar(150) default NULL,
  `ORDRE_CHAMP` int(11) NOT NULL,
  `TABLE_CHAMP` varchar(50) NOT NULL,
  `AFFICHAGE_CHAMP` tinyint(1) NOT NULL,
  `RECHERCHE_CHAMP` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `meta_art_cat_car`
-- 

INSERT INTO `META_ART_CAT_CAR` (`NOM_CHAMP`, `TYPE_CHAMP`, `VALEUR_CHAMP`, `ORDRE_CHAMP`, `TABLE_CHAMP`, `AFFICHAGE_CHAMP`, `RECHERCHE_CHAMP`) VALUES 
('ID_ARTICLE_A', 'int(11)', NULL, 1, 'ART_CAT_CAR', 0, 0),
('CODE_CATEGORIE_A', 'int(11)', NULL, 2, 'ART_CAT_CAR', 0, 0),
('CODE_CARACTERISTIQUE_A', 'int(11)', NULL, 3, 'ART_CAT_CAR', 0, 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `meta_article`
-- 

CREATE TABLE `META_ARTICLE` (
  `NOM_CHAMP` varchar(50) NOT NULL,
  `TYPE_CHAMP` varchar(35) NOT NULL,
  `VALEUR_CHAMP` varchar(150) default NULL,
  `ORDRE_CHAMP` int(11) NOT NULL,
  `TABLE_CHAMP` varchar(50) NOT NULL,
  `AFFICHAGE_CHAMP` tinyint(1) NOT NULL,
  `RECHERCHE_CHAMP` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `meta_article`
-- 

INSERT INTO `META_ARTICLE` (`NOM_CHAMP`, `TYPE_CHAMP`, `VALEUR_CHAMP`, `ORDRE_CHAMP`, `TABLE_CHAMP`, `AFFICHAGE_CHAMP`, `RECHERCHE_CHAMP`) VALUES 
('ID_ARTICLE', 'int(11)', NULL, 1, 'ARTICLE', 1, 1),
('NOM_ARTICLE', 'varchar(500)', NULL, 2, 'ARTICLE', 1, 1),
('PRIX_ARTICLE', 'double', NULL, 3, 'ARTICLE', 1, 1),
('LIBELLE_ARTICLE', 'text', NULL, 4, 'ARTICLE', 1, 1),
('CODE_OFFRE', 'int(11)', NULL, 5, 'ARTICLE', 1, 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `meta_caracteristique`
-- 

CREATE TABLE `META_CARACTERISTIQUE` (
  `NOM_CHAMP` varchar(50) NOT NULL,
  `TYPE_CHAMP` varchar(35) NOT NULL,
  `VALEUR_CHAMP` varchar(150) default NULL,
  `ORDRE_CHAMP` int(11) NOT NULL,
  `TABLE_CHAMP` varchar(50) NOT NULL,
  `AFFICHAGE_CHAMP` tinyint(1) NOT NULL,
  `RECHERCHE_CHAMP` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `meta_caracteristique`
-- 

INSERT INTO `META_CARACTERISTIQUE` (`NOM_CHAMP`, `TYPE_CHAMP`, `VALEUR_CHAMP`, `ORDRE_CHAMP`, `TABLE_CHAMP`, `AFFICHAGE_CHAMP`, `RECHERCHE_CHAMP`) VALUES 
('CODE_CARACTERISTIQUE', 'int(11)', NULL, 1, 'CARACTERISTIQUE', 0, 0),
('LIBELLE_CARACTERISTIQUE', 'varchar(255)', NULL, 2, 'CARACTERISTIQUE', 1, 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `meta_categorie`
-- 

CREATE TABLE `META_CATEGORIE` (
  `NOM_CHAMP` varchar(50) NOT NULL,
  `TYPE_CHAMP` varchar(35) NOT NULL,
  `VALEUR_CHAMP` varchar(150) default NULL,
  `ORDRE_CHAMP` int(11) NOT NULL,
  `TABLE_CHAMP` varchar(50) NOT NULL,
  `AFFICHAGE_CHAMP` tinyint(1) NOT NULL,
  `RECHERCHE_CHAMP` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `meta_categorie`
-- 

INSERT INTO `META_CATEGORIE` (`NOM_CHAMP`, `TYPE_CHAMP`, `VALEUR_CHAMP`, `ORDRE_CHAMP`, `TABLE_CHAMP`, `AFFICHAGE_CHAMP`, `RECHERCHE_CHAMP`) VALUES 
('CODE_CATEGORIE', 'int(11)', NULL, 1, 'CATEGORIE', 0, 0),
('LIBELLE_CATEGORIE', 'varchar(250)', NULL, 2, 'CATEGORIE', 1, 1),
('CODE_CAT', 'int(11)', NULL, 3, 'CATEGORIE', 0, 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `meta_identifier`
-- 

CREATE TABLE `META_IDENTIFIER` (
  `NOM_CHAMP` varchar(50) NOT NULL,
  `TYPE_CHAMP` varchar(35) NOT NULL,
  `VALEUR_CHAMP` varchar(150) default NULL,
  `ORDRE_CHAMP` int(11) NOT NULL,
  `TABLE_CHAMP` varchar(50) NOT NULL,
  `AFFICHAGE_CHAMP` tinyint(1) NOT NULL,
  `RECHERCHE_CHAMP` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `meta_identifier`
-- 

INSERT INTO `META_IDENTIFIER` (`NOM_CHAMP`, `TYPE_CHAMP`, `VALEUR_CHAMP`, `ORDRE_CHAMP`, `TABLE_CHAMP`, `AFFICHAGE_CHAMP`, `RECHERCHE_CHAMP`) VALUES 
('ID_MOT_CLE_I', 'int(11)', NULL, 1, 'IDENTIFIER', 0, 0),
('ID_ARTICLE_I', 'int(11)', NULL, 2, 'IDENTIFIER', 0, 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `meta_mot_cle`
-- 

CREATE TABLE `META_MOT_CLE` (
  `NOM_CHAMP` varchar(50) NOT NULL,
  `TYPE_CHAMP` varchar(35) NOT NULL,
  `VALEUR_CHAMP` varchar(150) default NULL,
  `ORDRE_CHAMP` int(11) NOT NULL,
  `TABLE_CHAMP` varchar(50) NOT NULL,
  `AFFICHAGE_CHAMP` tinyint(1) NOT NULL,
  `RECHERCHE_CHAMP` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `meta_mot_cle`
-- 

INSERT INTO `META_MOT_CLE` (`NOM_CHAMP`, `TYPE_CHAMP`, `VALEUR_CHAMP`, `ORDRE_CHAMP`, `TABLE_CHAMP`, `AFFICHAGE_CHAMP`, `RECHERCHE_CHAMP`) VALUES 
('ID_MOT_CLE', 'int(11)', NULL, 1, 'MOT_CLE', 0, 0),
('MOT_CLE', 'varchar(200)', NULL, 2, 'MOT_CLE', 1, 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `meta_offre`
-- 

CREATE TABLE `META_OFFRE` (
  `NOM_CHAMP` varchar(50) NOT NULL,
  `TYPE_CHAMP` varchar(35) NOT NULL,
  `VALEUR_CHAMP` varchar(150) default NULL,
  `ORDRE_CHAMP` int(11) NOT NULL,
  `TABLE_CHAMP` varchar(50) NOT NULL,
  `AFFICHAGE_CHAMP` tinyint(1) NOT NULL,
  `RECHERCHE_CHAMP` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `meta_offre`
-- 

INSERT INTO `META_OFFRE` (`NOM_CHAMP`, `TYPE_CHAMP`, `VALEUR_CHAMP`, `ORDRE_CHAMP`, `TABLE_CHAMP`, `AFFICHAGE_CHAMP`, `RECHERCHE_CHAMP`) VALUES 
('CODE_OFFRE', 'int(11)', NULL, 1, 'OFFRE', 0, 0),
('LIBELLE_OFFRE', 'text', NULL, 2, 'OFFRE', 1, 1),
('REDUCTION_OFFRE', 'double', NULL, 3, 'OFFRE', 1, 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `mot_cle`
-- 

CREATE TABLE `MOT_CLE` (
  `ID_MOT_CLE` int(11) NOT NULL auto_increment,
  `MOT_CLE` varchar(200) NOT NULL,
  PRIMARY KEY  (`ID_MOT_CLE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- 
-- Contenu de la table `mot_cle`
-- 

INSERT INTO `MOT_CLE` (`ID_MOT_CLE`, `MOT_CLE`) VALUES 
(8, 'noir'),
(7, 'ordinateur'),
(6, 'bas prix'),
(5, 'portable'),
(9, 'bleu'),
(10, 'luxe'),
(11, 'gris'),
(12, 'blanc'),
(13, 'kit'),
(14, 'connecteur'),
(15, 'watt'),
(16, 'alimentation'),
(17, 'usb'),
(18, 'boitier'),
(19, 'vitesse'),
(20, 'graveur'),
(21, 'blu ray'),
(22, 'dvd'),
(23, 'cle'),
(24, 'disque dur'),
(25, 'externe'),
(26, 'moniteur'),
(27, 'pouce'),
(28, 'format'),
(29, 'résolution');

-- --------------------------------------------------------

-- 
-- Structure de la table `offre`
-- 

CREATE TABLE `OFFRE` (
  `CODE_OFFRE` int(11) NOT NULL auto_increment,
  `LIBELLE_OFFRE` text NOT NULL,
  `REDUCTION_OFFRE` double NOT NULL,
  PRIMARY KEY  (`CODE_OFFRE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Contenu de la table `OFFRE`
-- 

INSERT INTO `OFFRE` (`CODE_OFFRE`, `LIBELLE_OFFRE`, `REDUCTION_OFFRE`) VALUES 
(1, 'Super promo d''hiver', 25),
(2, 'Super promo d''hiver', 15),
(3, 'Super promo d''hiver', 10),
(4, 'Super promo d''hiver', 5);
