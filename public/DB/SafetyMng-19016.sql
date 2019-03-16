-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-01-16 02:44:51
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
(30, '问题-整改', 60, 63),
(31, '问题-整改', 60, 64),
(33, '问题-整改', 61, 66),
(34, '问题-整改', 61, 67),
(35, '问题-整改', 61, 68),
(36, '问题-整改', 61, 69),
(37, '问题-整改', 61, 70);

-- --------------------------------------------------------

--
-- 表的结构 `QuestionList`
--

CREATE TABLE `QuestionList` (
  `id` int(11) NOT NULL,
  `TaskID` int(11) DEFAULT NULL,
  `DealType` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `QuestionTitle` text COLLATE utf8_bin NOT NULL,
  `QuestionInfo` longtext COLLATE utf8_bin NOT NULL,
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
(60, 69, '整改', '机务四队-皮卡车-存放', '&lt;p&gt;&lt;img src=&quot;/upload/20190114/c731c6fc0b273eeafded99c60c102034.jpg&quot; style=&quot;width: 50%;&quot;&gt;&lt;/p&gt;&lt;p&gt;机务四队皮卡车未设置轮档，未划定标线存放&lt;br&gt;&lt;/p&gt;', NULL, NULL, '刘贝贝', '2019-01-14 08:14:26', NULL, NULL, NULL),
(61, 72, '整改', '航线工卡存放标识与实物不符', '&lt;p&gt;&lt;img src=&quot;/upload/20190115/f8cd8f62b93a6573ccfb5f503e16b2a0.png&quot; style=&quot;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:14.0pt;font-family:仿宋_GB2312;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;航线工卡存放标识与实物不符。&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '李光耀', '2019-01-15 16:01:51', NULL, NULL, NULL),
(62, 74, NULL, '1', '&lt;p&gt;1&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-15 16:32:11', NULL, NULL, NULL);

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
(3, '日常检察', 'RCJC', '2019-01-07 16:53:01'),
(4, '年度检验检查', 'NDJYJC', '2019-01-15 15:57:06');

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
  `NonConfirmDesc` longtext COLLATE utf8_bin NOT NULL,
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
  `Proof` longtext COLLATE utf8_bin,
  `ProofUploaderName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ProofUploadTime` datetime DEFAULT NULL,
  `ProofEvalTime` datetime DEFAULT NULL,
  `ProofEvalMemo` text COLLATE utf8_bin,
  `ReformStatus` varchar(20) COLLATE utf8_bin NOT NULL,
  `DeleteTime` datetime DEFAULT NULL,
  `DeleterName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `isDeleted` varchar(5) COLLATE utf8_bin NOT NULL DEFAULT '否' COMMENT '是、否',
  `DeleteMemo` varchar(256) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `ReformList`
--

INSERT INTO `ReformList` (`id`, `ChildTaskID`, `ParentTaskID`, `Code`, `RelatedQuestionID`, `QuestionSourceName`, `CheckDate`, `Inspectors`, `IssueDate`, `RequestFeedBackDate`, `QuestionTitle`, `ReformTitle`, `NonConfirmDesc`, `Basis`, `DutyCorp`, `CurDealCorp`, `ReformRequirement`, `RequireDefineCause`, `RequireDefineAction`, `DirectCause`, `RootCause`, `CauseEvalerName`, `CauseEvalTime`, `CorrectiveAction`, `CorrectiveDeadline`, `PrecautionAction`, `PrecautionDeadline`, `ActionMakerName`, `ActionMakeTime`, `ActionIsOK`, `ActionEval`, `ActionEvalerName`, `ActionEvalTime`, `ProofEvalIsOK`, `ProofEvalerName`, `Proof`, `ProofUploaderName`, `ProofUploadTime`, `ProofEvalTime`, `ProofEvalMemo`, `ReformStatus`, `DeleteTime`, `DeleterName`, `isDeleted`, `DeleteMemo`) VALUES
(63, 71, 69, 'HKQNJ-20190114081604220', 60, '航空器年检', '2019-01-14', '', '2019-01-14', '2019-01-16', '机务四队-皮卡车-存放', '皮卡车存放-整改通知书', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190114/c731c6fc0b273eeafded99c60c102034.jpg&quot; style=&quot;width: 50%;&quot;&gt;&lt;/p&gt;&lt;p&gt;机务四队皮卡车未设置轮档，未划定标线存放&lt;br&gt;&lt;/p&gt;                             ', '行业标准', '技术科', '技术科', '请分析原因并制定措施！', 'YES', 'YES', '这是直接原因。11', '这是根本原因。1111', NULL, NULL, '这是纠正措施。11', '2019-01-25', '这是预防措施。11', '2019-01-26', '王凯', '2019-01-14 08:22:29', 'YES', 'OK', '李光耀', '2019-01-14 08:22:55', 'YES', '史相陆', '&lt;p&gt;&lt;img src=&quot;/upload/20190114/cbb9d96669590876c363d420aa5e576f.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '王凯', '2019-01-14 08:23:58', '2019-01-14 08:24:26', 'OK\r\n', '整改效果审核通过', NULL, NULL, '否', NULL),
(64, 70, 69, 'HKQNJ-20190114081604547', 60, '航空器年检', '2019-01-14', '', '2019-01-14', '2019-01-16', '机务四队-皮卡车-存放', '皮卡车存放-整改通知书', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190114/c731c6fc0b273eeafded99c60c102034.jpg&quot; style=&quot;width: 50%;&quot;&gt;&lt;/p&gt;&lt;p&gt;机务四队皮卡车未设置轮档，未划定标线存放&lt;br&gt;&lt;/p&gt;                             ', '行业标准', '机务四队', '机务四队', '请分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(65, NULL, 72, 'NDJYJC-20190115160706783', 61, '年度检验检查', '2019-01-15', '', '2019-01-15', '2019-01-19', '航线工卡存放标识与实物不符', '航线工卡存放标识与实物不符', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190115/f8cd8f62b93a6573ccfb5f503e16b2a0.png&quot; style=&quot;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:14.0pt;font-family:仿宋_GB2312;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;航线工卡存放标识与实物不符。&lt;/span&gt;&lt;br&gt;&lt;/p&gt;                             ', 'CCAR-145、维修管理', '机务二队', '机务二队', '请分析原因并制定措施！', 'NO', 'YES', '略', '略', '伊晗', '2019-01-15 16:07:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未下发', '2019-01-15 16:18:30', '史相陆', '是', '下错了。'),
(66, 73, 72, 'NDJYJC-20190115160706226', 61, '年度检验检查', '2019-01-15', '', '2019-01-15', '2019-01-19', '航线工卡存放标识与实物不符', '航线工卡存放标识与实物不符', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190115/f8cd8f62b93a6573ccfb5f503e16b2a0.png&quot; style=&quot;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:14.0pt;font-family:仿宋_GB2312;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;航线工卡存放标识与实物不符。&lt;/span&gt;&lt;br&gt;&lt;/p&gt;                             ', 'CCAR-145、维修管理', '机务四队', '质检科', '请分析原因并制定措施！', 'NO', 'YES', '略', '略', '伊晗', '2019-01-15 16:07:06', '1.	按照相关要求建立机务部文件资料接收、登记、报废、分类管理制度；111111\r\n2.	制定检查计划，按计划检查资料的有效性，根据实践情况及时更新资料清单。111\r\n3.	清理评估机务部各单位文件资料，报废失效资料，将有效资料纳入文件资料管理11111\r\n', '2019-01-19', '1.	清理评估机务部各单位文件资料，报废失效资料，将有效资料纳入文件资料管理1111111\r\n', '2019-01-21', '党立杰', '2019-01-15 16:13:42', 'YES', 'OK', '史相陆', '2019-01-15 16:14:07', 'NO', '史相陆', '&lt;p&gt;&lt;img src=&quot;/upload/20190115/23ebad87812491104ae7a6d0fe869944.png&quot; style=&quot;width: 452.594px; height: 498.01px;&quot;&gt;反反复复&amp;nbsp;&lt;/p&gt;&lt;p&gt;已整改完毕，请审核！&lt;/p&gt;', '党立杰', '2019-01-15 16:17:13', '2019-01-15 16:16:45', '重新整改。', '整改证据已上传待审核', NULL, NULL, '否', NULL),
(67, 75, 72, 'HKQNJ-20190115222547538', 61, '航空器年检', '2019-01-01', '', '2019-01-15', '2019-01-17', '航线工卡存放标识与实物不符', '高梯上部防碰带破损', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190115/f8cd8f62b93a6573ccfb5f503e16b2a0.png&quot; style=&quot;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:14.0pt;font-family:仿宋_GB2312;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;航线工卡存放标识与实物不符。&lt;/span&gt;&lt;br&gt;&lt;/p&gt;                             ', 'CCAR-145R3', '技术科', '技术科', '分析原因并指定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(68, NULL, 72, 'HKQNJ-20190115222547913', 61, '航空器年检', '2019-01-01', '', '2019-01-15', '2019-01-17', '航线工卡存放标识与实物不符', '高梯上部防碰带破损', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190115/f8cd8f62b93a6573ccfb5f503e16b2a0.png&quot; style=&quot;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:14.0pt;font-family:仿宋_GB2312;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;航线工卡存放标识与实物不符。&lt;/span&gt;&lt;br&gt;&lt;/p&gt;                             ', 'CCAR-145R3', '机务二队', '机务二队', '分析原因并指定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未下发', NULL, NULL, '否', NULL),
(69, NULL, 72, 'HKQNJ-20190115222547749', 61, '航空器年检', '2019-01-01', '', '2019-01-15', '2019-01-17', '航线工卡存放标识与实物不符', '高梯上部防碰带破损', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190115/f8cd8f62b93a6573ccfb5f503e16b2a0.png&quot; style=&quot;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:14.0pt;font-family:仿宋_GB2312;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;航线工卡存放标识与实物不符。&lt;/span&gt;&lt;br&gt;&lt;/p&gt;                             ', 'CCAR-145R3', '机务四队', '机务四队', '分析原因并指定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未下发', NULL, NULL, '否', NULL),
(70, NULL, 72, 'WXDWNJ-20190116093240750', 61, '维修单位年检', '2019-01-16', '李光耀 伊晗 ', '2019-01-16', '2019-01-17', '航线工卡存放标识与实物不符', '整改通知书6', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190115/f8cd8f62b93a6573ccfb5f503e16b2a0.png&quot; style=&quot;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:14.0pt;font-family:仿宋_GB2312;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;航线工卡存放标识与实物不符。&lt;/span&gt;&lt;br&gt;&lt;/p&gt;                             ', 'CCAR-145R3', '技术科', '技术科', '分析原因并指定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未下发', NULL, NULL, '否', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `SysConf`
--

CREATE TABLE `SysConf` (
  `id` int(11) NOT NULL,
  `KeyName` varchar(256) COLLATE utf8_bin NOT NULL,
  `KeyValue` varchar(257) COLLATE utf8_bin NOT NULL,
  `MdfTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `SysConf`
--

INSERT INTO `SysConf` (`id`, `KeyName`, `KeyValue`, `MdfTime`) VALUES
(1, 'ReformDeletePwd', '6HAI1K2W', '2019-01-01 00:00:00');

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
(63, '20190114081721142', 69, '李光耀', '质检科', '组长', '2019-01-14 08:17:21'),
(64, '20190114081721142', 69, '伊晗', '质检科', '组员', '2019-01-14 08:17:21'),
(65, '20190114081721142', 69, '张梦祥', '质检科', '组员', '2019-01-14 08:17:21'),
(66, '20190115160243733', 72, '李光耀', '质检科', '组长', '2019-01-15 16:02:43'),
(67, '20190115160243733', 72, '伊晗', '质检科', '组员', '2019-01-15 16:02:43'),
(68, '20190115161036719', 73, '孙延军', '机务四队', '组长', '2019-01-15 16:10:36'),
(69, '20190115161048260', 73, '孙延军', '机务四队', '组长', '2019-01-15 16:10:48'),
(70, '20190115161048260', 73, '党立杰', '机务四队', '组员', '2019-01-15 16:10:48');

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
  `TaskInnerStatus` varchar(256) COLLATE utf8_bin DEFAULT NULL COMMENT '该任务当前的处理阶段',
  `Status` varchar(20) COLLATE utf8_bin DEFAULT '',
  `RelateID` int(11) NOT NULL,
  `isDeleted` varchar(10) COLLATE utf8_bin DEFAULT '否',
  `DeleterName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `DeleteTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `TaskList`
--

INSERT INTO `TaskList` (`id`, `ParentID`, `TaskType`, `TaskName`, `CreateTime`, `DeadLine`, `SenderName`, `CreatorName`, `SenderCorp`, `ReciveCorp`, `GroupMember`, `DealGroupID`, `TaskInnerStatus`, `Status`, `RelateID`, `isDeleted`, `DeleterName`, `DeleteTime`) VALUES
(69, 0, '问题-整改', '机务四队-皮卡车-存放', '2019-01-14 08:14:26', NULL, '刘贝贝', '刘贝贝', '机务二队', '质检科', '李光耀 伊晗 张梦祥 ', '20190114081721142', NULL, '', 60, '否', NULL, NULL),
(70, 69, '整改通知书', '皮卡车存放-整改通知书', '2019-01-14 08:16:23', '2019-01-16', '史相陆', '史相陆', '质检科', '机务四队', NULL, NULL, '整改-待制定措施', '', 64, '否', NULL, NULL),
(71, 69, '整改通知书', '皮卡车存放-整改通知书', '2019-01-14 08:17:38', '2019-01-16', '李光耀', '李光耀', '质检科', '技术科', NULL, NULL, '整改-待制定措施', '', 63, '否', NULL, NULL),
(72, 0, '问题-整改', '航线工卡存放标识与实物不符', '2019-01-15 16:01:51', NULL, '李光耀', '李光耀', '质检科', '质检科', '李光耀 伊晗 ', '20190115160243733', NULL, '', 61, '否', NULL, NULL),
(73, 72, '整改通知书', '航线工卡存放标识与实物不符', '2019-01-15 16:07:46', '2019-01-19', '伊晗', '伊晗', '质检科', '机务四队', '孙延军 党立杰 ', '20190115161048260', '整改-待制定措施', '', 66, '否', NULL, NULL),
(74, 0, '问题-待处理', '1', '2019-01-15 16:32:11', NULL, '史相陆', '史相陆', '质检科', '质检科', NULL, NULL, NULL, '', 62, '否', NULL, NULL),
(75, 72, '整改通知书', '高梯上部防碰带破损', '2019-01-16 09:18:24', '2019-01-17', '史相陆', '史相陆', '质检科', '技术科', NULL, NULL, '整改-待制定措施', '', 67, '否', NULL, NULL);

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
(10, 72, '史相陆', '20190115160243733', '分解问题并下发整改。', '2019-01-15 16:02:43', 0),
(11, 73, '党立杰', '20190115161048260', '制定措施。', '2019-01-15 16:10:48', 0);

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
(9, 'lzf', '1', '机务二队', '刘宗福', '成员'),
(10, 'dlj', '1', '机务四队', '党立杰', '领导'),
(11, 'syj', '1', '机务四队', '孙延军', '成员');

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
-- 表的索引 `SysConf`
--
ALTER TABLE `SysConf`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用表AUTO_INCREMENT `QuestionList`
--
ALTER TABLE `QuestionList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- 使用表AUTO_INCREMENT `QuestionSource`
--
ALTER TABLE `QuestionSource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `ReformList`
--
ALTER TABLE `ReformList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- 使用表AUTO_INCREMENT `SysConf`
--
ALTER TABLE `SysConf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `TaskDealerGroup`
--
ALTER TABLE `TaskDealerGroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- 使用表AUTO_INCREMENT `TaskList`
--
ALTER TABLE `TaskList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- 使用表AUTO_INCREMENT `TaskLog`
--
ALTER TABLE `TaskLog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `TaskMsg`
--
ALTER TABLE `TaskMsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `UserList`
--
ALTER TABLE `UserList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
