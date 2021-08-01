-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 08:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_latih`
--

CREATE TABLE `data_latih` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `status_of_marriage` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status_of_house` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `income` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `age` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `payment_status` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_latih`
--

INSERT INTO `data_latih` (`id`, `name`, `status_of_marriage`, `status_of_house`, `income`, `age`, `payment_status`) VALUES
(1, 'kus***adi', 'married', 'private', 'low', 'old', 'smooth'),
(2, 'mu***id', 'married', 'private', 'low', 'young', 'smooth'),
(3, 'ahm** ****ani', 'married', 'private', 'high', 'old', 'smooth'),
(4, 'nu**ni', 'widow', 'private', 'low', 'middle', 'smooth'),
(5, 'sur** ****jaya', 'married', 'rented', 'medium', 'middle', 'stuck'),
(6, 'su**no', 'married', 'private', 'low', 'young', 'stuck'),
(7, 'su****man', 'married', 'private', 'medium', 'old', 'stuck'),
(8, 'su***lah', 'widow', 'rented', 'low', 'old', 'stuck'),
(9, 'as**ti', 'widow', 'private', 'low', 'old', 'stuck'),
(10, 'wi***to', 'married', 'private', 'medium', 'young', 'stuck');

-- --------------------------------------------------------

--
-- Table structure for table `data_uji`
--

CREATE TABLE `data_uji` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `status_of_marriage` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status_of_house` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `income` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `age` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `payment_status` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `result` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `id_rule` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gain`
--

CREATE TABLE `gain` (
  `id` int(11) NOT NULL,
  `node_id` int(11) DEFAULT NULL,
  `atribut` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `gain` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_prediksi`
--

CREATE TABLE `hasil_prediksi` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `status_of_marriage` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status_of_house` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `income` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `age` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `result` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `id_rule` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rasio_gain`
--

CREATE TABLE `rasio_gain` (
  `id` int(11) NOT NULL,
  `opsi` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `cabang1` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `cabang2` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `rasio_gain` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_keputusan`
--

CREATE TABLE `t_keputusan` (
  `id` int(11) NOT NULL,
  `parent` text CHARACTER SET latin1 DEFAULT NULL,
  `akar` text CHARACTER SET latin1 DEFAULT NULL,
  `keputusan` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `password` text CHARACTER SET latin1 DEFAULT NULL,
  `level` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '0192023a7bbd73250516f069df18b500', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_latih`
--
ALTER TABLE `data_latih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_uji`
--
ALTER TABLE `data_uji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gain`
--
ALTER TABLE `gain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_prediksi`
--
ALTER TABLE `hasil_prediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rasio_gain`
--
ALTER TABLE `rasio_gain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_keputusan`
--
ALTER TABLE `t_keputusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_latih`
--
ALTER TABLE `data_latih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_uji`
--
ALTER TABLE `data_uji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gain`
--
ALTER TABLE `gain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_prediksi`
--
ALTER TABLE `hasil_prediksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rasio_gain`
--
ALTER TABLE `rasio_gain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_keputusan`
--
ALTER TABLE `t_keputusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
