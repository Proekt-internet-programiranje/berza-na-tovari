-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2018 at 11:22 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berza_na_tovari`
--

-- --------------------------------------------------------

--
-- Table structure for table `tovar`
--

CREATE TABLE `tovar` (
  `id_tovar` int(50) NOT NULL,
  `id_kompanija` int(50) NOT NULL,
  `utovarno_mesto` varchar(50) COLLATE utf8_bin NOT NULL,
  `istovarno_mesto` varchar(50) COLLATE utf8_bin NOT NULL,
  `tezina` double NOT NULL,
  `cena` double NOT NULL,
  `tip_na_potrebno_vozilo` int(50) NOT NULL,
  `ima_tura` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tovar`
--

INSERT INTO `tovar` (`id_tovar`, `id_kompanija`, `utovarno_mesto`, `istovarno_mesto`, `tezina`, `cena`, `tip_na_potrebno_vozilo`, `ima_tura`) VALUES
(1, 12, 'asdasdasd', 'asdasd', 12313, 123123, 1, ''),
(3, 15, 'marskaldakslfpsmd p[brmfghb', 'dsfgsdfg vqer gherger', 234234, 234, 1, ''),
(4, 18, 'ewrew', 'rwerwe', 0, 0, 1, ''),
(5, 28, 'sdfsd', 'dsfs', 0, 0, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id_tovar`),
  ADD KEY `poseduva_tovar` (`id_kompanija`),
  ADD KEY `potrebno_vozilo` (`tip_na_potrebno_vozilo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id_tovar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tovar`
--
ALTER TABLE `tovar`
  ADD CONSTRAINT `poseduva_tovar` FOREIGN KEY (`id_kompanija`) REFERENCES `kompanija` (`id_kompanija`),
  ADD CONSTRAINT `potrebno_vozilo` FOREIGN KEY (`tip_na_potrebno_vozilo`) REFERENCES `tip_na_vozilo` (`id_tip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
