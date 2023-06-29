-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 28 2023 г., 14:19
-- Версия сервера: 8.0.29
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hotel`
--

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `all_bookings_with_name`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `all_bookings_with_name` (
`id_booking` int
,`arrival_date` date
,`departure_date` date
,`arrival_time` time
,`departure_time` time
,`id_special_offer` int
,`id_room` int
,`second_name` varchar(32)
,`first_name` varchar(32)
,`patronymic` varchar(32)
,`id_employee` int
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `all_guests`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `all_guests` (
`id_guest` int
,`second_name` varchar(32)
,`first_name` varchar(32)
,`patronymic` varchar(32)
,`birthday` date
,`id_nationality` int
,`phone_number` varchar(16)
,`email_address` varchar(64)
,`password` varchar(255)
,`id_program_level` int
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `all_guest_bookings`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `all_guest_bookings` (
`id_booking` int
,`arrival_date` date
,`departure_date` date
,`arrival_time` time
,`departure_time` time
,`id_special_offer` int
,`id_room` int
,`id_guest` int
,`room_type` int
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `all_room_bookings`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `all_room_bookings` (
`id_booking` int
,`arrival_date` date
,`departure_date` date
,`arrival_time` time
,`departure_time` time
,`id_special_offer` int
,`id_room` int
,`id_guest` int
,`id_employee` int
);

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--

CREATE TABLE `bookings` (
  `id_booking` int NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `arrival_time` time NOT NULL,
  `departure_time` time NOT NULL,
  `amount_of_guests` int NOT NULL,
  `id_special_offer` int DEFAULT NULL,
  `id_room` int NOT NULL,
  `id_guest` int NOT NULL,
  `id_employee` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `bookings`
--

INSERT INTO `bookings` (`id_booking`, `arrival_date`, `departure_date`, `arrival_time`, `departure_time`, `amount_of_guests`, `id_special_offer`, `id_room`, `id_guest`, `id_employee`) VALUES
(1, '2023-06-22', '2023-06-23', '10:00:00', '12:00:00', 2, NULL, 1, 1, NULL),
(2, '2023-06-24', '2023-06-28', '12:00:00', '08:00:00', 1, NULL, 2, 2, 1),
(4, '2023-05-27', '2023-05-28', '12:00:00', '12:00:00', 1, NULL, 4, 1, NULL),
(5, '2023-05-28', '2023-05-29', '12:00:00', '12:00:00', 1, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `bookings_made_by`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `bookings_made_by` (
`id_booking` int
,`arrival_date` date
,`departure_date` date
,`arrival_time` time
,`departure_time` time
,`id_special_offer` int
,`id_room` int
,`id_guest` int
,`second_name` varchar(32)
,`first_name` varchar(32)
,`patronymic` varchar(32)
);

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id_employee` int NOT NULL,
  `second_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `patronymic` varchar(32) NOT NULL,
  `position` varchar(64) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `email_address` varchar(64) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id_employee`, `second_name`, `first_name`, `patronymic`, `position`, `phone_number`, `email_address`, `password`) VALUES
(1, 'Григорян', 'Нарек', 'Гагикович', 'Администратор', '89998887766', 'employee1@liberta.ru', '$2y$10$b.5IY1plpdamjy8gOoEKveyfMh2ZeoWHRLHONAEcrtZ2BB/bBXJ1a'),
(2, 'Гучаев', 'Идар', 'Арсенович', 'Менеджер', '89998887767', 'employee2@liberta.ru', '$2y$10$wV9WlPAk3X44pVv9HQRZie8PtzwNxP/cOZjsJ.gzb7u0vpidqs1ni');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `free_rooms_between_time`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `free_rooms_between_time` (
`id_room` int
,`room` varchar(3)
,`floor` int
,`id_room_type` int
,`bed_type` varchar(16)
);

-- --------------------------------------------------------

--
-- Структура таблицы `guests`
--

CREATE TABLE `guests` (
  `id_guest` int NOT NULL,
  `second_name` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `patronymic` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `id_nationality` int DEFAULT NULL,
  `phone_number` varchar(16) NOT NULL,
  `email_address` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_program_level` int NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `guests`
--

INSERT INTO `guests` (`id_guest`, `second_name`, `first_name`, `patronymic`, `birthday`, `id_nationality`, `phone_number`, `email_address`, `password`, `id_program_level`) VALUES
(1, 'Михаил', 'Чиненов', 'Дмитриевич', '2004-01-19', 2, '89687850305', 'isip_m.d.chinenov@mpt.ru', '$2y$10$NHcu5CRjiU9TaIU2etATcu1TS9qeZK5Agqou./ojcgb3eU.W9XV66', 3),
(2, 'Мамонтова', 'Кристина', 'Дмитриевна', '2004-06-06', 1, '89687850404', 'isip_k.d.mamontova@mpt.ru', '$2y$10$Tab7f4sPYyyF5WcY2gRMIOy0iaFOPIvwg2frIokppLkMCivAaSDOi', 3);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `guests_between_time`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `guests_between_time` (
`id_guest` int
,`second_name` varchar(32)
,`first_name` varchar(32)
,`patronymic` varchar(32)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `guests_on_floor`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `guests_on_floor` (
`second_name` varchar(32)
,`first_name` varchar(32)
,`patronymic` varchar(32)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `guests_with_bookings`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `guests_with_bookings` (
`id_guest` int
,`second_name` varchar(32)
,`first_name` varchar(32)
,`patronymic` varchar(32)
,`amount_of_bookings` bigint
);

-- --------------------------------------------------------

--
-- Структура таблицы `nationalities`
--

CREATE TABLE `nationalities` (
  `id_nationality` int NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `nationalities`
--

INSERT INTO `nationalities` (`id_nationality`, `name`) VALUES
(1, 'Российская Федерация'),
(2, 'Армения'),
(3, 'Грузия');

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id_payment` int NOT NULL,
  `id_booking` int NOT NULL,
  `payment_method` varchar(32) NOT NULL,
  `amount` int NOT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'Не оплачен'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id_payment`, `id_booking`, `payment_method`, `amount`, `status`) VALUES
(1, 1, 'Картой онлайн', 17500, 'Не оплачен'),
(2, 2, 'Наличными', 78000, 'Не оплачен'),
(5, 4, 'Наличными', 30500, 'Не оплачен'),
(6, 5, 'Наличными', 17500, 'Не оплачен');

-- --------------------------------------------------------

--
-- Структура таблицы `program_levels`
--

CREATE TABLE `program_levels` (
  `id_program_level` int NOT NULL,
  `name` varchar(16) NOT NULL,
  `year_cost` int NOT NULL,
  `stay_discounts` varchar(4) NOT NULL,
  `food_discounts` varchar(4) NOT NULL,
  `early_arrival` varchar(8) NOT NULL,
  `late_depature` varchar(8) NOT NULL,
  `cleaning_discounts` varchar(4) NOT NULL,
  `parking_discounts` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `program_levels`
--

INSERT INTO `program_levels` (`id_program_level`, `name`, `year_cost`, `stay_discounts`, `food_discounts`, `early_arrival`, `late_depature`, `cleaning_discounts`, `parking_discounts`) VALUES
(1, 'Серебряный', 5000, '5%', '10%', '-', '15:00', 'нет', 'нет'),
(2, 'Золотой', 8000, '10%', '15%', '09:00', '18:00', '10%', '25%'),
(3, 'Нет', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id_room` int NOT NULL,
  `room` varchar(3) NOT NULL,
  `floor` int NOT NULL,
  `id_room_type` int NOT NULL,
  `bed_type` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id_room`, `room`, `floor`, `id_room_type`, `bed_type`) VALUES
(1, '001', 2, 1, 'Double'),
(2, '002', 2, 2, 'Double'),
(3, '003', 2, 3, 'Double'),
(4, '004', 2, 4, 'King');

-- --------------------------------------------------------

--
-- Структура таблицы `room_types`
--

CREATE TABLE `room_types` (
  `id_room_type` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `space` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `capacity` varchar(16) NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `room_types`
--

INSERT INTO `room_types` (`id_room_type`, `name`, `image`, `short_description`, `description`, `space`, `capacity`, `price`) VALUES
(1, 'Супериор', 'супериор.png', 'Просторные номера категории Супериор предлагают гостям ощутить исключительный комфорт в атмосфере роскоши.', '<b>Общие</b>\r\n<br>\r\n<br>\r\n- 49＂LCD-телевизор <br>\r\n- Мультифункциональная fm-станция с возможностью использования зарядного устройства <br>\r\n- Рабочий стол с канцелярскими принадлежностями <br>\r\n- Капсульная кофемашина <br>\r\n- Чайный набор (Чайник и наборы для чая и кофе) <br>\r\n- Минибар <br>\r\n- Просторный шкаф <br>\r\n- Сейф\r\n<br>\r\n<br>\r\n<b>Ванная комната</b>\r\n<br>\r\n<br>\r\n- Косметические средства (Molton Brown) <br>\r\n- Роскошные халаты и тапочки <br>\r\n- Одноразовая зубная щетка, зубная паста <br>\r\n- Бритва <br>\r\n- Фен <br>\r\n- Напольные весы <br>\r\n- Зеркало для бритья / макияжа <br>\r\n<br>\r\n<br>\r\n<b>Другие</b>\r\n<br>\r\n<br>\r\n-Спутниковые каналы <br>\r\n-Комплиментарная вода <br>\r\n-Детские кроватки по запросу <br>\r\n-Гипоаллергенные подушки <br>\r\n-Утюг/ гладильная доска <br>\r\n<br>\r\n<br>\r\nВ ресторане Liberta Restaurant, расположенном на 1 этаже, гостей ждет шикарный завтрак с 6:30 до 11:00. С 19:00 ресторан с авторским меню работает в формате A La Cart.', '40 ~ 45 м²', '1 ~ 2 чел', 17500),
(2, 'Делюкс', 'делюкс.png', 'Оформленные в современном стиле номера категории Делюкс, с панорамным видом на улицы города, предлагают гостям исключительный комфорт.', '<b>Общие</b>\r\n<br>\r\n<br>\r\n- 49＂LCD-телевизор <br>\r\n- Мультифункциональная fm-станция с возможностью использования зарядного устройства <br>\r\n- Рабочий стол с канцелярскими принадлежностями <br>\r\n- Капсульная кофемашина <br>\r\n- Чайный набор (Чайник и наборы для чая и кофе) <br>\r\n- Минибар <br>\r\n- Просторный шкаф <br>\r\n- Сейф\r\n<br>\r\n<br>\r\n<b>Ванная комната</b>\r\n<br>\r\n<br>\r\n- Косметические средства (Molton Brown) <br>\r\n- Роскошные халаты и тапочки <br>\r\n- Одноразовая зубная щетка, зубная паста <br>\r\n- Бритва <br>\r\n- Фен <br>\r\n- Напольные весы <br>\r\n- Зеркало для бритья / макияжа <br>\r\n<br>\r\n<br>\r\n<b>Другие</b>\r\n<br>\r\n<br>\r\n-Спутниковые каналы <br>\r\n-Комплиментарная вода <br>\r\n-Детские кроватки по запросу <br>\r\n-Гипоаллергенные подушки <br>\r\n-Утюг/ гладильная доска <br>\r\n<br>\r\n<br>\r\nВ ресторане Liberta Restaurant, расположенном на 1 этаже, гостей ждет шикарный завтрак с 6:30 до 11:00. С 19:00 ресторан с авторским меню работает в формате A La Cart.', '45 ~ 50 м²', '1 ~ 2 чел', 19500),
(3, 'Полулюкс', 'полулюкс.png', 'Стильные и комфортные номера категории Полулюкс с изысканным интерьером.', '<b>Общие</b>\r\n<br>\r\n<br>\r\n- 49＂LCD-телевизор <br>\r\n- Мультифункциональная fm-станция с возможностью использования зарядного устройства <br>\r\n- Рабочий стол с канцелярскими принадлежностями <br>\r\n- Капсульная кофемашина <br>\r\n- Чайный набор (Чайник и наборы для чая и кофе) <br>\r\n- Минибар <br>\r\n- Просторный шкаф <br>\r\n- Сейф\r\n<br>\r\n<br>\r\n<b>Ванная комната</b>\r\n<br>\r\n<br>\r\n- Косметические средства (Molton Brown) <br>\r\n- Роскошные халаты и тапочки <br>\r\n- Одноразовая зубная щетка, зубная паста <br>\r\n- Бритва <br>\r\n- Фен <br>\r\n- Напольные весы <br>\r\n- Зеркало для бритья / макияжа <br>\r\n<br>\r\n<br>\r\n<b>Другие</b>\r\n<br>\r\n<br>\r\n-Спутниковые каналы <br>\r\n-Бесплатная утренняя газета (по выбору гостя)<br>\r\n-Комплиментарная вода <br>\r\n-Детские кроватки по запросу <br>\r\n-Гипоаллергенные подушки <br>\r\n-Утюг/ гладильная доска <br>\r\n<br>\r\n<br>\r\nВ ресторане Liberta Restaurant, расположенном на 1 этаже, гостей ждет шикарный завтрак с 6:30 до 11:00. С 19:00 ресторан с авторским меню работает в формате A La Cart.', '50 ~ 55 м²', '1 ~ 2 чел', 23500),
(4, 'Люкс', 'люкс.png', 'Просторный Люкс – это идеальный вариант для гостей, которым важна просторная зона отдыха и рабочее пространство.', '<b>Общие</b>\r\n<br>\r\n<br>\r\n- 49＂LCD-телевизор <br>\r\n- Мультифункциональная fm-станция с возможностью использования зарядного устройства <br>\r\n- Рабочий стол с канцелярскими принадлежностями <br>\r\n- Капсульная кофемашина <br>\r\n- Чайный набор (Чайник и наборы для чая и кофе) <br>\r\n- Минибар <br>\r\n- Просторный шкаф <br>\r\n- Сейф\r\n<br>\r\n<br>\r\n<b>Ванная комната</b>\r\n<br>\r\n<br>\r\n- Косметические средства (Molton Brown) <br>\r\n- Роскошные халаты и тапочки <br>\r\n- Одноразовая зубная щетка, зубная паста <br>\r\n- Бритва <br>\r\n- Фен <br>\r\n- Напольные весы <br>\r\n- Зеркало для бритья / макияжа <br>\r\n<br>\r\n<br>\r\n<b>Другие</b>\r\n<br>\r\n<br>\r\n-Спутниковые каналы <br>\r\n-Бесплатная утренняя газета (по выбору гостя)<br>\r\n-Комплиментарная вода <br>\r\n-Детские кроватки по запросу <br>\r\n-Гипоаллергенные подушки <br>\r\n-Утюг/ гладильная доска <br>\r\n<br>\r\n<br>\r\nВ ресторане Liberta Restaurant, расположенном на 1 этаже, гостей ждет шикарный завтрак с 6:30 до 11:00. С 19:00 ресторан с авторским меню работает в формате A La Cart.', '60 ~ 70 м²', '1 ~ 2 чел', 30500);

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id_service` int NOT NULL,
  `name` varchar(32) NOT NULL,
  `image` varchar(255) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `floor` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id_service`, `name`, `image`, `opening_time`, `closing_time`, `short_description`, `description`, `floor`, `price`) VALUES
(1, 'Ресторан', 'ресторан.png', '07:00:00', '23:00:00', 'В меню ресторана Liberta Restaurant представлен широкий выбор как классических, так и эксклюзивных блюд русской, европейской и азиатской кухни.', 'Просторный зал ресторана Liberta с элегантным интерьером находится на 3 этаже Лотте Отеля Самара, его площадь составляет 285 кв.м, рассчитан на 100 посадочных мест. В теплое время года посетители ресторана могут прекрасно провести время на открытом воздухе за обедом или ужином, а может быть, просто выпить чашку кофе на террасе, наслаждаясь летним днем. Позавтракать в ресторане La Terrazza могут как гости отеля, так и жители города. Стоимость завтрака: 2 500 рублей на человека. Для детей: до 6 лет - бесплатно, от 6 до 12 лет - 1 250 рублей.\r\n<br>\r\n<br>\r\n<b>Завтрак \"Шведский стол\":</b>\r\n<br>\r\n<br>\r\nС пн по пт с 6:30 до 11:00 <br>\r\nС сб по вс с 7:00 до 11:30\r\n<br>\r\n<br>\r\n<b>Арт-ланч:</b>\r\n<br>\r\n<br>\r\nС пн по пт с 12:00 до 16:00\r\n<br>\r\n<br>\r\n<b>Ужин \"A La Carte\":</b>\r\n<br>\r\n<br>\r\nЕжедневно до 23:00\r\n<br>\r\n<br>\r\nШеф-повар ресторана Liberta Restaurant создает свои кулинарные шедевры с абсолютной любовью. Неповторимое сочетание вкусов из нового меню ресторана раскроет новые гастрономические горизонты. Обеды и ужины проходят в формате деловых и торжественных мероприятий с предварительным заказом блюд.', 1, 0),
(2, 'Бассейн', 'бассейн.png', '07:00:00', '23:00:00', 'Бассейн в нашей гостинице - это настоящий оазис для любителей роскоши и комфорта! Вода в бассейне всегда чистая, температура поддерживается идеальной, а качество обслуживания приведет вас в восторг.', 'Наш бассейн - это настоящий драгоценный камень нашей гостиницы. Расположенный внутри помещения, он обеспечивает идеальный отдых в любое время года. В нем вы можете комфортно провести время в теплой атмосфере, не зависимо от погоды и температуры на улице.\r\n \r\nБассейн оборудован системой автоматического обогрева и поддержания температуры воды на оптимальном уровне для комфортного плавания. \r\n\r\nК тому же, он обеспечивает развлечение для всей семьи: дети смогут наслаждаться играми в воде, а взрослые - плавать и заниматься водными тренировками.', 1, 0),
(3, 'Фитнес-центр', 'фитнес-центр.png', '07:00:00', '23:00:00', 'Фитнес-центр нашей гостиницы - идеальное место для тех, кто не желает нарушать свой режим и хочет поддерживать форму в любых условиях.', 'Наш фитнес-центр - это современное место, где вы можете поддерживать свою форму и заботиться о здоровье, находясь в поездке. \r\n\r\nМы расположены на первом этаже гостиницы и предлагаем все необходимое для проведения эффективных и приятных тренировок. \r\n\r\nШирокий выбор прекрасных тренажеров, от наиболее современных до классических, кардио-зона и зал для групповых занятий - это все, что нужно, чтобы достичь своих целей и сохранить форму. Наш фитнес-центр специализируется на личной поддержке, так что возможен индивидуальный подход для каждого.\r\n\r\nВся мебель и оборудование производится только по высшему разряду качества и соответствует последним стандартам безопасности. \r\n\r\nМы стремимся сделать ваше занятие фитнесом максимально комфортным и приятным. Или вы уже пересмотрели свой график ради этого удивительного опыта, или же вы просто хотите свободно включить занятие в свой образ жизни, то мы готовы приветствовать вас в нашем фитнес-центре!', 1, 2000),
(4, 'Конференц-залы', 'конференц-залы.png', '07:00:00', '23:00:00', 'Наши конференц-залы - это идеальный выбор для проведения профессиональных мероприятий любого масштаба! Оборудованные самой современной техникой и мебелью, они обеспечат удобство и комфорт всем участникам встречи.', 'Наши конференц-залы - идеальное место для проведения успешных мероприятий различной направленности: от бизнес-встреч и конференций до семинаров и тренингов. \r\n\r\nМы предлагаем разнообразные залы и переговорные комнаты, которые соответствуют самым высоким стандартам качества и оборудованы всем необходимым для полной функциональности. Каждый зал обладает современной акустикой и звуковой системой, проектором, доской для презентаций и доступом в Интернет.\r\n\r\nНаши конференц-залы могут вместить до 50 человек, в зависимости от конфигурации помещения и режима настроек мебели. Мы также готовы предложить услуги кейтеринга и организации кофе-брейков, чтобы обеспечить максимальное удобство в процессе проведения мероприятий. \r\n\r\nМы стремимся создавать идеальные условия, чтобы ваше мероприятие прошло на высшем уровне, независимо от его расписания. Доверьте нам проведение вашего мероприятия и наслаждайтесь высокотехнологичным и профессиональным обслуживанием от самого начала до конца.', 1, 10000);

-- --------------------------------------------------------

--
-- Структура таблицы `service_connections`
--

CREATE TABLE `service_connections` (
  `id_service_connection` int NOT NULL,
  `id_service` int NOT NULL,
  `id_booking` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `service_connections`
--

INSERT INTO `service_connections` (`id_service_connection`, `id_service`, `id_booking`) VALUES
(1, 3, 1),
(2, 4, 2);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `sort_by_type`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `sort_by_type` (
`id_room` int
,`room` varchar(3)
,`floor` int
,`room_type` varchar(32)
,`bed_type` varchar(16)
);

-- --------------------------------------------------------

--
-- Структура таблицы `special_offers`
--

CREATE TABLE `special_offers` (
  `id_special_offer` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `special_offers`
--

INSERT INTO `special_offers` (`id_special_offer`, `name`, `short_description`, `description`, `image`) VALUES
(1, 'Счастье для двоих', 'Подарите самому близкому человеку выходные безмятежного счастья в гостинице Liberta', '- Проживание в номере категории Делюкс на двоих<br>\r\n- Ранний заезд (с 8:00) / Поздний выезд (до 15:00)<br>\r\n- Завтрак на двоих в ресторане Liberta Restaurant<br>\r\n- Комплиментарная бутылка охлажденного шампанского<br>\r\n- Авторский десерт от шеф-кондитера в номере<br>\r\n- Доступ в премиальный фитнес-клуб и бассейн<br>\r\n- Разрешение на бесплатную фотосессию в интерьерах отеля<br>\r\n<b>Стоимость: 23 000 рублей/ночь</b>\r\n<br>\r\n<br>\r\n- Проживание в номере категории Делюкс на двоих<br>\r\n- Ранний заезд (с 8:00) / Поздний выезд (до 15:00)<br>\r\n- Завтрак на двоих в ресторане Liberta Restaurant<br>\r\n- Комплиментарная бутылка охлажденного шампанского<br>\r\n- Авторский десерт от шеф-кондитера в номере<br>\r\n- Доступ в премиальный фитнес-клуб и бассейн<br>\r\n- Разрешение на бесплатную фотосессию в интерьерах отеля<br>\r\n<b>Стоимость: 23 000 рублей/ночь</b>\r\n<br>\r\n<br>\r\n<b>Правила тарифа:</b>\r\n<br>\r\n<br>\r\nСпециальное предложение действует при наличии номеров, тариф указан в рублях с учетом НДС согласно действующему законодательству РФ.<br>\r\nРанний заезд и поздний выезд предоставляются по возможности отеля.<br>\r\nУсловия оплаты: 100% предоплата за 24 часа до заезда<br>\r\nУсловия аннуляции: менее 24 часов до заезда<br>', 'счастье_для_двоих.png'),
(2, 'Семейный отдых', 'Порадуйте себя и своих близких беззаботными выходными в кругу семьи. Предложение действует с пятницы по воскресенье.', '- Проживание в номере категории Супериор для двоих взрослых и ребенка до 12 лет<br>\r\n- Ранний заезд (с 8:00) / Поздний выезд (до 16:00)<br>\r\n- Семейный завтрак в ресторане Liberta Restaurant<br>\r\n- Дополнительные детские кровати в номере<br>\r\n- Детские халаты и тапочки <br>\r\n- Ваучер на молочный коктейль и сладкий комплимент при заезде <br>\r\n- Доступ в бассейн с детьми от 7ми лет\r\nБесплатный wi-fi на всей территории отеля<br>\r\n<b>Стоимость: 16 500 рублей/ночь</b>\r\n<br>\r\n<br>\r\n- Проживание в номере категории Люкс для двоих взрослых и ребенка до 12 лет\r\nРанний заезд (с 8:00) / Поздний выезд (до 16:00) <br>\r\n- Семейный завтрак в ресторане Liberta Restaurant<br>\r\n- Дополнительные детские кровати в номере \r\n- Детские халаты и тапочки <br>\r\n- Ваучер на молочный коктейль и сладкий комплимент при заезде <br>\r\n- Доступ в бассейн с детьми от 7ми лет: \r\nМини-бар <br>\r\n- Бесплатный wi-fi на всей территории отеля <br>\r\n<b>Стоимость: 28 500 рублей/ночь</b>\r\n<br>\r\n<br>\r\n<b>Правила тарифа:</b>\r\n<br>\r\n<br>\r\nСпециальное предложение действует при наличии номеров, тариф указан в рублях с учетом НДС согласно действующему законодательству РФ.\r\n<br>\r\n<br>\r\nКоличество гостей: 2 взрослых + 1 ребёнок до 12 лет\r\n<br>\r\n<br>\r\nУсловия оплаты: 100% предоплата за 24 часа до заезда<br>\r\nУсловия аннуляции: менее 24 часов до заезда', 'семейный_отдых.png'),
(3, 'Отдых с питомцем', 'C радостью разместим Ваших четвероногих друзей в роскошных номерах гостиницы Liberta', 'Ежедневное пребывание домашнего питомца составляет 2 500 руб. \r\n<br>\r\n<br>\r\nДомашними животными в отеле признаются только теплокровные неэкзотические животные. Отель оставляет за собой право определять возможность проживания данного домашнего животного.\r\n<br>\r\n<br>\r\nЛюбезно просим перед бронированием номера известить администрацию отеля о породе своего питомца (в том числе его размер и вес).\r\n<br>\r\n<br>\r\nК размещению допускаются ухоженные, здоровые (без болезней), не больше 10 кг домашние питомцы.  \r\n<br>\r\n<br>\r\nДомашние питомцы не допускаются ни в одно место общественного питания, если они не являются служебными собаками. Животные должны быть на поводке во всех зонах общественного пользования отеля.\r\n<br>\r\n<br>\r\nПожалуйста, повесьте табличку на внешней стороне двери Вашего номера, когда Ваш любимец находится внутри.\r\n<br>\r\n<br>\r\nДля безопасности и комфорта вашего питомца, уборка номеров будет происходить, если: а) вашего питомца нет; б) вы присутствуете и ваш питомец на поводке или в клетке. Если Вы хотите, чтобы Ваш номер убрали, пожалуйста, позвоните в отдел Housekeeping/Уборка номеров.\r\n<br>\r\n<br>\r\nВы освобождаете от ответственности гостиницу Liberta в случае возникновения жалоб по проживанию Вашего питомца, а также обязуетесь возместить ущерб.', 'отдых_с_питомцем.png'),
(4, 'Детский день рождения в Liberta', 'Отметьте день рождения ребенка в формате кулинарного мастер-класса', 'Увлекательный творческий процесс подарит незабываемые впечатления виновнику торжества и приглашенным гостям!\r\n<br>\r\n<br>\r\n<b>В программе:</b>\r\n<br>\r\n<br>\r\n- Приготовление блюд и напитков под руководством повара <br>\r\n- Предоставление детской униформы и кухонного инвентаря на время мастер-класса <br>\r\n- Вручение сертификатов «маленький поваренок» <br>\r\n- Совместная дегустация приготовленных блюд <br>\r\n<br>\r\nПодарок имениннику от кондитерской мастерской отеля', 'детский_день_рождения_в_liberta.png');

-- --------------------------------------------------------

--
-- Структура для представления `all_bookings_with_name`
--
DROP TABLE IF EXISTS `all_bookings_with_name`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `all_bookings_with_name`  AS SELECT `bookings`.`id_booking` AS `id_booking`, `bookings`.`arrival_date` AS `arrival_date`, `bookings`.`departure_date` AS `departure_date`, `bookings`.`arrival_time` AS `arrival_time`, `bookings`.`departure_time` AS `departure_time`, `bookings`.`id_special_offer` AS `id_special_offer`, `bookings`.`id_room` AS `id_room`, `guests`.`second_name` AS `second_name`, `guests`.`first_name` AS `first_name`, `guests`.`patronymic` AS `patronymic`, `bookings`.`id_employee` AS `id_employee` FROM (`bookings` join `guests` on((`guests`.`id_guest` = `bookings`.`id_guest`)))  ;

-- --------------------------------------------------------

--
-- Структура для представления `all_guests`
--
DROP TABLE IF EXISTS `all_guests`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `all_guests`  AS SELECT `guests`.`id_guest` AS `id_guest`, `guests`.`second_name` AS `second_name`, `guests`.`first_name` AS `first_name`, `guests`.`patronymic` AS `patronymic`, `guests`.`birthday` AS `birthday`, `guests`.`id_nationality` AS `id_nationality`, `guests`.`phone_number` AS `phone_number`, `guests`.`email_address` AS `email_address`, `guests`.`password` AS `password`, `guests`.`id_program_level` AS `id_program_level` FROM `guests``guests`  ;

-- --------------------------------------------------------

--
-- Структура для представления `all_guest_bookings`
--
DROP TABLE IF EXISTS `all_guest_bookings`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `all_guest_bookings`  AS SELECT `bookings`.`id_booking` AS `id_booking`, `bookings`.`arrival_date` AS `arrival_date`, `bookings`.`departure_date` AS `departure_date`, `bookings`.`arrival_time` AS `arrival_time`, `bookings`.`departure_time` AS `departure_time`, `bookings`.`id_special_offer` AS `id_special_offer`, `bookings`.`id_room` AS `id_room`, `bookings`.`id_guest` AS `id_guest`, `bookings`.`id_employee` AS `room_type` FROM (`bookings` join `guests` on((`guests`.`id_guest` = `bookings`.`id_guest`))) WHERE (`guests`.`id_guest` = '1')  ;

-- --------------------------------------------------------

--
-- Структура для представления `all_room_bookings`
--
DROP TABLE IF EXISTS `all_room_bookings`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `all_room_bookings`  AS SELECT `bookings`.`id_booking` AS `id_booking`, `bookings`.`arrival_date` AS `arrival_date`, `bookings`.`departure_date` AS `departure_date`, `bookings`.`arrival_time` AS `arrival_time`, `bookings`.`departure_time` AS `departure_time`, `bookings`.`id_special_offer` AS `id_special_offer`, `bookings`.`id_room` AS `id_room`, `bookings`.`id_guest` AS `id_guest`, `bookings`.`id_employee` AS `id_employee` FROM (`bookings` join `rooms` on((`rooms`.`id_room` = `bookings`.`id_room`))) WHERE (`rooms`.`room` = '001')  ;

-- --------------------------------------------------------

--
-- Структура для представления `bookings_made_by`
--
DROP TABLE IF EXISTS `bookings_made_by`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `bookings_made_by`  AS SELECT `bookings`.`id_booking` AS `id_booking`, `bookings`.`arrival_date` AS `arrival_date`, `bookings`.`departure_date` AS `departure_date`, `bookings`.`arrival_time` AS `arrival_time`, `bookings`.`departure_time` AS `departure_time`, `bookings`.`id_special_offer` AS `id_special_offer`, `bookings`.`id_room` AS `id_room`, `bookings`.`id_guest` AS `id_guest`, `employees`.`second_name` AS `second_name`, `employees`.`first_name` AS `first_name`, `employees`.`patronymic` AS `patronymic` FROM (`bookings` join `employees` on((`employees`.`id_employee` = `bookings`.`id_employee`))) WHERE ((`employees`.`second_name` = 'Григорян') AND (`employees`.`first_name` = 'Нарек') AND (`employees`.`patronymic` = 'Гагикович'))  ;

-- --------------------------------------------------------

--
-- Структура для представления `free_rooms_between_time`
--
DROP TABLE IF EXISTS `free_rooms_between_time`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `free_rooms_between_time`  AS SELECT `rooms`.`id_room` AS `id_room`, `rooms`.`room` AS `room`, `rooms`.`floor` AS `floor`, `rooms`.`id_room_type` AS `id_room_type`, `rooms`.`bed_type` AS `bed_type` FROM `rooms` WHERE `rooms`.`id_room` in (select `bookings`.`id_room` from `bookings` where ((`bookings`.`arrival_date` >= '2023-06-21') AND (`bookings`.`departure_date` <= '2023-06-23'))) is falsefalse  ;

-- --------------------------------------------------------

--
-- Структура для представления `guests_between_time`
--
DROP TABLE IF EXISTS `guests_between_time`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `guests_between_time`  AS SELECT `guests`.`id_guest` AS `id_guest`, `guests`.`second_name` AS `second_name`, `guests`.`first_name` AS `first_name`, `guests`.`patronymic` AS `patronymic` FROM (`guests` join `bookings` on((`guests`.`id_guest` = `bookings`.`id_guest`))) WHERE ((`bookings`.`arrival_date` >= '2023-06-21') AND (`bookings`.`departure_date` <= '2023-06-23'))  ;

-- --------------------------------------------------------

--
-- Структура для представления `guests_on_floor`
--
DROP TABLE IF EXISTS `guests_on_floor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `guests_on_floor`  AS SELECT DISTINCT `guests`.`second_name` AS `second_name`, `guests`.`first_name` AS `first_name`, `guests`.`patronymic` AS `patronymic` FROM ((`guests` join `bookings` on((`guests`.`id_guest` = `bookings`.`id_guest`))) join `rooms` on((`rooms`.`id_room` = `bookings`.`id_room`))) WHERE (`rooms`.`floor` = '2')  ;

-- --------------------------------------------------------

--
-- Структура для представления `guests_with_bookings`
--
DROP TABLE IF EXISTS `guests_with_bookings`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `guests_with_bookings`  AS SELECT `guests`.`id_guest` AS `id_guest`, `guests`.`second_name` AS `second_name`, `guests`.`first_name` AS `first_name`, `guests`.`patronymic` AS `patronymic`, count(0) AS `amount_of_bookings` FROM (`guests` join `bookings` on((`guests`.`id_guest` = `bookings`.`id_guest`))) GROUP BY `guests`.`id_guest` HAVING (count(0) > 0)  ;

-- --------------------------------------------------------

--
-- Структура для представления `sort_by_type`
--
DROP TABLE IF EXISTS `sort_by_type`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `sort_by_type`  AS SELECT `rooms`.`id_room` AS `id_room`, `rooms`.`room` AS `room`, `rooms`.`floor` AS `floor`, `room_types`.`name` AS `room_type`, `rooms`.`bed_type` AS `bed_type` FROM (`rooms` join `room_types` on((`room_types`.`id_room_type` = `rooms`.`id_room_type`))) WHERE (`room_types`.`name` = 'Супериор')  ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_guest` (`id_guest`),
  ADD KEY `id_room` (`id_room`),
  ADD KEY `id_special_offer` (`id_special_offer`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employee`);

--
-- Индексы таблицы `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id_guest`),
  ADD KEY `id_nationality` (`id_nationality`),
  ADD KEY `id_program_level` (`id_program_level`);

--
-- Индексы таблицы `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id_nationality`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Индексы таблицы `program_levels`
--
ALTER TABLE `program_levels`
  ADD PRIMARY KEY (`id_program_level`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `id_room_type` (`id_room_type`);

--
-- Индексы таблицы `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id_room_type`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`);

--
-- Индексы таблицы `service_connections`
--
ALTER TABLE `service_connections`
  ADD PRIMARY KEY (`id_service_connection`),
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Индексы таблицы `special_offers`
--
ALTER TABLE `special_offers`
  ADD PRIMARY KEY (`id_special_offer`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id_booking` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `guests`
--
ALTER TABLE `guests`
  MODIFY `id_guest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id_nationality` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `program_levels`
--
ALTER TABLE `program_levels`
  MODIFY `id_program_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id_room` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id_room_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `service_connections`
--
ALTER TABLE `service_connections`
  MODIFY `id_service_connection` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `special_offers`
--
ALTER TABLE `special_offers`
  MODIFY `id_special_offer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`id_guest`) REFERENCES `guests` (`id_guest`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id_room`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`id_special_offer`) REFERENCES `special_offers` (`id_special_offer`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id_employee`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `guests`
--
ALTER TABLE `guests`
  ADD CONSTRAINT `guests_ibfk_1` FOREIGN KEY (`id_nationality`) REFERENCES `nationalities` (`id_nationality`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `guests_ibfk_2` FOREIGN KEY (`id_program_level`) REFERENCES `program_levels` (`id_program_level`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `bookings` (`id_booking`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`id_room_type`) REFERENCES `room_types` (`id_room_type`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `service_connections`
--
ALTER TABLE `service_connections`
  ADD CONSTRAINT `service_connections_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `service_connections_ibfk_2` FOREIGN KEY (`id_booking`) REFERENCES `bookings` (`id_booking`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
