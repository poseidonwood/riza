-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 03:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpol`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email_admin`, `username_admin`, `password_admin`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '$2y$10$zIWqaoCr5vnLNt.e16EiuOf.GlFY.MLAu/5vz8B2pGUzOySUSPkf6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `url_buku` varchar(80) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `kategori_buku` varchar(50) NOT NULL,
  `jml_halaman` int(11) NOT NULL,
  `deskripsi_buku` text NOT NULL,
  `foto_buku` varchar(80) NOT NULL,
  `link_buku` text NOT NULL,
  `tgl_input_buku` timestamp NOT NULL DEFAULT current_timestamp(),
  `jml_bintang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `url_buku`, `judul_buku`, `penulis_buku`, `jumlah_buku`, `kategori_buku`, `jml_halaman`, `deskripsi_buku`, `foto_buku`, `link_buku`, `tgl_input_buku`, `jml_bintang`) VALUES
(1574354406, 'cinta-itu-1574354406', 'Cinta Itu', 'Penjaga Hati', 2, 'Novel', 500, 'Sebuah kejutan. Tentu saja. Wanita yang ternyata Ruben cintai, yang dikiranya masih single, ternyata sudah memiliki anak.', 'ca98e88c10573edaaf34fd0e2caf5052.jpg', 'https://drive.google.com/file/d/1-BR36-XRNyqa-vWh3Tv7fmMFQRVPkH4r/preview', '2019-11-21 08:50:17', 4),
(1574384411, 'si-juki-cari-kerja-1574384411', 'Si Juki Cari Kerja', 'Faza Meonk', 3, 'Komik', 70, 'Setelah lulus SMA, Juki adalah bocah nyentrik yang ngakunya nggak menyukai hal mainstream,memutuskan untuk langsung bekerja. Dengan keterampilan seadanya, kelakuan nyeleneh, dan teman-teman yang ajaib, Juki memulai petualangannya.', 'c212b49cef88cd6d45fab9c06bfe47cf.jpg', 'https://drive.google.com/file/d/1Ate6kQem3dSXYVFVrY9p4Z3kZ2KE2kRm/preview', '2019-11-21 08:50:17', 2),
(1574412815, 'pacarmu-belum-tentu-jodohmu-1574412815', 'Pacarmu Belum Tentu Jodohmu', 'Muhammad Syafi\'ie El-Bantanie', 1, 'Buku', 800, 'Pacaran bagi kebanyakan remaja mungkin mengasyikkan. Tapi tahukah kamu? Islam itu tidak mengenal pacaran, Bro/Sist. Karena pacaran merupakan perbuatan yang mendekati zina. Lebih banyak mudharat daripada manfaatnya.', '3384e272e06883de198ad2ed2df0b575.jpg', 'https://drive.google.com/file/d/1kZWKlmLtnOQY-7vvvzaYPIv9Wsa5KMlq/preview', '2019-11-22 08:53:35', 0),
(1574508313, 'tes-buku-1574508313', 'Tes Buku', 'Tes Penulis', 3, 'Buku', 45, 'deskripsi buku', 'cf401573c78e71de1cb82f5c9b6b6041.jpeg', 'https://drive.google.com/file/d/1zDioBz8u0aqaEa7Mw7OnEe3-GHhJCfNf/preview', '2019-11-23 11:25:14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_buku_pengembalian` int(11) NOT NULL,
  `id_user_pengembalian` int(11) NOT NULL,
  `tgl_pengembalian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `tgl_pinjam_buku` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_kembali_pinjaman` date NOT NULL,
  `id_buku_pinjaman` int(11) NOT NULL,
  `id_user_pinjaman` int(11) NOT NULL,
  `jml_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`id_pinjaman`, `tgl_pinjam_buku`, `tgl_kembali_pinjaman`, `id_buku_pinjaman`, `id_user_pinjaman`, `jml_pinjam`) VALUES
(499310869, '2022-06-28 13:09:46', '2022-07-01', 1574412815, 10, 1),
(658338202, '2022-06-28 13:09:19', '2022-07-01', 1574508313, 10, 1);

--
-- Triggers `tb_pinjaman`
--
DELIMITER $$
CREATE TRIGGER `TG_PINJAM` AFTER INSERT ON `tb_pinjaman` FOR EACH ROW BEGIN
 UPDATE tb_buku SET jumlah_buku=jumlah_buku-NEW.jml_pinjam
 WHERE id_buku=NEW.id_buku_pinjaman;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ratings`
--

CREATE TABLE `tb_ratings` (
  `id_rating` int(11) NOT NULL,
  `id_buku_rating` int(11) NOT NULL,
  `id_user_rating` int(11) NOT NULL,
  `jml_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ratings`
--

INSERT INTO `tb_ratings` (`id_rating`, `id_buku_rating`, `id_user_rating`, `jml_rating`) VALUES
(1, 1574508313, 2, 2),
(2, 1574384411, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_token`
--

CREATE TABLE `tb_token` (
  `id_token` int(11) NOT NULL,
  `email_user_token` varchar(50) NOT NULL,
  `token_user` text NOT NULL,
  `token_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_token`
--

INSERT INTO `tb_token` (`id_token`, `email_user_token`, `token_user`, `token_dibuat`) VALUES
(6, 'test@test.com', 'EV7Zw5LSH+bOCwxQxydmrS8VXv1Un4HE1obOQobZINQ=', 1656420402),
(7, 'test@test.com', 'MseFZQJg+VO4ZWJZPww4xRxhpA/WvvGTmMRrn//792g=', 1656421199),
(8, 'rizaap.96@gmail.com', '6FKsi2iPVekCTGpnDYj5apqcSh/k7P1/XW/gvSEVDzA=', 1656421714);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `akun_dibuat` int(11) NOT NULL,
  `status_user` int(11) NOT NULL,
  `foto_profil` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `email_user`, `password_user`, `akun_dibuat`, `status_user`, `foto_profil`) VALUES
(2, 'Firman', 'firman@gmail.com', 'c7d97949ae782167ace4b1a799753480', 1574432689, 1, '7b23187e7f44f20bde26d24c4c34e7b4.png'),
(9, 'Test', 'test@test.com', '$2y$10$6qOL/yQ4SkvuDIY0Gc0WZ.A9qr00KXCQCmxOhdfzMtkcQ99AARhhy', 1656421199, 1, 'avatar5.png'),
(10, 'Riza Apriansyah', 'rizaap.96@gmail.com', '$2y$10$I27nKV.cSVrE7tTcMruFEexRygu0WSDq/IHZNvVkZP3PMYzBKgt4q', 1656421714, 1, 'avatar5.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `tb_ratings`
--
ALTER TABLE `tb_ratings`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ratings`
--
ALTER TABLE `tb_ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
