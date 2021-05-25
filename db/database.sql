-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Mei 2021 pada 11.24
-- Versi Server: 10.1.34-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `config`
--

INSERT INTO `config` (`id`, `title`, `value`) VALUES
(2, 'application', '{\"title\":\" Siente CMS\",\"desc\":\"anu\",\"logo\":\"app-logo.png\",\"background\":\"default.jpg\"}'),
(3, 'app_status', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `mode` int(11) NOT NULL COMMENT '1=view, 2=hidden',
  `to_link` int(11) NOT NULL COMMENT '0=master',
  `nestable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `link`
--

INSERT INTO `link` (`id`, `icon`, `title`, `link`, `mode`, `to_link`, `nestable`) VALUES
(1, 'fas fa-tachometer-alt', 'dashboard', 'dashboard/main', 1, 0, 1),
(2, 'fas fa-user', 'User', '', 1, 0, 2),
(3, '', 'User Data', 'user/main', 1, 2, 0),
(4, '', 'Add User', 'user/edit', 1, 2, 0),
(5, 'fas fa-user-shield', 'Permission', '', 1, 0, 3),
(6, '', 'Permission Data', 'permission/main', 1, 5, 0),
(7, '', 'Add Permission', 'permission/edit', 1, 5, 0),
(8, 'fas fa-link', 'Link', '', 1, 0, 4),
(9, '', 'Link Data', 'link/main', 1, 8, 0),
(10, '', 'Add Link', 'link/edit', 1, 8, 0),
(11, 'fas fa-sort', 'Order Link', 'link/order', 1, 8, 0),
(12, 'fas fa-cogs', 'App Config', 'config/edit', 1, 0, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `group` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permission`
--

INSERT INTO `permission` (`id`, `title`, `group`, `created_at`, `updated_at`) VALUES
(2, 'DEVELOPER', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\"]', '2021-05-24 07:25:29', '2021-05-24 09:30:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `permission_id`, `email`, `token`, `created`, `updated`) VALUES
(1, 'developer', '$2y$10$C3zyhmbvnu7vD0DS.xjJT.RMTOp4oTDEV9/7UFljdIz.bOBsX6NPG', 2, 'developer@example.com', '', '2021-05-20 07:36:08', '2021-05-24 14:34:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_has_link`
--

CREATE TABLE `user_has_link` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_ibfk_1` (`permission_id`);

--
-- Indexes for table `user_has_link`
--
ALTER TABLE `user_has_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `link_id` (`link_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_has_link`
--
ALTER TABLE `user_has_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user_has_link`
--
ALTER TABLE `user_has_link`
  ADD CONSTRAINT `user_has_link_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_has_link_ibfk_2` FOREIGN KEY (`link_id`) REFERENCES `link` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
