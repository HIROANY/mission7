-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 5 月 31 日 01:38
-- サーバのバージョン： 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db_test`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_test_table`
--

CREATE TABLE `gs_test_table` (
  `id` int(12) NOT NULL,
  `bookname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bookurl` text COLLATE utf8_unicode_ci NOT NULL,
  `bookcomment` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `age` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_test_table`
--

INSERT INTO `gs_test_table` (`id`, `bookname`, `bookurl`, `bookcomment`, `indate`, `age`) VALUES
(1, '独習PHP', 'https://www.aaa.com', 'テスト', '2019-05-27 19:47:50', 15),
(2, '独習Javascript', 'https://www.bbb.com', 'テスト2', '2019-05-27 19:52:48', 21),
(3, '独習ccc', 'https://www.ccc.com', 'テスト3', '2019-05-27 19:56:39', 34),
(4, '独習ddd', 'https://www.ddd.com', 'テスト4', '2019-05-27 19:56:48', 20),
(5, '独習eee', 'https://www.eee.com', 'テスト5', '2019-05-27 19:56:59', 28),
(6, '独習fff', 'https://www.fff.com', 'テスト6', '2019-05-27 19:57:09', 30),
(7, '独習ggg', 'https://www.ggg.com', 'テスト7', '2019-05-27 19:57:20', 10),
(8, '独習hhh', 'https://www.hhh.com', 'テスト8', '2019-05-27 19:57:30', 40),
(9, '独習iii', 'https://www.iii.com', 'テスト9', '2019-05-27 19:57:42', 20),
(10, '独習jjj', 'https://www.jjj.com', 'テスト10', '2019-05-27 19:57:56', 40),
(14, '独習kkk', 'https://www.kkk.com', 'グラフ化に役立つ', '2019-05-30 18:30:28', 29),
(15, '独習lll', 'https://www.lll.com', 'PHPよりもJavascriptの方が難しい', '2019-05-30 18:31:30', 20),
(16, 'ザ・モデル', 'https://books.rakuten.co.jp/xxx', 'SFAに関する本', '2019-05-30 21:44:37', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_test_table`
--
ALTER TABLE `gs_test_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_test_table`
--
ALTER TABLE `gs_test_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
