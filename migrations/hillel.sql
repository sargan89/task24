-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 12 2022 г., 22:36
-- Версия сервера: 8.0.29
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hillel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `customer_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_count` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`) VALUES
(21, 'Ноутбук HP Pavilion Gaming 15-ec2024ua', '248528822.jpeg', '42299.00'),
(22, 'Ноутбук ASUS TUF Gaming', '252193529.jpeg', '38999.00'),
(23, 'Ноутбук Lenovo V14 G2 ALC', '238664318.jpeg', '18799.00'),
(24, 'Ноутбук ASUS ROG Strix', '254840624.jpeg', '46999.00'),
(25, 'Ноутбук Apple MacBook Pro 16 M1 Pro 512GB 2021', '229714101.jpeg', '100999.00'),
(31, 'Ноутбук Lenovo IdeaPad 3', 'lenovo_ideapad3.jpeg', '13999.00'),
(32, 'Ноутбук Lenovo IdeaPad 3', 'lenovo_ideapad3.jpeg', '13999.00'),
(33, 'Ноутбук Apple MacBook Pro 16 M1 Pro 512GB 2021', '229714101.jpeg', '100999.00'),
(34, 'Ноутбук ASUS ROG Strix', '254840624.jpeg', '46999.00'),
(35, 'Ноутбук Lenovo V14 G2 ALC', '238664318.jpeg', '18799.00'),
(36, 'Ноутбук ASUS TUF Gaming', '252193529.jpeg', '38999.00'),
(37, 'Ноутбук HP Pavilion Gaming 15-ec2024ua', '248528822.jpeg', '42299.00'),
(38, 'Ноутбук HP Pavilion Gaming 15-ec2024ua', '248528822.jpeg', '42299.00'),
(39, 'Ноутбук ASUS TUF Gaming', '252193529.jpeg', '38999.00'),
(40, 'Ноутбук Lenovo V14 G2 ALC', '238664318.jpeg', '18799.00'),
(41, 'Ноутбук ASUS ROG Strix', '254840624.jpeg', '46999.00'),
(42, 'Ноутбук Apple MacBook Pro 16 M1 Pro 512GB 2021', '229714101.jpeg', '100999.00'),
(43, 'Ноутбук Lenovo IdeaPad 3', 'lenovo_ideapad3.jpeg', '13999.00'),
(44, 'Ноутбук Lenovo IdeaPad 3', 'lenovo_ideapad3.jpeg', '13999.00'),
(45, 'Ноутбук Apple MacBook Pro 16 M1 Pro 512GB 2021', '229714101.jpeg', '100999.00'),
(46, 'Ноутбук ASUS ROG Strix', '254840624.jpeg', '46999.00'),
(47, 'Ноутбук Lenovo V14 G2 ALC', '238664318.jpeg', '18799.00'),
(48, 'Ноутбук ASUS TUF Gaming', '252193529.jpeg', '38999.00'),
(49, 'Ноутбук HP Pavilion Gaming 15-ec2024ua', '248528822.jpeg', '42299.00'),
(50, 'Ноутбук Apple MacBook Pro 16 M1 Pro 512GB 2021', '229714101.jpeg', '100999.00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
