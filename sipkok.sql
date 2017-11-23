-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Nov 2017 pada 03.05
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
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `idDokumen` varchar(4) NOT NULL,
  `namaDokumen` varchar(40) NOT NULL,
  `isiDokumen` blob NOT NULL,
  `waktuUpload` datetime NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi`
--

CREATE TABLE `organisasi` (
  `idOrganisasi` varchar(4) NOT NULL,
  `namaOrganisasi` varchar(20) NOT NULL,
  `kepanjangan` varchar(30) NOT NULL,
  `namaKetua` varchar(30) NOT NULL,
  `logo` blob NOT NULL,
  `visiMisi` text NOT NULL,
  `struktur` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `jenis` varchar(20) NOT NULL,
  `proposal` varchar(4) NOT NULL,
  `lpj` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
