CREATE TABLE IF NOT EXISTS `people` (
	`Id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`FirstName` VARCHAR(50) NOT NULL,
	`LastName` VARCHAR(70) NOT NULL,
	`BirthDate` DATE NOT NULL,
	`Gender` ENUM('m', 'f'),
	`Done` TINYINT NOT NULL DEFAULT '0',
	PRIMARY KEY (`Id`)
);

INSERT INTO `people` VALUES
('', 'Jill', 'Trust', '1980-12-12', 'f', '50'),
('', 'Trevor', 'Doug', '1980-06-21', 'm', '94'),
('', 'Stacy', 'Elis', '1980-01-24', 'm', '23'),
('', 'Phil', 'Tip', '1999-12-04', 'f', '63'),
('', 'Stark', 'Qwest', '1989-08-01', 'f', '70'),
('', 'Ian', 'Bob', '1989-08-01', 'f', '89'),
('', 'Tom', 'Steph', '1908-12-25', 'm', '1'),
('', 'Chris', 'Rich', '2003-09-03', 'f', '33');