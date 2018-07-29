-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2016 at 08:57 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inkost`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `kd_admin` varchar(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kd_admin`, `username`, `pwd`) VALUES
('1', 'Husnul', 'admin'),
('2', 'ullyady', '12345'),
('', 'cahyana', 'cahyana');

-- --------------------------------------------------------

--
-- Table structure for table `admin_kost`
--

CREATE TABLE IF NOT EXISTS `admin_kost` (
  `kd_adminkost` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(1) NOT NULL,
  `telp` char(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_kost`
--

INSERT INTO `admin_kost` (`kd_adminkost`, `email`, `pwd`, `nik`, `nama_lengkap`, `alamat_lengkap`, `tgl_lahir`, `jk`, `telp`) VALUES
('A001', 'husnulhotimah006@gmail.com', 'husnul', 'E41150843', 'Husnul Hotimah', 'Jalan Mastrip gang 5 no 3', '1998-09-06', 'W', '081294446313');

-- --------------------------------------------------------

--
-- Table structure for table `akses_lingkungan`
--

CREATE TABLE IF NOT EXISTS `akses_lingkungan` (
  `kd_kost` varchar(4) NOT NULL,
  `akses_lingkungan` varchar(50) NOT NULL,
  `statuslingk` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`kd_booking` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `kd_kost` varchar(5) NOT NULL,
  `kd_member` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `kd_kost` varchar(5) NOT NULL,
  `fasilitas` varchar(50) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE IF NOT EXISTS `fasilitas_kamar` (
  `kd_kamar` int(4) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
`kd_foto` int(4) NOT NULL,
  `kd_kost` varchar(5) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `foto3` varchar(100) NOT NULL,
  `foto4` varchar(100) NOT NULL,
  `foto5` varchar(100) NOT NULL,
  `foto6` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`kd_foto`, `kd_kost`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`) VALUES
(1, 'C001', 'CTEAM.png', '1.png', '2.png', '3.png', '4.png', ''),
(2, 'C002', '1.png', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
`kd_jenis` int(4) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`kd_jenis`, `jenis`) VALUES
(1, 'Putra'),
(2, 'Putri'),
(3, 'Bebas');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
`kd_kamar` int(4) NOT NULL,
  `kd_kost` varchar(5) NOT NULL,
  `harga_harian` int(6) NOT NULL,
  `harga_bulanan` int(7) NOT NULL,
  `harga_tahun` int(10) NOT NULL,
  `luas_kamar` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kd_kamar`, `kd_kost`, `harga_harian`, `harga_bulanan`, `harga_tahun`, `luas_kamar`) VALUES
(1, 'C001', 40000, 300000, 14000000, '4x4'),
(2, 'C002', 30000, 450000, 23000000, '4x6');

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE IF NOT EXISTS `kost` (
  `kd_kost` varchar(5) NOT NULL,
  `nm_kost` varchar(50) NOT NULL,
  `alamat_kost` varchar(100) NOT NULL,
  `hewan_peliharaan` varchar(50) NOT NULL,
  `stok_kamar` int(4) NOT NULL,
  `update_terakhir` date NOT NULL,
  `jam_update` time NOT NULL,
  `kd_jenis` int(4) NOT NULL,
  `kd_adminkost` varchar(5) NOT NULL,
  `rating` int(5) NOT NULL,
  `voter` int(5) NOT NULL,
  `rate` int(5) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `latitude` float(10,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`kd_kost`, `nm_kost`, `alamat_kost`, `hewan_peliharaan`, `stok_kamar`, `update_terakhir`, `jam_update`, `kd_jenis`, `kd_adminkost`, `rating`, `voter`, `rate`, `longitude`, `latitude`) VALUES
('C001', 'Kost Cantik', 'Jalan Kuningan', 'Tidak Boleh', 2, '2016-11-24', '11:59:10', 1, 'A001', 0, 0, 0, 113.724312, -8.162110),
('C002', 'Kost Pandawa', 'Jlan Halmahera no 30 ', 'Tidak Boleh', 10, '2016-12-04', '11:59:10', 2, 'A001', 0, 0, 0, 0.000000, 0.000000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `kd_member` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `jk` char(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` char(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kd_member`, `email`, `pwd`, `no_identitas`, `nama_lengkap`, `alamat_lengkap`, `jk`, `tgl_lahir`, `no_telp`) VALUES
('B001', 'ully@gmail.com', 'ully', 'E41150635', 'ully ady', 'jalan', 'W', '2016-11-16', '0731917397'),
('B002', 'husnulhotimah006@gmail.com', 'hhhlll69', 'E41150843', 'Husnul Hotimah', 'jln.mastrip gang V no 3', 'W', '2016-12-01', '081294446313'),
('B003', 'inkost@gmail.com', 'hsnul', '998989', 'huhjbn', 'jkj', 'P', '1998-09-09', '997997997'),
('B004', 'kk@gmail.com', 'kk', '456789', 'kk', 'j', 'P', '1998-09-01', 'fhg');

-- --------------------------------------------------------

--
-- Table structure for table `online_chat`
--

CREATE TABLE IF NOT EXISTS `online_chat` (
`kd_chat` int(4) NOT NULL,
  `kd_member` varchar(5) NOT NULL,
  `kd_adminkost` varchar(5) NOT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL,
  `recd` int(10) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_chat`
--

INSERT INTO `online_chat` (`kd_chat`, `kd_member`, `kd_adminkost`, `message`, `sent`, `recd`) VALUES
(1, '', '', 'dsad', '2016-12-22 14:26:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
`kd_rekening` int(4) NOT NULL,
  `kd_kost` varchar(5) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `nomor` int(20) NOT NULL,
  `nm_bank` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE IF NOT EXISTS `saran` (
`kd_saran` int(4) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `saran` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`kd_saran`, `nama_lengkap`, `email`, `saran`) VALUES
(1, 'husnul', 'husnulhotimah006@gmail.com', 'Tampilan Menarik');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE IF NOT EXISTS `tipe_kamar` (
  `kd_kamar` int(4) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `kd_transaksi` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `kd_kost` varchar(5) NOT NULL,
  `kd_member` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `admin_kost`
--
ALTER TABLE `admin_kost`
 ADD PRIMARY KEY (`kd_adminkost`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`kd_booking`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
 ADD PRIMARY KEY (`kd_foto`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
 ADD PRIMARY KEY (`kd_jenis`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
 ADD PRIMARY KEY (`kd_kamar`);

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
 ADD PRIMARY KEY (`kd_kost`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`kd_member`);

--
-- Indexes for table `online_chat`
--
ALTER TABLE `online_chat`
 ADD PRIMARY KEY (`kd_chat`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
 ADD PRIMARY KEY (`kd_rekening`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
 ADD PRIMARY KEY (`kd_saran`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`kd_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `kd_booking` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
MODIFY `kd_foto` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
MODIFY `kd_jenis` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
MODIFY `kd_kamar` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `online_chat`
--
ALTER TABLE `online_chat`
MODIFY `kd_chat` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
MODIFY `kd_rekening` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
MODIFY `kd_saran` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
