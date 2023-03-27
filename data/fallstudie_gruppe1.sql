--
-- datenbank fallstudie_gruppe1
-- erstellen der tabellen nach der ersten analyse
--
-- mysql -uroot < fallstudie_gruppe1.sql  //muss ausgeführt werden wo die sql datei ist 
--
-- DATABASE fallstudie_gruppe1
--

DROP DATABASE IF EXISTS fallstudie_gruppe1;
CREATE DATABASE IF NOT EXISTS fallstudie_gruppe1;

USE fallstudie_gruppe1;

-- TABLE films
--
-- films = {films.id, title ,release_year year ,plot, runtime, directors_id, poster, countries_id, imdbID}
--
CREATE TABLE films (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(512) NOT NULL,
	release_year year NOT NULL,
	plot VARCHAR(4096) NOT NULL,
	runtime VARCHAR(12) NOT NULL,
	directors_id INTEGER NOT NULL,
	poster VARCHAR(150) NOT NULL,
	countries_id INTEGER NOT NULL,
	imdbID VARCHAR(17) NOT NULL UNIQUE
)DEFAULT CHARSET=utf8mb4;

--
-- TABLE directors
--
-- films = {directors.id, name}
CREATE TABLE directors (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL UNIQUE
)DEFAULT CHARSET=utf8mb4;

CREATE TABLE countries (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	country VARCHAR(50) NOT NULL UNIQUE
)DEFAULT CHARSET=utf8mb4;

--
-- TABLE languages
--
-- directors = {languages.id, name}
CREATE TABLE languages (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	language VARCHAR(50) NOT NULL UNIQUE
)DEFAULT CHARSET=utf8mb4;

--
-- TABLE actors
--
-- actors = {actors.id, name}
CREATE TABLE actors (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	actor VARCHAR(64) NOT NULL UNIQUE
)DEFAULT CHARSET=utf8mb4;

--
-- TABLE genres
--
-- genres = {genres.id, name}
CREATE TABLE genres (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	genre VARCHAR(128) NOT NULL UNIQUE
)DEFAULT CHARSET=utf8mb4;

--
-- TABLE films_genres
--
-- films_genres = {films_id, genres_id}
CREATE TABLE films_genres (
	films_id INTEGER NOT NULL,
	genres_id INTEGER NOT NULL
)DEFAULT CHARSET=utf8mb4;

--
-- TABLE films_actors
--
-- films_actors = {films_id, actors_id}
CREATE TABLE films_actors (
	films_id INTEGER NOT NULL,
	actors_id INTEGER NOT NULL
)DEFAULT CHARSET=utf8mb4;

--
-- TABLE films_languages
--
-- films_languages = {films_id, languages_id}
CREATE TABLE films_languages (
	films_id INTEGER NOT NULL,
	languages_id INTEGER NOT NULL
)DEFAULT CHARSET=utf8mb4;

--
-- TABLE films_comments
--
-- films_comments = {films_id, comments_id}
CREATE TABLE films_comments (
	films_id INTEGER NOT NULL,
	comments_id INTEGER NOT NULL
)DEFAULT CHARSET=utf8mb4;

--
-- TABLE comments
--
-- comments = {comments.id, comment, users_id, created}
CREATE TABLE comments (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	comment TEXT NOT NULL,
	users_id INTEGER NOT NULL,
	created TIMESTAMP NOT NULL
)DEFAULT CHARSET=utf8mb4;

--
-- TABLE users
--
-- users = {users.id, username, password, email}
CREATE TABLE users (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(64) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	email VARCHAR(128) NOT NULL UNIQUE
)DEFAULT CHARSET=utf8mb4;

--
-- TABLE admins
--
-- admins = {admins.id, username, password, firstname, lastname}
CREATE TABLE admins (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(64) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	firstname VARCHAR(64) NOT NULL,
	lastname VARCHAR(64) NOT NULL
)DEFAULT CHARSET=utf8mb4;