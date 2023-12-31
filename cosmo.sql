-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 05 2023 г., 14:00
-- Версия сервера: 8.0.31
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cosmo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Интернесное', 'Категория с индексом 1'),
(2, 'Солнечная система', 'То что до пояса Койпера'),
(3, 'Галактики', 'Макро космос'),
(6, 'Каметы, метеоры', 'и другие летающие объекты'),
(16, 'НЛО и ААЯ', 'Аномальное Атмосферное явление'),
(24, 'Мистика', 'Мифы и легенды'),
(28, 'ТОП статей', 'Категория для вывода в слайд шоу на главной странице');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `status` tinyint DEFAULT NULL,
  `page` int NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `status`, `page`, `email`, `comment`, `create_date`) VALUES
(1, 1, 4, 'lisa@mail.com', 'Comments', '2023-06-30 13:32:43'),
(4, 1, 5, 'Lisa@mail.com', 'Этот комментарий со статусом 1', '2023-06-30 13:34:07'),
(5, 0, 5, 'Lisa@mail.com', 'Это очень хороший пост', '2023-06-30 13:34:19'),
(14, 0, 5, 'lisa@mail.com', 'Это очень хороший пост', '2023-06-30 13:53:58'),
(15, 1, 5, 'tomas@ya.com', 'коммент от админа', '2023-06-30 14:41:22'),
(16, 1, 5, 'feona@mail.com', 'Это тестовый коммент', '2023-06-30 16:08:04'),
(17, 0, 5, 'bennet@mail.com', 'Коммент от пользователя', '2023-06-30 16:08:30'),
(18, 0, 5, 'bennet@mail.com', 'Еще коммент от пользователя', '2023-06-30 16:08:42'),
(20, 0, 5, 'bennet@mail.com', '<p>Разберемся, почему так происходит и как устранить ошибку.</p>', '2023-06-30 16:11:02'),
(21, 1, 5, 'bennet@mail.com', 'Еще коммент от пользователя', '2023-06-30 16:11:06'),
(22, 1, 5, 'fgfdg@hjkljhkl.fdgf', 'Коммент не от пользователя', '2023-06-30 16:12:05'),
(26, 1, 28, 'test@tewst.ro', 'Коммент от незарегистрированного пользователя', '2023-06-30 16:26:01'),
(27, 1, 28, 'test@tewst.ro', 'Коммент от незарегистрированного пользователя', '2023-06-30 16:27:02'),
(28, 1, 26, 'testov@bkj.gdf', 'Еще коммент', '2023-06-30 16:29:23'),
(29, 1, 26, 'bennet@mail.com', 'красиво', '2023-06-30 16:30:27'),
(30, 1, 28, 'lisa@mail.com', 'Комменть', '2023-06-30 16:37:52'),
(31, 1, 5, 'test@hjhkfg.dfgdrf', 'juryuju', '2023-06-30 16:41:32'),
(32, 0, 27, 'tomas@ya.com', 'Комментарий тест', '2023-07-02 19:24:41'),
(41, 0, 27, 'tomas@ya.com', 'test escho', '2023-07-02 19:39:03');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL,
  `id_topic` int DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `title`, `image`, `content`, `status`, `id_topic`, `create_date`) VALUES
(2, 9, 'Магнитосфера Земли может быть использована в качестве обсерватории гравитационных волн', '1688565408_74.jpg', '<p>Одна из задач гравитационно-волновой астрономии - расширить свои возможности за пределы наблюдений за слияниями звездных масс. При столкновении двух черных дыр или нейтронных звезд выделяется огромное количество гравитационной энергии, но даже ее трудно обнаружить. Гравитационные волны не имеют сильной связи с большинством материи, поэтому для их наблюдения требуется огромное количество чувствительных приборов. Но нам это удается все лучше, и есть несколько предложений, которые надеются продвинуть наши наблюдения еще дальше. Одним из примеров этого является недавнее исследование, в котором рассматривается использование магнитосфер Земли и Юпитера.<br><br>Наблюдение высокочастотных гравитационных волн является одним из святых граалей гравитационно-волновой астрономии. Согласно стандартной модели космологии, эти высокочастотные волны должны были возникнуть в ранний период большого взрыва, в частности, в результате инфляционного периода. Таким образом, они могли бы предоставить подробные свидетельства как ранней инфляции, так и космической эволюции. Но в настоящее время эти гравитационные волны слишком слабы и случайны, чтобы их можно было отличить от фонового шума.<br><br>Поэтому в новой работе рассматривается возможность их косвенного наблюдения. Хотя высокочастотные гравитационные волны слабы, они взаимодействуют с материалом, через который проходят, сжимая и слегка изгибая его. Это относится не только к материи, но и к магнитным полям. Когда гравитационная волна проходит через магнитное поле, сжатие и изгиб смещают магнитное поле, что может привести к появлению фотонов. Поэтому команда задалась вопросом, как это может происходить при прохождении через достаточно сильные магнитные поля, такие как магнитосферы Земли и Юпитера.<br><br>И Земля, и Юпитер обладают мощными магнитосферами. Магнитосфера Земли - это часть причины, по которой мы защищены от таких явлений, как солнечные вспышки. Команда рассчитала спектр и интенсивность фотонов, которые могут быть произведены магнитосферами Земли и Юпитера, и результаты оказались обнадеживающими. На самом деле, нынешние спутники Земли потенциально могут улавливать некоторые из этих фотонов, как и космический аппарат Juno, вращающийся вокруг Юпитера. Но поскольку эти космические аппараты никогда не были предназначены для наблюдения за такими вещами, у них нет возможности отличить сигналы от фонового радиошума.<br><br>Однако исследование показывает, что наблюдение за эффектами высокочастотных гравитационных волн может быть возможным. Если мы запустим специально разработанные космические аппараты на орбиту вокруг Земли и Юпитера, мы сможем обнаружить фотоны, вызванные гравитацией. Более того, объединив наблюдения с Земли и Юпитера, астрономы смогут точно определить источники гравитационных волн, так как между обнаружением на Земле и Юпитере существует временная задержка.<br><br>Это захватывающее время для астрономов, изучающих гравитационные волны. Эта область все еще находится в зачаточном состоянии, но она быстро развивается. И такие исследования, как это, показывают, что мы даже не приблизились к пределам того, что мы можем когда-нибудь наблюдать.</p><p><br>&nbsp;</p>', 1, 2, '2023-06-23 23:26:03'),
(4, 8, 'Длинный длинный заголовок новости о космосе Длинный длинный заголовок новости о космосе Длинный длинный заголовок новости о космосе', '1687917832_4.jpeg', '<p>Метил-катион (CH3+) астрономы нашли с помощью телескопа NASA James Webb</p>', 1, 6, '2023-06-25 13:53:43'),
(5, 9, 'Искусственный фотосинтез позволит жить за пределами Земли', '1688565457_810.jpg', '<p>Жизнь на Земле обязана своим существованием фотосинтезу — процессу, которому 2,3 миллиарда лет. Эта реакция позволяет растениям и другим организмам собирать солнечный свет, воду и углекислый газ, преобразуя их в кислород и энергию.<br><br>Согласно новой статье, опубликованной в Nature Communications, недавние достижения в области искусственного фотосинтеза вполне могут стать ключом к выживанию и процветанию вдали от Земли.<br><br>Уже существуют способы получения кислорода путем переработки углекислого газа. Большая часть кислорода на МКС образуется в результате электролиза, который использует электричество от солнечных панелей станции для расщепления воды на газообразный водород и кислород, которым дышат астронавты. Станция также оснащена отдельной системой, преобразующей углекислый газ в воду и метан.<br><br>Но эти технологии ненадежны и сложны в обслуживании. Поиск альтернативных систем, которые можно было бы использовать на Луне и при полетах на Марс, продолжается. Одна из возможностей заключается в сборе солнечной энергии и использовании ее для производства кислорода и утилизации углекислого газа в одном устройстве. Единственным другим источником энергии в таком устройстве была бы вода. Это могло бы уменьшить вес и объем системы — два ключевых критерия для освоения космоса. Также это было бы более эффективно.<br><br>Можно было бы использовать дополнительную тепловую энергию, выделяющуюся в процессе улавливания солнечной энергии непосредственно для ускорения химических реакций. Кроме того, можно было бы значительно сократить затраты на сложную проводку и техническое обслуживание.<br><br>Ученые разработали теоретическую основу для анализа и прогнозирования производительности таких интегрированных устройств \"искусственного фотосинтеза\" для применения на Луне и Марсе.<br><br>Вместо хлорофилла, который отвечает за поглощение света растениями и водорослями, в этих устройствах используются полупроводниковые материалы, которые могут быть непосредственно покрыты простыми металлическими катализаторами, поддерживающими желаемую химическую реакцию.<br><br>Анализ показывает, что эти устройства действительно были бы жизнеспособны в дополнение к существующим технологиям жизнеобеспечения, таким как генератор кислорода, используемый на МКС. Это особенно актуально в сочетании с устройствами, которые концентрируют солнечную энергию для приведения реакций в действие (по сути, это большие зеркала, которые фокусируют поступающий солнечный свет).<br><br>Есть и другие подходы. Например, можно производить кислород непосредственно из лунного грунта (реголита). Но для этого требуются высокие температуры.<br><br>С другой стороны, устройства искусственного фотосинтеза могли бы работать при комнатной температуре и давлении, характерном для Марса и Луны. Это означает, что их можно было бы использовать непосредственно в местах обитания, используя воду в качестве основного ресурса.<br><br>Это особенно интересно, учитывая предполагаемое наличие ледяной воды в лунном кратере Шеклтон, который является предполагаемым местом посадки в будущих лунных миссиях.<br><br>На Марсе атмосфера состоит почти на 96% из углекислого газа, что идеально подходит для устройства искусственного фотосинтеза. Интенсивность света на Красной планете слабее, чем на Земле, из-за большего расстояния от Солнца, однако эти устройства смогут работать и там.<br><br>Эффективное и надежное производство кислорода и других химических веществ, а также утилизация углекислого газа на борту космических аппаратов и в местах обитания - это огромная задача, которую необходимо решить для долгосрочных космических полетов.<br><br>Существующие системы электролиза, работающие при высоких температурах, требуют значительного расхода энергии. А устройства для преобразования углекислого газа в кислород на Марсе все еще находятся в зачаточном состоянии, независимо от того, основаны они на фотосинтезе или нет.<br><br>Таким образом, необходимо несколько лет интенсивных исследований, чтобы иметь возможность использовать эти устройства в космосе. Копирование основных элементов естественного фотосинтеза могло бы дать некоторые преимущества, помогая реализовать эти технологии в недалеком будущем.</p><p><br>&nbsp;</p>', 1, 1, '2023-06-25 15:05:49'),
(11, 8, 'Китайский зонд доставит на Луну полезную нагрузку европейских и французских космических агентств', '1687863415_3.jpg', '<p>Новый китайский лунный зонд «Чанъэ-6» доставит в 2024 году на поверхность Луны полезную нагрузку европейских и французских космических агентств. Об этом сообщила во вторник Китайская корпорация аэрокосмической науки и технологий.</p><p>Это стало возможным благодаря двум меморандумам о взаимопонимании, которые Китайское национальное космическое управление /CNSA/ <a href=\"http://localhost/cosmo/single.php\">подписало на прошлой неделе</a> с Европейским космическим агентством и французским Национальным центром космических исследований.</p><p>Европейцы должны поставить анализатор отрицательных ионов, предназначенный для проведения фундаментальных исследований в области планетологии, а французы — детектор для измерения концентрации газа радона и продуктов его распада на поверхности Луны.</p>', 1, 2, '2023-06-25 17:41:15'),
(22, 9, 'Ученые пролили свет на процессы, происходящие на Солнце', '1688565506_26.jpg', '<p>Энергия Солнца может преподносить сюрпризы – взрывы, достаточно сильные, чтобы поджарить спутники связи. Ученые предупреждают о более мощных вспышках на Солнце по мере приближения пика активности в конце 2024 - начале 2025 года.<br><br>Для прогнозирования и понимания таких событий необходимы более глубокие знания о Солнце.<br><br>Солнце представляет собой бурлящий шар плазмы с газами, настолько горячими, что электроны выбиваются из атомов, генерируя на его поверхности интенсивные магнитные взрывы, которые выбрасывают миллиарды тонн вещества в космос.<br><br>При вращении механическая энергия Солнца превращается в магнитную энергию. Извилистые ленты магнетизма поднимаются и вспыхивают в виде солнечных пятен. Солнечные пятна могут спровоцировать солнечные вспышки, которые повреждают электрооборудование. Но эта активность не является постоянной.<br><br>«Магнетизм Солнца меняется в течение 11-летнего цикла», - сказал Саша Брюн, астрофизик.<br><br>В течение этого цикла частота выбросов корональной массы возрастает - с одного выброса каждые три дня до в среднем трех в день на пике.<br><br>Энергичным частицам требуется всего 15 минут, чтобы достичь Земли. Угроза, исходящая от магнитных облаков, обычно длится несколько дней, что дает больше времени для подготовки к ней.<br><br>Брюн является соруководителем финансируемого ЕС проекта под названием WHOLE SUN, направленного на изучение внутренних и внешних слоев единственной звезды в Солнечной системе.<br><br>Эта инициатива, рассчитанная на семь лет, до апреля 2026 года, фокусируется на внутренней турбулентности Солнца и сложной физике, которая превращает внутреннюю турбулентность во внешних слоях в магнетизм.</p><p><br>&nbsp;</p>', 0, 2, '2023-06-26 12:42:36'),
(23, 9, 'Первая статья для вывода в топ', '1687918838_4.jpeg', '<p>Первая статья для вывода в топПервая статья для вывода в топПервая статья для вывода в топПервая статья для вывода в топПервая статья для вывода в топПервая статья для вывода в топ</p>', 1, 28, '2023-06-28 12:18:59'),
(24, 9, 'Вторая статья для вывода в топ', '1687918847_5.jpg', '<p>Вторая статья для вывода в топ Вторая статья для вывода в топ Вторая статья для вывода в топ Вторая статья для вывода в топ Вторая статья для вывода в топ Вторая статья для вывода в топ Вторая статья для вывода в топ Вторая статья для вывода в топ Вторая статья для вывода в топ&nbsp;</p>', 1, 28, '2023-06-28 12:19:24'),
(25, 9, 'Третья статья для вывода в топ', '1687918829_7.jpg', '<p>Третья статья для вывода в топ Третья статья для вывода в топ Третья статья для вывода в топ Третья статья для вывода в топ Третья статья для вывода в топ Третья статья для вывода в топ Третья статья для вывода в топ Третья статья для вывода в топ Третья статья для вывода в топ&nbsp;</p>', 1, 28, '2023-06-28 12:20:29'),
(26, 8, 'Черные дыры могут быть дефектами в пространстве-времени', '1688090322_10.jpg', '<p>Группа физиков-теоретиков обнаружила странную структуру в пространстве-времени, которая для стороннего наблюдателя выглядит как черная дыра, но при ближайшем рассмотрении оказывается не тем, чем является: это дефекты в самой ткани Вселенной.<br><br>Общая теория относительности Эйнштейна предсказывает существование черных дыр, образующихся при коллапсе гигантских звезд. Но та же теория предсказывает, что их центры являются сингулярностями, то есть точками бесконечной плотности. Поскольку мы знаем, что бесконечная плотность не может существовать во Вселенной, мы считаем это признаком того, что теория Эйнштейна неполна. Но после почти столетнего поиска расширений мы так и не нашли лучшей теории гравитации.<br><br>Но у нас есть кандидаты, в том числе теория струн. В теории струн все частицы Вселенной на самом деле являются микроскопическими вибрирующими петлями струны. Для того чтобы поддерживать широкий спектр частиц и сил, которые мы наблюдаем во Вселенной, эти струны не могут просто вибрировать в наших трех пространственных измерениях. Вместо этого должны существовать дополнительные пространственные измерения, которые сворачиваются сами по себе в многообразия настолько маленькие, что они ускользают от повседневного внимания и экспериментов.<br><br>Эта экзотическая структура в пространстве-времени дала группе исследователей инструменты, необходимые для определения нового класса объектов, которые они назвали топологическими солитонами. В ходе анализа они обнаружили, что эти топологические солитоны представляют собой стабильные дефекты в самом пространстве-времени. Для их существования не требуется ни материя, ни другие силы - они так же естественны для ткани пространства-времени, как трещины во льду.<br><br>Исследователи изучали эти солитоны, исследуя поведение света, проходящего вблизи них. Поскольку они являются объектами экстремального пространства-времени, они изгибают пространство и время вокруг себя, что влияет на путь света. Для далекого наблюдателя эти солитоны выглядели бы точно так же, как мы предсказываем появление черных дыр. У них будут тени, кольца света и т.д. Изображения, полученные с помощью телескопа \"Горизонт событий\", и обнаруженные сигнатуры гравитационных волн будут вести себя так же.<br><br>Только подойдя поближе, можно понять, что перед вами не черная дыра. Одной из ключевых особенностей черной дыры является ее горизонт событий - воображаемая поверхность, пересекая которую, вы не сможете выбраться. Топологические солитоны, поскольку они не являются сингулярностями, не имеют горизонта событий. Поэтому в принципе вы можете подойти к солитону и взять его в руку, при условии, что вы переживете эту встречу.<br><br>Эти топологические солитоны - невероятно гипотетический объект, основанный на нашем понимании теории струн, которая еще не доказала, что является жизнеспособным обновлением нашего понимания физики. Однако эти экзотические объекты служат важными тестовыми исследованиями. Если исследователи смогут обнаружить важное наблюдательное различие между топологическими солитонами и традиционными черными дырами, это может проложить путь к поиску способа проверки самой теории струн.</p><p><br>&nbsp;</p>', 0, 1, '2023-06-30 11:58:42'),
(27, 48, 'Черные дыры могут быть дефектами в пространстве-времени', '1688106219_10.jpg', '<p>Группа физиков-теоретиков обнаружила странную структуру в пространстве-времени, которая для стороннего наблюдателя выглядит как черная дыра, но при ближайшем рассмотрении оказывается не тем, чем является: это дефекты в самой ткани Вселенной.<br><br>Общая теория относительности Эйнштейна предсказывает существование черных дыр, образующихся при коллапсе гигантских звезд. Но та же теория предсказывает, что их центры являются сингулярностями, то есть точками бесконечной плотности. Поскольку мы знаем, что бесконечная плотность не может существовать во Вселенной, мы считаем это признаком того, что теория Эйнштейна неполна. Но после почти столетнего поиска расширений мы так и не нашли лучшей теории гравитации.<br><br>Но у нас есть кандидаты, в том числе теория струн. В теории струн все частицы Вселенной на самом деле являются микроскопическими вибрирующими петлями струны. Для того чтобы поддерживать широкий спектр частиц и сил, которые мы наблюдаем во Вселенной, эти струны не могут просто вибрировать в наших трех пространственных измерениях. Вместо этого должны существовать дополнительные пространственные измерения, которые сворачиваются сами по себе в многообразия настолько маленькие, что они ускользают от повседневного внимания и экспериментов.<br><br>Эта экзотическая структура в пространстве-времени дала группе исследователей инструменты, необходимые для определения нового класса объектов, которые они назвали топологическими солитонами. В ходе анализа они обнаружили, что эти топологические солитоны представляют собой стабильные дефекты в самом пространстве-времени. Для их существования не требуется ни материя, ни другие силы - они так же естественны для ткани пространства-времени, как трещины во льду.<br><br>Исследователи изучали эти солитоны, исследуя поведение света, проходящего вблизи них. Поскольку они являются объектами экстремального пространства-времени, они изгибают пространство и время вокруг себя, что влияет на путь света. Для далекого наблюдателя эти солитоны выглядели бы точно так же, как мы предсказываем появление черных дыр. У них будут тени, кольца света и т.д. Изображения, полученные с помощью телескопа \"Горизонт событий\", и обнаруженные сигнатуры гравитационных волн будут вести себя так же.<br><br>Только подойдя поближе, можно понять, что перед вами не черная дыра. Одной из ключевых особенностей черной дыры является ее горизонт событий - воображаемая поверхность, пересекая которую, вы не сможете выбраться. Топологические солитоны, поскольку они не являются сингулярностями, не имеют горизонта событий. Поэтому в принципе вы можете подойти к солитону и взять его в руку, при условии, что вы переживете эту встречу.<br><br>Эти топологические солитоны - невероятно гипотетический объект, основанный на нашем понимании теории струн, которая еще не доказала, что является жизнеспособным обновлением нашего понимания физики. Однако эти экзотические объекты служат важными тестовыми исследованиями. Если исследователи смогут обнаружить важное наблюдательное различие между топологическими солитонами и традиционными черными дырами, это может проложить путь к поиску способа проверки самой теории струн.</p>', 1, 24, '2023-06-30 16:23:39'),
(28, 48, 'Астрономы приблизились к пониманию того, как образовался Меркурий', '1688106289_11.jpg', '<p>Моделирование формирования Солнечной системы было в значительной степени успешным. Оно способно воспроизводить положения всех крупных планет вместе с их орбитальными параметрами. Но при текущем моделировании крайне сложно правильно определить массы четырех планет земной группы, особенно Меркурия. Новое исследование предполагает, что нам нужно уделять больше внимания планетам-гигантам, чтобы понять эволюцию планет поменьше.<br><br>Из всех каменистых планет внутренней части Солнечной системы Меркурий – самая странная. Меркурий не только обладает наименьшей массой, но и имеет очень большое ядро относительно своего размера. Это представляет серьезную проблему для моделирования формирования планет, потому что трудно построить такое большое ядро, не вырастив вместе с ним крупную планету.<br><br>Команда астрономов недавно исследовала несколько возможных объяснений странных свойств Меркурия, выполнив моделирование формирования Солнечной системы.<br><br>На заре существования Солнечной системы вместо аккуратного ряда планет у нас был протопланетный диск, состоящий из газа и пыли. В этот диск были встроены десятки планетезималей, которые в конечном итоге столкнулись, слились и превратились в планеты.<br><br>Астрономы полагают, что на внутреннем краю протопланетного диска, вероятно, относительно не хватало материала. Кроме того, в той молодой системе планеты-гиганты не появлялись на своих современных орбитах. Вместо этого они мигрировали с того места, где они первоначально сформировались, на свои нынешние позиции. Когда эти планеты-гиганты двигались, они дестабилизировали внутренний диск, потенциально удаляя еще больше материала.<br><br>Объединив эти идеи, астрономы смогли построить историю формирования Меркурия. Первоначально внутренний протопланетный диск содержал много планетезималей, но по мере того, как планеты-гиганты перемещались и мигрировали, они уносили с собой много материала, из которого строились планеты. Оставшиеся планетезимали сталкивались друг с другом, и в результате этих столкновений большое количество тяжелых металлов было выброшено на самую внутреннюю планету, создав большое ядро Меркурия.<br><br>Модели отразили размер ядра Меркурия, однако не смогли правильно определить общую массу планеты. В результате моделирования обычно получался Меркурий, который был в два-четыре раза массивнее, чем он есть на самом деле.<br><br>Остается открытым вопрос о том, как появился Меркурий. Астрономы подозревают, что нам нужно более тщательно изучить химические свойства протопланетного диска.</p><p><br>&nbsp;</p>', 1, 2, '2023-06-30 16:24:49');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `admin` tinyint NOT NULL,
  `username` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created`) VALUES
(1, 0, 'Kristina', 'Krissa@mail.com', '123', '2023-06-16 08:49:26'),
(2, 0, 'Alika', 'lessy@mail.com', '123', '2023-06-16 08:49:26'),
(3, 1, 'Bill', 'billyboy@mail.com', '123', '2023-06-16 10:51:51'),
(5, 1, 'Ostin', 'Alester@mail.com', '123', '2023-06-16 11:31:09'),
(6, 0, 'Brand', 'brad@mail.com', '$2y$10$/dYA5m3O86RQ1ocCYLFMBObKY6BCjNqmvU9BnEghjZcXLtiODM1wi', '2023-06-16 11:43:13'),
(8, 1, 'monsher', 'monsher@mail.com', '$2y$10$k7S5/eLQ3vgHlT4OVUGr1OYykGNWoKU/M1yadEtW52oZ6TaW2bkUC', '2023-06-17 10:24:01'),
(9, 1, 'Tomatos', 'tomas@ya.com', '$2y$10$0y2u3aFKRUREoRhmIXSdiOjgZ6AL9TsVleRtB40hfDaAU8VqwdEZe', '2023-06-17 01:24:32'),
(12, 0, 'Kapa', 'kaprina@mail.com', '$2y$10$fd0zWkNS6s6yEUIX6WLbBOjScLg0F0dWO4FoXS4WymetDh9rZd81i', '2023-06-17 04:51:18'),
(37, 1, 'Feona', 'feona@mail.com', '$2y$10$XYeHk.pCHkikPVLr.qOzm.Lx52uufWo3ow26tNpV4MjXu2RJH2Lfu', '2023-06-17 07:58:19'),
(42, 0, 'Bennet', 'bennet@mail.com', '$2y$10$ifDqTtwWmqSi08kX34YDduynDWgMmEf10il17nHJlRYoZjzqGCYBi', '2023-06-17 08:24:44'),
(48, 1, 'Lisa', 'lisa@mail.com', '$2y$10$Pe/y4FFW4/NIq90Xvk2b.O8YOHoTM1IQR5f3x/5HiTSmD1hhqcKwS', '2023-06-17 08:27:43'),
(49, 1, 'MonaLisa', 'monalisa@mail.com', '$2y$10$iQsMPWD1..IufVr26XNEDuRzYHdBGP0yvwrNm6rP0rSMMxG2rqwAu', '2023-06-17 08:30:16'),
(50, 0, 'Mona', 'mona@mail.com', '$2y$10$/d8UdhKXd5u2OePKIehP5.YQTftXYRUXFViUoOquFRMQzhgb0E7fO', '2023-06-17 08:35:50');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`id_topic`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
