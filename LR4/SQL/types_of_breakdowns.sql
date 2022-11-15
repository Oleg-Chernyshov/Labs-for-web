-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 15 2022 г., 21:58
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `repair orders`
--

-- --------------------------------------------------------

--
-- Структура таблицы `types of breakdowns`
--

CREATE TABLE `types of breakdowns` (
  `Id_repair` int(11) UNSIGNED NOT NULL,
  `Name of the repair` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `types of breakdowns`
--

INSERT INTO `types of breakdowns` (`Id_repair`, `Name of the repair`) VALUES
(1, 'Engine repair'),
(2, 'Suspension repair'),
(3, 'Service'),
(4, 'Electronics repair'),
(5, 'Body repair');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `types of breakdowns`
--
ALTER TABLE `types of breakdowns`
  ADD PRIMARY KEY (`Id_repair`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `types of breakdowns`
--
ALTER TABLE `types of breakdowns`
  MODIFY `Id_repair` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
