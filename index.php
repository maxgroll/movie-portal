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
	$action = "index"; // andernfalls wird "index" in $action gespeichert
}

$actions = ['agbs', 'impressum', 'index', 'about', 'new_film', 'show_film', 'show_films', 'show_films_public', 'login', 'logout', 'register','search','show_search'];

if(in_array($action, $actions)) // falls wert von $action ind $actions vorkommt
{
	switch($action) // $switch erhält wert von $action
	{	
		case "agbs": //// falls $action == "agbs" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		break;
		
		case "show_search": //// falls $action == "agbs" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		break;

		case "impressum": //// falls $action == "impressum" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		break;
		
		case "about": //// falls $action == "about" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		break;

		case "new_film": //// falls $action == "new_film" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		
		$country = new Country();
		$countries = $country->selectCountries($db); // alle Länder aus der Datenbank werden selektiert

		$genre = new Genre();
		$genres = $genre->selectGenres($db); // alle Genres aus der Datenbank werden selektiert

		$language = new Language();
		$languages = $language->selectLanguages($db); // alle Sprachen aus der Datenbank werden seletiert
		break;
		
		case "show_film": //// falls $action == "show_film" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		
		$id = $_GET['id'];
		$film_data = Film::selectFilm($db, $id);  // methode selectFilm() der Klasse Film wird ausgeführt
		$comments_data = Comment::selectComments($db, $id); // Alle Kommentare zu einem Film werden selektiert und in $data gespeichert	
		break;
		
		case "show_films": //// falls $action == "show_films" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		
		$results_per_page = 5; // anzahl der agezeigten filme pro seite
		$amount_of_films = Film::countFilms($db); // gesamtanzahl der filme in der tabelle films
		$number_of_page = ceil ($amount_of_films / $results_per_page); // bestimmt die gesamtanzahl der benötigten seiten
		if (!isset ($_GET['page'])) // bestimmt auf welcher seite der besucher sich grade befindet
		{  
		    $page = 1;  
		} 
		else 
		{  
		    $page = $_GET['page'];  
		} 
		$page_first_result = ($page-1) * $results_per_page; // bestimmt SQL Limit start wert ab welchem die ergebnisse angezeigt werden sollen
		$data = Film::selectFilms($db, $page_first_result, $results_per_page); // selektiert alle filme aus der db mit paganation
		break;
		
		case "show_films_public"://// falls $action == "show_film" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		
		$results_per_page = 5; // anzahl der agezeigten filme pro seite
		$amount_of_films = Film::countFilms($db); 	// gesamtanzahl der filme in der tabelle films
		$number_of_page = ceil ($amount_of_films / $results_per_page); // bestimmt die gesamtanzahl der benötigten seiten
		if (!isset ($_GET['page'])) // bestimmt auf welcher seite der besucher sich grade befindet
		{  
		    $page = 1;  
		} 
		else 
		{  
		    $page = $_GET['page'];  
		} 
		$page_first_result = ($page-1) * $results_per_page; // bestimmt SQL Limit start wert ab welchem die ergebnisse angezeigt werden sollen
		$data = Film::selectFilms($db, $page_first_result, $results_per_page); // selektiert alle filme aus der db mit paganation
		break;
	
		case "login": //// falls $action == "login" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		break;
		
		case "logout": //// falls $action == "logout" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		break;
		
		case "register": //// falls $action == "register" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		break;
		
		case "search": //// falls $action == "search" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden
		break;
		
		case "index": //// falls $action == "index" // in der layout.tpl.php wird im main der entsprechende view zur action eingebunden

		$data = Film::selectRand($db); // $daten = Es werden 5 zufällige Filme mit Infos aus der Datenbank geholt
		break;

		default: //// falls $action == "...." nicht in im array $actions gespeichert ist
		break;
	}
	require_once 'views/layout.tpl.php'; //// nach jedem case wird die layout.tpl.php gebunden
}
else // falls wert von $action nicht in $actions vorkommt
{
	header("Location: index.php"); // wird zur index.php umgeleitet
	exit;
}
?>