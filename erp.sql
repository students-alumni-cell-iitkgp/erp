-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2014 at 08:56 AM
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
  `assigned` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`alumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumid`, `name`, `hall`, `alumSince`, `assigned`) VALUES
(2, 'Atanu Das', 'Rajendra Prasad Hall', 1964, 1),
(3, 'B K Tariyal', '', 1964, 1),
(4, 'Jyoti Parshad Banerjee', '', 1964, 1),
(5, 'K K Saxena', 'Rajendra Prasad Hall', 1964, 1),
(6, 'Kiran Sankar Sahu', '', 1964, 1),
(7, 'Mithilesh Kumar Sinha', 'Azad Hall', 1964, 1),
(8, 'Satish Bansal', 'Nehru Hall', 1964, 1),
(9, 'Tapash Kumar Pal', 'Rajendra Prasad Hall', 1964, 1),
(10, 'Amitava De', 'Lala Lajpat Rai Hall', 1974, 1),
(11, 'Ashok Kumar Ghosh', 'Lala Lajpat Rai Hall', 1974, 1),
(12, 'Niladri Nirjhar Biswas', '', 1974, 1),
(13, 'Partha Sen', 'Rajendra Prasad Hall', 1974, 0),
(14, 'Pramod Kumar Gupta', 'Vidya Sagar Hall', 1974, 0),
(15, 'Shyam Sunder Verma', 'Vidya Sagar Hall', 1974, 0),
(16, 'Sudip Sen', 'Nehru Hall', 1974, 0),
(17, 'Sushim Kumar Dasgupta', 'Patel Hall', 1974, 0),
(18, 'Tirthankar Banerjee', 'Patel Hall', 1974, 0),
(19, 'Swapan Guha', 'Rajendra Prasad Hall', 1974, 0),
(20, 'Vinod Rai Juthani', '', 1974, 0),
(21, 'S Anand', 'Azad Hall', 1989, 0),
(22, 'Ashis Kumar Roy', 'Azad Hall', 1989, 0),
(23, 'Dinesh Shastri', 'Patel Hall', 1989, 0),
(24, 'J Ramesh', 'Radhakrishnan Hall', 1989, 0),
(25, 'Jayanta Kumar Rudra', '', 1989, 0),
(26, 'Peshwa Acharya', 'Rajendra Prasad Hall', 1989, 0),
(27, 'Pradeep Kumar Bhalla', 'Lala Lajpat Rai Hall', 1989, 0),
(28, 'Rajeev Kumar Saraf', 'Nehru Hall', 1989, 0),
(29, 'Rakesh Chandubhai Pandya', 'Rajendra Prasad Hall', 1989, 0),
(30, 'Ramakrishna Manne', 'Azad Hall', 1989, 0),
(31, 'Ravindra Kumar Sinha', 'Vidya Sagar Hall', 1989, 0),
(32, 'Sanjay Prakash Gupta', 'Rajendra Prasad Hall', 1989, 0),
(33, 'Sanjay Dutt', 'Lala Lajpat Rai Hall', 1989, 0),
(34, 'Sanjiv Kumar Singh', 'Rajendra Prasad Hall', 1989, 0),
(35, 'Shambhu Sharan', '', 1989, 0),
(36, 'Sibasish Padhi', 'Vidya Sagar Hall', 1989, 0),
(37, 'Sujit Bhattacharyya', 'Nehru Hall', 1989, 0),
(38, 'Sumit Das', 'Lala Lajpat Rai Hall', 1989, 0),
(39, 'Sumit Chakraborty', 'Radhakrishnan Hall', 1989, 0),
(40, 'Suresh Adina', 'Azad Hall', 1989, 0),
(41, 'Tapash Kumar Gupta', 'Patel Hall', 1975, 0),
(42, 'Chiranjit Ghosh', 'Patel Hall', 1976, 0),
(43, 'L Ravindra Rao', 'Patel Hall', 1976, 0),
(44, 'Samir Biswas', '', 1976, 0),
(45, 'Kunal Bhattacharya', 'Patel Hall', 1977, 0),
(46, 'Ranjit Kumar Jana', 'Patel Hall', 1977, 0),
(47, 'Chandra Sekhar Bandyopadhyay', 'Patel Hall', 1978, 0);

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
  `userid` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`alumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores status about the alumni' AUTO_INCREMENT=27 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`alumid`, `search`, `called`, `register`, `pay`, `userid`, `year`) VALUES
(3, 0, 0, 0, 0, 4, 1964),
(4, 0, 0, 0, 0, 4, 1964),
(5, 0, 0, 0, 0, 4, 1964),
(6, 0, 0, 0, 0, 4, 1964),
(7, 0, 0, 0, 0, 4, 1964),
(8, 0, 0, 0, 0, 4, 1964),
(9, 0, 0, 0, 0, 4, 1964),
(10, 0, 0, 0, 0, 4, 1974),
(11, 0, 0, 0, 0, 4, 1974),
(12, 0, 0, 0, 0, 2, 1974);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `username`, `password`, `privilege`, `email`) VALUES
(1, 'Admin', 'admin', '33ee7e1eb504b6619c1b445ca1442c21', 3, 'mishra.rahul1712@gmail.com'),
(2, 'Arpit', 'arpit', '33ee7e1eb504b6619c1b445ca1442c21', 1, 'arpit366@gmail.com'),
(3, 'Rahul', 'root', '33ee7e1eb504b6619c1b445ca1442c21', 1, 'namannishesh@gmail.com'),
(4, 'testuser', 'test', '33ee7e1eb504b6619c1b445ca1442c21', 2, 'user@user.com'),
(5, 'GSEC 1', 'gsec', '33ee7e1eb504b6619c1b445ca1442c21', 1, 'kannan.siddharth12@gmail.com'),
(6, 'MEMBER', 'studmem', '33ee7e1eb504b6619c1b445ca1442c21', 2, 'kannan.siddharth12@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`alumid`) REFERENCES `alumni` (`alumid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
