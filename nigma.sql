-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 04:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nigma`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `reg_no` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`reg_no`, `username`, `pwd`) VALUES
(1, 'admin', '96f96ea87a1aca4df82cfdb3c480fae4');

-- --------------------------------------------------------

--
-- Table structure for table `hints`
--

CREATE TABLE `hints` (
  `S. No.` int(2) NOT NULL,
  `level_h` int(2) NOT NULL,
  `hint_n` tinyint(1) NOT NULL,
  `hint` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hints`
--

INSERT INTO `hints` (`S. No.`, `level_h`, `hint_n`, `hint`) VALUES
(1, 1, 1, 'This is hint 1'),
(2, 1, 2, 'This is hint 2'),
(3, 1, 3, 'This is hint 3'),
(6, 1, 4, 'Four'),
(7, 1, 5, 'Five');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `S.No.` int(2) NOT NULL,
  `level` varchar(2) NOT NULL,
  `ans` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`S.No.`, `level`, `ans`) VALUES
(1, '1', '90954349a0e42d8e4426a4672bde16b9'),
(2, '2', '2ac45a388ef1a1e395c6f5a6d77adb3a'),
(3, '3', '58fc2640a50dd57dd1d86770e405c607'),
(4, '4', '67f2a835697e7c9c2c5146c76eca6038'),
(5, '5', '62cd275989e78ee56a81f0265a87562e'),
(6, '6', '4f624a3c344400245991f613fdd301af'),
(7, '7', '8c6f13bb3630ebc5f39e5961ec305aec'),
(8, '8', 'ebde8080c092fc908416083a701feb30'),
(9, '9', 'b2e189abf85e809a51522cdb0e53083a'),
(10, '10', '4828c4d7a7d6bcb006c65b1723661468'),
(11, '11', '033ca8adf92558696e1998815df9e83a'),
(12, '12', 'ab2c653a626778c456290cf8658d3b10'),
(13, '13', '1dccd1c66a44b21bdbbf1bbefc748818'),
(14, '14', 'fa2630ff4463a341c9e59282e3a685b0'),
(15, '15', '8250bf28144a7eab030688fa60095257'),
(16, '16', '328668705b649b03c2a4e26284216588'),
(17, '17', '4c6bd561e47928b8b96cda1462735048'),
(18, '18', '4f5e07e34a39dd91c7a4b61cdc2f3ea1'),
(19, '19', 'f7fa691453263012b30365ece7ee0e5d'),
(20, '20', '0bc2666c3e582d56a1749af2844edd96'),
(21, '21', 'abf5f8c1886921486adf91c1d57318de'),
(22, '22', '40eeb7831b2c55cde886196139e3b6da'),
(23, '23', 'ec6541d46c2b9687a9ee7cdafc5d0c17'),
(24, '24', '3da8af9d8523bede872dfff3aa479579'),
(25, '25', '5b9b94437f3a593bf3abfa0f2354e473'),
(26, '26', 'ad1f3e6cf649d429729fb70df6bc7846'),
(27, '27', '57a322c4c5e24651c8ae9b0d68667db7'),
(28, '28', '2722dc259e6684b982effab243f9f598'),
(29, '29', 'e90743911f649d77704dab29bb998f51'),
(30, '30', '654ae4b8ef7faaa696d66a5ab8e4a93c'),
(31, '31', '89215e1b2de12117a0268f86214621d1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `reg_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `institute` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `level` int(2) DEFAULT NULL,
  `up_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`reg_no`, `name`, `institute`, `city`, `mobile_no`, `email`, `password`, `hash`, `level`, `up_time`) VALUES
(5, 'Aditya Kumar', 'MMMUT', 'Padrauna', '7888486932', 'adityasaha444@gmail.com', 'aditya08', '96f96ea87a1aca4df82cfdb3c480fae4', 99, '2021-01-05 04:41:03'),
(6, 'Aditya Kumar', 'MMMUT', 'Gorakhpur', '7888486932', 'cypher@enigma.org', '12345678', '25d55ad283aa400af464c76d713c07ad', 99, '2022-05-11 14:35:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `hints`
--
ALTER TABLE `hints`
  ADD PRIMARY KEY (`S. No.`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`S.No.`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`reg_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `reg_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hints`
--
ALTER TABLE `hints`
  MODIFY `S. No.` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `S.No.` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `reg_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
