

--- gs_bm_tableの中身です
-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 01, 2021 at 01:48 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ra-men_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(11) NOT NULL,
  `shopname` varchar(64) NOT NULL,
  `visitdate` date NOT NULL,
  `menu` varchar(64) NOT NULL,
  `rating` int(11) NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `shopname`, `visitdate`, `menu`, `rating`, `detail`, `image`, `created`) VALUES
(13, 'ちばから渋谷', '2020-12-10', 'あぶらそばぶし', 4, 'ぶしより醤油の方が美味しい。\r\nねぎは香りが強いからいらない。', '2041334126065cb1c0f2df7.37804671.JPG', '2021-04-01 22:31:08'),
(14, '野猿二郎', '2020-12-19', '蝦の呼吸', 4, '安定の美味しさ\r\n蝦の香りがすごい。１回食べたらいいかな。', '20122542856065cbf8b2abc0.40972329.JPG', '2021-04-01 22:34:48'),
(15, '豚星', '2021-03-28', '白い雫汁なし', 3, '少し辛め。味はそこまで濃くない。\r\nつけめんかラーメンでもよかった。', '638903436065cc9087cf37.83212627.jpg', '2021-04-01 22:37:20'),
(16, '豚星', '2021-03-26', 'ブタモーニ', 3, 'チーズの香りがすごい。濃厚。\r\n１回食べたら満足の味。', '2484387266065cd41b74977.66999784.jpg', '2021-04-01 22:40:17'),
(17, '豚星', '2021-02-23', 'しおから汁なし', 2, '間違えてしおからを頼んでしまう。。\r\n辛すぎた。むせた。', '5234519976065cd9c30cd84.81533636.JPG', '2021-04-01 22:41:48'),
(18, '富士丸東浦和', '2021-03-14', 'ミニラーメン', 5, 'うますぎる。神。\r\nお腹は壊したけどもう一度たべたい。', '2728297256065cdcebf5f46.48935202.jpg', '2021-04-01 22:42:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
