-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2023 at 08:09 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_puskesmas_lasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` bigint UNSIGNED NOT NULL,
  `judul_berita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_berita` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_berita` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_berita` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `gambar_berita`, `isi_berita`, `hari_berita`, `created_at`, `updated_at`) VALUES
(1, '8 Cara Mencegah Hepatitis B, Tak Hanya Vaksin', '169798191148.jpg', '<p>Cara mencegah hepatitis B Hepatitis B dapat ditularkan dengan mudah melalui cairan tubuh penderita, termasuk melalui darah, air mani, dan cairan vagina. Melakukan tindakan pencegahan, seperti melakukan hubungan dengan aman dan melakukan vaksinasi, sangat diperlukan. Dilansir dari WebMD, ada beberapa cara mencegah hepatitis B yang dapat dilakukan, seperti: Mendapatkan vaksin hepatitis B, terlebih jika sebelumnya belum pernah mengalami hepatitis B Menggunakan kondom ketika melakukan hubungan seksual Menggunakan sarung tangan ketika bersih-bersih, khususnya ketika perlu menyentuh perban, tampon, dan seprai Menutup semua luka terbuka Tidak berbagi barang pribadi yang dapat memicu terjadinya luka berdarah, seperti pisau cukur, sikat gigi, dan tindik Tidak berbagi permen karet dan tidak mengunyahkan makanan yang diberikan pada bayi Memastikan bahwa semua jarum suntik yang digunakan untuk obat, tindik, atau tato, serta alat-alat untuk perawatan kuku, melalui proses sterilisasi yang baik Membersihkan bekas darah dengan menggunakan cairan pemutih yang dicampur dengan air Melakukan tindakan pencegahan di atas sangat diperlukan mengingat bahwa hepatitis B dapat menjadi kronis atau berlangsung dalam waktu yang lama. Penderita yang mengalami hepatitis B kronis akan memiliki risiko kematian yang tinggi karena kanker lever atau hati dan sirosis di mana terdapat jaringan parut di dalam organ hati</p>', 'Minggu', '2023-10-22 13:38:31', '2023-10-22 13:38:31'),
(2, '8 Manfaat Kesehatan dan Cara Menggunakan Minyak Zaitun untuk Memasak', '169798315925.jpg', '<p>Manfaat minyak zaitun untuk kesehatan Disarikan dari Healthline dan Medical News Today, ada beberapa manfaat minyak zaitun untuk kesehatan, yakni: Mengandung lemak tak jenuh tunggal yang tinggi sehingga bermanfaat untuk mengurangi inflamasi dan menurunkan risiko kanker Memiliki kandungan antioksidan yang tinggi sehingga bisa menurunkan risiko penyakit kronis, seperti penyakit jantung dan membunuh sel kanker Memiliki kandungan anti-inflamasi yang tinggi sehingga dapat menurunkan risiko penyakit yang berbahaya, seperti penyakit jantung, kanker, gangguan metabolik, diabetes tipe 2, Alzheimer, peradangan sendiri, dan obesitas Menurunkan kadar kolesterol jahat di dalam tubuh dan menyehatkan pembuluh darah sehingga dapat mencegah penggumpalan darah yang juga akan mendukung kesehatan jantung Meningkatkan kadar antioksidan di dalam tubuh dan membantu menurunkan berat badan jika digunakan untuk program diet Mendukung kesehatan otak dan mencegah penumpukan plak pada sel otak sehingga dapat mencegah Alzheimer Memiliki kandungan nutrisi yang dapat membunuh bakteri jahat yang ada di dalam perut sehingga kesehatan pencernaan tetap terjaga Mendukung kesehatan sistem saraf dan sudah terbukti dapat mengurangi gejala depresi serta kecemasan Untuk bisa mendapatkan manfaat kesehatan tersebut, memilih jenis minyak zaitun yang tepat juga disarankan. Pasalnya, extra virgin olive oil (EVOO) memiliki kandungan antioksidan dan senyawa alami buah zaitun yang lebih tinggi karena tidak melalui proses pengolahan yang banyak</p>', 'Minggu', '2023-10-22 13:59:19', '2023-10-22 13:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `berkas_layanan_publik`
--

CREATE TABLE `berkas_layanan_publik` (
  `id_berkas_layanan_publik` bigint UNSIGNED NOT NULL,
  `gambar_berkas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_berkas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berkas_layanan_publik`
--

INSERT INTO `berkas_layanan_publik` (`id_berkas_layanan_publik`, `gambar_berkas`, `keterangan_berkas`, `created_at`, `updated_at`) VALUES
(1, '169085990150.jpg', '<p>Kami membuka Layanan Perizinan dan Non Perizinan melalui tatap muka maupun online. Untuk tatap muka secara langsung silahkan kunjungi kantor kami dengan alamat yang tertera pada menu Kontak. Untuk pelayanan melalui online silahkan kunjungi situs yang telah kami sediakan dibawah ini (SiCantik atau OSS) atau bisa juga hubungi nomor HP yang tertera pada menu Kontak. Untuk melihat persyaratan atau info tentang Izin yang akan anda buat, silahkan pilih Standar Operasional Prosedur.</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_jenis_pelayanan`
--

CREATE TABLE `gambar_jenis_pelayanan` (
  `id_gambar_jenis_pelayanan` bigint UNSIGNED NOT NULL,
  `id_jenis_pelayanan` bigint NOT NULL,
  `gambar_jenis_pelayanan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_standard_pelayanan`
--

CREATE TABLE `gambar_standard_pelayanan` (
  `id_gambar_standard_pelayanan` bigint UNSIGNED NOT NULL,
  `id_standard_pelayanan` bigint NOT NULL,
  `gambar_standard_pelayanan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informasi_puskesmas`
--

CREATE TABLE `informasi_puskesmas` (
  `id_informasi_puskesmas` bigint UNSIGNED NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nowa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasi_puskesmas`
--

INSERT INTO `informasi_puskesmas` (`id_informasi_puskesmas`, `lokasi`, `email`, `nohp`, `nowa`, `created_at`, `updated_at`) VALUES
(1, 'Jalan Mangga 2', 'mangga@gmail.com', '0812345678', '08123456789', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pelayanan`
--

CREATE TABLE `jenis_pelayanan` (
  `id_jenis_pelayanan` bigint UNSIGNED NOT NULL,
  `judul_jenis_pelayanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maklumat_pelayanan`
--

CREATE TABLE `maklumat_pelayanan` (
  `id_maklumat_pelayanan` bigint UNSIGNED NOT NULL,
  `judul_maklumat_pelayan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_maklumat_pelayanan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mekanisme_alur`
--

CREATE TABLE `mekanisme_alur` (
  `id_mekanisme_alur` bigint UNSIGNED NOT NULL,
  `gambar_alur` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_02_21_005930_create_visi_misi_table', 1),
(5, '2023_03_04_145229_create_pengaduan_masyarakat_table', 1),
(6, '2023_03_06_023337_create_berita_table', 1),
(7, '2023_07_28_040259_create_profile_puskesmas_table', 1),
(8, '2023_07_29_043312_create_pegawai_table', 1),
(9, '2023_08_01_023352_create_berkas_layanan_publik', 1),
(10, '2023_08_01_043801_create_mekanisme_alur_table', 1),
(11, '2023_08_01_083902_create_sk_petugas_pengaduan_table', 1),
(12, '2023_08_02_034359_create_sk_kompensasi_table', 1),
(13, '2023_08_10_024442_create_standard_pelayanan_table', 1),
(14, '2023_08_10_024559_create_gambar_standard_pelayanan_table', 1),
(15, '2023_08_10_030051_create_jenis_pelayanan_table', 1),
(16, '2023_08_10_030111_create_gambar_jenis_pelayanan_table', 1),
(17, '2023_08_18_041037_create_publikasi_ikm_table', 1),
(18, '2023_08_21_020635_create_maklumat_pelayanan_table', 1),
(19, '2023_10_21_164504_create_informasi_puskesmas_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_jabatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_pegawai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_masyarakat`
--

CREATE TABLE `pengaduan_masyarakat` (
  `id_pengaduan_masyarakat` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pengaduan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengaduan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_puskesmas`
--

CREATE TABLE `profile_puskesmas` (
  `id_profile_puskesmas` bigint UNSIGNED NOT NULL,
  `sejarah_puskesmas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_profile_puskesmas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_struktur_puskesmas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publikasi_ikm`
--

CREATE TABLE `publikasi_ikm` (
  `id_publikasi_ikm` bigint UNSIGNED NOT NULL,
  `periode_tahun` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_bulan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_responden` bigint NOT NULL,
  `farmasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi_dan_mulut` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kia_kb_imunisasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laboratorium` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemeriksaan_khusus` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemeriksaan_umum` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendaftaran_rekam_medis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan_dan_gawat_darurat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_ikm` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sk_kompensasi`
--

CREATE TABLE `sk_kompensasi` (
  `id_sk_kompensasi` bigint UNSIGNED NOT NULL,
  `keterangan_sk_kompensasi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_sk_kompensasi` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sk_petugas_pengaduan`
--

CREATE TABLE `sk_petugas_pengaduan` (
  `id_sk_petugas_pengaduan` bigint UNSIGNED NOT NULL,
  `keterangan_sk_petugas_pengaduan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_sk_petugas_pengaduan` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `standard_pelayanan`
--

CREATE TABLE `standard_pelayanan` (
  `id_standard_pelayanan` bigint UNSIGNED NOT NULL,
  `judul_standard_pelayanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manual_token` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `username`, `password`, `level`, `last_login`, `manual_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Puskesmas', 'web_admin', '$2y$10$4TvUU5G1Aq/RPmAmi98lPu9X8THB1lsjadxb3Msv1xmk6aF8.6GcK', 'admin', '22-10-2023 00:11:11', '20230819', NULL, '2023-10-21 17:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id_visi_misi` bigint UNSIGNED NOT NULL,
  `judul_visi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_misi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `berkas_layanan_publik`
--
ALTER TABLE `berkas_layanan_publik`
  ADD PRIMARY KEY (`id_berkas_layanan_publik`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gambar_jenis_pelayanan`
--
ALTER TABLE `gambar_jenis_pelayanan`
  ADD PRIMARY KEY (`id_gambar_jenis_pelayanan`);

--
-- Indexes for table `gambar_standard_pelayanan`
--
ALTER TABLE `gambar_standard_pelayanan`
  ADD PRIMARY KEY (`id_gambar_standard_pelayanan`);

--
-- Indexes for table `informasi_puskesmas`
--
ALTER TABLE `informasi_puskesmas`
  ADD PRIMARY KEY (`id_informasi_puskesmas`);

--
-- Indexes for table `jenis_pelayanan`
--
ALTER TABLE `jenis_pelayanan`
  ADD PRIMARY KEY (`id_jenis_pelayanan`);

--
-- Indexes for table `maklumat_pelayanan`
--
ALTER TABLE `maklumat_pelayanan`
  ADD PRIMARY KEY (`id_maklumat_pelayanan`);

--
-- Indexes for table `mekanisme_alur`
--
ALTER TABLE `mekanisme_alur`
  ADD PRIMARY KEY (`id_mekanisme_alur`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengaduan_masyarakat`
--
ALTER TABLE `pengaduan_masyarakat`
  ADD PRIMARY KEY (`id_pengaduan_masyarakat`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profile_puskesmas`
--
ALTER TABLE `profile_puskesmas`
  ADD PRIMARY KEY (`id_profile_puskesmas`);

--
-- Indexes for table `publikasi_ikm`
--
ALTER TABLE `publikasi_ikm`
  ADD PRIMARY KEY (`id_publikasi_ikm`);

--
-- Indexes for table `sk_kompensasi`
--
ALTER TABLE `sk_kompensasi`
  ADD PRIMARY KEY (`id_sk_kompensasi`);

--
-- Indexes for table `sk_petugas_pengaduan`
--
ALTER TABLE `sk_petugas_pengaduan`
  ADD PRIMARY KEY (`id_sk_petugas_pengaduan`);

--
-- Indexes for table `standard_pelayanan`
--
ALTER TABLE `standard_pelayanan`
  ADD PRIMARY KEY (`id_standard_pelayanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id_visi_misi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berkas_layanan_publik`
--
ALTER TABLE `berkas_layanan_publik`
  MODIFY `id_berkas_layanan_publik` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar_jenis_pelayanan`
--
ALTER TABLE `gambar_jenis_pelayanan`
  MODIFY `id_gambar_jenis_pelayanan` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar_standard_pelayanan`
--
ALTER TABLE `gambar_standard_pelayanan`
  MODIFY `id_gambar_standard_pelayanan` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasi_puskesmas`
--
ALTER TABLE `informasi_puskesmas`
  MODIFY `id_informasi_puskesmas` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_pelayanan`
--
ALTER TABLE `jenis_pelayanan`
  MODIFY `id_jenis_pelayanan` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maklumat_pelayanan`
--
ALTER TABLE `maklumat_pelayanan`
  MODIFY `id_maklumat_pelayanan` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mekanisme_alur`
--
ALTER TABLE `mekanisme_alur`
  MODIFY `id_mekanisme_alur` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaduan_masyarakat`
--
ALTER TABLE `pengaduan_masyarakat`
  MODIFY `id_pengaduan_masyarakat` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_puskesmas`
--
ALTER TABLE `profile_puskesmas`
  MODIFY `id_profile_puskesmas` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publikasi_ikm`
--
ALTER TABLE `publikasi_ikm`
  MODIFY `id_publikasi_ikm` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_kompensasi`
--
ALTER TABLE `sk_kompensasi`
  MODIFY `id_sk_kompensasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_petugas_pengaduan`
--
ALTER TABLE `sk_petugas_pengaduan`
  MODIFY `id_sk_petugas_pengaduan` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard_pelayanan`
--
ALTER TABLE `standard_pelayanan`
  MODIFY `id_standard_pelayanan` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id_visi_misi` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
