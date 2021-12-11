-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 07:05 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `sno` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES
(1, 'Math-I', 'Diffentiate, Calculus', '2021-08-05 20:02:42'),
(2, 'Math-II', 'Logical, Probabilty', '2021-08-05 20:03:50'),
(3, 'Math-III', 'Integration Calculus', '2021-08-05 20:05:51'),
(4, 'Chemistry', 'Solid State, Biomolecules', '2021-08-05 20:09:04'),
(5, 'Physics', 'Banking Road', '2021-08-06 09:13:46'),
(6, 'Biology', 'Human Reproduction', '2021-08-06 14:37:55'),
(7, 'Chemistry -I', 'Biomolecule', '2021-08-06 23:05:07'),
(8, 'Marathi ', 'Chapter-1,2,3,4', '2021-08-07 08:40:01'),
(10, 'Hindi', 'Chapter-1,2,3,4', '2021-08-07 08:48:27'),
(58, 'Geography', 'chapter 1', '2021-08-11 22:49:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `sno` (`sno`),
  ADD UNIQUE KEY `sno_2` (`sno`),
  ADD KEY `sno_3` (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
