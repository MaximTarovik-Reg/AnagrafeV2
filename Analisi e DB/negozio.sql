-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 09:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `negozio`
--

-- --------------------------------------------------------

--
-- Table structure for table `acquisti`
--

CREATE TABLE `acquisti` (
  `id_acquisto` int(8) NOT NULL,
  `data` datetime NOT NULL,
  `somma` float(8,2) NOT NULL,
  `email` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acquisti`
--

INSERT INTO `acquisti` (`id_acquisto`, `data`, `somma`, `email`) VALUES
(3, '2021-09-15 10:32:57', 60.00, 'luigi.russo@gmail.com'),
(6, '2021-09-16 09:52:39', 500.00, 'kaneki.tarovik@gmail.com'),
(7, '2021-09-17 08:57:31', 465.00, 'sofya.tarovik@gmail.com'),
(8, '2021-09-17 08:57:57', 465.00, 'kaneki.tarovik@gmail.com'),
(9, '2021-09-17 11:59:19', 24.50, 'gigi.buffon@gmail.com'),
(12, '2021-09-17 16:37:12', 50000.00, 'erica.moretti@gmail.com'),
(13, '2021-09-20 08:54:42', 467.26, 'martino.leone@gmail.com'),
(14, '2021-09-20 09:28:29', 124.53, 'clara.bricchi@gmail.com'),
(15, '2021-09-20 09:28:53', 45.21, 'francesca.torricelli');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `email` varchar(128) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `cognome` varchar(128) NOT NULL,
  `cf` varchar(16) NOT NULL,
  `data_nascita` date NOT NULL,
  `città` varchar(128) NOT NULL,
  `provincia` varchar(128) NOT NULL,
  `via` varchar(128) NOT NULL,
  `n_civ` int(5) NOT NULL,
  `CAP` int(5) NOT NULL,
  `data_iscrizione` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`email`, `nome`, `cognome`, `cf`, `data_nascita`, `città`, `provincia`, `via`, `n_civ`, `CAP`, `data_iscrizione`) VALUES
('clara.bricchi@gmail.com', 'Clara', 'Bricchi', 'LHOHNS84T60B688Y', '2003-03-22', 'Brescia', 'BS', 'Vietta', 10, 22098, '2021-09-20'),
('erica.moretti@gmail.com', 'Erica', 'Moretti', 'FNKMPQ70E12F232F', '2003-06-18', 'Brescia', 'BS', 'Piave', 25, 25123, '2021-09-17'),
('francesca.torricelli', 'Francesca', 'Torricelli', 'FNKMPQ70E12F232F', '2004-03-06', 'Brescia', 'BS', 'San Marco', 3, 24987, '2021-09-17'),
('gigi.buffon@gmail.com', 'Gianluigi', 'Buffon', 'MCVPCM32S07G416B', '1984-02-24', 'Massa', 'PS', 'Mandarino', 98, 24987, '2021-09-17'),
('giuseppe.tagliani@gmail.com', 'Giuseppe', 'Tagliani', 'GSPTGL81J20B923M', '1981-07-20', 'Padova', 'PD', 'Verdi', 4, 20723, '2021-09-17'),
('kaneki.tarovik@gmail.com', 'Luigi', 'Rossi', 'BWHMGS61R57D734G', '2001-05-03', 'Brescia', 'BS', 'Veneto', 34, 22098, '2021-09-16'),
('luigi.russo@gmail.com', 'Luigi', 'Russo', 'VZVHHZ54M09B531L', '2001-09-12', 'Brescia', 'BS', 'Bassi', 28, 25312, '2021-09-14'),
('martina.bono@gmail.com', 'Martina', 'Bono', 'MCVPCM32S07G416B', '2003-06-24', 'Brescia', 'BS', 'Sardegna', 2, 25982, '2021-09-17'),
('martino.leone@gmail.com', 'Martino', 'Leone', 'TRVSFY98L42Z154O', '2002-09-28', 'Brescia', 'BS', 'Oberdan', 2, 25128, '2021-09-20'),
('ralph.gorban@gmail.com', 'Ralph', 'Gorban', 'GRBRPH02M09P987M', '2002-12-09', 'Brescia', 'BS', 'Fermi', 16, 25128, '2021-09-20'),
('sofya.tarovik@gmail.com', 'Sofya', 'Tarovik', 'TRVSFY98L42Z154O', '1998-11-02', 'Brescia', 'BS', 'Biseo', 5, 25128, '2021-09-16'),
('valentino.rossi@gmail.com', 'Valentino', 'Rossi', 'LHOHNS84T60B688Y', '1990-02-01', 'Brescia', 'BS', 'Veneto', 98, 24987, '2021-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `gestione`
--

CREATE TABLE `gestione` (
  `id_operatore` int(5) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `operatori`
--

CREATE TABLE `operatori` (
  `id_operatore` int(5) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `cognome` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operatori`
--

INSERT INTO `operatori` (`id_operatore`, `nome`, `cognome`, `username`, `password`) VALUES
(1, 'Maxim', 'Tarovik', 'maxim.tarovik', '6e6bc4e49dd477ebc98ef4046c067b5f'),
(2, 'Martino', 'Leone', 'martino.leone', '27d622a44d1ac29016ba8d8c36fc8460');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acquisti`
--
ALTER TABLE `acquisti`
  ADD PRIMARY KEY (`id_acquisto`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `gestione`
--
ALTER TABLE `gestione`
  ADD PRIMARY KEY (`id_operatore`,`email`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `operatori`
--
ALTER TABLE `operatori`
  ADD PRIMARY KEY (`id_operatore`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acquisti`
--
ALTER TABLE `acquisti`
  MODIFY `id_acquisto` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `operatori`
--
ALTER TABLE `operatori`
  MODIFY `id_operatore` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acquisti`
--
ALTER TABLE `acquisti`
  ADD CONSTRAINT `acquisti_ibfk_1` FOREIGN KEY (`email`) REFERENCES `clienti` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `gestione`
--
ALTER TABLE `gestione`
  ADD CONSTRAINT `gestione_ibfk_1` FOREIGN KEY (`id_operatore`) REFERENCES `operatori` (`id_operatore`) ON DELETE CASCADE,
  ADD CONSTRAINT `gestione_ibfk_2` FOREIGN KEY (`email`) REFERENCES `clienti` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
