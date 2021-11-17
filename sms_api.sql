-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 17 ное 2021 в 17:28
-- Версия на сървъра: 10.4.16-MariaDB
-- Версия на PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `sms_api`
--

-- --------------------------------------------------------

--
-- Структура на таблица `sms_sender`
--

CREATE TABLE `sms_sender` (
  `id` int(11) NOT NULL,
  `phone` text NOT NULL,
  `text` longtext NOT NULL,
  `code` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `sms_sender`
--

INSERT INTO `sms_sender` (`id`, `phone`, `text`, `code`) VALUES
(1, '2147483647', 'Use this code for validation', '68899'),
(2, '2147483647', 'Use this code for validation', '21213'),
(3, '00359359878606208', 'Use this code for validation', '96957'),
(4, '00359359878606208', 'Use this code for validation', '55025'),
(5, '00359359878606208', 'Use this code for validation', '10663'),
(6, '00359359878606208', 'Use this code for validation', '63574'),
(7, '00359359878606208', 'Use this code for validation', '82419'),
(8, '00359878606208', 'Use this code for validation', '55057');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES
(1, 'kris', 'kris@abv.bg', 1),
(2, 'kris2', 'kris2@abv.bg', 1),
(3, 'kris', 'kris@abv.bg', 1),
(4, 'kris2', 'kris2@abv.bg', 1);

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `sms_sender`
--
ALTER TABLE `sms_sender`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sms_sender`
--
ALTER TABLE `sms_sender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
