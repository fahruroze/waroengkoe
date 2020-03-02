-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Mar 2020 pada 06.57
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(225) NOT NULL,
  `nama_toko` varchar(225) NOT NULL,
  `moto_masak` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `nama_toko`, `moto_masak`, `image`) VALUES
(2, 'Dini Rahayu', 'Acong Cafe', 'Aku bisa belajar tentang kehidupan dari masak', 'acong1.jpg'),
(3, 'Dewi Sintia Sary', 'Acong Cafe', 'Masak Felling Good', 'acong_2.jpg'),
(4, 'Putry Sanjaya', 'Kopsis Mahasiswa', 'Masakan Sehat Badanpun Kuat', 'senja.jpg'),
(5, 'Darsitem', 'Acong Cafe', 'I want to eat', 'acong_3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email`, `full_name`, `password`, `no_hp`, `image`) VALUES
(1, 'syahruldiyono00@gmail.com', 'Syahrul Diyono ajah', '12345678', 2147483647, 'wp3417370-3d-hd-tiger-wallpapers3.jpg'),
(2, 'syahruldiyonon@gmail.com', 'diyono', '12345678', 2147483647, 'wp1936490-black-tiger-wallpapers4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `lok_toko` varchar(100) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `jml_karyawan` int(5) NOT NULL,
  `image` varchar(225) NOT NULL,
  `motto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `nama`, `lok_toko`, `nama_toko`, `jml_karyawan`, `image`, `motto`) VALUES
(1, 'Muhamad Acong Firdaus', 'Jaln.Raya Polindra No.78 Indramayu', 'Acong Cafe', 3, 'acong.jpg', '\"Mulailah dari tempatmu berada, gunakan yang kamu punya, lakukan yang kamu bisa.\"'),
(2, 'Celo 34', 'Kopsis Polindra indramayu', 'Celi Cafe oke', 5, 'mama_celi.jpg', '\"Rahasia kesuksesan adalah melakukan hal yang biasa secara tidak biasa.\"'),
(4, 'Yayah Sukiyah', 'Polindra', 'Warung Pojok', 3, 'yayah.jpg', '\"Saya ingin kaya dengan berdagang\"'),
(5, 'Senja Widayanti', 'Kopsis Polindra', 'Kopsis Mahasiswa', 4, 'ibu_senja.jpg', '\"\"dagang adalah hoby saya\"\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `kategori` varchar(225) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `detail_produk` varchar(225) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_date` date NOT NULL,
  `kode_produk` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_penjual`, `kategori`, `nama_produk`, `detail_produk`, `harga`, `gambar`, `created_by`, `created_date`, `updated_by`, `updated_date`, `kode_produk`) VALUES
(3, 4, 'minuman', 'Es Teh Manis', 'Minuman Penyegar tubuh enak.', 3000, 'IMG-20200228-WA00298.jpg', '', '0000-00-00', '', '0000-00-00', 'Pojok-1'),
(4, 1, 'makanan', 'Tumis Kacang', 'Kacang Lezat Rasa Kombinasi', 1000, 'IMG-20200228-WA0028.jpg', '', '0000-00-00', '', '0000-00-00', 'Acong-1'),
(5, 1, 'makanan', 'Beng-Beng', 'Dingin dan Biasa', 1000, 'IMG-20200228-WA0020.jpg', '', '0000-00-00', '', '0000-00-00', 'acong-2'),
(6, 5, 'minuman', 'Es Krim Kelapa', 'Minuman Segar untuk cuaca panas di indramayu', 5000, 'IMG-20200228-WA0024.jpg', '', '0000-00-00', '', '0000-00-00', 'acong-3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `rating` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `tanggal_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id_produk`, `id_penjual`, `id_pelanggan`, `rating`, `email`, `tanggal_rating`) VALUES
(8, 4, 2, NULL, 'mantap banget bang sumpah..', 'deviasuci12345@gmail.com', 1582913722),
(9, 3, 1, NULL, 'segerr mas', 'nindaulia2016@gmail.com', 1582971970);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `update_date` date NOT NULL,
  `active_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `role`, `created_by`, `created_date`, `updated_by`, `update_date`, `active_id`) VALUES
(2, 'Syahrul Diyono', 'Syahrul Diyono', '12345678', 'syahruldiyono00@gmail.com', '1', 'admin', '2020-02-08', '', '0000-00-00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `fk_produk` (`id_produk`),
  ADD KEY `fk_penjual` (`id_penjual`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `fk_penjual` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`),
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
