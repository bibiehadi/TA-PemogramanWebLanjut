-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2018 at 01:04 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_ktm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `NRP` varchar(10) NOT NULL,
  `Nama` varchar(128) NOT NULL DEFAULT ' ',
  `Tempat_Lahir` varchar(50) NOT NULL DEFAULT ' ',
  `Tanggal_Lahir` date NOT NULL,
  `JK` char(1) NOT NULL DEFAULT '',
  `Agama` varchar(20) NOT NULL DEFAULT ' ',
  `Alamat` varchar(128) NOT NULL DEFAULT ' ',
  `Program_Studi` varchar(50) NOT NULL DEFAULT ' ',
  `Status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mhs`
--

INSERT INTO `tbl_mhs` (`NRP`, `Nama`, `Tempat_Lahir`, `Tanggal_Lahir`, `JK`, `Agama`, `Alamat`, `Program_Studi`, `Status`) VALUES
('161111078', 'Bibie Hadi', 'Malang', '1998-02-22', 'L', 'Islam', 'Malang', 'S1 - Teknik Informatika', '1'),
('162111091', 'Hadi Kusumo', 'Malang', '1997-12-12', 'L', 'Islam', 'Malang', 'S1 - Desain Komunikasi Visual', '1'),
('161111111', 'Suci Wahyu S', 'Surabaya', '1999-07-03', 'P', 'Islam', 'Surabaya', 'S1 - Teknik Informatika', '1'),
('151111119', 'M Alim Arief', 'malang', '2017-12-05', 'L', 'Islam', 'Sumber pucung ', 'S1 - Teknik Informatika', '1'),
('151111123', 'Jangkung ari m', 'malang', '2017-12-01', 'P', 'Islam', 'Sumber pucung ', 'S1 - Teknik Informatika', '1'),
('1', ' ', ' ', '0000-00-00', '', ' ', ' ', ' ', '1'),
('2', ' ', ' ', '0000-00-00', '', ' ', ' ', ' ', '1'),
('3', ' ', ' ', '0000-00-00', '', ' ', ' ', ' ', '1'),
('4', ' ', ' ', '0000-00-00', '', ' ', ' ', ' ', '1'),
('5', ' ', ' ', '0000-00-00', '', ' ', ' ', ' ', '1'),
('6', ' ', ' ', '0000-00-00', '', ' ', ' ', ' ', '1'),
('181111078', 'Muhammad Ishaq', 'Malang', '2000-12-12', 'L', 'Islam', 'Malang', 'S1 - Desain Komunikasi Visual', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `NIP` varchar(10) NOT NULL,
  `Nama` varchar(128) NOT NULL DEFAULT ' ',
  `JK` varchar(1) NOT NULL DEFAULT ' ',
  `Alamat` varchar(128) NOT NULL DEFAULT ' ',
  `Unit` varchar(10) NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`NIP`, `Nama`, `JK`, `Alamat`, `Unit`) VALUES
('PMB101', 'Jangkung Ari Mukti', 'L', 'Sumber Pucung, Kab. Malang', 'PMB'),
('BAK101', 'Budi Laksono', 'L', 'Kepanjen, Kab. Malang', 'BAK'),
('bibie', ' ', ' ', ' ', ' '),
('a', ' ', ' ', ' ', ' '),
('b', ' ', ' ', ' ', ' '),
('c', ' ', ' ', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `NRP` int(10) NOT NULL,
  `src_surat` varchar(200) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0',
  `Note` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id`, `tgl_pengajuan`, `NRP`, `src_surat`, `status`, `Note`) VALUES
(1, '2017-12-03', 161111078, '', '4', 'aasss\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\ndasdka'),
(3, '2017-12-03', 162111091, '', '1', ''),
(4, '2017-12-03', 161111111, '', '2', ''),
(6, '2017-12-04', 151111119, '', '3', ''),
(12, '2017-12-29', 161111111, 'bukti_161111111.JPG', '4', ''),
(13, '2018-01-16', 181111078, 'bukti_181111078.png', '0', NULL),
(14, '2018-01-16', 1, 'm', '0', NULL),
(15, '2018-01-16', 2, 'm', '0', NULL),
(16, '2018-01-16', 3, 'bukti_3.png', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','mhs','super') NOT NULL DEFAULT 'mhs',
  `photo` varchar(50) NOT NULL DEFAULT 'people.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`, `level`, `photo`) VALUES
('1', '202cb962ac59075b964b07152d234b70', 'mhs', 'people.jpg'),
('151111119', 'd41d8cd98f00b204e9800998ecf8427e', 'mhs', 'people.jpg'),
('151111123', '202cb962ac59075b964b07152d234b70', 'mhs', 'people.jpg'),
('161111078', '202cb962ac59075b964b07152d234b70', 'mhs', 'foto_4.jpg'),
('161111111', '202cb962ac59075b964b07152d234b70', 'mhs', 'people.jpg'),
('162111091', '202cb962ac59075b964b07152d234b70', 'mhs', 'people.jpg'),
('181111078', '202cb962ac59075b964b07152d234b70', '', 'foto_.JPG'),
('2', '202cb962ac59075b964b07152d234b70', 'mhs', 'people.jpg'),
('3', '202cb962ac59075b964b07152d234b70', 'mhs', 'people.jpg'),
('4', '202cb962ac59075b964b07152d234b70', 'mhs', 'people.jpg'),
('5', '202cb962ac59075b964b07152d234b70', 'mhs', 'people.jpg'),
('6', '202cb962ac59075b964b07152d234b70', 'mhs', 'people.jpg'),
('a', '202cb962ac59075b964b07152d234b70', 'admin', 'people.jpg'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'super', 'people.jpg'),
('alim', '202cb962ac59075b964b07152d234b70', 'super', 'people.jpg'),
('b', '202cb962ac59075b964b07152d234b70', 'admin', 'people.jpg'),
('baa', '202cb962ac59075b964b07152d234b70', 'admin', 'people.jpg'),
('BAK101', '202cb962ac59075b964b07152d234b70', 'admin', 'foto_BAK101.jpg'),
('bibie', '251d3e75db5c7c310a98b9c6eaab3124', 'admin', 'foto_bibie3.jpg'),
('c', '202cb962ac59075b964b07152d234b70', 'admin', 'people.jpg'),
('PMB101', '202cb962ac59075b964b07152d234b70', 'admin', 'people.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD KEY `NRP` (`NRP`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD CONSTRAINT `tbl_mhs_ibfk_1` FOREIGN KEY (`NRP`) REFERENCES `tbl_user` (`Username`);

--
-- Constraints for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `tbl_user` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
