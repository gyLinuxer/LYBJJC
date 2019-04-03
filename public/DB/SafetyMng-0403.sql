-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-04-03 09:58:02
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
(1, '问题-整改', 75, 1),
(2, '问题-整改', 63, 2),
(3, '问题-整改', 64, 3),
(4, '问题-整改', 66, 4),
(5, '问题-整改', 67, 5),
(6, '问题-整改', 68, 6),
(7, '问题-整改', 65, 7),
(8, '问题-整改', 69, 8),
(9, '问题-整改', 70, 9),
(10, '问题-整改', 71, 10),
(11, '问题-整改', 72, 11),
(12, '问题-整改', 73, 12),
(13, '问题-整改', 74, 13),
(14, '问题-整改', 76, 14),
(15, '问题-整改', 63, 15),
(16, '问题-整改', 105, 16),
(17, '问题-整改', 106, 17),
(18, '问题-整改', 107, 18),
(19, '问题-整改', 107, 19),
(20, '问题-整改', 107, 20),
(21, '问题-整改', 107, 21),
(22, '问题-整改', 107, 22),
(23, '问题-整改', 107, 23),
(24, '问题-整改', 96, 24),
(25, '问题-整改', 122, 25),
(26, '问题-整改', 123, 26),
(27, '问题-整改', 124, 27),
(28, '问题-整改', 125, 28),
(29, '问题-整改', 126, 29),
(30, '问题-整改', 127, 30),
(31, '问题-整改', 128, 31),
(32, '问题-整改', 129, 32),
(33, '问题-整改', 130, 33),
(34, '问题-整改', 131, 34),
(35, '问题-整改', 132, 35),
(36, '问题-整改', 135, 36),
(37, '问题-整改', 137, 37),
(38, '问题-整改', 137, 38),
(39, '问题-整改', 137, 39),
(40, '问题-整改', 137, 40),
(41, '问题-整改', 138, 41),
(42, '问题-整改', 138, 42),
(43, '问题-整改', 138, 43),
(44, '问题-整改', 138, 44),
(45, '问题-整改', 139, 45),
(46, '问题-整改', 139, 46),
(47, '问题-整改', 139, 47),
(48, '问题-整改', 139, 48),
(49, '问题-整改', 140, 49),
(50, '问题-整改', 140, 50),
(51, '问题-整改', 140, 51),
(53, '问题-整改', 142, 53),
(54, '问题-整改', 145, 54),
(55, '问题-整改', 146, 55),
(56, '问题-整改', 147, 56),
(57, '问题-整改', 164, 57),
(58, '问题-整改', 165, 58);

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
  `ManageTime` datetime DEFAULT NULL,
  `QuestionSource` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `Finder` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `RelatedCorp` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `DateFound` date DEFAULT NULL,
  `Basis` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `QuestionList`
--

INSERT INTO `QuestionList` (`id`, `TaskID`, `DealType`, `QuestionTitle`, `QuestionInfo`, `subFileName`, `subFileSaveName`, `CreatorName`, `CreateTime`, `Status`, `ManagerName`, `ManageTime`, `QuestionSource`, `Finder`, `RelatedCorp`, `DateFound`, `Basis`) VALUES
(144, 269, '立即整改', '雷兔兔', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/e4978581a2e29165d5fa86c23ff0bd7a.jpg&quot; title=&quot;e4978581a2e29165d5fa86c23ff0bd7a.jpg&quot; alt=&quot;e4978581a2e29165d5fa86c23ff0bd7a.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 15:52:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 270, '立即整改', '突突突', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/90b7305ff7d46002f11d039680c7e239.jpg&quot; title=&quot;90b7305ff7d46002f11d039680c7e239.jpg&quot; alt=&quot;90b7305ff7d46002f11d039680c7e239.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 15:53:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 272, '立即整改', '图提高', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/0df0672268724500bbd8dd81a14a7603.jpg&quot; title=&quot;0df0672268724500bbd8dd81a14a7603.jpg&quot; alt=&quot;0df0672268724500bbd8dd81a14a7603.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 16:24:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 274, '立即整改', '季姬击鸡记', '&lt;p style=&quot;text-align: left;&quot;&gt;&lt;img src=&quot;/upload/20190402/b432d6fb6d5ebb0d731536fe0ba93fa5.jpg&quot; title=&quot;b432d6fb6d5ebb0d731536fe0ba93fa5.jpg&quot; alt=&quot;b432d6fb6d5ebb0d731536fe0ba93fa5.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 16:38:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 276, NULL, '问题1', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/aeb035730a5785495619d5314acaf760.jpg&quot; style=&quot;width:75%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 19:32:24', NULL, NULL, NULL, '维修单位法定自查', '李光耀  ', '航材科', NULL, 'CCAR-145R3'),
(149, 277, NULL, '短发短发的撒大法师 ', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/86544e39736aeafdef622c2d0d375d6c.jpeg&quot; style=&quot;width:75%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 19:35:49', NULL, NULL, NULL, '日常检察', '宋炎    ', '部领导', '2019-04-01', 'PQ-018'),
(150, 278, NULL, '呕吐机会', '&lt;p&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/upload/20190402/043776100957852d1ee1c6a632272510.mp4&quot; data-setup=&quot;{}&quot;&gt;&lt;source src=&quot;/upload/20190402/043776100957852d1ee1c6a632272510.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 19:52:57', NULL, NULL, NULL, '日常检察', '伊晗    ', '机务一队', '2019-04-02', 'OK了离开了'),
(151, 279, NULL, '啦啦啦吧', '&lt;p&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/upload/20190402/835c120c74c18703c2c8243973be45d4.mp4&quot; data-setup=&quot;{}&quot;&gt;&lt;source src=&quot;/upload/20190402/835c120c74c18703c2c8243973be45d4.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;&lt;p&gt;那么问题来了紧急集合&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 20:06:43', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20可以预防风雪1'),
(152, 280, NULL, '艾克里里了', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/48dd5ccac28ad29bb2967870c9e65540.jpg&quot; title=&quot;48dd5ccac28ad29bb2967870c9e65540.jpg&quot; alt=&quot;48dd5ccac28ad29bb2967870c9e65540.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 20:09:35', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20可以预防风雪1'),
(153, 281, NULL, '艾克里里了', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/48dd5ccac28ad29bb2967870c9e65540.jpg&quot; title=&quot;48dd5ccac28ad29bb2967870c9e65540.jpg&quot; alt=&quot;48dd5ccac28ad29bb2967870c9e65540.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 20:10:22', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20可以预防风雪1'),
(154, 282, NULL, '模棱两可', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/130289b06b5418176d1e7e00d3d10caa.jpg&quot; title=&quot;130289b06b5418176d1e7e00d3d10caa.jpg&quot; alt=&quot;130289b06b5418176d1e7e00d3d10caa.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 20:11:04', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20可以预防风雪1'),
(155, 283, NULL, '考虑考虑', '&lt;p&gt;季姬击鸡记&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 20:13:15', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20可以预防风雪1'),
(156, 284, NULL, '乌克丽丽', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/f19c491fef694b1add052a4f4c47ab2c.jpg&quot; title=&quot;f19c491fef694b1add052a4f4c47ab2c.jpg&quot; alt=&quot;f19c491fef694b1add052a4f4c47ab2c.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 22:36:54', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20可以预防风雪1'),
(157, 285, NULL, '乌克丽丽', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/f19c491fef694b1add052a4f4c47ab2c.jpg&quot; title=&quot;f19c491fef694b1add052a4f4c47ab2c.jpg&quot; alt=&quot;f19c491fef694b1add052a4f4c47ab2c.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 22:37:29', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20可以预防风雪1'),
(158, 286, NULL, '我先洗洗澡', '&lt;p&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/upload/20190402/606518449d09637ae3945187e377bab0.mp4&quot; data-setup=&quot;{}&quot;&gt;&lt;source src=&quot;/upload/20190402/606518449d09637ae3945187e377bab0.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 22:41:37', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20可以预防风雪1'),
(159, 287, NULL, '季姬击鸡记', '&lt;p&gt;考虑考虑&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 22:50:04', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20机库和车间照维修工作有效进行。2'),
(160, 288, NULL, '季姬击鸡记', '&lt;p&gt;考虑考虑&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 22:52:46', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20机库和车间照维修工作有效进行。2'),
(161, 289, NULL, '季姬击鸡记', '&lt;p&gt;考虑考虑&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 22:53:07', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20机库和车间照维修工作有效进行。2'),
(162, 290, NULL, '季姬击鸡记', '&lt;p&gt;考虑考虑&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 22:53:09', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20机库和车间照维修工作有效进行。2'),
(163, 291, NULL, '季姬击鸡记', '&lt;p&gt;考虑考虑&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 22:53:29', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-02', 'CCAR-145.20机库和车间照维修工作有效进行。2'),
(164, 292, '立即整改', '考虑考虑', '&lt;p&gt;经历了斤斤计较&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-02 22:55:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 294, '立即整改', '考虑考虑', '&lt;p&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/upload/20190403/6f5b3d2a3f49e79e303b9da99d43fd7d.mp4&quot; data-setup=&quot;{}&quot;&gt;&lt;source src=&quot;/upload/20190403/6f5b3d2a3f49e79e303b9da99d43fd7d.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-03 12:56:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 297, NULL, '照明不足', '&lt;p&gt;&lt;img src=&quot;/upload/20190403/7e7d121ab812fcbe81f9f8a105b0c56d.jpg&quot; title=&quot;7e7d121ab812fcbe81f9f8a105b0c56d.jpg&quot; alt=&quot;7e7d121ab812fcbe81f9f8a105b0c56d.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-04-03 14:47:14', NULL, NULL, NULL, '维修单位法定自查', '史相陆  ', '机务二队', '2019-04-03', 'CCAR-145.20机库和车间照维修工作有效进行。2');

-- --------------------------------------------------------

--
-- 表的结构 `QuestionSource`
--

CREATE TABLE `QuestionSource` (
  `id` int(11) NOT NULL,
  `SourceName` text COLLATE utf8_bin NOT NULL,
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
(4, '年度检验检查', 'NDJYJC', '2019-01-15 15:57:06'),
(5, '2019年2月开飞检查', 'KFJC-201902', '2019-02-17 10:58:29'),
(6, '维修单位法定自查', 'FDZC', '2019-04-01 21:35:05');

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
  `IssueCorp` varchar(20) COLLATE utf8_bin NOT NULL,
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

INSERT INTO `ReformList` (`id`, `ChildTaskID`, `ParentTaskID`, `Code`, `RelatedQuestionID`, `QuestionSourceName`, `CheckDate`, `Inspectors`, `IssueDate`, `RequestFeedBackDate`, `QuestionTitle`, `ReformTitle`, `NonConfirmDesc`, `Basis`, `IssueCorp`, `DutyCorp`, `CurDealCorp`, `ReformRequirement`, `RequireDefineCause`, `RequireDefineAction`, `DirectCause`, `RootCause`, `CauseEvalerName`, `CauseEvalTime`, `CorrectiveAction`, `CorrectiveDeadline`, `PrecautionAction`, `PrecautionDeadline`, `ActionMakerName`, `ActionMakeTime`, `ActionIsOK`, `ActionEval`, `ActionEvalerName`, `ActionEvalTime`, `ProofEvalIsOK`, `ProofEvalerName`, `Proof`, `ProofUploaderName`, `ProofUploadTime`, `ProofEvalTime`, `ProofEvalMemo`, `ReformStatus`, `DeleteTime`, `DeleterName`, `isDeleted`, `DeleteMemo`) VALUES
(54, 271, 270, 'FDZC-20190402155349586', 145, '维修单位法定自查', '2019-04-02', '史相陆  ', '2019-04-02', '2019-04-02', '突突突', '突突突', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/90b7305ff7d46002f11d039680c7e239.jpg&quot; title=&quot;90b7305ff7d46002f11d039680c7e239.jpg&quot; alt=&quot;90b7305ff7d46002f11d039680c7e239.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', ' CCAR-145.20可以预防风雪1', '质检科', '机务二队', '机务二队', ' 图图', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(55, 273, 272, 'FDZC-20190402162424700', 146, '维修单位法定自查', '2019-04-02', '史相陆  ', '2019-04-02', '2019-04-02', '图提高', '图提高', '&lt;p&gt;&lt;img src=&quot;/upload/20190402/0df0672268724500bbd8dd81a14a7603.jpg&quot; title=&quot;0df0672268724500bbd8dd81a14a7603.jpg&quot; alt=&quot;0df0672268724500bbd8dd81a14a7603.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', ' CCAR-145.20可以预防风雪1', '质检科', '机务二队', '机务二队', ' 米开朗基罗', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(56, 275, 274, 'FDZC-20190402163827810', 147, '维修单位法定自查', '2019-04-02', '史相陆  ', '2019-04-02', '2019-04-02', '季姬击鸡记', '季姬击鸡记', '&lt;p style=&quot;text-align: left;&quot;&gt;&lt;img src=&quot;/upload/20190402/b432d6fb6d5ebb0d731536fe0ba93fa5.jpg&quot; title=&quot;b432d6fb6d5ebb0d731536fe0ba93fa5.jpg&quot; alt=&quot;b432d6fb6d5ebb0d731536fe0ba93fa5.jpg&quot; style=&quot;max-width:100%&quot;/&gt;&lt;/p&gt;', ' CCAR-145.20可以预防风雪1', '质检科', '机务二队', '机务二队', ' 图图', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(57, 293, 292, 'FDZC-20190402225516230', 164, '维修单位法定自查', '2019-04-02', '史相陆  ', '2019-04-02', '2019-04-02', '考虑考虑', '考虑考虑', '&lt;p&gt;经历了斤斤计较&lt;/p&gt;', ' CCAR-145.20机库和车间照维修工作有效进行。为而为热舞33', '质检科', '机务二队', '机务二队', ' 看看斤斤计较', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(58, 295, 294, 'FDZC-20190403125613800', 165, '维修单位法定自查', '2019-04-03', '史相陆  ', '2019-04-03', '2019-04-03', '考虑考虑', '考虑考虑', '&lt;p&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/upload/20190403/6f5b3d2a3f49e79e303b9da99d43fd7d.mp4&quot; data-setup=&quot;{}&quot;&gt;&lt;source src=&quot;/upload/20190403/6f5b3d2a3f49e79e303b9da99d43fd7d.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;', ' CCAR-145.20可以预防风雪1', '质检科', '机务二队', '机务二队', ' 考虑考虑', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL);

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
(1, 'ReformDeletePwd', 'EGX26081', '2019-01-01 00:00:00');

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
(70, '20190115161048260', 73, '党立杰', '机务四队', '组员', '2019-01-15 16:10:48'),
(71, '20190121161727151', 103, '孙延军', '机务四队', '组长', '2019-01-21 16:17:27'),
(72, '20190121161727151', 103, '党立杰', '机务四队', '组员', '2019-01-21 16:17:27'),
(73, '20190228153038882', 79, '李光耀', '质检科', '组长', '2019-02-28 15:30:38'),
(74, '20190228153038882', 79, '张雪平', '质检科', '组员', '2019-02-28 15:30:38'),
(75, '20190228153038882', 79, '伊晗', '质检科', '组员', '2019-02-28 15:30:38'),
(76, '20190228153038882', 79, '张梦祥', '质检科', '组员', '2019-02-28 15:30:38'),
(77, '20190228153520242', 128, '李光耀', '质检科', '组长', '2019-02-28 15:35:20'),
(78, '20190228153520242', 128, '张雪平', '质检科', '组员', '2019-02-28 15:35:20'),
(79, '20190228153520242', 128, '伊晗', '质检科', '组员', '2019-02-28 15:35:20'),
(80, '20190228153520242', 128, '张梦祥', '质检科', '组员', '2019-02-28 15:35:20'),
(81, '20190228153535514', 127, '李光耀', '质检科', '组长', '2019-02-28 15:35:35'),
(82, '20190228153535514', 127, '张雪平', '质检科', '组员', '2019-02-28 15:35:35'),
(83, '20190228153535514', 127, '伊晗', '质检科', '组员', '2019-02-28 15:35:35'),
(84, '20190228153535514', 127, '张梦祥', '质检科', '组员', '2019-02-28 15:35:35'),
(85, '20190228153643349', 126, '伊晗', '质检科', '组长', '2019-02-28 15:36:43'),
(86, '20190228153643349', 126, '李光耀', '质检科', '组员', '2019-02-28 15:36:43'),
(87, '20190228153643349', 126, '张梦祥', '质检科', '组员', '2019-02-28 15:36:43'),
(88, '20190228153731475', 125, '李光耀', '质检科', '组长', '2019-02-28 15:37:31'),
(89, '20190228153731475', 125, '张雪平', '质检科', '组员', '2019-02-28 15:37:31'),
(90, '20190228153731475', 125, '伊晗', '质检科', '组员', '2019-02-28 15:37:31'),
(91, '20190228153731475', 125, '张梦祥', '质检科', '组员', '2019-02-28 15:37:31'),
(92, '20190228153740432', 124, '张雪平', '质检科', '组长', '2019-02-28 15:37:40'),
(93, '20190228153740432', 124, '李光耀', '质检科', '组员', '2019-02-28 15:37:40'),
(94, '20190228153740432', 124, '伊晗', '质检科', '组员', '2019-02-28 15:37:40'),
(95, '20190228153740432', 124, '张梦祥', '质检科', '组员', '2019-02-28 15:37:40'),
(96, '20190228154154848', 76, '李光耀', '质检科', '组长', '2019-02-28 15:41:54'),
(97, '20190228154154848', 76, '张雪平', '质检科', '组员', '2019-02-28 15:41:54'),
(98, '20190228154154848', 76, '王继红', '质检科', '组员', '2019-02-28 15:41:54'),
(99, '20190228154154848', 76, '伊晗', '质检科', '组员', '2019-02-28 15:41:54'),
(100, '20190228154224231', 77, '李光耀', '质检科', '组长', '2019-02-28 15:42:24'),
(101, '20190228154224231', 77, '伊晗', '质检科', '组员', '2019-02-28 15:42:24'),
(102, '20190228154239622', 78, '李光耀', '质检科', '组长', '2019-02-28 15:42:39'),
(103, '20190228154239622', 78, '伊晗', '质检科', '组员', '2019-02-28 15:42:39'),
(104, '20190301091805552', 129, '伊晗', '质检科', '组长', '2019-03-01 09:18:05'),
(105, '20190301091805552', 129, '张雪平', '质检科', '组员', '2019-03-01 09:18:05'),
(106, '20190301091816572', 80, '伊晗', '质检科', '组长', '2019-03-01 09:18:16'),
(107, '20190301091816572', 80, '张雪平', '质检科', '组员', '2019-03-01 09:18:16'),
(108, '20190301091816572', 80, '李光耀', '质检科', '组员', '2019-03-01 09:18:16'),
(109, '20190301091816572', 80, '张梦祥', '质检科', '组员', '2019-03-01 09:18:16'),
(110, '20190301091830376', 81, '伊晗', '质检科', '组长', '2019-03-01 09:18:30'),
(111, '20190301091830376', 81, '张雪平', '质检科', '组员', '2019-03-01 09:18:30'),
(112, '20190301091830376', 81, '李光耀', '质检科', '组员', '2019-03-01 09:18:30'),
(113, '20190301091830376', 81, '张梦祥', '质检科', '组员', '2019-03-01 09:18:30'),
(114, '20190301091840796', 82, '伊晗', '质检科', '组长', '2019-03-01 09:18:40'),
(115, '20190301091840796', 82, '张雪平', '质检科', '组员', '2019-03-01 09:18:40'),
(116, '20190301091840796', 82, '李光耀', '质检科', '组员', '2019-03-01 09:18:40'),
(117, '20190301091856451', 83, '李光耀', '质检科', '组长', '2019-03-01 09:18:56'),
(118, '20190301091856451', 83, '张雪平', '质检科', '组员', '2019-03-01 09:18:56'),
(119, '20190301091856451', 83, '伊晗', '质检科', '组员', '2019-03-01 09:18:56'),
(120, '20190301091856451', 83, '张梦祥', '质检科', '组员', '2019-03-01 09:18:56'),
(121, '20190301091909480', 84, '伊晗', '质检科', '组长', '2019-03-01 09:19:09'),
(122, '20190301091909480', 84, '张雪平', '质检科', '组员', '2019-03-01 09:19:09'),
(123, '20190301091909480', 84, '李光耀', '质检科', '组员', '2019-03-01 09:19:09'),
(124, '20190301091922890', 85, '李光耀', '质检科', '组长', '2019-03-01 09:19:22'),
(125, '20190301091922890', 85, '张雪平', '质检科', '组员', '2019-03-01 09:19:22'),
(126, '20190301091922890', 85, '伊晗', '质检科', '组员', '2019-03-01 09:19:22'),
(127, '20190301091934533', 86, '伊晗', '质检科', '组长', '2019-03-01 09:19:34'),
(128, '20190301091934533', 86, '张雪平', '质检科', '组员', '2019-03-01 09:19:34'),
(129, '20190301091934533', 86, '李光耀', '质检科', '组员', '2019-03-01 09:19:34'),
(130, '20190301091934533', 86, '张梦祥', '质检科', '组员', '2019-03-01 09:19:34'),
(131, '20190301091947776', 87, '李光耀', '质检科', '组长', '2019-03-01 09:19:47'),
(132, '20190301091947776', 87, '张雪平', '质检科', '组员', '2019-03-01 09:19:47'),
(133, '20190301091947776', 87, '伊晗', '质检科', '组员', '2019-03-01 09:19:47'),
(134, '20190301091947776', 87, '张梦祥', '质检科', '组员', '2019-03-01 09:19:47'),
(135, '20190301091957807', 88, '李光耀', '质检科', '组长', '2019-03-01 09:19:57'),
(136, '20190301091957807', 88, '张雪平', '质检科', '组员', '2019-03-01 09:19:57'),
(137, '20190301091957807', 88, '伊晗', '质检科', '组员', '2019-03-01 09:19:57'),
(138, '20190301091957807', 88, '张梦祥', '质检科', '组员', '2019-03-01 09:19:57'),
(139, '20190301092006824', 102, '李光耀', '质检科', '组长', '2019-03-01 09:20:06'),
(140, '20190301092006824', 102, '张雪平', '质检科', '组员', '2019-03-01 09:20:06'),
(141, '20190301092006824', 102, '伊晗', '质检科', '组员', '2019-03-01 09:20:06'),
(142, '20190301092006824', 102, '张梦祥', '质检科', '组员', '2019-03-01 09:20:06'),
(143, '20190301092014495', 115, '伊晗', '质检科', '组长', '2019-03-01 09:20:14'),
(144, '20190301092014495', 115, '李光耀', '质检科', '组员', '2019-03-01 09:20:14'),
(145, '20190301092014495', 115, '张梦祥', '质检科', '组员', '2019-03-01 09:20:14'),
(146, '20190301092024252', 116, '李光耀', '质检科', '组长', '2019-03-01 09:20:24'),
(147, '20190301092024252', 116, '张雪平', '质检科', '组员', '2019-03-01 09:20:24'),
(148, '20190301092024252', 116, '伊晗', '质检科', '组员', '2019-03-01 09:20:24'),
(149, '20190301092032514', 118, '张雪平', '质检科', '组长', '2019-03-01 09:20:32'),
(150, '20190301092032514', 118, '李光耀', '质检科', '组员', '2019-03-01 09:20:32'),
(151, '20190301092032514', 118, '伊晗', '质检科', '组员', '2019-03-01 09:20:32'),
(152, '20190301092041860', 119, '李光耀', '质检科', '组长', '2019-03-01 09:20:41'),
(153, '20190301092041860', 119, '张雪平', '质检科', '组员', '2019-03-01 09:20:41'),
(154, '20190301092041860', 119, '伊晗', '质检科', '组员', '2019-03-01 09:20:41'),
(155, '20190301092052521', 120, '伊晗', '质检科', '组长', '2019-03-01 09:20:52'),
(156, '20190301092052521', 120, '张雪平', '质检科', '组员', '2019-03-01 09:20:52'),
(157, '20190301092052521', 120, '李光耀', '质检科', '组员', '2019-03-01 09:20:52'),
(158, '20190301092052521', 120, '张梦祥', '质检科', '组员', '2019-03-01 09:20:52'),
(159, '20190301092104884', 121, '李光耀', '质检科', '组长', '2019-03-01 09:21:04'),
(160, '20190301092104884', 121, '伊晗', '质检科', '组员', '2019-03-01 09:21:04'),
(161, '20190301092104884', 121, '张梦祥', '质检科', '组员', '2019-03-01 09:21:04'),
(162, '20190301092115613', 122, '张雪平', '质检科', '组长', '2019-03-01 09:21:15'),
(163, '20190301092115613', 122, '李光耀', '质检科', '组员', '2019-03-01 09:21:15'),
(164, '20190301092115613', 122, '伊晗', '质检科', '组员', '2019-03-01 09:21:15'),
(165, '20190301092115613', 122, '张梦祥', '质检科', '组员', '2019-03-01 09:21:15'),
(166, '20190301092128375', 123, '李光耀', '质检科', '组长', '2019-03-01 09:21:28'),
(167, '20190301092128375', 123, '张雪平', '质检科', '组员', '2019-03-01 09:21:28'),
(168, '20190301092128375', 123, '伊晗', '质检科', '组员', '2019-03-01 09:21:28'),
(169, '20190301092128375', 123, '张梦祥', '质检科', '组员', '2019-03-01 09:21:28'),
(170, '20190301150147260', 130, '伊晗', '质检科', '组长', '2019-03-01 15:01:47'),
(171, '20190301150147260', 130, '张雪平', '质检科', '组员', '2019-03-01 15:01:47'),
(172, '20190301150147260', 130, '张梦祥', '质检科', '组员', '2019-03-01 15:01:47'),
(173, '20190309121745103', 150, '史相陆  ', '质检科', '组长', '2019-03-09 12:17:45'),
(174, '20190309121902663', 151, '史相陆  ', '质检科', '组长', '2019-03-09 12:19:02'),
(175, '20190309121957155', 152, '史相陆  ', '质检科', '组长', '2019-03-09 12:19:57'),
(176, '20190309123730436', 157, '史相陆  ', '质检科', '组长', '2019-03-09 12:37:30'),
(177, '20190309123926288', 158, '史相陆  ', '质检科', '组长', '2019-03-09 12:39:26'),
(178, '20190309124118349', 159, '史相陆  ', '质检科', '组长', '2019-03-09 12:41:18'),
(179, '20190309124645933', 160, '史相陆  ', '质检科', '组长', '2019-03-09 12:46:45'),
(180, '20190309125010681', 161, '史相陆  ', '质检科', '组长', '2019-03-09 12:50:10'),
(181, '20190309125038969', 162, '史相陆  ', '质检科', '组长', '2019-03-09 12:50:38'),
(182, '20190309161002274', 163, '史相陆  ', '质检科', '组长', '2019-03-09 16:10:02'),
(183, '20190309161604565', 165, '史相陆  ', '质检科', '组长', '2019-03-09 16:16:04'),
(184, '20190309162948294', 167, '史相陆  ', '质检科', '组长', '2019-03-09 16:29:48'),
(185, '20190310093930412', 169, '李李', '机务二队', '组长', '2019-03-10 09:39:30'),
(186, '20190311124750536', 171, '史相陆  ', '质检科', '组长', '2019-03-11 12:47:50'),
(187, '20190311125142741', 173, '史相陆  ', '质检科', '组长', '2019-03-11 12:51:42'),
(188, '20190313121302808', 167, '张雪平', '质检科', '组长', '2019-03-13 12:13:02'),
(189, '20190313121402449', 167, '张雪平', '质检科', '组长', '2019-03-13 12:14:02'),
(190, '20190315053324141', 179, '李李', '机务二队', '组长', '2019-03-15 05:33:24'),
(191, '20190315053456204', 180, '李李', '机务二队', '组长', '2019-03-15 05:34:56'),
(192, '20190315053554259', 185, '李李', '机务二队', '组长', '2019-03-15 05:35:54'),
(193, '20190315053558112', 190, '李李', '机务二队', '组长', '2019-03-15 05:35:58'),
(194, '20190315054825254', 195, '李李', '机务二队', '组长', '2019-03-15 05:48:25'),
(195, '20190321121902636', 207, '张雪平  ', '质检科', '组长', '2019-03-21 12:19:02'),
(196, '20190321121902636', 207, '王金燕  ', '质检科', '组员', '2019-03-21 12:19:02'),
(197, '20190321121918554', 208, '王金燕  ', '质检科', '组长', '2019-03-21 12:19:18'),
(198, '20190321121918554', 208, '薛鹏    ', '质检科', '组员', '2019-03-21 12:19:18'),
(199, '20190321202321621', 209, '张雪平  ', '质检科', '组长', '2019-03-21 20:23:21'),
(200, '20190321202321621', 209, '李光耀  ', '质检科', '组员', '2019-03-21 20:23:21'),
(201, '20190321202359860', 210, '张雪平  ', '质检科', '组长', '2019-03-21 20:23:59'),
(202, '20190321202359860', 210, '李光耀  ', '质检科', '组员', '2019-03-21 20:23:59'),
(203, '20190321202411234', 211, '张雪平  ', '质检科', '组长', '2019-03-21 20:24:11'),
(204, '20190321202411234', 211, '李光耀  ', '质检科', '组员', '2019-03-21 20:24:11'),
(205, '20190321202516356', 212, '张雪平  ', '质检科', '组长', '2019-03-21 20:25:16'),
(206, '20190321202516356', 212, '李光耀  ', '质检科', '组员', '2019-03-21 20:25:16'),
(207, '20190321202613721', 213, '张雪平  ', '质检科', '组长', '2019-03-21 20:26:13'),
(208, '20190321202613721', 213, '李光耀  ', '质检科', '组员', '2019-03-21 20:26:13'),
(209, '20190321202627443', 214, '张雪平  ', '质检科', '组长', '2019-03-21 20:26:27'),
(210, '20190321202627443', 214, '李光耀  ', '质检科', '组员', '2019-03-21 20:26:27'),
(211, '20190321202651520', 215, '张雪平  ', '质检科', '组长', '2019-03-21 20:26:51'),
(212, '20190321202651520', 215, '李光耀  ', '质检科', '组员', '2019-03-21 20:26:51'),
(213, '20190321202701783', 216, '张雪平  ', '质检科', '组长', '2019-03-21 20:27:01'),
(214, '20190321202701783', 216, '李光耀  ', '质检科', '组员', '2019-03-21 20:27:01'),
(215, '20190321203745306', 217, '张雪平  ', '质检科', '组长', '2019-03-21 20:37:45'),
(216, '20190321203745306', 217, '李光耀  ', '质检科', '组员', '2019-03-21 20:37:45'),
(217, '20190321205020818', 218, '王继红  ', '质检科', '组长', '2019-03-21 20:50:20'),
(218, '20190321205020818', 218, '薛鹏    ', '质检科', '组员', '2019-03-21 20:50:20'),
(219, '20190322102125258', 219, '王继红  ', '质检科', '组长', '2019-03-22 10:21:25'),
(220, '20190322102125258', 219, '薛鹏    ', '质检科', '组员', '2019-03-22 10:21:25'),
(221, '20190322102242866', 220, '张雪平  ', '质检科', '组长', '2019-03-22 10:22:42'),
(222, '20190322102242866', 220, '王金燕  ', '质检科', '组员', '2019-03-22 10:22:42'),
(223, '20190322102358751', 221, '张雪平  ', '质检科', '组长', '2019-03-22 10:23:58'),
(224, '20190322102358751', 221, '王金燕  ', '质检科', '组员', '2019-03-22 10:23:58'),
(225, '20190325081712370', 222, '张雪平  ', '质检科', '组长', '2019-03-25 08:17:12'),
(226, '20190325204509251', 223, '张雪平  ', '质检科', '组长', '2019-03-25 20:45:09'),
(227, '20190325204509251', 223, '王继红  ', '质检科', '组员', '2019-03-25 20:45:09'),
(228, '20190325204841130', 224, '张雪平  ', '质检科', '组长', '2019-03-25 20:48:41'),
(229, '20190325204841130', 224, '王继红  ', '质检科', '组员', '2019-03-25 20:48:41'),
(230, '20190325214808146', 225, '张雪平  ', '质检科', '组长', '2019-03-25 21:48:08'),
(231, '20190325214808146', 225, '王继红  ', '质检科', '组员', '2019-03-25 21:48:08'),
(232, '20190325214812290', 226, '张雪平  ', '质检科', '组长', '2019-03-25 21:48:12'),
(233, '20190325214812290', 226, '王继红  ', '质检科', '组员', '2019-03-25 21:48:12'),
(234, '20190325214817427', 227, '张雪平  ', '质检科', '组长', '2019-03-25 21:48:17'),
(235, '20190325214817427', 227, '王继红  ', '质检科', '组员', '2019-03-25 21:48:17'),
(236, '20190325214840172', 228, '张雪平  ', '质检科', '组长', '2019-03-25 21:48:40'),
(237, '20190325214840172', 228, '王继红  ', '质检科', '组员', '2019-03-25 21:48:40'),
(238, '20190325214857813', 229, '张雪平  ', '质检科', '组长', '2019-03-25 21:48:57'),
(239, '20190325214857813', 229, '王继红  ', '质检科', '组员', '2019-03-25 21:48:57'),
(240, '20190326080104760', 230, '张雪平  ', '质检科', '组长', '2019-03-26 08:01:04'),
(241, '20190326080104760', 230, '王继红  ', '质检科', '组员', '2019-03-26 08:01:04'),
(242, '20190326080128760', 231, '张雪平  ', '质检科', '组长', '2019-03-26 08:01:28'),
(243, '20190326080128760', 231, '王继红  ', '质检科', '组员', '2019-03-26 08:01:28'),
(244, '20190326120724709', 232, '张雪平  ', '质检科', '组长', '2019-03-26 12:07:24'),
(245, '20190326120724709', 232, '王继红  ', '质检科', '组员', '2019-03-26 12:07:24'),
(246, '20190326121018748', 233, '张雪平  ', '质检科', '组长', '2019-03-26 12:10:18'),
(247, '20190326121018748', 233, '王继红  ', '质检科', '组员', '2019-03-26 12:10:18'),
(248, '20190326192104599', 234, '王金燕  ', '质检科', '组长', '2019-03-26 19:21:04'),
(249, '20190326213809134', 235, '王金燕  ', '质检科', '组长', '2019-03-26 21:38:09'),
(250, '20190327114757807', 236, '王金燕  ', '质检科', '组长', '2019-03-27 11:47:57'),
(251, '20190327191744541', 237, '王金燕  ', '质检科', '组长', '2019-03-27 19:17:44'),
(252, '20190327191912590', 238, '王金燕  ', '质检科', '组长', '2019-03-27 19:19:12'),
(253, '20190327191915652', 239, '王金燕  ', '质检科', '组长', '2019-03-27 19:19:15'),
(254, '20190327191923475', 240, '张雪平  ', '质检科', '组长', '2019-03-27 19:19:23'),
(255, '20190327191923475', 240, '王继红  ', '质检科', '组员', '2019-03-27 19:19:23'),
(256, '20190327191927595', 241, '张雪平  ', '质检科', '组长', '2019-03-27 19:19:27'),
(257, '20190327191927595', 241, '王继红  ', '质检科', '组员', '2019-03-27 19:19:27'),
(258, '20190327191929457', 242, '张雪平  ', '质检科', '组长', '2019-03-27 19:19:29'),
(259, '20190327191929457', 242, '王继红  ', '质检科', '组员', '2019-03-27 19:19:29'),
(260, '20190327192150868', 243, '张雪平  ', '质检科', '组长', '2019-03-27 19:21:50'),
(261, '20190327192150868', 243, '王金燕  ', '质检科', '组员', '2019-03-27 19:21:50'),
(262, '20190327192157563', 244, '张雪平  ', '质检科', '组长', '2019-03-27 19:21:57'),
(263, '20190327192157563', 244, '王金燕  ', '质检科', '组员', '2019-03-27 19:21:57'),
(264, '20190327193647612', 245, '王金燕  ', '质检科', '组长', '2019-03-27 19:36:47'),
(265, '20190327193835200', 246, '王金燕  ', '质检科', '组长', '2019-03-27 19:38:35'),
(266, '20190327194133620', 247, '张雪平  ', '质检科', '组长', '2019-03-27 19:41:33'),
(267, '20190327194133620', 247, '王金燕  ', '质检科', '组员', '2019-03-27 19:41:33'),
(268, '20190327200536697', 248, '张雪平  ', '质检科', '组长', '2019-03-27 20:05:36'),
(269, '20190327200536697', 248, '王金燕  ', '质检科', '组员', '2019-03-27 20:05:36'),
(270, '20190327222522315', 249, '张雪平  ', '质检科', '组长', '2019-03-27 22:25:22'),
(271, '20190327222522315', 249, '薛鹏    ', '质检科', '组员', '2019-03-27 22:25:22'),
(272, '20190328102855660', 250, '张雪平  ', '质检科', '组长', '2019-03-28 10:28:55'),
(273, '20190328102855660', 250, '王金燕  ', '质检科', '组员', '2019-03-28 10:28:55'),
(274, '20190328210902779', 251, '张雪平  ', '质检科', '组长', '2019-03-28 21:09:02'),
(275, '20190328210902779', 251, '王金燕  ', '质检科', '组员', '2019-03-28 21:09:02'),
(276, '20190329113612813', 252, '张雪平  ', '质检科', '组长', '2019-03-29 11:36:12'),
(277, '20190329113612813', 252, '薛鹏    ', '质检科', '组员', '2019-03-29 11:36:12'),
(278, '20190401074130261', 253, '王继红  ', '质检科', '组长', '2019-04-01 07:41:30'),
(279, '20190401074130261', 253, '薛鹏    ', '质检科', '组员', '2019-04-01 07:41:30'),
(280, '20190401080820884', 254, '张雪平  ', '质检科', '组长', '2019-04-01 08:08:20'),
(281, '20190401080820884', 254, '王金燕  ', '质检科', '组员', '2019-04-01 08:08:20'),
(282, '20190401081045826', 255, '王继红  ', '质检科', '组长', '2019-04-01 08:10:45'),
(283, '20190401090820455', 256, '张雪平  ', '质检科', '组长', '2019-04-01 09:08:20'),
(284, '20190401090820455', 256, '王金燕  ', '质检科', '组员', '2019-04-01 09:08:20'),
(285, '20190401092842858', 257, '王继红  ', '质检科', '组长', '2019-04-01 09:28:42'),
(286, '20190401144649301', 258, '李光耀  ', '质检科', '组长', '2019-04-01 14:46:49'),
(287, '20190401144649301', 258, '伊晗    ', '质检科', '组员', '2019-04-01 14:46:49'),
(288, '20190401150355154', 259, '薛鹏    ', '质检科', '组长', '2019-04-01 15:03:55'),
(289, '20190401150430706', 260, '王金燕  ', '质检科', '组长', '2019-04-01 15:04:30'),
(290, '20190401150430706', 260, '薛鹏    ', '质检科', '组员', '2019-04-01 15:04:30'),
(291, '20190401202034493', 261, '张雪平  ', '质检科', '组长', '2019-04-01 20:20:34'),
(292, '20190401202034493', 261, '王继红  ', '质检科', '组员', '2019-04-01 20:20:34'),
(293, '20190401212450200', 262, '王金燕  ', '质检科', '组长', '2019-04-01 21:24:50'),
(294, '20190401212450200', 262, '王继红  ', '质检科', '组员', '2019-04-01 21:24:50'),
(295, '20190401213520759', 263, '张雪平  ', '质检科', '组长', '2019-04-01 21:35:20'),
(296, '20190401213520759', 263, '薛鹏    ', '质检科', '组员', '2019-04-01 21:35:20'),
(297, '20190401225921190', 265, '张雪平  ', '质检科', '组长', '2019-04-01 22:59:21'),
(298, '20190401225921190', 265, '薛鹏    ', '质检科', '组员', '2019-04-01 22:59:21'),
(299, '20190402081820664', 266, '王金燕  ', '质检科', '组长', '2019-04-02 08:18:20'),
(300, '20190402081820664', 266, '薛鹏    ', '质检科', '组员', '2019-04-02 08:18:20'),
(301, '20190402085732431', 267, '王金燕  ', '质检科', '组长', '2019-04-02 08:57:32'),
(302, '20190402085732431', 267, '王继红  ', '质检科', '组员', '2019-04-02 08:57:32'),
(303, '20190402092302553', 268, '李光耀  ', '质检科', '组长', '2019-04-02 09:23:02'),
(304, '20190402092302553', 268, '史相陆  ', '质检科', '组员', '2019-04-02 09:23:02'),
(305, '20190402155252213', 269, '史相陆  ', '质检科', '组长', '2019-04-02 15:52:52'),
(306, '20190402155349238', 270, '史相陆  ', '质检科', '组长', '2019-04-02 15:53:49'),
(307, '20190402162424860', 272, '史相陆  ', '质检科', '组长', '2019-04-02 16:24:24'),
(308, '20190402163827249', 274, '史相陆  ', '质检科', '组长', '2019-04-02 16:38:27'),
(309, '20190402225516930', 292, '史相陆  ', '质检科', '组长', '2019-04-02 22:55:16'),
(310, '20190403125613970', 294, '史相陆  ', '质检科', '组长', '2019-04-03 12:56:13'),
(311, '20190403144601614', 296, '李光耀  ', '质检科', '组长', '2019-04-03 14:46:01'),
(312, '20190403144601614', 296, '张梦祥  ', '质检科', '组员', '2019-04-03 14:46:01');

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
  `SenderName` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `CreatorName` varchar(20) COLLATE utf8_bin DEFAULT NULL,
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
(293, 292, '整改通知书', '考虑考虑', '2019-04-02 22:55:16', '2019-04-02', '史相陆  ', '史相陆  ', '质检科', '机务二队', NULL, NULL, '未分析原因制定措施', '', 57, '否', NULL, NULL),
(294, 0, '问题-立即整改', '考虑考虑', '2019-04-03 12:56:13', NULL, NULL, NULL, NULL, '质检科', NULL, NULL, NULL, '', 165, '否', NULL, NULL),
(295, 294, '整改通知书', '考虑考虑', '2019-04-03 12:56:13', '2019-04-03', '史相陆  ', '史相陆  ', '质检科', '机务二队', NULL, NULL, '未分析原因制定措施', '', 58, '否', NULL, NULL),
(296, 0, '在线检查任务', '19年法定自查', '2019-04-03 14:46:01', NULL, NULL, NULL, NULL, '质检科', '李光耀   张梦祥   ', '20190403144601614', NULL, '', 68, '否', NULL, NULL),
(297, 0, '问题-待处理', '照明不足', '2019-04-03 14:47:14', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', NULL, NULL, NULL, '', 166, '否', NULL, NULL);

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
  `CorpRole` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '领导与成员',
  `ISQSInspector` varchar(4) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `UserList`
--

INSERT INTO `UserList` (`id`, `UserName`, `Pwd`, `Corp`, `Name`, `CorpRole`, `ISQSInspector`) VALUES
(1, 'cafccafc', 'atestu', '部领导', '乔树旺  ', '领导', 'NO'),
(2, 'yikeshu', '697120', '部领导', '蒋平清  ', '领导', 'NO'),
(3, 'songyan', 'songyan', '部领导', '宋炎    ', '领导', 'NO'),
(4, 'zhangsq', '3189487', '部领导', '张绍群  ', '领导', 'NO'),
(5, 'LUOHONG', '345678', '航材科', '骆红忠  ', '成员', 'NO'),
(6, 'lhplhp', '608608', '航材科', '李恒鹏  ', '领导', 'NO'),
(7, 'hckhwg', '920917', '航材科', '黄文刚  ', '成员', 'NO'),
(8, 'CXLCXL', '680216', '航材科', '常小丽  ', '成员', 'NO'),
(9, 'GAODAN', '831030', '航材科', '高丹    ', '成员', 'NO'),
(10, 'LIXIAOYAN', '566666', '航材科', '李晓燕  ', '成员', 'NO'),
(11, '机务航材张培', '654321', '航材科', '张培    ', '成员', 'NO'),
(12, 'zwqdem', '80000000', '机务二队', '赵文强  ', '领导', 'NO'),
(13, 'taofuyi', '990929', '机务二队', '陶福义  ', '成员', 'NO'),
(14, 'HBFHBF', '760324', '机务二队', '韩宝峰  ', '领导', 'NO'),
(15, '570824', '570824', '机务二队', '李水堂  ', '成员', 'NO'),
(16, '111111', '222222', '机务二队', '郭祥亮  ', '成员', 'NO'),
(17, 'NANYONGT', '121121', '机务二队', '南勇涛  ', '成员', 'NO'),
(18, 'QIAOFENG', '780806', '机务二队', '袁浩    ', '成员', 'NO'),
(19, 'liguodong', '990116', '机务二队', '李国栋  ', '成员', 'NO'),
(20, 'gggggg', '760608', '机务二队', '郭振海  ', '成员', 'NO'),
(21, 'FEI2008', '701145', '机务二队', '王向群  ', '成员', 'NO'),
(22, 'yanglei', '654321', '机务二队', '杨雷    ', '领导', 'NO'),
(23, 'niubinghui', '123456', '机务二队', '牛炳辉  ', '领导', 'NO'),
(24, 'philips', 'philips', '机务二队', '郑斌    ', '成员', 'NO'),
(25, 'daphne', '841102', '机务二队', '柴瑞    ', '成员', 'NO'),
(26, 'shixinjun', 'sxjsxj', '机务二队', '史新军  ', '成员', 'NO'),
(27, 'yanghongmei', '111111', '机务二队', '杨红梅  ', '成员', 'NO'),
(28, 'haidaowei', '142886', '机务二队', '张伟    ', '成员', 'NO'),
(29, '999999', '888888', '机务二队', '杨思君  ', '成员', 'NO'),
(30, 'zzzzmm', '123456', '机务二队', '赵志敏  ', '成员', 'NO'),
(31, 'zhp001', '19821004', '机务二队', '张洪浦  ', '成员', 'NO'),
(32, 'wuwei123', '123456', '机务二队', '武伟    ', '成员', 'NO'),
(33, 'yangzz', '0', '机务二队', '杨忠周  ', '成员', 'NO'),
(34, 'zhoujiulai', 'zhoujiulai568', '机务二队', '周九来  ', '成员', 'NO'),
(35, 'yangsizhu', 'yang00', '机务二队', '杨思柱  ', '成员', 'NO'),
(36, 'Babyisme', 'Baby0208', '机务二队', '刘贝贝  ', '成员', 'NO'),
(37, 'dwu_09', '123wazhd', '机务二队', '吴迪    ', '成员', 'NO'),
(38, 'liuzongfu', '34345234', '机务二队', '刘宗福  ', '成员', 'NO'),
(39, 'zhao3186426', '112233', '机务二队', '赵龙飞  ', '成员', 'NO'),
(40, 'haohao2130686', 'abcd1234', '机务二队', '张铭裕  ', '成员', 'NO'),
(41, 'shark617', '3826101', '机务二队', '王尚    ', '成员', 'NO'),
(42, 'liming', '123456', '机务二队', '李明    ', '成员', 'NO'),
(43, 'yuan720304', '3182305', '机务三队', '袁胜平  ', '领导', 'NO'),
(44, 'dashuiya', '7505058920', '机务三队', '孟现召  ', '领导', 'NO'),
(45, 'ffffff', '195837', '机务三队', '沈凤彩  ', '成员', 'NO'),
(46, 'huatao', '666888', '机务三队', '化运涛  ', '成员', 'NO'),
(47, 'YANGYUFENG', '790426', '机务三队', '杨豫封  ', '领导', 'NO'),
(48, 'WSK19600129', '19600129', '机务三队', '王遂坤  ', '成员', 'NO'),
(49, 'TangXiaoBo', '781214', '机务三队', '唐晓波  ', '成员', 'NO'),
(50, 'YX1978', '231082', '机务三队', '杨鑫    ', '领导', 'NO'),
(51, 'liuhuimin', 'liuhuimin', '机务三队', '刘惠民  ', '成员', 'NO'),
(52, 'heqingmin', '13598160025', '机务三队', '何庆民  ', '成员', 'NO'),
(53, 'hckcdz', '62328209', '机务三队', '王会川  ', '成员', 'NO'),
(54, 'GJTGJT', '123456', '机务三队', '关金亭  ', '成员', 'NO'),
(55, '123456', '123456', '机务三队', '张古生  ', '成员', 'NO'),
(56, '15896555218', 'nannan7d806', '机务三队', '王楠楠  ', '成员', 'NO'),
(57, 'dlj410327', '5010850108', '机务四队', '党利杰  ', '领导', 'NO'),
(58, 'lhwddn', '123456', '机务四队', '陆红伟  ', '领导', 'NO'),
(59, '3435.3602', '197535', '机务四队', '潘立军  ', '成员', 'NO'),
(60, 'rabber', '803248', '机务四队', '王澄然  ', '领导', 'NO'),
(61, '551212', '121255', '机务四队', '陈友才  ', '成员', 'NO'),
(62, 'wangyajun', '991690', '机务四队', '汪亚军  ', '成员', 'NO'),
(63, 'gaoyunjiang', '570707', '机务四队', '高云江  ', '成员', 'NO'),
(64, 'YXLYXL', '135790', '机务四队', '余学礼  ', '成员', 'NO'),
(65, 'jiajia', '981125', '机务四队', '贾建全  ', '成员', 'NO'),
(66, 'gucuong', '751110', '机务四队', '王会山  ', '成员', 'NO'),
(67, 'abcdef', '218', '机务四队', '冯杰    ', '成员', 'NO'),
(68, 'wuchunqing', '3189548', '机务四队', '吴春青  ', '成员', 'NO'),
(69, 'YINCHUN', '970611', '机务四队', '尹春雷  ', '成员', 'NO'),
(70, 'shujinmei', '123456', '机务四队', '舒津梅  ', '成员', 'NO'),
(71, '34353470', '1973414', '机务四队', '袁秦川  ', '成员', 'NO'),
(72, 'flower', '555555', '机务四队', '韩存才  ', '成员', 'NO'),
(73, 'HEJING', '3189301', '机务四队', '何京    ', '成员', 'NO'),
(74, 'hlpalm', '3944747', '机务四队', '韩磊    ', '成员', 'NO'),
(75, 'dsplwdsp', '159123', '机务四队', '刘伟    ', '成员', 'NO'),
(76, 'zhangpeng', '275811', '机务四队', '张鹏    ', '成员', 'NO'),
(77, 'libingyin', '123456', '机务四队', '李炳银  ', '成员', 'NO'),
(78, 'sjdwade', '123456', '机务四队', '韩强    ', '成员', 'NO'),
(79, 'zhangyufan', '123456', '机务四队', '张誉凡  ', '成员', 'NO'),
(80, 'sunyanjun', 'sunyanjun', '机务四队', '孙延军  ', '成员', 'NO'),
(81, 'zhangcunyue', '13233966426', '机务四队', '张存岳  ', '成员', 'NO'),
(82, 'tobago', '2315101', '机务一队', '崔传捷  ', '成员', 'NO'),
(83, 'aaaggg', '631200', '质检科', '张雪平  ', '成员', 'NO'),
(84, 'huohuo', '60606', '机务一队', '霍修波  ', '成员', 'NO'),
(85, 'CAIWEI111', '111111', '机务一队', '蔡卫    ', '领导', 'NO'),
(86, 'kangxh', '153759', '机务一队', '亢小辉  ', '领导', 'NO'),
(87, 'ZHAOJUN', '2211', '机务一队', '赵军    ', '成员', 'NO'),
(88, 'ZZLZZL', '630415', '机务一队', '朱仲林  ', '领导', 'NO'),
(89, 'fengfei3', '51089653', '机务一队', '吴建勋  ', '成员', 'NO'),
(90, 'liukai', '3189399', '机务一队', '刘凯    ', '成员', 'NO'),
(91, 'hanwei', '7415963', '机务一队', '韩卫    ', '领导', 'NO'),
(92, 'guohongan', 'guohongan', '机务一队', '郭红安  ', '成员', 'NO'),
(93, 'abcdefg', '0', '机务一队', '王剑峰  ', '成员', 'NO'),
(94, 'cuiningtao', '7007', '机务一队', '崔宁涛  ', '成员', 'NO'),
(95, 'wujiajia', '840202520', '机务一队', '武甲    ', '成员', 'NO'),
(96, 'lbling', '123456', '机务一队', '刘宝林  ', '成员', 'NO'),
(97, 'fusujian', '413319', '机务一队', '符富强  ', '成员', 'NO'),
(98, 'flycloudxd', '0', '机务一队', '张毅    ', '成员', 'NO'),
(99, '980550212', '111111', '机务一队', '王蒙恩  ', '成员', 'NO'),
(100, 'yangze', '303495491', '机务一队', '杨泽    ', '成员', 'NO'),
(101, 'weishaopeng', '629216', '机务一队', '卫少鹏  ', '成员', 'NO'),
(102, 'wangyibo', '123456', '机务一队', '王毅博  ', '成员', 'NO'),
(103, 'redfox', '8292382818', '技术科', '刘磊    ', '成员', 'NO'),
(104, 'zhanggongwei', '3189465', '技术科', '张公伟  ', '成员', 'NO'),
(105, 'foolfishpig', '846916762', '技术科', '余杰    ', '成员', 'NO'),
(106, 'yugezi', 'yugezi', '技术科', '王凯    ', '领导', 'NO'),
(107, 'folksongs', '143143', '技术科', '李自山  ', '成员', 'NO'),
(108, 'CAFUC-STF', '19900302WOAINI', '技术科', '盛腾飞  ', '成员', 'NO'),
(109, 'JWBSCK', '0', '生产科', '赵振平  ', '成员', 'NO'),
(110, 'yqyqyq', '350109', '生产科', '杨颖    ', '成员', 'NO'),
(111, 'hanhui', '814915', '生产科', '韩爱辉  ', '成员', 'NO'),
(112, 'panxiangwu', '770110', '生产科', '潘向武  ', '成员', 'NO'),
(113, 'qinguanggui', '0', '生产科', '秦广贵  ', '成员', 'NO'),
(114, 'fanpengfei', '751024', '生产科', '樊鹏飞  ', '成员', 'NO'),
(115, 'liuling', '19830626', '生产科', '刘玲    ', '成员', 'NO'),
(116, 'yangheng', 'yangheng', '生产科', '杨姮    ', '成员', 'NO'),
(117, 'guanshichao666', '8686886g', '生产科', '关世超  ', '成员', 'NO'),
(118, 'HZXHZX', '63188961', '生产科', '赫忠献  ', '成员', 'NO'),
(119, 'donghong', '998109', '生产科', '董红    ', '成员', 'NO'),
(120, 'peiyifei', '123456', '生产科', '裴一斐  ', '成员', 'NO'),
(121, 'wangjinyan', '626391', '质检科', '王金燕  ', '成员', 'NO'),
(122, 'ccafc1', '664422', '质检科', '王继红  ', '领导', 'NO'),
(123, 'xuepeng', '870105', '质检科', '薛鹏    ', '成员', 'NO'),
(124, 'sxl6666', '981230', '质检科', '史相陆  ', '领导', 'NO'),
(125, 'zkgy2000', 'yuanzhi', '质检科', '李光耀  ', '成员', 'NO'),
(126, 'shineyyh', '87890856yy', '质检科', '伊晗    ', '成员', 'NO'),
(127, 'zmx977613541', 'zmx613541', '质检科', '张梦祥  ', '成员', 'NO'),
(128, 'lgy', '1', '机务二队', '李李', '领导', 'NO'),
(129, 'yd', '1', '机务一队', '一队测试', '领导', 'YES'),
(130, 'sd', '1', '机务三队', '三队测试', '领导', 'YES'),
(131, 'sid', '1', '机务四队', '四队测试', '领导', 'YES');

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
-- Indexes for table `IDCrossIndex`
--
ALTER TABLE `IDCrossIndex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `QuestionList`
--
ALTER TABLE `QuestionList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `QuestionSource`
--
ALTER TABLE `QuestionSource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ReformList`
--
ALTER TABLE `ReformList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SecondHalfCheckTB`
--
ALTER TABLE `SecondHalfCheckTB`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SysConf`
--
ALTER TABLE `SysConf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TaskDealerGroup`
--
ALTER TABLE `TaskDealerGroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TaskList`
--
ALTER TABLE `TaskList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TaskLog`
--
ALTER TABLE `TaskLog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TaskMsg`
--
ALTER TABLE `TaskMsg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserList`
--
ALTER TABLE `UserList`
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
-- 使用表AUTO_INCREMENT `IDCrossIndex`
--
ALTER TABLE `IDCrossIndex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- 使用表AUTO_INCREMENT `QuestionList`
--
ALTER TABLE `QuestionList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- 使用表AUTO_INCREMENT `QuestionSource`
--
ALTER TABLE `QuestionSource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `ReformList`
--
ALTER TABLE `ReformList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- 使用表AUTO_INCREMENT `SecondHalfCheckTB`
--
ALTER TABLE `SecondHalfCheckTB`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `SysConf`
--
ALTER TABLE `SysConf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `TaskDealerGroup`
--
ALTER TABLE `TaskDealerGroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;
--
-- 使用表AUTO_INCREMENT `TaskList`
--
ALTER TABLE `TaskList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;
--
-- 使用表AUTO_INCREMENT `TaskLog`
--
ALTER TABLE `TaskLog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `TaskMsg`
--
ALTER TABLE `TaskMsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `UserList`
--
ALTER TABLE `UserList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
