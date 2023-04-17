-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 11:54 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theater_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(30) NOT NULL,
  `movie_id` int(30) NOT NULL,
  `ts_id` int(30) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `movie_id`, `ts_id`, `lastname`, `firstname`, `contact_no`, `qty`, `date`, `time`) VALUES
(1, 7, 1, 'nirav', 'gajera', '0909505', 1, '2023-04-07', '11:05:00'),
(2, 15, 3, 'user', 'abc', '785459678', 2, '2023-04-11', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `username`, `password`) VALUES
(1, 'abc', 'abc123', 'abc@123');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `cover_img` text NOT NULL,
  `description` text NOT NULL,
  `duration` float NOT NULL,
  `date_showing` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `cover_img`, `description`, `duration`, `date_showing`, `end_date`) VALUES
(10, 'Avatar: The way of water', '1680842700_avatar.jpg', 'Avatar: The Way of Water is a 2022 American epic science fiction film directed and produced by James Cameron. He co-wrote the screenplay with Rick Jaffa and Amanda Silver from a story the trio wrote with Josh Friedman and Shane Salerno', 2.75, '2023-04-05', '2023-05-05'),
(11, 'Bhola', '1680844320_bhola.jpg', 'Bhola, a prisoner, is finally going home after 10 years of imprisonment to meet his young daughter. His journey gets difficult when he is arrested mid-way', 2.5, '2023-04-05', '2023-10-06'),
(12, 'Tu joothi main makkar', '1680861060_ju jhoothi main makkar.jpg', 'TU JHOOTHI MAIN MAKKAAR is a love story between two young and modern individuals. Rohan Arora aka Mickey (Ranbir Kapoor) resides in Delhi with his family. Although he handles his family business, out of passion, he also has a secret profession.', 2.75, '2022-04-05', '2023-05-05'),
(15, 'Gumraah', '1681107000_gumrah.jpg', 'Gumraah (transl. Astray) is an upcoming Indian Hindi-language crime thriller film directed by Vardhan Ketkar and produced by T-Series Films and Murad Khetani\'s Cine1 Studios. The film stars Aditya Roy Kapur, in a dual role along with Mrunal Thakur and Ronit Roy.', 2.3, '2023-04-05', '2023-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`id`, `name`) VALUES
(1, '3D'),
(2, 'Theater 1'),
(3, 'Theater 2');

-- --------------------------------------------------------

--
-- Table structure for table `theater_settings`
--

CREATE TABLE `theater_settings` (
  `id` int(30) NOT NULL,
  `theater_id` int(30) NOT NULL,
  `seat_group` varchar(250) NOT NULL,
  `seat_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theater_settings`
--

INSERT INTO `theater_settings` (`id`, `theater_id`, `seat_group`, `seat_count`) VALUES
(2, 2, 'Box 1', 20),
(3, 2, 'Box 2', 30),
(4, 1, 'Box 1', 30),
(5, 1, 'Box 2', 30),
(6, 3, 'Box 1', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Nirav', 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theater_settings`
--
ALTER TABLE `theater_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `theater`
--
ALTER TABLE `theater`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `theater_settings`
--
ALTER TABLE `theater_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
