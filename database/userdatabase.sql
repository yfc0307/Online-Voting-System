-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-07-08 09:53:06
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- 資料表結構 `userVote`
--

CREATE TABLE `userVote` (
  `userVoteId` int(20) UNIQUE NOT NULL AUTO_INCREMENT,
  `userId` int(8) NOT NULL,
  `voteId` int(20) NOT NULL,
  `voteChoiceId` int(20) NOT NULL,
  `userVoteDate` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表結構 `voteInfo`
--

CREATE TABLE `voteInfo` (
  `voteId` int(20) UNIQUE NOT NULL AUTO_INCREMENT,
  `voteTitle` varchar(255) NOT NULL,
  `voteCDate` date,
  `voteEDate` date,
  `is_multiple` BOOLEAN,
  `userId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表結構 `voteChoice`
--

CREATE TABLE `voteChoice` (
  `voteChoiceId` int(20) UNIQUE NOT NULL AUTO_INCREMENT,
  `voteId` int(20) NOT NULL,
  `votechoiceText` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- 資料表結構 `userInfo`
--

CREATE TABLE `userInfo` (
  `userId` int(8) UNIQUE NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) UNIQUE NOT NULL,
  `userMail` varchar(30) NOT NULL,
  `userPhone` char(8) NOT NULL,
  `userPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- 資料表索引 `userVote`
--
ALTER TABLE `userVote`
  ADD PRIMARY KEY (`userVoteId`);

ALTER TABLE `userVote`
  ADD CONSTRAINT `uservote_fk_1` FOREIGN KEY (`userId`) REFERENCES `userInfo` (`userId`) ON DELETE CASCADE;

ALTER TABLE `userVote`
  ADD CONSTRAINT `uservote_fk_2` FOREIGN KEY (`voteId`) REFERENCES `voteInfo` (`voteId`) ON DELETE CASCADE;

--
-- 資料表索引 `voteInfo`
--
ALTER TABLE `voteInfo`
  ADD PRIMARY KEY (`voteId`);

ALTER TABLE `voteInfo`
  ADD CONSTRAINT `voteinfo_fk_1` FOREIGN KEY (`userId`) REFERENCES `userInfo` (`userId`) ON DELETE CASCADE;

--
-- 資料表索引 `userInfo`
--
ALTER TABLE `userInfo`
  ADD PRIMARY KEY (`userId`);
COMMIT;

--
-- 資料表索引 `voteChoice`
--
ALTER TABLE `voteChoice`
  ADD PRIMARY KEY (`voteChoiceId`);

ALTER TABLE `voteChoice`
  ADD CONSTRAINT `voteChoice_fk_1` FOREIGN KEY (`voteId`) REFERENCES `voteInfo` (`voteId`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
