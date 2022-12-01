-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 09:15 AM
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
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `head_family_id` int(11) DEFAULT NULL,
  `age` varchar(3) DEFAULT NULL,
  `relation` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_created` datetime(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `lname`, `fname`, `mname`, `suffix`, `head_family_id`, `age`, `relation`, `address`, `date_created`) VALUES
(18, 'timon', 'lolito', 'solana', '', NULL, '21', '', 'Agay-ayan, Gingoog City', '2022-12-01 15:07:14.77181'),
(19, 'timon', 'junbee', 'mejorada', '', 18, '0', 'son', '', '2022-12-01 15:11:41.50803'),
(20, 'adaya', 'prince cedei', 'r', '', NULL, '32', '', 'Gingoog city', '2022-12-01 15:14:24.92293'),
(21, 'boromeo', 'rohaina', 'a', '', NULL, '13', '', 'Medina', '2022-12-01 15:25:31.33996'),
(22, 'timon', 'junmark', 'mejorada', '', 18, '0', 'son', '', '2022-12-01 15:26:01.59523'),
(23, 'timon', 'mary', 'mejorada', '', 18, '0', 'daughter', '', '2022-12-01 15:32:40.92347'),
(24, 'boromeo', 'alex', 'a', '', 21, '0', 'nephew', '', '2022-12-01 15:35:24.04308'),
(25, 'boromeo', 'joseph', 'a', '', 21, '0', 'son', '', '2022-12-01 15:35:44.51559'),
(26, 'cabalda', 'raniel kaye', 'r', '', NULL, '18', '', 'butuan city', '2022-12-01 16:10:54.63684'),
(27, 'cabalda', 'jojie', 'r', '', 26, '0', 'sister', '', '2022-12-01 16:11:49.87119'),
(28, 'cabalda', 'sample', 'r', 'jr', 26, '0', 'son', '', '2022-12-01 16:13:06.44610');

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
(14, 18, 19, 'ubo', '0.00', '2022-12-01 07:27:01'),
(15, 18, 22, 'sip on', '0.00', '2022-12-01 07:27:46'),
(16, 18, 18, 'hilanat', '2045.00', '2022-12-01 07:28:04'),
(17, 18, 18, 'tuli', '20.05', '2022-12-01 07:28:53'),
(19, 21, 21, 'cbc', '0.00', '2022-12-01 08:05:44'),
(20, 21, 25, 'fecalysis', '10.00', '2022-12-01 08:05:54'),
(21, 21, 24, 'blood typing', '10.00', '2022-12-01 08:06:08'),
(22, 26, 26, 'blood typing', '10.00', '2022-12-01 08:12:19'),
(23, 26, 27, 'syphilis', '20.00', '2022-12-01 08:12:31'),
(24, 26, 26, 'ldl direct chole', '20.00', '2022-12-01 08:12:44'),
(25, 20, 20, 'sgpt/ alt', '100.00', '2022-12-01 08:13:46');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
