-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 03:44 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luqefoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `user_admin` varchar(32) NOT NULL,
  `pass_admin` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `level` varchar(32) NOT NULL,
  `foto` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `user_admin`, `pass_admin`, `nama`, `level`, `foto`) VALUES
(1, 'admin', 'admin', 'Apri', '1', '0d5e159404933b4185268a4d13c574ee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bukti`
--

CREATE TABLE `tbl_bukti` (
  `id_bukti` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bukti`
--

INSERT INTO `tbl_bukti` (`id_bukti`, `id_pesan`, `file`) VALUES
(1, 3, 'Capture.PNG'),
(2, 4, 'Contoh screenshot kompetisi 2.JPG'),
(3, 5, 'webinar1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galery`
--

CREATE TABLE `tbl_galery` (
  `id_galery` int(50) NOT NULL,
  `id_konten` int(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_galery`
--

INSERT INTO `tbl_galery` (`id_galery`, `id_konten`, `image`) VALUES
(1, 1, 'pexels-kha-ruxury-2369530.jpg'),
(2, 1, 'pexels-kha-ruxury-2369530.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_header`
--

CREATE TABLE `tbl_header` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `image` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_header`
--

INSERT INTO `tbl_header` (`id`, `nama`, `image`) VALUES
(1, 'Wedding', 'Wedding.jpg'),
(2, 'akad nikah', 'Akad_nikah.jpg'),
(3, 'Buku Tahunan', 'Buku_tahunan.jpg'),
(4, 'Pemberkatan', 'Pemberkatan.jpg'),
(5, 'hello', 'hello.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konten`
--

CREATE TABLE `tbl_konten` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_konten`
--

INSERT INTO `tbl_konten` (`id`, `nama`, `konten`, `gambar`) VALUES
(1, 'Foto Pernikahan', '<p>foto Pernikahan Clasic</p>', 'pexels-kha-ruxury-2369530.jpg'),
(2, 'sasas', '<p><strong>sasassasas</strong></p>\r\n<p><strong>sasasasa</strong></p>', 'Faqih Project.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `ket_paket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `nama_paket`, `harga_paket`, `ket_paket`) VALUES
(1, 'Prewedding VIP', 500000, '<p><span style=\"color: #ffcc00;\">Foto Preeweding + Studio VVIP + Property Pemotretan + Wardrobe</span></p>'),
(2, 'Kelulusan Wisuda', 350000, '<p><span style=\"color: #ffcc00;\">Foto Wisuda + Studio VIP + Property + Cetak Bingkai</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_tour` date NOT NULL,
  `status` char(2) NOT NULL DEFAULT 'S1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id_pesan`, `id_user`, `id_paket`, `tgl_pesan`, `tgl_tour`, `status`) VALUES
(1, 1, 1, '2022-12-20', '2022-12-31', 'S2'),
(2, 1, 1, '2022-12-21', '2022-12-31', 'S2'),
(3, 1, 2, '2022-12-24', '2022-12-28', 'S2'),
(4, 1, 2, '2022-12-25', '2022-12-30', 'S1'),
(5, 1, 2, '2022-12-25', '2022-12-31', 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jekel` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `nama_rek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `foto`, `nama_user`, `email_user`, `no_hp`, `no_rek`, `username`, `password`, `tgl_lahir`, `jekel`, `alamat`, `nama_rek`) VALUES
(1, 'betawi.png', 'Ahmad Faqih Arifin', 'faqih@mail.com', '082182771538', '9021227291271', 'faqih', '1', '1999-11-18', 'L', 'Jl. Bekasi', 'AHMAD FAQIH ARIFIN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `judul`, `url`, `image`) VALUES
(1, 'Agra & Dimas', 'https://www.youtube.com/watch?v=pYEyZw35PyE', 'agra-dimas.jpg'),
(2, 'Maya & Latief', 'https://www.youtube.com/watch?v=ItpoxBsaDAE', 'maya-latief.jpg'),
(3, 'Apri & Dina', 'https://www.youtube.com/watch?v=ItpoxBsaDAE', 'maya-latief.jpg'),
(4, 'AAAAAA', 'https://www.youtube.com/watch?v=ItpoxBsaDAE', 'maya-latief.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD PRIMARY KEY (`id_bukti`);

--
-- Indexes for table `tbl_galery`
--
ALTER TABLE `tbl_galery`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indexes for table `tbl_header`
--
ALTER TABLE `tbl_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_konten`
--
ALTER TABLE `tbl_konten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_galery`
--
ALTER TABLE `tbl_galery`
  MODIFY `id_galery` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_header`
--
ALTER TABLE `tbl_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_konten`
--
ALTER TABLE `tbl_konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
