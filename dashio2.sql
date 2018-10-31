-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-10-31 10:17:53
-- 服务器版本： 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashio2`
--

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `remember` varchar(32) NOT NULL DEFAULT '',
  `salt` varchar(10) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL DEFAULT '',
  `keycode` varchar(10) NOT NULL DEFAULT '',
  `route` int(1) NOT NULL DEFAULT '0',
  `logintime` varchar(100) NOT NULL DEFAULT '',
  `del` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `remember`, `salt`, `email`, `keycode`, `route`, `logintime`, `del`) VALUES
(1, 'admin', 'b9d11b3be25f5a1a7dc8ca04cd310b28', '', 'admin', '852688838@qq.com', '', 1, '', 0),
(2, 'adminq', 'ef9b7473db2f6ddd154b677b0732e539', '', 'VHzPe', '123456@qq.com', '', 0, '1540791485', 1),
(3, 'adminw', 'fa453f016cb5c3518f1630bcf73f17b0', '', 'vYIdo', 'adminw@qq.com', '', 0, '1540791748', 0),
(5, 'admine', 'b7609f5987e03f63ee99c4f08a3a4a17', '', 'cLMTW', 'admine@qq.com', '', 0, '1540791998', 0),
(6, 'adminr', '0ffe755099af3708e215fc6b2589b913', '', 'FxFFN', 'adminr@qq.com', '', 0, '1540792125', 0),
(7, 'admint', 'da2a7fb8b974f6bed90084b5d84f62f9', '', 'rgwVB', 'admint@qq.com', '', 0, '1540792310', 0),
(8, 'adminy', '1c49b8a1c75a0530831e77050559dfd9', '', 'hRYvY', 'adminy@qq.com', '', 0, '1540792490', 0),
(9, 'adminu', '270053af532162664d37b97113ee09b0', '', 'WuMha', 'adminu@qq.com', '', 0, '1540792563', 0),
(10, 'summer', '47abfb967867a47bfe444be4b606a34f', '', 'CsTCl', 'summer@qq.com', '', 0, '1540792836', 0),
(11, 'Aufree', '586789841ac7a99ac67e52afe6674bf5', '', 'RsxSv', 'Aufree@qq.com', '', 0, '1540793111', 0),
(18, 'adminp', '75860c78c380f7d4c72f125c08374e29', '', 'hNibp', 'adminp@qq.com', '', 0, '1540976387', 0),
(20, '', '', '', '', '', '8nCkwb2', 0, '', 0),
(21, '', '', '', '', '', '8CwSraf', 0, '', 0),
(22, '', '', '', '', '', 'BPHcsBK', 0, '', 0),
(23, '', '', '', '', '', 'KYQj7N6', 0, '', 0),
(24, '', '', '', '', '', 'AN8kACh', 0, '', 0),
(25, '', '', '', '', '', 'K4hNkQN', 0, '', 0),
(26, '', '', '', '', '', 'QRcFYws', 0, '', 0),
(27, '', '', '', '', '', 'k7KZs2k', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
