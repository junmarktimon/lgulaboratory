-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 01:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laboratory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `head_family_id` int(11) DEFAULT NULL,
  `age` varchar(3) DEFAULT NULL,
  `relation` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_created` datetime(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `lname`, `fname`, `mname`, `suffix`, `head_family_id`, `age`, `relation`, `address`, `date_created`) VALUES
(49, 'nutri', 'ion', 'cho', '', NULL, '20', '', 'gingoog city', '2023-02-07 12:50:21.87307'),
(50, 'nutri', 'jhon', 'cho', '', 49, '0', 'mother-in-law', '', '2023-02-07 12:50:33.72190'),
(51, 'timon', 'lolito', 'solana', '', NULL, '60', '', 'gingoog city', '2023-02-20 16:53:20.38560'),
(52, 'timon', 'junmark', 'mejorada', '', 51, '0', 'son', '', '2023-02-20 16:53:41.19213'),
(53, 'timon', 'mary grace', 'mejorada', '', 51, '0', 'daughter', '', '2023-02-20 16:56:15.08131');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ict_team`
--

CREATE TABLE `tbl_ict_team` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date_created` timestamp(4) NOT NULL DEFAULT current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ict_team`
--

INSERT INTO `tbl_ict_team` (`id`, `name`, `date_created`) VALUES
(1, 'Almyr Cabag', '2023-02-23 00:29:32.0000'),
(2, 'Raniel Kaye Cabalda', '2023-02-23 00:29:32.0000'),
(3, 'Junbee Timon', '2023-02-23 00:30:20.0000'),
(4, 'Rolando Barbadillo Jr', '2023-02-23 00:30:20.0000'),
(5, 'Reuel Sagrado', '2023-02-23 00:30:59.0000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `services` varchar(255) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `client_id`, `member_id`, `services`, `amount`, `date_created`) VALUES
(36, 51, 52, 'CBC, PREGNANCY TEST', '0.00', '2023-02-20 08:53:51'),
(37, 51, 51, 'CBC', '0.00', '2023-02-20 08:54:31'),
(38, 51, 53, 'CBC', '20.00', '2023-02-20 08:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `date_created` datetime(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `role`, `date_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '0000-00-00 00:00:00.00000'),
(2, 'staff', 'de9bf5643eabf80f4a56fda3bbb84483', 2, '0000-00-00 00:00:00.00000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ict_team`
--
ALTER TABLE `tbl_ict_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_ict_team`
--
ALTER TABLE `tbl_ict_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
