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
-- 資料庫： `autocarsales`
--

-- --------------------------------------------------------

--
-- 資料表結構 `car`
--

CREATE TABLE `car` (
  `carNo` char(4) NOT NULL,
  `userId` char(4) NOT NULL,
  `type` text NOT NULL,
  `price` int(10) NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `manufacturedYear` date NOT NULL,
  `fuelType` varchar(30) NOT NULL,
  `transmission` varchar(10) NOT NULL,
  `brandNew` tinyint(1) NOT NULL,
  `Odometer` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `car`
--

INSERT INTO `car` (`carNo`, `userId`, `type`, `price`, `make`, `model`, `color`, `manufacturedYear`, `fuelType`, `transmission`, `brandNew`, `Odometer`, `image`) VALUES
('1234', 's122', '未入', 30000, 'GOLD', 'small SUV', 'RED', '2020-06-02', 'fossil', 'Y', 1, '100', 'image.jpg'),
('1235', 's125', 'Q3 Sportback', 499000, 'Audi', '45 TFSI quattro', 'silver', '2020-01-01', 'petrol', 'auto', 1, '18.51kmpl', 'qwer.jpg'),
('1236', 's122', 'IONIQ Electric', 358800, 'Hyundai', 'Electric Car', 'blue', '2020-03-25', 'petrol', 'auto', 0, '191.2Km', '200626_183813_009_02.jpg'),
('1237', 's124', 'Toyota All New C-HR Hybrid', 259700, 'Toyota', 'Hybrid Car', 'white', '2019-10-16', 'petrol', 'auto', 0, '18.5kmpl', '200514_233910_007_02.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `purchasecar`
--

CREATE TABLE `purchasecar` (
  `orderNo` char(6) NOT NULL,
  `userId` char(4) NOT NULL,
  `carNo` char(4) NOT NULL,
  `orderDate` date NOT NULL,
  `price` varchar(15) NOT NULL,
  `deliveryDate` date NOT NULL,
  `remarks` text NOT NULL,
  `payment` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userName` varchar(11) NOT NULL,
  `userId` char(4) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` char(8) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`userName`, `userId`, `password`, `email`, `phone`, `address`) VALUES
('admin', '0000', 'admin', '', '', ''),
('Peter', 's122', 'a1234', '123@hotmail.com', '68947774', '246-248, Castle Peak Road, Tsuen Wan, New Territories'),
('Mary', 's123', 'a12345678', 'mary@hotmail.com', '68955512', '4063 St Michaels Avenue,Greenland, MI 49929'),
('Chris', 's124', 'qwer12234', 'chriswong@hotmail.com', '68554789', '5640 Fullerton Street,Meacham, OR 97859'),
('Cindy', 's125', 'qwer123', 'cindy@hotmail.com', '68559654', '638 Lincoln Way,New Portland, ME 04961'),
('Chi Yuen', 's129', 'a12345678', 'qwqw@gmail.com', '65124478', 'HongKong');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carNo`);

--
-- 資料表索引 `purchasecar`
--
ALTER TABLE `purchasecar`
  ADD PRIMARY KEY (`orderNo`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
