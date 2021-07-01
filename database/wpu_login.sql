-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2021 pada 13.41
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpu_login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `image` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(7, 'Sulastari', 'sulas15@gmail.com', 'gambar_41.jpg', '$2y$10$9lAhqKzTfsq0ZRAIY3RzfOIABLiMDT.qFumm1m09gz5pstkWMZbqu', 1, 1, 1620170819),
(28, 'Arga Syaputra', 'arga@gmail.com', 'default.jpg', '$2y$10$Co/jjj3cUqGEV5qgiJfwpecrFl8kxhHkfQb/GAytbPJBetDUGIl6G', 2, 1, 1621602805),
(29, 'Erik Hermanto', 'Sanjaya04@gmail.com', 'gambar_4.jpg', '$2y$10$UkMYjOH6YrQXkP1ZPStlRuLpordB/.ze6Zp7NQ6zdYDJ2XJs.iVi2', 2, 1, 1621690652);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_donasi`
--

CREATE TABLE `user_donasi` (
  `id` int(11) NOT NULL,
  `program_id` varchar(120) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `jumlah` double NOT NULL,
  `bank` varchar(120) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_donasi`
--

INSERT INTO `user_donasi` (`id`, `program_id`, `nama`, `jumlah`, `bank`, `tgl`) VALUES
(4, 'Bantu Anak - Anak Pesantren Nuru Jannah', 'Sulastari', 20000000, 'BRI', '2021-02-10'),
(6, 'Bantu Anak - Anak Pesantren Nuru Jannah', 'Erik Hermanto', 10000000, 'BNI', '2021-02-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_donatur`
--

CREATE TABLE `user_donatur` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `program` varchar(120) NOT NULL,
  `no_telp` varchar(120) NOT NULL,
  `nominal` double NOT NULL,
  `bank` varchar(120) NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_donatur`
--

INSERT INTO `user_donatur` (`id`, `nama`, `program`, `no_telp`, `nominal`, `bank`, `image`) VALUES
(38, 'Sulastari', 'Bantu Palestina', '085238603845', 10000000, 'BRI : 0093-01-049032-50-6 ', 'gambar 3.jpg'),
(39, 'Sulastari', 'Bantu Palestina', '085238603845', 10000000, 'BRI : 0093-01-049032-50-6 ', 'cartoon computer.jpg'),
(42, 'Erik Hermanto', 'Bantu Palestina', '085238603845', 200000, 'BRI : 0093-01-049032-50-6 ', 'gambar 6.jpg'),
(43, 'Arga Syaputra', 'Bantu Palestina', '085238603845', 200000, 'BRI : 0093-01-049032-50-6 ', 'gambar 6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_program`
--

CREATE TABLE `user_program` (
  `id` int(11) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `mulai` date NOT NULL,
  `deadline` date NOT NULL,
  `status` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_program`
--

INSERT INTO `user_program` (`id`, `judul`, `mulai`, `deadline`, `status`) VALUES
(1, 'Bantu Palestina', '2021-01-20', '2021-06-20', 'Sedang Berjalan'),
(3, 'Bantu Anak - Anak Pesantren Nurul Jannah', '2021-10-01', '2021-12-10', 'Belum Berjalan'),
(9, 'Program', '2021-01-25', '2021-10-09', 'Sedang Berjalan'),
(11, 'Test', '2021-01-25', '2020-10-25', 'Sedang Berjalan'),
(12, 'Program baru', '2021-10-01', '2021-01-09', 'Belum Berjalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `url` varchar(120) NOT NULL,
  `icon` varchar(120) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Dasboard', 'user', 'fas fa-fw fa-home', 1),
(2, 1, 'My Profile', 'admin', 'fas fa-fw fa-user', 1),
(3, 1, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Management', 'sub/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Change Password', 'user/changepasswprd', 'fas fa-fw fa-key', 1),
(8, 1, 'Data Donasi', 'donasi', 'fas fa-fw fa-file-alt', 1),
(9, 1, 'Data Donatur', 'donatur', 'fas fa-fw fa-heart', 1),
(10, 2, 'Program', 'program1', 'fas fa-fw fa-table', 1),
(42, 1, 'Data Program', 'program', 'fas fa-fw fa-th', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_donasi`
--
ALTER TABLE `user_donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_donatur`
--
ALTER TABLE `user_donatur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_program`
--
ALTER TABLE `user_program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
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
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_donasi`
--
ALTER TABLE `user_donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_donatur`
--
ALTER TABLE `user_donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_program`
--
ALTER TABLE `user_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
