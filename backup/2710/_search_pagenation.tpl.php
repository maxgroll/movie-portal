<?php
require_once "../include/database.php";
require_once "../include/functions.php";
$q = $_REQUEST["q"]; // Die Eingabe vom Formular aus der search.tpl.php wird in der Variabel $q gespeichert
$q_length = strlen($q); // Anzahl der Zeichen von der Abgabe werden gezählt und in der variabel $q_lenght gespeichert

if ($q_length > 2) // wenn die Sucheingabe länger als 3 Zeichen lang ist 
{
	$results_per_page = 5; // anzahl der agezeigten filme pro seite
	
	$stmt = $db->query("SELECT films.id, films.title, directors.director, films.release_year, 
						GROUP_CONCAT(DISTINCT genre ORDER BY genre ASC) as genres
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
						ORDER BY title ASC ");
	$result = $stmt->fetchAll();
	
	$empty = array();
	if($result !== $empty)
	{
		$amount_of_films = count($result); // anzahl der suchergebnisse
		$number_of_page = ceil($amount_of_films / $results_per_page); // bestimmt die gesamtanzahl der benötigten seiten
	
		if (!isset($_GET['page'])) // bestimmt auf welcher seite der besucher sich grade befindet
		{  
		    $page = 1;  
		} 
		else 
		{  
		    $page = $_GET['page'];  
		} 
	
		$page_first_result = ($page-1) * $results_per_page; // bestimmt SQL Limit start wert ab welchem die ergebnisse angezeigt werden sollen
	
		$stmt = $db->query("SELECT films.id, films.title, directors.director, films.release_year AS Year, 
							GROUP_CONCAT(DISTINCT genre ORDER BY genre ASC) as genres
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
							ORDER BY title ASC LIMIT " . $page_first_result . ',' . $results_per_page ." ");
		$result = $stmt->fetchAll();
		
		printTable($result, 'datatable', 'film', 'show'); // eine Tabelle mit den Suchergebnissen wird gedruckt
		
		echo '<div class="pagination">';     
		for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
		{  
			echo '<a href = "index.php?action=search&q='.$q.'&page=' . $page . '">' . $page . ' </a>';  
		} 
		echo '</div>';	
	}
}
?>