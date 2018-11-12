-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2018 at 05:07 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `XPROXMESS`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mess` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `username`, `password`, `mess`) VALUES
(1, 'mess_1', '123456', '1st Block'),
(2, 'mess_3', '1234567', '3rd Block'),
(3, 'mess_4', '12345678', '4th Block'),
(4, 'mega', '123456789', 'Mega Mess'),
(5, 'nc', '12345678910', 'Night Canteen');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `roll_no` varchar(100) DEFAULT NULL,
  `mess` varchar(100) NOT NULL,
  `complaint` varchar(256) NOT NULL,
  `sub_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `roll_no`, `mess`, `complaint`, `sub_date`) VALUES
(19, '16CO110', '1st Block', 'hello', '2018-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `FirstBlockMenu`
--

CREATE TABLE `FirstBlockMenu` (
  `day` varchar(15) DEFAULT NULL,
  `breakfast` varchar(100) NOT NULL,
  `lunch` varchar(100) NOT NULL,
  `dinner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `FirstBlockMenu`
--

INSERT INTO `FirstBlockMenu` (`day`, `breakfast`, `lunch`, `dinner`) VALUES
('MON', 'Egg', 'Rajma', 'Chawal'),
('TUE', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER'),
('WED', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER'),
('THURS', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER'),
('FRI', 'Chole Puri', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER'),
('SAT', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER'),
('SUN', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER');

-- --------------------------------------------------------

--
-- Table structure for table `FourthBlockMenu`
--

CREATE TABLE `FourthBlockMenu` (
  `day` varchar(15) DEFAULT NULL,
  `breakfast` varchar(100) NOT NULL,
  `lunch` varchar(100) NOT NULL,
  `dinner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `FourthBlockMenu`
--

INSERT INTO `FourthBlockMenu` (`day`, `breakfast`, `lunch`, `dinner`) VALUES
('MON', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER'),
('TUE', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER'),
('WED', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER'),
('THURS', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER'),
('FRI', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER'),
('SAT', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER'),
('SUN', 'PURI BHAJI', 'CHOLE PURI', 'GOBI MANCHURIAN AND PANEER');

-- --------------------------------------------------------

--
-- Table structure for table `MegaMessMenu`
--

CREATE TABLE `MegaMessMenu` (
  `day` varchar(15) DEFAULT NULL,
  `breakfast` varchar(100) NOT NULL,
  `lunch` varchar(100) NOT NULL,
  `dinner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `MegaMessMenu`
--

INSERT INTO `MegaMessMenu` (`day`, `breakfast`, `lunch`, `dinner`) VALUES
('MON', 'Samosa', 'Masala Bhindi', 'Singhada'),
('TUE', 'PudiSabji', 'Alu Chilli', 'Matar Paneer'),
('WED', 'Poha', 'cabbage', 'Rajma'),
('THURS', 'Alu Puri', 'Capsicum', 'Chicken'),
('FRI', 'Idli Sambhar', 'Dam Alu', 'Manchurian'),
('SAT', 'GoliBaji', 'Kadhahi Chicken', 'Karela Jon'),
('SUN', 'Samosa', 'Masala Bhindi', 'Singhada');

-- --------------------------------------------------------

--
-- Table structure for table `mess_allot`
--

CREATE TABLE `mess_allot` (
  `mid` int(11) NOT NULL,
  `roll_no` varchar(256) NOT NULL,
  `mess` varchar(100) NOT NULL,
  `apply_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `mess_allot`
--

INSERT INTO `mess_allot` (`mid`, `roll_no`, `mess`, `apply_date`) VALUES
(1, '16CO110', '1st Block', '2018-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `mess_count`
--

CREATE TABLE `mess_count` (
  `mess` varchar(256) NOT NULL,
  `left_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `mess_count`
--

INSERT INTO `mess_count` (`mess`, `left_count`) VALUES
('1st Block', 8),
('2nd Block', 98),
('4th Block', 197),
('Mega Mess', 99);

-- --------------------------------------------------------

--
-- Table structure for table `night_canteen_nonveg`
--

CREATE TABLE `night_canteen_nonveg` (
  `Food` varchar(50) NOT NULL,
  `price` int(4) NOT NULL,
  `availability` int(2) NOT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `idd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `night_canteen_nonveg`
--

INSERT INTO `night_canteen_nonveg` (`Food`, `price`, `availability`, `tag`, `idd`) VALUES
('Chicken Kolapuri', 100, 0, 'Chicken', 1),
('Prawns', 200, 1, 'Fish', 2),
('Chicken Kurma', 50, 1, 'Chicken', 3),
('Fish Curry', 50, 1, 'Fish', 4);

-- --------------------------------------------------------

--
-- Table structure for table `night_canteen_veg`
--

CREATE TABLE `night_canteen_veg` (
  `Food` varchar(50) NOT NULL,
  `price` int(4) NOT NULL,
  `availability` int(2) NOT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `idd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `night_canteen_veg`
--

INSERT INTO `night_canteen_veg` (`Food`, `price`, `availability`, `tag`, `idd`) VALUES
('Puri Bhaji', 40, 1, 'Snacks', 2),
('Dosa', 35, 1, 'Snacks', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `food` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rollno` varchar(255) NOT NULL,
  `tim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `SecondBlockMenu`
--

CREATE TABLE `SecondBlockMenu` (
  `day` varchar(15) DEFAULT NULL,
  `breakfast` varchar(100) NOT NULL,
  `lunch` varchar(100) NOT NULL,
  `dinner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `SecondBlockMenu`
--

INSERT INTO `SecondBlockMenu` (`day`, `breakfast`, `lunch`, `dinner`) VALUES
('MON', 'Samosa', 'Masala Bhindi', 'Singhada'),
('TUE', 'PudiSabji', 'Alu Chilli', 'Matar Paneer'),
('WED', 'Poha', 'BEKAR SABJI', 'Rajma'),
('THURS', 'Alu Paratha', 'Capsicum', 'Chicken 65'),
('FRI', 'Dosa', 'Dam Alu', 'Manchurian'),
('SAT', 'GoliBaji', 'Kadhahi Chicken', 'Karela Jon'),
('SUN', 'Samosa', 'Masala Bhindi', 'Singhada');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `roll_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mess` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`roll_no`, `email`, `password`, `mess`, `price`) VALUES
('16CO108', 'ad@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 0),
('16CO110', 'dv@gmail.com', '10e186315f3d0aad7dce6ee826726509', '1st Block', 290),
('16CO111', 'qw@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 0),
('16CO116', 'indra@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `mess_allot`
--
ALTER TABLE `mess_allot`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `mess_count`
--
ALTER TABLE `mess_count`
  ADD PRIMARY KEY (`mess`);

--
-- Indexes for table `night_canteen_nonveg`
--
ALTER TABLE `night_canteen_nonveg`
  ADD PRIMARY KEY (`idd`);

--
-- Indexes for table `night_canteen_veg`
--
ALTER TABLE `night_canteen_veg`
  ADD PRIMARY KEY (`idd`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`roll_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mess_allot`
--
ALTER TABLE `mess_allot`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `night_canteen_nonveg`
--
ALTER TABLE `night_canteen_nonveg`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `night_canteen_veg`
--
ALTER TABLE `night_canteen_veg`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
