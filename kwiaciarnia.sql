-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2025 at 01:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kwiaciarnia`
--

-- --------------------------------------------------------

--
-- Table structure for table `karty`
--

CREATE TABLE `karty` (
  `id` int(255) NOT NULL,
  `nadawca` text NOT NULL,
  `odbiorca` text NOT NULL,
  `kwota` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karty`
--

INSERT INTO `karty` (`id`, `nadawca`, `odbiorca`, `kwota`) VALUES
(1, 'zzzz', 'Szymon', '123'),
(2, 'zzzz', 'Szymon', '123'),
(3, 'zzzz', 'Szymon', '123'),
(4, 'zzzz', 'Szymon', '123'),
(5, 'zzzz', 'Szymon', '123'),
(6, 'Zosi', 'Szymona', '600'),
(7, 'Zosi', 'Szymona', '600'),
(8, 'Zosi', 'Pani Agnieszki', '1000'),
(9, 'yo', 'gurt', '6666');

-- --------------------------------------------------------

--
-- Table structure for table `klienci`
--

CREATE TABLE `klienci` (
  `id` int(100) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `login` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefon` int(9) NOT NULL,
  `haslo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id`, `imie`, `nazwisko`, `login`, `email`, `telefon`, `haslo`) VALUES
(1, 'Szymon', 'Rospondek', 'Szymek', 'szymon.rospondek@gmail.com', 132123123, 'a2c7aa037e297b6cafac98d0fc309c9eba29a6eb'),
(2, 'Aron', 'Doluk', 'Arą', 'arondoluk@gmail.com', 123123123, 'dcec4f893088859312cb2e9ea2e3dc9d732342cf'),
(3, 'Aron', 'Doluk', 'Arą', 'arondoluk@gmail.com', 123123123, 'dcec4f893088859312cb2e9ea2e3dc9d732342cf');

-- --------------------------------------------------------

--
-- Table structure for table `recenzje`
--

CREATE TABLE `recenzje` (
  `id` int(255) NOT NULL,
  `login_uzytkownika` varchar(255) NOT NULL,
  `tresc` varchar(30) NOT NULL,
  `zdjecie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recenzje`
--

INSERT INTO `recenzje` (`id`, `login_uzytkownika`, `tresc`, `zdjecie`) VALUES
(26, 'Szymek', 'mega super duper fajne', 'rose-7903170_640.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karty`
--
ALTER TABLE `karty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recenzje`
--
ALTER TABLE `recenzje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karty`
--
ALTER TABLE `karty`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recenzje`
--
ALTER TABLE `recenzje`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
