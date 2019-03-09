-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aokakes_ninnniku`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `ach_db`
--

CREATE TABLE `ach_db` (
  `achv_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `achv_name` varchar(30) NOT NULL,
  `rare` int(2) NOT NULL,
  `conditions` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `ach_db`
--

INSERT INTO `ach_db` (`achv_id`, `achv_name`, `rare`, `conditions`) VALUES
(000001, 'ラーメン初心者', 1, '初期から取得'),
(000002, 'ラーメン大好き', 2, 'ポイント10以上獲得'),
(000003, 'ラーメン上級者', 3, 'ポイント20以上獲得'),
(000004, 'ラーメンマスター', 4, 'ポイント30以上獲得'),
(000005, '食べ比べ初心者', 2, '2店舗でラーメンを食べた'),
(000006, 'いっぱい食べよう', 3, '5店舗でラーメンを食べた'),
(000007, 'ラーメングルメ', 4, '10店舗でラーメンを食べた'),
(000008, '博多ラーメンが食べたい！', 1, '初期から取得'),
(000009, '博多のらめーん', 3, '「博多ラーメン」属性の店舗に5店舗行った'),
(000010, '博多ラーメンマスター', 4, '「博多ラーメン」属性の店舗に10店舗行った');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ach_db`
--
ALTER TABLE `ach_db`
  ADD PRIMARY KEY (`achv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ach_db`
--
ALTER TABLE `ach_db`
  MODIFY `achv_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
