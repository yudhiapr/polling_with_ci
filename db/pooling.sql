-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2014 at 07:23 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pooling`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer`
--

CREATE TABLE IF NOT EXISTS `tbl_answer` (
`id` int(11) NOT NULL,
  `id_pool_question` int(11) NOT NULL,
  `answer` text NOT NULL,
  `id_pool` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `cookie` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_answer`
--

INSERT INTO `tbl_answer` (`id`, `id_pool_question`, `answer`, `id_pool`, `ip`, `cookie`, `is_active`) VALUES
(19, 6, 'Pacar, Keluarga, Teman', 5, '::1', 894, 0),
(20, 5, 'Ke Ancol', 5, '::1', 894, 0),
(21, 7, 'makan malam, jalan-jalan, dan menikmati malam tahun baru', 5, '::1', 894, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pool`
--

CREATE TABLE IF NOT EXISTS `tbl_pool` (
`id` int(11) NOT NULL,
  `pool_name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_pool`
--

INSERT INTO `tbl_pool` (`id`, `pool_name`, `is_active`) VALUES
(5, 'Tahun Baru 2015', 1),
(4, 'Pemilu 2014', 1),
(6, 'Idul Adha', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pooler`
--

CREATE TABLE IF NOT EXISTS `tbl_pooler` (
`id` int(11) NOT NULL,
  `id_pool` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `cookie` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_pooler`
--

INSERT INTO `tbl_pooler` (`id`, `id_pool`, `ip`, `cookie`) VALUES
(7, 5, '::1', 894);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pool_answer`
--

CREATE TABLE IF NOT EXISTS `tbl_pool_answer` (
`id` int(11) NOT NULL,
  `id_pool_question` int(11) NOT NULL,
  `answer` text NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_pool_answer`
--

INSERT INTO `tbl_pool_answer` (`id`, `id_pool_question`, `answer`, `is_active`) VALUES
(5, 5, 'Ke Ancol', 1),
(4, 5, 'Ke Puncak', 1),
(6, 6, 'Pacar', 1),
(7, 6, 'Keluarga', 1),
(8, 6, 'Teman', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pool_question`
--

CREATE TABLE IF NOT EXISTS `tbl_pool_question` (
`id` int(11) NOT NULL,
  `id_pool` int(11) NOT NULL,
  `question` text NOT NULL,
  `pool_type` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_pool_question`
--

INSERT INTO `tbl_pool_question` (`id`, `id_pool`, `question`, `pool_type`, `is_active`) VALUES
(6, 5, 'Bersama siapa?', 2, 1),
(5, 5, 'Mau Kemana?', 1, 1),
(7, 5, 'Rencana kegiatannya apa saja?', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_setting` (
`id` int(11) NOT NULL,
  `setting` varchar(100) NOT NULL,
  `isi` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `setting`, `isi`) VALUES
(1, 'Bahasa', 'english');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `level` varchar(30) NOT NULL,
  `bahasa` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `username`, `password`, `is_active`, `level`, `bahasa`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin', 'indonesia'),
(2, 'Bayu', 'bayu', 'a430e06de5ce438d499c2e4063d60fd6', 1, 'manager', 'indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pool`
--
ALTER TABLE `tbl_pool`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pooler`
--
ALTER TABLE `tbl_pooler`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pool_answer`
--
ALTER TABLE `tbl_pool_answer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pool_question`
--
ALTER TABLE `tbl_pool_question`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_pool`
--
ALTER TABLE `tbl_pool`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_pooler`
--
ALTER TABLE `tbl_pooler`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_pool_answer`
--
ALTER TABLE `tbl_pool_answer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_pool_question`
--
ALTER TABLE `tbl_pool_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
