-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Feb 2018 pada 11.12
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_santri`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `jml_santri_komplek`
--
CREATE TABLE `jml_santri_komplek` (
`nama_komplek` varchar(20)
,`jum_santri` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jum_santri_kelamin`
--
CREATE TABLE `jum_santri_kelamin` (
`jenkel` varchar(10)
,`jum_per_kelamin` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplek`
--

CREATE TABLE `komplek` (
  `KD_KOMPLEK` varchar(10) NOT NULL,
  `NAMA_KOMPLEK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `komplek`
--

INSERT INTO `komplek` (`KD_KOMPLEK`, `NAMA_KOMPLEK`) VALUES
('0', 'Seluruh Komplek'),
('L', 'L'),
('MH', 'MH'),
('R1', 'Ibnu Sina'),
('R2', 'Ribathul Quran'),
('R3', 'Riyadhul Jannah'),
('R4', 'Muzam zamah'),
('S', 'S'),
('T', 'T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan_wali`
--

CREATE TABLE `pekerjaan_wali` (
  `KD_PEKERJAAN` smallint(6) NOT NULL,
  `PEKERJAAN_WALI` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pekerjaan_wali`
--

INSERT INTO `pekerjaan_wali` (`KD_PEKERJAAN`, `PEKERJAAN_WALI`) VALUES
(1, 'Petani'),
(2, 'Swasta'),
(3, 'Wiraswasta'),
(4, 'Guru'),
(5, 'PNS'),
(6, 'Buruh'),
(7, 'Sopir'),
(8, 'Ibu Rumah Tangga'),
(9, 'Mekanik'),
(10, 'Pedagang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_almunawir`
--

CREATE TABLE `pendidikan_almunawir` (
  `KD_PNDALMUNAWIR` smallint(6) NOT NULL,
  `PENDIDIKAN_ALMUNAWIR` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pendidikan_almunawir`
--

INSERT INTO `pendidikan_almunawir` (`KD_PNDALMUNAWIR`, `PENDIDIKAN_ALMUNAWIR`) VALUES
(1, 'Madrasah Huffadh'),
(2, 'Madrasah Diniyah'),
(3, 'Madrasah Salafiyyah 4'),
(4, 'Madrasah Salafiyyah II'),
(5, 'Madrasah Salafiyyah V'),
(6, 'Madrasah Ribathul Quran'),
(7, 'Madrasah Huffadh Putri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_formal`
--

CREATE TABLE `pendidikan_formal` (
  `KD_PENFORMAL` smallint(6) NOT NULL,
  `PENDIDIKAN_FORMAL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pendidikan_formal`
--

INSERT INTO `pendidikan_formal` (`KD_PENFORMAL`, `PENDIDIKAN_FORMAL`) VALUES
(1, 'Sarjana'),
(2, 'SMA'),
(3, 'Kuliah'),
(4, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_wali`
--

CREATE TABLE `pendidikan_wali` (
  `KD_PNDWALI` smallint(6) NOT NULL,
  `PENDIDIKAN_WALI` varchar(50) NOT NULL,
  `ST_PNDWALI` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pendidikan_wali`
--

INSERT INTO `pendidikan_wali` (`KD_PNDWALI`, `PENDIDIKAN_WALI`, `ST_PNDWALI`) VALUES
(1, 'Madrasah Ibtidaiyah', '0'),
(2, 'Sekolah Dasar', '0'),
(3, 'SLTP', '0'),
(4, 'SLTA', '0'),
(5, 'SMP', '0'),
(6, 'MTs', '0'),
(7, 'SMA', '0'),
(8, 'D1', '0'),
(9, 'D2', '0'),
(10, 'D3', '0'),
(11, 'Strata 1 (S1)', '0'),
(12, 'Strata 2 (S2)', '0'),
(13, 'Strata 3 (S3)', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghasilan`
--

CREATE TABLE `penghasilan` (
  `KD_PENGHASILAN` smallint(6) NOT NULL,
  `PENGHASILAN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penghasilan`
--

INSERT INTO `penghasilan` (`KD_PENGHASILAN`, `PENGHASILAN`) VALUES
(1, 'Rp 500.000 atau kurang'),
(2, 'Rp. 500.000 - Rp. 1.000.000'),
(3, 'Rp. 1.000.000 - Rp. 2.000.000'),
(4, 'Rp. 2.000.000 - Rp. 3.000.000'),
(5, 'Rp. 3.000.000 - Rp. 4.000.000'),
(6, 'Rp. 4.000.000 - Rp. 5.000.000'),
(7, 'Lebih dari Rp 5.000.000');

-- --------------------------------------------------------

--
-- Stand-in structure for view `prosentase`
--
CREATE TABLE `prosentase` (
`nama_komplek` varchar(20)
,`jum_santri` bigint(21)
,`Total` bigint(21)
,`Persen` decimal(27,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `prosentase_kelamin`
--
CREATE TABLE `prosentase_kelamin` (
`jenkel` varchar(10)
,`jum_per_kelamin` bigint(21)
,`Total` bigint(21)
,`persen_kelamin` decimal(27,4)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `NISP` decimal(20,0) NOT NULL,
  `KD_PENFORMAL` smallint(6) NOT NULL,
  `KD_KOMPLEK` varchar(10) NOT NULL,
  `KD_PENGHASILAN` smallint(6) NOT NULL,
  `KD_THNAJARAN` smallint(6) NOT NULL,
  `NIK` decimal(20,0) NOT NULL,
  `NAMA_SANTRI` varchar(80) NOT NULL,
  `TEMPAT_LAHIR` varchar(50) NOT NULL,
  `TGL_LAHIR` varchar(20) NOT NULL,
  `JENIS_KELAMIN` varchar(10) NOT NULL,
  `KAMAR` varchar(50) DEFAULT NULL,
  `KEAHLIAN_SANTRI` text,
  `HOBI_SANTRI` text,
  `BAHASA_SANTRI` text,
  `HP_SANTRI` decimal(20,0) DEFAULT NULL,
  `ALASAN_MASUK` text,
  `GOL_DARAH` varchar(10) DEFAULT NULL,
  `FOTO_SANTRI` varchar(50) DEFAULT NULL,
  `RIWAYAT_PNDFORMAL` text,
  `RIWAYAT_PNDNONFORMAL` text,
  `PRESTASI_SANTRI` text,
  `NO_KK` decimal(30,0) DEFAULT NULL,
  `NIK_AYAH` decimal(20,0) DEFAULT NULL,
  `NAMA_AYAH` varchar(50) DEFAULT NULL,
  `NIK_IBU` decimal(20,0) DEFAULT NULL,
  `NAMA_IBU` varchar(50) DEFAULT NULL,
  `ALAMAT` text,
  `JML_SAUDARA` decimal(10,0) DEFAULT NULL,
  `HP_WALI` decimal(20,0) DEFAULT NULL,
  `MINAT_BAKAT` text,
  `NO_PLAT` varchar(10) DEFAULT NULL,
  `LAUNDRY` varchar(10) DEFAULT NULL,
  `PENDIDIKAN_ALMUNAWWIR` smallint(6) DEFAULT NULL,
  `PENDIDIKAN_AYAH` smallint(6) DEFAULT NULL,
  `PENDIDIKAN_IBU` smallint(6) DEFAULT NULL,
  `PEKERJAAN_AYAH` smallint(6) DEFAULT NULL,
  `PEKERJAAN_IBU` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`NISP`, `KD_PENFORMAL`, `KD_KOMPLEK`, `KD_PENGHASILAN`, `KD_THNAJARAN`, `NIK`, `NAMA_SANTRI`, `TEMPAT_LAHIR`, `TGL_LAHIR`, `JENIS_KELAMIN`, `KAMAR`, `KEAHLIAN_SANTRI`, `HOBI_SANTRI`, `BAHASA_SANTRI`, `HP_SANTRI`, `ALASAN_MASUK`, `GOL_DARAH`, `FOTO_SANTRI`, `RIWAYAT_PNDFORMAL`, `RIWAYAT_PNDNONFORMAL`, `PRESTASI_SANTRI`, `NO_KK`, `NIK_AYAH`, `NAMA_AYAH`, `NIK_IBU`, `NAMA_IBU`, `ALAMAT`, `JML_SAUDARA`, `HP_WALI`, `MINAT_BAKAT`, `NO_PLAT`, `LAUNDRY`, `PENDIDIKAN_ALMUNAWWIR`, `PENDIDIKAN_AYAH`, `PENDIDIKAN_IBU`, `PEKERJAAN_AYAH`, `PEKERJAAN_IBU`) VALUES
('9898779', 3, 'R4', 3, 1, '110091888', 'Siti Faridah', 'Riau', '1996-02-07', 'Perempuan', 'B2', 'Kaligrafi Qiroah', 'Hafalan Makan', 'Bahasa Indonesia', '85634490902', 'Keinginan sendiri', 'O', 'Foto9898779.jpg', 'MA Ihsanniat', 'Pondok Diniyah Salafiyah', 'Juara Kaligrafi Tingkat Kecamatan', '879918198', '998391', '9397299288', '0', 'Fatimah', 'Kampar Riau', '2', '8567789018', 'Menggambar Hafalan ', '-', '1', 1, 7, 5, 4, 8),
('18182626', 1, 'R1', 2, 3, '88', 'Ramadhan', 'uu', '2018-02-27', 'Laki-laki', 'uu', 'bjhkj', 'hig', 'ugui', '868', 'jhjh', 'O', 'Foto18182626.jpg', 'giigi', 'ggi', 'giug', '986986', '868698', '868968', '0', 'gugi', 'guuii', '8', '6896986', '', '', '4', 2, 11, 3, 6, 7),
('47923728', 1, 'R1', 5, 2, '836863', 'Ahmad', 'k', '2018-02-20', 'Laki-laki', 'fgu', 'kjkj', 'jhjk', 'jhk', '866', 'jgd', 'O', 'Foto47923728.jpg', 'j', 'j', 'j', '8', '8', '8', '0', 'j', 'je', '1', '2', 'j', 'j', '2', 3, 12, 12, 5, 3),
('83628268', 2, 'R3', 3, 3, '38268', 'Ridho', 'vjjg', '2018-02-13', 'Laki-laki', 'ihio', 'bjkj', 'jkbjk', 'jjkb', '78', 'kjgk', 'B', 'Foto83628268.jpg', 'khk', 'kjhk', 'klhk', '7939', '632868', '86489', '0', 'bckjds', 'cbj', '7', '9982842', 'dhewiu', 'jjhd', '1', 1, 9, 3, 3, 4),
('47665878755', 2, 'R2', 6, 2, '6677443', 'Rofid', 'Jombyfy', '2018-02-08', 'Laki-laki', 'd3', 'gfh', 'vjhf', 'gj', '587576', 'ddt', 'AB', 'Foto47665878755.jpg', 'd', 's', 'd', '756756', '53534', '5764', '35099838789382', 'D', 'FH', '5', '56746746', 'GJF', '757', '2', 3, 3, 3, 5, 1),
('191109150105', 2, 'R2', 4, 1, '3672014211990000', 'Nur Khofifah', 'Cilegon', '1999-11-01', 'Perempuan', 'Lantai 3', 'Muhadasah, Kartun Strip', 'Berenang, Mendengar Sholawat, Ngehenna, Kaligrafi, Olahraga', 'Bahasa Indonesia', '82288143490', 'Karena ingin mencari ilmu agama supaya menjadi anak yang berprestasi, berguna bagi bangsa dan negara dan menjadi kebanggaan orang tua', 'O', 'Foto191109150105.png', '2005/SDN 35 Bengkalis/#2011/Mts Daarussalam Bengkalis/IPS#2014/MA Daarussalam Bengkalis/IPS 2005/SDN 35 Bengkalis/#2011/Mts Daarussalam Bengkalis/IPS#2014/MA Daarussalam Bengkalis/IPS 2005/SDN 35 Bengkalis/#2011/Mts Daarussalam Bengkalis/IPS#2014/MA Daarussalam Bengkalis/IPS 2005/SDN 35 Bengkalis/#2011/Mts Daarussalam Bengkalis/IPS#2014/MA Daarussalam Bengkalis/IPS', '2012/PP Baquniyah/Salafiyah#2013/PP An-Nur Ngrukem/Salafiyah 2012/PP Baquniyah/Salafiyah#2013/PP An-Nur Ngrukem/Salafiyah 2012/PP Baquniyah/Salafiyah#2013/PP An-Nur Ngrukem/Salafiyah', 'Juara 1 Pidato Bahasa Indonesia Tahun 2016, Juara 1 Lomba Cerpen dan Opini 2016, Juara 2 Lomba Kartun Strip Gebyar Hari  Santri Internasional 2017', '3404090902052830', '3404090806700000', 'Suradi', '3404090806700122', 'Kalsum', 'Jl. H. Yayun 103 Rt 04 Rw 03 Kel. Pengasinan, Kec. Rawa Lumbu, Kab. Bekasi, Prov. Jawa Barat', '3', '85228629999', 'Kesenian, Teknologi, IT, Desain Grafis', 'R 5209 DP', '2', 7, 4, 3, 3, 8),
('510034020048150000', 2, 'S', 2, 3, '979', 'iiuioy', 'iui', '2018-02-19', 'Laki-laki', 'i', 'i', 'kjhi', 'i', '2986298', 'kdl', '', 'Foto510034020048150000.jpg', 'hih', 'ksk', 'hi', '87', '79', 'hkjhi', '90', 'ckjhd', 'dchu', '6', '86786', 'idi', '78', '1', 3, 4, 11, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `KD_THNAJARAN` smallint(6) NOT NULL,
  `TAHUN_AJARAN` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`KD_THNAJARAN`, `TAHUN_AJARAN`) VALUES
(1, 2017),
(2, 2018),
(3, 2019),
(4, 2020);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_santri`
--
CREATE TABLE `total_santri` (
`Total` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USSER` int(11) NOT NULL,
  `KD_KOMPLEK` varchar(10) NOT NULL DEFAULT '0',
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NAMA_USER` varchar(30) NOT NULL,
  `Alamat_user` varchar(200) NOT NULL,
  `Hp_user` decimal(20,0) NOT NULL,
  `LEVEL` smallint(6) NOT NULL,
  `STATUS_USER` varchar(5) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USSER`, `KD_KOMPLEK`, `USERNAME`, `PASSWORD`, `NAMA_USER`, `Alamat_user`, `Hp_user`, `LEVEL`, `STATUS_USER`) VALUES
(1983, '0', 'admin99', 'ltTVytw%3D', 'Zidni Mubarok', 'Jombang', '8563444061', 1, 'A'),
(1989, 'R1', 'rusdi13', 'ltTVytzf3tqhn56g', 'Ahmadi Rusdi', 'Gresik', '8563444062', 2, 'A'),
(119882, 'R4', 'laila', 'ltTVytzf3tqhn56g', 'Lailatus Sholihah', 'Jember', '8563444999', 2, 'A');

-- --------------------------------------------------------

--
-- Struktur untuk view `jml_santri_komplek`
--
DROP TABLE IF EXISTS `jml_santri_komplek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jml_santri_komplek`  AS  select `komplek`.`NAMA_KOMPLEK` AS `nama_komplek`,count(0) AS `jum_santri` from (`komplek` join `santri`) where (`komplek`.`KD_KOMPLEK` = `santri`.`KD_KOMPLEK`) group by `santri`.`KD_KOMPLEK` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `jum_santri_kelamin`
--
DROP TABLE IF EXISTS `jum_santri_kelamin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jum_santri_kelamin`  AS  select `santri`.`JENIS_KELAMIN` AS `jenkel`,count(0) AS `jum_per_kelamin` from `santri` group by `santri`.`JENIS_KELAMIN` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `prosentase`
--
DROP TABLE IF EXISTS `prosentase`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prosentase`  AS  select `jml_santri_komplek`.`nama_komplek` AS `nama_komplek`,`jml_santri_komplek`.`jum_santri` AS `jum_santri`,`total_santri`.`Total` AS `Total`,((`jml_santri_komplek`.`jum_santri` / `total_santri`.`Total`) * 100) AS `Persen` from (`jml_santri_komplek` join `total_santri`) group by `jml_santri_komplek`.`nama_komplek` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `prosentase_kelamin`
--
DROP TABLE IF EXISTS `prosentase_kelamin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prosentase_kelamin`  AS  select `jum_santri_kelamin`.`jenkel` AS `jenkel`,`jum_santri_kelamin`.`jum_per_kelamin` AS `jum_per_kelamin`,`total_santri`.`Total` AS `Total`,((`jum_santri_kelamin`.`jum_per_kelamin` / `total_santri`.`Total`) * 100) AS `persen_kelamin` from (`jum_santri_kelamin` join `total_santri`) group by `jum_santri_kelamin`.`jenkel` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `total_santri`
--
DROP TABLE IF EXISTS `total_santri`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_santri`  AS  select count(0) AS `Total` from `santri` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komplek`
--
ALTER TABLE `komplek`
  ADD PRIMARY KEY (`KD_KOMPLEK`);

--
-- Indexes for table `pekerjaan_wali`
--
ALTER TABLE `pekerjaan_wali`
  ADD PRIMARY KEY (`KD_PEKERJAAN`);

--
-- Indexes for table `pendidikan_almunawir`
--
ALTER TABLE `pendidikan_almunawir`
  ADD PRIMARY KEY (`KD_PNDALMUNAWIR`);

--
-- Indexes for table `pendidikan_formal`
--
ALTER TABLE `pendidikan_formal`
  ADD PRIMARY KEY (`KD_PENFORMAL`);

--
-- Indexes for table `pendidikan_wali`
--
ALTER TABLE `pendidikan_wali`
  ADD PRIMARY KEY (`KD_PNDWALI`);

--
-- Indexes for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`KD_PENGHASILAN`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`NISP`),
  ADD KEY `FK_RELATIONSHIP_2` (`KD_PENFORMAL`),
  ADD KEY `FK_RELATIONSHIP_4` (`KD_KOMPLEK`),
  ADD KEY `FK_RELATIONSHIP_5` (`KD_THNAJARAN`),
  ADD KEY `FK_RELATIONSHIP_7` (`KD_PENGHASILAN`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`KD_THNAJARAN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USSER`),
  ADD KEY `FK_RELATIONSHIP_1` (`KD_KOMPLEK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pekerjaan_wali`
--
ALTER TABLE `pekerjaan_wali`
  MODIFY `KD_PEKERJAAN` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pendidikan_almunawir`
--
ALTER TABLE `pendidikan_almunawir`
  MODIFY `KD_PNDALMUNAWIR` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pendidikan_wali`
--
ALTER TABLE `pendidikan_wali`
  MODIFY `KD_PNDWALI` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`KD_PENFORMAL`) REFERENCES `pendidikan_formal` (`KD_PENFORMAL`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`KD_KOMPLEK`) REFERENCES `komplek` (`KD_KOMPLEK`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`KD_THNAJARAN`) REFERENCES `tahun_ajaran` (`KD_THNAJARAN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`KD_PENGHASILAN`) REFERENCES `penghasilan` (`KD_PENGHASILAN`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`KD_KOMPLEK`) REFERENCES `komplek` (`KD_KOMPLEK`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
