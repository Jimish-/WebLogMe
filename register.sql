-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2015 at 01:13 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `weblogme`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
`Uid` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `BirthDate` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Blogid` text NOT NULL,
  `img` tinyint(1) NOT NULL DEFAULT '0',
  `apr` tinyint(1) NOT NULL,
  `Blogname` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Uid`, `FirstName`, `LastName`, `BirthDate`, `Email`, `Password`, `Blogid`, `img`, `apr`, `Blogname`) VALUES
(1, 'Jimish', 'Fotariya', '6+March%2C+1997', 'fotariyajimish%40gmail.com', '1c4f5caf4a0bca2db9818797a3dd9115caa1465e', 'weblogme', 1, 1, 'News+Today'),
(5, 'Marut', 'Thakor', '2+January%2C+1995', 'marutthakor%40gmail.com', 'b3432e0c0a636ffecc7eab4b64c31ad4db7aa236', 'heremy', 1, 1, 'Here+it+is'),
(6, 'Dhruv', 'Haria', '1+October%2C+1995', 'dhruv%40ymail.com', 'ae7ee361e028e273c6cbaf3063ef3027f7e763a0', 'jay', 1, 1, 'Jay+Goga+'),
(8, 'Himanshu', 'Parmar', '1+December%2C+1996', 'him96%40gmail.com', '8bb7d75f3eabe9f36bf9b8f09773d418b065122b', 'joker', 1, 1, 'Whatsapp+Jokerrr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
 ADD PRIMARY KEY (`Uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
