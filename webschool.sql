-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 12 jan 2024 kl 10:27
-- Serverversion: 10.4.24-MariaDB
-- PHP-version: 8.1.6

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `course`
--

INSERT INTO `course` (`course_ID`, `name_ID`, `color`, `active`) VALUES
(1, 14, 0xb86767, 0),
(2, 15, 0x679bb8, 0),
(3, 16, 0xb667b8, 1),
(4, 18, 0xff0000, 1),
(5, 19, 0x7829ae, 1),
(6, 20, 0xb5bf82, 1),
(7, 21, 0x8f8f8f, 1),
(8, 22, 0xffadad, 1),
(9, 23, 0xa33333, 1),
(10, 3, 0x71feb5, 1),
(11, 26, 0xff409f, 1),
(12, 25, 0x00ff40, 1),
(13, 28, 0x6026b8, 1),
(14, 29, 0xff0000, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `course_enrollments`
--

CREATE TABLE `course_enrollments` (
  `courseEnrollment_ID` int(11) NOT NULL,
  `course_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `course_enrollments`
--

INSERT INTO `course_enrollments` (`courseEnrollment_ID`, `course_ID`, `user_ID`, `grade`) VALUES
(2, 1, 17, ''),
(3, 4, 1, ''),
(4, 4, 17, ''),
(5, 4, 22, ''),
(6, 3, 21, ''),
(7, 3, 22, ''),
(8, 5, 17, ''),
(9, 9, 0, ''),
(10, 10, 1, ''),
(11, 11, 26, ''),
(12, 11, 25, ''),
(13, 12, 26, ''),
(14, 13, 26, ''),
(15, 14, 26, ''),
(16, 11, 27, '');

-- --------------------------------------------------------

--
-- Tabellstruktur `name`
--

CREATE TABLE `name` (
  `name_ID` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(18, 'Matte5'),
(19, 'Programmering'),
(20, 'Tyska 2'),
(21, 'svenska 6'),
(22, 'Kos 7'),
(23, 'Kos 8'),
(24, 'präst'),
(25, 'ost'),
(26, 'webb'),
(27, 'lol'),
(28, 'yes'),
(29, 'ww'),
(30, 'priest'),
(31, 'p');

-- --------------------------------------------------------

--
-- Tabellstruktur `news`
--

CREATE TABLE `news` (
  `post_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `news`
--

INSERT INTO `news` (`post_ID`, `user_ID`, `title`, `description`) VALUES
(4, 0, 'Det var fryx på fest', '6'),
(10, 0, 'gg game', 'gggg'),
(11, 0, 'Finns det 1080p skärmar som är 4K', 'Kan man se det osynliga');

-- --------------------------------------------------------

--
-- Tabellstruktur `posts`
--

CREATE TABLE `posts` (
  `post_ID` int(11) NOT NULL,
  `course_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `name_ID` int(11) NOT NULL,
  `publishingDate` datetime NOT NULL,
  `deadlineDate` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `posts`
--

INSERT INTO `posts` (`post_ID`, `course_ID`, `user_ID`, `name_ID`, `publishingDate`, `deadlineDate`, `description`) VALUES
(1, 11, 26, 27, '2024-01-09 14:04:26', '2024-03-15 00:00:00', 'min fru lämna mig lol');

-- --------------------------------------------------------

--
-- Tabellstruktur `role`
--

CREATE TABLE `role` (
  `role_ID` int(11) NOT NULL,
  `name_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `role`
--

INSERT INTO `role` (`role_ID`, `name_ID`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `submissions`
--

CREATE TABLE `submissions` (
  `submission_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `post_ID` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(24, 3, 4, 'hej@h.com', '202020-2020', 3, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(25, 24, 24, 'hej@sdfdsf.com', '041106-7777', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(26, 25, 25, 'tjoho@hej.com', '112233-1122', 3, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(27, 30, 31, 'nej@s.com', '555555-5555', 2, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

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
-- Index för tabell `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`post_ID`);

--
-- Index för tabell `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_ID`);

--
-- Index för tabell `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_ID`);

--
-- Index för tabell `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submission_ID`);

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
  MODIFY `course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT för tabell `course_enrollments`
--
ALTER TABLE `course_enrollments`
  MODIFY `courseEnrollment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT för tabell `name`
--
ALTER TABLE `name`
  MODIFY `name_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT för tabell `news`
--
ALTER TABLE `news`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT för tabell `posts`
--
ALTER TABLE `posts`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `role`
--
ALTER TABLE `role`
  MODIFY `role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submission_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
