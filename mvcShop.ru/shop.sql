-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 12 2017 г., 21:06
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
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id_user` int(11) NOT NULL,
  `session_id` varchar(64) CHARACTER SET utf8 NOT NULL,
  `id_good` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id_user`, `session_id`, `id_good`, `price`) VALUES
(0, 'vtrr132ep80u9aojrdch3lfo30', 1, 100.2);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `status`, `name`, `parent_id`) VALUES
(1, 1, 'Category 1', 0),
(2, 1, 'Category 2', 1),
(3, 1, 'Category 3', 1),
(4, 1, 'Category 4', 0),
(5, 1, 'Category 5', 2),
(6, 1, 'Category 6', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `feedback_body` text CHARACTER SET utf8 NOT NULL,
  `feedback_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `feedback_body`, `feedback_user`) VALUES
(1, 'Тест', 0),
(3, '13123123', 1123123);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_good` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` float NOT NULL,
  `id_category` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_good`, `name`, `price`, `id_category`, `status`) VALUES
(1, 'Good 1', 100.2, 1, 1),
(2, 'Good 2', 120, 2, 1),
(3, 'Good 3', 47.8, 2, 1),
(4, 'Good 4', 100500, 2, 1),
(5, 'Good 5', 2001, 3, 4),
(6, 'Good 6', 1020.2, 4, 1),
(7, 'Good 7', 1.2, 4, 1),
(8, 'Good 8', 800.1, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ocorder`
--

CREATE TABLE `ocorder` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order_status` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `ocorder`
--

INSERT INTO `ocorder` (`id_order`, `id_user`, `id_order_status`, `total`) VALUES
(1, 7, 3, 100668),
(2, 7, 1, 100768),
(3, 7, 2, 300.6),
(4, 8, 1, 100.2),
(5, 10, 4, 1021.4);

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id_order` int(11) NOT NULL,
  `id_good` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id_order`, `id_good`, `quantity`, `price`, `total`) VALUES
(1, 2, 1, 120, 120),
(1, 3, 1, 47.8, 47.8),
(1, 4, 1, 100500, 100500),
(2, 1, 1, 100.2, 100.2),
(2, 2, 1, 120, 120),
(2, 3, 1, 47.8, 47.8),
(2, 4, 1, 100500, 100500),
(3, 1, 3, 100.2, 300.6),
(4, 1, 1, 100.2, 100.2),
(5, 6, 1, 1020.2, 1020.2),
(5, 7, 1, 1.2, 1.2);

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id_order_status` int(11) NOT NULL,
  `order_status_name` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id_order_status`, `order_status_name`) VALUES
(1, 'подготовлен'),
(2, 'оформлен'),
(3, 'отменен'),
(4, 'завершен');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `user_login` varchar(256) CHARACTER SET utf8 NOT NULL,
  `user_password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(32) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `user_last_action` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_login`, `user_password`, `salt`, `status`, `user_last_action`) VALUES
(10, 'Александр', 'Korgik', '0d03da5455d46d11dfe5c2e18bc95af9', 'df9Ccb', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `session_id` (`session_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_good`);

--
-- Индексы таблицы `ocorder`
--
ALTER TABLE `ocorder`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id_order_status`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_good` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `ocorder`
--
ALTER TABLE `ocorder`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id_order_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
