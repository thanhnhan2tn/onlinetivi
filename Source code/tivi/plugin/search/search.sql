-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2009 at 09:50 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `search`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_key`
--

CREATE TABLE IF NOT EXISTS `tbl_key` (
  `tukhoa` text NOT NULL,
  `lantim` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_key`
--

INSERT IGNORE INTO `tbl_key` (`tukhoa`, `lantim`) VALUES
('vÅ© thanh lai', 5),
('lai', 1),
('b', 3),
('vÅ©', 3),
('vÅ© thanh', 2),
('a', 3),
('Backdoor', 2),
('ba', 1),
('', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_term`
--

CREATE TABLE IF NOT EXISTS `tbl_term` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `term` varchar(255) DEFAULT NULL,
  `pro` varchar(255) DEFAULT NULL,
  `meaning` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tbl_term`
--

INSERT IGNORE INTO `tbl_term` (`id`, `term`, `pro`, `meaning`) VALUES
(34, 'Backdoor ', '', 'This is sometimes referred to as a trapdoor, and is a feature in programs that the original programmer puts into the code in order to fix bugs or make other changes that need to be made. However, if this information becomes known to anyone else it poses a'),
(33, 'Autohide', '', 'Autohide" will "hide" a toolbar unless your mouse is over it.\r\nTypically, you just move your mouse to where the toolbar should be and\r\nit will pop up again.'),
(32, 'Attack ', '?''tæk', 'An attempt by an unauthorized individual or program to gain control over aspects of your pc for various purposes. '),
(35, 'Backup', '/´bæk¸?p/', 'To backup simply means to copy files to another disk. This can be in the form of using a program designed to do backups or just doing a straight copy from your computer to a floppy (or a bunch of them) a zip disk, or CD-RW.\r\n\r\nNow, here''s my advice for ea'),
(36, 'Bandwidth', '''bændwid?', 'Bandwidth refers to the speed that data can be transferred between\r\ncomputers on a network. The "higher" the bandwidth, the faster the transfer\r\nspeed. Regular modems would be a low bandwidth device whereas a cable modem would be considered a higher bandw'),
(37, 'Bookmark', '´buk¸ma:k', 'A bookmark (or as Internet Explorer likes to call them, a Favorites), is simply a shortcut to a web page, usually on some sort of menu.\r\n\r\nAdding bookmarks is usually easy. If you''re on a web page you want to come back to later, click your "Bookmarks" or '),
(38, 'Boot ', '/bu:t/', 'Booting a computer is a simple procedure that''s preformed when it acts up. Let''s say it''s the 20th time in an hour that Windows has locked up. You simply lift the computer up at about chest-high level and drop kick it. It doesn''t always fix the problem, b'),
(39, 'Broadband', '', ' 	\r\n\r\n\r\nTips & Tricks\r\n\r\nComputing Terms\r\n\r\nBroadband -\r\n\r\nYou probably hear a lot about "broadband". It''s in the news, scattered throughout computer magazines, and mentioned on thousands of different websites. Broadband is a term that can refer to all th'),
(40, 'Browser', '', 'A browser is what you use to surf the web.\r\n\r\nThere are all sorts of them out there. The most common is Microsoft Internet Explorer, but you also have Netscape, Opera, SmartBrowse and others. In addition, your Internet program may have a built in browser '),
(41, 'Bun ngu qua', 'tired', 'Di ngu nao'),
(42, 'Dieu ham', 'dieu ', 'hihi'),
(43, 'a', 'a', 'a');
