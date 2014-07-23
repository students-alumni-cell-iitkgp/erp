-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2014 at 08:02 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erp`
--
CREATE DATABASE IF NOT EXISTS `erp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `erp`;

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `alumid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `hall` varchar(100) NOT NULL,
  `alumSince` int(11) NOT NULL,
  PRIMARY KEY (`alumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumid`, `name`, `hall`, `alumSince`) VALUES
(2, 'Atanu Das', 'Rajendra Prasad Hall', 1964),
(3, 'B K Tariyal', '', 1964),
(4, 'Jyoti Parshad Banerjee', '', 1964),
(5, 'K K Saxena', 'Rajendra Prasad Hall', 1964),
(6, 'Kiran Sankar Sahu', '', 1964),
(7, 'Mithilesh Kumar Sinha', 'Azad Hall', 1964),
(8, 'Satish Bansal', 'Nehru Hall', 1964),
(9, 'Tapash Kumar Pal', 'Rajendra Prasad Hall', 1964),
(10, 'Amitava De', 'Lala Lajpat Rai Hall', 1974),
(11, 'Ashok Kumar Ghosh', 'Lala Lajpat Rai Hall', 1974),
(12, 'Niladri Nirjhar Biswas', '', 1974),
(13, 'Partha Sen', 'Rajendra Prasad Hall', 1974),
(14, 'Pramod Kumar Gupta', 'Vidya Sagar Hall', 1974),
(15, 'Shyam Sunder Verma', 'Vidya Sagar Hall', 1974),
(16, 'Sudip Sen', 'Nehru Hall', 1974),
(17, 'Sushim Kumar Dasgupta', 'Patel Hall', 1974),
(18, 'Tirthankar Banerjee', 'Patel Hall', 1974),
(19, 'Swapan Guha', 'Rajendra Prasad Hall', 1974),
(20, 'Vinod Rai Juthani', '', 1974),
(21, 'S Anand', 'Azad Hall', 1989),
(22, 'Ashis Kumar Roy', 'Azad Hall', 1989),
(23, 'Dinesh Shastri', 'Patel Hall', 1989),
(24, 'J Ramesh', 'Radhakrishnan Hall', 1989),
(25, 'Jayanta Kumar Rudra', '', 1989),
(26, 'Peshwa Acharya', 'Rajendra Prasad Hall', 1989),
(27, 'Pradeep Kumar Bhalla', 'Lala Lajpat Rai Hall', 1989),
(28, 'Rajeev Kumar Saraf', 'Nehru Hall', 1989),
(29, 'Rakesh Chandubhai Pandya', 'Rajendra Prasad Hall', 1989),
(30, 'Ramakrishna Manne', 'Azad Hall', 1989),
(31, 'Ravindra Kumar Sinha', 'Vidya Sagar Hall', 1989),
(32, 'Sanjay Prakash Gupta', 'Rajendra Prasad Hall', 1989),
(33, 'Sanjay Dutt', 'Lala Lajpat Rai Hall', 1989),
(34, 'Sanjiv Kumar Singh', 'Rajendra Prasad Hall', 1989),
(35, 'Shambhu Sharan', '', 1989),
(36, 'Sibasish Padhi', 'Vidya Sagar Hall', 1989),
(37, 'Sujit Bhattacharyya', 'Nehru Hall', 1989),
(38, 'Sumit Das', 'Lala Lajpat Rai Hall', 1989),
(39, 'Sumit Chakraborty', 'Radhakrishnan Hall', 1989),
(40, 'Suresh Adina', 'Azad Hall', 1989),
(41, 'Tapash Kumar Gupta', 'Patel Hall', 1975),
(42, 'Chiranjit Ghosh', 'Patel Hall', 1976),
(43, 'L Ravindra Rao', 'Patel Hall', 1976),
(44, 'Samir Biswas', '', 1976),
(45, 'Kunal Bhattacharya', 'Patel Hall', 1977),
(46, 'Ranjit Kumar Jana', 'Patel Hall', 1977),
(47, 'Chandra Sekhar Bandyopadhyay', 'Patel Hall', 1978);

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE IF NOT EXISTS `assign` (
  `alumid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`alumid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `alumid` int(11) NOT NULL AUTO_INCREMENT,
  `search` int(11) NOT NULL,
  `called` int(11) NOT NULL,
  `register` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `toname` varchar(30) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`alumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores status about the alumni' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`alumid`, `search`, `called`, `register`, `pay`, `toname`, `year`) VALUES
(2, 3, 3, 1, 1, 'arpit', 1964);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `privilege` int(11) NOT NULL COMMENT 'can have 4 values',
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `password`, `privilege`, `email`) VALUES
('Admin', 'admin', '33ee7e1eb504b6619c1b445ca1442c21', 3, 'mishra.rahul1712@gmail.com'),
('Arpit', 'arpit', '33ee7e1eb504b6619c1b445ca1442c21', 1, 'arpit366@gmail.com'),
('Rahul', 'root', '33ee7e1eb504b6619c1b445ca1442c21', 1, 'namannishesh@gmail.com'),
('testuser', 'test', '33ee7e1eb504b6619c1b445ca1442c21', 2, 'user@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `toname` varchar(30) NOT NULL,
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `table`, `description`, `toname`, `fromid`, `toid`, `year`) VALUES
(30, 'alumni', '1965 ready data', 'Arpit', 2, 8, 1964),
(31, 'alumni', 'PUT description here', 'Arpit', 9, 12, 0000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`alumid`) REFERENCES `alumni` (`alumid`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`alumid`) REFERENCES `alumni` (`alumid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
