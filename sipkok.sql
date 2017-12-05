-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Des 2017 pada 18.20
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipkok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `idAkun` varchar(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `organisasi` varchar(4) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`idAkun`, `nama`, `jabatan`, `email`, `password`, `organisasi`, `status`) VALUES
('A001', 'BEM Filkom UB', 'Administrator', 'admin', 'admin', 'O001', 1),
('A002', 'Faiz Takwa', 'wakil ketua', 'takwaistikomah@gmail.com', '12345', 'O002', 1),
('A003', 'Juahir sabarlah', 'bendahara', 'sabarsekali@gmail.com', '4321', 'O003', 1),
('A004', 'anak lanang pambudi', 'staf', 'anaklanang@gmail.com', '2345', 'O004', 0),
('A005', 'Akhmad Muzanni Safi\'i', 'Ketua Departemen', 'aan@gmail.com', '1234', 'O001', 1),
('A006', 'Ahmad Faizal', 'Ketua Organisasi', 'af@gmail.com', 'faisal123', 'O001', 1),
('A007', 'Gusna Ikhsan', 'Ketua Organisasi', 'gusna@gmail.com', 'gusna123', 'O002', 1),
('A008', 'Aidi Rahman', 'Ketua Organisasi', 'aidi@gmail.com', '1234', 'O001', 0);

--
-- Trigger `akun`
--
DELIMITER $$
CREATE TRIGGER `tr_autoIdAkun` BEFORE INSERT ON `akun` FOR EACH ROW BEGIN
SET @hitung = CONVERT((RIGHT((SELECT idAkun FROM `akun` ORDER by idAkun DESC LIMIT 1), 3)), UNSIGNED) + 1;
if (@hitung > 1) THEN
if (@hitung < 10) THEN 
SET new.idAkun = concat('A00',@hitung);
ELSEIF (@hitung < 100) THEN
SET new.idAkun = concat('A0',@hitung);
ELSE
SET new.idAkun = concat('A',@hitung);
END IF;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `idDokumen` varchar(4) NOT NULL,
  `namaDokumen` text NOT NULL,
  `waktuUpload` datetime NOT NULL,
  `jenis` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`idDokumen`, `namaDokumen`, `waktuUpload`, `jenis`, `status`) VALUES
('D001', 'dokumen.txt', '2017-09-21 10:35:00', 0, 1),
('D002', 'dokumen.txt', '2017-10-17 09:15:33', 0, 2),
('D003', 'dokumen.txt', '2017-10-31 11:04:38', 1, 1),
('D004', 'dokumen.txt', '2017-10-08 08:40:23', 1, 2),
('D005', 'dokumen.txt', '2017-09-27 10:35:15', 0, 0),
('D006', '7985_Proposal_O001_KHS.pdf', '2017-12-04 07:57:02', 0, 3),
('D007', '3160_LPJ_O001_KHS.pdf', '2017-12-04 07:57:02', 1, 3),
('D008', '1872_Proposal_O001_P009_KHS.pdf', '2017-12-05 11:32:39', 0, 1),
('D009', '3152_LPJ_O001_P009_KHS.pdf', '2017-12-05 11:32:39', 1, 1);

--
-- Trigger `dokumen`
--
DELIMITER $$
CREATE TRIGGER `tr_autoIdDokumen` BEFORE INSERT ON `dokumen` FOR EACH ROW BEGIN
SET @hitung = CONVERT((RIGHT((SELECT idDokumen FROM `dokumen` ORDER by idDokumen DESC LIMIT 1), 3)), UNSIGNED) + 1;
if (@hitung > 1) THEN
if (@hitung < 10) THEN 
SET new.idDokumen = concat('D00',@hitung);
ELSEIF (@hitung < 100) THEN
SET new.idDokumen = concat('D0',@hitung);
ELSE
SET new.idDokumen = concat('D',@hitung);
END IF;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi`
--

CREATE TABLE `organisasi` (
  `idOrganisasi` varchar(4) NOT NULL,
  `namaOrganisasi` varchar(20) NOT NULL,
  `kepanjangan` varchar(30) NOT NULL,
  `kategori` int(11) NOT NULL,
  `namaKetua` varchar(30) NOT NULL,
  `logo` text,
  `visiMisi` text NOT NULL,
  `struktur` text,
  `progress` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `organisasi`
--

INSERT INTO `organisasi` (`idOrganisasi`, `namaOrganisasi`, `kepanjangan`, `kategori`, `namaKetua`, `logo`, `visiMisi`, `struktur`, `progress`) VALUES
('O001', 'HMIF', 'Himpunan Mahasiswa Informatika', 0, 'Reza Muhammad Rizky', '8968_Logo_O001_logo-hmif2.png', 'Menjadi Informatika yg Lebih Baik', 'struktur.PNG', 29.9),
('O002', 'BIOS', 'Internal Orga dan Seni', 1, 'Abdul Aziz Syaukad', '8968_Logo_O001_logo-hmif2.png', 'menjadikan bios lebih baik', 'struktur.PNG', 0),
('O003', 'POROS', 'Open Source', 1, 'jaenuri', '8968_Logo_O001_logo-hmif2.png', 'menjadi tukang foto handal dan berkualitas', 'struktur.PNG', 0),
('O004', 'RAION', 'software', 1, 'junaedi', '8968_Logo_O001_logo-hmif2.png', 'menang lomba apapun dan dimanapun', 'struktur.PNG', 0),
('O005', 'BPMIF', 'legistalif mahasiswa', 0, 'Chandra Yogi', '8968_Logo_O001_logo-hmif2.png', 'membuat undang-undang ', 'struktur.PNG', 0);

--
-- Trigger `organisasi`
--
DELIMITER $$
CREATE TRIGGER `tr_autoIdOrganisasi` BEFORE INSERT ON `organisasi` FOR EACH ROW BEGIN
SET @hitung = CONVERT((RIGHT((SELECT idOrganisasi FROM `organisasi` ORDER by idOrganisasi DESC LIMIT 1), 3)), UNSIGNED) + 1;
if (@hitung > 1) THEN
if (@hitung < 10) THEN 
SET new.idOrganisasi = concat('O00',@hitung);
ELSEIF (@hitung < 100) THEN
SET new.idOrganisasi = concat('O0',@hitung);
ELSE
SET new.idOrganisasi = concat('O',@hitung);
END IF;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proker`
--

CREATE TABLE `proker` (
  `idProker` varchar(4) NOT NULL,
  `idOrganisasi` varchar(4) NOT NULL,
  `namaProker` varchar(20) NOT NULL,
  `pelaksana` varchar(30) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `jenis` int(11) NOT NULL,
  `proposal` varchar(4) DEFAULT NULL,
  `lpj` varchar(4) DEFAULT NULL,
  `progress` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proker`
--

INSERT INTO `proker` (`idProker`, `idOrganisasi`, `namaProker`, `pelaksana`, `waktu`, `jenis`, `proposal`, `lpj`, `progress`) VALUES
('P001', 'O001', 'Probin', 'Akhmad Muzanni', 'September 2017', 0, 'D002', 'D003', 0),
('P002', 'O001', 'LKO', 'rozakiyah', '24 november 2017', 0, 'D002', 'D004', 0),
('P003', 'O001', 'Sidang Istimewa', 'Emil Fauzan', '30 januari 2018', 1, 'D002', NULL, 0),
('P004', 'O001', 'seminar developer', 'levitasi', '11 desember 2017', 0, NULL, NULL, 0),
('P005', 'O001', 'fun futsal', 'faturrahman', 'september - november', 0, 'D001', NULL, 0),
('P006', 'O001', 'Dewa Ngoding', 'Akhmad Muzanni', 'November 2017', 0, NULL, NULL, 0),
('P008', 'O002', 'Olimpiade Brawijaya', 'Gusna Ikhsan', 'Desember 2017', 0, NULL, NULL, 0),
('P009', 'O001', 'Cek Dokumen', 'Akhmad Muzanni Safii', 'Desember 2017', 0, 'D008', 'D009', 0);

--
-- Trigger `proker`
--
DELIMITER $$
CREATE TRIGGER `tr_autoIdProker` BEFORE INSERT ON `proker` FOR EACH ROW BEGIN
SET @hitung = CONVERT((RIGHT((SELECT idProker FROM `proker` ORDER by idProker DESC LIMIT 1), 3)), UNSIGNED) + 1;
if (@hitung > 1) THEN
if (@hitung < 10) THEN 
SET new.idProker = concat('P00',@hitung);
ELSEIF (@hitung < 100) THEN
SET new.idProker = concat('P0',@hitung);
ELSE
SET new.idProker = concat('P',@hitung);
END IF;
END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idAkun`),
  ADD KEY `organisasi` (`organisasi`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`idDokumen`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`idOrganisasi`);

--
-- Indexes for table `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`idProker`),
  ADD KEY `proposal` (`proposal`),
  ADD KEY `lpj` (`lpj`),
  ADD KEY `idOrganisasi` (`idOrganisasi`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`organisasi`) REFERENCES `organisasi` (`idOrganisasi`);

--
-- Ketidakleluasaan untuk tabel `proker`
--
ALTER TABLE `proker`
  ADD CONSTRAINT `proker_ibfk_1` FOREIGN KEY (`proposal`) REFERENCES `dokumen` (`idDokumen`),
  ADD CONSTRAINT `proker_ibfk_2` FOREIGN KEY (`lpj`) REFERENCES `dokumen` (`idDokumen`),
  ADD CONSTRAINT `proker_ibfk_3` FOREIGN KEY (`idOrganisasi`) REFERENCES `organisasi` (`idOrganisasi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
