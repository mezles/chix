-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2014 at 06:41 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rando`
--
CREATE DATABASE IF NOT EXISTS `rando` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rando`;

-- --------------------------------------------------------

--
-- Table structure for table `chix`
--

CREATE TABLE IF NOT EXISTS `chix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `fb` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `chix`
--

INSERT INTO `chix` (`id`, `name`, `description`, `fb`) VALUES
(1, 'Ellen Adarna', 'It is better to fail in originality than to succeed in imitation.', 'https://www.facebook.com/EllenAdarnaOfficialPage'),
(2, 'Kristel Mae Taburnal', 'I do my thing and you do yours.', 'https://www.facebook.com/kurdapyaguaps?fref=ts'),
(3, 'Jan Claudine Viterbo', 'I am born to be real, not to be perfect.', 'https://www.facebook.com/janclaudine.viterbo.9?fref=ts'),
(4, 'Danica Gelig', 'When you feel sad, DANCE.', 'https://www.facebook.com/danica.gelig?fref=ts');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
