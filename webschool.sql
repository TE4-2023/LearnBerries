-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 12 jan 2024 kl 13:31
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
(1, 14, 0xb86767, 1),
(2, 15, 0x679bb8, 0),
(3, 16, 0xb667b8, 1),
(4, 18, 0xff0000, 1),
(5, 19, 0x7829ae, 1),
(6, 20, 0xb5bf82, 1),
(7, 21, 0x8f8f8f, 1),
(8, 22, 0xffadad, 1),
(9, 23, 0xa33333, 1),
(10, 3, 0x71feb5, 1),
(12, 27, 0xffffff, 1),
(13, 26, 0x6026b8, 1),
(14, 19, 0xff0000, 1),
(15, 29, 0x000000, 1),
(16, 62, 0x001eff, 1);

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

--
-- Dumpning av Data i tabell `course_enrollments`
--

INSERT INTO `course_enrollments` (`courseEnrollment_ID`, `course_ID`, `user_ID`, `grade`) VALUES
(3, 4, 1, ''),
(4, 4, 17, ''),
(5, 4, 22, ''),
(6, 3, 21, ''),
(7, 3, 22, ''),
(8, 5, 17, ''),
(9, 9, 0, ''),
(10, 10, 1, ''),
(11, 11, 25, ''),
(12, 11, 23, 'A'),
(13, 11, 26, 'F'),
(14, 1, 25, ''),
(15, 12, 25, ''),
(16, 13, 25, ''),
(155, 13, 1, 'A'),
(156, 13, 24, 'F'),
(157, 13, 23, ''),
(158, 13, 17, ''),
(159, 1, 1, ''),
(160, 1, 23, ''),
(161, 14, 25, ''),
(162, 13, 26, 'B'),
(163, 15, 25, ''),
(164, 16, 25, ''),
(165, 16, 26, '');

-- --------------------------------------------------------

--
-- Tabellstruktur `exam`
--

CREATE TABLE `exam` (
  `exam_ID` int(11) NOT NULL,
  `course_ID` int(11) NOT NULL,
  `name_ID` int(11) NOT NULL,
  `examinationDate` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `exam`
--

INSERT INTO `exam` (`exam_ID`, `course_ID`, `name_ID`, `examinationDate`, `description`) VALUES
(4, 1, 29, '2024-01-06 14:25:00', ''),
(5, 1, 36, '2024-01-10 13:25:00', 'matte matte matee'),
(6, 1, 37, '2024-01-12 13:27:00', 'SSSSSSSSSIIIIIIRRRRRR'),
(7, 1, 38, '2024-01-10 13:30:00', ''),
(19, 14, 29, '2024-01-05 10:03:00', 's'),
(20, 13, 29, '2024-01-06 10:04:00', 's'),
(21, 13, 29, '2024-01-05 10:04:00', 's'),
(22, 13, 60, '2024-01-11 10:11:00', ''),
(23, 14, 61, '2024-01-12 10:22:00', ''),
(24, 13, 29, '2024-01-12 10:57:00', '');

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
(18, 'Matte5'),
(19, 'Programmering'),
(20, 'Tyska 2'),
(21, 'svenska 6'),
(22, 'Kos 7'),
(23, 'Kos 8'),
(24, 'Hampus'),
(25, 'Carlsson'),
(26, 'hemkunskap'),
(27, 'bulle'),
(28, 'baka något'),
(29, 's'),
(30, 'a'),
(31, 'Skapa ett python program som rullar en tärning'),
(32, 'TEST TEST TEST TEST'),
(33, 'DETTA VAR ETT PROV'),
(34, 'python certifikat'),
(35, 'Gör en princesstårta'),
(36, 'Matteprov'),
(37, 'MATTEEEEEE'),
(38, 'sssssssssss'),
(39, 'princess tårta'),
(40, 'okok'),
(41, 'sss'),
(42, 'dddd'),
(43, 'ssddsss'),
(44, '1'),
(45, '2'),
(46, '3'),
(47, 'ss'),
(48, 'ssssss'),
(49, 'x'),
(50, 'ddd'),
(51, 'procent och bråk'),
(52, 'as'),
(53, 'sa'),
(54, 'nytt prov1'),
(55, 'nytt prov2'),
(56, 'kki'),
(57, 'sdasdas'),
(58, 'xxxx'),
(59, 'xxx'),
(60, 'Kevin ska bli slagen'),
(61, 'certfikat'),
(62, 'test');

-- --------------------------------------------------------

--
-- Tabellstruktur `news`
--

CREATE TABLE `news` (
  `post_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `posts`
--

INSERT INTO `posts` (`post_ID`, `course_ID`, `user_ID`, `name_ID`, `publishingDate`, `deadlineDate`, `description`) VALUES
(3, 11, 25, 24, '2024-01-09 13:12:56', '2024-01-03 13:12:00', 'ssssss'),
(10, 14, 25, 31, '2024-01-10 10:22:49', '2024-01-12 10:22:00', ''),
(43, 16, 25, 47, '2024-01-12 10:52:47', '2024-01-13 10:52:00', 'ss');

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
-- Tabellstruktur `submissions`
--

CREATE TABLE `submissions` (
  `submission_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `post_ID` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `submissions`
--

INSERT INTO `submissions` (`submission_ID`, `user_ID`, `post_ID`, `date`) VALUES
(1, 26, 2, '2024-01-09 09:47:46'),
(2, 26, 1, '2024-01-09 09:48:01'),
(4, 26, 43, '2024-01-12 10:57:55');

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
(24, 3, 4, 'hej@h.com', '202020-2020', 3, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(25, 24, 25, 'h@c.com', '040301-2024', 3, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(26, 24, 25, 'h@s.se', '040231-2024', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

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
-- Index för tabell `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_ID`);

--
-- Index för tabell `name`
--
ALTER TABLE `name`
  ADD PRIMARY KEY (`name_ID`);

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
  MODIFY `course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT för tabell `course_enrollments`
--
ALTER TABLE `course_enrollments`
  MODIFY `courseEnrollment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT för tabell `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT för tabell `name`
--
ALTER TABLE `name`
  MODIFY `name_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT för tabell `posts`
--
ALTER TABLE `posts`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT för tabell `role`
--
ALTER TABLE `role`
  MODIFY `role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submission_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
