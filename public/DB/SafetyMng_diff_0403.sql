-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-04-03 09:55:34
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
-- 表的结构 `CheckBaseDB`
--

CREATE TABLE `CheckBaseDB` (
  `id` int(11) NOT NULL,
  `BaseName` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `CheckBaseDB`
--

INSERT INTO `CheckBaseDB` (`id`, `BaseName`) VALUES
(1, '洛阳分院维修单位法定自查清单库');

-- --------------------------------------------------------

--
-- 表的结构 `CheckList`
--

CREATE TABLE `CheckList` (
  `id` int(11) NOT NULL,
  `CheckCode` varchar(40) COLLATE utf8_bin NOT NULL,
  `CheckName` varchar(100) COLLATE utf8_bin NOT NULL,
  `CheckSource` varchar(100) COLLATE utf8_bin NOT NULL,
  `Checkers` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ScheduleDate` date NOT NULL,
  `CheckRowCnt` int(11) DEFAULT NULL,
  `OkRowCnt` int(11) DEFAULT NULL,
  `DutyCorp` varchar(10) COLLATE utf8_bin NOT NULL,
  `TaskID` int(11) NOT NULL,
  `AddTime` datetime DEFAULT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `CheckListDetail`
--

CREATE TABLE `CheckListDetail` (
  `id` int(11) NOT NULL,
  `CheckDBID` int(11) NOT NULL,
  `CheckListID` int(11) NOT NULL,
  `FirstHalfTBID` int(11) NOT NULL,
  `CheckStandSnap` text COLLATE utf8_bin NOT NULL,
  `SecondHalfTBID` int(11) NOT NULL,
  `ComplianceStandard` text COLLATE utf8_bin NOT NULL,
  `AddTime` datetime NOT NULL,
  `NonConfirmDutyCorp` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `IsOk` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `NonConfirmDesc` text COLLATE utf8_bin,
  `Checker` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `DealType` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '问题提交或者立即整改',
  `RelatedTaskID` int(11) DEFAULT NULL COMMENT '问题任务ID或者整改通知书ID',
  `RelatedID` int(11) DEFAULT NULL COMMENT '问题ID或者整改通知书ID',
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `FirstHalfCheckTB`
--

CREATE TABLE `FirstHalfCheckTB` (
  `id` int(11) NOT NULL,
  `BaseDBID` int(11) NOT NULL,
  `ProfessionName` varchar(20) COLLATE utf8_bin NOT NULL,
  `BusinessName` varchar(20) COLLATE utf8_bin NOT NULL,
  `CheckSubject` varchar(100) COLLATE utf8_bin NOT NULL,
  `Code1` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Code2` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `CheckContent` varchar(100) COLLATE utf8_bin NOT NULL,
  `CheckStandard` varchar(4096) COLLATE utf8_bin NOT NULL,
  `AdderName` varchar(10) COLLATE utf8_bin NOT NULL,
  `AddTime` datetime NOT NULL,
  `OldID` int(11) NOT NULL,
  `IsValid` varchar(4) COLLATE utf8_bin NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `SecondHalfCheckTB`
--

CREATE TABLE `SecondHalfCheckTB` (
  `id` int(11) NOT NULL,
  `OldID` int(11) NOT NULL DEFAULT '0',
  `CheckStandardID` int(11) NOT NULL,
  `ComplianceStandard` text COLLATE utf8_bin NOT NULL,
  `CheckMethods` varchar(100) COLLATE utf8_bin NOT NULL,
  `BasisName` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `BasisTerm` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `RelatedCorps` varchar(256) COLLATE utf8_bin NOT NULL,
  `CheckFrequency` varchar(50) COLLATE utf8_bin NOT NULL,
  `AdderName` varchar(10) COLLATE utf8_bin NOT NULL,
  `AddTime` datetime NOT NULL,
  `IsValid` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CheckBaseDB`
--
ALTER TABLE `CheckBaseDB`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CheckList`
--
ALTER TABLE `CheckList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CheckListDetail`
--
ALTER TABLE `CheckListDetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `FirstHalfCheckTB`
--
ALTER TABLE `FirstHalfCheckTB`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SecondHalfCheckTB`
--
ALTER TABLE `SecondHalfCheckTB`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `CheckBaseDB`
--
ALTER TABLE `CheckBaseDB`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `CheckList`
--
ALTER TABLE `CheckList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `CheckListDetail`
--
ALTER TABLE `CheckListDetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `FirstHalfCheckTB`
--
ALTER TABLE `FirstHalfCheckTB`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `SecondHalfCheckTB`
--
ALTER TABLE `SecondHalfCheckTB`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
