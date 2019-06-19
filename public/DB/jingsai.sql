-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-06-15 14:32:01
-- 服务器版本： 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jingsai`
--

-- --------------------------------------------------------

--
-- 表的结构 `GroupList`
--

CREATE TABLE `GroupList` (
  `id` int(11) NOT NULL,
  `GroupName` varchar(20) COLLATE utf8_bin NOT NULL,
  `CurFS` int(11) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `GroupList`
--

INSERT INTO `GroupList` (`id`, `GroupName`, `CurFS`) VALUES
(1, '机务工程部', 120),
(2, '飞行五大队', 79),
(3, '飞行六大队', 100),
(4, '分院机关', -100),
(5, '空管站', 100),
(6, '机务保障部', -200),
(7, '航空站', 100);

-- --------------------------------------------------------

--
-- 表的结构 `Subject`
--

CREATE TABLE `Subject` (
  `id` int(11) NOT NULL,
  `SubjectType` varchar(10) COLLATE utf8_bin NOT NULL,
  `SubjectContent` text COLLATE utf8_bin NOT NULL,
  `SubjectAnswer` text COLLATE utf8_bin NOT NULL,
  `SubjectOKFS` int(11) NOT NULL,
  `SubjectNOFS` int(11) NOT NULL,
  `IsOK` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `DTUser` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `DTTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `Subject`
--

INSERT INTO `Subject` (`id`, `SubjectType`, `SubjectContent`, `SubjectAnswer`, `SubjectOKFS`, `SubjectNOFS`, `IsOK`, `DTUser`, `DTTime`) VALUES
(5, '个人必答题', '&lt;p&gt;&lt;span style=&quot;font-size: 36px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;span style=&quot;font-family: 宋体; color: rgb(51, 51, 51); letter-spacing: 0px; background: white;&quot;&gt;《民航局偏离空管指令专项整治方案》的核心是要突出抓好“五防”工作，即&lt;/span&gt;&lt;span style=&quot;font-family: 宋体; color: rgb(68, 68, 68); background: white;&quot;&gt;防&lt;span style=&quot;text-decoration: underline;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/span&gt;，防飞错进/离场程序，防飞错航路/航线，防地面滑错路线，防通信失去联系。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', '<p><span style=\"font-size: 36px;\">飞错高度</span></p>', 10, 20, NULL, '分院机关', '2019-06-15 15:55:33'),
(6, '个人必答题', '&lt;p&gt;&lt;span style=&quot;font-size: 36px;&quot;&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;全国安全生产宣传咨询日活动在&lt;/span&gt;&lt;span style=&quot;text-decoration: underline; font-family: 宋体;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/span&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;开展。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-family: 宋体; font-size: 36px;&quot;&gt;A. 6月16日&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;B. 6月17日&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;C. 6月18日&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '<p><span style=\"font-family: 宋体; font-size: 36px;\">答案：A</span></p><p><br/></p>', 10, 20, NULL, '分院机关', '2019-06-15 22:14:55'),
(7, '个人必答题', '&lt;p&gt;&lt;span style=&quot;font-family: 宋体; font-size: 36px;&quot;&gt;安全是民航业的&lt;em&gt;&lt;span style=&quot;font-family: 宋体; text-decoration: underline;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/span&gt;&lt;/em&gt;。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-family: 宋体; font-size: 36px;&quot;&gt;A.底线&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; B.生命线&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; C.红线&amp;nbsp; &lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '<p><span style=\"font-family: 宋体; font-size: 36px;\">答案：B</span></p>', 10, 20, NULL, '机务工程部', '2019-06-15 15:55:01'),
(8, '个人必答题', '&lt;p&gt;&lt;span style=&quot;font-size: 36px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;span style=&quot;font-family: 宋体;&quot;&gt;安全生产工作应当以人为本，坚持安全发展，坚持&lt;/span&gt;&lt;span style=&quot;text-decoration: underline; font-family: 仿宋_GB2312;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/span&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;的方针，强化和落实生产经营单位的主体责任，建立生产经营单位负责、职工参与、政府监管、行业自律和社会监督的机制&lt;/span&gt;&lt;span style=&quot;font-family: SimSun;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', '<p><span style=\"font-family: 宋体; color: black; font-size: 36px;\">答案：安全第一、预防为主、综合治理</span></p><p><br/></p>', 10, 20, NULL, '', '2019-06-15 16:09:49'),
(9, '个人必答题', '&lt;p&gt;&lt;span style=&quot;font-size: 36px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;span style=&quot;font-family: 宋体; color: rgb(51, 51, 51); background: white;&quot;&gt;2018年6月8日，四川省、&lt;/span&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;中国民用航空局&lt;/span&gt;&lt;span style=&quot;font-family: 宋体; color: rgb(51, 51, 51); background: white;&quot;&gt;成功处置川航3U8633航班险情表彰大会在&lt;/span&gt;&lt;span style=&quot;font-family: 宋体; background: white;&quot;&gt;成都&lt;span style=&quot;color: rgb(51, 51, 51);&quot;&gt;举行。川航3U8633航班机组被授予&lt;span style=&quot;text-decoration: underline;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/span&gt;称号，机长刘传健被授予&lt;span style=&quot;text-decoration: underline;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/span&gt;称号。&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', '<p><span style=\"font-size: 36px;\"><span style=\"font-family: 宋体;\">答案：</span><span style=\"font-family: 宋体; color: rgb(51, 51, 51); background: white;\">中国民航英雄机组，中国民航英雄机长</span></span></p><p><br/></p>', 10, 20, NULL, '分院机关', '2019-06-15 22:13:52'),
(10, '抢答题', '&lt;p&gt;&lt;span style=&quot;font-family: 宋体; color: rgb(77, 79, 83); letter-spacing: 1px; font-size: 36px;&quot;&gt;2019年1月9日，民航局局长冯正霖在全国民航航空安全工作会议上强调，2019年航空安全工作要牢牢抓住&lt;span style=&quot;font-family: 宋体; color: rgb(77, 79, 83); letter-spacing: 1px; text-decoration: underline;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/span&gt;这一关键，加强作风建设，确保民航安全运行平稳可控，在推进民航强国建设和民航高质量发展的新征程中开创航空安全新局面、新业绩、新纪录。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '<p><span style=\"font-size: 36px;\"><span style=\"font-family: 宋体;\">答案：</span><span style=\"font-family: 宋体; color: rgb(77, 79, 83); letter-spacing: 1px;\">平时养成</span></span></p><p><br/></p>', 10, 20, NULL, '', '2019-06-15 22:14:03'),
(11, '案例题', '&lt;p style=&quot;text-indent:37px&quot;&gt;&lt;span style=&quot;font-size: 36px;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;2014&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;年5月12日，洛阳分院SR20/B-9576号飞机在进行训练时，飞机发动机在空中出现抖动，在返场时飞机失去动力，机组在空中打开飞机降落伞，飞机落在洛阳机场以西约16公里处的一土山上，人机安全。&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-indent:37px&quot;&gt;&lt;span style=&quot;font-size: 36px;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;经调查，事件原因为：1.&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;飞机的电动燃油增压泵出现故障，导致飞机燃油管路进入气体，在燃油管路中形成油气混合物&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;；2.&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;飞机在机动飞行时，输入到主燃油滤的油气混合物经过主燃油滤后，形成油气分离&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;；3.&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;主燃油滤输出的油气分离会形成气塞，导致发动机空中熄火。&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-indent:37px&quot;&gt;&lt;span style=&quot;font-size: 36px;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;请对此事件制定系统性安全管理措施。&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 宋体;&quot;&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '<p><span style=\"font-family: 宋体; font-size: 36px;\">答案：1.分院针对该机型认真开展空中发动机抖动、空中停车以及开降落伞的研讨，组织学习相关特殊情况的处置程序，进一步提高飞行人员处置特殊情况的能力； </span></p><p><span style=\"font-family: 宋体; font-size: 36px;\">2.分院主动联系飞机及部件生产厂家，分析飞机电动燃油增压泵的工作环境及特性、故障特点、平均故障时间，采取措施加强电动燃油增压泵的检查，改进部件时控间隔；</span></p><p><span style=\"font-family: 宋体; font-size: 36px;\">3.分院主动联系飞机设计及生产厂家，进一步就飞机主燃油滤的安装水平位置进行分析，增强飞机主燃油滤的防气塞功能。</span></p><p><br/></p>', 20, 20, NULL, '飞行五大队', '2019-06-15 11:19:18'),
(12, '个人必答题', '&lt;p&gt;&lt;span style=&quot;font-size: 36px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;span style=&quot;font-family: 宋体; color: rgb(51, 51, 51); letter-spacing: 0px; background: white;&quot;&gt;《民航局偏离空管指令专项整治方案》的核心是要突出抓好“五防”工作，即&lt;/span&gt;&lt;span style=&quot;font-family: 宋体; color: rgb(68, 68, 68); background: white;&quot;&gt;防&lt;span style=&quot;text-decoration: underline;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/span&gt;，防飞错进/离场程序，防飞错航路/航线，防地面滑错路线，防通信失去联系。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', '<p><span style=\"font-size: 36px;\"><span style=\"font-family: 宋体; color: rgb(51, 51, 51); letter-spacing: 0px; background: white;\">答案：</span><span style=\"font-family: 宋体; color: rgb(68, 68, 68); background: white;\">飞错高度</span></span></p><p><br/></p>', 10, 20, NULL, '分院机关', '2019-06-15 16:43:32');

-- --------------------------------------------------------

--
-- 表的结构 `UserList`
--

CREATE TABLE `UserList` (
  `id` int(11) NOT NULL,
  `Name` varchar(10) COLLATE utf8_bin NOT NULL,
  `GroupName` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `UserList`
--

INSERT INTO `UserList` (`id`, `Name`, `GroupName`) VALUES
(1, '机务1号', '机务工程部'),
(2, '机务2号', '机务工程部'),
(3, '五大队1号', '飞行五大队'),
(4, '五大队2号', '飞行五大队'),
(5, '六大队1号', '飞行六大队'),
(6, '六大队2号', '飞行六大队');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GroupList`
--
ALTER TABLE `GroupList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Subject`
--
ALTER TABLE `Subject`
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
-- 使用表AUTO_INCREMENT `GroupList`
--
ALTER TABLE `GroupList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `Subject`
--
ALTER TABLE `Subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `UserList`
--
ALTER TABLE `UserList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
