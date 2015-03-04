-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2015 at 03:24 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comp4711assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `Adimages`
--

CREATE TABLE IF NOT EXISTS `Adimages` (
`ID` int(11) NOT NULL,
  `adID` int(11) NOT NULL,
  `imageID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Adimages`
--

INSERT INTO `Adimages` (`ID`, `adID`, `imageID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 2),
(6, 3, 3),
(7, 4, 4),
(8, 5, 5),
(9, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Ads`
--

CREATE TABLE IF NOT EXISTS `Ads` (
`ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `uploaded` date NOT NULL,
  `price` double NOT NULL,
  `flags` int(11) NOT NULL,
  `description` text NOT NULL,
  `categoryID` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ads`
--

INSERT INTO `Ads` (`ID`, `userID`, `uploaded`, `price`, `flags`, `description`, `categoryID`, `title`) VALUES
(1, 7, '2014-08-08', 0, 0, 'Can fit up to 4 human-sized dogs.', 1, 'Dog House'),
(2, 8, '2014-08-08', 0, 0, 'The cake from portal.', 2, 'Portal Cake'),
(3, 9, '2014-08-08', 0, 0, 'Great item to have for camping.', 3, 'Tent'),
(4, 10, '2014-08-08', 0, 0, 'I am not liable for anything you do with this.', 4, 'Blunt Weapon'),
(5, 11, '2014-08-08', 0, 0, 'Can travel through time.', 5, 'Time Machine'),
(6, 12, '2014-08-08', 0, 0, 'Lets you see far things like they''re close by', 6, 'Trinoculars');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
`ID` int(11) NOT NULL,
  `parentCategoryID` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`ID`, `parentCategoryID`, `name`) VALUES
(1, 0, 'Pets'),
(2, 0, 'Electronics'),
(3, 0, 'Kitchen'),
(4, 0, 'Stationary'),
(5, 0, 'Toiletries'),
(6, 0, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `Images`
--

CREATE TABLE IF NOT EXISTS `Images` (
`ID` int(11) NOT NULL,
  `alt` text NOT NULL,
  `src` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Images`
--

INSERT INTO `Images` (`ID`, `alt`, `src`) VALUES
(1, 'alternate text for image 1', 'cabin.png'),
(2, 'alternate text for image 2', 'cake.png'),
(3, 'alternate text for image 3', 'circus.png'),
(4, 'alternate text for image 4', 'game.png'),
(5, 'alternate text for image 5', 'safe.png'),
(6, 'alternate text for image 6', 'submarine.png');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
`ID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `displayname` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `type`, `username`, `password`, `email`, `displayname`) VALUES
(7, 1, 'Bob Monkhouse', 'p@$sw0rD', 'bob@bcit.ca', 'Bob Monkhouse'),
(8, 0, 'Elayne Boosler', 'p@$sw0rD', 'elayne@bcit.ca', 'Elayne Boosler'),
(9, 0, 'Mark Russell', 'p@$sw0rD', 'mark@bcit.ca', 'Mark Russell'),
(10, 0, 'Anonymous', 'p@$sw0rD', 'anonymous@bcit.ca', 'Anonymous'),
(11, 0, 'Socrates', 'p@$sw0rD', 'socrates@bcit.ca', 'Socrates'),
(12, 0, 'Isaac Asimov', 'p@$sw0rD', 'isaac@bcit.ca', 'Isaac Asimov');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Adimages`
--
ALTER TABLE `Adimages`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Ads`
--
ALTER TABLE `Ads`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Images`
--
ALTER TABLE `Images`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Adimages`
--
ALTER TABLE `Adimages`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Ads`
--
ALTER TABLE `Ads`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Images`
--
ALTER TABLE `Images`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
