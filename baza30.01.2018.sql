-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 02:38 AM
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
-- Table structure for table `kompanija`
--

CREATE TABLE `kompanija` (
  `id_kompanija` int(50) NOT NULL,
  `id_tipkompanija` int(50) NOT NULL,
  `imekompanija` varchar(50) COLLATE utf8_bin NOT NULL,
  `danocen_broj` int(50) NOT NULL,
  `e_mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `adresa` varchar(50) COLLATE utf8_bin NOT NULL,
  `telefon` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kompanija`
--

INSERT INTO `kompanija` (`id_kompanija`, `id_tipkompanija`, `imekompanija`, `danocen_broj`, `e_mail`, `adresa`, `telefon`) VALUES
(12, 2, 'Delcev Trans', 121313, 'delcev_company@yahoo.com', 'Mihajlo Pupin 13', 132123123),
(15, 3, 'POLIPROEKT', 2147483647, 'sdfsdf@dsfsd.com', 'wswrfwe', 123121123),
(18, 3, 'MAMA', 3242, 'sdfsdf', 'sdfsd', 0),
(25, 3, 'mayer', 213123, 'asdasd', '12331', 213123),
(28, 3, 'Spedicija', 324234, 'sdfkmkf@gmail.com', 'wefwer', 23424),
(29, 2, 'Abdal', 23423, 'mile.panika@gmail.com', 'ewrwerwe', 234234),
(36, 3, 'asdsafsd', 324234, 'ddsdfsd@gmail.com', 'adsfsd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnik` int(50) NOT NULL,
  `id_tipkorisnik` int(50) NOT NULL,
  `korisnicko_ime` varchar(50) COLLATE utf8_bin NOT NULL,
  `lozinka` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnik`, `id_tipkorisnik`, `korisnicko_ime`, `lozinka`) VALUES
(9, 1, 'dzoko', '4738019ef434f24099319565cd5185e5'),
(12, 2, 'Delcev Trans', 'c4ca4238a0b923820dcc509a6f75849b'),
(15, 3, 'poli', '0a89c133d3906c8bebbfe3cbf1598476'),
(16, 2, 'fanta', 'c4ca4238a0b923820dcc509a6f75849b'),
(18, 3, 'mama', 'c4ca4238a0b923820dcc509a6f75849b'),
(19, 3, 'fanta', 'proba'),
(20, 4, 'koka', 'kola'),
(23, 3, 'asdasd', 'a8f5f167f44f4964e6c998dee827110c'),
(24, 2, 'gfhfghg', 'adsdsa'),
(25, 3, 'asdasd', 'asdasdas'),
(27, 2, 'hhhhhh', 'f14029217ff5e7a50cdc7e70f686cf29'),
(28, 3, 'spedicija', 'c4ca4238a0b923820dcc509a6f75849b'),
(29, 2, 'prevoznik', 'c81e728d9d4c2f636f067f89cc14862c'),
(30, 4, 'vozac1', 'c4ca4238a0b923820dcc509a6f75849b'),
(31, 4, 'zdravev', 'c4ca4238a0b923820dcc509a6f75849b'),
(32, 4, 'zdravev007', 'c4ca4238a0b923820dcc509a6f75849b'),
(33, 4, 'cikaaaaa', 'c4ca4238a0b923820dcc509a6f75849b'),
(34, 4, 'CIKAJEBAC', 'c81e728d9d4c2f636f067f89cc14862c'),
(35, 4, 'spdnfsdnf', 'c81e728d9d4c2f636f067f89cc14862c'),
(36, 3, 'prevoznik1', 'c81e728d9d4c2f636f067f89cc14862c'),
(37, 4, 'sdfsdfsd', '6364d3f0f495b6ab9dcf8d3b5c6e0b01'),
(38, 4, 'sdfsdf', 'c81e728d9d4c2f636f067f89cc14862c'),
(39, 4, 'дсфсдф', '310dcbbf4cce62f762a2aaa148d556bd'),
(40, 4, 'sdf', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(41, 4, 'nexus', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `tip_na_vozilo`
--

CREATE TABLE `tip_na_vozilo` (
  `id_tip` int(50) NOT NULL,
  `visina` double NOT NULL,
  `tezina` double NOT NULL,
  `zafatnina` double NOT NULL,
  `sirina` double NOT NULL,
  `broj_na_oski` int(50) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tip_na_vozilo`
--

INSERT INTO `tip_na_vozilo` (`id_tip`, `visina`, `tezina`, `zafatnina`, `sirina`, `broj_na_oski`, `naziv`) VALUES
(1, 4, 19, 1, 1, 3, 'mega');

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

-- --------------------------------------------------------

--
-- Table structure for table `tura`
--

CREATE TABLE `tura` (
  `id_tura` int(50) NOT NULL,
  `id_spedicija` int(50) NOT NULL,
  `id_prevoznik` int(50) NOT NULL,
  `id_tovar` int(50) NOT NULL,
  `id_vozilo` int(50) NOT NULL,
  `id_vozac` int(50) NOT NULL,
  `zavrsena` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tura`
--

INSERT INTO `tura` (`id_tura`, `id_spedicija`, `id_prevoznik`, `id_tovar`, `id_vozilo`, `id_vozac`, `zavrsena`) VALUES
(1, 25, 12, 1, 1, 9, ''),
(2, 18, 12, 4, 1, 9, ''),
(3, 18, 12, 4, 1, 9, ''),
(4, 18, 29, 4, 2, 29, ''),
(5, 18, 12, 4, 1, 9, ''),
(6, 28, 12, 5, 1, 9, ''),
(7, 28, 12, 5, 1, 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `ulogi`
--

CREATE TABLE `ulogi` (
  `id_uloga` int(2) NOT NULL,
  `imeuloga` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ulogi`
--

INSERT INTO `ulogi` (`id_uloga`, `imeuloga`) VALUES
(1, 'Admin'),
(2, 'Prevoznik'),
(3, 'Spedicija'),
(4, 'Vozac');

-- --------------------------------------------------------

--
-- Table structure for table `vozac`
--

CREATE TABLE `vozac` (
  `id_vozac` int(50) NOT NULL,
  `id_kompanija` int(50) NOT NULL,
  `ime_vozac` varchar(50) COLLATE utf8_bin NOT NULL,
  `tip_na_vozacka` varchar(50) COLLATE utf8_bin NOT NULL,
  `ima_tura` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vozac`
--

INSERT INTO `vozac` (`id_vozac`, `id_kompanija`, `ime_vozac`, `tip_na_vozacka`, `ima_tura`) VALUES
(9, 12, 'Dzoko Misev', 'B', ''),
(29, 29, 'Andrej Sofer Zdravev', 'B', ''),
(30, 29, 'Andrej', 'B', ''),
(31, 29, 'Zdravev', 'B', ''),
(32, 29, 'Zdravev007', 'B', ''),
(33, 29, 'qweqwe', 'K', ''),
(37, 29, 'dfsfsdfsdf', 'C', ''),
(38, 29, 'dfsdf', 'sdfs', ''),
(39, 29, 'дфсдф', 'сдфсд', ''),
(40, 29, 'dsfs', 'sdfs', ''),
(41, 29, 'Andrej Zdravev', 'B', '');

-- --------------------------------------------------------

--
-- Table structure for table `vozilo`
--

CREATE TABLE `vozilo` (
  `id_vozilo` int(50) NOT NULL,
  `id_kompanija` int(50) NOT NULL,
  `tip_na_vozilo` int(50) NOT NULL,
  `slobodno` int(50) NOT NULL,
  `euro_standard` int(50) NOT NULL,
  `broj_na_sasija` int(50) NOT NULL,
  `tip_na_prikolka` varchar(50) COLLATE utf8_bin NOT NULL,
  `registracija` varchar(50) COLLATE utf8_bin NOT NULL,
  `ima_tura` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vozilo`
--

INSERT INTO `vozilo` (`id_vozilo`, `id_kompanija`, `tip_na_vozilo`, `slobodno`, `euro_standard`, `broj_na_sasija`, `tip_na_prikolka`, `registracija`, `ima_tura`) VALUES
(1, 12, 1, 0, 5, 13133, 'asdasd', '1232131', ''),
(2, 29, 1, 1, 213123, 123123, '123', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kompanija`
--
ALTER TABLE `kompanija`
  ADD PRIMARY KEY (`id_kompanija`),
  ADD KEY `id_tipkompanija` (`id_tipkompanija`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD KEY `id_tipkorisnik` (`id_tipkorisnik`);

--
-- Indexes for table `tip_na_vozilo`
--
ALTER TABLE `tip_na_vozilo`
  ADD PRIMARY KEY (`id_tip`);

--
-- Indexes for table `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id_tovar`),
  ADD KEY `poseduva_tovar` (`id_kompanija`),
  ADD KEY `potrebno_vozilo` (`tip_na_potrebno_vozilo`);

--
-- Indexes for table `tura`
--
ALTER TABLE `tura`
  ADD PRIMARY KEY (`id_tura`),
  ADD KEY `prevoznik` (`id_prevoznik`),
  ADD KEY `spedicija` (`id_spedicija`),
  ADD KEY `tovar` (`id_tovar`),
  ADD KEY `vozilo` (`id_vozilo`),
  ADD KEY `vozac` (`id_vozac`);

--
-- Indexes for table `ulogi`
--
ALTER TABLE `ulogi`
  ADD PRIMARY KEY (`id_uloga`);

--
-- Indexes for table `vozac`
--
ALTER TABLE `vozac`
  ADD PRIMARY KEY (`id_vozac`),
  ADD KEY `vozi_za` (`id_kompanija`);

--
-- Indexes for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD PRIMARY KEY (`id_vozilo`),
  ADD KEY `poseduva_vozilo` (`id_kompanija`),
  ADD KEY `vozilo_od_tip` (`tip_na_vozilo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kompanija`
--
ALTER TABLE `kompanija`
  MODIFY `id_kompanija` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnik` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tip_na_vozilo`
--
ALTER TABLE `tip_na_vozilo`
  MODIFY `id_tip` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id_tovar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tura`
--
ALTER TABLE `tura`
  MODIFY `id_tura` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vozilo`
--
ALTER TABLE `vozilo`
  MODIFY `id_vozilo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kompanija`
--
ALTER TABLE `kompanija`
  ADD CONSTRAINT `id_kompanija` FOREIGN KEY (`id_kompanija`) REFERENCES `korisnici` (`id_korisnik`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_tipkompanija` FOREIGN KEY (`id_tipkompanija`) REFERENCES `korisnici` (`id_tipkorisnik`);

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `id_tipkorisnik` FOREIGN KEY (`id_tipkorisnik`) REFERENCES `ulogi` (`id_uloga`);

--
-- Constraints for table `tovar`
--
ALTER TABLE `tovar`
  ADD CONSTRAINT `poseduva_tovar` FOREIGN KEY (`id_kompanija`) REFERENCES `kompanija` (`id_kompanija`),
  ADD CONSTRAINT `potrebno_vozilo` FOREIGN KEY (`tip_na_potrebno_vozilo`) REFERENCES `tip_na_vozilo` (`id_tip`);

--
-- Constraints for table `tura`
--
ALTER TABLE `tura`
  ADD CONSTRAINT `prevoznik` FOREIGN KEY (`id_prevoznik`) REFERENCES `kompanija` (`id_kompanija`),
  ADD CONSTRAINT `spedicija` FOREIGN KEY (`id_spedicija`) REFERENCES `kompanija` (`id_kompanija`),
  ADD CONSTRAINT `tovar` FOREIGN KEY (`id_tovar`) REFERENCES `tovar` (`id_tovar`),
  ADD CONSTRAINT `vozac` FOREIGN KEY (`id_vozac`) REFERENCES `vozac` (`id_vozac`),
  ADD CONSTRAINT `vozilo` FOREIGN KEY (`id_vozilo`) REFERENCES `vozilo` (`id_vozilo`);

--
-- Constraints for table `vozac`
--
ALTER TABLE `vozac`
  ADD CONSTRAINT `id_vozac` FOREIGN KEY (`id_vozac`) REFERENCES `korisnici` (`id_korisnik`),
  ADD CONSTRAINT `vozi_za` FOREIGN KEY (`id_kompanija`) REFERENCES `kompanija` (`id_kompanija`);

--
-- Constraints for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD CONSTRAINT `poseduva_vozilo` FOREIGN KEY (`id_kompanija`) REFERENCES `kompanija` (`id_kompanija`),
  ADD CONSTRAINT `vozilo_od_tip` FOREIGN KEY (`tip_na_vozilo`) REFERENCES `tip_na_vozilo` (`id_tip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
