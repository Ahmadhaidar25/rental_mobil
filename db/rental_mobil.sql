-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2022 pada 06.51
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `uuid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `uuid`, `jenis_mobil`, `created_at`, `updated_at`) VALUES
(5, '7f7e285425fd4e24bb2157cde731793e', 'Mini Bus', '2022-11-02 05:05:24', '2022-11-02 05:05:24'),
(6, '1cb971a8572f491c8a9423867715d037', 'Bus', '2022-11-02 05:05:24', '2022-11-02 05:05:24'),
(7, '1a387caf425643ac80e4fdfe9a932934', 'Box', '2022-11-02 05:05:24', '2022-11-02 05:05:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `uuid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek`
--

CREATE TABLE `merek` (
  `id` int(11) NOT NULL,
  `uuid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `merek`
--

INSERT INTO `merek` (`id`, `uuid`, `merek`, `created_at`, `updated_at`) VALUES
(6, 'd6704723cccf4b59b25e78e9dc5507a2', 'Toyota', '2022-11-02 04:42:04', '2022-11-02 04:42:04'),
(7, '1cb664c09d1b4af3a3007ca3ebca7e20', 'Nissan', '2022-11-02 04:42:04', '2022-11-02 04:42:04'),
(8, '392d5c1ed3a0457ca23a87ed21fea193', 'Mitsubisi', '2022-11-02 04:42:04', '2022-11-02 04:42:04'),
(9, '6311f004b19740b3812a68ebfad45017', 'Honda', '2022-11-02 04:42:04', '2022-11-02 04:42:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_13_063529_mobil', 1),
(6, '2022_10_13_070833_merek', 1),
(7, '2022_10_13_080155_jenis', 1),
(8, '2022_10_19_042124_transaksi', 1),
(9, '2022_10_22_142315_komentar', 1),
(10, '2022_10_24_041828_pengguna', 1),
(11, '2022_10_25_144732_like', 1),
(12, '2022_11_11_174024_transaksi_pembayaran', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mobil` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_polisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merek_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `kapasitas_penumpang` int(2) NOT NULL,
  `transmisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahan_bakar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `uuid`, `nama_mobil`, `image`, `no_polisi`, `merek_id`, `jenis_id`, `kapasitas_penumpang`, `transmisi`, `bahan_bakar`, `status`, `kondisi`, `harga`, `created_at`, `updated_at`) VALUES
(5, '4daa0790f4294c71b457bcb06ef82619', 'Avanza', '1668069275.png', 'T 3553 CT', 6, 5, 8, 'manual', 'bensin', '3', 'kotor', 500000, '2022-11-10 01:34:35', '2022-11-28 23:53:30'),
(7, 'ecd901d7bd7c4c288d8cb579af3bfbcb', 'Honda Brio', '1668167760.png', 'T 777 MM', 9, 5, 4, 'manual', 'bensin', '3', 'bersih', 400000, '2022-11-11 04:56:00', '2022-11-29 00:22:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil_transaksi`
--

CREATE TABLE `mobil_transaksi` (
  `id` int(11) NOT NULL,
  `uuid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dari_tanggal` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  `dari_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ke_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_transaksi` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mobil_transaksi`
--

INSERT INTO `mobil_transaksi` (`id`, `uuid`, `user_id`, `mobil_id`, `lama_sewa`, `total`, `dari_tanggal`, `sampai_tanggal`, `dari_kota`, `ke_kota`, `status_transaksi`, `created_at`, `updated_at`) VALUES
(105, '14bbf31d05cf443893ec7507cc18f08d', 8, 5, 1, 500000, '2022-03-29', '2022-11-28', 'Kabupaten Bandung', 'Kota Banjar', 2, '2022-10-27 02:59:41', '2022-11-27 03:00:27'),
(106, 'ea8cac2f2323407aa615bcd6e9dc98cc', 8, 7, 2, 800000, '2022-05-29', '2022-11-29', 'Kabupaten Sukabumi', 'Kota Cimahi', 2, '2022-04-27 06:40:54', '2022-11-27 06:42:05'),
(107, '4066ac9dba9b44d6b3358417710f1297', 8, 5, 2, 1000000, '2022-11-29', '2022-11-30', 'Kabupaten Bandung', 'Kota Tasikmalaya', 2, '2022-11-28 00:40:31', '2022-11-28 00:42:08'),
(108, 'ce5c4d153a4c496e8e1cec7f22d8e5bf', 8, 5, 1, 500000, '2022-11-29', '2022-11-30', 'Kabupaten Bandung', 'Kota Tasikmalaya', 2, '2022-11-27 12:20:18', '2022-11-28 12:21:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pembayaran`
--

CREATE TABLE `transaksi_pembayaran` (
  `id` int(11) NOT NULL,
  `uuid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaksi_mobil_id` int(11) NOT NULL,
  `gross_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `va_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_pembayaran`
--

INSERT INTO `transaksi_pembayaran` (`id`, `uuid`, `user_id`, `transaksi_mobil_id`, `gross_amount`, `payment_type`, `transaction_time`, `transaction_status`, `payment_code`, `bank`, `va_number`, `created_at`, `updated_at`) VALUES
(18, '8fc7e5e4095341b098460672c11d407c', 8, 105, '500000.00', 'bank_transfer', '2022-11-27 17:00:07', 'settlement', NULL, NULL, NULL, '2022-11-27 03:00:27', '2022-11-27 03:00:27'),
(19, 'cb78f8dab45c44e6b18df5cabd9f8716', 8, 106, '800000.00', 'bank_transfer', '2022-11-27 20:41:45', 'settlement', NULL, NULL, NULL, '2022-11-27 06:42:05', '2022-11-27 06:42:05'),
(20, '47de8a4d64504e0bab21e83cef515ccb', 8, 107, '1000000.00', 'bank_transfer', '2022-11-28 14:41:46', 'settlement', NULL, NULL, NULL, '2022-11-28 00:42:08', '2022-11-28 00:42:08'),
(21, 'c0c7a74217c8482fb62109310bfc2c11', 8, 108, '500000.00', 'bank_transfer', '2022-11-29 02:20:50', 'settlement', NULL, NULL, NULL, '2022-11-28 12:21:09', '2022-11-28 12:21:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uuid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` bigint(13) DEFAULT NULL,
  `no_ktp` bigint(16) DEFAULT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_sim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur` int(2) DEFAULT NULL,
  `gander` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `uuid`, `nama`, `email`, `no_tlp`, `no_ktp`, `foto_ktp`, `foto_sim`, `tempat_lahir`, `tgl_lahir`, `umur`, `gander`, `alamat`, `pekerjaan`, `password`, `avatar`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, '672b5de7a1fb45caadd63c768fbdadc6', 'Super Admin', 'haidarahmad728@gmail.com', 8753263826, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$vgLZXFnp11T8KJXJIY/qXuRQYwehImSk1Wc2mg0uPzRub/f27aJEO', NULL, '1', 1, '2022-11-07 07:08:09', '2022-11-29 08:27:39'),
(2, 'dd7a663b1e6644b2aaed1a47ee69a818', 'Admin', 'haidarstmik@gmail.com', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$6iCCas/43fD7vLJmqKYXeecGefdEiF7FpvvtOnGEB9BW.0BTxwnve', '1669668105,png', '2', 1, '2022-11-07 07:08:26', '2022-11-28 23:34:48'),
(4, '788db5cf463f4f52a7b4c2c8c3f86daa', 'Admin2', 'mutiaras694@gmail.com', NULL, 0, NULL, '', '', '', 0, '', '', '', '$2y$10$fcGvMgS94HxsYQsl12Zxo.hpOR55nfxcZDELGZYlFnO/SC5czgYbe', NULL, '2', 1, '2022-11-07 07:44:07', '2022-11-10 01:33:22'),
(8, 'fd786f4d7a2d47239b88518ccdb86efc', 'Ahmad Haidar', 'haidar250399@gmail.com', 87789656721, 321518250399002, '1669648211.jpeg', '1669697006.png', 'Kabupaten Karawang', '06/11/2008', 14, 'laki-laki', 'Rawamerta Karawang', 'programmer', '$2y$10$ldPQ74CXnlT6CJPuJiCWSOQ0Q5J1eEsSKX.XVU70xvcV1qeIqwDO2', '1669643211,png', '3', 1, '2022-11-27 02:58:03', '2022-11-29 00:02:29'),
(10, '8dca535e08364cd38937ba566a59d7e6', 'Aziz Nanda Aditya', 'aziz@gmail.com', 87789656721, 321518250399003, '1669648779.png', '1669649806.png', NULL, '02/08/2006', 16, NULL, NULL, NULL, '$2y$10$BkdLNjjb2kSqmw38R6d4VOwwcn2L8boEySbT.llAAHRyeldqWxVyu', NULL, '3', 1, '2022-11-28 01:03:11', '2022-11-28 08:41:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mobil_id` (`mobil_id`),
  ADD KEY `mobil_id_2` (`mobil_id`);

--
-- Indeks untuk tabel `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobil_no_polisi_unique` (`no_polisi`),
  ADD KEY `merk_id` (`merek_id`),
  ADD KEY `jenis_id` (`jenis_id`);

--
-- Indeks untuk tabel `mobil_transaksi`
--
ALTER TABLE `mobil_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mobil_id` (`mobil_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksi_pembayaran`
--
ALTER TABLE `transaksi_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_mobil_id` (`transaksi_mobil_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `merek`
--
ALTER TABLE `merek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mobil_transaksi`
--
ALTER TABLE `mobil_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_pembayaran`
--
ALTER TABLE `transaksi_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`mobil_id`) REFERENCES `mobil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`merek_id`) REFERENCES `merek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mobil_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mobil_transaksi`
--
ALTER TABLE `mobil_transaksi`
  ADD CONSTRAINT `mobil_transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mobil_transaksi_ibfk_2` FOREIGN KEY (`mobil_id`) REFERENCES `mobil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_pembayaran`
--
ALTER TABLE `transaksi_pembayaran`
  ADD CONSTRAINT `transaksi_pembayaran_ibfk_1` FOREIGN KEY (`transaksi_mobil_id`) REFERENCES `mobil_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_pembayaran_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
