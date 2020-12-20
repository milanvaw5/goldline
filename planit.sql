-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: ID281871_main.db.webhosting.be
-- Generation Time: Dec 02, 2019 at 04:17 AM
-- Server version: 5.7.28-31
-- PHP Version: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ID281871_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `dev3_planit_artworkTypes`
--

CREATE TABLE `dev3_planit_artworkTypes` (
  `artworkTypeID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev3_planit_artworkTypes`
--

INSERT INTO `dev3_planit_artworkTypes` (`artworkTypeID`, `type`, `description`) VALUES
(1, 'Digital', 'Digital artwork made on a computer or tablet'),
(2, 'Sketch', 'Drawing or illustration with the hand'),
(3, 'Painting', 'Drawing finished with paint.'),
(4, 'Other', 'Sculpture, ...');

-- --------------------------------------------------------

--
-- Table structure for table `dev3_planit_colors`
--

CREATE TABLE `dev3_planit_colors` (
  `colorID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `hex` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev3_planit_colors`
--

INSERT INTO `dev3_planit_colors` (`colorID`, `name`, `hex`) VALUES
(1, 'Red berries', ' #e74c3c'),
(2, 'Orange lemon', ' #e67e22'),
(3, 'Bright Sun', '#f4d03f'),
(4, 'Turquoise Blue', ' #58d68d '),
(5, 'Ocean love', '#1abc9c'),
(6, 'Jeans blue', ' #5dade2 '),
(7, 'Ultramarine', '#2980b9'),
(8, 'Violette', '#884ea0'),
(9, 'Purple heart', '#7d3c98'),
(10, 'Thunderbird', ' #2c3e50 '),
(11, 'Shamrock', '#2e4053'),
(12, 'Old grey', ' #707b7c'),
(13, 'Humming Bird', ' #839192 '),
(14, 'Grey day', ' #bdc3c7 '),
(15, 'Dark night', ' #000000');

-- --------------------------------------------------------

--
-- Table structure for table `dev3_planit_colorsPerCommission`
--

CREATE TABLE `dev3_planit_colorsPerCommission` (
  `ID` int(11) NOT NULL,
  `commissionID` int(11) NOT NULL,
  `colorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev3_planit_colorsPerCommission`
--

INSERT INTO `dev3_planit_colorsPerCommission` (`ID`, `commissionID`, `colorID`) VALUES
(1, 2, 15),
(2, 2, 13),
(3, 2, 6),
(4, 2, 8),
(5, 2, 2),
(41, 2, 5),
(43, 4, 10),
(44, 5, 10),
(45, 5, 1),
(83, 20, 4),
(84, 20, 5),
(85, 26, 1),
(86, 26, 2),
(87, 26, 3),
(88, 26, 4),
(89, 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `dev3_planit_commissions`
--

CREATE TABLE `dev3_planit_commissions` (
  `commissionID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `company` varchar(80) NOT NULL,
  `street` varchar(95) NOT NULL,
  `housenumber` varchar(15) NOT NULL,
  `bus` varchar(10) NOT NULL,
  `postal` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `mail` varchar(65) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `project` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `deadline` datetime NOT NULL,
  `workhours` int(11) NOT NULL,
  `insurance` tinyint(1) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev3_planit_commissions`
--

INSERT INTO `dev3_planit_commissions` (`commissionID`, `name`, `surname`, `company`, `street`, `housenumber`, `bus`, `postal`, `city`, `country`, `mail`, `phone`, `project`, `type`, `description`, `deadline`, `workhours`, `insurance`, `completed`, `datecreated`) VALUES
(2, 'Jonathan', 'Unferaldus', 'Golden apple', 'richstreet', '32', 'A', '8500', 'Kortrijk', 'Belgium', 'jonathan@goldenapple.lx', '2154325322', 'Project apples', 2, 'Make me a gigantic golden apple. The minimum hight has to be 10 meters. I will accept nothing less than 24 karate gold', '2020-01-08 00:11:00', 249, 0, 1, '2019-11-25 20:17:30'),
(3, 'Milan', 'Dollons', 'Robin', 'Toekomststraat', '29', '', '9700', 'Gent', 'United States', 'milan191955@hotmail.com', '0470554715', 'Screensaver Mouse', 1, 'Digitale illustraties van familie muisjes die boven en onder de grond leven. Voor in kinderboek', '2019-11-27 17:20:00', 23, 0, 0, '2019-11-26 11:48:47'),
(4, 'Mark', 'Timmers', 'BD-a', 'Downfleet', '3562', '26B', '349039', 'Derby', 'United States', 'Mark.BDa@gmail.com', '039202940212', 'Phone cover-Monster', 3, 'A painting of monsters to print on a phone cover\r\nsize\'s:\r\niphone 6/7/10/X,\r\nandroid,\r\nOne +,\r\nSee trough case. This case has to be magnificent', '2019-12-12 00:00:00', 48, 1, 1, '2019-11-27 15:12:29'),
(5, 'Von lichtensteinn', 'Rudjeski', 'Duchenki', 'Revienaira', '54', 'B', '9442234CE', 'Noriambaru', 'Luxembourg', 'Reduvan.lichtenstein@duchen.lx', '+3533435532', 'Duchenkaria von valla', 3, 'Dis vulputate consectetur augue. Fusce congue dapibus nunc. Mauris vel iaculis urna, eu viverra nulla. Nulla faucibus vitae massa vitae venenatis. Sed sed finibus nunc, sit amet dignissim odio. Praesent volutpat maximus mauris in ullamcorper. Praesent odio risus, scelerisque at bibendum at, consectetur quis urna. In ut auctor eros. Praesent condimentum nisl ac ex hendrerit, rutrum egestas justo hendrerit.', '2020-11-14 12:20:00', 21, 0, 0, '2019-11-29 16:23:08'),
(20, 'Hendricks', 'Rick', 'R&M', 'Tulpenlaan', '498', '', '5030', 'Rotterdam', 'Netherlands', 'Rick.H@gmail.com', '067945069', 'tv-show poster', 2, 'An poster for my tv-show, cartoon style, bright colors, surrealism, fantasy, humor,... ', '2019-12-02 21:03:00', 45, 1, 0, '2019-11-30 22:07:32'),
(25, 'Thomas', 'Fredericks', 'GB', 'Fortstreet', '309', 'c', '5000', 'Antwerp', 'Belgium', 'fredericksThomas@gmail.com', '059493920', 'GB flyers', 1, 'Flyers for my company, promotion, products, prices display, new slogan. Work with images.', '2019-12-04 16:54:00', 66, 1, 0, '2019-12-01 17:57:20'),
(26, 'jonahtan', 'van esster', 'onver bvba', 'arboretumstraat', '40', '', '9890', 'gavere', 'belgie', 'jonahtan.van.esster@gmail.com', '04757850', 'kelgos disg', 2, 'design sketch for on the new box, create an character, give it an personality. It has to match honey rice puffs. And Honey flakes.', '2020-06-08 11:50:00', 30, 1, 0, '2019-12-01 21:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `dev3_planit_deliveriesPerCommission`
--

CREATE TABLE `dev3_planit_deliveriesPerCommission` (
  `ID` int(11) NOT NULL,
  `commissionID` int(11) NOT NULL,
  `deliveryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev3_planit_deliveriesPerCommission`
--

INSERT INTO `dev3_planit_deliveriesPerCommission` (`ID`, `commissionID`, `deliveryID`) VALUES
(21, 2, 1),
(22, 2, 2),
(24, 4, 3),
(25, 4, 1),
(27, 5, 2),
(28, 5, 1),
(29, 5, 3),
(40, 20, 2),
(41, 26, 3),
(42, 3, 2),
(43, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dev3_planit_deliveryTypes`
--

CREATE TABLE `dev3_planit_deliveryTypes` (
  `deliveryID` int(11) NOT NULL,
  `deliveryType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev3_planit_deliveryTypes`
--

INSERT INTO `dev3_planit_deliveryTypes` (`deliveryID`, `deliveryType`) VALUES
(1, 'postal'),
(2, 'e-mail'),
(3, 'in person');

-- --------------------------------------------------------

--
-- Table structure for table `dev3_planit_materials`
--

CREATE TABLE `dev3_planit_materials` (
  `materialID` int(11) NOT NULL,
  `material` varchar(200) NOT NULL,
  `img` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev3_planit_materials`
--

INSERT INTO `dev3_planit_materials` (`materialID`, `material`, `img`, `description`) VALUES
(1, 'Pink marble', 'marble.jpg', 'Pink Marble is a kind of pink marble quarried in Brazil. ... It also called Blue Sky Marble . Sky Blue Marble can be processed into Polished, Sawn Cut, Sanded, Rockfaced, Sandblasted, Tumbled and so on.'),
(2, 'Amethyst', 'amethyst.jpg', 'Amethyst is a purple variety of quartz (SiO2) and owes its violet color to irradiation,'),
(3, 'Radium', 'radium.jpg', 'Radium is a beautiful fluorescent metal'),
(4, 'Pen', 'pen.jpg', 'Just plain pens'),
(5, 'Pencils', 'pencils.jpg', 'Plain pencils'),
(6, 'Water paint (EU)', 'waterpaint.jpg', 'Eastern style waterpaint'),
(7, 'Water paint Chinese', 'waterpaintchinese.jpg', 'Traditional Chinese water paint'),
(8, 'Digital freestyle', 'dfreestyle.jpg', 'Freestyle computer drawing'),
(9, 'Digital vector', 'dvector.jpg', 'A digital vector on the pc'),
(10, 'Granite', 'granite.jpg', 'Granite is a common type of felsic intrusive igneous rock that is granular and phaneritic in texture. Granites can be predominantly white, pink, or gray in color, depending on their mineralogy.');

-- --------------------------------------------------------

--
-- Table structure for table `dev3_planit_materialsPerCommission`
--

CREATE TABLE `dev3_planit_materialsPerCommission` (
  `ID` int(11) NOT NULL,
  `commissionID` int(11) NOT NULL,
  `materialID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev3_planit_materialsPerCommission`
--

INSERT INTO `dev3_planit_materialsPerCommission` (`ID`, `commissionID`, `materialID`) VALUES
(46, 2, 8),
(49, 4, 4),
(50, 5, 5),
(51, 5, 4),
(69, 20, 4),
(70, 20, 5),
(71, 20, 8),
(72, 20, 10),
(73, 26, 5),
(74, 3, 6),
(75, 3, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dev3_planit_artworkTypes`
--
ALTER TABLE `dev3_planit_artworkTypes`
  ADD PRIMARY KEY (`artworkTypeID`);

--
-- Indexes for table `dev3_planit_colors`
--
ALTER TABLE `dev3_planit_colors`
  ADD PRIMARY KEY (`colorID`);

--
-- Indexes for table `dev3_planit_colorsPerCommission`
--
ALTER TABLE `dev3_planit_colorsPerCommission`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `commissionID` (`commissionID`),
  ADD KEY `colorID` (`colorID`);

--
-- Indexes for table `dev3_planit_commissions`
--
ALTER TABLE `dev3_planit_commissions`
  ADD PRIMARY KEY (`commissionID`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `dev3_planit_deliveriesPerCommission`
--
ALTER TABLE `dev3_planit_deliveriesPerCommission`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `deliveryID` (`deliveryID`),
  ADD KEY `commissionID` (`commissionID`);

--
-- Indexes for table `dev3_planit_deliveryTypes`
--
ALTER TABLE `dev3_planit_deliveryTypes`
  ADD PRIMARY KEY (`deliveryID`);

--
-- Indexes for table `dev3_planit_materials`
--
ALTER TABLE `dev3_planit_materials`
  ADD PRIMARY KEY (`materialID`);

--
-- Indexes for table `dev3_planit_materialsPerCommission`
--
ALTER TABLE `dev3_planit_materialsPerCommission`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `commissions to commissionID` (`commissionID`),
  ADD KEY `materials to materialID` (`materialID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dev3_planit_artworkTypes`
--
ALTER TABLE `dev3_planit_artworkTypes`
  MODIFY `artworkTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dev3_planit_colors`
--
ALTER TABLE `dev3_planit_colors`
  MODIFY `colorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `dev3_planit_colorsPerCommission`
--
ALTER TABLE `dev3_planit_colorsPerCommission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `dev3_planit_commissions`
--
ALTER TABLE `dev3_planit_commissions`
  MODIFY `commissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `dev3_planit_deliveriesPerCommission`
--
ALTER TABLE `dev3_planit_deliveriesPerCommission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `dev3_planit_deliveryTypes`
--
ALTER TABLE `dev3_planit_deliveryTypes`
  MODIFY `deliveryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dev3_planit_materials`
--
ALTER TABLE `dev3_planit_materials`
  MODIFY `materialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dev3_planit_materialsPerCommission`
--
ALTER TABLE `dev3_planit_materialsPerCommission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dev3_planit_colorsPerCommission`
--
ALTER TABLE `dev3_planit_colorsPerCommission`
  ADD CONSTRAINT `color to colorID` FOREIGN KEY (`colorID`) REFERENCES `dev3_planit_colors` (`colorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dev3_planit_colorsPerCommission_ibfk_1` FOREIGN KEY (`commissionID`) REFERENCES `dev3_planit_commissions` (`commissionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dev3_planit_commissions`
--
ALTER TABLE `dev3_planit_commissions`
  ADD CONSTRAINT `type to Artworktype` FOREIGN KEY (`type`) REFERENCES `dev3_planit_artworkTypes` (`artworkTypeID`) ON UPDATE CASCADE;

--
-- Constraints for table `dev3_planit_deliveriesPerCommission`
--
ALTER TABLE `dev3_planit_deliveriesPerCommission`
  ADD CONSTRAINT `to commissionID` FOREIGN KEY (`commissionID`) REFERENCES `dev3_planit_commissions` (`commissionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `to deliveryID` FOREIGN KEY (`deliveryID`) REFERENCES `dev3_planit_deliveryTypes` (`deliveryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dev3_planit_materialsPerCommission`
--
ALTER TABLE `dev3_planit_materialsPerCommission`
  ADD CONSTRAINT `commissions to commissionID` FOREIGN KEY (`commissionID`) REFERENCES `dev3_planit_commissions` (`commissionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materials to materialID` FOREIGN KEY (`materialID`) REFERENCES `dev3_planit_materials` (`materialID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
