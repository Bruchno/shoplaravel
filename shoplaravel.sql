-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 31 2017 г., 17:49
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shoplaravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'Декоративные', '2017-10-29 13:56:44', '2017-10-31 07:54:44'),
(4, 'Кустарники', '2017-10-29 14:03:02', '2017-10-29 14:03:02'),
(5, 'Однолетники', '2017-10-31 06:59:15', '2017-10-31 07:54:31'),
(10, 'двухлетники', '2017-10-31 07:09:02', '2017-10-31 07:09:02'),
(13, 'Бордюрные', '2017-10-31 07:52:54', '2017-10-31 07:52:54');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `curency` enum('USD','EURO','ГРН') NOT NULL DEFAULT 'ГРН',
  `description` text NOT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `sort`, `color`, `price`, `curency`, `description`, `manufacturer`, `image`, `category`, `date_add`, `updated_at`, `created_at`) VALUES
(1, 'Гербера', 'Сириус', 'Розовый', 120.35, 'USD', 'Декоративное однолетнее растение, обильно  цветет с июня по октябрь', 'Deuchland', '02.jpg', '1', '2017-10-28 00:00:00', '2017-10-29 20:12:37', '2017-10-29 20:13:40'),
(2, 'Тюльпан', 'Парад', 'Алый', 234.52, 'ГРН', 'Цветыы весенние', 'Deuchland', '08.jpg', '1', '2017-10-28 00:00:00', '2017-10-29 20:12:37', '2017-10-29 20:13:40'),
(4, 'Орхидея', 'Гладиатор', 'Сиреневый с белым', 250.35, 'ГРН', 'Комнатное растение с необычайно красивыми  цветками. Обильно и продолжительно цветет, Чем украсит Ваш дом и поднимет настроение.', 'Deuchland', '05.jpg', '1', '2017-10-28 00:00:00', '2017-10-29 20:12:37', '2017-10-29 20:13:40'),
(12, 'троянда', 'ренклод', 'бледно-розовый', 57.8, 'USD', 'пинби ртнб тндбшош', 'украина', '4.jpg', 'Полевые', '2017-10-30 09:42:57', '2017-10-30 05:42:57', '2017-10-30 05:42:57'),
(16, 'герань', 'салют', 'розовый', 45.5, 'ГРН', 'РСЛОТТИС   Щ БИ ЩИ ИД', 'венгрия', '9.jpg', 'Комнатные', '2017-10-30 11:02:58', '2017-10-30 07:02:58', '2017-10-30 07:02:58'),
(24, 'vazon', 'sort', 'зеленый', 20.2, 'ГРН', 'kgdobmmb', 'dkgbmmb', 'vazon.jpg', 'Комнатные', '2017-10-30 11:57:13', '2017-10-30 10:26:06', '2017-10-30 07:57:13'),
(27, 'name', 'sort', 'color', 56.6, 'ГРН', 'dfgdhnnvd fibinbn', 'USA', '8.jpg', 'Полевые', '2017-10-30 15:32:59', '2017-10-30 11:32:59', '2017-10-30 11:32:59'),
(29, 'ландыши', 'ооо', 'белый', 255, 'ГРН', 'ллллд', 'ллл', '2.jpg', 'Декоративные', '2017-10-31 12:44:47', '2017-10-31 09:14:38', '2017-10-31 08:44:47');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
