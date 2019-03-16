-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-01-10 03:10:52
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
-- 表的结构 `IDCrossIndex`
--

CREATE TABLE `IDCrossIndex` (
  `id` int(11) NOT NULL,
  `Type` varchar(20) COLLATE utf8_bin NOT NULL,
  `FromID` int(11) NOT NULL,
  `ToID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `IDCrossIndex`
--

INSERT INTO `IDCrossIndex` (`id`, `Type`, `FromID`, `ToID`) VALUES
(14, '问题-整改', 51, 45),
(15, '问题-整改', 51, 46);

-- --------------------------------------------------------

--
-- 表的结构 `QuestionList`
--

CREATE TABLE `QuestionList` (
  `id` int(11) NOT NULL,
  `TaskID` int(11) DEFAULT NULL,
  `DealType` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `QuestionTitle` text COLLATE utf8_bin NOT NULL,
  `QuestionInfo` text COLLATE utf8_bin NOT NULL,
  `subFileName` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `subFileSaveName` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `CreatorName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `CreateTime` datetime NOT NULL,
  `Status` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `ManagerName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ManageTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `QuestionList`
--

INSERT INTO `QuestionList` (`id`, `TaskID`, `DealType`, `QuestionTitle`, `QuestionInfo`, `subFileName`, `subFileSaveName`, `CreatorName`, `CreateTime`, `Status`, `ManagerName`, `ManageTime`) VALUES
(51, 35, '整改', '问题1', '&lt;p&gt;&lt;img src=&quot;/upload/20190109/960ceb1100d777ae73f3746502176e0e.jpeg&quot; style=&quot;width: 570.5px; height: 427.875px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-09 09:49:42', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `QuestionSource`
--

CREATE TABLE `QuestionSource` (
  `id` int(11) NOT NULL,
  `SourceName` varchar(50) COLLATE utf8_bin NOT NULL,
  `CodePre` varchar(20) COLLATE utf8_bin NOT NULL,
  `AddTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `QuestionSource`
--

INSERT INTO `QuestionSource` (`id`, `SourceName`, `CodePre`, `AddTime`) VALUES
(1, '维修单位年检', 'WXDWNJ', '2018-12-06 00:00:00'),
(2, '航空器年检', 'HKQNJ', '2018-12-06 00:00:00'),
(3, '日常检察', 'RCJC', '2019-01-07 16:53:01');

-- --------------------------------------------------------

--
-- 表的结构 `ReformList`
--

CREATE TABLE `ReformList` (
  `id` int(11) NOT NULL,
  `ChildTaskID` int(11) DEFAULT NULL COMMENT '整改子任务ID',
  `ParentTaskID` int(11) DEFAULT NULL,
  `Code` varchar(50) COLLATE utf8_bin NOT NULL,
  `RelatedQuestionID` int(11) NOT NULL,
  `QuestionSourceName` varchar(50) COLLATE utf8_bin NOT NULL,
  `CheckDate` date NOT NULL,
  `Inspectors` varchar(50) COLLATE utf8_bin NOT NULL,
  `IssueDate` date NOT NULL,
  `RequestFeedBackDate` date NOT NULL,
  `QuestionTitle` text COLLATE utf8_bin,
  `ReformTitle` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `NonConfirmDesc` text COLLATE utf8_bin NOT NULL,
  `Basis` varchar(256) COLLATE utf8_bin NOT NULL,
  `DutyCorp` varchar(10) COLLATE utf8_bin NOT NULL,
  `CurDealCorp` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ReformRequirement` varchar(1024) COLLATE utf8_bin NOT NULL,
  `RequireDefineCause` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '是否要求整改单位分析原因',
  `RequireDefineAction` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '是否要求整改单位指定措施',
  `DirectCause` varchar(1024) COLLATE utf8_bin DEFAULT NULL,
  `RootCause` varchar(1024) COLLATE utf8_bin DEFAULT NULL,
  `CauseEvalerName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `CauseEvalTime` datetime DEFAULT NULL,
  `CorrectiveAction` text COLLATE utf8_bin,
  `CorrectiveDeadline` date DEFAULT NULL,
  `PrecautionAction` text COLLATE utf8_bin,
  `PrecautionDeadline` date DEFAULT NULL,
  `ActionMakerName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ActionMakeTime` datetime DEFAULT NULL,
  `ActionIsOK` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ActionEval` text COLLATE utf8_bin,
  `ActionEvalerName` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ActionEvalTime` datetime DEFAULT NULL,
  `ProofEvalIsOK` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ProofEvalerName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `Proof` text COLLATE utf8_bin,
  `ProofEvalTime` datetime DEFAULT NULL,
  `ProofEvalMemo` text COLLATE utf8_bin,
  `ReformStatus` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `ReformList`
--

INSERT INTO `ReformList` (`id`, `ChildTaskID`, `ParentTaskID`, `Code`, `RelatedQuestionID`, `QuestionSourceName`, `CheckDate`, `Inspectors`, `IssueDate`, `RequestFeedBackDate`, `QuestionTitle`, `ReformTitle`, `NonConfirmDesc`, `Basis`, `DutyCorp`, `CurDealCorp`, `ReformRequirement`, `RequireDefineCause`, `RequireDefineAction`, `DirectCause`, `RootCause`, `CauseEvalerName`, `CauseEvalTime`, `CorrectiveAction`, `CorrectiveDeadline`, `PrecautionAction`, `PrecautionDeadline`, `ActionMakerName`, `ActionMakeTime`, `ActionIsOK`, `ActionEval`, `ActionEvalerName`, `ActionEvalTime`, `ProofEvalIsOK`, `ProofEvalerName`, `Proof`, `ProofEvalTime`, `ProofEvalMemo`, `ReformStatus`) VALUES
(45, 46, 35, 'WXDWNJ-20190109104530955', 51, '维修单位年检', '2019-01-01', '', '2019-01-09', '2019-01-11', '问题1', '整改通知书1', '&lt;p&gt;&lt;img src=&quot;/upload/20190109/960ceb1100d777ae73f3746502176e0e.jpeg&quot; style=&quot;width: 570.5px; height: 427.875px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', 'CCAR-145R3', '技术科', '技术科', '分析原因并指定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施'),
(46, 45, 35, 'WXDWNJ-20190109104530236', 51, '维修单位年检', '2019-01-01', '', '2019-01-09', '2019-01-11', '问题1', '整改通知书1', '&lt;p&gt;&lt;img src=&quot;/upload/20190109/960ceb1100d777ae73f3746502176e0e.jpeg&quot; style=&quot;width: 570.5px; height: 427.875px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', 'CCAR-145R3', '机务二队', '机务二队', '分析原因并指定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施');

-- --------------------------------------------------------

--
-- 表的结构 `TaskDealerGroup`
--

CREATE TABLE `TaskDealerGroup` (
  `id` int(11) NOT NULL,
  `GroupID` varchar(20) COLLATE utf8_bin NOT NULL,
  `TaskID` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8_bin NOT NULL,
  `Corp` varchar(10) COLLATE utf8_bin NOT NULL,
  `Role` varchar(10) COLLATE utf8_bin NOT NULL,
  `AddTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `TaskDealerGroup`
--

INSERT INTO `TaskDealerGroup` (`id`, `GroupID`, `TaskID`, `Name`, `Corp`, `Role`, `AddTime`) VALUES
(38, '20190109094951613', 35, '李光耀', '质检科', '组长', '2019-01-09 09:49:51'),
(39, '20190109094951613', 35, '伊晗', '质检科', '组员', '2019-01-09 09:49:51'),
(40, '20190109104303170', 43, '刘贝贝', '机务二队', '组长', '2019-01-09 10:43:03'),
(41, '20190109104303170', 43, '刘宗福', '机务二队', '组员', '2019-01-09 10:43:03');

-- --------------------------------------------------------

--
-- 表的结构 `TaskList`
--

CREATE TABLE `TaskList` (
  `id` int(11) NOT NULL,
  `ParentID` int(11) NOT NULL DEFAULT '0',
  `TaskType` varchar(50) COLLATE utf8_bin NOT NULL,
  `TaskName` varchar(512) COLLATE utf8_bin NOT NULL,
  `CreateTime` datetime DEFAULT NULL,
  `DeadLine` date DEFAULT NULL,
  `SenderName` varchar(20) COLLATE utf8_bin NOT NULL,
  `CreatorName` varchar(20) COLLATE utf8_bin NOT NULL,
  `SenderCorp` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ReciveCorp` varchar(20) COLLATE utf8_bin NOT NULL,
  `GroupMember` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `DealGroupID` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `TaskStatus` varchar(256) COLLATE utf8_bin DEFAULT NULL COMMENT '该任务当前的处理阶段',
  `Status` varchar(20) COLLATE utf8_bin DEFAULT '',
  `RelateID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `TaskList`
--

INSERT INTO `TaskList` (`id`, `ParentID`, `TaskType`, `TaskName`, `CreateTime`, `DeadLine`, `SenderName`, `CreatorName`, `SenderCorp`, `ReciveCorp`, `GroupMember`, `DealGroupID`, `TaskStatus`, `Status`, `RelateID`) VALUES
(35, 0, '问题-整改', '问题1', '2019-01-09 09:49:42', NULL, '史相陆', '史相陆', '质检科', '质检科', '李光耀 伊晗 ', '20190109094951613', NULL, '', 51),
(45, 35, '整改通知书', '整改通知书1', '2019-01-09 10:45:38', '2019-01-11', '李光耀', '李光耀', '质检科', '机务二队', NULL, NULL, '整改-待制定措施', '', 46),
(46, 35, '整改通知书', '整改通知书1', '2019-01-09 10:45:39', '2019-01-11', '李光耀', '李光耀', '质检科', '技术科', NULL, NULL, '整改-待制定措施', '', 45);

-- --------------------------------------------------------

--
-- 表的结构 `TaskLog`
--

CREATE TABLE `TaskLog` (
  `id` int(11) NOT NULL,
  `TaskID` int(11) NOT NULL,
  `LogType` varchar(20) COLLATE utf8_bin NOT NULL,
  `RelatedID` int(11) NOT NULL,
  `SendCorp` varchar(20) COLLATE utf8_bin NOT NULL,
  `ReceiveCorp` varchar(20) COLLATE utf8_bin NOT NULL,
  `SendTime` datetime NOT NULL,
  `Log` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `TaskMsg`
--

CREATE TABLE `TaskMsg` (
  `id` int(11) NOT NULL,
  `TaskID` int(11) NOT NULL,
  `SenderName` varchar(20) COLLATE utf8_bin NOT NULL,
  `ReceiveGroup` varchar(20) COLLATE utf8_bin NOT NULL,
  `Msg` text COLLATE utf8_bin NOT NULL,
  `CreateTime` datetime NOT NULL,
  `State` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `TaskMsg`
--

INSERT INTO `TaskMsg` (`id`, `TaskID`, `SenderName`, `ReceiveGroup`, `Msg`, `CreateTime`, `State`) VALUES
(2, 1, '史相陆', '质检科', '请按照安全隐患上报！', '2018-12-12 09:42:14', 0),
(3, 4, '史相陆', '质检科', '请直接分解问题并下发整改！', '2018-12-12 21:44:35', 0),
(4, 22, '史相陆', '20190107091244917', '请分解问题，并下发整改。', '2019-01-07 09:12:44', 0),
(5, 23, '史相陆', '20190107091733365', '请分解问题，并下发整改。', '2019-01-07 09:17:33', 0),
(6, 25, '史相陆', '20190107092833464', '下发整改。', '2019-01-07 09:28:33', 0),
(7, 27, '杨雷', '20190107093529469', '请指定措施。', '2019-01-07 09:35:29', 0);

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
  `Name` varchar(20) COLLATE utf8_bin NOT NULL,
  `CorpRole` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '领导与成员'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `UserList`
--

INSERT INTO `UserList` (`id`, `UserName`, `Pwd`, `Corp`, `Name`, `CorpRole`) VALUES
(1, 'lgy', '1', '质检科', '李光耀', '成员'),
(2, 'sxl', '1', '质检科', '史相陆', '领导'),
(3, 'stf', '1', '技术科', '盛腾飞', '成员'),
(4, 'wk', '1', '技术科', '王凯', '领导'),
(5, 'yh', '1', '质检科', '伊晗', '成员'),
(6, 'zmx', '1', '质检科', '张梦祥', '成员'),
(7, 'yl', '1', '机务二队', '杨雷', '领导'),
(8, 'lbb', '1', '机务二队', '刘贝贝', '成员'),
(9, 'lzf', '1', '机务二队', '刘宗福', '成员');

--
-- 转储表的索引
--

--
-- 表的索引 `IDCrossIndex`
--
ALTER TABLE `IDCrossIndex`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `QuestionList`
--
ALTER TABLE `QuestionList`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `QuestionSource`
--
ALTER TABLE `QuestionSource`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `ReformList`
--
ALTER TABLE `ReformList`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `TaskDealerGroup`
--
ALTER TABLE `TaskDealerGroup`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `TaskList`
--
ALTER TABLE `TaskList`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `TaskLog`
--
ALTER TABLE `TaskLog`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `TaskMsg`
--
ALTER TABLE `TaskMsg`
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
-- 使用表AUTO_INCREMENT `IDCrossIndex`
--
ALTER TABLE `IDCrossIndex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `QuestionList`
--
ALTER TABLE `QuestionList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- 使用表AUTO_INCREMENT `QuestionSource`
--
ALTER TABLE `QuestionSource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `ReformList`
--
ALTER TABLE `ReformList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- 使用表AUTO_INCREMENT `TaskDealerGroup`
--
ALTER TABLE `TaskDealerGroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- 使用表AUTO_INCREMENT `TaskList`
--
ALTER TABLE `TaskList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- 使用表AUTO_INCREMENT `TaskLog`
--
ALTER TABLE `TaskLog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `TaskMsg`
--
ALTER TABLE `TaskMsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `UserList`
--
ALTER TABLE `UserList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
