-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 5 月 31 日 13:05
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
  `sdate` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `bookname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bookurl` text COLLATE utf8_unicode_ci NOT NULL,
  `bookcomment` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `age` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_test_table`
--

INSERT INTO `gs_test_table` (`id`, `sdate`, `bookname`, `bookurl`, `bookcomment`, `indate`, `age`) VALUES
(1, '2019-05-27', '独習PHP', 'https://www.aaa.com', 'テスト', '2019-05-27 19:47:50', 15),
(2, '2019-05-27', '独習Javascript', 'https://www.bbb.com', 'テスト2', '2019-05-27 19:52:48', 21),
(3, '2019-05-27', '独習ccc', 'https://www.ccc.com', 'テスト3', '2019-05-27 19:56:39', 34),
(4, '2019-05-27', '独習ddd', 'https://www.ddd.com', 'テスト4', '2019-05-27 19:56:48', 20),
(5, '2019-05-27', '独習eee', 'https://www.eee.com', 'テスト5', '2019-05-27 19:56:59', 28),
(6, '2019-05-27', '独習fff', 'https://www.fff.com', 'テスト6', '2019-05-27 19:57:09', 30),
(7, '2019-05-27', '独習ggg', 'https://www.ggg.com', 'テスト7', '2019-05-27 19:57:20', 10),
(8, '2019-05-27', '独習hhh', 'https://www.hhh.com', 'テスト8', '2019-05-27 19:57:30', 40),
(9, '2019-05-27', '独習iii', 'https://www.iii.com', 'テスト9', '2019-05-27 19:57:42', 20),
(10, '2019-05-27', '独習jjj', 'https://www.jjj.com', 'テスト10', '2019-05-27 19:57:56', 40),
(11, '2019-05-27', '独習kkk', 'https://www.kkk.com', 'グラフ化に役立つ', '2019-05-30 18:30:28', 29),
(12, '2019-05-30', '独習lll', 'https://www.lll.com', 'PHPよりもJavascriptの方が難しい', '2019-05-30 18:31:30', 20),
(13, '2019-05-30', 'ザ・モデル', 'https://books.rakuten.co.jp/xxx', 'SFAに関する本', '2019-05-30 21:44:37', 30),
(14, '2019-05-31', '起業の科学', 'https://books.rakuten.co.jp/yyy', '今度ジーズで著者のセミナーがあるらしい', '2019-05-31 10:15:06', 35),
(15, '2019-05-31', 'ジャイアントキリング', 'https://a.r10.to/hfZ4Rw', '会社に常設されているバイブル！？', '2019-05-31 10:35:47', 45),
(16, '2019-05-31', 'キングタム', 'https://www.amazon.co.jp/zzz', 'これも会社に常設のバイブル！？', '2019-05-31 10:55:22', 21),
(20, '2019-06-01', '万葉集', 'https://www.fff.co.jp/aaa', '元号の命名のルーツがあるらしい', '2019-05-31 11:20:17', 60),
(21, '2019-05-22', 'いちばんやさしいJavaScriptの教本', 'https://a.r10.to/hfwim5', '森田先生にご紹介いただいた本', '2019-05-31 12:46:37', 34),
(22, '2019-05-22', '知識ゼロからはじめるゆっくり・ていねいJava　Script ES6対応', 'https://a.r10.to/hVpAaX', '森田先生にご紹介いただいた本', '2019-05-31 12:47:49', 20),
(23, '2019-05-29', 'EXCELマーケティングリサーチ＆データ分析　2013／2010／2007対応', 'https://books.rakuten.co.jp/rk/72a5b979715a3083a193d32d879a575a/', 'データアナリティクスセミナーでの紹介本', '2019-05-31 13:01:48', 45),
(24, '2019-05-29', 'EXCELビジネス統計分析［ビジテク］ 第3版 2016/2013/2010対応', 'https://books.rakuten.co.jp/rb/14661174/?l-id=search-c-item-text-01', 'データアナリティクスセミナーで紹介された本', '2019-05-31 13:04:42', 40),
(25, '2019-05-29', 'EXCELビジネス統計分析第2版　2013／2010／2007／2003対応　（ビジテク）', 'https://books.rakuten.co.jp/rb/12649100/?l-id=search-c-item-text-02', 'データアナリティクスセミナーで紹介された本', '2019-05-31 13:05:09', 40);

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
