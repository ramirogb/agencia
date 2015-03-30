-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-09-2010 a las 17:10:13
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
  `EmpCdg` char(2) character set latin1 collate latin1_general_ci NOT NULL,
  `AgeCdg` char(3) character set latin1 collate latin1_general_ci NOT NULL,
  `AgeDsc` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  `AgeDscAbr` varchar(20) character set latin1 collate latin1_general_ci NOT NULL,
  `AgeDir` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `AgeFon` varchar(20) character set latin1 collate latin1_general_ci default NULL,
  `AgeFax` varchar(20) character set latin1 collate latin1_general_ci default NULL,
  `AgeCto` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `AgeUsuAdd` char(4) character set latin1 collate latin1_general_ci default NULL,
  `AgeFecAdd` bigint(10) default NULL,
  `AgeTimAdd` char(14) character set latin1 collate latin1_general_ci default NULL,
  `AgeUsuChg` char(4) character set latin1 collate latin1_general_ci default NULL,
  `AgeFecChg` date default NULL,
  `AgeTimChg` char(14) character set latin1 collate latin1_general_ci default NULL,
  `AgeRuc` varchar(12) character set latin1 collate latin1_general_ci default NULL,
  `Color1` int(11) default NULL,
  `Color2` int(11) default NULL,
  `AgeFon2` varchar(20) character set latin1 collate latin1_general_ci default NULL,
  `AgeNex` varchar(20) character set latin1 collate latin1_general_ci default NULL,
  `AgeCelMov` varchar(20) character set latin1 collate latin1_general_ci default NULL,
  `AgeCelCla` varchar(20) character set latin1 collate latin1_general_ci default NULL,
  `Rng` varchar(21) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`EmpCdg`,`AgeCdg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `agencias`
--

INSERT INTO `agencias` (`EmpCdg`, `AgeCdg`, `AgeDsc`, `AgeDscAbr`, `AgeDir`, `AgeFon`, `AgeFax`, `AgeCto`, `AgeUsuAdd`, `AgeFecAdd`, `AgeTimAdd`, `AgeUsuChg`, `AgeFecChg`, `AgeTimChg`, `AgeRuc`, `Color1`, `Color2`, `AgeFon2`, `AgeNex`, `AgeCelMov`, `AgeCelCla`, `Rng`) VALUES
('01', 'COT', 'CONRESA TOUR ', 'COT', 'Poner Direccion real', '285420', NULL, 'XYZ', 'ADMN', 2008, '09:55:26 a.m.', 'A001', '2009-04-15', '16:41:18', NULL, 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'CON', 'CONTACTUS', 'CON', 'Poner Direccion real', '01271-7552', '', 'XYZ', 'ADMN', 2008, '09:55:42 a.m.', 'A001', '2009-04-15', '16:40:14', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'IKL', 'INKALAND TOURS', 'INKALAND TOURS', 'Poner Direccion real', '012222291', '014228540', 'XYZ', 'ADMN', 2008, '09:54:57 a.m.', 'A001', '2009-04-15', '16:46:22', NULL, 16711680, 65280, '123', '123', '123456', '123456', NULL),
('01', 'ANT', 'ANDEAN TOUR', 'ANT', 'Poner Direccion real', '014467992', NULL, 'XYZ', 'ADMN', 2008, '09:55:11 a.m.', 'ADMN', '2009-11-23', '01:19:40', '2147483647', 16711680, 15780518, '123', '123', '123456', '123456', '2009-01-01 2009-12-31'),
('01', 'CAT', 'CLASS ADVENTURE TRAVEL', 'CLASS ADVENTURE TRAV', 'Poner Direccion real', '01444 2220', '', 'XYZ', 'ADMN', 2008, '05:07:33 p.m.', 'ADMN', '2009-11-23', '10:33:57', '20806580989', 16711680, 15780518, '123', '123', '123456', '123456', '2009-01-01 2009-12-31'),
('01', 'ATA', 'ACUARIOS TRAVEL', 'ACUARIOS', 'Poner Direccion real', '247393', '247393', 'XYZ', 'ADMN', 2008, '09:53:18 a.m.', 'A001', '2009-04-15', '16:21:48', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'INR', 'INCA ROUTE', 'INR', 'Poner Direccion real', '200920', '226053', 'XYZ', 'ADMN', 2008, '09:56:15 a.m.', 'A001', '2009-04-15', '16:50:32', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'INT', 'INKARI TOURS', 'INT', 'Poner Direccion real', '01- 421 87 05', '01 - 442 15 59', 'XYZ', 'ADMN', 2008, '09:56:36 a.m.', 'A001', '2009-04-15', '16:53:05', NULL, 16711680, 15780518, '123', '123', '123456', '4444444444', NULL),
('01', 'LAT', 'LATIN TOURS', '', 'Poner Direccion real', '014264287 ', '', 'XYZ', 'ADMN', 2008, '09:56:47 a.m.', 'A001', '2009-04-15', '16:58:44', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'PEC', 'PERUVIAN CONFORT', 'ssssssssss', 'Poner Direccion real', NULL, NULL, 'XYZ', 'ADMN', 2008, '09:57:00 a.m.', NULL, NULL, NULL, NULL, NULL, NULL, '123', '123', '123456', 'aaaaaaaaaaaaaaaaaaaa', NULL),
('01', 'PTA', 'PLANET TRAVEL AREQUIPA', '', 'Poner Direccion real', '200009', '', 'XYZ', 'ADMN', 2008, '09:57:22 a.m.', 'A001', '2009-04-15', '17:12:30', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'PTP', 'PLANET TRAVEL PUNO', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '09:57:34 a.m.', NULL, NULL, NULL, '', NULL, NULL, '123', '123', '123456', '123456', NULL),
('01', 'SIT', 'SIHAI TIANMA', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '09:57:47 a.m.', 'A001', '2009-01-05', '12:21:12', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'ANE', 'ANDES EXPLORER', 'ANE', 'Poner Direccion real', '223747', '', 'XYZ', 'ADMN', 2008, '09:58:00 a.m.', 'A001', '2009-04-15', '16:18:43', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'CTK', 'COLCA TREKK', 'CTK', 'Poner Direccion real', '206217 ', '', 'XYZ', 'ADMN', 2008, '09:59:23 a.m.', 'A001', '2009-04-15', '16:42:25', '', 16711680, 12639424, '123', '123', '123456', '123456', NULL),
('01', 'PEL', 'PERU LINE', '', 'Poner Direccion real', '01242 3642', '01242 3642', 'XYZ', 'ADMN', 2008, '09:59:38 a.m.', 'A001', '2009-04-15', '17:11:31', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'CAR', 'CALYPSO REPS', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '09:59:50 a.m.', 'A001', '2009-01-05', '12:17:41', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'TPL', 'TRAVEL PERU ONLINE', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '10:00:02 a.m.', 'A001', '2009-01-05', '12:21:27', '', 16711680, 15780518, '123', '123', '123456', '123456', NULL),
('01', 'HOT', 'HOPE TRAVEL', '', 'Poner Direccion real', '', '', 'XYZ', 'ADMN', 2008, '10:00:13 a.m.', NULL, NULL, NULL, '', NULL, NULL, '123', '123', '123456', '123456', NULL),
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
('1', 'mmx', 'Agencia Ramiro SAC', 'Agencia dedicada a l', 'Poner Direccion real', '444444', '222222', 'XYZ', '1', NULL, NULL, '1', '0000-00-00', '1', '2147483647', 1, 1, '123', '123', '123456', '123456', '1'),
('', 'AGP', 'Agencia Pollo Real', 'desconocida', NULL, NULL, NULL, NULL, NULL, 1263006891, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(4) default NULL,
  `Name` varchar(20) character set latin1 collate latin1_general_ci default NULL,
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
-- Estructura de tabla para la tabla `ipns_paypal`
--

CREATE TABLE `ipns_paypal` (
  `id` int(11) NOT NULL auto_increment,
  `item_name` varchar(15) default NULL,
  `item_number` int(11) default NULL,
  `payment_status` varchar(15) default NULL,
  `payment_amount` float(9,3) default NULL,
  `txn_id` int(11) default NULL,
  `payer_email` varchar(25) default NULL,
  `added` bigint(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `ipns_paypal`
--

INSERT INTO `ipns_paypal` (`id`, `item_name`, `item_number`, `payment_status`, `payment_amount`, `txn_id`, `payer_email`, `added`) VALUES
(1, 'paso1', 0, '', 0.000, 0, '', 1267651474),
(2, '$esta mal', 0, '', 0.000, 0, '', 1267651475);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languajes`
--

CREATE TABLE `languajes` (
  `id` tinyint(4) NOT NULL auto_increment,
  `lang` varchar(5) character set latin1 collate latin1_general_ci default NULL,
  `lang_descript` varchar(18) character set latin1 collate latin1_general_ci default NULL,
  `category` int(11) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `languajes`
--

INSERT INTO `languajes` (`id`, `lang`, `lang_descript`, `category`) VALUES
(1, 'es', 'Castellano', 3),
(2, 'fr', 'Francés', 1),
(3, 'en', 'Inglés', 3),
(4, 'gm', 'Alemán', 1),
(5, 'it', 'Italiano', 1),
(6, 'br', 'Portugués', 1),
(9, 'RUS', 'Ruso', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languajes_categories`
--

CREATE TABLE `languajes_categories` (
  `id` tinyint(4) NOT NULL auto_increment,
  `lang` varchar(5) character set latin1 collate latin1_general_ci default NULL,
  `lang_descript` varchar(18) character set latin1 collate latin1_general_ci default NULL,
  `category` int(11) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `languajes_categories`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `myreservas`
--

CREATE TABLE `myreservas` (
  `EmpCdg` char(2) character set latin1 collate latin1_general_ci NOT NULL,
  `DocNro` char(10) character set latin1 collate latin1_general_ci NOT NULL,
  `Paxs` int(11) default NULL,
  `Dsc` varchar(100) character set latin1 collate latin1_general_ci default NULL,
  `SerNum` int(11) default NULL,
  `NumSerDet` int(11) default NULL,
  `NumPaxDet` int(11) default NULL,
  `ImpValVta` float default NULL,
  `ImpIgv` float default NULL,
  `ImpTot` float default NULL,
  `ImpIgvNow` float default NULL,
  `MonTip` char(1) character set latin1 collate latin1_general_ci default NULL,
  `Sts` char(1) character set latin1 collate latin1_general_ci NOT NULL default '1',
  `ValPreFlg` char(1) character set latin1 collate latin1_general_ci default NULL,
  `FacNro` char(10) character set latin1 collate latin1_general_ci default NULL,
  `PndFlg` char(1) character set latin1 collate latin1_general_ci default NULL,
  `StsPnd` char(1) character set latin1 collate latin1_general_ci default NULL,
  `Ema` varchar(254) character set latin1 collate latin1_general_ci default NULL,
  `DocRes` varchar(20) character set latin1 collate latin1_general_ci default NULL,
  `PerRes` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `UsuAdd` char(4) character set latin1 collate latin1_general_ci default NULL,
  `FecAdd` bigint(10) default NULL,
  `UsuChg` char(4) character set latin1 collate latin1_general_ci default NULL,
  `FecChg` bigint(10) default NULL,
  `AfeIgvflg` char(1) character set latin1 collate latin1_general_ci default NULL,
  `Length` int(11) default NULL,
  `EmaFlg` char(1) character set latin1 collate latin1_general_ci default NULL,
  `Color1` int(11) default NULL,
  `Color2` int(11) default NULL,
  `tipe` varchar(5) NOT NULL,
  `lang` varchar(5) character set latin1 collate latin1_general_ci NOT NULL,
  `comment` varchar(200) character set latin1 collate latin1_general_ci NOT NULL,
  `catalog_prom` varchar(10) character set latin1 collate latin1_general_ci NOT NULL,
  `SerCdg` varchar(10) character set latin1 collate latin1_general_ci NOT NULL,
  `price1` float NOT NULL,
  `pricet` float NOT NULL,
  `promo_cat` varchar(10) character set latin1 collate latin1_general_ci NOT NULL,
  `attention` varchar(20) character set latin1 collate latin1_general_ci NOT NULL,
  KEY `DocNro` (`DocNro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `myreservas`
--

INSERT INTO `myreservas` (`EmpCdg`, `DocNro`, `Paxs`, `Dsc`, `SerNum`, `NumSerDet`, `NumPaxDet`, `ImpValVta`, `ImpIgv`, `ImpTot`, `ImpIgvNow`, `MonTip`, `Sts`, `ValPreFlg`, `FacNro`, `PndFlg`, `StsPnd`, `Ema`, `DocRes`, `PerRes`, `UsuAdd`, `FecAdd`, `UsuChg`, `FecChg`, `AfeIgvflg`, `Length`, `EmaFlg`, `Color1`, `Color2`, `tipe`, `lang`, `comment`, `catalog_prom`, `SerCdg`, `price1`, `pricet`, `promo_cat`, `attention`) VALUES
('01', 'LAT-1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266555600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'fr', '', '', 'MAC7', 2500, 2500, '', ''),
('01', 'LAT-1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266469200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', '', '', '', 'MAC7', 2500, 2500, '', ''),
('01', 'PEL-1', 120, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267193700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'en', '', '', 'MAC7', 0, 0, '', ''),
('01', 'PEL-2', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266675300, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'en', '', '', 'MAC7', 2000, 24000, '', ''),
('01', 'PEL-3', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266675300, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'en', '', '', 'MAC7', 2000, 24000, '', ''),
('01', 'PEL-4', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266654600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'it', '', '', 'MAC7', 2000, 24000, '', ''),
('01', 'PEL-5', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267173000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'it', '', '', 'MAC7', 2000, 24000, '', ''),
('01', 'PEL-6', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267173000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'it', '', '', 'MAC7', 2000, 24000, '', ''),
('01', 'PEL-7', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267173000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'it', '', '', 'MAC7', 2000, 24000, '', ''),
('01', 'PEL-8', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267173000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'it', '', '', 'MAC7', 2000, 24000, '', ''),
('01', 'PEL-8', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1298005200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'en', '', '', 'MAC7', 2200, 4400, '', ''),
('01', 'PEL-9', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267173000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'it', '', '', 'MAC7', 2000, 24000, '', ''),
('01', 'PEL-9', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1298005200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'en', '', '', 'MAC7', 2200, 4400, '', ''),
('01', 'PEL-10', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267173000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'it', '', '', 'MAC7', 2000, 24000, '', ''),
('01', 'PEL-11', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267173000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'en', '', '', 'EURO2', 1800, 21600, '', ''),
('01', 'PEL-12', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267173000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'en', '', '', 'EURO2', 1800, 21600, '', ''),
('01', 'PEL-13', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267173000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'en', '', '', 'EURO2', 1800, 21600, '', ''),
('01', 'PEL-14', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267259400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'en', '', '', 'EURO2', 1800, 21600, '', ''),
('01', 'PEL-15', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1267074000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'fr', '', '', 'MAC7', 2000, 68000, '', ''),
('01', 'PEL-16', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-17', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-18', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-19', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-20', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-21', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-22', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-23', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-24', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-25', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-26', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-27', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-28', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-29', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-30', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-31', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-32', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-33', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 4800, '', ''),
('01', 'PEL-34', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-35', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-36', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-37', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-38', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-39', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-40', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-41', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-42', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-43', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-44', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-45', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-46', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-47', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-48', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-49', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-50', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-51', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-52', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-53', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-54', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-55', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-56', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-57', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-58', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-59', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-60', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1266642000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 2000, '', ''),
('01', 'PEL-43', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269761400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'fr', '', '', 'MAC7', 2000, 24000, '', ''),
('01', 'PEL-44', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269761400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'fr', '', '', 'MAC7', 2500, 2500, '', ''),
('01', 'PEL-45', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'MAC7', 2500, 2500, '', ''),
('01', 'PEL-46', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'MAC7', 2500, 2500, '', ''),
('01', 'PEL-47', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'MAC7', 2500, 2500, '', ''),
('01', 'PEL-48', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'MAC7', 2500, 2500, '', ''),
('01', 'PEL-49', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-50', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'MAC7', 400, 400, '', ''),
('01', 'PEL-51', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'EURO2', 2300, 2300, '', ''),
('01', 'PEL-52', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'EURO2', 2300, 2300, '', ''),
('01', 'PEL-53', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'EURO2', 2300, 2300, '', ''),
('01', 'PEL-54', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'EURO2', 2300, 2300, '', ''),
('01', 'PEL-55', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'EURO2', 1800, 1800, '', ''),
('01', 'PEL-56', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1269489600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'es', '', '', 'EURO2', 1800, 1800, '', ''),
('01', 'PEL-57', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1268472600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'MAC7', 2500, 2500, '', ''),
('01', 'PEL-58', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1268472600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'MAC7', 2500, 2500, '', ''),
('01', 'PEL-59', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1268283600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'HIMAL', 200, 200, '', ''),
('01', 'PEL-60', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1268283600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'es', '', '', 'HIMAL', 200, 200, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passengers`
--

CREATE TABLE `passengers` (
  `Id` mediumint(8) unsigned NOT NULL auto_increment,
  `FirstName` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  `LastName` varchar(70) character set latin1 collate latin1_general_ci NOT NULL,
  `BirthDate` date NOT NULL,
  `Gender` enum('m','f') character set latin1 collate latin1_general_ci default NULL,
  `Done` tinyint(4) NOT NULL default '0',
  `id_reserv` varchar(20) NOT NULL,
  `phone1` varchar(15) character set latin1 collate latin1_general_ci NOT NULL,
  `email` varchar(30) character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `passengers`
--

INSERT INTO `passengers` (`Id`, `FirstName`, `LastName`, `BirthDate`, `Gender`, `Done`, `id_reserv`, `phone1`, `email`) VALUES
(1, 'ramiro', 'banda', '0000-00-00', 'm', 0, 'PEL-51', '', 'rbanda@hotmail.com'),
(2, 'ramiro g', 'banda', '0000-00-00', 'm', 0, 'PEL-51', '', 'rbanda@hotmail.com'),
(3, 'Carlo based', 'Banda Valdivia', '0000-00-00', 'f', 0, 'PEL-52', '43434', 'carlo@este.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments_reservations`
--

CREATE TABLE `payments_reservations` (
  `id` bigint(10) unsigned NOT NULL auto_increment,
  `DocNro` varchar(10) character set latin1 collate latin1_general_ci default NULL,
  `Observ` varchar(200) character set latin1 collate latin1_general_ci default NULL,
  `amount` float default NULL,
  `taxes` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` bigint(10) NOT NULL,
  `payment_type` varchar(2) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcar la base de datos para la tabla `payments_reservations`
--

INSERT INTO `payments_reservations` (`id`, `DocNro`, `Observ`, `amount`, `taxes`, `user_id`, `timestamp`, `payment_type`) VALUES
(1, 'CAR-1', '12', 12, 0, 15, 1264270287, '0'),
(2, 'CAR-1', '12', 12, 0, 15, 1264270291, '0'),
(3, 'CAR-1', '', 12, 0, 15, 1264342424, '0'),
(4, 'CAR-1', '', 0, 0, 15, 1264342970, '0'),
(5, 'CAR-1', '', 0, 0, 15, 1264342977, '0'),
(6, 'CAR-1', '', 0, 0, 15, 1264343061, '0'),
(7, 'CAR-1', '', 0, 0, 15, 1264343240, '0'),
(8, 'CAR-1', 'efectivo', 3000, 0, 15, 1264343266, '0'),
(9, 'CAR-3', 'ddd', 120, 0, 15, 1264426606, '0'),
(10, 'CAR-3', '400', 120, 0, 15, 1264426616, '0'),
(11, 'CAR-3', '720', 120, 0, 15, 1264426622, '0'),
(12, 'CAR-3', '600', 120, 0, 15, 1264426645, '0'),
(13, 'CAR-3', '600', 480, 0, 15, 1264426672, '0'),
(16, 'CAR-7', '', 500, 0, 15, 1264812224, '0'),
(15, 'CAR-8', '', 12, 0, 15, 1264551641, '0'),
(17, 'CAR-7', '', 12, 0, 15, 1264816422, '0'),
(18, 'CAR-7', '', 12, 0, 15, 1264816426, '0'),
(19, 'CAR-8', '', 12, 0, 11, 1264816581, '0'),
(20, 'CAR-1', 'devolvi 2000', -2000, 0, 15, 1264858548, '0'),
(21, 'PEL-13', '', 12, 0, 19, 1266513986, '0'),
(22, 'PEL-5', '', 24000, 0, 19, 1266514169, '0'),
(23, 'PEL-60', '', 455, 0, 19, 1267320790, '0'),
(24, 'PEL-60', '', 234, 0, 19, 1267320795, '0'),
(25, 'PEL-60', '', 33, 0, 19, 1267320806, '2'),
(26, 'PEL-60', '', 32, 0, 10, 1267458151, '1'),
(27, 'PEL-60', '', 600, 0, 10, 1267458159, '1'),
(28, 'PEL-60', '', 46, 0, 10, 1267458187, '1'),
(29, 'PEL-60', '', 46, 0, 10, 1267458194, '2'),
(30, 'PEL-60', '', 46, 0, 10, 1267458198, '4'),
(31, '', 'From Paypal Online', 200, 0, 0, 1267730824, ''),
(32, '', 'From Paypal Online', 200, 0, 0, 1267730995, ''),
(33, '', 'From Paypal Online', 200, 0, 0, 1267731386, ''),
(34, '', 'From Paypal Online', 200, 0, 0, 1267731791, ''),
(35, '', 'From Paypal Online', 200, 0, 0, 1267731973, ''),
(36, '', 'From Paypal Online', 200, 0, 0, 1267732582, ''),
(37, '', 'From Paypal Online', 200, 0, 0, 1267732896, ''),
(38, '', 'From Paypal Online', 200, 0, 0, 1267733145, ''),
(39, '', 'From Paypal Online', 200, 0, 0, 1267733194, ''),
(40, '', 'From Paypal Online', 200, 0, 0, 1267733451, ''),
(41, 'PEL-59', 'From Paypal Online', 200, 0, 0, 1267733718, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paypal_confirm`
--

CREATE TABLE `paypal_confirm` (
  `id` int(11) NOT NULL auto_increment,
  `item_name` varchar(15) character set latin1 collate latin1_general_ci default NULL,
  `item_number` int(11) default NULL,
  `payment_status` varchar(15) character set latin1 collate latin1_general_ci default NULL,
  `payment_amount` float(9,3) default NULL,
  `payer_email` varchar(25) character set latin1 collate latin1_general_ci default NULL,
  `added` bigint(10) NOT NULL,
  `transactionId` varchar(30) default NULL,
  `paymentType` varchar(10) default NULL,
  `settleAmt` float(9,3) default NULL,
  `taxAmt` float(9,3) default NULL,
  `feeAmt` float(9,3) default NULL,
  `orderTime` datetime default NULL,
  `txn_id` varchar(5) default NULL,
  `phonNumber` varchar(12) default NULL,
  `cntryCode` varchar(4) default NULL,
  `firstName` varchar(10) default NULL,
  `payer_id` varchar(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `paypal_confirm`
--

INSERT INTO `paypal_confirm` (`id`, `item_name`, `item_number`, `payment_status`, `payment_amount`, `payer_email`, `added`, `transactionId`, `paymentType`, `settleAmt`, `taxAmt`, `feeAmt`, `orderTime`, `txn_id`, `phonNumber`, `cntryCode`, `firstName`, `payer_id`) VALUES
(1, 'PEL-59', NULL, 'Completed', 200.000, '', 1267733717, '5NL97080UT9313507', 'instant', 0.000, 0.000, 6.100, '2010-03-04 20:15:17', 'USD', '', 'US', 'Test', '3KNJZRNZSNPF6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotations`
--

CREATE TABLE `quotations` (
  `EmpCdg` char(2) character set latin1 collate latin1_general_ci NOT NULL,
  `DocNro` char(10) character set latin1 collate latin1_general_ci NOT NULL,
  `Paxs` int(11) default NULL,
  `Dsc` varchar(100) character set latin1 collate latin1_general_ci default NULL,
  `SerNum` int(11) default NULL,
  `NumSerDet` int(11) default NULL,
  `NumPaxDet` int(11) default NULL,
  `ImpValVta` float default NULL,
  `ImpIgv` float default NULL,
  `ImpTot` float default NULL,
  `ImpIgvNow` float default NULL,
  `MonTip` char(1) character set latin1 collate latin1_general_ci default NULL,
  `Sts` char(1) character set latin1 collate latin1_general_ci default NULL,
  `ValPreFlg` char(1) character set latin1 collate latin1_general_ci default NULL,
  `FacNro` char(10) character set latin1 collate latin1_general_ci default NULL,
  `PndFlg` char(1) character set latin1 collate latin1_general_ci default NULL,
  `StsPnd` char(1) character set latin1 collate latin1_general_ci default NULL,
  `FecLimPrePag` date default NULL,
  `Obs` mediumblob,
  `Ema` varchar(254) character set latin1 collate latin1_general_ci default NULL,
  `DocRes` varchar(20) character set latin1 collate latin1_general_ci default NULL,
  `PerRes` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `UsuAdd` char(4) character set latin1 collate latin1_general_ci default NULL,
  `FecAdd` bigint(10) default NULL,
  `UsuChg` char(4) character set latin1 collate latin1_general_ci default NULL,
  `FecChg` date default NULL,
  `TimChg` char(14) character set latin1 collate latin1_general_ci default NULL,
  `fectrn` date default NULL,
  `ImpTipCam` float default NULL,
  `AfeIgvflg` char(1) character set latin1 collate latin1_general_ci default NULL,
  `FecPriSer` date default NULL,
  `EmailEnviado` mediumblob,
  `EmailRecibido` mediumblob,
  `FileHTML` varchar(254) character set latin1 collate latin1_general_ci default NULL,
  `Length` int(11) default NULL,
  `EmaFlg` char(1) character set latin1 collate latin1_general_ci default NULL,
  `Color1` int(11) default NULL,
  `Color2` int(11) default NULL,
  `tipe` varchar(5) NOT NULL,
  `lang` varchar(5) character set latin1 collate latin1_general_ci NOT NULL,
  `comment` varchar(200) character set latin1 collate latin1_general_ci NOT NULL,
  `catalog_prom` varchar(10) character set latin1 collate latin1_general_ci NOT NULL,
  `SerCdg` varchar(10) character set latin1 collate latin1_general_ci NOT NULL,
  `price1` float NOT NULL,
  `pricet` float NOT NULL,
  `promo_cat` varchar(10) character set latin1 collate latin1_general_ci NOT NULL,
  `cur_datime` bigint(10) NOT NULL,
  `attention` varchar(20) character set latin1 collate latin1_general_ci NOT NULL,
  KEY `DocNro` (`DocNro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `quotations`
--

INSERT INTO `quotations` (`EmpCdg`, `DocNro`, `Paxs`, `Dsc`, `SerNum`, `NumSerDet`, `NumPaxDet`, `ImpValVta`, `ImpIgv`, `ImpTot`, `ImpIgvNow`, `MonTip`, `Sts`, `ValPreFlg`, `FacNro`, `PndFlg`, `StsPnd`, `FecLimPrePag`, `Obs`, `Ema`, `DocRes`, `PerRes`, `UsuAdd`, `FecAdd`, `UsuChg`, `FecChg`, `TimChg`, `fectrn`, `ImpTipCam`, `AfeIgvflg`, `FecPriSer`, `EmailEnviado`, `EmailRecibido`, `FileHTML`, `Length`, `EmaFlg`, `Color1`, `Color2`, `tipe`, `lang`, `comment`, `catalog_prom`, `SerCdg`, `price1`, `pricet`, `promo_cat`, `cur_datime`, `attention`) VALUES
('01', 'PEL-1', 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mimail@este.com', NULL, NULL, NULL, 1267333200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRIV', 'fr', 'wqwq', '', 'MAC7', 2000, 44000, '', 0, '434'),
('01', 'PEL-1', 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mimail@este.com', NULL, NULL, NULL, 1267246800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAR', 'en', 'wqwqwq', '', 'EURO2', 1800, 23400, '', 0, '434'),
('01', 'PEL-2', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mimail@este.com', NULL, NULL, NULL, 1267074000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'VIP', 'fr', '', '', 'MAC7', 0, 0, '', 0, 'klo'),
('01', 'PEL-3', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mimail@este.com', NULL, NULL, NULL, 1267074000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'VIP', 'fr', '', '', 'MAC7', 0, 0, '', 0, '77');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotation_master`
--

CREATE TABLE `quotation_master` (
  `id` bigint(4) unsigned NOT NULL auto_increment,
  `DocNro` varchar(10) character set latin1 collate latin1_general_ci default NULL,
  `country` tinyint(3) default NULL,
  `paxnumber` tinyint(4) default NULL,
  `FacNro` tinyint(4) default NULL,
  `Observ` varchar(200) character set latin1 collate latin1_general_ci default NULL,
  `PerRes` varchar(20) character set latin1 collate latin1_general_ci default NULL,
  `paxname` varchar(15) character set latin1 collate latin1_general_ci default NULL,
  `servcount` tinyint(4) default NULL,
  `state_reserv` varchar(1) character set latin1 collate latin1_general_ci NOT NULL,
  `Date_first_serv` bigint(10) default NULL,
  `total_price` float NOT NULL,
  `date_confirm` bigint(20) default NULL,
  `FecLimPrePag` bigint(10) default NULL,
  `ImpTipCam` float NOT NULL,
  `AgeCdg` varchar(10) character set latin1 collate latin1_general_ci default NULL,
  `taxes` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` bigint(10) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `quotation_master`
--

INSERT INTO `quotation_master` (`id`, `DocNro`, `country`, `paxnumber`, `FacNro`, `Observ`, `PerRes`, `paxname`, `servcount`, `state_reserv`, `Date_first_serv`, `total_price`, `date_confirm`, `FecLimPrePag`, `ImpTipCam`, `AgeCdg`, `taxes`, `user_id`, `timestamp`) VALUES
(1, 'PEL-1', 25, 34, NULL, NULL, NULL, '', 2, '', 1267246800, 67400, NULL, NULL, 0, 'PEL', 0, 19, 1265914185),
(2, 'PEL-2', 19, 7, NULL, NULL, NULL, '78', 1, '', 943938000, 0, NULL, NULL, 0, 'PEL', 0, 19, 1266508634),
(3, 'PEL-3', 23, 7, NULL, NULL, NULL, '77', 1, '', 943938000, 0, NULL, NULL, 0, 'PEL', 0, 19, 1266508912);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations_log`
--

CREATE TABLE `reservations_log` (
  `id` bigint(10) unsigned NOT NULL auto_increment,
  `DocNro` varchar(10) character set latin1 collate latin1_general_ci default NULL,
  `Observ` varchar(200) character set latin1 collate latin1_general_ci default NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` bigint(10) NOT NULL,
  `ip` varchar(15) character set latin1 collate latin1_general_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=303 ;

--
-- Volcar la base de datos para la tabla `reservations_log`
--

INSERT INTO `reservations_log` (`id`, `DocNro`, `Observ`, `user_id`, `timestamp`, `ip`) VALUES
(220, 'PEL-60', 'Agrega pago: 455', 19, 1267320790, ''),
(221, 'PEL-60', 'Agrega pago: 234', 19, 1267320795, ''),
(222, 'PEL-60', 'Agrega pago: 33', 19, 1267320806, ''),
(223, '', 'Update service MAC7 Desabilitado', 19, 1267415655, ''),
(224, '', 'Update service MAC7 Habilitado', 19, 1267415665, ''),
(225, 'PEL-60', 'Agrega pago: 32', 10, 1267458151, ''),
(226, 'PEL-60', 'Agrega pago: 600', 10, 1267458159, ''),
(227, 'PEL-60', 'Agrega pago: 46', 10, 1267458187, ''),
(228, 'PEL-60', 'Agrega pago: 46', 10, 1267458194, ''),
(229, 'PEL-60', 'Agrega pago: 46', 10, 1267458198, ''),
(230, '', 'Created', 10, 1267464363, ''),
(231, '', 'error sending to  aaCould not instantiate mail function.', 10, 1267464364, ''),
(232, '', 'error sending to  dddddCould not instantiate mail function.', 10, 1267464365, ''),
(233, '', 'Created', 10, 1267464406, ''),
(234, '', 'error sending to  aaCould not instantiate mail function.', 10, 1267464407, ''),
(235, '', 'error sending to  dddddCould not instantiate mail function.', 10, 1267464408, ''),
(236, '', 'Created', 19, 1267464594, ''),
(237, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267464595, ''),
(238, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267464596, ''),
(239, '', 'Created', 19, 1267464653, ''),
(240, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267464654, ''),
(241, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267464655, ''),
(242, '', 'Created', 19, 1267464665, ''),
(243, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267464666, ''),
(244, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267464667, ''),
(245, '', 'Created', 19, 1267464814, ''),
(246, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267464816, ''),
(247, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267464817, ''),
(248, '', 'Created', 19, 1267465027, ''),
(249, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267465028, ''),
(250, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267465029, ''),
(251, '', 'Created', 19, 1267465225, ''),
(252, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267465226, ''),
(253, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267465227, ''),
(254, '', 'Created', 19, 1267465384, ''),
(255, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267465385, ''),
(256, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267465386, ''),
(257, '', 'Created', 19, 1267465902, ''),
(258, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267465903, ''),
(259, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267465904, ''),
(260, 'PEL-52', 'Updated booking', 19, 1267466020, ''),
(261, '', 'error sending to  aaCould not instantiate mail function.', 19, 1267466021, ''),
(262, 'PEL-52', 'Updated booking', 19, 1267466161, ''),
(263, '', 'error sending to  aaCould not instantiate mail function.', 19, 1267466162, ''),
(264, '', 'Created', 19, 1267466539, ''),
(265, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267466540, ''),
(266, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267466541, ''),
(267, '', 'Created', 19, 1267466610, ''),
(268, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267466611, ''),
(269, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267466612, ''),
(270, '', 'Created', 19, 1267466653, ''),
(271, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267466654, ''),
(272, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267466655, ''),
(273, '', 'Created', 19, 1267466693, ''),
(274, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267466695, ''),
(275, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267466696, ''),
(276, '', 'Created', 19, 1267468898, ''),
(277, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267468899, ''),
(278, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267468900, ''),
(279, '', 'Created', 19, 1267468978, ''),
(280, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267468979, ''),
(281, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267468980, ''),
(282, '', 'Created', 19, 1267573898, ''),
(283, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267573900, ''),
(284, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267573901, ''),
(285, 'PEL-59', 'Updated booking', 19, 1267573914, ''),
(286, '', 'error sending to  aaCould not instantiate mail function.', 19, 1267573916, ''),
(287, '', 'Created', 19, 1267621797, ''),
(288, '', 'error sending to  mimail@este.comCould not instantiate mail function.', 19, 1267621799, ''),
(289, '', 'error sending to  dddddCould not instantiate mail function.', 19, 1267621800, ''),
(290, '', 'Registrar pago: ', 19, 1267730824, ''),
(291, '', 'Registrar pago: ', 19, 1267730995, ''),
(292, '', 'Registrar pago: ', 19, 1267731386, ''),
(293, '', 'Registrar pago: ', 19, 1267731791, ''),
(294, '', 'Registrar pago: ', 19, 1267731973, ''),
(295, '', 'Registrar pago: ', 19, 1267732582, ''),
(296, '', 'Registrar pago: ', 19, 1267732896, ''),
(297, '', 'Registrar pago: ', 19, 1267733145, ''),
(298, '', 'Registrar pago: ', 19, 1267733194, ''),
(299, '', 'Registrar pago: ', 19, 1267733451, ''),
(300, 'PEL-59', 'Registrar pago: ', 19, 1267733718, ''),
(301, 'PEL-13', 'Updated booking', 11, 1267811009, ''),
(302, '', 'error sending to  aa@aa.comCould not instantiate mail function.', 11, 1267811011, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserv_master`
--

CREATE TABLE `reserv_master` (
  `id` bigint(10) unsigned NOT NULL auto_increment,
  `DocNro` varchar(10) character set latin1 collate latin1_general_ci default NULL,
  `country` tinyint(3) default NULL,
  `paxnumber` int(4) default NULL,
  `FacNro` tinyint(4) default NULL,
  `FecLimPrePag` bigint(10) default NULL,
  `Observ` varchar(200) character set latin1 collate latin1_general_ci default NULL,
  `PerRes` varchar(20) default NULL,
  `paxname` varchar(15) character set latin1 collate latin1_general_ci default NULL,
  `servcount` tinyint(4) default NULL,
  `total_price` float NOT NULL,
  `Date_first_serv` bigint(10) default NULL,
  `state_reserv` varchar(1) character set latin1 collate latin1_general_ci NOT NULL,
  `ImpTipCam` float NOT NULL,
  `AgeCdg` varchar(10) character set latin1 collate latin1_general_ci default NULL,
  `date_confirm` bigint(10) default NULL,
  `taxes` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` bigint(10) NOT NULL,
  `payment_state` varchar(2) character set latin1 collate latin1_general_ci NOT NULL,
  `req_deposit` float NOT NULL,
  `they_owe_you` float NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Volcar la base de datos para la tabla `reserv_master`
--

INSERT INTO `reserv_master` (`id`, `DocNro`, `country`, `paxnumber`, `FacNro`, `FecLimPrePag`, `Observ`, `PerRes`, `paxname`, `servcount`, `total_price`, `Date_first_serv`, `state_reserv`, `ImpTipCam`, `AgeCdg`, `date_confirm`, `taxes`, `user_id`, `timestamp`, `payment_state`, `req_deposit`, `they_owe_you`) VALUES
(1, 'LAT-1', 1, 5, 0, -68400, 'dddddddddddddddddddddddddddddddddd', '', '454', 2, 5000, 1266469200, '0', 0, 'LAT', 0, 0, 19, 1265869104, '', 0, 5000),
(2, 'PEL-1', 67, 120, NULL, NULL, NULL, NULL, 'dominicos', 1, 0, 943938000, '0', 0, 'PEL', NULL, 0, 19, 1266509517, '', 0, 0),
(3, 'PEL-2', 21, 12, NULL, NULL, NULL, NULL, '12', 1, 24000, 943938000, '0', 0, 'PEL', NULL, 0, 19, 1266511409, '', 0, 24000),
(4, 'PEL-3', 48, 12, NULL, NULL, NULL, NULL, '12', 1, 24000, 943938000, '0', 0, 'PEL', NULL, 0, 19, 1266511645, '', 0, 24000),
(5, 'PEL-4', 18, 12, 0, -68400, '', '', '12', 1, 24000, 943938000, '5', 0, 'PEL', 0, 0, 19, 1266511706, '', 0, 24000),
(6, 'PEL-5', 47, 12, 0, -68400, '', '', '12', 1, 24000, 943938000, '1', 0, 'PEL', 1266514151, 0, 19, 1266512418, '', 0, 0),
(7, 'PEL-6', 43, 12, NULL, NULL, NULL, NULL, '12', 1, 24000, 943938000, '0', 0, 'PEL', NULL, 0, 19, 1266512698, '', 0, 24000),
(8, 'PEL-7', 43, 12, NULL, NULL, NULL, NULL, '12', 1, 24000, 943938000, '0', 0, 'PEL', NULL, 0, 19, 1266512869, '', 0, 24000),
(9, 'PEL-8', 48, 12, NULL, NULL, NULL, NULL, '12', 2, 28400, 1298005200, '0', 0, 'PEL', NULL, 0, 19, 1266512918, '', 0, 28400),
(10, 'PEL-9', 49, 12, 0, -68400, '', '', '12', 2, 28400, 1298005200, '2', 0, 'PEL', 0, 0, 19, 1266513516, '', 0, 28400),
(11, 'PEL-10', 39, 0, NULL, NULL, NULL, NULL, '', 1, 24000, 943938000, '0', 0, 'PEL', NULL, 0, 19, 1266513608, '', 0, 24000),
(12, 'PEL-11', 22, 45, NULL, NULL, NULL, NULL, '45', 1, 21600, 943938000, '0', 0, 'PEL', NULL, 0, 19, 1266513687, '', 0, 21600),
(13, 'PEL-12', 22, 0, 0, -68400, '', '', '', 1, 21600, 943938000, '1', 0, 'PEL', 1266514056, 0, 19, 1266513716, '', 0, 21600),
(14, 'PEL-13', 39, 0, 0, -68400, 'Comentario', '', '', 1, 21600, 1267173000, '1', 0, 'PEL', 1267811009, 0, 19, 1266513922, '', 0, 21588),
(15, 'PEL-14', 22, 12, 0, -68400, '', '', '12', 1, 21600, 1267259400, '1', 0, 'PEL', 1266518838, 0, 19, 1266518640, '', 0, 21600),
(16, 'PEL-15', 23, 434, NULL, NULL, NULL, NULL, '34', 1, 80920, 1267074000, '0', 0, 'PEL', NULL, 12920, 19, 1266703236, '', 0, 80920),
(17, 'PEL-16', 19, 12, NULL, NULL, NULL, NULL, 'w', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266703935, '', 0, 4800),
(18, 'PEL-17', 25, 12, NULL, NULL, NULL, NULL, '3wew', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266703972, '', 0, 4800),
(19, 'PEL-18', 0, 0, NULL, NULL, NULL, NULL, '', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266704105, '', 0, 4800),
(20, 'PEL-19', 0, 0, NULL, NULL, NULL, NULL, '', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266704243, '', 0, 4800),
(21, 'PEL-20', 25, 12, NULL, NULL, NULL, NULL, '12', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266704931, '', 0, 4800),
(22, 'PEL-21', 24, 12, NULL, NULL, NULL, NULL, '122', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266704986, '', 0, 4800),
(23, 'PEL-22', 18, 12, NULL, NULL, NULL, NULL, '67', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266705270, '', 0, 4800),
(24, 'PEL-23', 44, 12, NULL, NULL, NULL, NULL, '12', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266705451, '', 0, 4800),
(25, 'PEL-24', 49, 12, NULL, NULL, NULL, NULL, '', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266705584, '', 0, 4800),
(26, 'PEL-25', 33, 12, NULL, NULL, NULL, NULL, '', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266705699, '', 0, 4800),
(27, 'PEL-26', 41, 12, NULL, NULL, NULL, NULL, '12', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266705749, '', 0, 4800),
(28, 'PEL-27', 46, 3, NULL, NULL, NULL, NULL, '33', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266707034, '', 0, 4800),
(29, 'PEL-28', 49, 3, NULL, NULL, NULL, NULL, '', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266708770, '', 0, 4800),
(30, 'PEL-29', 42, 2, NULL, NULL, NULL, NULL, '22', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266710980, '', 0, 4800),
(31, 'PEL-30', 39, 2, NULL, NULL, NULL, NULL, '22', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266711068, '', 0, 4800),
(32, 'PEL-31', 37, 3, NULL, NULL, NULL, NULL, '', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266711185, '', 0, 4800),
(33, 'PEL-32', 48, 12, NULL, NULL, NULL, NULL, '12', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266711365, '', 0, 4800),
(34, 'PEL-33', 43, 5, NULL, NULL, NULL, NULL, '', 1, 4800, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266711462, '', 0, 4800),
(35, 'PEL-34', 36, 0, NULL, NULL, NULL, NULL, '', 1, 400, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266712103, '', 0, 400),
(36, 'PEL-35', 47, 0, NULL, NULL, NULL, NULL, '', 1, 400, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266712285, '', 0, 400),
(37, 'PEL-36', 0, 0, NULL, NULL, NULL, NULL, '', 1, 400, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266712439, '', 0, 400),
(38, 'PEL-37', 44, 8, NULL, NULL, NULL, NULL, '', 1, 400, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266712847, '', 0, 400),
(39, 'PEL-38', 32, 0, NULL, NULL, NULL, NULL, '', 1, 400, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266713015, '', 0, 400),
(40, 'PEL-39', 0, 0, NULL, NULL, NULL, NULL, '', 1, 400, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266713466, '', 0, 400),
(41, 'PEL-40', 0, 0, NULL, NULL, NULL, NULL, '', 1, 400, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266713475, '', 0, 400),
(42, 'PEL-41', 32, 1, NULL, NULL, NULL, NULL, '', 1, 400, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266713851, '', 0, 400),
(61, 'PEL-60', 127, 5, NULL, NULL, NULL, NULL, 'hj', 1, 2000, 1266642000, '0', 0, 'PEL', NULL, 0, 19, 1266783800, '', 0, 508),
(62, 'PEL-43', 17, 12, NULL, NULL, NULL, NULL, '', 1, 24000, 1269761400, '0', 0, 'PEL', NULL, 0, 10, 1267464363, '', 0, 24000),
(63, 'PEL-44', 32, 2, NULL, NULL, NULL, NULL, '3ew', 1, 2500, 1269761400, '0', 0, 'PEL', NULL, 0, 10, 1267464406, '', 0, 2500),
(64, 'PEL-45', 15, 1, NULL, NULL, NULL, NULL, '11', 1, 2500, 1269489600, '0', 0, 'PEL', NULL, 0, 19, 1267464594, '', 0, 2500),
(65, 'PEL-46', 43, 4, NULL, NULL, NULL, NULL, '34', 1, 2500, 1269489600, '0', 0, 'PEL', NULL, 0, 19, 1267464653, '', 0, 2500),
(66, 'PEL-47', 33, 1, NULL, NULL, NULL, NULL, '1', 1, 2500, 1269489600, '0', 0, 'PEL', NULL, 0, 19, 1267464665, '', 0, 2500),
(67, 'PEL-48', 45, 1, NULL, NULL, NULL, NULL, '44', 1, 2500, 1269489600, '0', 0, 'PEL', NULL, 0, 19, 1267464814, '', 0, 2500),
(68, 'PEL-49', 37, 1, NULL, NULL, NULL, NULL, '1', 1, 400, 1269489600, '0', 0, 'PEL', NULL, 0, 19, 1267465027, '', 0, 400),
(69, 'PEL-50', 42, 1, NULL, NULL, NULL, NULL, '11', 1, 400, 1269489600, '0', 0, 'PEL', NULL, 0, 19, 1267465225, '', 0, 400),
(70, 'PEL-51', 41, 8, NULL, NULL, NULL, NULL, '88', 1, 2300, 1269489600, '0', 0, 'PEL', NULL, 0, 19, 1267465384, '', 0, 2300),
(71, 'PEL-52', 43, 1, 0, -68400, '', 'MAria', 'ertwa', 1, 2300, 1269489600, '0', 0, 'PEL', 0, 0, 19, 1267465902, '', 0, 2300),
(72, 'PEL-53', 41, 2, NULL, NULL, NULL, NULL, '22', 1, 2300, 1269489600, '0', 0, 'PEL', NULL, 0, 19, 1267466539, '', 0, 2300),
(73, 'PEL-54', 32, 1, NULL, NULL, NULL, NULL, '', 1, 2300, 1269489600, '0', 0, 'PEL', NULL, 0, 19, 1267466610, '', 0, 2300),
(74, 'PEL-55', 40, 9, NULL, NULL, NULL, NULL, '', 1, 1800, 1269489600, '0', 0, 'PEL', NULL, 0, 19, 1267466653, '', 0, 1800),
(75, 'PEL-56', 5, 0, NULL, NULL, NULL, NULL, '', 1, 1800, 1269489600, '0', 0, 'PEL', NULL, 0, 19, 1267466693, '', 0, 1800),
(76, 'PEL-57', 36, 1, NULL, NULL, NULL, NULL, '1', 1, 2500, 1268472600, '0', 0, 'PEL', NULL, 0, 19, 1267468898, '', 0, 2500),
(77, 'PEL-58', 0, 0, NULL, NULL, NULL, NULL, '', 1, 2500, 1268472600, '0', 0, 'PEL', NULL, 0, 19, 1267468978, '', 0, 2500),
(78, 'PEL-59', 22, 1, 0, -68400, '', '', '11', 1, 200, 1268283600, '1', 0, 'PEL', 1267573914, 0, 19, 1267573898, '', 0, 0),
(79, 'PEL-60', 48, 1, NULL, NULL, NULL, NULL, '', 1, 200, 1268283600, '0', 0, 'PEL', NULL, 0, 19, 1267621797, '', 0, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `EmpCdg` char(2) collate latin1_general_ci NOT NULL default '',
  `SerCdg` varchar(5) collate latin1_general_ci NOT NULL,
  `SerDsc` varchar(50) collate latin1_general_ci default NULL,
  `SerDscAbr` varchar(20) collate latin1_general_ci default NULL,
  `SerPre` float default NULL,
  `SerAgeCdg` char(3) character set latin1 default NULL,
  `SerUsuAdd` char(4) character set latin1 default NULL,
  `SerFecAdd` bigint(10) default NULL,
  `SerUsuChg` char(4) character set latin1 default NULL,
  `SerFecChg` date default NULL,
  `SerTimChg` char(14) character set latin1 default NULL,
  `hotusuadd` char(4) character set latin1 default NULL,
  `hotfecadd` date default NULL,
  `hottimadd` varchar(14) character set latin1 default NULL,
  `levels_users` tinyint(4) default NULL,
  `tarif_cdg` varchar(5) character set latin1 default NULL,
  `active` varchar(1) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`EmpCdg`,`SerCdg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcar la base de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`EmpCdg`, `SerCdg`, `SerDsc`, `SerDscAbr`, `SerPre`, `SerAgeCdg`, `SerUsuAdd`, `SerFecAdd`, `SerUsuChg`, `SerFecChg`, `SerTimChg`, `hotusuadd`, `hotfecadd`, `hottimadd`, `levels_users`, `tarif_cdg`, `active`) VALUES
('', 'CORDB', 'Climbing Tours in the Cordillera Blanca ', NULL, NULL, NULL, NULL, 1265841404, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'CAT1', '1'),
('', 'EURO2', 'Europe in 21 Days', NULL, NULL, NULL, NULL, 1265841404, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'CAT2', '1'),
('', 'HIMAL', 'Himalaya Trekking ', NULL, NULL, NULL, NULL, 1265841404, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'CAT1', '1'),
('', 'MAC7', 'Machu Picchu Adventure 7d', NULL, NULL, NULL, NULL, 1265841404, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'CAT2', '1'),
('', 'NULO', 'Servicio Nulo', NULL, NULL, NULL, NULL, 1265838593, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'CAT1', '1'),
('', 'NULO2', 'nulo2', NULL, NULL, NULL, NULL, 1265857841, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'CAT1', '1'),
('', 'ROCAR', 'Rock Climbing Arizona', NULL, NULL, NULL, NULL, 1265841404, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'CAT1', '1'),
('', 'ROM7', 'Rome in 7 Days', NULL, NULL, NULL, NULL, 1265841404, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'CAT1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_variations`
--

CREATE TABLE `servicios_variations` (
  `kind` varchar(5) collate latin1_general_ci NOT NULL,
  `descript` varchar(50) collate latin1_general_ci default NULL,
  `active` varchar(1) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`kind`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='InnoDB free: 10240 kB';

--
-- Volcar la base de datos para la tabla `servicios_variations`
--

INSERT INTO `servicios_variations` (`kind`, `descript`, `active`) VALUES
('PRIV', 'Private', NULL),
('SHAR', 'Shared', NULL),
('VIP', 'Special Service', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serv_type_lang`
--

CREATE TABLE `serv_type_lang` (
  `id` int(11) NOT NULL auto_increment,
  `lang` varchar(5) character set latin1 collate latin1_general_ci default NULL,
  `SerCdg` varchar(5) character set latin1 collate latin1_general_ci default NULL,
  `tipe` varchar(5) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB' AUTO_INCREMENT=89 ;

--
-- Volcar la base de datos para la tabla `serv_type_lang`
--

INSERT INTO `serv_type_lang` (`id`, `lang`, `SerCdg`, `tipe`) VALUES
(20, 'es', 'HIMAL', 'PRIV'),
(21, 'fr', 'HIMAL', 'PRIV'),
(22, 'en', 'HIMAL', 'PRIV'),
(23, 'it', 'HIMAL', 'PRIV'),
(24, 'en', 'HIMAL', 'SHAR'),
(25, 'es', 'ROCAR', 'PRIV'),
(26, 'en', 'ROCAR', 'PRIV'),
(27, 'en', 'ROCAR', 'SHAR'),
(28, 'es', 'CORDB', 'SHAR'),
(29, 'en', 'CORDB', 'SHAR'),
(33, 'es', 'MAC7', 'PRIV'),
(34, 'fr', 'MAC7', 'PRIV'),
(35, 'en', 'MAC7', 'PRIV'),
(36, 'gm', 'MAC7', 'PRIV'),
(37, 'it', 'MAC7', 'PRIV'),
(38, 'br', 'MAC7', 'PRIV'),
(40, 'es', 'MAC7', 'SHAR'),
(41, 'en', 'MAC7', 'SHAR'),
(48, 'es', 'EURO2', 'PRIV'),
(49, 'fr', 'EURO2', 'PRIV'),
(50, 'en', 'EURO2', 'PRIV'),
(51, 'gm', 'EURO2', 'PRIV'),
(52, 'es', 'EURO2', 'SHAR'),
(53, 'en', 'EURO2', 'SHAR'),
(54, 'en', 'ROM7', 'VIP'),
(55, 'RUS', 'ROM7', 'VIP'),
(56, 'en', 'ROM7', 'SHAR'),
(80, 'es', 'NULO2', 'SHAR'),
(88, 'es', 'CORDB', 'PRIV');

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
(2, 'Climbing', 'CAT1'),
(3, 'Remote tours', 'CAT2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifasdetalle`
--

CREATE TABLE `tarifasdetalle` (
  `id` int(11) NOT NULL auto_increment,
  `SerCdg` varchar(10) character set latin1 collate latin1_general_ci NOT NULL,
  `AgeCdg` char(5) character set latin1 collate latin1_general_ci NOT NULL,
  `Rng` char(21) character set latin1 collate latin1_general_ci NOT NULL,
  `Pre` float default NULL,
  `FecIni` bigint(10) default NULL,
  `FecFin` bigint(10) default NULL,
  `UsuAdd` char(4) character set latin1 collate latin1_general_ci default NULL,
  `FecAdd` date default NULL,
  `TimAdd` char(14) character set latin1 collate latin1_general_ci default NULL,
  `UsuChg` char(4) character set latin1 collate latin1_general_ci default NULL,
  `FecChg` date default NULL,
  `TimChg` char(14) character set latin1 collate latin1_general_ci default NULL,
  `IPAdd` varchar(15) character set latin1 collate latin1_general_ci default NULL,
  `IPChg` varchar(15) character set latin1 collate latin1_general_ci default NULL,
  `NumLin` int(11) NOT NULL default '0',
  `PaxIni` int(11) NOT NULL default '0',
  `PaxFin` int(11) NOT NULL default '0',
  `EmpCdg` char(2) character set latin1 collate latin1_general_ci NOT NULL,
  `serv_type` varchar(6) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Volcar la base de datos para la tabla `tarifasdetalle`
--

INSERT INTO `tarifasdetalle` (`id`, `SerCdg`, `AgeCdg`, `Rng`, `Pre`, `FecIni`, `FecFin`, `UsuAdd`, `FecAdd`, `TimAdd`, `UsuChg`, `FecChg`, `TimChg`, `IPAdd`, `IPChg`, `NumLin`, `PaxIni`, `PaxFin`, `EmpCdg`, `serv_type`) VALUES
(28, 'RE', '', '', 23, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 2, '', 'SHAR'),
(31, '323', '', '', 34, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 2, '', 'SHAR'),
(32, '3', '', '', 34, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 2, '', 'PRIV'),
(33, '3', '', '', 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 2, '', 'UCS'),
(39, 'COL', '', '', 12, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '', 'PRIV'),
(40, 'COL', '', '', 11, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 111, '', 'PRIV'),
(41, 'COL', '', '', 6, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '', 'SHAR'),
(43, 'ASH', '', '', 123, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1000, '', 'SHAR'),
(44, 'ASH', '', '', 200, 1267074000, 1296882000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '', 'PRIV'),
(45, 'ASH', '', '', 150, 1267074000, 1296882000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 4, '', 'PRIV'),
(46, 'ASH', '', '', 120, 1267074000, 1296882000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, 100, '', 'PRIV'),
(55, 'HIMAL', '', '', 200, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '', 'PRIV'),
(56, 'HIMAL', '', '', 190, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 6, '', 'PRIV'),
(57, 'HIMAL', '', '', 180, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 7, 8, '', 'PRIV'),
(58, 'HIMAL', '', '', 170, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 9, 100, '', 'PRIV'),
(59, 'HIMAL', '', '', 110, 1266037200, 1298091600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 100, '', 'SHAR'),
(60, 'ROCAR', '', '', 400, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '', 'PRIV'),
(61, 'ROCAR', '', '', 380, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 3, '', 'PRIV'),
(62, 'ROCAR', '', '', 350, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, 8, '', 'PRIV'),
(63, 'ROCAR', '', '', 300, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 9, 100, '', 'PRIV'),
(64, 'ROCAR', '', '', 250, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 100, '', 'SHAR'),
(65, 'CORDB', '', '', 80, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 100, '', 'SHAR'),
(70, 'MAC7', '', '', 2500, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '', 'PRIV'),
(71, 'MAC7', '', '', 2200, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 4, '', 'PRIV'),
(72, 'MAC7', '', '', 2100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, 6, '', 'PRIV'),
(73, 'MAC7', '', '', 2000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 7, 100, '', 'PRIV'),
(74, 'MAC7', '', '', 400, 1267074000, 1328331600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 100, '', 'SHAR'),
(80, 'EURO2', '', '', 2300, 1266382800, 1297573200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '', 'PRIV'),
(81, 'EURO2', '', '', 2100, 1266382800, 1297573200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, 4, '', 'PRIV'),
(82, 'EURO2', '', '', 2000, 1266382800, 1297573200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, 6, '', 'PRIV'),
(83, 'EURO2', '', '', 1800, 1266382800, 1297573200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 7, 1000, '', 'PRIV'),
(84, 'EURO2', '', '', 1800, 1267160400, 1298696400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1000, '', 'SHAR'),
(85, 'ROM7', '', '', 600, 1266987600, 1329627600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '', 'PRIV'),
(86, 'ROM7', '', '', 500, 1266987600, 1329627600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 4, '', 'PRIV'),
(87, 'ROM7', '', '', 400, 1266987600, 1329627600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, 1000, '', 'PRIV'),
(88, 'ROM7', '', '', 450, 1266555600, 1297573200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 100, '', 'VIP'),
(89, 'ROM7', '', '', 420, 1361682000, 1360472400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1000, '', 'SHAR'),
(92, 'NULO2', 'COT', '', 89, -68400, -68400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1000, '', 'SHAR'),
(102, 'NULO2', '', '', 12, -68400, -68400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 2, '', 'SHAR'),
(107, 'CORDB', '', '', 150, -68400, -68400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '', 'PRIV'),
(108, 'CORDB', '', '', 130, -68400, -68400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 4, '', 'PRIV'),
(109, 'CORDB', '', '', 120, -68400, -68400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, 6, '', 'PRIV'),
(110, 'CORDB', '', '', 110, -68400, -68400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 7, 100, '', 'PRIV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets_atach`
--

CREATE TABLE `tickets_atach` (
  `tickets_id` int(10) unsigned NOT NULL default '0',
  `atachmen` varchar(100) default '',
  `archi` mediumblob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `tickets_atach`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets_categories`
--

CREATE TABLE `tickets_categories` (
  `tickets_categories_id` smallint(10) unsigned NOT NULL auto_increment,
  `tickets_categories_name` varchar(20) character set latin1 collate latin1_general_ci NOT NULL,
  `tickets_categories_order` tinyint(3) unsigned NOT NULL default '1',
  `email` varchar(100) character set latin1 collate latin1_general_ci default NULL,
  `password` varchar(30) default NULL,
  `epiping` varchar(1) character set latin1 collate latin1_general_ci default NULL,
  `emailpiping` varchar(100) character set latin7 default NULL,
  `maxfile` int(6) default NULL,
  `sms` varchar(15) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`tickets_categories_id`),
  UNIQUE KEY `tickets_categories_name` (`tickets_categories_name`),
  KEY `tickets_categories_order` (`tickets_categories_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `tickets_categories`
--

INSERT INTO `tickets_categories` (`tickets_categories_id`, `tickets_categories_name`, `tickets_categories_order`, `email`, `password`, `epiping`, `emailpiping`, `maxfile`, `sms`) VALUES
(1, 'General Support', 1, '', NULL, NULL, NULL, NULL, NULL),
(3, 'aaaaaaaaaa', 1, 'wwwwwwwwwww', 'dsd', '', 'dsds', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets_levels`
--

CREATE TABLE `tickets_levels` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `name` varchar(20) character set latin1 collate latin1_general_ci NOT NULL,
  `order` tinyint(3) unsigned NOT NULL default '1',
  `color` varchar(6) character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `tickets_status_name` (`name`),
  KEY `tickets_status_order` (`order`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `tickets_levels`
--

INSERT INTO `tickets_levels` (`id`, `name`, `order`, `color`) VALUES
(1, 'Low', 1, '00CCFF'),
(2, 'Medium', 2, '0000FF'),
(3, 'Urgent', 3, 'FF9900'),
(4, 'Critical', 4, '33FF33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets_state`
--

CREATE TABLE `tickets_state` (
  `id` int(11) default NULL,
  `closed_by` varchar(16) character set latin1 collate latin1_general_ci default NULL,
  `opened_by` varchar(16) character set latin1 collate latin1_general_ci default NULL,
  `hold_by` varchar(16) character set latin1 collate latin1_general_ci default NULL,
  `tickets_status` char(1) character set koi8u default '1',
  `assigned` varchar(1) character set latin1 collate latin1_general_ci default NULL,
  `assigned_to` varchar(20) character set latin1 collate latin1_general_ci default NULL,
  `keyview` varchar(6) character set latin1 collate latin1_general_ci default NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `tickets_state`
--

INSERT INTO `tickets_state` (`id`, `closed_by`, `opened_by`, `hold_by`, `tickets_status`, `assigned`, `assigned_to`, `keyview`) VALUES
(26, NULL, NULL, NULL, '1', NULL, NULL, NULL),
(27, NULL, 'admin', NULL, '1', NULL, NULL, NULL),
(28, NULL, 'admin', '', '1', NULL, NULL, NULL),
(32, 'admin', 'admin', NULL, '0', NULL, NULL, NULL),
(36, NULL, 'admin', NULL, '1', NULL, NULL, NULL),
(38, NULL, 'admin', 'admin', '2', NULL, NULL, NULL),
(41, NULL, NULL, NULL, '1', NULL, NULL, NULL),
(0, NULL, NULL, NULL, '1', NULL, NULL, NULL),
(47, NULL, NULL, NULL, '1', NULL, NULL, NULL),
(48, NULL, NULL, NULL, '1', NULL, NULL, NULL),
(1, NULL, 'admin', NULL, '1', NULL, NULL, NULL),
(6, NULL, NULL, NULL, '0', NULL, NULL, NULL),
(8, NULL, NULL, NULL, '1', NULL, NULL, NULL),
(9, NULL, NULL, NULL, '1', NULL, NULL, NULL),
(10, NULL, NULL, NULL, '1', NULL, NULL, NULL),
(11, NULL, 'admin', NULL, '1', '1', 'admin', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets_tickets`
--

CREATE TABLE `tickets_tickets` (
  `tickets_id` int(10) unsigned NOT NULL auto_increment,
  `tickets_username` varchar(16) character set latin1 collate latin1_general_ci NOT NULL,
  `tickets_subject` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  `tickets_timestamp` bigint(10) unsigned NOT NULL default '0',
  `tickets_name` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  `tickets_email` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  `tickets_urgency` tinyint(3) unsigned NOT NULL default '1',
  `tickets_category` tinyint(3) unsigned NOT NULL default '1',
  `tickets_admin` varchar(20) character set latin1 collate latin1_general_ci NOT NULL default 'Client',
  `tickets_child` int(10) unsigned NOT NULL default '0',
  `tickets_question` text character set latin1 collate latin1_general_ci NOT NULL,
  `unread_admin` tinyint(2) default '1',
  `unread_user` tinyint(2) default NULL,
  `previous` bigint(10) default NULL,
  `eta` bigint(10) default NULL,
  `reserved` varchar(1) character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`tickets_id`),
  KEY `tickets_username` (`tickets_username`),
  KEY `tickets_urgency` (`tickets_urgency`),
  KEY `tickets_category` (`tickets_category`),
  KEY `tickets_child` (`tickets_child`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `tickets_tickets`
--

INSERT INTO `tickets_tickets` (`tickets_id`, `tickets_username`, `tickets_subject`, `tickets_timestamp`, `tickets_name`, `tickets_email`, `tickets_urgency`, `tickets_category`, `tickets_admin`, `tickets_child`, `tickets_question`, `unread_admin`, `unread_user`, `previous`, `eta`, `reserved`) VALUES
(1, 'aa', 'dddd', 1267805573, 'aa', 'aa@esto.com', 1, 1, 'aa', 0, 'fdfdddd', 0, 1, NULL, NULL, ''),
(2, 'aa', 'dddd', 1267805922, 'aa', 'aa@esto.com', 1, 1, 'aa', 1, 'Yo me respondo.', 1, NULL, NULL, NULL, ''),
(3, 'aa', 'dddd', 1267806009, '', 'aa@esto.com', 1, 1, 'admin', 1, 'Yo como admin te respondo.<BR>', 1, NULL, 1267805922, 0, ''),
(4, 'aa', 'dddd', 1267806184, '', 'aa@esto.com', 1, 1, 'admin', 1, 'sssssssssssss<BR>', 1, NULL, 1267805922, 0, ''),
(5, 'dd', 'prueba', 1267806237, '', 'dd@dd.com', 1, 3, 'admin', 0, 'Holaaaaa<BR>', 1, NULL, 0, 0, ''),
(6, 'dd', 'dsds', 1267806305, '', 'dd@dd.com', 1, 3, 'admin', 0, 'dsdsd<BR>', 1, 0, 0, 0, ''),
(7, 'dd', 'dsds', 1267806327, '', 'dd@dd.com', 1, 3, 'dd', 6, 'ssssssssssssssssssssssss', 1, NULL, NULL, NULL, ''),
(8, 'dd', 'd', 1267806341, 'dd', 'dd@dd.com', 1, 0, 'dd', 0, 'dddddddddddddddddddd', 1, NULL, NULL, NULL, ''),
(9, 'dd', 'mmm', 1267806475, 'dd', 'dd@dd.com', 1, 1, 'dd', 0, 'xññññññññññññññññ', 1, NULL, NULL, NULL, ''),
(10, 'dd', 'cccccccccccccccccc', 1267806524, 'dd', 'dd@dd.com', 1, 1, 'dd', 0, 'ccccccccccccccccccccccc', 1, NULL, NULL, NULL, ''),
(11, 'dd', 'xxxxxxxxxxx', 1267806533, 'dd', 'dd@dd.com', 1, 1, 'dd', 0, 'xxxxxxxxxxxxxx', 0, 1, NULL, NULL, ''),
(12, 'dd', 'xxxxxxxxxxx', 1267806566, '', 'dd@dd.com', 1, 1, 'admin', 11, 'Que deseas?<BR>', 1, NULL, 1267806533, 0, ''),
(13, 'dd', 'xxxxxxxxxxx', 1267807012, '', 'dd@dd.com', 1, 1, 'admin', 11, 'rrrrrrrrrrr<BR>', 1, NULL, 1267806533, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tracking`
--

CREATE TABLE `tracking` (
  `id` bigint(20) NOT NULL auto_increment,
  `ticket_id` bigint(20) default NULL,
  `staff` varchar(16) default NULL,
  `action` varchar(40) default NULL,
  `tdate` int(10) unsigned default NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcar la base de datos para la tabla `tracking`
--

INSERT INTO `tracking` (`id`, `ticket_id`, `staff`, `action`, `tdate`) VALUES
(1, 0, 'admin', 'Answer', 1267804292),
(2, 1, 'admin', 'Open', 1267805997),
(3, 1, 'admin', 'Answer', 1267806009),
(4, 1, 'admin', 'Open', 1267806180),
(5, 1, 'admin', 'Answer', 1267806184),
(6, 0, 'admin', 'Answer', 1267806237),
(7, 0, 'admin', 'Answer', 1267806305),
(8, 11, 'admin', 'Open', 1267806560),
(9, 11, 'admin', 'Answer', 1267806566),
(10, 11, 'admin', 'Open', 1267806568),
(11, 11, 'admin', 'Open', 1267806571),
(12, 11, 'admin', 'Open', 1267806576),
(13, 11, 'admin', 'Open', 1267806579),
(14, 11, 'admin', 'Open', 1267806581),
(15, 11, 'admin', 'Open', 1267807007),
(16, 11, 'admin', 'Answer', 1267807012);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_lang`
--

CREATE TABLE `type_lang` (
  `id` int(11) NOT NULL auto_increment,
  `lang` varchar(5) character set latin1 collate latin1_general_ci default NULL,
  `tipe` varchar(5) character set latin1 collate latin1_general_ci default NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `lang` (`lang`,`tipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB' AUTO_INCREMENT=27 ;

--
-- Volcar la base de datos para la tabla `type_lang`
--

INSERT INTO `type_lang` (`id`, `lang`, `tipe`) VALUES
(22, 'br', 'PRIV'),
(19, 'en', 'PRIV'),
(16, 'en', 'SHAR'),
(25, 'en', 'VIP'),
(17, 'es', 'PRIV'),
(15, 'es', 'SHAR'),
(18, 'fr', 'PRIV'),
(20, 'gm', 'PRIV'),
(21, 'it', 'PRIV'),
(23, 'RUS', 'PRIV'),
(26, 'RUS', 'VIP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  `username` varchar(16) character set latin1 collate latin1_general_ci NOT NULL,
  `password` varchar(16) character set latin1 collate latin1_general_ci NOT NULL,
  `email` varchar(100) character set latin1 collate latin1_general_ci NOT NULL,
  `lastlogin` bigint(10) default NULL,
  `newlogin` bigint(10) default NULL,
  `admin` varchar(5) character set latin1 collate latin1_general_ci NOT NULL,
  `status` tinyint(1) unsigned NOT NULL default '0',
  `added` bigint(10) default NULL,
  `comments` text character set latin1 collate latin1_general_ci,
  `company` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `website` varchar(70) character set latin1 collate latin1_general_ci default NULL,
  `privileges` smallint(6) default NULL,
  `AgeCdg` varchar(10) character set latin1 collate latin1_general_ci NOT NULL,
  `template` varchar(5) character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `tickets_users_admin` (`admin`),
  KEY `tickets_users_status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `lastlogin`, `newlogin`, `admin`, `status`, `added`, `comments`, `company`, `website`, `privileges`, `AgeCdg`, `template`) VALUES
(10, 'aa', 'aa', 'aa', 'aa@aa.com', 1267810904, NULL, 'User', 1, 1262304209, NULL, NULL, 'aa', NULL, 'PEL', ''),
(11, 'cc el usuario banda v', 'cc', 'cc', 'cc@algo.com', 1267814159, NULL, 'Mod', 1, 1262649735, NULL, 'la compañiadzzz', 'cc', NULL, 'ZZZ', ''),
(20, 'este', 'este', '2020', 'este@algo.com', NULL, NULL, 'User', 1, 1265241295, NULL, NULL, NULL, NULL, '-1', ''),
(17, 'dd', 'dd', 'dd', 'dd@dd.com', 1267806550, NULL, 'User', 1, 1263175052, NULL, NULL, 'dd', NULL, 'KTK', ''),
(19, 'The Administrator', 'admin', 'admindemo', 'mimail@este.com', 1283546861, NULL, 'Admin', 1, NULL, NULL, NULL, NULL, NULL, 'PEL', ''),
(21, 'bbbb', 'bbbb', 'bbbb', 'bb@ddd.com', NULL, NULL, 'User', 1, 1265241480, NULL, NULL, NULL, NULL, '-1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_staff`
--

CREATE TABLE `users_staff` (
  `user` int(11) default NULL,
  `departament` tinyint(4) default NULL,
  `departament_visible` tinyint(4) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `users_staff`
--

INSERT INTO `users_staff` (`user`, `departament`, `departament_visible`) VALUES
(15, 1, 1),
(19, 1, 1),
(19, 3, 3);
