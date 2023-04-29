-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2013 at 07:43 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mzakimy_latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahagian`
--

CREATE TABLE IF NOT EXISTS `bahagian_tmp` (
  `bids` varchar(32) NOT NULL,
  `bdelete` int(1) NOT NULL DEFAULT '1',
  `bahagian` varchar(255) NOT NULL,
  PRIMARY KEY (`bids`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahagian`
--

INSERT INTO `bahagian_tmp` (`bids`, `bdelete`, `bahagian`) VALUES
('55b615a2763053eca198c7fee078ffec', 2, 'BAHAGIAN SUMBER MANUSIA'),
('a9a5053fdf71824225e4e3f5a1527be1', 2, 'BAHAGIAN TEKNOLOGI MAKLUMAT'),
('0c63d083b12b7272ccfde6dcfd16013f', 2, 'BAHAGIAN KEWANGAN'),
('b6c11593bdcee3c3a1af1093a88a38e0', 1, 'BAHAGIAN LATIHAN'),
('a72ea7f421b0d6efc46e846be59fcbf8', 1, 'PEJABAT KETUA PENGARAH PERKHIDMATAN AWAM'),
('96c263baff3442ede8e96e2990b7ae33', 1, 'BAHAGIAN KHIDMAT PENGURUSAN'),
('3632dd2575c3b5f14d334962cbb0669a', 1, 'BAHAGIAN PERANCANGAN, PENYELIDIKAN DAN KORPORAT'),
('bc0ae2539522bbf6e47711042d6e6e4a', 1, 'INSTITUT TADBIRAN AWAM NEGARA'),
('891ca437d641d8cb8304d985d545d3b8', 1, 'BAHAGIAN PENGURUSAN MAKLUMAT'),
('4e27c09ece9961416ea47204fc4b8c17', 1, 'BAHAGIAN PENGURUSAN PSIKOLOGI'),
('4630ecce2a4455b987ead03d327116d8', 1, 'BAHAGIAN SARAAN'),
('c8c3bced935a5c9d0207b7931a9d3ce0', 1, 'BAHAGIAN PASCA PERKHIDMATAN'),
('c20e4d801c38c37fa0a28c87ba38afbb', 1, 'BAHAGIAN PERKHIDMATAN'),
('744a11a174fae4780c9bad0db672ed85', 1, 'BAHAGIAN PEMBANGUNAN MODAL INSAN'),
('d0fb09cecc86e38a714f01aaa0c806b7', 1, 'BAHAGIAN PEMBANGUNAN ORGANISASI'),
('d41d8cd98f00b204e9800998ecf8427e', 1, 'UNIT PROTOKOL');
