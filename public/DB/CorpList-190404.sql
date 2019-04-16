-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-04-04 02:50:59
-- 服务器版本： 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SafetyMng`
--

-- --------------------------------------------------------

--
-- 表的结构 `CorpList`
--

CREATE TABLE `CorpList` (
  `id` int(11) NOT NULL,
  `Corp` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `CorpList`
--

INSERT INTO `CorpList` (`id`, `Corp`) VALUES
(1, '机务工程部'),
(2, '机务一队'),
(3, '机务二队'),
(4, '机务三队'),
(5, '机务四队'),
(6, '技术科'),
(7, '质检科'),
(8, '航材科'),
(9, '安委会'),
(10, '委任代表');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CorpList`
--
ALTER TABLE `CorpList`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `CorpList`
--
ALTER TABLE `CorpList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
