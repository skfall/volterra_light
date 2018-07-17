-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 17 2018 г., 18:09
-- Версия сервера: 5.7.21
-- Версия PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `volterra`
--

-- --------------------------------------------------------

--
-- Структура таблицы `osc_admin_menu`
--

DROP TABLE IF EXISTS `osc_admin_menu`;
CREATE TABLE IF NOT EXISTS `osc_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(6) NOT NULL DEFAULT '0',
  `parent` int(6) NOT NULL DEFAULT '0',
  `table` varchar(255) DEFAULT '',
  `additional_fields` text,
  `landing_settings` text,
  `view_settings` text,
  `edit_settings` text,
  `create_settings` text,
  `form_params` longtext,
  `menu_params` longtext,
  `cardRelations` text,
  `assign` int(5) NOT NULL DEFAULT '0',
  `name` varchar(127) NOT NULL DEFAULT '0',
  `alias` varchar(127) NOT NULL DEFAULT '0',
  `filename` varchar(127) NOT NULL DEFAULT '0',
  `order_id` int(5) NOT NULL DEFAULT '0',
  `details` text,
  `block` int(1) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL DEFAULT '#',
  `dateCreate` datetime NOT NULL,
  `dateModify` datetime NOT NULL,
  `adminMod` int(7) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_admin_menu`
--

INSERT INTO `osc_admin_menu` (`id`, `type`, `parent`, `table`, `additional_fields`, `landing_settings`, `view_settings`, `edit_settings`, `create_settings`, `form_params`, `menu_params`, `cardRelations`, `assign`, `name`, `alias`, `filename`, `order_id`, `details`, `block`, `link`, `dateCreate`, `dateModify`, `adminMod`) VALUES
(1, 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Учетная запись', 'personal', 'user-icon-slider.png', 1, 'Учетная запись пользователя', 0, '#', '2013-11-15 02:52:32', '2013-11-15 05:40:23', 1),
(2, 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Пользователи', 'users', 'all-users-icon-slider.png', 5, 'Управление пользователями системы', 0, '#1', '2013-11-15 02:55:52', '2013-11-15 02:55:52', 1),
(3, 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Материалы', 'articles', 'materials-icon-slider.png', 4, 'Управления материалами сайта', 0, '#', '2013-11-15 02:57:55', '2013-11-15 02:57:55', 1),
(5, 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Настройки', 'settings', 'settings-icon-slider.png', 7, 'Настройки системы', 0, '#', '2013-11-15 03:00:21', '2014-11-22 18:17:26', 1),
(6, 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Помощь', 'help', 'help-icon-slider.png', 6, 'Помощь администратору', 1, '#', '2013-11-15 03:01:26', '2015-04-20 16:39:41', 1),
(7, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Профиль', 'profile', 'fa-user-circle', 3, 'Личный кабинет администратора', 0, '#', '2013-11-15 03:03:08', '2013-11-15 15:55:43', 1),
(8, 1, 2, 'admin_menu', '[]', '[]', '[]', '[]', NULL, NULL, '{\"start\":\"landing\",\"landing\":0,\"view\":0,\"edit\":0,\"create\":0}', '[]', 0, 'Все пользователи', 'users-list', 'fa-user', 1, 'Список пользователей системой', 0, '#', '2013-11-15 03:04:34', '2013-11-15 16:06:43', 1),
(10, 1, 2, 'admin_menu', '[]', '[]', '[]', '[]', NULL, NULL, '{\"start\":\"landing\",\"landing\":0,\"view\":0,\"edit\":0,\"create\":0}', '[]', 0, 'Группы пользователей', 'users-levels', 'fa-users', 3, 'Уровни или типы пользователей системы', 0, '#', '2013-11-15 03:07:17', '2013-11-15 16:07:21', 1),
(11, 1, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Добавить новую группу', 'add-user-level', '0', 4, 'Создание нового уровня для пользователей', 1, '#', '2013-11-15 03:09:35', '2013-11-15 16:07:46', 1),
(12, 1, 3, 'admin_menu', '[]', '[]', '[]', '[]', NULL, NULL, '{\"start\":\"landing\",\"landing\":0,\"view\":0,\"edit\":0,\"create\":0}', '[]', 0, 'Менеджер материалов', 'articles-manager', '0', 2, 'Управление материалами сайта', 1, '#', '2013-11-15 03:10:50', '2015-08-12 15:38:48', 1),
(13, 1, 3, 'admin_menu', '[]', '[]', '[]', '[]', NULL, NULL, '{\"start\":\"landing\",\"landing\":0,\"view\":0,\"edit\":0,\"create\":0}', '[]', 0, 'Категории материалов', 'articles-categories', '0', 1, 'Управление категориями материалов', 1, '#', '2013-11-15 03:11:43', '2015-08-12 15:38:52', 1),
(14, 1, 3, 'admin_menu', '[]', '[]', '[]', '[]', NULL, NULL, '{\"start\":\"landing\",\"landing\":0,\"view\":0,\"edit\":0,\"create\":0}', '[]', 0, 'Баннер на главной', 'banners-system', '0', 3, 'Управление баннерной системой на сайте', 1, '#', '2013-11-15 03:12:29', '2016-11-22 12:48:18', 1),
(15, 1, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Контент блоки', 'content-blocks', '0', 4, 'Управление контент блоками на сайте', 1, '#', '2013-11-15 03:13:24', '2015-08-12 15:40:07', 1),
(16, 1, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Вопрос-ответ', 'faq', '0', 5, 'Управление FAQ', 1, '#', '2013-11-15 03:14:49', '2016-10-21 23:47:54', 1),
(24, 1, 5, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Общие', 'global-settings', 'fa-cogs', 1, 'Глобальные настройки системы', 0, '#', '2013-11-15 03:30:00', '2016-11-25 18:00:00', 1),
(25, 1, 5, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Настройки магазина', 'shop-manage', '0', 4, 'Управление SEO параметрами', 1, '#', '2013-11-15 03:30:39', '2016-10-20 15:31:34', 1),
(26, 1, 6, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Задать вопрос', 'help-question', '0', 1, 'Задать вопрос супер администратору', 0, '#', '2013-11-15 03:31:18', '2013-11-15 03:31:18', 1),
(28, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Задания', 'profile-zadaniya', 'fa-tasks', 1, 'Входящие заказы с ИМ', 0, '#', '2013-11-15 15:56:25', '2014-12-21 16:13:07', 1),
(29, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Сообщения', 'profile-message', 'fa-envelope', 2, 'Личные сообщения пользователю от других админов', 0, '#', '2013-11-15 15:59:29', '2013-11-15 15:59:29', 1),
(30, 1, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Менеджер меню', 'menu-manager', 'fa-bars', 0, 'Менеджер меню', 0, '#', '2013-11-15 16:01:48', '2015-08-12 15:38:40', 1),
(31, 1, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Рассылка пользователям', 'users-sender', '0', 5, 'Почтовая рассылка пользователям', 1, '#', '2013-11-15 16:09:10', '2014-10-18 19:12:42', 1),
(38, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Входящие заказы', 'profile-in-orders', '0', 0, 'Новые заказы с ИМ', 1, '#', '2014-12-21 16:14:09', '2016-10-21 16:37:37', 1),
(40, 1, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Галереи', 'galleries', '0', 8, 'Медиа галлереи', 1, '#', '2015-08-12 15:37:47', '2016-12-08 00:42:59', 1),
(46, 1, 5, 'admin_menu', '[]', '[]', '[]', '[]', NULL, NULL, '{\"start\":\"landing\",\"landing\":0,\"view\":0,\"edit\":0,\"create\":0}', '[]', 0, 'Мультиязычность', 'languages', '0', 3, '', 1, '#', '2016-11-16 11:19:20', '2016-11-25 18:00:20', 1),
(47, 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Главная страница', 'home', 'materials-icon-slider.png', 6, 'Управление страницами', 0, '#', '2013-11-15 03:01:26', '2015-04-20 16:39:41', 1),
(48, 1, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Секция 1', 'home1', 'fa-bars', 6, 'Управление главной', 0, '#', '2013-11-15 03:01:26', '2015-04-20 16:39:41', 1),
(49, 1, 52, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Сервисы', 'services', 'fa-bars', 6, 'Управление сервисами', 0, '#', '2013-11-15 03:01:26', '2015-04-20 16:39:41', 1),
(50, 1, 52, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Проекты', 'projects', 'fa-bars', 6, 'Управление проектами', 0, '#', '2013-11-15 03:01:26', '2015-04-20 16:39:41', 1),
(51, 1, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Секция 2', 'home2', 'fa-bars', 6, 'Управление главной', 0, '#', '2013-11-15 03:01:26', '2015-04-20 16:39:41', 1),
(52, 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Все страницы', 'all_pages', 'materials-icon-slider.png', 6, 'Управление страницами', 0, '#', '2013-11-15 03:01:26', '2015-04-20 16:39:41', 1),
(53, 1, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Секция 3', 'home3', 'fa-bars', 6, 'Управление главной', 0, '#', '2013-11-15 03:01:26', '2015-04-20 16:39:41', 1),
(54, 1, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Секция 4', 'home4', 'fa-bars', 6, 'Управление главной', 0, '#', '2013-11-15 03:01:26', '2015-04-20 16:39:41', 1),
(55, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Форма обратной связи', 'cf', 'fa-phone', 0, 'Форма обратной связи', 0, '#', '2013-11-15 03:03:08', '2013-11-15 15:55:43', 1),
(56, 1, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Комментарии', 'comments', 'fa-bars', 0, 'Комментарии', 0, '#', '2013-11-15 16:01:48', '2015-08-12 15:38:40', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_comments`
--

DROP TABLE IF EXISTS `osc_comments`;
CREATE TABLE IF NOT EXISTS `osc_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `stage_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `block` int(11) NOT NULL DEFAULT '1',
  `seen` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_fake` int(11) NOT NULL DEFAULT '0',
  `author_name` varchar(255) DEFAULT NULL,
  `author_avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_comments`
--

INSERT INTO `osc_comments` (`id`, `content`, `stage_id`, `user_id`, `block`, `seen`, `created`, `modified`, `is_fake`, `author_name`, `author_avatar`) VALUES
(3, 'Сool stuff!', 3, 1, 0, 1, '2018-04-26 23:51:59', '2018-04-26 23:54:12', 1, 'Elon Musk', 'fkc_ava_20180426235412545.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `osc_contact_form`
--

DROP TABLE IF EXISTS `osc_contact_form`;
CREATE TABLE IF NOT EXISTS `osc_contact_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `seen` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_contact_form`
--

INSERT INTO `osc_contact_form` (`id`, `name`, `email`, `phone`, `message`, `created`, `modified`, `seen`) VALUES
(1, 'serg', 'sk-fall@yandex.ru', '+380 (12) 312-31-23', 'test message 123123123123', '2018-04-19 19:53:50', '2018-04-19 19:53:50', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_countries`
--

DROP TABLE IF EXISTS `osc_countries`;
CREATE TABLE IF NOT EXISTS `osc_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `osc_dialog_files_ref`
--

DROP TABLE IF EXISTS `osc_dialog_files_ref`;
CREATE TABLE IF NOT EXISTS `osc_dialog_files_ref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_table` varchar(63) NOT NULL DEFAULT '0',
  `ref_id` int(11) NOT NULL DEFAULT '0',
  `file` varchar(255) NOT NULL DEFAULT '0',
  `crop` varchar(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT 'Фото',
  `is_link` int(1) NOT NULL DEFAULT '0',
  `href` varchar(255) DEFAULT NULL,
  `target` int(1) NOT NULL DEFAULT '1',
  `path` varchar(255) NOT NULL DEFAULT '/',
  `adminMod` int(7) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `osc_email_logs`
--

DROP TABLE IF EXISTS `osc_email_logs`;
CREATE TABLE IF NOT EXISTS `osc_email_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT '0',
  `email` varchar(64) NOT NULL,
  `from` varchar(64) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Project Email Logs';

-- --------------------------------------------------------

--
-- Структура таблицы `osc_languages`
--

DROP TABLE IF EXISTS `osc_languages`;
CREATE TABLE IF NOT EXISTS `osc_languages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `alias` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `used` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `osc_languages`
--

INSERT INTO `osc_languages` (`id`, `name`, `alias`, `used`) VALUES
(1, 'English', 'en', 0),
(2, 'Afar', 'aa', 0),
(3, 'Abkhazian', 'ab', 0),
(4, 'Afrikaans', 'af', 0),
(5, 'Amharic', 'am', 0),
(6, 'Arabic', 'ar', 0),
(7, 'Assamese', 'as', 0),
(8, 'Aymara', 'ay', 0),
(9, 'Azerbaijani', 'az', 0),
(10, 'Bashkir', 'ba', 0),
(11, 'Belarusian', 'be', 0),
(12, 'Bulgarian', 'bg', 0),
(13, 'Bihari', 'bh', 0),
(14, 'Bislama', 'bi', 0),
(15, 'Bengali/Bangla', 'bn', 0),
(16, 'Tibetan', 'bo', 0),
(17, 'Breton', 'br', 0),
(18, 'Catalan', 'ca', 0),
(19, 'Corsican', 'co', 0),
(20, 'Czech', 'cs', 0),
(21, 'Welsh', 'cy', 0),
(22, 'Danish', 'da', 0),
(23, 'German', 'de', 0),
(24, 'Bhutani', 'dz', 0),
(25, 'Greek', 'el', 0),
(26, 'Esperanto', 'eo', 0),
(27, 'Spanish', 'es', 0),
(28, 'Estonian', 'et', 0),
(29, 'Basque', 'eu', 0),
(30, 'Persian', 'fa', 0),
(31, 'Finnish', 'fi', 0),
(32, 'Fiji', 'fj', 0),
(33, 'Faeroese', 'fo', 0),
(34, 'French', 'fr', 0),
(35, 'Frisian', 'fy', 0),
(36, 'Irish', 'ga', 0),
(37, 'Scots/Gaelic', 'gd', 0),
(38, 'Galician', 'gl', 0),
(39, 'Guarani', 'gn', 0),
(40, 'Gujarati', 'gu', 0),
(41, 'Hausa', 'ha', 0),
(42, 'Hindi', 'hi', 0),
(43, 'Croatian', 'hr', 0),
(44, 'Hungarian', 'hu', 0),
(45, 'Armenian', 'hy', 0),
(46, 'Interlingua', 'ia', 0),
(47, 'Interlingue', 'ie', 0),
(48, 'Inupiak', 'ik', 0),
(49, 'Indonesian', 'in', 0),
(50, 'Icelandic', 'is', 0),
(51, 'Italian', 'it', 0),
(52, 'Hebrew', 'iw', 0),
(53, 'Japanese', 'ja', 0),
(54, 'Yiddish', 'ji', 0),
(55, 'Javanese', 'jw', 0),
(56, 'Georgian', 'ka', 0),
(57, 'Kazakh', 'kk', 0),
(58, 'Greenlandic', 'kl', 0),
(59, 'Cambodian', 'km', 0),
(60, 'Kannada', 'kn', 0),
(61, 'Korean', 'ko', 0),
(62, 'Kashmiri', 'ks', 0),
(63, 'Kurdish', 'ku', 0),
(64, 'Kirghiz', 'ky', 0),
(65, 'Latin', 'la', 0),
(66, 'Lingala', 'ln', 0),
(67, 'Laothian', 'lo', 0),
(68, 'Lithuanian', 'lt', 0),
(69, 'Latvian/Lettish', 'lv', 0),
(70, 'Malagasy', 'mg', 0),
(71, 'Maori', 'mi', 0),
(72, 'Macedonian', 'mk', 0),
(73, 'Malayalam', 'ml', 0),
(74, 'Mongolian', 'mn', 0),
(75, 'Moldavian', 'mo', 0),
(76, 'Marathi', 'mr', 0),
(77, 'Malay', 'ms', 0),
(78, 'Maltese', 'mt', 0),
(79, 'Burmese', 'my', 0),
(80, 'Nauru', 'na', 0),
(81, 'Nepali', 'ne', 0),
(82, 'Dutch', 'nl', 0),
(83, 'Norwegian', 'no', 0),
(84, 'Occitan', 'oc', 0),
(85, '(Afan)/Oromoor/Oriya', 'om', 0),
(86, 'Punjabi', 'pa', 0),
(87, 'Polish', 'pl', 0),
(88, 'Pashto/Pushto', 'ps', 0),
(89, 'Portuguese', 'pt', 0),
(90, 'Quechua', 'qu', 0),
(91, 'Rhaeto-Romance', 'rm', 0),
(92, 'Kirundi', 'rn', 0),
(93, 'Romanian', 'ro', 0),
(94, 'Russian', 'ru', 0),
(95, 'Kinyarwanda', 'rw', 0),
(96, 'Sanskrit', 'sa', 0),
(97, 'Sindhi', 'sd', 0),
(98, 'Sangro', 'sg', 0),
(99, 'Serbo-Croatian', 'sh', 0),
(100, 'Singhalese', 'si', 0),
(101, 'Slovak', 'sk', 0),
(102, 'Slovenian', 'sl', 0),
(103, 'Samoan', 'sm', 0),
(104, 'Shona', 'sn', 0),
(105, 'Somali', 'so', 0),
(106, 'Albanian', 'sq', 0),
(107, 'Serbian', 'sr', 0),
(108, 'Siswati', 'ss', 0),
(109, 'Sesotho', 'st', 0),
(110, 'Sundanese', 'su', 0),
(111, 'Swedish', 'sv', 0),
(112, 'Swahili', 'sw', 0),
(113, 'Tamil', 'ta', 0),
(114, 'Telugu', 'te', 0),
(115, 'Tajik', 'tg', 0),
(116, 'Thai', 'th', 0),
(117, 'Tigrinya', 'ti', 0),
(118, 'Turkmen', 'tk', 0),
(119, 'Tagalog', 'tl', 0),
(120, 'Setswana', 'tn', 0),
(121, 'Tonga', 'to', 0),
(122, 'Turkish', 'tr', 0),
(123, 'Tsonga', 'ts', 0),
(124, 'Tatar', 'tt', 0),
(125, 'Twi', 'tw', 0),
(126, 'Ukrainian', 'uk', 0),
(127, 'Urdu', 'ur', 0),
(128, 'Uzbek', 'uz', 0),
(129, 'Vietnamese', 'vi', 0),
(130, 'Volapuk', 'vo', 0),
(131, 'Wolof', 'wo', 0),
(132, 'Xhosa', 'xh', 0),
(133, 'Yoruba', 'yo', 0),
(134, 'Chinese', 'zh', 0),
(135, 'Zulu', 'zu', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_logs`
--

DROP TABLE IF EXISTS `osc_logs`;
CREATE TABLE IF NOT EXISTS `osc_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `type` int(7) NOT NULL DEFAULT '0',
  `description` varchar(1024) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='Project logs';

--
-- Дамп данных таблицы `osc_logs`
--

INSERT INTO `osc_logs` (`id`, `date`, `type`, `description`, `userid`, `ip`) VALUES
(1, '2018-04-09 14:18:08', 1, 'Admin login: Success login.', 1, '::1'),
(2, '2018-04-09 14:18:49', 1, 'Admin login: Success login.', 1, '::1'),
(3, '2018-04-10 16:04:21', 1, 'Admin login: Success login.', 1, '::1'),
(4, '2018-04-11 21:47:00', 1, 'Admin login: Success login.', 1, '::1'),
(5, '2018-04-12 15:30:03', 1, 'Admin login: Success login.', 1, '::1'),
(6, '2018-04-13 01:44:00', 1, 'Admin login: Success login.', 1, '::1'),
(7, '2018-04-13 18:27:39', 1, 'Admin login: Success login.', 1, '::1'),
(8, '2018-04-16 00:46:40', 1, 'Admin login: Success login.', 1, '::1'),
(9, '2018-04-19 19:12:58', 1, 'Admin login: Success login.', 1, '::1'),
(10, '2018-04-19 21:48:52', 1, 'Admin login: Success login.', 1, '::1'),
(11, '2018-04-26 14:27:53', 1, 'Admin login: Success login.', 1, '::1'),
(12, '2018-04-26 22:58:48', 1, 'Admin login: Success login.', 2, '::1'),
(13, '2018-04-26 23:00:37', 1, 'Admin login: Success login.', 2, '::1'),
(14, '2018-04-26 23:06:46', 1, 'Admin login: Success login.', 2, '::1'),
(15, '2018-04-26 23:16:03', 1, 'Admin login: Success login.', 3, '::1'),
(16, '2018-04-26 23:17:59', 1, 'Admin login: Success login.', 1, '::1'),
(17, '2018-04-26 23:48:54', 1, 'Admin login: Success login.', 1, '95.158.43.254'),
(18, '2018-04-27 13:17:23', 1, 'Admin login: Success login.', 4, '62.216.57.60'),
(19, '2018-04-27 16:17:40', 1, 'Admin login: Success login.', 1, '62.216.57.60'),
(20, '2018-04-30 14:06:10', 1, 'Admin login: Success login.', 4, '62.216.57.60'),
(21, '2018-05-05 20:16:44', 1, 'Admin login: Success login.', 1, '95.158.43.218'),
(22, '2018-05-10 19:35:57', 1, 'Admin login: Success login.', 1, '95.158.43.218'),
(23, '2018-05-12 16:41:10', 1, 'Admin login: Success login.', 1, '95.158.43.218'),
(24, '2018-05-14 18:37:06', 1, 'Admin login: Success login.', 1, '62.216.56.27'),
(25, '2018-06-18 11:58:03', 1, 'Admin login: Success login.', 4, '217.147.174.55'),
(26, '2018-06-18 12:04:59', 1, 'Admin login: Success login.', 4, '217.20.165.57'),
(27, '2018-06-19 11:47:11', 1, 'Admin login: Success login.', 4, '217.20.165.57'),
(28, '2018-06-20 11:38:02', 1, 'Admin login: Success login.', 4, '217.20.165.57'),
(29, '2018-06-20 12:57:25', 1, 'Admin login: Success login.', 4, '95.108.133.226'),
(30, '2018-06-20 13:57:36', 1, 'Admin login: Success login.', 1, '95.158.43.196'),
(31, '2018-06-21 11:54:23', 1, 'Admin login: Success login.', 4, '217.20.165.57'),
(32, '2018-06-22 11:38:04', 1, 'Admin login: Success login.', 4, '217.20.165.57'),
(33, '2018-06-25 22:14:40', 1, 'Admin login: Success login.', 1, '95.158.43.196'),
(34, '2018-07-11 11:53:27', 1, 'Admin login: Success login.', 4, '185.205.46.39'),
(35, '2018-07-17 15:03:41', 1, 'Admin login: Success login.', 1, '::1');

-- --------------------------------------------------------

--
-- Структура таблицы `osc_log_types`
--

DROP TABLE IF EXISTS `osc_log_types`;
CREATE TABLE IF NOT EXISTS `osc_log_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Project log types';

--
-- Дамп данных таблицы `osc_log_types`
--

INSERT INTO `osc_log_types` (`id`, `name`) VALUES
(1, 'Admin login'),
(2, 'Other user actions');

-- --------------------------------------------------------

--
-- Структура таблицы `osc_message_statuses`
--

DROP TABLE IF EXISTS `osc_message_statuses`;
CREATE TABLE IF NOT EXISTS `osc_message_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL DEFAULT '0',
  `alias` varchar(63) NOT NULL DEFAULT '0',
  `details` tinytext NOT NULL,
  `dateCreate` datetime NOT NULL,
  `dateModify` datetime NOT NULL,
  `adminMod` int(7) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Список типов сообщений';

--
-- Дамп данных таблицы `osc_message_statuses`
--

INSERT INTO `osc_message_statuses` (`id`, `name`, `alias`, `details`, `dateCreate`, `dateModify`, `adminMod`) VALUES
(1, 'Не прочитано', 'new', 'Не прочитанные сообщения', '2013-11-15 00:00:00', '2013-11-15 00:00:00', 1),
(2, 'Прочитано', 'readble', 'Прочитанные сообщения', '2013-11-15 00:00:00', '2013-11-15 00:00:00', 1),
(3, 'Выполнено', 'done', 'Выполненное задание', '2013-11-15 11:24:01', '2013-11-15 11:24:01', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_message_types`
--

DROP TABLE IF EXISTS `osc_message_types`;
CREATE TABLE IF NOT EXISTS `osc_message_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL DEFAULT '0',
  `alias` varchar(63) NOT NULL DEFAULT '0',
  `details` tinytext NOT NULL,
  `dateCreate` datetime NOT NULL,
  `dateModify` datetime NOT NULL,
  `adminMod` int(7) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Список типов сообщений';

--
-- Дамп данных таблицы `osc_message_types`
--

INSERT INTO `osc_message_types` (`id`, `name`, `alias`, `details`, `dateCreate`, `dateModify`, `adminMod`) VALUES
(1, 'Сообщение', 'message', 'Обычное сообщение пользователю', '2013-11-15 11:04:04', '2013-11-15 11:04:04', 1),
(2, 'Задание', 'task', 'Задание с необходимостью выполнить и поставить статус выполнено', '2013-11-15 11:04:51', '2013-11-15 11:04:51', 1),
(3, 'Тикет', 'ticket', 'Используются к примеру для кладовщика от управляющих, информация по отгрузке товаров', '2013-11-15 11:06:02', '2013-11-15 11:06:02', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_meta`
--

DROP TABLE IF EXISTS `osc_meta`;
CREATE TABLE IF NOT EXISTS `osc_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keys` varchar(255) DEFAULT NULL,
  `meta_desc` text,
  `ru_meta_title` varchar(255) DEFAULT NULL,
  `ru_meta_keys` varchar(255) DEFAULT NULL,
  `ru_meta_desc` text,
  `uk_meta_title` varchar(255) DEFAULT NULL,
  `uk_meta_keys` varchar(255) DEFAULT NULL,
  `uk_meta_desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_meta`
--

INSERT INTO `osc_meta` (`id`, `alias`, `meta_title`, `meta_keys`, `meta_desc`, `ru_meta_title`, `ru_meta_keys`, `ru_meta_desc`, `uk_meta_title`, `uk_meta_keys`, `uk_meta_desc`) VALUES
(1, 'home', 'Volterra | Home', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'contacts', 'Volterra | Contacts', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'invest-relations', 'Volterra | Invest Relations', '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_nav`
--

DROP TABLE IF EXISTS `osc_nav`;
CREATE TABLE IF NOT EXISTS `osc_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) DEFAULT NULL,
  `pos` int(11) NOT NULL DEFAULT '0',
  `block` int(11) NOT NULL DEFAULT '0',
  `target` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ru_name` varchar(255) DEFAULT NULL,
  `uk_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_nav`
--

INSERT INTO `osc_nav` (`id`, `type`, `parent`, `alias`, `pos`, `block`, `target`, `created`, `modified`, `name`, `ru_name`, `uk_name`) VALUES
(1, 0, 0, 'home', 0, 0, 0, '2018-03-31 00:00:00', '2018-04-09 15:12:07', 'Home', NULL, NULL),
(5, 0, 0, 'contacts', 4, 0, 0, '2018-03-31 00:00:00', '2018-04-09 15:12:23', 'Contacts', 'Контакты', 'Контакти'),
(6, 0, 0, 'invest-relations', 3, 0, 0, '2018-03-31 00:00:00', '2018-06-21 12:56:54', 'Investor relations', 'Отношения с инвесторами', 'Вiдносини з iнвесторами');

-- --------------------------------------------------------

--
-- Структура таблицы `osc_page_home_1`
--

DROP TABLE IF EXISTS `osc_page_home_1`;
CREATE TABLE IF NOT EXISTS `osc_page_home_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_caption` varchar(255) DEFAULT NULL,
  `section_sub_caption` varchar(255) DEFAULT NULL,
  `section_content` text,
  `filename` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `ru_section_caption` varchar(255) DEFAULT NULL,
  `ru_section_sub_caption` varchar(255) DEFAULT NULL,
  `ru_section_content` text,
  `uk_section_caption` varchar(255) DEFAULT NULL,
  `uk_section_sub_caption` varchar(255) DEFAULT NULL,
  `uk_section_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_page_home_1`
--

INSERT INTO `osc_page_home_1` (`id`, `section_caption`, `section_sub_caption`, `section_content`, `filename`, `created`, `modified`, `ru_section_caption`, `ru_section_sub_caption`, `ru_section_content`, `uk_section_caption`, `uk_section_sub_caption`, `uk_section_content`) VALUES
(1, 'CHARGING \r\nGREEN FUTURE \r\nOF UKRAINE', '', '', 'si_20180419195436176.jpg', NULL, '2018-04-19 20:24:36', 'etet', NULL, NULL, NULL, NULL, NULL),
(2, '', '', '', 'si_20180419195503218.jpg', '2018-04-12 16:51:14', '2018-04-19 20:20:37', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '', '', NULL, 'si_20180419195513824.jpg', '2018-04-13 02:34:31', '2018-04-19 20:20:42', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_page_home_2`
--

DROP TABLE IF EXISTS `osc_page_home_2`;
CREATE TABLE IF NOT EXISTS `osc_page_home_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_caption` varchar(255) DEFAULT NULL,
  `section_sub_caption` varchar(255) DEFAULT NULL,
  `section_content` text,
  `filename` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `ru_section_caption` varchar(255) DEFAULT NULL,
  `ru_section_sub_caption` varchar(255) DEFAULT NULL,
  `ru_section_content` text,
  `uk_section_caption` varchar(255) DEFAULT NULL,
  `uk_section_sub_caption` varchar(255) DEFAULT NULL,
  `uk_section_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_page_home_2`
--

INSERT INTO `osc_page_home_2` (`id`, `section_caption`, `section_sub_caption`, `section_content`, `filename`, `created`, `modified`, `ru_section_caption`, `ru_section_sub_caption`, `ru_section_content`, `uk_section_caption`, `uk_section_sub_caption`, `uk_section_content`) VALUES
(1, 'Who \r\nwe are', 'About company', '<p style=\"text-align: center; \"><span id=\"docs-internal-guid-9ec9d848-21e5-6665-9e42-5a13b736b8d0\" style=\"font-family: -webkit-standard; text-align: start;\"><br></span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Volterra energy group is a renewable energy development and investment management group focusing in solar, wind, small hydro, energy storages, and waste-to-energy technologies.</span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Volterra development pipeline total installed capacity exceeds 300 MW.</span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Volterra energy group provides services to reputable multinational investors on their activity in Ukraine.</span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Our team has combined experience in asset management, land development, construction&amp; engineering, operations, management, legal documentation, and financing.</span></p><p style=\"text-align: center; \"><span style=\"font-family: -webkit-standard; text-align: start;\"><span id=\"docs-internal-guid-8a876bc8-21e7-982c-1011-884d6eac41bf\"></span><br class=\"Apple-interchange-newline\"></span></p><p style=\"text-align: center; \"><img src=\"/split/files/summernote/6e5e44b94673c14f7e8700c30cac6da0.png\" style=\"width: 462px; height: 179.009px;\"><br></p>', 'si_20180413015926234.jpg', NULL, '2018-06-21 13:33:22', 'Кто мы', 'О компании', NULL, 'Хто ми', 'Про компанiю', NULL),
(2, 'Our \r\nStrategy', 'About company', '<p><b>New energy for new Europe</b> – we concentrate our activities in Ukraine – the most promising emerging economy in Europe.</p><p><b>Impact investment </b>– our projects benefit the National economy and the local communities.</p><p><b>Grid-conscious</b> – we locate energy generation close to potential consumers.</p><p><b>Long-term vision</b> – we believe that renewable energy sources will become the main source of energy in the world.  According to Ukrainian energy strategy, renewable sources should satisfy about 25% of the country\'s energy needs by 2035.</p><p><b>Diversified portfolio</b> – we are combining different renewable energy technologies to provide balanced energy supply.</p>', 'si_20180413020509183.jpg', '2018-04-12 17:02:11', '2018-06-21 12:05:19', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Our\r\nMission', 'About company', '<p><b>For society</b> – provide sustainable energy supply for the emerging economy</p><p><b>For economy</b> – attract and support foreign direct investments to Ukraine; support mitigation of the EU energy standards to integrate into European energy system.</p><p><b>For community</b>– create jobs, support infrastructure development and attract investments in the regions of presence.</p><p><b>For employees</b> – give opportunities for professional growth and self-realization in the like-minded and progressive team.</p><p><b>For investors</b> – decrease business risks in a high-risk environment by following best practices and a transparent way of doing business. </p><p><b>For the planet</b> – Decrease negative impact of the fossil fuel energy generation and bring a positive change to the environment.</p>', 'si_20180619122143279.jpg', '2018-04-13 02:06:09', '2018-06-22 11:38:18', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_page_home_3`
--

DROP TABLE IF EXISTS `osc_page_home_3`;
CREATE TABLE IF NOT EXISTS `osc_page_home_3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_caption` varchar(255) DEFAULT NULL,
  `section_sub_caption` varchar(255) DEFAULT NULL,
  `section_content` text,
  `filename` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `ru_section_caption` varchar(255) DEFAULT NULL,
  `ru_section_sub_caption` varchar(255) DEFAULT NULL,
  `ru_section_content` text,
  `uk_section_caption` varchar(255) DEFAULT NULL,
  `uk_section_sub_caption` varchar(255) DEFAULT NULL,
  `uk_section_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_page_home_3`
--

INSERT INTO `osc_page_home_3` (`id`, `section_caption`, `section_sub_caption`, `section_content`, `filename`, `created`, `modified`, `ru_section_caption`, `ru_section_sub_caption`, `ru_section_content`, `uk_section_caption`, `uk_section_sub_caption`, `uk_section_content`) VALUES
(1, 'Services', 'in Ukraine\'s Renewable Energy Sector', NULL, 'si_20180413024748778.jpg', NULL, '2018-04-19 20:22:50', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_page_home_4`
--

DROP TABLE IF EXISTS `osc_page_home_4`;
CREATE TABLE IF NOT EXISTS `osc_page_home_4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_caption` varchar(255) DEFAULT NULL,
  `section_sub_caption` varchar(255) DEFAULT NULL,
  `section_content` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `ru_section_caption` varchar(255) DEFAULT NULL,
  `ru_section_sub_caption` varchar(255) DEFAULT NULL,
  `ru_section_content` text,
  `uk_section_caption` varchar(255) DEFAULT NULL,
  `uk_section_sub_caption` varchar(255) DEFAULT NULL,
  `uk_section_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_page_home_4`
--

INSERT INTO `osc_page_home_4` (`id`, `section_caption`, `section_sub_caption`, `section_content`, `created`, `modified`, `ru_section_caption`, `ru_section_sub_caption`, `ru_section_content`, `uk_section_caption`, `uk_section_sub_caption`, `uk_section_content`) VALUES
(1, 'Our \r\nProjects', 'in Ukraine\'s Renewable Energy Sector', '<p><font color=\"#575656\" face=\"RobotoL, Tahoma\"><span style=\"font-size: 16px; letter-spacing: 1px;\">Volterra energy group portfolio consists of projects in Solar, Wind, Small hydro, Waste-to-energy and energy storage sectors. Combined installed capacity exceeds 300 MW to be commissioned in 2018-2019.</span></font><br></p>', NULL, '2018-06-19 12:25:36', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_projects`
--

DROP TABLE IF EXISTS `osc_projects`;
CREATE TABLE IF NOT EXISTS `osc_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` text,
  `content` text,
  `preview` varchar(255) DEFAULT NULL,
  `card_image` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `pos` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '1',
  `block` int(11) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keys` varchar(255) DEFAULT NULL,
  `meta_desc` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `ru_name` varchar(255) DEFAULT NULL,
  `ru_details` text,
  `ru_content` text,
  `ru_location` varchar(255) DEFAULT NULL,
  `ru_area` varchar(255) DEFAULT NULL,
  `ru_capacity` varchar(255) DEFAULT NULL,
  `ru_meta_title` varchar(255) DEFAULT NULL,
  `ru_meta_keys` varchar(255) DEFAULT NULL,
  `ru_meta_desc` text,
  `uk_name` varchar(255) DEFAULT NULL,
  `uk_details` text,
  `uk_content` text,
  `uk_location` varchar(255) DEFAULT NULL,
  `uk_area` varchar(255) DEFAULT NULL,
  `uk_capacity` varchar(255) DEFAULT NULL,
  `uk_meta_title` varchar(255) DEFAULT NULL,
  `uk_meta_keys` varchar(255) DEFAULT NULL,
  `uk_meta_desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_projects`
--

INSERT INTO `osc_projects` (`id`, `alias`, `name`, `details`, `content`, `preview`, `card_image`, `location`, `area`, `capacity`, `pos`, `type`, `block`, `meta_title`, `meta_keys`, `meta_desc`, `created`, `modified`, `ru_name`, `ru_details`, `ru_content`, `ru_location`, `ru_area`, `ru_capacity`, `ru_meta_title`, `ru_meta_keys`, `ru_meta_desc`, `uk_name`, `uk_details`, `uk_content`, `uk_location`, `uk_area`, `uk_capacity`, `uk_meta_title`, `uk_meta_keys`, `uk_meta_desc`) VALUES
(3, 'fes-vilshanka', 'FES Vilshanka', 'Vilshanka is located in Kirovograd area on the right bank of the river Sinyuha. The distance to the area’s central city is 125 kilometers. The city was founded in year 1750 with the current population of 4680 residents. The railway station is 18 kilometers away.', '<p>History</p><p>   <span style=\"font-family: \" open=\"\" sans\";\"=\"\"> <span style=\"font-family: \" open=\"\" sans\";\"=\"\">The settlement of Vilshanka had a quite breathtaking history. In the 18th century, it was a part of the Novoslobodska Kozak establishment. In later years, the Bulgarian immigrants came the settlement, and during the war of 1768-1774, Vilshanka was officially protected by the Moldavian troops. In the 19th century, Vilshanka had the status of a military village and used to serve a role of a control point between Poland and Turkey.</span></span></p><p><span style=\"font-family: \" open=\"\" sans\";\"=\"\">    After the liquidation of the military actions and settlements, the population of Vilshanka started to increase steadily. As of 1886, there were 4,296 people,  620 households, an Orthodox church, a Jewish prayer house, a school, a station, a wine warehouse, 8 shops, and weekly bazaars. In the Soviet times, the population of Olshanka was about 5.7 thousand people, there operated an industrial plant, a food factory, a bread-baking plant, a poultry-and-incubator station, an intercollegiate construction organization, a district agricultural machinery </span><span style=\"font-family: \" open=\"\" sans\";\"=\"\">and</span><span style=\"font-family: \" open=\"\" sans\";\"=\"\"> chemistry center, a consumer service center, a general school, a music school, a hospital and three libraries. </span></p><p><img src=\"/split/files/summernote/1dace00044214b5ed4c9b60c8b81bdf9.jpg\" style=\"width: 571px; float: left;\" class=\"note-float-left\"></p><p><b>FES Vilshanka</b></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">VEG\'s 1st project </span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Coordinates - 48.2</span><span style=\"font-size: 6.6pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: super; white-space: pre-wrap;\">o</span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"> N, 30.9</span><span style=\"font-size: 6.6pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: super; white-space: pre-wrap;\">o</span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"> E. </span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Elevation - 118 m.</span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Annual production - 14,721 MWh.</span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Construction finish - 05.2018</span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Inverter capacity - 9.5 MW.</span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Green tariff - 180.29 EUR/MWh</span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"><br></span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(67, 67, 67); background-color: transparent; font-weight: 400; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-east-asian: normal; font-variant-position: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"><br></span></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><font color=\"#434343\" face=\"Arial\"><span style=\"caret-color: rgb(67, 67, 67); font-size: 14.666666984558105px; white-space: pre-wrap;\">FES Vilshanka </span></font></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><img src=\"blob:http://volterra.energy/facda08c-b599-4b9d-97a0-a946b16c510a\" style=\"width: 100%;\"><font color=\"#434343\" face=\"Arial\"><span style=\"caret-color: rgb(67, 67, 67); font-size: 14.666666984558105px; white-space: pre-wrap;\"><br></span></font></p><p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 8pt; background-color: rgb(255, 255, 255);\"><span id=\"docs-internal-guid-2fcfcc2f-1ca3-a335-7823-118093ed5aec\" style=\"font-family: -webkit-standard;\"></span></p><p></p>', 'si_20180619125121481.png', 'pci_20180419232430252.jpg', 'Kirovorgrad area.', '21 ha', '12.8 MW', 0, 1, 0, '', '', '', '2018-04-08 00:00:00', '2018-07-17 15:06:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'fes-taborovka', 'FES Taborovka', 'Taborovka is a village in the Voznesensky district, Mykolayiv region, Ukraine.  It occupies an area of 3,532 km ².\r\nIt was founded in 1946. By 2001 the population was about 1,839 people.', '<p><b>Shape and Location</b></p><p><span style=\"font-family: \" open=\"\" sans\";\"=\"\">Latitude (41.61</span><span style=\"caret-color: rgb(34, 34, 34); color: rgb(34, 34, 34); font-family: \" open=\"\" sans\";=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">° </span><span style=\"font-family: \" open=\"\" sans\";\"=\"\">﻿N) &amp;</span><span open=\"\" sans\";\"=\"\" style=\"background-color: transparent; font-size: 13px; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: top; caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: \" sans\";=\"\" font-style:=\"\" normal;=\"\" font-variant-caps:=\"\" font-weight:=\"\" letter-spacing:=\"\" orphans:=\"\" auto;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-size-adjust:=\"\" -webkit-text-stroke-width:=\"\" text-decoration:=\"\" background-position:=\"\" initial=\"\" initial;=\"\" background-repeat:=\"\" initial;\"=\"\">﻿&nbsp;</span>Longitude (31.35° ﻿E)<span style=\"caret-color: rgb(34, 34, 34); color: rgb(34, 34, 34); font-family: \" open=\"\" sans\";=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"></span></p><p><span style=\"font-family: \" open=\"\" sans\";\"=\"\"> Altitude (59m)</span></p><p><span style=\"font-family: \" open=\"\" sans\";\"=\"\">Albedo (0.20)</span></p><p><span style=\"font-family: \" open=\"\" sans\";\"=\"\">Time zone UT+2</span></p><p><br></p><p><img src=\"blob:http://volterra.energy/21ddfc1a-497e-4f25-9d14-8240eda135ad\" style=\"width: 50%;\">&nbsp;&nbsp;<img src=\"blob:http://volterra.energy/12dc61d3-e696-4a62-91d1-02af91555045\" style=\"font-size: 13px; background-color: rgb(255, 255, 255); width: 25%;\"></p><p><br></p><p><b>Model of the Taborovka power station (considering the landscape)</b></p><p><img src=\"blob:http://volterra.energy/48a2e064-d2f1-46ee-8e4a-acf6db44df41\" style=\"width: 373px; height: 207.22222222222223px;\"></p><p><b style=\"font-size: 14px; caret-color: rgb(34, 34, 34); color: rgb(34, 34, 34); font-family: sans-serif;\">Expected energy production</b></p><h1><img src=\"blob:http://volterra.energy/42438a02-40ab-462d-972f-b1ad09274d90\" style=\"width: 50%;\"><img src=\"blob:http://volterra.energy/ebd4b9b3-d85d-4d8d-8cff-3a760da4838e\" style=\"font-size: 13px; background-color: rgb(255, 255, 255); width: 50%;\"><span style=\"background-color: rgb(255, 255, 255); caret-color: rgb(34, 34, 34); color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\"><span style=\"font-family: \" open=\"\" sans\";\"=\"\"><br></span></span></h1>', 'si_20180619153521310.jpg', 'pci_20180619153127325.jpg', 'Mykolaiv region', '27.4 ha', '13 MW', 0, 1, 0, '', '', '', '2018-06-19 15:31:27', '2018-06-25 22:15:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_projects_types`
--

DROP TABLE IF EXISTS `osc_projects_types`;
CREATE TABLE IF NOT EXISTS `osc_projects_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `ru_name` varchar(255) DEFAULT NULL,
  `uk_name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `block` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_projects_types`
--

INSERT INTO `osc_projects_types` (`id`, `name`, `ru_name`, `uk_name`, `icon`, `block`) VALUES
(1, 'Solar', NULL, NULL, 'solar_ico.png', 0),
(2, 'Wind', NULL, NULL, 'wind_ico.png', 0),
(3, 'Hydro', NULL, NULL, 'gidro_ico.png', 0),
(4, 'Bio', NULL, NULL, 'bio_ico.png', 0),
(5, 'Recycle', NULL, NULL, 'recycle_ico.png', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_services`
--

DROP TABLE IF EXISTS `osc_services`;
CREATE TABLE IF NOT EXISTS `osc_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `pos` int(11) NOT NULL DEFAULT '0',
  `block` int(11) NOT NULL DEFAULT '0',
  `preview` varchar(255) DEFAULT NULL,
  `description` text,
  `icon` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `ru_name` varchar(255) DEFAULT NULL,
  `ru_description` text,
  `uk_name` varchar(255) DEFAULT NULL,
  `uk_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_services`
--

INSERT INTO `osc_services` (`id`, `name`, `alias`, `pos`, `block`, `preview`, `description`, `icon`, `created`, `modified`, `ru_name`, `ru_description`, `uk_name`, `uk_description`) VALUES
(1, 'Investment consulting ', 'investment-consulting', 0, 0, NULL, '', 'si_20180413023953902.png', '2018-04-08 00:00:00', '2018-04-19 20:39:21', NULL, NULL, NULL, NULL),
(3, 'Financial structuring', 'financial-structuring', 0, 0, NULL, '', 'si_20180413024014215.png', '2018-04-08 00:00:00', '2018-04-19 20:39:17', NULL, NULL, NULL, NULL),
(7, 'Construction supervision and quality control', 'construction-supervision-and-quality-control', 0, 0, NULL, '', 'si_20180413024032396.png', '2018-04-08 00:00:00', '2018-04-19 20:38:52', NULL, NULL, NULL, NULL),
(8, 'Legal and technical due diligence ', 'legal-and-technical-due-diligence', 0, 0, NULL, '', 'si_20180413024046500.png', '2018-04-08 00:00:00', '2018-04-19 20:39:05', NULL, NULL, NULL, NULL),
(9, 'Local activity support for multinational developers and investors', 'local-activity-support-for-multinational-developers-and-investors', 0, 0, NULL, '', 'si_20180413024105918.png', '2018-04-08 00:00:00', '2018-04-19 20:39:02', NULL, NULL, NULL, NULL),
(10, 'Full scope Project management in renewable energy sector', 'full-scope-project-management-in-renewable-energy-sector', 0, 0, NULL, '', 'si_20180413024118502.png', '2018-04-08 00:00:00', '2018-04-26 19:52:08', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_settings`
--

DROP TABLE IF EXISTS `osc_settings`;
CREATE TABLE IF NOT EXISTS `osc_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text,
  `fb_link` varchar(255) DEFAULT NULL,
  `vk_link` varchar(255) DEFAULT NULL,
  `tw_link` varchar(255) DEFAULT NULL,
  `li_link` varchar(255) DEFAULT NULL,
  `lat` float DEFAULT '0',
  `lng` float NOT NULL DEFAULT '0',
  `site_index` int(11) NOT NULL DEFAULT '0',
  `copyright` text,
  `top_script` text,
  `bot_script` text,
  `modified` datetime DEFAULT NULL,
  `ru_address` text,
  `ru_copyright` text,
  `uk_address` text,
  `uk_copyright` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_settings`
--

INSERT INTO `osc_settings` (`id`, `sitename`, `email`, `phone`, `address`, `fb_link`, `vk_link`, `tw_link`, `li_link`, `lat`, `lng`, `site_index`, `copyright`, `top_script`, `bot_script`, `modified`, `ru_address`, `ru_copyright`, `uk_address`, `uk_copyright`) VALUES
(1, 'Volterra', 'info@volterra.energy', '+38 0443346405\r\n+38 0443346407', 'Ukraine, Kiev \r\nStr. Bolshaya Vasilkovskaya, 100 \r\nBC Toronto', NULL, NULL, NULL, NULL, 50.426, 30.515, 0, 'Copyright ©2018 Volterra Energy Group. All Rights Reserved.', '', '', '2018-06-20 13:05:36', 'Украина, Киев\r\nул. Большая Васильковская, 100 \r\nБЦ Торонто', NULL, 'Україна, Київ\r\nвул. Велика Василькiвська, 100 \r\nБЦ Торонто', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_site_languages`
--

DROP TABLE IF EXISTS `osc_site_languages`;
CREATE TABLE IF NOT EXISTS `osc_site_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `block` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_site_languages`
--

INSERT INTO `osc_site_languages` (`id`, `lang_id`, `block`) VALUES
(1, 1, 1),
(2, 94, 1),
(3, 126, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_stages`
--

DROP TABLE IF EXISTS `osc_stages`;
CREATE TABLE IF NOT EXISTS `osc_stages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `pos` int(11) NOT NULL DEFAULT '0',
  `block` int(11) NOT NULL DEFAULT '0',
  `caption` varchar(255) DEFAULT NULL,
  `details` text,
  `protocol_link` varchar(255) DEFAULT NULL,
  `lat` float NOT NULL DEFAULT '0',
  `lng` float NOT NULL DEFAULT '0',
  `video` text,
  `panorama` text,
  `project_id` int(11) NOT NULL DEFAULT '0',
  `docs_caption` varchar(255) DEFAULT NULL,
  `docs_details` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `ru_name` varchar(255) DEFAULT NULL,
  `ru_caption` varchar(255) DEFAULT NULL,
  `ru_details` text,
  `ru_docs_caption` varchar(255) DEFAULT NULL,
  `ru_docs_details` text,
  `uk_name` varchar(255) DEFAULT NULL,
  `uk_caption` varchar(255) DEFAULT NULL,
  `uk_details` text,
  `uk_docs_caption` varchar(255) DEFAULT NULL,
  `uk_docs_details` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_stages`
--

INSERT INTO `osc_stages` (`id`, `name`, `alias`, `pos`, `block`, `caption`, `details`, `protocol_link`, `lat`, `lng`, `video`, `panorama`, `project_id`, `docs_caption`, `docs_details`, `created`, `modified`, `ru_name`, `ru_caption`, `ru_details`, `ru_docs_caption`, `ru_docs_details`, `uk_name`, `uk_caption`, `uk_details`, `uk_docs_caption`, `uk_docs_details`) VALUES
(1, 'Vilshanka 1', 'vilshanka-1', 3, 0, '', '', '', 0, 0, '', '', 3, '', '', '2018-07-17 15:06:40', '2018-07-17 15:06:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Vilshanka 2', 'vilshanka-2', 2, 0, '', '', '', 0, 0, '', '', 3, '', '', '2018-07-17 15:06:40', '2018-07-17 15:06:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Vilshanka 3', 'vilshanka-3', 1, 0, 'Specification 1', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat nemo mollitia quam perferendis magnam! Voluptatem enim dolorem labore, et eveniet numquam sequi saepe. Laboriosam nemo totam a pariatur exercitationem nesciunt.', 's1_proto20180426234521256.docx', 48.244, 30.876, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/uQRyg4i4T9o\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '<iframe src=\"https://360player.io/p/BEGuwg/\" frameborder=\"0\" allowfullscreen=\"\" data-token=\"BEGuwg\"></iframe>', 3, 'Permit documentation', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat nemo mollitia quam perferendis magnam! Voluptatem enim dolorem labore, et eveniet numquam sequi saepe. Laboriosam nemo totam a pariatur exercitationem nesciunt.', '2018-07-17 15:06:40', '2018-07-17 15:06:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, 0, 1, '', '', NULL, 0, 0, '', '', 9, '', '', '2018-06-25 22:15:47', '2018-06-25 22:15:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, 0, 1, '', '', NULL, 0, 0, '', '', 9, '', '', '2018-06-25 22:15:47', '2018-06-25 22:15:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, 0, 1, '', '', NULL, 0, 0, '', '', 9, '', '', '2018-06-25 22:15:47', '2018-06-25 22:15:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_stage_docs`
--

DROP TABLE IF EXISTS `osc_stage_docs`;
CREATE TABLE IF NOT EXISTS `osc_stage_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `block` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `pos` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `stage_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_stage_docs`
--

INSERT INTO `osc_stage_docs` (`id`, `filename`, `block`, `name`, `details`, `pos`, `created`, `modified`, `stage_id`) VALUES
(6, 's1_doc20180426172809888.jpeg', 0, NULL, NULL, 0, '2018-04-26 17:28:09', '2018-04-26 17:28:09', 0),
(7, 's1_doc20180426173524317.jpeg', 0, NULL, NULL, 0, '2018-04-26 17:35:24', '2018-04-26 17:35:24', 0),
(14, 's1_doc20180426234522272.jpg', 0, NULL, NULL, 0, '2018-04-26 23:45:22', '2018-04-26 23:45:22', 3),
(15, 's1_doc20180426234535563.jpg', 0, NULL, NULL, 0, '2018-04-26 23:45:35', '2018-04-26 23:45:35', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_stage_photos`
--

DROP TABLE IF EXISTS `osc_stage_photos`;
CREATE TABLE IF NOT EXISTS `osc_stage_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `block` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `pos` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `stage_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_stage_photos`
--

INSERT INTO `osc_stage_photos` (`id`, `filename`, `block`, `name`, `details`, `pos`, `created`, `modified`, `stage_id`) VALUES
(16, 's1_photo20180426234521270.jpg', 0, NULL, NULL, 0, '2018-04-26 23:45:21', '2018-04-26 23:45:21', 3),
(17, 's1_photo20180426234521339.jpg', 0, NULL, NULL, 0, '2018-04-26 23:45:21', '2018-04-26 23:45:21', 3),
(18, 's1_photo20180426234521894.jpg', 0, NULL, NULL, 0, '2018-04-26 23:45:22', '2018-04-26 23:45:22', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_static_translations`
--

DROP TABLE IF EXISTS `osc_static_translations`;
CREATE TABLE IF NOT EXISTS `osc_static_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `ru_text` varchar(255) DEFAULT NULL,
  `uk_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_static_translations`
--

INSERT INTO `osc_static_translations` (`id`, `page`, `remark`, `text`, `ru_text`, `uk_text`) VALUES
(1, 'home', 'Якорное меню', 'About', 'О нас', 'Про нас'),
(2, 'home', 'Якорное меню', 'Services', 'Сервисы', 'Сервiси'),
(3, 'home', 'Якорное меню', 'Projects', 'Проекты', 'Проекти'),
(4, 'home', 'Триггер следующей секции', 'about', 'о нас', 'про нас'),
(5, 'home', 'Триггер следующей секции', 'services', 'сервисы', 'сервiси'),
(6, 'home', 'Триггер следующей секции', 'projects', 'проекты', 'проекти'),
(7, 'invest-relations', 'Заголовок', 'Investment relations', 'Отношения с инвесторами', 'Вiдносини з iнвесторами'),
(8, 'invest-relations', 'Заголовок формы', 'To view the materials, please log in', 'Для просмотра материалов, пожалуйста пройдите авторизацию', 'Для перегляду матерiалу, будь ласка, пройдiть авторизацiю'),
(9, 'invest-relations', 'Кнопка формы', 'Sign In', 'Войти', 'Увiйти'),
(10, 'contacts', 'Заголовок страницы', 'Out contacts', 'Наши контакты', 'Нашi контакти'),
(11, 'contacts', 'Заголовок формы', 'Write to us', 'Напишите нам', 'Напишiть нам'),
(12, 'contacts', 'Поле формы \"Имя\"', 'Your name', 'Ваше имя', 'Ваше iм\'я'),
(13, 'contacts', 'Поле формы \"Email\"', 'Email address', 'Email адрес', 'Email адреса'),
(14, 'contacts', 'Поле формы \"Телефон\"', 'Phone number', 'Номер телефона', 'Номер телефону'),
(15, 'contacts', 'Поле формы \"Сообщение\"', 'Message', 'Сообщение', 'Повiдомлення'),
(16, 'contacts', 'Кнопка формы', 'Send', 'Отправить', 'Вiдправити'),
(17, 'project', 'Триггер \"Назад к списку проектов\"', 'back to projects list', 'назад к списку проектов', 'назад до списку проектiв'),
(18, 'project', 'Подзаголовок', 'About project', 'О проекте', 'Про проект'),
(19, 'project', 'Название таба этапов', 'Stage', 'Этап', 'Етап'),
(20, 'project', 'Кнопка \"Копия протокола\"', 'Copy of the protocol', 'Копия протокола', 'Копiя протоколу'),
(21, 'project', 'Заголовок комментариев ', 'Comments', 'Комментарии', 'Коментарi'),
(22, 'project', 'Надпись \"Комментариев нет\"', 'No comments yet', 'Комментариев нет', 'Коментарiв немає'),
(23, 'project', 'Надпись \"Другие проекты\"', 'Other projects', 'Другие проекты', 'Iншi проекти'),
(24, 'project', 'Кнопка в карточке проекта', 'Details', 'Детали', 'Деталi');

-- --------------------------------------------------------

--
-- Структура таблицы `osc_tasks`
--

DROP TABLE IF EXISTS `osc_tasks`;
CREATE TABLE IF NOT EXISTS `osc_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(2) NOT NULL DEFAULT '1',
  `stock_order_id` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT ' No subject',
  `comment` text NOT NULL,
  `date_finish` datetime NOT NULL,
  `dateCreate` datetime NOT NULL,
  `dateModify` datetime NOT NULL,
  `adminMod` int(7) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `osc_task_admin_ref`
--

DROP TABLE IF EXISTS `osc_task_admin_ref`;
CREATE TABLE IF NOT EXISTS `osc_task_admin_ref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL DEFAULT '0',
  `admin_id` int(11) NOT NULL DEFAULT '0',
  `responsible_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `osc_users`
--

DROP TABLE IF EXISTS `osc_users`;
CREATE TABLE IF NOT EXISTS `osc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT '1',
  `block` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `user_card_id` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_users`
--

INSERT INTO `osc_users` (`id`, `login`, `password`, `type`, `block`, `first_name`, `last_name`, `avatar`, `user_card_id`, `created`, `modified`) VALUES
(1, 'sk-fall@yandex.ru', '0b2115aae461d2a797bf7f68bd30c9c4', 1, 0, 'Sergey', '', 'zen_20180409135240692.PNG', 1, '2018-04-09 00:00:00', '2018-04-09 14:19:12'),
(4, 'ab@volterra.energy', 'df82cd3dcd8b7ff9eb511e83d23dd35a', 1, 0, 'Alex', 'Berkman', 'zen_20180427001010478.png', 4, '2018-04-27 00:10:10', '2018-04-27 00:10:10');

-- --------------------------------------------------------

--
-- Структура таблицы `osc_users_chat`
--

DROP TABLE IF EXISTS `osc_users_chat`;
CREATE TABLE IF NOT EXISTS `osc_users_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(63) NOT NULL DEFAULT 'message',
  `status` int(1) NOT NULL DEFAULT '0',
  `from_id` int(7) NOT NULL DEFAULT '0',
  `to_id` int(7) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '0',
  `message` tinytext NOT NULL,
  `file` varchar(63) NOT NULL DEFAULT '0',
  `important` int(2) NOT NULL DEFAULT '0',
  `dateCreate` datetime NOT NULL,
  `dateModify` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Чат между пользователями';

-- --------------------------------------------------------

--
-- Структура таблицы `osc_users_dialogs`
--

DROP TABLE IF EXISTS `osc_users_dialogs`;
CREATE TABLE IF NOT EXISTS `osc_users_dialogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last` int(1) NOT NULL DEFAULT '1',
  `message` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `from_id` int(11) NOT NULL DEFAULT '0',
  `to_id` int(11) NOT NULL DEFAULT '0',
  `dateCreate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `osc_users_types`
--

DROP TABLE IF EXISTS `osc_users_types`;
CREATE TABLE IF NOT EXISTS `osc_users_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL DEFAULT '0',
  `block` int(1) NOT NULL DEFAULT '0',
  `admin_enter` int(1) NOT NULL DEFAULT '1',
  `change_login` int(1) NOT NULL DEFAULT '1',
  `dateCreate` datetime NOT NULL,
  `dateModify` datetime NOT NULL,
  `adminMod` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Уровни пользователей';

--
-- Дамп данных таблицы `osc_users_types`
--

INSERT INTO `osc_users_types` (`id`, `name`, `alias`, `block`, `admin_enter`, `change_login`, `dateCreate`, `dateModify`, `adminMod`) VALUES
(1, 'SuperAdministrator', 'superadministrator', 0, 1, 1, '2013-11-14 00:00:00', '2018-04-12 20:59:50', 0),
(2, 'ContentManager', 'contentmanager', 0, 1, 1, '2013-11-14 00:00:00', '2016-02-04 15:35:23', 0),
(6, 'QualityManager', 'qualitymanager', 0, 1, 1, '2013-11-15 10:47:01', '2015-09-19 01:40:14', 0),
(9, 'Зарегистрированный', 'siteuser', 0, 0, 0, '2013-12-23 15:52:55', '2017-04-11 18:37:04', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `osc_user_cards`
--

DROP TABLE IF EXISTS `osc_user_cards`;
CREATE TABLE IF NOT EXISTS `osc_user_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` int(11) NOT NULL DEFAULT '1',
  `reg_ip` varchar(255) DEFAULT NULL,
  `last_visit_ip` varchar(255) DEFAULT NULL,
  `last_visit_date` datetime DEFAULT NULL,
  `country_id` int(11) NOT NULL DEFAULT '0',
  `address` text,
  `birthday` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_user_cards`
--

INSERT INTO `osc_user_cards` (`id`, `user_id`, `email`, `phone`, `gender`, `reg_ip`, `last_visit_ip`, `last_visit_date`, `country_id`, `address`, `birthday`) VALUES
(1, 1, NULL, '', 1, NULL, NULL, NULL, 0, NULL, '1970-01-01 03:00:00'),
(4, 4, NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, '1970-01-01 03:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `osc_user_type_access`
--

DROP TABLE IF EXISTS `osc_user_type_access`;
CREATE TABLE IF NOT EXISTS `osc_user_type_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access` int(1) NOT NULL DEFAULT '1',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `menu_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=530 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osc_user_type_access`
--

INSERT INTO `osc_user_type_access` (`id`, `access`, `type_id`, `menu_id`) VALUES
(1, 0, 9, 28),
(2, 0, 9, 29),
(3, 0, 9, 7),
(4, 0, 9, 12),
(5, 0, 9, 13),
(6, 0, 9, 14),
(7, 0, 9, 15),
(8, 0, 9, 16),
(9, 0, 9, 30),
(10, 0, 9, 8),
(11, 0, 9, 10),
(12, 0, 9, 11),
(13, 0, 9, 31),
(14, 0, 9, 18),
(15, 0, 9, 17),
(16, 0, 9, 19),
(17, 0, 9, 34),
(18, 0, 9, 32),
(19, 0, 9, 33),
(20, 0, 9, 35),
(21, 0, 9, 20),
(22, 0, 9, 36),
(23, 0, 9, 22),
(24, 0, 9, 23),
(25, 0, 9, 24),
(26, 0, 9, 25),
(27, 1, 9, 26),
(28, 1, 9, 27),
(29, 0, 10, 28),
(30, 0, 10, 29),
(31, 0, 10, 7),
(32, 0, 10, 12),
(33, 0, 10, 13),
(34, 0, 10, 14),
(35, 0, 10, 15),
(36, 0, 10, 16),
(37, 0, 10, 30),
(38, 0, 10, 8),
(39, 0, 10, 10),
(40, 0, 10, 11),
(41, 0, 10, 31),
(42, 0, 10, 18),
(43, 0, 10, 17),
(44, 0, 10, 19),
(45, 0, 10, 34),
(46, 0, 10, 32),
(47, 0, 10, 33),
(48, 0, 10, 35),
(49, 0, 10, 20),
(50, 0, 10, 36),
(51, 0, 10, 22),
(52, 0, 10, 23),
(53, 0, 10, 24),
(54, 0, 10, 25),
(55, 1, 10, 26),
(56, 1, 10, 27),
(57, 1, 1, 28),
(58, 1, 1, 29),
(59, 1, 1, 7),
(60, 1, 1, 12),
(61, 1, 1, 13),
(62, 1, 1, 14),
(63, 1, 1, 15),
(64, 1, 1, 16),
(65, 1, 1, 30),
(66, 1, 1, 8),
(67, 1, 1, 10),
(68, 1, 1, 11),
(69, 1, 1, 31),
(70, 1, 1, 18),
(71, 1, 1, 17),
(72, 1, 1, 19),
(73, 1, 1, 34),
(74, 1, 1, 32),
(75, 1, 1, 33),
(76, 1, 1, 35),
(77, 1, 1, 20),
(78, 1, 1, 36),
(79, 1, 1, 22),
(80, 1, 1, 23),
(81, 1, 1, 24),
(82, 1, 1, 25),
(83, 1, 1, 26),
(84, 1, 1, 27),
(85, 1, 2, 28),
(86, 1, 2, 29),
(87, 1, 2, 7),
(88, 1, 2, 12),
(89, 0, 2, 13),
(90, 0, 2, 14),
(91, 0, 2, 15),
(92, 1, 2, 16),
(93, 0, 2, 30),
(94, 0, 2, 8),
(95, 0, 2, 10),
(96, 0, 2, 11),
(97, 0, 2, 31),
(98, 1, 2, 18),
(99, 1, 2, 17),
(100, 1, 2, 19),
(101, 1, 2, 34),
(102, 1, 2, 32),
(103, 1, 2, 33),
(104, 1, 2, 35),
(105, 1, 2, 20),
(106, 0, 2, 36),
(107, 0, 2, 22),
(108, 0, 2, 23),
(109, 1, 2, 24),
(110, 1, 2, 25),
(111, 1, 2, 26),
(112, 1, 2, 27),
(113, 1, 3, 28),
(114, 1, 3, 29),
(115, 1, 3, 7),
(116, 1, 3, 12),
(117, 1, 3, 13),
(118, 1, 3, 14),
(119, 1, 3, 15),
(120, 1, 3, 16),
(121, 1, 3, 30),
(122, 1, 3, 8),
(123, 1, 3, 10),
(124, 1, 3, 11),
(125, 1, 3, 31),
(126, 1, 3, 18),
(127, 1, 3, 17),
(128, 1, 3, 19),
(129, 1, 3, 34),
(130, 1, 3, 32),
(131, 1, 3, 33),
(132, 1, 3, 35),
(133, 1, 3, 20),
(134, 1, 3, 36),
(135, 1, 3, 22),
(136, 1, 3, 23),
(137, 1, 3, 24),
(138, 1, 3, 25),
(139, 1, 3, 26),
(140, 1, 3, 27),
(141, 1, 4, 28),
(142, 1, 4, 29),
(143, 1, 4, 7),
(144, 1, 4, 12),
(145, 1, 4, 13),
(146, 1, 4, 14),
(147, 1, 4, 15),
(148, 1, 4, 16),
(149, 1, 4, 30),
(150, 1, 4, 8),
(151, 1, 4, 10),
(152, 1, 4, 11),
(153, 1, 4, 31),
(154, 1, 4, 18),
(155, 1, 4, 17),
(156, 1, 4, 19),
(157, 1, 4, 34),
(158, 1, 4, 32),
(159, 1, 4, 33),
(160, 1, 4, 35),
(161, 1, 4, 20),
(162, 1, 4, 36),
(163, 1, 4, 22),
(164, 1, 4, 23),
(165, 1, 4, 24),
(166, 1, 4, 25),
(167, 1, 4, 26),
(168, 1, 4, 27),
(169, 1, 5, 28),
(170, 1, 5, 29),
(171, 1, 5, 7),
(172, 1, 5, 12),
(173, 1, 5, 13),
(174, 1, 5, 14),
(175, 1, 5, 15),
(176, 1, 5, 16),
(177, 1, 5, 30),
(178, 1, 5, 8),
(179, 1, 5, 10),
(180, 1, 5, 11),
(181, 1, 5, 31),
(182, 1, 5, 18),
(183, 1, 5, 17),
(184, 1, 5, 19),
(185, 1, 5, 34),
(186, 1, 5, 32),
(187, 1, 5, 33),
(188, 1, 5, 35),
(189, 1, 5, 20),
(190, 1, 5, 36),
(191, 1, 5, 22),
(192, 1, 5, 23),
(193, 1, 5, 24),
(194, 1, 5, 25),
(195, 1, 5, 26),
(196, 1, 5, 27),
(197, 1, 6, 28),
(198, 1, 6, 29),
(199, 1, 6, 7),
(200, 1, 6, 12),
(201, 1, 6, 13),
(202, 1, 6, 14),
(203, 1, 6, 15),
(204, 1, 6, 16),
(205, 1, 6, 30),
(206, 0, 6, 8),
(207, 0, 6, 10),
(208, 0, 6, 11),
(209, 1, 6, 31),
(210, 1, 6, 18),
(211, 1, 6, 17),
(212, 1, 6, 19),
(213, 1, 6, 34),
(214, 1, 6, 32),
(215, 1, 6, 33),
(216, 1, 6, 35),
(217, 1, 6, 20),
(218, 1, 6, 36),
(219, 1, 6, 22),
(220, 1, 6, 23),
(221, 1, 6, 24),
(222, 1, 6, 25),
(223, 1, 6, 26),
(224, 1, 6, 27),
(225, 1, 7, 28),
(226, 1, 7, 29),
(227, 1, 7, 7),
(228, 1, 7, 12),
(229, 1, 7, 13),
(230, 1, 7, 14),
(231, 1, 7, 15),
(232, 1, 7, 16),
(233, 1, 7, 30),
(234, 1, 7, 8),
(235, 1, 7, 10),
(236, 1, 7, 11),
(237, 1, 7, 31),
(238, 1, 7, 18),
(239, 1, 7, 17),
(240, 1, 7, 19),
(241, 1, 7, 34),
(242, 1, 7, 32),
(243, 1, 7, 33),
(244, 1, 7, 35),
(245, 1, 7, 20),
(246, 1, 7, 36),
(247, 1, 7, 22),
(248, 1, 7, 23),
(249, 1, 7, 24),
(250, 1, 7, 25),
(251, 1, 7, 26),
(252, 1, 7, 27),
(253, 1, 8, 28),
(254, 1, 8, 29),
(255, 1, 8, 7),
(256, 1, 8, 12),
(257, 1, 8, 13),
(258, 1, 8, 14),
(259, 1, 8, 15),
(260, 1, 8, 16),
(261, 1, 8, 30),
(262, 1, 8, 8),
(263, 1, 8, 10),
(264, 1, 8, 11),
(265, 1, 8, 31),
(266, 1, 8, 18),
(267, 1, 8, 17),
(268, 1, 8, 19),
(269, 1, 8, 34),
(270, 1, 8, 32),
(271, 1, 8, 33),
(272, 1, 8, 35),
(273, 1, 8, 20),
(274, 1, 8, 36),
(275, 1, 8, 22),
(276, 1, 8, 23),
(277, 1, 8, 24),
(278, 1, 8, 25),
(279, 1, 8, 26),
(280, 1, 8, 27),
(281, 1, 1, 37),
(282, 1, 6, 37),
(283, 1, 10, 28),
(284, 1, 10, 29),
(285, 1, 10, 7),
(286, 1, 10, 12),
(287, 1, 10, 13),
(288, 1, 10, 14),
(289, 1, 10, 15),
(290, 1, 10, 16),
(291, 1, 10, 30),
(292, 1, 10, 8),
(293, 1, 10, 10),
(294, 1, 10, 11),
(295, 1, 10, 31),
(296, 1, 10, 18),
(297, 1, 10, 17),
(298, 1, 10, 19),
(299, 1, 10, 34),
(300, 1, 10, 32),
(301, 1, 10, 33),
(302, 1, 10, 35),
(303, 1, 10, 20),
(304, 1, 10, 36),
(305, 0, 10, 37),
(306, 1, 10, 22),
(307, 1, 10, 23),
(308, 1, 10, 24),
(309, 1, 10, 25),
(310, 1, 10, 26),
(311, 0, 8, 37),
(312, 1, 10, 7),
(313, 1, 10, 28),
(314, 1, 10, 29),
(315, 0, 10, 8),
(316, 0, 10, 10),
(317, 0, 10, 11),
(318, 0, 10, 31),
(319, 1, 10, 12),
(320, 1, 10, 13),
(321, 1, 10, 14),
(322, 1, 10, 15),
(323, 1, 10, 16),
(324, 1, 10, 30),
(325, 0, 10, 17),
(326, 0, 10, 18),
(327, 0, 10, 19),
(328, 0, 10, 20),
(329, 0, 10, 32),
(330, 0, 10, 33),
(331, 0, 10, 34),
(332, 0, 10, 35),
(333, 0, 10, 36),
(334, 0, 10, 37),
(335, 1, 10, 22),
(336, 1, 10, 23),
(337, 1, 10, 24),
(338, 1, 10, 25),
(339, 1, 10, 26),
(340, 0, 9, 37),
(341, 0, 2, 37),
(342, 1, 1, 38),
(343, 0, 11, 7),
(344, 0, 11, 28),
(345, 0, 11, 29),
(346, 0, 11, 38),
(347, 0, 11, 8),
(348, 0, 11, 10),
(349, 0, 11, 11),
(350, 0, 11, 31),
(351, 0, 11, 12),
(352, 0, 11, 13),
(353, 0, 11, 14),
(354, 0, 11, 15),
(355, 0, 11, 16),
(356, 0, 11, 30),
(357, 0, 11, 17),
(358, 0, 11, 18),
(359, 0, 11, 19),
(360, 0, 11, 20),
(361, 0, 11, 32),
(362, 0, 11, 33),
(363, 0, 11, 34),
(364, 0, 11, 35),
(365, 0, 11, 36),
(366, 0, 11, 37),
(367, 0, 11, 22),
(368, 0, 11, 23),
(369, 0, 11, 24),
(370, 0, 11, 25),
(371, 0, 11, 26),
(372, 1, 12, 7),
(373, 1, 12, 28),
(374, 1, 12, 29),
(375, 1, 12, 38),
(376, 1, 12, 8),
(377, 1, 12, 10),
(378, 1, 12, 11),
(379, 1, 12, 31),
(380, 1, 12, 12),
(381, 1, 12, 13),
(382, 1, 12, 14),
(383, 1, 12, 15),
(384, 1, 12, 16),
(385, 1, 12, 30),
(386, 1, 12, 17),
(387, 1, 12, 18),
(388, 0, 12, 19),
(389, 0, 12, 20),
(390, 0, 12, 32),
(391, 0, 12, 33),
(392, 0, 12, 34),
(393, 0, 12, 35),
(394, 0, 12, 36),
(395, 0, 12, 37),
(396, 1, 12, 22),
(397, 1, 12, 23),
(398, 1, 12, 24),
(399, 1, 12, 25),
(400, 1, 12, 26),
(401, 1, 2, 38),
(402, 1, 1, 39),
(403, 1, 2, 39),
(404, 0, 9, 38),
(405, 0, 9, 39),
(406, 1, 1, 40),
(407, 1, 1, 41),
(408, 1, 1, 42),
(409, 1, 1, 43),
(410, 1, 6, 38),
(411, 1, 6, 40),
(412, 1, 6, 43),
(413, 1, 6, 41),
(414, 1, 6, 39),
(415, 1, 6, 42),
(416, 1, 2, 40),
(417, 1, 2, 43),
(418, 1, 2, 41),
(419, 1, 2, 42),
(420, 1, 1, 44),
(421, 1, 1, 45),
(422, 1, 1, 46),
(423, 1, 1, 47),
(424, 1, 1, 48),
(425, 1, 1, 49),
(426, 1, 1, 50),
(427, 0, 13, 7),
(428, 1, 13, 28),
(429, 0, 13, 29),
(430, 0, 13, 38),
(431, 0, 13, 45),
(432, 0, 13, 8),
(433, 0, 13, 10),
(434, 0, 13, 11),
(435, 0, 13, 31),
(436, 0, 13, 50),
(437, 0, 13, 12),
(438, 0, 13, 13),
(439, 0, 13, 14),
(440, 0, 13, 15),
(441, 0, 13, 16),
(442, 0, 13, 30),
(443, 0, 13, 40),
(444, 0, 13, 43),
(445, 0, 13, 48),
(446, 0, 13, 17),
(447, 0, 13, 18),
(448, 0, 13, 19),
(449, 0, 13, 20),
(450, 0, 13, 32),
(451, 0, 13, 33),
(452, 0, 13, 34),
(453, 0, 13, 35),
(454, 0, 13, 36),
(455, 0, 13, 41),
(456, 0, 13, 39),
(457, 0, 13, 42),
(458, 0, 13, 44),
(459, 0, 13, 22),
(460, 0, 13, 23),
(461, 0, 13, 24),
(462, 0, 13, 25),
(463, 0, 13, 46),
(464, 0, 13, 47),
(465, 0, 13, 49),
(466, 0, 13, 26),
(467, 0, 9, 45),
(468, 0, 9, 50),
(469, 0, 9, 40),
(470, 0, 9, 43),
(471, 0, 9, 48),
(472, 0, 9, 46),
(473, 0, 9, 47),
(474, 0, 9, 49),
(475, 1, 1, 52),
(476, 1, 1, 54),
(477, 1, 1, 56),
(478, 1, 1, 57),
(479, 1, 1, 58),
(480, 1, 1, 59),
(481, 1, 1, 60),
(482, 1, 1, 61),
(483, 1, 1, 62),
(484, 1, 1, 63),
(485, 1, 1, 64),
(486, 1, 1, 65),
(487, 1, 1, 66),
(488, 1, 1, 67),
(489, 1, 1, 68),
(490, 1, 1, 69),
(491, 1, 1, 70),
(492, 1, 1, 71),
(493, 1, 1, 72),
(494, 1, 1, 73),
(495, 1, 1, 74),
(496, 1, 1, 75),
(497, 1, 1, 76),
(498, 1, 1, 77),
(499, 1, 1, 78),
(500, 1, 1, 81),
(501, 1, 1, 84),
(502, 1, 1, 83),
(503, 1, 1, 85),
(504, 1, 1, 87),
(505, 1, 1, 88),
(506, 1, 1, 89),
(507, 1, 1, 90),
(508, 1, 1, 91),
(509, 1, 1, 93),
(510, 1, 1, 94),
(511, 1, 1, 95),
(512, 1, 1, 96),
(513, 1, 1, 97),
(514, 1, 1, 98),
(515, 1, 1, 99),
(516, 1, 1, 100),
(517, 1, 1, 101),
(518, 1, 1, 102),
(519, 1, 1, 103),
(520, 1, 1, 104),
(521, 1, 1, 105),
(522, 1, 1, 106),
(523, 1, 1, 107),
(524, 1, 1, 55),
(525, 1, 1, 79),
(526, 1, 1, 80),
(527, 1, 1, 82),
(528, 1, 1, 51),
(529, 1, 1, 53);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
