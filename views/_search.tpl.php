<?php
require_once "../include/database.php";
require_once "../include/functions.php";
$q = $_REQUEST["q"]; // Die Eingabe vom Formular aus der search.tpl.php wird in der Variabel $q gespeichert

$q_length = strlen($q); // Anzahl der Zeichen von der Abgabe werden gezählt und in der variabel $q_lenght gespeichert

// lookup all hints from array if $q is different from ""
if ($q_length > 2) // wenn die Sucheingabe länger als 3 Zeichen lang ist 
{
	// Die tabellen und deren spalten aus der datenbank werden nach der Sucheingabe durchsucht
	// Als Rückgabe erhält man filme mit der möglichkeit auf die einzelansicht weitergeleitet zu werden
	$stmt = $db->query("SELECT films.title AS Titel
							FROM films
							JOIN directors
							ON directors.id = films.directors_id
							JOIN films_genres
							ON films.id = films_genres.films_id
							JOIN genres
							ON films_genres.genres_id = genres.id
							JOIN films_actors 
							ON films.id = films_actors.films_id
							JOIN actors
							ON films_actors.actors_id = actors.id
							JOIN countries
							ON countries.id = countries_id
							JOIN films_languages
							ON films.id = films_languages.films_id 
							JOIN languages
							ON films_languages.languages_id = languages.id
							WHERE films.title LIKE '%$q%' OR
							films.plot LIKE '%$q%' OR
							films.runtime LIKE '%$q%' OR
							films.release_year LIKE '%$q%' OR
							films.imdbID LIKE '%$q%' OR
							directors.director LIKE '%$q%' OR
							genres.genre LIKE '%$q%' OR
							languages.language LIKE '%$q%' OR
							actors.actor LIKE '%$q%' OR
							countries.country LIKE '%$q%'
							GROUP BY title
							ORDER BY title ASC 
							LIMIT 5");
							$result = $stmt->fetchAll();
						
	$empty = array();
	if($result !== $empty)
	{
		foreach ($result as $key => $value) 
		{
			echo "<span style='float:right'>". substr($value['Titel'],0 ,4) . "&nbsp; </span>";
		}
	}
						
}
 

?>