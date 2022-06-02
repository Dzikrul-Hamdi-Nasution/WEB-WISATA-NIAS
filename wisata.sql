-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 04:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `kategori`) VALUES
(1, 'Wisata Alam'),
(2, 'Wisata Anak'),
(3, 'Wisata Pendidikan'),
(4, 'Wisata Sejarah'),
(5, 'Wisata Belanja'),
(6, 'Wisata Budaya'),
(7, 'Wisata Keluarga'),
(8, 'Wisata Galeri'),
(9, 'Wisata Terpadu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `nama`, `username`, `password`, `email`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', 'admin@gmail.com', 1),
(2, 'tes', 'tes', '89vc', 'tanyasistemphp@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `idWisata` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `namaWisata` text NOT NULL,
  `areaWisata` text NOT NULL,
  `hargaWni` text NOT NULL,
  `hargaWniWeek` text NOT NULL,
  `hargaWna` text NOT NULL,
  `hargaWnaWeek` text NOT NULL,
  `jamBuka` varchar(5) NOT NULL,
  `jamTutup` varchar(5) NOT NULL,
  `popularitas` int(1) NOT NULL DEFAULT 1,
  `file` text NOT NULL,
  `terdekat` varchar(255) NOT NULL,
  `restoran` varchar(255) NOT NULL,
  `akomodasi` varchar(255) NOT NULL,
  `peta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`idWisata`, `idKategori`, `namaWisata`, `areaWisata`, `hargaWni`, `hargaWniWeek`, `hargaWna`, `hargaWnaWeek`, `jamBuka`, `jamTutup`, `popularitas`, `file`, `terdekat`, `restoran`, `akomodasi`, `peta`) VALUES
(3, 2, 'Edukasi Kids', 'Pekanbaru', '10000', '20000', '30000', '40000', '08:00', '10:00', 4, 'wisata--wisata-anak.jpg', 'Kolam Renang', 'resotoran 1  resotoran 2  resotoran 3  resotoran 4 ', '250000', 'https://goo.gl/maps/7eavotrvo8aVzFKX9'),
(4, 5, 'Dunias Shoping', 'Pekanbaru', '10000', '20000', '30000', '40000', '13:00', '15:00', 2, 'wisata--wisata-belanja.jpg', 'Edukasi Kids', 'resotoran 1  resotoran 2  resotoran 3  resotoran 4 ', '300000', 'https://goo.gl/maps/nA1Cugx7TyzGwyjC9'),
(5, 6, 'Kunjungan Melayu Bersama', 'Pekanbaru', '10000', '15000', '20000', '25000', '15:30', '17:00', 2, 'wisata--wisata-budaya.jpg', 'Shopping Melayu', 'resotoran A  resotoran B  resotoran C  resotoran D ', '230000', 'https://goo.gl/maps/S4VNVocxYKgBBxfb8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`idWisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `idWisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
