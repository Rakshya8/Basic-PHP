-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 05:31 AM
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
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cutomer`
--

CREATE TABLE `cutomer` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(20) COLLATE utf8_danish_ci NOT NULL,
  `LastName` varchar(20) COLLATE utf8_danish_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_danish_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_danish_ci NOT NULL,
  `Gender` varchar(1) COLLATE utf8_danish_ci NOT NULL,
  `Age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `cutomer`
--

INSERT INTO `cutomer` (`CustomerID`, `FirstName`, `LastName`, `Email`, `Password`, `Gender`, `Age`) VALUES
(1, 'Jenny', 'Brown', 'rlamamok@gmail.com', 'admin123', 'F', 19),
(2, 'Ray', 'Green', 'rgreen@tbc.edu.np', 'admins145', 'M', 20),
(3, 'Ram', 'Shah', 'rshah@gmail.com', 'root', 'M', 21),
(4, 'Rakshya', 'Moktan', 'rlamamok@gmail.com', 'admins145', 'F', 20),
(5, 'Shyam', 'Shah', 'sshah@gmail.com', 'root', 'M', 21),
(6, 'Rhyean', 'Moktan', 'rhmok@gmail.com', 'admins145', 'M', 14),
(7, 'rakshya', 'lama', 'rakmok@gmail.com', 'rak123', 'F', 12),
(8, 'asd', 'asd', 'admin@admin.com', 'asdasd', 'M', 18),
(9, 'Rakshya', 'Moktan', 'Restrictemode@gmail.com', 'sadas', 'F', 10),
(10, 'Rakshya', 'Moktan', 'Restrictemode@gmail.com', 'sadas', 'F', 10),
(11, 'Julius', 'Cook', 'jcook12@gmail.com', 'rheyan123', 'F', 26),
(12, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'asd', 'M', 12),
(13, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', '', '', 0),
(14, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(15, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(16, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(17, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(18, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(19, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(20, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(21, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(22, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(23, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(24, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(25, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(26, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(27, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(28, 'Rakshya', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', 'rheyan123', 'M', 12),
(29, 'Sauke', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', '45', 'F', 66),
(30, 'Sauke', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', '45', 'F', 66),
(31, 'Sauke', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', '45', 'F', 66),
(32, 'Sauke', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', '45', 'F', 66),
(33, 'Sauke', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', '45', 'F', 66),
(34, 'Sauke', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', '45', 'F', 66),
(35, 'Sauke', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', '45', 'F', 66),
(36, 'Sauke', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', '45', 'F', 66),
(37, 'Sauke', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', '45', 'F', 66),
(38, 'Sauke', 'Moktan', 'rlamamoktan@thebritishcollege.edu.np', '45', 'F', 66);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cutomer`
--
ALTER TABLE `cutomer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cutomer`
--
ALTER TABLE `cutomer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
