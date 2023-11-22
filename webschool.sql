-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 22 nov 2023 kl 14:48
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
-- Tabellstruktur `color`
--

CREATE TABLE `color` (
  `ID` int(11) NOT NULL,
  `hex` binary(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `course`
--

CREATE TABLE `course` (
  `ID` int(11) NOT NULL,
  `name_ID` int(11) NOT NULL,
  `color` binary(3) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `course`
--

INSERT INTO `course` (`ID`, `name_ID`, `color`, `active`) VALUES
(1, 14, 0xb86767, 0),
(2, 15, 0x679bb8, 0),
(3, 16, 0xb667b8, 1),
(4, 18, 0xff0000, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `course_enrollments`
--

CREATE TABLE `course_enrollments` (
  `ID` int(11) NOT NULL,
  `course_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `name`
--

CREATE TABLE `name` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `name`
--

INSERT INTO `name` (`ID`, `name`) VALUES
(1, 'Student'),
(2, 'Teacher'),
(3, 'Erwin'),
(4, 'Hörnell'),
(5, 'Margo'),
(6, 'Smargi'),
(7, 'Linus'),
(8, 'beg'),
(9, 'po'),
(10, 'abdi'),
(11, 'das'),
(12, 'kevin'),
(13, 'kos'),
(14, 'Matte2c'),
(15, 'svenska5'),
(16, 'fysik2'),
(17, 'eng7'),
(18, 'Matte5');

-- --------------------------------------------------------

--
-- Tabellstruktur `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `name_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `role`
--

INSERT INTO `role` (`ID`, `name_ID`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name_ID` int(11) NOT NULL,
  `lastname_ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `ssn` text NOT NULL,
  `role_ID` int(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`ID`, `name_ID`, `lastname_ID`, `email`, `ssn`, `role_ID`, `password`) VALUES
(1, 3, 4, 'Big@Big.Big', '000000-9999', 3, '5c322d4b606d774bdfbd7f31fdec6015634410c6'),
(2, 5, 6, 'smargi@gmail.com', '999999-0000', 3, '5c322d4b606d774bdfbd7f31fdec6015634410c6'),
(17, 7, 9, 'linus@pob.com', '123456-1234', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(21, 10, 10, 'abdi@abdi', '010101-0101', 3, 'ac5da1eca9af0de80a7f135970e6357b75d940bd'),
(22, 11, 11, 's@s.com', '222222-2222', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(23, 12, 13, 'kevin@k.com', '111111-1111', 3, '056eafe7cf52220de2df36845b8ed170c67e23e3'),
(24, 3, 4, 'hej@h.com', '202020-2020', 3, '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `name`
--
ALTER TABLE `name`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `color`
--
ALTER TABLE `color`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `course`
--
ALTER TABLE `course`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `course_enrollments`
--
ALTER TABLE `course_enrollments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `name`
--
ALTER TABLE `name`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT för tabell `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 22 nov 2023 kl 14:58
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
-- Tabellstruktur `course`
--

CREATE TABLE `course` (
  `course_ID` int(11) NOT NULL,
  `name_ID` int(11) NOT NULL,
  `color` binary(3) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `course`
--

INSERT INTO `course` (`course_ID`, `name_ID`, `color`, `active`) VALUES
(1, 14, 0xb86767, 0),
(2, 15, 0x679bb8, 0),
(3, 16, 0xb667b8, 1),
(4, 18, 0xff0000, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `course_enrollments`
--

CREATE TABLE `course_enrollments` (
  `courseEnrollment_ID` int(11) NOT NULL,
  `course_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `name`
--

CREATE TABLE `name` (
  `name_ID` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `name`
--

INSERT INTO `name` (`name_ID`, `name`) VALUES
(1, 'Student'),
(2, 'Teacher'),
(3, 'Erwin'),
(4, 'Hörnell'),
(5, 'Margo'),
(6, 'Smargi'),
(7, 'Linus'),
(8, 'beg'),
(9, 'po'),
(10, 'abdi'),
(11, 'das'),
(12, 'kevin'),
(13, 'kos'),
(14, 'Matte2c'),
(15, 'svenska5'),
(16, 'fysik2'),
(17, 'eng7'),
(18, 'Matte5');

-- --------------------------------------------------------

--
-- Tabellstruktur `role`
--

CREATE TABLE `role` (
  `role_ID` int(11) NOT NULL,
  `name_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `role`
--

INSERT INTO `role` (`role_ID`, `name_ID`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `name_ID` int(11) NOT NULL,
  `lastname_ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `ssn` text NOT NULL,
  `role_ID` int(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`user_ID`, `name_ID`, `lastname_ID`, `email`, `ssn`, `role_ID`, `password`) VALUES
(1, 3, 4, 'Big@Big.Big', '000000-9999', 3, '5c322d4b606d774bdfbd7f31fdec6015634410c6'),
(2, 5, 6, 'smargi@gmail.com', '999999-0000', 3, '5c322d4b606d774bdfbd7f31fdec6015634410c6'),
(17, 7, 9, 'linus@pob.com', '123456-1234', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(21, 10, 10, 'abdi@abdi', '010101-0101', 3, 'ac5da1eca9af0de80a7f135970e6357b75d940bd'),
(22, 11, 11, 's@s.com', '222222-2222', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(23, 12, 13, 'kevin@k.com', '111111-1111', 3, '056eafe7cf52220de2df36845b8ed170c67e23e3'),
(24, 3, 4, 'hej@h.com', '202020-2020', 3, '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_ID`);

--
-- Index för tabell `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD PRIMARY KEY (`courseEnrollment_ID`);

--
-- Index för tabell `name`
--
ALTER TABLE `name`
  ADD PRIMARY KEY (`name_ID`);

--
-- Index för tabell `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_ID`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `course`
--
ALTER TABLE `course`
  MODIFY `course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `course_enrollments`
--
ALTER TABLE `course_enrollments`
  MODIFY `courseEnrollment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `name`
--
ALTER TABLE `name`
  MODIFY `name_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT för tabell `role`
--
ALTER TABLE `role`
  MODIFY `role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
