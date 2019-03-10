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
CREATE DATABASE IF NOT EXISTS `aokakes_ninnniku` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `aokakes_ninnniku`;

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

-- --------------------------------------------------------

--
-- テーブルの構造 `ach_log`
--

CREATE TABLE `ach_log` (
  `id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `achv_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `ach_log`
--

INSERT INTO `ach_log` (`id`, `achv_id`) VALUES
('fulutori', 2),
('fulutori', 1),
('fulutori', 1),
('fulutori', 2),
('fulutori', 3),
('', 1),
('', 8),
('hoge', 1),
('hoge', 8),
('hoge', 2),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('hoge', 3),
('aaaa', 1),
('aaaa', 8),
('aaaa', 2),
('aaaa', 2),
('aaaa', 3),
('aaaa', 3),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4),
('aaaa', 4);

-- --------------------------------------------------------

--
-- テーブルの構造 `log`
--

CREATE TABLE `log` (
  `id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ramen_num` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `log`
--

INSERT INTO `log` (`id`, `ramen_num`) VALUES
('fulutori', 000031),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000031),
('fulutori', 000031),
('fulutori', 000031),
('fulutori', 000031),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('fulutori', 000034),
('hoge', 000034),
('hoge', 000034),
('hoge', 000034),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000019),
('hoge', 000031),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034),
('aaaa', 000034);

-- --------------------------------------------------------

--
-- テーブルの構造 `shop`
--

CREATE TABLE `shop` (
  `ramen_num` int(6) UNSIGNED ZEROFILL NOT NULL,
  `shop_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `shop`
--

INSERT INTO `shop` (`ramen_num`, `shop_name`, `latitude`, `longitude`) VALUES
(000001, 'ShinShin 天神本店', '33.5926916', '130.3968849'),
(000002, 'ShinShin 博多デイトス店', '33.5909634', '130.4211035'),
(000003, 'トマトラーメンと辛めん 三味 福岡天神大名店', '33.5872472', '130.3950474'),
(000004, 'とら食堂 福岡分店', '33.5764399', '130.3763447'),
(000005, 'ふくちゃんラーメン 田隈本店', '33.5472420', '130.3366410'),
(000006, 'めんくいや 博多駅東店', '33.5912851', '130.4189138'),
(000007, 'らーめん おいげん', '33.5850536', '130.3923069'),
(000008, 'らぁめん シフク', '33.5941264', '130.4377261'),
(000009, 'ラーメンおいげん 本店', '33.5850530', '130.3923072'),
(000010, 'らーめん屋 鳳凛', '33.5891079', '130.4042541'),
(000011, 'らーめん屋 鳳凛 今泉店', '33.5859362', '130.3966963'),
(000012, 'ラーメン海鳴 清川店', '33.5817622', '130.4095575'),
(000013, 'ラーメン海鳴 中洲店', '33.5933240', '130.4075378'),
(000014, 'らーめん二男坊 博多本店', '33.5903697', '130.4176793'),
(000015, 'らーめん二男坊 福岡パルコ店', '33.5904340', '130.3987308'),
(000016, '一心亭 本店', '33.5938770', '130.3919730'),
(000017, '一風堂 TAO FUKUOKA', '33.5922208', '130.3999840'),
(000018, '一風堂 大名本店', '33.5878215', '130.3958333'),
(000019, '一蘭 天神西通り店', '33.5888761', '130.3962162'),
(000020, '一蘭 本社総本店', '33.5932626', '130.4046209'),
(000021, '魁龍 博多本店', '33.5781290', '130.4454850'),
(000022, '楽勝ラーメン', '33.5897352', '130.3974380'),
(000023, '元祖 ぴかいち', '33.5878354', '130.4165728'),
(000024, '元祖 赤のれん 節ちゃんラーメン 天神本店', '33.5891163', '130.3958467'),
(000025, '元祖 長浜屋', '33.5924240', '130.3865706'),
(000026, '元祖博多だるま 博多デイトス店', '33.5912270', '130.4212461'),
(000027, '札幌らーめん 獅子王 福岡大名店', '33.5886331', '130.3944540'),
(000028, '支那そば月や', '33.5963078', '130.4098070'),
(000029, '支那そば月や 本店', '33.5911229', '130.4211098'),
(000030, '秀ちゃんラーメン とんぼ店', '33.5843162', '130.3914835'),
(000031, '小金ちゃん', '33.5911819', '130.3957012'),
(000032, '太宰府 八ちゃんラーメン 天神店', '33.5941426', '130.4000493'),
(000033, '太宰府八ちゃんラーメン 本店', '33.5167344', '130.5033887'),
(000034, '大砲ラーメン 天神今泉店', '33.5872383', '130.4003656'),
(000035, '地鶏らーめんはや川', '33.5663447', '130.4159988'),
(000036, '中華そば かなで', '33.5912671', '130.4283031'),
(000037, '長浜ナンバーワン 祇園店', '33.5932268', '130.4131141'),
(000038, '長浜ナンバーワン 博多デイトス店', '33.5908809', '130.4214113'),
(000039, '長浜屋台 やまちゃん 福岡天神店', '33.5933318', '130.3933945'),
(000040, '土竜が俺を呼んでいる', '33.5871517', '130.3921258'),
(000041, '入船食堂', '33.5834768', '130.4130763'),
(000042, '博多 一幸舎 博多デイトス店', '33.5911267', '130.4212669'),
(000043, '博多 一成一代', '33.5898358', '130.4309002'),
(000044, '博多だるま 総本店', '33.5852189', '130.4060036'),
(000046, '博多ラーメン『膳』 天神メディアモール店', '33.5911199', '130.4005815'),
(000047, '博多ラーメンげんこつ', '33.5441014', '130.3415085'),
(000048, '博多一幸舎 総本店', '33.5882863', '130.4170677'),
(000049, '博多一双 博多駅東本店', '33.5863780', '130.4250999'),
(000050, '博多屋台福芳亭天神店', '33.5922488', '130.3956717'),
(000051, '博多鶏ソバ華味鳥 ソラリアステージ店', '33.5896559', '130.3990500'),
(000052, '博多元気一杯!!', '33.6008287', '130.4073360'),
(000053, '博多担々麺 とり田 KITTE博多店', '33.5888241', '130.4192937'),
(000054, '博多麺屋台 た組', '33.5892353', '130.4162522'),
(000055, '名代ラーメン亭 博多駅地下街店', '33.5912851', '130.4189138'),
(000056, '名島亭 JRJP博多ビル店', '33.5878483', '130.4189974'),
(000057, '麺や おの', '33.5927649', '130.3949019'),
(000058, '麺や兼虎', '33.5871886', '130.4012145'),
(000059, '麺劇場 玄瑛', '33.5826616', '130.3941067'),
(000060, '麺道 はなもこし', '33.5809834', '130.3953324'),
(000061, '薬院 八ちゃんラーメン', '33.5815443', '130.4036406');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `point` int(10) NOT NULL,
  `achv` int(6) UNSIGNED ZEROFILL NOT NULL DEFAULT '000001'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `password`, `point`, `achv`) VALUES
('aaaa', '$2y$10$S6HgbEKHYQrRIgsoaiO6Ce4VRRFfdTPkdtcdsyc7IEpt4Q1mynycG', 240, 000001),
('aokakes', '$2y$10$TOqJwAelalA3PiPA66Dr5emsKPlERLCxN9PwFNztzDpN40MnyJtMu', 0, 000001),
('fulutori', '$2y$10$s1G/fWxE5bhJV91uO0GmLe.2hIti8B7n992Vl6M73z1g9lgzwAoRS', 5, 000002),
('hoge', '$2y$10$j.Ws4pB5dzQ1Af90PDUJPe4oWzk0qL0v.JawELxGmM.mL4CZJxTG6', 155, 000001),
('test', '$2y$10$Lo0KAHLwWNiBl6z6yznBte5wiutYNnRLPkMpFRzUm3yRvRcC0P9ua', 0, 000001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ach_db`
--
ALTER TABLE `ach_db`
  ADD PRIMARY KEY (`achv_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`ramen_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ach_db`
--
ALTER TABLE `ach_db`
  MODIFY `achv_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `ramen_num` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
