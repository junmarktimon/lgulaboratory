-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 01:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
(18, 'timon', 'lolito', 'solana', '', NULL, '21', '', 'Agay-ayan, Gingoog City', '2022-12-01 15:07:14.77181'),
(19, 'timon', 'junbeer', 'mejorada', '', 18, '0', 'son', '', '2022-12-01 15:11:41.50803'),
(20, 'adaya', 'prince cedei', 'r', '', NULL, '32', '', 'Gingoog city', '2022-12-01 15:14:24.92293'),
(21, 'boromeo', 'rohaina', 'a', '', NULL, '13', '', 'Medina', '2022-12-01 15:25:31.33996'),
(22, 'timon', 'junmark', 'mejorada', '', 18, '0', 'daughter', '', '2022-12-01 15:26:01.59523'),
(23, 'timon', 'mary', 'mejorada', '', 18, '0', 'daughter', '', '2022-12-01 15:32:40.92347'),
(24, 'boromeo', 'alex', 'a', '', 21, '0', 'nephew', '', '2022-12-01 15:35:24.04308'),
(25, 'boromeo', 'joseph', 'a', '', 21, '0', 'son', '', '2022-12-01 15:35:44.51559'),
(26, 'cabalda', 'raniel kaye', 'r', '', NULL, '19', '', 'butuan city', '2022-12-01 16:10:54.63684'),
(27, 'cabalda', 'jojie', 'r', '', 26, '0', 'daughter', '', '2022-12-01 16:11:49.87119'),
(28, 'cabalda', 'sample', 'r', 'jr', 26, '0', 'son', '', '2022-12-01 16:13:06.44610'),
(29, 'cabalda', 'rany', 'r', '', 26, '0', 'son', '', '2022-12-02 08:43:40.26161'),
(30, 'doe', 'jhon', 'l', '', NULL, '22', '', 'Medina', '2022-12-02 14:16:43.84506'),
(33, 'marcos', 'fr', 'c', 'jr', NULL, '25', '', 'Medina', '2022-12-05 08:41:39.96836'),
(34, 'marcos', 'bongbong', 'c', '', 33, '0', 'brother', '', '2022-12-05 08:42:03.64126'),
(35, 'marcos', 'jane', 'c', '', 33, '0', 'daughter', '', '2022-12-05 08:42:20.46489'),
(36, 'iyo', 'arturo', 'padulin', 'sr', NULL, '35', '', 'gingoog city', '2022-12-29 17:55:29.64930'),
(37, 'iyo', 'arnel', 'padulin', '', 36, '0', 'father', '', '2022-12-29 17:55:58.41356'),
(38, 'nutri', 'ion', 'cho', '', NULL, '22', '', 'gingoog city', '2023-01-03 12:22:28.39267'),
(39, 'nutri', 'jane', 'cho', '', 38, '0', 'border', '', '2023-01-03 12:32:33.58939'),
(40, 'nutri', 'jhon', 'cho', '', 38, '0', 'son', '', '2023-01-03 12:34:50.24608'),
(41, 'nutri', 'ion', '', '', NULL, '34', '', 'gingoog city', '2023-01-03 12:42:41.11588');

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
(25, 20, 20, 'sgpt/ alt', '100.00', '2022-12-01 08:13:46'),
(26, 18, 23, 'fasting blood sugar', '20.00', '2022-12-01 08:27:48'),
(27, 33, 33, 'urinalysis', '20.00', '2022-12-05 00:42:52'),
(28, 33, 35, 'hbsag (ict)', '30.00', '2022-12-05 00:43:07'),
(29, 36, 37, 'T4, TROPONIN I', '0.00', '2022-12-29 09:56:14'),
(30, 38, 39, 'PREGNANCY TEST', '0.00', '2023-01-03 04:32:45');

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
(2, 'staff', '1253208465b1efa876f982d8a9e73eef', 2, '0000-00-00 00:00:00.00000'),
(3, 'staff1', '1253208465b1efa876f982d8a9e73eef', 2, '2022-12-05 08:45:10.00000');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
