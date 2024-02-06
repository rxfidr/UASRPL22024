-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 07:49 PM
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
-- Database: `uasrpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `heropower`
--

CREATE TABLE `heropower` (
  `id_power` int(11) NOT NULL,
  `nama_hero` varchar(255) NOT NULL,
  `role_hero` varchar(50) NOT NULL,
  `jenis_hero` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `heropower`
--

INSERT INTO `heropower` (`id_power`, `nama_hero`, `role_hero`, `jenis_hero`, `deskripsi`, `image`) VALUES
(1, 'Vexana', 'Midlaner', 'Magic', 'Walaupun vexana build defense, magic power vexana tetap pedih.', 'https://static.wikia.nocookie.net/mobile-legends/images/3/36/Hero381-portrait.png'),
(2, 'Dyrroth', 'Explaner/Jungler', 'Physical', 'Baru-baru ini Dyrroth diperkuat, karena ultimate nya tidak bisa diganggu.', 'https://static.wikia.nocookie.net/mobile-legends/images/2/2c/Hero851-portrait.png'),
(8, 'Nana', 'Midlaner', 'Magic', 'Setelah revamp nana sangat mendominasi karna skill 2 nya yang menyebabkan musuh sulit bergerak', 'https://static.wikia.nocookie.net/mobile-legends/images/a/a4/Hero051-portrait.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_ml` int(11) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `email`, `id_ml`, `no_telp`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', 313131312, '085910666990'),
(8, 'akhdann', 'akhdan', 'akhdan', 'pegawai', 'rafidifar@gmail.com', 121212121, '085174243483');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `heropower`
--
ALTER TABLE `heropower`
  ADD PRIMARY KEY (`id_power`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `heropower`
--
ALTER TABLE `heropower`
  MODIFY `id_power` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
