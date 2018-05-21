-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for koperasi
CREATE DATABASE IF NOT EXISTS `koperasi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `koperasi`;


-- Dumping structure for table koperasi.anggota
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `gender` enum('Pria','Wanita') DEFAULT NULL,
  `alamat` text,
  `email` varchar(26) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table koperasi.anggota: ~7 rows (approximately)
DELETE FROM `anggota`;
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` (`id_anggota`, `nama`, `no_hp`, `gender`, `alamat`, `email`, `password`) VALUES
	('P001', 'Panji Fadilah', '08123456780', 'Pria', 'Jl. Cikampek VII No.1 Kelurahan Antapani Tengah Kecamatan Antapani Kota Bandung', 'panjifadilah@gmail.com', 'admin'),
	('P002', 'Dhea Imut', '087718938581', 'Wanita', 'Jl. Cikampek VII No.1 Kelurahan Antapani Tengahklk Kecamatan Antapani Kota Bandung', 'ksjdkdj', 'ksdj'),
	('P003', 'Ijal Kijul', '098098', 'Pria', 'Jl. Cikampek VII No.1 Kelurahan Antapani Tengah Kecamatan Antapani Kota Bandung jdhjdh kkh ksjkdjks ksjksdjksjkd', 'kjhkjh', 'kjhj'),
	('P004', 'Debi Dwitama Yusup', '098098', 'Pria', 'Jl. Cikampek VII No.1 Kelurahan Antapani Tengah Kecamatan Antapani Kota Bandung', 'debidwitamayusup@gmail.com', 'lkhdlkdh'),
	('P005', 'Dixy Abdurrahman Saleh jshdkjsh', 'kjhdkjhd', 'Pria', 'Jl. Cikampek VII No.1 Kelurahan Antapani Tengah Kecamatan Antapani Kota Bandung', 'ldjhldkjh', 'jkdhdlkj'),
	('P006', 'Luthfi Darmawan ', 'kjddkj', 'Pria', 'Jl. Cikampek VII No.1 Kelurahan Antapani Tengah Kecamatan Antapani Kota Bandung', 'kjdhdk', 'kjhdkj'),
	('S001', 'Rakha Albarra Sidiq', '087718938581', 'Pria', 'Jl. Cikampek VII No.1 Kelurahan Antapani Tengah Kecamatan Antapani Kota Bandung', 'rakha', 'admin'),
	('usr001', 'Helmi Marliawati', '087718938581', 'Wanita', 'Jl. SItulengkong no.1 Kelurahan Cijagra Kecamatan Lengkong Kota Bandung', 'justkimiw@gmail.com', 'Platyhelminthes03');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;


-- Dumping structure for table koperasi.dashboard
CREATE TABLE IF NOT EXISTS `dashboard` (
  `id_dashboard` varchar(10) NOT NULL,
  `id_pengguna` varchar(10) DEFAULT NULL,
  `id_pembayaran` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_dashboard`),
  KEY `FK_dasboard_pengguna` (`id_pengguna`),
  KEY `FK_dasboard_pembayaran` (`id_pembayaran`),
  CONSTRAINT `FK_dasboard_pembayaran` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`),
  CONSTRAINT `FK_dasboard_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `anggota` (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table koperasi.dashboard: ~0 rows (approximately)
DELETE FROM `dashboard`;
/*!40000 ALTER TABLE `dashboard` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard` ENABLE KEYS */;


-- Dumping structure for table koperasi.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` varchar(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `id_pengurus` varchar(6) NOT NULL,
  `jenis` varchar(8) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nominal` double DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_pengurus` (`id_pengurus`),
  CONSTRAINT `FK_pembayaran_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  CONSTRAINT `FK_pembayaran_pengurus` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table koperasi.pembayaran: ~0 rows (approximately)
DELETE FROM `pembayaran`;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` (`id_pembayaran`, `id_anggota`, `id_pengurus`, `jenis`, `status`, `tanggal`, `nominal`) VALUES
	('pmb001', 'P004', 'st001', 'Wajib', 'Tunai', '2018-05-21 22:13:43', 100000),
	('pmb002', 'usr001', 'st001', 'Sukarela', 'Transfer', '2018-05-21 22:15:20', 50000);
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;


-- Dumping structure for table koperasi.pengurus
CREATE TABLE IF NOT EXISTS `pengurus` (
  `id_pengurus` varchar(6) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `noHP` varchar(13) DEFAULT NULL,
  `gender` enum('Pria','Wanita') DEFAULT NULL,
  `alamat` text,
  `jabatan` varchar(20) DEFAULT NULL,
  `email` varchar(26) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_pengurus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table koperasi.pengurus: ~1 rows (approximately)
DELETE FROM `pengurus`;
/*!40000 ALTER TABLE `pengurus` DISABLE KEYS */;
INSERT INTO `pengurus` (`id_pengurus`, `nama`, `noHP`, `gender`, `alamat`, `jabatan`, `email`, `password`) VALUES
	('st001', 'Nurun Ala Nurin', '087718938581', 'Wanita', 'Jelekong', 'Bendahara', 'polin@gmail.com', 'polinpolinumat');
/*!40000 ALTER TABLE `pengurus` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
