<?php

class Film implements iFilm_actor, iFilm_genre, iFilm_language, iFilm_comment
{
	// attributes
	public $id;
	public $title;
	public $release_year;
	public $plot;
	public $imdbID;
	public $runtime;
	public $poster;
	public $countries_id;
	public $directors_id;
	
	// Constructor
	function __construct($daten) // konstruktor führt die funktion setDaten auf
	{
		$this->setDaten($daten);
	}
	
	public function setDaten(array $daten) // funktion prüft ob in einem übergebenen $array passende werte zu passenden settern der klasse admin befinden
	{
		if($daten)
		{
			foreach ($daten as $key => $value) 
			{
				$setter = "set" . ucfirst($key);
					
				if(method_exists($this, $setter))
				{
					$this->$setter($value);
				}
			}
		}
	}
	
	/////// Getter / Setter
	
	/////// $id
	function setId($id)
	{
		$this->id = $id;
	}
	
	function getId()
	{
		return $this->id;
	}
	
	/////// $title
    public function setTitle($title)
    {
        $this->title = $title;
    }
   
    public function getTitle()
    {
        return $this->title;
    }
	
	/////// $release_year
    public function setRelease_year($release_year)
    {
        $this->release_year = $release_year;
    }

    public function getRelease_year()
    {
        return $this->release_year;
    }
	
	/////// $plot
    public function setPlot($plot)
    {
        $this->plot = $plot;
    }
	
	public function getPlot()
	{
		return $this->plot;
	}
		
	/////// $imdbID
	public function setImdbID($imdbID)
	{
		$this->imdbID = $imdbID;
	}

    public function getImdbID()
    {
        return $this->imdbID;
    }
	
	/////// $runtime
	public function setRuntime($runtime)
	{
		$this->runtime = $runtime;
	}

    public function getRuntime()
    {
        return $this->runtime;
    }
	
	/////// $poster
	public function setPoster($poster)
	{
		$this->poster = $poster;
	}

    public function getPoster()
    {
        return $this->poster;
    }
	
	/////// $countries_id
	public function setCountries_id($countries_id)
	{
		$this->countries_id = $countries_id;
	}

    public function getCountries_id()
    {
        return $this->countries_id;
    }
	
	/////// $directors_id
	public function setDirectors_id($directors_id)
	{
		$this->directors_id = $directors_id;
	}

    public function getDirectors_id()
    {
        return $this->directors_id;
    }
	
	// Class Methods
	
	// Funktion name() liefert als ausgabe den klassennamen der Instanz der Klasse Film
	function name()
	{
		echo "Mein Name ist " . get_class($this) . "!";
		return true;
	}
	
	// Methods Class Film
	
	//////////////////////////////////////////
	/////// checkImdbId
	// prüft ob ein eintrag mit der übergebenen $imdbId bereits exestiert
	public static function checkImdbId($db, $imdbId)
	{
		try
		{
			$stmt = $db->query("SELECT imdbID FROM films WHERE imdbID = '$imdbId' ");
			$result = $stmt->fetch();
			return $result;
		}
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
		}
	}
	
	//////////////////////////////////////////
	/////// insert
	// erstellt einen neuen eintrag in der tabelle films
	// übergeben werden die genre ids zum film in $genres_ids
	// languages ids zum film in $languages_ids
	// actors ids zum film in $actors_ids
	public function insert($db, $obj, $genres_ids, $languages_ids, $actors_ids)
	{
		try
		{
			$data = (array) $obj;
			unset($data['id']);
		
			$stmt = $db->prepare($sql_new_book = "INSERT INTO films(title, release_year, plot, imdbID, runtime, poster, countries_id, directors_id) 
												  VALUES(:title, :release_year, :plot, :imdbID, :runtime, :poster, :countries_id, :directors_id)");
			$stmt->execute($data);
		
			$stmt = $db->query("SELECT LAST_INSERT_ID()");
			$result = $stmt->fetch();
		
			foreach ($result as $key => $value) 
			{
				$id = $value;
			}
		
			$this->setId($id);
				
			$this->insertFilm_genre($db, $genres_ids);
			$this->insertFilm_language($db, $languages_ids);
			$this->insertFilm_actor($db, $actors_ids);
			return true;
		}
		catch(PDOException $e) 
		{
			print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	
	//////////////////////////////////////////
	/////// update
	// ändert die daten zu einem film in der datenbank
	// $obj = eine instanz der klasse buch
	// $actors_ids = ids der schauspieler
	// $genres_ids = ids der genre
	// $languages_ids = ids der sprachen
	public function update($db, $obj, $actors_ids, $genres_ids, $languages_ids)
	{
		$data = (array) $obj;
		unset($data['id']);
		try
		{
			$stmt = $db->prepare("UPDATE films 
			SET title = :title, release_year = :release_year, plot = :plot, imdbID = :imdbID, runtime = :runtime, 
			poster = :poster, countries_id = :countries_id, directors_id = :directors_id
			WHERE id = '$this->id' ");
			$stmt->execute($data);
			
			// alte einträge in den zwischentabellen werden gelöscht
			$this->deleteFilm_genre($db);
			$this->deleteFilm_actor($db);
			$this->deleteFilm_language($db);
			
			// neue einträge in den zwischentabellen werden erstellt
			$this->insertFilm_genre($db, $genres_ids);
			$this->insertFilm_language($db, $languages_ids);
			$this->insertFilm_actor($db, $actors_ids);	
			
			return true;
		}
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	
	//////////////////////////////////////////
	/////// deleteFilm
	// löscht einen Eintrag zu einem Film aus der Datenbank
	// $comments_ids = ids der kommentare zu einem film
	public function deleteFilm($db, $comments_ids)
	{
		try
		{
			$this->deleteFilm_actor($db);	
			$this->deleteFilm_language($db);
			$this->deleteFilm_genre($db);
			$this->deleteFilm_comment($db);

			$sql = "DELETE FROM films WHERE films.id = '$this->id'";
			$db->exec($sql);
			
			foreach ($comments_ids as $key => $value) 
			{
				$sql = "DELETE FROM comments WHERE id = '$value' ";
				$db->exec($sql);
			}
			return true;
		}
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	
	}
	
	//////////////////////////////////////////
	/////// selectRand
	// selektiert nach Zufall 10 verschiedene filme
	// zurückgegeben wird ein assoc array mit den geholten daten
	public static function selectRand($db)
	{
		try
		{	
			$stmt = $db->query("SELECT films.id, title, directors.director, GROUP_CONCAT(genre) AS genres FROM films
								JOIN directors ON directors_id = directors.id
								JOIN films_genres ON films.id = films_genres.films_id
								JOIN genres ON films_genres.genres_id = genres.id
								GROUP BY id
								ORDER BY RAND()
								LIMIT 5");
						
			return $daten = $stmt->fetchAll();
		}
		
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	
	//////////////////////////////////////////
	/////// countFilms
	// liefert als rückgabe die anzahl der vorhandenen filme aus der tabelle films
	public static function countFilms($db)
	{
		try
		{	
			$stmt = $db->query("SELECT COUNT(*) AS amount FROM films");
			return $amount_of_films = $stmt->fetch()['amount'];
		}
		
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	
	//////////////////////////////////////////
	/////// selectFilms
	// liefert als rückgabe ein array mit allen filmen, limitier durch folgende paramter
	// $page_first_result = ab welchem wert sollen die filme angezeigt werden. wenn insgesamt 15 filme und $page_first_result = 5, startet ausgabe ab film nr.5
	// $results_per_page = wie viele filme sollen pro seite angezeigt werden
	public static function selectFilms($db, $page_first_result, $results_per_page)
	{
		try
		{	
			$stmt = $db->query("SELECT films.id, title AS Titel, directors.director AS Direktor, GROUP_CONCAT(genre) AS Genre, release_year AS Jahr FROM films
								  JOIN directors ON directors_id = directors.id
								  JOIN films_genres ON films.id = films_genres.films_id
					   			  JOIN genres ON films_genres.genres_id = genres.id
								  GROUP BY id
								  ORDER BY title ASC LIMIT " . $page_first_result . ',' . $results_per_page ." "); 
					  
			return $data = $stmt->fetchAll();
		}
		
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
		
	}
		
	//////////////////////////////////////////
	/////// selectFilm
	// liefert als rückgabe alle infos in einem assoc array zu einem film, welcher anhand eine id selektiert wird
	// $film_id = id zu der alle daten selektiert werden sollen
	public static function selectFilm($db, $film_id)
	{
		try
		{
			$sql = "SELECT  films.id, films.poster, title, directors.director AS director, 
					GROUP_CONCAT(DISTINCT genre ORDER BY title SEPARATOR ' / ') AS genres, 
					GROUP_CONCAT(DISTINCT actor ORDER BY title SEPARATOR ' / ') AS actors, 
					release_year, country, 
					GROUP_CONCAT(DISTINCT language ORDER BY title SEPARATOR ' / ') AS languages, 
					runtime, films.imdbID, plot
					
					FROM films
					JOIN directors
					ON directors.id=directors_id

					JOIN films_genres
					ON films.id = films_genres.films_id
					JOIN genres
					ON films_genres.genres_id = genres.id

					JOIN films_actors 
					ON films.id=films_actors.films_id
					JOIN actors
					ON films_actors.actors_id = actors.id

					JOIN countries
					ON countries.id=countries_id

					JOIN films_languages
					ON films.id=films_languages.films_id 
					JOIN languages
					ON films_languages.languages_id = languages.id

					WHERE films.id = '$film_id';";


			$stmt = $db->prepare($sql);
			$stmt->execute();

			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $data = $stmt->fetch();
		}
		
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	
	//////////////////////////////////////////
	/////// selectFilmEdit
	// liefert als rückgabe alle infos in einem assoc array zu einem film, welcher anhand eine id selektiert wird
	// $film_id = id zu der alle daten selektiert werden sollen
	public function selectFilmEdit($db, $film_id)
	{
		try
		{
			$sql = "SELECT films.title, films.directors_id, directors.director, films.release_year, films.runtime, films.poster, 
						   films.imdbID, films.countries_id, countries.country

					WHERE films.id = '$film_id';";


			$stmt = $db->prepare($sql);
			$stmt->execute();

			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $data = $stmt->fetch();
		}
		
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	
	// implemented methods
	
	// iFilm_actor
	
	//////////////////////////////////////////
	/////// insertFilm_actor
	// fügt in die Tabelle films_actors neue einträge ein
	// $actors_ids = ein array mit den ids zu schauspielern
	function insertFilm_actor($db, $actors_ids)
	{
		try
		{
			foreach ($actors_ids as $key => $value) 
			{
				$stmt = $db->query("INSERT INTO films_actors (films_id, actors_id) VALUES('$this->id', '$value')");
			}
			return true;
		}
		catch(PDOException $e) 
		{
			print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	function updateFilm_actor($db)
	{
		
	}
	
	//////////////////////////////////////////
	/////// deleteFilm_actor
	// löscht alle einträge aus der zwischentabelle films_actors
	function deleteFilm_actor($db)
	{
		try
		{
			$stmt = $db->query("DELETE FROM films_actors WHERE films_id = '$this->id' ");
			return true;
		}
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
		
	}
	
	// iFilm_genre
	
	//////////////////////////////////////////
	/////// insertFilm_genre
	// fügt in die Tabelle films_genres neue einträge ein
	// $actors_ids = ein array mit den ids zu genres
	function insertFilm_genre($db, $genres_ids)
	{
		try
		{
			foreach ($genres_ids as $key => $value) 
			{
				$stmt = $db->query("INSERT INTO films_genres (films_id, genres_id) VALUES('$this->id', '$value')");
			}
			return true;
		}
		
		catch(PDOException $e) 
		{
			print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	function updateFilm_genre($db)
	{
		
	}
	
	//////////////////////////////////////////
	/////// deleteFilm_genre
	// löscht alle einträge aus der zwischentabelle films_genres
	function deleteFilm_genre($db)
	{
		try
		{
			$stmt = $db->query("DELETE FROM films_genres WHERE films_id = '$this->id' ");
			return true;
		}
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	
	// iFilm_language
	
	//////////////////////////////////////////
	/////// insertFilm_language
	// fügt in die Tabelle films_languages neue einträge ein
	// $languages_ids = ein array mit den ids zu sprachen
	function insertFilm_language($db, $languages_ids)
	{
		try
		{
			foreach ($languages_ids as $key => $value) 
			{
				$stmt = $db->query("INSERT INTO films_languages (films_id, languages_id) VALUES('$this->id', '$value')");
			}
			return true;
		}
		
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	function updateFilm_language($db)
	{
		
	}
	
	//////////////////////////////////////////
	/////// deleteFilm_language
	// löscht alle einträge aus der zwischentabelle films_languages
	function deleteFilm_language($db)
	{
		try
		{
			$stmt = $db->query("DELETE FROM films_languages WHERE films_id = '$this->id' ");
			return true;
		}
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	
	// iFilm_comments
	
	function insertFilm_comment($db, $films_id)
	{
		
	}
	function updateFilm_comment($db)
	{
		
	}
	
	//////////////////////////////////////////
	/////// deleteFilm_comment
	// löscht alle einträge aus der zwischentabelle films_comments
	function deleteFilm_comment($db)
	{	
		try
		{
			$sql = "DELETE FROM films_comments WHERE films_id = '$this->id' ";
			$db->exec($sql);
			return true;
		}
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
}
?>