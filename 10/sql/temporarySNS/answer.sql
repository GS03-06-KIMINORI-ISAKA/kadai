-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 2 月 11 日 23:32
-- サーバのバージョン： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temporarySNS`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `answer`
--

CREATE TABLE `answer` (
  `answerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `questionnaireId` int(11) NOT NULL,
  `questionType` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answerTime` datetime(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answerId`),
  ADD KEY `userId` (`userId`,`questionnaireId`),
  ADD KEY `questionnaireId` (`questionnaireId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`questionnaireId`) REFERENCES `questionnaire` (`questionnaireId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
