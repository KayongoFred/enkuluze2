-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 11:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enkuluze`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `location`) VALUES
(7, 'kayongo  fred', 'kitetika'),
(8, 'Birungi', 'ruba'),
(9, 'Viola Birungi', 'Rubaga'),
(10, 'bash', 'rubaga'),
(11, 'nic', 'kite'),
(12, 'john', 'mas');

-- --------------------------------------------------------

--
-- Table structure for table `search_engine`
--

CREATE TABLE `search_engine` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `url` text NOT NULL,
  `blurb` text NOT NULL,
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_engine`
--

INSERT INTO `search_engine` (`id`, `title`, `url`, `blurb`, `keywords`) VALUES
(1, 'words ', '', 'ekwjdnkejwnejnjenfjnnvkssjnfjnjjfvnfvnnvnvjdfjfnvndfjnvf', 'search engine'),
(2, 'makulu', '', 'wdhuehdeuhuehduehduehd uhduehduehd  ', ''),
(4, 'waka', '', 'waka wetubeela nga bulijjo!', 'wetuli'),
(5, 'eater', '', 'ewewe', 'weedd'),
(6, 'mele', '', 'kyekintu ekiffumbibya era ne kisobora okuba nga kilibwa', 'mere food emere '),
(7, 'mele', '', 'kyekintu ekiffumbibya era ne kisobora okuba nga kilibwa', 'mere food emere '),
(8, 'mele', '', 'rkejlkej', 'vfdlkmvflk'),
(9, 'mele', '', 'rkejlkej', 'vfdlkmvflk'),
(10, 'mele', '', 'rkejlkej', 'vfdlkmvflk'),
(11, 'mele', '', 'rkejlkej', 'vfdlkmvflk'),
(12, 'mele', '', 'wewewe', 'eweew'),
(13, 'makulu', '', 'frtd', 'cdeews'),
(14, 'words', '', 'cds', 'csd'),
(15, 'eater', '', 'gt', 'hy'),
(20, 'mubbi', 'wejdj', 'Omuntu atwala ebitali bibye nga tafunye lukusa', 'mubi mubbi omubbi omibi'),
(21, 'mele', 'mele', 'fed', 'dee');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `password`, `gender`) VALUES
(1, 'viola', 'fred', ''),
(2, 'Fred', 'viola', ''),
(3, '', '', ''),
(4, 'kayondo', 'k', ''),
(5, 'kasanke', 'kanks', ''),
(6, 'patrick', 'p', '');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` int(60) NOT NULL,
  `word` varchar(50) NOT NULL,
  `meaning` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `word`, `meaning`) VALUES
(1, 'Omusajja', 'yefananyiliza ng omulenzzi'),
(2, 'Omukazzi', 'yefananyiliza nga omuwala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_engine`
--
ALTER TABLE `search_engine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `search_engine`
--
ALTER TABLE `search_engine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
