-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2014 at 06:04 PM
-- Server version: 5.1.65
-- PHP Version: 5.4.20

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nhapmon_tivi`
--

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
  `ip_address` varchar(15) NOT NULL,
  `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `ip_address` (`ip_address`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`ip_address`, `last_visit`) VALUES
('::1', '2014-03-27 14:33:28'),
('::1', '2014-03-27 14:35:20'),
('::1', '2014-03-27 15:22:10'),
('::1', '2014-03-27 15:25:41'),
('::1', '2014-03-27 15:59:52'),
('::1', '2014-03-27 16:01:19'),
('::1', '2014-03-27 16:02:24'),
('::1', '2014-03-27 16:04:10'),
('::1', '2014-03-27 16:41:28'),
('::1', '2014-03-27 17:02:20'),
('::1', '2014-03-27 17:18:06'),
('::1', '2014-03-28 09:31:07'),
('::1', '2014-03-28 10:15:49'),
('::1', '2014-03-28 11:11:46'),
('183.80.30.159', '2014-03-28 09:38:09'),
('183.80.30.159', '2014-03-28 10:29:31'),
('183.80.30.159', '2014-03-28 10:33:17'),
('183.80.30.159', '2014-03-28 11:48:49'),
('183.80.30.159', '2014-03-29 09:37:49'),
('183.80.30.159', '2014-03-29 09:40:32'),
('42.117.152.52', '2014-03-29 20:51:36'),
('42.117.152.52', '2014-03-29 20:53:57'),
('115.77.137.66', '2014-03-30 05:09:44'),
('113.185.6.36', '2014-03-30 19:14:58'),
('113.185.6.36', '2014-03-30 19:22:57'),
('1.53.207.34', '2014-03-30 22:20:34'),
('1.53.207.34', '2014-03-30 22:44:15'),
('113.161.207.141', '2014-03-31 05:23:02'),
('183.80.30.159', '2014-03-31 08:40:23'),
('113.161.204.228', '2014-04-01 00:36:16'),
('113.161.204.228', '2014-04-03 00:59:12'),
('113.161.204.228', '2014-04-03 18:11:37'),
('113.161.204.228', '2014-04-03 18:13:47'),
('14.192.210.215', '2014-04-05 04:07:19'),
('123.21.155.224', '2014-04-05 04:07:24'),
('1.54.138.162', '2014-04-05 04:10:52'),
('14.192.210.215', '2014-04-05 04:16:59'),
('14.192.210.215', '2014-04-05 04:28:02'),
('14.192.210.215', '2014-04-05 04:40:26'),
('58.186.228.244', '2014-04-05 05:08:45'),
('58.186.228.244', '2014-04-05 05:12:44'),
('42.119.64.212', '2014-04-05 05:14:17'),
('14.192.210.215', '2014-04-05 05:17:47'),
('14.192.210.215', '2014-04-05 05:22:17'),
('58.186.228.244', '2014-04-05 05:28:46'),
('58.186.228.244', '2014-04-05 05:36:06'),
('1.53.118.16', '2014-04-05 06:24:40'),
('1.53.118.16', '2014-04-05 06:45:32'),
('27.65.215.34', '2014-04-05 07:08:14'),
('27.65.215.34', '2014-04-05 07:09:15'),
('183.80.108.109', '2014-04-05 09:18:12'),
('183.80.108.109', '2014-04-05 09:21:15'),
('183.80.108.109', '2014-04-05 09:23:37'),
('183.80.108.109', '2014-04-05 09:25:41'),
('183.80.108.109', '2014-04-05 09:30:57'),
('183.80.108.109', '2014-04-05 09:33:32'),
('58.186.228.244', '2014-04-05 18:44:56'),
('58.186.228.244', '2014-04-05 21:20:51'),
('58.186.228.244', '2014-04-05 21:23:04'),
('117.1.180.53', '2014-04-05 22:51:43'),
('58.186.228.244', '2014-04-05 23:14:38'),
('123.30.143.194', '2014-04-11 06:03:54'),
('113.161.207.141', '2014-04-11 06:51:42'),
('1.54.139.94', '2014-04-11 08:34:46'),
('1.54.139.94', '2014-04-11 09:49:30'),
('1.54.139.94', '2014-04-11 10:16:32'),
('1.54.139.94', '2014-04-11 10:27:20'),
('113.161.204.228', '2014-04-11 17:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE IF NOT EXISTS `danhmuc` (
  `danhmuc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `danhmuc_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `danhmuc_des` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `danhmuc_stt` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`danhmuc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`danhmuc_id`, `danhmuc_name`, `danhmuc_des`, `danhmuc_stt`) VALUES
(1, 'Chưa phân loại', 'Chưa phân loại', 99),
(10, 'Truyền Hình Việt Nam', 'Tổng hợp các kênh truyền hình Việt Nam', 1),
(12, 'Kênh địa phương', 'Danh mục các kênh truyền hình Địa phương', 3),
(13, 'SCTV', 'Kênh truyền hình cáp SCTV', 4),
(16, 'Giải trí,Bóng đá', 'Kênh giải trí, bóng đá', 2),
(17, 'VTC', 'Đài Truyền Hình VTC', 6),
(18, 'Kênh quốc tế', 'Danh mục các kênh truyền hình quốc tế', 3);

-- --------------------------------------------------------

--
-- Table structure for table `gopy`
--

CREATE TABLE IF NOT EXISTS `gopy` (
  `gopy_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gopy_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gopy_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gopy_subject` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gopy_noidung` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gopy_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`gopy_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `gopy`
--

INSERT INTO `gopy` (`gopy_id`, `gopy_name`, `gopy_email`, `gopy_subject`, `gopy_noidung`, `gopy_date`) VALUES
(3, 'Thái Thanh Nhàn', 'thanhnhan2tn@gmail.com', 'Testing', 'Kiểm tra\r\nGopsy \r\n\r\n', '17/03/2014');

-- --------------------------------------------------------

--
-- Table structure for table `kenh`
--

CREATE TABLE IF NOT EXISTS `kenh` (
  `kenh_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `danhmuc_id` int(10) unsigned NOT NULL DEFAULT '1',
  `kenh_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kenh_des` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kenh_cungcap` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa xác định',
  `kenh_url` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kenh_logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kenh_stt` int(10) unsigned DEFAULT '1',
  `kenh_view` int(11) DEFAULT '0',
  PRIMARY KEY (`kenh_id`,`danhmuc_id`),
  KEY `kenh_FKIndex1` (`danhmuc_id`),
  FULLTEXT KEY `kenh` (`kenh_des`),
  FULLTEXT KEY `kenh_name` (`kenh_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `kenh`
--

INSERT INTO `kenh` (`kenh_id`, `danhmuc_id`, `kenh_name`, `kenh_des`, `kenh_cungcap`, `kenh_url`, `kenh_logo`, `kenh_stt`, `kenh_view`) VALUES
(7, 12, 'STV', 'Truyền Hình Sóc Trăng 1', 'Truyền Hình Sóc Trăng', 'rtmp://115.78.3.164/live/stv1', './template/img/logo/stv.jpg', 2, 372),
(12, 0, 'THVL 2', 'Truyền hình Vĩnh Long 2', '', 'rtmp://123.30.108.72/livepkgr&file=livestream2', './template/img/logo/thvl-2.gif', 1, 21),
(43, 12, 'BTV2', 'Truyền Hình Bình Dương', 'Truyền Hình Bình Dương', 'rtmp://202.43.109.147/rtplive/&file=btv2.stream', './template/img/logo/BTV2.gif', 4, 226),
(17, 3, 'HTV1', 'Đài Truyền hình Thành phố Hồ Chí Minh (HTV) 1', 'trực thuộc Ủy ban Nhân dân TP.', 'http://frdlzsmb.cdnviet.com/psczntp/_definst_/htv1.360p.stream/playlist.m3u8', './template/img/logo/htv1_1378.png', 1, 158),
(33, 16, 'ESPN', 'Chờ quảng cáo 15s rồi link FECHAR bên phải sau đó link nút X bên trái để đóng quảng cáo ', '', 'http://tv-msn.com/espnvip.html', './template/img/logo/espn.png', 1, 504),
(47, 12, 'THVL 1', 'Truyền hình Vĩnh Long 1', 'Truyền Hình Việt Nam', 'rtmp://123.30.108.72/livepkgr&file=livestream1', './template/img/logo/thvl-1.gif', 1, 1),
(30, 16, 'NCT', 'Kênh truyền hình NCT', '', 'http://tv24.vn.tivi365.net/nct.php', './template/img/logo/nhaccuatui.jpg', 1, 800),
(34, 16, 'ABC Kids Channel - Cartoons NetWork', 'Kênh thiếu nhi Cartoons NetWork', 'ABC Kids Channel', 'http://megafun.vn/common/player/_player.swf?file=http%3A%2F%2Fm41.megafun.vn%2Flive.vs%3Fc%3Dvstv031%26q%3Dhigh%26type%3Dtv%26token%3DwD-rJa13R1ol-qOl2detYg%26time%3D1398938488%26io%3DLKQm4UrSeh3uHo07%7CLFnbR8BxQ1yz1RO%7CBD5juf3BjhbpENCLpJ8elEK8nZgO5%7CCoTJ6JQ3PMmJW2JmLkd69OHQ4MiOpphsbW2xQgT5APizD%7CvXouFTmMN17PZ05fxX9xXyeAJVugLkEt3XZ57wt8PY5MKZuK%2F5wpVtJHDb73i8%3D&provider=http://megafun.vn/common/player/adaptiveProvider.swf&autostart=true&controlbar=over&%20wmode=', './template/img/logo/cartoonTV.jpg', 1, 244),
(35, 16, 'HBO', 'Xem HBO trực tuyến - Xem tivi HBO', '', 'http://tinyurl.com/qemya8b', './template/img/logo/HBO.gif', 1, 245),
(37, 16, 'ITV HD - Kênh âm nhạc online', 'Kênh ITV HD - Kênh âm nhạc online', '', 'rtmp://m22.megafun.vn/hctv/vstv016', './template/img/logo/ITV-HD.png', 1, 701),
(38, 17, 'VTC 1 - HD', 'VTC 1 - HD', '', 'http://www2.tivi24h.com/2014/02/vtc-hd1.html', './template/img/logo/vtchd1.jpg', 1, 613),
(39, 13, 'SCTV 2', 'SCTV 2 - YanTV', 'SCTV', 'http://tv.101vn.com/ok/sctv/sctv2_1.php', './template/img/logo/sctv2.png', 2, 525);

-- --------------------------------------------------------

--
-- Table structure for table `useronline`
--

CREATE TABLE IF NOT EXISTS `useronline` (
  `tgtmp` int(15) NOT NULL DEFAULT '0',
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `local` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tgtmp`),
  KEY `ip` (`ip`),
  KEY `local` (`local`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_pass` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_pass`) VALUES
(1, 'thanhnhan2tn', '6ff1b2bb7c6fce6845a0efbd144150361bdf5645'),
(2, 'test', '6d979836e536a826c3d447045e9bfaac0a4d8cb3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
