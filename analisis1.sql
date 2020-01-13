-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2020 at 02:18 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `analisis1`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `jenis_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nama`, `jk`, `jenis_data`) VALUES
(1, 'ahmad', 'pria', 0),
(2, 'robbiul', 'pria', 0),
(3, 'barbosa', 'pria', 0),
(4, 'iman', 'pria', 0),
(5, 'reynaldi', 'pria', 0),
(6, 'stiawan', 'pria', 0),
(7, 'adzan', 'pria', 0),
(8, 'naufal', 'pria', 0),
(9, 'adzkari', 'pria', 0),
(10, 'nurulia', 'wanita', 0),
(11, 'oktavian', 'wanita', 0),
(12, 'dita', 'wanita', 0),
(13, 'khamsyatun', 'wanita', 0),
(14, 'enny', 'wanita', 0),
(15, 'muhammad', 'pria', 0),
(16, 'hasrin', 'pria', 0),
(17, 'nizam', 'pria', 0),
(18, 'van persie', 'pria', 0),
(19, 'james', 'pria', 0),
(20, 'daniell', 'pria', 0),
(21, 'obi', 'pria', 0),
(22, 'mecca', 'wanita', 0),
(23, 'luffi', 'pria', 0),
(24, 'boruto', 'pria', 0),
(25, 'sarada', 'wanita', 0),
(26, 'shimozuki', 'pria', 0),
(27, 'honekawa', 'pria', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jarak`
--

CREATE TABLE `jarak` (
  `id` int(11) NOT NULL,
  `kordinat` float NOT NULL,
  `radius` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jarak`
--

INSERT INTO `jarak` (`id`, `kordinat`, `radius`, `no_urut`, `id_driver`, `Status`, `id_user`) VALUES
(1, 6, 11, 1, 1, 2, 0),
(2, 4.4, 12, 1, 2, 2, 0),
(3, 4.1, 13, 1, 3, 2, 0),
(4, 9.1, 14, 1, 4, 2, 0),
(5, 8.9, 15, 1, 5, 2, 0),
(6, 6.8, 16, 1, 6, 3, 0),
(7, 7.2, 17, 1, 7, 3, 0),
(8, 5, 18, 1, 8, 3, 0),
(9, 5.2, 19, 1, 9, 3, 0),
(10, 4.5, 17, 1, 10, 3, 0),
(11, 8.6, 21, 1, 11, 3, 0),
(12, 7.6, 22, 1, 12, 4, 0),
(13, 5.4, 23, 1, 13, 4, 0),
(14, 7.8, 24, 1, 14, 4, 0),
(15, 7.4, 25, 1, 15, 4, 0),
(16, 7.1, 5, 1, 16, 2, 0),
(17, 6.1, 13, 1, 17, 4, 0),
(18, 7.8, 19, 1, 18, 1, 0),
(19, 8.7, 18, 1, 19, 3, 0),
(20, 5.5, 17, 1, 20, 1, 0),
(21, 8, 20, 1, 21, 4, 0),
(22, 9.6, 18, 1, 22, 2, 0),
(23, 4.9, 15, 1, 23, 3, 0),
(24, 6.7, 14, 1, 24, 3, 0),
(25, 8.8, 17, 1, 25, 2, 0),
(26, 5, 17, 1, 26, 1, 0),
(27, 9.9, 13, 1, 27, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `jarak`
--
ALTER TABLE `jarak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_driver` (`id_driver`),
  ADD KEY `id_user` (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jarak`
--
ALTER TABLE `jarak`
  ADD CONSTRAINT `jarak_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id_driver`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
