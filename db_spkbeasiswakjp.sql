-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 05:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spkbeasiswakjp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot2`
--

CREATE TABLE `bobot2` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `jenis_kriteria` varchar(10) NOT NULL,
  `b_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot2`
--

INSERT INTO `bobot2` (`id`, `kriteria`, `jenis_kriteria`, `b_nilai`) VALUES
(1, 'Penghasilan orang tua', 'cost', 5),
(2, 'Tanggungan orang tua', 'benefit', 5),
(3, 'Absensi', 'cost', 3),
(4, 'Nilai raport', 'benefit', 2),
(5, 'Kepribadian', 'benefit', 3),
(6, 'Kondisi rumah', 'cost', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `nis`, `nama`, `total`) VALUES
(1, 13827, 'Ridho Tri Juliansyah', 0.11787909980016),
(2, 14088, 'Davier Ridzal', 0.083977126324733),
(3, 13902, 'Zakia Tista', 0.084929089409543),
(4, 13881, 'Ferdian Adhi Pramana', 0.092425850629416),
(5, 13821, 'Mohammad Farel Rabbani', 0.11165869443977),
(6, 13970, 'Silviana Agustin', 0.074484995056762),
(7, 13799, 'Annisa Devita Rahmawaty', 0.12187814778919),
(8, 13469, 'Banyu Hanuraga', 0.10158813820117),
(9, 13848, 'Jonathan Alvent Natanael', 0.11029382177844),
(10, 13690, 'Dias Ayuningtyas', 0.10088503657081);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `penghasilan_ortu` varchar(20) NOT NULL,
  `tanggungan_ortu` varchar(20) NOT NULL,
  `absensi` varchar(20) NOT NULL,
  `nilai_raport` varchar(20) NOT NULL,
  `kepribadian` varchar(20) NOT NULL,
  `kondisi_rumah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_siswa`, `penghasilan_ortu`, `tanggungan_ortu`, `absensi`, `nilai_raport`, `kepribadian`, `kondisi_rumah`) VALUES
(1, 15, '1100000', '3 Anak', 'Tidak pernah alpa', '80', 'Sangat Baik', 'Cukup'),
(2, 22, '3500000', '4 Anak', '2', '85', 'Baik', 'Sangat Baik'),
(3, 17, '4200000', '3 Anak', '2', '90', 'Cukup', 'Kurang'),
(4, 20, '3400000', '4 Anak', '1', '87', 'Baik', 'Baik'),
(5, 14, '950000', '2 Anak', '3', '82', 'Baik', 'Kurang'),
(6, 23, '2500000', '2 Anak', '2', '74', 'Kurang', 'Cukup'),
(7, 16, '1100000', '>= 5 Anak', 'Tidak pernah alpa', '78', 'Baik', 'Baik'),
(8, 21, '2400000', '2 Anak', '1', '80', 'Cukup', 'Sangat Kurang'),
(9, 18, '3700000', '>= 5 Anak', '1', '88', 'Baik', 'Kurang'),
(10, 19, '1500000', '3 Anak', '2', '92', 'Sangat Baik', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `tgl_lahir`, `jenis_kelamin`, `kelas`, `alamat`) VALUES
(14, 13821, 'Mohammad Farel Rabbani', '2005-09-23', 'L', '10-1', 'Jakarta Timur'),
(15, 13827, 'Ridho Tri Juliansyah', '2005-04-04', 'L', '10-1', 'Depok'),
(16, 13799, 'Annisa Devita Rahmawaty', '2005-09-04', 'P', '10-1', 'Jakarta Timur'),
(17, 13902, 'Zakia Tista', '2005-09-05', 'P', '10-3', 'Depok'),
(18, 13848, 'Jonathan Alvent Natanael', '2004-04-03', 'P', '10-2', 'Depok'),
(19, 13690, 'Dias Ayuningtyas', '2005-04-05', 'L', '11-IPS -2', 'Jakarta Selatan'),
(20, 13881, 'Ferdian Adhi Pramana', '2005-03-03', 'L', '10-3', 'Jakarta Timur'),
(21, 13469, 'Banyu Hanuraga', '2005-07-26', 'L', '11-MIPA-1', 'Bekasi'),
(22, 14088, 'Davier Ridzal', '2005-03-03', 'L', '10-9', 'Jakarta Timur'),
(23, 13970, 'Silviana Agustin', '2004-05-05', 'P', '10-5', 'Depok'),
(25, 13918, 'Ghulam Aditya Permana', '2014-01-15', 'L', '10-4', 'Depok '),
(26, 13856, 'Nazwa Auliati Printi', '2004-12-01', 'P', '10-2', 'Jakarta'),
(27, 14022, 'Enjelin Dwi Putri', '2004-09-13', 'P', '10-7', 'Bekasi'),
(28, 13609, 'Andriansyah', '2004-07-13', 'L', '11-MIPA-5', 'Jakarta Timur'),
(29, 13881, 'Ferdian Adhi Pramana', '2004-09-13', 'L', '10-3', 'Bekasi'),
(30, 13928, 'Naurah Salsabilla', '2004-07-13', 'P', '10-4', 'Jakarta Timur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `level`) VALUES
(3, 'Suryo', 'admin_suryo@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin'),
(4, 'Arraisuli', 'kesiswaan_arraisuli@gmail.com', '04c2872bb02299a89b213b2ee454ee0d', 'kesiswaan'),
(10, 'Rolances', 'kesiswaan_rolances@gmail.com', '04c2872bb02299a89b213b2ee454ee0d', 'kesiswaan'),
(12, 'Halim', 'admin_halim@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin'),
(13, 'Khairil', 'kesiswaan_khairil@gmail.com', '04c2872bb02299a89b213b2ee454ee0d', 'kesiswaan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot2`
--
ALTER TABLE `bobot2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fg_key` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot2`
--
ALTER TABLE `bobot2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `fg_key` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
