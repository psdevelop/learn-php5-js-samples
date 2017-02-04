-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 17 2014 г., 10:47
-- Версия сервера: 5.5.32
-- Версия PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `auto_shop`
--
CREATE DATABASE IF NOT EXISTS `auto_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `auto_shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `ARTICLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(255) NOT NULL,
  `FULL_TEXT` varchar(5000) NOT NULL,
  `ADD_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ARTICLE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`ARTICLE_ID`, `TITLE`, `FULL_TEXT`, `ADD_DATE`) VALUES
(1, 'Тест-драйв нового Renault Logan: бюджет пересмотрен!', 'Именно этот автомобиль продержался на конвейере десять лет, в течение которых его успели купить более полумиллиона россиян. Именно этот автомобиль доказал, что качественно, надежно и недорого всё-таки бывает. Да что там, именно Логан массово пересадил отечественных автомобилистов с Жигулей на новые иномарки. Один из самых знаковых автомобилей российского рынка наконец представлен во втором поколении. Итак, Renault Logan 2 – опять хит?', '2014-04-25 14:25:58'),
(2, 'Видео-тест Lifan X60 и Chery Tiggo', 'Целый месяц китайский кроссовер X60 провел в руках нашей редакции. За это время мы успели встретить на нем весну, совершить три путешествия, погонять по гоночному треку, описать наши позитивные и негативные впечатления, вызвав последними ревностный гнев владельцев. И, конечно же, сравнить Лифан с его прямым конкурентом. Уже успели прочитать? Теперь можно и посмотреть!', '2014-04-25 14:26:50'),
(3, 'Nissan Terrano: цены, комплектации, конкуренты', 'Полку компактных кроссоверов в России прибыло: стартовал прием заказов на долгожданный Nissan Terrano. Портал Kolesa.Ru с пристрастием изучил прайс-лист на ниссановскую новинку, выбрал ее оптимальную версию и выяснил, какие еще «паркетники» доступны в нашей стране за сравнимые деньги.', '2014-04-25 14:27:19'),
(4, 'Самые роскошные кабриолеты в России', 'Владение автомобилем со съемной крышей всегда считалось привилегией обеспеченных людей, для которых роскошь вполне обыденное дело. Однако теперь наше государство решило официально определить, какие автомобили являются роскошными, введя одноименный налог. Kolesa.Ru выяснили, что за модели кабриолетов подпадают под действие этого закона. ', '2014-04-25 14:27:47'),
(5, 'Тест видеорегистратора TrendVision TV-107: свои принципы', 'Видеорегистратор TrendVision TV-107 способен писать видео в максимальном разрешении Full HD, снабжен GPS-приемником и имеет нетривиальную компоновку корпуса. Словом, любопытный девайс, который нам было интересно опробовать на практике.', '2014-04-25 14:28:28'),
(6, 'Подушка безопасности: друг и враг', 'Какой марки был первый автомобиль с надувными подушками и почему первоначально затея с их внедрением провалилась? В каких случаях они спасают жизнь, а в каких – убивают? Разбираемся в их истории и конструкции.', '2014-04-25 14:28:57'),
(7, '14 новых кабриолетов, не облагаемых в России налогом на роскошь', 'Для большинства россиян кабриолеты являются символом богатства. Ведь только человек, желающий подчеркнуть свой статус и возможности, будет тратить деньги на автомобиль, чья практичность в условиях российского климата вызывает серьезные сомнения. Однако даже среди таких моделей можно найти те, которые наше государство не считает роскошными.', '2014-04-25 14:29:28'),
(8, 'Пекин-2014: главные серийные новинки', 'Прошли те времена, когда все свои самые актуальные новинки автопроизводители представляли в Женеве, Франкфурте, Париже, Детройте и еще паре-тройке салонов рангом слегка пониже. Теперь к этому пулу добавился еще один «центр силы»: автошоу в Пекине. Портал Kolesa.Ru выяснил, что покажут на нынешнем салоне в столице страны с самым емким в мире автомобильным рынком.', '2014-04-25 14:29:58'),
(9, 'Летние шины: новинки сезона-2014', 'К сезону 2014 года шинники подошли спокойно, решив поступить по принципу «лучшее – враг хорошего». Но все же многие производители представили свои свежие разработки, нашедшие воплощение в новых линейках и моделях. Так что любителям всего самого «горячего» есть из чего выбирать.', '2014-04-25 14:31:46'),
(10, 'Нью-Йорк 2014: самое актуальное для России', 'В Нью-Йорке с традиционных пресс-дней начал свою работу международный автосалон. Для широкой публики выставка открывается 18 апреля. Портал Kolesa.Ru разузнал, покажут ли в Нью-Йорке что-нибудь интересное для российских автолюбителей. Как выяснилось, россиянам стоит присмотреться к NY Auto Show 2014 повнимательнее.', '2014-04-25 14:32:16'),
(11, 'Новый Renault Logan: цены, комплектации, конкуренты', 'Компания Renault объявила о начале приема заказов на новый Logan. Со сменой поколений один из самых популярных в России «бюджетников» подешевел и «переехал» из столичного «Автофрамоса» на АвтоВАЗ. Портал Kolesa.Ru выяснил, сколько просят за различные версии нового Логана, когда он появится в продаже, и что предлагают за сравнимые деньги конкуренты.', '2014-04-25 14:32:49');

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `CARD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SESSION_ID` varchar(500) NOT NULL,
  `CREATE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CARD_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `cards`
--

INSERT INTO `cards` (`CARD_ID`, `SESSION_ID`, `CREATE_DATE`) VALUES
(1, '9k79tu3tfn7njho3ippki3km50', '2014-04-26 11:48:02'),
(2, 'ni21bqmbnlg0tlsfigm2i37mq0', '2014-04-26 16:57:33'),
(3, 'lhg55p6hq5592a2e17c3gldg24', '2014-04-27 09:10:30'),
(4, '1kk6oji1hovnjh32r4emega897', '2014-04-27 23:19:18'),
(5, '4jqctc38uvabbl5s5jstlekmb2', '2014-04-28 07:35:30'),
(6, 'qns7g4ihtttsbggc7hbr4l03d1', '2014-04-29 18:39:19'),
(7, '5i6daiete7pec0bgnfvjhp65e1', '2014-05-05 12:18:16'),
(8, 'ivuipt47q8l3dl1c0sjmea14s0', '2014-05-07 20:37:51'),
(9, 's9c8j3j95dcp1nc7fd0unf6g92', '2014-05-10 04:10:18'),
(10, 'vr6vg6m2h1ssbnln603aqv6jf1', '2014-05-17 00:11:23');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CAT_NAME` varchar(255) NOT NULL,
  `PARENT_ID` int(11) DEFAULT NULL,
  `IMG_PATH` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`CAT_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`CAT_ID`, `CAT_NAME`, `PARENT_ID`, `IMG_PATH`) VALUES
(1, 'Запчасти для ТО', NULL, NULL),
(2, 'Мотокаталоги', NULL, NULL),
(3, 'Аксессуары и тюнинг', NULL, NULL),
(4, 'Масла и автохимия', NULL, NULL),
(5, 'Шины и диски', NULL, NULL),
(6, 'Все для автосервиса', NULL, NULL),
(7, 'Автолитература', NULL, NULL),
(8, 'Автоэлектроника', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `NEWS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `AUTHOR` varchar(255) NOT NULL,
  `NEWS_HEAD` varchar(255) NOT NULL,
  `NEWS_TEXT` varchar(2000) NOT NULL,
  `DATA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`NEWS_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`NEWS_ID`, `AUTHOR`, `NEWS_HEAD`, `NEWS_TEXT`, `DATA`) VALUES
(1, 'Администратор', 'Новое поколение моторных масел Mobile 1', 'Новое поколение моторных масел Mobile 1 позволит почувствовать Вас за рулем лучшего автомобиля в мире. Выбирайте лучшие автомобильные масла от Mobile.', '2014-04-25 13:07:44'),
(2, 'Администратор', 'Новые свечи BOSH', 'Выбирайте новые свечи BOSH. Гарантия немецких производителей на долгую, безупречную работу двигателя. Свечи BOSH - и никаких проблем. Качество BOSH.', '2014-04-25 13:55:36'),
(3, 'Администратор', 'Качественное топливо на заправках LUKOIL', 'Сеть заправок LUKOIL предоставляет высокий севис, современное оборудование и высокое качество всех видов топлива для вашего автомобиля. Выбирайте заправки LUKOIL в дороге и перед ней, качество гарантируем!', '2014-04-25 14:00:56');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SESSION_ID` varchar(500) NOT NULL,
  `FAMILY` varchar(150) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `SURNAME` varchar(150) NOT NULL,
  `ADRES` varchar(1000) DEFAULT NULL,
  `TR_SELECT` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ORDER_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `CDATE`, `SESSION_ID`, `FAMILY`, `NAME`, `SURNAME`, `ADRES`, `TR_SELECT`) VALUES
(2, '2014-05-17 08:24:44', 'vr6vg6m2h1ssbnln603aqv6jf1', 'Иванов', 'Иван', 'Иванович', 'Весенняя, 3', 1),
(3, '2014-05-17 08:41:13', 'vr6vg6m2h1ssbnln603aqv6jf1', 'Петров', 'Петр', 'Петрович', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `SESSION_ID` varchar(500) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `ORDER_ID` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`SESSION_ID`, `PRODUCT_ID`, `ORDER_ID`) VALUES
('9k79tu3tfn7njho3ippki3km50', 16, -1),
('9k79tu3tfn7njho3ippki3km50', 11, -1),
('9k79tu3tfn7njho3ippki3km50', 8, -1),
('9k79tu3tfn7njho3ippki3km50', 21, -1),
('ni21bqmbnlg0tlsfigm2i37mq0', 1, -1),
('ni21bqmbnlg0tlsfigm2i37mq0', 4, -1),
('ni21bqmbnlg0tlsfigm2i37mq0', 6, -1),
('lhg55p6hq5592a2e17c3gldg24', 10, -1),
('lhg55p6hq5592a2e17c3gldg24', -1, -1),
('lhg55p6hq5592a2e17c3gldg24', -1, -1),
('lhg55p6hq5592a2e17c3gldg24', -1, -1),
('lhg55p6hq5592a2e17c3gldg24', -1, -1),
('lhg55p6hq5592a2e17c3gldg24', -1, -1),
('lhg55p6hq5592a2e17c3gldg24', -1, -1),
('lhg55p6hq5592a2e17c3gldg24', 29, -1),
('1kk6oji1hovnjh32r4emega897', 1, -1),
('1kk6oji1hovnjh32r4emega897', 3, -1),
('5i6daiete7pec0bgnfvjhp65e1', 1, -1),
('5i6daiete7pec0bgnfvjhp65e1', 3, -1),
('s9c8j3j95dcp1nc7fd0unf6g92', 2, -1),
('s9c8j3j95dcp1nc7fd0unf6g92', 4, -1),
('vr6vg6m2h1ssbnln603aqv6jf1', 1, 1),
('vr6vg6m2h1ssbnln603aqv6jf1', 3, 1),
('vr6vg6m2h1ssbnln603aqv6jf1', 2, 2),
('vr6vg6m2h1ssbnln603aqv6jf1', 4, 2),
('vr6vg6m2h1ssbnln603aqv6jf1', 6, 2),
('vr6vg6m2h1ssbnln603aqv6jf1', 13, 3),
('vr6vg6m2h1ssbnln603aqv6jf1', 12, 3),
('vr6vg6m2h1ssbnln603aqv6jf1', 10, 3),
('vr6vg6m2h1ssbnln603aqv6jf1', 8, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRODUCT_NAME` varchar(500) NOT NULL,
  `CAT_ID` int(11) NOT NULL,
  `IMG_PATH` varchar(500) DEFAULT NULL,
  `PRICE` double NOT NULL,
  `MARK_NAME` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`PRODUCT_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`PRODUCT_ID`, `PRODUCT_NAME`, `CAT_ID`, `IMG_PATH`, `PRICE`, `MARK_NAME`) VALUES
(1, 'Каталог аксессуаров для мототехники', 2, NULL, 1, 'ALL RIGHT'),
(2, 'Широкий ассортимент багажных систем для мототехники', 2, NULL, 1, 'Cameron'),
(3, 'Популярный каталог мотоаксессуаров (шлемы, стекла, одежда)', 2, NULL, 1, 'Helmet house'),
(4, 'Каталог оригинальных запчастей и аксессуаров на мотоциклы', 2, NULL, 1, 'Kawasaki'),
(5, 'Корейские шины для мотоциклов и скутеров', 2, NULL, 1, 'Shinko'),
(6, 'Запчасти для мотоциклов YAMAHA', 2, NULL, 1, 'Yamaha'),
(7, 'Выхлопная система Performance', 3, NULL, 1, 'BMW'),
(8, 'Брызговики задние', 3, NULL, 1, 'BMW'),
(9, 'Диффузор задний', 3, NULL, 1, 'BMW'),
(10, 'Накладки дверных порогов', 3, NULL, 1, 'BMW'),
(11, 'Дефлекторы окон комплект', 3, NULL, 1, 'Kia'),
(12, 'Панель приборов/ Центральная консоль; 13 Деталей', 3, NULL, 1, 'Mazda'),
(13, 'Универсальный багажник', 3, NULL, 1, 'Mazda'),
(14, 'Cетка защитно-декоративная', 3, NULL, 1, 'Mazda'),
(15, 'Болт-секретки, L2 Е, кольцо', 3, NULL, 0, 'Toyota'),
(16, 'Антипробуксовочная лента (комплект 2шт)', 3, NULL, 1, 'Toyota'),
(17, 'Компрессор мини со светодиодной лампой, 12 В, 7 бар', 3, NULL, 1, 'Toyota'),
(18, 'Mazda 0530-05-TFE Original oil Ultra', 4, NULL, 1, 'Масла моторные'),
(19, 'Honda 08217-99974 Ultra LEO-SN', 4, NULL, 1, 'Масла моторные'),
(20, 'Toyota 08880-10705 SN', 4, NULL, 1, 'Масла моторные'),
(21, 'CRC 10.128.1.16.12.58 Очистители тормозов', 4, NULL, 1, 'Автохимия'),
(22, 'Abro CC200 Очистители аэрозольные', 4, NULL, 1, 'Автохимия'),
(23, 'Lavr next LN2505 Набор', 4, NULL, 1, 'Автохимия'),
(24, 'Ls Replica VW5', 5, NULL, 1, 'Диски колёсные, литые'),
(25, 'Ls Replica Ki52', 5, NULL, 1, 'Диски колёсные, литые'),
(26, 'Bantaj BJ5995 BJ5995', 5, NULL, 1, 'Диски колесные, штампованные'),
(27, 'Kfz 7080 7080', 5, NULL, 1, 'Диски колесные, штампованные'),
(35, 'Комплект ТО Платинум', 1, NULL, 150000, 'BMW');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
