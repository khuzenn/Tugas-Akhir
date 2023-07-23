-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Jul 2023 pada 19.37
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jabarr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2e841f28491f4b7c492930fb6c09b8a1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', 1554634874, 'a:7:{s:9:\"user_data\";s:0:\"\";s:9:\"site_lang\";s:7:\"english\";s:7:\"user_id\";s:1:\"1\";s:8:\"username\";s:4:\"iiky\";s:6:\"status\";s:1:\"1\";s:5:\"roles\";a:1:{i:0;a:4:{s:7:\"role_id\";s:1:\"1\";s:4:\"role\";s:5:\"admin\";s:4:\"full\";s:13:\"Administrator\";s:7:\"default\";s:1:\"0\";}}s:12:\"user_profile\";a:13:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:16:\"Tintapuccino CMS\";s:6:\"gender\";s:1:\"m\";s:13:\"tanggal_lahir\";s:10:\"0000-00-00\";s:6:\"alamat\";s:0:\"\";s:4:\"kota\";s:0:\"\";s:12:\"tentang_saya\";s:0:\"\";s:4:\"foto\";s:12:\"no_image.jpg\";s:3:\"dob\";s:10:\"0000-00-00\";s:7:\"country\";s:0:\"\";s:8:\"timezone\";s:0:\"\";s:7:\"website\";s:0:\"\";s:8:\"modified\";s:19:\"2018-07-17 22:15:44\";}}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_menu_parent` int(11) NOT NULL,
  `nama_menu` varchar(70) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `kategori` enum('Controller','Link') NOT NULL,
  `href` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `sort` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_menu_parent`, `nama_menu`, `icon`, `kategori`, `href`, `status`, `sort`) VALUES
(1, 7, 'Pengaturan Pengguna', 'fal fa-circle', 'Controller', '', 'Y', '1'),
(2, 37, 'Pengaturan Pengguna', '', 'Controller', 'Usersmanagement', 'Y', '1'),
(3, 1, 'Pengaturan Hak Akses', '', 'Controller', 'Roles', 'Y', '2'),
(6, 7, 'Pengaturan Menu', 'fal fa-circle', 'Controller', 'Menu', 'Y', '2'),
(7, 0, 'Pengaturan', 'fal fa-cogs', 'Controller', '', 'Y', '2'),
(8, 1, 'Pengaturan Modul', '', 'Controller', 'Permission', 'Y', '3'),
(9, 0, 'Dashboard', 'fal fa-home', 'Controller', 'Dashboard', 'Y', '1'),
(21, 0, 'Access Point', 'fal fa-location', 'Controller', '', 'Y', '1'),
(23, 0, 'Kabkot/AP Group', 'fal fa-layer-group', 'Controller', '', 'Y', '1'),
(26, 23, 'Kabkot/AP Group Input', '', 'Controller', 'kabkot-group-input', 'Y', '2'),
(27, 23, 'Kabkot/AP Group List', '', 'Controller', 'kabkot-group-list', 'Y', '3'),
(31, 0, 'Slider', 'fal fa-table', 'Controller', '', 'Y', '1'),
(32, 31, 'Slider Input', '', 'Controller', 'slider-input', 'Y', '2'),
(33, 31, 'Slider List', '', 'Controller', 'slider-list', 'Y', '3'),
(37, 0, 'Pengguna Web', 'fal fa-user', 'Controller', '', 'Y', '1'),
(38, 37, 'Daftar Pengguna Web', '', 'Controller', 'user-web-list', 'Y', '2'),
(40, 21, 'Access Point Input', '', 'Controller', 'access-point-input', 'Y', '2'),
(41, 21, 'Access Point List', '', 'Controller', 'access-point-list', 'Y', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `overrides`
--

CREATE TABLE `overrides` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` smallint(5) UNSIGNED NOT NULL,
  `allow` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` smallint(5) UNSIGNED NOT NULL,
  `permission` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`permission_id`, `permission`, `description`, `parent`, `sort`) VALUES
(2, 'Menu', 'Menu Management', NULL, NULL),
(3, 'Permission', 'Permission Management', NULL, NULL),
(4, 'Roles', 'Role Management', NULL, NULL),
(5, 'Usersmanagement', 'User Management', NULL, NULL),
(6, 'Dashboard', 'Dashboard', NULL, NULL),
(16, 'access-point-input', 'Access Point Input', NULL, NULL),
(19, 'kabkot-group-list', 'Kabkot/AP Group List', NULL, NULL),
(22, 'kabkot-group-input', 'Kabkot/AP Group Input', NULL, NULL),
(25, 'slider-input', 'Slider Input', NULL, NULL),
(26, 'slider-list', 'Slider List', NULL, NULL),
(27, 'user-web-input', 'User Web Input', NULL, NULL),
(28, 'user-web-list', 'User Web List', NULL, NULL),
(29, 'access-point-list', 'Access Point List', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `full` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`role_id`, `role`, `full`, `default`) VALUES
(1, 'Admin', 'Administrator', 1),
(2, 'User', 'User', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `permission_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 15),
(1, 16),
(1, 19),
(1, 22),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(2, 6),
(2, 19),
(2, 26),
(2, 28),
(2, 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_access_point`
--

CREATE TABLE `tb_access_point` (
  `id` int(11) NOT NULL,
  `ap_name_url` varchar(255) NOT NULL,
  `ap_name` varchar(100) NOT NULL,
  `ap_group` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `mac_address` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_access_point`
--

INSERT INTO `tb_access_point` (`id`, `ap_name_url`, `ap_name`, `ap_group`, `alamat`, `kota`, `latitude`, `longitude`, `mac_address`, `ip_address`) VALUES
(29, 'tmnsurkawKCiamis', 'Taman Surawisesa Kawali', 'PEMKAB CIAMIS', 'Kawali, Kec. Kawali, Kabupaten Ciamis, Jawa Barat 46253', 'KABUPATEN CIAMIS', '-7.18583642', '108.36931043', '-', '-'),
(30, 'dharmawanita', 'DHARMA WANITA PERSATUAN PROV JABAR', 'KOMINFO JABAR', 'JL. TAMANSARI NO.57, LB. SILIWANGI, KEC. BANDUNG WETAN, KOTA BANDUNG, JAWA BARAT 40132', 'KOTA BANDUNG', '-6.895918', '107.609241', '4C-EF-56-01-84-99', '103.147.222.19'),
(31, 'tamanperpusKB', 'TAMAN PERPUSTAKAAN', 'PEMKAB BANDUNG', 'Komplek Pemkab Bandung', 'KABUPATEN BANDUNG', '-7.022563', '107.529533', '4C-EF-56-01-83-B5', '103.147.222.19'),
(32, 'dpmptspKB', 'DPMPTSP KABUPATEN BANDUNG', 'PEMKAB BANDUNG', 'Komplek perkantoran Pemkab Bandung jalan raya Soreang pamekaran soreang', 'KABUPATEN BANDUNG', '-7.022562', '107.529528', '9C-3A-9A-04-C5-56', '103.147.222.19'),
(33, 'disdukcapilKB', 'DISDUKCAPIL SOREANG', 'PEMKAB BANDUNG', 'Komplek Pemkab Bandung', 'KABUPATEN BANDUNG', '-7.024649', '107.527057', '9C-3A-9A-04-C1-E3', '103.147.222.19'),
(34, 'munara99KB', 'MPP MUNARA 99', 'PEMKAB BANDUNG', 'Kawasan Sabilulungan Kab. Bandung', 'KABUPATEN BANDUNG', '-7.020434', '107.529601', '9C-3A-9A-04-C3-F4', '103.147.222.19'),
(35, 'alun2cililinKBB', 'ALUN ALUN CILILIN', 'PEMKAB BANDUNG BARAT', 'Jl. Raya Cililin, Cililin, Kabupaten Bandung Barat, Jawa Barat 40562,', 'KABUPATEN BANDUNG BARAT', '-6.951445', '107.456942', '4C-EF-56-01-83-AB', '103.147.222.19'),
(36, 'alun2lembangKBB', 'ALUN ALUN LEMBANG', 'PEMKAB BANDUNG BARAT', 'Jl. Raya Lembang, Kayuambon, Lembang, Kabupaten Bandung Barat, Jawa Barat 40391', 'KABUPATEN BANDUNG BARAT', '-6.8121', '107.618774', '4C-EF-56-01-85-93', '103.147.222.19'),
(37, 'alun2cipendeuyKBB', 'ALUN2 CIPENDEUY', 'PEMKAB BANDUNG BARAT', 'Cipeundeuy, jawa barat', 'KABUPATEN BANDUNG BARAT', '-6.741095', '107.36109', '4C-EF-56-01-83-96', '103.147.222.19'),
(38, 'kirKBB', 'KIR BANDUNG', 'PEMKAB BANDUNG BARAT', 'Ciburuy, Padalarang, West Bandung Regency, West Java 40553', 'KABUPATEN BANDUNG BARAT', '-6.81691', '107.47302', '9C-3A-9A-04-CE-07', '103.147.222.19'),
(39, 'grahapariwisataKBek', 'GRAHA PARIWISATA DI CIKARANG TIMUR', 'PEMKAB BEKASI', 'Jl. Science Boulevard, Sertajaya, Kec. Cikarang Tim., Bekasi, Jawa Barat 17530', 'KABUPATEN BEKASI', '-6.310163', '107.180561', '9C-3A-9A-02-70-1B', '103.147.222.19'),
(40, 'perpusKBek', 'PERPUSTAKAAN BEKASI', 'PEMKAB BEKASI', 'Jl. Gatot Subroto No.5, Karangasih, Kec. Cikarang Utara, Bekasi, Jawa Barat 17530', 'KABUPATEN BEKASI', '-6.256149', '107.149344', '9C-3A-9A-02-70-87', '103.147.222.19'),
(41, 'tamanareajoeng45KBek', 'TAMAN AREA GEDUNG JOENG 45', 'PEMKAB BEKASI', 'Tambun', 'KABUPATEN BEKASI', '-6.25703', '107.037755', '9C-3A-9A-02-6D-62', '103.147.222.19'),
(42, 'tamanaspirasidprpKBek', 'TAMAN ASPIRASI KOMPLEK GEDUNG DPRD KAB. BEKASI', 'PEMKAB BEKASI', 'Cikarang Pusat, Sukamahi, Cikarang, Bekasi, Jawa Barat 17530', 'KABUPATEN BEKASI', '-6.367278', '107.173475', '9C-3A-9A-04-C5-DD', '103.147.222.19'),
(43, 'psrpancasila1Tsk', 'Pasar Pancasila 1', 'PEMKOT TASIKMALAYA', 'Jl. Ps. Pancasila, Lengkongsari, Kec. Tawang, Kab. Tasikmalaya, Jawa Barat 46111', 'KOTA TASIKMALAYA', '-7.32563561', '108.22851173', '-', '-'),
(44, 'alun2pamaricanKCiamis', 'ALUN ALUN KECAMATAN PAMARICAN', 'PEMKAB CIAMIS', '103.147.222.19', 'KABUPATEN CIAMIS', '-7.457343', '108.523604', '4C-EF-56-01-84-63', '103.147.222.19'),
(45, 'alun2panumbanganKCiamis', 'ALUN ALUN KECAMATAN PANUMBANGAN', 'PEMKAB CIAMIS', 'Alun-Alun Panumbangan', 'KABUPATEN CIAMIS', '-7.160224', '108.202634', '4C-EF-56-01-85-84', '103.147.222.19'),
(46, 'situlengkongKCiamis', 'OBJEK WISATA SITU LENGKONG KECAMATAN PANJALU', 'PEMKAB CIAMIS', 'Jalan Pasanggrahan Dusun Cukang Padung RT. 10 RW. 05 Desa Panjalu Kecamatan Panjalu Kabupaten Ciamis', 'KABUPATEN CIAMIS', '-7.131546', '108.267865', '4C-EF-56-01-85-8E', '103.147.222.19'),
(47, 'uptdkehutwil1KCiamis', 'UPTD KEHUTANAN WIL 7 CIAMIS', 'PEMKAB CIAMIS', 'Jl. Koperasi No.77, Kertasari, Kec. Ciamis, Kabupaten Ciamis, Jawa Barat 46213', 'KABUPATEN CIAMIS', '-7.330936', '108.359395', '9C-3A-9A-02-70-9B', '103.147.222.19'),
(48, 'uptdkehutwil2KCiamis', 'UPTD KEHUTANAN WIL 7 CIAMIS 2', 'PEMKAB CIAMIS', 'Jl. Koperasi No.77, Kertasari, Kec. Ciamis, Kabupaten Ciamis, Jawa Barat 46213', 'KABUPATEN CIAMIS', '-7.330881', '108.359438', '9C-3A-9A-02-70-6F', '103.147.222.19'),
(49, 'makamcigundulKCian', 'MAKAM CIKUNDUL CIANJUR', 'PEMKAB CIANJUR', 'Cijagang, Kec. Cikalongkulon, Kabupaten Cianjur, Jawa Barat 43291', 'KABUPATEN CIANJUR', '-6.700528', '107.181338', '4C-EF-56-01-81-64', '103.147.222.19'),
(50, 'pasarcipanasKCian', 'PASAR CIPANAS CIANJUR', 'PEMKAB CIANJUR', 'Cipanas, Kec. Cipanas, Kabupaten Cianjur, Jawa Barat 43253', 'KABUPATEN CIANJUR', '-6.73072', '107.040334', '9C-3A-9A-02-70-07', '103.147.222.19'),
(51, 'pasarumkmKCian', 'PASAR UMKM CIBODAS', 'PEMKAB CIANJUR', 'Jl. Kebun Raya Cibodas, Sindangjaya, Kec. Cipanas, Kabupaten Cianjur, Jawa Barat 43253', 'KABUPATEN CIANJUR', '-6.732905', '107.009702', '9C-3A-9A-02-70-99', '103.147.222.19'),
(52, 'rsudKCian', 'RSUD CIANJUR', 'PEMKAB CIANJUR', 'Jl. Suroso No.38, Solokpandan, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43214', 'KABUPATEN CIANJUR', '-6.818884', '107.140661', '9C-3A-9A-04-C6-40', '103.147.222.19'),
(53, 'termpasirhayamKCian', 'TERMINAL PASIR HAYAM', 'PEMKAB CIANJUR', 'Jl. Lingkar Selatan, Cianjur', 'KABUPATEN CIANJUR', '-6.846255', '107.131275', '9C-3A-9A-02-6D-88', '103.147.222.19'),
(54, 'batiktrusmiKCir', 'BATIK TRUSMI CIREBON', 'PEMKAB CIREBON', 'Trusmi Kecamatan Plered Cirebon', 'KABUPATEN CIREBON', '-6.704043', '108.504596', '9C-3A-9A-02-70-05', '103.147.222.19'),
(55, 'hkotasumberKCir', 'HUTAN KOTA SUMBER', 'PEMKAB CIREBON', 'Jl. Raden Dewi Sartika 130 Kecamatan Sumber', 'KABUPATEN CIREBON', '-6.758031', '108.481001', '4C-EF-56-01-85-14', '103.147.222.19'),
(56, 'mkmsunanjatiKCir', 'MAKAM SUNAN GUNUNGJATI', 'PEMKAB CIREBON', 'Desa Astana Kecamatan Gunungjati Cirebon', 'KABUPATEN CIREBON', '-6.672225', '108.54041', '9C-3A-9A-02-6F-A8', '103.147.222.19'),
(57, 'masjidsumberKCir', 'MASJID AGUNG SUMBER CIREBON', 'PEMKAB CIREBON', 'Kelurahan Sumber Kecamatan Sumber Cirebon', 'KABUPATEN CIREBON', '-6.763655', '108.478635', '9C-3A-9A-02-70-69', '103.147.222.19'),
(58, 'tmnpkksumberKCir', 'TAMAN PKK SUMBER', 'PEMKAB CIREBON', 'Jl. Rade Dewi Sartika 153 Kecamatan Sumber', 'KABUPATEN CIREBON', '-6.758597', '108.479576', '4C-EF-56-01-83-E1', '103.147.222.19'),
(59, 'termsumberKCir', 'TERMINAL SUMBER CIREBON', 'PEMKAB CIREBON', 'KELURAHAN SUMBER KECAMATAN SUMBER CIREBON', 'KABUPATEN CIREBON', '-6.7589', '108.48249', '9C-3A-9A-02-70-9E', '103.147.222.19'),
(60, 'wisatarotansumberKCir', 'WISATA ROTTAN CIREBON', 'PEMKAB CIREBON', 'DESA TEGALWANGI KECAMATAN WERU CIREBON', 'KABUPATEN CIREBON', '-6.70786', '108.489772', '4C-EF-56-01-85-9C', '103.147.222.19'),
(61, 'tmnpelangimaktalKGar', 'TAMAN PELANGI MAKTAL', 'PEMKAB GARUT', 'Jl. Cimanuk', 'KABUPATEN GARUT', '-7.219235', '107.900138', '4C-EF-56-01-83-9E', '103.147.222.19'),
(62, 'socialcenterKGar', 'SOCIAL CENTER', 'PEMKAB GARUT', 'Jl. Terusan Pahlawan', 'KABUPATEN GARUT', '-7.198034', '107.883073', '9C-3A-9A-04-CE-27', '103.147.222.19'),
(63, 'situcangkuangKGar', 'SITU CANGKUANG', 'PEMKAB GARUT', 'Jl. Raya Cangkuang', 'KABUPATEN GARUT', '-7.101037', '107.919661', '9C-3A-9A-04-C5-A3', '103.147.222.19'),
(64, 'alun2KIndr', 'ALUN - ALUN INDRAMAYU', 'PEMKAB INDRAMAYU', 'Jl. Mayjen Sutoyo Indramayu', 'KABUPATEN INDRAMAYU', '-6.326813', '108.32252', '9C-3A-9A-02-6B-23', '103.147.222.19'),
(65, 'karwiltmnpramukaKIndr', 'KANTOR KWARTIR CABANG INDRAMAYU TAMAN PRAMUKA', 'PEMKAB INDRAMAYU', 'Jl. Tridaya Barat No. 02', 'KABUPATEN INDRAMAYU', '-6.335132', '108.32868', '9C-3A-9A-04-C5-82', '103.147.222.19'),
(66, 'pasarmamboKIndr', 'PASAR MAMBO', 'PEMKAB INDRAMAYU', 'Jl. Ahmad Yani Indramayu 45212', 'KABUPATEN INDRAMAYU', '-6.329735', '108.32705', '9C-3A-9A-04-CE-1F', '103.147.222.19'),
(67, 'rthjatibarangKIndr', 'RUANG TERBUKA HIJAU JATIBARANG', 'PEMKAB INDRAMAYU', 'Kec. Jatibarang Indramayu', 'KABUPATEN INDRAMAYU', '-6.472668', '108.304798', '9C-3A-9A-02-6F-E8', '103.147.222.19'),
(68, 'yydaibahtiarKIndr', 'YAYASAN DAI BAHTIAR', 'PEMKAB INDRAMAYU', 'Desa Krimun Kec. Losarang Indramayu', 'KABUPATEN INDRAMAYU', '-6.396712', '108.156235', '4C-EF-56-01-85-99', '103.147.222.19'),
(69, 'candijiwaKKrw', 'CANDI JIWA KARAWANG', 'PEMKAB KARAWANG', 'Segaran, Batujaya, Kabupaten Karawang, Jawa Barat 41354', 'KABUPATEN KARAWANG', '-6.056952', '107.1573', '4C-EF-56-01-85-90', '103.147.222.19'),
(70, 'grencanyonKKrw', 'GREEN CANYON KARAWANG', 'PEMKAB KARAWANG', 'Medalsari, Pangkalan, Kabupaten Karawang, Jawa Barat 41362', 'KABUPATEN KARAWANG', '-6.542703', '107.177254', '4C-EF-56-01-85-80', '103.147.222.19'),
(71, 'mkmsyechquroKKrw', 'MAKAM SYECHQURO', 'PEMKAB KARAWANG', 'Kampung Pulobata, Pulokelapa, Lemahabang, Kabupaten Karawang, Jawa Barat 41383', 'KABUPATEN KARAWANG', '-6.251353', '107.481454', '9C-3A-9A-02-6B-18', '103.147.222.19'),
(72, 'monrawagedeKKrw', 'MONUMEN RAWA GEDE', 'PEMKAB KARAWANG', 'Jl. Monumen Rawagede Mekarjaya Rawamerta Kabupaten Karawang 41382', 'KABUPATEN KARAWANG', '-6.238426', '107.326691', '9C-3A-9A-02-6F-E5', '103.147.222.19'),
(73, 'pparamartaKKun', 'PANDAPA PARAMARTA', 'PEMKAB KUNINGAN', 'Kuningan, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45511', 'KABUPATEN KUNINGAN', '-6.976297', '108.484042', '4C-EF-56-01-85-77', '103.147.222.19'),
(74, 'rsud45KKun', 'RSUD 45 KUNINGAN', 'PEMKAB KUNINGAN', 'Jl. Jend. Sudirman No.68 Kuningan', 'KABUPATEN KUNINGAN', '-6.984351', '108.481419', '9C-3A-9A-02-6B-58', '103.147.222.19'),
(75, 'tmncirendangKKun', 'TAMAN CIRENDANG KUNINGAN', 'PEMKAB KUNINGAN', 'Jl. Siliwangi, Cirendang, Kuningan, Kecamatan Kuningan, Kabupaten Kuningan', 'KABUPATEN KUNINGAN', '-6.952848', '108.488117', '4C-EF-56-01-85-9F', '103.147.222.19'),
(76, 'tmndahliaKKun', 'TAMAN DAHLIA', 'PEMKAB KUNINGAN', 'Jl. Siliwangi No.88 (Depan Kantor Bupati Kuningan)', 'KABUPATEN KUNINGAN', '-6.977315', '108.473994', '4C-EF-56-01-82-78', '103.147.222.19'),
(77, 'tmnkertawangunKKun', 'TAMAN KERTAWANGUN', 'PEMKAB KUNINGAN', 'Desa Kertawangun Kecamatan Sindangagung, Kabupaten Kuningan', 'KABUPATEN KUNINGAN', '-6.973794', '108.525568', '4C-EF-56-01-85-9B', '103.147.222.19'),
(78, 'tmnkotaKKun', 'TAMAN KOTA KUNINGAN', 'PEMKAB KUNINGAN', '-', 'KABUPATEN KUNINGAN', '-6.982541', '108.476339', '4C-EF-56-01-85-1D', '103.147.222.19'),
(79, 'wadukdarmaKKun', 'WADUK DARMA', 'PEMKAB KUNINGAN', 'Jl. Raya Kuningan - Cikijing', 'KABUPATEN KUNINGAN', '-7.012927', '108.40925', '4C-EF-56-01-83-C1', '103.147.222.19'),
(80, 'alun2KMjl', 'ALUN-ALUN MAJALENGKA', 'PEMKAB MAJALENGKA', 'Jl.Ahmad Yani, Majalengka Kulon Kec.Majalengka Kab.Majalengka', 'KABUPATEN MAJALENGKA', '-6.834857', '108.227467', '4C-EF-56-01-83-B9', '103.147.222.19'),
(81, 'psrraharjamunjulKMjl', 'PASAR RAHARJA BUNDARAN MUNJUL', 'PEMKAB MAJALENGKA', 'Jl. K.H.Abdul Halim No.69, Munjul, Kec. Majalengka, Kabupaten Majalengka', 'KABUPATEN MAJALENGKA', '-6.8313', '108.207798', '4C-EF-56-01-83-C2', '103.147.222.19'),
(82, 'pujaseraticKMjl', 'PUJASERA MAJALENGKA GEDUNG TIC', 'PEMKAB MAJALENGKA', 'Jl.KH.Abdul Halim, Majalengka Wetan Kec. Majalengka, Kabupaten Majalengka', 'KABUPATEN MAJALENGKA', '-6.835365', '108.232744', '9C-3A-9A-02-6B-CF', '103.147.222.19'),
(83, 'tmnggmKMlj', 'TAMAN GGM MAJALENGKA', 'PEMKAB MAJALENGKA', 'Jl. KH. Abdul Halim, Majalengka Kulon Kec.Majalengka Kab.Majalengka', 'KABUPATEN MAJALENGKA', '-6.832556', '108.215518', '4C-EF-56-01-83-A3', '103.147.222.19'),
(84, 'witaparalayangKMjl', 'WISATA PARALAYANG MAJALENGKA', 'PEMKAB MAJALENGKA', 'Sidamukti, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45417', 'KABUPATEN MAJALENGKA', '-6.846005', '108.203608', '4C-EF-56-01-83-B3', '103.147.222.19'),
(85, 'alun2parigiKPng', 'ALUN-ALUN PARIGI', 'PEMKAB PANGANDARAN', 'Kec. Parigi', 'KABUPATEN PANGANDARAN', '-7.735138', '108.456519', '9C-3A-9A-04-C5-20', '103.147.222.19'),
(86, 'batukarasKPng', 'BATU KARAS PANGANDARAN', 'PEMKAB PANGANDARAN', 'Kec Cijulang', 'KABUPATEN PANGANDARAN', '-7.737642', '108.497578', '9C-3A-9A-04-C5-7F', '103.147.222.19'),
(87, 'gcanyonKPng', 'GREEN CANYON', 'PEMKAB PANGANDARAN', 'Jl. Raya Cijulang – Green Canyon Pangandaran, RT.02/RW. 10, Cijulang, Kabupaten Ciamis, Jawa Barat 46394', 'KABUPATEN PANGANDARAN', '-7.734481', '108.45709', '9C-3A-9A-04-C4-C3', '103.147.222.19'),
(88, 'creativespaceKPng', 'PANGANDARAN CREATIVE SPACE', 'PEMKAB PANGANDARAN', 'Kec. Pangandaran', 'KABUPATEN PANGANDARAN', '-7.722112', '108.474244', '9C-3A-9A-04-C6-1F', '103.147.222.19'),
(89, 'tmnairmancurKPng', 'TAMAN AIR MANCUR PANGANDARAN', 'PEMKAB PANGANDARAN', 'Kec. Pangandaran', 'KABUPATEN PANGANDARAN', '-7.703137', '108.658428', '4C-EF-56-01-83-B6', '103.147.222.19'),
(90, 'tmnsunsetKPng', 'TAMAN SUNSET PANGANDARAN', 'PEMKAB PANGANDARAN', 'Kec. Pangandaran', 'KABUPATEN PANGANDARAN', '-7.695653', '108.657986', '4C-EF-56-01-83-AD', '103.147.222.19'),
(91, 'tourismcenterKPng', 'TOURISM INFROMATION CENTER', 'PEMKAB PANGANDARAN', 'Kec. Pangandaran', 'KABUPATEN PANGANDARAN', '-7.697258', '108.658926', '9C-3A-9A-04-C6-52', '103.147.222.19'),
(92, 'tmnmayaKPwt', 'TAMAN MAYA DATAR PEMDA PURWAKARTA', 'PEMKAB PURWAKARTA', 'Jln. Gandanegara No. 25 Purwakarta', 'KABUPATEN PURWAKARTA', '-6.556445', '107.442858', '9C-3A-9A-02-6F-EA', '103.147.222.19'),
(93, 'tmnkatresnaKPwt', 'TAMAN KATRESNA PEMDA PURWAKARTA', 'PEMKAB PURWAKARTA', 'Jln. Gandanegara No. 25 Purwakarta', 'KABUPATEN PURWAKARTA', '-6.556445', '107.442858', '9C-3A-9A-02-70-8B', '103.147.222.19'),
(94, 'tmnsribadugaKPwt', 'TAMAN SRIBADUGA', 'PEMKAB PURWAKARTA', 'Kel. Nagri Kidul, Kec.Purwakarta, Kabupaten Purwakarta', 'KABUPATEN PURWAKARTA', '-6.557698', '107.44709', '4C-EF-56-01-83-B8', '103.147.222.19'),
(95, 'tmnsurawisesaKPwt', 'TAMAN CERDAS SURAWISESA', 'PEMKAB PURWAKARTA', 'Jl.KK Singawinata, Nagri Tengah, Kec.Purwakarta, Kabupaten Purwakarta', 'KABUPATEN PURWAKARTA', '-6.554037', '107.44593', '4C-EF-56-01-81-FA', '103.147.222.19'),
(96, 'termciganeaKPwt', 'TERMINAL CIGANEA', 'PEMKAB PURWAKARTA', 'Jl.Kp.Babakan Bunder No 76, Bunder Kec.Jatiluhur, Kabupaten Purwakarta', 'KABUPATEN PURWAKARTA', '-6.561269', '107.429685', '4C-EF-56-01-83-C0', '103.147.222.19'),
(97, 'gorpbsiKSub', 'GOR PBSI SUBANG', 'PEMKAB SUBANG', 'Pasirkareumbi, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', 'KABUPATEN SUBANG', '-6.575514', '107.76445', '4C-EF-56-01-83-AF', '103.147.222.19'),
(98, 'kolamciheuleutKSub', 'KOLAM RENANG CIHEULEUT', 'PEMKAB SUBANG', 'Jalan Emo Kurniaatmaja, Pasirkareumbi, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', 'KABUPATEN SUBANG', '-6.578459', '107.773913', '4C-EF-56-01-84-4F', '103.147.222.19'),
(99, 'rsudKSub', 'RUMAH SAKIT UMUM DAERAH KABUPATEN SUBANG', 'PEMKAB SUBANG', 'Jl. Brigjen Katamso No.37, Dangdeur, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', 'KABUPATEN SUBANG', '-6.557929', '107.746884', '9C-3A-9A-02-70-23', '103.147.222.19'),
(100, 'tmnkodim0605KSub', 'TAMAN TERITORIAL KODIM 0605 SUBANG', 'PEMKAB SUBANG', 'Jl. Ukong Sutaatmaja No.37, Karanganyar, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', 'KABUPATEN SUBANG', '-6.557559', '107.764428', '4C-EF-56-01-85-9E', '103.147.222.19'),
(101, 'tugubentengpancasilaKSub', 'TUGU BENTENG PANCASILA ALUN ALUN SUBANG', 'PEMKAB SUBANG', 'Jl. RA Wangsa Ghofarana No.2, Karanganyar, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', 'KABUPATEN SUBANG', '-6.572564', '107.760911', '4C-EF-56-01-85-91', '103.147.222.19'),
(102, 'alun2cicurugKSkb', 'ALUN-ALUN KECAMATAN CICURUG', 'PEMKAB SUKABUMI', 'Cicurug, Kec. Cicurug, Sukabumi Regency, Jawa Barat 43359', 'KABUPATEN SUKABUMI', '-6.782906', '106.7826', '9C-3A-9A-02-70-6B', '103.147.222.19'),
(103, 'witaairpanascisolokKSkb', 'KAWASAN WISATA AIR PANAS CISOLOK', 'PEMKAB SUKABUMI', 'Cikahuripan, Cisolok, Sukabumi', 'KABUPATEN SUKABUMI', '-6.933898', '106.453509', '9C-3A-9A-04-C8-56', '103.147.222.19'),
(104, 'witacurugcimarinjungKSkb', 'OBJEK WISATA CURUG CIMARINJUNG', 'PEMKAB SUKABUMI', 'Jl. Jurug cimarinjung Ciemas sukabumi', 'KABUPATEN SUKABUMI', '-7.170566', '106.472014', '4C-EF-56-01-83-BE', '103.147.222.19'),
(105, 'witacurugsodonsKSkb', 'OBJEK WISATA CURUG SODONS', 'PEMKAB SUKABUMI', 'Komplek geopark ciletuh', 'KABUPATEN SUKABUMI', '-7.18578', '106.497757', '4C-EF-56-01-85-34', '103.147.222.19'),
(106, 'witaugentengKSkb', 'OBJEK WISATA UJUNG GENTENG', 'PEMKAB SUKABUMI', 'Jl. Ujung genteng kec. Ciracap kab. Sukabumi', 'KABUPATEN SUKABUMI', '-7.37267', '106.400657', '4C-EF-56-01-81-63', '103.147.222.19'),
(107, 'pcitepusKSkb', 'PANTAI CITEPUS KAB SUKABUMI', 'PEMKAB SUKABUMI', 'Citepus, Pelabuhan Ratu', 'KABUPATEN SUKABUMI', '-6.977199', '106.530293', '4C-EF-56-01-84-DE', '103.147.222.19'),
(108, 'puncakdharmaKSkb', 'PUNCAK DHARMA KAB SUKABUMI', 'PEMKAB SUKABUMI', 'Girimukti Ciemas Sukabumi Jawa barat', 'KABUPATEN SUKABUMI', '-7.167371', '106.47181', '4C-EF-56-01-84-51', '103.147.222.19'),
(109, 'tmnyamahapratuKSkb', 'TAMAN YAMAHA POLRES PELABUHANRATU DEKAT SMPN 3', 'PEMKAB SUKABUMI', '-', 'KABUPATEN SUKABUMI', '-6.978976', '106.54772', '4C-EF-56-01-82-C4', '103.147.222.19'),
(110, 'dusunnanjungKSmd', 'DUSUN NANJUNG', 'PEMKAB SUMEDANG', 'Dusun Nanjung Rt. 02 Rw.02 Desa Nanjungwangi Kec. Surian', 'KABUPATEN SUMEDANG', '-6.594672', '107.881255', '9C-3A-9A-04-C5-A9', '103.147.222.19'),
(111, 'alun2KSmd', 'ALUN-ALUN SUMEDANG', 'PEMKAB SUMEDANG', 'Jl. Rancakalong kab. Sumedang', 'KABUPATEN SUMEDANG', '-6.860082', '107.920003', '4C-EF-56-01-85-26', '103.147.222.19'),
(112, 'pkmcimala2KSmd', 'AREA PUSKESMAS CIMALAKA 2', 'PEMKAB SUMEDANG', 'Jl. Raya Cimalaka Cipadung No.14, Licin, Kec. Cimalaka, Kabupaten Sumedang', 'KABUPATEN SUMEDANG', '-6.8095', '107.949603', '9C-3A-9A-04-C6-06', '103.147.222.19'),
(113, 'posyandurw06KSmd', 'POSYANDU RW 06', 'PEMKAB SUMEDANG', '-', 'KABUPATEN SUMEDANG', '-6.855277', '107.926622', '9C-3A-9A-04-C2-65', '103.147.222.19'),
(114, 'tnjngmedalKSmd', 'TANJUNG MEDAL SUMEDANG', 'PEMKAB SUMEDANG', 'Jingkang, Tanjungmedar, Kab. Sumedang, Jawa Barat 45354', 'KABUPATEN SUMEDANG', '-6.765491', '107.841412', '9C-3A-9A-02-70-96', '103.147.222.19'),
(115, 'alun2cibalongKTsk', 'ALUN-ALUN KECAMATAN CIBALONG', 'PEMKAB TASIKMALAYA', '-', 'KABUPATEN TASIKMALAYA', '-7.514203', '108.183253', '4C-EF-56-01-85-5D', '103.147.222.19'),
(116, 'alun2cikatomasKTsk', 'ALUN-ALUN KECAMATAN CIKATOMAS', 'PEMKAB TASIKMALAYA', 'Jl. Raya Cikatomas No.216, Pakemitan, Cikatomas, Tasikmalaya, Jawa Barat 46193', 'KABUPATEN TASIKMALAYA', '-7.622701', '108.257649', '4C-EF-56-01-83-F1', '103.147.222.19'),
(117, 'kecculamegaKTsk', 'KECAMATAN CULAMEGA TASIKMALAYA', 'PEMKAB TASIKMALAYA', 'Empangsari, Tawang, Tasikmalaya, West Java 46113', 'KABUPATEN TASIKMALAYA', '-7.611076', '108.051547', '4C-EF-56-01-81-61', '103.147.222.19'),
(118, 'kecpancatengahKTsk', 'KECAMATAN PANCATENGAH TASIKMALAYA', 'PEMKAB TASIKMALAYA', 'Kp. Sindangjaya RT/RW : 02/01, Jayamukti, Pancatengah, Tasikmalaya, Jawa Barat 46194', 'KABUPATEN TASIKMALAYA', '-7.658175', '108.271902', '4C-EF-56-01-83-A4', '103.147.222.19'),
(119, 'rssmcKTsk', 'RUMAH SAKIT SMC KAB TASIKMALAYA', 'PEMKAB TASIKMALAYA', 'Jl. Raya Rancamaya Cikunten Singaparna', 'KABUPATEN TASIKMALAYA', '-7.358515', '108.106762', '9C-3A-9A-04-C8-6C', '103.147.222.19'),
(120, 'witasitugedeKTsk', 'WISATA SITU GEDE TASIKMALAY', 'PEMKAB TASIKMALAYA', 'Jl. Situ Gede, Kel. Linggajaya, Kec. Mangkubumi, Tasikmalaya, Jawa Barat 46181', 'KABUPATEN TASIKMALAYA', '-7.336037', '108.190085', '4C-EF-56-01-85-7B', '103.147.222.19'),
(121, 'gorsaparuaoutBdg', 'GOR SAPARUA OUTDOOR', 'PEMKOT BANDUNG', 'Jl. Banda No.28, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', 'KOTA BANDUNG', '-6.907451', '107.61697', '4C-EF-56-01-85-4C', '103.147.222.19'),
(122, 'gorsaparuain1Bdg', 'GOR SAPARUA INDOOR', 'PEMKOT BANDUNG', 'Jl. Banda No.28, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', 'KOTA BANDUNG', '-6.907585', '107.617038', '9C-3A-9A-04-C4-54', '103.147.222.19'),
(123, 'gorsaparuain2Bdg', 'GOR SAPARUA INDOOR 2', 'PEMKOT BANDUNG', 'Jl. Banda No.28, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', 'KOTA BANDUNG', '-6.907819', '107.615743', '9C-3A-9A-04-C5-65', '103.147.222.19'),
(124, 'jabarquickpkopiBdg', 'KANTOR JABAR QUICK RESPONS PECAH KOPI', 'PEMKOT BANDUNG', 'Jl. Pecah Kopi no. 24. Sukaluyu. Cibeunying kaler. Bandung', 'KOTA BANDUNG', '-6.8954', '107.63343', '9C-3A-9A-04-C2-B9', '103.147.222.19'),
(125, 'rdkadishubBdg', 'WIFI RUMAH DINAS KADISHUB', 'PEMKOT BANDUNG', 'JL SETIABUDI NO 59 LEDENG, CIDADAP, LEDENG, KEC. CIDADAP, KOTA BANDUNG, JAWA BARAT 40143', 'KOTA BANDUNG', '-6.879344', '107.598085', '9C-3A-9A-02-70-0E', '103.147.222.19'),
(126, 'gasibuBdg', 'LAPANGAN GASIBU', 'PEMKOT BANDUNG', 'Jl. Diponegoro, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', 'KOTA BANDUNG', '-6.901306', '107.619187', '4C-EF-56-01-82-DA', '103.147.222.19'),
(127, 'rskiaBdg', 'RSKIA KOTA BANDUNG', 'PEMKOT BANDUNG', 'Jl. KH. Wahid Hasyim (Kopo) No. 311 Bandung', 'KOTA BANDUNG', '-6.943478', '107.591102', '9C-3A-9A-02-70-98', '103.147.222.19'),
(128, 'rsudBdg', 'RSUD KOTA BANDUNG', 'PEMKOT BANDUNG', 'Jl. Rumah Sakit No. 22, Kel. Pakemitan, Kec, Cinambo, Kota Bandung', 'KOTA BANDUNG', '-6.904338', '107.706904', '9C-3A-9A-02-6B-45', '103.147.222.19'),
(129, 'alun2cicendoBdg', 'ALUN-ALUN CICENDO', 'PEMKOT BANDUNG', 'Jl. Arjuna, Husen Sastranegara, Kec. Cicendo, Kota Bandung, Jawa Barat 40174', 'KOTA BANDUNG', '-6.911941', '107.589283', '4C-EF-56-01-83-B2', '103.147.222.19'),
(130, 'alun2uberungBdg', 'ALUN-ALUN UJUNG BERUNG', 'PEMKOT BANDUNG', 'Jl. Cigending No.3, Cigending, Kec. Ujung Berung, Kota Bandung, Jawa Barat 40611', 'KOTA BANDUNG', '-6.913426', '107.701554', '4C-EF-56-01-83-E9', '103.147.222.19'),
(131, 'alun2Bdg', 'ALUN-ALUN BANDUNG', 'PEMKOT BANDUNG', 'Jl. Asia Afrika, Balonggede, Kec. Regol, Kota Bandung, Jawa Barat 40251', 'KOTA BANDUNG', '-6.923503', '107.606276', '4C-EF-56-01-83-A0', '103.147.222.19'),
(132, 'teaterteahouseBdg', 'TEATER TERBUKA SEKRETARIAT TEA HOUSE', 'PEMKOT BANDUNG', 'Jl. Bukit Dago no.53A Dago kec. Coblong kota bandung', 'KOTA BANDUNG', '-6.869877', '107.618033', '9C-3A-9A-04-C2-92', '103.147.222.19'),
(133, 'gubernurgdsateBdg', 'RUANG KERJA GUBERNUR GEDUNG SATE', 'PEMKOT BANDUNG', '-', 'KOTA BANDUNG', '-6.9025342', '107.6178067', '9C-3A-9A-04-C6-4C', '103.147.222.19'),
(134, 'alun2Bjr', 'ALUN ALUN BANJAR', 'PEMKOT BANJAR', 'Area Alun-Alun Kota Banjar', 'KOTA BANJAR', '-7.36946', '108.541376', '4C-EF-56-01-85-7A', '103.147.222.19'),
(135, 'smpn1Bjr', 'DEPAN SMPN 1 KOTA BANJAR', 'PEMKOT BANJAR', 'Jl. Pataruman', 'KOTA BANJAR', '-7.369846', '108.542741', '9C-3A-9A-04-CE-25', '103.147.222.19'),
(136, 'islamiccenterBjr', 'KOMPLEK ISLAMIC CENTER', 'PEMKOT BANJAR', 'Banjar, Kota Banjar, Jawa Barat 46311', 'KOTA BANJAR', '-7.361246', '108.533725', '9C-3A-9A-04-C5-93', '103.147.222.19'),
(137, 'rsudBjr', 'RSUD BANJAR', 'PEMKOT BANJAR', 'Area RSUD Kota Banjar', 'KOTA BANJAR', '-7.369736', '108.544089', '9C-3A-9A-04-C5-AC', '103.147.222.19'),
(138, 'tmnlapangbhaktiBjr', 'TAMAN KOTA BANJAR LAPANG BHAKTI', 'PEMKOT BANJAR', 'Jl. Mayjen Didi Kartasasmita', 'KOTA BANJAR', '-7.368402', '108.535378', '4C-EF-56-01-83-CB', '103.147.222.19'),
(139, 'termindukBks', 'TERMINAL INDUK BEKASI', 'PEMKOT BEKASI', 'Jl. IR. H. Juanda Kel. Margahayu Kec. Bekasi Timur', 'KOTA BEKASI', '-6.249314', '107.013681', '9C-3A-9A-02-70-9A', '103.147.222.19'),
(140, 'hutankotaBks', 'HUTAN KOTA BEKASI', 'PEMKOT BEKASI', 'Jl. A Yani No 2 Kayuringin Jaya Bekasi Selatan', 'KOTA BEKASI', '-6.233772', '106.992467', '9C-3A-9A-04-C6-62', '103.147.222.19'),
(141, 'alun2Bks', 'ALUN ALUN KOTA BEKASI', 'PEMKOT BEKASI', 'Jl. Veteran, Kel.Marga Jaya, Kec. Bekasi Selatan', 'KOTA BEKASI', '-6.242237', '106.999423', '9C-3A-9A-04-CE-D1', '103.147.222.19'),
(142, 'kulinergorBks', 'KULINER GOR BEKASI', 'PEMKOT BEKASI', 'Jl. Jend. Ahmad Yani No.2, RT.004/RW.016, Kayuringin Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17144', 'KOTA BEKASI', '-6.23617', '106.991263', '9C-3A-9A-04-C6-8C', '103.147.222.19'),
(143, 'mppbtcBks', 'MPP BTC BEKASI TIMUR', 'PEMKOT BEKASI', 'Jl. HM Joyomartono Kel. Margahayu kec. Bekasi timur', 'KOTA BEKASI', '-6.270684', '107.052878', '9C-3A-9A-04-C5-8B', '103.147.222.19'),
(144, 'shelterpatriotBks', 'SKELTER PATRIOT BEKASI', 'PEMKOT BEKASI', 'Jl. IR. H. Juanda Kel. Margahayu Kec. Bekasi Timur', 'KOTA BOGOR', '-6.249071', '107.01359', '4C-EF-56-01-83-C6', '103.147.222.19'),
(145, 'tmnkencanaBgr', 'TAMAN KENCANA', 'PEMKOT BOGOR', 'Taman Kencana, RT.03/RW.03, Babakan, Kec. Bogor Tengah, Kota Bogor, Jawa Barat 16128', 'KOTA BOGOR', '-6.588597', '106.801785', '4C-EF-56-01-85-75', '103.147.222.19'),
(146, 'tmncoret2Bgr', 'TAMAN CORET-CORET', 'PEMKOT BOGOR', 'Jl. Achmad Adnawijaya, RT.01/RW.15, Tegal Gundil, Bogor Utara, Kota Bogor, Jawa Barat 16152', 'KOTA BOGOR', '-6.581968', '106.817691', '4C-EF-56-01-83-AC', '103.147.222.19'),
(147, 'tmnheulangBgr', 'TAMAN HEULANG', 'PEMKOT BOGOR', 'Jl. Heulang, RT.06/RW.04, Tanah Sareal, Kec. Tanah Sareal, Kota Bogor, Jawa Barat 16161', 'KOTA BOGOR', '-6.570116', '106.802242', '4C-EF-56-01-83-A6', '103.147.222.19'),
(148, 'creativespaceBgr', 'CREATIVE SPACE BOGOR', 'PEMKOT BOGOR', 'Jl. Ir h. Juanda no.4 Bogor tengah 16122', 'KOTA BOGOR', '-6.593786', '106.794887', '4C-EF-56-01-83-A9', '103.147.222.19'),
(149, 'kmpKBcimahparBgr', 'KAMPUNG KB CIMAHPAR', 'PEMKOT BOGOR', '-', 'KOTA BOGOR', '-6.589468', '106.825106', '9C-3A-9A-04-C5-9D', '103.147.222.19'),
(150, 'setugedeBgr', 'SETU GEDE BOGOR', 'PEMKOT BOGOR', 'Setu Gede, Kel. Setu Gede, Kec. Bogor Barat, Kota Bogor', 'KOTA BOGOR', '-6.551878', '106.745695', '4C-EF-56-01-81-6E', '103.147.222.19'),
(151, 'bpjsrsudcibabatCmh', 'GEDUNG C LT. 1 PENDAFTARAN BPJS RSUD CIBABAT', 'PEMKOT CIMAHI', 'Jl. Jend. H. Amir Machmud No.140, Cibabat, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40513', 'KOTA CIMAHI', '-6.879642', '107.550773', '9C-3A-9A-04-CE-BE', '103.147.222.19'),
(152, 'perpusumumCmh', 'PERPUSTAKAAN UMUM KOTA CIMAHI', 'PEMKOT CIMAHI', 'Jl. Muhamad Daeng Ardiwinata Pertigaan Jati Cihanjuang', 'KOTA CIMAHI', '-6.873113', '107.555274', '9C-3A-9A-04-C5-40', '103.147.222.19'),
(153, 'gedbpemkotCmh', 'AREA LT. 1 GEDUNG B KOMP. PERKANTORAN PEMKOT CIMAHI', 'PEMKOT CIMAHI', 'Jl. Rd. Demang Hardjakusumah Cimahi', 'KOTA CIMAHI', '-6.870258', '107.554947', '9C-3A-9A-04-C7-77', '103.147.222.19'),
(154, 'rusunawacigugurCmh', 'AREA TAMAN RUSUNAWA CIGUGUR TENGAH', 'PEMKOT CIMAHI', 'Jl. At-Taqwa Cimindi Kelurahan Cigugur Tengah kecamatan Cimahi Tengah kota Cimahi 40522', 'KOTA CIMAHI', '-6.890295', '107.557239', '9C-3A-9A-04-C7-F4', '103.147.222.19'),
(155, 'rusunawalwgajahCmh', 'AREA TAMAN RUSUNAWA LEUWIGAJAH CIMAHI', 'PEMKOT CIMAHI', 'Jl. Kerkof Kihapit Barat Rt.12 Rw.09 kel. Leuwigajah kec Cimahi Selatan', 'KOTA CIMAHI', '-6.902162', '107.523285', '9C-3A-9A-04-C6-64', '103.147.222.19'),
(156, 'lawangsangaCrb', 'AREA LAWANG SANGA', 'PEMKOT CIREBON', 'Belakang Keraton Kasepuhan CIrebon', 'KOTA CIREBON', '-6.729712', '108.570751', '4C-EF-56-01-83-CF', '103.147.222.19'),
(157, 'creativecenterCrb', 'CREATIVE CENTER', 'PEMKOT CIREBON', 'Jl. Siliwangi no 1 Cirebon kec. Kejaksaan kota Cirebon 45123', 'KOTA CIREBON', '-6.698136', '108.552507', '4C-EF-56-01-85-1F', '103.147.222.19'),
(158, 'goasuryaniCrb', 'GOA SURYANI CIREBON', 'PEMKOT CIREBON', 'Jl. Brigjen Darsono', 'KOTA CIREBON', '-6.737002', '108.542875', '9C-3A-9A-02-6E-01', '103.147.222.19'),
(159, 'perpus400Crb', 'PERPUSTAKAAN 400', 'PEMKOT CIREBON', 'Jl. Brigjen Darsono No. 11, Sunyarangi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45312', 'KOTA CIREBON', '-6.730409', '108.538933', '9C-3A-9A-02-70-09', '103.147.222.19'),
(160, 'sekrejagakaliCrb', 'SEKERTARIAT JAGAKALI CIREBON', 'PEMKOT CIREBON', 'Permata Harjamukti', 'KOTA CIREBON', '-6.757831', '108.554585', '9C-3A-9A-02-6B-32', '103.147.222.19'),
(161, 'pklstadionbimaCrb', 'SENTRA PKL STADION BIMA', 'PEMKOT CIREBON', 'Stadion Bima', 'KOTA CIREBON', '-6.731737', '108.536074', '4C-EF-56-01-81-62', '103.147.222.19'),
(162, 'termterpaduDpk', 'UPT TERMINAL TERPADU DEPOK', 'PEMKOT DEPOK', 'Terminal Terpadu Depok, Jl. Margonda Raya, Depok, Kec. Pancoran Mas, Kota Depok, Jawa Barat 1643', 'KOTA DEPOK', '-6.391836', '106.823098', '9C-3A-9A-02-6B-0D', '103.147.222.19'),
(163, 'siturwkalongDpk', 'SITU RAWA KALONG', 'PEMKOT DEPOK', '\"Curug, Kec. Cimanggis, Kota Depok, Jawa Barat,  -6.395169288572315, 106.86761909671927\"', 'KOTA DEPOK', '-6.395542', '106.868463', '9C-3A-9A-02-D5-67', '103.147.222.19'),
(164, 'rwbesarDpk', 'RAWA BESAR DEPOK', 'PEMKOT DEPOK', 'Depok, Kec. Pancoran Mas, Kota Depok, Jawa Barat,', 'KOTA DEPOK', '-6.389843', '106.81736', '4C-EF-56-01-83-8F', '103.147.222.19'),
(165, 'situpengasinanDpk', 'SITU PANGASINAN', 'PEMKOT DEPOK', '\"Unnamed Road, Pengasinan, Sawangan, Depok City, West Java 16518,  -6.420534449477649, 106.74876576722733\"', 'KOTA DEPOK', '-6.420531', '106.748796', '9C-3A-9A-02-6F-98', '103.147.222.19'),
(166, 'uptpengujiankuDpk', 'UPT PENGUJIAN KENDARAAN UMUM', 'PEMKOT DEPOK', '-', 'KOTA DEPOK', '-6.448678', '106.824595', '9C-3A-9A-02-6E-27', '103.147.222.19'),
(167, 'alun2tmndigitalSkb', 'ALUN-ALUN TAMAN DIGITAL', 'PEMKOT SUKABUMI', 'Gunungparang, Kec. Cikole, Kota Sukabumi, Jawa Barat 43111', 'KOTA SUKABUMI', '-6.92154', '106.92555', '4C-EF-56-01-85-7D', '103.147.222.19'),
(168, 'lpgmerdekaSkb', 'LAPANG MERDEKA DEKAT GOR', 'PEMKOT SUKABUMI', 'Jl. Perintis Kemerdekaan', 'KOTA SUKABUMI', '-6.920233', '106.926233', '4C-EF-56-01-83-BC', '103.147.222.19'),
(169, 'masjidagungSkb', 'MASJID AGUNG', 'PEMKOT SUKABUMI', 'Jl. Alun-Alun Utara No. 4B, Gunungparang, Kec. Cikole, Kota Sukabumi, Jawa Barat 43111', 'KOTA SUKABUMI', '-6.921194', '106.925358', '9C-3A-9A-04-CF-04', '103.147.222.19'),
(170, 'bidkoperasi&umkmSkb', 'BIDANG KOPERASI DAN UMKM', 'PEMKOT SUKABUMI', 'Jl. Koperasi No. 105, Cikole, Kec. Sukabumi, Kota Sukabumi, Jawa Barat 43113', 'KOTA SUKABUMI', '-6.919114', '106.934898', '9C-3A-9A-04-C6-82', '103.147.222.19'),
(171, 'pedesjljuandaSkb', 'PEDESTRIAN JALAN JUANDA', 'PEMKOT SUKABUMI', 'Jl. Ir. H. Juanda', 'KOTA SUKABUMI', '-6.918983', '106.931478', '4C-EF-56-01-83-BF', '103.147.222.19'),
(172, 'alun2Tsk', 'ALUN ALUN KOTA TASIK', 'PEMKOT TASIKMALAYA', 'Empangsari, Tawang, Tasikmalaya, Jawa Barat 46113', 'KOTA TASIKMALAYA', '-7.326508', '108.224062', '4C-EF-56-01-85-72', '103.147.222.19'),
(173, 'komplekdadahaTsk', 'KOMPLEK OLAHRAGA DADAHA TASIK', 'PEMKOT TASIKMALAYA', 'Jl. Dadaha, Nagarawangi, Kec. Cihideung, Tasikmalaya, Jawa Barat 46124', 'KOTA SUKABUMI', '-7.335417', '108.221716', '4C-EF-56-01-85-18', '103.147.222.19'),
(174, 'tmndadahaTsk', 'KOMPLEK GEDUNG KESENIAN DAN TAMAN DADAHA', 'PEMKOT TASIKMALAYA', 'Jl. Lingkar Dadaha No.18,5, Nagarawangi, Kec. Cihideung, Tasikmalaya, Jawa Barat 46124', 'KOTA TASIKMALAYA', '-7.337228', '108.219749', '4C-EF-56-01-83-A7', '103.147.222.19'),
(175, 'tmnkotaTsk', 'TAMAN KOTA TASIKMALAYA', 'PEMKOT TASIKMALAYA', 'Jl. HZ Mustofa dan, Jl. Dewi Sartika No.61-69, Tawangsari, Kec. Tawang, Tasikmalaya, Jawa Barat 46112', 'KOTA TASIKMALAYA', '-7.326389', '108.221093', '4C-EF-56-01-85-21', '103.147.222.19'),
(176, 'kectirtajayaKKrw', 'Kecamatan Tirtajaya Karawang', 'PEMKAB KARAWANG', 'Kecamatan Tirtajaya', 'KABUPATEN KARAWANG', '-6.048653', '107.250173', '9C-3A-9A-02-70-9D', '103.147.222.19'),
(177, 'subangicKSub', 'Asrama Haji/Subang Islamic Center', 'PEMKAB SUBANG', 'Jl. Arief Rahman Hakim, Dangdeur, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', 'KABUPATEN SUBANG', '-6.55377758', '107.7589628', '-', '-'),
(178, 'tamanuncalKB', 'Taman Uncal Pemkab Bandung', 'PEMKAB BANDUNG', 'Pamekaran, Kec. Soreang, Kabupaten Bandung, Jawa Barat 40912', 'KABUPATEN BANDUNG', '-7.02340062', '107.5277592', '-', '-'),
(179, 'lapupakartiKB', 'Lapangan Upakarti Pemkab Bandung', 'PEMKAB BANDUNG', 'Jl. Al-Fathu, Pamekaran, Kec. Soreang, Kabupaten Bandung, Jawa Barat 40912', 'KABUPATEN BANDUNG', '-7.02126888', '107.5298654', '-', '-'),
(180, 'pasarbatujajarKBB', 'Pasar Batujajar', 'PEMKAB BANDUNG BARAT', 'Jl. Raya Batujajar No.353, Galanggang, Kec. Batujajar, Kabupaten Bandung Barat, Jawa Barat 40561', 'KABUPATEN BANDUNG BARAT', '-6.91818788', '107.4920472', '-', '-'),
(181, 'stasiunkaKPwt', 'Stasiun Kereta Api Purwakarta', 'PEMKAB PURWAKARTA', 'Nagri Tengah, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41114', 'KABUPATEN PURWAKARTA', '-6.55277434', '107.4464603', '-', '-'),
(182, 'trmnlparongpongKBB', 'Terminal Parongpong', 'PEMKAB BANDUNG BARAT', 'Jl. Kolonel Masturi, Karyawangi, Kec. Parongpong, Kabupaten Bandung Barat, Jawa Barat 40559', 'KABUPATEN BANDUNG BARAT', '-6.80291327', '107.5819622', '-', '-'),
(183, 'psrcurugagungKBB', 'Terminal Curug Agung/Pasar Curug Agung', 'PEMKAB BANDUNG BARAT', 'Jl. Gedong Lima No.A19, Kertajaya, Kec. Padalarang, Kabupaten Bandung Barat, Jawa Barat 40553', 'KABUPATEN BANDUNG BARAT', '-6.8427371', '107.4940189', '-', '-'),
(184, 'trmnlsindangkertaKBB', 'Terminal Sindangkerta', 'PEMKAB BANDUNG BARAT', 'Cintakarya, Kec. Sindangkerta, Kabupaten Bandung Barat, Jawa Barat 40563', 'KABUPATEN BANDUNG BARAT', '-6.99154208', '107.4035417', '-', '-'),
(185, 'trmnlcimaremeKBB', 'Terminal Cimareme', 'PEMKAB BANDUNG BARAT', 'Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552', 'KABUPATEN BANDUNG BARAT', '-6.86406796', '107.5030422', '-', '-'),
(186, 'alun2cikalongkulonKCian', 'Alun-Alun Cikalongkulon', 'PEMKAB CIANJUR', 'Sukagalih, Kec. Cikalongkulon, Kabupaten Cianjur, Jawa Barat 43291', 'KABUPATEN CIANJUR', '-6.71376672', '107.2145572', '-', '-'),
(187, 'plutumkmKCian', 'Plut UMKM', 'PEMKAB CIANJUR', 'Jl. Gadog II No. 18, Gadog, Pacet, Gadog, Cianjur, Kabupaten Cianjur, Jawa Barat 43253', 'KABUPATEN CIANJUR', '-6.7342757', '107.0458584', '-', '-'),
(188, 'kirkendishubKCian', 'KIR Kendaraan Dishub', 'PEMKAB CIANJUR', 'Jl. Dr. Muwardi No.395, Muka, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43215', 'KABUPATEN CIANJUR', '-6.80939899', '107.1498013', '-', '-'),
(189, 'tmnkrtfjogloKCian', 'Taman Kreatif Joglo', 'PEMKAB CIANJUR', 'Taman Kreatif Joglo, Jl. Siliwangi, Sawah Gede, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43212', 'KABUPATEN CIANJUR', '-6.82680554', '107.1365338', '-', '-'),
(190, 'balekhrpnwanayasaKPwt', 'Bale Kahuripan Situ Wanayasa', 'PEMKAB PURWAKARTA', 'Jl. Raya Barat Wanayasa No.36, Wanasari, Kec. Wanayasa, Kabupaten Purwakarta, Jawa Barat 41174', 'KABUPATEN PURWAKARTA', '-6.6761357', '107.5547502', '-', '-'),
(191, 'rsbayuasihKPwt', 'Halaman Rumah Sakit Bayu Asih PWK', 'PEMKAB PURWAKARTA', 'Jl. Veteran No.39, Nagri Kaler, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41115', 'KABUPATEN PURWAKARTA', '-6.9376274', '107.6333816', '-', '-'),
(192, 'pasarKPng', 'Pasar Pangandaran', 'PEMKAB PANGANDARAN', 'Jl. Raya Cijulang, Pananjung, Kec. Pangandaran, Kab. Pangandaran, Jawa Barat 46396', 'KABUPATEN PANGANDARAN', '-7.68398832', '108.650492', '-', '-'),
(193, 'puskessituKSmd', 'Puskesmas Situ', 'PEMKAB SUMEDANG', 'Jl. Angkrek Situ No.21, Situ, Kec. Sumedang Utara, Kabupaten Sumedang, Jawa Barat 45621', 'KABUPATEN SUMEDANG', '-6.83327277', '107.9238128', '-', '-'),
(194, 'alun2cisagaKCiamis', 'Alun-alun Cisaga', 'PEMKAB CIAMIS', 'Jl. Ciamis - Banjar No.175, Mekarmukti, Kec. Cisaga, Kabupaten Ciamis, Jawa Barat 46386', 'KABUPATEN CIAMIS', '-7.34674139', '108.515543', '-', '-'),
(195, 'stsncikampekKKrw', 'Stasiun Cikampek', 'PEMKAB KARAWANG', 'Jl. Raya Cikampek-Parakan, Cikampek Kota, Kec. Cikampek, Karawang, Jawa Barat 41373', 'KABUPATEN KARAWANG', '-6.40603003', '107.4590294', '-', '-'),
(196, 'saungbaliKKrw', 'Saung Bali', 'PEMKAB KARAWANG', 'Desa Linggar Sari, Linggarsari, Kec. Talagasari, Karawang, Jawa Barat 41381', 'KABUPATEN KARAWANG', '-6.27850104', '107.4406303', '-', '-'),
(197, 'bndngnwalaharKKrw', 'Bendungan Walahar', 'PEMKAB KARAWANG', 'Kutapohaci, Kec. Ciampel, Karawang, Jawa Barat 41363', 'KABUPATEN KARAWANG', '-6.38341722', '107.361095', '-', '-'),
(198, 'tpiciparagejayaKKrw', 'TPI Ciparagejaya', 'PEMKAB KARAWANG', 'Ciparagejaya, Kec. Tempuran, Karawang, Jawa Barat', 'KABUPATEN KARAWANG', '-6.16017956', '107.4907644', '-', '-'),
(199, 'subangccKSub', 'Subang Creative Center/Ekraf Subang', 'PEMKAB SUBANG', 'Jl. D. Kartawigenda Gg. Palabuan, Cigadung, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', 'KABUPATEN SUBANG', '-6.5574007', '107.7611046', '-', '-'),
(200, 'lapbintangKSub', 'Track Atletik/Jogging Track Lapang Bintang Subang', 'PEMKAB SUBANG', 'Pasirkareumbi, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', 'KABUPATEN SUBANG', '-6.57562911', '107.7641258', '-', '-'),
(201, 'stdnpersikasKSub', 'Stadion Persikas Subang', 'PEMKAB SUBANG', 'Jl. Emo Kurniaatmaja, Pasirkareumbi, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', 'KABUPATEN SUBANG', '-6.57644498', '107.7669464', '-', '-'),
(202, 'tpiblanakanKSub', 'TPI Blanakan', 'PEMKAB SUBANG', 'Blanakan, Kec. Blanakan, Kabupaten Subang, Jawa Barat 41259', 'KABUPATEN SUBANG', '-6.2703632', '107.663218', '-', '-'),
(203, 'trmnlKGar', 'Terminal (Gerbang Depan)', 'PEMKAB GARUT', 'Terminal Garut, Haurpanggung, Kec. Tarogong Kidul, Kabupaten Garut, Jawa Barat 44151', 'KABUPATEN GARUT', '-7.20040523', '107.9058563', '-', '-'),
(204, 'sorkerkopKGar', 'SOR Kerkop (Pintu Lapang Basket)', 'PEMKAB GARUT', 'Haurpanggung, Kec. Tarogong Kidul, Kabupaten Garut, Jawa Barat 44151', 'KABUPATEN GARUT', '-7.20734541', '107.9020855', '-', '-'),
(205, 'alun2babancongKGar', 'Alun-Alun Garut (Babancong)', 'PEMKAB GARUT', 'Jl. Kabupaten Garut No.15, Paminggir, Kec. Garut Kota, Kabupaten Garut, Jawa Barat 44118', 'KABUPATEN GARUT', '-7.21671904', '107.901357', '-', '-'),
(206, 'alun2garKGar', 'Alun-Alun Garut (Gerbang Utama)', 'PEMKAB GARUT', 'Paminggir, Kec. Garut Kota, Kabupaten Garut, Jawa Barat 44118', 'KABUPATEN GARUT', '-7.21575045', '107.9014482', '-', '-'),
(207, 'pngkrnelangKGar', 'Penangkaran Elang', 'PEMKAB GARUT', 'Jl raya Kamojang, kp Citepus, Sukakarya, Kec. Samarang, Kabupaten Garut, Jawa Barat 44161', 'KABUPATEN GARUT', '-7.16874643', '107.8001234', '-', '-'),
(208, 'pmdnapggKTsk', 'Pemandian Air Panas Gunung Galunggung', 'PEMKAB TASIKMALAYA', 'Linggajati, Kec. Sukaratu, Kabupaten Tasikmalaya, Jawa Barat 46415', 'KABUPATEN TASIKMALAYA', '-7.26689559', '108.09607', '-', '-'),
(209, 'alun2manonjayaKTsk', 'Alun-Alun Manonjaya', 'PEMKAB TASIKMALAYA', 'Jl. Alun-alun, Manonjaya, Kec. Manonjaya, Kabupaten Tasikmalaya, Jawa Barat 46197', 'KABUPATEN TASIKMALAYA', '-7.35140339', '108.3079091', '-', '-'),
(210, 'parkkpnagaKTsk', 'Halaman Parkir Wisata Budaya Kampung Naga', 'PEMKAB TASIKMALAYA', 'Jalan Raya, Neglasari, Salawu, Tasikmalaya Regency, West Java 46471', 'KABUPATEN TASIKMALAYA', '-7.36378128', '107.9944364', '-', '-'),
(211, 'tpipamayangsariKTsk', 'TPI Pamayangsari', 'PEMKAB TASIKMALAYA', 'Sindangkerta No.33, Cikawungading, Kec. Cipatujah, Kabupaten Tasikmalaya, Jawa Barat 46189', 'KABUPATEN TASIKMALAYA', '-7.7714962', '108.0875102', '-', '-'),
(212, 'ciungwanaraKCiamis', 'Objek Wisata Ciung Wanara', 'PEMKAB CIAMIS', 'Jalan Raya Banjar, Karangkamulyan, Kec. Cijeungjing, Kabupaten Ciamis, Jawa Barat 46271', 'KABUPATEN CIAMIS', '-7.34731685', '108.4891758', '-', '-'),
(213, 'icparigiKPng', 'Islamic Center Parigi', 'PEMKAB PANGANDARAN', 'Jl. Raya Parigi No.420, Parigi, Kec. Parigi, Kab. Pangandaran, Jawa Barat 46393', 'KABUPATEN PANGANDARAN', '-7.69830047', '108.4993114', '-', '-'),
(214, 'pasarparigiKPng', 'Pasar Parigi', 'PEMKAB PANGANDARAN', 'Parigi, Kec. Parigi, Kabupaten Ciamis, Jawa Barat 46393', 'KABUPATEN PANGANDARAN', '-7.69636587', '108.5009264', '-', '-'),
(215, 'psrcijulangKPng', 'Pasar Cijulang', 'PEMKAB PANGANDARAN', 'Kondangjajar, Kec. Cijulang, Kabupaten Ciamis, Jawa Barat 46394', 'KABUPATEN PANGANDARAN', '-7.72931233', '108.4735506', '-', '-'),
(216, 'tpibatukarasKPng', 'TPI Batukaras', 'PEMKAB PANGANDARAN', 'Batukaras, Kec. Cijulang, Kab. Pangandaran, Jawa Barat 46394', 'KABUPATEN PANGANDARAN', '-7.74587093', '108.4970863', '-', '-'),
(217, 'tpibojongsalaweKPng', 'TPI Bojongsalawe', 'PEMKAB PANGANDARAN', 'Jl. Bojong Salawe, Margacinta, Parigi, Pangandaran, Jawa Barat 46393', 'KABUPATEN PANGANDARAN', '-7.71296859', '108.5004865', '-', '-'),
(218, 'stdnwmpbKBek', 'Stadion Wibawa Mukti Pintu Barat', 'PEMKAB BEKASI', 'TAMAN SEHATI WIBAWA MUKTI, Sertajaya, Kec. Cikarang Tim., Kabupaten Bekasi, Jawa Barat 17530', 'KABUPATEN BEKASI', '-6.31176509', '107.180571', '-', '-'),
(219, 'stdnwmptKBek', 'Stadion Wibawa Mukti Pintu Timur', 'PEMKAB BEKASI', 'Sertajaya, Kec. Cikarang Tim., Kabupaten Bekasi, Jawa Barat 17530', 'KABUPATEN BEKASI', '-6.31150342', '107.1832794', '-', '-'),
(220, 'tmnsehatiKBek', 'Taman Sehati', 'PEMKAB BEKASI', 'cikarang setadion wibawa mukti, Sertajaya, Kec. Cikarang Tim., Kabupaten Bekasi, Jawa Barat 17530', 'KABUPATEN BEKASI', '-6.31159119', '107.1802052', '-', '-'),
(221, 'ptkarangsongKIndr', 'Pantai Karangsong', 'PEMKAB INDRAMAYU', 'Blok Jl. Wanasari, Karangsong, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat', 'KABUPATEN INDRAMAYU', '-6.30573243', '108.3685935', '-', '-'),
(222, 'muskonasaBdg', 'Museum Konferensi Asia Afrika', 'PEMKOT BANDUNG', 'Jl. Asia Afrika No.65, Braga, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40111', 'KOTA BANDUNG', '-6.92127177', '107.6091453', '-', '-'),
(223, 'gelangrenKBek', 'Gelanggang Renang', 'PEMKAB BEKASI', 'Jl. Science Boulevard, Jayamukti, Kec. Cikarang Pusat, Kabupaten Bekasi, Jawa Barat 17530', 'KABUPATEN BEKASI', '-6.31055147', '107.1828703', '-', '-'),
(224, 'pttirtamayaKIndr', 'Pantai Tirtamaya', 'PEMKAB INDRAMAYU', 'Juntikedokan, Kec. Juntinyuat, Kabupaten Indramayu, Jawa Barat 45282', 'KABUPATEN INDRAMAYU', '-6.40766746', '108.4258841', '-', '-'),
(225, 'alun2haurgeulisKIndr', 'Alun - Alun Kecamatan Haurgeulis', 'PEMKAB INDRAMAYU', 'Jl. KH. Ahmad Dahlan, Haurgeulis, Kec. Haurgeulis, Kabupaten Indramayu, Jawa Barat 45264', 'KABUPATEN INDRAMAYU', '-6.45960513', '107.9434446', '-', '-'),
(226, 'alun2anjatanKIndr', 'Alun-Alun Anjatan', 'PEMKAB INDRAMAYU', 'Jl. Jenderal Sudirman, Anjatan, Kec. Anjatan, Kabupaten Indramayu, Jawa Barat 45256', 'KABUPATEN INDRAMAYU', '-6.34211116', '107.9561555', '-', '-'),
(227, 'tpikarangsongKIndr', 'TPI Karangsong', 'PEMKAB INDRAMAYU', 'Karangsong, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45219', 'KABUPATEN INDRAMAYU', '-6.30733103', '108.3571049', '-', '-'),
(228, 'tpieretwetanKIndr', 'TPI Eretan Wetan', 'PEMKAB INDRAMAYU', 'Jl.KUD Misaya Mina, Eretan Wetan, Kec. Kandanghaur, Kabupaten Indramayu, Jawa Barat 45254', 'KABUPATEN INDRAMAYU', '-6.3246529', '108.0872448', '-', '-'),
(229, 'tpieretkulonKIndr', 'TPI Eretan Kulon', 'PEMKAB INDRAMAYU', 'Eretan Kulon, Kec. Kandanghaur, Kabupaten Indramayu, Jawa Barat 45254', 'KABUPATEN INDRAMAYU', '-6.324436', '108.085755', '-', '-'),
(230, 'tpidadapKIndr', 'TPI Dadap', 'PEMKAB INDRAMAYU', 'Kongsi Baru, Dadap, Kec. Juntinyuat, Kabupaten Indramayu, Jawa Barat', 'KABUPATEN INDRAMAYU', '-6.43731633', '108.4594961', '-', '-'),
(231, 'tpicantigiKIndr', 'TPI Cantigi', 'PEMKAB INDRAMAYU', 'Jalan Raya, Cantigi Kulon, Cantigi, Indramayu Regency, West Java 45258', 'KABUPATEN INDRAMAYU', '-6.32619707', '108.232358', '-', '-'),
(232, 'alun2desaKCir', 'Alun-Alun Desa', 'PEMKAB CIREBON', 'Jl. Ki Gede Mayung Desa No.3, Buyut, Kec. Gunungjati, Kabupaten Cirebon, Jawa Barat 45151', 'KABUPATEN CIREBON', '-6.65717263', '108.5098191', '-', '-'),
(233, 'pisamjaymulKCir', 'Pelelangan Ikan Sambung Jaya Mulya', 'PEMKAB CIREBON', 'Jl. Raya Cirebon - Indramayu, Karangreja, Suranenggala, Kota Cirebon, Jawa Barat 45152', 'KABUPATEN CIREBON', '-6.62916657', '108.5259221', '-', '-'),
(234, 'tpibondetKCir', 'TPI Bondet', 'PEMKAB CIREBON', 'Mertasinga, Kec. Gunungjati, Kabupaten Cirebon, Jawa Barat 45151', 'KABUPATEN CIREBON', '-6.64841201', '108.5527094', '-', '-'),
(235, 'tmneksploresKMjl', 'Taman Eks Polres', 'PEMKAB MAJALENGKA', 'Majalengka Kulon, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45418', 'KABUPATEN MAJALENGKA', '-6.83728209', '108.2285975', '-', '-'),
(236, 'alun2talagaKMjl', 'Alun-Alun Talaga', 'PEMKAB MAJALENGKA', 'Talagakulon, Kec. Talaga, Kabupaten Majalengka, Jawa Barat 45463', 'KABUPATEN MAJALENGKA', '-6.98311893', '108.3106728', '-', '-'),
(237, 'situcipantenKMjl', 'Situ Cipanten', 'PEMKAB MAJALENGKA', 'Jl. Gn. Kuning - Sindang, Gn. Kuning, Kec. Sindang, Kabupaten Majalengka, Jawa Barat 45471', 'KABUPATEN MAJALENGKA', '-6.8234341', '108.3263114', '-', '-'),
(238, 'tmnradioBdg', 'Taman Radio', 'PEMKOT BANDUNG', 'Jl. Ir. H. Juanda, Tamansari, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40116', 'KOTA BANDUNG', '-6.90251343', '107.6113002', '-', '-'),
(239, 'dalemkaumBdg', 'Kawasan Dalem Kaum', 'PEMKOT BANDUNG', 'Balonggede, Regol, Bandung City, West Java', 'KOTA BANDUNG', '-6.92256932', '107.6076406', '-', '-'),
(240, 'haltealun2Bdg', 'Kawasan Halte Alun-Alun 1', 'PEMKOT BANDUNG', 'Balonggede, Kec. Regol, Kota Bandung, Jawa Barat', 'KOTA BANDUNG', '-6.92131966', '107.607466', '-', '-'),
(241, 'trmnlpsrantriCmh', 'Terminal Pasar Antri', 'PEMKOT CIMAHI', 'Jl. Sriwijaya Raya, Karangmekar, Kec. Cimahi Tengah, Kota Cimahi, Jawa Barat 40523', 'KOTA CIMAHI', '-6.88058751', '107.5381237', '-', '-'),
(242, 'uptdpuskeswanCmh', 'Ruang Pendaftaran UPTD Puskeswan Kota Cimahi', 'PEMKOT CIMAHI', 'Jl. Sukimun, RT.003/RW.004, Baros, Kec. Cimahi Tengah, Kota Cimahi, Jawa Barat 40521', 'KOTA CIMAHI', '-6.88882891', '107.5405835', '-', '-'),
(243, 'psrpancasila2Tsk', 'Pasar Pancasila 2', 'PEMKOT TASIKMALAYA', 'Jl. Ps. Pancasila, Lengkongsari, Kec. Tawang, Kab. Tasikmalaya, Jawa Barat 46111', 'KOTA TASIKMALAYA', '-7.32572407', '108.2286479', '-', '-'),
(244, 'alun2kejaksanCrb', 'Alun-Alun Kejaksan', 'PEMKOT CIREBON', 'Jl. Kartini, Kebonbaru, Kec. Kejaksan, Kota Cirebon, Jawa Barat 45121', 'KOTA CIREBON', '-6.70967517', '108.5591895', '-', '-'),
(245, 'alun2kerkasCrb', 'Alun-Alun Keraton Kasepuhan', 'PEMKOT CIREBON', 'Jl. Kasepuhan, Kesepuhan, Kec. Lemahwungkuk, Kota Cirebon, Jawa Barat 45114', 'KOTA CIREBON', '-6.72520941', '108.570833', '-', '-'),
(246, 'keratonkacirCrb', 'Keraton Kacirebonan', 'PEMKOT CIREBON', 'Jl. Pulasaren, Pulasaren, Kec. Pekalipan, Kota Cirebon, Jawa Barat 45116', 'KOTA CIREBON', '-6.72520302', '108.5653023', '-', '-'),
(247, 'alun21Bgr', 'Alun-Alun Kota Bogor 1', 'PEMKOT BOGOR', 'Jl. Kapten Muslihat No.17 A, RT.04/RW.06, Pabaton, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121', 'KOTA BOGOR', '-6.59488224', '106.7914455', '-', '-'),
(248, 'alun22Bgr', 'Alun-Alun Kota Bogor 2', 'PEMKOT BOGOR', 'Jl. Kapten Muslihat No.17 A, RT.04/RW.06, Pabaton, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121', 'KOTA BOGOR', '-6.59489623', '106.7914488', '-', '-'),
(249, 'rabanjaratsBjr', 'Rest Area Banjar Atas', 'PEMKOT BANJAR', 'WARUNG EMA, BANJAR ATAS REST AREA BANJAR JABAR, Karangpanimbal, Kec. Purwaharja, Kota Banjar, Jawa Tengah 46311', 'KOTA BANJAR', '-7.36386292', '108.5421555', '-', '-'),
(250, 'psrpancasila3Tsk', 'Pasar Pancasila 3', 'PEMKOT TASIKMALAYA', 'Jl. Ps. Pancasila, Lengkongsari, Kec. Tawang, Kab. Tasikmalaya, Jawa Barat 46111', 'KOTA TASIKMALAYA', '-7.32563294', '108.2285238', '-', '-'),
(251, 'dpngbiBjr', 'Area Depan Graha Banjar Idaman (GBI)', 'PEMKOT BANJAR', 'Jl. Tentara Pelajar, Mekarsari, Kec. Banjar, Kota Banjar, Jawa Barat 46321', 'KOTA BANJAR', '-7.37748416', '108.5396564', '-', '-'),
(252, 'psrlangensariBjr', 'Area Depan Pasar Langensari', 'PEMKOT BANJAR', 'Muktisari, Langensari, Banjar City, West Java 46343', 'KOTA BANJAR', '-7.36104478', '108.6391216', '-', '-'),
(253, 'alun2langensariBjr', 'Alun-Alun Kecamatan Langensari', 'PEMKOT BANJAR', 'Langensari, Kec. Langensari, Kota Banjar, Jawa Barat 46324', 'KOTA BANJAR', '-7.35230148', '108.6324898', '-', '-'),
(254, 'alun2jonggolKBog', 'Alun-Alun Jonggol', 'PEMKAB BOGOR', 'Jl. Raya Alun, Alun Utara, Kec. Jonggol, Kabupaten Bogor, Jawa Barat 16830', 'KABUPATEN BOGOR', '-6.46829856', '107.0658935', '-', '-'),
(255, 'babalebanKBog', 'Balai Baca Legok Banteng', 'PEMKAB BOGOR', 'KP LEGOK BANTENG, RT.01/RW.07, Cijayanti, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat', 'KABUPATEN BOGOR', '-6.61458164', '106.8645943', '-', '-'),
(256, 'alun2cijerukKBog', 'Alun-Alun Cijeruk', 'PEMKAB BOGOR', 'Jl. Cijulang, Sukaharja, Kec. Cijeruk, Kabupaten Bogor, Jawa Barat 16740', 'KABUPATEN BOGOR', '-6.66782606', '106.7794671', '-', '-'),
(257, 'giwangrivtubKBog', 'Giwangkara River Tubing', 'PEMKAB BOGOR', 'Kp.Semper, RT.05/RW.06, Neglasari, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680', 'KABUPATEN BOGOR', '-6.58658436', '106.7211001', '-', '-'),
(258, 'psrcisaruaKBog', 'Pasar Cisarua', 'PEMKAB BOGOR', 'Jalan raya puncak desa citeko rt 03/03 16750, Citeko, Kec. Cisarua, Kabupaten Bogor, Jawa Barat 16750', 'KABUPATEN BOGOR', '-6.68138075', '106.9289333', '-', '-'),
(259, 'alun2gunsinKBog', 'Alun-Alun Gunung Sidur', 'PEMKAB BOGOR', 'Gn. Sindur, Kec. Gn. Sindur, Kabupaten Bogor, Jawa Barat 16340', 'KABUPATEN BOGOR', '-6.38214881', '106.6686409', '-', '-'),
(260, 'alun2tajurhalangKBog', 'Alun-Alun Tajurhalang', 'PEMKAB BOGOR', 'Kalisuren, Kec. Tajur Halang, Kabupaten Bogor, Jawa Barat 16320', 'KABUPATEN BOGOR', '-6.9469288', '107.6245113', '-', '-'),
(261, 'trmnlklariKKrw', 'Terminal Klari', 'PEMKAB KARAWANG', 'Terminal klari, Jl. Raya Klari, Anggadita, Kec. Karawang Tim., Karawang, Jawa Barat 41371', 'KABUPATEN KARAWANG', '-6.34389081', '107.3411392', '-', '-'),
(262, 'gedungseniKSmd', 'Gedung Kesenian Pacuan Kuda', 'PEMKAB SUMEDANG', 'Kotakaler, Kec. Sumedang Utara, Kabupaten Sumedang, Jawa Barat 45621', 'KABUPATEN SUMEDANG', '-6.83825155', '107.9280775', '-', '-'),
(263, 'balwarpasirbiruKSmd', 'Balai Warga Desa Pasirbiru', 'PEMKAB SUMEDANG', 'Pasir Biru, Kec. Rancakalong, Kabupaten Sumedang, Jawa Barat 45361', 'KABUPATEN SUMEDANG', '-6.84871521', '107.8302821', '-', '-'),
(264, 'alun2windujantenKKun', 'Alun-Alun Desa Windujanten', 'PEMKAB KUNINGAN', 'Windujanten, Kadugede, Windujanten, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45561', 'KABUPATEN KUNINGAN', '-6.99407846', '108.459248', '-', '-'),
(265, 'rasinguguKCiamis', 'Rest Area Singugu', 'PEMKAB CIAMIS', 'Bojongmalang, Kec. Cimaragas, Kabupaten Ciamis, Jawa Barat 46381', 'KABUPATEN CIAMIS', '-7.39950647', '108.4500665', '-', '-');
INSERT INTO `tb_access_point` (`id`, `ap_name_url`, `ap_name`, `ap_group`, `alamat`, `kota`, `latitude`, `longitude`, `mac_address`, `ip_address`) VALUES
(266, 'batuhiuKPng', 'Batu Hiu', 'PEMKAB PANGANDARAN', 'Camping Ground Batuhiu, Jl. Batu Hiu No.Desa, Ciliang, Kec. Parigi, Kab. Pangandaran, Jawa Barat 46393', 'KABUPATEN PANGANDARAN', '-7.6918319', '108.537686', '-', '-'),
(267, 'dewitapaCmh', 'Dewi Tapa, wisata budaya ketahanan pangan Cireundeu', 'PEMKOT CIMAHI', 'Cireundeu, Leuwigajah, Kec. Cimahi Sel., Kota Cimahi, Jawa Barat 40532', 'KOTA CIMAHI', '-6.91427759', '107.5234405', '-', '-'),
(268, 'dpmptspBks', 'DPMPTSP Kota Bekasi', 'PEMKOT BEKASI', 'Komplek Pemerintahan Walikota Bekasi, Jl. Ir. H. Juanda No.100, RT.001/RW.005, Margahayu, Kec. Bekasi Tim., Kota Bks, Jawa Barat 17144', 'KOTA BEKASI', '-6.24431428', '107.0058076', '-', '-'),
(269, 'gedungccBks', 'Gedung Creative Center', 'PEMKOT BEKASI', 'Jl. Sersan Aswan No.1, RT.002/RW.009, Margahayu, Kec. Bekasi Tim., Kota Bks, Jawa Barat 17113', 'KOTA BEKASI', '-6.24866686', '107.0100972', '-', '-'),
(270, 'kawaspenKSmd', 'Kawasan Pendidikan Sumedang', 'PEMKAB SUMEDANG', 'Jl. Raya Jatinangor No.125, Cikeruh, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363', 'KABUPATEN SUMEDANG', '-6.93327429', '107.7732072', '-', '-'),
(271, 'balperwarKBog', 'Balai Pertemuan Rembug Warga', 'PEMKAB BOGOR', 'Jalan Raya Jakarta - Bogor Jalan Bedahan No.KM.39, RT.01/RW.04, Pabuaran, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16916', 'KABUPATEN BOGOR', '-6.444131', '106.8517397', '-', '-'),
(272, 'alun2soreangKB', 'ALUN-ALUN SOREANG KAB. BANDUNG', 'PEMKAB BANDUNG', 'Jl. Raya Soreang', 'KABUPATEN BANDUNG', '-6.907425', '107.583922', '4C-EF-56-01-83-BD', '103.147.222.19'),
(273, 'alun2KCiamis', 'ALUN-ALUN KABUPATEN CIAMIS', 'PEMKAB CIAMIS', 'Ir. H. Juanda Ciamis', 'KABUPATEN CIAMIS', '-7.32638', '108.352458', '4C-EF-56-01-83-CA', '103.147.222.19'),
(274, 'rspdKCian', 'Halaman Radio RSPD', 'PEMKAB CIANJUR', 'Jl. Suroso No.38, Solokpandan, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43214', 'KABUPATEN CIANJUR', '-6.81884458', '107.1413989', '-', '-'),
(275, 'saungudjoBdg', 'Saung ANGKLUNG Udjo', 'PEMKOT BANDUNG', 'Saung Angklung Udjo, Jl. Padasuka, Pasirlayung, Kec. Cibeunying Kidul, Kota Bandung, Jawa Barat 40192', 'KOTA BANDUNG', '-6.8975725', '107.6557943', '-', '-'),
(276, 'bapendaBdg', 'Bapenda JABAR', 'PEMKOT BANDUNG', 'Jl. Soekarno Hatta No.528, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286', 'KOTA BANDUNG', '-6.94629914', '107.6427032', '-', '-'),
(277, 'baleervatBdg', 'Bale Ervat/Blok Tempe (Babakan Asih)', 'PEMKOT BANDUNG', 'Babakan Asih, Kec. Bojongloa Kaler, Kota Bandung, Jawa Barat 40232', 'KOTA BANDUNG', '-6.92895666', '107.5956112', '-', '-'),
(278, 'mpplt3gbsKB', 'Mall Pelayanan Publik (MPP) Lt. 3 Kawasan Gedong Budaya Sabilulungan Kab. Bandung', 'PEMKAB BANDUNG', 'Pamekaran, Kec. Soreang, Kabupaten Bandung, Jawa Barat 40912', 'KABUPATEN BANDUNG', '-7.02038541', '107.5295458', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kabkot`
--

CREATE TABLE `tb_kabkot` (
  `id_kabkot` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `detail` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kabkot`
--

INSERT INTO `tb_kabkot` (`id_kabkot`, `nama`, `logo`, `detail`, `kota`, `alamat`, `telpon`, `email`, `updated_at`, `deleted_at`) VALUES
(8, 'KOMINFO JABAR', 'KOMINFO-JABAR.jpeg', 'Dinas Komunikasi dan Informatika Provinsi Jawa Barat', 'KOTA BANDUNG', 'Jl. Tamansari No.55, Lb. Siliwangi, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132', '(022) 2502898', 'Kominfo.Jabar@gmail.com', NULL, NULL),
(9, 'PEMKAB BANDUNG', 'PEMKAB-BANDUNG.jpeg', 'PEMERINTAH KABUPATEN BANDUNG', 'KABUPATEN BANDUNG', 'Komplek Pemerintahan Daerah Kabupaten Bandung Jl.Raya Soreang KM 17, Bandung', '(022)-5892122', '-', NULL, NULL),
(10, 'PEMKAB CIAMIS', 'Pemkab Ciamis.jpeg', 'PEMERINTAH KABUPATEN CIAMIS', 'KABUPATEN CIAMIS', 'Jalan Jendral Sudirman No.16', '0265771511', '-', NULL, NULL),
(11, 'PEMKAB CIANJUR', 'PEMKAB-CIANJUR.jpeg', 'PEMERINTAH KABUPATEN CIANJUR', 'KABUPATEN CIANJUR', 'Jl.Siti Jenab No.31 Cianjur', '0263-261890', '-', NULL, NULL),
(12, 'PEMKAB CIREBON', 'PEMKAB-CIREBON.jpeg', 'PEMERINTAH KABUPATEN CIREBON', 'KABUPATEN CIREBON', 'Jl. Sunan Kalijaga No.7', '0231 321197', '-', NULL, NULL),
(13, 'PEMKAB GARUT', 'PEMKAB-GARUT.jpeg', 'PEMERINTAH KABUPATEN GARUT', 'KABUPATEN GARUT', 'Jl. Pembangunan No.185, Sukagalih, Kec. Tarogong Kidul, Kabupaten Garut', '0262-232225', '-', NULL, NULL),
(14, 'PEMKAB BEKASI', 'PEMKAB-BEKASI.jpeg', 'PEMERINTAH KABUPATEN BEKASI', 'KABUPATEN BEKASI', 'Komplek Perkantoran Pemerintah Kabupaten Bekasi Desa Sukamahi Kecamatan Cikarang Pusat', '(021) 89970065', '-', NULL, NULL),
(15, 'PEMKAB INDRAMAYU', 'PEMKAB-INDRAMAYU.jpeg', 'PEMERINTAH KABUPATEN INDRAMAYU', 'KABUPATEN INDRAMAYU', 'Jl. Letnan Sutejo No. 20 Margadadi Indramayu', '-', '-', NULL, NULL),
(16, 'PEMKAB KARAWANG', 'PEMKAB-KARAWANG.jpeg', 'PEMERINTAH KABUPATEN KARAWANG', 'KABUPATEN KARAWANG', 'A. Yani No. 1 Karawang', '(0267) 429800', '-', NULL, NULL),
(17, 'PEMKAB KUNINGAN', 'PEMKAB-KUNINGAN.jpeg', 'PEMERINTAH KABUPATEN KUNINGAN', 'KABUPATEN KUNINGAN', 'Jalan Siliwangi No.88 Kuningan', '0232-871045', '-', NULL, NULL),
(18, 'PEMKAB MAJALENGKA', 'PEMKAB-MAJALENGKA.jpeg', 'PEMERINTAH KABUPATEN MAJALENGKA', 'KABUPATEN MAJALENGKA', 'Jl. A. Yani No. 1, Majalengka', '(?0233) 281201', '-', NULL, NULL),
(19, 'PEMKAB PANGANDARAN', 'PEMKAB-PANGANDARAN.jpeg', 'PEMERINTAH KABUPATEN PANGANDARAN', 'KABUPATEN PANGANDARAN', 'Jalan Alun-Alun No. 2 – Parigi', '02652641721', '-', NULL, NULL),
(20, 'PEMKAB PURWAKARTA', 'PEMKAB-PURWAKARTA.jpeg', 'PEMERINTAH KABUPATEN PURWAKARTA', 'KABUPATEN PURWAKARTA', 'JL. Gandanegara No. 25, Kelurahan Nageri Kidul, Kecamatan Purwakarta, Kabupaten Purwakarta, Provinsi Jawa Barat', '(0264) 200036', '-', NULL, NULL),
(21, 'PEMKAB SUBANG', 'PEMKAB-SUBANG.jpeg', 'PEMERINTAH KABUPATEN SUBANG', 'KABUPATEN SUBANG', 'Jl. Dewi Sartika No.2 , Soklat', '(0260) 415507', '-', NULL, NULL),
(22, 'PEMKAB SUKABUMI', 'PEMKAB-SUKABUMI.jpeg', 'PEMERINTAH KABUPATEN SUKABUMI', 'KABUPATEN SUKABUMI', 'Jl. Perintis Kemerdekaan, Cikembar, Kab. Sukabumi, Jawa Barat', '0266-320255', '-', NULL, NULL),
(70, 'PEMKAB SUMEDANG', 'Lambang_Kabupaten_Sumedang.png', 'PEMERINTAH KABUPATEN SUMEDANG', 'KABUPATEN SUMEDANG', 'Jl. Prabu Gajah Agung No. 9', '0261202001', '-', NULL, NULL),
(71, 'PEMKAB TASIKMALAYA', 'PEMKAB_TASIKMALAYA.png', 'PEMERINTAH KABUPATEN TASIKMALAYA', 'KABUPATEN TASIKMALAYA', 'Jl. Mayor Utaryo No. 1', '0265-543000', '-', NULL, NULL),
(72, 'PEMKOT BANDUNG', 'PEMKOT_BANDUNG.png', 'PEMERINTAHAN KOTA BANDUNG', 'KOTA BANDUNG', 'Jl. Wastukancana No. 2 Bandung', '4234892', '-', NULL, NULL),
(73, 'PEMKOT BANJAR', 'PEMKOT_BANJAR.png', 'PEMERINTAH KOTA BANJAR', 'KOTA BANJAR', 'Jl. Raya Siliwangi Km. 3, Purwaharja, Karangpanimbal, Kec. Banjar, Kota Banjar', '025-?741011', '-', NULL, NULL),
(74, 'PEMKOT BEKASI', 'PEMKOT_BEKASI.png', 'PEMERINTAHAN KOTA BEKASI', 'KOTA BEKASI', 'Jl. Jendral Ahmad Yani No. 1', '(021) 88960569', '-', NULL, NULL),
(75, 'PEMKOT BOGOR', 'logo162432992160d14ec1bca9am8NnZbBY0cZ1.png', 'PEMERINTAHAN KOTA BOGOR', 'KOTA BOGOR', 'Jl. Ir. H. Juanda No 10 Bogor. Jawa Barat', '62251 - 8321075', '-', NULL, NULL),
(76, 'PEMKOT CIMAHI', 'logo162433035060d1506e87baatvQq60X75cVE.png', 'PEMERINTAHAN KOTA CIMAHI', 'KOTA CIMAHI', 'Jl. Raden Demang Hardjakusumah No.1, Cibabat, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40132', '(022) 6642454', '-', NULL, NULL),
(77, 'PEMKOT CIREBON', 'logo162433067360d151b188cfdjpNmLnW8qeXB.png', 'PEMERINTAHAN KOTA CIREBON', 'KOTA CIREBON', 'Jalan Siliwangi No. 84', '(0231?) 206011', '-', NULL, NULL),
(78, 'PEMKOT DEPOK', 'logo162433079860d1522e4cc09mQUDC2grDyOQ.png', 'PEMERINTAHAN KOTA DEPOK', 'KOTA DEPOK', 'Jalan Margonda Raya No. 54', '(021) 29402287', '-', NULL, NULL),
(79, 'PEMKOT SUKABUMI', 'logo162433090060d15294662f9gKRj8qvbF4jq.png', 'PEMERINTAHAN KOTA SUKABUMI', 'KOTA SUKABUMI', 'Jl. Syamsudin. SH No.25, Cikole, Kec. Cikole, Kota Sukabumi', ' (0266)221123', '-', NULL, NULL),
(80, 'PEMKOT TASIKMALAYA', 'logo162433115460d15392a9c56tybazPTjUwZ6.png', 'PEMERINTAH KOTA TASIKMALAYA', 'KOTA TASIKMALAYA', 'Jl. Ir. H. Juanda No.191', '-', '-', NULL, NULL),
(81, 'PEMKAB BANDUNG BARAT', 'logo162433139060d1547eafdc0y0boxb7aUeli.png', 'PEMERINTAHAN KABUPATEN BANDUNG BARAT', 'KABUPATEN BANDUNG BARAT', 'JL. RAYA PADALARANG-CISARUA KM 2 MEKARSARI-NGAMPRAH', '022-82783481', '-', NULL, NULL),
(82, 'PEMKAB BOGOR', 'logo165831027162d7ce7f6964djJVvFpSH1fG2.png', 'PEMERINTAH KABUPATEN BOGOR', 'KABUPATEN BOGOR', 'Pakansari Kec. Cibinong Kabupaten Bogor Jawa Barat', '-', '-', NULL, NULL),
(88, 'Khuzen', 'keluh.jpeg', 'Khuzainil', 'BDG', 'PBB', '123001921', 'ian@gmail', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kota`
--

CREATE TABLE `tb_kota` (
  `id_kota` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kota`
--

INSERT INTO `tb_kota` (`id_kota`, `kota`) VALUES
(1, 'KOTA BANDUNG'),
(2, 'KABUPATEN BANDUNG'),
(3, 'KABUPATEN CIAMIS'),
(4, 'KABUPATEN CIANJUR'),
(5, 'KABUPATEN CIREBON'),
(6, 'KABUPATEN GARUT'),
(7, 'KABUPATEN BEKASI'),
(8, 'KABUPATEN INDRAMAYU'),
(9, 'KABUPATEN KARAWANG'),
(10, 'KABUPATEN KUNINGAN'),
(11, 'KABUPATEN MAJALENGKA'),
(12, 'KABUPATEN PANGANDARAN'),
(13, 'KABUPATEN PURWAKARTA'),
(14, 'KABUPATEN SUBANG'),
(15, 'KABUPATEN SUKABUMI'),
(16, 'KABUPATEN SUMEDANG'),
(17, 'KABUPATEN TASIKMALAYA'),
(18, 'KOTA BANJAR'),
(19, 'KOTA BEKASI'),
(20, 'KOTA BOGOR'),
(21, 'KOTA CIMAHI'),
(22, 'KOTA CIREBON'),
(23, 'KOTA DEPOK'),
(24, 'KOTA SUKABUMI'),
(25, 'KOTA TASIKMALAYA'),
(26, 'KABUPATEN BANDUNG BARAT'),
(27, 'KABUPATEN BANDUNG BARAT'),
(28, 'KABUPATEN BOGOR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slider` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `ap_name_slider` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `id_kabkot` int(11) DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_slider`
--

INSERT INTO `tb_slider` (`id_slider`, `judul`, `nama`, `video`, `ap_name_slider`, `start_date`, `end_date`, `id_kabkot`, `photo`) VALUES
(1, 'TEST', 'KOMINFO JABAR', NULL, 'JABAR', '2023-04-03', '2023-04-25', 0, ''),
(14, 'Jabar', NULL, '02MKCWxLWJc', 'WIFI JABAR', '2021-09-28', '2021-09-28', 8, '1'),
(15, 'Vaksin', NULL, 'Lh5GoL1HT7I', 'WIFI JABAR', '2022-07-22', '2023-07-22', 8, '1'),
(16, 'Vaksin Booster', NULL, '', 'WIFI JABAR', '2022-08-15', '2022-08-15', 8, 'slider164308894461ef8c307338cEHHyEpT84pC81.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 1,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `ban_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL COMMENT 'For acct approval.',
  `meta` varchar(2000) COLLATE utf8_unicode_ci DEFAULT '',
  `last_ip` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `approved`, `meta`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(13, 'admin123', '$2a$10$gtANPNMiG2UEL9fPbbJaBOKY1juVGP8PhYCKJWuV6yYIuz29qJF7W', 'mraihanarif666@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:4:\"foto\";s:13:\"62c4714b325a0\";s:4:\"name\";s:11:\"Raihan Arif\";}', '::1', '2023-07-12 18:46:05', '2022-07-05 19:13:47', '2023-07-12 16:46:05'),
(15, 'user123', '$2a$10$vGq/C.EOFcz/Tzg0gM92i.IBbhKz28pau6pKssOjfIC0pgZuZahgS', 'khuzen999@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:4:\"foto\";s:13:\"64065c3398f58\";s:4:\"name\";s:3:\"Ian\";}', '::1', '2023-06-30 17:25:35', '2023-03-06 22:33:39', '2023-06-30 15:25:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_autologin`
--

CREATE TABLE `user_autologin` (
  `key_id` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('bbecaa5ab748280b48db65737ee04f49', 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '172.16.10.1', '2022-03-13 16:25:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nipeg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `gender` char(1) COLLATE utf8_unicode_ci DEFAULT '',
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tentang_saya` text COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no_image.jpg',
  `dob` date NOT NULL,
  `country` char(2) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '',
  `timezone` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `website` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '',
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `nipeg`, `name`, `gender`, `tanggal_lahir`, `alamat`, `kota`, `tentang_saya`, `foto`, `dob`, `country`, `timezone`, `website`, `modified`) VALUES
(13, NULL, 'Raihan Arif', '', '0000-00-00', '', '', '', '62c4714b325a0', '0000-00-00', '', '', '', '2022-07-05 17:13:47'),
(14, NULL, 'bahrulraziq', '', '0000-00-00', '', '', '', '63a31addbd4f5', '0000-00-00', '', '', '', '2022-12-21 14:40:29'),
(15, NULL, 'Ian', '', '0000-00-00', '', '', '', '64065c3398f58', '0000-00-00', '', '', '', '2023-03-06 21:33:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(13, 1),
(15, 2);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_access_point`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_access_point` (
`id` int(11)
,`ap_name_url` varchar(255)
,`ap_name` varchar(100)
,`ap_group` varchar(100)
,`alamat` varchar(255)
,`kota` varchar(255)
,`latitude` varchar(20)
,`longitude` varchar(20)
,`mac_address` varchar(255)
,`ip_address` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_slider`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_slider` (
`id_slider` int(11)
,`id_kabkot` int(11)
,`judul` varchar(255)
,`video` varchar(255)
,`photo` varchar(255)
,`ap_name_slider` varchar(255)
,`start_date` date
,`end_date` date
,`nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_access_point`
--
DROP TABLE IF EXISTS `view_access_point`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_access_point`  AS SELECT `tb_access_point`.`id` AS `id`, `tb_access_point`.`ap_name_url` AS `ap_name_url`, `tb_access_point`.`ap_name` AS `ap_name`, `tb_access_point`.`ap_group` AS `ap_group`, `tb_access_point`.`alamat` AS `alamat`, `tb_access_point`.`kota` AS `kota`, `tb_access_point`.`latitude` AS `latitude`, `tb_access_point`.`longitude` AS `longitude`, `tb_access_point`.`mac_address` AS `mac_address`, `tb_access_point`.`ip_address` AS `ip_address` FROM `tb_access_point` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_slider`
--
DROP TABLE IF EXISTS `view_slider`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_slider`  AS SELECT `tb_slider`.`id_slider` AS `id_slider`, `tb_slider`.`id_kabkot` AS `id_kabkot`, `tb_slider`.`judul` AS `judul`, `tb_slider`.`video` AS `video`, `tb_slider`.`photo` AS `photo`, `tb_slider`.`ap_name_slider` AS `ap_name_slider`, `tb_slider`.`start_date` AS `start_date`, `tb_slider`.`end_date` AS `end_date`, `tb_kabkot`.`nama` AS `nama` FROM (`tb_slider` join `tb_kabkot`) WHERE `tb_slider`.`id_kabkot` = `tb_kabkot`.`id_kabkot` ORDER BY `tb_kabkot`.`nama` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`) USING BTREE;

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tb_access_point`
--
ALTER TABLE `tb_access_point`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kabkot`
--
ALTER TABLE `tb_kabkot`
  ADD PRIMARY KEY (`id_kabkot`);

--
-- Indeks untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slider`),
  ADD KEY `id_kabkot` (`id_kabkot`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_access_point`
--
ALTER TABLE `tb_access_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT untuk tabel `tb_kabkot`
--
ALTER TABLE `tb_kabkot`
  MODIFY `id_kabkot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
