-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 12 jan 2024 kl 12:19
-- Serverversion: 10.4.28-MariaDB
-- PHP-version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `webschool`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `absence`
--

CREATE TABLE `absence` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `course_ID` int(11) DEFAULT NULL,
  `pre_registered` bit(1) DEFAULT NULL,
  `absence` int(11) DEFAULT NULL,
  `absence_set_at` datetime DEFAULT NULL,
  `lesson_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `absence`
--

INSERT INTO `absence` (`ID`, `user_ID`, `course_ID`, `pre_registered`, `absence`, `absence_set_at`, `lesson_ID`) VALUES
(1, 1, 4, b'1', 0, '2024-01-12 09:46:00', NULL),
(2, 17, 4, b'0', 5, '2024-01-12 09:46:00', NULL),
(3, 22, 4, b'0', 10, '2024-01-12 09:46:00', NULL),
(4, 1, 4, b'1', 0, '2024-01-12 10:16:00', NULL),
(5, 17, 4, b'0', 10, '2024-01-12 10:16:00', NULL),
(6, 22, 4, b'0', 20, '2024-01-12 10:16:00', NULL);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `absence`
--
ALTER TABLE `absence`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
