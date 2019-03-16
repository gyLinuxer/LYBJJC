-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2018-12-09 02:26:25
-- 服务器版本： 5.7.21
-- PHP 版本： 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `SafetyMng`
--

-- --------------------------------------------------------

--
-- 表的结构 `QuestionList`
--

CREATE TABLE `QuestionList` (
  `id` int(11) NOT NULL,
  `QuestionTitle` text COLLATE utf8_bin NOT NULL,
  `QuestionInfo` text COLLATE utf8_bin NOT NULL,
  `CreatorName` varchar(10) COLLATE utf8_bin NOT NULL,
  `CreateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `TaskList`
--

CREATE TABLE `TaskList` (
  `id` int(11) NOT NULL,
  `TaskType` varchar(50) COLLATE utf8_bin NOT NULL,
  `TaskName` varchar(512) COLLATE utf8_bin NOT NULL,
  `TaskInfo` text COLLATE utf8_bin NOT NULL,
  `DeadLine` date DEFAULT NULL,
  `SenderName` varchar(20) COLLATE utf8_bin NOT NULL,
  `SenderCorp` varchar(20) COLLATE utf8_bin NOT NULL,
  `ReciveCorp` varchar(20) COLLATE utf8_bin NOT NULL,
  `CurManagerName` varchar(10) COLLATE utf8_bin NOT NULL,
  `Status` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `addr` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `test`
--

INSERT INTO `test` (`id`, `name`, `addr`) VALUES
(1, '李光耀', 'cafucly');

-- --------------------------------------------------------

--
-- 表的结构 `UserList`
--

CREATE TABLE `UserList` (
  `id` int(11) NOT NULL,
  `UserName` varchar(20) COLLATE utf8_bin NOT NULL,
  `Pwd` varchar(64) COLLATE utf8_bin NOT NULL,
  `Corp` varchar(10) COLLATE utf8_bin NOT NULL,
  `Name` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `UserList`
--

INSERT INTO `UserList` (`id`, `UserName`, `Pwd`, `Corp`, `Name`) VALUES
(1, 'lgy', '1', '质检科', '李光耀'),
(2, 'sxl', '1', '质检科', '史相陆');

--
-- 转储表的索引
--

--
-- 表的索引 `QuestionList`
--
ALTER TABLE `QuestionList`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `TaskList`
--
ALTER TABLE `TaskList`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `UserList`
--
ALTER TABLE `UserList`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `QuestionList`
--
ALTER TABLE `QuestionList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `TaskList`
--
ALTER TABLE `TaskList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `UserList`
--
ALTER TABLE `UserList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
