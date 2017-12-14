-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 14 2017 г., 14:15
-- Версия сервера: 5.5.48-log
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `garage_cars`
--

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `id` int(11) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`id`, `car_name`, `user_id`) VALUES
(1, 'AUDI', NULL),
(2, 'BMW', NULL),
(3, 'Mercedes Benz', NULL),
(4, 'Chevrolet', NULL),
(5, 'Skoda', NULL),
(6, 'VAZ', 11),
(7, 'MINI', 11),
(8, 'TESLA', 16);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `open_pass` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `tell` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `role` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `open_pass`, `tell`, `address`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `role`) VALUES
(7, 'admin', 'admin@admin.com', '$2y$13$PJsa26moEUAPZ5lTwCiibexk7ZI7CcIsCIXcTZmFWMMsbtNDGcl2S', '', '777-77-777', 'Kiev', 'WLCTon67Deou8-U4o6r-8j5MBYwqxgtm', 1477039999, NULL, NULL, '127.0.0.1', 0, 0, 0, 10),
(11, 'demo', 'demo@mail.com', '$2y$13$PJsa26moEUAPZ5lTwCiibexk7ZI7CcIsCIXcTZmFWMMsbtNDGcl2S', '', '', '', '', NULL, NULL, NULL, '127.0.0.1', 1513193081, 1513193081, 0, 5),
(16, '', 'test@mail.com', '$2y$13$Ei8mDgHNOX2CdAiH.ZhS8ubrGhEdYG7WkgIMVE9aB.H3sQpNFBPBa', '', '', '', '', NULL, NULL, NULL, '127.0.0.1', 1513194543, 1513194543, 0, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `user_cars`
--

CREATE TABLE IF NOT EXISTS `user_cars` (
  `id` int(11) NOT NULL,
  `cars_id` int(11) NOT NULL,
  `color` tinyint(4) NOT NULL,
  `car_number` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_cars`
--

INSERT INTO `user_cars` (`id`, `cars_id`, `color`, `car_number`, `user_id`) VALUES
(1, 2, 2, 'AA3258CF', 11),
(2, 3, 9, 'HH7854KK', 11),
(3, 7, 5, 'TT2355EE', 11),
(4, 1, 2, 'AS6677JJ', 16),
(8, 4, 6, 'AS6677JI', 16);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_cars`
--
ALTER TABLE `user_cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `user_cars`
--
ALTER TABLE `user_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
