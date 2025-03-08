-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2023 pada 16.53
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrishop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username_admin`, `password_admin`) VALUES
('dina181', '1'),
('dindin', '1820');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` varchar(20) NOT NULL,
  `nm_bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nm_bank`) VALUES
('0011', 'BNI'),
('200', 'BTN'),
('426', 'Bank Mega'),
('451', 'BSI'),
('990', 'BRII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `id_kelompok_barang` varchar(20) NOT NULL,
  `foto_barang` varchar(50) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `berat` int(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `id_penjual` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nm_barang`, `id_kelompok_barang`, `foto_barang`, `deskripsi`, `berat`, `stok`, `harga`, `id_penjual`) VALUES
('BRG001', 'Beras Jalur', 'DFRP002', 'beras.jpg', 'Beras dengan kualitas terbaik', 10, 988, 100000, 'PENJUAL001'),
('BRG002', 'Apel Fuji', 'DFRP004', 'apel.jfif', 'Apel merah', 1, 97, 10000, 'PENJUAL001'),
('BRG003', 'Jagung', 'DFRP001', 'jagung.jpg', 'Jagung ...', 1, 997, 15000, 'PNJL003'),
('BRG005', 'Lada Hitam', 'DFRP003', 'lada_hitam.jpg', 'Lada Hitam adalah sayur yang berkualitas baik', 1, 100, 8000, 'PNJL002'),
('BRG006', 'Apel Merah', 'DFRP004', 'apel.jfif', 'Apel merah adalah buah berkualitas baik', 1, 99, 15000, 'PNJL001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_pengiriman`
--

CREATE TABLE `daftar_pengiriman` (
  `id_daftar_pengiriman` varchar(20) NOT NULL,
  `tarif_pengiriman` int(50) NOT NULL,
  `id_sistem_pengiriman` varchar(20) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `id_kota_asal` varchar(20) NOT NULL,
  `id_kota_tujuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_pengiriman`
--

INSERT INTO `daftar_pengiriman` (`id_daftar_pengiriman`, `tarif_pengiriman`, `id_sistem_pengiriman`, `id_kategori`, `id_kota_asal`, `id_kota_tujuan`) VALUES
('DFRP001', 10000, '11A11', '1B1', '90', '90'),
('DFRP002', 35000, '11A11', '1B1', 'KT_013', '90'),
('DFRP003', 8000, '11A11', '1B2', '90', '90'),
('DFRP004', 25000, '11A12', '1B1', 'KT_015', '90'),
('DFRP005', 25000, '11A14', '1B2', 'KT_013', '90');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` varchar(20) NOT NULL,
  `nm_diskon` varchar(50) NOT NULL,
  `hrg_diskon` int(11) NOT NULL,
  `tgl_muncul` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `nm_diskon`, `hrg_diskon`, `tgl_muncul`) VALUES
('IDKOSN001', 'Tidak ada Diskon', 0, '2022-12-29'),
('IDKOSN002', 'Peserta Baru', 10, '2022-12-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur_beli`
--

CREATE TABLE `faktur_beli` (
  `id_faktur_beli` varchar(20) NOT NULL,
  `id_jasa_pembayaran` varchar(20) NOT NULL,
  `id_diskon` varchar(20) NOT NULL,
  `id_pembeli` varchar(20) NOT NULL,
  `id_status_pembayaran` varchar(20) NOT NULL,
  `tot_barang` int(50) NOT NULL,
  `tot_bayar` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `tgl` date NOT NULL,
  `no_pembayaran` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `faktur_beli`
--

INSERT INTO `faktur_beli` (`id_faktur_beli`, `id_jasa_pembayaran`, `id_diskon`, `id_pembeli`, `id_status_pembayaran`, `tot_barang`, `tot_bayar`, `qty`, `tgl`, `no_pembayaran`, `no_rekening`, `bukti_pembayaran`) VALUES
('FBTLRI001', 'JSPem017', '', 'PMBAGR001', 'STAPEM003', 1, 110000, 1, '2023-01-10', 'VCSHUI001', '2312354351', ''),
('FBTLRI003', 'JSPem018', '', 'PMBAGR001', 'STAPEM003', 1, 25000, 1, '2023-01-11', 'VCSHUI003', '2312354351', 'b.jpg'),
('FBTLRI006', 'JSPem017', '', 'PMBAGR001', 'STAPEM003', 1, 50000, 1, '2023-01-11', 'VCSHUI006', '2312354351', ''),
('FBTLRI007', 'JSPem018', '', 'PMBAGR001', 'STAPEM003', 1, 20000, 1, '2023-01-11', 'VCSHUI007', '2312354351', 'beras.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur_rinci`
--

CREATE TABLE `faktur_rinci` (
  `id_faktur_rinci` varchar(20) NOT NULL,
  `id_faktur_beli` varchar(20) NOT NULL,
  `id_status_pengiriman` varchar(20) NOT NULL,
  `tgl_rinci` varchar(50) NOT NULL,
  `id_daftar_pengiriman` varchar(20) NOT NULL,
  `id_status_transfer_penjual` varchar(20) NOT NULL,
  `id_penjual` varchar(50) NOT NULL,
  `transfer_uang_penjual` varchar(50) NOT NULL,
  `qty_barang_per_toko` int(50) NOT NULL,
  `total_bayar` int(50) NOT NULL,
  `penilaian` varchar(50) NOT NULL,
  `rating` tinyint(20) NOT NULL,
  `komplain` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `faktur_rinci`
--

INSERT INTO `faktur_rinci` (`id_faktur_rinci`, `id_faktur_beli`, `id_status_pengiriman`, `tgl_rinci`, `id_daftar_pengiriman`, `id_status_transfer_penjual`, `id_penjual`, `transfer_uang_penjual`, `qty_barang_per_toko`, `total_bayar`, `penilaian`, `rating`, `komplain`) VALUES
('FTRRNC001', 'FBTLRI001', 'STATPENG001', '2023-01-10', 'DFRP001', '018C1', 'PENJUAL001', '100000', 1, 100000, 'q', 5, '-'),
('FTRRNC003', 'FBTLRI003', 'STATPENG001', '2023-01-11', 'DFRP001', '018C1', 'PNJL003', '100000', 1, 15000, '-', 0, '-'),
('FTRRNC006', 'FBTLRI006', 'STATPENG001', '2023-01-11', 'DFRP002', '018C1', 'PNJL001', '100000', 1, 15000, '-', 0, '-'),
('FTRRNC007', 'FBTLRI007', 'STATPENG004', '2023-01-11', 'DFRP001', '018C2', 'PENJUAL001', '0', 1, 10000, '-', 0, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_kirim`
--

CREATE TABLE `jasa_kirim` (
  `id_jasa_kirim` varchar(20) NOT NULL,
  `nm_jasa_kirim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jasa_kirim`
--

INSERT INTO `jasa_kirim` (`id_jasa_kirim`, `nm_jasa_kirim`) VALUES
('18A1', 'JNE'),
('18A2', 'JNT'),
('18A3', 'TIKI'),
('18A4', 'SiCepat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_pembayaran`
--

CREATE TABLE `jasa_pembayaran` (
  `id_jasa_pembayaran` varchar(20) NOT NULL,
  `nm_jasa_pembayaran` varchar(50) NOT NULL,
  `id_jenis_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jasa_pembayaran`
--

INSERT INTO `jasa_pembayaran` (`id_jasa_pembayaran`, `nm_jasa_pembayaran`, `id_jenis_pembayaran`) VALUES
('JSPem011', 'COD', '018A1'),
('JSPem012', 'BRI', '018A2'),
('JSPem013', 'BCA', '018A2'),
('JSPem015', 'BNI', '018A2'),
('JSPem016', 'OVO', '018A3'),
('JSPem017', 'GoPAY', '018A3'),
('JSPem018', 'Alfamart', '018A4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` varchar(20) NOT NULL,
  `nm_jns_brg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `nm_jns_brg`) VALUES
('A11', 'Sayur'),
('A12', 'Daging'),
('A13', 'Buah'),
('A14', 'Seafood & Ikan'),
('A15', 'Barang Sembako');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis_pembayaran` varchar(20) NOT NULL,
  `nm_jenis_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis_pembayaran`, `nm_jenis_pembayaran`) VALUES
('018A1', 'COD (Bayar di Tempat)'),
('018A2', 'Transfer Bank'),
('018A3', 'Wallet'),
('018A4', 'Bayar Tunai di Mitra/Agen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pembeli`
--

CREATE TABLE `jenis_pembeli` (
  `id_jenis_pembeli` varchar(20) NOT NULL,
  `nm_jenis_pembeli` varchar(50) NOT NULL,
  `jumlah_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_pembeli`
--

INSERT INTO `jenis_pembeli` (`id_jenis_pembeli`, `nm_jenis_pembeli`, `jumlah_potongan`) VALUES
('JNSPMB001', 'Classic', 0),
('JNSPMB002', 'Silver', 5),
('JNSPMB003', 'Gold', 10),
('JNSPMB004', 'Platinium', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`) VALUES
('1B1', 'Barang Premium'),
('1B2', 'Barang Tidak Premium');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok_barang`
--

CREATE TABLE `kelompok_barang` (
  `id_kelompok_barang` varchar(20) NOT NULL,
  `nm_kelompok_barang` varchar(50) NOT NULL,
  `id_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelompok_barang`
--

INSERT INTO `kelompok_barang` (`id_kelompok_barang`, `nm_kelompok_barang`, `id_jenis`) VALUES
('DFRP001', 'Jagung Manis', 'A13'),
('DFRP002', 'Beras', 'A15'),
('DFRP003', 'Lada Hitam Bangka', 'A11'),
('DFRP004', 'Apel ', 'A13'),
('DFRP005', 'Beras Merah', 'A15'),
('DFRP006', 'Gandum', 'A15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` varchar(50) NOT NULL,
  `nm_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nm_kota`) VALUES
('90', 'Palembang'),
('KT_001', 'Banda Aceh'),
('KT_002', 'Langsa'),
('KT_003', 'Lhokseumawe'),
('KT_004', 'Sabang'),
('KT_005', 'Subulussalam '),
('KT_006', 'Denspasar'),
('KT_007', 'Pangkalpinang'),
('KT_008', 'Cilegon'),
('KT_009', 'Serang'),
('KT_010', 'Tangerang Selatan'),
('KT_011', 'Tangerang'),
('KT_012', 'Bengkulu'),
('KT_013', 'Yogyakarta'),
('KT_014', 'Gorontalo'),
('KT_015', 'Kota Administrasi Jakarta Pusat'),
('KT_016', 'Kota Administrasi Jakarta Selatan'),
('KT_017', 'Kota Administrasi Jakarta Timur'),
('KT_018', 'Kota Administrasi Jakarta Utara'),
('KT_019', 'Kota Administrasi Jakarta Barat'),
('KT_020', 'Sungai Penuh'),
('KT_021', 'Jambi'),
('KT_022', 'Bandung'),
('KT_023', 'Bekasi'),
('KT_024', 'Bogor'),
('KT_025', 'Cimahi'),
('KT_026', 'Cirebon'),
('KT_027', 'Depok'),
('KT_028', 'Sukabumi'),
('KT_029', 'Tasikmalaya'),
('KT_030', 'Banjar'),
('KT_031', 'Magelang'),
('KT_032', 'Pakalongan'),
('KT_033', 'Salatiga'),
('KT_034', 'Semarang'),
('KT_035', 'Surakarta'),
('KT_036', 'Tegal'),
('KT_037', 'Batu'),
('KT_038', 'Blitar'),
('KT_039', 'Kendiri'),
('KT_040', 'Madiun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` varchar(20) NOT NULL,
  `id_jenis_pembeli` varchar(20) NOT NULL,
  `nm_pembeli` varchar(50) NOT NULL,
  `pw_pembeli` varchar(20) NOT NULL,
  `usser_pembeli` varchar(50) NOT NULL,
  `almt_pembeli` varchar(50) NOT NULL,
  `id_kota_tujuan` varchar(50) NOT NULL,
  `no_hp_pembeli` varchar(50) NOT NULL,
  `no_rek_pembeli` varchar(20) NOT NULL,
  `tanggal_daftar_pembeli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `id_jenis_pembeli`, `nm_pembeli`, `pw_pembeli`, `usser_pembeli`, `almt_pembeli`, `id_kota_tujuan`, `no_hp_pembeli`, `no_rek_pembeli`, `tanggal_daftar_pembeli`) VALUES
('PMBAGR001', 'JNSPMB001', 'Dina S Sitorus', '123', 'suzzete18', 'Palembang, Jln Kebun Bunga, lrg.Sepakat Ujung', '90', '08522123414', '2312354351', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` varchar(50) NOT NULL,
  `id_bank` varchar(20) NOT NULL,
  `nm_pen` varchar(50) NOT NULL,
  `alamat_pen` varchar(150) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_hp_penjual` varchar(50) NOT NULL,
  `username_penjual` varchar(50) NOT NULL,
  `password_penjual` varchar(50) NOT NULL,
  `no_rek_penjual` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `id_bank`, `nm_pen`, `alamat_pen`, `kota`, `no_hp_penjual`, `username_penjual`, `password_penjual`, `no_rek_penjual`, `tanggal_daftar`) VALUES
('PENJUAL001', '0011', 'DinaSS', 'Palembang, Jln Kebun Bunga, lrg.Sepakat Ujung', '90', '08522123414', 'dindin90', '123456', '1234567890', '2023-01-01'),
('PNJL001', '0011', 'LUCY1', 'Jl. Rambutan', 'KT_013', '081356799087', 'lucy1', '123', '1234567890', '2022-12-31'),
('PNJL002', '426', 'VaniRR', 'Jl. Sembawa', 'KT_015', '08522123414', 'vani11', '123456', '12345678', '2023-01-06'),
('PNJL003', '0011', 'Rosa', 'Jl. Rambutan 90 ', '90', '081356799087', 'ross', '0987654321', '72189183968', '2023-01-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sistem_pengiriman`
--

CREATE TABLE `sistem_pengiriman` (
  `id_sistem_pengiriman` varchar(20) NOT NULL,
  `nm_sistem_pengiriman` varchar(50) NOT NULL,
  `id_jasa_kirim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sistem_pengiriman`
--

INSERT INTO `sistem_pengiriman` (`id_sistem_pengiriman`, `nm_sistem_pengiriman`, `id_jasa_kirim`) VALUES
('11A11', 'Kargo', '18A1'),
('11A12', 'Reguler', '18A2'),
('11A13', 'Kargo', '18A2'),
('11A14', 'Reguler', '18A1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id_status_pembayaran` varchar(20) NOT NULL,
  `nm_stat_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id_status_pembayaran`, `nm_stat_pembayaran`) VALUES
('STAPEM001', 'Tolak Pembayaran'),
('STAPEM002', 'Belum Bayar'),
('STAPEM003', 'Sudah Bayar'),
('STAPEM004', 'Sedang di Verifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pengiriman`
--

CREATE TABLE `status_pengiriman` (
  `id_status_pengiriman` varchar(20) NOT NULL,
  `nm_status_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_pengiriman`
--

INSERT INTO `status_pengiriman` (`id_status_pengiriman`, `nm_status_pengiriman`) VALUES
('STATPENG001', 'Di Terima'),
('STATPENG002', 'Belum Diterima'),
('STATPENG003', 'Dalam Packing'),
('STATPENG004', 'Di Kirim'),
('STATPENG005', 'Belum Di Kirim'),
('STATPENG006', 'Di batalkan'),
('STATPENG007', 'Komplain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_transfer_penjual`
--

CREATE TABLE `status_transfer_penjual` (
  `id_status_transfer_penjual` varchar(20) NOT NULL,
  `nm_status_transfer_penjual` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_transfer_penjual`
--

INSERT INTO `status_transfer_penjual` (`id_status_transfer_penjual`, `nm_status_transfer_penjual`) VALUES
('018C1', 'Sudah Transfer'),
('018C2', 'Belum Transfer'),
('018C3', 'Di Batalkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_faktur_rinci` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `qty_barang` int(11) NOT NULL,
  `sub_tot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_faktur_rinci`, `id_barang`, `qty_barang`, `sub_tot`) VALUES
('FTRRNC001', 'BRG001', 1, 100000),
('FTRRNC003', 'BRG003', 1, 15000),
('FTRRNC006', 'BRG006', 1, 15000),
('FTRRNC007', 'BRG002', 1, 10000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_admin`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis` (`id_kelompok_barang`),
  ADD KEY `id_penjual` (`id_penjual`);

--
-- Indeks untuk tabel `daftar_pengiriman`
--
ALTER TABLE `daftar_pengiriman`
  ADD PRIMARY KEY (`id_daftar_pengiriman`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kota_asal` (`id_kota_asal`),
  ADD KEY `id_kota_tujuan` (`id_kota_tujuan`),
  ADD KEY `id` (`id_sistem_pengiriman`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indeks untuk tabel `faktur_beli`
--
ALTER TABLE `faktur_beli`
  ADD PRIMARY KEY (`id_faktur_beli`),
  ADD KEY `id_status_pembayaran` (`id_status_pembayaran`),
  ADD KEY `id_jasa_pembayaran1` (`id_jasa_pembayaran`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `faktur_rinci`
--
ALTER TABLE `faktur_rinci`
  ADD PRIMARY KEY (`id_faktur_rinci`),
  ADD KEY `daftar_pengiriman` (`id_daftar_pengiriman`),
  ADD KEY `status_pengiriman` (`id_status_pengiriman`),
  ADD KEY `status_transfer_penjual` (`id_status_transfer_penjual`),
  ADD KEY `id_penjual1` (`id_penjual`),
  ADD KEY `id_faktur_beli` (`id_faktur_beli`);

--
-- Indeks untuk tabel `jasa_kirim`
--
ALTER TABLE `jasa_kirim`
  ADD PRIMARY KEY (`id_jasa_kirim`);

--
-- Indeks untuk tabel `jasa_pembayaran`
--
ALTER TABLE `jasa_pembayaran`
  ADD PRIMARY KEY (`id_jasa_pembayaran`),
  ADD KEY `id_jenis_pembayaran` (`id_jenis_pembayaran`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indeks untuk tabel `jenis_pembeli`
--
ALTER TABLE `jenis_pembeli`
  ADD PRIMARY KEY (`id_jenis_pembeli`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kelompok_barang`
--
ALTER TABLE `kelompok_barang`
  ADD PRIMARY KEY (`id_kelompok_barang`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD KEY `id_jenis_pembeli` (`id_jenis_pembeli`),
  ADD KEY `id_kota_tujuan1` (`id_kota_tujuan`);

--
-- Indeks untuk tabel `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`),
  ADD KEY `id_bank` (`id_bank`),
  ADD KEY `kota` (`kota`);

--
-- Indeks untuk tabel `sistem_pengiriman`
--
ALTER TABLE `sistem_pengiriman`
  ADD PRIMARY KEY (`id_sistem_pengiriman`) USING BTREE,
  ADD KEY `id_jasa_kirim` (`id_jasa_kirim`) USING BTREE;

--
-- Indeks untuk tabel `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id_status_pembayaran`);

--
-- Indeks untuk tabel `status_pengiriman`
--
ALTER TABLE `status_pengiriman`
  ADD PRIMARY KEY (`id_status_pengiriman`);

--
-- Indeks untuk tabel `status_transfer_penjual`
--
ALTER TABLE `status_transfer_penjual`
  ADD PRIMARY KEY (`id_status_transfer_penjual`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_faktur_rinci` (`id_faktur_rinci`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `id_kelompok_barang` FOREIGN KEY (`id_kelompok_barang`) REFERENCES `kelompok_barang` (`id_kelompok_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_penjual` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daftar_pengiriman`
--
ALTER TABLE `daftar_pengiriman`
  ADD CONSTRAINT `id` FOREIGN KEY (`id_sistem_pengiriman`) REFERENCES `sistem_pengiriman` (`id_sistem_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_kota_asal` FOREIGN KEY (`id_kota_asal`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_kota_tujuan` FOREIGN KEY (`id_kota_tujuan`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `faktur_beli`
--
ALTER TABLE `faktur_beli`
  ADD CONSTRAINT `faktur_beli_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_jasa_pembayaran1` FOREIGN KEY (`id_jasa_pembayaran`) REFERENCES `jasa_pembayaran` (`id_jasa_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_status_pembayaran` FOREIGN KEY (`id_status_pembayaran`) REFERENCES `status_pembayaran` (`id_status_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `faktur_rinci`
--
ALTER TABLE `faktur_rinci`
  ADD CONSTRAINT `daftar_pengiriman` FOREIGN KEY (`id_daftar_pengiriman`) REFERENCES `daftar_pengiriman` (`id_daftar_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_faktur_beli` FOREIGN KEY (`id_faktur_beli`) REFERENCES `faktur_beli` (`id_faktur_beli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_penjual1` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_pengiriman` FOREIGN KEY (`id_status_pengiriman`) REFERENCES `status_pengiriman` (`id_status_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_transfer_penjual` FOREIGN KEY (`id_status_transfer_penjual`) REFERENCES `status_transfer_penjual` (`id_status_transfer_penjual`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jasa_pembayaran`
--
ALTER TABLE `jasa_pembayaran`
  ADD CONSTRAINT `id_jenis_pembayaran` FOREIGN KEY (`id_jenis_pembayaran`) REFERENCES `jenis_pembayaran` (`id_jenis_pembayaran`);

--
-- Ketidakleluasaan untuk tabel `kelompok_barang`
--
ALTER TABLE `kelompok_barang`
  ADD CONSTRAINT `id_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_barang` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `id_jenis_pembeli` FOREIGN KEY (`id_jenis_pembeli`) REFERENCES `jenis_pembeli` (`id_jenis_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_kota_tujuan1` FOREIGN KEY (`id_kota_tujuan`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjual`
--
ALTER TABLE `penjual`
  ADD CONSTRAINT `penjual_ibfk_1` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjual_ibfk_2` FOREIGN KEY (`kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sistem_pengiriman`
--
ALTER TABLE `sistem_pengiriman`
  ADD CONSTRAINT `id_jasa_kirim` FOREIGN KEY (`id_jasa_kirim`) REFERENCES `jasa_kirim` (`id_jasa_kirim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_faktur_rinci` FOREIGN KEY (`id_faktur_rinci`) REFERENCES `faktur_rinci` (`id_faktur_rinci`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
