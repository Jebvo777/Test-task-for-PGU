-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 21 2021 г., 17:17
-- Версия сервера: 10.3.27-MariaDB-0+deb10u1
-- Версия PHP: 7.3.27-9+0~20210227.82+debian10~1.gbpa4a3d6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shedule_ex`
--

-- --------------------------------------------------------

--
-- Структура таблицы `shedule`
--

CREATE TABLE `shedule` (
  `id` int(11) NOT NULL COMMENT 'id',
  `id_subject` int(11) NOT NULL COMMENT 'id предмета',
  `date` datetime NOT NULL COMMENT 'Дата проведения экзамена'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Расписание экзаменов';

--
-- Дамп данных таблицы `shedule`
--

INSERT INTO `shedule` (`id`, `id_subject`, `date`) VALUES
(1, 1, '2021-06-15 08:00:00'),
(2, 2, '2021-06-17 08:00:00'),
(3, 3, '2021-06-19 08:00:00'),
(4, 4, '2021-06-21 08:00:00'),
(5, 5, '2021-06-23 08:00:00'),
(6, 6, '2021-06-25 08:00:00'),
(7, 7, '2021-06-27 08:00:00'),
(8, 8, '2021-06-29 08:00:00'),
(9, 9, '2021-06-30 08:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `specialities`
--

CREATE TABLE `specialities` (
  `id` int(11) NOT NULL COMMENT 'id',
  `code` text NOT NULL COMMENT 'Шифр специальности',
  `title` text NOT NULL COMMENT 'Название специальности'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Список специальностей';

--
-- Дамп данных таблицы `specialities`
--

INSERT INTO `specialities` (`id`, `code`, `title`) VALUES
(1, '09.03.02', 'Информационные системы и технологии'),
(2, '09.03.04', 'Программная инженерия'),
(3, '09.03.01', 'Информатика и вычислительная техника');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL COMMENT 'id',
  `title` text NOT NULL COMMENT 'Название предмета'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Предметы';

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id`, `title`) VALUES
(1, 'Программирование систем реального времени'),
(2, 'Проектирование и конструирование программного обеспечения'),
(3, 'Обработка информации в вычислительных сетях'),
(4, 'БЖД'),
(5, 'История'),
(6, 'Математика'),
(7, 'Информатика'),
(8, 'Русский язык'),
(9, 'Литература');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects_to_specialities`
--

CREATE TABLE `subjects_to_specialities` (
  `id` int(11) NOT NULL COMMENT 'id',
  `id_speciality` int(11) NOT NULL COMMENT 'id специальности',
  `id_subject` int(11) NOT NULL COMMENT 'id предмета'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Связки';

--
-- Дамп данных таблицы `subjects_to_specialities`
--

INSERT INTO `subjects_to_specialities` (`id`, `id_speciality`, `id_subject`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `shedule`
--
ALTER TABLE `shedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Индексы таблицы `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects_to_specialities`
--
ALTER TABLE `subjects_to_specialities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_speciality` (`id_speciality`),
  ADD KEY `id_subject` (`id_subject`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `shedule`
--
ALTER TABLE `shedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `subjects_to_specialities`
--
ALTER TABLE `subjects_to_specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `shedule`
--
ALTER TABLE `shedule`
  ADD CONSTRAINT `shedule_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`);

--
-- Ограничения внешнего ключа таблицы `subjects_to_specialities`
--
ALTER TABLE `subjects_to_specialities`
  ADD CONSTRAINT `subjects_to_specialities_ibfk_1` FOREIGN KEY (`id_speciality`) REFERENCES `specialities` (`id`),
  ADD CONSTRAINT `subjects_to_specialities_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
