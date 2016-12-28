-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2016 at 06:58 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_adm`
--

-- --------------------------------------------------------

--
-- Table structure for table `r_khusus`
--

CREATE TABLE IF NOT EXISTS `r_khusus` (
`id_khusus` int(11) NOT NULL,
  `id_umum` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_khusus`
--

INSERT INTO `r_khusus` (`id_khusus`, `id_umum`, `kategori`) VALUES
(1, 0, 'Gender'),
(2, 0, 'Geografi'),
(3, 1, 'Energi'),
(4, 1, 'Industri'),
(5, 2, 'Tanaman Pangan');

-- --------------------------------------------------------

--
-- Table structure for table `r_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `r_pekerjaan` (
`id_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_pekerjaan`
--

INSERT INTO `r_pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'PNS'),
(2, 'Pekerja Swasta'),
(3, 'Wirausaha'),
(4, 'Mahasiswa/ Pelajar');

-- --------------------------------------------------------

--
-- Table structure for table `r_umum`
--

CREATE TABLE IF NOT EXISTS `r_umum` (
`id_umum` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_umum`
--

INSERT INTO `r_umum` (`id_umum`, `kategori`) VALUES
(0, 'Sosial dan Kependudukan'),
(1, 'Ekonomi dan Perdagangan'),
(2, 'Pertanian dan Pertambangan');

-- --------------------------------------------------------

--
-- Table structure for table `t_data`
--

CREATE TABLE IF NOT EXISTS `t_data` (
`id_data` int(11) NOT NULL,
  `nama_file` varchar(250) NOT NULL,
  `nama_berkas` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  `link_file` varchar(250) NOT NULL,
  `id_umum` int(11) DEFAULT NULL,
  `id_khusus` int(11) DEFAULT NULL,
  `status_data` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_keranjang`
--

CREATE TABLE IF NOT EXISTS `t_keranjang` (
`id_keranjang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_data` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pelanggan`
--

CREATE TABLE IF NOT EXISTS `t_pelanggan` (
`id_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_pekerjaan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_pelanggan`, `nama`, `email`, `alamat`, `tanggal`, `id_pekerjaan`) VALUES
(14, 'Rabihi Awaludin', 'rabihi.awaludin@student.upi.edu', 'Jl. Cibuntu Tengah No.18', '2016-02-23', 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_petugas`
--

CREATE TABLE IF NOT EXISTS `t_petugas` (
  `nip` varchar(50) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_petugas`
--

INSERT INTO `t_petugas` (`nip`, `nama_petugas`, `username`, `password`, `email`, `jabatan`) VALUES
('1203921', 'petugas 1', 'petugas', 'petugas', 'petugas1@bps.go.id', 'Petugas'),
('1234', 'pimpinan 1', 'pimpinan', 'pimpinan', 'pimpinan@bps.go.id', 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE IF NOT EXISTS `t_transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL DEFAULT '0',
  `id_data` int(11) NOT NULL DEFAULT '0',
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `r_khusus`
--
ALTER TABLE `r_khusus`
 ADD PRIMARY KEY (`id_khusus`);

--
-- Indexes for table `r_pekerjaan`
--
ALTER TABLE `r_pekerjaan`
 ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `r_umum`
--
ALTER TABLE `r_umum`
 ADD PRIMARY KEY (`id_umum`);

--
-- Indexes for table `t_data`
--
ALTER TABLE `t_data`
 ADD PRIMARY KEY (`id_data`), ADD KEY `FK_t_data_r_umum` (`id_umum`), ADD KEY `FK_t_data_r_khusus` (`id_khusus`);

--
-- Indexes for table `t_keranjang`
--
ALTER TABLE `t_keranjang`
 ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `t_petugas`
--
ALTER TABLE `t_petugas`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
 ADD PRIMARY KEY (`id_transaksi`), ADD KEY `FK_t_transaksi_t_pelanggan` (`id_pelanggan`), ADD KEY `FK_t_transaksi_t_data` (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r_khusus`
--
ALTER TABLE `r_khusus`
MODIFY `id_khusus` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `r_pekerjaan`
--
ALTER TABLE `r_pekerjaan`
MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `r_umum`
--
ALTER TABLE `r_umum`
MODIFY `id_umum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_data`
--
ALTER TABLE `t_data`
MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `t_keranjang`
--
ALTER TABLE `t_keranjang`
MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_data`
--
ALTER TABLE `t_data`
ADD CONSTRAINT `FK_t_data_r_khusus` FOREIGN KEY (`id_khusus`) REFERENCES `r_khusus` (`id_khusus`),
ADD CONSTRAINT `FK_t_data_r_umum` FOREIGN KEY (`id_umum`) REFERENCES `r_umum` (`id_umum`);

--
-- Constraints for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
ADD CONSTRAINT `FK_t_transaksi_t_data` FOREIGN KEY (`id_data`) REFERENCES `t_data` (`id_data`),
ADD CONSTRAINT `FK_t_transaksi_t_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `t_pelanggan` (`id_pelanggan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
