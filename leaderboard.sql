-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 03:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leaderboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `lomba`
--

CREATE TABLE `lomba` (
  `id_lomba` int(11) NOT NULL,
  `nama_lomba` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lomba`
--

INSERT INTO `lomba` (`id_lomba`, `nama_lomba`, `status`, `user_id`) VALUES
(1, 'Lomba 1', 1, 23),
(2, 'Lomba 2', 0, 23);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_point` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `id_lomba` int(11) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_point`, `id_peserta`, `id_lomba`, `nilai`, `user_id`) VALUES
(1, 0, 0, 10, 23),
(2, 0, 0, 11, 23),
(3, 0, 0, 13, 23),
(4, 0, 0, 12, 23),
(5, 0, 0, 10, 23),
(6, 0, 0, 29, 23),
(7, 0, 0, 18, 23),
(8, 0, 0, 84, 23),
(9, 0, 0, 81, 23),
(10, 0, 0, 81, 23),
(11, 0, 0, 25, 23),
(12, 0, 0, 21, 23),
(13, 0, 0, 55, 23),
(14, 0, 0, 41, 23),
(15, 0, 0, 71, 23),
(16, 0, 0, 32, 23),
(17, 0, 0, 87, 23),
(18, 2, 1, 1, 23),
(19, 3, 1, 2, 23),
(20, 4, 1, 3, 23),
(21, 5, 1, 4, 23),
(22, 6, 1, 5, 23),
(23, 7, 1, 6, 23),
(24, 8, 1, 5, 23),
(25, 9, 1, 12, 23),
(26, 10, 1, 51, 23),
(27, 11, 1, 22, 23),
(28, 12, 1, 12, 23),
(29, 13, 1, 12, 23),
(30, 14, 1, 21, 23),
(31, 15, 1, 55, 23),
(32, 16, 1, 34, 23),
(33, 17, 1, 66, 23),
(34, 18, 1, 78, 23);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `nama_peserta` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT 'stockphoto.jpg',
  `user_id` int(11) NOT NULL DEFAULT 23
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nama_peserta`, `foto`, `user_id`) VALUES
(2, 'Kwarran Brebes', 'stockphoto.jpg', 23),
(3, 'Kwarran Wanasari', 'stockphoto.jpg', 23),
(4, 'Kwarran Bulakamba', 'stockphoto.jpg', 23),
(5, 'Kwarran Tanjung', 'stockphoto.jpg', 23),
(6, 'Kwarran Losari', 'stockphoto.jpg', 23),
(7, 'Kwarran Banjarharjo', 'stockphoto.jpg', 23),
(8, 'Kwarran Kersana', 'stockphoto.jpg', 23),
(9, 'Kwarran Ketanggungan', 'stockphoto.jpg', 23),
(10, 'Kwarran Larangan', 'stockphoto.jpg', 23),
(11, 'Kwarran Jatibarang', 'stockphoto.jpg', 23),
(12, 'Kwarran Songgom', 'stockphoto.jpg', 23),
(13, 'Kwarran Tonjong', 'stockphoto.jpg', 23),
(14, 'Kwarran Sirampog', 'stockphoto.jpg', 23),
(15, 'Kwarran Bumiayu', 'stockphoto.jpg', 23),
(16, 'Kwarran Paguyangan', 'stockphoto.jpg', 23),
(17, 'Kwarran Bantarkawung', 'stockphoto.jpg', 23),
(18, 'Kwarran Salem', 'stockphoto.jpg', 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_username` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `namaUsaha` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_username`, `username`, `namaUsaha`, `password`) VALUES
(23, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`id_lomba`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_point`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id_lomba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_username` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
