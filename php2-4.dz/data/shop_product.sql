-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 24 2017 г., 21:55
-- Версия сервера: 5.6.37
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `shop_product`
--

CREATE TABLE `shop_product` (
  `item_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(1000) NOT NULL,
  `parth-image` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_product`
--

INSERT INTO `shop_product` (`item_id`, `name`, `price`, `description`, `parth-image`) VALUES
(1, 'Толщиномер ЛКП ЕТ-110', 6400, 'Описание', '../public/img/'),
(2, 'Толщиномер ЛКП ЕТ-444', 7400, 'Описание', '../public/img/'),
(3, 'Толщиномер ЛКП ЕТ-333', 6000, 'Описание', '../public/img/'),
(4, 'Толщиномер ЛКП ЕТ-555', 7900, 'Описание', '../public/img/'),
(5, 'Толщиномер ЛКП ЕТ-11Р', 5700, 'Описание', '../public/img/'),
(6, 'Толщиномер ЛКП CHY-115', 7100, 'Описание', '../public/img/'),
(7, 'Толщиномер ЛКП CHY-113', 5600, 'Описание', '../public/img/'),
(8, 'Тестер ЕТ 200', 2900, 'Описание', '../public/img/'),
(9, 'Тестер ЕТ 300', 4200, 'Описание', '../public/img/'),
(10, 'Толщиномер ЕТ 600', 8500, 'Описание', '../public/img/');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `shop_product`
--
ALTER TABLE `shop_product`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `shop_product`
--
ALTER TABLE `shop_product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
