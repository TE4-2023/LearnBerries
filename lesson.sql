-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 19 jan 2024 kl 13:12
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
-- Tabellstruktur `lesson`
--

CREATE TABLE `lesson` (
  `lessonID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `lessonTimeMin` int(11) NOT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `lesson`
--

INSERT INTO `lesson` (`lessonID`, `courseID`, `startTime`, `lessonTimeMin`, `day`) VALUES
(1, 1, '10:00:00', 60, 0),
(2, 4, '12:00:00', 60, 2),
(3, 1, '13:00:00', 60, 4),
(4, 4, '09:00:00', 60, 1);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lessonID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
