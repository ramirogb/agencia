-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-01-2010 a las 07:36:25
-- Versión del servidor: 5.0.45
-- Versión de PHP: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `agencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencias`
--

CREATE TABLE `agencias` (
  `EmpCdg` char(2) NOT NULL,
  `AgeCdg` char(3) NOT NULL,
  `AgeDsc` varchar(50) NOT NULL,
  `AgeDscAbr` varchar(20) NOT NULL,
  `AgeDir` varchar(50) default NULL,
  `AgeFon` varchar(20) default NULL,
  `AgeFax` varchar(20) default NULL,
  `AgeCto` varchar(50) default NULL,
  `AgeUsuAdd` char(4) default NULL,
  `AgeFecAdd` bigint(10) default NULL,
  `AgeTimAdd` char(14) default NULL,
  `AgeUsuChg` char(4) default NULL,
  `AgeFecChg` date default NULL,
  `AgeTimChg` char(14) default NULL,
  `AgeRuc` varchar(12) default NULL,
  `Color1` int(11) default NULL,
  `Color2` int(11) default NULL,
  `AgeFon2` varchar(20) default NULL,
  `AgeNex` varchar(20) default NULL,
  `AgeCelMov` varchar(20) default NULL,
  `AgeCelCla` varchar(20) default NULL,
  `Rng` varchar(21) default NULL,
  PRIMARY KEY  (`EmpCdg`,`AgeCdg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `agencias`
--

INSERT INTO `agencias` (`EmpCdg`, `AgeCdg`, `AgeDsc`, `AgeDscAbr`, `AgeDir`, `AgeFon`, `AgeFax`, `AgeCto`, `AgeUsuAdd`, `AgeFecAdd`, `AgeTimAdd`, `AgeUsuChg`, `AgeFecChg`, `AgeTimChg`, `AgeRuc`, `Color1`, `Color2`, `AgeFon2`, `AgeNex`, `AgeCelMov`, `AgeCelCla`, `Rng`) VALUES
('01', 'COT', 'CONRESA TOUR ', 'COT', 'Poner Direccion real', '285420', NULL, 'XYZ', 'ADMN', 2008, '09:55:26 a.m.', 'A001', '2009-04-15', '16:41:18', NULL, 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'CON', 'CONTACTUS', 'CON', 'Poner Direccion real', '01271-7552', '', 'XYZ', 'ADMN', 2008, '09:55:42 a.m.', 'A001', '2009-04-15', '16:40:14', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'IKL', 'INKALAND TOURS', 'INKALAND TOURS', 'Poner Direccion real', '012222291', '014228540', 'XYZ', 'ADMN', 2008, '09:54:57 a.m.', 'A001', '2009-04-15', '16:46:22', NULL, 16711680, 65280, '123', '123', '123456', '123456', NULL),
('01', 'ANT', 'ANDEAN TOUR', 'ANT', 'Poner Direccion real', '014467992', '', 'XYZ', 'ADMN', 2008, '09:55:11 a.m.', 'ADMN', '2009-11-23', '01:19:40', '20111490571', 16711680, 15780518, '123', '123', '123456', '123456', '2009-01-01 2009-12-31'),
('01', 'CAT', 'CLASS ADVENTURE TRAVEL', 'CLASS ADVENTURE TRAV', 'Poner Direccion real', '01444 2220', '', 'XYZ', 'ADMN', 2008, '05:07:33 p.m.', 'ADMN', '2009-11-23', '10:33:57', '20806580989', 16711680, 15780518, '123', '123', '123456', '123456', '2009-01-01 2009-12-31'),
('01', 'ATA', 'ACUARIOS TRAVEL', 'ACUARIOS', 'Poner Direccion real', '247393', '247393', 'XYZ', 'ADMN', 2008, '09:53:18 a.m.', 'A001', '2009-04-15', '16:21:48', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'INR', 'INCA ROUTE', 'INR', 'Poner Direccion real', '200920', '226053', 'XYZ', 'ADMN', 2008, '09:56:15 a.m.', 'A001', '2009-04-15', '16:50:32', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'INT', 'INKARI TOURS', 'INT', 'Poner Direccion real', '01- 421 87 05', '01 - 442 15 59', 'XYZ', 'ADMN', 2008, '09:56:36 a.m.', 'A001', '2009-04-15', '16:53:05', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'LAT', 'LATIN TOURS', '', 'Poner Direccion real', '014264287 ', '', 'XYZ', 'ADMN', 2008, '09:56:47 a.m.', 'A001', '2009-04-15', '16:58:44', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'PEC', 'PERUVIAN CONFORT', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '09:57:00 a.m.', NULL, NULL, NULL, '', NULL, NULL, '123', '123', '123456', '123456', NULL),
('01', 'PTA', 'PLANET TRAVEL AREQUIPA', '', 'Poner Direccion real', '200009', '', 'XYZ', 'ADMN', 2008, '09:57:22 a.m.', 'A001', '2009-04-15', '17:12:30', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'PTP', 'PLANET TRAVEL PUNO', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '09:57:34 a.m.', NULL, NULL, NULL, '', NULL, NULL, '123', '123', '123456', '123456', NULL),
('01', 'SIT', 'SIHAI TIANMA', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '09:57:47 a.m.', 'A001', '2009-01-05', '12:21:12', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'ANE', 'ANDES EXPLORER', 'ANE', 'Poner Direccion real', '223747', '', 'XYZ', 'ADMN', 2008, '09:58:00 a.m.', 'A001', '2009-04-15', '16:18:43', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'MAP', 'MARAVILLAS PERUANAS', '', 'Poner Direccion real', '200970', '', 'XYZ', 'ADMN', 2008, '09:58:14 a.m.', 'A001', '2009-04-15', '17:01:17', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'CTK', 'COLCA TREKK', 'CTK', 'Poner Direccion real', '206217 ', '', 'XYZ', 'ADMN', 2008, '09:59:23 a.m.', 'A001', '2009-04-15', '16:42:25', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'PEL', 'PERU LINE', '', 'Poner Direccion real', '01242 3642', '01242 3642', 'XYZ', 'ADMN', 2008, '09:59:38 a.m.', 'A001', '2009-04-15', '17:11:31', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'CAR', 'CALYPSO REPS', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '09:59:50 a.m.', 'A001', '2009-01-05', '12:17:41', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'TPL', 'TRAVEL PERU ONLINE', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '10:00:02 a.m.', 'A001', '2009-01-05', '12:21:27', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'HOT', 'HOPE TRAVEL', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '10:00:13 a.m.', NULL, NULL, NULL, '', NULL, NULL, '123', '123', '123456', '123456', NULL),
('01', 'RAT', 'RAYMI TOUR', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '10:00:30 a.m.', 'A001', '2009-01-05', '12:21:06', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'MET', 'META TRAVEL', 'MET', 'Poner Direccion real', '01628 2186', '', 'XYZ', 'ADMN', 2008, '10:00:40 a.m.', 'A001', '2009-04-15', '17:08:42', '20518900944', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'AWT', 'ALL WAYS TRAVEL', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '10:00:56 a.m.', NULL, NULL, NULL, '', NULL, NULL, '123', '123', '123456', '123456', NULL),
('01', 'SVP', 'SIERRA VERDE PERU', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '10:02:23 a.m.', 'A001', '2009-01-05', '12:21:18', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'GSA', 'GSA AREQUIPA', 'GSA', 'Poner Direccion real', '202427', '', 'XYZ', 'ADMN', 2008, '08:18:23 p.m.', 'A001', '2009-04-15', '16:45:20', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'PAT', 'PERU AVENTURA TOURS', 'PERU AVENTURA', 'Poner Direccion real', '01445-3315', '', 'XYZ', 'ADMN', 2008, '11:01:08 a.m.', 'A001', '2009-04-15', '17:10:27', '21323334', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'IKP', 'INKAS PARADISE', 'IKP', 'Poner Direccion real', '84-229311', '', 'XYZ', 'ADMN', 2008, '12:41:00 p.m.', 'A001', '2009-04-15', '16:48:21', '', 0, 0, '123', '123', '123456', '123456', NULL),
('01', 'MTA', 'MIRS TRAVEL', 'MIT', 'Poner Direccion real', '54 3455 423790', '', 'XYZ', 'A001', 2009, '11:48:43', 'A001', '2009-01-23', '11:53:43', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'MEP', 'MUNDO ESCONDIDO PERU', 'MEP', 'Poner Direccion real', '', '', 'XYZ', 'A001', 2009, '07:53:47', NULL, NULL, NULL, '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'TIN', 'TIERRA INCA', 'TIN', 'Poner Direccion real', '084-260160', '', 'XYZ', 'A001', 2009, '05:17:06', 'A001', '2009-06-16', '05:24:37', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'NEP', 'NIKOL EXPEDITIONS PERU', 'NEP', 'Poner Direccion real', '', '', 'XYZ', 'A001', 2009, '06:43:17', NULL, NULL, NULL, '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'ZZZ', 'AGENCIA ZZZ PRUEBA', 'PRUEBA', 'Poner Direccion real', '', '', 'XYZ', 'A002', 2009, '04:25:01 p.m.', NULL, NULL, NULL, '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'VRT', 'VIRREYNAL TOURS', 'VIRREYNAL TOURS', 'Poner Direccion real', '01445-8844', '', 'XYZ', 'A001', 2009, '17:18:39', NULL, NULL, NULL, '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'CLT', 'CLARISA TOURS', 'CLT', 'Poner Direccion real', '', '', 'XYZ', 'A001', 2009, '13:25:48', NULL, NULL, NULL, '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'ESA', 'EXPLORING SUDAMERICA', 'ESA', 'Poner Direccion real', '', '', 'XYZ', 'A001', 2009, '11:40:07', NULL, NULL, NULL, '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'PTG', 'PILGRIM TRAVEL', 'PTG', 'Poner Direccion real', '', '', 'XYZ', 'A001', 2009, '11:20:01', NULL, NULL, NULL, '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'KTK', 'KONTIKI', 'AgeDscAbrAgeDscAbr', 'Poner Direccion real', 'AgeFonAgeFon', 'AgeFaxAgeFax', 'XYZ', 'A001', 2009, '11:49:46', 'A001', '2009-10-24', '11:51:16', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('1', 'mmx', 'Agencia Ramiro SAC', 'Agencia dedicada a l', 'Poner Direccion real', '444444', '222222', 'XYZ', '1', NULL, NULL, '1', '0000-00-00', '1', '2147483647', 1, 1, '123', '123', '123456', '123456', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(4) default NULL,
  `Name` varchar(20) default NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `Name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Ashmore and Cartier '),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas, The'),
(18, 'Bahrain'),
(19, 'Baker Island'),
(20, 'Bangladesh'),
(21, 'Barbados'),
(22, 'Bassas da India'),
(23, 'Belarus'),
(24, 'Belgium'),
(25, 'Belize'),
(26, 'Benin'),
(27, 'Bermuda'),
(28, 'Bhutan'),
(29, 'Bolivia'),
(30, 'Bosnia and Herzegovi'),
(31, 'Botswana'),
(32, 'Bouvet Island'),
(33, 'Brazil'),
(34, 'British Indian Ocean'),
(35, 'British Virgin Islan'),
(36, 'Brunei'),
(37, 'Bulgaria'),
(38, 'Burkina Faso'),
(39, 'Burma'),
(40, 'Burundi'),
(41, 'Cambodia'),
(42, 'Cameroon'),
(43, 'Canada'),
(44, 'Cape Verde'),
(45, 'Cayman Islands'),
(46, 'Central African Repu'),
(47, 'Chad'),
(48, 'Chile'),
(49, 'China'),
(50, 'Christmas Island'),
(51, 'Clipperton Island'),
(52, 'Cocos (Keeling) Isla'),
(53, 'Colombia'),
(54, 'Comoros'),
(55, 'Congo, Demo. Rep. of'),
(56, 'Congo, Republic of t'),
(57, 'Cook Islands'),
(58, 'Coral Sea Islands'),
(59, 'Costa Rica'),
(60, 'Cote d''Ivoire'),
(61, 'Croatia'),
(62, 'Cuba'),
(63, 'Cyprus'),
(64, 'Czech Republic'),
(65, 'Denmark'),
(66, 'Djibouti'),
(67, 'Dominica'),
(68, 'Dominican Republic'),
(69, 'East Timor'),
(70, 'Ecuador'),
(71, 'Egypt'),
(72, 'El Salvador'),
(73, 'Equatorial Guinea'),
(74, 'Eritrea'),
(75, 'Estonia'),
(76, 'Ethiopia'),
(77, 'Europa Island'),
(78, 'Falkland Isls (Islas'),
(79, 'Faroe Islands'),
(80, 'Fiji'),
(81, 'Finland'),
(82, 'France'),
(83, 'France, Metropolitan'),
(84, 'French Guiana'),
(85, 'French Polynesia'),
(86, 'French S. & Antarcti'),
(87, 'Gabon'),
(88, 'Gambia, The'),
(89, 'Gaza Strip'),
(90, 'Georgia'),
(91, 'Germany'),
(92, 'Ghana'),
(93, 'Gibraltar'),
(94, 'Glorioso Islands'),
(95, 'Greece'),
(96, 'Greenland'),
(97, 'Grenada'),
(98, 'Guadeloupe'),
(99, 'Guam'),
(100, 'Guatemala'),
(101, 'Guernsey'),
(102, 'Guinea'),
(103, 'Guinea-Bissau'),
(104, 'Guyana'),
(105, 'Haiti'),
(106, 'Heard Isl & McDonald'),
(107, 'Holy See (Vatican Ci'),
(108, 'Honduras'),
(109, 'Hong Kong'),
(110, 'Howland Island'),
(111, 'Hungary'),
(112, 'Iceland'),
(113, 'India'),
(114, 'Indonesia'),
(115, 'Iran'),
(116, 'Iraq'),
(117, 'Ireland'),
(118, 'Israel'),
(119, 'Italy'),
(120, 'Jamaica'),
(121, 'Jan Mayen'),
(122, 'Japan'),
(123, 'Jarvis Island'),
(124, 'Jersey'),
(125, 'Johnston Atoll'),
(126, 'Jordan'),
(127, 'Juan de Nova Island'),
(128, 'Kazakhstan'),
(129, 'Kenya'),
(130, 'Kingman Reef'),
(131, 'Kiribati'),
(132, 'Korea, North'),
(133, 'Korea, South'),
(134, 'Kuwait'),
(135, 'Kyrgyzstan'),
(136, 'Laos'),
(137, 'Latvia'),
(138, 'Lebanon'),
(139, 'Lesotho'),
(140, 'Liberia'),
(141, 'Libya'),
(142, 'Liechtenstein'),
(143, 'Lithuania'),
(144, 'Luxembourg'),
(145, 'Macau'),
(146, 'Macedonia, The Repub'),
(147, 'Madagascar'),
(148, 'Malawi'),
(149, 'Malaysia'),
(150, 'Maldives'),
(151, 'Mali'),
(152, 'Malta'),
(153, 'Man, Isle of'),
(154, 'Marshall Islands'),
(155, 'Martinique'),
(156, 'Mauritania'),
(157, 'Mauritius'),
(158, 'Mayotte'),
(159, 'Mexico'),
(160, 'Micronesia, Fed. Sta'),
(161, 'Midway Islands'),
(162, 'Misc. Indian Ocean I'),
(163, 'Moldova'),
(164, 'Monaco'),
(165, 'Mongolia'),
(166, 'Montserrat'),
(167, 'Morocco'),
(168, 'Mozambique'),
(169, 'Myanmar'),
(170, 'Namibia'),
(171, 'Nauru'),
(172, 'Navassa Island'),
(173, 'Nepal'),
(174, 'Netherlands'),
(175, 'Netherlands Antilles'),
(176, 'New Caledonia'),
(177, 'New Zealand'),
(178, 'Nicaragua'),
(179, 'Niger'),
(180, 'Nigeria'),
(181, 'Niue'),
(182, 'Norfolk Island'),
(183, 'Northern Mariana Isl'),
(184, 'Norway'),
(185, 'Oman'),
(186, 'Pakistan'),
(187, 'Palau'),
(188, 'Palmyra Atoll'),
(189, 'Panama'),
(190, 'Papua New Guinea'),
(191, 'Paracel Islands'),
(192, 'Paraguay'),
(193, 'Peru'),
(194, 'Philippines'),
(195, 'Pitcairn Islands'),
(196, 'Poland'),
(197, 'Portugal'),
(198, 'Puerto Rico'),
(199, 'Qatar'),
(200, 'Reunion'),
(201, 'Romania'),
(202, 'Russia'),
(203, 'Rwanda'),
(204, 'Saint Helena'),
(205, 'Saint Kitts and Nevi'),
(206, 'Saint Lucia'),
(207, 'Saint Pierre and Miq'),
(208, 'Samoa'),
(209, 'San Marino'),
(210, 'Sao Tome and Princip'),
(211, 'Saudi Arabia'),
(212, 'Senegal'),
(213, 'Serbia and Montenegr'),
(214, 'Seychelles'),
(215, 'Sierra Leone'),
(216, 'Singapore'),
(217, 'Slovakia'),
(218, 'Slovenia'),
(219, 'Solomon Islands'),
(220, 'Somalia'),
(221, 'South Africa'),
(222, 'South Georgia & the '),
(223, 'Spain'),
(224, 'Spratly Islands'),
(225, 'Sri Lanka'),
(226, 'St Vincent & the Gre'),
(227, 'Sudan'),
(228, 'Suriname'),
(229, 'Svalbard'),
(230, 'Swaziland'),
(231, 'Sweden'),
(232, 'Switzerland'),
(233, 'Syria'),
(234, 'Taiwan'),
(235, 'Tajikistan'),
(236, 'Tanzania'),
(237, 'Thailand'),
(238, 'Togo'),
(239, 'Tokelau'),
(240, 'Tonga'),
(241, 'Trinidad and Tobago'),
(242, 'Tromelin Island'),
(243, 'Tunisia'),
(244, 'Turkey'),
(245, 'Turkmenistan'),
(246, 'Turks and Caicos Isl'),
(247, 'Tuvalu'),
(248, 'US Minor Outlying Is'),
(249, 'Uganda'),
(250, 'Ukraine'),
(251, 'United Arab Emirates'),
(252, 'United Kingdom'),
(253, 'United States'),
(254, 'Uruguay'),
(255, 'Uzbekistan'),
(256, 'Vanuatu'),
(257, 'Venezuela'),
(258, 'Vietnam'),
(259, 'Virgin Islands'),
(260, 'Virgin Islands (UK)'),
(261, 'Virgin Islands (US)'),
(262, 'Wake Island'),
(263, 'Wallis and Futuna'),
(264, 'West Bank'),
(265, 'Western Sahara'),
(266, 'Western Samoa'),
(267, 'Yemen'),
(268, 'Zaire'),
(269, 'Zambia'),
(270, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languajes`
--

CREATE TABLE `languajes` (
  `id` tinyint(4) NOT NULL auto_increment,
  `lang` varchar(5) default NULL,
  `lang_descript` varchar(18) default NULL,
  `category` int(11) default NULL,
  `shared` char(1) default NULL,
  `priv` varchar(1) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `languajes`
--

INSERT INTO `languajes` (`id`, `lang`, `lang_descript`, `category`, `shared`, `priv`) VALUES
(1, 'es', 'Espa&ntilde;ol', 3, '1', '1'),
(2, 'fr', 'Franc&eacute;s', 1, '0', '1'),
(3, 'en', 'Ingl&eacute;s', 3, '1', '1'),
(4, 'gm', 'Alem&aacute;n', 1, '0', '1'),
(5, 'it', 'Italiano', 1, '0', '1'),
(6, 'br', 'Portugues', 1, '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `myreservas`
--

CREATE TABLE `myreservas` (
  `EmpCdg` char(2) NOT NULL,
  `DocNro` char(10) NOT NULL,
  `Paxs` int(11) default NULL,
  `Dsc` varchar(100) default NULL,
  `SerNum` int(11) default NULL,
  `NumSerDet` int(11) default NULL,
  `NumPaxDet` int(11) default NULL,
  `ImpValVta` float default NULL,
  `ImpIgv` float default NULL,
  `ImpTot` float default NULL,
  `ImpIgvNow` float default NULL,
  `MonTip` char(1) default NULL,
  `Sts` char(1) NOT NULL default '1',
  `ValPreFlg` char(1) default NULL,
  `FacNro` char(10) default NULL,
  `PndFlg` char(1) default NULL,
  `StsPnd` char(1) default NULL,
  `Ema` varchar(254) default NULL,
  `DocRes` varchar(20) default NULL,
  `PerRes` varchar(50) default NULL,
  `UsuAdd` char(4) default NULL,
  `FecAdd` bigint(10) default NULL,
  `UsuChg` char(4) default NULL,
  `FecChg` bigint(10) default NULL,
  `AfeIgvflg` char(1) default NULL,
  `Length` int(11) default NULL,
  `EmaFlg` char(1) default NULL,
  `Color1` int(11) default NULL,
  `Color2` int(11) default NULL,
  `tipe` varchar(1) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `catalog_prom` varchar(10) NOT NULL,
  `SerCdg` varchar(10) NOT NULL,
  `price1` float NOT NULL,
  `pricet` float NOT NULL,
  `promo_cat` varchar(10) NOT NULL,
  `attention` varchar(20) NOT NULL,
  KEY `DocNro` (`DocNro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `myreservas`
--

INSERT INTO `myreservas` (`EmpCdg`, `DocNro`, `Paxs`, `Dsc`, `SerNum`, `NumSerDet`, `NumPaxDet`, `ImpValVta`, `ImpIgv`, `ImpTot`, `ImpIgvNow`, `MonTip`, `Sts`, `ValPreFlg`, `FacNro`, `PndFlg`, `StsPnd`, `Ema`, `DocRes`, `PerRes`, `UsuAdd`, `FecAdd`, `UsuChg`, `FecChg`, `AfeIgvflg`, `Length`, `EmaFlg`, `Color1`, `Color2`, `tipe`, `lang`, `comment`, `catalog_prom`, `SerCdg`, `price1`, `pricet`, `promo_cat`, `attention`) VALUES
('01', 'KTK-1', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1264050000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T', 'gm', '', '', 'CHA', 10, 24, '', ''),
('01', 'KTK-1', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1264136400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'F', 'en', '', '', 'RDV', 20, 16, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passengers`
--

CREATE TABLE `passengers` (
  `Id` mediumint(8) unsigned NOT NULL auto_increment,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(70) NOT NULL,
  `BirthDate` date NOT NULL,
  `Gender` enum('m','f') default NULL,
  `Done` tinyint(4) NOT NULL default '0',
  `id_reserv` bigint(10) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `passengers`
--

INSERT INTO `passengers` (`Id`, `FirstName`, `LastName`, `BirthDate`, `Gender`, `Done`, `id_reserv`, `phone1`, `email`) VALUES
(1, 'Jill', 'Trust', '1980-12-12', 'f', 50, 0, '', ''),
(2, 'Trevor', 'Doug', '1980-06-21', 'm', 94, 0, '', ''),
(3, 'Stacy', 'Elis', '1980-01-24', 'm', 23, 0, '', ''),
(4, 'Phil', 'Tip', '1999-12-04', 'f', 63, 0, '', ''),
(5, 'Stark', 'Qwest', '1989-08-01', 'f', 70, 0, '', ''),
(6, 'Ian', 'Bob', '1989-08-01', 'f', 89, 0, '', ''),
(7, 'Tom', 'Steph', '1908-12-25', 'm', 1, 0, '', ''),
(8, 'Chris', 'Rich', '2003-09-03', 'f', 33, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotations`
--

CREATE TABLE `quotations` (
  `EmpCdg` char(2) NOT NULL,
  `DocNro` char(10) NOT NULL,
  `Paxs` int(11) default NULL,
  `Dsc` varchar(100) default NULL,
  `SerNum` int(11) default NULL,
  `NumSerDet` int(11) default NULL,
  `NumPaxDet` int(11) default NULL,
  `ImpValVta` float default NULL,
  `ImpIgv` float default NULL,
  `ImpTot` float default NULL,
  `ImpIgvNow` float default NULL,
  `MonTip` char(1) default NULL,
  `Sts` char(1) default NULL,
  `ValPreFlg` char(1) default NULL,
  `FacNro` char(10) default NULL,
  `PndFlg` char(1) default NULL,
  `StsPnd` char(1) default NULL,
  `FecLimPrePag` date default NULL,
  `Obs` mediumblob,
  `Ema` varchar(254) default NULL,
  `DocRes` varchar(20) default NULL,
  `PerRes` varchar(50) default NULL,
  `UsuAdd` char(4) default NULL,
  `FecAdd` date default NULL,
  `UsuChg` char(4) default NULL,
  `FecChg` date default NULL,
  `TimChg` char(14) default NULL,
  `fectrn` date default NULL,
  `ImpTipCam` float default NULL,
  `AfeIgvflg` char(1) default NULL,
  `FecPriSer` date default NULL,
  `EmailEnviado` mediumblob,
  `EmailRecibido` mediumblob,
  `FileHTML` varchar(254) default NULL,
  `Length` int(11) default NULL,
  `EmaFlg` char(1) default NULL,
  `Color1` int(11) default NULL,
  `Color2` int(11) default NULL,
  `tipe` varchar(1) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `catalog_prom` varchar(10) NOT NULL,
  `SerCdg` varchar(10) NOT NULL,
  `price1` float NOT NULL,
  `pricet` float NOT NULL,
  `promo_cat` varchar(10) NOT NULL,
  `cur_datime` bigint(10) NOT NULL,
  `attention` varchar(20) NOT NULL,
  KEY `DocNro` (`DocNro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `quotations`
--

INSERT INTO `quotations` (`EmpCdg`, `DocNro`, `Paxs`, `Dsc`, `SerNum`, `NumSerDet`, `NumPaxDet`, `ImpValVta`, `ImpIgv`, `ImpTot`, `ImpIgvNow`, `MonTip`, `Sts`, `ValPreFlg`, `FacNro`, `PndFlg`, `StsPnd`, `FecLimPrePag`, `Obs`, `Ema`, `DocRes`, `PerRes`, `UsuAdd`, `FecAdd`, `UsuChg`, `FecChg`, `TimChg`, `fectrn`, `ImpTipCam`, `AfeIgvflg`, `FecPriSer`, `EmailEnviado`, `EmailRecibido`, `FileHTML`, `Length`, `EmaFlg`, `Color1`, `Color2`, `tipe`, `lang`, `comment`, `catalog_prom`, `SerCdg`, `price1`, `pricet`, `promo_cat`, `cur_datime`, `attention`) VALUES
('01', 'KTK-1', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alguien@esto.com', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T', 'gm', '', '', 'CHA', 10, 24, '', 0, 'Francisco'),
('01', 'KTK-1', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alguien@esto.com', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'F', 'en', '', '', 'RDV', 20, 16, '', 0, 'Francisco'),
('01', 'KTK-1', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alguien@esto.com', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'F', 'en', '', '', 'CHA', 10, 24, '', 0, 'Francisco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotation_master`
--

CREATE TABLE `quotation_master` (
  `id` bigint(4) unsigned NOT NULL auto_increment,
  `DocNro` varchar(10) default NULL,
  `country` tinyint(3) default NULL,
  `paxnumber` tinyint(4) default NULL,
  `FacNro` tinyint(4) default NULL,
  `Observ` varchar(200) default NULL,
  `PerRes` varchar(20) default NULL,
  `paxname` varchar(15) default NULL,
  `servcount` tinyint(4) default NULL,
  `state_reserv` varchar(1) NOT NULL,
  `Date_first_serv` bigint(10) default NULL,
  `total_price` float NOT NULL,
  `date_confirm` bigint(20) default NULL,
  `FecLimPrePag` bigint(10) default NULL,
  `ImpTipCam` float NOT NULL,
  `AgeCdg` varchar(10) default NULL,
  `taxes` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` bigint(10) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `quotation_master`
--

INSERT INTO `quotation_master` (`id`, `DocNro`, `country`, `paxnumber`, `FacNro`, `Observ`, `PerRes`, `paxname`, `servcount`, `state_reserv`, `Date_first_serv`, `total_price`, `date_confirm`, `FecLimPrePag`, `ImpTipCam`, `AgeCdg`, `taxes`, `user_id`, `timestamp`) VALUES
(1, 'KTK-1', 29, 4, NULL, NULL, NULL, 'Los viajeros', 3, '', 1264136400, 76.16, NULL, NULL, 0, 'KTK', 0, 1, 1262805871);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserv_master`
--

CREATE TABLE `reserv_master` (
  `id` bigint(10) unsigned NOT NULL auto_increment,
  `DocNro` varchar(10) default NULL,
  `country` tinyint(3) default NULL,
  `paxnumber` tinyint(4) default NULL,
  `FacNro` tinyint(4) default NULL,
  `FecLimPrePag` bigint(10) default NULL,
  `Observ` varchar(200) default NULL,
  `PerRes` varchar(20) default NULL,
  `paxname` varchar(15) default NULL,
  `servcount` tinyint(4) default NULL,
  `total_price` float NOT NULL,
  `Date_first_serv` bigint(10) default NULL,
  `state_reserv` varchar(1) NOT NULL,
  `ImpTipCam` float NOT NULL,
  `AgeCdg` varchar(10) default NULL,
  `date_confirm` bigint(10) default NULL,
  `taxes` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` bigint(10) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `reserv_master`
--

INSERT INTO `reserv_master` (`id`, `DocNro`, `country`, `paxnumber`, `FacNro`, `FecLimPrePag`, `Observ`, `PerRes`, `paxname`, `servcount`, `total_price`, `Date_first_serv`, `state_reserv`, `ImpTipCam`, `AgeCdg`, `date_confirm`, `taxes`, `user_id`, `timestamp`) VALUES
(1, 'KTK-1', 53, 4, NULL, NULL, NULL, NULL, '2Parejas', 2, 47.6, 1264136400, '', 0, 'KTK', NULL, 7.6, 1, 1262805919);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `EmpCdg` char(2) character set latin1 NOT NULL,
  `SerCdg` char(4) character set latin1 NOT NULL,
  `SerDsc` varchar(50) character set latin1 NOT NULL,
  `SerDscAbr` varchar(20) character set latin1 NOT NULL,
  `SerPre` float default NULL,
  `SerAgeCdg` char(3) character set latin1 default NULL,
  `SerUsuAdd` char(4) character set latin1 default NULL,
  `SerFecAdd` date default NULL,
  `SerUsuChg` char(4) character set latin1 default NULL,
  `SerFecChg` date default NULL,
  `SerTimChg` char(14) character set latin1 default NULL,
  `hotusuadd` char(4) character set latin1 default NULL,
  `hotfecadd` date default NULL,
  `hottimadd` varchar(14) character set latin1 default NULL,
  `levels_users` tinyint(4) default NULL,
  `tarif_cdg` varchar(5) character set latin1 default NULL,
  PRIMARY KEY  (`EmpCdg`,`SerCdg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcar la base de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`EmpCdg`, `SerCdg`, `SerDsc`, `SerDscAbr`, `SerPre`, `SerAgeCdg`, `SerUsuAdd`, `SerFecAdd`, `SerUsuChg`, `SerFecChg`, `SerTimChg`, `hotusuadd`, `hotfecadd`, `hottimadd`, `levels_users`, `tarif_cdg`) VALUES
('DF', 'DFT', 'Guia Multilingue Privado 1d', '', 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PAE'),
('', 'RDV', 'ascenso al Misti', '', 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PAE'),
('', 'CHA', 'Ascenso al Chachani', '', 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PAE'),
('', 'ASX', 'City Tour 2h', '', 20, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'PAE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifarios`
--

CREATE TABLE `tarifarios` (
  `id` int(11) NOT NULL auto_increment,
  `descript` varchar(50) default NULL,
  `tarif_cdg` varchar(5) default NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `tarifarios`
--

INSERT INTO `tarifarios` (`id`, `descript`, `tarif_cdg`) VALUES
(1, 'tarifarios economicos', 'PAE'),
(2, 'tarifarios especiales de lujo', 'ACARO'),
(3, 'transferencias en bus en Cali', 'ACER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifasdetalle`
--

CREATE TABLE `tarifasdetalle` (
  `id` int(11) NOT NULL auto_increment,
  `SerCdg` varchar(10) NOT NULL,
  `AgeCdg` char(5) NOT NULL,
  `Rng` char(21) NOT NULL,
  `Pre` float default NULL,
  `FecIni` date default NULL,
  `FecFin` date default NULL,
  `UsuAdd` char(4) default NULL,
  `FecAdd` date default NULL,
  `TimAdd` char(14) default NULL,
  `UsuChg` char(4) default NULL,
  `FecChg` date default NULL,
  `TimChg` char(14) default NULL,
  `IPAdd` varchar(15) default NULL,
  `IPChg` varchar(15) default NULL,
  `NumLin` int(11) NOT NULL default '0',
  `PaxIni` int(11) NOT NULL default '0',
  `PaxFin` int(11) NOT NULL default '0',
  `EmpCdg` char(2) NOT NULL,
  PRIMARY KEY  (`AgeCdg`,`SerCdg`,`PaxIni`,`PaxFin`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcar la base de datos para la tabla `tarifasdetalle`
--

INSERT INTO `tarifasdetalle` (`id`, `SerCdg`, `AgeCdg`, `Rng`, `Pre`, `FecIni`, `FecFin`, `UsuAdd`, `FecAdd`, `TimAdd`, `UsuChg`, `FecChg`, `TimChg`, `IPAdd`, `IPChg`, `NumLin`, `PaxIni`, `PaxFin`, `EmpCdg`) VALUES
(1, 'ASC', '-1', '', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, ''),
(2, 'ASC', '-1', '', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 2, ''),
(3, 'ASC', '-1', '', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, 3, ''),
(18, 'ASX', '', '', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 20, ''),
(5, '13', 'ESA', '', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 20, ''),
(6, '12', '-1', '', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, ''),
(7, '12', '-1', '', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 2, ''),
(8, '2', 'KTK', '', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, ''),
(9, '2', 'KTK', '', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 5, ''),
(10, '1', '', '', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, ''),
(12, 'RDV', '', '', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, ''),
(13, 'RDV', '', '', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 10, ''),
(14, 'RDV', '', '', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 11, 20, ''),
(15, 'CHA', '', '', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, ''),
(16, 'CHA', '', '', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 4, ''),
(17, 'CHA', '', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, 20, ''),
(19, 'ASX', '', '', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 21, 1000, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `username` varchar(16) NOT NULL default '',
  `password` varchar(16) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `lastlogin` bigint(10) default NULL,
  `newlogin` bigint(10) default NULL,
  `admin` varchar(5) NOT NULL default '',
  `status` tinyint(1) unsigned NOT NULL default '0',
  `added` bigint(10) default NULL,
  `comments` text,
  `company` varchar(50) default NULL,
  `website` varchar(70) default NULL,
  `privileges` smallint(6) default NULL,
  `AgeCdg` varchar(10) NOT NULL,
  `template` varchar(5) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `tickets_users_admin` (`admin`),
  KEY `tickets_users_status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `lastlogin`, `newlogin`, `admin`, `status`, `added`, `comments`, `company`, `website`, `privileges`, `AgeCdg`, `template`) VALUES
(13, 'The Administrator', '10', '10', '', 1262833472, NULL, 'Admin', 1, NULL, NULL, NULL, NULL, NULL, '', ''),
(10, 'aa', 'aa', 'aa', 'aa', NULL, NULL, 'User', 1, 1262304209, NULL, NULL, 'aa', NULL, 'GHT', ''),
(11, 'cc', 'cc', 'cc', 'cc', 1262791974, NULL, 'Mod', 1, 1262649735, NULL, NULL, 'cc', NULL, 'ZZZ', '');
