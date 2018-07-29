-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 22 Des 2016 pada 09.04
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `inkost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `kd_kost` varchar(5) NOT NULL,
  `fasilitas_kamar` varchar(50) NOT NULL,
  `fasilitas_umum` varchar(100) NOT NULL,
  `akses_lingkungan` varchar(100) NOT NULL,
  `kamar_mandi` varchar(20) NOT NULL,
  `parkir` varchar(20) NOT NULL,
  `keterangan_lain` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`kd_kost`, `fasilitas_kamar`, `fasilitas_umum`, `akses_lingkungan`, `kamar_mandi`, `parkir`, `keterangan_lain`) VALUES
('B01', 'meja belajar', 'mesin cuci', 'mini market', 'kamar mandi dalam', 'motor', 'tidak boleh keluar lebih dari jam 9 malam');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
