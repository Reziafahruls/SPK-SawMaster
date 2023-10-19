-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 03:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `saw_alternatives`
--

CREATE TABLE `saw_alternatives` (
  `id_alternative` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `saw_alternatives`
--

INSERT INTO `saw_alternatives` (`id_alternative`, `name`, `nis`, `kelas`) VALUES
(1, 'Kevin Sanjaya', '', ''),
(2, 'Sin Tay Young', '', ''),
(3, 'Ginting', '', ''),
(4, 'Aprius Laia', '', ''),
(5, 'Kasep', '', ''),
(6, 'Petrus', '', ''),
(7, 'Trubus', '', ''),
(8, 'Edowin', '', ''),
(12, 'Dandi Nugraha ', '10108077', '3A'),
(11, 'res', '10108047', '3A');

-- --------------------------------------------------------

--
-- Table structure for table `saw_criterias`
--

CREATE TABLE `saw_criterias` (
  `id_criteria` tinyint(3) UNSIGNED NOT NULL,
  `criteria` varchar(100) NOT NULL,
  `weight` float NOT NULL,
  `attribute` set('benefit','cost') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `saw_criterias`
--

INSERT INTO `saw_criterias` (`id_criteria`, `criteria`, `weight`, `attribute`) VALUES
(1, 'Penguasaan Aspek Teknis Meja', 2.9, 'benefit'),
(2, 'Pengalaman Kerja', 2.8, 'benefit'),
(3, 'Interpersonal Skill', 1.5, 'benefit'),
(4, 'Usia', 2, 'cost'),
(5, 'Staus Perkawainan', 2.8, 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `saw_evaluations`
--

CREATE TABLE `saw_evaluations` (
  `id_alternative` smallint(5) UNSIGNED NOT NULL,
  `id_criteria` tinyint(3) UNSIGNED NOT NULL,
  `value` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `saw_evaluations`
--

INSERT INTO `saw_evaluations` (`id_alternative`, `id_criteria`, `value`) VALUES
(1, 5, 4),
(1, 3, 2),
(1, 2, 2),
(2, 2, 3),
(1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `saw_users`
--

CREATE TABLE `saw_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `ulangi_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `saw_users`
--

INSERT INTO `saw_users` (`id_user`, `username`, `password`, `role`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `email`, `telepon`, `ulangi_password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '0000-00-00', '0', '', '', '', '', '', ''),
(2, 'admin', 'admin', 'admin', '0000-00-00', '0', '', '', '', 'hahaha@gmail.com', '', ''),
(3, 'user', '123456', 'user', 'subang', '2023-10-10', 'Laki-laki', 'Islam', 'reqwe', '', '123445', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `saw_alternatives`
--
ALTER TABLE `saw_alternatives`
  ADD PRIMARY KEY (`id_alternative`);

--
-- Indexes for table `saw_criterias`
--
ALTER TABLE `saw_criterias`
  ADD PRIMARY KEY (`id_criteria`);

--
-- Indexes for table `saw_evaluations`
--
ALTER TABLE `saw_evaluations`
  ADD PRIMARY KEY (`id_alternative`,`id_criteria`);

--
-- Indexes for table `saw_users`
--
ALTER TABLE `saw_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `saw_alternatives`
--
ALTER TABLE `saw_alternatives`
  MODIFY `id_alternative` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `saw_users`
--
ALTER TABLE `saw_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
