-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 27. Desember 2016 jam 17:46
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inkost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `kd_admin` varchar(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`kd_admin`, `username`, `pwd`) VALUES
('1', 'Husnul', 'admin'),
('2', 'ullyady', '12345'),
('', 'cahyana', 'cahyana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_kost`
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
  `telp` char(12) NOT NULL,
  PRIMARY KEY (`kd_adminkost`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_kost`
--

INSERT INTO `admin_kost` (`kd_adminkost`, `email`, `pwd`, `nik`, `nama_lengkap`, `alamat_lengkap`, `tgl_lahir`, `jk`, `telp`) VALUES
('A001', 'husnulhotimah006@gmail.com', 'husnul', 'E41150843', 'Husnul Hotimah', 'Jalan Mastrip gang 5 no 3', '1998-09-06', 'W', '081294446313'),
('A002', 'lala@gmail.com', 'lala', '757', 'lala', 'lala', '1990-02-12', 'P', '8080');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses_lingkungan`
--

CREATE TABLE IF NOT EXISTS `akses_lingkungan` (
  `kd_kost` varchar(4) NOT NULL,
  `akses_lingkungan` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `statuslingk` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses_lingkungan`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `kd_booking` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `kd_kost` varchar(5) NOT NULL,
  `kd_member` varchar(5) NOT NULL,
  PRIMARY KEY (`kd_booking`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`kd_booking`, `tanggal`, `jam`, `kd_kost`, `kd_member`) VALUES
('D001', '2016-12-27', '04:09:11', 'C001', 'B001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `kd_kost` varchar(5) NOT NULL,
  `fasilitas` varchar(50) NOT NULL,
  `titlefac` varchar(50) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_kamar`
--

CREATE TABLE IF NOT EXISTS `fasilitas_kamar` (
  `kd_kamar` int(4) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas_kamar`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `kd_foto` int(4) NOT NULL AUTO_INCREMENT,
  `kd_kost` varchar(5) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `foto3` varchar(100) NOT NULL,
  `foto4` varchar(100) NOT NULL,
  `foto5` varchar(100) NOT NULL,
  `foto6` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`kd_foto`, `kd_kost`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`) VALUES
(1, 'C001', 'CTEAM.png', '1.png', '2.png', '3.png', '4.png', ''),
(2, 'C002', '1.png', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `kd_jenis` int(4) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(10) NOT NULL,
  PRIMARY KEY (`kd_jenis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`kd_jenis`, `jenis`) VALUES
(1, 'Putra'),
(2, 'Putri'),
(3, 'Bebas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `kd_kamar` int(4) NOT NULL AUTO_INCREMENT,
  `kd_kost` varchar(5) NOT NULL,
  `kd_tipe` int(5) NOT NULL,
  `harga_harian` int(6) NOT NULL,
  `harga_bulanan` int(7) NOT NULL,
  `harga_tahun` int(10) NOT NULL,
  `luas_kamar` varchar(50) NOT NULL,
  `fasilitas_kamar` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_kamar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`kd_kamar`, `kd_kost`, `kd_tipe`, `harga_harian`, `harga_bulanan`, `harga_tahun`, `luas_kamar`, `fasilitas_kamar`) VALUES
(1, 'C001', 1, 400003093, 87777878, 77, '4 x 4', 'shower'),
(2, 'C002', 2, 30000, 450000, 23000000, '4x6', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kost`
--

CREATE TABLE IF NOT EXISTS `kost` (
  `kd_kost` varchar(5) NOT NULL,
  `nm_kost` varchar(50) NOT NULL,
  `alamat_kost` varchar(100) NOT NULL,
  `hewan_peliharaan` varchar(20) NOT NULL,
  `stok_kamar` int(4) NOT NULL,
  `update_terakhir` date NOT NULL,
  `jam_update` time NOT NULL,
  `kd_jenis` int(4) NOT NULL,
  `kd_adminkost` varchar(5) NOT NULL,
  `fasilitas` varchar(200) NOT NULL,
  `akses_lingkungan` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `rating` int(5) NOT NULL,
  `voter` int(5) NOT NULL,
  `rate` int(5) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  PRIMARY KEY (`kd_kost`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kost`
--

INSERT INTO `kost` (`kd_kost`, `nm_kost`, `alamat_kost`, `hewan_peliharaan`, `stok_kamar`, `update_terakhir`, `jam_update`, `kd_jenis`, `kd_adminkost`, `fasilitas`, `akses_lingkungan`, `foto`, `rating`, `voter`, `rate`, `longitude`, `latitude`) VALUES
('C001', 'Kost Cantik', 'Jalan Kuningan', 'Tidak Boleh', 2, '2016-12-27', '11:50:57', 1, 'A001', 'kamar mandi, kasur, setrika, kompor gas 2, kulkas', 'laundry, alfamart, cuci motor', '605_3.jpg', 38, 11, 3, 113.724312, -8.162110);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
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
  `no_telp` char(12) NOT NULL,
  PRIMARY KEY (`kd_member`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`kd_member`, `email`, `pwd`, `no_identitas`, `nama_lengkap`, `alamat_lengkap`, `jk`, `tgl_lahir`, `no_telp`) VALUES
('B001', 'ully@gmail.com', 'ully', 'E41150635', 'ully ady', 'jalan', 'W', '2016-11-16', '0731917397'),
('B002', 'husnulhotimah006@gmail.com', 'hhhlll69', 'E41150843', 'Husnul Hotimah', 'jln.mastrip gang V no 3', 'W', '2016-12-01', '081294446313'),
('B003', 'inkost@gmail.com', 'hsnul', '998989', 'huhjbn', 'jkj', 'P', '1998-09-09', '997997997'),
('B004', 'kk@gmail.com', 'kk', '456789', 'kk', 'j', 'P', '1998-09-01', 'fhg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `online_chat`
--

CREATE TABLE IF NOT EXISTS `online_chat` (
  `kd_chat` int(4) NOT NULL AUTO_INCREMENT,
  `kd_member` varchar(5) NOT NULL,
  `kd_kost` varchar(5) NOT NULL,
  `chat` varchar(200) NOT NULL,
  PRIMARY KEY (`kd_chat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `online_chat`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `peta`
--

CREATE TABLE IF NOT EXISTS `peta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kost` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `peta`
--

INSERT INTO `peta` (`id`, `nama_kost`, `alamat`, `latitude`, `longitude`) VALUES
(1, 'Kost Murah', 'Jalan Mastrib 4 No.3, Tegal Gede Sumbersari, Jember 68124', '-8.16211', '113.724315'),
(2, 'Kost Arjuna', 'Jalan Mastrib 4 No.88, Tegal GEde Sumbersari, jember 68124', '-8.1619386', '113.724368'),
(3, 'Kost Hj sukri', 'Jl. Mastrib 4 No. 90, Tegal Gede Sumbersari, Jember 68124', '-8.161711', '113.723912'),
(4, 'Kost Melati', 'Jl. Mastrib 4 No.5, Tegal Gede Sumbersari,Jember 68124', '-8.162101', '113.724578'),
(5, 'Kost Sakinah', 'Jl. Mastrib 4 No.6, Tegal Gede Sumbersari,Jember 68124', '-8.1618101', '113.7241029'),
(6, 'Kost Bima', 'Jl. Mastrib 4 No.8, Tegal Gede Sumbersari,Jember 68124', '-8.161807', '113.724795'),
(7, 'kost Ani', 'Jl. Mastrib Timur No.88', '-8.163516', '113.723515'),
(8, 'Kost Cantik', 'Jl. Mastrib gang 5 No.40', '-8.163275', '113.724824'),
(9, 'Kost Kalimantan 3', 'Jalan Kalimantan Gang 3 No.57', '-8.158753', '113.713677'),
(10, 'Kost kalimantan 10', 'Jl. kalimantan 10 No.45', '-8.163768', '113.7123376');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
  `kd_rekening` int(4) NOT NULL AUTO_INCREMENT,
  `kd_kost` varchar(5) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `nomor` int(20) NOT NULL,
  `nm_bank` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_rekening`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`kd_rekening`, `kd_kost`, `atas_nama`, `nomor`, `nm_bank`) VALUES
(1, 'C001', 'husnul yang s', 2147483647, 'BRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE IF NOT EXISTS `saran` (
  `kd_saran` int(4) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `saran` varchar(200) NOT NULL,
  PRIMARY KEY (`kd_saran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `saran`
--

INSERT INTO `saran` (`kd_saran`, `nama_lengkap`, `email`, `saran`) VALUES
(1, 'husnul', 'husnulhotimah006@gmail.com', 'Tampilan Menarik'),
(7, 'h', 'husnulhotimah006@gmail.com', 'ghvbnm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe`
--

CREATE TABLE IF NOT EXISTS `tipe` (
  `kd_tipe` int(4) NOT NULL AUTO_INCREMENT,
  `tipe_kamar` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_tipe`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tipe`
--

INSERT INTO `tipe` (`kd_tipe`, `tipe_kamar`) VALUES
(1, '1 Orang'),
(2, '2 Orang'),
(3, '< 2 Orang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kamar`
--

CREATE TABLE IF NOT EXISTS `tipe_kamar` (
  `kd_kamar` int(4) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `titlekam` varchar(40) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_kamar`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `kd_transaksi` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `kd_kost` varchar(5) NOT NULL,
  `kd_member` varchar(5) NOT NULL,
  PRIMARY KEY (`kd_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
