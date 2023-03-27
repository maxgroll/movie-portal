USE fallstudie_gruppe1;
SET FOREIGN_KEY_CHECKS = 0;
--
-- Testdaten in die Tabelle films einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_films.csv' INTO TABLE films
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle actors einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_actors.csv' INTO TABLE actors
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle admins einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_admins.csv' INTO TABLE admins
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle users einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_users.csv' INTO TABLE users
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle countries einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_countries.csv' INTO TABLE countries
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle genres einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_genres.csv' INTO TABLE genres
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle languages einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_languages.csv' INTO TABLE languages
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle directors einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_directors.csv' INTO TABLE directors
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle comments einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_comments.csv' INTO TABLE comments
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle films_actors einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_films_actors.csv' INTO TABLE films_actors
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle films_comments einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_films_comments.csv' INTO TABLE films_comments
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle films_genres einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_films_genres.csv' INTO TABLE films_genres
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

--
-- Testdaten in die Tabelle films_languages einfuegen
--
LOAD DATA LOCAL INFILE 'testdaten_csv/testdaten_films_languages.csv' INTO TABLE films_languages
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 4 LINES;

SET FOREIGN_KEY_CHECKS = 1;