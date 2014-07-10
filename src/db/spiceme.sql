-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2014 at 05:00 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spiceme`
--

-- --------------------------------------------------------

--
-- Table structure for table `Match`
--

CREATE TABLE IF NOT EXISTS `Match` (
`id` int(11) unsigned NOT NULL,
  `person1_id` int(11) NOT NULL,
  `person2_id` int(11) NOT NULL,
  `like1to2` smallint(6) NOT NULL COMMENT '0 : tosuggest, -1 : unlike , 1 = like',
  `like2to1` smallint(6) NOT NULL COMMENT '0 : tosuggest, -1 : unlike , 1 = like',
  `vital` int(11) NOT NULL DEFAULT '0',
  `attraction` int(11) NOT NULL DEFAULT '0',
  `emotional` int(11) NOT NULL DEFAULT '0',
  `sexual` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
`id` bigint(20) NOT NULL,
  `from_person_id` int(11) NOT NULL,
  `to_person_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `message` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Person`
--

CREATE TABLE IF NOT EXISTS `Person` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `gender` smallint(6) NOT NULL COMMENT 'male ( 1 value in DB ) female ( 2 value in DB )',
  `about` varchar(1024) NOT NULL,
  `credit` int(11) NOT NULL DEFAULT '0',
  `birthdate_local` datetime NOT NULL,
  `birthdate_utc` datetime NOT NULL,
  `birthlatitude` decimal(11,8) NOT NULL,
  `birthlongitude` decimal(11,8) NOT NULL,
  `latitude` decimal(11,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `analyzed` int(11) NOT NULL DEFAULT '0',
  `authdate` datetime NOT NULL,
  `minage` int(11) NOT NULL,
  `maxage` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  `lookmen` smallint(6) NOT NULL,
  `lookwomen` smallint(6) NOT NULL,
  `looksex` smallint(6) NOT NULL DEFAULT '1',
  `lookrelationship` smallint(6) NOT NULL DEFAULT '1',
  `weeklynotification` int(11) NOT NULL DEFAULT '1',
  `dailynotification` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `PersonPref`
--

CREATE TABLE IF NOT EXISTS `PersonPref` (
`id` bigint(20) NOT NULL,
  `person_id` int(11) NOT NULL,
  `prefname` varchar(16) NOT NULL,
  `value` int(11) NOT NULL,
  `textvalue` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Match`
--
ALTER TABLE `Match`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `person_id` (`person1_id`,`person2_id`);

--
-- Indexes for table `Message`
--
ALTER TABLE `Message`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Person`
--
ALTER TABLE `Person`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `researchcriteria` (`latitude`,`longitude`,`minage`,`maxage`,`lookmen`,`lookwomen`,`looksex`,`lookrelationship`);

--
-- Indexes for table `PersonPref`
--
ALTER TABLE `PersonPref`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Match`
--
ALTER TABLE `Match`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Message`
--
ALTER TABLE `Message`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Person`
--
ALTER TABLE `Person`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PersonPref`
--
ALTER TABLE `PersonPref`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
