-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 1 月 14 日 23:42
-- サーバのバージョン： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `student_info`
--

CREATE TABLE `student_info` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `future` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drinkingDay` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `interest`, `language`, `future`, `drinkingDay`, `datetime`) VALUES
(29, 'Aさん', 'a:6:{i:0;s:6:"学生";i:1;s:15:"引きこもり";i:2;s:6:"建築";i:3;s:15:"モノその他";i:4;s:6:"投資";i:5;s:12:"スポーツ";}', 'a:5:{i:0;s:27:"JavaScript(フロント側)";i:1;s:3:"PHP";i:2;s:17:"Ruby(Rails含む)";i:3;s:6:"Python";i:4;s:5:"Swift";}', 'a:1:{i:0;s:6:"起業";}', 'a:2:{i:0;s:4:"1/30";i:1;s:3:"2/6";}', '2016-01-14 22:36:11'),
(30, 'Bさん', 'a:9:{i:0;s:6:"子供";i:1;s:9:"労働者";i:2;s:15:"医療・介護";i:3;s:6:"自然";i:4;s:24:"インテリア・家電";i:5;s:3:"食";i:6;s:6:"貯蓄";i:7;s:12:"スポーツ";i:8;s:36:"アート（映像・音楽含む）";}', 'a:4:{i:0;s:9:"HTML, CSS";i:1;s:27:"JavaScript(フロント側)";i:2;s:4:"Java";i:3;s:4:"Java";}', 'a:2:{i:0;s:6:"起業";i:1;s:21:"エンジニア転職";}', 'a:2:{i:0;s:4:"1/30";i:1;s:4:"2/13";}', '2016-01-14 22:36:56'),
(31, 'Cさん', 'a:6:{i:0;s:6:"子供";i:1;s:6:"学生";i:2;s:9:"労働者";i:3;s:9:"労働者";i:4;s:15:"医療・介護";i:5;s:15:"引きこもり";}', 'a:5:{i:0;s:27:"JavaScript(フロント側)";i:1;s:7:"Node.js";i:2;s:5:"Scala";i:3;s:4:"Java";i:4;s:5:"Swift";}', 'a:1:{i:0;s:12:"特になし";}', 'a:2:{i:0;s:3:"2/6";i:1;s:4:"2/13";}', '2016-01-14 22:41:11'),
(32, 'Dさん', 'a:6:{i:0;s:6:"自然";i:1;s:6:"建築";i:2;s:3:"車";i:3;s:24:"インテリア・家電";i:4;s:3:"服";i:5;s:3:"食";}', 'a:4:{i:0;s:9:"HTML, CSS";i:1;s:3:"PHP";i:2;s:17:"Ruby(Rails含む)";i:3;s:10:"JavaScript";}', 'a:1:{i:0;s:21:"エンジニア転職";}', 'a:2:{i:0;s:4:"1/30";i:1;s:3:"2/6";}', '2016-01-14 22:41:43'),
(33, 'Eさん', 'a:5:{i:0;s:15:"ヒトその他";i:1;s:6:"投資";i:2;s:12:"メディア";i:3;s:12:"スポーツ";i:4;s:36:"アート（映像・音楽含む）";}', 'a:6:{i:0;s:9:"HTML, CSS";i:1;s:27:"JavaScript(フロント側)";i:2;s:3:"PHP";i:3;s:4:"Java";i:4;s:3:"C++";i:5;s:4:"Java";}', 'a:1:{i:0;s:21:"エンジニア転職";}', 'a:3:{i:0;s:4:"1/30";i:1;s:3:"2/6";i:2;s:4:"2/13";}', '2016-01-14 22:42:23'),
(34, 'Fさん', 'a:5:{i:0;s:6:"学生";i:1;s:15:"ヒトその他";i:2;s:3:"車";i:3;s:15:"カネその他";i:4;s:36:"アート（映像・音楽含む）";}', 'a:3:{i:0;s:27:"JavaScript(フロント側)";i:1;s:7:"Node.js";i:2;s:5:"Swift";}', 'a:2:{i:0;s:6:"起業";i:1;s:21:"エンジニア転職";}', 'a:1:{i:0;s:4:"1/30";}', '2016-01-14 23:36:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
