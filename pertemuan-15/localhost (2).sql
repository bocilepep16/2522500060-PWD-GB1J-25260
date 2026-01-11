-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2026 at 03:58 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--
CREATE DATABASE IF NOT EXISTS `db_pwd2025` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_pwd2025`;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `hobi` varchar(50) DEFAULT NULL,
  `pasangan` varchar(30) DEFAULT NULL,
  `pekerjaan` varchar(25) DEFAULT NULL,
  `nama_orangtua` varchar(50) DEFAULT NULL,
  `nama_kakak` varchar(30) DEFAULT NULL,
  `nama_adik` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `hobi`, `pasangan`, `pekerjaan`, `nama_orangtua`, `nama_kakak`, `nama_adik`) VALUES
('2522500060', 'catherine audreylia', 'pangkalpinang', '2026-01-21', 'Memasak', 'kucing', 'Mahasiswa', 'Budi Gunawan', 'Gunawan', 'Budi utama'),
('2522500068', 'christian ronaldo', 'pangkalpinang', '2026-01-01', 'sepeda', 'Tidak ada', 'pelajar', 'adi dan sukma', 'sulaiman', 'Budi utama');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `cid` int(11) NOT NULL,
  `cnama` varchar(100) DEFAULT NULL,
  `cemail` varchar(100) DEFAULT NULL,
  `cpesan` text,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`cid`, `cnama`, `cemail`, `cpesan`, `dcreated_at`) VALUES
(1, 'Yohanes Setiawan Japriadi', 'ysetiawanj@atmaluhur.ac.id', 'Ayo yang teliti belajar pemrograman web dasarnya, jangan membiasakan typo', '2025-12-16 11:00:25'),
(2, 'Gracella Edrea Japriadi', 'cellajapriadi@gmail.com', 'ayo kakak-kakak yang semangat belajarnya', '2025-12-16 11:00:25'),
(3, 'Wulan Dari Belinyu', 'wulanbly@gmail.com', 'aku pasti menang', '2025-12-16 11:00:25'),
(4, 'Melvyn Hadi Santo M.Kom.', 'hadi.melvyn@gmail.com', 'Maju tak gentar membela yang benar, pendaftaran selalu di awal, tetapi penyesalan selalu di akhir', '2025-12-16 11:00:25'),
(5, 'Nabila Saskia Gotik', 'nabila@gotik.com', 'Adit rambut bagus banget, dikuncir lagi', '2025-12-16 11:00:25'),
(6, 'Redia Cakep', 'redia@cakep.com', 'walau hujan aku tetap semangat', '2025-12-16 11:00:25'),
(7, 'Junaidi Hadiwijaya', 'juned@gmail.com', 'Saya mau jadi dosen di atma luhur', '2025-12-16 11:00:25'),
(8, 'Nurfadilah', 'nur@cantil.ocm', 'Nur kadang-kadang berdansa', '2025-12-16 11:00:25'),
(9, 'Adit Ganteng Banget', 'adit@goku.com', 'Adit mirip son goku sebelum gunting rambut', '2025-12-16 11:00:25'),
(10, 'aidil ganteng', 'aidil@dr.semabgun', ' kayak bule dari eropa', '2025-12-16 11:00:25'),
(11, 'Cat diony', 'catdiony@gmail.com', 'diony hari ini tampak bersinar teramg', '2025-12-16 11:00:25'),
(12, 'Fransiska Meily Lolowang', 'meilylolowang@gmail.com', 'Selamat natal dan tahun baru', '2025-12-16 11:00:25'),
(13, 'Ari Amir Alkodri (AAA)', 'aaabat@gmail.com', 'apakah berhasil coba timestamp hore', '2025-12-16 11:00:52'),
(14, 'Alkautsar Ganteng', 'algibahbanget@gmail.com', 'Frans bersama alkautsar berteman bersama bersaudara, pilihlah kami', '2025-12-17 10:44:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
