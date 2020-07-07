-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 02:14 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_aaws_davis`
--

CREATE TABLE `data_aaws_davis` (
  `id` bigint(20) NOT NULL,
  `id_aws` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `radiasi` decimal(10,1) DEFAULT NULL,
  `suhu` decimal(10,0) DEFAULT NULL,
  `tekanan_udara` decimal(10,0) DEFAULT NULL,
  `kecepatan_angin` decimal(10,0) DEFAULT NULL,
  `arah_angin` decimal(10,0) DEFAULT NULL,
  `curah_hujan` decimal(10,0) DEFAULT NULL,
  `kelembaban` decimal(10,0) DEFAULT NULL,
  `ultraviolet` decimal(10,0) DEFAULT NULL,
  `et` decimal(10,0) DEFAULT NULL,
  `suhu_tanah1` decimal(10,0) DEFAULT NULL,
  `suhu_tanah2` decimal(10,0) DEFAULT NULL,
  `suhu_tanah3` decimal(10,0) DEFAULT NULL,
  `suhu_tanah4` decimal(10,0) DEFAULT NULL,
  `soil_mosture1` decimal(10,0) DEFAULT NULL,
  `soil_mosture2` decimal(10,0) DEFAULT NULL,
  `soil_mosture3` decimal(10,0) DEFAULT NULL,
  `soil_mosture4` decimal(10,0) DEFAULT NULL,
  `leafwetnes1` decimal(10,0) DEFAULT NULL,
  `leafwetnes2` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_aaws_davis`
--
ALTER TABLE `data_aaws_davis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_aaws_davis`
--
ALTER TABLE `data_aaws_davis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
