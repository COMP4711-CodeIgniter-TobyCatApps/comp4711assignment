-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2015 at 09:20 AM
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
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
`ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `uploaded` text NOT NULL,
  `price` double NOT NULL,
  `flags` int(11) NOT NULL,
  `description` text NOT NULL,
  `categoryID` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ID`, `userID`, `uploaded`, `price`, `flags`, `description`, `categoryID`, `title`) VALUES
(1, 7, '2014-08-08', 0, 0, 'Can fit up to 4 human-sized dogs.', 1, 'Dog House'),
(2, 8, '2014-08-08', 0, 0, 'The cake from portal.', 2, 'Portal Cake'),
(3, 9, '2014-08-08', 0, 0, 'Great item to have for camping.', 3, 'Tent'),
(4, 10, '2014-08-08', 0, 0, 'I am not liable for anything you do with this.', 4, 'Blunt Weapon'),
(5, 11, '2014-08-08', 0, 0, 'Can travel through time.', 5, 'Time Machine'),
(6, 12, '2014-08-08', 0, 0, 'Lets you see far things like they''re close by', 6, 'Trinoculars'),
(7, 11, '2015-03-08', 9000, 0, '<p>the best food you can get!</p>', 1, 'Jim''s Joint'),
(8, 11, '2015-03-08', 9000, 0, '<p>the best food you can get!</p>', 1, 'Jim''s Joint'),
(9, 11, '2015-03-08', 9000, 0, '<p>the best food you can get!</p>', 1, 'Jim''s Joint'),
(10, 11, '2015-03-08', 9000, 0, '<p>the best food you can get!</p>', 1, 'Jim''s Joint'),
(11, 11, '2015-03-08', 9000, 0, '<p>the best food you can get!</p>', 1, 'Jim''s Joint');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`ID` int(11) NOT NULL,
  `parentCategoryID` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `parentCategoryID`, `name`) VALUES
(1, 0, 'Pets'),
(2, 0, 'Electronics'),
(3, 0, 'Kitchen'),
(4, 0, 'Stationary'),
(5, 0, 'Toiletries'),
(6, 0, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`ID` int(11) NOT NULL,
  `alt` text NOT NULL,
  `src` text NOT NULL,
  `adID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`, `alt`, `src`, `adID`) VALUES
(1, 'alternate text for image 1', 'cabin.png', 1),
(2, 'alternate text for image 2', 'cake.png', 2),
(3, 'alternate text for image 3', 'circus.png', 3),
(4, 'alternate text for image 4', 'game.png', 4),
(5, 'alternate text for image 5', 'safe.png', 5),
(6, 'alternate text for image 6', 'submarine.png', 6),
(7, 'nothimg importatnt', 'cake.png', 1),
(8, '', '2.png', 10),
(9, '', '6.png', 10),
(10, '', '8.png', 10),
(11, '', '10.png', 10),
(12, '', '1.png', 11),
(13, '', '2.png', 11),
(14, '', '6.png', 11),
(15, '', '8.png', 11),
(16, '', '10.png', 11),
(17, '', '11.png', 11),
(18, '', 'burger.png', 11),
(19, '', 'coffee.png', 11),
(20, '', 'logo.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`ID` int(11) NOT NULL,
  `to` text NOT NULL,
  `from` text NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `to`, `from`, `review`, `rating`) VALUES
(6, 'to user', 'from user', '<p>test</p>', 3),
(13, 'to user', 'from user', '<p>hello there</p>', 0),
(14, 'to user', 'from user', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `displayname` text NOT NULL,
  `imageFileName` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `type`, `username`, `password`, `email`, `displayname`, `imageFileName`) VALUES
(7, 1, 'Bob Monkhouse', 'p@$sw0rD', 'bob@bcit.ca', 'Bob Monkhouse', ''),
(8, 0, 'Elayne Boosler', 'p@$sw0rD', 'elayne@bcit.ca', 'Elayne Boosler', ''),
(9, 0, 'Mark Russell', 'p@$sw0rD', 'mark@bcit.ca', 'Mark Russell', ''),
(10, 0, 'Anonymous', 'p@$sw0rD', 'anonymous@bcit.ca', 'Anonymous', ''),
(11, 0, 'Socrates', 'p@$sw0rD', 'socrates@bcit.ca', 'Socrates', '6.png'),
(12, 0, 'Isaac Asimov', 'p@$sw0rD', 'isaac@bcit.ca', 'Isaac Asimov', ''),
(24, 0, 'heck', 'heck', 'heck@heck.com', 'heck', ''),
(25, 0, 'heman', 'heman', 'heman@gmail.com', 'Ericcc', 'coffee.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
