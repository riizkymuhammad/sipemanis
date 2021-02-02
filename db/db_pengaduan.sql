-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2020 pada 17.58
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_user`
--

CREATE TABLE `tbl_data_user` (
  `id_data_user` int(10) NOT NULL,
  `no_ktp` varchar(30) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` text DEFAULT NULL,
  `kontak` varchar(14) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Email Institusi'),
(3, 'Jaringan kampus'),
(5, 'Website Institusi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_notif`
--

CREATE TABLE `tbl_notif` (
  `id_notif` int(10) NOT NULL,
  `pengirim` int(10) DEFAULT NULL,
  `penerima` int(10) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `id_pengaduan` int(10) DEFAULT NULL,
  `tgl_notif` datetime DEFAULT NULL,
  `baca_notif` text DEFAULT NULL,
  `hapus_notif` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_notif`
--

INSERT INTO `tbl_notif` (`id_notif`, `pengirim`, `penerima`, `pesan`, `link`, `id_pengaduan`, `tgl_notif`, `baca_notif`, `hapus_notif`) VALUES
(1, 17702, 17699, 'Mengirim Pengaduan baru', 'pengaduan/v/d/G7', 19, '2020-10-08 10:02:27', NULL, '17699, '),
(2, 1, 17702, 'Pengaduan dikonfirmasi', 'pengaduan/v/d/G7', 19, '2020-10-08 10:02:27', NULL, '17702, '),
(3, 5, 1, 'Mengirim Pengaduan baru', 'pengaduan/v/d/KR', 21, '2020-10-08 14:05:39', NULL, '1, '),
(4, 17702, 1, 'Mengirim Pengaduan baru', 'pengaduan/v/d/Lw', 22, '2020-10-08 14:07:29', NULL, '1, '),
(5, 17704, 1, 'Mengirim Pengaduan baru', 'pengaduan/v/d/MA', 23, '2020-10-08 23:40:29', NULL, '1, '),
(6, 1, 17699, 'Mengirim Pengaduan baru', 'pengaduan/v/d/MA', 23, '2020-10-08 23:45:43', NULL, '17699, '),
(7, 1, 17704, 'Pengaduan dikonfirmasi', 'pengaduan/v/d/MA', 23, '2020-10-08 23:45:43', NULL, NULL),
(8, 17699, 17704, 'Pengaduan Selesai', 'pengaduan/v/d/MA', 23, '2020-10-08 23:46:56', NULL, NULL),
(9, 16638, 1, 'Mengirim Pengaduan baru', 'pengaduan/v/d/N6', 24, '2020-10-08 23:51:02', NULL, '1, '),
(10, 16638, 1, 'Mengirim Pengaduan baru', 'pengaduan/v/d/Op', 25, '2020-10-09 12:54:48', NULL, '1, '),
(11, 1, 17703, 'Mengirim Pengaduan baru', 'pengaduan/v/d/Op', 25, '2020-10-09 12:55:43', NULL, '17703, '),
(12, 1, 16638, 'Pengaduan dikonfirmasi', 'pengaduan/v/d/Op', 25, '2020-10-09 12:55:43', NULL, '16638, '),
(13, 17703, 16638, 'Pengaduan Selesai', 'pengaduan/v/d/Op', 25, '2020-10-09 12:57:15', NULL, '16638, '),
(14, 262, 1, 'Mengirim Pengaduan baru', 'pengaduan/v/d/Pw', 26, '2020-10-11 21:08:36', NULL, '1, '),
(15, 1, 17703, 'Mengirim Pengaduan baru', 'pengaduan/v/d/Pw', 26, '2020-10-11 21:09:50', NULL, NULL),
(16, 1, 262, 'Pengaduan dikonfirmasi', 'pengaduan/v/d/Pw', 26, '2020-10-11 21:09:50', NULL, NULL),
(17, 17703, 262, 'Pengaduan Selesai', 'pengaduan/v/d/Pw', 26, '2020-10-11 21:10:48', NULL, NULL),
(18, 1, 17703, 'Mengirim Pengaduan baru', 'pengaduan/v/d/N6', 24, '2020-10-12 10:17:22', NULL, NULL),
(19, 1, 16638, 'Pengaduan dikonfirmasi', 'pengaduan/v/d/N6', 24, '2020-10-12 10:17:22', NULL, NULL),
(20, 17703, 16638, 'Pengaduan Selesai', 'pengaduan/v/d/N6', 24, '2020-10-12 10:19:01', NULL, NULL),
(21, 262, 1, 'Mengirim Pengaduan baru', 'pengaduan/v/d/Ql', 27, '2020-10-12 15:16:18', NULL, '1, ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id_pengaduan` int(10) NOT NULL,
  `id_kategori` int(10) DEFAULT NULL,
  `id_sub_kategori` int(10) DEFAULT NULL,
  `isi_pengaduan` text DEFAULT NULL,
  `ket_pengaduan` text DEFAULT NULL,
  `bukti` text DEFAULT NULL,
  `user` int(10) DEFAULT NULL,
  `status` enum('proses','konfirmasi','selesai') DEFAULT NULL,
  `petugas` int(11) DEFAULT NULL,
  `pesan_petugas` text DEFAULT NULL,
  `file_petugas` text DEFAULT NULL,
  `tgl_pengaduan` datetime DEFAULT NULL,
  `tgl_konfirmasi` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id_pengaduan`, `id_kategori`, `id_sub_kategori`, `isi_pengaduan`, `ket_pengaduan`, `bukti`, `user`, `status`, `petugas`, `pesan_petugas`, `file_petugas`, `tgl_pengaduan`, `tgl_konfirmasi`, `tgl_selesai`) VALUES
(4, 2, 2, 'oh ya', 'okelah', 'file/default.jpg', 5, 'selesai', 6, 'ok selesai', NULL, '2019-02-13 11:10:59', '2019-02-13 13:50:28', '2020-09-16 15:14:49'),
(9, 2, 2, 'ayo', 'oke', 'file/anwarsptr.jpg', 9, 'selesai', 6, 'hehei', NULL, '2019-02-14 13:03:59', '2019-02-14 13:04:14', '2019-02-14 13:05:38'),
(10, 2, 2, 'tidak ada wifi gratis di taman', 'mana woi wifi aku', 'file/paperclip-attach-symbol.png', 5, 'konfirmasi', 6, NULL, NULL, '2020-09-16 15:21:57', NULL, NULL),
(11, 2, 2, 'kantor kotor', 'kantor kotor mohon di bersihkan', 'file/478173764.jpg', 9, 'selesai', 0, 'ok om aman', 'file/0_dd03a_fdacee66_XL.png', '2020-10-06 14:12:16', '2020-10-06 15:14:43', '2020-10-07 11:30:09'),
(12, 2, 2, 'wifi', 'wifi lelet', 'file/0_dd03a_fdacee66_XL.png', 17702, 'konfirmasi', 17703, NULL, 'file/pp.jpeg', '2020-10-06 15:17:48', '2020-10-07 11:04:53', NULL),
(13, 3, 3, 'reset password email', 'email saya tidak bisa di buka min ', 'file/0lLgWc6.jpg', 17702, 'proses', NULL, NULL, NULL, '2020-10-07 11:43:37', NULL, NULL),
(23, 3, 3, 'coba reset email', 'myown', 'file/0lLgWc64.jpg', 17704, 'selesai', 17699, 'ok', 'file/0_dd03a_fdacee66_XL2.png', '2020-10-08 23:40:29', '2020-10-08 23:45:43', '2020-10-08 23:46:56'),
(21, 3, 3, 'ganti email', 'ganti email', 'file/7cd1ca98bfce30f428f730df66835122.jpg', 17702, 'proses', NULL, NULL, NULL, '2020-10-08 14:05:39', NULL, NULL),
(18, 2, 2, 'wifi', 'wifi', 'file/1-42.png', 17702, 'konfirmasi', 17703, NULL, NULL, '2020-10-08 00:32:37', '2020-10-08 00:34:30', NULL),
(19, 2, 2, 'sering mati lampu', 'sering mati lampu', 'file/0b36c16c1055ea7ca6786917df1bb396.png', 17702, 'konfirmasi', 17699, NULL, NULL, '2020-10-08 09:19:22', '2020-10-08 10:02:27', NULL),
(20, 3, 3, 'lagi jomblo', 'lagi jomblo', 'file/1-43.png', 17702, 'selesai', 17703, 'aman', 'file/0lLgWc62.jpg', '2020-10-08 09:21:43', '2020-10-08 09:26:24', '2020-10-08 09:27:01'),
(24, 2, 2, 'bantuan quota', 'coba kami di subsidi kuota internet', 'file/0_dd03a_fdacee66_XL3.png', 16638, 'selesai', 17703, 'password:', NULL, '2020-10-08 23:51:02', '2020-10-12 10:17:22', '2020-10-12 10:19:01'),
(25, 3, 3, 'reset om', 'reset om', 'file/0_dd03a_fdacee66_XL4.png', 16638, 'selesai', 17703, 'ok', 'file/1-44.png', '2020-10-09 12:54:48', '2020-10-09 12:55:43', '2020-10-09 12:57:15'),
(27, 2, 2, 'lupa password email ', 'pak tolong reset email institusi saya jihananandaputra@umrah.ac.id', 'file/CEGAH_COVID.jpg', 262, 'proses', NULL, NULL, NULL, '2020-10-12 15:16:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(10) NOT NULL,
  `nama` text DEFAULT NULL,
  `jk` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama`, `jk`, `alamat`, `no_telp`, `email`, `id_user`) VALUES
(4, 'wingky Firnando', 'Laki-Laki', 'Tanjungpinang', '082388191440', 'w.firnando@umrah.ac.id', 17699),
(13, 'solekhan123', 'Laki-Laki', 'Tanjungpinang', '082242814542', 'solekhan@umrah.ac.id', 17703),
(14, 'Muhammad Naufal, S.T.', 'Laki-Laki', 'Kijang,Bintan Timur,Bintan', '082268650497', 'mnaufal555@umrah.ac.id', 17705),
(15, 'Adi Pranadipa', 'Laki-Laki', 'TanjungPinang', '082169022887', 'dipa@umrah.ac.id', 17706);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_slide`
--

CREATE TABLE `tbl_slide` (
  `id_slide` int(10) NOT NULL,
  `foto_slide` text DEFAULT NULL,
  `ket_slide` text DEFAULT NULL,
  `tgl_slide` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_slide`
--

INSERT INTO `tbl_slide` (`id_slide`, `foto_slide`, `ket_slide`, `tgl_slide`) VALUES
(6, 'img/slide/CEGAH_COVID.jpg', 'Slide 3 covid', '2020-09-23 10:38:29'),
(7, 'img/slide/jenis_layanan.jpg', 'slide 2', '2020-09-23 10:39:32'),
(9, 'img/slide/flow_laporan.jpg', 'slide 1', '2020-10-12 09:11:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_kategori`
--

CREATE TABLE `tbl_sub_kategori` (
  `id_sub_kategori` int(10) NOT NULL,
  `id_kategori` int(10) DEFAULT NULL,
  `nama_sub_kategori` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sub_kategori`
--

INSERT INTO `tbl_sub_kategori` (`id_sub_kategori`, `id_kategori`, `nama_sub_kategori`) VALUES
(2, 2, 'Reset Password Email Universitas'),
(3, 3, 'Reset Password User WIFI'),
(4, 5, 'laman web error'),
(5, 3, 'Sambungan Internet Mati'),
(6, 3, 'Sambungan Jaringan LAN bermasalah'),
(7, 5, 'Reset Password login Website Institusi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL,
  `aktif` enum('0','1') DEFAULT NULL,
  `dihapus` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web`
--

CREATE TABLE `tbl_web` (
  `id_web` int(10) NOT NULL,
  `nama_web` text DEFAULT NULL,
  `ket_web` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_web`
--

INSERT INTO `tbl_web` (`id_web`, `nama_web`, `ket_web`) VALUES
(1, 'PENGADUAN', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_data_user`
--
ALTER TABLE `tbl_data_user`
  ADD PRIMARY KEY (`id_data_user`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_notif`
--
ALTER TABLE `tbl_notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indeks untuk tabel `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tbl_slide`
--
ALTER TABLE `tbl_slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indeks untuk tabel `tbl_sub_kategori`
--
ALTER TABLE `tbl_sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_web`
--
ALTER TABLE `tbl_web`
  ADD PRIMARY KEY (`id_web`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_data_user`
--
ALTER TABLE `tbl_data_user`
  MODIFY `id_data_user` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_notif`
--
ALTER TABLE `tbl_notif`
  MODIFY `id_notif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id_pengaduan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_slide`
--
ALTER TABLE `tbl_slide`
  MODIFY `id_slide` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_kategori`
--
ALTER TABLE `tbl_sub_kategori`
  MODIFY `id_sub_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_web`
--
ALTER TABLE `tbl_web`
  MODIFY `id_web` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
