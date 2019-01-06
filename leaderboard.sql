-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 04:12 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leaderboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_name`) VALUES
(1, 'Computer Studies'),
(2, 'Engineering and Architecture'),
(3, 'Criminology'),
(4, 'Integrated School'),
(5, 'Music'),
(6, 'Nursing'),
(7, 'Accountancy'),
(8, 'Business Administration'),
(9, 'Arts and Sciences'),
(10, 'Communication'),
(11, 'Education'),
(12, 'Medical Technology'),
(13, 'Physical Therapy'),
(14, 'Respiratory Therapy');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `first_points` int(11) NOT NULL,
  `second_points` int(11) NOT NULL,
  `third_points` int(11) NOT NULL,
  `participant` int(11) NOT NULL,
  `event_finished` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `first_points`, `second_points`, `third_points`, `participant`, `event_finished`) VALUES
(8, 'Brain Wars', 120, 90, 70, 50, 'undone'),
(9, 'Hataw Sayaw', 100, 70, 50, 30, 'undone'),
(10, 'Scrap to Craft', 100, 70, 50, 30, 'undone'),
(11, 'Clash of the Brush', 100, 70, 50, 30, 'done'),
(12, 'NEU Acapella', 80, 60, 40, 20, 'undone'),
(13, 'Debate', 80, 60, 40, 20, 'undone'),
(14, 'NEU and the Bee', 80, 50, 30, 20, 'undone'),
(15, 'Spoken Poetry', 80, 50, 30, 20, 'undone'),
(16, 'Fun Walk', 250, 200, 150, 100, 'undone');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `event_id` int(11) NOT NULL,
  `event_winner` int(11) NOT NULL,
  `event_place` int(11) NOT NULL,
  `event_points` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`event_id`, `event_winner`, `event_place`, `event_points`, `place_id`) VALUES
(11, 7, 0, 30, 30),
(11, 9, 0, 30, 31),
(11, 8, 0, 30, 32),
(11, 10, 0, 30, 33),
(11, 3, 0, 30, 34),
(11, 11, 0, 30, 35),
(11, 4, 0, 30, 36),
(11, 12, 0, 30, 37),
(11, 5, 0, 30, 38),
(11, 6, 0, 30, 39),
(11, 13, 0, 30, 40),
(11, 1, 1, 100, 41),
(11, 2, 2, 70, 42),
(11, 2, 3, 25, 43);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `event_winner` (`event_winner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `place_ibfk_2` FOREIGN KEY (`event_winner`) REFERENCES `college` (`college_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
