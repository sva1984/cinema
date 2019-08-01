-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 01 2019 г., 14:00
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cinema`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8_roman_ci NOT NULL,
  `film_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `parrent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `comment`, `film_id`, `staff_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `parrent_id`) VALUES
(88, '1', 2, NULL, 1, 1, 1564644938, 1564644938, NULL),
(89, '11', 2, NULL, 1, 1, 1564644945, 1564644945, 88),
(90, '111', 2, NULL, 1, 1, 1564644951, 1564644951, 89),
(91, '112', 2, NULL, 1, 1, 1564644956, 1564644956, 89),
(92, '1', NULL, 1, 1, 1, 1564645340, 1564645340, NULL),
(93, '2', NULL, 1, 1, 1, 1564645344, 1564645344, NULL),
(94, '2', NULL, 1, 1, 1, 1564645774, 1564645774, NULL),
(95, '1.1', 1, NULL, 1, 1, 1564646347, 1564646347, 92),
(96, '1.1', NULL, 1, 1, 1, 1564646987, 1564646987, 92),
(97, '1121', 2, NULL, 1, 1, 1564647327, 1564647327, 91),
(98, '1122', 2, NULL, 1, 1, 1564647335, 1564647335, 91),
(99, '1.2', NULL, 1, 1, 1, 1564647404, 1564647404, 92),
(100, '1.2', NULL, 1, 1, 1, 1564647511, 1564647511, 92),
(101, '111', NULL, 1, 1, 1, 1564647525, 1564647525, 96),
(102, '3', NULL, 1, 1, 1, 1564647857, 1564647857, NULL),
(103, '3.1', NULL, 1, 1, 1, 1564647864, 1564647864, 102),
(104, '3.2', NULL, 1, 1, 1, 1564647872, 1564647872, 103),
(105, '11221', 2, NULL, 1, 1, 1564647885, 1564647885, 98),
(106, '11222', 2, NULL, 1, 1, 1564647893, 1564647893, 98);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(64) COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'США'),
(2, 'Франция');

-- --------------------------------------------------------

--
-- Структура таблицы `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8_roman_ci NOT NULL,
  `description` text COLLATE utf8_roman_ci DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `raiting` decimal(2,1) DEFAULT NULL,
  `raiting_mpaa` varchar(64) COLLATE utf8_roman_ci DEFAULT NULL,
  `img_url` varchar(64) COLLATE utf8_roman_ci NOT NULL,
  `video_url` varchar(64) COLLATE utf8_roman_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `film`
--

INSERT INTO `film` (`id`, `title`, `description`, `year`, `duration`, `country_id`, `raiting`, `raiting_mpaa`, `img_url`, `video_url`) VALUES
(1, 'Форрест Гамп', 'От лица главного героя Форреста Гампа, слабоумного безобидного человека с благородным и открытым сердцем, рассказывается история его необыкновенной жизни.\r\nФантастическим образом превращается он в известного футболиста, героя войны, преуспевающего бизнесмена. Он становится миллиардером, но остается таким же бесхитростным, глупым и добрым. Форреста ждет постоянный успех во всем, а он любит девочку, с которой дружил в детстве, но взаимность приходит слишком поздно.', 1994, 142, 1, '5.0', '5', 'https://st.kp.yandex.net/images/film_iphone/iphone360_448.jpg', 'https://www.youtube.com/embed/otmeAaifX04'),
(2, 'Назад в будущее', 'Подросток Марти с помощью машины времени, сооружённой его другом-профессором доком Брауном, попадает из 80-х в далекие 50-е. Там он встречается со своими будущими родителями, ещё подростками, и другом-профессором, совсем молодым.', 1985, 116, 1, '4.5', '2', 'https://st.kp.yandex.net/images/film_iphone/iphone360_476.jpg', 'https://www.youtube.com/embed/OCtt7giwbi0'),
(3, 'Спасти рядового Райана', 'Капитан Джон Миллер получает тяжелое задание. Вместе с отрядом из восьми человек Миллер должен отправиться в тыл врага на поиски рядового Джеймса Райана, три родных брата которого почти одновременно погибли на полях сражений.\r\nКомандование приняло решение демобилизовать Райана и отправить его на родину к безутешной матери. Но для того, чтобы найти и спасти солдата, крошечному отряду придется пройти через все круги ада…', 1998, 169, 1, '4.6', '3', 'https://st.kp.yandex.net/images/film_iphone/iphone360_371.jpg', 'https://www.youtube.com/embed/3fSy80D9Vyc'),
(4, '1+1', 'Пострадав в результате несчастного случая, богатый аристократ Филипп нанимает в помощники человека, который менее всего подходит для этой работы, — молодого жителя предместья Дрисса, только что освободившегося из тюрьмы. Несмотря на то, что Филипп прикован к инвалидному креслу, Дриссу удается привнести в размеренную жизнь аристократа дух приключений.', 2011, 112, 2, '4.7', '4', 'https://st.kp.yandex.net/images/film_iphone/iphone360_535341.jpg', 'https://www.youtube.com/embed/tTwFeGArcrs'),
(5, 'Назад в будущее 2', 'Продолжение фантастической истории о приключениях американского подростка во времени. На этот раз с помощью модернизированной Доком машины времени Марти из 80-х попадает в будущее.\r\nДети Марти в беде, и их надо выручать. Приходится повозиться со злодеем…', 1989, 108, 1, '1.5', '5', 'https://st.kp.yandex.net/images/film_iphone/iphone360_5502.jpg', 'https://www.youtube.com/embed/tE1cyMUhh2k');

-- --------------------------------------------------------

--
-- Структура таблицы `film_favorite`
--

CREATE TABLE `film_favorite` (
  `film_id` int(11) NOT NULL,
  `favorite_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `film_genre`
--

CREATE TABLE `film_genre` (
  `film_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `film_genre`
--

INSERT INTO `film_genre` (`film_id`, `genre_id`) VALUES
(1, 4),
(1, 7),
(2, 2),
(2, 3),
(2, 9),
(3, 4),
(3, 6),
(4, 2),
(4, 4),
(4, 10),
(5, 2),
(5, 3),
(5, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `film_key_word`
--

CREATE TABLE `film_key_word` (
  `film_id` int(11) NOT NULL,
  `key_word_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `film_prize`
--

CREATE TABLE `film_prize` (
  `film_id` int(11) NOT NULL,
  `prize_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `film_staff`
--

CREATE TABLE `film_staff` (
  `film_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `film_staff`
--

INSERT INTO `film_staff` (`film_id`, `staff_id`) VALUES
(1, 1),
(1, 3),
(3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `film_user`
--

CREATE TABLE `film_user` (
  `film_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre` varchar(64) COLLATE utf8_roman_ci NOT NULL,
  `about` text COLLATE utf8_roman_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id`, `genre`, `about`) VALUES
(1, 'Семейный', 'По сравнению с детскими фильмами, при производстве фильмов семейных предпринимаются специальные усилия для того, чтоб расширить возможную аудиторию, причем не только по возрасту, но и географически[2]. Необходимым условием для признания кино- или видеопроизведения семейным является отсутствие в нём материалов, которые будут сочтены неподходящими для детей. Cуществует, в частности, рейтинг PG-13, который не различает детские и семейные фильмы (его получили, например, такие фильмы, как «Доктор Дулиттл» и «Дом большой мамочки 2»). Если в фильме присутствует юмор, то он включает ситуации, смешные для детей, и остроумные шутки, способные вызвать смех у взрослых[3].'),
(2, 'Комедия', 'Коме́дия (др.-греч. κωμ-ῳδία, от κῶμος «праздник в честь Диониса» + ἀοιδή / ᾠδή, ᾠδά «песня; ода») — жанр художественного произведения, характеризующийся юмористическим или сатирическим подходом, и также вид драмы, в котором специфически разрешается момент действенного конфликта или борьбы.\r\n\r\nАристотель определял комедию, как «подражание худшим людям, но не во всей их порочности, а в смешном виде». Самые ранние сохранившиеся комедии созданы в Древних Афинах и принадлежат перу Аристофана (см. Древнегреческая комедия).'),
(3, 'Фантастика', 'Фанта́стика (от др.-греч. φανταστική — искусство воображения, фантазия) — жанр и творческий метод в художественной литературе, кино, изобразительном и других формах искусства, характеризуемый использованием фантастического допущения, «элемента необычайного»[1][2][3], нарушением границ реальности, принятых условностей[4]. Современная фантастика включает в себя такие жанры как научная фантастика, фэнтези, ужасы, магический реализм и многие другие.'),
(4, 'Драма', 'Дра́ма (др.-греч. δρᾶμα «деяние, действие») — литературный (драматический), сценический и кинематографический жанр. Получил особое распространение в литературе XVIII—XXI веков, постепенно вытеснив другой жанр драматургии — трагедию[1], противопоставив ему преимущественно бытовой сюжет и более приближенный к обыденной реальности стиль[2]. С возникновением кинематографа перешёл также и в этот вид искусства, став одним из самых распространённых его жанров (см. соответствующую категорию).\r\n\r\nВ отличие от лирики и подобно эпосу, драма воспроизводит прежде всего внешний мир — взаимоотношения между людьми, их поступки, возникающие конфликты. В отличие от эпоса, она имеет не повествовательную, а диалогическую форму. Эстетический предмет драмы — эмоционально-волевые реакции человека, проявленные в словесно-физических действиях. Для драматических произведений характерны остро-конфликтные ситуации, властно побуждающие персонажа к словесно-физическому действию. Драмы специфически изображают, как правило, частную жизнь человека и его социальные конфликты. При этом акцент часто делается на общечеловеческих противоречиях, воплощённых в поведении и поступках конкретных персонажей.'),
(5, 'Мелодрама', 'Мелодра́ма (от др.-греч. μέλος «песня, поэма, лирическое произведение» + δρᾶμα «действие») — жанр художественной литературы, театрального искусства и кинематографа, произведения которого раскрывают духовный и чувственный мир героев в особенно ярких эмоциональных обстоятельствах на основе контрастов: добро и зло, любовь и ненависть и тому подобного. Как правило, сюжеты мелодрам концентрируются вокруг семейных тем (любовь, брак, женитьба, знакомство, перипетии семейной жизни) и редко выходят в иные плоскости, хотя многие мелодрамы имеют черты исторических драм и разворачиваются в том или ином схематично поданном историческом контексте. В сюжете могут быть и трагические сцены, в большинстве случаев завершающиеся счастливым концом. В мелодраме эмоциональная сгущенность текста, острота интриги подавляют тонкую разработку характеров, которые обычно стереотипны и ведут себя предсказуемо. Кинематографические и театральные мелодрамы традиционно сопровождаются музыкальными номерами, подчеркивающими эмоциональность истории. Книги в основном предназначены для прочтения взрослыми.'),
(6, 'Военный', 'Вое́нный фильм или бата́льный фильм — исторический художественный фильм, реконструирующий события реально происходившей войны или сражения, амуницию, оружие, приёмы и организацию боя. В центре художественной композиции батального фильма обычно находится сцена главного сражения, съёмки которого сочетают широкие панорамные планы с крупными планами героев фильма.\r\n\r\nБатальные фильмы — одни из самых затратных жанров в кинематографе, поскольку часто требуют привлечения или изготовления военной техники, разрушения декораций, больших костюмированных массовок, сложных компьютерных эффектов и т. п.'),
(7, 'Мелодрама', 'Мелодра́ма (от др.-греч. μέλος «песня, поэма, лирическое произведение» + δρᾶμα «действие») — жанр художественной литературы, театрального искусства и кинематографа, произведения которого раскрывают духовный и чувственный мир героев в особенно ярких эмоциональных обстоятельствах на основе контрастов: добро и зло, любовь и ненависть и тому подобного. Как правило, сюжеты мелодрам концентрируются вокруг семейных тем (любовь, брак, женитьба, знакомство, перипетии семейной жизни) и редко выходят в иные плоскости, хотя многие мелодрамы имеют черты исторических драм и разворачиваются в том или ином схематично поданном историческом контексте. В сюжете могут быть и трагические сцены, в большинстве случаев завершающиеся счастливым концом. В мелодраме эмоциональная сгущенность текста, острота интриги подавляют тонкую разработку характеров, которые обычно стереотипны и ведут себя предсказуемо. Кинематографические и театральные мелодрамы традиционно сопровождаются музыкальными номерами, подчеркивающими эмоциональность истории. Книги в основном предназначены для прочтения взрослыми.'),
(9, 'Приключение', 'Приключение — используется во многих контекстах и ситуациях. Например, это — ключевой компонент рассказов, легенд и сказок, драм и спектаклей; используется в сюжетах и фабулах книг, фильмов, музыкальных произведений и компьютерных игр. Приключение также используется в области образования, спорта, туризма и в других формах развлечений. Примеры таких приключенческих жанров:\r\n\r\nПриключенческий фильм — жанр фильма.\r\nПриключенческая игра — компьютерный жанр игры.\r\nПриключенческий роман — жанр беллетристики.\r\nПриключенческий туризм предлагает туристам возможность иметь увлекательные, захватывающие путешествия.'),
(10, 'Биография', 'Фильм-биография — кинематографический жанр (или отдельное художественное произведение), повествующий о судьбе знаменитой, известной личности на протяжении всей жизни или в наиболее важные драматические её моменты. В отличие от картин, основанных на подлинных событиях, или исторических фильмов, целью фильма-биографии является не хроникальное освещение случившихся фактов и событий, а влияние конкретной персоны на их исход.');

-- --------------------------------------------------------

--
-- Структура таблицы `key_word`
--

CREATE TABLE `key_word` (
  `id` int(11) NOT NULL,
  `key_word` varchar(64) COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_roman_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1564066591),
('m130524_201442_init', 1564066675),
('m190124_110200_add_verification_token_column_to_user_table', 1564066675),
('m190726_085511_create_country_table', 1564131370),
('m190726_085657_create_film_table', 1564131425),
('m190726_085903_create_staff_table', 1564131567),
('m190726_090002_create_genre_table', 1564131694),
('m190726_090048_create_prize_table', 1564131695),
('m190726_090124_create_comment_table', 1564131695),
('m190726_090152_create_key_word_table', 1564131726),
('m190726_092433_create_junction_table_for_film_and_key_word_tables', 1564133089),
('m190726_092823_create_junction_table_for_film_and_prize_tables', 1564133312),
('m190726_093054_create_junction_table_for_film_and_genre_tables', 1564133459),
('m190726_093743_create_junction_table_for_film_and_user_tables', 1564133878),
('m190726_095026_add_position_column_to_user_table', 1564135051),
('m190726_100338_create_junction_table_for_film_and_staff_tables', 1564135423),
('m190726_101738_add_position_column_to_film_table', 1564136268),
('m190731_140815_add_about_column_to_genre_table', 1564582105);

-- --------------------------------------------------------

--
-- Структура таблицы `prize`
--

CREATE TABLE `prize` (
  `id` int(11) NOT NULL,
  `prize` varchar(64) COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_roman_ci NOT NULL,
  `biography` text COLLATE utf8_roman_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `hieght` decimal(2,1) DEFAULT NULL,
  `profession` tinyint(1) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `img_url` varchar(128) COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `staff`
--

INSERT INTO `staff` (`id`, `name`, `biography`, `birth_date`, `hieght`, `profession`, `country_id`, `img_url`) VALUES
(1, 'Том Хэнкс', 'Хэнкс начинал свою актёрскую карьеру с ролей на телевидении и комедийных фильмов, прежде чем добился признания в качестве драматического актёра, и получил две премии «Оскар» в категории «Лучшая мужская роль» — за главные роли в фильмах «Филадельфия» (1993) и «Форрест Гамп» (1994), тем самым став одним из двух актёров в истории кинематографа (помимо Спенсера Трейси), выигравших данную награду два раза подряд.\r\n\r\nСреди наиболее известных фильмов с участием Хэнкса — «Всплеск» (1984), «Большой» (1988), «Тёрнер и Хуч» (1989), «Их собственная лига» (1992), «Неспящие в Сиэтле» (1993), «Аполлон-13» (1995), «Вам письмо» (1998), «Зелёная миля» (1999), «Изгой» (2000), «Проклятый путь» (2002), «Облачный атлас» (2012), «Капитан Филлипс» (2013), «Спасти мистера Бэнкса» (2013) и «Чудо на Гудзоне» (2016). Хэнкс также известен по роли Роберта Лэнгдона в экранизациях книг Дэна Брауна, и озвучиванию Шерифа Вуди в серии мультфильмов «История игрушек».', '1956-07-09', '1.8', 1, 1, 'https://st.kp.yandex.net/im/kadr/2/3/3/kinopoisk.ru-Tom-Hanks-2333649.jpg'),
(2, 'Майкл Дж. Фокс', 'Майкл Э́ндрю Фокс (англ. Michael Andrew Fox; родился 9 июня 1961 в Эдмонтоне, Канада), более известный как Майкл Джей Фокс (англ. Michael J. Fox) — канадо-американский актёр, писатель, активист, продюсер, режиссёр кино и телевидения. Начал сниматься в 1970-х годах, но наибольшую известность получил за исполнение роли Марти Макфлая в фантастической трилогии «Назад в будущее», а также сериале «Семейные узы», выходившем в эфир с 1982 по 1989 год, за роль в котором актёр выиграл три премии «Эмми», один «Золотой глобус», а также две «премии Гильдии киноактёров США».', '1961-06-09', '1.6', 1, 1, 'https://st.kp.yandex.net/images/actor_iphone/iphone360_181.jpg'),
(3, 'Роберт Земекис', 'Роберт вырос в небольшом особняке по адресу 11344 S Edbrooke Ave, Chicago, IL в чикагском микрорайоне Роузлэнд[en].[13] Впоследствии он поселил Билли, персонажа своего мультфильма «Полярный экспресс», в похожем доме по адресу 11344 Edbrooke Ave, Grand Rapids, MI (в реальности, в Гранд-Рапидс такой улицы нет).\r\n\r\nСреднее образование Земекис получил в Академии Фенгера[en]. Он говорил: «Правда в том, что в моей семье не было места искусству. То есть музыке, книгам и театру… Единственным доступным мне источником вдохновения было телевидение — и оно действительно им было.»\r\n\r\nВ возрасте 13 лет у Земекиса появилась 8-мм любительская кинокамера Kodak.[4] Начав со съёмки семейных событий, он перешёл к съёмке фильмов в жанре повествования, применяя кукольную мультипликацию и другие спецэффекты. В качестве звукового сопровождения использовалась музыка The Beatles.[14]', '1951-05-14', '1.8', 2, 1, 'https://st.kp.yandex.net/images/actor_iphone/iphone360_2435.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_url` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `img_url`) VALUES
(1, 'admin', 'jTLbPVDtirtWpnzyRlcSXMYn1e7VsDEM', '$2y$13$sZifQJtASTfLKlk2yA8aoOf5EsoTLCh/tG6pRNP4wIZ8FOlUB44EC', NULL, 'a@a.com', 10, 1564067097, 1564067097, '52xZsDmQzucO0C8C2Nw-wNWwtlZsgVMg_1564067097', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-comment-film_id` (`film_id`),
  ADD KEY `idx-comment-created_by` (`created_by`),
  ADD KEY `idx-comment-updated_by` (`updated_by`),
  ADD KEY `idx-comment-parrent_id` (`parrent_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-film-country_id` (`country_id`);

--
-- Индексы таблицы `film_favorite`
--
ALTER TABLE `film_favorite`
  ADD PRIMARY KEY (`film_id`,`favorite_id`),
  ADD KEY `idx-film_favorite-film_id` (`film_id`),
  ADD KEY `idx-film_favorite-favorite_id` (`favorite_id`);

--
-- Индексы таблицы `film_genre`
--
ALTER TABLE `film_genre`
  ADD PRIMARY KEY (`film_id`,`genre_id`),
  ADD KEY `idx-film_genre-film_id` (`film_id`),
  ADD KEY `idx-film_genre-genre_id` (`genre_id`);

--
-- Индексы таблицы `film_key_word`
--
ALTER TABLE `film_key_word`
  ADD PRIMARY KEY (`film_id`,`key_word_id`),
  ADD KEY `idx-film_key_word-film_id` (`film_id`),
  ADD KEY `idx-film_key_word-key_word_id` (`key_word_id`);

--
-- Индексы таблицы `film_prize`
--
ALTER TABLE `film_prize`
  ADD PRIMARY KEY (`film_id`,`prize_id`),
  ADD KEY `idx-film_prize-film_id` (`film_id`),
  ADD KEY `idx-film_prize-prize_id` (`prize_id`);

--
-- Индексы таблицы `film_staff`
--
ALTER TABLE `film_staff`
  ADD PRIMARY KEY (`film_id`,`staff_id`),
  ADD KEY `idx-film_staff-film_id` (`film_id`),
  ADD KEY `idx-film_staff-staff_id` (`staff_id`);

--
-- Индексы таблицы `film_user`
--
ALTER TABLE `film_user`
  ADD PRIMARY KEY (`film_id`,`user_id`),
  ADD KEY `idx-film_user-film_id` (`film_id`),
  ADD KEY `idx-film_user-user_id` (`user_id`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `key_word`
--
ALTER TABLE `key_word`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `prize`
--
ALTER TABLE `prize`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-staff-country_id` (`country_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `key_word`
--
ALTER TABLE `key_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `prize`
--
ALTER TABLE `prize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `fk-comment-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-comment-film_id` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-comment-parrent_id` FOREIGN KEY (`parrent_id`) REFERENCES `comment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-comment-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk-film-country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `film_favorite`
--
ALTER TABLE `film_favorite`
  ADD CONSTRAINT `fk-film_favorite-film_id` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `film_genre`
--
ALTER TABLE `film_genre`
  ADD CONSTRAINT `fk-film_genre-film_id` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-film_genre-genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `film_key_word`
--
ALTER TABLE `film_key_word`
  ADD CONSTRAINT `fk-film_key_word-film_id` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-film_key_word-key_word_id` FOREIGN KEY (`key_word_id`) REFERENCES `key_word` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `film_prize`
--
ALTER TABLE `film_prize`
  ADD CONSTRAINT `fk-film_prize-film_id` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-film_prize-prize_id` FOREIGN KEY (`prize_id`) REFERENCES `prize` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `film_staff`
--
ALTER TABLE `film_staff`
  ADD CONSTRAINT `fk-film_staff-film_id` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-film_staff-staff_id` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `film_user`
--
ALTER TABLE `film_user`
  ADD CONSTRAINT `fk-film_user-film_id` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-film_user-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk-staff-country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
