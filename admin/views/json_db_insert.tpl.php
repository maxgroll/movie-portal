<h2>Upload</h2>  
<form action="start.php?action=json_db_insert" method="post" enctype="multipart/form-data">
<input required="required" type="file" name="file[]" id="file" multiple>
<br>
<input type="submit" name="submit" value="hochladen"/>


<?php
if(isset($_POST["submit"])) 
{  
	$count_files = count($_FILES['file']['name']); // anzahl der dateien die hochgeladen wurden
	
	for ($i=0; $i < $count_files ; $i++) 
	{
        $filename = $_FILES["file"]["name"][$i];
		
        // speichert Datei in  "upload" 
        move_uploaded_file($_FILES["file"]["tmp_name"][$i], "data/uploads/" . $filename); // upgeloadete Datei wird in data/uploads/
        
		$string = file_get_contents("data/uploads/$filename"); // wandelt json in string 

		$data = json_decode($string, true); // wandelt string in array

		// array wird mit daten aus $data befüllt
		$filmdaten = [ 
		"title" => $data['Title'],
		"release_year" => $data['Year'],
		"plot" => $data['Plot'],
		"runtime" => $data['Runtime'],
		"director" => $data['Director'],
		"actors" => explode(", ", $data['Actors']),
		"poster" => $data['Poster'],
		"countries" => explode(", ", $data['Country']),
		"imdbID" => $data['imdbID'],
		"languages" => explode(", ", $data['Language']),
		"genres" => explode(", ", $data['Genre'])
		];

		// echo "<pre>";
		// print_r($filmdaten);
		// exit;
		
		// sub arrays aus $filmdaten werden variablen zugewiesen
		$languages = $filmdaten['languages'];
		$genres = $filmdaten['genres'];
		$countries = $filmdaten['countries'][0];
		
		$imdbId = $filmdaten['imdbID'];

		// es wird geprüft ob ein eintrag zur übergebenen imdbID existiert
		$result = Film::checkImdbId($db, $imdbId);

		if($result == false) // falls die imdIb noch nicht existiert
		{
			$director = new Director($filmdaten); // eine instanz der Klasse Director wird erzeugt // construct setDirector
			$director->insert($db); // in der instanz wird methode insert ausgeführt
			$directors_id = $director->getId(); // der wert der eigenschaft id der instanz $director wird in einer variabel gespeichert

			$count_actors = count($filmdaten['actors']); // ermittelt größe des arrays $filmdaten['actor']
			$actors_ids = array(); 

			for ($x=0; $x < $count_actors ; $x++) 
			{ 
				$actor = new Actor($filmdaten['actors'][$x]); // instanz wird erstellt // construct setActor
				$actor->insert($db); // insert der instanz wird ausgeführt
				$actors_ids[$x] = $actor->getId(); // wert der eigenschaft id wird in ein array gespeichert
			}

			$count_genres = count($filmdaten['genres']);
			$genres_ids = array();

			for ($y=0; $y < $count_genres ; $y++) // ermittelt größe des arrays $filmdaten['genres']
			{ 
				$genre = new Genre(); // instanz wird erstellt
				$genre->setGenre($genres[$y]); // der eigenschaft genre wird ein wert übergeben
				$genre->insert($db); // insert der instanz wird ausgeführt
				$genres_ids[$y] = $genre->getId(); // wert der eigenschaft id wird in ein array gespeichert
			}

			$count_languages = count($filmdaten['languages']);  // ermittelt größe des arrays $filmdaten['languages']
			$languages_ids = array();

			for ($z=0; $z < $count_languages ; $z++) 
			{ 
				$language = new Language(); // instanz wird erstellt
				$language->setLanguage($languages[$z]); // der eigenschaft language wird ein wert übergeben
				$language->insert($db); // insert der instanz wird ausgeführt
				$languages_ids[$z] = $language->getId(); // wert der eigenschaft id wird in ein array gespeichert
			}

			$country = new Country();  // instanz wird erstellt
			$country->setCountry($countries); // der eigenschaft country wird ein wert übergeben
			$country->insert($db); // insert der instanz wird ausgeführt
			$country_id = $country->getId();  // wert der eigenschaft id wird in ein array gespeichert

			$filmdaten['countries_id'] = [$country_id][0]; // in $filmdaten werden die countriy_id und $driectors_id eingetragen
			$filmdaten['directors_id'] = [$directors_id][0];

			$film = new Film($filmdaten);  // instanz wird erstellt
			$insert = $film->insert($db, $film, $genres_ids, $languages_ids, $actors_ids); // insert der instanz wird ausgeführt
			$title = $film->getTitle();
				
			$message = "<br>Der Film $title wurde eingetragen!<br>";
			echo $message;
		}
		else
		{
			echo "<p class='error'>Der Film mit der imdID $imdbId ist bereits vorhanden!</p>";
			echo "<br>";
		}
	}
}
?>
</form>