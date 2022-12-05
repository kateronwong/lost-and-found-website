-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-12-03 13:58:04
-- 伺服器版本： 10.4.25-MariaDB
-- PHP 版本： 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `eie4432project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `userdata`
--

CREATE TABLE `userdata` (
  `ID` varchar(64) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `gender` char(1) NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(64) NOT NULL,
  `noticenum` int(11) NOT NULL,
  `respondnum` int(11) NOT NULL,
  `images` varchar(1000) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `userdata`
--

INSERT INTO `userdata` (`ID`, `nickname`, `email`, `gender`, `birthday`, `password`, `noticenum`, `respondnum`, `images`, `age`) VALUES
('admin', 'admin', 'admin@gmail.com', 'M', '2001-08-27', 'adminpass', 0, 0, 'Rimuru-Tempest-2EDE1tVcz-b.jpg', 21),
('georage', 'georage', 'georage@gmail.com', 'M', '2004-08-15', 'geroagepass', 0, 1, 'spider_man_in_the_rain-wallpaper-1920x1200.jpg', 18),
('wongwaiho', 'wongwaiho', 'wongwaihonew@gmail.com', 'M', '2001-08-27', 'wongho', 2, 2, '804947932361c87b0d35057abcd5f307.jpg', 21),
('tom', 'Tom', 'tom@gmail.com', 'M', '1990-08-01', 'tompass', 3, 0, 'wukung.jpg', 32),
('mary', 'mary', 'mary@gmail.com', 'F', '2010-12-15', 'marypass', 2, 0, '1008768.jpg', 12),
('alex', 'alex', 'alex@gmail.com', 'M', '1962-05-15', 'alexpass', 1, 0, '277674074_1395400257635764_2652038803146242953_n.jpg', 60),
('sophia', 'sophia', 'sophia@gmail.com', 'F', '1997-02-06', 'sophiapass', 3, 2, '170203182_3295666070659828_7362733300366746420_n.jpg', 25),
('emma', 'emma', 'emma@gmail.com', 'F', '1950-07-06', 'emmapass', 1, 0, 'indian-school-girl-happy-elementary-school-pupil-back-school_71593-1071.jpg', 72),
('katerson', 'katerson', 'katerson@gamil.com', 'M', '2001-08-27', 'newpass', 1, 1, '277674074_1395400257635764_2652038803146242953_n.jpg', 21);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
