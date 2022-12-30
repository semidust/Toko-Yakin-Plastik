-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 05:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiskia`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(20) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `tickets` varchar(500) NOT NULL,
  `price` int(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `nama`, `tickets`, `price`, `no_hp`) VALUES
(30, 'Hiskia Sinaga', 'Finance Manager', 17713, '082284583788'),
(31, 'Fransisca Haliem', 'Finance Manager', 17713, '081396190386'),
(32, 'Zwingli Raja', 'Project Manager', 10901, '082294613028'),
(33, 'Christento Siregar', 'Project Manager', 10901, '085262062685'),
(34, 'Agatha Sinaga', 'Project Manager', 10901, '089677876777'),
(35, 'Sammytha', 'Supply Planner', 7473, '087847723318'),
(38, 'Ekalma Sembiring', 'Supply Planner', 7473, '081294537182'),
(39, 'Yakin Surbakti', 'Intern', 5260, '081995572163'),
(40, 'John Sembiring', 'Intern', 5260, '087891738447'),
(41, 'Zefanya Nicholas', 'Intern', 5260, '087891738447');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('kelompok12', 'kelompok12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
