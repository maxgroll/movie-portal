-- MariaDB dump 10.19  Distrib 10.8.3-MariaDB, for osx10.13 (x86_64)
--
-- Host: localhost    Database: fallstudie_gruppe1
-- ------------------------------------------------------
-- Server version	10.8.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actor` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `actor` (`actor`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actors`
--

LOCK TABLES `actors` WRITE;
/*!40000 ALTER TABLE `actors` DISABLE KEYS */;
INSERT INTO `actors` VALUES
(110,'Aaron Eckhart'),
(25,'Adam Bousdoukos'),
(58,'Adan Jodorowsky'),
(69,'Al Pacino'),
(16,'Alejandro Jodorowsky'),
(89,'Amanda Seyfried'),
(10,'Amy Adams'),
(73,'Anne Hathaway'),
(53,'Ariel Gade'),
(8,'Armie Hammer'),
(28,'Arnold Schwarzenegger'),
(60,'Ben Affleck'),
(85,'Bill Pullman'),
(101,'Bo Carlsson'),
(22,'Brad Pitt'),
(17,'Brontis Jodorowsky'),
(126,'Bruce Willis'),
(67,'Carey Mulligan'),
(21,'Carla Gugino'),
(93,'Carrie-Anne Moss'),
(40,'Charlie Booty'),
(34,'Christian Bale'),
(49,'Christopher Walken'),
(120,'Colin Farrell'),
(29,'Danny DeVito'),
(78,'Daryl Hannah'),
(77,'David Carradine'),
(115,'Deborah Kara Unger'),
(39,'Dennis Hopper'),
(83,'Edward Furlong'),
(23,'Edward Norton'),
(108,'Elizabeth Debicki'),
(102,'Ellen Hillingsø'),
(65,'Elliot Page'),
(104,'Emily Mortimer'),
(112,'Emma Stone'),
(12,'Forest Whitaker'),
(43,'Frances McDormand'),
(88,'Gary Oldman'),
(44,'George Clooney'),
(94,'Guy Pearce'),
(125,'Hailee Steinfeld'),
(5,'Halle Berry'),
(109,'Heath Ledger'),
(71,'Hilary Swank'),
(118,'Horacio Salinas'),
(6,'Hugh Grant'),
(122,'Hugh Jackman'),
(37,'Isabella Rossellini'),
(19,'Jackie Earle Haley'),
(97,'Javier Bardem'),
(81,'Jeff Bridges'),
(52,'Jennifer Connelly'),
(117,'Jennifer Jason Leigh'),
(15,'Jeon Jong-seo'),
(11,'Jeremy Renner'),
(121,'Jessica Barden'),
(74,'Jessica Chastain'),
(95,'Joe Pantoliano'),
(47,'Joe Pesci'),
(54,'John C. Reilly'),
(106,'John David Washington'),
(68,'John Goodman'),
(87,'John Roselius'),
(1,'John Travolta'),
(99,'John Turturro'),
(18,'José Legarreta'),
(64,'Joseph Gordon-Levitt'),
(98,'Josh Brolin'),
(103,'Karla Løkke'),
(30,'Kelly Preston'),
(36,'Ken Watanabe'),
(80,'Kevin Spacey'),
(55,'Kurt Russell'),
(38,'Kyle MacLachlan'),
(129,'Laura Dern'),
(59,'Leandro Taub'),
(48,'Leonardo DiCaprio'),
(90,'Lily Collins'),
(41,'Lily James'),
(105,'Mark Ruffalo'),
(82,'Mary McCormack'),
(124,'Matt Damon'),
(72,'Matthew McConaughey'),
(24,'Meat Loaf'),
(35,'Michael Caine'),
(114,'Michael Douglas'),
(79,'Michael Madsen'),
(9,'Michael Stuhlbarg'),
(84,'Moira Kelly'),
(26,'Moritz Bleibtreu'),
(62,'Neil Patrick Harris'),
(91,'Nick Mancuso'),
(128,'Nicolas Cage'),
(111,'Olivia Colman'),
(66,'Oscar Isaac'),
(75,'Pam Grier'),
(86,'Patricia Arquette'),
(20,'Patrick Wilson'),
(27,'Pheline Roggan'),
(92,'Phillip Jarrett'),
(113,'Rachel Weisz'),
(63,'Ray Liotta'),
(32,'Richard Kind'),
(45,'Robert De Niro'),
(76,'Robert Forster'),
(107,'Robert Pattinson'),
(51,'Robin Bartlett'),
(70,'Robin Williams'),
(127,'Robin Wright'),
(61,'Rosamund Pike'),
(57,'Rosario Dawson'),
(3,'Samuel L. Jackson'),
(50,'Sarah Sutherland'),
(33,'Sari Lennick'),
(123,'Scarlett Johansson'),
(116,'Sean Penn'),
(46,'Sharon Stone'),
(14,'Steven Yeun'),
(100,'Tim Blake Nelson'),
(42,'Tim Roth'),
(7,'Timothee Chalamet'),
(4,'Tom Hanks'),
(96,'Tommy Lee Jones'),
(2,'Uma Thurman'),
(130,'Willem Dafoe'),
(13,'Yoo Ah-in'),
(119,'Zamira Saunders'),
(56,'Zoë Bell');
/*!40000 ALTER TABLE `actors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES
(1,'admin','$2y$10$vd2OxmXHu7xqLncO1upTy.ICDuUtcLfwrhFIKGW0bC9d/jj/xHaAm','max','mustermann');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `users_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES
(1,'Ich verstehe den Hype um den Film nicht. Nicht ganz so mein Ding.',1,'2022-09-28 11:09:38');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `country` (`country`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES
(11,'Canada'),
(9,'Chile'),
(12,'Denmark'),
(10,'France'),
(5,'Germany'),
(13,'Ireland'),
(2,'Italy'),
(4,'Mexico'),
(3,'South Korea'),
(8,'United Kingdom'),
(1,'United States');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directors`
--

DROP TABLE IF EXISTS `directors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `director` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`director`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directors`
--

LOCK TABLES `directors` WRITE;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` VALUES
(6,'Alejandro Jodorowsky'),
(17,'Christopher Nolan'),
(8,'David Fincher'),
(18,'David Lynch'),
(4,'Denis Villeneuve'),
(16,'Ethan Coen, Joel Coen'),
(9,'Fatih Akin'),
(24,'Iain Softley'),
(10,'Ivan Reitman'),
(25,'James Gray'),
(28,'Joachim Morre'),
(27,'Joel Coen, Ethan Coen'),
(5,'Lee Chang-dong'),
(2,'Luca Guadagnino'),
(30,'M. Night Shyamalan'),
(20,'Martin Scorsese'),
(22,'Michel Franco'),
(26,'N/A'),
(1,'Quentin Tarantino'),
(19,'Rufus Norris'),
(21,'Steven Spielberg'),
(3,'Wachowski'),
(23,'Walter Salles'),
(29,'Yorgos Lanthimos'),
(7,'Zack Snyder');
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `release_year` year(4) NOT NULL,
  `plot` varchar(1024) NOT NULL,
  `runtime` varchar(12) NOT NULL,
  `directors_id` int(11) NOT NULL,
  `poster` varchar(150) NOT NULL,
  `countries_id` int(11) NOT NULL,
  `imdbID` varchar(17) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `imdbID` (`imdbID`),
  KEY `directors_id` (`directors_id`),
  KEY `countries_id` (`countries_id`),
  CONSTRAINT `films_ibfk_1` FOREIGN KEY (`directors_id`) REFERENCES `directors` (`id`),
  CONSTRAINT `films_ibfk_2` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films`
--

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
INSERT INTO `films` VALUES
(1,'Pulp Fiction',1994,'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.','154 min',1,'https://m.media-amazon.com/images/M/MV5BNGNhMDIzZTUtNTBlZi00MTRlLWFjM2ItYzViMjE3YzI5MjljXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg',1,'tt0110912'),
(2,'Call Me by Your Name',2017,'In 1980s Italy, romance blossoms between a seventeen-year-old student and the older man hired as his father\'s research assistant.','132 min',2,'https://m.media-amazon.com/images/M/MV5BNDk3NTEwNjc0MV5BMl5BanBnXkFtZTgwNzYxNTMwMzI@._V1_SX300.jpg',2,'tt5726616'),
(3,'Cloud Atlas',2012,'An exploration of how the actions of individual lives impact one another in the past, present and future, as one soul is shaped from a killer into a hero, and an act of kindness ripples across centuries to inspire a revolution.','172 min',3,'https://m.media-amazon.com/images/M/MV5BMTczMTgxMjc4NF5BMl5BanBnXkFtZTcwNjM5MTA2OA@@._V1_SX300.jpg',1,'tt1371111'),
(4,'Arrival',2016,'A linguist works with the military to communicate with alien lifeforms after twelve mysterious spacecraft appear around the world.','116 min',4,'https://m.media-amazon.com/images/M/MV5BMTExMzU0ODcxNDheQTJeQWpwZ15BbWU4MDE1OTI4MzAy._V1_SX300.jpg',1,'tt2543164'),
(5,'Burning',2018,'Jong-su bumps into a girl who used to live in the same neighborhood, who asks him to look after her cat while she\'s on a trip to Africa. When back, she introduces Ben, a mysterious guy she met there, who confesses his secret hobby.','148 min',5,'https://m.media-amazon.com/images/M/MV5BMWNmYjI1M2UtNDdkNi00MTgwLWFiZmYtODcxNWZhM2Y2NWFkXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg',3,'tt7282468'),
(6,'El Topo',1970,'A mysterious black-clad gunfighter wanders a mystical Western landscape encountering multiple bizarre characters.','125 min',6,'https://m.media-amazon.com/images/M/MV5BNmUzMWQzMTItYzZiOS00NmI1LWIzMTgtOWE4NzE1M2NhY2IxXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg',4,'tt0067866'),
(7,'Watchmen',2009,'In 1985 where former superheroes exist, the murder of a colleague sends active vigilante Rorschach into his own sprawling investigation, uncovering something that could completely change the course of history as we know it.','162 min',7,'https://m.media-amazon.com/images/M/MV5BY2IzNGNiODgtOWYzOS00OTI0LTgxZTUtOTA5OTQ5YmI3NGUzXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg',1,'tt0409459'),
(8,'Fight Club',1999,'An insomniac office worker and a devil-may-care soap maker form an underground fight club that evolves into much more.','139 min',8,'https://m.media-amazon.com/images/M/MV5BNDIzNDU0YzEtYzE5Ni00ZjlkLTk5ZjgtNjM3NWE4YzA3Nzk3XkEyXkFqcGdeQXVyMjUzOTY1NTc@._V1_SX300.jpg',1,'tt0137523'),
(9,'Soul Kitchen',2009,'In Hamburg, German-Greek chef Zinos unknowingly disturbs the peace in his locals-only restaurant by hiring a more talented chef.','93 min',9,'https://m.media-amazon.com/images/M/MV5BZDg3MGIyYWEtOGRkYS00NWY5LWI3MDctMDY1NWJjZDlkOGE1XkEyXkFqcGdeQXVyNDk3NzU2MTQ@._V1_SX300.jpg',5,'tt1244668'),
(10,'Twins',1988,'A physically perfect but innocent man goes in search of his long-lost twin brother, who is short, a womanizer, and small-time crook.','107 min',10,'https://m.media-amazon.com/images/M/MV5BMWUzN2VkY2ItYmQ4YS00MjFmLWJhZDQtYWY1NWQ2NTA5NDNlXkEyXkFqcGdeQXVyNDc2NjEyMw@@._V1_SX300.jpg',1,'tt0096320'),
(16,'A Serious Man',2009,'Larry Gopnik, a Midwestern physics teacher, watches his life unravel over multiple sudden incidents. Though seeking meaning and answers amidst his turmoils, he seems to keep sinking.','106 min',16,'https://m.media-amazon.com/images/M/MV5BNGZkODlhMjktNzhhMC00YjFiLWJmODMtNjQwOGMzZjMxNTZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg',8,'tt1019452'),
(17,'Batman Begins',2005,'After training with his mentor, Batman begins his fight to free crime-ridden Gotham City from corruption.','140 min',17,'https://m.media-amazon.com/images/M/MV5BOTY4YjI2N2MtYmFlMC00ZjcyLTg3YjEtMDQyM2ZjYzQ5YWFkXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg',1,'tt0372784'),
(18,'Blue Velvet',1986,'The discovery of a severed human ear found in a field leads a young man on an investigation related to a beautiful, mysterious nightclub singer and a group of psychopathic criminals who have kidnapped her child.','120 min',18,'https://m.media-amazon.com/images/M/MV5BMzExOTczNTgtN2Q1Yy00MmI1LWE0NjgtNmIwMzdmZGNlODU1XkEyXkFqcGdeQXVyNDkzNTM2ODg@._V1_SX300.jpg',1,'tt0090756'),
(19,'Broken',2012,'Three suburban English families\' lives intertwine with tragic consequences.','2 min',19,'https://m.media-amazon.com/images/M/MV5BMjMwOTczNzkwMl5BMl5BanBnXkFtZTcwNjIyNzE3OQ@@._V1_SX300.jpg',8,'tt1441940'),
(20,'Burn After Reading',2008,'A disk containing mysterious information from a CIA agent ends up in the hands of two unscrupulous and daft gym employees who attempt to sell it.','96 min',16,'https://m.media-amazon.com/images/M/MV5BYzYwMjZhOGEtMGZlZS00Mjg1LTlkMDktYzJiZDU4MzAxZDRiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg',1,'tt0887883'),
(21,'Casino',1995,'A tale of greed, deception, money, power, and murder occur between two best friends: a mafia enforcer and a casino executive compete against each other over a gambling empire, and over a fast-living and fast-loving socialite.','178 min',20,'https://m.media-amazon.com/images/M/MV5BMTcxOWYzNDYtYmM4YS00N2NkLTk0NTAtNjg1ODgwZjAxYzI3XkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_SX300.jpg',1,'tt0112641'),
(22,'Catch Me If You Can',2002,'Barely 21 yet, Frank is a skilled forger who has passed as a doctor, lawyer and pilot. FBI agent Carl becomes obsessed with tracking down the con man, who only revels in the pursuit.','2 min',21,'https://m.media-amazon.com/images/M/MV5BMTY5MzYzNjc5NV5BMl5BanBnXkFtZTYwNTUyNTc2._V1_SX300.jpg',1,'tt0264464'),
(23,'Chronic',2015,'A home care nurse works with terminally ill patients.','93 min',22,'https://m.media-amazon.com/images/M/MV5BMTY3NjcxNTgzNV5BMl5BanBnXkFtZTgwMjE3NTkyMDI@._V1_SX300.jpg',4,'tt3850496'),
(24,'Dark Water',2005,'A mother and daughter, still wounded from a bitter custody dispute, hole up in a run-down apartment building, where they are targeted by the ghost of a former resident.','105 min',23,'https://m.media-amazon.com/images/M/MV5BOTcyMDQ3MjEtNjZkOS00ZDQ0LWE1YWMtYTNkNmNiZjU0MzhhXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg',1,'tt0382628'),
(25,'Death Proof',2007,'Two separate sets of voluptuous women are stalked at different times by a scarred stuntman who uses his \"death proof\" cars to execute his murderous plans.','127 min',1,'https://m.media-amazon.com/images/M/MV5BYTdmZmY3Y2QtNjU5NC00OGUxLTg3MWQtMmE2ODM5Mzg3MzcyL2ltYWdlL2ltYWdlXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SX300.jpg',1,'tt1028528'),
(26,'Endless Poetry',2016,'Surrealist filmmaker Alejandro Jodorowsky tells the story of himself as a young man becoming a poet in Chile, befriending other artists, and freeing himself from the limits of his youth.','128 min',6,'https://m.media-amazon.com/images/M/MV5BY2RlY2JhYWUtYzQ3NS00ZmQwLWIzYzMtYWNlZjAwYTg4ZTA3XkEyXkFqcGdeQXVyMTcxNTYyMjM@._V1_SX300.jpg',9,'tt4451458'),
(27,'Gone Girl',2014,'With his wife\'s disappearance having become the focus of an intense media circus, a man sees the spotlight turned on him when it\'s suspected that he may not be innocent.','149 min',8,'https://m.media-amazon.com/images/M/MV5BMTk0MDQ3MzAzOV5BMl5BanBnXkFtZTgwNzU1NzE3MjE@._V1_SX300.jpg',1,'tt2267998'),
(28,'Goodfellas',1990,'The story of Henry Hill and his life in the mob, covering his relationship with his wife Karen Hill and his mob partners Jimmy Conway and Tommy DeVito in the Italian-American crime syndicate.','145 min',20,'https://m.media-amazon.com/images/M/MV5BY2NkZjEzMDgtN2RjYy00YzM1LWI4ZmQtMjIwYjFjNmI3ZGEwXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg',1,'tt0099685'),
(29,'Inception',2010,'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.','148 min',17,'https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_SX300.jpg',1,'tt1375666'),
(30,'Inside Llewyn Davis',2013,'A week in the life of a young singer as he navigates the Greenwich Village folk scene of 1961.','2 min',16,'https://m.media-amazon.com/images/M/MV5BMjAxNjcyNDQxM15BMl5BanBnXkFtZTgwNzU2NDA0MDE@._V1_SX300.jpg',1,'tt2042568'),
(31,'Insomnia',2002,'Two Los Angeles homicide detectives are dispatched to a northern town where the sun doesn\'t set to investigate the methodical murder of a local teen.','118 min',17,'https://m.media-amazon.com/images/M/MV5BYzlkZTEyYjUtMTY5NS00ZjU0LTk5OTYtM2M0ZDg1NmNjMzhkXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg',1,'tt0278504'),
(32,'Interstellar',2014,'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.','169 min',17,'https://m.media-amazon.com/images/M/MV5BZjdkOTU3MDktN2IxOS00OGEyLWFmMjktY2FiMmZkNWIyODZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg',1,'tt0816692'),
(33,'Jackie Brown',1997,'A flight attendant with a criminal past gets nabbed by the ATF for smuggling. Under pressure to become an informant against the drug dealer she works for, she must find a way to secure her future without getting killed.','154 min',1,'https://m.media-amazon.com/images/M/MV5BNmY5ODRmYTItNWU0Ni00MWE3LTgyYzUtYjZlN2Q5YTcyM2NmXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg',1,'tt0119396'),
(34,'Kill Bill: Vol. 1',2003,'After awakening from a four-year coma, a former assassin wreaks vengeance on the team of assassins who betrayed her.','111 min',1,'https://m.media-amazon.com/images/M/MV5BNzM3NDFhYTAtYmU5Mi00NGRmLTljYjgtMDkyODQ4MjNkMGY2XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg',1,'tt0266697'),
(35,'Kill Bill: Vol. 2',2004,'The Bride continues her quest of vengeance against her former boss and lover Bill, the reclusive bouncer Budd, and the treacherous, one-eyed Elle.','137 min',1,'https://m.media-amazon.com/images/M/MV5BNmFiYmJmN2QtNWQwMi00MzliLThiOWMtZjQxNGRhZTQ1MjgyXkEyXkFqcGdeQXVyNzQ1ODk3MTQ@._V1_SX300.jpg',1,'tt0378194'),
(36,'K-PAX',2001,'PROT is a patient at a mental hospital who claims to be from a faraway planet named K-PAX. His psychiatrist tries to help him, only to begin to doubt his own explanations.','120 min',24,'https://m.media-amazon.com/images/M/MV5BZjE2Mjc4Y2EtN2QyNy00YTI5LWFlMjUtYjkwOTdhYTliMTliXkEyXkFqcGdeQXVyMjA0MzYwMDY@._V1_SX300.jpg',1,'tt0272152'),
(37,'Little Odessa',1994,'Early 1990s drama about a family of Soviet Jews living in Brooklyn\'s Brighton Beach ocean-side neighborhood nicknamed Little Odessa.','98 min',25,'https://m.media-amazon.com/images/M/MV5BZjc3YjRlMWQtYTU5Yy00ZmU5LTkzZDUtNDNlM2FkYjRkZjBlXkEyXkFqcGdeQXVyMjUzOTY1NTc@._V1_SX300.jpg',1,'tt0110365'),
(38,'Lost Highway',1997,'Anonymous videotapes presage a musician\'s murder conviction, and a gangster\'s girlfriend leads a mechanic astray.','134 min',18,'https://m.media-amazon.com/images/M/MV5BZDBmMjg0MWMtNTQ3MS00NGQ5LTg4YzQtNzA1NTk2MWQ2NzY3XkEyXkFqcGdeQXVyMjUzOTY1NTc@._V1_SX300.jpg',10,'tt0116922'),
(39,'Mank',2020,'1930s Hollywood is re-evaluated through the eyes of scathing social critic and alcoholic screenwriter Herman J. Mankiewicz as he races to finish the screenplay of Citizen Kane (1941).','131 min',8,'https://m.media-amazon.com/images/M/MV5BZTllMjI0ZGYtM2FmZC00ZmY4LTlkNTYtZThlOWQ1OGQyZTA3XkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_SX300.jpg',1,'tt10618286'),
(40,'Matrix',1993,'Steven Matrix is one of the underworld\'s foremost hitmen until his luck runs out, and someone puts a contract out on him. Shot in the forehead by a .22 pistol, Matrix \"dies\" and finds himself in \"The City In Between\", where he is ...','60 min',26,'https://m.media-amazon.com/images/M/MV5BYzUzOTA5ZTMtMTdlZS00MmQ5LWFmNjEtMjE5MTczN2RjNjE3XkEyXkFqcGdeQXVyNTc2ODIyMzY@._V1_SX300.jpg',11,'tt0106062'),
(41,'Memento',2000,'A man with short-term memory loss attempts to track down his wife\'s murderer.','113 min',17,'https://m.media-amazon.com/images/M/MV5BZTcyNjk1MjgtOWI3Mi00YzQwLWI5MTktMzY4ZmI2NDAyNzYzXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg',1,'tt0209144'),
(42,'No Country for Old Men',2007,'Violence and mayhem ensue after a hunter stumbles upon a drug deal gone wrong and more than two million dollars in cash near the Rio Grande.','122 min',16,'https://m.media-amazon.com/images/M/MV5BMjA5Njk3MjM4OV5BMl5BanBnXkFtZTcwMTc5MTE1MQ@@._V1_SX300.jpg',1,'tt0477348'),
(43,'O Brother, Where Art Thou?',2000,'In the deep south during the 1930s, three escaped convicts search for hidden treasure while a relentless lawman pursues them.','107 min',27,'https://m.media-amazon.com/images/M/MV5BMjZkOTdmMWItOTkyNy00MDdjLTlhNTQtYzU3MzdhZjA0ZDEyXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg',8,'tt0190590'),
(44,'Poor Things',2019,'One day Ronja is being followed by an unknown woman. The experience sparks off her interest and she is instantly drawn towards the mystery surrounding the stranger and her actions. To her regret, she is not the only one being foll...','18 min',28,'https://m.media-amazon.com/images/M/MV5BMzkyYTVlOGUtZDA0Ny00ZmU3LTliMDQtNDBmMTI5NGQ2ODEwXkEyXkFqcGdeQXVyNDc4Njc2MDc@._V1_SX300.jpg',12,'tt10148170'),
(45,'Shutter Island',2010,'In 1954, a U.S. Marshal investigates the disappearance of a murderer who escaped from a hospital for the criminally insane.','138 min',20,'https://m.media-amazon.com/images/M/MV5BYzhiNDkyNzktNTZmYS00ZTBkLTk2MDAtM2U0YjU1MzgxZjgzXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg',1,'tt1130884'),
(46,'Tenet',2020,'Armed with only one word, Tenet, and fighting for the survival of the entire world, a Protagonist journeys through a twilight world of international espionage on a mission that will unfold in something beyond real time.','150 min',17,'https://m.media-amazon.com/images/M/MV5BYzg0NGM2NjAtNmIxOC00MDJmLTg5ZmYtYzM0MTE4NWE2NzlhXkEyXkFqcGdeQXVyMTA4NjE0NjEy._V1_SX300.jpg',1,'tt6723592'),
(47,'The Dark Knight',2008,'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.','152 min',17,'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SX300.jpg',1,'tt0468569'),
(48,'The Favourite',2018,'In early 18th-century England, the status quo at the court is upset when a new servant arrives and endears herself to a frail Queen Anne.','119 min',29,'https://m.media-amazon.com/images/M/MV5BMTg1NzQwMDQxNV5BMl5BanBnXkFtZTgwNDg2NDYyNjM@._V1_SX300.jpg',13,'tt5083738'),
(49,'The Game',1997,'After a wealthy San Francisco banker is given an opportunity to participate in a mysterious game, his life is turned upside down as he begins to question if it might really be a concealed conspiracy to destroy him.','129 min',8,'https://m.media-amazon.com/images/M/MV5BNWQ2ODFhNWItNTA4NS00MzkyLTgyYzUtZjlhYWE5MmEzY2Q1XkEyXkFqcGdeQXVyMjUzOTY1NTc@._V1_SX300.jpg',1,'tt0119174'),
(50,'The Hateful Eight',2015,'In the dead of a Wyoming winter, a bounty hunter and his prisoner find shelter in a cabin currently inhabited by a collection of nefarious characters.','168 min',1,'https://m.media-amazon.com/images/M/MV5BMjA1MTc1NTg5NV5BMl5BanBnXkFtZTgwOTM2MDEzNzE@._V1_SX300.jpg',1,'tt3460252'),
(51,'The Holy Mountain',1973,'In a corrupt, greed-fueled world, a powerful alchemist leads a messianic character and seven materialistic figures to the Holy Mountain, where they hope to achieve enlightenment.','114 min',6,'https://m.media-amazon.com/images/M/MV5BN2IzM2I5NTQtMTIyMy00YWM2LWI1OGMtNjI0MWIyNDZkZGFkXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg',4,'tt0071615'),
(52,'The Lobster',2015,'In a dystopian near future, according to the laws of The City, single people are taken to The Hotel, where they are obliged to find a romantic partner in 45 days or they\'re transformed into beasts and sent off into The Woods.','119 min',29,'https://m.media-amazon.com/images/M/MV5BNDQ1NDE5NzQ1NF5BMl5BanBnXkFtZTgwNzA5OTM2NTE@._V1_SX300.jpg',13,'tt3464902'),
(53,'The Prestige',2006,'After a tragic accident, two stage magicians in 1890s London engage in a battle to create the ultimate illusion while sacrificing everything they have to outwit each other.','130 min',17,'https://m.media-amazon.com/images/M/MV5BMjA4NDI0MTIxNF5BMl5BanBnXkFtZTYwNTM0MzY2._V1_SX300.jpg',8,'tt0482571'),
(54,'True Grit',2010,'A stubborn teenager enlists the help of a tough U.S. Marshal to track down her father\'s murderer.','110 min',16,'https://m.media-amazon.com/images/M/MV5BMTU5MjU3MTI4OF5BMl5BanBnXkFtZTcwMTQxOTAxNA@@._V1_SX300.jpg',1,'tt1403865'),
(55,'Unbreakable',2000,'A man learns something extraordinary about himself after a devastating accident.','106 min',30,'https://m.media-amazon.com/images/M/MV5BMDIwMjAxNzktNmEzYS00ZDY5LWEyZjktM2Y0MmUzZDkyYmZkXkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_SX300.jpg',1,'tt0217869'),
(56,'Wild at Heart',1990,'Young lovers Sailor and Lula run from the variety of weirdos that Lula\'s mom has hired to kill Sailor.','125 min',18,'https://m.media-amazon.com/images/M/MV5BMjAxYmJhMTMtNmZlZi00ZWJlLTlmMjctOTg5ZTg4MzZmOWM2XkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg',1,'tt0100935');
/*!40000 ALTER TABLE `films` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films_actors`
--

DROP TABLE IF EXISTS `films_actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `films_actors` (
  `films_id` int(11) NOT NULL,
  `actors_id` int(11) NOT NULL,
  KEY `films_id` (`films_id`),
  KEY `actors_id` (`actors_id`),
  CONSTRAINT `films_actors_ibfk_1` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`),
  CONSTRAINT `films_actors_ibfk_2` FOREIGN KEY (`actors_id`) REFERENCES `actors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films_actors`
--

LOCK TABLES `films_actors` WRITE;
/*!40000 ALTER TABLE `films_actors` DISABLE KEYS */;
INSERT INTO `films_actors` VALUES
(1,1),
(1,2),
(1,3),
(2,4),
(2,5),
(2,6),
(3,7),
(3,8),
(3,9),
(4,10),
(4,11),
(4,12),
(5,13),
(5,14),
(5,15),
(6,16),
(6,17),
(6,18),
(7,19),
(7,20),
(7,21),
(8,22),
(8,23),
(8,24),
(9,25),
(9,26),
(9,27),
(10,28),
(10,29),
(10,30),
(16,9),
(16,32),
(16,33),
(17,34),
(17,35),
(17,36),
(18,37),
(18,38),
(18,39),
(19,40),
(19,41),
(19,42),
(20,22),
(20,43),
(20,44),
(21,45),
(21,46),
(21,47),
(22,48),
(22,4),
(22,49),
(23,42),
(23,50),
(23,51),
(24,52),
(24,53),
(24,54),
(25,55),
(25,56),
(25,57),
(26,58),
(26,17),
(26,59),
(27,60),
(27,61),
(27,62),
(28,45),
(28,63),
(28,47),
(29,48),
(29,64),
(29,65),
(30,66),
(30,67),
(30,68),
(31,69),
(31,70),
(31,71),
(32,72),
(32,73),
(32,74),
(33,75),
(33,3),
(33,76),
(34,2),
(34,77),
(34,78),
(35,2),
(35,77),
(35,79),
(36,80),
(36,81),
(36,82),
(37,42),
(37,83),
(37,84),
(38,85),
(38,86),
(38,87),
(39,88),
(39,89),
(39,90),
(40,91),
(40,92),
(40,93),
(41,94),
(41,93),
(41,95),
(42,96),
(42,97),
(42,98),
(43,44),
(43,99),
(43,100),
(44,101),
(44,102),
(44,103),
(45,48),
(45,104),
(45,105),
(46,106),
(46,107),
(46,108),
(47,34),
(47,109),
(47,110),
(48,111),
(48,112),
(48,113),
(49,114),
(49,115),
(49,116),
(50,3),
(50,55),
(50,117),
(51,16),
(51,118),
(51,119),
(52,120),
(52,113),
(52,121),
(53,34),
(53,122),
(53,123),
(54,81),
(54,124),
(54,125),
(55,126),
(55,3),
(55,127),
(56,128),
(56,129),
(56,130);
/*!40000 ALTER TABLE `films_actors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films_comments`
--

DROP TABLE IF EXISTS `films_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `films_comments` (
  `films_id` int(11) NOT NULL,
  `comments_id` int(11) NOT NULL,
  KEY `films_id` (`films_id`),
  KEY `comments_id` (`comments_id`),
  CONSTRAINT `films_comments_ibfk_1` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`),
  CONSTRAINT `films_comments_ibfk_2` FOREIGN KEY (`comments_id`) REFERENCES `comments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films_comments`
--

LOCK TABLES `films_comments` WRITE;
/*!40000 ALTER TABLE `films_comments` DISABLE KEYS */;
INSERT INTO `films_comments` VALUES
(1,1);
/*!40000 ALTER TABLE `films_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films_genres`
--

DROP TABLE IF EXISTS `films_genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `films_genres` (
  `films_id` int(11) NOT NULL,
  `genres_id` int(11) NOT NULL,
  KEY `films_id` (`films_id`),
  KEY `genres_id` (`genres_id`),
  CONSTRAINT `films_genres_ibfk_1` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`),
  CONSTRAINT `films_genres_ibfk_2` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films_genres`
--

LOCK TABLES `films_genres` WRITE;
/*!40000 ALTER TABLE `films_genres` DISABLE KEYS */;
INSERT INTO `films_genres` VALUES
(1,2),
(1,3),
(2,3),
(2,4),
(3,3),
(3,5),
(3,6),
(4,3),
(4,6),
(4,5),
(5,3),
(5,6),
(5,7),
(6,3),
(6,10),
(7,3),
(7,6),
(7,9),
(8,3),
(9,3),
(9,1),
(10,1),
(10,2),
(16,3),
(17,9),
(17,2),
(17,3),
(18,2),
(18,3),
(18,6),
(19,3),
(19,4),
(20,1),
(20,2),
(20,3),
(21,2),
(21,3),
(22,16),
(22,2),
(22,3),
(23,3),
(24,3),
(24,8),
(24,6),
(25,9),
(25,7),
(26,16),
(26,3),
(26,17),
(27,3),
(27,6),
(27,7),
(28,16),
(28,2),
(28,3),
(29,9),
(29,18),
(29,5),
(30,1),
(30,3),
(30,19),
(31,3),
(31,6),
(31,7),
(32,18),
(32,3),
(32,5),
(33,2),
(33,3),
(33,7),
(34,9),
(34,2),
(34,3),
(35,9),
(35,2),
(35,7),
(36,3),
(36,6),
(36,5),
(37,2),
(37,3),
(38,6),
(38,7),
(39,16),
(39,1),
(39,3),
(40,9),
(40,3),
(40,17),
(41,6),
(41,7),
(42,2),
(42,3),
(42,7),
(43,18),
(43,1),
(43,2),
(44,20),
(44,7),
(45,6),
(45,7),
(46,9),
(46,5),
(46,7),
(47,9),
(47,2),
(47,3),
(48,16),
(48,1),
(48,3),
(49,3),
(49,6),
(49,7),
(50,2),
(50,3),
(50,6),
(51,18),
(51,3),
(51,17),
(52,3),
(52,4),
(52,5),
(53,3),
(53,6),
(53,5),
(54,3),
(54,10),
(55,3),
(55,6),
(55,5),
(56,1),
(56,2),
(56,3);
/*!40000 ALTER TABLE `films_genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films_languages`
--

DROP TABLE IF EXISTS `films_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `films_languages` (
  `films_id` int(11) NOT NULL,
  `languages_id` int(11) NOT NULL,
  KEY `films_id` (`films_id`),
  KEY `languages_id` (`languages_id`),
  CONSTRAINT `films_languages_ibfk_1` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`),
  CONSTRAINT `films_languages_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films_languages`
--

LOCK TABLES `films_languages` WRITE;
/*!40000 ALTER TABLE `films_languages` DISABLE KEYS */;
INSERT INTO `films_languages` VALUES
(1,2),
(1,3),
(1,4),
(2,1),
(2,4),
(2,13),
(2,16),
(3,2),
(3,17),
(3,3),
(3,10),
(4,18),
(4,2),
(4,8),
(5,2),
(5,10),
(6,3),
(7,2),
(8,2),
(9,1),
(9,2),
(9,3),
(9,11),
(10,1),
(16,2),
(16,32),
(16,16),
(17,2),
(17,18),
(18,2),
(19,2),
(20,2),
(21,2),
(22,2),
(22,4),
(23,2),
(24,2),
(25,2),
(26,3),
(26,4),
(26,2),
(27,2),
(28,2),
(28,13),
(29,2),
(29,7),
(29,4),
(30,2),
(31,2),
(32,2),
(33,2),
(34,2),
(34,7),
(34,4),
(35,2),
(35,33),
(35,18),
(35,3),
(36,2),
(37,2),
(38,2),
(39,2),
(39,1),
(39,34),
(40,2),
(41,2),
(42,2),
(42,3),
(43,2),
(44,35),
(45,2),
(45,1),
(46,2),
(46,8),
(46,17),
(46,36),
(46,37),
(46,38),
(47,2),
(47,18),
(48,2),
(49,2),
(49,33),
(49,1),
(49,3),
(49,39),
(50,40),
(50,2),
(50,3),
(50,4),
(51,3),
(51,2),
(52,2),
(52,4),
(52,41),
(53,2),
(54,2),
(55,2),
(56,2),
(56,3);
/*!40000 ALTER TABLE `films_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `genre` (`genre`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES
(9,'action'),
(18,'Adventure'),
(11,'anime'),
(16,'Biography'),
(1,'comedy'),
(13,'comic'),
(2,'crime'),
(3,'drama'),
(12,'eastern'),
(17,'Fantasy'),
(8,'horror'),
(19,'Music'),
(6,'mystery'),
(4,'romance'),
(5,'sci-fi'),
(20,'Short'),
(7,'thriller'),
(10,'western');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `language` (`language`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES
(5,'arabic'),
(33,'Cantonese'),
(6,'chinese'),
(35,'Danish'),
(14,'dutch'),
(2,'english'),
(36,'Estonian'),
(4,'french'),
(1,'german'),
(41,'Greek'),
(16,'hebrew'),
(38,'Hindi'),
(13,'italian'),
(7,'japanese'),
(10,'korean'),
(34,'Latin'),
(18,'mandarin'),
(37,'Norwegian'),
(40,'Persian'),
(9,'portugese'),
(8,'russian'),
(3,'spanish'),
(15,'swedish'),
(12,'tamil'),
(39,'Thai'),
(11,'turkish'),
(17,'ukrainian'),
(32,'Yiddish');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'bluetrain','$2y$10$hq.pH3KKzsmKgkNE2I0c2.Dtghnk5or/9Ykt/TZ7/XpteEVytTIZu','bluetrain@gmail.com'),
(2,'blackspace','$2y$10$hq.pH3KKzsmKgkNE2I0c2.Dtghnk5or/9Ykt/TZ7/XpteEVytTIZu','daniel.black@gmail.com'),
(3,'erikamoon','$2y$10$hq.pH3KKzsmKgkNE2I0c2.Dtghnk5or/9Ykt/TZ7/XpteEVytTIZu','erikalaub@gmail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-28 13:11:32
