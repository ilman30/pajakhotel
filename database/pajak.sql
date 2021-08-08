-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2021 at 05:27 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pajak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbpajak`
--

CREATE TABLE `tbpajak` (
  `kdpajak` varchar(10) NOT NULL,
  `kdhotel` varchar(20) NOT NULL,
  `pendapatan` double NOT NULL,
  `pajak` double NOT NULL,
  `tarif` double NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpajak`
--

INSERT INTO `tbpajak` (`kdpajak`, `kdhotel`, `pendapatan`, `pajak`, `tarif`, `tanggal`) VALUES
('PHO0001', 'HTL0001', 100000000, 10, 10000000, '2021-08-07 13:15:56'),
('PHO001', 'HT-00001', 1000000000, 10, 100000000, '2021-08-07 13:25:55'),
('PHO002', 'HT-00001', 324234234, 10, 32423423.400000002, '2021-08-07 13:45:20'),
('PHO003', 'HT-00001', 900000000, 10, 90000000, '2021-08-07 13:53:41'),
('PHO004', 'HTL002', 1000000000, 10, 100000000, '2021-08-08 03:19:44'),
('PHO005', 'HTL003', 123123, 10, 12312.300000000001, '2021-08-08 03:21:48'),
('PHO006', 'HTL002', 200000000, 10, 20000000, '2021-08-08 03:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id_admin` int(2) NOT NULL,
  `namalengkap` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id_admin`, `namalengkap`, `username`, `password`, `level`) VALUES
(0, 'Administrator', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbwajibpajak`
--

CREATE TABLE `tbwajibpajak` (
  `kdhotel` varchar(10) NOT NULL,
  `namahotel` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbwajibpajak`
--

INSERT INTO `tbwajibpajak` (`kdhotel`, `namahotel`, `alamat`, `notelp`) VALUES
('HT-00001', 'Hotel A', 'Hotel A', '022929292'),
('HTL001', 'Hotel Bs', 'Hotel Bs', '123'),
('HTL002', 'Hotel C', 'gfjfghj', '23453534'),
('HTL003', 'Hotel 8', 'yuktyuj', '2345234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbpajak`
--
ALTER TABLE `tbpajak`
  ADD PRIMARY KEY (`kdpajak`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id_admin`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
