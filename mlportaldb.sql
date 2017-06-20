-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 06-06-2017 a las 20:42:38
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mlportaldb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `fullname` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `fullname`, `password`) VALUES
(1, 'Admin', 'Andres Eduardo Molina Morales', '5b56707735bed7117162b252685a19a1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `media_id` int(11) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `isbn` varchar(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`media_id`, `publisher`, `isbn`) VALUES
(1, 'Prentice Hall', '978-0201633610'),
(2, 'Prentice Hall', '978-0132350884'),
(3, 'Addison-Wesley Professional', '978-0201485677'),
(4, 'Prentice Hall', '007-6092046981'),
(13, 'Del Ray', '978-0345538376'),
(14, 'Signet', '978-0451526816'),
(15, 'Pocket Books', '978-0671723651'),
(16, 'Simon & Schuster', '978-1451639612'),
(17, 'O''Reilly Media', '978-0596101534'),
(18, 'HarperCollins', '978-0060256678'),
(19, 'Lark Books', '978-1579909154'),
(20, 'Feiwel & Friends', '978-1250065001'),
(101, 'FCE', '9789990131390');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatos`
--

CREATE TABLE `formatos` (
  `format_id` int(11) NOT NULL,
  `format` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `category` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `formatos`
--

INSERT INTO `formatos` (`format_id`, `format`, `category`) VALUES
(1, 'Paperback', 'Books'),
(2, 'Ebook', 'Books'),
(3, 'Hardcover', 'Books'),
(4, 'Audio', 'Books'),
(5, 'DVD', 'Movies'),
(7, 'CD', 'Music'),
(8, 'Vinyl', 'Music'),
(9, 'Cassette', 'Music'),
(10, 'MP3', 'Music'),
(11, 'Kindle', 'Books'),
(13, 'Streaming', 'Music'),
(15, 'tata', 'Books'),
(24, 'Blue-ray', 'Music');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`genre_id`, `genre`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Fantasy'),
(5, 'Historical'),
(6, 'Historical Fiction'),
(7, 'Horror'),
(8, 'Magical Realism'),
(9, 'Mystery'),
(10, 'Paranoid'),
(11, 'Philosophical'),
(12, 'Political'),
(13, 'Romance'),
(14, 'Saga'),
(15, 'Satire'),
(16, 'Sci-Fi'),
(17, 'Tech'),
(18, 'Thriller'),
(19, 'Urban'),
(20, 'Animation'),
(21, 'Biography'),
(22, 'Crime'),
(23, 'Documentary'),
(24, 'Drama'),
(25, 'Family'),
(26, 'Film-Noir'),
(27, 'Musical'),
(28, 'Sport'),
(29, 'War'),
(30, 'Western'),
(31, 'Alternative'),
(32, 'Blues'),
(33, 'Classical'),
(34, 'Country'),
(35, 'Dance'),
(36, 'Easy Listening'),
(37, 'Electronic'),
(38, 'Folk'),
(39, 'Hip Hop/Rap'),
(40, 'Inspirational/Gospel'),
(41, 'Insirational/Gospel'),
(42, 'Jazz'),
(43, 'Latin'),
(44, 'New Age'),
(45, 'Opera'),
(46, 'Pop'),
(47, 'R&B/Soul'),
(48, 'Reggae'),
(49, 'Rock'),
(50, 'Self-Help'),
(51, 'Business'),
(52, 'Poetry'),
(53, 'Non-Fiction'),
(54, 'Soundtrack'),
(55, 'Disco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre_categories`
--

CREATE TABLE `genre_categories` (
  `genre_id` int(11) NOT NULL,
  `category` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genre_categories`
--

INSERT INTO `genre_categories` (`genre_id`, `category`) VALUES
(1, 'Books'),
(1, 'Movies'),
(2, 'Books'),
(2, 'Movies'),
(3, 'Books'),
(3, 'Movies'),
(4, 'Books'),
(4, 'Movies'),
(5, 'Books'),
(5, 'Movies'),
(7, 'Books'),
(7, 'Movies'),
(6, 'Books'),
(8, 'Books'),
(9, 'Books'),
(9, 'Movies'),
(10, 'Books'),
(11, 'Books'),
(12, 'Books'),
(13, 'Books'),
(13, 'Movies'),
(14, 'Books'),
(15, 'Books'),
(16, 'Books'),
(16, 'Movies'),
(17, 'Books'),
(19, 'Books'),
(18, 'Books'),
(18, 'Movies'),
(20, 'Movies'),
(21, 'Movies'),
(22, 'Movies'),
(23, 'Movies'),
(24, 'Movies'),
(25, 'Movies'),
(26, 'Movies'),
(27, 'Movies'),
(28, 'Movies'),
(29, 'Movies'),
(30, 'Movies'),
(31, 'Music'),
(32, 'Music'),
(33, 'Music'),
(34, 'Music'),
(35, 'Music'),
(36, 'Music'),
(37, 'Music'),
(38, 'Music'),
(39, 'Music'),
(40, 'Music'),
(41, 'Music'),
(42, 'Music'),
(43, 'Music'),
(44, 'Music'),
(45, 'Music'),
(46, 'Music'),
(47, 'Music'),
(48, 'Music'),
(49, 'Music'),
(50, 'Books'),
(51, 'Books'),
(52, 'Books'),
(53, 'Books'),
(54, 'Music'),
(55, 'Music');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `format` varchar(25) NOT NULL,
  `year` int(4) NOT NULL,
  `category` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`media_id`, `title`, `img`, `genre_id`, `format`, `year`, `category`) VALUES
(1, 'A Design Patterns: Elements of Reusable Object-Oriented Software', 'img/media/design_patterns.jpg', 17, 'Paperback', 1994, 'Books'),
(2, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'img/media/clean_code.jpg', 17, 'Ebook', 2008, 'Books'),
(3, 'Refactoring: Improving the Design of Existing Code', 'img/media/refactoring.jpg', 17, 'Hardcover', 1999, 'Books'),
(4, 'The Clean Coder: A Code of Conduct for Professional Programmers', 'img/media/clean_coder.jpg', 17, 'Audio', 2011, 'Books'),
(5, 'Forrest Gump', 'img/media/forrest_gump.jpg', 24, 'DVD', 1994, 'Movies'),
(6, 'Office Space', 'img/media/office_space.jpg', 3, 'Blue-ray', 1999, 'Movies'),
(7, 'The Lord of the Rings: The Fellowship of the Ring', 'img/media/lotr.jpg', 4, 'Blue-ray', 2001, 'Movies'),
(8, 'The Princess Bride', 'img/media/princess_bride.jpg', 3, 'DVD', 1987, 'Movies'),
(9, 'Beethoven: Complete Symphonies', 'img/media/beethoven.jpg', 33, 'CD', 2012, 'Music'),
(10, 'Elvis Forever', 'img/media/elvis_presley.jpg', 49, 'Vinyl', 2015, 'Music'),
(11, 'No Fences', 'img/media/garth_brooks.jpg', 34, 'CD', 1990, 'Music'),
(12, 'The Very Thought of You', 'img/media/nat_king_cole.jpg', 42, 'MP3', 2008, 'Music'),
(13, 'The Hobbit and the Lord of the Rings', 'img/media/hobbit_lotr.jpg', 4, 'Paperback', 2012, 'Books'),
(14, 'Much Ado About Nothing', 'img/media/much_ado_book.jpg', 3, 'Paperback', 2015, 'Books'),
(15, 'How to Win Friends & Influence People', 'img/media/carnegie.jpg', 51, 'Paperback', 1990, 'Books'),
(16, 'The 7 Habits of Highly Effective People: Powerful Lessons in Personal Change', 'img/media/7habits.jpg', 51, 'Paperback', 2013, 'Books'),
(17, 'Mind Performance Hacks: Tips & Tools for Overclocking Your Brain', 'img/media/performance_hacks.jpg', 50, 'Kindle', 2006, 'Books'),
(18, 'Where the Sidewalk Ends: Poems and Drawings', 'img/media/sidewalk.jpg', 52, 'Hardcover', 2014, 'Books'),
(19, 'The Complete Book of Crochet Stitch Designs: 500 Classic & Original Patterns', 'img/media/complete_crochet.jpg', 53, 'Hardcover', 2007, 'Books'),
(20, 'Hello Ruby: Adventures in Coding ', 'img/media/hello_ruby.jpg', 17, 'Hardcover', 2015, 'Books'),
(21, 'The Sound of Music', 'img/media/sound_of_music.jpg', 27, 'DVD', 1965, 'Movies'),
(22, 'Much Ado About Nothing', 'img/media/much_ado_movie.jpg', 3, 'DVD', 1993, 'Movies'),
(23, 'It''s a Wonderful Life (60th Anniversary Edition)', 'img/media/wonderful_life.jpg', 24, 'DVD', 1946, 'Movies'),
(24, 'Captain America: The First Avenger', 'img/media/captain_america.jpg', 1, 'Blue-ray', 2011, 'Movies'),
(25, 'Casablanca 70th Anniversary: Special Edition', 'img/media/casablanca.jpg', 13, 'DVD', 1942, 'Movies'),
(26, 'Mission: Impossible ', 'img/media/mission_impossible.jpg', 1, 'DVD', 1996, 'Movies'),
(28, 'Star Wars: The Complete Saga (Episodes I-VI)', 'img/media/star_wars.jpg', 4, 'Blue-ray', 2015, 'Movies'),
(29, 'Star Wars: The Ultimate Soundtrack Collection', 'img/media/soundtrack_star_wars.jpg', 54, 'CD', 2016, 'Music'),
(30, 'Pentatonix', 'img/media/pentatonix.jpg', 49, 'CD', 2015, 'Music'),
(31, 'Ultimate Sinatra', 'img/media/sinatra.jpg', 36, 'Vinyl', 2015, 'Music'),
(32, 'Led Zeppelin I (Remastered Original Vinyl)', 'img/media/led_zeppelin.jpg', 49, 'Vinyl', 2014, 'Music'),
(33, 'Thriller', 'img/media/michael_jackson.jpg', 55, 'Cassette', 1982, 'Music'),
(34, 'Beethoven''s Last Night', 'img/media/trans-siberian.jpg', 33, 'MP3', 2011, 'Music'),
(35, '25 Adele', 'img/media/adele.jpg', 46, 'MP3', 2015, 'Music'),
(36, 'All-Time Greatest Hits', 'img/media/leann_rimes.jpg', 34, 'Streaming', 2015, 'Music'),
(101, 'Muerte a filo de obsidiana', 'img/media/muerte.jpg', 53, 'Hardcover', 1975, 'Books');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media_people`
--

CREATE TABLE `media_people` (
  `media_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `media_people`
--

INSERT INTO `media_people` (`media_id`, `people_id`, `role`) VALUES
(1, 1, 'author'),
(1, 2, 'author'),
(1, 3, 'author'),
(1, 4, 'author'),
(2, 5, 'author'),
(4, 5, 'author'),
(3, 6, 'author'),
(3, 7, 'author'),
(3, 8, 'author'),
(3, 9, 'author'),
(3, 10, 'author'),
(5, 11, 'writer'),
(5, 12, 'writer'),
(5, 13, 'star'),
(5, 14, 'star'),
(5, 15, 'star'),
(5, 16, 'star'),
(6, 17, 'writer'),
(8, 17, 'writer'),
(5, 18, 'star'),
(5, 19, 'star'),
(5, 20, 'star'),
(5, 21, 'star'),
(5, 22, 'star'),
(5, 23, 'star'),
(7, 24, 'writer'),
(7, 25, 'writer'),
(7, 26, 'writer'),
(7, 27, 'star'),
(8, 28, 'star'),
(8, 29, 'star'),
(8, 30, 'star'),
(8, 31, 'star'),
(8, 32, 'star'),
(8, 33, 'star'),
(8, 34, 'star'),
(8, 35, 'star'),
(8, 36, 'star'),
(8, 37, 'star'),
(9, 38, 'artist'),
(10, 39, 'artist'),
(11, 40, 'artist'),
(12, 41, 'artist'),
(7, 27, 'director'),
(7, 45, 'star'),
(7, 46, 'star'),
(7, 47, 'star'),
(7, 48, 'star'),
(7, 49, 'star'),
(7, 50, 'star'),
(7, 51, 'star'),
(7, 52, 'star'),
(7, 53, 'star'),
(7, 54, 'star'),
(6, 18, 'star'),
(6, 19, 'star'),
(6, 20, 'star'),
(6, 21, 'star'),
(6, 22, 'star'),
(6, 23, 'star'),
(5, 42, 'director'),
(6, 43, 'director'),
(8, 44, 'director'),
(29, 56, 'artist'),
(36, 55, 'artist'),
(30, 57, 'artist'),
(31, 58, 'artist'),
(32, 59, 'artist'),
(33, 60, 'artist'),
(34, 61, 'artist'),
(35, 62, 'artist'),
(13, 24, 'author'),
(14, 63, 'author'),
(15, 64, 'author'),
(16, 65, 'author'),
(17, 66, 'author'),
(18, 67, 'author'),
(19, 68, 'author'),
(20, 69, 'author'),
(22, 72, 'director'),
(22, 72, 'writer'),
(22, 63, 'writer'),
(22, 72, 'star'),
(22, 73, 'star'),
(22, 74, 'star'),
(24, 79, 'director'),
(24, 80, 'writer'),
(24, 81, 'writer'),
(24, 82, 'writer'),
(24, 83, 'writer'),
(24, 84, 'star'),
(24, 85, 'star'),
(24, 86, 'star'),
(24, 87, 'star'),
(24, 88, 'star'),
(24, 89, 'star'),
(25, 90, 'director'),
(25, 91, 'writer'),
(25, 92, 'writer'),
(25, 93, 'writer'),
(25, 94, 'writer'),
(25, 95, 'writer'),
(25, 96, 'star'),
(25, 97, 'star'),
(25, 98, 'star'),
(25, 99, 'star'),
(25, 100, 'star'),
(25, 101, 'star'),
(25, 102, 'star'),
(25, 103, 'star'),
(25, 104, 'star'),
(23, 105, 'director'),
(23, 105, 'writer'),
(23, 106, 'writer'),
(23, 107, 'writer'),
(23, 108, 'writer'),
(23, 109, 'writer'),
(23, 110, 'writer'),
(23, 111, 'star'),
(23, 112, 'star'),
(23, 113, 'star'),
(23, 114, 'star'),
(23, 115, 'star'),
(23, 116, 'star'),
(23, 117, 'star'),
(23, 118, 'star'),
(23, 119, 'star'),
(28, 120, 'director'),
(28, 120, 'writer'),
(28, 121, 'star'),
(28, 122, 'star'),
(28, 123, 'star'),
(28, 124, 'star'),
(28, 125, 'star'),
(28, 126, 'star'),
(28, 127, 'star'),
(28, 128, 'star'),
(28, 129, 'star'),
(28, 130, 'star'),
(21, 131, 'director'),
(21, 132, 'writer'),
(21, 133, 'writer'),
(21, 134, 'writer'),
(21, 135, 'writer'),
(21, 136, 'writer'),
(21, 137, 'star'),
(21, 138, 'star'),
(21, 139, 'star'),
(21, 140, 'star'),
(21, 141, 'star'),
(21, 142, 'star'),
(21, 143, 'star'),
(21, 144, 'star'),
(21, 145, 'star'),
(21, 146, 'star'),
(21, 147, 'star'),
(21, 148, 'star'),
(21, 149, 'star'),
(21, 150, 'star'),
(26, 151, 'director'),
(26, 152, 'writer'),
(26, 153, 'writer'),
(26, 154, 'writer'),
(26, 155, 'writer'),
(26, 156, 'star'),
(26, 157, 'star'),
(26, 158, 'star'),
(26, 159, 'star'),
(26, 160, 'star'),
(26, 161, 'star'),
(26, 162, 'star'),
(26, 0, 'star'),
(101, 164, 'author');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `people_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`people_id`, `fullname`) VALUES
(1, 'Erich Gamma'),
(2, 'Richard Helm'),
(3, 'Ralph Johnson'),
(4, 'John Vlissides'),
(5, 'Robert C. Martin'),
(6, 'Martin Fowler'),
(7, 'Kent Beck'),
(8, 'John Brant'),
(9, 'William Opdyke'),
(10, 'Don Roberts'),
(11, 'Winston Groom'),
(12, 'Eric Roth'),
(13, 'Tom Hanks'),
(14, 'Rebecca Williams'),
(15, 'Sally Field'),
(16, 'Michael Conner Humphreys'),
(17, 'William Goldman'),
(18, 'Ron Livingston'),
(19, 'Jennifer Aniston'),
(20, 'David Herman'),
(21, 'Ajay Naidu'),
(22, 'Diedrich Bader'),
(23, 'Stephen Root'),
(24, 'J.R.R. Tolkien'),
(25, 'Fran Walsh'),
(26, 'Philippa Boyens'),
(27, 'Peter Jackson'),
(28, 'Cary Elwes'),
(29, 'Mandy Patinkin'),
(30, 'Robin Wright'),
(31, 'Chris Sarandon'),
(32, 'Christopher Guest'),
(33, 'Wallace Shawn'),
(34, 'André the Giant'),
(35, 'Fred Savage'),
(36, 'Peter Falk'),
(37, 'Billy Crystal'),
(38, 'Ludwig van Beethoven'),
(39, 'Elvis Presley'),
(40, 'Garth Brooks'),
(41, 'Nat King Cole'),
(42, 'Robert Zemeckis'),
(43, 'Mike Judge'),
(44, 'Rob Reiner'),
(45, 'Elijah Wood'),
(46, 'Ian McKellen'),
(47, 'Orlando Bloom'),
(48, 'Viggo Mortensen'),
(49, 'Liv Tyler'),
(50, 'John Rhys-Davies'),
(51, 'Sean Astin'),
(52, 'Andy Serkis'),
(53, 'Billy Boyd'),
(54, 'Dominic Monaghan'),
(55, 'Leann Rimes'),
(56, 'John Williams'),
(57, 'Pentatonix '),
(58, 'Frank Sinatra'),
(59, 'Led Zeppelin'),
(60, 'Michael Jackson'),
(61, 'Trans-Siberian Orchestra'),
(62, 'Adele'),
(63, 'William Shakespeare'),
(64, 'Dale Carnegie'),
(65, 'Stephen R. Covey'),
(66, 'Ron Hale-Evans'),
(67, 'Shel Silverstein'),
(68, 'Linda P. Schapper'),
(69, 'Linda Liukas'),
(70, 'Chris Buck'),
(71, 'Jennifer Lee'),
(72, 'Kenneth Branagh'),
(73, 'Emma Thompson'),
(74, 'Keanu Reeves'),
(75, 'Hans Christian Andersen'),
(76, 'Kristen Bell'),
(77, 'Jonathan Groff'),
(78, 'Idina Menzel'),
(79, 'Joe Johnston'),
(80, 'Christopher Markus'),
(81, 'Stephen McFeely'),
(82, 'Joe Simon'),
(83, 'Jack Kirby'),
(84, 'Chris Evans'),
(85, 'Chris Evans'),
(86, 'Sebastian Stan'),
(87, 'Tommy Lee Jones'),
(88, 'Hugo Weaving'),
(89, 'Samuel L. Jackson'),
(90, 'Michael Curtiz'),
(91, 'Julius J. Epstein'),
(92, 'Philip G. Epstein'),
(93, 'Howard Koch'),
(94, 'Murray Burnett'),
(95, 'Joan Alison'),
(96, 'Humphrey Bogart'),
(97, 'Ingrid Bergman'),
(98, 'Paul Henreid'),
(99, 'Claude Rains'),
(100, 'Conrad Veidt'),
(101, 'Sydney Greenstreet'),
(102, 'Peter Lorre'),
(103, 'S.Z. Sakall'),
(104, 'Madeleine Lebeau'),
(105, 'Frank Capra'),
(106, 'Frances Goodrich'),
(107, 'Albert Hackett'),
(108, 'Jo Swerling'),
(109, 'Philip Van Doren Stern'),
(110, 'Michael Wilson'),
(111, 'James Stewart'),
(112, 'Donna Reed'),
(113, 'Lionel Barrymore'),
(114, 'Thomas Mitchell'),
(115, 'Henry Travers'),
(116, 'Beulah Bondi'),
(117, 'Frank Faylen'),
(118, 'Ward Bond'),
(119, 'Gloria Grahame'),
(120, 'George Lucas'),
(121, 'Mark Hamill'),
(122, 'Harrison Ford'),
(123, 'Carrie Fisher'),
(124, 'Carrie Fisher'),
(125, 'Peter Cushing'),
(126, 'Alec Guinness'),
(127, 'Anthony Daniels'),
(128, 'Kenny Baker'),
(129, 'Peter Mayhew'),
(130, 'David Prowse'),
(131, 'Robert Wise'),
(132, 'George Hurdalek'),
(133, 'Howard Lindsay'),
(134, 'Russel Crouse'),
(135, 'Ernest Lehman'),
(136, 'Maria von Trapp'),
(137, 'Julie Andrews'),
(138, 'Christopher Plummer'),
(139, 'Eleanor Parker'),
(140, 'Richard Haydn'),
(141, 'Peggy Wood'),
(142, 'Charmian Carr'),
(143, 'Heather Menzies-Urich'),
(144, 'Nicholas Hammond'),
(145, 'Duane Chase'),
(146, 'Angela Cartwright'),
(147, 'Debbie Turner'),
(148, 'Kym Karath'),
(149, 'Anna Lee'),
(150, 'Portia Nelson'),
(151, 'Brian De Palma'),
(152, 'Bruce Geller'),
(153, 'David Koepp'),
(154, 'Steven Zaillian'),
(155, 'Robert Towne'),
(156, 'Tom Cruise'),
(157, 'Jon Voight'),
(158, 'Emmanuelle Beart'),
(159, 'Henry Czerny'),
(160, 'Jean Reno'),
(161, 'Ving Rhames'),
(162, 'Kristin Scott Thomas'),
(163, 'Vanessa Redgrave'),
(164, 'Eduardo Matos Moctezuma');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`media_id`);

--
-- Indices de la tabla `formatos`
--
ALTER TABLE `formatos`
  ADD PRIMARY KEY (`format_id`);

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`people_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT de la tabla `formatos`
--
ALTER TABLE `formatos`
  MODIFY `format_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `people_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
