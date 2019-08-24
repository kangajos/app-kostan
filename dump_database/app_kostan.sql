-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2019 at 08:28 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_kostan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kostan`
--

CREATE TABLE `kostan` (
  `kostan_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat_kost` text,
  `type_bayar_kost` varchar(255) DEFAULT NULL,
  `type_kost` varchar(255) DEFAULT NULL,
  `fasilitas_kost` text,
  `harga_kost` int(11) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `deskripsi_kost` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kostan`
--

INSERT INTO `kostan` (`kostan_id`, `user_id`, `nama_kost`, `no_hp`, `alamat_kost`, `type_bayar_kost`, `type_kost`, `fasilitas_kost`, `harga_kost`, `latitude`, `longitude`, `deskripsi_kost`, `created_at`, `updated_at`, `is_active`) VALUES
(2, 1, 'Nama Kostan kancil', '081324275549', 'Pasar Gang Kancil, RT.5/RW.6, Keagungan, West Jakarta City, Jakarta, Indonesia', '1bulana', 'putri', '[\"ac\",\"\",\"kamar mandi dalam\",\"wifi\",\"\"]', 800000, '-6.151352', '106.81311840000001', '', '2019-08-17 06:52:09', '2019-08-17 04:52:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` int(11) NOT NULL,
  `kostan_id` int(11) NOT NULL,
  `distance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`score_id`, `kostan_id`, `distance`) VALUES
(43, 1, 6.19),
(44, 4, 5.92),
(45, 5, 7.41),
(46, 6, 0.54);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `created_at`, `level`, `is_active`) VALUES
(1, 'Admin Kostan', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2019-08-06 00:00:00', 1, 1),
(2, 'agus salim', 'agus@gmail.com', 'c498416fd06f740698fc2a89f93fec85', '2019-08-11 03:44:37', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kostan`
--
ALTER TABLE `kostan`
  ADD PRIMARY KEY (`kostan_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kostan`
--
ALTER TABLE `kostan`
  MODIFY `kostan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
