-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2024 pada 09.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ticket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `email`, `no_telepon`) VALUES
(1001, 'Ahmad Fauzi', 'ahmad.fauzi@example.com', '081234567890'),
(1002, 'Siti Aminah', 'siti.aminah@example.com', '082345678901'),
(1003, 'Budi Santoso', 'budi.santoso@example.com', '083456789012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `jumlah_tiket` int(11) DEFAULT NULL,
  `harga_per_tiket` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `judul_film` varchar(255) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `tanggal_rilis` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `judul_film`, `genre`, `durasi`, `tanggal_rilis`, `status`) VALUES
(1, 'The Great Adventure', 'Action', 120, '2023-05-10', 'sedang tayang'),
(2, 'Romantic Nights', 'Romance', 95, '2024-01-15', 'akan datang'),
(3, 'Mystery in the Dark', 'Thriller', 110, '2023-12-01', 'sedang tayang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_tayang`
--

CREATE TABLE `jadwal_tayang` (
  `id_jadwal` int(11) NOT NULL,
  `id_film` int(11) DEFAULT NULL,
  `id_theater` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `harga_tiket` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_tayang`
--

INSERT INTO `jadwal_tayang` (`id_jadwal`, `id_film`, `id_theater`, `tanggal`, `waktu_mulai`, `harga_tiket`) VALUES
(101, 1, 16501, '2023-11-15', '14:00:00', 50000.00),
(102, 2, 16502, '2024-01-16', '18:00:00', 45000.00),
(103, 3, 16503, '2023-12-02', '20:30:00', 60000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `theater`
--

CREATE TABLE `theater` (
  `id_theater` int(11) NOT NULL,
  `nama_theater` varchar(255) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `jenis_theater` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `theater`
--

INSERT INTO `theater` (`id_theater`, `nama_theater`, `kapasitas`, `jenis_theater`) VALUES
(16501, 'Theater 1', 150, 'IMAX'),
(16502, 'Theater 2', 100, 'Standard'),
(16503, 'Theater 3', 200, 'VIP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `status_pembayaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `tanggal_transaksi`, `total_harga`, `status_pembayaran`) VALUES
(701, 1001, '2023-11-10 14:30:00', 100000.00, 'sudah bayar'),
(702, 1002, '2023-11-12 15:00:00', 135000.00, 'belum bayar'),
(703, 1003, '2023-11-13 17:45:00', 90000.00, 'sudah bayar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indeks untuk tabel `jadwal_tayang`
--
ALTER TABLE `jadwal_tayang`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_theater` (`id_theater`);

--
-- Indeks untuk tabel `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`id_theater`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_tayang` (`id_jadwal`);

--
-- Ketidakleluasaan untuk tabel `jadwal_tayang`
--
ALTER TABLE `jadwal_tayang`
  ADD CONSTRAINT `jadwal_tayang_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `jadwal_tayang_ibfk_2` FOREIGN KEY (`id_theater`) REFERENCES `theater` (`id_theater`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
