-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2021 pada 07.56
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_services`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kurir`
--

CREATE TABLE `tb_kurir` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `jkel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kurir`
--

INSERT INTO `tb_kurir` (`id`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `email`, `agama`, `jkel`) VALUES
(1, 'kurir', 'jakarta', '2020-12-01', 'jln.bima dua tiga                    ', '08976677', 'kurir@gmail.com', 'islam', 'pria'),
(2, 'Raya Kur', 'Repellendus Dolorem', '2019-05-23', 'Rem dolore numquam i                    ', 'Voluptas rem', 'test@gmail.com', 'Katolik', 'wanita'),
(3, 'Courtney Lloyd', 'Soluta est dolorem e', '1974-07-04', 'Qui officia ut aut r required', 'Quis quos pa', 'nurulraws@gmail.com', 'Islam', 'pria'),
(4, 'Herman Witt', 'Doloribus occaecat q', '1994-12-15', 'Ex in tempore Nam n', 'Maxime eu of', 'nurulraws@gmail.com', 'Budha', 'pria'),
(5, 'Sasha Pittman', 'Et ut fugiat in erro', '1999-10-21', 'Dolor dolores quia t', 'Labore non q', 'nurulraws@gmail.com', 'Islam', 'pria'),
(6, 'Omar Dennis', 'Suscipit dolor ea mo', '2007-11-15', 'Est sequi dolorum r', 'Qui doloribu', 'nurulraws@gmail.com', 'Hindu', 'pria'),
(7, 'Basia Weber', 'Voluptates iusto con', '1988-05-18', 'Eos mollitia officii', 'Mollit harum', 'nurulraws@gmail.com', 'Budha', 'pria'),
(8, 'Kirby Pratt', 'Magnam dolore ad acc', '1978-01-02', 'Recusandae Blanditi', 'Vel nobis qu', 'nurulraws@gmail.com', 'Budha', 'wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `no_awb` varchar(30) NOT NULL,
  `consignee` varchar(30) NOT NULL,
  `tgl` datetime NOT NULL,
  `tgl_deadline` datetime NOT NULL,
  `alamat` text NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `foto_penerima` varchar(100) NOT NULL,
  `foto_lokasi` varchar(100) NOT NULL,
  `foto_gedung` varchar(100) NOT NULL,
  `foto_shareloc` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `no_awb`, `consignee`, `tgl`, `tgl_deadline`, `alamat`, `id_kurir`, `foto_penerima`, `foto_lokasi`, `foto_gedung`, `foto_shareloc`, `status`) VALUES
(1, '7156-202011-01774', 'KPP  PMA EMPAT', '2020-12-08 00:00:00', '0000-00-00 00:00:00', 'Jln. raya juang', 32, 'dumbell-barbel1.jpg', '6cfcc5f587d9ddcd88ca1bb0e95824f6.jpg', 'RiperKomputer_1.jpg', 'shareloc2.jpg', 'On Progress'),
(2, '7156-202011-01775', 'KPP Surat Dinas', '2020-12-08 00:00:00', '0000-00-00 00:00:00', 'jln bima ', 32, 'penerima2.jpg', 'dumbell-barbel2.jpg', 'gedung3.jpg', 'shareloc3.jpg', 'On Progress'),
(3, '7156-202011-01778', 'KPP Surat Din', '2020-12-08 00:00:00', '2020-12-08 00:00:00', 'jln bima 2', 32, 'penerima1.jpg', 'lokasi2.jpg', 'gedung2.jpg', 'shareloc1.jpg', 'On Progress'),
(4, '7156-202011-01776', 'KPP Surat 123', '2020-12-08 07:50:53', '2020-12-08 03:50:53', 'jln bima 123', 32, '', '', '', '', 'Complete'),
(5, '7156-202011-01780', 'KPP Surat Din', '2020-12-08 07:29:46', '2020-12-08 07:32:46', 'jln bima123', 32, 'baju_anak_pria.jpg', 'Bola_Basket_.jpg', 'bola_takraw.jpg', 'dumbell-barbel.jpg', 'On Progress'),
(6, '7156-202011-01779', 'KPP Surat ', '2020-12-08 08:14:25', '2020-12-08 08:17:25', 'jln bima123456', 32, '6cfcc5f587d9ddcd88ca1bb0e95824f6.jpg', '6cfcc5f587d9ddcd88ca1bb0e95824f6.jpg', '', '', 'Complete'),
(7, '7156-202011-01788', 'New Letter', '2020-12-23 03:57:37', '2020-12-23 04:00:37', 'Vel aut laborum Non', 32, '6cfcc5f587d9ddcd88ca1bb0e95824f6.jpg', '6cfcc5f587d9ddcd88ca1bb0e95824f6.jpg', '', '', 'Complete'),
(8, '7156-202011-01777', 'New Letter 1', '2020-12-23 04:38:33', '2020-12-23 04:41:33', 'jln bima bima', 32, '6cfcc5f587d9ddcd88ca1bb0e95824f6.jpg', '6cfcc5f587d9ddcd88ca1bb0e95824f6.jpg', '', '', 'Complete'),
(9, '7156-202011-01781', 'New Letter-2', '2020-12-23 04:48:58', '2020-12-23 04:51:58', 'jln bima123456', 32, '6cfcc5f587d9ddcd88ca1bb0e95824f6.jpg', '6cfcc5f587d9ddcd88ca1bb0e95824f6.jpg', '', '', 'Complete');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `name`, `username`, `password`, `role_id`, `is_active`, `date_created`, `gambar`) VALUES
(1, 'mohamadarief1090@gmail.com', 'admin', 'admin', '123', 1, 1, '0000-00-00', ''),
(13, 'mangdarma@unpas.ac.id', 'mang Darma', '', '123', 3, 1, '0000-00-00', 'default.jpg'),
(15, 'fauzismp13@gmail.com', 'ahmad fauzi', '', '123', 3, 0, '0000-00-00', 'default.jpg'),
(17, 'ag6618836@gmail.com', 'Ria Rahmawati', '', '123', 3, 1, '0000-00-00', 'default.jpg'),
(19, 'faturahman12345@gmail.com', 'Mohamad Faturrahman', '', '123', 3, 1, '0000-00-00', 'default.jpg'),
(27, 'dennyseptiady2012@gmail.com', 'Denny Septiadi', '', '123', 2, 1, '0000-00-00', 'pompaair_1.jpg'),
(28, 'dejanjaya0@gmail.com', 'dejan jaya', '', '123', 2, 1, '0000-00-00', 'dejan_listr.jpg'),
(29, 'budi_r@gmail.com', 'Budi Raharjo', '', '123', 2, 0, '0000-00-00', 'budi_r.jpg'),
(30, 'bedusubuh@gmail.com', 'Bedu subuh', '', '123', 2, 0, '0000-00-00', 'bangunanbedu.jpg'),
(31, 'alizaenal@gmail.com', 'Ali Zaenal', '', '123', 2, 0, '0000-00-00', 'RiperKomputer_1.jpg'),
(32, 'kurir@gmail.com', 'kurir', 'kurir', 'kurir', 2, 1, '0000-00-00', NULL),
(33, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, 1, '0000-00-00', NULL),
(34, 'test@gmail.com', 'Raya Reyes', 'Raya', 'test123', 2, 1, '2020-12-08', NULL),
(40, 'nurulraws@gmail.com', 'Kirby Pratt', '', 'test', 2, 1, '2020-12-08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(26, 'erik@gmail.com', 'VRVb+mHs1dw7HVKCVOtyJA1O4MD5CXfyF4dJhGs9zUs=', 1604500798),
(28, 'mangdarma@unpas.ac.id', '6nSO2yEvJ4Vz2lHA3kxYI+EPmaOZ3SAUkZFTSOFm1J4=', 1604672691),
(30, 'fauzismp13@gmail.com', '0xGISxUqQvPRnLW8g/Y443Iu3AP0lzjUFGp63B9lcpE=', 1605682804),
(32, 'ag6618836@gmail.com', '4rUW38GYcmoDDyo9wdDJMHuE0VBprtHbRn+5A0bTvDE=', 1605868836),
(34, 'faturahman12345@gmail.com', 'az6K+8deE2qLjBltFSRemsBXtQ5lQXRZOm+PFgc1v+s=', 1606305870),
(42, 'dennyseptiady2012@gmail.com', 'vpNWMR/5FYp9SeSyQnaFay2JSBM3MqQH43c/YrdEUyc=', 1606802162),
(43, 'dejanjaya0@gmail.com', 'WrRWlj0RhCHSlQxTr4PctDw5zwtNCwvU0pan65NBU+Y=', 1606802762),
(44, 'budi_r@gmail.com', 'NhijMNsMEeqUknBS9Wod2k4usKdtyUPolmZN5qnwjew=', 1606808204),
(45, 'bedusubuh@gmail.com', 'eUtBotkYuD+iAGQVFd6cBy+TdySkHnmQSXQHfHLHAm8=', 1606808663),
(46, 'alizaenal@gmail.com', 'kiTsJkXGXQXaYF1nteFtuj+KuADZSf+l/fmdTxr8HFU=', 1606823978),
(47, 'symo@gmail.com', 'zTq/Uzj83piPzYeAJ1wjqrYxvEdnfqNdBWwoqexCwxw=', 1607411123);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kurir`
--
ALTER TABLE `tb_kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kurir`
--
ALTER TABLE `tb_kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
