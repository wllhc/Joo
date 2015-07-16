-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2013 at 04:13 PM
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
-- Table structure for table `pin_recharge`
--

CREATE TABLE IF NOT EXISTS `pin_recharge` (
  `rid` int(11) NOT NULL AUTO_INCREMENT COMMENT '充值id',
  `out_trade_no` varchar(20) NOT NULL COMMENT '订单号',
  `trade_no` varchar(20) NOT NULL COMMENT '支付宝交易号',
  `trade_body` varchar(50) NOT NULL COMMENT '交易描述',
  `trade_status` varchar(30) NOT NULL COMMENT '订单状态',
  `uid` int(11) NOT NULL COMMENT '充值用户id',
  `num` varchar(11) NOT NULL COMMENT '充值数量',
  `recharge_time` int(11) NOT NULL COMMENT '充值时间',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='充值' AUTO_INCREMENT=291 ;

--
-- Dumping data for table `pin_recharge`
--

INSERT INTO `pin_recharge` (`rid`, `out_trade_no`, `trade_no`, `trade_body`, `trade_status`, `uid`, `num`, `recharge_time`, `is_delete`) VALUES
(278, '2013032307002120754', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0', 1364036421, 0),
(279, '2013032307350629734', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0.01', 1364038506, 0),
(280, '2013032307352741315', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0.01', 1364038527, 0),
(281, '2013032307463033685', '', '购买照片', 'WAIT_BUYER_PAY', 21, '519', 1364039190, 0),
(282, '2013032307494565802', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0', 1364039385, 0),
(283, '2013032307501228545', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0', 1364039412, 0),
(284, '2013032308035944245', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0', 1364040239, 0),
(285, '2013032308075391861', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0', 1364040473, 0),
(286, '2013032310123428003', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0', 1364047954, 0),
(287, '2013032310124683170', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0.01', 1364047966, 0),
(288, '2013032310494246085', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0.01', 1364050182, 0),
(289, '2013032310495088532', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0.01', 1364050190, 0),
(290, '2013032310503248022', '', '购买照片', 'WAIT_BUYER_PAY', 21, '0.01', 1364050232, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
