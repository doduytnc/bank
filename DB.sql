-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 09:17 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id_transaction` int(15) NOT NULL,
  `target_id` int(10) NOT NULL,
  `source_id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `content` varchar(200) NOT NULL,
  `dateTime` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id_transaction`, `target_id`, `source_id`, `amount`, `content`, `dateTime`, `success`) VALUES
(1, 1, 2, 200000, 'Cho vay di tan gai', '2018-09-05 00:00:00', 1),
(2, 1, 3, 100000, 'Chuyen tien an', '2018-09-06 09:07:03', 1),
(3, 2, 3, 500000, 'Thanh toan tien thue xe', '2018-09-15 03:06:04', 0),
(4, 2, 1, 100, '1 chuyen cho 2', '2018-09-27 01:42:10', 1),
(5, 2, 3, 500, '3 chuyá»ƒn cho 2', '2018-09-27 01:51:03', 1),
(6, 3, 1, 600, '1 chuyen cho 3', '2018-09-27 03:09:54', 1),
(7, 1, 3, 800, '3 chuyá»ƒn 1', '2018-09-27 03:11:34', 1),
(8, 2, 1, 300, '1 chuyá»ƒn 3', '2018-09-27 03:15:11', 1),
(9, 2, 1, 300, '1 chuyá»ƒn 3', '2018-09-27 03:15:25', 1),
(10, 2, 1, 50, '1 chuyá»ƒn 2', '2018-09-27 03:22:58', 1),
(11, 3, 2, 2, '150', '2018-09-27 03:24:38', 1),
(12, 3, 1, 222, '1 chuyen 3', '2018-09-27 05:22:29', 1),
(13, 3, 2, 888, '2 chuyen 3', '2018-09-27 05:27:01', 1),
(14, 1, 3, 250, '3 chuyen 1', '2018-09-27 05:31:05', 1),
(16, 2, 5, 555, '5 chuyen 2', '2018-09-27 08:47:42', 1),
(17, 1, 5, 650000, '5 chuyá»ƒn 1', '2018-09-27 08:59:54', 1),
(18, 1, 3, 666, '3 chuyen 1', '2018-09-27 09:09:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(10) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `userName`, `password`, `balance`) VALUES
(1, 'Do Viet Duy', '123456', 8650140),
(2, 'Le Duy Huan', '123456', 5000920),
(3, 'Nguyen Anh Tu', '123456', 999496),
(5, 'Le Dinh Tuan', '123456', 68349400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `target_id` (`target_id`),
  ADD KEY `transaction_history_ibfk_1` (`source_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id_transaction` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD CONSTRAINT `transaction_history_ibfk_1` FOREIGN KEY (`source_id`) REFERENCES `user_account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
