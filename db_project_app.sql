-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2020 pada 00.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_antrian`
--

CREATE TABLE `tb_antrian` (
  `id_a` int(32) NOT NULL,
  `no_antrian` varchar(32) DEFAULT NULL,
  `id_pasien` int(32) DEFAULT NULL,
  `id_poli` int(32) DEFAULT NULL,
  `tgl_a` date DEFAULT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_antrian`
--

INSERT INTO `tb_antrian` (`id_a`, `no_antrian`, `id_pasien`, `id_poli`, `tgl_a`, `status`) VALUES
(14, '2', 15, 13, '2020-05-09', 'Selesai'),
(15, '1', 12, 14, '2020-05-07', 'Selesai'),
(16, '1', 13, 13, '2020-05-10', 'Antri'),
(17, '2', 14, 14, '2020-05-10', 'Antri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(32) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `status_pasien` varchar(255) DEFAULT NULL,
  `n_rm` varchar(255) DEFAULT NULL,
  `status_bpjs` varchar(255) DEFAULT NULL,
  `n_bpjs` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `email`, `password`, `nama_pasien`, `alamat`, `tgl_lahir`, `status_pasien`, `n_rm`, `status_bpjs`, `n_bpjs`) VALUES
(11, 'user@gmail.com', 'user', 'Pasien 1', 'Malang', '2020-05-10', 'Baru', 'Nomor Rekam Medis Belum Terdaftar', 'Iya', '00989123'),
(12, 'pasien2@gmail.com', 'pasien2', 'Pasien 2', 'Klojen, Malang', '1999-02-12', 'Lama', '000118', 'Iya', '098980812'),
(13, 'pasien3@gmail.com', 'pasien3', 'Pasien 3', 'Jl.Veteran, Malang', '1997-05-01', 'Lama', '000120', 'Tidak', 'Tidak Terdaftar Sepagai Pasien BPJS'),
(14, 'pasien4@gmail.com', 'pasien4', 'Pasien 4', 'Jl. Bend. Sigura-gura', '1998-09-17', 'Baru', 'Nomor Rekam Medis Belum Terdaftar', 'Tidak', 'Tidak Terdaftar Sepagai Pasien BPJS'),
(15, 'pasien5@gmail.com', 'pasien5', 'Pasien 5', 'Jl.Bend.Sutami', '1990-12-03', 'Lama', '000121', 'Iya', '00989124');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_peg` int(32) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_peg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_peg`, `username`, `password`, `nama_peg`) VALUES
(1, 'pegawai1', 'pegawai1', 'Pegawai 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poli`
--

CREATE TABLE `tb_poli` (
  `id_poli` int(32) NOT NULL,
  `nama_poli` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `gambar_poli` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_poli`
--

INSERT INTO `tb_poli` (`id_poli`, `nama_poli`, `deskripsi`, `gambar_poli`) VALUES
(13, 'Umum', 'Poli umum, Berupa pelayanan kesehatan tingkat pertama yaitu Riwayat Jalan Tingkat Pertama(RJTP), meliputi: pemeriksaan, pengobatan, konsultasi medis,tindakan medis non spesialistik, baik operatif maupun non operatif,pelayanan obat dan bahan medis pakai.', '/img/poli_img/19834.jpg'),
(14, 'Anak', 'Berbagai pelayanan antara lain pemeriksaan kesehatan anak dari bayi baru lahir, balita, hingga menjelang remaja, imunisasi, vaksinasi, konsultasi tumbuh kembang anak di bawah asuhan dokter, konseling ASI, Inisiasi Menyusui Dini (IMD), dll.', '/img/poli_img/anak.jpg'),
(15, 'Kandungan', 'Poli kandungan melayani pemeriksaan kehamilan, penyakit kandungan dan persalinan. Sarana penunjang yang juga kami sediakan untuk mendukung klinik kebidanan dan kandungan ini adalah fasilitas USG untuk mengetahui perkembangan janin pada si ibu hamil.', '/img/poli_img/kandungan.jpg'),
(16, 'Gigi', 'Poli Gigi, berupa pelayanan gigi yaitu pemeriksaan, pengobatan, dan konsultasi medis, premedikasi, kegawatdaruratan oro-dental, pencabutan gigi, obat pasca ekstraksi, tumpatan komposit, glass ionomer cement (GIC), pembersihan karang gigi, dll.', '/img/poli_img/26666.jpg'),
(17, 'Mata', 'Poli menyediakan berbagai macam layanan pengobatan untuk penanganan kelainan penglihatan dan penyakit seputar mata dengan dukungan peralatan diagnostik mata yang lengkap.', '/img/poli_img/4432.jpg'),
(18, 'THT', 'Poli THT adalah layanan diagnosa dan terapi berbagai gangguan dan penyakit organ-organ telinga, hidung, dan tenggorokan.', '/img/poli_img/240_F_317241660_zrbJXjEO6elHvfrQ9HbXpGp5bOkltzij.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_antrian`
--
ALTER TABLE `tb_antrian`
  ADD PRIMARY KEY (`id_a`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`) USING BTREE;

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_peg`);

--
-- Indeks untuk tabel `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_antrian`
--
ALTER TABLE `tb_antrian`
  MODIFY `id_a` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_peg` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_poli`
--
ALTER TABLE `tb_poli`
  MODIFY `id_poli` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_antrian`
--
ALTER TABLE `tb_antrian`
  ADD CONSTRAINT `tb_antrian_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_antrian_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `tb_poli` (`id_poli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
