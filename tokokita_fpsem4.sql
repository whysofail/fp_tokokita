-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 08:01 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokokita_fpsem4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` int(2) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `userName`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_kirim`
--

CREATE TABLE `tbl_biaya_kirim` (
  `idBiayaKirim` int(5) NOT NULL,
  `idKurir` int(3) NOT NULL,
  `idKotaAsal` int(4) NOT NULL,
  `idKotaTujuan` int(4) NOT NULL,
  `biaya` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biaya_kirim`
--

INSERT INTO `tbl_biaya_kirim` (`idBiayaKirim`, `idKurir`, `idKotaAsal`, `idKotaTujuan`, `biaya`) VALUES
(17, 14, 15, 14, 25000),
(18, 13, 16, 13, 76500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `idDetailOrder` int(10) NOT NULL,
  `idOrder` int(5) NOT NULL,
  `idProduk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `idFeedback` int(5) NOT NULL,
  `idKonsumen` int(5) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `namaKonsumen` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlpn` varchar(20) NOT NULL,
  `Feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`idFeedback`, `idKonsumen`, `Username`, `namaKonsumen`, `email`, `tlpn`, `Feedback`) VALUES
(1, 6, 'fajar', 'Fajar Guritna Ananto Putra', 'saffda', '081328019787', 'bagus sekali ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `idkat` int(5) NOT NULL,
  `namakat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`idkat`, `namakat`) VALUES
(51, 'Aksesoris Motor'),
(52, 'Alat dan Bahan Bangunan'),
(53, 'Frozen Food'),
(54, 'Perlengkapan Bayi dan Balita'),
(55, 'PC dan Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `idKonfirmasi` int(5) NOT NULL,
  `idOrder` int(5) NOT NULL,
  `buktiTransfer` varchar(100) NOT NULL,
  `validasi` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `idKota` int(4) NOT NULL,
  `namaKota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`idKota`, `namaKota`) VALUES
(5, 'Blitar'),
(6, 'Makasar'),
(7, 'Padang'),
(9, 'D.I Yogyakarta'),
(11, 'Pekalongan'),
(12, 'DKI Jakarta'),
(13, 'Bandar Lampung'),
(14, 'Surabaya'),
(15, 'Kediri'),
(16, 'Tulungagung');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurir`
--

CREATE TABLE `tbl_kurir` (
  `idKurir` int(2) NOT NULL,
  `namaKurir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kurir`
--

INSERT INTO `tbl_kurir` (`idKurir`, `namaKurir`) VALUES
(1, 'AnterAja'),
(2, 'JNT'),
(3, 'JNE'),
(6, 'Si Cepat'),
(7, 'Anteraja-Reguler'),
(8, 'AnterAja-Express'),
(9, 'Anteraja-Same Day'),
(10, 'JNT-Reguler'),
(11, 'JNT-Express'),
(12, 'JNT-COD'),
(13, 'JNE-Reguler'),
(14, 'JNE-Express'),
(15, 'JNE-Same Day');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `idKonsumen` int(5) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namaKonsumen` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `idKota` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlpn` int(20) NOT NULL,
  `statusAktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`idKonsumen`, `Username`, `password`, `namaKonsumen`, `alamat`, `idKota`, `email`, `tlpn`, `statusAktif`) VALUES
(1, 'fajargap4699', '12345', 'Fajar Guritna Ananto Putra', 'Ngaglik', 9, 'kojar@gmail.com', 1111111, 'Y'),
(2, 'fajar', '54321', 'GAP', 'Sleman', 9, 'fajarkojar@gmail.com', 2147483647, 'N'),
(3, 'guritna', '45321', 'Guritna Ananto Putra', 'Bendogerit', 5, 'guritna@gmail.com', 333333333, 'Y'),
(4, 'ananto', '67890', 'Ananto Putra', 'jalan mawar', 13, 'ananto@gmail.com', 44444444, 'N'),
(5, 'kojar4699', '12345', 'Fajar', 'Jogja', 9, 'kojar@gmail.com', 111111111, 'Y'),
(6, 'gurit46', '54321', 'Guritna', 'Bendogerit', 5, 'guritna@gmail.com', 324567, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `idOrder` int(5) NOT NULL,
  `idKonsumen` int(5) NOT NULL,
  `tglOrder` date NOT NULL,
  `statusOrder` enum('Belum Bayar','Dikemas','Dikirim','Diterima','Selesai','Dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`idOrder`, `idKonsumen`, `tglOrder`, `statusOrder`) VALUES
(1, 3, '2022-06-04', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `idProduk` int(5) NOT NULL,
  `idKat` int(5) NOT NULL,
  `idToko` int(5) NOT NULL,
  `namaProduk` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` float NOT NULL,
  `deskripsiProduk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`idProduk`, `idKat`, `idToko`, `namaProduk`, `foto`, `harga`, `stok`, `berat`, `deskripsiProduk`) VALUES
(10, 51, 7, 'Shockbreaker Motor The Best', 'produk1.jpg', 450000, 30, 2.5, 'Shockbreaker terbaik dengan daya redam paling tinggi di kelasnya'),
(11, 55, 9, 'Laptop ASUS', 'produk2.jpg', 3500000, 6, 3, 'Laptop ASUS peforma terbaik dengan layar sangat memanjakan mata'),
(12, 54, 11, 'Baju Bayi ', 'produk3.jpg', 120000, 15, 0.5, 'Baju bayi dengan bahan yang sangat aman untuk kulit bayi dan tidak membuat gerah'),
(13, 51, 7, 'Knalpot Scorpion', 'produk4.jpg', 5000000, 4, 4.5, 'Knalpot Racing Scorpion kualitas terbaik dengan suara yang full bass dan meningkatkan peforma motor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saldo`
--

CREATE TABLE `tbl_saldo` (
  `idSaldo` int(5) NOT NULL,
  `idToko` int(5) NOT NULL,
  `Jumlah` int(10) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toko`
--

CREATE TABLE `tbl_toko` (
  `idToko` int(5) NOT NULL,
  `idKonsumen` int(5) NOT NULL,
  `namaToko` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `statusAktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_toko`
--

INSERT INTO `tbl_toko` (`idToko`, `idKonsumen`, `namaToko`, `logo`, `deskripsi`, `statusAktif`) VALUES
(7, 6, 'Toko Sumber Baru', 'toko1.jpg', 'Toko Aksesoris Motor', 'Y'),
(8, 6, 'Toko Sinar Makmur', 'toko2.jpg', 'Toko Perlengkapan Bangunan', 'N'),
(9, 6, 'Toko Johnson\'s', 'toko3.jpg', 'Toko Perlengkapan Laptop dan PC', 'Y'),
(10, 6, 'Toko Bocil', 'toko4.jpg', 'Menjual segala jenis baso aci', 'N'),
(11, 6, 'Toko Cifa Cila', 'toko5.jpg', 'Menjual segala produk untuk bayi dan balita', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD PRIMARY KEY (`idBiayaKirim`),
  ADD KEY `idKurir` (`idKurir`),
  ADD KEY `idKotaAsal` (`idKotaAsal`),
  ADD KEY `tbl_biaya_kirim_ibfk_3` (`idKotaTujuan`);

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`idDetailOrder`),
  ADD KEY `idProduk` (`idProduk`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`idFeedback`),
  ADD KEY `idKonsumen` (`idKonsumen`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`idkat`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`idKonfirmasi`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`idKota`);

--
-- Indexes for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  ADD PRIMARY KEY (`idKurir`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`idKonsumen`),
  ADD KEY `idKota` (`idKota`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idKonsumen` (`idKonsumen`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `idToko` (`idToko`),
  ADD KEY `idKat` (`idKat`);

--
-- Indexes for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD PRIMARY KEY (`idSaldo`),
  ADD KEY `idToko` (`idToko`);

--
-- Indexes for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD PRIMARY KEY (`idToko`),
  ADD KEY `idKonsumen` (`idKonsumen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  MODIFY `idBiayaKirim` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `idDetailOrder` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `idFeedback` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `idkat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  MODIFY `idKonfirmasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `idKota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  MODIFY `idKurir` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `idKonsumen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `idOrder` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `idProduk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  MODIFY `idSaldo` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  MODIFY `idToko` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_1` FOREIGN KEY (`idKurir`) REFERENCES `tbl_kurir` (`idKurir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_2` FOREIGN KEY (`idKotaAsal`) REFERENCES `tbl_kota` (`idKota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_3` FOREIGN KEY (`idKotaTujuan`) REFERENCES `tbl_kota` (`idKota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD CONSTRAINT `tbl_detail_order_ibfk_1` FOREIGN KEY (`idProduk`) REFERENCES `tbl_produk` (`idProduk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_detail_order_ibfk_2` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `tbl_feedback_ibfk_1` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`);

--
-- Constraints for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD CONSTRAINT `tbl_konfirmasi_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD CONSTRAINT `tbl_member_ibfk_1` FOREIGN KEY (`idKota`) REFERENCES `tbl_kota` (`idKota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`idKat`) REFERENCES `tbl_kategori` (`idkat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_produk_ibfk_2` FOREIGN KEY (`idToko`) REFERENCES `tbl_toko` (`idToko`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD CONSTRAINT `tbl_saldo_ibfk_1` FOREIGN KEY (`idToko`) REFERENCES `tbl_toko` (`idToko`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD CONSTRAINT `tbl_toko_ibfk_1` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
