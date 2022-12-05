-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-12-03 13:58:31
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
-- 資料表結構 `notice`
--

CREATE TABLE `notice` (
  `notice_id` varchar(256) NOT NULL,
  `creatorID` varchar(9999) NOT NULL,
  `topic` varchar(9999) NOT NULL,
  `type` varchar(9999) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(9999) NOT NULL,
  `contact` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `completed` varchar(1) NOT NULL,
  `respond` mediumtext NOT NULL,
  `rdate` date DEFAULT NULL,
  `respondperson` varchar(999) NOT NULL,
  `noticeimage` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `notice`
--

INSERT INTO `notice` (`notice_id`, `creatorID`, `topic`, `type`, `date`, `venue`, `contact`, `description`, `completed`, `respond`, `rdate`, `respondperson`, `noticeimage`) VALUES
('1', 'wongwaiho', 'Lost my book', 'lost', '2022-10-28', 'Polyu', '67020571', 'i just lost my book at polyu', 'T', 'I found it, let me return it to you!', '2022-11-15', 'katerson', 'top-10-books-every-college-student-read-1024x640.jpeg'),
('10', 'mary', 'lost my ssd', 'lost', '2022-05-25', 'Polyu lab', '58974512', 'I lost my ssd last weekend at polyu lab and it is very important to me, anyone saw it?!', 'T', 'I have saw it!!please contact me !', '2022-11-15', 'georage', 'Super-Fast-External-12092539.jpg'),
('11', 'alex', 'found a book', 'found', '2022-01-12', 'polyu hall', '95648741', 'I found a book about html programming ', 'T', 'it is mine thanks a lot!!!', '2022-11-15', 'sophia', 'top-10-books-every-college-student-read-1024x640.jpeg'),
('12', 'emma', 'my toy', 'lost', '2022-10-28', 'hong kong ', '65447951', 'i lost my favourte toy ', 'T', 'I had saw it before !!itis in my friends home!', '2022-11-15', 'sophia', 'indian-school-girl-happy-elementary-school-pupil-back-school_71593-1071.jpg'),
('13', 'katerson', 'lost my phone ', 'found', '2022-11-03', 'polyu FJ301', '67020571', 'I lost my phone iPhone 14 pro max yesterday, anyone sees it? please contact me!!', 'F', '', NULL, '', 'Apple_iphone_14_Pro_iPhone_14_Pro_Max_concept_renderings_drdNBC.jpg'),
('2', 'wongwaiho', 'Lost Geometry Box', 'lost', '2018-06-12', 'RPB Public School', '67020571', 'All the students of our school are hereby informed that a geometry box is lost in our school playground last Tuesday. It was a simple blue colour box having all the stationery products inside the box. Whoever finds the box, please collect it and return it to me in my class.', 'F', '', NULL, '', '61rrqM4LJFL.jpg'),
('3', 'sophia', 'A Red Coloured School Bag Found', 'found', '2022-02-16', 'Xavier High School', '56984521', 'A red coloured bag that has Doremon’s picture on it has been found in the playground. It contains some notebooks, a tiffin box, a blue colour bottle and a pencil box. The one who has lost it may contact the principal or collect it from the school office during school hours.', 'F', '', NULL, '', '45664507JH_14_f.jpg'),
('4', 'sophia', 'Lost Water Bottle', 'lost', '2020-07-02', 'kwai chung', '65987546', 'A water bottle of black colour has been lost during lunch break in the playground. If someone finds it, contact the person whose details are given below. The finder would be rewarded with a suitable reward.', 'T', 'i saw it ! please contact me!', '2022-11-15', 'wongwaiho', 'Best Water Bottles-2022_Yetti RAMBLER 26 OZ WATER BOTTLE.jpg'),
('5', 'sophia', 'i found a iphone i4 pro max', 'found', '2022-10-27', 'polyu lib', '56987214', 'I found a iphone 14 pro max this morning at polyu library, please find me if you lost !', 'F', '', NULL, '', 'Apple_iphone_14_Pro_iPhone_14_Pro_Max_concept_renderings_drdNBC.jpg'),
('6', 'tom', 'A Black Purse Found', 'found', '2022-08-12', 'Sunrise Intermediate School', '95648754', 'I found a black purse in the school library. Inside the wallet, there are some cash and ID cards. If you are the owner of this purse, please come to the library and claim it by giving necessary information about the purse and its content.', 'T', 'it is my bag!', '2022-11-15', 'wongwaiho', '31s59y1-m6L._SS400_.jpg'),
('7', 'tom', 'Lost Wrist Watch', 'lost', '2022-10-25', 'polyu canteen', '95684521', 'Lost a black strap, white dial Titan wristwatch in the school playground during the 6th period yesterday. Anyone who finds it please contact the undersigned in class XII. The finder will be rewarded with a treat in the canteen.', 'F', '', NULL, '', '71vCooHhZXL._UL1500_.jpg'),
('8', 'tom', 'Lost Tiffin Box', 'lost', '2019-02-14', 'room FJ305', '65487541', 'This is to inform all the students that a tiffin box has been lost on 30 November after lunch in our school. The colour of the tiffin box was red with white dots on it. Whoever finds the tiffin box, please return it to me in my class.', 'F', '', NULL, '', '1089206_PE861512_S5.jpg'),
('9', 'mary', 'A School Bag Found', 'found', '2022-06-20', '930 Bus', '98563215', 'I found a school bag on the bus this morning. The bag’s colour is blue with a white stripe. The bag has a name tag on the front with the name “Sherya” written on it. If you are the owner of this bag, please come to the school office to claim it.', 'F', '', NULL, '', '1_0006__9.jpg');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
