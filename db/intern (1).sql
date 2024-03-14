-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 07:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `aid` int(100) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pasword` varchar(255) NOT NULL,
  `confirmPassword` varchar(100) NOT NULL,
  `DateofAdmission` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`aid`, `uname`, `email`, `pasword`, `confirmPassword`, `DateofAdmission`) VALUES
(0, 'ADMIN USER', 'kimeu.nathan@makueniassembly.go.ke', '$2y$10$21EYt4CUuJJ/G6dVpE.MiOcZdPQqHp2/G.d9BekWd5S2.IaC3K5ly', '$2y$10$21EYt4CUuJJ/G6dVpE.MiOcZdPQqHp2/G.d9BekWd5S2.IaC3K5ly', '2023-12-09 14:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `deadline`
--

CREATE TABLE `deadline` (
  `id` int(20) NOT NULL,
  `d_date` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deadline`
--

INSERT INTO `deadline` (`id`, `d_date`, `status`) VALUES
(5, '2024-12-17 00:00:00', 0),
(6, '2023-12-20 00:00:00', 0),
(7, '2023-12-20 00:00:00', 0),
(8, '2024-01-30 00:00:00', 0),
(9, '2024-03-31 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `filesave`
--

CREATE TABLE `filesave` (
  `fid` int(11) NOT NULL,
  `iname` varchar(255) NOT NULL,
  `Coursename` varchar(255) NOT NULL,
  `Yearr` varchar(255) NOT NULL,
  `academics` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `nid` longblob NOT NULL,
  `KCSE` longblob NOT NULL,
  `letter` longblob NOT NULL,
  `CV` longblob NOT NULL,
  `Attachments` longblob NOT NULL,
  `Certificate` longblob NOT NULL,
  `status` int(100) NOT NULL DEFAULT 0,
  `pid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filesave`
--

INSERT INTO `filesave` (`fid`, `iname`, `Coursename`, `Yearr`, `academics`, `Department`, `nid`, `KCSE`, `letter`, `CV`, `Attachments`, `Certificate`, `status`, `pid`) VALUES
(9, 'MERU UNIVERSITY', 'COMPUTER SCIENCE', '2023', 'Degree', 'Department of ICT', 0x75706c6f6164732f6b79756d62756e692061646d697373696f6e2032303234292e646f6378, 0x75706c6f6164732f53484f52544c49535445442043414e4449444154455320464f522054484520504f534954494f4e53204f462046495343414c20414e414c5953542049492c5245434f524453204d414e4147454d454e54204f464649434552204949492c48414e53415244205245504f5254455220494949202620494e5445524e414c2041554449544f5220492e2e706466, 0x75706c6f6164732f31303654482d53495454494e472d4f524445522d50415045522d545545534441593554482d444543454d424552323032332d41542d325f3330504d2e706466, 0x75706c6f6164732f61646d696e64617368626f6172642e706466, 0x75706c6f6164732f53484f52544c49535445442043414e4449444154455320464f522054484520504f534954494f4e53204f462046495343414c20414e414c5953542049492c5245434f524453204d414e4147454d454e54204f464649434552204949492c48414e53415244205245504f5254455220494949202620494e5445524e414c2041554449544f5220492e2e706466, 0x75706c6f6164732f5053432d2d2d2d2d2d2d494e5445524e5348495020564143414e434945535f4541524c59204c4541524e494e4720414e4420424153494320454455434154494f4e202831292e706466, 1, '41'),
(10, '', '', '2023', 'Masters', 'Department of ICT', 0x75706c6f6164732f73616d6d79206b616b756e67752066696e616c2e646f6378, 0x75706c6f6164732f496e7465726e5f526571756972656d656e742e706466, 0x75706c6f6164732f73616d6d79206b616b756e67752066696e616c2e646f6378, 0x75706c6f6164732f496e7465726e5f526571756972656d656e742e706466, 0x75706c6f6164732f496e7465726e5f526571756972656d656e742e706466, 0x75706c6f6164732f73616d6d79206b616b756e67752066696e616c2e646f6378, 1, '43'),
(12, 'MERU UNIVERSITY', '', '2023', 'Degree', 'Department of ICT', 0x75706c6f6164732f6b79756d62756e692061646d697373696f6e2032303234292e646f6378, 0x75706c6f6164732f496e7465726e5f526571756972656d656e742e706466, 0x75706c6f6164732f566163616e7420706f736974696f6e7320696e20746865205075626c69632053657276696365204a616e75616e7279203230323420322e706466, 0x75706c6f6164732f496e7465726e5f526571756972656d656e742e706466, 0x75706c6f6164732f496e7465726e5f526571756972656d656e742e706466, 0x75706c6f6164732f496e7465726e5f526571756972656d656e742e706466, 0, '42'),
(14, 'Europa', 'BSC in IT', '2023', 'Degree', 'Department of ICT', 0x75706c6f6164732f70726520776465312d312e706466, 0x75706c6f6164732f70726520776465312d312e706466, 0x75706c6f6164732f70726520776465312d312e706466, 0x75706c6f6164732f70726520776465312e706466, 0x75706c6f6164732f70726520776465312e706466, 0x75706c6f6164732f70726520776465312d312e706466, 1, '46');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `pid` int(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `passwordd` varchar(100) NOT NULL,
  `confirmPassword` varchar(100) NOT NULL,
  `county` varchar(255) NOT NULL,
  `subCounty` varchar(200) NOT NULL,
  `ward` varchar(200) NOT NULL,
  `DateofAdmission` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`pid`, `fullName`, `email`, `phone`, `Gender`, `passwordd`, `confirmPassword`, `county`, `subCounty`, `ward`, `DateofAdmission`) VALUES
(41, 'Mikel  Amatriain  Arteta ', 'mikelarteta@gmail.com', '+254757024562', 'Male', '$2y$10$7hgQE3f3QSObLSd/T3fryeEOTIgNic8cMpM5ZqWN9PhDgrU8vqBiK', '$2y$10$7hgQE3f3QSObLSd/T3fryeEOTIgNic8cMpM5ZqWN9PhDgrU8vqBiK', 'Makueni', 'Makueni', 'Nzaui/Kalamba', '2024-01-28 13:31:21'),
(42, 'Thomas Kitheka', 'thomasmkitheka@gmail.com', '+254757024562', 'Male', '$2y$10$oYsAz38AwhlATot8mePo5OnauXNBeWASo2.d55nJzjVfmFTp/E9ZK', '$2y$10$oYsAz38AwhlATot8mePo5OnauXNBeWASo2.d55nJzjVfmFTp/E9ZK', 'Makueni', 'Makueni', 'Muvau', '2024-01-28 14:41:14'),
(43, 'Nicholas Nduto', 'nicholasmnduto14@gmail.com', '+254759426993', 'Male', '$2y$10$RYZZlx02.xhrd3N9uRN5bu1R8U.2crXVG5/hXcF0mLWniht3NbFUe', '$2y$10$RYZZlx02.xhrd3N9uRN5bu1R8U.2crXVG5/hXcF0mLWniht3NbFUe', 'Makueni', 'Mbooni', 'Tulimani', '2024-02-04 12:33:48'),
(44, 'CATHERINE MUTUA', 'catherinemutua@gmail.com', '0707 964962', 'Female', '$2y$10$3p189hKqMlihybXIqjLUweXLopNjCZIO5KRDj6/EnqeLbiR6.2WSm', '$2y$10$3p189hKqMlihybXIqjLUweXLopNjCZIO5KRDj6/EnqeLbiR6.2WSm', 'Makueni', 'Makueni', 'Nzaui/Kalamba', '2024-02-15 09:49:07'),
(45, 'bro', 'bro@bro.com', '1234', 'Male', '$2y$10$Xsn0uK.xoVJaRvW/elHfJuq5MTx5tRax7lRcHIUuQWCTjMOEEV58m', '$2y$10$Xsn0uK.xoVJaRvW/elHfJuq5MTx5tRax7lRcHIUuQWCTjMOEEV58m', 'Makueni', 'Makueni', 'Nzaui/Kalamba', '2024-02-29 06:32:14'),
(46, 'alpha kim', 'alphakim@yahoo.com', '0112345678', 'Male', '$2y$10$..a/zGUDjVHpAeU.yaX2sem7zRmxMA/gTvDsqEOvPm7vWG7EAv18a', '$2y$10$..a/zGUDjVHpAeU.yaX2sem7zRmxMA/gTvDsqEOvPm7vWG7EAv18a', 'Makueni', 'Makueni', 'Nzaui/Kalamba', '2024-03-11 12:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `uid` int(255) NOT NULL,
  `posts` varchar(255) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`uid`, `posts`, `Date`) VALUES
(3, 'Strictly Adhere to Deadlines', '2024-01-15'),
(4, 'Canvasing will lead to automatic disqualification', '2024-01-15'),
(5, 'Attachment  is for On-Going Students Only', '2024-01-23'),
(6, 'Volunteerism is for the recent Graduands', '2024-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `volunteerism`
--

CREATE TABLE `volunteerism` (
  `vid` int(255) NOT NULL,
  `iname` varchar(255) NOT NULL,
  `Coursename` varchar(255) NOT NULL,
  `Application_Type` varchar(200) NOT NULL,
  `Academic_Level` varchar(255) NOT NULL,
  `Department` varchar(250) NOT NULL,
  `KCSE` longblob NOT NULL,
  `CV` longblob NOT NULL,
  `ID` longblob NOT NULL,
  `application_letter` longblob NOT NULL,
  `Transcripts_or_certificate` longblob NOT NULL,
  `Insurance_letter` longblob NOT NULL,
  `pid` varchar(100) NOT NULL,
  `status` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteerism`
--

INSERT INTO `volunteerism` (`vid`, `iname`, `Coursename`, `Application_Type`, `Academic_Level`, `Department`, `KCSE`, `CV`, `ID`, `application_letter`, `Transcripts_or_certificate`, `Insurance_letter`, `pid`, `status`) VALUES
(5, 'MERU UNIVERSITY', 'COMPUTER SCIENCE', 'Volunteerism', 'Degree', 'Department of Procurement', 0x4174746163686d656e742f4461746162617365312e6163636462, 0x4174746163686d656e742f4d42494d42494e4920545249414c2042414c414e434520323032322e786c7378, 0x4174746163686d656e742f4d42494d42494e49205345434f4e44415259205343484f4f4c204143434f554e54532e646f6378, 0x4174746163686d656e742f4461746162617365312e6163636462, 0x4174746163686d656e742f4d42494d42494e49205345434f4e44415259205343484f4f4c204143434f554e54532e646f6378, 0x4174746163686d656e742f4d42494d42494e4920545249414c2042414c414e434520323032322e786c7378, '42', 1),
(6, 'Europa', 'BSC it', 'Attachment', 'Masters', 'Department of ICT', 0x4174746163686d656e742f707265207764652e706466, 0x4174746163686d656e742f70726520776465312e706466, 0x4174746163686d656e742f70726520776465312d312e706466, 0x4174746163686d656e742f70726520776465312e706466, 0x4174746163686d656e742f70726520776465312e706466, 0x4174746163686d656e742f70726520776465312e706466, '46', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `deadline`
--
ALTER TABLE `deadline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filesave`
--
ALTER TABLE `filesave`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `volunteerism`
--
ALTER TABLE `volunteerism`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deadline`
--
ALTER TABLE `deadline`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `filesave`
--
ALTER TABLE `filesave`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `volunteerism`
--
ALTER TABLE `volunteerism`
  MODIFY `vid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
