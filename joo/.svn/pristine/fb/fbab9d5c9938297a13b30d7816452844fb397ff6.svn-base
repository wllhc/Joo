-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2013 at 04:28 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pinphpv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `pin_account`
--

CREATE TABLE IF NOT EXISTS `pin_account` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `trade_sn` varchar(50) NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `contactname` varchar(50) NOT NULL,
  `discount` float(8,2) NOT NULL DEFAULT '0.00',
  `money` varchar(8) NOT NULL,
  `quantity` int(8) unsigned NOT NULL DEFAULT '1',
  `paytime` int(10) NOT NULL DEFAULT '0',
  `pay_type` enum('offline','recharge','selfincome','online') NOT NULL DEFAULT 'recharge',
  `type` tinyint(3) NOT NULL DEFAULT '1',
  `ip` int(11) NOT NULL,
  `adminnote` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `trade_sn` (`trade_sn`,`money`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=291 ;

--
-- Dumping data for table `pin_account`
--

INSERT INTO `pin_account` (`id`, `trade_sn`, `uid`, `username`, `contactname`, `discount`, `money`, `quantity`, `paytime`, `pay_type`, `type`, `ip`, `adminnote`) VALUES
(278, '2013032307002120754', 21, 'test', '购买照片', 0.00, '0', 1, 0, 'recharge', 1, 0, ''),
(279, '2013032307350629734', 21, 'test', '购买照片', 0.00, '0.01', 1, 0, 'recharge', 1, 0, ''),
(280, '2013032307352741315', 21, 'test', '购买照片', 0.00, '0.01', 1, 0, 'recharge', 1, 0, ''),
(281, '2013032307463033685', 21, 'test', '购买照片', 0.00, '519', 1, 0, 'recharge', 1, 0, ''),
(282, '2013032307494565802', 21, 'test', '购买照片', 0.00, '0', 1, 0, 'recharge', 1, 0, ''),
(283, '2013032307501228545', 21, 'test', '购买照片', 0.00, '0', 1, 0, 'recharge', 1, 0, ''),
(284, '2013032308035944245', 21, 'test', '购买照片', 0.00, '0', 1, 0, 'recharge', 1, 0, ''),
(285, '2013032308075391861', 21, 'test', '购买照片', 0.00, '0', 1, 0, 'recharge', 1, 0, ''),
(286, '2013032310123428003', 21, 'test', '购买照片', 0.00, '0', 1, 0, 'recharge', 1, 0, ''),
(287, '2013032310124683170', 21, 'test', '购买照片', 0.00, '0.01', 1, 0, 'recharge', 1, 0, ''),
(288, '2013032310494246085', 21, 'test', '购买照片', 0.00, '0.01', 1, 0, 'recharge', 1, 0, ''),
(289, '2013032310495088532', 21, 'test', '购买照片', 0.00, '0.01', 1, 0, 'recharge', 1, 0, ''),
(290, '2013032310503248022', 21, 'test', '购买照片', 0.00, '0.01', 1, 0, 'recharge', 1, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
