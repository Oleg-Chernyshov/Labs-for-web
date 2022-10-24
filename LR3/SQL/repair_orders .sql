-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 24 2022 г., 20:56
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
-- Структура таблицы `repair_orders`
--

CREATE TABLE `repair_orders` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Image_path` varchar(45) NOT NULL DEFAULT 'no_img.png',
  `Essence_of_the_work` varchar(45) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Id_repair` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `repair_orders`
--

INSERT INTO `repair_orders` (`Id`, `Image_path`, `Essence_of_the_work`, `Description`, `Cost`, `Id_repair`) VALUES
(1, 'oil_change.jpg', 'Замена масла в двигателе', 'Наши профессионалы заменят масло в вашем двигателе', 5000, 3),
(2, 'oil_change_2.jpg', 'Замена масла в коробке передач', 'Наши профессионалы заменят масло в вашей коробке передач', 8000, 3),
(3, 'Replacing_candles.jpg', 'Замена свечей', 'Наши специалисты заменят свечи в вашем двигателе', 2000, 3),
(4, 'Engine_diagnostics.jpg', 'Диагностика двигателя', 'Диагностируем любую поломку двигателя (починка не входит в стоимость)', 2000, 1),
(5, 'Timing_replacement.jpg', 'Замена ремня ГРМ', 'Заменим ремень ГРМ на вашей технике', 10000, 3),
(6, 'Replacement_headlights.jpg', 'Замена фар', 'Заменим испорченные фары на вашей технике на новые', 4000, 4),
(7, 'Body_repair.jpg', 'Кузовной ремонт', 'Исправим мелкие вмятины и царапины на вашей технике', 15000, 5),
(8, 'Door_Replacement.jpg', 'Замена двери', 'Заменим поврежденную дверь на новую', 2000, 5),
(9, 'Repair_racks.jpg', 'Ремонт стоек подвески', 'Заменим или отремонтируем стойки подвески вашей техники', 7000, 2),
(10, 'Collapse_convergence.jpg', 'Развал схождение', 'Настроим на вашей технике развал схождение', 12000, 2),
(11, 'Setting_engine.jpg', 'Настройка двигателя', 'Настроим двигатель на вашей технике для его стабильной работы', 1000, 1),
(12, 'Rust_removal.jpg', 'Удаление ржавчины', 'Удалим ржавчину из самых труднодоступных мест вашей техники', 800, 5),
(13, 'Car_painting.jpg', 'Покраска техники', 'Покрасим вашу технику в новый цвет', 1500, 5),
(14, 'Wiring_replacement.jpg', 'Замена проводки', 'Заменим проводку в вашей технике если она сгорела', 15000, 4),
(15, 'Rubber_Kit.jpg', 'Новый комплект резины', 'Подберем для вас новый комплект резины на вашу технику', 6000, 3),
(16, 'Routine_inspection.jpg', 'Плановое ТО', 'Проведем вам плановое ТО', 1000, 3),
(17, 'Guarantee.jpg', 'Гарантийный ремонт', 'Если ваша деталь на гарантии сломалась, мы ее заменим', 0, 3),
(18, 'Disk_repair.jpg', 'Ремонт диска', 'Отремонтируем ваш поврежденный диск', 600, 2),
(19, 'Removal_catalyst.jpg', 'Удаление катализатора', 'Удалим катализатор на вашей технике', 500, 2),
(20, 'Battery_replacement.jpg', 'Замена аккумулятора', 'Заменим ваш старый аккумулятор на новый', 500, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `types_of_breakdowns`
--

CREATE TABLE `types_of_breakdowns` (
  `Id_repair` int(11) UNSIGNED NOT NULL,
  `Name_of_the_repair` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `types_of_breakdowns`
--

INSERT INTO `types_of_breakdowns` (`Id_repair`, `Name_of_the_repair`) VALUES
(1, 'Ремонт двигателя'),
(2, 'Ремонт подвески'),
(3, 'Сервис'),
(4, 'Ремонт проводки'),
(5, 'Кузовной ремонт');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `Mail` varchar(64) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Blood_type` varchar(15) NOT NULL,
  `Rh_factor` varchar(15) NOT NULL,
  `Vk_link` varchar(45) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Interes` varchar(150) NOT NULL,
  `Adress` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Mail`, `Password`, `Name`, `Blood_type`, `Rh_factor`, `Vk_link`, `Gender`, `Date_of_birth`, `Interes`, `Adress`) VALUES
('oleg@mail.ru', '$2y$10$CiddRPmP2yaEa08o/QFQf.pGjszbTx.g8GIp6C2gTDTDELikl2fq6', '', '', '', '', 'Мужской', '2000-12-10', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `repair_orders`
--
ALTER TABLE `repair_orders`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `index_1` (`Id_repair`);

--
-- Индексы таблицы `types_of_breakdowns`
--
ALTER TABLE `types_of_breakdowns`
  ADD PRIMARY KEY (`Id_repair`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Mail`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `types_of_breakdowns`
--
ALTER TABLE `types_of_breakdowns`
  MODIFY `Id_repair` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `repair_orders`
--
ALTER TABLE `repair_orders`
  ADD CONSTRAINT `foreign_key_1` FOREIGN KEY (`Id_repair`) REFERENCES `types_of_breakdowns` (`Id_repair`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
