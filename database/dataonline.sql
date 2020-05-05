-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2020 pada 05.24
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataonline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `hitung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `counter`
--

INSERT INTO `counter` (`id`, `hitung`) VALUES
(1, 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_aaws`
--

CREATE TABLE `data_aaws` (
  `id` bigint(20) NOT NULL,
  `id_aws` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `radiasi` decimal(10,1) NOT NULL,
  `suhu` decimal(10,0) NOT NULL,
  `tekanan_udara` decimal(10,0) NOT NULL,
  `kecepatan_angin` decimal(10,0) NOT NULL,
  `arah_angin` decimal(10,0) NOT NULL,
  `curah_hujan` decimal(10,0) NOT NULL,
  `kelembaban` decimal(10,0) NOT NULL,
  `soil_mosture` decimal(10,0) NOT NULL,
  `suhu_tanah` decimal(10,0) NOT NULL,
  `leafwetnes` decimal(10,0) NOT NULL,
  `aux1` decimal(10,0) NOT NULL,
  `aux2` decimal(10,0) NOT NULL,
  `aux3` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_aws`
--

CREATE TABLE `data_aws` (
  `id` bigint(20) NOT NULL,
  `id_aws` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `radiasi` decimal(10,0) DEFAULT NULL,
  `suhu` decimal(10,1) DEFAULT NULL,
  `tekanan_udara` decimal(10,1) DEFAULT NULL,
  `kecepatan_angin` decimal(10,1) DEFAULT NULL,
  `arah_angin` decimal(10,0) DEFAULT NULL,
  `curah_hujan` decimal(10,1) DEFAULT NULL,
  `kelembaban` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_device`
--

CREATE TABLE `data_device` (
  `id` int(11) NOT NULL,
  `id_device` varchar(128) NOT NULL,
  `nama_device` varchar(128) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `ketinggian` decimal(10,0) NOT NULL,
  `pemilik` varchar(128) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_device`
--

INSERT INTO `data_device` (`id`, `id_device`, `nama_device`, `longitude`, `latitude`, `ketinggian`, `pemilik`, `lokasi`, `status`, `image`) VALUES
(1, '101', 'AWS_SFSA', 108.0390833, -6.508555556, '45', 'Syngenta Foundation For Sustainable Agriculture Indonesia', 'Kroya,Indramayu', 'ok', 'tes.jpg'),
(2, '102', 'AWS_SIL', 106.7289152, -6.5584237, '45', 'Dept. Teknik Sipil dan Lingkungan, IPB', 'Dramaga,Bogor', '', 'SIL_IPB.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nama_aws`
--

CREATE TABLE `data_nama_aws` (
  `id` int(11) NOT NULL,
  `id_aws` varchar(128) NOT NULL,
  `nama_aws` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_nama_aws`
--

INSERT INTO `data_nama_aws` (`id`, `id_aws`, `nama_aws`) VALUES
(1, '101', 'AWS_SFSA'),
(2, '102', 'AWS_SIL'),
(106, '1', 'AWS_MNI'),
(107, '2', 'AAWS_MNI'),
(108, '3', 'SPAS_MNI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_spas`
--

CREATE TABLE `data_spas` (
  `id` bigint(20) NOT NULL,
  `id_aws` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `curah_hujan` decimal(10,0) NOT NULL,
  `tinggi_muka_air` decimal(10,1) NOT NULL,
  `kecepatan_air` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'testing', 3, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rule_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `rule_id`, `is_active`, `date_created`) VALUES
(1, 'Admin MNI', 'admin@dataonline.co.id', 'mni-mini.png', '$2y$10$1oCM5GHOQQwR5a3TBAcoxe6nrCeijUPpwdw2lP4Ti576KQaGngr3G', 1, 1, 1575860898),
(18, 'SFSA', 'sfsa@dataonline.co.id', 'syngenta.jpg', '$2y$10$GWgSXk6H6YjIS7p4WPU1YOkhhV0.txp8uq9lmZE/I2/NZwp7U1zyq', 2, 1, 1580438041),
(21, 'Guest', 'guest@dataonline.co.id', 'default.png', '$2y$10$J8/SJqD/1K.1HSKxnHY6eOLRSd9qoAsEU3.zStI07vTeIImpzrUFe', 7, 1, 1583306752);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_data`
--

CREATE TABLE `user_access_data` (
  `id` int(11) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_aws` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_data`
--

INSERT INTO `user_access_data` (`id`, `id_user`, `id_aws`) VALUES
(2, 4, '102'),
(3, 2, '103'),
(8, 1, '103'),
(9, 1, '102'),
(10, 1, '101'),
(14, 10, '103'),
(16, 10, '102'),
(18, 11, '102'),
(22, 13, '103'),
(23, 14, '102'),
(24, 15, '101'),
(28, 1, '201'),
(29, 1, '301'),
(30, 16, '201'),
(31, 17, '301'),
(39, 20, '1'),
(40, 21, '1'),
(41, 21, '2'),
(42, 21, '3'),
(43, 18, '101'),
(44, 19, '102'),
(45, 23, '201'),
(47, 24, '301');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `rule_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3),
(16, 3, 12),
(17, 2, 6),
(19, 3, 2),
(21, 4, 2),
(31, 6, 14),
(33, 6, 2),
(34, 1, 15),
(35, 1, 16),
(39, 1, 2),
(40, 7, 2),
(41, 7, 6),
(44, 7, 12),
(45, 7, 14),
(46, 7, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(6, 'AWS'),
(12, 'Agroklimat '),
(14, 'SPAS'),
(15, 'Device'),
(16, 'Member'),
(17, 'Irigasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_rule`
--

CREATE TABLE `user_rule` (
  `id` int(11) NOT NULL,
  `rule` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_rule`
--

INSERT INTO `user_rule` (`id`, `rule`) VALUES
(1, 'Administrator'),
(2, 'Access Data AWS'),
(3, 'Access Data AAWS'),
(6, 'Access Data SPAS'),
(7, 'Access Data Guest');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-id-card', 1),
(3, 404, 'Registrasi User', 'admin/register', 'fas fa-fw fa-user-plus', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'far fa-fw fa-folder-open', 1),
(6, 6, 'Dashboard ', 'aws/dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(7, 1, 'Accessibility Setting', 'admin/rule', 'fas fa-fw fa-user-tie', 1),
(8, 6, 'Tabel', 'aws/tabel', 'fas fa-fw fa-table', 1),
(9, 6, 'Charts', 'aws/charts', 'fas fa-fw fa-chart-area', 1),
(16, 14, 'Dashboard   ', 'spas/dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(18, 14, 'Tabel   ', 'spas/tabel', 'fas fa-fw fa-table', 1),
(19, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-tie', 1),
(20, 404, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(22, 12, 'Dashboard  ', 'agroklimat/dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(23, 12, 'Tabel ', 'agroklimat/tabel', 'fas fa-fw fa-table', 1),
(24, 12, 'Charts ', 'agroklimat/charts', 'fas fa-fw fa-chart-area', 1),
(27, 14, 'Charts   ', 'spas/charts', 'fas fa-fw fa-chart-area', 1),
(30, 15, 'List of Devices', 'device', 'fas fa-fw  fa-tools', 1),
(31, 16, 'List Account Member', 'member', 'fas fa-fw fa-user-tie', 1),
(32, 6, 'Report', 'aws/report', 'fas fa-fw fa-download', 1),
(33, 12, 'Report', 'agroklimat/report', 'fas fa-fw fa-download', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_aaws`
--
ALTER TABLE `data_aaws`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_aws`
--
ALTER TABLE `data_aws`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_device`
--
ALTER TABLE `data_device`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_nama_aws`
--
ALTER TABLE `data_nama_aws`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_spas`
--
ALTER TABLE `data_spas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access_data`
--
ALTER TABLE `user_access_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_rule`
--
ALTER TABLE `user_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_aaws`
--
ALTER TABLE `data_aaws`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `data_aws`
--
ALTER TABLE `data_aws`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `data_device`
--
ALTER TABLE `data_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `data_nama_aws`
--
ALTER TABLE `data_nama_aws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `data_spas`
--
ALTER TABLE `data_spas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user_access_data`
--
ALTER TABLE `user_access_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_rule`
--
ALTER TABLE `user_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
