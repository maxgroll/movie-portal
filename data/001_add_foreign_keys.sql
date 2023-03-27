--
-- datenbank fallstudie_gruppe1
-- erstellen der tabellen nach der ersten analyse
--
-- mysql -uroot -p < 001_add_foreign_keys.sql  //muss ausgeführt werden wo die sql datei ist 
--
-- FOREIGN KEYS DATABASE fallstudie_gruppe1
--


USE fallstudie_gruppe1;


--
-- foreign keys für films {directors_id, countries_id}
--
ALTER TABLE films ADD FOREIGN KEY (directors_id) REFERENCES directors(id);

ALTER TABLE films ADD FOREIGN KEY (countries_id) REFERENCES countries(id);

--
-- foreign keys für films_genres {films_id, genres_id}
--
ALTER TABLE films_genres ADD FOREIGN KEY (films_id) REFERENCES films(id);

ALTER TABLE films_genres ADD FOREIGN KEY (genres_id) REFERENCES genres(id);

--
-- foreign keys für films_actors {films_id, actors_id}
--
ALTER TABLE films_actors ADD FOREIGN KEY (films_id) REFERENCES films(id);

ALTER TABLE films_actors ADD FOREIGN KEY (actors_id) REFERENCES actors(id);

--
-- foreign keys für films_languages {films_id, languages_id}
--
ALTER TABLE films_languages ADD FOREIGN KEY (films_id) REFERENCES films(id);

ALTER TABLE films_languages ADD FOREIGN KEY (languages_id) REFERENCES languages(id);

--
-- foreign keys für films_comments {films_id, comments_id}
--
ALTER TABLE films_comments ADD FOREIGN KEY (films_id) REFERENCES films(id);

ALTER TABLE films_comments ADD FOREIGN KEY (comments_id) REFERENCES comments(id);

--
-- foreign key für comments {users_id}
--
ALTER TABLE comments ADD FOREIGN KEY (users_id) REFERENCES users(id);




