-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2016 at 10:01 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmminist_prisonersdilemma`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(2) NOT NULL,
  `course_and_number` varchar(10) NOT NULL,
  `section` int(2) NOT NULL,
  `isIterative` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_and_number`, `section`, `isIterative`) VALUES
(1, 'BIOL 1101K', 1, 'Yes'),
(2, 'PHYS 2202', 11, 'Yes'),
(4, 'ITEC4500', 1, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(255) NOT NULL,
  `player1` varchar(255) NOT NULL,
  `player2` varchar(255) NOT NULL,
  `time` int(50) NOT NULL,
  `round1` varchar(3) NOT NULL DEFAULT '0-0',
  `round2` varchar(3) NOT NULL DEFAULT '0-0',
  `round3` varchar(3) NOT NULL DEFAULT '0-0',
  `round4` varchar(3) NOT NULL DEFAULT '0-0',
  `round5` varchar(3) NOT NULL DEFAULT '0-0',
  `round6` varchar(3) NOT NULL DEFAULT '0-0',
  `round7` varchar(3) NOT NULL DEFAULT '0-0',
  `round8` varchar(3) NOT NULL DEFAULT '0-0',
  `round9` varchar(3) NOT NULL DEFAULT '0-0',
  `round10` int(11) NOT NULL,
  `round1_p1` varchar(50) NOT NULL,
  `round2_p1` varchar(50) NOT NULL,
  `round3_p1` varchar(50) NOT NULL,
  `round4_p1` varchar(50) NOT NULL,
  `round5_p1` varchar(50) NOT NULL,
  `round6_p1` varchar(50) NOT NULL,
  `round7_p1` varchar(50) NOT NULL,
  `round8_p1` varchar(50) NOT NULL,
  `round9_p1` varchar(50) NOT NULL,
  `round10_p1` varchar(50) NOT NULL,
  `round1_p2` varchar(50) NOT NULL,
  `round2_p2` varchar(50) NOT NULL,
  `round3_p2` varchar(50) NOT NULL,
  `round4_p2` varchar(50) NOT NULL,
  `round5_p2` varchar(50) NOT NULL,
  `round6_p2` varchar(50) NOT NULL,
  `round7_p2` varchar(50) NOT NULL,
  `round8_p2` varchar(50) NOT NULL,
  `round9_p2` varchar(50) NOT NULL,
  `round10_p2` varchar(50) NOT NULL,
  `round1score_p1` int(11) NOT NULL,
  `round2score_p1` int(11) NOT NULL,
  `round3score_p1` int(11) NOT NULL,
  `round4score_p1` int(11) NOT NULL,
  `round5score_p1` int(11) NOT NULL,
  `round6score_p1` int(11) NOT NULL,
  `round7score_p1` int(11) NOT NULL,
  `round8score_p1` int(11) NOT NULL,
  `round9score_p1` int(11) NOT NULL,
  `round10score_p1` int(11) NOT NULL,
  `round1score_p2` int(11) NOT NULL,
  `round2score_p2` int(11) NOT NULL,
  `round3score_p2` int(11) NOT NULL,
  `round4score_p2` int(11) NOT NULL,
  `round5score_p2` int(11) NOT NULL,
  `round6score_p2` int(11) NOT NULL,
  `round7score_p2` int(11) NOT NULL,
  `round8score_p2` int(11) NOT NULL,
  `round9score_p2` int(11) NOT NULL,
  `round10score_p2` int(11) NOT NULL,
  `LastUpdateDate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `player1`, `player2`, `time`, `round1`, `round2`, `round3`, `round4`, `round5`, `round6`, `round7`, `round8`, `round9`, `round10`, `round1_p1`, `round2_p1`, `round3_p1`, `round4_p1`, `round5_p1`, `round6_p1`, `round7_p1`, `round8_p1`, `round9_p1`, `round10_p1`, `round1_p2`, `round2_p2`, `round3_p2`, `round4_p2`, `round5_p2`, `round6_p2`, `round7_p2`, `round8_p2`, `round9_p2`, `round10_p2`, `round1score_p1`, `round2score_p1`, `round3score_p1`, `round4score_p1`, `round5score_p1`, `round6score_p1`, `round7score_p1`, `round8score_p1`, `round9score_p1`, `round10score_p1`, `round1score_p2`, `round2score_p2`, `round3score_p2`, `round4score_p2`, `round5score_p2`, `round6score_p2`, `round7score_p2`, `round8score_p2`, `round9score_p2`, `round10score_p2`, `LastUpdateDate`, `status`) VALUES
(72, '4', '3', 1461822939, '1-1', '2-1', '1-2', '1-2', '1-2', '0', '0', '0', '0', 0, 'Cooperate', 'Defect', 'Cooperate', 'Cooperate', 'Cooperate', '', '', '', '', '', 'Cooperate', 'Cooperate', 'Defect', 'Defect', 'Defect', '', '', '', '', '', 3, 0, 0, 5, 0, 0, 0, 0, 0, 0, 3, 5, 5, 0, 0, 0, 0, 0, 0, 0, '2016-04-28 01:53:39', 6),
(73, '8', '4', 1461822990, '1-2', '2-1', '2-1', '2-1', '2-1', '0', '0', '0', '0', 0, 'Cooperate', 'Defect', 'Defect', 'Defect', 'Defect', '', '', '', '', '', 'Defect', 'Cooperate', 'Cooperate', 'Cooperate', 'Cooperate', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, '2016-04-28 01:54:30', 6),
(77, '4', '3', 1461868487, '1-1', '2-2', '2-2', '1-1', '0-0', '0', '0', '0', '0', 0, 'Cooperate', 'Defect', 'Defect', 'Cooperate', '', '', '', '', '', '', 'Cooperate', 'Defect', 'Defect', 'Cooperate', '', '', '', '', '', '', 3, 1, 1, 3, 0, 0, 0, 0, 0, 0, 3, 1, 1, 3, 0, 0, 0, 0, 0, 0, '2016-04-28 14:32:47', 6),
(79, '9', '2', 1462212822, '1-1', '2-2', '1-2', '2-1', '1-1', '0', '0', '0', '0', 0, 'Cooperate', 'Defect', 'Cooperate', 'Defect', 'Cooperate', '', '', '', '', '', 'Cooperate', 'Defect', 'Defect', 'Cooperate', 'Cooperate', '', '', '', '', '', 3, 1, 5, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0, 5, 0, 0, 0, 0, 0, 0, '2016-05-02 14:11:42', 6),
(80, '9', '2', 1462213276, '1-1', '2-2', '2-1', '0-0', '0-0', '0', '0', '0', '0', 0, 'Cooperate', 'Defect', 'Defect', '', '', '', '', '', '', '', 'Cooperate', 'Defect', 'Cooperate', '', '', '', '', '', '', '', 3, 1, 5, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2016-05-02 14:19:16', 6),
(81, '7', '2', 1462287621, '1-1', '1-2', '1-1', '2-1', '1-2', '0', '0', '0', '0', 0, 'Cooperate', 'Cooperate', 'Cooperate', 'Defect', 'Cooperate', '', '', '', '', '', 'Cooperate', 'Defect', 'Cooperate', 'Cooperate', 'Defect', '', '', '', '', '', 3, 5, 3, 5, 0, 0, 0, 0, 0, 0, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, '2016-05-03 10:58:21', 6),
(84, '4', '2', 1469070975, '1-1', '2-1', '0-0', '0-0', '0-0', '0', '0', '0', '0', 0, 'Cooperate', 'Defect', '', '', '', '', '', '', '', '', 'Cooperate', 'Cooperate', '', '', '', '', '', '', '', '', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-07-20 23:14:15', 6);

-- --------------------------------------------------------

--
-- Table structure for table `games_iterative`
--

CREATE TABLE IF NOT EXISTS `games_iterative` (
  `id` int(255) NOT NULL,
  `player1` varchar(255) NOT NULL,
  `player2` varchar(255) NOT NULL,
  `time` int(50) NOT NULL,
  `round1` varchar(3) NOT NULL DEFAULT '0-0',
  `round2` varchar(3) NOT NULL DEFAULT '0-0',
  `round3` varchar(3) NOT NULL DEFAULT '0-0',
  `round4` varchar(3) NOT NULL DEFAULT '0-0',
  `round5` varchar(3) NOT NULL DEFAULT '0-0',
  `round6` varchar(3) NOT NULL DEFAULT '0-0',
  `round7` varchar(3) NOT NULL DEFAULT '0-0',
  `round8` varchar(3) NOT NULL DEFAULT '0-0',
  `round9` varchar(3) NOT NULL DEFAULT '0-0',
  `round10` varchar(3) NOT NULL DEFAULT '0-0',
  `round1_p1` varchar(50) NOT NULL,
  `round2_p1` varchar(50) NOT NULL,
  `round3_p1` varchar(50) NOT NULL,
  `round4_p1` varchar(50) NOT NULL,
  `round6_p1` varchar(50) NOT NULL,
  `round5_p1` varchar(50) NOT NULL,
  `round7_p1` varchar(50) NOT NULL,
  `round8_p1` varchar(50) NOT NULL,
  `round9_p1` varchar(50) NOT NULL,
  `round10_p1` varchar(50) NOT NULL,
  `round1_p2` varchar(50) NOT NULL,
  `round2_p2` varchar(50) NOT NULL,
  `round3_p2` varchar(50) NOT NULL,
  `round4_p2` varchar(50) NOT NULL,
  `round5_p2` varchar(50) NOT NULL,
  `round6_p2` varchar(50) NOT NULL,
  `round7_p2` varchar(50) NOT NULL,
  `round8_p2` varchar(50) NOT NULL,
  `round9_p2` varchar(50) NOT NULL,
  `round10_p2` varchar(50) NOT NULL,
  `round1score_p1` int(11) NOT NULL,
  `round2score_p1` int(11) NOT NULL,
  `round3score_p1` int(11) NOT NULL,
  `round4score_p1` int(11) NOT NULL,
  `round5score_p1` int(11) NOT NULL,
  `round6score_p1` int(11) NOT NULL,
  `round7score_p1` int(11) NOT NULL,
  `round8score_p1` int(11) NOT NULL,
  `round9score_p1` int(11) NOT NULL,
  `round10score_p1` int(11) NOT NULL,
  `round1score_p2` int(11) NOT NULL,
  `round2score_p2` int(11) NOT NULL,
  `round3score_p2` int(11) NOT NULL,
  `round4score_p2` int(11) NOT NULL,
  `round5score_p2` int(11) NOT NULL,
  `round6score_p2` int(11) NOT NULL,
  `round7score_p2` int(11) NOT NULL,
  `round8score_p2` int(11) NOT NULL,
  `round9score_p2` int(11) NOT NULL,
  `round10score_p2` int(11) NOT NULL,
  `LastUpdateDate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `CreatedTstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games_iterative`
--

INSERT INTO `games_iterative` (`id`, `player1`, `player2`, `time`, `round1`, `round2`, `round3`, `round4`, `round5`, `round6`, `round7`, `round8`, `round9`, `round10`, `round1_p1`, `round2_p1`, `round3_p1`, `round4_p1`, `round6_p1`, `round5_p1`, `round7_p1`, `round8_p1`, `round9_p1`, `round10_p1`, `round1_p2`, `round2_p2`, `round3_p2`, `round4_p2`, `round5_p2`, `round6_p2`, `round7_p2`, `round8_p2`, `round9_p2`, `round10_p2`, `round1score_p1`, `round2score_p1`, `round3score_p1`, `round4score_p1`, `round5score_p1`, `round6score_p1`, `round7score_p1`, `round8score_p1`, `round9score_p1`, `round10score_p1`, `round1score_p2`, `round2score_p2`, `round3score_p2`, `round4score_p2`, `round5score_p2`, `round6score_p2`, `round7score_p2`, `round8score_p2`, `round9score_p2`, `round10score_p2`, `LastUpdateDate`, `status`, `CreatedTstamp`) VALUES
(91, '4', '2', 1469420775, '1-1', '2-2', '2-1', '1-2', '2-1', '0-0', '0-0', '0-0', '0-0', '0-0', 'Cooperate', 'Defect', 'Defect', 'Cooperate', '', 'Defect', '', '', '', '', 'Cooperate', 'Defect', 'Cooperate', 'Defect', 'Cooperate', '', '', '', '', '', 3, 1, 5, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0, 5, 0, 0, 0, 0, 0, 0, '2016-07-25 00:24:15', 6, '2016-07-25 04:23:34'),
(92, '8', '2', 1469421603, '2-2', '1-1', '1-2', '1-2', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', 'Defect', 'Cooperate', 'Cooperate', 'Cooperate', '', '', '', '', '', '', 'Defect', 'Cooperate', 'Defect', 'Defect', '', '', '', '', '', '', 1, 3, 5, 0, 0, 0, 0, 0, 0, 0, 1, 3, 0, 5, 0, 0, 0, 0, 0, 0, '2016-07-25 00:38:03', 6, '2016-07-25 04:37:15'),
(93, '2', '4', 1470886892, '1-1', '1-1', '1-1', '1-1', '1-1', '0-0', '0-0', '0-0', '0-0', '0-0', 'Cooperate', 'Cooperate', 'Cooperate', 'Cooperate', '', 'Cooperate', '', '', '', '', 'Cooperate', 'Cooperate', 'Cooperate', 'Cooperate', 'Cooperate', '', '', '', '', '', 3, 3, 3, 3, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 0, 0, 0, 0, 0, 0, '2016-08-10 23:39:32', 6, '2016-08-11 03:38:40'),
(94, '4', '2', 1470886909, '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 6, '2016-08-11 03:39:49'),
(95, '4', '2', 1470887559, '1-1', '1-1', '1-1', '2-2', '2-2', '0-0', '0-0', '0-0', '0-0', '0-0', 'Cooperate', 'Cooperate', 'Cooperate', 'Defect', '', 'Defect', '', '', '', '', 'Cooperate', 'Cooperate', 'Cooperate', 'Defect', 'Defect', '', '', '', '', '', 3, 3, 3, 1, 1, 0, 0, 0, 0, 0, 3, 3, 3, 1, 1, 0, 0, 0, 0, 0, '2016-08-10 23:50:39', 6, '2016-08-11 03:47:51'),
(96, '4', '2', 1471325311, '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, '2016-08-16 05:26:31'),
(97, '2', '4', 1471495464, '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, '2016-08-18 04:42:24'),
(98, '13', '5', 1471496031, '1-1', '2-2', '2-2', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', 'Cooperate', 'Defect', 'Defect', '', '', '', '', '', '', '', 'Cooperate', 'Defect', 'Defect', '', '', '', '', '', '', '', 3, 1, 1, 0, 0, 0, 0, 0, 0, 0, 3, 1, 1, 0, 0, 0, 0, 0, 0, 0, '2016-08-18 00:51:51', 3, '2016-08-18 04:51:10'),
(99, '13', '5', 1471496125, '2-2', '1-1', '1-1', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', 'Defect', 'Cooperate', 'Cooperate', '', '', '', '', '', '', '', 'Defect', 'Cooperate', 'Cooperate', '', '', '', '', '', '', '', 1, 3, 3, 0, 0, 0, 0, 0, 0, 0, 1, 3, 3, 0, 0, 0, 0, 0, 0, 0, '2016-08-18 00:53:25', 3, '2016-08-18 04:52:31'),
(100, '13', '5', 1471496644, '1-1', '1-2', '1-1', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', '0-0', 'Cooperate', 'Cooperate', 'Cooperate', '', '', '', '', '', '', '', 'Cooperate', 'Defect', 'Cooperate', '', '', '', '', '', '', '', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 5, 0, 0, 0, 0, 0, 0, 0, 0, '2016-08-18 01:02:05', 3, '2016-08-18 05:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `games_rounds`
--

CREATE TABLE IF NOT EXISTS `games_rounds` (
  `roundID` int(11) NOT NULL,
  `round_limit` int(11) NOT NULL,
  `daily_max_games` int(11) NOT NULL,
  `tstamp` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games_rounds`
--

INSERT INTO `games_rounds` (`roundID`, `round_limit`, `daily_max_games`, `tstamp`) VALUES
(1, 3, 5, '2016-08-10 23:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `iterative_teams`
--

CREATE TABLE IF NOT EXISTS `iterative_teams` (
  `id` int(3) NOT NULL,
  `Course_ID` int(11) DEFAULT NULL,
  `member1` varchar(12) DEFAULT NULL,
  `member2` varchar(12) DEFAULT NULL,
  `member3` varchar(12) DEFAULT NULL,
  `member4` varchar(12) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iterative_teams`
--

INSERT INTO `iterative_teams` (`id`, `Course_ID`, `member1`, `member2`, `member3`, `member4`) VALUES
(14, 1, '14', '12', '10', '11'),
(15, 1, '8', '6', '4', '2'),
(16, 1, '5', '3', '13', '9'),
(18, 1, '', '', '7', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE IF NOT EXISTS `login_history` (
  `UniqueID` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `log_in` datetime NOT NULL,
  `log_out` datetime NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '0',
  `busy` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`UniqueID`, `id`, `log_in`, `log_out`, `isAdmin`, `busy`) VALUES
(44, 4, '2016-08-18 00:46:37', '2016-08-18 00:49:19', 0, 0),
(2, 3, '2016-07-20 00:31:24', '0000-00-00 00:00:00', 0, 0),
(3, 6, '2016-04-13 14:02:36', '2016-04-13 14:06:39', 0, 0),
(42, 2, '2016-08-18 00:42:23', '2016-08-18 00:44:08', 0, 1),
(50, 1, '2016-08-26 15:45:08', '0000-00-00 00:00:00', 0, 0),
(6, 7, '2016-05-03 08:49:03', '0000-00-00 00:00:00', 0, 1),
(46, 8, '2016-08-18 00:49:58', '2016-08-18 00:50:48', 0, 0),
(17, 9, '2016-07-23 02:53:42', '0000-00-00 00:00:00', 0, 1),
(23, 17, '2016-07-24 23:40:36', '2016-07-24 23:54:51', 0, 0),
(45, 5, '2016-08-18 00:49:27', '2016-08-18 01:05:00', 0, 0),
(35, 10, '2016-07-25 00:46:02', '2016-07-25 00:46:51', 0, 0),
(47, 13, '2016-08-18 00:51:10', '2016-08-18 01:04:45', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `desc` text NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teamcode`
--

CREATE TABLE IF NOT EXISTS `teamcode` (
  `users_id` int(3) NOT NULL,
  `tag` varchar(12) NOT NULL,
  `user_group` varchar(13) NOT NULL,
  `random_group` int(3) DEFAULT '0',
  `fixed_group` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teamcode`
--

INSERT INTO `teamcode` (`users_id`, `tag`, `user_group`, `random_group`, `fixed_group`) VALUES
(1, 'Black-1', 'Black', 0, 0),
(2, 'Blue-2', 'Blue', 1, 0),
(3, 'Yellow-3', 'Yellow', 1, 0),
(4, 'Red-4', 'Red', 1, 0),
(5, 'Blue-5', 'Blue', 0, 0),
(6, 'Yellow-6', 'Yellow', 0, 0),
(7, 'Red-7', 'Red', 0, 0),
(8, 'Blue-8', 'Blue', 0, 0),
(9, 'Yellow-9', 'Yellow', 0, 0),
(10, 'Red-10', 'Red', 0, 0),
(11, 'Blue-11', 'Blue', 0, 0),
(12, 'Yellow-12', 'Yellow', 0, 0),
(13, 'Red-13', 'Red', 0, 0),
(14, 'Blue-14', 'Blue', 0, 0),
(15, 'Yellow-15', 'Yellow', 0, 0),
(16, 'Red-16', 'Red', 0, 0),
(17, 'Blue-17', 'Blue', 0, 0),
(18, 'Yellow-18', 'Yellow', 0, 0),
(19, 'Red-19', 'Red', 0, 0),
(20, 'Blue-20', 'Blue', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `totals`
--

CREATE TABLE IF NOT EXISTS `totals` (
  `users_id` int(4) NOT NULL,
  `totalscore` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totals`
--

INSERT INTO `totals` (`users_id`, `totalscore`) VALUES
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `usernames` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `confirmed_email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `confirmed_pw` varchar(255) NOT NULL,
  `course` varchar(12) DEFAULT NULL,
  `section` int(2) DEFAULT NULL,
  `online_status` int(1) NOT NULL DEFAULT '0',
  `score` int(3) DEFAULT '0',
  `busy` tinyint(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rank` smallint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usernames`, `first_name`, `last_name`, `email`, `confirmed_email`, `pw`, `confirmed_pw`, `course`, `section`, `online_status`, `score`, `busy`, `time`, `rank`) VALUES
(1, 'aadmin', 'admin', 'admin', 'admin@hotmail.com', 'admin@hotmail.com', '123456', '123456', 'admin', 0, 1, -10, 0, '2016-03-23 20:34:50', 0),
(2, 'testxu', 'Test', 'Xu', 'xxu@ggc.edu', 'xxu@ggc.edu', '159357', '159357', 'BIOL 1101K', 1, 1, 73, 0, '2016-03-23 20:36:01', 0),
(3, 'vmeica', 'Valentin ', 'Meica', 'vmeica@ggc.edu', 'vmeica@ggc.edu', '8246555', '8246555', 'BIOL 1101K', 1, 1, 0, 0, '2016-03-23 20:36:16', 0),
(4, 'dguevara1', 'David', 'Guevara', 'dguevara1@ggc.edu', 'dguevara1@ggc.edu', 'cat123', 'cat123', 'BIOL 1101K', 1, 1, 50, 0, '2016-03-23 20:37:42', 0),
(5, 'test1', 'test', 'account', 'test@ggc.edu', 'test@ggc.edu', 'test', 'test', 'BIOL 1101K', 1, 1, 23, 0, '2016-04-06 14:11:56', 0),
(6, 'test', 'test', 'app', 'test@ggc.edu', 'test@ggc.edu', 'test', 'test', 'BIOL 1101K', 1, 0, 0, 0, '2016-04-13 20:00:24', 0),
(7, 'panchor', 'James', 'Russell', 'jrussell@ggc.edu', 'jrussell@ggc.edu', 'wolbachia', 'wolbachia', 'BIOL 1101K', 1, 0, 0, 0, '2016-04-13 20:10:51', 0),
(8, 'sadams', 'Sam', 'Adams', 'adams@ggc.edu', 'adams@ggc.edu', '1234', '1234', 'BIOL 1101K', 1, 0, 8, 0, '2016-04-28 05:43:43', 0),
(9, 'testtie', 'Test', 'Tie', 'testemail@email.com', 'testemail@email.com', '159357', '159357', 'BIOL 1101K', 1, 0, 0, 0, '2016-05-02 18:10:10', 0),
(10, 'test10', 'ftestTen', 'ltestTen', 'test10@ggc.edu', 'test10@ggc.edu', 'test10', 'test10', 'BIOL 1101K', 1, 0, 0, 0, '2016-07-25 02:19:28', 0),
(11, 'test1', 'ftestOne', 'ltestOne', 'test1@ggc.edu', 'test1@ggc.edu', 'test1', 'test1', 'BIOL 1101K', 1, 0, 0, 0, '2016-07-25 02:21:26', 0),
(12, 'test2', 'ftestTwo', 'ltestTwo', 'test2@ggc.edu', 'test2@ggc.edu', 'test2', 'test2', 'BIOL 1101K', 1, 0, 0, 0, '2016-07-25 02:22:08', 0),
(13, 'test3', 'ftestThree', 'ltestThree', 'test3@ggc.edu', 'test3@ggc.edu', 'test3', 'test3', 'BIOL 1101K', 1, 0, 18, 0, '2016-07-25 02:22:38', 0),
(14, 'test4', 'ftestFour', 'ltestFour', 'test4@ggc.edu', 'test4@ggc.edu', 'test4', 'test4', 'BIOL 1101K', 1, 0, 0, 0, '2016-07-25 02:23:03', 0),
(15, 'test5', 'ftestFive', 'ltestFive', 'test5@ggc.edu', 'test5@ggc.edu', 'test5', 'test5', 'ITEC4500', 1, 0, 0, 0, '2016-07-25 02:55:38', 0),
(16, 'test6', 'ftestSix', 'ltestSix', 'test6@ggc.edu', 'test6@ggc.edu', 'test6', 'test6', 'ITEC4500', 1, 0, 0, 0, '2016-07-25 02:58:52', 0),
(17, 'test7', 'ftestSeven', 'ltestSeven', 'test7@ggc.edu', 'test7@ggc.edu', 'test7', 'test7', 'ITEC4500', 1, 0, 0, 0, '2016-07-25 02:59:27', 0),
(18, 'test8', 'ftestEight', 'ltestEight', 'test8@ggc.edu', 'test8@ggc.edu', 'test8', 'test8', 'PHYS 2202', 11, 0, 0, 0, '2016-07-25 03:00:09', 0),
(19, 'test8', 'ftestEight', 'ltestEight', 'test8@ggc.edu', 'test8@ggc.edu', 'test8', 'test8', 'PHYS 2202', 11, 0, 0, 0, '2016-07-25 03:00:09', 0),
(20, 'test9', 'ftestNine', 'ltestNine', 'test9@ggc.edu', 'test9@ggc.edu', 'test9', 'test9', 'PHYS 2202', 11, 0, 0, 0, '2016-07-25 03:00:42', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_n_number` (`course_and_number`,`section`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games_iterative`
--
ALTER TABLE `games_iterative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games_rounds`
--
ALTER TABLE `games_rounds`
  ADD PRIMARY KEY (`roundID`);

--
-- Indexes for table `iterative_teams`
--
ALTER TABLE `iterative_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`UniqueID`);

--
-- Indexes for table `teamcode`
--
ALTER TABLE `teamcode`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `totals`
--
ALTER TABLE `totals`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `games_iterative`
--
ALTER TABLE `games_iterative`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `games_rounds`
--
ALTER TABLE `games_rounds`
  MODIFY `roundID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iterative_teams`
--
ALTER TABLE `iterative_teams`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `UniqueID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
