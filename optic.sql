-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 06:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optic`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(3) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `telepon_customer` varchar(20) NOT NULL,
  `alamat_customer` varchar(40) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `telepon_customer`, `alamat_customer`, `deleted_at`) VALUES
(1, 'Novita Auliya', '081234567266', 'Semarang', NULL),
(2, 'Erina', '081344556691', 'Jakarta Barat', NULL),
(3, 'Fabian', '081499887723', 'Semarang', NULL),
(4, 'Salahudin', '081244556689', 'Semarang', NULL),
(5, 'Jamet', '08211223356', 'Jakarta Selatan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kacamata`
--

CREATE TABLE `kacamata` (
  `id_kacamata` int(3) NOT NULL,
  `jenis_kacamata` varchar(25) NOT NULL,
  `harga_kacamata` int(30) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kacamata`
--

INSERT INTO `kacamata` (`id_kacamata`, `jenis_kacamata`, `harga_kacamata`, `deleted_at`) VALUES
(1, 'Frame Wayfarer', 7000000, NULL),
(2, 'Frame Cat Eye', 4000000, NULL),
(3, 'Frame Rimless', 6500000, NULL),
(4, 'Frame Bulat', 2000000, NULL),
(5, 'Frame Oversized', 4500000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(3) NOT NULL,
  `id_customer` int(3) NOT NULL,
  `id_kacamata` int(3) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `id_kacamata`, `tanggal_transaksi`) VALUES
(1, 1, 4, '2022-07-06'),
(2, 2, 2, '2022-12-15'),
(3, 3, 1, '2022-12-29'),
(4, 4, 5, '2022-12-14'),
(5, 5, 5, '2022-12-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kacamata`
--
ALTER TABLE `kacamata`
  ADD PRIMARY KEY (`id_kacamata`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `ID CUSTOMER` (`id_customer`),
  ADD KEY `ID KACAMATA` (`id_kacamata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kacamata`
--
ALTER TABLE `kacamata`
  MODIFY `id_kacamata` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
