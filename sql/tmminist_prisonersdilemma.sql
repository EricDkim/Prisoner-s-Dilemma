-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2016 at 10:48 PM
-- Server version: 5.5.51-38.2-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `Complete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

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
  `Complete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 5, 5, '2016-08-10 23:57:23');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

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
(1, 'Black-1', 'Black', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `totals`
--

CREATE TABLE IF NOT EXISTS `totals` (
  `users_id` int(4) NOT NULL,
  `totalscore` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usernames`, `first_name`, `last_name`, `email`, `confirmed_email`, `pw`, `confirmed_pw`, `course`, `section`, `online_status`, `score`, `busy`, `time`, `rank`) VALUES
(1, 'aadmin', 'admin', 'admin', 'admin@hotmail.com', 'admin@hotmail.com', '123456', '123456', 'admin', 0, 1, 0, 0, '2016-03-23 20:34:50', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `course_n_number` (`course_and_number`,`section`);

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
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT for table `games_iterative`
--
ALTER TABLE `games_iterative`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `games_rounds`
--
ALTER TABLE `games_rounds`
  MODIFY `roundID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iterative_teams`
--
ALTER TABLE `iterative_teams`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `UniqueID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
