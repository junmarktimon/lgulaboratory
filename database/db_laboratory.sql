-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 08:21 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
  `household_id` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `age` varchar(3) NOT NULL,
  `address` varchar(255) NOT NULL,
  `visit_date` datetime(5) NOT NULL DEFAULT current_timestamp(5),
  `date_created` datetime(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `household_id`, `lname`, `fname`, `mname`, `suffix`, `age`, `address`, `visit_date`, `date_created`) VALUES
(7, 1, 'adaya', 'prince cedei', 'rds', '', '12', 'Gingoog city', '2022-11-22 11:38:38.64581', '2022-11-22 11:38:38.64581'),
(8, 2, 'boromeo', 'queen faith agustin', 'r', 'jr', '12', 'Gingoog city', '2022-11-22 11:38:57.30184', '2022-11-22 11:38:57.30184'),
(9, 3, 'ali', 'rohaina', 'a', '', '12', 'Gingoog city', '2022-11-22 11:39:13.58860', '2022-11-22 11:39:13.58860'),
(10, 4, 'timon', 'samplw', 'sam', '', '13', 'BXU', '2022-11-22 11:39:34.09306', '2022-11-22 11:39:34.09306'),
(11, 5, 'ali123', 'queen faith agustin', '', '', '32', 'Medina', '2022-11-22 11:45:06.52534', '2022-11-22 11:45:06.52534'),
(12, 6, 'alora', 'prince cedei', '', '', '32', 'Gingoog city', '2022-11-22 11:48:57.22984', '2022-11-22 11:48:57.22984'),
(13, 7, 'adaya', 'prince cedei', '', '', '12', 'BXU', '2022-11-22 11:49:33.91798', '2022-11-22 11:49:33.91798'),
(14, 8, 'alora', 'rohaina', 'c', '', '13', 'Gingoog city', '2022-11-22 16:30:17.85898', '2022-11-22 16:30:17.85898'),
(15, 9, 'timon', 'junmark', 'mejorada', '', '18', 'Agay-ayan, Gingoog City', '2022-11-29 13:18:49.03090', '2022-11-29 13:18:49.03090');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_household_member`
--

CREATE TABLE `tbl_household_member` (
  `id` int(11) NOT NULL,
  `head_family_id` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `client_relation` varchar(255) NOT NULL,
  `visit_date` timestamp(5) NOT NULL DEFAULT current_timestamp(5),
  `date_created` timestamp(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_household_member`
--

INSERT INTO `tbl_household_member` (`id`, `head_family_id`, `lname`, `fname`, `mname`, `suffix`, `client_relation`, `visit_date`, `date_created`) VALUES
(1, 7, 'adaya', 'sample', 'rds', '', 'son', '2022-11-22 07:35:28.00000', '2022-11-22 07:35:28.00000'),
(2, 8, 'boromeo', 'jane', 'r', '', 'daughter', '2022-11-22 07:35:28.00000', '2022-11-22 07:35:28.00000'),
(5, 9, 'ali', 'ro', 'a', '', 'niece', '2022-11-28 02:01:04.20460', '2022-11-28 02:01:04.20460'),
(6, 9, 'ali', 'jhon', 'a', '', 'brother-in-law', '2022-11-28 02:03:16.41207', '2022-11-28 02:03:16.41207'),
(7, 8, 'boromeo', 'jhon', 'r', '', 'husband', '2022-11-28 03:34:19.95616', '2022-11-28 03:34:19.95616'),
(8, 14, 'alora', 'joseph', 'r', 'jr', 'son', '2022-11-28 03:37:26.93369', '2022-11-28 03:37:26.93369'),
(9, 7, 'adaya', 'cris', 'rds', '', 'wife', '2022-11-28 03:43:53.98343', '2022-11-28 03:43:53.98343'),
(10, 15, 'timon', 'junbee', 'mejorada', '', 'brother', '2022-11-29 05:19:46.12212', '2022-11-29 05:19:46.12212'),
(11, 15, 'timon', 'jhon', 'mejorada', '', 'nephew', '2022-11-29 05:20:07.54320', '2022-11-29 05:20:07.54320');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `client_id`, `member_id`, `services`, `amount`, `date_created`) VALUES
(4, 7, 1, 'tuli', '0.00', '2022-11-22 08:09:21'),
(5, 8, 2, 'ecg', '20.00', '2022-11-22 08:09:21'),
(8, 7, 7, 'ambot', '0.00', '2022-11-22 08:20:43'),
(9, 7, 7, 'ibot', '0.00', '2022-11-28 03:42:46'),
(10, 7, 1, 'ubo', '20.00', '2022-11-28 03:42:47'),
(11, 7, 1, 'ubo', '20.05', '2022-11-28 03:57:57'),
(12, 7, 7, 'sgpt/ alt', '10.00', '2022-11-29 06:24:04'),
(13, 7, 9, 'cbc', '11.00', '2022-11-29 06:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `date_created` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `role`, `date_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `household|_id` (`household_id`);

--
-- Indexes for table `tbl_household_member`
--
ALTER TABLE `tbl_household_member`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_household_member`
--
ALTER TABLE `tbl_household_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
