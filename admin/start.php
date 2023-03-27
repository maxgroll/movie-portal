<?php
session_start();
require_once "include/functions.php";
require_once 'include/database.php';

if(isset($_GET['action'])) // falls mit $_GET eine $action übergeben worden ist
{
	$action = $_GET['action']; // wird der Wert in $action gespeichert
}
else
{
	$action = "start"; // andernfalls wird "index" in $action gespeichert
}

$actions = ['delete_comment','delete_film_admin', 'edit_film_admin', 'show_film_admin', 'show_films_admin', 'json_db_insert',
			'new_genre', 'new_language', 'new_country',
			'logout', 'start'];

if(in_array($action, $actions)) // falls wert von $action ind $actions vorkommt
{
	switch($action) // $switch erhält wert von $action
	{	
		case "delete_comment": //// falls $action == "agbs" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		
		$film_id = $_GET['film_id'];
		$comment_id = $_GET['comment_id'];
		$comment = $_GET['comment'];
		break;

		case "delete_film_admin": //// falls $action == "delete_film_admin" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		
		$id = $_GET['id']; // id des films wird in $id gespeichert
		$result = Film::selectFilm($db, $id); // selektiert daten zu einem Filmeintrag
		$film = new Film($result); // kreiert mit den daten vom selectFilm eine Instanz der Klasse Film
		$title = $film->title; // in $title wird der titel des films gespeichert
		$films_id = $film->getId(); // in films_id wird die id des films gepseichert
		$data = Comment::selectComments($db, $films_id); // alle kommentareinträge zu einem film werden selektiert
		$comments_ids = array();

		foreach ($data as $index => $array) // schleife befüllt das array $comments_ids mit der selektierten kommentare
		{
			foreach ($array as $key => $value) 
			{
				if($key == 'id')
				{
					$comments_ids[] = $value;
				}
			}
		}
		break;
		
		case "edit_film_admin": //// falls $action == "edit_film_admin" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		
		$films_id = $_GET['id'];
		$data = ["id" => $films_id];

		$film = new Film($data); // instanz der klasse film wird erstellt
		$data = $film->selectFilm($db, $films_id); // alle daten zum aktuellen film werden selektiert

		$actors = explode("/ ",$data['actors']);
		$genres_old = explode("/ ",$data['genres']);
		$languages_old = explode("/ ",$data['languages']);
		
		$country = new Country();
		$countries = $country->selectCountries($db); // alles vorhandenen länder aus der db werden selektiert

		$genre = new Genre();
		$genres = $genre->selectGenres($db); // alles vorhandenen genres aus der db werden selektiert

		$language = new Language();
		$languages = $language->selectLanguages($db); // alle vorhandenen sprachen aus der db werden selektiert
		break;

		case "show_film_admin": //// falls $action == "show_film_admin" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		
		$id = $_GET['id'];
		$film_data = Film::selectFilm($db, $id); // methode selectFilm() der Klasse Film wird ausgeführt
		$comments_data = Comment::selectComments($db, $id); // Alle Kommentare zu einem Film werden selektiert und in $data gespeichert
		break;
		
		case "show_films_admin": //// falls $action == "show_films_admin" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		
		$results_per_page = 5; // anzahl der agezeigten filme pro seite
		$amount_of_films = Film::countFilms($db); // gesamtanzahl der filme in der tabelle films
		$number_of_page = ceil ($amount_of_films / $results_per_page); 	// bestimmt die gesamtanzahl der benötigten seiten
		if (!isset ($_GET['page'])) // bestimmt auf welcher seite der besucher sich grade befindet
		{  
		    $page = 1;  
		} 
		else 
		{  
		    $page = $_GET['page'];  
		} 
		$page_first_result = ($page - 1) * $results_per_page; // bestimmt SQL Limit start wert ab welchem die ergebnisse angezeigt werden sollen
		$data = Film::selectFilms($db, $page_first_result, $results_per_page);
		break;
		
		case "new_genre": //// falls $action == "new_genre" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		break;
		
		case "new_language": //// falls $action == "new_language" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		break;
		
		case "new_country": //// falls $action == "new_country" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		break;

		case "logout": //// falls $action == "logout" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		$data = ['id' => $_SESSION['admin_id']];
		$admin = new Admin($data);
		$admin->logout(); // methode logout der Klasse admin wird ausgeführt
		redirect("index.php");
		break;
		
		
		case "json_db_insert": //// falls $action == "json_db_insert" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		
		break;
		

		default: //// falls $action == "...." nicht in im array $actions gespeichert ist
		break;
	}
	require_once 'views/layout.tpl.php'; //// nach jedem case wird die layout.tpl.php gespeichert
}
else // falls wert von $action nciht in $actions vorkommt
{
	header("Location: start.php"); // wird zur start.php umgeleitet
	exit;
}
?>