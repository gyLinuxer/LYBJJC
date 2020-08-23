-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020-08-08 16:56:47
-- 服务器版本： 10.1.37-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `QPSys`
--

-- --------------------------------------------------------

--
-- 表的结构 `AirplaneList`
--

CREATE TABLE `AirplaneList` (
  `BaseAddr` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '基地',
  `id` int(11) NOT NULL,
  `ACType` varchar(10) COLLATE utf8_bin NOT NULL,
  `ACNo` varchar(10) COLLATE utf8_bin NOT NULL,
  `Status` varchar(10) COLLATE utf8_bin NOT NULL,
  `XLLXLimited` varchar(1024) COLLATE utf8_bin NOT NULL COMMENT '训练类型显示json',
  `SDLimited` varchar(10) COLLATE utf8_bin NOT NULL,
  `StatusChangeTime` datetime NOT NULL COMMENT '状态转换时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `AirplaneList`
--

INSERT INTO `AirplaneList` (`BaseAddr`, `id`, `ACType`, `ACNo`, `Status`, `XLLXLimited`, `SDLimited`, `StatusChangeTime`) VALUES
('洛阳', 1, 'SR30', '9740', '故障', '[\"教员带飞\",\"单飞\"]', '非夜航', '2020-04-05 08:06:08'),
('芮城', 2, 'SR20', '9741', '可用', '[\"单飞\"]', '夜航', '2020-02-20 00:00:00'),
('南阳', 3, 'DA42NG', '10U9', '可用', '', '', '2020-02-20 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `CJJH`
--

CREATE TABLE `CJJH` (
  `id` int(11) NOT NULL,
  `XQID` int(11) NOT NULL COMMENT '需求ID',
  `ACType` varchar(10) COLLATE utf8_bin NOT NULL,
  `ACNo` varchar(10) COLLATE utf8_bin NOT NULL,
  `SD` varchar(10) COLLATE utf8_bin NOT NULL,
  `BaseAddr` varchar(20) COLLATE utf8_bin NOT NULL,
  `XLLX` int(11) NOT NULL,
  `CreatorID` int(11) NOT NULL,
  `CreatorName` varchar(10) COLLATE utf8_bin NOT NULL,
  `Approver` int(11) NOT NULL,
  `ApproverName` varchar(11) COLLATE utf8_bin NOT NULL,
  `ApproveTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `CorpList`
--

CREATE TABLE `CorpList` (
  `id` int(11) NOT NULL,
  `GroupName` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `CorpList`
--

INSERT INTO `CorpList` (`id`, `GroupName`) VALUES
(1, '五大队'),
(3, '六大队'),
(4, '九大队');

-- --------------------------------------------------------

--
-- 表的结构 `FlightPlan`
--

CREATE TABLE `FlightPlan` (
  `id` int(11) NOT NULL,
  `XQId` int(11) NOT NULL,
  `Base` int(11) NOT NULL,
  `ACType` varchar(10) COLLATE utf8_bin NOT NULL,
  `ACNo` int(11) NOT NULL,
  `XLLX` varchar(10) COLLATE utf8_bin NOT NULL,
  `Memo` varchar(100) COLLATE utf8_bin NOT NULL,
  `TeacherID` int(11) NOT NULL,
  `TeacherName` varchar(10) COLLATE utf8_bin NOT NULL,
  `CheckerID` int(11) NOT NULL,
  `CheckerName` varchar(10) COLLATE utf8_bin NOT NULL,
  `CheckTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `StatusList`
--

CREATE TABLE `StatusList` (
  `id` int(11) NOT NULL,
  `Status` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `StatusList`
--

INSERT INTO `StatusList` (`id`, `Status`) VALUES
(1, '飞行中'),
(2, '定检中'),
(3, '可用'),
(4, '故障');

-- --------------------------------------------------------

--
-- 表的结构 `Student`
--

CREATE TABLE `Student` (
  `id` int(11) NOT NULL,
  `PersonName` varchar(10) COLLATE utf8_bin NOT NULL,
  `Corp` varchar(20) COLLATE utf8_bin NOT NULL,
  `Teacher` int(10) NOT NULL,
  `XLJD` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '训练阶段'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `Teacher`
--

CREATE TABLE `Teacher` (
  `id` int(11) NOT NULL,
  `PersonName` varchar(10) COLLATE utf8_bin NOT NULL,
  `Corp` int(11) NOT NULL,
  `Role` int(11) NOT NULL COMMENT '教员、领导',
  `UserName` varchar(20) COLLATE utf8_bin NOT NULL,
  `pwd` varchar(33) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `UserList`
--

CREATE TABLE `UserList` (
  `id` int(11) NOT NULL,
  `UserName` varchar(20) COLLATE utf8_bin NOT NULL,
  `Pwd` varchar(32) COLLATE utf8_bin NOT NULL,
  `Name` varchar(10) COLLATE utf8_bin NOT NULL,
  `Corp` varchar(20) COLLATE utf8_bin NOT NULL,
  `PersonType` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '学生、老师、大队领导、机务签派原',
  `Role` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `TeacherID` int(11) DEFAULT NULL,
  `XLJD` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `UserList`
--

INSERT INTO `UserList` (`id`, `UserName`, `Pwd`, `Name`, `Corp`, `PersonType`, `Role`, `TeacherID`, `XLJD`) VALUES
(1, '刘伟', '1234', '刘伟１', '五大队', '教员', '领导', 0, ''),
(2, '张三', '666666', '张三', '五大队', '学生', '成员', 1, '训练阶段２');

-- --------------------------------------------------------

--
-- 表的结构 `XLJD`
--

CREATE TABLE `XLJD` (
  `id` int(11) NOT NULL,
  `XLJD` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `XLJD`
--

INSERT INTO `XLJD` (`id`, `XLJD`) VALUES
(3, '训练阶段１'),
(4, '训练阶段２');

-- --------------------------------------------------------

--
-- 表的结构 `XLLX`
--

CREATE TABLE `XLLX` (
  `id` int(11) NOT NULL,
  `XLLX` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `XLLX`
--

INSERT INTO `XLLX` (`id`, `XLLX`) VALUES
(1, '教员带飞'),
(2, '单飞');

-- --------------------------------------------------------

--
-- 表的结构 `XQXX`
--

CREATE TABLE `XQXX` (
  `id` int(11) NOT NULL,
  `Base` varchar(11) COLLATE utf8_bin NOT NULL,
  `XQRQ` date NOT NULL,
  `ACType` varchar(11) COLLATE utf8_bin NOT NULL,
  `ACNum` int(11) NOT NULL,
  `SD` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '时段',
  `XLLX` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '训练类型',
  `TSXQ` varchar(100) COLLATE utf8_bin NOT NULL,
  `CreatorID` int(11) NOT NULL,
  `CreateTime` datetime NOT NULL,
  `Status` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '需求状态:已提交',
  `ACNoApproved` int(11) NOT NULL COMMENT '已批准架数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `XQXX`
--

INSERT INTO `XQXX` (`id`, `Base`, `XQRQ`, `ACType`, `ACNum`, `SD`, `XLLX`, `TSXQ`, `CreatorID`, `CreateTime`, `Status`, `ACNoApproved`) VALUES
(5, '西华', '2020-06-07', 'SR20', 1, '上午场', '单飞', '', 1, '2020-06-06 18:01:36', '已提交', 0),
(6, '洛阳', '2020-06-07', 'DA42NG', 3, '上午场', '教员带飞', '麻烦发新飞机', 1, '2020-06-06 18:08:00', '已提交', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AirplaneList`
--
ALTER TABLE `AirplaneList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CJJH`
--
ALTER TABLE `CJJH`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CorpList`
--
ALTER TABLE `CorpList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `FlightPlan`
--
ALTER TABLE `FlightPlan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `StatusList`
--
ALTER TABLE `StatusList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserList`
--
ALTER TABLE `UserList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `XLJD`
--
ALTER TABLE `XLJD`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `XLLX`
--
ALTER TABLE `XLLX`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `XQXX`
--
ALTER TABLE `XQXX`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `AirplaneList`
--
ALTER TABLE `AirplaneList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `CJJH`
--
ALTER TABLE `CJJH`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `CorpList`
--
ALTER TABLE `CorpList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `FlightPlan`
--
ALTER TABLE `FlightPlan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `StatusList`
--
ALTER TABLE `StatusList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `Student`
--
ALTER TABLE `Student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `UserList`
--
ALTER TABLE `UserList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `XLJD`
--
ALTER TABLE `XLJD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `XLLX`
--
ALTER TABLE `XLLX`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `XQXX`
--
ALTER TABLE `XQXX`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
