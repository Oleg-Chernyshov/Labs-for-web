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
-- Структура таблицы `repair orders`
--

CREATE TABLE `repair orders` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Image_path` varchar(45) NOT NULL DEFAULT 'no_img.png',
  `Essence of the work` varchar(45) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Id repair` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `repair orders`
--

INSERT INTO `repair orders` (`Id`, `Image_path`, `Essence of the work`, `Description`, `Cost`, `Id repair`) VALUES
(1, 'oil_change.jpg', 'Замена масла в двигателе', 'Наши профессионалы заменят масло в вашем двигателе', 5000, 3),
(2, 'oil_change_2.jpg', 'Замена масла в коробке передач', 'Наши профессионалы заменят масло в вашей коробке передач', 8000, 3),
(3, 'Replacing_candles.jpg', 'Замена свечей', 'Наши специалисты заменят свечи в вашем двигателе', 2000, 3),
(4, 'Engine_diagnostics.jpg', 'Диагностика двигателя', 'Диагностируем любую поломку двигателя (починка не входит в стоимость)', 2000, 1),
(5, 'Timing_replacement.jpg', 'Замена ремня ГРМ', 'Заменим ремень ГРМ на вашей технике', 10000, 3),
(6, 'Replacement_headlights.jpg', 'Замена фар', 'Заменим испорченные фары на вашей технике на новые', 4000, 4),
(7, 'Body_repair.jpg', 'Кузовной ремонт', 'Исправим мелкие вмятины и царапины на вашей технике', 15000, 5),
(8, 'Door_Replacement', 'Замена двери', 'Заменим поврежденную дверь на новую', 2000, 5),
(9, 'Repair_racks.jpg', 'Ремонт стоек подвески', 'Заменим или отремонтируем стойки подвески вашей техники', 7000, 2),
(10, 'Collapse_convergence.jpg', 'Развал схождение', 'Настроим на вашей технике развал схождение', 12000, 2),
(11, 'Setting_engine.jpg', 'Настройка двигателя', 'Настроим двигатель на вашей технике для его стабильной работы', 1000, 1),
(12, 'Rust_removal.jpg', 'Удаление ржавчины', 'Удалим ржавчину из самых труднодоступных мест вашей техники', 800, 5),
(13, 'Car _painting.jpg', 'Покраска техники', 'Покрасим вашу технику в новый цвет', 1500, 5),
(14, 'Wiring_replacement.jpg', 'Замена проводки', 'Заменим проводку в вашей технике если она сгорела', 15000, 4),
(15, 'Rubber_Kit.jpg', 'Новый комплект резины', 'Подберем для вас новый комплект резины на вашу технику', 6000, 3),
(16, 'Routine_inspection.jpg', 'Плановое ТО', 'Проведем вам плановое ТО', 1000, 3),
(17, 'Guarantee.jpg', 'Гарантийный ремонт', 'Если ваша деталь на гарантии сломалась, мы ее заменим', 0, 3),
(18, 'Disk_repair.jpg', 'Ремонт диска', 'Отремонтируем ваш поврежденный диск', 600, 2),
(19, 'Removal_catalyst.jpg', 'Удаление катализатора', 'Удалим катализатор на вашей технике', 500, 2),
(20, 'Battery_replacement.jpg', 'Замена аккумулятора', 'Заменим ваш старый аккумулятор на новый', 500, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `repair orders`
--
ALTER TABLE `repair orders`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `index_1` (`Id repair`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `repair orders`
--
ALTER TABLE `repair orders`
  ADD CONSTRAINT `foreign_key_1` FOREIGN KEY (`Id repair`) REFERENCES `types of breakdowns` (`Id_repair`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
