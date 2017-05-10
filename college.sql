-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2017 at 06:39 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `cname` varchar(20) DEFAULT NULL,
  `phoneno` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cname`, `phoneno`) VALUES
(9, 'nitish', '7024344850'),
(10, 'priyanka', '1234567890'),
(11, 'manish', '954535756'),
(12, 'manish', '9522583600'),
(13, 'durga', '7024344851'),
(14, 'mainak', '9174494383'),
(15, 'raj', '7024344852'),
(16, 'mayank', '7024344858');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `c_id` int(11) NOT NULL,
  `brand_id` varchar(20) NOT NULL,
  `tstar` int(11) NOT NULL,
  `comment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`c_id`, `brand_id`, `tstar`, `comment`) VALUES
(9, 'puma', 4, 'Excellent'),
(9, 'puma1', 5, 'Excellent'),
(12, 'puma1', 3, 'Very Good');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itm_id` int(11) NOT NULL,
  `itm_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itm_id`, `itm_name`) VALUES
(8, 'jeans'),
(9, 'shirt'),
(11, 't-shirt'),
(12, 'bag'),
(13, 'computer');

-- --------------------------------------------------------

--
-- Table structure for table `itm_name`
--

CREATE TABLE `itm_name` (
  `brand_id` varchar(20) NOT NULL,
  `itm_name` varchar(20) NOT NULL,
  `brand_name` varchar(20) NOT NULL,
  `pnwsize` varchar(20) NOT NULL,
  `sprice` decimal(10,3) NOT NULL,
  `cprice` decimal(10,3) NOT NULL,
  `no_items` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itm_name`
--

INSERT INTO `itm_name` (`brand_id`, `itm_name`, `brand_name`, `pnwsize`, `sprice`, `cprice`, `no_items`) VALUES
('cottoncandy1', 't-shirt', 'cotton candy', 'large', '100.000', '50.000', 65),
('hardwell1', 'bag', 'hardwell', 'small', '500.000', '400.000', 65),
('hp1', 'computer', 'hp', '21inch', '20000.000', '10000.000', 68),
('johnplayer1', 'jeans', 'john players', '30', '3000.000', '1500.000', 54),
('johnplayer2', 'jeans', 'john players', '32', '12000.000', '1000.000', 85),
('puma', 'shirt', 'puma2', 'small', '3000.000', '1000.000', 71),
('puma1', 'jeans', 'puma', '32', '2000.000', '1000.000', 92);

--
-- Triggers `itm_name`
--
DELIMITER $$
CREATE TRIGGER `itm_name_after_update` AFTER UPDATE ON `itm_name` FOR EACH ROW BEGIN
UPDATE feedback set brand_id=NEW.brand_id where brand_id=OLD.brand_id;
UPDATE profitdetail set brand_id=NEW.brand_id where brand_id=OLD.brand_id;
UPDATE prifitanalysis set brand_id=NEW.brand_id where brand_id=OLD.brand_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prifitanalysis`
--

CREATE TABLE `prifitanalysis` (
  `brand_id` varchar(20) NOT NULL,
  `cdiscount` int(11) NOT NULL,
  `itm_sold_in_curprice` int(11) NOT NULL,
  `total_sold` int(11) NOT NULL,
  `curr_profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prifitanalysis`
--

INSERT INTO `prifitanalysis` (`brand_id`, `cdiscount`, `itm_sold_in_curprice`, `total_sold`, `curr_profit`) VALUES
('cottoncandy1', 5, 35, 35, 1750),
('hardwell1', 5, 3, 35, 300),
('hp1', 0, 2, 2, 20000),
('johnplayer1', 5, 5, 17, 7500),
('puma', 20, 5, 27, 10000),
('puma1', 10, 1, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `profitdetail`
--

CREATE TABLE `profitdetail` (
  `brand_id` varchar(20) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `dis_date` date NOT NULL,
  `total_sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profitdetail`
--

INSERT INTO `profitdetail` (`brand_id`, `discount`, `dis_date`, `total_sold`) VALUES
('puma', 0, '2016-11-14', 2),
('hardwell1', 0, '2016-11-16', 32),
('puma', 15, '2016-11-17', 20),
('johnplayer1', 0, '2016-12-02', 12);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(100) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(2, 'manish', 'kumar', 'manishksingh123@gmail.com', '59c95189ac895fcc1c6e1c38d067e244'),
(5, 'nitish', 'kumar', 'nitishksingh123@gmail.com', 'fde62956f023ab40685ecceee22c402e'),
(9, 'rahul', 'kumar', 'rahul@gmail.com', '439ed537979d8e831561964dbbbd7413'),
(18, 'nibha', 'kumari', 'nibha@gmail.com', 'e168864f2b802fd59dd57ce943b57d3f');

-- --------------------------------------------------------

--
-- Table structure for table `solditms`
--

CREATE TABLE `solditms` (
  `brand_id` varchar(20) DEFAULT NULL,
  `itm_name` varchar(20) DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `itm_sold` int(100) DEFAULT NULL,
  `sprice` int(11) NOT NULL,
  `dicount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phoneno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `name`, `city`, `phoneno`) VALUES
(1, 'nitish kumar raj', 'siwan', 12345),
(2, 'MANISH KUMAR', 'SIWAN', 13324556),
(3, 'PRIYA KUMARI', 'SIWAN', 135438956),
(4, 'PRIYAnka KUMARI', 'SIWAN', 135438956),
(5, 'PRIYNSHU KUMAR', 'SIWAN', 135438956);

-- --------------------------------------------------------

--
-- Table structure for table `xxx`
--

CREATE TABLE `xxx` (
  `brand_id` varchar(20) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `sprice` decimal(10,3) DEFAULT NULL,
  `tprice` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`c_id`,`brand_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itm_id`);

--
-- Indexes for table `itm_name`
--
ALTER TABLE `itm_name`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `prifitanalysis`
--
ALTER TABLE `prifitanalysis`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `xxx`
--
ALTER TABLE `xxx`
  ADD PRIMARY KEY (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
