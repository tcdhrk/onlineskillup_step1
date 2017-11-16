-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017 年 11 月 16 日 10:53
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
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `datas`
--

CREATE TABLE `datas` (
  `name` text NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `datas`
--

INSERT INTO `datas` (`name`, `message`, `created`) VALUES
('Mr.A', 'はじめまして！初心者です！', '2017-11-16 08:35:29'),
('Miss.B', 'こんにちは', '2017-11-16 08:36:13'),
('Ms.C', 'ようこそ', '2017-11-16 08:37:14'),
('Mr.A', 'ロードレースの頻度はどれくらい？', '2017-11-16 08:37:59'),
('Miss.B', '半年に2回かな', '2017-11-16 08:38:28'),
('Ms.C', '私は月に1回！', '2017-11-16 08:38:52'),
('Mr.A', 'なるほど', '2017-11-16 08:39:12'),
('Miss.B', '回数にも距離にもチャレンジしようかな', '2017-11-16 08:40:01'),
('Ms.C', '是非一緒にやりましょう', '2017-11-16 08:40:24'),
('Mr.A', '僕もお願いします！', '2017-11-16 08:40:54'),
('Ms.C', 'Aさんはまずは短い距離からね', '2017-11-16 08:41:27'),
('Mr.A', 'ですね', '2017-11-16 08:41:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
